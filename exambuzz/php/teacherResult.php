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
<style>
table, th , td  {
  border: none;
}
/*table tr:nth-child(odd) {
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}*/
</style>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
    <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="/exambuzz/css/availableDataFormat.css" />
    <link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
     <script>
    	function testcount()
    	{
    		<?php
    			$query = "select count(testname) as cc from available_test";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
			$testcount=$row['cc'];
			//echo "hi";
    		
    		?>
    		//var b=<?php echo json_encode($testcount); ?>;
    		//document.write(b);
    	}
    </script>
  
</head>
    
<title>
    Exambuzz
    
</title>
    
<body onload="javascript:testcount();" class="noselect" ondragstart="return false;" oncontextmenu="return false;">
        <section class="top-navBar">
            
            <div class="logo">
                <img src="/exambuzz/img/small.png" onclick="location.href='/exambuzz/php/gohome.php'" width="75px" />
            </div>

           
        	<div class="contentLeft"`>
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

                <h1>Available Results</h1>

            <div class="rower" > 
            <?php 
            $regg=$_SESSION['reg_no'];
            	$query = "select * from new_test_details where reg_no=$regg";
		$rsb = mysqli_query($conn,$query);
		//$testlist = mysqli_fetch_array($rsb);
		//$testlist = mysqli_fetch_array($rsb);
		$testid=0;
		while ($testlist = mysqli_fetch_assoc($rsb )) {
		
		$testname = $testlist["testname"];
		$duration = $testlist["timeoftest"];
		$uploadedby = $testlist['Name'];
		//$class = $testlist['class'];
		$from_time = $testlist['startdate'];
		$to_time = $testlist['enddate'];
		$testid++;
		
		//}
		
	?>
	<!--	<div class="labelsTest">
                <div class="innerModule">
                <h3 id="testname<?php echo $testid; ?>"><?php echo $testname; ?></h3>
                <p id ="k">
                    Duration :  <?php echo $duration; ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Uploaded By : <?php echo $uploadedby; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    From : <?php echo $from_time; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    To : <?php echo $to_time; ?><br>
                    <input type="submit" id="edit<?php echo $testid; ?>" value="Edit">&nbsp;&nbsp;
                    <input type="submit" id="delete<?php echo $testid; ?>" value="Delete">&nbsp;&nbsp;
                    <input type="submit" id="preview<?php echo $testid; ?>" value="Preview">
                   
                   
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

							<table border="none">
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

						<!--		<input type="submit" class="taketest" id="edit<?php echo $testid; ?>" value="Take Test" style="color:#fff">
								-->
								
								<br>
								<input class="taketest" type="submit" id="download<?php echo $testid; ?>" value="Download">
                                
								
					      </div>
					    </div>
					    	
							    
							
					  </div>
					 
		
            
            
            
            
            
            
            
            	<?php if($testid%3==0){?>
 		
 		    <br>
 		<?php }
 		
 		} ?>
 		    	</div>
        </section>

       
</body>

<script type="text/javascript">
      // Get the modal
      var modal = document.getElementById('myModal');
      // Get the button that opens the modal
      var btn = document.getElementsByClassName("taketest")[0];
      var cancel = document.getElementById("cancel");
      var deleter = document.getElementsByClassName("taketest")[1];
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      

      // When the user clicks the button, open the modal 
     btn.onclick = function() {
        modal.style.display = "block";
      }
      /* Delete Test script*/
      deleter.onclick=function(){
            var r = confirm("Press a button!");
                if (r == true) {
                    alert("You pressed OK!");
                }
                else {
                    alert("You pressed Cancel!");
                }
      }
      /*End of Delete Test Script*/

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
        
      }
      cancel.onclick = function() {
        modal.style.display = "none";
        
      }
    </script>

<script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    		<?php for($a=1;$a<=$testid;$a++){ ?>
    		 $("#preview<?php echo $a; ?>").click(function(){
    		 	var tn=document.getElementById("testname<?php echo $a; ?>").textContent;
    		 	document.cookie = "testname = " + tn;
    		 	<?php $_SESSION['testname']=strtolower($_COOKIE['testname']); ?>
    			//console.log(tn);
    			 window.location.href='preview.php';
    			//var modal = document.getElementById('myModal');
    			 //var btn = document.getElementById("edit<?php echo $a; ?>");
    			//var ok = document.getElementById("ok");
    			//var span = document.getElementsByClassName("close")[0];
    			//modal.style.display = "block";
    			 /*btn.onclick = function() {
       				 
     				}*/
     					 
     			//span.onclick = function() {
        		//		modal.style.display = "none";
      			//		}
		      //ok.onclick = function() {
		//	window.location.href='checktest.php';
		
		  //    }
     					 
 			 });
 		<?php } ?>
 		
 		<?php for($a=1;$a<=$testid;$a++){ ?>
    		 $("#download<?php echo $a; ?>").click(function(){
    		 	var tn=document.getElementById("testname<?php echo $a; ?>").textContent;
    		 	document.cookie = "testname = " + tn;
    		 	<?php $_SESSION['testname']=strtolower($_COOKIE['testname']); ?>
    		 	var form_data1 = new FormData();
         	 	form_data1.append("testname",tn);
    			 window.location.href='DownloadResult.php';
    			 
 			 });
 		<?php } ?>
 		
 		
 		<?php for($a=1;$a<=$testid;$a++){ ?>
    		 
    		 $("#delete<?php echo $a; ?>").click(function(){
    		 	var tn=document.getElementById("testname<?php echo $a; ?>").textContent;
    		 	document.cookie = "testname = " + tn;
    		 	<?php $_SESSION['testname']=strtolower($_COOKIE['testname']); ?>
    		//	 window.location.href='delete_test.php';
 			 });
 		<?php } ?>
 		
 		
 		
 		
    	});
    	

    </script>
    
    
    
    
    
    
    
    
    <script type="text/javascript">
	end=document.getElementById("endDt");
	strt=document.getElementById("strtdate");
	subButton=document.getElementById("submitTest");
	subButton.style.background="#A9A9A9";
	subButton.setAttribute("disabled","disabled");
	end.setAttribute("disabled","disabled");
	
	
	
	function checkState(){
		if(strt.value==""||strt.value==null){
			end.setAttribute("disabled","disabled");
		}else {
			end.removeAttribute("disabled");
		}
	}
	
	
	
	//console.log(strt.value);
	function checkDerby(){
		if(strt.value==""||strt.value==null) console.log("please set the start date");
		else{
			end.removeAttribute("disabled");
			ender=end.value.split("-");
			start=strt.value.split("-");
			
			if(start[0]<=ender[0]){
				if(start[1]==ender[1]){
					if(start[2]<=ender[2]){
						console.log(strt.value);
						subButton.removeAttribute("disabled");
						subButton.style.background="#009688";
					}
					else{ console.log("please choose appropriate date");
						subButton.setAttribute("disabled","disabled");
						subButton.style.background="#A9A9A9";
					}
				
				}else if(start[1]<ender[1]){
						console.log(strt.value);
						subButton.removeAttribute("disabled");
						subButton.style.background="#009688";
				}
				
				
				
				else{
				alert("please choose appropriate date");
				 subButton.setAttribute("disabled","disabled");
				 subButton.style.background="#A9A9A9";
				 }
			}else{ alert("please choose appropriate date");
				subButton.setAttribute("disabled","disabled");
				subButton.style.background="#A9A9A9";
			}
			
		}
	}
</script>
    
    
</html>


