<?php
	include('../include/config.inc.php');							
	include(_SERVER.'/flashServices/errors.inc.php');
	include(_SERVER.'/flashServices/users.inc.php');
	include(_SERVER.'/flashServices/is_email.inc.php');
	include(_INC.'/lxmail.inc.php');   

	$uObj = new userProfile();
	$now = time();
	$sendConfirmEmail = false;
	$errorCode = 0;
	$res['error'] = true;
	$res['errorCode'] = 99;
	$res['errorDesc'] = 'You must to be loogged.';
	$res['data'] = false;

	if(  $uObj->loguedUser() === true ){
	  $res['error'] = false;
	  $res['errorCode'] = '';
	  $res['errorDesc'] = '';
	  $res['data'] = $_SESSION['userProfile'];
	}

	echo json_encode($res);
?>