<?php
session_start();
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
    <link rel="stylesheet" href="/exambuzz/css/studentmodule.css" />
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
    
     
</head>
    
<title>
    
    
</title>
    
<body>
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
    				<p>nishit123@gmail.com</p>
    				<a href="">View Profile</a>
    				</div>
    			</div>
    			<input type="submit" value="Logout" id="logoutButt">
    		</div>
        	</div>
    		
    		
        </section>

        <section class="right">
                <div class="work">
                    <button class="inWork">
                        <a href="#">Home&nbsp;<img src="/exambuzz/img/home.png" width="30px" /></a>
                    </button><br/>
                    <button class="inWork">
                        <a href="#">About Us&nbsp;<img src="/exambuzz/img/user-alt.png" width="30px" /></a>
                    </button><br/>
                    <button class="inWork">
                        <a href="#">Sample&nbsp;<img src="/exambuzz/img/user.svg" width="20px" /></a>
                    </button><br/>
                </div>

        </section>
        
    	
    	
    	<section class="left">
    		<div class="progressChart">
    			<div id="chartContainer" style="height: 300px; width: 100%;"></div>
    		</div>
    	</section>
    	
    	<Button>Start test</Button>
    	
    	
    	
    	
</body>
