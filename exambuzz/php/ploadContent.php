<?php
	include 'dbconn.php';
       	header("Content-Type: text/html; charset=ISO-8859-1");
	session_start();
	$user=$_SESSION['reg_no'];
	
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




$number=$_GET['newCount'];

$startbro=$_GET['startbro'];

$tableindex=$_GET['tableindex'];

$section_name=$_GET['section_name'];

$question_count=$_GET['questionCount'];

$table_name=$tableindex.$section_name;
//echo $table_name;

$current_exam_table=$tableindex.$section_name."current";

$vvroy = $section_name."btncnt";
$_SESSION[$vvroy]=$number;

$column1=$user."question";
$column2=$user."answer";

//echo $table_name;


		
//$rand_sec = $section_name;
//if(!isset($_SESSION["$rand_sec"])){
	
	//$_SESSION["$rand_sec"]=1;
	//for($kk=1;$kk<=$question_count;$kk++){
	//			$rr=$random[$kk-1];
	//			$de = "update $current_exam_table set $column1=$rr where q_number=$number";
	//			mysqli_query($conn,$de);
	//			}

//}
//$qn=$random[$number-1];

$query = "select $table_name.q_number,$table_name.question,$table_name.question_img,$table_name.A,$table_name.A_img,$table_name.B,$table_name.B_img,$table_name.C,$table_name.C_img,$table_name.D,$table_name.D_img,$table_name.E,$table_name.E_img,$table_name.answer,$table_name.marks,$table_name.explanation from $table_name where q_number=$number";
	
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$question=$row['question'];
//	echo $question;
        
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
	<script>
  
  
  	
  $(document).ready(function(){
  
		$("input[type=radio]").attr('disabled', true);
  });
		    
		   
		  
		
</script>
  <link rel="stylesheet" type="text/css" href="/exambuzz/css/testWindow.css" />
	</head>	
	
	
	<body>
	<div class="Questions" id = "Qsection">
	                    
						<h2><?php
						
						$nextcontent = 0;
						if($row['question_img']==NULL)
						    echo $number."]. ".$row['question'];
						if($row['question']==NULL)
						    {
						        echo $number.'].<img src="data:image/jpeg;base64,'.base64_encode($row['question_img']).'"/> '; ?><?php
						    }
						if($row['question_img']!=NULL && $row['question']!=NULL)
						   { echo $number.'].'.$row['question'].' <img src="data:image/jpeg;base64,'.base64_encode($row['question_img']).'"/> '; ?>
						     <?php
						   }
						if($row['A_img']!=NULL || $row['A']!=NULL)
						    $nextcontent = 1;
						
						?></h2>
	        				
	        			<?php if($nextcontent==1){ ?>	
	        				<label class="container">
	        				    
	        				    <?php
	        		    $nextcontent = 0;
						if($row['A_img']==NULL)
						    echo $number."]. ".$row['A'];
						if($row['A']==NULL)
						    {
						    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['A_img']).'"/> ';
						         ?><?php
						    }
						if($row['A_img']!=NULL && $row['A']!=NULL)
						   { echo $row['A'].' <img src="data:image/jpeg;base64,'.base64_encode($row['A_img']).'"/> ';?>
						     <?php
						   }
						if($row['B_img']!=NULL || $row['B']!=NULL)
						    $nextcontent = 1;
						
						?>
			<input id="a" type="radio" onclick="handleClick(this);" onchange="handleClick(this);" name="radio"  value="A">
						  <span class="checkmark"></span>
						</label>
						
						<?php } 
						if($nextcontent==1){
						?>
						<label class="container">
						    <?php
						$nextcontent = 0;
						if($row['B_img']==NULL)
						    echo $number."]. ".$row['B'];
						if($row['B']==NULL)
						    {
						     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['B_img']).'"/> ';
						         ?><?php
						    }
						if($row['B_img']!=NULL && $row['B']!=NULL)
						   { echo $row['B'].' <img src="data:image/jpeg;base64,'.base64_encode($row['B_img']).'"/> '; ?>
						     <?php
						   }
						if($row['C_img']!=NULL || $row['C']!=NULL)
						    $nextcontent = 1;
						
						?>
			<input id="b" type="radio" onclick="handleClick(this);" onchange="handleClick(this);" name="radio"  value="B">
						  <span class="checkmark"></span>
						</label>
						<?php }
						if($nextcontent==1){
						?>
						
						<label class="container">
						    <?php
						$nextcontent = 0;
						if($row['C_img']==NULL)
						    echo $number."]. ".$row['C'];
						if($row['C']==NULL)
						    {
						    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['C_img']).'"/> ';
						        ?><?php
						    }
						if($row['C_img']!=NULL && $row['C']!=NULL)
						   { echo $row['C'].' <img src="data:image/jpeg;base64,'.base64_encode($row['C_img']).'"/> '; ?>
						    <?php
						   }
						if($row['D_img']!=NULL || $row['D']!=NULL)
						    $nextcontent = 1;
						
						?>
			<input id="c" type="radio" onclick="handleClick(this);" onchange="handleClick(this);" name="radio"  value="C">
						  <span class="checkmark"></span>
						</label>
						<?php
						}
						if($nextcontent==1){
						?>
						<label class="container">
						    <?php
						$nextcontent = 0;
						if($row['D_img']==NULL)
						    echo $number."]. ".$row['D'];
						if($row['D']==NULL)
						    {
						    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['D_img']).'"/> ';
						         ?><?php
						    }
						if($row['D_img']!=NULL && $row['D']!=NULL)
						   { echo $row['D'].' <img src="data:image/jpeg;base64,'.base64_encode($row['D_img']).'"/> '; ?>
						   <?php
						   }
						if($row['E_img']!=NULL || $row['E']!=NULL)
						    $nextcontent = 1;
						
						?>
			<input id="d" type="radio" onclick="handleClick(this);" onchange="handleClick(this);" name="radio"  value="D">
						  <span class="checkmark"></span>
						</label>
						<?php }
						if($nextcontent==1){
						?>
							<label class="container">
						    <?php
						$nextcontent = 0;
						if($row['E_img']==NULL)
						    echo $number."]. ".$row['E'];
						if($row['E']==NULL)
						    {
						    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['E_img']).'"/> ';
						         ?><?php
						    }
						if($row['E_img']!=NULL && $row['E']!=NULL)
						   { echo $row['E'].' <img src="data:image/jpeg;base64,'.base64_encode($row['E_img']).'"/> '; ?>
						     <?php
						   }
						
						
						?>
			<input id="e" type="radio" onclick="handleClick(this);" onchange="handleClick(this);" name="radio"  value="E">
						  <span class="checkmark"></span>
						</label>
						<?php } ?>
						<h2><b>Explanation : </b><i><?php echo $row['explanation']; ?></i></h2>
	</div>
	
		
		
</body>
</html>
	
	
