<?php
if(($_SERVER['REQUEST_METHOD']=='POST')&&(isset($_POST['email']))){
	$host='localhost';
	$user='root';
	$pwd='hello123';
	$db='lunchbox';
	$con=mysqli_connect($host,$user,$pwd,$db) or die("Unable to connect".mysqli_connect_error());
	$emailid=$_POST['email'];
	$stmt=$con->prepare('SELECT uniqueid from users where email=? and active=1');
	$stmt->bind_param('s',$emailid);
	$stmt->execute();
	//$pass=md5($_POST['psw']);
	//$verlink=md5(uniqid());

	//$sql="SELECT uniqueid from users where email='$emailid' and active=1";
	$result =$stmt->get_result();
	if((mysqli_num_rows($result)>0)){
		//$query="INSERT INTO users (uniqueid,email,hashpass,active) VALUES ('$verlink','$emailid','$pass',0)";
		$row=mysqli_fetch_assoc($result);
		$verlink=$row['uniqueid'];
		
			require_once('PHPMailer/PHPMailerAutoload.php');
			$mail= new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port ='465';
			$mail->isHTML();
			$mail->Username ='uma.ra2ja@gmail.com';
			$mail->Password = '';
			$mail->SetFrom('no-reply@chudap.com');
			$mail->Subject = 'Lunchbox activation';
			$mail->Body = 'copy and paste this link to reset password:  172.23.146.105/registration/reset.php?uid='.$verlink;
			$mail->AddAddress($emailid);
			if(!($mail->send())){
				//$query2="DELETE FROM users WHERE email='$emailid'";
				//mysqli_query($con,$query2);
			echo "Something Went Wrong";
			echo $mail->ErrorInfo;
			}
			else{
				
				echo "<h2 style='color:red'>verification link has been sent,click to change ur password</h2>";
			echo "<a href='registeration.html'>Register with another iitk mail</a>";
			}
	}
	else{
		echo "<h3 style='color:red'>Email not exists<h3>";
		echo "<a href='login.html'>Login</a>"."<br>";
		echo "<a href='registration.html'>Register</a>";
	}}
?>