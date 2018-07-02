<?php 
session_start();

if(!isset($_SESSION['email']) or $_SESSION["email"]==='rajkumar@iitk.ac.in')
{header("Location: admin_profile.php");}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
 .data{
	 height: 40px;
	 padding: 20px;
	 margin: 100px auto ;
	 
 }

.topnav {
  overflow: hidden;
 background-color: #1ac6ff;
  z-index: 1;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  color: black;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
 

<div id="main">

<div class="w3-teal">
  
  <div class="w3-container">
    <h1>THE LUNCH BOX</h1>
  </div>
</div>
<div class="topnav">
  <a href="user.php">TODAY</a>
  <a href="ordernow.php">ADD TO PLATE</a>
  <a href="Status.php">MY PLATE</a>
  <a class="active" href="profile.php">PROFILE</a>
  <a href="logout.php">LOGOUT</a>
</div>
<div class="container">
<br>
<?php
require_once 'connection.php';
if(file_exists($_SESSION['email']))
{
	echo '<img height="150px" width="150px" src="'.$_SESSION['email'].'">';
}
  
  if($conn->connect_error)
	 die($conn->connect_error);
 $result1 = $conn->query("SELECT amount FROM amount_db WHERE email ='".$_SESSION['email']."'");
    $rs = $result1->fetch_array(MYSQLI_ASSOC);
?>
<form style="margin:auto;" action="upload_photo1.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" value="upload/change">
</form>

</div>

<script>

</script>
</body>
</html>