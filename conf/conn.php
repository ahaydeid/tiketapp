<?php

$server = 'localhost';
$database = 'dbtiket';
$user = 'root';
$pass = '';
$mysqli = new mysqli ($server,$user,$pass,$database);
$mysqli->select_db($database);
?>