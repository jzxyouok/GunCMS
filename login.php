<?php
	$islogin=2;
	include ('inc/config.php');
	include ('inc/db.php');
	
	if($_POST['ok']==1){
		$name = $_POST['name'];
		$passwd = $_POST['passwd'];
		
		$sql = "Select * from user where name = '$name'";
		$res = mysql_query($sql);
		$rows = mysql_num_rows($res);
		if($rows < 1 ){
			$no='			<div class="alert alert-error">
									  <a class="close" data-dismiss="alert">×</a>
									  <strong>Error!</strong>'.'用户名不存在!'.'</div>';
		}
		else{
			$hobj = mysql_fetch_object($res);
			if($hobj->password != $passwd){
				$no='			<div class="alert alert-error">
									  <a class="close" data-dismiss="alert">×</a>
									  <strong>Error!</strong>'.'用户名或密码错误!'.'</div>';
			}else{
				$_SESSION['name'] = $name; //记录用户名
				$_SESSION['islogin'] = 1; //admin
				//只对saler有效~
				/*
				$_SESSION['num1'] = $hobj->num1;//枪栓数量
				$_SESSION['num2'] = $hobj->num2;//枪托数量
				$_SESSION['num3'] = $hobj->num3;//枪管数量
				*/
				/*
				if($hobj->kind == 'admin'){
					$_SESSION['islogin'] = 1; //admin
				}
				else if($hobj->kind == 'saler'){
					$_SESSION['islogin'] = 2; //saler
				}
				*/
				
				jump('./home.php');
				
			}
		}
	}
	

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>欢迎登陆__<?php echo constant('WEBNAME')?></title>
<link href="./css/bootstrap.min.css" rel="stylesheet">
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
   
</head>

<body class="textc" style="background:#CCC;">
<div class="container">
	<div class="jumbotron">
		<form class="form-horizontal" role="form" action="" method="post">
		   <div class="form-group">
			  <label for="username" class="col-sm-2 control-label">用户名</label>
			  <div class="col-sm-10">
				 <input name="name" type="text" class="form-control" id="username" 
					placeholder="请输入名字">
			  </div>
		   </div>
		   <div class="form-group">
			  <label for="password" class="col-sm-2 control-label">密码</label>
			  <div class="col-sm-10">
				 <input name="passwd" type="password" class="form-control" id="password" 
					placeholder="请输入密码">
			  </div>
		   </div>
		   <div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				 <div class="checkbox">
					<label>
					   <input type="checkbox"> 请记住我
					</label>
				 </div>
			  </div>
		   </div>
		   <div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				 <button type="submit" class="btn btn-default">登录</button>  
			  </div>

			<div class="col-sm-offset-2 col-sm-10">
				<?php echo $no ?>
			  </div>
		   </div>
		   <input type="hidden" value="1" name="ok" />
		   
		</form>
   </div>
</div>
</body>
</html>