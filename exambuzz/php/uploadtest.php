<?php


  include 'dbconn.php';
 session_start();
  $regg = $_SESSION['reg_no'];
  $testname=strtolower($_POST['testname']);
  $teachername=$_POST['teachername'];
  $department=strtolower($_POST['department']);
  $year=strtolower($_POST['year']);
  $timeoftest=$_POST['timeoftest'];
  $startdate=$_POST['startdate'];
  $enddate=$_POST['enddate'];
  $negative=$_POST['negative'];
  $csvcount=$_POST['csvcount'];
  //$section0=$_POST['section0'];
  //$section1=$_POST['section1'];
  $section = array();
  $x=0;
  $section_name = array();
  //$x=1;
  while($x < $csvcount)
  {
      $section[$x]=strtolower($_POST['section'.$x]);
          $section_name[$x]=strtolower($_POST['section_name'.$x]);
    
      $x++;
  }
   echo $csvcount;
  $temp=$csvcount;
 // echo $temp;
  
   while($temp < 8)
   {
       $section[$temp]="NULL";
       $temp++;
   }
   
        /*$dat= date("Y-m-d");
		$tim=date("h:i:sa");
	//	echo $dat;
		echo $tim;*/
		echo $teachername;
		$startdate1=date('Y-m-d',strtotime($startdate));
		$enddate1=date('Y-m-d',strtotime($enddate));
		
		
		//echo $testname.$department.$year.$timeoftest.$startdate1.$enddate1.$dat.$tim;
	

    if($csvcount == 0)
    {
        //echo $csvcount;
       
        $insert_count_0="INSERT INTO test_details(Name,testname,department,year,timeoftest,startdate,enddate,negative,section_count,reg_no) VALUES('$teachername','$testname','$department','$year','$timeoftest','$startdate1','$enddate1','$negative','$csvcount',$regg)";
        mysqli_query($conn,$insert_count_0);
       // echo "Inset Succesful";
        $tablename=strtolower($testname);
        //echo $tablename;
         $insert_tablecreation_0 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";  //L,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";//,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL, C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL, E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL , answer VARCHAR(1000) NOT NULL,explanation VARCHAR(700) NOT NULL, marks INT(6))";
	     mysqli_query($conn, $insert_tablecreation_0);
        //echo "table created";
        
        
       $row = 1;
       $filename="../data/".$testname."/".$tablename.".csv";
      // echo $filename;
        if (($handle = fopen($filename, "r")) !== FALSE) 
        {
          //  echo "Hello";
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {    if($row == 1)
                {
                    
                }
                else
                {
                    
                    
                    
                                        $num = count($data);
                           //  echo "<p> $num fields in line $row: <br /></p>\n";
                                        $index= $data[0] ;
                                        $question =$data[1];
                                        $question_image=$data[2];
                                        $optionA=$data[3];
                                        $optionA_image=$data[4];
                                        $optionB=$data[5];
                                        $optionB_image=$data[6];
                                        $optionC=$data[7];
                                        $optionC_image=$data[8];
                                        $optionD=$data[9];
                                        $optionD_image=$data[10];
                                        $optionE=$data[11];
                                        $optionE_image=$data[12];
                                        $answer=$data[13];
                                        $explanation=$data[14];
                                        $marks=$data[15];
                                        
                                        
                                        
                                        //$marks=$data[10];
                                        
                                        
                                        
                                        //echo $question;
                                        
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                         
                                                         echo "<br>".$optionB_image."<br>";
                                                         
                                        	 $sql1_3_4="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	  if(mysqli_query($conn, $sql1_3_4))
                                            	  {
                                            	      echo "Succesful upload";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	  
                                            	  
                                            	  
                                            					 
                                                         
                                                         
                                                         
                                                         
                                                     	 /*        if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql1_3_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql1_3_1);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql1_3_2="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql1_3_2);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql1_3_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql1_3_3);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql1_3_4="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql1_3_4);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 */
                                                     	 
                                                     	 
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$answer.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                             $question_count="UPDATE test_details SET nsection_count='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $question_count);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                        
                                        
                                        
                                    }
                                    else
                                    {
                                       
                                              $temp_count=0;
                                              
                                              while($temp_count < $csvcount )
                                              {
                                                         $section_temp=$section_name[$temp_count];
                                                         
                                                         
                                                         if($temp_count == 0)
                                                         {
                                                             
                                                             
                                                             
                                                                $insert_count_1="INSERT INTO test_details(Name,testname,department,year,timeoftest,startdate,enddate,negative,section0,reg_no) VALUES('$teachername','$testname','$department','$year','$timeoftest','$startdate1','$enddate1','$negative','$section_temp',$regg)";
                                                                mysqli_query($conn,$insert_count_1);
                                                               // echo "Inset Succesful";
                                                                 $tablename=strtolower($testname).$section_temp;
                                                                //echo $tablename;
                                                                 $insert_tablecreation_1 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";
	                                                             mysqli_query($conn, $insert_tablecreation_1);
                                                                //echo "table created";
                                                                $row = 1;
                                                               $filename="../data/".$testname."/".$section_temp.".csv";
                                                                     // echo $filename;
                                                            if (($handle = fopen($filename, "r")) !== FALSE) 
                                                            {
                                                              //  echo "Hello";
                                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                                                                {    if($row == 1)
                                                                    {
                                                                        
                                                                    }
                                                                    else
                                                                    {
                    
                    
                                                
                                                            $num = count($data);
                                                       //  echo "<p> $num fields in line $row: <br /></p>\n";
                                                                    $index= $data[0] ;
                                                                    $question =$data[1];
                                                                    $question_image=$data[2];
                                                                    $optionA=$data[3];
                                                                    $optionA_image=$data[4];
                                                                    $optionB=$data[5];
                                                                    $optionB_image=$data[6];
                                                                    $optionC=$data[7];
                                                                    $optionC_image=$data[8];
                                                                    $optionD=$data[9];
                                                                    $optionD_image=$data[10];
                                                                    $optionE=$data[11];
                                                                    $optionE_image=$data[12];
                                                                    $answer=$data[13];
                                                                    $explanation=$data[14];
                                                                    $marks=$data[15];
    
    
    
                                                            
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                         
                                                         echo "<br>".$optionB_image."<br>";
                                                                 
                                                                    
                                            	 $sql1_3_5="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	  
                                            	  if(mysqli_query($conn, $sql1_3_5))
                                            	  {
                                            	      echo "Succesful Tushar";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	  
                                                     	
                                                  /*   	         if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql0_0="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql0_0);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql0_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql0_1);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql0_2="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql0_2);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql0_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql0_3);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 
                                                     */	 
                                                     	 
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$correct_ans.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                             $sql0_4="UPDATE test_details SET section0qno='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $sql0_4);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                                                
                                                                
                                                                
                                                                
                                                         
                                       }
                                       if($temp_count == 1)
                                       {
                                           
                                          $sql1_0="UPDATE test_details SET section1='$section_temp' WHERE testname='$testname' and department='$department' and year='$year' ";
                            		      mysqli_query($conn, $sql1_0);
                                           echo "Hello";
                                           
                                                             $tablename=strtolower($testname).$section_temp;
                                                                echo $tablename;
                                                                $insert_tablecreation_2 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";
	                                                             mysqli_query($conn, $insert_tablecreation_2);
                                                                echo "table created";
                                                               $row = 1;
                                                               $filename="../data/".$testname."/".$section_temp.".csv";
                                                                     // echo $filename;
                                                            if (($handle = fopen($filename, "r")) !== FALSE) 
                                                            {
                                                              //  echo "Hello";
                                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                                                                {    if($row == 1)
                                                                    {
                                                                        
                                                                    }
                                                                    else
                                                                    {
                    
                    
                                                
                                                            $num = count($data);
                                                       //  echo "<p> $num fields in line $row: <br /></p>\n";
                                                                    $index= $data[0] ;
                                                                    $question =$data[1];
                                                                    $question_image=$data[2];
                                                                    $optionA=$data[3];
                                                                    $optionA_image=$data[4];
                                                                    $optionB=$data[5];
                                                                    $optionB_image=$data[6];
                                                                    $optionC=$data[7];
                                                                    $optionC_image=$data[8];
                                                                    $optionD=$data[9];
                                                                    $optionD_image=$data[10];
                                                                    $optionE=$data[11];
                                                                    $optionE_image=$data[12];
                                                                    $answer=$data[13];
                                                                    $explanation=$data[14];
                                                                    $marks=$data[15];
                                                                    
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                         
                                                         echo "<br>".$optionB_image."<br>";
                                                         
                                                                    
                                            	 $sql1_3_6="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	  if(mysqli_query($conn, $sql1_3_6))
                                            	  {
                                            	      echo "Succesful Tushar";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	    	 
                                                     	
                                                     	       /*  if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql1_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql1_1);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql1_2="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql1_2);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql1_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql1_3);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql1_4="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql1_4);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 
                                                     	 
                                                     	 */
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$correct_ans.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                          $sql1_5="UPDATE test_details SET section1qno='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $sql1_5);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                         
                                           
                                       }
                                       
                                       if($temp_count == 2)
                                       {
                                           
                                              $sql2_0="UPDATE test_details SET section2='$section_temp' WHERE testname='$testname' and department='$department' and year='$year' ";
                            		      mysqli_query($conn, $sql2_0);
                                           echo "Hello";
                                           
                                                             $tablename=strtolower($testname).$section_temp;
                                                                echo $tablename;
                                                                  $insert_tablecreation_3 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";
                                                                  mysqli_query($conn, $insert_tablecreation_3);
                                                                echo "table created";
                                                               $row = 1;
                                                               $filename="../data/".$testname."/".$section_temp.".csv";
                                                                     // echo $filename;
                                                            if (($handle = fopen($filename, "r")) !== FALSE) 
                                                            {
                                                              //  echo "Hello";
                                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                                                                {    if($row == 1)
                                                                    {
                                                                        
                                                                    }
                                                                    else
                                                                    {
                    
                    
                                                
                                                            $num = count($data);
                                                       //  echo "<p> $num fields in line $row: <br /></p>\n";
                                                                    $index= $data[0] ;
                                                                    $question =$data[1];
                                                                    $question_image=$data[2];
                                                                    $optionA=$data[3];
                                                                    $optionA_image=$data[4];
                                                                    $optionB=$data[5];
                                                                    $optionB_image=$data[6];
                                                                    $optionC=$data[7];
                                                                    $optionC_image=$data[8];
                                                                    $optionD=$data[9];
                                                                    $optionD_image=$data[10];
                                                                    $optionE=$data[11];
                                                                    $optionE_image=$data[12];
                                                                    $answer=$data[13];
                                                                    $explanation=$data[14];
                                                                    $marks=$data[15];
                                                                    
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                         
                                            	 $sql1_3_6="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	 if(mysqli_query($conn, $sql1_3_6))
                                            	  {
                                            	      echo "Succesful Tushar";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	                        	 
                                                     	
                                                     	        /* if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql2_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql2_1);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql2_2="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql2_2);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql2_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql2_3);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql2_4="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql2_4);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 
                                                     	 */
                                                     	 
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$correct_ans.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                             $sql2_5="UPDATE test_details SET section2qno='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $sql2_5);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                       }
                                       
                                       
                                       
                                       if($temp_count == 3)
                                       {
                                           
                                              $sql3_0="UPDATE test_details SET section3='$section_temp' WHERE testname='$testname' and department='$department' and year='$year' ";
                            		      mysqli_query($conn, $sql3_0);
                                           echo "Hello";
                                           
                                                             $tablename=strtolower($testname).$section_temp;
                                                                echo $tablename;
                                                                  $insert_tablecreation_4 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";
                                                                    mysqli_query($conn, $insert_tablecreation_4);
                                                                echo "table created";
                                                               $row = 1;
                                                               $filename="../data/".$testname."/".$section_temp.".csv";
                                                                     // echo $filename;
                                                            if (($handle = fopen($filename, "r")) !== FALSE) 
                                                            {
                                                              //  echo "Hello";
                                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                                                                {    if($row == 1)
                                                                    {
                                                                        
                                                                    }
                                                                    else
                                                                    {
                    
                    
                                                
                                                            $num = count($data);
                                                                       $index= $data[0] ;
                                                                    $question =$data[1];
                                                                    $question_image=$data[2];
                                                                    $optionA=$data[3];
                                                                    $optionA_image=$data[4];
                                                                    $optionB=$data[5];
                                                                    $optionB_image=$data[6];
                                                                    $optionC=$data[7];
                                                                    $optionC_image=$data[8];
                                                                    $optionD=$data[9];
                                                                    $optionD_image=$data[10];
                                                                    $optionE=$data[11];
                                                                    $optionE_image=$data[12];
                                                                    $answer=$data[13];
                                                                    $explanation=$data[14];
                                                                    $marks=$data[15];
                                                                    
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                 
                                                       //  echo "<p> $num fields in line $row: <br /></p>\n";
                                                 	 $sql1_3_7="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	  if(mysqli_query($conn, $sql1_3_7))
                                            	  {
                                            	      echo "Succesful Tushar";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	  
                                                     	
                                                     	
                                                     	
                                                     	      /*   if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql3_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql3_1);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql3_2="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql3_2);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql3_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql3_3);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql3_4="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql3_4);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 
                                                     	 */
                                                     	 
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$correct_ans.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                             $sql3_5="UPDATE test_details SET section3qno='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $sql3_5);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                           
                                           
                                           
                                           
                                       }
                                       
                                       if($temp_count == 4)
                                       {
                                           
                                           
                                             $sql4_0="UPDATE test_details SET section4='$section_temp' WHERE testname='$testname' and department='$department' and year='$year' ";
                            		      mysqli_query($conn, $sql4_0);
                                           echo "Hello";
                                           
                                                             $tablename=strtolower($testname).$section_temp;
                                                                echo $tablename;
                                                                 $insert_tablecreation_5 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";
                                                             mysqli_query($conn, $insert_tablecreation_5);
                                                                echo "table created";
                                                               $row = 1;
                                                               $filename="../data/".$testname."/".$section_temp.".csv";
                                                                     // echo $filename;
                                                            if (($handle = fopen($filename, "r")) !== FALSE) 
                                                            {
                                                              //  echo "Hello";
                                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                                                                {    if($row == 1)
                                                                    {
                                                                        
                                                                    }
                                                                    else
                                                                    {
                    
                    
                                                
                                                            $num = count($data);
                                                       //  echo "<p> $num fields in line $row: <br /></p>\n";
                                                                       $index= $data[0] ;
                                                                    $question =$data[1];
                                                                    $question_image=$data[2];
                                                                    $optionA=$data[3];
                                                                    $optionA_image=$data[4];
                                                                    $optionB=$data[5];
                                                                    $optionB_image=$data[6];
                                                                    $optionC=$data[7];
                                                                    $optionC_image=$data[8];
                                                                    $optionD=$data[9];
                                                                    $optionD_image=$data[10];
                                                                    $optionE=$data[11];
                                                                    $optionE_image=$data[12];
                                                                    $answer=$data[13];
                                                                    $explanation=$data[14];
                                                                    $marks=$data[15];
                                                                    
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                 
                                                         
                                            	 $sql1_3_8="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	 if(mysqli_query($conn, $sql1_3_8))
                                            	  {
                                            	      echo "Succesful Tushar";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	  
                                                     	
                                                     	       /*  if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql4_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql4_1);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql4_2="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql4_2);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql4_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql4_3);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql4_4="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql4_4);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 */
                                                     	 
                                                     	 
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$correct_ans.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                             $sql4_5="UPDATE test_details SET section4qno='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $sql4_5);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                           
                                           
                                           
                                           
                                           
                                       }
                                                  
                                      if($temp_count == 5)
                                      {
                                             $sql5_0="UPDATE test_details SET section5='$section_temp' WHERE testname='$testname' and department='$department' and year='$year' ";
                            		      mysqli_query($conn, $sql5_0);
                                           echo "Hello";
                                           
                                                             $tablename=strtolower($testname).$section_temp;
                                                                echo $tablename;
                                                                 $insert_tablecreation_6 ="CREATE TABLE  $tablename ( q_number INT(6) ,  question VARCHAR(500) NOT NULL ,question_img VARCHAR(500) , A VARCHAR(300) NOT NULL,A_img VARCHAR(300) NOT NULL,  B VARCHAR(300) NOT NULL,B_img VARCHAR(300) NOT NULL,C VARCHAR(300) NOT NULL,C_img VARCHAR(300) NOT NULL,D VARCHAR(300) NOT NULL,D_img VARCHAR(300) NOT NULL,E VARCHAR(300) NOT NULL,E_img VARCHAR(300) NOT NULL,answer VARCHAR(300) NOT NULL,explanation VARCHAR(700) NOT NULL,marks INT(6) NOT NULL)";
                                                     mysqli_query($conn, $insert_tablecreation_6);
                                                                echo "table created";
                                                               $row = 1;
                                                               $filename="../data/".$testname."/".$section_temp.".csv";
                                                                     // echo $filename;
                                                            if (($handle = fopen($filename, "r")) !== FALSE) 
                                                            {
                                                              //  echo "Hello";
                                                                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                                                                {    if($row == 1)
                                                                    {
                                                                        
                                                                    }
                                                                    else
                                                                    {
                    
                    
                                                
                                                            $num = count($data);
                                                       //  echo "<p> $num fields in line $row: <br /></p>\n";
                                                                    $index= $data[0] ;
                                                                    $question =$data[1];
                                                                    $question_image=$data[2];
                                                                    $optionA=$data[3];
                                                                    $optionA_image=$data[4];
                                                                    $optionB=$data[5];
                                                                    $optionB_image=$data[6];
                                                                    $optionC=$data[7];
                                                                    $optionC_image=$data[8];
                                                                    $optionD=$data[9];
                                                                    $optionD_image=$data[10];
                                                                    $optionE=$data[11];
                                                                    $optionE_image=$data[12];
                                                                    $answer=$data[13];
                                                                    $explanation=$data[14];
                                                                    $marks=$data[15];
                                                                    
                                           echo $index."<br>".$question."<br>".$question_image."<br>".$optionA."<br>".$optionA_image."<br>".$optionB."<br>".$optionB_image."<br>".$optionC."<br>".$optionC_image."<br>".$optionD."<br>".$optionD_image."<br>".$optionE."<br>".$optionE_image."<br>".$answer."<br>".$explanation."<br>".$marks;
                                            			 
                                                     	 if((strpos($question_image,'.png') ||  strpos($question_image,'.jpg') || strpos($question_image,'.jpeg') || strpos($question_image,'.PNG') || strpos($question_image,'.JPG') || strpos($question,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $question_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $question_image);
                                                             //       echo $question_img;                  
                                                     	 }
                                                     	 if((strpos($optionA_image,'.png') ||  strpos($optionA_image,'.jpg') || strpos($optionA_image,'.jpeg') || strpos($optionA_image,'.PNG') || strpos($optionA_image,'.JPG') || strpos($optionA_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionA_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionA_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionB_image,'.png') ||  strpos($optionB_image,'.jpg') || strpos($optionB_image,'.jpeg') || strpos($optionB_image,'.PNG') || strpos($optionB_image,'.JPG') || strpos($optionB_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionB_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionB_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionC_image,'.png') ||  strpos($optionC_image,'.jpg') || strpos($optionC_image,'.jpeg') || strpos($optionC_image,'.PNG') || strpos($optionC_image,'.JPG') || strpos($optionC_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionC_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionC_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionD_image,'.png') ||  strpos($optionD_image,'.jpg') || strpos($optionD_image,'.jpeg') || strpos($optionD_image,'.PNG') || strpos($optionD_image,'.JPG') || strpos($optionD_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionD_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionD_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                     	 if((strpos($optionE_image,'.png') ||  strpos($optionE_image,'.jpg') || strpos($optionE_image,'.jpeg') || strpos($optionE_image,'.PNG') || strpos($optionE_image,'.JPG') || strpos($optionE_image,'.PNG')   ) == true )  
                                                     	 {    
                                                                   $optionE_image="../data/".$testname."/".preg_replace('/^.+[\\\\\\/]/', '', $optionE_image);
                                                             //       echo $question_img;                  
                                                     	 }    
                                                     	 
                                                         if($question_image == "nan")
                                                         {
                                                             $question_image="NULL";
                                                         }
                                                         
                                                         if($optionA =="nan")
                                                         {
                                                             $optionA="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB =="nan")
                                                         {
                                                             $optionB="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC =="nan")
                                                         {
                                                             $optionC="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD =="nan")
                                                         {
                                                             $optionD="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE =="nan")
                                                         {
                                                             $optionE="NULL";
                                                         }
                                                         
                                                         if($explanation =="nan")
                                                         {
                                                             $explaination="NULL";
                                                         }
                                                         
                                                         if($question == "nan")
                                                         {
                                                             $question="NULL";
                                                         }
                                                         
                                                         if($optionA_image =="nan")
                                                         {
                                                             $optionA_image="NULL";
                                                         }
                                                          
                                                         
                                                         if($optionB_image =="nan")
                                                         {
                                                             $optionB_image="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionC_image =="nan")
                                                         {
                                                             $optionC_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionD_image =="nan")
                                                         {
                                                             $optionD_image ="NULL";
                                                         }
                                                         
                                                         
                                                         if($optionE_image =="nan")
                                                         {
                                                             $optionE_image ="NULL";
                                                         }
                                                         
                                                 
                                                         
                                            	 $sql1_3_9="INSERT INTO $tablename (q_number,question,question_img,A,A_img,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks )VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";//'$explanation','$marks')";//,B,B_img,C,C_img,D,D_img,E,E_img,answer,explanation,marks) VALUES('$index','$question','$question_image','$optionA','$optionA_image','$optionB','$optionB_image','$optionC','$optionC_image','$optionD','$optionD_image','$optionE','$optionE_image','$answer','$explanation','$marks')";
                                            	  if(mysqli_query($conn, $sql1_3_9))
                                            	  {
                                            	      echo "Succesful Tushar";
                                            	  }
                                            	  else
                                            	  {
                                            	      echo "Not successs";
                                            	  }
                                            	  
                                                     	
                                                     	
                                                     	
                                                     	
                                                     	       /*  if(($optionE=="")&& ($question_image==""))
                                            					 {
                                            					  $sql5_1="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					  mysqli_query($conn, $sql5_1);
                                            						echo "<br>";
                                            						echo "FIRST";
                                            						echo "<br>";
                                            						
                                            					 }	
                                            					 else if(($optionE !="" ) && ($question_image ==""))
                                            					 {
                                            						 $sql5_2="INSERT INTO $tablename (sr,question,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql5_2);
                                            					 
                                            					     echo "<br>";
                                            						echo "SECOND";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                            					 else if(($optionE =="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql5_3="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$correct','$marks')";
                                            					     mysqli_query($conn, $sql5_3);
                                            					 
                                            					     
                                            					     echo "<br>";
                                            						echo "THIRD";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }	
                                                                 else if(($optionE !="" ) && ($question_image !=""))
                                            					 {
                                            						 $sql5_4="INSERT INTO $tablename (sr,question,question_image,optionA,optionB,optionC,optionD,optionE,correct_ans,marks) VALUES('$index','$question','$question_image','$optionA','$optionB','$optionC','$optionD','$optionE','$correct','$marks')";
                                            					     mysqli_query($conn, $sql5_4);
                                            					 
                                            					     echo "<br>";
                                            						echo "FOURTH";
                                            						echo "<br>";
                                            						
                                            					     
                                            					 }
                                            
                                                     	 */
                                                     	 
                                                     	 
                                                     	 
                                                     	 
                                                     	 echo $question.$question_image.$optionA.$optionB.$optionC.$optionD.$optionE.$correct_ans.$marks;
                                                     	 echo "<br>";
                                                     	  
                                                                
                                                }
                                                   
                                         	 
                                         	 
                                                 $row++;    
                                            }
                                            echo "<br> $row </br>";
                                            $row_num=$row-2;
                                             $sql5_5="UPDATE test_details SET section4qno='$row_num' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $sql5_5);
                                		     
                                		     echo "Question Count updated";
                                             fclose($handle);    
                                    
                                        }
                                          
                                          
                                          
                                          
                                          
                                      }
                                                         
                                                         
                                                         
                                                         
                                                        
                                                        
                                                     
                                    echo $temp_count;   
                                    $temp_count++;     
                                    
                                    echo $temp_count;
                                    }
                                              
        
                                  $csv_count="UPDATE test_details SET section_count='$csvcount' WHERE testname='$testname' and department='$department' and year='$year' ";
                                		     mysqli_query($conn, $csv_count);
                                		   
        
        
                            }
	
   /* if($csvcount == 0)
	{
	  $sql_1= "INSERT INTO test_details (Name,testname,department,year,timeoftest,startdate,enddate,negative,section_count) VALUES ('$teachername','$testname','$department','$year','$timeoftest','$startdate1','$enddate1','$negative','$csvcount')";      
     if(mysqli_query($conn,$sql_1))
     {
         echo "inserted";
     }
   
	    
	}*/
	/*
     $sql_1= "INSERT INTO test_details (Name,testname,department,year,timeoftest,startdate,enddate,section0,section1,section2,section3,section4,section5,section6,section7) VALUES ('$teachername','$testname','$department','$year','$timeoftest','$startdate1','$enddate1','$section[0]','$section[1]','$section[2]','$section[3]','$section[4]','$section[5]','$section[6]','$section[7]')";      //,section0,section1,section2,section3,section4,section5,section6,section7,negative,section_count) VALUES ('$teachername','$testname','$department','$year','$timeoftest','$startdate','$enddate','$idate','$time','$section[0]','$section[1]','$section[2]','$section[3]','$section[4]','$section[5]','$section[6]','$section[7]','$negative','$csvcount')";
     if(mysqli_query($conn,$sql_1))
     {
         echo "inserted";
     }
   */
 //echo $section[2],$section[3],$section[4],$section[5],$section[6],$section[7];
  //echo 
 // echo $testname.$teachername,$csvcount,$section[0],$section[1],$section[2],$section[3],$section[4],$section[5],$section[6],$section[7];//,$section_name[0],$section_name[1];
 echo "Test Succesfully Uploaded";
  

?>