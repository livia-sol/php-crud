<?php 

include "connect.php";

$stmt = $db->query("SELECT * FROM names");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_NUM -->for numeric key

foreach ($results as $row) {
	// $firstname = htmlentities($row['1']);
	// $lastname = htmlentities($row['2']);
	// $postcode = htmlentities($row['3']);
	$firstname = htmlentities($row['firstname']);
	$lastname = htmlentities($row['lastname']);
	$postcode = htmlentities($row['postcode']);
	echo $firstname." ".$lastname." ".$postcode."<br>";
}

 ?>