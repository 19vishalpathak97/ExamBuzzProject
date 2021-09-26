<?php
session_start();

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


if(isset($_SESSION['answer']))
    unset($_SESSION['answer']);
    
$regg=$_SESSION['reg_no']; 
$percent=array();
$time=array();
 	$q3="select * from result where username='$regg'";
		   	$r3 = mysqli_query($conn,$q3);
		   	
		   	$index=1;
		   	while($row3=mysqli_fetch_assoc($r3))
		   	{
		   		$percent[$index]=$row3['percentage'];
		   		$time[$index]=$row3['time'];
		   		$index++;
		   	}
		   	//echo $time[2];

?>



<!doctype html>
<html lang="en-us">
<html>
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="/exambuzz/css/studentmodule.css" />
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
    <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
    
    
    <style>
        #nextone:nth-child(1){
	width: 4em;
	height: 4em;
	color: #009688;
	border: 3px solid #ffe670; 
	margin-left: 50%;
	border-radius: 100px;
	background: #fff;
    }
    #nextone:hover{
    	background: #fff;
    	color: #fff;
    	cursor:pointer;
    }
    #chart_div{
	    z-index:-99;
    }
    </style>
    
    
    
    

    
     <link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
    
    
    
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Percent');


<?php    for($i=1;$i<=$index;$i++){ ?>
            data.addRows([
              //  ['<?php echo $percent[$i]; ?>','<?php echo $time[$i]; ?>'']
              [<?php echo $percent[$i]; ?>,<?php echo $i; ?>]
                ]);
            <?php } ?>

  

      var options = {
        hAxis: {
          title: 'Percentage'
        },
        vAxis: {
          title: 'Test Number'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
</head>
    
<title>
    Exambuzz
    
</title>
    
<body class="noselect" ondragstart="return false;" oncontextmenu="return false;">
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
        
    	
    	
    	<section class="left" >
    	
    <div id="chart_div" style="width: 85%;height:300px"></div>


    			<div class="content-card">
                <div class="row" > 
                      <div class="column">
                        <div class="card" style="background:#009688;">
                          <div class="container">
                            <div class="inside" >
                                <center><h3 style="color:#ffe670;border-bottom:2px solid #ffe670;">Test Available</h3></center>
                                
                         </div>
                                <button class="nextPages" id="nextone" onclick="location.href = 'studentAvailableTest.php';"><img src="/exambuzz/img/angle-right.png" width="15px"  /></button>
                          </div>
                        </div>
                      </div>
        <!-- Add Test Unit -->
                      <!-- <div class="column">
                        <div class="card">
                          <div class="container">
                          <div class="inside">
                              <center><h3>Add Test</h3></center>
                          </div>
                               <button id="myBtn" class="nextPages"><img src="img/angle-right.png" width="15px" /></button>
                          </div>
                        </div>
                      </div> -->


                        
                       
        <!-- End of Add test -->              
                       <div class="column">
                        <div class="card" >
                          <div class="container">
                          <div class="inside">  
                             <center> <h3>Notes</h3></center>
                          </div>
                                <button class="nextPages" onclick="location.href = 'takeNotes.php';"><img src="/exambuzz/img/angle-right.png" width="15px" /></button>
                          </div>
                        </div>
                      </div>

                      
                      <div class="column">
                        <div class="card">
                          <div class="container">
                          <div class="inside">
                             <center> <h3>Results</h3></center>
                          </div>
                               <button class="nextPages" onclick="location.href = 'studentResult.php';"><img src="/exambuzz/img/angle-right.png" width="15px" /></button>
                          </div>
                        </div>
                      </div>
            </div>




    	</section>
    	
    	
    	
    	
</body>
