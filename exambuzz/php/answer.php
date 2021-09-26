<?php
include 'dbconn.php';
session_start();

if(isset($_SESSION['answer']))
    {
       header("Location: /exambuzz/php/studentDashboard.php");
    }
else
    $_SESSION['answer']=1;



$regg=$_SESSION['reg_no'];
//echo $reg_no;
header("Content-Type: text/html; charset=ISO-8859-1");
$user=$_SESSION["reg_no"];
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
	
$tableindex=strtolower($_COOKIE['testname']);

	    $sectioncount = 0;
		$query = "select * from new_test_details where testname='$tableindex'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$sectioncount=$row['section_count'];
		$singlecount = $row['nsection_count'];
		$negative = $row['negative'];
		//echo $user;
		$scc=array();
		$sec_name=array();
		$total=0;
		$attempt=0;
		$column1=$user."question";
		$column2=$user."answer";
	    $total_score=0;
		$total_q=0;
		$total_marks=0;
		$attempted=0;
		$totalc=0;
		$section_wise_result=array();
		
		$sn1 = array();
		$sn1[1] = "Sheet1";
		$sn1[2] = "Sheet2";
		$sn1[3] = "Sheet3";
		$sn1[4] = "Sheet4";
		$sn1[5] = "Sheet5";
		$sn1[6] = "Sheet6";
		$sn1[7] = "Sheet7";
		$sn1[8] = "Sheet8";
		
		
		
		
		
		//echo $sectioncount;
		for($i=1;$i<=$sectioncount;$i++)
		{
		    $colname1 = "Sheet".$i."cnt";
		    $colname2 = "Sheet".$i;
		    $scc[$i] = $row[$colname1];
		    $sec_name[$i] = $sn1[$i];
		    $sec_name1[$i]= $row[$colname2];
		    $total_q += $scc[$i];
		    //echo $sec_name[$i];

		//$q1 = "select test_section_name from test_section where testname='$tableindex'";
		//$r1 = mysqli_query($conn,$q1);
		//$sec_name=array();
		
		//$index=1;
		//while($row1 = mysqli_fetch_assoc($r1))
		  //  {
		    //	$sec_name[$index]=$row1['test_section_name'];
		    //	$index++;
		   // }
		    
		   
		    
		    
		   // echo sizeof($sec_name);
		   //for($i=1;$i<=sizeof($sec_name);$i++)
		  // {
		   	$tablename = $tableindex.$sec_name[$i];
		   	$q2="select answer,marks from $tablename";
		   	$r2 = mysqli_query($conn,$q2);
		   	$c_answer=array();
		   	$c_marks=array();
		   	//$c_neagtive=array();
		   	$user_question=array();
		   	$user_answer=array();
		   	//echo "m".sizeof($user_answer)."m";
		   	
		   	$total_marks = 0;
		   	
		   	$index=1;
		   	while($row2=mysqli_fetch_assoc($r2))
		   	{
		   		$c_answer[$index]=$row2['answer'];
		   		$c_marks[$index]=$row2['marks'];
		   		//$c_negative[$index]=$row2['negative'];
		   		$total_marks+=$c_marks[$index];
		   		$index++;
		   	}
		   	//echo $total_marks."--";
		   	
		   	$temptablename = $tableindex.$sec_name[$i]."current";
		   //	echo $temptablename;
		   	$q3="select $column1,$column2 from $temptablename where $column2!='NULL'";
		   	$r3 = mysqli_query($conn,$q3);
		   	
		   	$q4="select count($column1) as sc from $temptablename where $column1!='NULL'";
		   	$r4 = mysqli_query($conn,$q4);
		   	$row4=mysqli_fetch_assoc($r4);
		   	$sec_count_user=$row4['sc'];
		   	//echo $sec_count_user."--";
		   	
		   	$index=1;
		   	while($row3=mysqli_fetch_assoc($r3))
		   	{
		   		$user_question[$index]=$row3[$column1];
		   		$user_answer[$index]=$row3[$column2];
		   	//	echo $user_answer[$index];
		   		$index++;
		   	}
		   	
		   	 $drop_col = "alter table $temptablename drop column $column1";
		   	 mysqli_query($conn,$drop_col);
            $drop_col = "alter table $temptablename drop column $column2";
		   	 mysqli_query($conn,$drop_col);		   	 
		   	 
		   	
		   	//echo $user_answer[2];
		   	$count=0;
		   	for($temp=1;$temp<=sizeof($user_question);$temp++)
		   	{
		   		$actual_index=$user_question[$temp];
		   		
		   		if($user_answer[$temp]==$c_answer[$actual_index])
		   			{
		   				$count+=$c_marks[$actual_index];
		   				$totalc++;
		   			}
		   		else
		   			$count-=($c_marks[$actual_index]*$negative);
		   	}
		   	
		   	$section_wise_result[$i]=$count;
		   	$section_wise_result[$i] = floatval(str_replace(',', '.', $section_wise_result[$i]));
		   	$total_score+=$section_wise_result[$i];
		   	//$total_q+=$sec_count_user;
		   	//echo sizeof($user_answer)."h";
		   	$attempted+=sizeof($user_answer);
		   	//echo $section_wise_result[2];
		   	//echo sizeof($c_answer);
		   }
		   
		   $percent = 0;
		   $percent = (($total_score/$total_marks)*100);
		   $percent = floatval(str_replace(',', '.', $percent));
		   
		   
		   
		   	$check_entry = mysqli_query($conn,"select username from result where testname = '$tableindex' and username = '$user'");
			$exists = (mysqli_num_rows($check_entry));
		   
		   if(!$exists){
		   
		   //echo "loda";
		   if(sizeof($sec_name)==1) 
		        $qq = "insert into result (testname,section1,username,percentage,time) values('$tableindex',$section_wise_result[1],$user,$percent,now())";
		   if(sizeof($sec_name)==2) 
		        $qq = "insert into result (testname,section1,section2,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$user,$percent,now())";
		   if(sizeof($sec_name)==3) 
		        $qq = "insert into result (testname,section1,section2,section3,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$user,$percent,now())";
		   if(sizeof($sec_name)==4) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$user,$percent,now())";
		   if(sizeof($sec_name)==5) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,section5,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$user,$percent,now())";
		   if(sizeof($sec_name)==6) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$section_wise_result[6],$user,$percent,now())";
		   if(sizeof($sec_name)==7) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,section7,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$section_wise_result[6],$section_wise_result[7],$user,$percent,now())";
		   if(sizeof($sec_name)==8) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,section7,section8,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$section_wise_result[6],$section_wise_result[7],$section_wise_result[8],$user,$percent,now())";
		   if(sizeof($sec_name)==9) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,section7,section8,section9,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$section_wise_result[6],$section_wise_result[7],$section_wise_result[8],$section_wise_result[9],$user,$percent,now())";
		   if(sizeof($sec_name)==10) 
		        $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,section7,section8,section9,section10,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$section_wise_result[6],$section_wise_result[7],$section_wise_result[8],$section_wise_result[9],$section_wise_result[10],$user,$percent,now())";  
		   
		    
		    // $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,section7,section8,section9,section10,username,percentage,time) values('$tableindex',$section_wise_result[1],$section_wise_result[2],$section_wise_result[3],$section_wise_result[4],$section_wise_result[5],$section_wise_result[6],$section_wise_result[7],$section_wise_result[8],$section_wise_result[9],$section_wise_result[10],$user,$percent,now())";  
		   // $qq = "insert into result (testname,section1,section2,section3,section4,section5,section6,section7,section8,section9,section10,username,percentage,time) values('$tableindex',NULLIF($section_wise_result[1],''),NULLIF($section_wise_result[2],''),NULLIF($section_wise_result[3],''),NULLIF($section_wise_result[4],''),NULLIF($section_wise_result[5],''),NULLIF($section_wise_result[6],''),NULLIF($section_wise_result[7],''),NULLIF($section_wise_result[8],''),NULLIF($section_wise_result[9],''),NULLIF($section_wise_result[10],''),$user,$percent,now())";  
		      //$l = date("Y-m-d H:i:s");
		      $percent = floatval(str_replace(',', '.', $percent));
		      //$qq = "insert into result(testname,section1,section2,username,percentage,time) values('fgb',2,3,'gu','$percent',now())";  
		  mysqli_query($conn,$qq);}
		  
		  $delete_time = "delete from time where reg_no='$regg'";
		   	 mysqli_query($conn,$delete_time);


            $update_status = "update time set status='completed' where reg_no='$regg'";
		    mysqli_query($conn,$update_status);	
		    
		   // $delete_time = "delete from time where reg_no='$regg'";
		   //	 mysqli_query($conn,$delete_time);
	
