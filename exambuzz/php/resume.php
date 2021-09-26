<?php

//require 'checktest.php';
include 'dbconn.php';
session_start();
$regg=$_SESSION['reg_no'];
$testname=strtolower($_COOKIE['testname']);
$user=$_SESSION["session_id"];
date_default_timezone_set('Asia/Calcutta');
header("Content-Type: text/html; charset=ISO-8859-1");
$user=$_SESSION["reg_no"];
$_SESSION['value']=0;
$tableindex=strtolower($_COOKIE['testname']);


		$query = "select count(status) as cc from time where reg_no='$regg' and testname='$testname'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$testcount=$row['cc'];
		//echo $testcount;
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
				{}
				//header("Location: /exambuzz/php/resume.php");}
			else if($status=="completed")
				//echo 2;
				header("Location: /exambuzz/php/studentDashboard.php");
			else
				//echo 3;
				echo "<script>confirm('You have already done with this test');window.location.href='studentDashboard.php';</script>";
		}













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
	
	

	

	
	

	
	

//if(!isset($_SESSION['testwindow']))
  //  $_SESSION['testwindow']=1;
	 
   		$rss = mysqli_query($conn,"select lastseen from time where reg_no=$regg");
		$exists = (mysqli_num_rows($rss));
		$query = "select timeoftest from new_test_details where testname='$tableindex'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$timeoftest=$row['timeoftest'];
		
		//$a=$_SESSION['reg_no'];
		if(!$exists){
		   $date1 = date("Y-m-d H:i:s");
            //$date->add(new DateInterval('P0Y0M0DT2H0M0S'));
            $date   = date("Y-m-d H:i:s", strtotime("+$timeoftest minutes"));
            //$a = $date1->format('Y-m-d H:i:s');
            //b = $date->format('Y-m-d H:i:s');
            
   		$de = "insert into time values ($regg,'$date1','$date','$date1','$tableindex','started')";
		mysqli_query($conn,$de);
		}
   		


