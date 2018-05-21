<?php

$db_host = 'localhost';
$db_name = 'official';
$db_user = 'root';
$db_pwd = '34C18be3bf2e';

if (isset($_POST["txttile"]))
{
    $tit=$_POST["txttile"];
    echo $tit;
}
else 
{
    header("location:contactus.html");
}

if (isset($_POST["txtcontent"]))
{
    $con=$_POST["txtcontent"];
    echo $con;
}
else 
{
    header("location:contactus.html");
}

if (isset($_POST["txtemail"]))
{
    $mail=$_POST["txtemail"];
    echo $mail;
}
else 
{
    header("location:contactus.html");
}

//面向对象方式
$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
//面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
if(mysqli_connect_error()){
    echo mysqli_connect_error();
}
//设置编码
$mysqli->set_charset("utf8");//或者 $mysqli->query("set names 'utf8'")
//关闭连接

$sql="insert into message('title','content','mail') values(?,?,?)";  

//获得预处理对象
$stmt = $mysqli->prepare($sql);
//绑定参数 第一个参数为绑定的数据类型
/*
i:integer 整型
d:double 浮点型
s:string 字符串
b:a blob packets blob数据包
*/

$stmt->bind_param("sss", $name, $address);//绑定时使用变量绑定
//执行预处理
$stmt->execute();
/*
//可重新绑定 多次执行
$stmt->bind_param("ss", $name, $address);
$stmt->execute();
*/
//插入的id 多次插入为最后id
echo $stmt->insert_id;
//影响行数 也是最后一次执行的
echo $stmt->affected_rows;
//错误号
echo $stmt->errno;
//错误信息
echo $stmt->error;
//关闭
$stmt->close();
$mysqli->close();

 ?>