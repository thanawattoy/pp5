<?
ob_start();
if (session_id() =='') { session_start(); }
//�ҡ�ա�����¡������µç
if (eregi("mainfile.php",$_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
}
empty($_GET['pp'])?$name="":$name=$_GET['pp'];
empty($_GET['file'])?$file="":$file=$_GET['file'];
empty($_SESSION['admin_user'])?$admin_user="":$admin_user=$_SESSION['admin_user'];
empty($_SESSION['admin_pwd'])?$admin_pwd="":$admin_pwd=$_SESSION['admin_pwd'];
empty($_SESSION['login_true'])?$login_true="":$login_true=$_SESSION['login_true'];
empty($_GET['op'])?$op="":$op=$_GET['op'];
empty($_GET['action'])?$action="":$action=$_GET['action'];
empty($_GET['page'])?$page="":$page=$_GET['page'];
empty($_GET['category'])?$category="":$category=$_GET['category'];


require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/array.in.php");
require_once("includes/class.ban.php");
require_once("includes/class.calendar.php");
require_once("includes/function.in.php");
require_once("setconf.php");
$db = New DB();

//��Ǩ�ͺ����������������� (����� User)
function GETMODULE($name,$file){
	global $MODPATH, $MODPATHFILE ;
	if(!$name){$name= "index";}
	if(!$file){$file = "index";}
$modpathfile="modules/".$name."/".$file.".php";
if (file_exists($modpathfile)) {
	$MODPATHFILE = $modpathfile;
	$MODPATH = "modules/".$name."/";
	}else{
	die ("����㨴��¤�Ѻ �����˹�ҷ���ҹ��ͧ�����Ҫ�...");
	}
}

function getIP(){  
    // ��Ǩ�ͺ IP �óա����ҹ share internet  
    if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $IP  = $_SERVER['HTTP_CLIENT_IP'];
      } else {
        $IP = $_SERVER['REMOTE_ADDR'];
      }
    } else {
      if (getenv('HTTP_X_FORWARDED_FOR')) {
        $IP  = getenv('HTTP_X_FORWARDED_FOR');
      } elseif (getenv('HTTP_CLIENT_IP')) {
        $IP  = getenv('HTTP_CLIENT_IP');
      } else {
        $IP  = getenv('REMOTE_ADDR');
      }
    }

    return $IP ;  
} 
$IPADDRESS=getIP();



define("WEB_TITILE","".$title.""); 
define("WEB_URL","".$url."") ; 
define("WEB_PATH","".$path."") ; 
define("WEB_FOOTER1","".$footer1."") ; 
define("WEB_FOOTER2","".$footer2."") ; 
define("WEB_EMAIL","".$email."") ;
define("WEB_TEMPLATES","".$templates."") ;
define("SchoolName", "".$SchoolName."");
//�������к�����ҹ�Է�ԡ����ҹ
$PermissionFalse = "<BR><BR>";
$PermissionFalse .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\"></A><BR><BR>";
$PermissionFalse .= "<FONT COLOR=\"#336600\"><B>��ҹ������Ѻ͹حҵ�����ҹ��ǹ�����</B></FONT><BR><BR>";
$PermissionFalse .= "<A HREF=\"?name=admin&file=main\"><B>˹����ѡ�������к�</B></A>";
$PermissionFalse .= "</CENTER>";
$PermissionFalse .= "<BR><BR>";

// ��ǹ�ͧ�к���Ҫԡ������������ѧ�� narongrit.net
$home = "".WEB_URL."" ; // url ���䫴�ͧ�س ���ҷ���ͧ������¡
$admin_email = "".WEB_EMAIL."" ; // ������ͧ�س
$yourcode = "web" ; // ���ʹ�˹�������Ţ��Ҫԡ�ͧ�س �� ip00001 , abc00005
$member_num_show = 5 ;  // �ӹǹ�ͧ��Ҫԡ����ͧ�������ʴ����  1 ˹�� ��к��ͧ admin 
$member_num_show_last = 5 ;  // �ӹǹ�ͧ��Ҫԡ����ش����ͧ�������ʴ�
$member_num_last = 1 ;  // �ӹǹ�ͧ��Ҫԡ����ش����ͧ�������ʴ�˹���á

$bkk= mktime(gmdate("H")+7,gmdate("i")+0,gmdate("s"),
	gmdate("m") ,gmdate("d"),gmdate("Y"));
$datetimeformat="j/m/y - H:i";
$now = date($datetimeformat,$bkk);


?>
