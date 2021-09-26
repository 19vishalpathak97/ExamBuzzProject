<?php
include 'dbconn.php';
$testname=strtolower($_POST['testname']);
$startdate=strtolower($_POST['startdate']);
$enddate=strtolower($_POST['enddate']);
$timetaken=strtolower($_POST['timetaken']);
//echo $testname;


$query = "update new_test_details set startdate = '$startdate',enddate = '$enddate',timeoftest = $timetaken where testname = '$testname'";
if(mysqli_query($conn,$query))
{
	echo "Your Test is updated";
}



?>
