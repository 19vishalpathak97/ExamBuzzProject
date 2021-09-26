<?php
include 'dbconn.php';
session_start();
$testname=$_COOKIE['testname'];
$user=$_SESSION["session_id"];
$regg=$_SESSION['reg_no'];

		$query = "select count(status) as cc from time where reg_no='$regg' and testname='$testname'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$testcount=$row['cc'];
		echo $testcount;
		if($testcount==0)
			{//$de = "insert into time values('$user',now(),'$testname','started');";
			//mysqli_query($conn,$de);
		//	echo "hi";
			header("Location: /exambuzz/php/testWindow.php");
		
		//	    echo 0;
			}
		else
		{
			$query = "select status from time where reg_no='$regg' and testname='$testname'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
			$status=$row['status'];
			
			if($status=="started")
				//echo 1;
				{
				header("Location: /exambuzz/php/resume.php");}
			else if($status=="completed")
				//echo 2;
				header("Location: /exambuzz/php/studentDashboard.php");
			else
				//echo 3;
				echo "<script>confirm('You have already done with this test');window.location.href='studentDashboard.php';</script>";
		}
			
?>
