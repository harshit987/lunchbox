<?php 
session_start();
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

.card-body {
	height:35px;
	border-radius:50px;
	z-index:1;
	 box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1), 0 5px 5px 0 rgba(0, 0, 0, 0.1);
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
    



    <div class="card" style="width:75%;margin:auto;" ng-repeat="x in names2">
	<div class="card-body">
	<pre class="bg-info" style="font-family:'Courier New', Courier, monospace;"><strong class="text-info">{{x.item}}   quantity: {{x.qty}} </strong>      <small>ordered at <strong>{{x.time}}</strong> from <strong class="txt-danger">{{x.way}}</strong></small>
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