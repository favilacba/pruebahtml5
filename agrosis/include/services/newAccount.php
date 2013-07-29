<?php
	include('../include/config.inc.php');							
	include(_SERVER.'/flashServices/errors.inc.php');
	include(_SERVER.'/flashServices/users.inc.php');
	include(_SERVER.'/flashServices/is_email.inc.php');
	include(_INC.'/lxmail.inc.php');
	
	$upObj = new baseMysql('users_profiles');
	$uObj = new userProfile();
	$now = time();
	$errorCode = 0; 
	unset($_SESSION['userProfile']);
	
	
	$upObj = new baseMysql('users_profiles');
	$_upObj = new userProfile;
	
	$res['error'] = true;
	$res['errorCode'] = 99;
	$res['errorDesc'] = 'Please send all the requiered data. Email, username and password';
	$res['data'] = false;
	
	/**
	* needed data:  eMail, userName, password
	* 
	*/
	$email = (isset($_REQUEST['eMail']) && trim($_REQUEST['eMail'])!= '') ? stripslashes($_REQUEST['eMail']) : '';
	$username = (isset($_REQUEST['userName']) && trim($_REQUEST['userName'])!= '') ? stripslashes($_REQUEST['userName']) : '';
	$password = (isset($_REQUEST['password']) && trim($_REQUEST['password'])!= '') ? stripslashes($_REQUEST['password']) : '';
	$newsletter = (isset($_REQUEST['newsletter']) && trim($_REQUEST['newsletter'])== 'true') ? 1 : 0;
	
	$r_email = 	is_email($email,false,true);
	$testEmail = ($r_email === ISEMAIL_VALID) ? true : false;
	if($email != '' && $testEmail === false){
		$errorCode = 8;
		$res['error'] = true;
		$res['errorCode'] = $errorCode;
		$res['errorDesc'] = getError('newAccount',$errorCode);
		$res['data'] = false;
	}
		
	if( $email != '' && $username != '' && $password != '' && $testEmail === true){
		//Data validation
		$sqlEmail = mysql_real_escape_string($email);
		$sqlUsername = mysql_real_escape_string($username);
		$sqlValidate = "SELECT email, username FROM `{$upObj->tableName}` WHERE `email`='$sqlEmail' OR `username` = '$sqlUsername'";
		$qres = $upObj->query($sqlValidate);
		//not found user
		if($qres === false){
			//Save data
			$hashedPassword = md5($password);
			$saveUser['user_id'] = 0;
			$saveUser['username'] = $username;
			$saveUser['email'] = $email;
			$saveUser['password'] = $hashedPassword;
			$saveUser['newsletter'] = $newsletter;
			$saveUser['added'] = $now;
			$saveUser['validHash'] = $uObj->getValidationHash();
			$saveUser['validAccount'] = 0;
			//$user_id = $upObj->saveRecord($saveUser,'user_id');
			$user_id = $uObj->saveUser($saveUser);
			
			if($user_id > 0){
				$res['error'] = false;
				$res['errorCode'] = 0;
				$res['errorDesc'] = '';
				$data = $_upObj->getUserById($user_id);
				//if(isset($data['password'])) unset($data['password']);
				$_SESSION['userProfile'] = $data;
				unset($data['validHash'],$data['password'],$data['user_id']);
				$res['data'] = $data;
				//Send welcome email
				$mObj = new lxmail();
				$url = "http://";
				$url .= (DEVEL_MODE) ? 'dev.': '';
				$url .=  _DOMAIN;
				$emailTxt = "Ahoy {$saveUser['username']},
				
Ye have been granted access to “Be A Pirate”. To begin ye must first click the link below to activate your account:
".$url."/activated.php?key={$saveUser['validHash']}&u=$username

Pirates Voyage® Fun, Feast & Adventure™
The Most Breathtaking Dinner Show Ever!®";
				$mObj->addFrom('noreply@piratesvoyage.com',"Pirates Voyage® Fun, Feast & Adventure™");
				$mObj->subject = "Pirates Voyage® Fun, Feast & Adventure™ - Activate My Account";
				$mObj->addTo($saveUser['email']);
				$mObj->addText($emailTxt);
				$mObj->send();
			}
			else{
				$errorCode = 4;
				$res['error'] = true;
				$res['errorCode'] = $errorCode;
				$res['errorDesc'] = getError('newAccount',$errorCode);
				$res['data'] = false;
			}
		}
		else{
			//1 user exist, 2 email exist, 3 user and email exist
			$errorCode += ($qres[0]['username'] == $username) ? 1 : 0;
			$errorCode += ($qres[0]['email'] == $email) ? 2 : 0;
			$res['error'] = true;
			$res['errorCode'] = $errorCode;
			$res['errorDesc'] =  getError('newAccount',$errorCode);
			$res['data'] = false;
		}
	}
	echo json_encode($res) ;
?>