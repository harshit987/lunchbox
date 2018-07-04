<?php
session_start();
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<style>
#conf{
  display: none;
}
.card {
    background-color: white;
    margin: 12px;
    padding:12px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
body{
background-color: #f2f2f2;
letter-spacing: 2px;
}
 
.special{
       font-family: 'Tangerine', serif;
        font-size: 48px;
		text-align: center;
		padding : 25px;
}
.form{
  position: relative;
  background: #f2f2f2;
  width: 50%;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: left;
  
}
.navbar{
  background-color: rgb(153,217,234);
  color: white;
  z-index: 2;
  width: 100%;
   box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
   text-align: center;
   padding-top: 0px;
   padding-bottom: 12px;
   margin : 7px auto ;
   font-size: 30px;
   }
</style>

</head>
<body>
<div class="navbar">
  
	<div class="container-fluid">
<div class="navbar-header">
      <a class="navbar-brand" href="login.html" style="padding: 0px" ><img src="icon.png" style="width: 80px;height: 63px;display: inline-block;">LUNCHBOX</a>
    </div></div>
</div>
<div class="special"></div>
<div class="form" id="1">
  <div ng-app="myApp" ng-controller="customersCtrl">
  <div ng-repeat ="x in requests" class="card">
    <h2>{{x.name}}</h2>
    <p>Vendor name:{{x.vendor_name}} &nbsp&nbsp&nbsp&nbsp Email:{{x.vendor}} &nbsp&nbsp&nbsp&nbsp Phone:{{x.vendor_phone}}</p>
    <button class="btn btn-success" name="confirm" value="confirm" ng-click="Confirm(x.id,1)">Confirm</button> &nbsp
    <button class="btn btn-danger" name="cancel" value="cancel" ng-click="Confirm(x.id,0)">Cancel</button>
  </div>
  <form action="confirm_canteen.php" method="post" id="conf">
    <input type="text" name="cid" ng-model="cid">
    <input type="text" name="decision" ng-model="decision">
    <input type="submit">
  </form>
</div></div>
<script>
  
  var app = angular.module('myApp', []);
 
app.controller('customersCtrl', function($scope, $http) {
   $http.get("canteen_requests.php")
   .then(function (response) {$scope.requests = response.data.records;},function(error){
   alert(failed);
   });
   $scope.getdata=function(){ $http.get("canteen_requests.php")
   .then(function (response) {$scope.requests = response.data.records;},function(error){
   alert(failed);
   });};
   setInterval($scope.getdata,3000);
    var cnt1=0;
  var cnt2=0;
   $scope.Confirm=function(z,d){
    $scope.cid=z;
    $scope.decision=d;
    cnt1++;};
    $scope.autosubmit1=function(){
if(cnt1-1==cnt2){
  document.getElementById('conf').submit();
  cnt2++;
}};
setInterval($scope.autosubmit1,100);
   
   });
</script>
</body>
</html>