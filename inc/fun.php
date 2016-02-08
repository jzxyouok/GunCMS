<?php
	function jump($x){
		echo '<script language="javascript" type="text/javascript">window.location="'.$x.'";;</script>';	
		
	}
	function checklogin($x){
		global $islogin;
		/*
		home.php  对应 islogin = 1
		login.php 对应 islogin = 2
		如果session == 1，但此刻不在home.php($islogin!=1)，那么就跳到home.php
		如果session没设置,且此刻不在login.php($islogin!=2)，那么就跳到login.php
		*/
		if($x){
			if($islogin != 1){
				jump('home.php');
			}
		}else {
			if($islogin != 2){
				jump('login.php');
			}
		}
	}
	
	function menu(){
		$a=array('采购入库','供货出库','出入库表单查询统计','货物查询统计','系统备份','管理员资料');
		if($_SESSION['islogin'] == 1){
			for($i=0;$i<6;$i++){
				echo '<li><a href="home.php?id='.$i.'">'.$a[$i].'</a></li>';		
			}
		}
	}
	
	function get_department(){
		global $DB;
		$sql="select * from `department` where 1";
		$DB->query($sql);
		$x=$DB->get_rows_array();
		if($x!=1){
			return $x;	
		}else{
			return 1;
		}
	}
	
	function get_classinfo($i){
		global $DB;
		$sql="select * from `class` where `department`='$i'";
		$DB->query($sql);
		$x=$DB->get_rows_array();
		if($x!=1){
			return $x;	
		}else{
			return 1;
		}
	}
	
	function get_classname($i){
		global $DB;
		$sql="select `name` from `class` where `id`='$i'";
		$x=$DB->fetch_one_array($sql);
		return $x['name'];
	}
	
	function get_dename($i){
		global $DB;
		$sql="select * from `department` where `id`='$i'";
		$x=$DB->fetch_one_array($sql);
		return $x;
	}
	
	function get_code($x,$p=''){
		if(!$x) $x=1;
		switch ($x){
			case 1:
				$x='change_code';
				break;
			case 2:
				$x='reward_levels';
				break;
			case 3:
				$x='punish_levels';
				break;
			default:
				$x='change_code';
		}
		global $DB;
		if($p){
			$p--;
			$sql="select * from `".$x."` where `code`='$p'";
			$qq=$DB->fetch_one_array($sql);
			return $qq['description'];
		}else{
			$sql="select * from `".$x."` where 1";
			$DB->query($sql);
			$x=$DB->get_rows_array();
			if($x!=1){
				return $x;	
			}else{
				return 1;
			}
		}
	}
	
	function index_sid($name){
		global $DB;
		$sql="select `id`,`name` from `student` where `name` like '%$name%'";
		$DB->query($sql);
		$x=$DB->get_rows_array();
		if($x!=1){
			return $x;	
		}else{
			return 1;
		}
	}
	
	function select($t,$w,$i,$r=""){
		global $DB;
		$sql="select * from `".$t."` where `".$w."`='".$i."' limit 0,1";
		$x=$DB->fetch_one_array($sql);
		if($r)	return $x[$r];
		else return $x;
	}
	
	function get_xinfo($t,$w,$id){
		global $DB;
		$sql="select * from `".$t."` where `".$w."`='$id' order by `rec_time` desc";
		$DB->query($sql);
		$x=$DB->get_rows_array();
		return $x;
	}
	

?>