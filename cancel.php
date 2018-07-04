<?php
require_once 'connection.php';
$email=mysqli_real_escape_string($conn,$_POST['email1']);
$uid=mysqli_real_escape_string($conn,$_POST['uid1']);
$item=mysqli_real_escape_string($conn,$_POST['item1']);
$qty=mysqli_real_escape_string($conn,$_POST['qty1']);
$sql="update orders set status='-4' where email='$email' and uid='$uid' and item='$item' and quantity=$qty limit 1";
if(!$conn->query($sql))
{
	echo "Not Cancelled   ".$conn->error;
	echo '<br><a href="admin.php">Go back to previous page!</a>';
}
else{
	header('Location: admin.php');
}
?>