<?php
	include('../include/config.inc.php');							
	include(_SERVER.'/flashServices/errors.inc.php');
	include(_SERVER.'/flashServices/users.inc.php');
	
	$now = time();
	
	unset($_SESSION['userProfile']);
	
	$username = (isset($_REQUEST['u'])) ? stripslashes($_REQUEST['u']) : '';
	$key = (isset($_REQUEST['key'])) ? stripslashes($_REQUEST['key']) : '';
	$url = "http://";
	$url .= (DEVEL_MODE) ? 'dev.': '';
	$url .=  'flash.'._DOMAIN;
	$activate = false;
					
	$upObj = new userProfile();
	$activate = $upObj->activateAccount($key,$username);
	$act = ($activate) ? 'true' : 'false';
	header("Location: ".$url."/index.php?activate=".$act);
	exit();
	
?>