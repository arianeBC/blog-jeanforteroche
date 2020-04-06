<?php

/**
 * 
 */
class View {
   public $html;

   public function __construct($data, $template) {
      if ( !isset($data[0]) ) {
         $this->html = $this->render($data, $template);
         return;
      }
      $html = "";
      foreach ($data as $key => $value) {
         # code...
      }
   }

   private function render($data, $template) {
      return str_replace(
         array_keys($data),
         $data,
         file_get_contents("templates/$template.html")
      );
   }

}

// [
//   [
//     "{{contenu }}"=>"un contenu très intéressant",
//     "{{ titre }}"=>"un nouvel article"
//   ],
//   [
//     "{{contenu }}"=>"un contenu très intéressant",
//     "{{ titre }}"=>"un nouvel article"
//   ]
// ]
