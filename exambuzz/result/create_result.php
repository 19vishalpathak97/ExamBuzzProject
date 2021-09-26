 <?php
include '/exambuzz/dbconn.php';

//$link = mysql_connect ($host, $user, $password) or die('Could not connect: ' . mysql_error());
//mysql_select_db($db_name) or die('Could not select database');

$select = "SELECT * FROM result";
mysqli_set_charset($link, "utf8");
//mysql_query('SET NAMES utf8;');
$export = mysqli_query($conn,$select); 
//$fields = mysql_num_rows($export); // thanks to Eric
$fields = mysqli_num_fields($export); // by KAOSFORGE
$col_title="";
$data="";
for ($i = 0; $i < $fields; $i++) {
    $col_title .= '<Cell ss:StyleID="2"><Data ss:Type="String">'.mysqli_fetch_field_direct($export, $i).'</Data></Cell>';
}

$col_title = '<Row>'.$col_title.'</Row>';

while($row = mysql_fetch_row($export)) {
    $line = '';
    foreach($row as $value) {
        if ((!isset($value)) OR ($value == "")) {
            $value = '<Cell ss:StyleID="1"><Data ss:Type="String"></Data></Cell>\t';
        } else {
            $value = str_replace('"', '', $value);
            $value = '<Cell ss:StyleID="1"><Data ss:Type="String">' . $value . '</Data></Cell>\t';
        }
        $line .= $value;
    }
    $data .= trim("<Row>".$line."</Row>")."\n";
}

$data = str_replace("\r","",$data);

header("Content-Type: application/vnd.ms-excel;");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");

$xls_header = '<?xml version="1.0" encoding="utf-8"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" xmlns:html="http://www.w3.org/TR/REC-html40">
<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
<Author></Author>
<LastAuthor></LastAuthor>
<Company></Company>
</DocumentProperties>
<Styles>
<Style ss:ID="1">
<Alignment ss:Horizontal="Left"/>
</Style>
<Style ss:ID="2">
<Alignment ss:Horizontal="Left"/>
<Font ss:Bold="1"/>
</Style>

</Styles>
<Worksheet ss:Name="Export">
<Table>';

$xls_footer = '</Table>
<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
<Selected/>
<FreezePanes/>
<FrozenNoSplit/>
<SplitHorizontal>1</SplitHorizontal>
<TopRowBottomPane>1</TopRowBottomPane>
</WorksheetOptions>
</Worksheet>
</Workbook>';

print $xls_header.$col_title.$data.$xls_footer;
exit;

?>
