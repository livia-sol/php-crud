<?php 
//udemy - curs pdo crud - richard Stibbard's

try {
	$db = new PDO('mysql:host=localhost;dbname=crudpdo;charset=utf8','root','');
//var_dump($db);
}
catch(Exception $e) {
	//echo "An error has occured";
	echo $e->getMessage();
}

 ?>