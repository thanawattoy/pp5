<?
/*
ผู้พัฒนา maxsite 1.10: นายอัษฎา อินต๊ะ
โทรศัพท์ : 081-595-3392
Email : mocyc@hotmail.com
http://maxsite.geniuscyber.com


ตัวคอนฟิกในการควบคุมระบบเว็บไซต์ 
*/
$globals_test = @ini_get('register_globals');
if ( isset($globals_test) && empty($globals_test) ) {
$types_to_register = array('GET', 'POST', 'COOKIE', 'SESSION', 'SERVER');
foreach ($types_to_register as $type) {
$arr = @${'_' . $type};
if (@count($arr) > 0)
extract($arr, EXTR_SKIP);
}
}

//หากมีการเรียกไฟล์นี้โดยตรง
if (eregi("config.in.php",$PHP_SELF)) {
    Header("Location: ../index.php");
    die();
}

//MAXSITE Version
define("_SCRIPT","ATOMYMAXSITE"); 
define("_VERSION","2.0"); 

//Web Config

define("TIMESTAMP",time()) ;
define("WEB_TIMESTART","1309440702") ;  
//define("WEB_TEMPLATES","atomy") ; 
//Capcha ตัวหนังสือยืนยันการโพสข้อความ
define("USE_CAPCHA", true); //ใช้การป้องกันการโพสสแปม   true , false
define("CAPCHA_TYPE","2"); //รูปแบบของตัวอักษร 1 = แบบสวยงาม , 2 = แบบธรรมดา
define("CAPCHA_NUM","4"); //จำนวนตัวอักษร
define("CAPCHA_WIDTH","60"); //ขนาดความกว้าง
define("CAPCHA_HEIGHT","25"); //ขนาดความสูง

/*
CAPCHA_TYPE แบบที่ 1 ต้องเซ็ทค่าดังนี้
 กรณีที่ตัวอักษรไม่ขึ้นให้เข้าไปแก้ที่ไฟล์ capcha/CaptchaSecurityImages.php บรรทัดที่ 6 ให้ใส่ path ให้ถูกต้อง หากต้องการทราบ path ให้เปิดไฟล์ phpinfo.php เพื่อตรวจสอบ path ของเว็บไซต์ 
*/

//Calendar
define("USE_THAIYEAR", true); //แสดงผลเป็น พ.ศ. ใน calendar   true , false


//MySQL Connect
define("DB_HOST","localhost");
define("DB_NAME","ladpooco_eis");
define("DB_USERNAME","ladpooco_school");
define("DB_PASSWORD","Toy16112532");

