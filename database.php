<?php
/*
    PHP and MySQL tutorial
    https://parzibyte.me/blog/en

*/
$password = "";
$user = "root";
$databaseName = "mysql_tutorial";
try{
	$database = new PDO('mysql:host=localhost;dbname=' . $databaseName, $user, $password);
}catch(Exception $e){
	echo "Error connecting to db: " . $e->getMessage();
}
?>