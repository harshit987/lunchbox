<?php 
session_start();
if(!isset($_SESSION['email']) or $_SESSION["email"]!=='rajkumar@iitk.ac.in')
{header("Location: profile.php");}
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
.avatar {
    vertical-align: middle;
    width: 250px;
    height: 250px;
    border-radius: 50%;
	margin:0px 30px 12px 3px;
}
 .data{
	 height: 40px;
	 
	 margin: auto ;
	 
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
  <a  href="amt_add_remove.php">ADD AMOUNT</a>
  <a href="admin.php">PENDING ORDERS</a>
  
  <a class="active" href="admin_profile.php">PROFILE</a>
  <a href="logout.php">LOGOUT</a>
  
</div>

<div class="container">

<br>
<br>
<img src="<?php echo $_SESSION['email'];?>" class="avatar" alt="avatar" align="left">
<form style="margin:auto;" action="upload_photo1.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" value="upload/change">
</form>
<br>
<p class="data"><strong class="text-info"><?php
 echo "Vendor Name: ".$_SESSION['email'];
 ?></strong></p><br><br><br><br><br><br><br><br><br><br><br><br>
 <h2>ADD FOOD IN THE MENU:</h2>
 <form action="add_food.php" method="post">
  <div class="form-group">
    <label for="itm">ITEM:</label>
    <input type="text" name="item" class="form-control" id="itm">
  </div>
  <div class="form-group">
    <label for="pr">Price:</label>
    <input type="number" class="form-control" name="price" id="pr">
  </div>
  <input type="submit" class="btn btn-default" name="change" value="ADD IN THE MENU">
  <input type="submit" class="btn btn-default" name="change" value="UPDATE PRICE">
  </form>
<br><br><br>
 </div>
<script>

</script>
</body>
</html>
