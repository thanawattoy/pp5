<?		//config-download.php by narongrit.net

$dbserver='localhost';
$dbname='max';
$dbuser='root';
$dbpw='16112532';

mysql_connect($dbserver,$dbuser,$dbpw) or die("connect mysql �����");
mysql_select_db($dbname);		//���͡�ҹ������
mysql_query("set NAMES tis620");	//���͡������


?>