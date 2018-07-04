<?php
session_start();
$conn=mysqli_connect("localhost","root","","thelunchbox");
  if($conn->connect_error)
	 die($conn->connect_error);
  $uid=$_POST['uid'];
  echo $uid;
  $p_idx="canteen".$_SESSION['id'];
  $sql="update orders set status='1' where status <> '1' and email='".$_POST['email']."' and item='".$_POST["item"]."'and uid='".$uid."' and quantity='".$_POST['qty']."' and canteen='".$_SESSION['canteen']."' limit 1";
  if(!$result=$conn->query($sql)){echo "failed".$conn->error; echo "1";}
   $result1 = $conn->query("SELECT amount,$p_idx FROM amount_db WHERE email ='".$_POST['email']."'");
    $rs = $result1->fetch_array(MYSQLI_ASSOC);
    $new_amt=$rs["amount"]+$_POST['amount'];
	echo $new_amt;
	$new_pidx=$rs[$p_idx]+$_POST['amount'];
	echo $new_pidx;
	echo $_SESSION['id'];
	echo $p_idx;
     $sql1="UPDATE amount_db SET amount='$new_amt',$p_idx='$new_pidx' WHERE email='".$_POST['email']."'" ;
   if($conn->query($sql1)===TRUE)
   {  echo "amount added";}
 header('Location:admin.php');
  
   $conn->close();
  
   
  
?>
<html>
<body>

</body>
</html>