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
      var fn=f1.fname.value;
      var ph=f1.phone.value;
  		var em=f1.email.value;
  		var p=f1.psw.value;
  		var cp=f1.cpsw.value;
      var erfn="Full Name Should only contain letter and spaces with Proper length";
      var erph="Not a correct syntax of valid phone number";
      var erem="Not a correct syntax of valid email address";
      var erpasm="Password did not match";
      var filterfn=/^([a-zA-Z]{1,} )*([a-zA-Z]{1,})$/;
      var filterph=/[0-9]{10}/;
  		var filterem=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(!filterfn.test(fn)){
        myFunction(erfn);
        return false;
      }if(!filterph.test(ph)){
        myFunction(erph);
        return false;
      }
  		if(!filterem.test(em)){
  			myFunction(erem);
  			return false;
  		}
  		if(!(p===cp)){
  			myFunction(erpasm);
  			return false;
  		}
  	}
  </script>
  <script>
function myFunction(str) {
    var x = document.getElementById("snackbar");
    x.innerHTML=str;
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
<br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</body>
</html>

<?php
 if(($_SERVER['REQUEST_METHOD']=='POST')&&(isset($_POST['psw']))){
  $host='localhost';
  $user='root';
  $pwd='';
  $db='thelunchbox';
  $con=mysqli_connect($host,$user,$pwd,$db) or die("Unable to connect".mysqli_connect_error());
  $fname=$_POST['fname'];
  $cname=$_POST['cname'];
  $ph=$_POST['phone'];
  $emailid=$_POST['email'];
  $npass=md5($_POST['psw']);
  $uid=md5(uniqid());
  $sql="SELECT name,status from canteens where status= -1 and name='$cname'";
  $result =mysqli_query($con,$sql);
  $sql1="SELECT name,status from canteens where status!= -1 and name='$cname'";
  $result1 =mysqli_query($con,$sql1);
  $c1=mysqli_num_rows($result);
  $c2=mysqli_num_rows($result1);
  
  $result2=$con->query("select max(id) as 'max' from canteens");
  $rs=$result2->fetch_array(MYSQLI_ASSOC);
  $c3=$rs['max'];
  $c3=$c3+1;
  if(($c1>0)){
    echo '<script>
      document.getElementById("1").style.display="none";
    </script>';
    echo "Pending request has already been recieved.<br>";
  }
   else if(($c2>0)){
    echo '<script>
      document.getElementById("1").style.display="none";
    </script>';
    echo "Canteen already exist"."<br>";
    echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='vendor_login.html'>Login</a>";
  }
  else{
    $sql2="INSERT INTO canteens (id,uniqueid,name,vendor,pass,vendor_name,vendor_phone,status) VALUES ('$c3','$uid','$cname','$emailid','$npass','$fname','$ph',-1)";
    //$result2=mysqli_query($con,$sql2);
    echo '<script>
      document.getElementById("1").style.display="none";
    </script>';
    if(mysqli_query($con,$sql2)){
      echo "request has been sent to admin .<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin will soon contact you through email or phone ";
    }
    else{
      echo "error".mysqli_error($con);
    }


  }
  }
  $con->close();


?>