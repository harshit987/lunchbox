<?php
session_start();
require_once 'connection.php';
$conn->query("update canteens set status='0' where name='".$_SESSION['canteen']."'");
session_destroy();
header('Location: vendor_login.html');

?>