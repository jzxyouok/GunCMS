<?php
    define('WEBNAME','GUNCMS - Power by Emaster');

	include ('inc/fun.php');
	session_start();//会话开始，于HTML之前！
		
	if($_GET['login']=='out'){
		$_SESSION['islogin']="";
		jump('index.php');
	}
	checklogin($_SESSION['islogin']);
?>