<?php
session_start();
if(!(($_SERVER['REQUEST_METHOD']=='POST')&&($_SERVER['REQUEST_METHOD']=='GET'))){
	header('location: login.html');
}
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
  <script>
  	function formvalidate(f1){
  		var p=f1.psw.value;
  		var cp=f1.cpsw.value;
  		if(!(p===cp)){
  			myFunction1();
  			return false;
  		}
  	}
  </script>
<script>
function myFunction1() {
    var x = document.getElementById("snackbar1");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

<style>
.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
}
.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}
.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}
input[type=submit]{
 background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
body{
background-color: #f2f2f2;
letter-spacing: 2px;
}
input[type=submit]:hover{
opaity:0.5;
}
 
.special{
       font-family: 'Tangerine', serif;
        font-size: 48px;
		text-align: center;
		padding : 25px;
}
#1{

}
.form{
  
  position: relative;
  z-index: 1;
  background: white;
  width: 50%;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: left;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
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

#snackbar1 {
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

#snackbar1.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
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
<div id="1" class="form">
 <h1>RESET PASSWORD</h1>
    <p>Please fill in this form to reset password.</p>
    <hr>
<form method="POST" name="f1" onsubmit="return formvalidate(f1);" action="reset.php" >
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="New Password" name="psw" required></div>
    <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Confirm Password" name="cpsw" required></div>
<input type="Submit" value="RESET" style="font-style:italic;" class="btn btn-info" name="Submit"><br>
</form>
<p class="message">wanna try? <a href="login.html">Login</a></p>
<div id="snackbar1">Password Did Not Match</div>
</div>
</body>
</html>
<?php
if(($_SERVER['REQUEST_METHOD']=='GET')&&(isset($_GET['uid']))){
	$host='localhost';
	$user='root';
	$pwd='hello123';
	$db='lunchbox';
	$con=mysqli_connect($host,$user,$pwd,$db) or die("Unable to connect".mysqli_connect_error());
	$id=$_GET['uid'];
	$_SESSION['id1']=$id;
	$sql="SELECT email from users where uniqueid='$id'";
	$result =mysqli_query($con,$sql);
	if(!(mysqli_num_rows($result)>0)){
		echo 'Invalid Request';
		echo "<script>
			document.getElementById('1').style.display='none';
		</script>";
	} $con->close();
}
if(($_SERVER['REQUEST_METHOD']=='POST')&&(isset($_POST['psw']))){
	$host='localhost';
	$user='root';
	$pwd='hello123';
	$db='lunchbox';
	$con=mysqli_connect($host,$user,$pwd,$db) or die("Unable to connect".mysqli_connect_error());
	$npass=md5($_POST['psw']);
	$id=$_SESSION['id1'];
	$sql="SELECT email from users where uniqueid='$id' and active =1";
	$result =mysqli_query($con,$sql);
	echo '<script>
			document.getElementById("1").style.display="none";
		</script>';
	if((mysqli_num_rows($result)>0)){
		$sql2="UPDATE users set hashpass='$npass' where uniqueid='$id'" ;
		if(mysqli_query($con,$sql2)){
			echo "Password Has Been Updated"."<br>";
			echo "<a href='login.html'>Login</a>";
		}else echo "Error";
		
	}else{
		echo "Invalid Request";
	} $con->close();


}
?>