<body class="textc" style="background:#CCC;">

<h2><span><?=WEBNAME?></span>�ɹ����</h2>
<div class="info textc">

<form class="no0 center" action="home.php?id=0" method="post">

	<p>
		<strong>��ţ�</strong>
		<input type='text' name='goodsID' />
	</p>
	<p>
		<strong>���ƣ�</strong>
		<input type='text' name='goodsName' />
	</p>
	<p>
		<strong>������</strong>
		<input type='text' name='goodsNum' />
	</p>
	<p>
		<strong>�۸�</strong>
		<input type='text' name='goodsPrice' />
	</p>
	<button type='submit' >�ɹ����</button>
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
			if($rows < 1 ){ //������
				$sql = "Insert into goods(id,name,num,price) values($v1,'$v2',$v3,$v4);";
			}
			else{ //���ڼ�����
				$sql = "Update goods set num = num+".$v3.", price = ".$v4." where id = '".$v1."'";
			}
			$DB->query($sql);
			
			echo "<script language='JavaScript'>alert('�����Ϣ¼��ɹ���')</script> " ;//;window.location.reload();</script>";
			echo "<script>location.href=''</script>";			
	}
?>	

        <p style="margin-top:25px;">
        	<?=$echo1?>
        </p>
</body>