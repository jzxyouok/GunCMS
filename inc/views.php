<?php
	header("Content-Type:text/html;charset=gb2312");//�����������
	
	include_once("db.php"); 
	/*���ݴ���*/
	/*
	//ÿ���µ����һ������һ���user���num1,num2,num3�������㣡
	date_default_timezone_set("PRC");
	$date = date("d H:i:s");	
	if($date == "01 00:00:00"){
		$sql = "update user se t num1 = 0,num2 = 0, num3 =0";
		$res = mysql_query($sql);
	}
	//��ֹҳ�滺��
	//header("Cache-Control: no-cache, must-revalidate");
	*/
	if($_POST['page'] == 0){		
			$v1=$_POST['goodsID'] == null ? 0:$_POST['goodsID'];
			$v2=$_POST['goodsName'] == null ? 0:$_POST['goodsName'];
			$v3=$_POST['goodsNum'] == null ? 0:$_POST['goodsNum'];
			$v4=$_POST['goodsPrice'] == null ? 0:$_POST['goodsPrice'];

			$date=date("Y-m-d h:i:s");
			$updateOrInsertSQL = "Select * from goods where id = '$v1'";
			$res = mysql_query($updateOrInsertSQL);
			$rows = mysql_num_rows($res);
			if($rows < 1 ){ //������
				$sql = "Insert into goods(id,name,num,price,logging_date,updating_date) values($v1,'$v2',$v3,$v4,"."'".$date."','".$date."');";
			}
			else{ //���ڼ�����
				$sql = "Update goods set num = num+".$v3.", price = ".$v4.", updating_date ='".$date ."' where id = '".$v1."'";
			}
			$DB->query($sql);
			$msg =  '<div class="alert alert-success">
					<a class="close" data-dismiss="alert">x</a>
					<strong>Success!</strong>You have successfully done it.
				  </div>';
			echo  $msg;	  
	}
	
	if($_POST['page'] == 1){
			$v1=$_POST['goodsID'] == null ? 0:$_POST['goodsID'];
			$v2=$_POST['goodsName'] == null ? 0:$_POST['goodsName'];
			$v3=$_POST['goodsNum'] == null ? 0:$_POST['goodsNum'];
			$v4=$_POST['goodsPrice'] == null ? 0:$_POST['goodsPrice'];
			
			$date=date("Y-m-d h:i:s");
			
			$updateOrInsertSQL = "Select * from goods where id = '$v1'";
			$res = mysql_query($updateOrInsertSQL);
			$rows = mysql_num_rows($res);
			if($rows < 1 ){ //���ﲻ����
				$msg =  '<div class="alert alert-warning">
					<a class="close" data-dismiss="alert">x</a>
					<strong>Warning!</strong>���ﲻ����.
				  </div>';
				echo  $msg;	  
			}else{
				$hobj = mysql_fetch_object($res);
				if($hobj->num < $v3){//�������������Գ���
					$msg =  '<div class="alert alert-warning">
								<a class="close" data-dismiss="alert">x</a>
									<strong>Warning!</strong>����������Ϊ'.$hobj->num.'�������Գ��⣬�������.
							</div>';
					echo  $msg;	  
				}else{
					$handler_name = $_SESSION['name'];
					$sql = "select * from user where name = '".$handler_name."'";
					$handler_id = 
					$sql = "Insert into goods_in_out_log (goods_Id , goods_Num , handler_id, date)  values ($v1, '$v2',$v3,$v4,'out','$date') ";
					$DB->query($sql);
					$sql = "Update goods set num = num-".$v3." where id = '".$v1."'";
					$DB->query($sql);
					
					$msg =  '<div class="alert alert-success">
							<a class="close" data-dismiss="alert">x</a>
							<strong>Success!</strong>You have successfully done it.
						  </div>';
					echo  $msg;	  		
				}
			}
			
			
	}
?>
