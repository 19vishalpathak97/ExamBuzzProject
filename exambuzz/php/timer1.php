<?php
	include 'dbconn.php';
	session_start();
$regg=$_SESSION['reg_no'];
	$number=$_GET['newCount'];
	date_default_timezone_set('Asia/Calcutta');
	$query = "select * from time where reg_no='$regg'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$start=$row['start'];
    $end=$row['end'];
        $a=date('Y-m-d H:i:s');
       // echo $end;
        //echo $a;
        if(strtotime($end)<strtotime($a))
        	echo 10000000000;
        else
        	{
        		$diff=strtotime($end)-strtotime($a);
        		echo $diff;
        	}
?>
