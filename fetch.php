<?php 

include "connect.php";

$stmt = $db->query("SELECT * FROM names");
// while ($row = $stmt->fetch()) {
// 	//echo htmlentities($row['firstname'])." ".htmlentities($row['lastname'])." ".htmlentities($row['postcode'])."<br>";
// 	echo "<pre>".var_dump($row)."</pre>";
// }
echo "<br><br>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {//FETCH_NUM, FETCH_BOTH
	echo "<pre>".var_dump($row)."</pre>";
}

 ?>