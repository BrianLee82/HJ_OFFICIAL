<?php
$servername = "localhost";
$username = "root";
$password = "34C18be3bf2e";
$dbname = "official";


try
 {
 
            
        // var_dump($mail);
        if (isset($_POST["txttile"]))
        {
            $tit=$_POST["txttile"];
            //echo $tit;
        }
        else 
        {
            header("location:contactus.html");
        }

        if (isset($_POST["txtcontent"]))
        {
            $con=$_POST["txtcontent"];
           // echo $con;
        }
        else 
        {
            header("location:contactus.html");
        }

        if (isset($_POST["txtemail"]))
        {
            $mail=$_POST["txtemail"];
            //echo $mail;
        }
        else 
        {
            header("location:contactus.html");
        }

        
        // 创建连接
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // 检测连接
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        } 

        //$sql="insert into message(title,content,mail) values('$tit','$con','$mail')";  
        $sql="insert into message(title,content,mail) values(?,?,?)";  

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("sss",$tit,$con,$mail);
        $stmt->execute();
        $stmt->close();

        
        $conn->close();

        header("location:index.html");
 }
//捕获异常
catch(Exception $e)
 {
 //echo 'Message: ' .$e->getMessage();
 }


 ?>