?>

<!doctype html>
<html lang="en-us">
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
      <link rel="stylesheet" href="/exambuzz/css/availableTest.css" />
            <link rel="stylesheet" href="/exambuzz/css/studentsResult.css" />
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="/exambuzz/css/testWindow.css" />
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	   <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    
    
    <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    	});

    </script>

     <link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
  
</head>
    
<title>
    
    
</title>
    
<body onload="javascript:cl();" class="noselect" ondragstart="return false;" oncontextmenu="return false;">
        <section class="top-navBar">
            
            <div class="logo">
                <img src="/exambuzz/img/small.png" width="75px" />
            </div>

           
        	<div class="contentLeft">
        		<center><img id="user-img" src="/exambuzz/img/user-alt.svg" alt="user"></center>
        		<div class="content">
    			<div id="topUser">
    				<img src="/exambuzz/img/user-alt.svg" alt="user" width="35px">
    				<div id="textArea">
    				<p><?php echo $_SESSION['username']; ?></p>
    				<a href="editProfile.php">View Profile</a>
    				</div>
    			</div>
    			<input type="submit" value="Logout" id="logoutButt" onclick="location.href = '/exambuzz/logout.php';">
    		</div>
        	</div>
    		
    		
        </section>

        <section class="right">
                <div class="work">
                    <button class="inWork" onclick="location.href='/exambuzz/php/gohome.php'">
                        <p>Home&nbsp;<img src="/exambuzz/img/home.png" width="30px" /></p>
                    </button><br/>
                    <button class="inWork" onclick="location.href='/exambuzz/php/contact.php'">
                        <p>Contact Us&nbsp;<img src="/exambuzz/img/call.png" width="25px" /></p>
                    </button><br/>
                </div>

        </section>
