<?php 

include 'connect.php';

//$stmt = $db->prepare("INSERT INTO names (firstname, lastname, postcode) VALUES (?, ?, ?, ?)");
$stmt = $db->prepare("DELETE FROM names WHERE firstname = :firstname");
// $stmt->bindValue(1,'Maria');
// $stmt->bindValue(2,'Andreea');
// $stmt->bindValue(3,'Andy');
$stmt->bindValue(':firstname','Ion');
//$stmt->bindValue(':lastname','Loghin');
//$stmt->bindValue(':postcode','333444');
$stmt->execute();

?>