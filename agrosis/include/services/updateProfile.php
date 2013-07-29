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
		$email = (isset($_REQUEST['eMail']) && trim($_REQUEST['eMail'])!= '') ? stripslashes($_REQUEST['eMail']) : '';
		$password = (isset($_REQUEST['password']) && trim($_REQUEST['password'])!= '') ? stripslashes($_REQUEST['password']) : '';
		$newsletter = (isset($_REQUEST['newsletter']) && trim($_REQUEST['newsletter'])!= '') ? 1 : 0;

		if($email != '' || $password != ''){
			$update = false;
			$updateUser = $uObj->userData;

			if($password != ''){
				$update = true;
				$updateUser['password'] = md5($password);
			}
			//if email change test if not used
			if($email != '' && $email != $updateUser['email']){
				$r_email = 	is_email($email,false,true);
				$validEmail = ($r_email === ISEMAIL_VALID) ? true : false;
				if($validEmail){
					$testEmail = $uObj->getUserByEmail($email) ;
					if($testEmail === false){
						$updateUser['pEmail'] = $email;		
						$updateUser['validHash'] = $uObj->getValidationHash();
						$update = true;
						$sendConfirmEmail = true;
					}
					else{
						$res['error'] = true;
						$res['errorCode'] = 2;
						$res['errorDesc'] = getError('updateProfile',2);
						$res['data'] = false;
						$update = false;
					}
				}
				else{
					$res['error'] = true;
					$res['errorCode'] = 4;
					$res['errorDesc'] = getError('updateProfile',4);
					$res['data'] = false;
					$update = false;
				}
			}
			
			if($updateUser['newsletter'] != $newsletter){
				$updateUser['newsletter'] = $newsletter; 
				$update = true; 
			}

			if($update === true){
				$r = $uObj->saveUser($updateUser);

				if($r === false){
					$res['error'] = true;
					$res['errorCode'] = 8;
					$res['errorDesc'] = getError('updateProfile',8);
					$res['data'] = false;
				}
				else{
					$_SESSION['userProfile'] =  $updateUser; 
					
					if($sendConfirmEmail === true){
						//Send welcome email
				$mObj = new lxmail();
				$url = "http://";
				$url .= (DEVEL_MODE) ? 'dev.': '';
				$url .=  _DOMAIN;
				$emailTxt = "Ahoy {$updateUser['username']},
				
Ye have been granted access to “Be A Pirate”. To begin ye must first click the link below to activate your new email:
".$url."/activated.php?key={$updateUser['validHash']}&u={$updateUser['username']}

Pirates Voyage® Fun, Feast & Adventure™
The Most Breathtaking Dinner Show Ever!®";
				$mObj->addFrom('noreply@piratesvoyage.com',"Pirates Voyage® Fun, Feast & Adventure™");
				$mObj->subject = "Pirates Voyage® Fun, Feast & Adventure™ - Activate My New Email";
				$mObj->addTo($updateUser['pEmail']);
				$mObj->addText($emailTxt);
				$mObj->send();
					}
					
					unset($updateUser['password']);
					unset($updateUser['user_id']);
					unset($updateUser['validHash']);
					$res['error'] = false;
					$res['errorCode'] = 0;
					$res['errorDesc'] = 0;
					$res['data'] = $updateUser;
				}
			}
			else{
				$_SESSION['userProfile'] =  $updateUser; 
				unset($updateUser['password']);
				unset($updateUser['user_id']);
				unset($updateUser['validHash']);
				$res['error'] = false;
				$res['errorCode'] = 0;
				$res['errorDesc'] = 'Nothing Changed. Not Saved';
				$res['data'] = $updateUser;
			}
		}
		else{
			$res['error'] = true;
			$res['errorCode'] = 1;
			$res['errorDesc'] = getError('updateProfile',1);
			$res['data'] = false;
		}
	}

	echo json_encode($res);
?>