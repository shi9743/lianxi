<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $repasswd=$_POST['repasswd'];

    if($password != $repasswd){
        echo'{"code":-2,"msg":"两次密码不一致"}';
        die();
    }

    $mysqli=new mysqli('localhost','root','root','js1904');

    $sql="select id from shuju where username='$username'";

    $result=$mysqli->query($sql);

    if($result->num_rows >0){
        echo'{"code":-1,"msg":"用户名已被注册"}';
        die();
    }
    

    $sql="insert into shuju(username,password) values('$username','$password')";

    $result=$mysqli->query($sql);

    if($result){
        echo'{"code":1,"msg":"注册成功"}';
    } else{
        echo'{"code":0,"msg":"连接超时"}';
    }

    $mysqli->close();
?>