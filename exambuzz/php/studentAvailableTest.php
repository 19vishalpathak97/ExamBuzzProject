<?php
session_start();
$_SESSION['testname']=0;
include 'dbconn.php';
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
?>





<!doctype html>
<html lang="en-us">
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/exambuzz/css/availableDataFormat.css" />
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
    
    <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    <script>
    	function testcount()
    	{
    		<?php
    	    $regg = $_SESSION['reg_no'];
    	    $qbc = "select department,year from register_login where reg_no=$regg";
			$rbc = mysqli_query($conn,$qbc);
			$rowbc = mysqli_fetch_array($rbc);
			$department=$rowbc['department'];
			$year=$rowbc['year'];
    	
    	
    	
    		$query = "select count(testname) as cc from new_test_details where department='$department' and year='$year'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
			$testcount=$row['cc'];
			//echo "hi";
    		
    		?>
    		//var b=<?php echo json_encode($testcount); ?>;
    		//document.write(b);
    	}
    </script>
    
    
   <link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
    
    
    
    
    
    
    
    
    
    
 <!--   
    
    <style type="text/css">
		
.rower{
	width:100%;
}

.columner { 
  width: 30%;
  display:inline-block;
  margin-left:0.5em;
  margin-top:0.5em;
}

@media screen and (max-width: 985px) {
 	
 	.columner:nth-child(1){
	margin-left: 4em;
}
 	.columner { 
  width: 50%;
  margin-left: 4em;
  margin-top:2em;
}
}

@media screen and (max-width: 650px) {
 	.columner { 
  width: 68%;
  margin-top:1em;
}
.columner:nth-child(1){
	margin-left: 0;
}
.columner{
	margin:0em;
}
}
@media screen and (max-width: 576px) {
 	.columner { 
  width: 98%;
  margin-top:1em;
}

}
.carder {
    box-shadow: 0 0 10px 0 #a1a1a1;
	border-radius:10px;
	background-color:#fff;
	transition:all 0.3s ease;
/*
	border-bottom: 3px solid transparent;
	-moz-border-image: -moz-linear-gradient(45deg,  #ff512f,#dd2476);
	-webkit-border-image: -webkit-linear-gradient(45deg,  #ff512f,#dd2476);
	border-image: linear-gradient(45deg,  #833ab4,#fd1d1d,#fcb045);
	border-image-slice: 1;*/
	
}
.containerer::after, .rower::after {
	content: "";
	clear: both;
	display: table;
}
input[type="submit"]{
    background:#009688;
    border-radius:5px;
    border:none;
    float:right;
    margin: 0 1em 1em 0em;
    padding:1em;
}
input[type="submit"]:hover{
    box-shadow:0 0 10px #a1a1a1;
}

table{
	margin-left:1em;
}
.insideer{
    margin-left:1em;
    
}


	</style>
    
    -->
    
    
    
    
  
</head>
    
<title>
    Exambuzz
    
</title>
    
