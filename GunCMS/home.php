<?php
	$islogin=1;
	include ('inc/config.php');
	$id=$_GET['id'];
	include ('inc/db.php');
	/*���ݴ���*/
	//ÿ���µ����һ������һ���user���num1,num2,num3�������㣡
	date_default_timezone_set("PRC");
	$date = date("d H:i:s");	
	if($date == "01 00:00:00"){
		$sql = "update user set num1 = 0,num2 = 0, num3 =0";
		$res = mysql_query($sql);
	}
	//��ֹҳ�滺��
	//header("Cache-Control: no-cache, must-revalidate");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head Cache-control="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo constant('WEBNAME') ?></title>
<link href="./css/bootstrap.min.css" rel="stylesheet">
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<script type="text/javascript">

//��ȡURL����
function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}

//���ݲ�������������<li>����active
$(document).ready(function () {
	pageid = GetQueryString("id");
	var li = document.getElementsByTagName('li');
	if(null == pageid){
		$(li[0]).attr("class","active");
	}else{
		if(pageid < 4){
			$(li[pageid]).attr("class","active");
		}else if(pageid == 4 || pageid == 5){
			$(li[4]).attr("class","active");
		}
	}
});
</script>

</head>

<body class="textc">
<p>
	<strong><?php echo ��ӭ.$_SESSION['name']."��½!" ?></strong>
</p>
<nav class="navbar navbar-inverse" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="./">ǹ֧����</a>
   </div>
   <div>
      <ul class="nav navbar-nav">
         <li><a href="home.php?id=0">�ɹ����</a></li>
		 <li  id='page1'><a href="home.php?id=1">��������</a></li>
         <li><a href="home.php?id=2">��������ѯͳ��</a></li>
		 <li><a href="home.php?id=3">�����ѯͳ��</a></li>
		 
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               ϵͳ���� 
               <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="home.php?id=4">ϵͳ����</a></li>
               <li><a href="home.php?id=5">����Ա����</a></li>
            </ul>
         </li>
      </ul>
   </div>
</nav>
<!--
<ul class="nav nav-pills">
	<li class="active"><a href="./">Home</a></li>
	<?php menu() ?>
</ul>
<br/>
-->
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
    <a href="index.php?login=out">�˳�</a>
</p>
<div class="hboxfoot center">
</div>
<div class="clear"></div>
</body>
</html>