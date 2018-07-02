<?php 
session_start();
if(!isset($_SESSION['email']) or $_SESSION["email"]==='rajkumar@iitk.ac.in')
{header("Location: login.html");}
//$email=$_SESSION["email"];
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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <style>
  .container{
	 background-color: rgb(0,15,0,0.8); 
	 letter-spacing: 2px;
	 z-index:10;
	 box-shadow: 10px 10px 20px 0 rgba(0, 0, 0, 0.1), 10px 10px 10px 10px rgba(0, 0, 0, 0.1);
  }
  .table,p,h2{
	  color:white;
	  letter-spacing: 2px;
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
  <a class="active" href="status.php">MY PLATE</a>
  <a href="profile.php">PROFILE</a>
  <a href="logout.php">LOGOUT</a>
</div>
<br><br><br>
<div class="container" >

<div ng-app="myapp" ng-controller="ctrl">
<strong><h2><p ng-show="plate.length != 0">CURRENT ORDER:</p></h2></strong><br><br>
<table class="table" ng-show="plate.length != 0">
<tr>
<th>ID</th>
<th>Item</th>
<th>Quantity</th>
<th>Canteen</th>
<th>Price</th>
<th>Remove?</th>
</tr>
<tr ng-repeat="x in plate" class="tr">
<td>{{x.id}}</td>
<td>{{x.item}}</td>
<td>{{x.qty}}</td>
<td>{{x.canteen}}</td>
<td>&nbsp;&nbsp;{{x.amt}}</td>
<td><button ng-click="remove_from_plate(x.id)" class="btn-danger">&times;</button></td>
</tr>
</table>
<p ng-show="plate.length != 0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total: {{total}}&nbsp;&nbsp;&nbsp;<button onclick="document.getElementById('form1').submit();" class="btn-success">PLACE ORDER</button></p>
<h2><strong><p ng-show="plate.length == 0">Nothing added to your Plate!</p></strong></h2>
<br><br>
 <form action="place_order.php" method="post" id="form1">
 </form>
<form action="remove_from_plate.php" method="post" id="form" style="display:none;">
<input type="text" name="item" ng-model="item"><br>
<input type="text" name="canteen" ng-model="canteen"><br>
<input type="text" name="qty" ng-model="qty"><br>
<input type="submit" value="submit"><br>
</form>

</div>
</div>
<script>
var app=angular.module('myapp',[]);
app.controller('ctrl',function($http,$scope){
	$http.get('plate.php').then(function(response){
		$scope.plate=response.data;
	});
	var i=0;
	$scope.total=0;
	$scope.realtime=function(){
		  $http.get('plate.php').then(function(response){
		$scope.plate=response.data;
		while(i < $scope.plate.length){
			$scope.total+=parseInt($scope.plate[i].amt);
			i++;
		}
	    });	  
	};
	var cnt=0;
	$scope.remove_from_plate=function(id){
		$scope.item=$scope.plate[id-1].item;
		$scope.canteen=$scope.plate[id-1].canteen;
		$scope.qty=$scope.plate[id-1].qty;
	    cnt=1;
	};
	
	$scope.autosubmit=function(){
		if(cnt){
			document.getElementById('form').submit();
		}
	};
	setInterval($scope.autosubmit,500);
	setInterval($scope.realtime,1000);
});
</script>
</body>
</html>