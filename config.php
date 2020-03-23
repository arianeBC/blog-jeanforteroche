<?php

   session_start();
   $db = new mysqli("localhost", "root", "qwerty", "jeanforteroche");
   $db->set_charset("utf8");

   if ($db->connect_errno) {
      printf("Échec de la connexion : %s\n", $db->connect_error);
      exit();
   }

   // define global constants
   define ("ROOT_PATH", realpath(dirname(__FILE__)) );
   define ("BASE_URL", "http://localhost:4000/www/jeanforteroche/");