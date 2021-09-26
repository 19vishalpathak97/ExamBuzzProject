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
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
      <link rel="stylesheet" href="/exambuzz/css/availableDataFormat.css" />
            <link rel="stylesheet" href="/exambuzz/css/studentsResult.css" />
            <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	   <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    
    
   <!-- 

     <script>
window.onload = function () {

var options = {
    animationEnabled: true,
    theme: "light3",
    title:{
        text: "Progress Scale"
    },
    axisX:{
        valueFormatString: "DD MMM"
    },
    axisY: {
        title: "Marks",
        minimum: 30
    },
    toolTip:{
        shared:true
    },  
    legend:{
        cursor:"pointer",
        verticalAlign: "bottom",
        horizontalAlign: "left",
        dockInsidePlotArea: true,
        itemclick: toogleDataSeries
    },
    data: [{
        type: "line",
        showInLegend: true,
        name: "Topper",
        markerType: "square",
        xValueFormatString: "DD MMM, YYYY",
        color: "#F08080",
        yValueFormatString: "#,##0K",
        dataPoints: [
            { x: new Date(2017, 10, 1), y: 63 },
            { x: new Date(2017, 10, 2), y: 69 },
            { x: new Date(2017, 10, 3), y: 65 },
            { x: new Date(2017, 10, 4), y: 70 },
            { x: new Date(2017, 10, 5), y: 71 },
            { x: new Date(2017, 10, 6), y: 65 },
            { x: new Date(2017, 10, 7), y: 73 },
            { x: new Date(2017, 10, 8), y: 96 },
            { x: new Date(2017, 10, 9), y: 84 },
            { x: new Date(2017, 10, 10), y: 85 },
            { x: new Date(2017, 10, 11), y: 86 },
            { x: new Date(2017, 10, 12), y: 94 },
            { x: new Date(2017, 10, 13), y: 97 },
            { x: new Date(2017, 10, 14), y: 86 },
            { x: new Date(2017, 10, 15), y: 89 }
        ]
    },
    {
        type: "line",
        showInLegend: true,
        name: "You",
        lineDashType: "dash",
        yValueFormatString: "#,##0K",
        dataPoints: [
            { x: new Date(2017, 10, 1), y: 60 },
            { x: new Date(2017, 10, 2), y: 57 },
            { x: new Date(2017, 10, 3), y: 51 },
            { x: new Date(2017, 10, 4), y: 56 },
            { x: new Date(2017, 10, 5), y: 54 },
            { x: new Date(2017, 10, 6), y: 55 },
            { x: new Date(2017, 10, 7), y: 54 },
            { x: new Date(2017, 10, 8), y: 69 },
            { x: new Date(2017, 10, 9), y: 65 },
            { x: new Date(2017, 10, 10), y: 66 },
            { x: new Date(2017, 10, 11), y: 63 },
            { x: new Date(2017, 10, 12), y: 67 },
            { x: new Date(2017, 10, 13), y: 66 },
            { x: new Date(2017, 10, 14), y: 56 },
            { x: new Date(2017, 10, 15), y: 64 }
        ]
    }]
};
$("#chartContainer").CanvasJSChart(options);

function toogleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else{
        e.dataSeries.visible = true;
    }
    e.chart.render();
}

}
</script>

-->
<link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
  
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
<!-- 


        <section class="left" >
            <div class="progressChart" style="width: 50%;float: right">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </section>

 -->
        <section class="left availableTest">

                <h1>Result</h1>

            <div class="rower" > 
            <?php 
            $regg = $_SESSION['reg_no'];
            	$query = "select * from result where username = $regg ";
		$rsb = mysqli_query($conn,$query);
		//$testlist = mysqli_fetch_array($rsb);
		//$testlist = mysqli_fetch_array($rsb);
		$testid=0;
		while ($testlist = mysqli_fetch_assoc($rsb )) {
		
		$testname = $testlist["testname"];
		$testdate = $testlist["time"];
	
		$testid++;
		
		//}
		
	?>
	<!--	<div class="labelsTest">
                <div class="innerModule">
                <h3 id="testname<?php echo $testid; ?>"><?php echo $testname; ?></h3>
                <p id ="k">
                    Test Date :  <?php echo $testdate; ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
                    <input type="submit" class="taketest" id="view<?php echo $testid; ?>" value="View" style="color:#fff">
                   
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
										Test Date :
									</td>
									<td>
										<?php echo $testdate; ?>
									</td>
								</tr>
								
							</table>

					        	<input type="submit" class="taketest" id="view<?php echo $testid; ?>" value="View" style="color:#fff">
								
					      </div>
					    </div>
					    	
							    
							
					  </div>
					 
			
                    
                    
                    
                    
                    
<?php if($testid%3==0){?>
 		
 		    <br>
 		<?php }
 		
 		} ?>
 		</div>
        </section>
        
        
         <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                   </div>
        
       
</body>

 <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    		<?php for($a=1;$a<=$testid;$a++){ ?>
    		 $("#view<?php echo $a; ?>").click(function(){
    		 	var tn=document.getElementById("testname<?php echo $a; ?>").textContent;
    		 	document.cookie = "testname = " + tn;
    		 	<?php $_SESSION['testname']=$_COOKIE['testname']; 
    		 	
    		 //	$qqq = "select ";
    		 	
    		 	
    		 	?>
    		 	$.ajax({
				type: 'GET',
				url: "get_result.php", 
				data: {testname:tn},
				success: function(data)
				{
					$("#myModal").html(data);
		
				}
			}); 
    			//console.log(tn);
    			// window.location.href='testWindow.php';
    			var modal = document.getElementById('myModal');
    			 //var btn = document.getElementById("edit<?php echo $a; ?>");
    			var ok = document.getElementById("ok");
    			var span = document.getElementsByClassName("close")[0];
    			modal.style.display = "block";
    			 /*btn.onclick = function() {
       				 
     				}*/
     					 
     			span.onclick = function() {
        				modal.style.display = "none";
      					}
		    /* cancel.onclick = function() {
        modal.style.display = "none";
        
      }
     	*/				 
 			 });
 		<?php } ?>
    	});
    	
    	
    	
    	
    	
    	
    	

    </script>



</html>

