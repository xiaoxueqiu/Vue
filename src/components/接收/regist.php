<?php
    header("Access-Control-Allow-origin:*");

    $username = @$_GET['username'];
    $password = @$_GET['password'];

    // 链接数据库
    $mysqli = @new mysqli('localhost','root','','usermessage');
    if ($mysqli->connect_error) {
        die('链接失败信息:'.$mysqli->connect_error);
    }

    //防止乱码
    $mysqli->query('set names utf8');

    // 查询
    $sql = 'SELECT * FROM message WHERE username = "'.$username.'"';

    //执行
    $result = $mysqli->query($sql);
    if ($row = $result->fetch_assoc()) {
        echo '{"errcode":2,"errmsg":"username have registed"}';
    } else {
        // 插入
        $sql2 = "INSERT INTO message (username,password) VALUES ('".$username."','".$password."')";
        $result2 = $mysqli->query($sql2);
        if ($result2) {
            // 成功
            echo '{"errcode":0,"errmsg":"ok"}';
        } else {
            echo '{"errcode":1,"errmsg":"unkonw error,please try again later"}';
        }
    }

$mysqli->close();
?>