<?php
session_start();
$conn=mysqli_connect("localhost","root","","thelunchbox");
  if($conn->connect_error)
	 die($conn->connect_error);
  $uid=$_POST['uid'];
  $sql="update orders set status=1 where email='".$_POST['email']."' and item='".$_POST["item"]."'and uid='".$uid."'";
  $result=$conn->query($sql);
   $result1 = $conn->query("SELECT amount FROM amount_db WHERE email ='".$_POST['email']."'");
    $rs = $result1->fetch_array(MYSQLI_ASSOC);
    $new_amt=$rs["amount"]+$_POST['amt'];
	echo $_POST['amt'];
     $sql1="UPDATE amount_db SET amount='".$new_amt."' WHERE email='".$_POST['email']."'" ;
   if($conn->query($sql1)===TRUE)
	   echo "amount added";
    header('Location:admin.php');
   
   $conn->close();
  
   
  
?>
<html>
<body>

</body>
</html>