<?php

define('DB_NAME', 'quizzer');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
     exit();
}

 ?> 
