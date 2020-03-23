<?php

function uploadImage() {
   $imagename = $_FILES["image"]["name"];
   $imagetmp = $_FILES["image"]["tmp_name"];
   $allowed = array("jpeg", "jpg", "pgn");
   $ext = mb_strtolower(pathinfo($imagename, PATHINFO_EXTENSION));

   if(in_array($ext, $allowed)) {
      move_uploaded_file($imagetmp, "public/images/".$imagename);
   } else {
      echo "<div class='text-center alert alert-danger'>Ajoutez une image dans les formats JPEG JPG ou PNG</div>";
   }
   return $imagename;
}

function createSlug($string) {
   $slug = mb_strtolower(preg_replace("/[^A-Za-z0-9]+/", "-", $string));
   return $slug;
}