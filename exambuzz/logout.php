<?php
include 'dbconn.php';
session_start();
$user=$_SESSION["session_id"];

	//mysqli_query($conn,"delete from last_time where session_id=$user";
	//mysqli_query($conn,$clear);

session_unset(); 
session_destroy(); 
header("Location: /exambuzz/Login.php");
?>
