<?php
session_start();
/*Check whether the user is same or not and whether it is user or vendor.*/
require_once 'connection.php';
date_default_timezone_set("Asia/Kolkata");
$day=date('l');
$time=date('h:i:sa');
$millisec=date('U');
$sql="update orders set status=0,day='$day',date='$time',millisec='$millisec' where uid='".$_SESSION['uid']."' and email='".$_SESSION['email']."' and status=2";
if(!$conn->query($sql))
{
	echo "failed to place order";
}
else
{
	unset($_SESSION['uid']);
	header('Location: user.php');
}
?>