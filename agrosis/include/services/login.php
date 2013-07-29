<?php
	include('../include/config.inc.php');							
	include(_SERVER.'/flashServices/errors.inc.php');
	include(_SERVER.'/flashServices/users.inc.php');
	
	$now = time();
	$errorCode = 0;
	$res['error'] = true;
	$res['errorCode'] = 99;
	$res['errorDesc'] = 'Username and password are required.';
	$res['data'] = false;
	 
	unset($_SESSION['userProfile']);
	
	$username = (isset($_REQUEST['username'])) ? stripslashes($_REQUEST['username']) : '';
	$password = (isset($_REQUEST['password'])) ? stripslashes($_REQUEST['password']) : '';
	
	$upObj = new userProfile;
	$logged = $upObj->login($username,$password);
	
	if($logged === true){
		//test if user is active
		if($_SESSION['userProfile']['validAccount'] == 1){
			$res['error'] = false;
			$res['errorCode'] = 0;
			$res['errorDesc'] = '';
			$res['data'] = $_SESSION['userProfile'];	
		}
		else{
			$res['error'] = true;
			$res['errorCode'] = 2;
			$res['errorDesc'] = getError('login',2);
			$res['data'] = false;
		}
	}
	else{
		$res['error'] = true;
		$res['errorCode'] = 1;
		$res['errorDesc'] = getError('login',1);
		$res['data'] = false;
	}
	
	echo json_encode($res);
?>