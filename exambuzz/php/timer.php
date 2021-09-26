<?php
	include 'dbconn.php';
	$number=$_GET['newCount'];
	date_default_timezone_set('Asia/Calcutta');
	$query = "select * from time where session_id=101";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$start=$row['start'];
        $end=$row['end'];
        //echo date();
        $a=date('Y-m-d H:i:s');
        //echo $start;
        //echo strtotime($start);echo "hi";
        $diff=strtotime($end)-strtotime($a);
        //echo $diff;
        
        $days    = floor($diff/(60*60*24)); //echo "  "; echo $days;  
	$hours   = floor(($diff-($days*60*60*24))/(60*60));   
	$minutes = floor(($diff-($days*60*60*24)-($hours*60*60))/60);
	$seconds = floor(($diff-($days*60*60*24)-($hours*60*60)-($minutes*60)));
	
	$Stime = strtotime($start);
	$SgetDate = date('Y-m-d', $Stime);
	$SgetHour = date('h', $Stime);
	$SgetMinute = date('i', $Stime);
	$SgetSecond = date('s',$Stime);
	
	/*$Etime = strtotime($end);
	$EgetDate = date('Y-m-d', $Etime);
	$EgetHour = date('h', $Etime);
	$EgetMinute = date('i', $Etime);
	$EgetSecond = date('s',$Etime);
	*/
	//$hours = 
	
	//echo date('Y-m-d H:i:s');
	//echo date("i");
	//echo date("s");
        //echo $start."  ";
        //echo "hi\tbc";
        //echo $end."  ";
        //echo $diff."  ";
        echo $hours."  ";
        echo $minutes."  ";
        echo $seconds."  ";
	
?>
<html>
<head>
 <script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
    </script>
<script>
	function timer(){
		var c = <?php echo $seconds; ?>;
		var m = <?php echo $minutes; ?>;
		var h = <?php echo $hours; ?>;
		
		    var x = setInterval(function timeout()
			{
		    
		    		/*if(c==0 && m==0)
		    		{
		    			//break;
		    		}
		    		/*else if(c==0 || m==0)
		    		{
		    			c=59;
		    			m=59;
		    		}*/
				if(c==0)
				{
					c=59;
					m=m-1;
		
				}
				/*if(m==0 || h==0)
				{
					break;
				}
				else*/ if(m==0)
				{
					c=59;
					m=59;
					h=h-1;
				}
			    document.getElementById("demo").innerHTML = h + "h "
			    + m + "m " + c + "s ";
			    
			    c = c - 1;
	   		    //t = setTimeout(function(){ timeout() }, 5);
			    
			    
			    if (h < 0) {
				clearInterval(x);
				document.getElementById("demo").innerHTML = "EXPIRED";
				//window.location="College.php";
			    }
			},1000);

	}
</script>
</head>
<body onload="javascript:timer();">
	<h4 id="demo"></h4>
</body>
</html>
