<?php
	$islogin=1;
	include ('inc/config.php');
	$id=$_GET['id'];
	include ('inc/db.php');
	/*数据处理*/
	//每个月的最后一天的最后一秒把user表的num1,num2,num3数据清零！
	date_default_timezone_set("PRC");
	$date = date("d H:i:s");	
	if($date == "01 00:00:00"){
		$sql = "update user set num1 = 0,num2 = 0, num3 =0";
		$res = mysql_query($sql);
	}
	//禁止页面缓存
	//header("Cache-Control: no-cache, must-revalidate");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head Cache-control="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo constant('WEBNAME') ?></title>
<link href="/img/css.css" rel="stylesheet" type="text/css" />
</head>

<body class="textc">
<p>
	<strong><?php echo 欢迎.$_SESSION['name']."登陆!" ?></strong>
</p>
<ul class="topmenu">
	<strong>贴心导航:</strong><?php menu() ?>
</ul>
<br/>
<div class="hbox center">
<?php
	if($_SESSION['islogin'] == 1){
		switch($id){
			case 0:
				include ('page/0.php');	
				break;
			case 1:
				include ('page/1.php');
				break;
			case 2:
				include ('page/2.php');
				break;
			case 3:
				include ('page/3.php');
				break;
			case 4:
				include ('page/4.php');
				break;
			case 5:
				include ('page/5.php');
				break;
			default:
				include ('page/0.php');
		}
	}
?>
<p style="margin:15px 0;color:#666;" align="center">
	- <?=WEBNAME?> -
    <br/><br/>
    <a href="index.php?login=out">退出</a>
</p>
<div class="hboxfoot center">
</div>
<div class="clear"></div>
</body>
</html>