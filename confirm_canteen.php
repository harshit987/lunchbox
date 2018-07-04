<?php
/*session_start();
if(!(isset($SESSION['email']))){
	header('location : login.html');
}
if($_SESSION['email']!='admin'){
	echo "INVALID REQUEST";
}*/
if(($_SERVER['REQUEST_METHOD']=='POST')&&(isset($_POST['cid']))&&isset($_POST['decision'])){
	$host='localhost';
	$user='root';
	$pwd='';
	$db='thelunchbox';
	$con=mysqli_connect($host,$user,$pwd,$db) or die("Unable to connect".mysqli_connect_error());
	$cid=$_POST['cid'];
	//echo "$cid";
	$decision=$_POST['decision'];
	$col='p'."$cid";
	$col1='canteen'."$cid";
	//echo "$col";
	$sql1="UPDATE canteens set status=0 where id='$cid' ";
	$sql2="ALTER TABLE food_list ADD $col int(5) default 0 ";
	$sql4="ALTER TABLE amount_db ADD $col1 int(5) default 0";
	$sql3="DELETE FROM canteens where id='$cid'";
	if($decision){
		if(!(mysqli_query($con,$sql1))){
			echo "error".mysqli_error($con);
		}
		if(!(mysqli_query($con,$sql2))){
			echo "error".mysqli_error($con);
		}
		if(!(mysqli_query($con,$sql4))){
			echo "error".mysqli_error($con);
		}
		else{
			$msg="your canteen has been accepted by admin. you can login now and add your menu in food list";
		}
	}
	else{
		if(!(mysqli_query($con,$sql3))){
			echo "error";
		}
		else{
			$msg="Admin has rejected ur proposal";
		}
	}
header('location: third_party.php');
}
else{
header('location: login.html');
}

?>