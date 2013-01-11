<? require_once("modules/admin/topmenu.php"); ?>
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                          <div class="art-post">
                              <div class="art-post-body">
                                  <h2> ข้อมูลสถานศึกษา </h1></br>
<? require_once 'geo.php'; ?>
<? if($_GET[op] == ""){
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res['school'] = $db->select_query("SELECT * FROM ".TB_SCHOOL." WHERE SchoolID = 1 ");
$arr['school'] = $db->fetch($res['school']);
?>

<form action="?pp=admin&file=setschool&op=update" method="post" enctype="multipart/form-data">
    <table align="center" width="99%" border="0">
        <tr>
            <td align="right">
                <b> รหัสสถานศึกษา 
            </td>
            <td>
                <input type="text"  name="SchoolCode" size="15" maxlength="12" value="<? echo $arr['school']['SchoolCode']; ?>" />
            </td>
            <td align="right">
                <b> ประเภทสถานศึกษา 
            </td>
            <td>
                <input type="text"  name="SchooPrefix" size="15" maxlength="100" value="<? echo $arr['school']['SchooPrefix']; ?>" />                
            </td>
            <td align="right">
               <b> ชื่อสถานศึกษา 
            </td>
            <td>
                <input type="text"  name="SchoolName" size="25" maxlength="400" value="<? echo $arr['school']['SchoolName']; ?>" />                
            </td>
        </tr>
        <tr>
            <td align="right">
              <b>  สังกัด 
            </td>
            <td>
                <input type="text"  name="Department" size="20" maxlength="400" value="<? echo $arr['school']['Department']; ?>" />
            </td>
            <td align="right">
              <b>  สพท. เขต 
            </td>
            <td>
                <input type="text"  name="AcademicArea" size="10" maxlength="400" value="<? echo $arr['school']['AcademicArea']; ?>" />                
            </td>
            <td align="right">
              <b>  วันอนุมัติจบ
            </td>
            <td>
                <input type="text"  name="PermitDate" size="10" maxlength="400" value="<? echo $arr['school']['PermitDate']; ?>" />                
            </td>
        </tr>
        <tr>
            <td align="right">
             <b>   นายทะเบียน 
            </td>
            <td>
                <input type="text"  name="RegisterName" size="20" maxlength="400" value="<? echo $arr['school']['RegisterName']; ?>" />
            </td>
            <td align="right">
             <b>   ผู้บริหาร 
            </td>
            <td>
                <input type="text"  name="DirectorName" size="20" maxlength="400" value="<? echo $arr['school']['DirectorName']; ?>" />                
            </td>
            <td align="right">
             <b>   ตำแหน่งผู้บริหาร
            </td>
            <td>
                <input type="text"  name="DirectorPost" size="20" maxlength="400" value="<? echo $arr['school']['DirectorPost']; ?>" />                
            </td>
        </tr>
        <tr class="inputtext">
            <td align="right">
                อักษรคั่น ชั้น/ห้อง  
            </td>
            <td>
                <input type="text"  name="Spliter" size="5" maxlength="4" value="<? echo $arr['school']['Spliter']; ?>" />
            </td>
            <td align="right">
                วันที่เปิดภาคเรียนที่ 1 
            </td>
            <td>
                <input type="text"  name="Term1Date" size="10" maxlength="10" value="<? echo $arr['school']['Term1Date']; ?>" />                
            </td>
            <td align="right">
                วันที่เปิดภาคเรียนที่ 2 
            </td>
            <td>
                <input type="text"  name="Term2Date" size="10" maxlength="10" value="<? echo $arr['school']['Term2Date']; ?>" />                
            </td>
        </tr>
        <tr>
            <td align="right">
                <b> School Name  
            </td>
            <td>
                <input type="text"  name="SchoolNameEng" size="25" maxlength="200" value="<? echo $arr['school']['SchoolNameEng']; ?>" />
            </td>
            <td align="right">
                <b> Director Name 
            </td>
            <td>
                <input type="text"  name="DirectorNameEng" size="25" maxlength="200" value="<? echo $arr['school']['DirectorNameEng']; ?>" />                
            </td>
            <td align="right">
               <b> Register Name 
            </td>
            <td>
                <input type="text"  name="RegisterNameEng" size="25" maxlength="200" value="<? echo $arr['school']['RegisterNameEng']; ?>" />                
            </td>
        </tr>
    </table> 
    <hr>
    <table align="center" width="99%" border="0">
        <tr>
            <td align="right">
                รหัสประจำบ้าน
            </td>
            <td>
                <input type="text"  name="HomeCode" size="15" maxlength="200" value="<? echo $arr['school']['HomeCode']; ?>" />
            </td>
            <td align="right">
                เลขที่
            </td>
            <td>
                <input type="text"  name="HomeNo" size="5" maxlength="200" value="<? echo $arr['school']['HomeNo']; ?>" />
            </td>
            <td align="right">
                หมู่ที่
            </td>
            <td>
                <input type="text"  name="GroupNo" size="5" maxlength="200" value="<? echo $arr['school']['GroupNo']; ?>" />
            </td>
            <td align="right">
                ซอย
            </td>
            <td>
                <input type="text"  name="Soi" size="15" maxlength="200" value="<? echo $arr['school']['Soi']; ?>" />
            </td>
        </tr>
        <tr>
            <td align="right">
                ถนน
            </td>
            <td>
                <input type="text"  name="Road" size="15" maxlength="200" value="<? echo $arr['school']['Road']; ?>" />
            </td>
            <td align="right">
                <B>    จังหวัด
            </td>
            <td>
    <select id="selProvince" name="selProvince">
    	<option value=""> ------- เลือก ------ </option>
        <?php
			$result = mysql_query("
				SELECT
					PROVINCE_ID,
					PROVINCE_NAME
				FROM 
					province
				ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC;
			");
			
			while($row = mysql_fetch_assoc($result)){
                            ?>
				<option value="<?=$row['PROVINCE_ID'];?>" <? if ($row['PROVINCE_ID']==$arr['school']['ProvinceID']) { echo 'selected="selected"';}?> ><?=$row['PROVINCE_NAME'];?></option>';
	<?		}
		?>
    </select>

            </td>
            <td align="right">
                <b>อำเภอ
            </td>
            <td>
     <select id="selAmphur" name="selAmphur">
    	<option value=""> ------- เลือก ------ </option>
                <?php
			$result = mysql_query("
			SELECT
				AMPHUR_ID,
				AMPHUR_NAME
			FROM
				amphur
			WHERE PROVINCE_ID = '".$arr['school']['ProvinceID']."'
			ORDER BY CONVERT(AMPHUR_NAME USING TIS620) ASC;
		");
			
			while($row = mysql_fetch_assoc($result)){
                            ?>
				<option value="<?=$row['AMPHUR_ID'];?>" <? if ($row['AMPHUR_ID']==$arr['school']['DistrictID']) { echo 'selected="selected"';}?> ><?=$row['AMPHUR_NAME'];?></option>';
	<?		}
		?>
    </select><span id="waitAmphur"></span>

            </td>
            <td align="right">
                <b>ตำบล
            </td>
            <td>
    <select id="selTumbon" name="selTumbon">
    	<option value=""> ------- เลือก ------ </option>
                        <?php
			$result = mysql_query("
			SELECT
				DISTRICT_ID,
				DISTRICT_NAME
			FROM
				district
			WHERE AMPHUR_ID = '".$arr['school']['DistrictID']."'
			ORDER BY CONVERT(DISTRICT_NAME USING TIS620) ASC;
		");
			
			while($row = mysql_fetch_assoc($result)){
                            ?>
				<option value="<?=$row['DISTRICT_ID'];?>" <? if ($row['DISTRICT_ID']==$arr['school']['TambonID']) { echo 'selected="selected"';}?> ><?=$row['DISTRICT_NAME'];?></option>';
	<?		}
		?>

    </select><span id="waitTumbon"></span>
            </td>
        </tr>
        <tr>
            <td align="right">
                รหัสไปรษณีย์
            </td>
            <td>
                <input type="text"  name="PostCode" size="5" maxlength="5" value="<? echo $arr['school']['PostCode']; ?>" />
            </td>
            <td align="right">
                โทรศัพท์
            </td>
            <td colspan="3">
                <input type="text"  name="Tel" size="30" maxlength="200" value="<? echo $arr['school']['Tel']; ?>" />
            </td>
            <td align="right">
                โทรสาร
            </td>
            <td>
                <input type="text"  name="Fax" size="20" maxlength="200" value="<? echo $arr['school']['Fax']; ?>" />
            </td>
        </tr>
        <tr>
            <td align="right">
                อีเมล์
            </td>
            <td colspan="3">
                <input type="text"  name="Email" size="45" maxlength="200" value="<? echo $arr['school']['Email']; ?>" />
            </td>
            <td align="right" >
                เว็บไซต์
            </td>
            <td colspan="3">
                <input type="text"  name="WebSite" size="45" maxlength="200" value="<? echo $arr['school']['WebSite']; ?>" />
            </td>
        </tr>
        <tr>
            <td align="right">
                School Address 
            </td>
            <td colspan="7">
                <input type="text"  name="SchoolAddress" size="120" maxlength="500" value="<? echo $arr['school']['SchoolAddress']; ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <table align="center" width="99%" border="0">
        <tr>
            <td align="right">
                <b> ชื่อผู้ช่วยวิชาการ 
            </td>
            <td>
                <input type="text"  name="AcademicName" size="40" maxlength="200" value="<? echo $arr['school']['AcademicName']; ?>" />
            </td>
            <td align="right">
                ตราสัญลักษณ์
            </td>
            <td>
                <input type="file" name="filUpload" onpropertychange="view01.src=FILE.value;" style="width=250;">
            </td>
        </tr>
        <tr>
            <td align="right" height="10" valign="top">
                <b> ตำแหน่ง 
            </td>
            <td valign="top">
                <input type="text"  name="AcademicPostName" size="40" maxlength="200" value="<? echo $arr['school']['AcademicPostName']; ?>" />
            </td>
            <td align="center" colspan="2" rowspan="3">
                <div class="photo sample3"><IMG SRC="images/logo_school.jpg" height="100" ></div>
            </td>

        </tr>
        <tr>
            <td align="right" valign="top" height="10">
                ประธานประเมินคุณลักษณะฯ 
            </td>
            <td valign="top">
                <input type="text"  name="prote" size="40" maxlength="200" value="<? echo $arr['school']['prote']; ?>" />
            </td>
        </tr>
        </tr>
        <tr>
            <td align="right" valign="top">
                Key 
            </td>
            <td valign="top">
                <input type="text"  name="SID" size="60" maxlength="200" value="<? echo $arr['school']['SID']; ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="4">
              <?
              $sid = "SID";
              echo school1($sid) ?>      <HR>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center">
           <input type="submit" value=" บันทึก " >
            </td>
        </tr>
    </table>
</form>
                             
<? $db->closedb (); }
if($_GET[op] == "update"){
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$q['school'] = "UPDATE ".TB_SCHOOL." SET 
			SchoolCode='".$_POST['SchoolCode']."',
			SchooPrefix='".$_POST['SchooPrefix']."',
			SchoolName='".$_POST['SchoolName']."',
			Department='".$_POST['Department']."',
			AcademicArea='".$_POST['AcademicArea']."',
			RegisterName='".$_POST['RegisterName']."',
			DirectorName='".$_POST['DirectorName']."',
			DirectorPost='".$_POST['DirectorPost']."',
			PermitDate='".$_POST['PermitDate']."',
			Term1Date='".$_POST['Term1Date']."',
			Term2Date='".$_POST['Term2Date']."',
			Spliter='".$_POST['Spliter']."',
			GenderSorting='".$_POST['GenderSorting']."',
			SID='".$_POST['SID']."',
			HomeCode='".$_POST['HomeCode']."',
			HomeNo='".$_POST['HomeNo']."',
			GroupNo='".$_POST['GroupNo']."',
			Soi='".$_POST['Soi']."',
			Road='".$_POST['Road']."',
			TambonID='".$_POST['selTumbon']."',
			DistrictID='".$_POST['selAmphur']."',
			ProvinceID='".$_POST['selProvince']."',
			PostCode='".$_POST['PostCode']."',
			Tel='".$_POST['Tel']."',
			Fax='".$_POST['Fax']."',
			WebSite='".$_POST['WebSite']."',
			Email='".$_POST['Email']."',
			SchoolNameEng='".$_POST['SchoolNameEng']."',
			DirectorNameEng='".$_POST['DirectorNameEng']."',
			RegisterNameEng='".$_POST['RegisterNameEng']."',
			AcademicName='".$_POST['AcademicName']."',
			SchoolAddress='".$_POST['SchoolAddress']."',
			prote='".$_POST['prote']."',
			ip='".$IPADDRESS."',
			UserID='".$_POST['SchoolID']."' WHERE SchoolID=1";
			$sql['school'] = mysql_query ( $q['school'] ) or sql_error ( "db-query",mysql_error() );
			$db->closedb ();
if($_FILES["filUpload"]["name"] != "" )
	{
		$lstrFileName = "images/logo_school.jpg";
                if (file_exists($lstrFileName)) {
		move_uploaded_file($_FILES["filUpload"]["tmp_name"],$lstrFileName);
					//*** Delete Old File ***//			
		//	@unlink("../student/".$_POST["id"].".jpg");
		}
 else {
     copy($_FILES["filUpload"]["tmp_name"],$lstrFileName);
 }
	}

                echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
                echo "<script>window.location='?pp=admin&file=setschool'</script>";exit();

}
?>         
                              </div>
                          </div>
                          <div class="cleared"></div>
                        </div>
                    </div>
                </div>
