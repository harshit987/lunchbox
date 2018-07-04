<?php
session_start();

 include_once 'connection.php';
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $item=mysqli_real_escape_string($conn,$_POST['item']);
 $amt=mysqli_real_escape_string($conn,$_POST['amt']);
 $qty= mysqli_real_escape_string($conn,$_POST['qty']);;
 $status=-3;
 $uid=md5(uniqid());
 $cid='canteen'.$_SESSION['id'];
 
 $sql="select $cid,amount from amount_db where email=?";
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
	     $new=$rs[$cid]+$amt;
		 $new_total=$rs['amount']+$amt;
	     $sql1="update amount_db set $cid='$new',amount='$new_total' where email='".$email."'";
	     if($conn->query($sql1)===TRUE)
	     {$_SESSION['msgdone']="LAST TRANSACTION: amount added in $email at ".date('h:i:sa');
         $sql2="insert into orders values('$day','$time','$uid','$email','$item','$qty','$amt','-3','".$_SESSION["canteen"]."','$millisec')";
	     $result=$conn->query($sql2);
		 $conn->close();
	     header('Location: amt_add_remove.php');}
	 }
	 
 }
     
 
 


?>