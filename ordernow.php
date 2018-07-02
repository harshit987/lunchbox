<?php 
session_start();
if(!isset($_SESSION["email"]) or !isset($_SESSION['psw']))
{
	header("Location:login.html");
}
else if($_SESSION["email"]==='rajkumar@iitk.ac.in')
{
	header('Location:amt_add_remove.php');
}
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
  <script>
  /*function validate(){
    var item=document.getElementById('id11').value;
	var qty=document.getElementById('id12').value;
	var amt=document.getElementById('id13').value;
	var filter1=/^[a-zA-Z]+$/;
	var filter2=/^[0-9]+$/;
	if(!filter1.test(item))
	{alert('invalid'); return false;}
    if(!filter2.test(qty))
	{alert('invalid'); return false;}
    if(!filter2.test(amt))
    {alert('invalid'); return false;}
    return true;
  }*/
  </script>
<style>
#id11. #id12{
	width:0px;
	height:0px;
	visibilty: hidden;
}
 

.r1{
width: 25%;
}
.r2{
width: 25%;
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
	display: auto;
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
  <a href="user.php">TODAY</a>
  <a  class="active" href="ordernow.php">ADD TO PLATE</a>
  <a href="status.php">MY PLATE</a>
  <a href="profile.php">PROFILE</a>
  <a href="logout.php">LOGOUT</a>
</div>

<div ng-app="myApp" ng-controller="customersCtrl">
<p id="id"></p>
 <div class="form">
 <div class="form-group has-feedback">
    <label class="control-label">SEARCH</label>
    <input type="text" ng-model="test" class="form-control" placeholder="item name">
    <i class="glyphicon glyphicon-search form-control-feedback"></i>
</div>
 </div>
 <div class="container">
<table class="table">
  
  <tr ng-repeat="x in names | filter : test" class="tr">
    <td class="r1">{{x.name}}</td>
    <td class="r1">{{x.category}}</td>
	<td class="r2">{{ x.price }}</td>
	
	<td><button ng-click ="fun(x.name,x.price)" style="width:auto;">ADD TO PLATE</button>
  </tr>
</table>
</div>
 <div id="1" >
     
	  <div class="container">
	  <form class="modal-content animate" name="f1" method="post" onsubmit="return validate();" action="order.php">
	     Item Name:<input type="text" ng-model="nm" ng-disabled="nm"><input type="text" name="item" ng-model="nm" id="id11"><br>
      Price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" ng-model="pr"><input type="number" name="amount" ng-model="pr" id="id12"><br>
		  Quantity:&nbsp;&nbsp;&nbsp; <input type="number" placeholder="quantity" min=1 ng-model="qt" ng-change="func(qt)"><input type="number" name="qty" ng-model="qt" id="id13"><br>
		  Canteen: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="canteen">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="ADD TO PLATE" id="sbmt" onclick="document.getElementById('1').style.display='none'">  
        <button type="button" onclick="document.getElementById('1').style.display='none'"
		class="cancelbtn">Cancel</button>	
	</form>
       </div>	

</div>

</div>



 <script>
// Get the modal
var modal = document.getElementById('1');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>



<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
   $http.get("food_db.php")
   .then(function (response) {$scope.names = response.data.records;},function(error){
   alert(failed);
   });
   $scope.func=function(qt){
      $scope.pr=parseInt(qt)*parseInt($scope.pr1);
   };
   $scope.fun= function(p2,p1){
    document.getElementById('1').style.display='block';
    $scope.nm = p2;
    $scope.qt=1;
    $scope.pr =parseInt(p1);
    $scope.pr1=parseInt(p1);
   };
});
</script>
<script>

</script>
</body>
</html>