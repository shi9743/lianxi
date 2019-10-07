<?php
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  $mysqli=new mysqli('localhost','root','root','js1904');
  $sql="select id from shuju where username='$username' and password='$password';";
  $result=$mysqli->query($sql);
  if($result->num_rows >0){
    echo '{"code":2,"msg":"登陆成功"}';
  }else{
    echo '{"code":-3,"msg":"用户名或密码错误"}';
  }
  $mysqli->close();
?>