//MySQL table
define("TB_ADMIN","web_admin");
define("TB_ADMIN_GROUP","web_groups");
define("TB_NEWS","web_news");
define("TB_NEWS_COMMENT","web_news_comment");
define("TB_NEWS_CAT","web_news_category");
define("TB_KNOWLEDGE","web_knowledge");
define("TB_KNOWLEDGE_COMMENT","web_knowledge_comment");
define("TB_KNOWLEDGE_CAT","web_knowledge_category");
define("TB_CALENDAR","web_calendar");
define("TB_WEBBOARD","web_webboard");
define("TB_WEBBOARD_COMMENT","web_webboard_comment");
define("TB_WEBBOARD_CAT","web_webboard_category");
define("TB_MEMBER","web_member");
define("TB_MAIL","web_mail");
//Permission Name
define("_NEWS","ข่าวสาร");
define("_NEWSCAT","หมวดหมู่ข่าวสาร");
define("_ADMIN","ผู้ดูแลระบบ");
define("_USER","สมาชิก");   // ใช้กับระบบสมาชิก สำหรับ MAXSITE @V.3
define("_GROUP","ระดับผู้ดูแลระบบ");
define("_LINKS","Web Links");
define("_ARTICLE","บทความ");
define("_ARTICLECAT","หมวดหมู่บทความ");
define("_CONTACT","อีเมล์ติดต่อในเว็บไซต์");
define("_CALENDAR","ปฏิทินกิจกรรม");
define("_WEBBOARD","เว็บบอร์ด");
define("_EDITORTALK","Editor Talk");
define("_ABOUTUS","เกี่ยวกับเรา");
define("_MINEPASS","ชื่อผู้ใช้ รหัสผ่าน");
define("_CONFIG","หัวท้ายเวป");
define("_CONFIGCAT","หมวดหัวท้ายเวป");
define("_BLOCK","ตำแหน่ง block");
define("_POLL","แบบสำรวจ");
define("_GBOOK","สมุดเยี่ยม");
//Icon Size
define("_INEWS_W","80"); //ไอคอนข่าวสารกว้าง
define("_INEWS_H","60"); //ไอคอนข่าวสารสูง
define("_IKNOW_W","80"); //ไอคอนความรู้กว้าง
define("_IKNOW_H","60"); //ไอคอนความรู้สูง 
define("_Iuser_W","80");//ไอคอนความรู้สูง     // ใช้กับระบบสมาชิก สำหรับ MAXSITE @V.3
define("_Iuser_H","80"); //ไอคอนความรู้สูง     // ใช้กับระบบสมาชิก สำหรับ MAXSITE @V.3
define("_Iadmin_W","80"); //ไอคอนข่าวสารกว้าง
define("_Iadmin_H","100"); //ไอคอนข่าวสารสูง
//Show Topic
define("_NEWS_COL","2"); //จำนวนคอลัมน์ในการแสดงข่าวสาร
define("_KNOW_COL","2"); //จำนวนคอลัมน์ในการแสดงสาระความรู้ 

//Webboard control
define("_NUM_ID","5"); //การแสดงหัวข้อโดยแสดงจำนวนกี่หลัก เช่น ตั้งค่าเป็น 5 ก็จะแสดง 00001 , 00015 เป็นต้น
define("_SHOW_BOARD_PIN","5"); //การจำนวนกระทู้ปักหมุด
define("_PERPAGE_BOARD","10"); //จำนวนกระทู้ที่แสดงหน้าบอร์ดแต่ละหมวด
define("_ENABLE_BOARD_UPLOAD",true); //ให้มีการอัพโหลดรูปได้  true , false
define("_WEBBOARD_LIMIT_UPLOAD","102400"); //ขนาดไฟล์รูปที่อัพโหลดได้ 
define("_WEBBOARD_LIMIT_UPLOADS","1024000"); //ขนาดไฟล์ที่แนบ
define("_WEBBOARD_LIMIT_PICWIDTH","500"); //ขนาดไฟล์รูปที่อัพโหลดได้ 
define("_MEMBER","ระบบสมาชิก");
define("_MEMBER_LIMIT_PICWIDTH","100");
define("_MEMBER_LIMIT_UPLOAD","102400"); //ขนาดไฟล์รูป member
define("_MEMBER_COL","2"); 




//useronline
define("TB_useronline","web_useronline");
define("TB_gbook","web_gbook");
define("TB_personnel","web_personnel");
define("TB_personnel_group","web_personnel_group");
define("TB_ACTIVEUSER","web_activeuser");
define("_IPER_W","160"); //ไอคอนข่าวสารกว้างรูปใหญ่
define("_IPER_H","200"); //ไอคอนข่าวสารสูงรูปใหญ่
define("_IPERTHB_W","120"); //ไอคอนข่าวสารกว้างรูปเล็ก
define("_IPERTHB_H","150"); //ไอคอนข่าวสารสูงรูปเล็ก
//เมนูสร้างเอง
define("TB_PAGE","web_page");
define("_IPAGE_W","48"); //ไอคอนข่าวสารกว้าง
define("_IPAGE_H","48"); //ไอคอนข่าวสารสูง
define("_PAGE","เมนูสร้างเอง");

