<?php
class Sanitize{
   public static function sanitizeData($inputData){
       $remove = array(
           '\'',
           '"',
           '?',
           '*',
           '=',
           '!',
           '$',
           '%',
           '~',
           '`',
           '^',
           '&',
           '|',
           '/',
           ';',
           ':'
       );
       return str_replace($remove, '', htmlspecialchars(strip_tags(trim($inputData))));
   }
}
?>