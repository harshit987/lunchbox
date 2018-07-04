<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "thelunchbox");

$result = $conn->query("SELECT * FROM canteens where status =-1");
//$cnt = mysqli_num_rows($result);


$output=[];
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	$obj['uniqueid']=$rs['uniqueid'];
	$obj['id']=$rs['id'];
   $obj['name']=$rs['name'];
   $obj['vendor']=$rs['vendor'];
   $obj['vendor_name']=$rs['vendor_name'];
   $obj['vendor_phone']=$rs['vendor_phone'];
   array_push($output,$obj);
}
$conn->close();
$result1['records']=$output;
echo(json_encode($result1));

?>
