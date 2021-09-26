<?php
include 'dbconn.php';
session_start();

header("Content-Type: text/html; charset=ISO-8859-1");
$user=$_SESSION["session_id"];
$_SESSION['value']=0;
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
	
$tableindex="test1";	
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
     	var attempted=0;
     	var sec_name='';
     
     	
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
   		<?php $sid=101; 
   		
   		$de = "insert into time values($sid,now(),DATE_ADD(now(), INTERVAL 2 HOUR),now());";
		mysqli_query($conn,$de);
   		?>
   	}
   	
   	function get_question_data()
   	{
   		<?php

		$sectioncount = 0;
		$test = "test1";
		$query = "select count($test) as cc from test_sections";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$sectioncount=$row['cc'];
		$scc=array();
		$sn=array();
		$total=0;
		$attempt=0;
	
		for($i=1;$i<=$sectioncount;$i++){ 
		    
					$testcount = $test."count";
					$query = "select $test,$testcount from test_sections where sc=$i";
					$result = mysqli_query($conn,$query);
					$row = mysqli_fetch_array($result);
					$sn[$i]=$row[$test];
					$scc[$i]=$row[$testcount];
					$total=$total+$scc[$i];
					$vvroy = $sn[$i]."btncnt";
					$_SESSION[$vvroy]=1;
					//creating session count for storing button position
					
					
					
					
					$current_exam_table=$tableindex.$sn[$i]."current";
					$column1=$user."question";
					$column2=$user."answer";
					
					$random=array();
					$random = range(1,$scc[$i]);
					shuffle($random);
					
					$result = mysqli_query($conn,"SHOW COLUMNS FROM $current_exam_table LIKE '$column1';");
					$exists = (mysqli_num_rows($result));
					if($exists)
					{
						$iii = "SELECT q_number FROM $current_exam_table WHERE $column2 != 'NULL';";
						$ans = mysqli_query($conn,$iii);
						
						while ($row = mysqli_fetch_assoc($ans)) {
						       $saved_count = $row['q_number']; 
						       ?>
						       //echo $summary;
						       $('#<?php echo $sn[$i].$saved_count; ?>').css("color","black");
							$('#<?php echo $sn[$i].$saved_count; ?>').css("background-color","green");
							<?php
						}
						
					}
					if(!$exists){
				$alter = "alter table $current_exam_table add column $column1 int,add column $column2 varchar(20);";
						mysqli_query($conn,$alter);
					
						for($kk=1;$kk<=$scc[$i];$kk++){
						$fpp=$random[$kk-1];
				$de = "insert into $current_exam_table(q_number,$column1,$column2) values($kk,$fpp,NULL);";
							mysqli_query($conn,$de);
						}
					}
				}
					
				?>
				
                        		
   	}
   	
   	function initilize_buttons()
   	{
   		<?php
   		

		while ($row = mysqli_fetch_array($ans , MYSQLI_NUM)) {
		       $summary = $row['q_number']; 
		       ?>
		       //echo $summary;
		       $('#<?php echo $sn[$j]; ?>'+num).css("color","black");
								$('#<?php echo $sn[$j]; ?>'+num).css("background-color","green");
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
				<?php $abc=$sn[1]; 
				$_SESSION["$sn[1]"]=1;
				
				?>
				$('#<?php echo $abc; ?>'+count).css("background-color","blue");
				$('#<?php echo $abc; ?>'+count).css("color","black");
				
				
				 document.cookie = "selected = " + '';
		    		 document.cookie = "selectedq = " + '';
		    		 document.cookie = "vishal = " + '';
			
				$.ajax({
						type: 'GET',
						url: "loadContent.php", 
						data: {newCount:1,startbro:0,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[1]; ?>',section_name:'<?php echo $sn[1]; ?>'},
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
					return;}
				var days = Math.floor(diff/(60*60*24));   
				var hours   = Math.floor((diff-(days*60*60*24))/(60*60));   
				var minutes = Math.floor((diff-(days*60*60*24)-(hours*60*60))/60);
				var seconds = Math.floor((diff-(days*60*60*24)-(hours*60*60)-(minutes*60)));
				
				var c = seconds;
				var m = minutes;
				var h = hours;

			    	var x = setInterval(function timeout()
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
					//window.location="College.php";
				    }
				},1000);
				
	
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
					
					
					sec_name = <?php echo json_encode($sn[$a]); ?>;
					sec_count = <?php echo json_encode($scc[$a]); ?>;
					
					
					$.ajax({
						type: 'GET',
						url: "loadContent.php", 
						data: {
newCount:1,startbro:0,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[$a]; ?>',section_name:'<?php echo $sn[$a]; ?>'
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
			$("#<?php echo $sn[$j].$i; ?>").click(function(){
				var btnCount = <?php echo $i; ?>;
				
				//alert('New value: ' + btnCount);
				$.ajax({
						type: 'GET',
						url: "loadContent.php", 
						data: {
		newCount:btnCount,startbro:1,tableindex:'<?php echo $tableindex; ?>',questionCount:'<?php echo $scc[$j]; ?>',section_name:'<?php echo $sn[$j]; ?>'
							},
						success: function(data)
						{
							$("#Qsection").html(data);
							count=btnCount;
							pre=count;
							
							var s=getCookie("vishal");
							var num = parseInt(s);
							
							
							color=$('#<?php echo $sn[$j]; ?>'+count).css("background-color");
						
							if (color == "rgb(0, 128, 0)" || color == "green")
							{
								
								$('#<?php echo $sn[$j]; ?>'+num).css("color","black");
								$('#<?php echo $sn[$j]; ?>'+num).css("background-color","green");
							
							}
							else
							{
								$('#<?php echo $sn[$j]; ?>'+count).css("color","black");
								$('#<?php echo $sn[$j]; ?>'+count).css("background-color","blue");
								
								$('#<?php echo $sn[$j]; ?>'+num).css("color","black");
								$('#<?php echo $sn[$j]; ?>'+num).css("background-color","green");
							}
							if (color == "rgb(221, 221, 221)" || color == "yellow")
							{
								$('#<?php echo $sn[$j]; ?>'+count).css("background-color","blue");
							}
				
						}
					}); 
					progress();
					set();
			});
			
			<?php } } ?>
			
			$("#submit").click(function(){
			
				if(confirm('Do you want to submit'))
				{
				 window.close();
				 window.location.href='answer.php';
				}
			});
			
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


        <section class="sideSections">
	        <div class="testNumberSection">
	        	<div class="sectionNumber">
	        		<div class="container"><center>
	        		
				   <!--  <div class="header" id="section2"><span>Section 2</span>

				    </div>-->
				    <?php for($b=1;$b<=$sectioncount;$b++){?>
				    <div style="background-color: transparent;" class="header" id="section<?php echo $b; ?>">
				    
						<span id ="sec_value">
							<?php
					
							echo $sn[$b];
							?>
							
						</span>
				    </div>
				    <div class="content" id="content<?php echo $b; ?>">
					<!--<center><h2 style="color: #009688;">Section 1 : Subject</h2>-->
						<div class="secNumber">
						<center>
							<table id ="list" style="alignment:center;">
							
								<tr>

							<?php
							for($i=1;$i<=$scc[$b];$i++){ ?>
                                                        
		    		<td><button class="ag" style='border-radius:25%;' id="<?php echo $sn[$b].$i ?>"><?php echo $i; ?></button></td>

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
	        <div class="questionSection">
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
