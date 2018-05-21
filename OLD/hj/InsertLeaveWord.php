<?php
$servername = "localhost";
$username = "root";
$password = "34C18be3bf2e";
$dbname = "official";

$tit=$_POST["txttile"];
$con=$_POST["txtcontent"];
$mail=$_POST["txtemail"];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$sql="insert into message(title,content,mail) values('$tit','$con','$mail')";  

if ($conn->query($sql) === TRUE) {
	//echo 1;
    echo "新记录插入成功";
    header("location:index.html");
} else {
	//echo 0;
    //echo "Error: " . $sql . "<br>" . $conn->error;
    header("location:index.html");
}

$conn->close();
?>