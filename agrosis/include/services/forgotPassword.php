<?php
	include('../include/config.inc.php');							
	include(_SERVER.'/flashServices/errors.inc.php');
	include(_SERVER.'/flashServices/users.inc.php');
	include(_INC.'/lxmail.inc.php');
	
	$uObj = new userProfile;
	$errorCode=false; 
	$res['error'] = true;
	$res['errorCode'] = 99;
	$res['errorDesc'] = 'Email is required';
	$res['data'] = false;
	
	//Email address required
	$email = (isset($_REQUEST['eMail']) && trim($_REQUEST['eMail'])!= '') ? stripslashes($_REQUEST['eMail']) : '';
	
	if($email != ''){
		if(strpos($email,'@') === false)
			$userData = $uObj->getUser($email);
		else
			$userData = $uObj->getUserByEmail($email);
		if($userData !== false){
			$now = time();
			$start = rand(0,10);
			$offset = rand(5,9);
			$newPass = substr(sha1($now),$start,$offset);
			
			$userData['password'] = md5($newPass);
			$userData['pwdHash_time'] = $now;
			$userData['lastmove'] = $now;
			
			$_rs = $uObj->saveUser($userData);
			if($_rs !== false){
				//send email with new password
				$emailTxt = "Ahoy {$userData['username']},
Yer username and new password are below:

Username: {$userData['username']}
New Password: $newPass

Pirates Voyage® Fun, Feast & Adventure™
The Most Breathtaking Dinner Show Ever!®™
";
				$mObj = new lxmail();
				$mObj->addFrom('noreply@piratesvoyage.com',"Pirates Voyage® Fun, Feast & Adventure™");
				$mObj->subject = "Pirates Voyage® Fun, Feast & Adventure™ - Password Recovery";
				$mObj->addTo($userData['email'],$userData['username']);
				$mObj->addText($emailTxt);
				$mObj->addHTML(nl2br($emailTxt));
				$mObj->send();
				
				unset($userData['password']);
				unset($userData['user_id']);
				$errorCode = false;
				$res['error'] = false;
				$res['errorCode'] = 0;
				$res['errorDesc'] = '';
				$res['data'] = $userData;
				unset($_SESSION['userProfile']);
			}
			else{
				//can't save
				$errorCode=2;
			}
		}
		else{
			$errorCode=1;
		}
		if($errorCode !== false){
			$res['error'] = true;
			$res['errorCode'] = $errorCode;
			$res['errorDesc'] = getError('forgotPwd',$errorCode);
			$res['data'] = false;
		}
		
	}
	
	
	echo json_encode($res);
?>