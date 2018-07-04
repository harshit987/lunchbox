<?php

 session_start();
 header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 $conn=mysqli_connect("localhost","root","","thelunchbox");
  if($conn->connect_error)
	 die($conn->connect_error);
  
  $sql="select * from orders where status=0 and canteen='".$_SESSION['canteen']."' order by millisec ASC,uid";/*add condition for each canteen*/
  $result=$conn->query($sql);
   if($conn->query($sql)===FALSE)
   {
	die($conn->error);
   }




$result1=[];
$final=[];
if($result->num_rows===0){
 die();	
}
else{
$rs=$result->fetch_array(MYSQLI_ASSOC);
$prev_uid=$rs['uid'];
$obj['item']=$rs['item'];
$obj['qty']=$rs['quantity'];
$obj['amt']=$rs['amount'];
$obj['canteen']=$rs['canteen'];
$obj['email']=$rs['email'];
$obj['uid']=$rs['uid'];
if($result->num_rows===1){
	array_push($result1,$obj);
	array_push($final,$result1);
}
else{
array_push($result1,$obj);

while($rs = $result->fetch_array(MYSQLI_ASSOC)){
		
	
        $obj['item']=$rs['item'];
	    $obj['qty']=$rs['quantity'];
	    $obj['amt']=$rs['amount'];
	    $obj['canteen']=$rs['canteen'];
		$obj['uid']=$rs['uid'];
		$obj['email']=$rs['email'];
	   
		if($prev_uid!==$rs['uid']){
	array_push($final,$result1);
	$result1=[];
	array_push($result1,$obj);
	$prev_uid=$rs['uid'];
	
	}
	else{
		 array_push($result1,$obj);
	}
	
	
}
array_push($final,$result1);
}
echo json_encode($final);
$conn->close();
}
?>
  
