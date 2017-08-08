<?php
    header("Access-Control-Allow-origin:*");

    $username = @$_GET['username'];
    $password = @$_GET['password'];

    // 链接数据库
    $mysqli = @new mysqli('localhost','root','','usermessage');
    if ($mysqli->connect_error) {
        die('链接错误信息:'.$mysqli->connect_error);
    }
    // 清除乱码让,中文可以正常显示。
    $mysqli->query('set names utf8');

    // 查询
    $sql = "SELECT * FROM message WHERE username = '{$username}'";
//    $sql = 'SELECT * FROM message WHERE username = "'.$username.'"';

    // 执行
    $result = $mysqli->query($sql);
    if ($row = $result->fetch_assoc()) {
        if ($password == $row['password']) {
            echo '{"errcode":0,"errmsg":"ok"}';
        } else {
            echo '{"errcode":1,"errmsg":"password error"}';
        }
    } else {
        echo '{"errcode":2,"errmsg":"username error"}';
    }

    // 关闭数据库
    $mysqli->close();
?>