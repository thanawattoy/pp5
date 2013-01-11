<?		//config-download.php by narongrit.net

$dbserver='localhost';
$dbname='max';
$dbuser='root';
$dbpw='16112532';

mysql_connect($dbserver,$dbuser,$dbpw) or die("connect mysql ไม่ได้");
mysql_select_db($dbname);		//เลือกฐานข้อมูล
mysql_query("set NAMES tis620");	//เลือกภาษาไทย


?>