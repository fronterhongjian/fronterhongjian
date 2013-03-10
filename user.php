<?php
	header('content-type:text/html; charset=utf-8');
	
	$name = $_REQUEST['name'];
	$sex = $_REQUEST['sex'];
	$age = $_REQUEST['age'];
	$password = $_REQUEST['password'];
	$email = $_REQUEST['email'];
	$url = $_REQUEST['url'];
	
	$link = mysql_connect('localhost', 'root', '');
	mysql_select_db('touch');
	mysql_query('SET NAMES UTF8');
	$result = mysql_query('SELECT * FROM user_table WHERE name="' .$name .'"', $link);
	if(mysql_num_rows($result) > 0){
		echo '{"success":"false", "error":"数据库中已经有该用户"}';
	}else{
		$value = '"'.$name.'",' .'"'.$sex.'",' .'"'.$age.'",' .'"'.$password.'",' .'"'.$email.'",' .'"'.$url.'"';
		mysql_query('INSERT INTO user_table(name,sex,age,password,email,url) VALUES(' .$value .')');

		$result = mysql_query('SELECT * FROM user_table WHERE name="' .$name .'"', $link);
		if(mysql_num_rows($result) > 0){
			echo '{"success":"true"}';
		}else{
			echo '{"success":"false", "error":"数据插入失败"}';
		}
	}
?>