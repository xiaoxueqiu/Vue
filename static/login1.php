<?php

	header('Access-Control-Allow-Origin:*');
	$tell = $_POST['tell'];
	$tellnum = $_POST['tellnum'];
    //连接数据库
	mysql_connect("127.0.0.1", "root", "");
	//设置编码格式为utf8
	mysql_query("set names 'utf8'");
	//选中要操作的数据库
	mysql_select_db("lll");
	 // 查找数据
    $result = mysql_query("SELECT * FROM `test1` WHERE tell='{$tell}'");
    $row = mysql_fetch_row($result);
	// 登录
    if($row){
    	if($row[1]==$tell){
    		$arr = array('code' =>1 ,'msg'=>'登录成功' );
    		echo json_encode($arr);
    	}else{
    		$arr = array('code'=>0,'msg'=>'登录失败');
	    	echo json_encode($arr);
    	}

    }else{
    	$arr = array('code'=>0,'msg'=>'登录失败');
    	echo json_encode($arr);
    }




// 获取数据库的数据
 // $result = mysql_query("SELECT * FROM `test1` ");
 // $arr1 = array();
 //    if(mysql_num_rows($result)>0){
 //    	while($row = mysql_fetch_array($result)){
 //    		$arr1[]=$row;
 //    	}
        
 //    }else{
 //    	echo "你的用户名不存在";
 //    }

 //    echo json_encode($arr1);





	mysql_close();
?>