<body onload="javascript:testcount();" class="noselect" ondragstart="return false;" oncontextmenu="return false;">
    
        <section class="top-navBar">
            
            <div class="logo">
                <img src="/exambuzz/img/small.png" onclick="location.href='/exambuzz/php/gohome.php'" width="75px" />
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
                    <button class="inWork" onclick="location.href='/exambuzz/contact.html'">
                        <p>Contact Us&nbsp;<img src="/exambuzz/img/call.png" width="25px" /></p>
                    </button><br/>
                </div>

        </section>

        <section class="left availableTest">

                <h1>Available Tests</h1>

            <div class="rower" >
            <?php 
            
            
            $regg = $_SESSION['reg_no'];
           // echo $regg;
            	$query = "select * from new_test_details as a where a.department='$department' and a.year='$year'";
		$rsb = mysqli_query($conn,$query);
		//echo $rsb;
		//$testlist = mysqli_fetch_array($rsb);
	//	$testlist = mysqli_fetch_array($rsb);
	//	echo $testlist["testname"];
		$testid=0;
		while ($testlist = mysqli_fetch_assoc($rsb )) {
		
		$testname = $testlist["testname"];
		$duration = $testlist["timeoftest"];
		$uploadedby = $testlist['Name'];
	//	$class = $testlist['class'];
		$year = $testlist['year'];
		$department = $testlist['department'];
		$from_time = $testlist['startdate'];
		$to_time = $testlist['enddate'];
		$testid++;
		
		//}
		
	?>

                
                
                
                
               
                
                
            <!--    
                
                <div class="labelsTest">
                <div class="innerModule">
                <h3 id="testname<?php echo $testid; ?>"><?php echo $testname; ?></h3>
                <p id ="k">
                    Duration :  <?php echo $duration; ?><br>
                    Uploaded By : <?php echo $uploadedby; ?><br>
                    Year : <?php echo $year; ?> <br>
                    Department : <?php echo $department; ?><br> 
                    From : <?php echo $from_time; ?><br> 
                    To : <?php echo $to_time; ?><br>
                   
                    <input type="submit" class="taketest" id="edit<?php echo $testid; ?>" value="Take Test" style="color:#fff">
                   
                </p>
                </div>
                </div>
                
                
                -->
                
                
                
                
                
                
                
                
            
					  <div class="columner">
					    <div class="carder" style ="border:3px solid #009688" >
					      <div class="containerer" >
					      	
					      	<div class="insideer">	
						      	<h3 id="testname<?php echo $testid; ?>"><?php echo strtoupper($testname); ?></h3>
                
						 </div>

							<table>
								<tr>
									<td>
										Duration :
									</td>
									<td>
										<?php echo $duration; ?>
									</td>
								</tr>
								<tr>
									<td>
										Uploaded By :
									</td>
									<td>
										<?php echo ucwords($uploadedby); ?>
									</td>
								</tr>
								<tr>
									<td>
										Year :
									</td>
									<td>
										<?php echo $year; ?>
									</td>
								</tr>
								<tr>
									<td>
										Department :
									</td>
									<td>
										<?php echo $department; ?>
									</td>
								</tr>
								<tr>
									<td>
										From :
									</td>
									<td>
										<?php echo $from_time; ?>
									</td>
								</tr>
								<tr>
									<td>
										To :
									</td>
									<td>
										<?php echo $to_time; ?>
									</td>
								</tr>
							</table>

								<input type="submit" class="taketest" id="edit<?php echo $testid; ?>" value="Take Test" style="color:#fff">
					      </div>
					    </div>
					    	
							    
							
					  </div>
					 
			
              

               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
                
                
                
                
                
                
            

 		<?php if($testid%3==0){?>
 		
 		    <br>
 		<?php }
 		
 		} ?>
 		</div>
        </section>

        <div id="myModal" class="modal" style="padding-top: 0px;">

                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            <p id="timer"></p>
                           <center> <h1>Instructions</h1></center>
                            <ul type=".">
                                <li>
                                    Do not minimize the browser once the test starts.
                                </li>
                                <li>
                                    Do not open other tabs or applications.
                                </li>
                                <li>
                                    Do not press F5 Key or back key of browser.
                                </li>
                                <li>
                                    Click the "Finish Test" button to submit the test. Do not press enter key.
                                </li>
                                <li>
                                    ALL THE BEST!
                                </li>
                                
                            </ul>
                            <table style="text-align:center">
                                <tr >
                                    <td style="border-right:2px solid #009688">
                                        <svg height="100" width="100">
                                            <circle cx="50" cy="50" r="20" stroke="red" stroke-width="3" fill="yellow" />
                                        </svg>
                                    </td>
                                    <td style="border-right:2px solid #009688">
                                        <svg height="100" width="100">
                                            <circle cx="50" cy="50" r="20" stroke-width="3" fill="blue" />
                                        </svg>
                                    </td>
                                    <td>
                                        <svg height="100" width="100">
                                             <circle cx="50" cy="50" r="20" stroke-width="3" fill="green" />
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right:2px solid #009688">&nbsp;&nbsp;&nbsp;Marked for Review&nbsp;&nbsp;&nbsp;</td>
                                    <td style="border-right:2px solid #009688">&nbsp;&nbsp;&nbsp;Visited Question&nbsp;&nbsp;&nbsp;</td>
                                    <td>&nbsp;&nbsp;&nbsp;Answered Question</td>
                                </tr>
                                
                            </table>
                                    <!--<svg height="100" width="100">
                                      <circle cx="50" cy="50" r="20" stroke="red" stroke-width="3" fill="yellow" />
                                    </svg>Marked for Review
                               
                                    <svg height="100" width="100">
                                      <circle cx="50" cy="50" r="20" stroke-width="3" fill="blue" />
                                    </svg>Visited Question
                                
                                    <svg height="100" width="100">
                                      <circle cx="50" cy="50" r="20" stroke-width="3" fill="green" />
                                    </svg>Answered Question-->
                                
                             
                            <div id="bottomButton">
                            <br>
                            <input type="button" id="ok" class="buttons one" name="ok" value="Start Test">
                            </div>
                          </div>

                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
            
                        
                        
                        
                        <!--Test Already taken Modal-->
                    <!--    <div id="myModal1" class="modal" style="padding-top: 0px;">

                          
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            <p id="timer"></p>
                           <center> <h1>WARNING!</h1></center>
                            <ul type=".">
                                <li>
                                    Your test is already over.
                                </li>
                            </ul>
                                
                             
                            <div id="bottomButton">
                            <br>
                            <input type="button" id="ok1" class="buttons one" name="ok" value="Start Test">
                            </div>
                          </div>

                        </div>-->
                
               
</body>
 <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    		<?php for($a=1;$a<=$testcount;$a++){ ?>
    		 $("#edit<?php echo $a; ?>").click(function(){
    		 	var tn=document.getElementById("testname<?php echo $a; ?>").textContent;
    		 	document.cookie = "testname = " + tn;
    		 	<?php $_SESSION['testname']=$_COOKIE['testname']; ?>
    			//console.log(tn);
    			// window.location.href='testWindow.php';
    			var modal = document.getElementById('myModal');
    		//	var modal1=document.getElementById('myModal1');
    			var ok = document.getElementById("ok");
    		//	var ok1 = document.getElementById("ok1");
    			var span = document.getElementsByClassName("close")[0];
    		//	var span1 = document.getElementsByClassName("close")[1];
    			modal.style.display = "block";
    			 /*btn.onclick = function() {
       				 
     				}*/
     					 
     			span.onclick = function() {
        				modal.style.display = "none";
      					}
		      ok.onclick = function() {
			window.location.href='testWindow.php';
		    	//window.open('testWindow.php');
		    	//window.open('testWindow.php', '_blank', 'toolbar=0,location=0,menubar=0');
		           // window.open("testWindow.php", "Title", "toolbar=0,location=0,directories=0,statusbar=0,menubar=0, scrollbars=0,resizable=0,copyhistory=0");
		           
		      }
     					 
 			 });
 		<?php } ?>
    	});
    	
    	
    	
    	
    	
    	
    	

    </script>
</html>


