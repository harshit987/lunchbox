<?php 
//session_start();
//if(!isset($_SESSION["email"]) or !isset($_SESSION['psw']))
//{
 // header("Location:login.html");
//}
//else if($_SESSION["email"]==='rajkumar@iitk.ac.in')
//{
 // header('Location:amt_add_remove.php');
//}
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
  function validate(){
    var item=document.getElementById('id11').value;
  var qty=document.getElementById('id12').value;
  var amt=document.getElementById('id13').value;
  var filter1=/^[a-z A-Z]+$/;
  var filter2=/^[0-9]+$/;
  if(!filter1.test(item))
  {alert('invalid item'); return false;}
    if(!filter2.test(qty))
  {alert('invalid quantity'); return false;}
    if(!filter2.test(amt))
    {alert('invalid amount'); return false;}
  }
  </script>
<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

.card {
    margin: 12px;
    padding:12px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
#id11. #id12. #cid11{
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
 #form{
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


/* input modal */

 

 
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

}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
   margin:auto;
   margin-top:5%;
      
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
	
}
.form-group{
	margin: 20px;
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
 <div id="form">
 <div class="form-group has-feedback">
    <label class="control-label">SEARCH</label>
    <input type="text" ng-model="test" class="form-control" placeholder="item name">
    <i class="glyphicon glyphicon-search form-control-feedback"></i>
</div>
 </div>
 <div class="container">

<div ng-repeat="x in names | filter : test" class="card">
  
    <h3>{{x.name}}</h3>
    <p><span ng-show="x.category !== ''">Category:{{x.category}}  &nbsp&nbsp&nbsp&nbsp</span><span ng-show="x.price !== 100000">Lowest Price:{{x.price}}</span></p>
    <button  class="btn btn-primary" style="margin:2px;" ng-repeat="y in canteens" ng-click ="fun(x.name,x[y.fid],y.id,y.status,y.name)" style="width:auto;">{{y.name}}</button>

</div>
<div id="snackbar"></div>
</div>
 <div id="1" class="modal">
     
    <div class="container">
    <form class="modal-content animate" name="f1" method="post" onsubmit="return validate();" action="order.php">
      <div class="form-group"><label for="id4">Canteen:</label><input type="text" ng-model="canteen" ng-disabled="true" class="form-control" id="id4"></div>
	  <div class="form-group"><label for="id1">Item Name:</label><input type="text" ng-model="nm" ng-disabled="true" class="form-control" id="id1"></div>
      <div class="form-group"><label for="id2">Price :</label><input type="text" id="id2" ng-model="pr" ng-disabled="true" class="form-control"></div>
      <div class="form-group"><label for="id3">Quantity:</label><input type="number" id="id3" class="form-control" placeholder="quantity" min=1 ng-model="qt" ng-change="func(qt)"></div>
      <div class="form-group"><input type="submit" class="btn-success" value="ORDER NOW" id="sbmt" onclick="document.getElementById('1').style.display='none'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <button  type="button" class="btn-danger" onclick="document.getElementById('1').style.display='none'">Cancel</button></div>
	  
	  <input type="text" name="item" ng-model="nm" id="id11" style="Display:none;" onchange="document.getElementById('sbmt').disabled=true;">
	  <input type="text" name="amount" ng-model="pr" id="id12" style="Display:none;" onchange="document.getElementById('sbmt').disabled=true;">
	  <input type="text" name="qty" ng-model="qt" id="id13" style="Display:none;" onchange="document.getElementById('sbmt').disabled=true;">
	  <input type="text" name="cid" ng-model="cid" id="cid11" style="Display:none;" onchange="document.getElementById('sbmt').disabled=true;">
	  <input type="text" name="canteen" ng-model="canteen" style="display:none;" onchange="document.getElementById('sbmt').disabled=true;">
      
       
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
   .then(function (response) {$scope.names = response.data.records;
    $scope.canteens = response.data.records2;},function(error){
   alert(failed);
   });
   $scope.getdata=function(){ $http.get("food_db.php")
   .then(function (response) {$scope.names = response.data.records;
    $scope.canteens = response.data.records2;},function(error){
   alert(failed);
   });};
   setInterval($scope.getdata,3000);
   $scope.func=function(qt){
      $scope.pr=parseInt(qt)*parseInt($scope.pr1);
   };
   $scope.fun= function(p2,p1,id,status,name){
    if(status==0){
       var x=document.getElementById("snackbar");
        x.innerHTML="This Canteen Is Closed At This Moment";
         x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        return false;
    }
    if(p1==0){
       var x=document.getElementById("snackbar");
        x.innerHTML="This Item Is Not Available At This Canteen";
         x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        return false;
    }
    else{
    document.getElementById('1').style.display='block';
    $scope.canteen=name;
	$scope.cid=id;
    $scope.nm = p2;
    $scope.qt=1;
    $scope.pr =parseInt(p1);
    $scope.pr1=parseInt(p1);
  }
   };
});
</script>
<script>
</script>
</body>
</html>