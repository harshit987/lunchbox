<?php
 session_start();
 header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 $conn=mysqli_connect("localhost","root","","thelunchbox");
  if($conn->connect_error)
	 die($conn->connect_error);
  date_default_timezone_set("Asia/Kolkata");
  $day=date('l');
  $sql1="select * from orders where email='".$_SESSION['email']."' and day='".$day."' and status='-2' order by date DESC";
  $result1=$conn->query($sql1);
  $sql2="select * from orders where email='".$_SESSION['email']."' and day='".$day."' and status <> '2'  order by date DESC";
  $result2=$conn->query($sql2);
   if($conn->query($sql1)===FALSE or $conn->query($sql2)===FALSE)
   {
	die($conn->error);
   }


$recordsArray1 = [];
$recordsArray2=[];
$i=1;
while($rs = $result1->fetch_array(MYSQLI_ASSOC)){
	    $obj1['id']=$i;
		if($rs['item']===""){
		$obj1['amt']=$rs['amount'];
		$obj1['time']=$rs['date'];
		array_push($recordsArray1,$obj1);
		$i++;}
		
}
$output['records1'] = $recordsArray1;
$i=1;
while($rs = $result2->fetch_array(MYSQLI_ASSOC)){
	    $obj2['id']=$i;
		if($rs['item']!=""){
		$obj2['item'] = $rs['item'];
		$obj2['qty']=$rs['quantity'];
		$obj2['amt']=$rs['amount'];
		$obj2['time']=$rs['date'];
		if($rs['status']==='0'){
	    $obj2['status']="pending";
		$obj2['way']="room";
		}
	    else if($rs['status']==='1'){ $obj2['status']="confirmed";
		  $obj2['way']="device";
		}
        else if($rs['status']==='-3')
		{
			$obj2['status']="confirmed";
			$obj2['way']="offline";
		}
		array_push($recordsArray2,$obj2);
		$i++;}
}
$output['records2'] = $recordsArray2;
$conn->close();

echo(json_encode($output));
?>