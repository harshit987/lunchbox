<?php
session_start();
$_SESSION['canteen']='hall-1';
 include_once 'connection.php';
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $item=mysqli_real_escape_string($conn,$_POST['item']);
 $amt=mysqli_real_escape_string($conn,$_POST['amt']);
 $qty= mysqli_real_escape_string($conn,$_POST['qty']);;
 $status=-3;
 $uid=md5(uniqid());
 $sql="select amount from amount_db where email=?";
  if(!$stmt=$conn->prepare($sql)){
	  echo "prepare failed: (".$mysqli->errno . ") ".$mysqli->error;
  }
 else{
	 if(!$stmt->bind_param("s",$email)){
		 echo "binding failed".$stmt.error;
	 }
	 else{ 
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $stmt->close();
	     $_SESSION['row']=$result->num_rows;
	     date_default_timezone_set("Asia/Kolkata"); 
	     $rs = $result->fetch_array(MYSQLI_ASSOC);
		 $day=date('l');
		 $time=date('h:i:sa');
		 $millisec=date('U');
	     $new=$rs['amount']+$amt;
	     $sql1="update amount_db set amount='".$new."' where email='".$email."'";
	     if($conn->query($sql1)===TRUE)
	     {$_SESSION['msgdone']="LAST TRANSACTION: amount added in $email at ".date('h:i:sa');
         $sql2="insert into orders values('$day','$time','$uid','$email','$item','$qty','$amt','-3','".$_SESSION["canteen"]."','$millisec')";
	     $result=$conn->query($sql2);
		 $conn->close();
	     header('Location: amt_add_remove.php');}
	 }
	 
 }
     
 
 


?>