//ผลงานทางวิชาการ
define("TB_RESEARCH","web_research");
define("_Iresearch_W","100"); //ไอคอนข่าวสารกว้าง
define("_Iresearch_H","120"); //ไอคอนข่าวสารสูง
define("_RESEARCH","ผลงานทางวิชาการ");
define("TB_RESEARCH_COMMENT","web_research_comment");
define("TB_RESEARCH_CAT","web_research_category");
define("_RESEARCHCAT","หมวดหมู่ผลงานทางวิชาการ");
define("_RESEARCH_COL","2"); 

//GALLERY
define("TB_GALLERY","web_gallery");
define("_GALLERY","อัลบัมรูปภาพ");
define("TB_GALLERY_COMMENT","web_gallery_comment");
define("TB_GALLERY_CAT","web_gallery_category");
define("_IGALLERY_W","500"); //ไอคอนข่าวสารกว้าง
define("_IGALLERY_H","600"); //ไอคอนข่าวสารสูง
define("_IGALLERYT_W","120"); //ไอคอนข่าวสารกว้าง thb
define("_IGALLERYT_H","100"); //ไอคอนข่าวสารสูง thb
define("_GALLERYCAT","หมวดหมู่ไฟล์ gallery");
define("_GALLERY_COL","3"); 
define("_GALLERYCAT_COL","2");
define("_GALLERY_ADMIN_COL","4"); 
define("_GALLERYCAT_ADMIN_COL","3");
define("_GALLERY_LIMIT_UPLOAD","512000"); //ขนาดไฟล์รูป member


//download
define("TB_DOWNLOAD","web_download");
define("_Idownload_W","100"); //ไอคอนข่าวสารกว้าง
define("_Idownload_H","80"); //ไอคอนข่าวสารสูง
define("_DOWNLOAD","download");
define("TB_DOWNLOAD_COMMENT","web_download_comment");
define("TB_DOWNLOAD_CAT","web_download_category");
define("_DOWNLOADCAT","หมวดหมู่ไฟล์ download");
define("_DOWNLOAD_COL","2"); 

//webconfig
define("TB_CONFIG","web_config");
define("TB_CONFIG_CAT","web_config_category");
//block
define("TB_BLOCK","web_block");
//vote
define("TB_VOTE","web_vote");
//alumnus
define("TB_ALUMNUS","web_alumnus");
define("_ALUMNUS_LIMIT_PICWIDTH","100"); //ความกว้างไฟล์รูปศิษย์เก่า
define("_ALUMNUS_LIMIT_UPLOAD","51200"); //ขนาดไฟล์รูปศิษย์เก่า
define("_ALUMNUS_COL","2"); 

// workboard
define("TB_WORKBOARD_MEMBERS","web_workboard_members");
define("TB_WORKBOARD_POSITIONS","web_workboard_positions");
define("TB_WORKBOARD_PRIORITIES","web_workboard_priorities");
define("TB_WORKBOARD_PROJECTS","web_workboard_projects");
define("TB_WORKBOARD_PROJECTS_MEMBERS","web_workboard_projects_members");
define("TB_WORKBOARD_STATUS","web_workboard_status");
define("TB_WORKBOARD_TASKS","web_workboard_tasks");
define("TB_WORKBOARD_TASKS_MEMBERS","web_workboard_tasks_members");

define("TB_BLOG","web_blog");
define("TB_BLOG_COMMENT","web_blog_comment");
define("TB_BLOG_CAT","web_blog_category");
define("TB_BLOG_LEVEL","web_blog_level");
define("_BLOG","blog");
define("_BLOG_COL","2");
define("_Iblog_W","100");//ความกว้างรูปนักเรียน     
define("_Iblog_H","80"); //ความสูงรูปนักเรียน   

// poll
define("TB_POLL","web_polls");
define("TB_POLL_VOTES","web_poll_votes");


?>