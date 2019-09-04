<?php 

include "connect.php";

$stmt = $db->prepare("SELECT * FROM names WHERE firstname = :firstname"); 
//$names = array('Maria','Ion','Andreea','Andy');
$name = 'Andy';
//foreach($names as $name) {
$stmt->bindValue(':firstname','Andy',PDO::PARAM_STR);

$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {//FETCH_NUM, FETCH_BOTH
		//var_dump(array_keys($row));
		$firstname = htmlentities($row['firstname']);
		$lastname = htmlentities($row['lastname']);
		$postcode = htmlentities($row['postcode']);
		echo $firstname." ".$lastname." ".$postcode."<br>";
	}
//}

 ?>