<!-- 


        <section class="left" >
            <div class="progressChart" style="width: 50%;float: right">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </section>

 -->
        <section class="left availableTest">

              
	        

                
        </section>
        
       <div id="myModal" class="modal">
                          <div class="modal-content"  style="width:20em">
                         
                            	<p id="timer"></p>
                            	<h2>Test Name: <?php echo $tableindex; ?></h2>
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
						
						<tr>
						  <td>
						    Total Question
						  </td>
						  <td>
						    <?php echo $total_q; ?>
						  </td>
						</tr>
						
						<tr>
						  <td>
						    Questions Attempted
						  </td>
						  <td>
						    <?php echo $attempted; ?>
						  </td>
						</tr>
						
						<tr>
						  <td>
						    Correct Answer Attempted
						  </td>
						  <td>
						    <?php echo $totalc; ?>
						  </td>
						</tr>
						
                                 	<?php for($a=1;$a<=sizeof($section_wise_result);$a++){ ?>
						
						<tr>
						  <td>
						    <?php echo $sec_name1[$a]; ?>
						  </td>
						  <td>
						    <?php echo $section_wise_result[$a]; ?>
						  </td>
						</tr>
						
						<?php } ?>
                      			</table>
                          	</div>
                          	<center><input type="button" class="buttons" name="cancel" id="cancel" value="Go Home"></center>
                        </div>
                   </div>
	        
       
</body>

    <script type="text/javascript">
    
    function cl()
    {
    	//document.getElementById("details").click();
    //}
     // function loadresult(){
      var modal = document.getElementById('myModal');
      // Get the button that opens the modal
      var btn = document.getElementById("details");
      var cancel = document.getElementById("cancel");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      

      // When the user clicks the button, open the modal 
     // btn.onclick = function() {
        modal.style.display = "block";
     // }
      
      /*End of Delete Test Script*/

      // When the user clicks on <span> (x), close the modal
      //span.onclick = function() {
        //modal.style.display = "none";
        
//      }
      cancel.onclick = function() {
        //modal.style.display = "none";
        window.close();
	window.location.href="studentDashboard.php";
      }
      }
    </script>
</html>
