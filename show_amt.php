<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "hall12";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$v1=$_POST["ROLL_NO"];
$sql="SELECT AMOUNT FROM canteen WHERE ROLL_NO =$v1";
$result=$conn->query($sql);
if ($result == TRUE) {
	  echo "this is your ammount: ";
      $rs=mysqli_fetch_row($result);
      echo "$rs[0]";
} else {
    echo "Error in showing amount: " . $conn->error;
}
$conn->close();
?>