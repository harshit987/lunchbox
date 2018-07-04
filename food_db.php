<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "thelunchbox");
$res=$conn->query("select * from canteens where status <> -1");
$i=1;
while($rs=$res->fetch_array(MYSQLI_ASSOC)){
	$obj1[$i]=$rs['id'];
	$i++;
}
$result = $conn->query("SELECT * FROM food_list");
$result2 = $conn->query("SELECT * FROM canteens where status <> -1");
$cnt = mysqli_num_rows($result2);
$output=[];
$output2=[];

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$lstp=100000;
	for($i=1;$i<=$cnt;$i++){
		$x='p'.$obj1[$i];
		if($rs[$x]!=0)
		if($lstp > $rs[$x])
		$lstp = $rs[$x];
	}

   $obj['name']=$rs['name'];
   $obj['price']=$lstp;
   $obj['category']=$rs['category'];
   for($i=1;$i<=$cnt;$i++){
		$x='p'.$obj1[$i];
		$obj[$x]=$rs[$x];

	}
   array_push($output,$obj);
}
$result1['records']=$output;
$cnt=1;
while($rs2 = $result2->fetch_array(MYSQLI_ASSOC)) {
	$obj2['id']=$rs2['id'];
	$obj2['fid']='p'.$rs2["id"];
	$obj2['name']=$rs2['name'];
	$obj2['status']=$rs2['status'];
	$cnt++;
	array_push($output2,$obj2);
}
$conn->close();
$result1['records2']=$output2;
echo(json_encode($result1));

?>
