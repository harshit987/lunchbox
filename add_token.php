<?php
include_once 'connection.php';
$email=mysqli_real_escape_string($conn,$_POST['email']);
$token=mysqli_real_escape_string($conn,$_POST['email']);
$date=date("y/m/d");
$time=date("h:i:sa")

$sql="insert into token values(?,?,?,?)"
if(!$stmt=$conn->prepare($sql))
{
	echo "sql not prepared";
}
else{
	if(!$stmt->bind_param("siss",$email,$token,$date,$time))
	{
		echo "binding failed";
	}else
	{
	  if(!$stmt->execute())
	  {
		echo "sql not executed";
	  }
	  else{
	
	    echo "token given to you";
	    $stmt->close();
	 }
	}
	
}
$conn->close();

?>