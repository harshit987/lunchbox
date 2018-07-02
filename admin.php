<?php
 session_start();
 
 if($_SESSION['email']!="rajkumar@iitk.ac.in")
 {header("Location:login.html");}
?>
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
   
   <style>.uid,#email,#item,#qty,#amt,#uid{
    margin : 20px 0 5px;
  display:none;
  width: 0px;
  }
  #your{
	  display:none;
     margin : 3px 0 3px;
  }
  
  body{
	font-family: font-family: Arial, Helvetica, sans-serif;
}
#id11{
	width:0px;
	height:0px;
	visibilty: hidden;
}
 
.card {
	margin: 20px;
    padding:12px;
	transition: 0.3s;
	
	 box-shadow:  0 4px 8px rgb(0,0,0,0.2);
}
.card:hover{
	z-index:1;
	 box-shadow: 0 8px 16px rgb(0,0,0,0.2);
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
  <a class="active" href="admin.php">PENDING ORDERS</a>
  
  <a href="admin_profile.php">PROFILE</a>
  <a href="logout.php">LOGOUT</a>
</div>
<br><br><br><br>
<div class="container">
 

 <div ng-app="myApp" ng-controller="customersCtrl">
 
 <div class="card" ng-repeat="x in names">
 
 <table class="table" ng-show="names.length !== 0">
 <tr>
 <th>Email</th>
 <th>Item</th>
 <th>Quantity</th>
 <th>Amount</th>
 <th>Confirm?</th>
 <th>Cancel?</th>
 </tr>
 <tr ng-repeat="y in x" class="tr">
  <td>{{y.email}}</td>
  <td>{{y.item}}</td>
  <td>{{y.qty}}</td>
  <td>{{y.amt}}</td>
  <td><button ng-click="confirm(y.uid,y.email,y.item,y.qty)" class="btn-success">Confirm</button></td>
  <td><button ng-click="cancel(y.uid,y.email,y.item,y.qty)" class="btn-danger">Cancel</button></td>
 </tr>
 </table>
 
  </div>
  <p ng-show="names.length===0">No one ordered till now online!</p>
 <form id="form" action="confirm.php" method="post" style="display:none;">
 <input type="text" name="uid" ng-model="uniqid" >
 <input type="text" name="email" ng-model="email" >
 <input type="text" name="item" ng-model="item" >
 <input type="text" name="qty" ng-model="qty" >
 
 </form>
 <form id="form1" action="cancel.php" method="post" style="display:none;">
 <input type="text" name="uid1" ng-model="uniqid1" >
 <input type="text" name="email1" ng-model="email1" >
 <input type="text" name="item1" ng-model="item1" >
 <input type="text" name="qty1" ng-model="qty1" >
 
 </form>
 
  </div> </div></div>
<script>
window.addEventListener("DOMContentLoaded",function(){
  
  var form= document.getElementById('form');
  document.getElementById("your").addEventListener("click",function(){
    form.submit();
  });
});
</script>
 <script>
 var i=0;
var app = angular.module('myApp', []);
app.controller('customersCtrl',function($scope, $http) {
	$http.get("takeorder.php")
   .then(function (response) {$scope.names = response.data;});
   $scope.getdata= function() {$http.get("takeorder.php")
   .then(function (response) {$scope.names = response.data;});};
    var cnt1=0;
	var cnt2=0;
	$scope.confirm= function(a,b,c,d)
	{
		$scope.uniqid=a;
		$scope.email=b;
		$scope.item=c;
		$scope.qty=d;
		cnt1=1;
	}
	$scope.cancel= function(a,b,c,d)
	{
		$scope.uniqid1=a;
		$scope.email1=b;
		$scope.item1=c;
		$scope.qty1=d;
		cnt2=1;
	}
	$scope.autosubmit= function(){
		if(cnt1)
		document.getElementById('form').submit();
	}
	$scope.autosubmit1= function(){
		if(cnt2)
		document.getElementById('form1').submit();
	}
	setInterval($scope.autosubmit1,1000);
	setInterval($scope.autosubmit,1000);
});
</script>


 </body>
</html> 