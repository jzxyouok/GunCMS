<?php
    define('WEBNAME','GUNCMS - Power by Emaster');

	include ('inc/fun.php');
	session_start();//�Ự��ʼ����HTML֮ǰ��
		
	
	//�������ע���û��ĻỰ���Ա������Կ�ʼ�����û���Ϣ��ͬʱ��Ϊ�û��Ự����һ�� UID��

	if($_GET['login']=='out'){
		$_SESSION['islogin']="";
		jump('index.php');
	}
	checklogin($_SESSION['islogin']);
?>