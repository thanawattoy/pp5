<?
//ini_set(display_errors, "1");
ob_start();
session_start();

//$ebits = ini_get('error_reporting');   //รายงาน error ของ php
//error_reporting($ebits ^ E_NOTICE);  //รายงาน error ของ php

$globals_test = @ini_get('register_globals');
if ( isset($globals_test) && empty($globals_test) ) {
$types_to_register = array('GET', 'POST', 'COOKIE', 'SESSION', 'SERVER');
foreach ($types_to_register as $type) {
$arr = @${'_' . $type};
if (@count($arr) > 0)
extract($arr, EXTR_SKIP);
}
}


if ( !file_exists( 'includes/config.in.php' ) || filesize( 'includes/config.in.php' ) < 9.00 ) {
	header( 'Location: install/index.php' );
	exit();
}


/*
Installation sub folder check, removed for work with CVS*/
if (file_exists( 'install/index.php' )) {
	include ('offline.php');
	exit();
}
/**/

require_once("mainfile.php");
$_SERVER['PHP_SELF'] = "index.php";
empty($_GET['pp'])?$name="":$name=$_GET['pp'];
empty($_GET['file'])?$file="":$file=$_GET['file'];
GETMODULE($name,$file);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<meta http-equiv=Content-Type content="text/html; charset=tis-620"/>
<title><?=$SchooPrefix;?><?=SchoolName;?></title>
<!-- <link rel="stylesheet" href="style1.css" type="text/css" /> -->
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
<div id="art-page-background-middle-texture">
    <div id="art-page-background-glare">
        <div id="art-page-background-glare-image">
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body">
                <div class="art-header">
                    <div class="art-header-center">
                        <div class="art-header-png"></div>
                    </div>
                    <script type="text/javascript" src="swfobject.js"></script>
                    <div id="art-flash-area">
                    <div id="art-flash-container">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="958" height="150" id="art-flash-object">
                    	<param name="movie" value="container.swf" />
                    	<param name="quality" value="high" />
                    	<param name="scale" value="default" />
                    	<param name="wmode" value="transparent" />
                    	<param name="flashvars" value="color1=0xFFFFFF&amp;alpha1=.30&amp;framerate1=24&amp;loop=true&amp;wmode=transparent&amp;clip=images/flash.swf&amp;radius=10&amp;clipx=0&amp;clipy=-44&amp;initalclipw=900&amp;initalcliph=225&amp;clipw=958&amp;cliph=239&amp;width=958&amp;height=150&amp;textblock_width=0&amp;textblock_align=no" />
                        <param name="swfliveconnect" value="true" />
                    	<!--[if !IE]>-->
                    	<object type="application/x-shockwave-flash" data="container.swf" width="958" height="150">
                    	    <param name="quality" value="high" />
                    	    <param name="scale" value="default" />
                    	    <param name="wmode" value="transparent" />
                        	<param name="flashvars" value="color1=0xFFFFFF&amp;alpha1=.30&amp;framerate1=24&amp;loop=true&amp;wmode=transparent&amp;clip=images/flash.swf&amp;radius=10&amp;clipx=0&amp;clipy=-44&amp;initalclipw=900&amp;initalcliph=225&amp;clipw=958&amp;cliph=239&amp;width=958&amp;height=150&amp;textblock_width=0&amp;textblock_align=no" />
                            <param name="swfliveconnect" value="true" />
                    	<!--<![endif]-->
                    		<div class="art-flash-alt"><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></div>
                    	<!--[if !IE]>-->
                    	</object>
                    	<!--<![endif]-->
                    </object>
                    </div>
                    </div>
                    <script type="text/javascript">swfobject.switchOffAutoHideShow();swfobject.registerObject("art-flash-object", "9.0.0", "expressInstall.swf");</script>
                    <div class="art-logo">
                     <h1 id="name-text" class="art-logo-name">ระบบประเมินผลรายวิชา'2551(ปพ.5) ออนไลน์</h1>
                     <h2 id="slogan-text" class="art-logo-text"><?=$SchooPrefix;?><?=SchoolName;?></h2>
                    </div>
                </div>
                <?include ("".$MODPATHFILE."");?>

                <div class="cleared"></div>
                <div class="art-footer">
                    <div class="art-footer-t"></div>
                    <div class="art-footer-l"></div>
                    <div class="art-footer-b"></div>
                    <div class="art-footer-r"></div>
                    <div class="art-footer-body">
                        <div class="art-footer-text">
                            <p><a href="<?=WEB_URL;?>">ระบบประเมินผลรายวิชา'2551(ปพ.5) ออนไลน์  <?=$SchooPrefix;?><?=SchoolName;?></a></p><p>Copyright &copy; 2012. All Rights Reserved.</p>
                        </div>
                		<div class="cleared"></div>
                    </div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
        <p class="art-page-footer"><a href="http://www.web9wat.com/">ระบบประเมินผลรายวิชา'2551(ปพ.5) ออนไลน์</a> พัฒนาโดย. ธนวัฒน์ ชาวโพธิ์</p>
    </div>
        </div>
    </div>
    </div>
    
</body>

</html>
    
    
    
<!--
<body text=black bgcolor=white topmargin=0 leftmargin=0>
<center><div id="wrapper">
<img src="img/mbu1.jpg" width="960" height="216">
<div id="main"><ul class="v_menu">
	<li><a href="#">Link menu item 1</a>
		<ul>
			<li><a href="#">Sub menu item 1</a></li>
			<li><a href="#">Sub menu item 2</a></li>
			<li><a href="#">Sub menu item 3</a></li>
			<li><a href="#">Sub menu item 4</a></li>
		</ul>	
	</li>
	<li><a href="#">Link menu item 2</a></li>
	<li><a href="#">Link menu item 3</a>
		<ul>
			<li><a href="#">Sub menu item 1</a></li>
			<li><a href="#">Sub menu item 2</a></li>
			<li><a href="#">Sub menu item 3</a></li>
			<li><a href="#">Sub menu item 4</a></li>		
			<li><a href="#">Sub menu item 5</a></li>
			<li><a href="#">Sub menu item 6</a></li>
			<li><a href="#">Sub menu item 7</a></li>
			<li><a href="#">Sub menu item 8</a></li>	
		</ul>		
	</li>
	<li><a href="#">Link menu item 4</a></li>			
</ul>
</div>
    <div id="content"
</div>

    <div id="footer"><b>มหาวิทยาลัยมหามกุฏราชวิทยาลัย วิทยาเขตศรีล้านช้าง</b></br>253/7 ถนนวิสุทธิเทพ ตำบลกุดป่อง อำเภอเมือง จังหวัดเลย 42000 โทร. 0-4283-0434 </br><A HREF="http://reg-mbuslc.com/admin">เข้าระบบผู้ดูแล</A>&nbsp;E-Registrar BETA Version 1.0 By <A HREF="http://free.web9wat.com"> @wat_za</A>
</div></div></center>
</body> -->