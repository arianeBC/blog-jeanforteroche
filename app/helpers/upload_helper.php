<?php
   function uploadImage() {
      $imagename = $_FILES["image"]["name"];
      $imagetmp  = $_FILES["image"]["tmp_name"];
      $allowed   = array("jpeg", "jpg", "png");
      $ext       = mb_strtolower(pathinfo($imagename, PATHINFO_EXTENSION));

      if(in_array($ext, $allowed)) {
         move_uploaded_file($imagetmp, "public/images/".$imagename);
      }
      return $imagename;
   }