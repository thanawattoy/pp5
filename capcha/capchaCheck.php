<?php
	session_start();
	if	($_SESSION['security_code'] != $_GET['security_code'] OR empty($_GET['security_code'])) {
		echo "false" ;
		} 	else {
		echo "true" ;
	}
	
?>
