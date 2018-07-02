<?php
session_start();



if(($_SERVER['REQUEST_METHOD']=='POST')&&(isset($_POST['email']))){
	$host='localhost';
	$user='root';
	$pwd='';
	$db='thelunchbox';
	$con=mysqli_connect($host,$user,$pwd,$db) or die("Unable to connect".mysqli_connect_error());
	$emailid=mysqli_real_escape_string($con,$_POST['email']);
	$pass=md5($_POST['psw']);
	$verlink=md5(uniqid());
	$sql="SELECT email from users where email='$emailid'";
	$result =mysqli_query($con,$sql);
	if(!(mysqli_num_rows($result)>0)){
		$query="INSERT INTO users (uniqueid,email,hashpass,active) VALUES ('$verlink','$emailid','$pass',0)";
		if(mysqli_query($con,$query)){
			require_once('PHPMailer/PHPMailerAutoload.php');
			$mail= new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port ='465';
			$mail->isHTML();
			$mail->Username ='hrk27071999@gmail.com';
			$mail->Password = 'h@ARSHIT000';
			$mail->SetFrom('no-reply@chudap.com');
			$mail->Subject = 'Lunchbox activation';
			$mail->Body = 'copy and paste this link to activate account:   172.23.150.184/lunchbox_new/verification.php?uid='.$verlink;
			$mail->AddAddress($emailid);
			if(!($mail->send())){
				$query2="DELETE FROM users WHERE email='$emailid'";
				mysqli_query($con,$query2);
			echo "Something Went Wrong";
			echo $mail->ErrorInfo;
			}
			else{
				
				echo "<h2 style:'color:red'>verification link has been sent,click to activate ur account</h2>";
			echo "<a href='registration.php'>Register with another iitk mail</a>";
			}
		}
		else{
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}
	}
	else{
		echo "<h3 style='color:red'>Email already exists<h3>";
		echo "<a href='login.html'>Login</a>"."<br>";
		echo "<a href='registration.html'>Register</a>";
	}}
?>