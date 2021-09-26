<?php


    
    // check if the file exist
 /*   if(file_exists("../data/abc"))
    {
        unlink("../data/abc/abc.html");
        echo 'File Deleted';
    }else{
        echo 'File Not Exist';
    }

    */
      //$dirname="../data/abc";
    $abc="abc";
     $dirname="../data/".$abc;
    $dst="../backup/".$abc;
    echo $dirname;
    echo $dst;
     if (is_dir ( $dirname )) {
            mkdir ( $dst );
            $files = scandir ( $dirname );
          // echo $files;
            foreach ( $files as $file ){
                
                    rcopy ( $dirname."/".$file, $dst."/".$file );
                    
            }
            
     }
    /*
    if (is_dir ( $dirname )) {
            mkdir ( $dst );
            $files = scandir ( $dirname );
            foreach ( $files as $file )
                if ($file != "." && $file != "..")
                    rcopy ( "$dirname/$file", "$dst/$file" );
        } /*else if (file_exists ( $dirname )){
            copy ( $dirname, $dst );
    }
    //$dirname="../data/abc";
    array_map('unlink', glob("$dirname/*.*"));

    rmdir($dirname);*/
?>

