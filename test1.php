<?php
//链接数据库
 $q=mysql_connect("localhost","root","root"); 
   if(!$q){die('链接不到数据库！' . mysql_error());}
    mysql_query("set name utf8");       //以utf8读取数据库
    mysql_select_db("menber",$q);   //数据库
  //   if (!(mysql_query("CREATE DATABASE menber",$q)){
  //   	  echo "Error creating database: " . mysql_error();	  
		// }else{
		//   echo "Database created";
		// }
    // if(mysql_query("CREATE DATABASE member",$q)){
    // 	echo 'member 数据表建立!';
    // }else{
    // 	echo '建表错误!';
    // }
// echo "<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>";
// $conn = odbc_connect('northwind', '', '');
// if(!$conn){
// 	exit("Connection Failed:" . $conn);
// };
// $sql = "SELECT * FROM customers";
// $res = odbc_exec($conn, $sql);
// if(!$res){
// 	exit("error in sql");
// };
// echo "<table><tr>";
// echo "<th>Companyname</th>";
// echo "<th>Contactname</th><tr>";
// while (odbc_fetch_row($res)) {
// 	# code...
// 	$companyname = odbc_result($res, "CompanyName");
// 	$conname = odbc_result($res, "ContactName");
// 	echo "<tr><td>$companyname</td>";
// 	echo "<td>$conname</td></tr>";
// };
// odbc_close($conn);
// echo "</table>";
//
//PHP Expat  xml  解析器
// $parser = xml_parser_create();
// function start($parser,$element_name,$element_attrs){
// 	switch ($element_name) {
// 		case 'NOTE':
// 		echo "--Note--<br>";
// 		break;
// 		case 'TO':
// 		echo "To<br>";
// 		break;
// 		case 'FROM':
// 		echo "--From--<br>";
// 		break;
// 		case 'HEADING':
// 		echo "--Heading--<br>";
// 		break;
// 		default:
// 		echo "Message";

// 	}
// }
// function stop($parser,$element_name){
// 	echo "<br>";
// }
// function char($parser,$data){ 
// 	echo $data;
// }
// xml_set_element_handler($parser,"start","stop");
// xml_set_character_data_handler($parser, "char");
// $fp = fopen("test1.xml","r");
// while ($data = fread($fp, 4096)) {
// 	# code...
// 	xml_parse($parser,$data, feof($fp)) or die(sprintf("XML Error:%s at line %d",xml_error_string(xml_get_error_code($parser)),xml_get_current_line_number($parser)));
// };
// xml_parser_free($parser);
//
//加载和输出XML
// $xmlDoc = new DOMDocument();
// $xmlDoc -> load('test1.xml');
// print $xmlDoc->saveXML();
// echo '<br>';
// $x = $xmlDoc -> documentElement;
// foreach ($x -> childNodes AS $item) {
// 	# code...
// 	print $item->nodeName . " = " . $item->nodeValue . '<br>';
// }
//
?>