<?php 
require_once 'connection.php'; 
$result3=$conn->query("select max(id) as 'max' from food_list");
$rs=$result3->fetch_array(MYSQLI_ASSOC);
echo $rs['max'];
?>