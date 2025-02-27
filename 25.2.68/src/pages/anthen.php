<?php 
   session_start();
   include '../../../api/config.php';
   // require_once('../api/config.php');

   $uri = $_SERVER['REQUEST_URI'];  
   $array = explode('/', $uri);
   //print_r($array);
   $key = array_search("pages", $array);
   $name = $array[$key + 1];

   // {
   //    header('Location: ../../user/index.html');  
   // }
?>