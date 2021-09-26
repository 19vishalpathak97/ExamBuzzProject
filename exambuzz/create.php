<?php

$row = 1;
$fp = fopen('abb.txt', 'w');
if (($handle = fopen("abc.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
            
            fwrite($fp, $data[$c] );
            
             fwrite($fp, '\n' );
        }
        
    }
    fclose($handle);
    fclose($fp);
            
        
}




/*
$fp = fopen('lidn.txt', 'w');
fwrite($fp, 'Cats chase mice');
fclose($fp);*/


?>