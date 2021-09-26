<?php
include 'dbconn.php';
session_start();
//$reg_no=$_SESSION['reg_no'];
//echo $reg_no;
header("Content-Type: text/html; charset=ISO-8859-1");
//$user=$_SESSION["reg_no"];
//$_SESSION['value']=0;
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
?>			
<html>
<head>
	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favic.ico" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/exambuzz/css/testWindow.css" />	
    
 <script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
    </script>
     <script type="text/javascript">
    
     	var count = 1;
        var pre=0;
     //	var attempted=0;
     	var sec_name='';
     
    
     	
  
   	
   	function get_question_data()
   	{
   		<?php

		$sectioncount = 0;
		//$test = "test1";
		$query = "select * from new_test_details where testname='$tableindex'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$sectioncount=$row['section_count'];
		
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
		
		for($i=1;$i<=$sectioncount;$i++)
		{
		    $colname1 = "Sheet".($i)."cnt";
		    $colname2 = "Sheet".($i);
		    $scc[$i] = $row[$colname1];
		    $sn[$i] = $row[$colname2];
	
		    
					$testcount = $test."count";
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
					
					
					
				
					
				
					
					
					
					//$i++;
		}
					
				?>
				
                        		
   	}
   	
   	function progress()
   	{
   		$.ajax({
				type: 'GET',
				url: "progress.php", 
				data: {max1:'<?php echo $total; ?>'},
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
				$('#<?php echo $abc; ?>'+count).css("background-color","blue");
				$('#<?php echo $abc; ?>'+count).css("color","#fff");
				
				
				 document.cookie = "selected = " + '';
		    		 document.cookie = "selectedq = " + '';
		    		 document.cookie = "vishal = " + '';
			
				$.ajax({
						type: 'GET',
						url: "ploadContent.php", 
						data: {newCount:1,startbro:0,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[1]; ?>',section_name:'<?php echo $sn1[1]; ?>'},
						success: function(data)
						{
							$("#Qsection").html(data);
							//enableall();
							var s=getCookie("vishal");
								$('#<?php echo $abc; ?>'+count).css("background-color","blue");
								var num = parseInt(s);
								$('#<?php echo $abc; ?>'+num).css("background-color","green");
				
						}
					}); 
			}
   	
   
   	
	$(document).ready(function(){
	
			var sec_name = '';
			var sec_count = '';
	
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
						url: "ploadContent.php", 
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
						url: "ploadContent.php", 
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
					set();
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
								url: "pnext.php", 
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
						set();
						//}
						var a=getCookie("stt");
			});
			
			$("#previous").click(function(){
						
						if(count>1)
							count = count - 1;
							//$('#'+sec_name+count).css("background-color","blue");
								//$('#'+count).css("background-color","yellow");
						//		$('#'+sec_name+count).css("color","black");
								$.ajax({
									type: 'GET',
									url: "pprev.php", 
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
								
											$('#'+sec_name+num).css("color","black");
											$('#'+sec_name+num).css("background-color","green");
							
										}
										else
										{
											$('#'+sec_name+count).css("color","black");
											$('#'+sec_name+count).css("background-color","blue");
								
											$('#'+sec_name+num).css("color","black");
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
								set();
							//}
			});
			
			$("#previous").click(function(){
				$.ajax({
								type: 'GET',
								url: "pclear.php", 
								data: {
		newCount:count,startbro:1,tableindex:'<?php echo $tableindex; ?>',questionCount:sec_count,section_name: sec_name
								
									},
								success: function(data)
								{
									count--;
								}
					});
			});
			
		document.getElementById("section1").click();	
				
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
   
   
  
    
</head>
<body oncontextmenu="return false;" onload = "javascript:set_time();set();get_question_data(); start();progress();" >
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
	        		<button class="buttons" id= "submit" onclick="location.href='/exambuzz/php/gohome.php'">Finish Review</button>
	        	</div>

	        	<div class="timer">
	        		<center><h4 id ="timer">--:--:--</h4></center>
	        	</div>


	        	<div class="mainTestWindow">
	        		<div class="flag">
	        			
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
	        
	      
	        
	        
	        
	        
        </section>
</body>






</html>
