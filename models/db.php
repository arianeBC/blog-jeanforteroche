<?php 

class Db{

   protected $connection;
   protected $query;
   protected $show_errors = TRUE;
   protected $query_closed = TRUE;
   public $query_count = 0;

   public function __construct($dbhost = "localhost", $dbuser = "root", $dbpass = "qwerty", $dbname = "jeanforteroche", $charset = "utf8") {
      $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
      if ($this->connection->connect_error) {
         $this->error("Échec de connexion sur MySQL - " . $this->connection->connect_error);
      } 
      $this->connection->set_charset($charset);
   }

   public function query($query) {
      if (!$this->query_closed) {
         $this->query->close();
      }
      if ($this->query = $this->connection->prepare($query)) {
         //si il y a plus qu'un argument
         if (func_num_args() > 1) {
            //retourne sous forme de tableau
            $x = func_get_args();
            //extrait une portion du tableau(array, 1=commencement du array)
            $args = array_slice($x, 1);
            $types = "";
            //cree un tableau
            $args_ref = array();
            //&$ = passer une variable par reference & qu'elle puisse etre mod
            foreach ($args as $k => &$arg) {
               //Si $args[$k] est un array
               if (is_array($args[$k])) {
                  foreach ($args[$k] as $j => &$a) {
                     // Ajouter a $types le type de variable
                     $types .= $this->_gettype($args[$k][$j]);
                     //$args_ref[] = tableau des valeurs
                     $args_ref[] = &$a;
                  }
               } else {
                  $types .= $this->_gettype($args[$k]);
                  $args_ref[] = &$arg;
               }
            }
            //Empile un ou plusieurs éléments au début d'un tableau
            //retourne le nouveau nb d'éléments du array
            array_unshift($args_ref, $types);
            //bind_param = Lie les variables à la query
            //Appelle une fct de rappel (array) et ($args_ref) comme param a passer
            call_user_func_array(array($this->query, "bind_param"), $args_ref);
         }
         $this->query->execute();
            if ($this->query->errno) {
         $this->error("Impossible de traiter la requête MySQL (vérifiez vos paramètres) - " . $this->query->error);
         }
         $this->query_closed = FALSE;
         $this->query_count++;
         } else {
            $this->error("
            Impossible de préparer l'instruction MySQL (vérifiez votre syntaxe) - " . $this->connection->error);
         }
      return $this;
   }

   public function fetchAll($callback = null) {
         $params = array();
         $row = array();
         $meta = $this->query->result_metadata();
         while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
         }
         call_user_func_array(array($this->query, 'bind_result'), $params);
         $result = array();
         while ($this->query->fetch()) {
            $r = array();
            foreach ($row as $key => $val) {
                  $r[$key] = $val;
            }
            if ($callback != null && is_callable($callback)) {
                  $value = call_user_func($callback, $r);
                  if ($value == 'break') break;
            } else {
                  $result[] = $r;
            }
         }
         $this->query->close();
         $this->query_closed = TRUE;
      return $result;
   }

   public function fetchArray() {
         $params = array();
         $row = array();
         $meta = $this->query->result_metadata();
         while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
         }
         call_user_func_array(array($this->query, 'bind_result'), $params);
         $result = array();
      while ($this->query->fetch()) {
         foreach ($row as $key => $val) {
            $result[$key] = $val;
         }
      }
         $this->query->close();
         $this->query_closed = TRUE;
      return $result;
   }

   public function close() {
      return $this->connection->close();
   }

      public function numRows() {
      $this->query->store_result();
      return $this->query->num_rows;
   }

   public function affectedRows() {
      return $this->query->affected_rows;
   }

      public function lastInsertID() {
         return $this->connection->insert_id;
      }

      public function error($error) {
         if ($this->show_errors) {
            exit($error);
         }
      }

   private function _gettype($var) {
         if (is_string($var)) return 's';
         if (is_float($var)) return 'd';
         if (is_int($var)) return 'i';
         return 'b';
   }

}