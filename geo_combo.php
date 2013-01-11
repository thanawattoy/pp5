<?php
	header('Content-type:text/html;charset=tis-620');
	require_once 'mainfile.php';
	if (!isset($_GET['load'])){
		$_GET['load'] = 'province';
	}
	switch($_GET['load']){
		case 'province':
			$r = mysql_query("SELECT * FROM `province`") or report();
			echo '<option value="0">-- เลือกจังหวัด --</option>';
			while ($row = mysql_fetch_assoc($r)){
				echo '<option value="',$row['PROVINCE_ID'],'">',
					$row['PROVINCE_NAME'],
				'</option>';
			}
		break;
		case 'amphur':
			$province_id = isset($_GET['province_id'])?intval($_GET['province_id']):0;
			$r = mysql_query("SELECT * FROM `amphur` WHERE `PROVINCE_ID`=$province_id") or report();
			echo '<option value="0">-- เลือกอำเภอ --</option>';
			while ($row = mysql_fetch_assoc($r)){
				echo '<option value="',$row['AMPHUR_ID'],'">',
					$row['AMPHUR_NAME'],
				'</option>';
			}
		break;
		case 'district':
			$amphur_id = isset($_GET['amphur_id'])?intval($_GET['amphur_id']):0;
			$r = mysql_query("SELECT * FROM `district` WHERE `AMPHUR_ID`=$amphur_id") or report();
			echo '<option value="0">-- เลือกตำบล --</option>';
			while ($row = mysql_fetch_assoc($r)){
				echo '<option value="',$row['DISTRICT_ID'],'">',
					$row['DISTRICT_NAME'],
				'</option>';
			}
		break;
	}
	function report(){
		return die('<option>'.htmlspecialchars(mysql_error()).'</option>');
	}
?>