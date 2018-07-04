<?php
session_start();
require 'connection.php';
$item=mysqli_real_escape_string($conn,$_POST['item']);
$canteen=$_SESSION['canteen'];
$p_idx='p'.$_SESSION['id'];
$price=mysqli_real_escape_string($conn,$_POST['price']);
if($_POST['change']==='ADD IN THE MENU'){
$query="select * from food_list where name='$item'";
$result=$conn->query($query);
echo $result->num_rows;
if($result->num_rows>0){
	$rs=$result->fetch_array(MYSQLI_ASSOC);
	if($rs[$p_idx]==='0')
	{$sql="update food_list set $p_idx='$price' where name='$item'";
     if(!$conn->query($sql))
	 {echo "failed to update price";
      echo '<a href="admin_profile.php">Go to previous page</a>';}
     else{
		 header('Location: admin_profile.php');
	 }
	 }
	 else{
	echo "item already exists, you can update it's price.";
    echo '<a href="admin_profile.php">Go to previous page</a>';}
}
else{
$sql1="insert into food_list(name,$p_idx) values('$item','$price')";
if(!$conn->query($sql1))
{
	echo "Failed to add in the menu";
}
else{
	
	header('Location: admin_profile.php');
}
}
}
else if($_POST['change']==='UPDATE PRICE')
{
	$sql="update food_list set $p_idx='$price' where name='$item'";
	if(!$conn->query($sql))
   {
	echo "Failed to update price";
   }
   else{
	 header('Location: admin_profile.php');
   }
}


?>
