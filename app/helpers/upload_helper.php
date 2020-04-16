<?php
   function uploadImage() {

      $imagename = $_FILES["image"]["name"];
      $imagetmp  = $_FILES["image"]["tmp_name"];
      $target_file = ROOT."/public/images/".$imagename;
      $allowed   = array("jpeg", "jpg", "png");
      $ext       = mb_strtolower(pathinfo($imagename, PATHINFO_EXTENSION));

      if(in_array($ext, $allowed)) {
         move_uploaded_file($imagetmp,  $target_file);
      }
      return $imagename;

   }