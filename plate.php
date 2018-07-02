<?php 
session_start();
$email=$_SESSION['email'];
include_once 'connection.php';

$sql="select * from orders where email='$email' and status='2'";
$result=$conn->query($sql);
$arr=[];
$i=1;
while($res=$result->fetch_array(MYSQLI_ASSOC))
{
	$obj['id']=$i;
	$obj['uid']=$_SESSION['uid'];
	$obj['item']=$res['item'];
	$obj['qty']=$res['quantity'];
	$obj['amt']=$res['amount'];
	$obj['canteen']=$res['canteen'];
	$i++;
	array_push($arr,$obj);
}
$result1['orders']=$arr;
echo json_encode($arr);
?>



