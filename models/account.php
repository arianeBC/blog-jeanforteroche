<?php
include "db.php";
$db = new Db();
session_start();

class Account {
   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function login($login, $pwd) {
      $sql = $this->db->query("SELECT id_user, user_name, email, password FROM users WHERE email = ? AND password = ?", "$login", "$pwd")->numRows();
      if ($sql > 0) {
         $_SESSION['login'] = $_POST['login'];
         $_SESSION['username'] = $row['user_name'];
         $_SESSION['userid'] = $row['id_user'];
         header("location:result.php");
      }
   }
}