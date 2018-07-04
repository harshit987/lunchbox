<?php
session_start();
$email=$_SESSION['email'];
$file=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
require_once 'connection.php';
$filetxt=explode('.',$file_name);
$fileExt=strtolower(end($filetxt));
$allowed= array('jpeg','jpg','png','pdf');
if(in_array($fileExt,$allowed) && getimagesize($_FILES['file']['tmp_name']))
{
	echo $_FILES['file']['size'];
	$image=addslashes(file_get_contents($_FILES['file']['tmp_name']));
	$sql="insert into image(email,image) values('$email','$image')";
	if(!$conn->query($sql))
	{echo "Can't upload try another way";}
}
else{
   echo "not a supported image";
}
?>