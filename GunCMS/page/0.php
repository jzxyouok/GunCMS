<body class="textc" style="background:#CCC;">

<h2><span><?=WEBNAME?></span>采购入库</h2>
<div class="info textc">

<form class="no0 center" action="home.php?id=0" method="post">

	<p>
		<strong>编号：</strong>
		<input type='text' name='goodsID' />
	</p>
	<p>
		<strong>名称：</strong>
		<input type='text' name='goodsName' />
	</p>
	<p>
		<strong>数量：</strong>
		<input type='text' name='goodsNum' />
	</p>
	<p>
		<strong>价格：</strong>
		<input type='text' name='goodsPrice' />
	</p>
	<button type='submit' >采购入库</button>
	<p><input type="hidden" value="1" name="ok" /></p>

</form>

<?php		
	if($_POST['ok'] == 1){
			$v1=$_POST['goodsID'] == null ? 0:$_POST['goodsID'];
			$v2=$_POST['goodsName'] == null ? 0:$_POST['goodsName'];
			$v3=$_POST['goodsNum'] == null ? 0:$_POST['goodsNum'];
			$v4=$_POST['goodsPrice'] == null ? 0:$_POST['goodsPrice'];
			
			$date=date("Y-m-d h:i:s");
			$sql = "Insert into sales (goodsId , goodsName , goodsNum , goodsPrice , status,  date)  values ($v1, '$v2',$v3,$v4,'in','$date') ";
			$DB->query($sql);
			
			$updateOrInsertSQL = "Select * from goods where id = '$v1'";
			$res = mysql_query($updateOrInsertSQL);
			$rows = mysql_num_rows($res);
			if($rows < 1 ){ //不存在
				$sql = "Insert into goods(id,name,num,price) values($v1,'$v2',$v3,$v4);";
			}
			else{ //存在即更新
				$sql = "Update goods set num = num+".$v3.", price = ".$v4." where id = '".$v1."'";
			}
			$DB->query($sql);
			
			echo "<script language='JavaScript'>alert('入库信息录入成功！')</script> " ;//;window.location.reload();</script>";
			echo "<script>location.href=''</script>";			
	}
?>	

        <p style="margin-top:25px;">
        	<?=$echo1?>
        </p>
</body>