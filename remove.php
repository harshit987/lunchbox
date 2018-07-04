<?php 
session_start();
$conn=mysqli_connect("localhost","root","","thelunchbox");
 if($conn->connect_error)
	 die($conn->connect_error);
 $email=$_POST['email'];
 $cid="canteen".$_SESSION['id'];
 $amt=$_POST['rmv'];
 $uid=md5(uniqid());
 $sql="select $cid,amount from amount_db where email='".$email."'";

 
     $result=$conn->query($sql);
	 $_SESSION['row1']=$result->num_rows;
	 date_default_timezone_set("Asia/Kolkata"); 
	 $rs = $result->fetch_array(MYSQLI_ASSOC);
	 $new=$rs[$cid]-$amt;
	 $new_total=$rs['amount']-$amt;
	 $sql1="update amount_db set $cid='$new',amount='$new_total' where email='".$email."'";
	 if($conn->query($sql1)===TRUE)
	 {$_SESSION['msgdone1']="LAST TRANSACTION: amount removed in $email at ".date('h:i:sa');
      $sql2="insert into orders values('".date('l')."','".date('h:i:sa')."','$uid','$email','$item','$qt','$amt','-2','".$_SESSION["hall"]."')";
	  $result=$conn->query($sql2);
	 header('Location: amt_add_remove.php');}
 
 
$conn->close();

?>