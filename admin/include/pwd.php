<?php 
$db = new PDO("mysql:host=localhost;dbname=bd;charset=utf8","root","root");


echo password_hash("password",PASSWORD_DEFAULT);

?>