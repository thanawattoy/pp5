<?
//หากมีการเรียกไฟล์นี้โดยตรง
if (eregi("config.in.php",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}
?>