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
		$pagenav .= "�� $page/$page_count ҳ "; 
		$pagenav .= "<a href='?id=2&page=1'>��ҳ</a> "; 
		$pagenav .= "<a href='?id=2&page=$pre_page'>ǰһҳ</a> "; 
		$pagenav .= "<a href='?id=2&page=$next_page'>��һҳ</a> "; 
		$pagenav .= "<a href='?id=2&page=$page_count'>ĩҳ</a>"; 
		$pagenav.="������<select name='topage' size='1' onchange='window.location=\"?id=2&page=\"+this.value'>\n"; 
		for($i=1;$i <= $page_count;$i++){
			if($i == $page) $pagenav.="<option value='$i' selected>$i</option>\n";
			else  $pagenav.="<option value='$i'>$i</option>\n"; 
		}
	}
?>
<?php
	if($_SESSION['islogin'] == 1){ //admin
		$sql_m = "select * from sales ;";
	}
	$res_m = mysql_query($sql_m);
	
?>
<?php 
	//��ҳ����
	$page = $_GET['page'];
?>

<table>
<body class="textc" style="background:#CCC;">
<form action="" method="post">
<div class="loginbox center">
	<tr>
	<td>�ؼ��ֲ�ѯ:</td>
	<td><input type="text" value="" name="search_key" /></td>
	</tr>
	<tr>
	<td>����ID��ѯ:</td>
	<td><input type="text" value="" name="search_id" /></td>
	</tr>
	<tr>
	<td> <input type="hidden" value="1" name="ok" />
    <button type="submit">��ѯ</button></td>
	</tr>
</form>
</table>


<h2 style="text-align:center;">���������</h2>

<p></p>
<table width="98%" border="1"  cellpadding="5" cellspacing="5"> 
	<tr>
		<td>����</td>
		<td>����ID</td>
		<td>��������</td>
		<td>��������</td>
		<td>����۸�</td>
		<td>����״̬</td>
		<td>����ʱ��</td>
	</tr>
<?php
	$rows_m = mysql_num_rows($res_m);
	Page($rows_m,10);
	if($_SESSION['islogin'] == 1){
		$search_key = $_POST['search_key'];
		$search_id = $_POST['search_id'];
		if($search_key && !$search_id){
			$tsql = "select * from sales where concat(goodsID,goodsName,date,status) like '%".$search_key."%'";
		}else if(!$search_key && $search_id){
			$tsql = "select * from sales where goodsid = ".$search_id;
		}else if($search_key && $search_id){
			$tsql = "select * from sales where concat(goodsID,goodsName,date,status) like '%".$search_key."%' and goodsID = ".$search_id;
		}else{
			$tsql = "select * from sales";
		}
		
		//$tsql = "select * from sales where goodsID = ".$searchKey_id." limit $select_from, $select_limit ;";
		//else if($searchKey_id && ) {
		//	$tsql = "select * from sales  limit $select_from, $select_limit ;";
		//}
	}
	$rst = mysql_query($tsql); 
	while ( $rst!= null && $Row_m = mysql_fetch_assoc($rst)){ 
		$in_m = 1;
	?>
		<tr>
		<td><?php echo $Row_m[id] ?></td>
		<td><?php echo $Row_m[goodsID] ?></td>
		<td><?php echo $Row_m[goodsName] ?></td>
		<td><?php echo $Row_m[goodsNum] ?></td>
		<td><?php echo $Row_m[goodsPrice] ?></td>
		<td><?php echo $Row_m[status] ?></td>
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
		echo "<tr><td> ���޼�¼! </td></tr>";
	}
?>
</table>
