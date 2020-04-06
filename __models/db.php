<?php 

class Db {
   protected $connection;

   public function __construct($dbhost = "localhost", $dbuser = "root", $dbpass = "qwerty", $dbname = "jeanforteroche", $charset = "utf8") {
      $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
      if ($this->connection->connect_error) {
         $this->error("Échec de connexion sur MySQL - " . $this->connection->connect_error);
      } 
      $this->connection->set_charset($charset);
   }

}