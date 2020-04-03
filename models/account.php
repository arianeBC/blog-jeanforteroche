<?php
include ("config.php");
session_start();

class Account {

   private $db;

   public function __construct($db) {
      $this->db = $db;
   }

   public function login($login, $pwd) {
      $sql = "SELECT id_user, user_name, email, password FROM users WHERE email='$login' AND password='$pwd'";
      $result = $this->db->query($sql);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if (($result->num_rows) > 0) {
         $_SESSION['login'] = $_POST['login'];
         $_SESSION['username'] = $row['user_name'];
         $_SESSION['userid'] = $row['id_user'];
         header("location:result.php");
      }
   }
   
}