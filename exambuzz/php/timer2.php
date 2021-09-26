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
    $lastseen=$row['lastseen'];
    
    $difference = strtotime($end)-strtotime($start);
    $a=date('Y-m-d H:i:s');
    $new_end = date("Y/m/d H:i:s", strtotime("+$difference minutes"));
    //$new_end = $a+$difference;
    
       /* $days = floor($difference/(60*60*24));   
		$hours   = floor(($difference-($days*60*60*24))/(60*60));   
		$minutes = floor(($difference-($days*60*60*24)-($hours*60*60))/60);
		$seconds = floor(($difference-($days*60*60*24)-($hours*60*60)-($minutes*60)));
    
echo $new_end;*/
    
    $update_end = "update time set start = '$a',end = '$new_end',lastseen = '$a' where reg_no=$regg";
    mysqli_query($conn,$update_end);
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
