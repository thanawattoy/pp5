<?

//webboard Icon
function WebIcon($Ntime="", $Otime="", $Icon=""){
	if(TIMESTAMP <= ($Otime + 86400)){
		echo "<IMG SRC=\"".$Icon."\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}
}

//News Icon
function NewsIcon($Ntime="", $Otime="", $Icon=""){
	if(TIMESTAMP <= ($Otime + 86400)){
		echo "<IMG SRC=\"".$Icon."\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}
}
//update icon
function UpdateIcon($Ntime="", $Otime="", $Icon=""){
	if(TIMESTAMP <= ($Otime + 86400)){
		echo "<IMG SRC=\"".$Icon."\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";
	}
}
//�ѧ����㹡��ź��� \ �͡��������ʴ�����ء��ͧ
function FixQuotes ($what = "") {
        $what = ereg_replace("'","''",$what);
        while (eregi("\\\\'", $what)) {
                $what = ereg_replace("\\\\'","'",$what);
        }
        return $what;
}

//�ѧ��������¹��ͤ�������������������ԧ�� 
function CHANGE_LINK($Message = ""){
	$Message = eregi_replace("([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])","<a href=\"\\1://\\2\\3\" target=\"_blank\">\\1://\\2\\3</a>",$Message);
	$Message = eregi_replace("([[:alnum:]]+)@([^[:space:]]*)([[:alnum:]])","<a href=mailto:\\1@\\2\\3>\\1@\\2\\3</a>",$Message); 
return ($Message);
}

//�ӡ����˹��
function SplitPage($page="",$totalpage="",$option=""){
	global $ShowSumPages , $ShowPages ;
	// ���ҧ link �����˹�ҡ�͹-˹�ҶѴ�
	$ShowSumPages .= "<B>���ѧ�ʴ�˹�ҷ��  </B>";
	if($page>1 && $page<=$totalpage) {
		$prevpage = $page-1;
		$ShowSumPages .= "<a href='".$option."&page=$prevpage' title='Back'><B><-</B></a>\n";
	}
	$ShowSumPages .= " <b>$page/$totalpage</b> ";
	if($page!=$totalpage) {
		$nextpage = $page+1;
		if($nextpage >= $totalpage){
			$nextpage = $totalpage ;
		}
		$ShowSumPages .= "<a href='".$option."&page=$nextpage' title='Next'><B>-></B></a>\n";
	}

	// ǹ�ٻ�ʴ��Ţ˹�ҷ����� Ẻ�繪�ǧ� ��ǧ�� 10 ˹��
	$b=floor($page/10); 
	$c=(($b*10));

	if($c>1) {
		$prevpage = $c-1;
		$ShowPages .= "<a href='".$option."&page=$prevpage' title='10 ˹�ҡ�͹���'><<</a> \n";
	}
	else{
		$ShowPages .= "<B><<</B>\n";
	}
	$ShowPages .= " <b>";
	for($i=$c; $i<$page ; $i++) {
		if($i>0)
		$ShowPages .= "<a href='".$option."&page=$i'>$i</a> \n";
	}
	$ShowPages .= "<font color=red>$page</font> \n";
	for($i=($page+1); $i<($c+10) ; $i++) {
		if($i<=$totalpage)
		$ShowPages .= "<a href='".$option."&page=$i'>$i</a> \n";
	}
	$ShowPages .= "</b> ";
	if($c>=0) {
		if(($c+2)<$totalpage){
	$nextpage = $c+10;
	$ShowPages .= "<a href='".$option."&page=$nextpage' title='10 ˹�ҶѴ�'>>></a> \n";
		}
		else
	$ShowPages .= "<B>>></B>\n";
	}
	else{
		$ShowPages .= "<B>>></B>\n";
	}
}


// ��˹��Ẻ��§��

function page_navigator($modules="",$file="",$id="",$before_p="",$plus_p="",$total="",$total_p="",$chk_page=""){   
	global $db;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='?name=".$modules."&file=".$file."&id=".$id."&s_page=$pPrev' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='?name=".$modules."&file=".$file."&id=".$id."&s_page=0'>1</a><a class='SpaceC'>. . .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='?name=".$modules."&file=".$file."&id=".$id."&s_page=$i'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?name=".$modules."&file=".$file."&id=".$id."&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='?name=".$modules."&file=".$file."&id=".$id."&s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?name=".$modules."&file=".$file."&id=".$id."&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='?name=".$modules."&file=".$file."&id=".$id."&s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='?name=".$modules."&file=".$file."&id=".$id."&s_page=$i' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($total_p !='' && $chk_page<$total_p-1){
		echo "<a href='?name=".$modules."&file=".$file."&id=".$id."&s_page=$pNext'  class='naviPN'>Next</a>";
	}
}   




//code ��˹������Ѻ����������բ�ͤ�������
function breakpage($mod="",$page="",$id="",$thepage=""){
	global $mod , $page ,$id ,$thepage;
if (!defined("_PREVIOUS")) define("_PREVIOUS","˹�ҡ�͹���");
if (!defined("_NEXT")) define("_NEXT","˹�ҶѴ�");

$contentpages = explode( "<!--pagebreak-->", $thepage );

$pageno = count($contentpages);
if ( $page=="" || $page < 1 ) $page = 1;
if ( $page > $pageno ) $page = $pageno;
$arrayelement = (int)$page;
$arrayelement --;
if ($pageno > 1) $thepageNew .= "<b>˹�� $page/$pageno</b><br />";
$thepageNew = "<p align=\"justify\">".$contentpages["".$arrayelement.""]."</p>";
if($page >= $pageno) $next_page = "";
else {
   $next_pagenumber = $page + 1;
   if ($page != 1) {
      $next_page .= "- ";
   }
   $next_page .= "<a href=\"?name=".$mod."&amp;file=read".$mod."&amp;id=".$id."&amp;page=$next_pagenumber\"><b>"._NEXT." ($next_pagenumber/$pageno)</b></a><a href=\"?name=".$mod."&amp;file=read".$mod."&amp;id=".$id."&amp;page=$next_pagenumber\">  <img src=\"images/go.gif\"border=\"0\" alt=\""._NEXT."\" /></a>";
}
if($page <= 1) $previous_page = "";
else {
   $previous_pagenumber = $page - 1;
   $previous_page = "<a href=\"?name=".$mod."&amp;file=read".$mod."&amp;id=".$id."&amp;page=$previous_pagenumber\"><img src=\"images/backs.gif\" border=\"0\" alt=\""._PREVIOUS."\" /></a>  <a href=\"?name=".$mod."&amp;file=read".$mod."&amp;id=".$id."&amp;page=$previous_pagenumber\"><b>"._PREVIOUS." ($previous_pagenumber/$pageno)</b></a>";
}
$thepageNew .= "<br /><br /><br /><center><b> $previous_page $next_page </b></center><br /><br />";
$thepages = $thepageNew;
echo "$thepages";
// End PageBreak Code
}


//�ŧ������������
function ThaiTimeConvert($timestamp="",$full="",$showtime=""){
	global $SHORT_MONTH, $FULL_MONTH, $DAY_SHORT_TEXT, $DAY_FULL_TEXT;
	$day = date("l",$timestamp);
	$month = date("n",$timestamp);
	$year = date("Y",$timestamp);
	$time = date("H:i:s",$timestamp);
	$times = date("H:i",$timestamp);
	if($full){
		$ThaiText = $DAY_FULL_TEXT[$day]." ��� ".date("j",$timestamp)." ��͹ ".$FULL_MONTH[$month]." �.�.".($year+543) ;
	}else{
		$ThaiText = date("j",$timestamp)." / ".$SHORT_MONTH[$month]." / ".($year+543);
	}

	if($showtime == "1"){
		return $ThaiText." ���� ".$time;
	}else if($showtime == "2"){
		$ThaiText = date("j",$timestamp)." ".$SHORT_MONTH[$month]." ".($year+543);
		return $ThaiText." : ".$times;
	}else{
		return $ThaiText;
	}
}

//��Ǩ�ͺ����� Admin ��ԧ��������ԧ
function CheckAdmin($user = "", $pwd =""){
	global $db ;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['user'] = $db->select_query("SELECT id FROM ".TB_ADMIN." WHERE username='$user' AND password='$pwd' ");
	$arr['user'] = $db->fetch($res['user']);
	if(!$arr['user']['id']){
		echo "<script language='javascript'>" ;
		echo "alert('��ҹ�����������к�')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}


function CheckUserblog($user = "", $pwd =""){
	global $db ;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['user'] = $db->select_query("SELECT id FROM ".TB_MEMBER." WHERE user='$user' AND password='$pwd' and blog='1' ");
	$arr['user'] = $db->fetch($res['user']);
	if(!$arr['user']['id']){
		echo "<script language='javascript'>" ;
		echo "alert('��ҹ�������Ҫԡ�������ö��¹ blog �� ��سҵԴ��ͼ�������к���Ѻ')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}

//��Ǩ�ͺ�дѺ�ͧ�������к�
function CheckLevel($Username = "", $Action = ""){
	global $db ;
	//Check Level
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['user'] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE username='$Username' ");
	$arr['user'] = $db->fetch($res['user']);
	//Check Action
	$res['action'] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE id='".$arr['user']['level']."' ");
	$arr['action'] = $db->fetch($res['action']);
	if($arr['action'][$Action]){
		return True;
	}else{
		return False;
	}
}


//��Ǩ�ͺ�дѺ�ͧ�������к� ������Ѻ�к���Ҫԡ ����Ѻ MAXSITE @V.3
function CheckLevelUser($Username = "", $Action = ""){
	global $db ;
	//Check Level
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['user'] = $db->select_query("SELECT * FROM ".TB_MEMBER." WHERE user='$Username' ");
	$arr['user'] = $db->fetch($res['user']);
	//Check Action
	$res['action'] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE id='".$arr[user][level]."' ");
	$arr['action'] = $db->fetch($res['action']);
	if($arr['action'][$Action]){
		return True;
	}else{
		echo "<script language='javascript'>" ;
		echo "alert('��ҹ�������Ҫԡ������Է�����ҹ���ǹ��� ��ͧ������')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}


//��� Alert ����������ö�����ҹ�� 
function NotTrueAlert($permission="", $option="", $text=""){
	if($option == 1){
		$option = "<script language='javascript'>javascript:history.go(-1)</script>";
	}elseif($option == 2){
		$option = "<script language='javascript'>refresh_close();</script>";
	}elseif($option == 3){
		$option = "<script language='javascript'>self.close();</script>";
	}

	if(!$permission){
		echo "<script language='javascript'>" ;
		echo "alert('".$text."')" ;
		echo "</script>" ;
		echo $option ;
		exit();
	}
}

//�礢�Ҵ Folder
function dirsize($dirName = '.') {
   $dir  = dir($dirName);
   $size = 0;

   while($file = $dir->read()) {
       if ($file != '.' && $file != '..') {
           if (is_dir($file)) {
               $size += dirsize($dirName . '/' . $file);
           } else {
               $size += filesize($dirName . '/' . $file);
           }
       }
   }
   $dir->close();
   return $size;
}

//�ŧ˹��¢�Ҵ��� 
function getfilesize($bytes) {
   if ($bytes >= 1099511627776) {
       $return = round($bytes / 1024 / 1024 / 1024 / 1024, 2);
       $suffix = "TB";
   } elseif ($bytes >= 1073741824) {
       $return = round($bytes / 1024 / 1024 / 1024, 2);
       $suffix = "GB";
   } elseif ($bytes >= 1048576) {
       $return = round($bytes / 1024 / 1024, 2);
       $suffix = "MB";
   } elseif ($bytes >= 1024) {
       $return = round($bytes / 1024, 2);
       $suffix = "KB";
   } else {
       $return = $bytes;
       $suffix = "Byte";
   }
   if ($return == 1) {
       $return .= " " . $suffix;
   } else {
       $return .= " " . $suffix . "s";
   }
   return $return;
}

// �ѧ��Ѵ
function province_name($provinceid) {
global $db ;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['province'] = $db->select_query("SELECT * FROM province WHERE PROVINCE_ID = '$provinceid' ");
$arr['province'] = $db->fetch($res['province']);
                        $provincename = $arr['province']['PROVINCE_NAME'];
echo "$provincename";
return ;
}
// �����
function amphur_name($amphurid) {
global $db ;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['amphur'] = $db->select_query("SELECT * FROM amphur WHERE AMPHUR_ID = '$amphurid' ");
$arr['amphur'] = $db->fetch($res['amphur']);
                        $amphurname = $arr['amphur']['AMPHUR_NAME'];
echo "$amphurname";
return ;
}

// �Ӻ�
function district_name($districtid) {
global $db ;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['district'] = $db->select_query("SELECT * FROM district WHERE DISTRICT_ID = '$districtid' ");
$arr['district'] = $db->fetch($res['district']);
                        $districtname = $arr['district']['DISTRICT_NAME'];
echo "$districtname";
return ;
}

// �Ӻ�
function school1($firstn) {
global $db ;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['school'] = $db->select_query("SELECT * FROM pp_school WHERE SchoolID = 1 ");
$arr['school'] = $db->fetch($res['school']);
$$firstname = $arr['school']['$firstn'];
echo "$firstname";
return ;
}
?>