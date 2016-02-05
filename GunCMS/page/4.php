<body>
<p style="background:#CCC;">
备份需知：</br>
系统备份，备份的是数据库文件。</br>
sql文件将被保存为当前文件夹下的：日期+mydatabase.sql。</br>
若不存在则新建，若存在则覆盖！</br>
</p>

<form class="no0 center" action="home.php?id=4" method="post">
<input type="submit" value="系统备份" />
<p><input type="hidden" value="2" name="ok" /></p>
</form>

</body>
<?php
	if($_POST['ok'] == 2){
		$filename=date("Y-m-d_H-i-s")."-mydatabase.sql"; 
		$tmpFile = dirname(dirname(__FILE__))."\\db\\".$filename; 
		echo $tmpFile; echo "</br>"; 
		echo "mysqldump -u root -p mydatabase --default-character-set=utf8  > ".$tmpFile;
		exec("mysqldump -u root -p mydatabase --default-character-set=utf8  > ".$tmpFile); 

	}
?>