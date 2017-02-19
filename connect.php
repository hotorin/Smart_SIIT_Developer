<?php

$db = new mysqli('localhost','root','','senior_project');
$db->query('SET NAMES UTF8');

   if($db->connect_errno){
      echo $db->connect_errno.": ".$db->connect_error;
   }
 ?>
