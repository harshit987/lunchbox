<?php 
session_start();
if(!isset($_SESSION['email']) or $_SESSION["email"]==='rajkumar@iitk.ac.in')
{header("Location: login.html");}
//$email=$_SESSION["email"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<style>
body{
	font-family: font-family: Arial, Helvetica, sans-serif;
}
#id11{
	width:0px;
	height:0px;
	visibilty: hidden;
}
 
.card-body {
	height:35px;
	border-radius:50px;
	z-index:1;
	 box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1), 0 5px 5px 0 rgba(0, 0, 0, 0.1);
}
 
 .form{
  position: relative;
   width: 40%;
  z-index: 1;
  background: white;
  
  margin: 50px auto 100px;
  padding: 45px;
  text-align: left;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
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
.form input[type=submit]{
 cursor : pointer;
 border-radius: 4px;
 background-color:#4CAF50;
 text-align: center;
}
input[type=submit]:hover{
background-color: #45a049;
}
/* input modal */
.container input[type=text]{
	margin: 15px 15% 5px 15%;
	max-width: 300px;
	text-align: center;
}
 
 .container input[type=number]
 {
	 margin: 15px 15% 5px 15%;
	max-width: 300px;
	text-align: center;
 }
 
 .container input[type=submit],cancelbtn
 {
	  margin: 15px 20px 5px 15%;
	  text-align: center;
	  max-width: 300px;
 }
/* The Modal (background) */
.modal {
	dispaly: auto;
	position:fixed;
	z-index: 1;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0,0,0);
	background-color: rgb(0,0,0,0.4);
	padding-top: 120px;
}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}
/* The cancel Button (x) */
/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
 
 

<div id="main">

<div class="w3-teal">
  <div class="w3-container">
    <h1>THE LUNCH BOX</h1>
  </div>
</div>
 <div class="topnav">
  <a class="active" href="user.php">TODAY</a>
  <a href="ordernow.php">ADD TO PLATE</a>
  <a href="status.php">MY PLATE</a>
  <a href="profile.php">PROFILE</a>
  <a href="logout.php">LOGOUT</a>
</div>
<div class="container">
<?php
$_SESSION['email']='hakumar@iitk.ac.in';
$conn=mysqli_connect("localhost","root","","thelunchbox");
  if($conn->connect_error)
	 die($conn->connect_error);
 $result1 = $conn->query("SELECT amount FROM amount_db WHERE email ='".$_SESSION['email']."'");
    $rs = $result1->fetch_array(MYSQLI_ASSOC);
 ?><br><br>
<p align="center" style="font-size:30px;" class="text-info"><small>GRAND TOTAL--> </small><code><strong><?php echo $rs['amount']."/-"; ?></strong></code></span>
<br><br>
<div ng-app="myApp" ng-controller="customersCtrl">

    <div class="card" style="width:50%;margin:auto;" ng-repeat="x in names1">
	<div class="card-body">
	<pre class="bg-info" style="font-family:'Courier New', Courier, monospace;"> <strong class="text-danger">Amount {{x.amt}} removed at</strong> <small><strong>{{x.time}}</strong></small>
	 </pre>
	</div>
	
	<br>
    </div>
    



    <div class="card" style="width:50%;margin:auto;" ng-repeat="x in names2">
	<div class="card-body">
	<pre class="bg-info" style="font-family:'Courier New', Courier, monospace;"><strong class="text-info">{{x.item}}   quantity: {{x.qty}} </strong>      <small>ordered at <strong>{{x.time}}</strong> from <strong>{{x.way}}</strong></small>
<strong class="text-danger">amount : {{x.amt}}/-</str>              <small><strong>STATUS: <kbd>{{x.status}}</kbd></strong></small>
    </pre></div>
	
	<br>
    </div>
	<p align="center" ng-show="names2.length == 0">you have bought nothing today till now!</p>
    

</div>
</div>
 <script>
var app = angular.module('myApp', []);
app.controller('customersCtrl',function($scope, $http) {
	$http.get("daily.php")
   .then(function (response) {$scope.names1 = response.data.records1;$scope.names2=response.data.records2;});
   $scope.getdata= function() {$http.get("daily.php")
   .then(function (response) {$scope.names1 = response.data.records1;$scope.names2=response.data.records2;});};
   setInterval($scope.getdata,5000);
   
});
</script>
<script>

</script>
</body>
</html>