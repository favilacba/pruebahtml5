<?php
	session_start();
	require_once('baseMySql.inc.php');
	
	$DB_HOST 		= "localhost";
	$DB_NAME 		= "fabi729_phpl901";
	$DB_USER 		= "fabi729_phpl901";
	$DB_PASSWORD	= '8PSi2jn80o';
	
	define("_SERVER",$_SERVER['DOCUMENT_ROOT'].'/');
	define("_INC",_SERVER."include/");
	define("_ROOTPATH","http://www.fabioavila.com.ar/agrosis/");
	
	//read the cookie
	$get_cookie = $_COOKIE['PiratesCookie'];
	if($get_cookie != ''){
		$getData = explode("|",$get_cookie);
		$iduser = $getData[0];
		$expiration_date = $getData[1];
		$today = time();
		if($today > $expiration_date){
			$loginFlag = false;
		}
		else{	
			$obj_users = new baseMysql('users_profiles');
			$tmp = $obj_users->getRecords('user_id = "'.$iduser.'"', '' ,'');
			if($tmp['results']){
				$loginFlag = true;
				$myuser = $tmp['results'][0]['username'];
				$log_userID = $tmp['results'][0]['user_id'];
			}
			else{
				$loginFlag = false;
			}
		}
	}
	else{
		$loginFlag = false;
	}
	function validate_login($flag){
		if(!$flag)
			header("location:index.php");
	}
?>