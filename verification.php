<?php




if(($_SERVER['REQUEST_METHOD']=='GET')&&(isset($_GET['uid']))){
	include_once 'connection.php';
	$id=$_GET['uid'];
	
	$sql="SELECT email from users where uniqueid='$id'";
	$result =mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($result);
	if((mysqli_num_rows($result)>0)){
		$sql2="UPDATE users SET active=1 Where uniqueid='$id'";
		if(mysqli_query($conn,$sql2)){
			$sql3="insert into amount_db(email,amount) values('".$row[0]."',0)";
			mysqli_query($conn,$sql3);
			echo "Account has been Activated"."<br>";
			echo "<a href='login.html'>Login</a>";
		}
	}
	else{
		echo "INVALID REQUEST";
		echo "<br>"."<a href='registration.html'>REGISTER</a>";
	}
}
?>