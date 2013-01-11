<?php
header("Content-type: image/png");
session_start();
require_once("../mainfile.php");

$path=WEB_PATH;
	//var $font = '/home/www/htdocs/capcha/monofont.ttf'; //ตรวจสอบ path เองมาใส่นะครับ

	function generateCode($characters) {
//    $possible = '23456789bcdefghijklmnopqrsmopwxyz';
		$possible = 'ภถคตจขชพรนยบลฟหกดสวงผปทมฝ';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			$i++;
		}
		return $code;
	}

$code = generateCode($_GET['characters']);

$font = $path."/capcha/font/angsab.ttf";
$im = imagecreate($_GET['width'], $_GET['height']);  
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0); 
$new_string = $code; 
imagefill($im, 0, 0, $black);
//imagestring($im,30, 16, 3, $new_string, $white); 
imageTTFText($im, 20 , 0, 6 ,18,$white,$font,iconv("TIS-620","UTF-8",$new_string));
$_SESSION["security_code"]=$new_string;
imagepng($im); 
imagedestroy($im); 

?>