<?php
    define('WEBNAME','GUNCMS - Power by Emaster');

	include ('inc/fun.php');
	session_start();//会话开始，于HTML之前！
		
	
	//向服务器注册用户的会话，以便您可以开始保存用户信息，同时会为用户会话分配一个 UID。

	if($_GET['login']=='out'){
		$_SESSION['islogin']="";
		jump('index.php');
	}
	checklogin($_SESSION['islogin']);
?>