<?php
session_start();
require_once 'connection.php';
$item=mysqli_real_escape_string($conn,$_POST['item']);
$qty=mysqli_real_escape_string($conn,$_POST['qty']);
$canteen=mysqli_real_escape_string($conn,$_POST['canteen']);
$sql="delete from orders where status=2 and item='$item' and quantity='$qty' and email='".$_SESSION['email']."' limit 1";
if($conn->query($sql))
{header('Location: status.php');}
else{
	echo "item not removed from plate";
}

?>