<?php
	$errorDesc['newAccount'][1] = "Username alread exist.";
	$errorDesc['newAccount'][2] = "Email already exist.";
	$errorDesc['newAccount'][4] = "Error adding user SQL.";
	$errorDesc['newAccount'][8] = "Email address is not valid."; 
	
	$errorDesc['login'][1] = "Please check username and password.";
	$errorDesc['login'][2] = "Account was not activated.";
	
	$errorDesc['updateProfile'][1] = "Email or password are required.";
	$errorDesc['updateProfile'][2] = "Email already used.";
	$errorDesc['updateProfile'][4] = "Email address is not valid.";
	$errorDesc['updateProfile'][8] = "Error Saving Data.";
	
	$errorDesc['forgotPwd'][1] = "Check email address. Data not found.";
	$errorDesc['forgotPwd'][2] = "Can't update password. error saving.";
	
	$errorDesc['savePic'][1] = "You must to be logged.";
	$errorDesc['savePic'][2] = "Data image not found";
	$errorDesc['savePic'][4] = "Is not a valid image";
	
	function getError($error, $code){
		global $errorDesc;
		$description = array();
		if(isset($errorDesc[$error]))
			foreach($errorDesc[$error] as  $k=>$val){
				if((bool)($k&$code))
					$description[] = $val;
			}
		else
			$description = array("$error is not defined");
		
		return implode("\r\n",$description);
	}
?>
