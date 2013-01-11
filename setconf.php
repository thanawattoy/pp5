<?
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$db = New DB();
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['configs'] = $db->select_query("SELECT * FROM ".TB_CONFIG."  ORDER BY id ");
$sd=1;
while($arr['configs'] = $db->fetch($res['configs'])){
if ($arr['configs']['posit']=='title'){ $title=$arr['configs']['name'];}
if ($arr['configs']['posit']=='url'){ $url=$arr['configs']['name'];}
if ($arr['configs']['posit']=='path'){ $path=$arr['configs']['name'];}
if ($arr['configs']['posit']=='footer1'){ $footer1=$arr['configs']['name'];}
if ($arr['configs']['posit']=='footer2'){ $footer2=$arr['configs']['name'];}
if ($arr['configs']['posit']=='email'){ $email=$arr['configs']['name'];}
if ($arr['configs']['posit']=='templates'){ $templates=$arr['configs']['name'];}
$sd++;
}
$res['school'] = $db->select_query("SELECT * FROM ".TB_SCHOOL." WHERE SchoolID = 1 ");
while($arr['school'] = $db->fetch($res['school'])){
if ($arr['school']['SchooPrefix']){$SchooPrefix=$arr['school']['SchooPrefix'];}
if ($arr['school']['SchoolName']){$SchoolName=$arr['school']['SchoolName'];}
}

?>