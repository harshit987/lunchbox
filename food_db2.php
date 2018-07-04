<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "thelunchbox");

$result = $conn->query("SELECT * FROM food_list");

$output=[];
$i=1;
$column_no = mysqli_num_fields($result);
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
   $obj['name']=$rs['name'];
   $obj['category']=$rs['category'];
   while($i<=$column_no-3)
   {
	   $p_idx="p".$i;
	   $obj[$p_idx]=$rs[$p_idx];
	   $i++;
   }
   array_push($output,$obj);
}
$result1['records']=$output;
$conn->close();
echo(json_encode($result1));

?>
