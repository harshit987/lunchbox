<?php
session_start();
require_once 'connection.php';
$sql="select email,amount from amount_db";
$result=$conn->query($sql);
$objectArr=[];
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
	$obj['email']=$row['email'];
	$obj['amount']=$row['amount'];
	array_push($objectArr,$obj);
}

echo json_encode($objectArr);












?>