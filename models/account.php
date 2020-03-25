<?php
require_once("config.php");

class Account {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function login($login, $pwd) {
      $sql = "SELECT email, password FROM users WHERE email='$login' AND password='$pwd'";
      $result = $this->db->query($sql);
      if (($result->num_rows) > 0) {
         $_SESSION["login"] = $_POST["login"];
         header("location:result.php");
      }
   }
}