<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
   
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
   
   <script>
   function validate1(f1){
	   var em=f1.email.value;
	   var items=f1.items.value;
	   var amt=f1.amt.value;
	   var filter1=/^([a-zA-Z0-9_\.\-])+(@iitk.ac.in)$/;
	   var filter2=/^[a-zA-Z]+$/;
	   var filter3=/^[0-9]+$/;
	   if(!filter1.test(em))
	   {
		   document.getElementById('id01').innerHTML='not an iitk email';
		   return false;
	   }
	   if(!filter2.test(items))
	   {
		   document.getElementById('id01').innerHTML='not valid items';
		   return false;
	   }
	   if(!filter3.test(amt))
	   {
		   document.getElementById('id01').innerHTML='not valid amount';
		   return false;
	   }
	   return true;
   }
   function validate2(f2){
	   var em=f2.email.value;
	   var rmv=f2.rmv.value;
	   var filter1=/^([a-zA-Z0-9_\.\-])+(@iitk.ac.in)$/;
	   var filter2=/^[0-9]+$/;
	   if(!filter1.test(em))
	   {
		   document.getElementById('id02').innerHTML='not an iitk email';
		   return false;
	   }
	   if(!filter2.test(rmv))
	   {
		   document.getElementById('id02').innerHTML='not valid amount';
		   return false;
	   }
	   return true;
   }
   </script>
<style>

  
  body{
	font-family: font-family: Arial, Helvetica, sans-serif;
}

 
.form-group{
	
	padding: 5px 20px 8px 20px; 
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
  <a class="active" href="amt_add_remove.php">ADD AMOUNT</a>
  <a href="admin.php">PENDING ORDERS</a>
  
  <a href="admin_profile.php">PROFILE</a>
  <a href="vendor_logout.php">LOGOUT</a>
</div>

<br>
<br>
<div class="container">
<form action="amt_update.php" name="f1" onsubmit="return validate1(f1);" method="post" class="form" style="width:60%;">
<p><h2><strong>&nbsp;&nbsp;ADD TO THE BILL</strong></h2></p>
<br>
  <div class="form-group">
    <label for="email">EMAIL:</label>
    <input type="text" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="itm">ITEM:</label>
    <input type="text" name="item" class="form-control" id="itm">
  </div>
  <div class="form-group">
    <label for="qty">QUANTITY:</label>
    <input type="number" class="form-control" name="qty" id="qty">
  </div>
  <div class="form-group">
    <label for="amt">AMOUNT:</label>
    <input type="number" class="form-control" name="amt" id="amt">
  </div>
  <div class="form-group">
  <input type="submit" name="mybutton" value="PAY" class="btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php
if(isset($_SESSION['msgdone']) and $_SESSION['row']>0)
  echo $_SESSION['msgdone'];
else if(isset($_SESSION['row']) and $_SESSION['row']===0)
	echo "no such email exists";
  unset($_SESSION['row']);
  unset($_SESSION['msgdone']);

?>
  </div>

</form>
<br><br>



<form name="f2" method="post" onsubmit="return validate2(f2);" action="remove.php">
<p><h2><strong>&nbsp;&nbsp;REMOVE FROM BILL</strong></h2></p>
<div class="form-group">
    <label for="email">EMAIL:</label>
    <input type="text" name="email" class="form-control" id="email1">
  </div>
<div class="form-group">
    <label for="rmv">AMOUNT:</label>
    <input type="number" class="form-control" name="rmv" id="rmv">
  </div>
  <div class="form-group">
  <input type="submit" name="mybutton" value="REMOVE" class="btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if(isset($_SESSION['msgdone1']) and $_SESSION['row1']>0)
  echo $_SESSION['msgdone1'];
else if(isset($_SESSION['row1']) and $_SESSION['row1']===0)
	echo "no such email exists";
  unset($_SESSION['row1']);
  unset($_SESSION['msgdone1']);

?>
</form>
<br>

<br>

</div>
</div>
</body>
</html>