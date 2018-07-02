<?php
session_start();
 require 'connection.php';
 $file=$_FILES['file']['name'];
 $target_Path=addslashes($_SESSION["email"])."/";
 
 $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
 if($imageFileType!=='jpg' && $imageFileType!=='jpeg' && $imageFileType!=='png')
 {
	 echo "not a supported image type!";
 } 
 else{

 move_uploaded_file($_FILES['file']['tmp_name'],$target_Path);
 echo "file uploaded to your profile";
 
 }
?>