?>			
<html >
<head>
	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favic.ico" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/exambuzz/css/testWindow.css" />	
     <script type="text/javascript">
        
        
        
        
        
      /*  
        
        function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

var elem = document.body; // Make the body go full screen.
requestFullScreen(elem);
        
        
        
        
        




function disableButtonsDown(e) { 
    if ((e.which || e.keyCode) == 116) e.preventDefault(); 
};
$(document).on("keydown", disableButtonsDown);

        
        */
        
        
        
     	var count = 1;
        var pre=0;
     	var attempted=0;
     //	var sec_name='';
     	var x=0;
     		var sec_name = '';
			var sec_count = '';
     
     	
     	function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
		    c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
		    return c.substring(name.length, c.length);
		}
	    }
	    return "";
	}
     
    
     	
   	function set_time()
   	{
   
   	}
   	
   	function get_question_data()
   	{
   	    $(document).ready(function(){
   		<?php

		$query = "select * from new_test_details where testname='$tableindex'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$sectioncount=$row['section_count'];
		$singlecount = $row['nsection_count'];
		
		$scc=array();
		$sn=array();
		$sn1 = array();
		$sn1[1] = "Sheet1";
		$sn1[2] = "Sheet2";
		$sn1[3] = "Sheet3";
		$sn1[4] = "Sheet4";
		$sn1[5] = "Sheet5";
		$sn1[6] = "Sheet6";
		$sn1[7] = "Sheet7";
		$sn1[8] = "Sheet8";
		$total=0;
		$attempt=0;
		
		$countofgreen=0;
		for($i=1;$i<=$sectioncount;$i++)
		{
		    $colname1 = "Sheet".($i)."cnt";
		    $colname2 = "Sheet".($i);
		    $scc[$i] = $row[$colname1];
		    $sn[$i] = $row[$colname2];
		    
					//$testcount = $test."count";
					//$query = "select test_section_name,question_count from test_section where test_name='$tableindex'";
					//$resultaaa = mysqli_query($conn,$query);
					
					//while ($row = mysqli_fetch_assoc($resultaaa )) {
					
					//$sn[$i]=$row['test_section_name'];
					//$scc[$i]=$row['question_count'];
					$total=$total+$scc[$i];
					$vvroy = $sn1[$i]."btncnt";
					$_SESSION[$vvroy]=1;
					//creating session count for storing button position
					//$i++;
					
					
					
					$current_exam_table=$tableindex.$sn1[$i]."current";
					$column1=$user."question";
					$column2=$user."answer";
					
					$random=array();
					$random = range(1,$scc[$i]);
					shuffle($random);
					
					$result = mysqli_query($conn,"SHOW COLUMNS FROM $current_exam_table LIKE '$column1';");
					$exists = (mysqli_num_rows($result));
					
					if(!$exists){
				//-----------------------------------------------------------------------	
					
				$alter = "alter table $current_exam_table add column $column1 int,add column $column2 varchar(20);";
						mysqli_query($conn,$alter);
					
						for($kk=1;$kk<=$scc[$i];$kk++){
						$fpp=$random[$kk-1];
				$de = "update $current_exam_table set $column1=$fpp where q_number=$kk";
							mysqli_query($conn,$de);
						}
					
				//---------------------------------------------------------------------------	
					
					}
					
					
					$green = "select q_number from $current_exam_table where $column2!= 'NULL'";
					$green_result = mysqli_query($conn,$green);
					
						while ($row_green = mysqli_fetch_assoc($green_result)) {
						    $green_button = $row_green['q_number'];
						    //echo "hi";
						    ?>
					
					$('#'+'<?php echo $sn1[$i]; ?>'+'<?php echo $green_button; ?>').css("color","#fff");
					$('#'+'<?php echo $sn1[$i]; ?>'+'<?php echo $green_button; ?>').css("background-color","green");
					
								<?php
								$countofgreen++;

                }
					
					
					//$i++;
				}
				$_SESSION['value']=$countofgreen;	
				?>
   	    });
                        		
   	}
   	
   	function progress()
   	{
   		$.ajax({
				type: 'GET',
				url: "progress.php", 
				data: {max1:'<?php echo $total; ?>',secname:sec_name},
				success: function(data)
				{
					$("#progress").html(data);
		
				}
			}); 
   	}
   	function progress_for_resume()
   	{
   		$.ajax({
				type: 'GET',
				url: "progress_for_resume.php", 
				data: {max1:'<?php echo $total; ?>',secname:sec_name},
				success: function(data)
				{
					$("#progress").html(data);
		
				}
			}); 
   	}
   	
   	function start()
			{
				count = 1;
				<?php $abc=$sn1[1]; 
				$_SESSION["$sn1[1]"]=1;
				
				?>
					color=$('#<?php echo $abc; ?>'+count).css("background-color");
						
								//	if (color == "rgb(0, 128, 0)" || color == "yellow")
								//	{
								
										$('#<?php echo $abc; ?>'+count).css("color","#fff");
										$('#<?php echo $abc; ?>'+count).css("background-color","blue");
							
								//	}
								
				
				
				 document.cookie = "selected = " + '';
		    		 document.cookie = "selectedq = " + '';
		    		 document.cookie = "vishal = " + '';
			
				$.ajax({
						type: 'GET',
						url: "loadContent.php", 
						data: {newCount:1,startbro:0,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[1]; ?>',section_name:'<?php echo $sn1[1]; ?>'},
						success: function(data)
						{
							$("#Qsection").html(data);
							//enableall();
							var s=getCookie("vishal");
								//$('#<?php echo $abc; ?>'+count).css("background-color","blue");
								var num = parseInt(s);
								$('#<?php echo $abc; ?>'+num).css("background-color","green");
				
						}
					}); 
			}
   	function myStopFunction() {
  clearInterval(x);
}
   	
   	function set()
   	{
   		//var count=1;
   		$.ajax({
			type: 'GET',
			url: "timer1.php", 
			data: {newCount:count},
			success: function(data)
			{
				var diff=data;
				if(diff==100)
					{
						document.getElementById("timer").innerHTML = "EXPIRED";
						window.location="answer.php";
						clearInterval(x);
						return;
					}
				var days = Math.floor(diff/(60*60*24));   
				var hours   = Math.floor((diff-(days*60*60*24))/(60*60));   
				var minutes = Math.floor((diff-(days*60*60*24)-(hours*60*60))/60);
				var seconds = Math.floor((diff-(days*60*60*24)-(hours*60*60)-(minutes*60)));
				
				var c = seconds;
				var m = minutes;
				var h = hours;

			    x = setInterval(function timeout()
				{
			   
					if(c==0)
					{
						c=59;
						m=m-1;

					}
					if(m==0)
					{
						c=59;
						m=59;
						h=h-1;
					}
				    document.getElementById("timer").innerHTML = h + "h "
				    + m + "m " + c + "s ";
				    
				    c = c - 1;
				    
				    if (h < 0) {
					clearInterval(x);
					document.getElementById("timer").innerHTML = "EXPIRED";
					window.location="answer.php";
				    }
				},1000);
				
	
			}
		});
   	}
   	
   	
   	
   	function update_set()
   	{
   		//var count=1;
   		$.ajax({
			type: 'GET',
			url: "timer2.php", 
			data: {newCount:count},
			success: function(data)
			{
				var diff=data;
				if(diff==100)
					{
						document.getElementById("timer").innerHTML = "EXPIRED";
					//	window.location="studentResult.php";	
					//	return;
					}
				var days = Math.floor(diff/(60*60*24));   
				var hours   = Math.floor((diff-(days*60*60*24))/(60*60));   
				var minutes = Math.floor((diff-(days*60*60*24)-(hours*60*60))/60);
				var seconds = Math.floor((diff-(days*60*60*24)-(hours*60*60)-(minutes*60)));
				
				var c = seconds;
				var m = minutes;
				var h = hours;

			    x = setInterval(function timeout()
				{
			   
					if(c==0)
					{
						c=59;
						m=m-1;

					}
					if(m==0)
					{
						c=59;
						m=59;
						h=h-1;
					}
				    document.getElementById("timer").innerHTML = h + "h "
				    + m + "m " + c + "s ";
				    
				    c = c - 1;
				    
				    if (h < 0) {
					clearInterval(x);
					document.getElementById("timer").innerHTML = "EXPIRED";
					window.location="studentResult.php";
				    }
				},1000);
				
	
			}
		});
   	}
   	
	$(document).ready(function(){
	
		
	
		   	<?php for($a=1;$a<=10;$a++){ ?>
		   	$("#section<?php echo $a; ?>").click(function () {
		   		count=1;
				pre=0;
				    $header = $(this);
				    var v=1;
				    $content = $("#content<?php echo $a; ?>");//$header.next();
				    $(".content").hide("fast");
				    $content.slideToggle(500, function () {
					$header.text(function () {});
					
					
					sec_name = <?php echo json_encode($sn1[$a]); ?>;
					sec_count = <?php echo json_encode($scc[$a]); ?>;
					
					
					$.ajax({
						type: 'GET',
						url: "loadContent.php", 
						data: {
newCount:1,startbro:0,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[$a]; ?>',section_name:'<?php echo $sn1[$a]; ?>'
							},
						success: function(data)
						{
							$("#Qsection").html(data);
						}
					    }); 
				    });
				});
			<?php } ?>
                        
                        
			<?php for($j=1;$j<=$sectioncount;$j++){ 
			 for($i=1;$i<=$scc[$j];$i++){
			 ?>
			$("#<?php echo $sn1[$j].$i; ?>").click(function(){
				var btnCount = <?php echo $i; ?>;
				
				//alert('New value: ' + btnCount);
				$.ajax({
						type: 'GET',
						url: "loadContent.php", 
						data: {
		newCount:btnCount,startbro:1,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[$j]; ?>',section_name:'<?php echo $sn1[$j]; ?>'
							},
						success: function(data)
						{
							$("#Qsection").html(data);
							count=btnCount;
							pre=count;
							
							var s=getCookie("vishal");
							var num = parseInt(s);
							
							
							color=$('#<?php echo $sn1[$j]; ?>'+count).css("background-color");
						
							if (color == "rgb(0, 128, 0)" || color == "green")
							{
								
								$('#<?php echo $sn1[$j]; ?>'+num).css("color","#fff");
								$('#<?php echo $sn1[$j]; ?>'+num).css("background-color","green");
							
							}
							else
							{
								$('#<?php echo $sn1[$j]; ?>'+count).css("color","#fff");
								$('#<?php echo $sn1[$j]; ?>'+count).css("background-color","blue");
								
								$('#<?php echo $sn1[$j]; ?>'+num).css("color","#fff");
								$('#<?php echo $sn1[$j]; ?>'+num).css("background-color","green");
							}
							if (color == "rgb(221, 221, 221)" || color == "yellow")
							{
								$('#<?php echo $sn1[$j]; ?>'+count).css("background-color","blue");
							}
				
						}
					}); 
					progress();
				//	set();
			});
			
			<?php } } ?>
			
			/////////////////////////////////////////////////////////////
			
			$("#next").click(function(){
						//$('#'+sec_name+count).css("color","black");
						count++;
						if(count > sec_count){ count=count-1;}
						//else
						//{
						//alert(sec_name);
							$.ajax({
								type: 'GET',
								url: "next.php", 
								data: {
		newCount:count,startbro:1,tableindex:'<?php echo $tableindex; ?>',questionCount:sec_count,section_name: sec_name
									},
								success: function(data)
								{
									$("#Qsection").html(data);
										var s=getCookie("vishal");
										//$('#'+count).css("background-color","yellow");
										var num = parseInt(s);
										//$('#'+num).css("background-color","green");
								
									color=$('#'+sec_name+count).css("background-color");
						
									if (color == "rgb(0, 128, 0)" || color == "green")
									{
								
										$('#'+sec_name+num).css("color","#fff");
										$('#'+sec_name+num).css("background-color","green");
							
									}
									else
									{
										$('#'+sec_name+count).css("color","#fff");
										$('#'+sec_name+count).css("background-color","blue");
								
										$('#'+sec_name+num).css("color","#fff");
										$('#'+sec_name+num).css("background-color","green");
									}
									if (color == "rgb(221, 221, 221)" || color == "yellow")
									{
										$('#'+sec_name+count).css("background-color","blue");
									}
				
								}
							}); 
						
						progress();
						myStopFunction();
						set();
						//}
						//var a=getCookie("stt");
			});
			
			$("#previous").click(function(){
						
						if(count>1)
							count = count - 1;
							//$('#'+sec_name+count).css("background-color","blue");
								//$('#'+count).css("background-color","yellow");
						//		$('#'+sec_name+count).css("color","black");
								$.ajax({
									type: 'GET',
									url: "prev.php", 
									data: {
			newCount:count,startbro:1,tableindex:'<?php echo $tableindex; ?>',questionCount:sec_count,section_name: sec_name
									},
									success: function(data)
									{
										$("#Qsection").html(data);
							
										var s=getCookie("vishal");
										var num = parseInt(s);
							
										color=$('#'+sec_name+count).css("background-color");
						
										if (color == "rgb(0, 128, 0)" || color == "green")
										{
								
											$('#'+sec_name+num).css("color","#fff");
											$('#'+sec_name+num).css("background-color","green");
							
										}
										else
										{
											$('#'+sec_name+count).css("color","#fff");
											$('#'+sec_name+count).css("background-color","blue");
								
											$('#'+sec_name+num).css("color","#fff");
											$('#'+sec_name+num).css("background-color","green");
										}
										if (color == "rgb(221, 221, 221)" || color == "yellow")
										{
											$('#'+sec_name+count).css("background-color","blue");
										}
				
				
									}
									//enableall();
								}); 
								progress();
							//	set();
							//}
			});
			
			$("#clear").click(function(){
				$.ajax({
								type: 'GET',
								url: "clear.php", 
								data: {
		newCount:count,startbro:1,tableindex:'<?php echo $tableindex; ?>',questionCount:sec_count,section_name: sec_name
								
									},
								success: function(data)
								{
									//count--;
									$("#Qsection").html(data);
									var s=getCookie("vishal");
									document.cookie = "vishal = " + '';
									var num = parseInt(s);
									
										$('#'+sec_name+num).css("color","#fff");
											$('#'+sec_name+num).css("background","blue");
								}
					});
					progress();
			});


	$("#review").click(function(){
				
							
									
										$('#'+sec_name+count).css("color","#fff");
											$('#'+sec_name+count).css("border","2px solid red");
											//$('#'+sec_name+count).css("border-color","red");
						
			});	
			
		$("#unreview").click(function(){
				
							
									
										$('#'+sec_name+count).css("color","#fff");
											$('#'+sec_name+count).css("border","transparent");
											//$('#'+sec_name+count).css("border-color","red");
						
			});	
			
			
			
		document.getElementById("section1").click();
		
		
		
		
		
		
		
		
		
		
		///////////////////////////////////Test Fullscreen code////////////////////////////////
		
		
		 if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                    (!document.mozFullScreen && !document.webkitIsFullScreen)) {
             $scope.topMenuData.showSmall = true;
                if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {

                  $scope.topMenuData.showSmall = false;
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
		
		
		
		
		
		
		
		
		
				
});

			

   	
   </script>
    <script type="text/javascript">
    	function uncheckAll() {
			allChk = document.getElementByType("radio");
			     for (i = 0; i < allChk.length; i++)
			        {
			        document.container.allChk[i].checked = false;
			        }
			}
    </script>
   
   
   
   
   
   
   
   
   
   
   
<!--  <script>
        $(document).ready(function(){

            if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                    (!document.mozFullScreen && !document.webkitIsFullScreen)) {
             $scope.topMenuData.showSmall = true;
                if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {

                  $scope.topMenuData.showSmall = false;
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
</script>-->
   
   
   
   
   
   
   
   
  
    
</head>
<body oncontextmenu="return false;" onload = "javascript: set(); get_question_data(); start();progress_for_resume(); " >
<!--getting section name -->

        <section class="sideSections" >
	        <div class="testNumberSection">
	        	<div class="sectionNumber">
	        		<div class="containers"><center>
	        		
				   <!--  <div class="header" id="section2"><span>Section 2</span>

				    </div>-->
				    <?php for($b=1;$b<=$sectioncount;$b++){?>
				    <center><div class="header" id="section<?php echo $b; ?>">
				    
						<span id ="sec_value" style="color:#009688">
							<?php
					
							echo strtoupper($sn[$b]);
							?>
							
						</span>
						
				    </div></center>
				    <div class="content" id="content<?php echo $b; ?>">
					<!--<center><h2 style="color: #009688;">Section 1 : Subject</h2>-->
						<div class="secNumber">
						<center>
							<table id ="list" style="alignment:center;">
							
								<tr>

							<?php
							for($i=1;$i<=$scc[$b];$i++){ ?>
                                                        
		    		<td><button class="ag" style='border-radius:100px;' id="<?php echo $sn1[$b].$i ?>"><?php echo $i; ?></button></td>

							<?php

                                                        if($i%4==0) { ?>
							</tr><tr>
                                                     
							<?php  }    
                                                            } ?>
							
							
							</table>
							</center>
						</div>
				    </div>
				    <?php } ?>
				    
				    </center>
				</div>
	        		</center>
	        	</div>
	        		
	        </div>
	        <div class="questionSection" >
	        	<div class="contentClass" id= "progress">
	        		
	        	</div>
	        	<div class="finish">
	        		<button class="buttons" id= "submit">Finish Test</button>
	        	</div>

	        	<div class="timer">
	        		<center><h4 id ="timer">--:--:--</h4></center>
	        	</div>


	        	<div class="mainTestWindow">
	        		<div class="flag">
	        			<button class="b1" title="Review Button" id = "review" style="background:#009688;color:red">&#9873;</button>
	        			<button class="b1" title="Unreview Button" id = "unreview">&#9872;</button>
	        		</div>
	        		<div id="Qsection" style="overflow:auto;">
	        		  
	        		</div>
	        		<div class="Butts" id = "b1d">
	        			
	        			<button class="b1" id = "previous">Previous</button>
	        			<button class="b1" id = "next">Next</button>
	        			<button class="b1" id = "clear">Clear</button>
		        		
	        		</div>
	        	</div>

	        </div>
	        
	        
	        
	        
	        <section id="myModal" class="modal">

                          <!-- Modal content -->
                          <div class="modal-content"  style="width:20em">
                           <!-- <span class="close">&times;</span>-->
                            <p id="timer"></p>
                            <h2>Test Name: Chemistry</h2>
                             <div id="sider" class="studentPerformance">
                                 <table >
                       

                        <tr>
                          <td>
                            <h1>Your Score</h1>
                          </td>
                          <td>
                            41
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Total Question
                          </td>
                          <td>
                            15
                          </td>
                        </tr>

                        <tr>
                          <td>
                            Questions Attempted
                          </td>
                          <td>
                            12
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Correct Answer Attempted
                          </td>
                          <td>
                            4
                          </td>
                        </tr>
                        
                      </table>
                          </div>
                          <center><input type="button" class="buttons" name="cancel" id="cancel" value="Go Home"></center>

                        </div>
	        
	        
	        </section>
	        
	        
	        
	        
        </section>
</body>







<script>









              
        
        function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

var elem = document.body; // Make the body go full screen.
requestFullScreen(elem);
        
        
        
        
        




function disableButtonsDown(e) { 
    if ((e.which || e.keyCode) == 116) e.preventDefault(); 
};
$(document).on("keydown", disableButtonsDown);

        








	$(document).ready(function(){
		$("#submit").click(function(){
			
				if(confirm('Do you want to submit'))
				{
					<?php
					$de = "delete from time where reg_no=$reg_no";
					mysqli_query($conn,$de);
					
					$de = "update last_time set status='completed' where reg_no='$reg_no' and testname='$tableindex'";
					mysqli_query($conn,$de);
					?>
					
					window.close();
					window.location.href="answer.php";
				}
				
				/*var modal = document.getElementById('myModal');
      // Get the button that opens the modal
      				//var btn = document.getElementById("details");
      				var cancel = document.getElementById("cancel");
      // Get the <span> element that closes the modal
      				var span = document.getElementsByClassName("close")[0];
      

      // When the user clicks the button, open the modal 
			    //  btn.onclick = function() {
				modal.style.display = "block";
			    //  }
			      
			      /*End of Delete Test Script*/

			      // When the user clicks on <span> (x), close the modal
			    /*  span.onclick = function() {
				modal.style.display = "none";
		
			      }
			      cancel.onclick = function() {
				//modal.style.display = "none";
				window.close();
				window.location.href="studentDashboard.php";
		
			      }
				
				
				
				// window.close();
				// window.location.href='studentResult.php';
				}
			});*/
			
	
	
	
	
	});
});

</script>
</html>
