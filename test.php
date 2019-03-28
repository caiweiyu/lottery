<?php
echo "<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>";
// $con = mysql_connect('localhost','cary','123456');
// if(!$con){
// 	die('Could to connect' . mysql_error() );
// };
// if(mysql_query("CREATE DATABASE my_db",$con)){
// 	 echo 'database is created now';
// 	}else{
// 	 echo 'error creating database:' . mysql_error();	
// };
// mysql_select_db("my_db",$con);
// $sql = "CREATE TABLE Persons(
// 	FirstName varchar(15),
// 	LastName varchar(15),
// 	Age int
// )";
// mysql_query($sql,$con);
// mysql_close($con);
// ----
// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpasswords = 'root';
// $conn = mysqli_connect($dbhost,$dbuser,$dbpasswords);
// if(!$conn){
// 	die('链接错误' . mysqli_error($conn));
// }else{
// 	echo '链接成功';
// }
// $sql = 'CREATE DATABASE RUN';
// $result = mysql_query($conn,$sql);
// if(mysql_query($sql,$conn)){
// 	echo 'my_db is created';
// }else{
// 	echo 'error creating database:' . mysql_error();
// }
// // mysql_select_db(my_db,$conn);
// // $sql = "CREATE TABLE Persons
// // (
// // 	personID int NOT NULL AUTO_INCREMENT, 
// // 	PRIMARY KEY(personID),
// // 	FirstName varchar(15),
// // 	LastName varchar(15),
// // 	Age int
// // )";
// // mysqli_query($sql,$conn);
// // echo '连接正常';
// if(!$result){
// 	die('创建失败' . mysql_error($conn));
// };
// echo '创建 RUN 成功\n';
// mysqli_close($conn);
//---
echo 'res';
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE my_db",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  echo '继续' . '<br>';
  }
// Create table in my_db database
mysql_select_db("my_db", $con);
session_start();
$key=$_POST['session_key'];
// echo $key;
// echo '---';
// echo $_SESSION[$key];
// echo '+++';
// echo substr($key, 5);
if(!$key || $_SESSION[$key] != substr($key, 5)){
	unset($_SESSION[$key]);
	exit();
}else{
	$sql = "INSERT INTO Persons (userName,userPhone,conTent) VALUES ('$_POST[username]','$_POST[userphone]','$_POST[content]')";
	//delete模糊删除
	// mysql_query("delete from Persons where Age like '%" .$_POST["Age"]="1". "%'");
	//update
	// mysql_query('update PERSONS SET AGE = "33333346" WHERE FirstName="cary" and LastName="gee"');
	//order by
	// $result2 = mysql_query("SELECT * FROM persons order by age DESC");
	//where语句执行
	// $result1 = mysql_query("SELECT * FROM persons WHERE FirstName='cary'");
	//select 语句
	$result = mysql_query("SELECT * FROM persons");
	echo "<table border='1'>
		     <tr>
				<th>userName</th>
				<th>userPhone</th>
				<th>conTent</th>
		     </tr>";
	// while( $row = mysql_fetch_array($result) ){
	// 	echo $row[ 'FirstName' ] . ' ' . $row[ 'LastName' ];
	// 	echo '<br>';
	// };
	while($row = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $row[ 'userName' ] . '</td>';
		echo '<td>' . $row[ 'userPhone' ] . '</td>';
		echo '<td>' . $row[ 'conTent' ] . '</td>';
		echo '</tr>';
	};
	echo "</table>";
	if( !mysql_query($sql,$con) ){
		die('Error:' . mysql_error());
	}
	echo '客户端数据成功添加一条';	
};
// $sql = "CREATE TABLE Persons 
// (
// 		personID int NOT NULL AUTO_INCREMENT,
// 		PRIMARY KEY(personID),
// 		FirstName varchar(15),
// 		LastName varchar(15),
// 		Age int
// )";
// mysql_query($sql,$con);
// mysql_query("INSERT INTO Persons (FirstName,LastName,Age) VALUES ('cary','gee','18')");	        硬性添加两条数据1
// mysql_query("INSERT INTO Persons (FirstName,LastName,Age) VALUES ('carygirl','geeto','28')");	硬性添加两条数据2
mysql_close($con);
unset($_SESSION[$key]);
