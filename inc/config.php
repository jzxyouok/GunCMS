<?php
    define('WEBNAME','GUNCMS - Power by Emaster');

	include ('inc/fun.php');
	session_start();//�Ự��ʼ����HTML֮ǰ��
		
	if($_GET['login']=='out'){
		$_SESSION['islogin']="";
		jump('index.php');
	}
	checklogin($_SESSION['islogin']);
?>