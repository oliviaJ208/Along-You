<?php
$db_host ="localhost";
$db_user ="root";
$db_password="";
$db_name="newalongu";
$db_port= 3306;
// create connection
$conn=new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);
// checking connectin
return $conn;
?>