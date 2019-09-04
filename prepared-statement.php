<?php 

include "connect.php";

/*
$stmt = $db->prepare("SELECT * FROM names WHERE  firstname like ?"); firstname = ? (question mark)  
$stmt->bindValue(1,'%e%');//'Maria' in place of %e%, PDO::PARAM_STR  Nu afiseaza tabelul, nu imi dau seama de ce.
*/
/*
$stmt = $db->prepare("SELECT * FROM names WHERE id = ? && firstname = ?"); //firstname = ? (question mark)  
$stmt->bindValue(1,'2');
$stmt->bindValue(2,'Ion'); //selecteaza randul lui Ion
*/
/*
$stmt = $db->prepare("SELECT * FROM names WHERE firstname = ?"); 
$name = 'Maria';
$stmt->bindParam(1,$name); //selecteaza randul mariei
*/
/*
$stmt = $db->prepare("SELECT * FROM names WHERE id = ? && firstname = ?"); 
$id = 3;
$name = 'Andreea';
$stmt->bindParam(1,$id);
$stmt->bindParam(2,$name);
*/

$stmt = $db->prepare("SELECT * FROM names WHERE firstname = ?"); 
$names = array('Maria','Ion','Andreea','Andy');
foreach($names as $name) {
$stmt->bindParam(1,$name);

$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {//FETCH_NUM, FETCH_BOTH
		//var_dump(array_keys($row));
		$firstname = htmlentities($row['firstname']);
		$lastname = htmlentities($row['lastname']);
		$postcode = htmlentities($row['postcode']);
		echo $firstname." ".$lastname." ".$postcode."<br>";
	}

}
 
 ?>