<?php
include 'dbconn.php';
session_start();
?>

<html>
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
		        $("#b1").click(function(){
		            <?php
		                $deletetime="delete from time";
		                mysqli_query($conn,$deletetime);
		                
		            ?>
		            alert("time---table has been truncated");
		        });
            });
        </script>
        
    </head>
        <body>
            <button id = "b1"> Truncate ---time--- table</button>
        </body>
</html>