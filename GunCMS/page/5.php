<?php 
	function Page($rows,$page_size){
		global $page,$select_from,$select_limit,$pagenav;
		$page_count = ceil($rows/$page_size);
		if($page <= 1 || $page == '') $page = 1; 
		if($page >= $page_count) $page = $page_count; 
		$select_limit = $page_size; 
		$select_from = ($page - 1) * $page_size; 
		$pre_page=($page == 1)?1:$page-1;
		$next_page= ($page == $page_count)? $page_count : $page + 1 ; 
		$pagenav .= "第 $page/$page_count 页 共 $rows 条记录 "; 
		$pagenav .= "<a href='?id=3&page=1'>首页</a> "; 
		$pagenav .= "<a href='?id=3&page=$pre_page'>前一页</a> "; 
		$pagenav .= "<a href='?id=3&page=$next_page'>后一页</a> "; 
		$pagenav .= "<a href='?id=3&page=$page_count'>末页</a>"; 
		$pagenav.="　跳到<select name='topage' size='1' onchange='window.location=\"?id=3&page=\"+this.value'>\n"; 
		for($i=1;$i <= $page_count;$i++){
			if($i == $page) $pagenav.="<option value='$i' selected>$i</option>\n";
			else  $pagenav.="<option value='$i'>$i</option>\n"; 
		}
	}
?>

<?php
	if($_SESSION['islogin'] == 1){ //admin
		$sql = "select * from sale" ;
		//$sql_m = "select * from sale where month(date)=month(now()) ;";
	}else if($_SESSION['islogin'] == 2){ //saler
		$sql = "select * from sale where name = '".$_SESSION['name']."'";
		//$sql_m = "select * from sale where month(date)=month(now()) and name = '".$_SESSION['name']."'";
	}
	$res = mysql_query($sql);
	//$res_m = mysql_query($sql_m);
	$sql_all = "select * from user where name = '".$_SESSION['name']."'";
	$res_all = mysql_query($sql_all);
	$Row_all = mysql_fetch_assoc($res_all);
	$num1_all =  $Row_all[num1];
	$num2_all =  $Row_all[num2];
	$num3_all =  $Row_all[num3];
?>
<?php 
	//分页函数
	$page = $_GET['page'];
	
	
?>

<h2><span><?=WEBNAME?></span>总销售情况</h2>
<?php 
	if($_SESSION['islogin'] == 2){
		echo "<table border='1'width='98%'  cellpadding='5' cellspacing='5'>
		<tr><td>枪栓</td><td><strong><font color='red'>$num1_all</font></strong> </td></tr>
		<tr><td>枪托</td><td><strong><font color='red'>$num2_all</font></strong> </td></tr>
		<tr><td>枪管</td><td><strong><font color='red'>$num3_all</font></strong> </td></tr>
		</table>";
	}
?>
<p></p>
<table width="98%" border="1"  cellpadding="5" cellspacing="5"> 
	<tr>
		<td>代理商</td>
		<td>枪栓数量</td>
		<td>枪托数量</td>
		<td>枪管数量</td>
		<td>销售城市</td>
		<td>销售日期</td>
	</tr>
<?php
	$rows = mysql_num_rows($res);
	Page($rows,10);
	if($_SESSION['islogin'] == 1){
		$tsql = "select * from sale   limit $select_from, $select_limit ;";
	}else{
		$tsql= "select * from sale where  name = '".$_SESSION['name']."'  limit $select_from ,$select_limit";
	}
	$rst = mysql_query($tsql); 
	while ($rst!=null && $Row_m = mysql_fetch_assoc($rst)){ 
		$in_m = 1;
	?>
		<tr>
		<td><?php echo $Row_m[name] ?></td>
		<td><?php echo $Row_m[num1] ?></td>
		<td><?php echo $Row_m[num2] ?></td>
		<td><?php echo $Row_m[num3] ?></td>
		<td><?php echo $Row_m[city] ?></td>
		<td><?php echo $Row_m[date] ?></td>
		</tr>
		
<?php
	} 
?>
</table>
<table>
<?php	
	echo $pagenav; 

	if($in_m != 1){
		echo "<tr><td> 暂无记录! </td></tr>";
	}
?>
</table>
