<body>
<p style="background:#CCC;">
������֪��</br>
ϵͳ���ݣ����ݵ������ݿ��ļ���</br>
sql�ļ���������Ϊ��ǰ�ļ����µģ�����+mydatabase.sql��</br>
�����������½����������򸲸ǣ�</br>
</p>

<form class="no0 center" action="home.php?id=4" method="post">
<input type="submit" value="ϵͳ����" />
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