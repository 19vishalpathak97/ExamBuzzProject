<?php

include 'dbconn.php';
session_start();

$x=check();
	if($x==0)
		header("Location: /exambuzz/Login.php");
	function check()
	{
		if($_SESSION["session_id"])
			{
					return 1;
			}
		else
		{
		      return 0;
		}
	}
if(isset($_SESSION['reg_no']))
{
	$regno = $_SESSION['reg_no'];
	$result = mysqli_query($conn,"SELECT role FROM register_login WHERE reg_no = $regno");
	$row = mysqli_fetch_assoc($result);
	
	$role = $row['role'];
	
	if($role=="student")
		header("Location: /exambuzz/php/studentDashboard.php");
	else if($role=="teacher")
		header("Location: /exambuzz/php/teacherModel.php");
	else if($role=="admin")
		header("Location: /exambuzz/php/admin.php");
}

?>
