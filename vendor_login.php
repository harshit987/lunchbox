<?php
 session_start();
 if(!isset($_POST["email"]) or !isset($_POST["psw"]))
 {
	 header("Location: vendor_login.html");
 }
	 
 $email = $_POST["email"];
 $psw = md5($_POST["psw"]);
  
  include_once 'connection.php';
 
  $flag=0;
  $sql="select vendor,pass,name,id,vendor_name,vendor_phone from canteens where status <> -1";
  $result=$conn->query($sql);
   if($conn->query($sql)===FALSE)
	 die($conn->error);
   if($result->num_rows>0)
   {
     while($row=mysqli_fetch_assoc($result))
      {

	     if($row["vendor"]== $email and $row["pass"]==$psw)
	    {
			$sql1="update canteens set status='1' where name='".$row['name']."'";
			$conn->query($sql1);
			echo "1";
			$flag=1;
		   $_SESSION["email"]=$email;
           $_SESSION["psw"]=$psw;
		   $_SESSION['canteen']=$row['name'];
		   $_SESSION['vendor']=$row['vendor_name'];
		   $_SESSION['vendor_phone']=$row['vendor_phone'];
		   $_SESSION['id']=$row['id'];
		   header('Location: amt_add_remove.php');
	     }
	  
      }
	  
   }
  if($flag===0)
	 header('Location:vendor_login.html');
  $conn->close();


?>