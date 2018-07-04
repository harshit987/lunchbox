<?php
require_once 'connection.php';

$sql="select * from image";
$result=$conn->query($sql);
while($row= $result->fetch_assoc())
{	
	echo '<img src="data:image/jpg;base64,'.base64_encode($row["image"]).'">';   
}
$conn->close();


?>