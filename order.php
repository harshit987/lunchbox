<?php 
session_start();
?>
<?php
include_once 'connection.php';

$email=mysqli_real_escape_string($conn,$_SESSION["email"]);
$qt=mysqli_real_escape_string($conn,$_POST['qty']);
$amt=mysqli_real_escape_string($conn,$_POST['amount']);
$item=mysqli_real_escape_string($conn,$_POST['item']);
$canteen=mysqli_real_escape_string($conn,$_POST['canteen']);
$id=mysqli_real_escape_string($conn,$_POST['cid']);
$p_idx="p".$id;
if(!isset($_SESSION['uid'])){
$_SESSION['uid']=uniqid();
}


$_SESSION['item']=$item;
date_default_timezone_set("Asia/Kolkata");
$time=date('h:i:sa');
$day=date('l');
$millisec=date('U');
$uid=md5(uniqid());
$sql="select $p_idx from food_list where name='$item'";
$res=$conn->query($sql);
$row=$res->fetch_array(MYSQLI_ASSOC);
if($row[$p_idx]*$qt==$amt)
{
	$sql="insert into orders(day,date,uid,email,item,quantity,amount,status,canteen,millisec) values('$day','$time','".$_SESSION['uid']."','$email','$item','$qt','$amt',2,'$canteen','$millisec')";
    if(!$conn->query($sql))
		echo "failed";
	else
	   echo "inserted";
	}
	header('Location: ordernow.php');
?>

