<?php
	include 'dbconn.php';
       	header("Content-Type: text/html; charset=ISO-8859-1");
	session_start();
	date_default_timezone_set('Asia/Calcutta');
	$regg=$_SESSION['reg_no'];
	
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




$testname=$_GET['testname'];

        $q1 = "select * from new_test_details where testname='$testname'";
		$r1 = mysqli_query($conn,$q1);
		$row1 = mysqli_fetch_assoc($r1);
		$sectioncount=$row1['section_count'];
		//echo $sectioncount;
		$sec_name=array();
		$section_wise_result=array();
		for($i=1;$i<=$sectioncount;$i++)
		{
		    $colname1 = "Sheet".$i."cnt";
		    $colname2 = "Sheet".$i;
		    $scc[$i] = $row1[$colname1];
		    $sec_name[$i] = $row1[$colname2];
		  //  echo $sec_name[$i];
		}

$query = "select * from result where testname='$testname' and username=$regg";
	
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	
	for($b=1;$b<=10;$b++)
	{
	    $str = "section".$b;
	    $ans = $row[$str];
	    if($ans == 10000){}
	    else
	        $section_wise_result[$b]=$ans;
	    
	}
//	echo sizeof($section_wise_result);
	

        
?>
	
	
	<html>
	<head>
	<style>
		h5
		{
			font-size:150%;
		}
	</style>
			<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
	</script>

  <link rel="stylesheet" type="text/css" href="/exambuzz/css/testWindow.css" />
	</head>	
	
	
<body>
	
		<div class="modal-content"  style="width:20em">
                         <span class="close">&times;</span>
                            	<p id="timer"></p>
                            	<h2>Test Name: <?php echo $testname; ?></h2>
                             	<div id="sider" class="studentPerformance">
                                 	<table >
                        <tr>
						  <td>
						    <h1>Your Score</h1>
						  </td>
						  <td>
						    <?php echo $total_score; ?>
						  </td>
						</tr>
						
						
					
						
                                 	<?php for($a=1;$a<=sizeof($sec_name);$a++){ ?>
						
						<tr>
						  <td>
						    <?php echo $sec_name[$a]; ?>
						  </td>
						  <td>
						    <?php echo $section_wise_result[$a]; ?>
						  </td>
						</tr>
						
						<?php } ?>
                      			</table>
                          	</div>
                          
                        </div>
</body>



<script>
    var modal = document.getElementById('myModal');
    			 //var btn = document.getElementById("edit<?php echo $a; ?>");
    			//var ok = document.getElementById("ok");
    			var span = document.getElementsByClassName("close")[0];
    		//	modal.style.display = "block";
    			 /*btn.onclick = function() {
       				 
     				}*/
     					 
     			span.onclick = function() {
        				modal.style.display = "none";
      					}
    
    
    
    
</script>
</html>
	
	
