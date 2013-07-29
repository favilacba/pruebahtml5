<?php
	include('../include/config.inc.php');							
	include(_SERVER.'/flashServices/errors.inc.php');
	include(_SERVER.'/flashServices/users.inc.php');
	include(_INC.'/lxmail.inc.php');
	$uObj = new userProfile;
	$errorCode=false; 
	$res['error'] = true;
	$res['errorCode'] = 99;
	$res['errorDesc'] = 'unexpected error';
	$res['data'] = false;

	if($uObj->loguedUser() !== false){
		$postdata = file_get_contents("php://input");
		//var_dump($postdata);
		//var_dump($GLOBALS);
		$_postStr = explode('&',$postdata);
		$post = array();
		if(is_array($_postStr))
			foreach($_postStr as $k=>$d){
				$v = explode('=',$d);
				if(isset($v[0]) && isset($v[1]))
					$post[$v[0]] = urldecode($v[1]);
			}

		if(isset($post['data'])){
			$imgData = base64_decode($post['data']);
			$imgLabel = (isset($post['pictureName'])) ? $post['pictureName'] : '';
			//test image with gd
			$im = imagecreatefromstring($imgData);
			if ($im !== false) {
				//create image name
				$imgName = getImageName($imgLabel, $imgData);
				//Save image data to database
				$_imgData = array();
				$_dev_mode = (DEVEL_MODE) ? 'dev.':'';
				$_imgData[0]['picName'] = $imgLabel;
				$_imgData[0]['picPath'] = "http://".$_dev_mode._DOMAIN."/flashServices/images/".$imgName;
				$uObj->saveUser($uObj->userData,$_imgData);
				
				$uObj->loguedUser();//Get Updated data of the user
				$errorCode = false;
				$res['error'] = false;
				$res['errorCode'] = '';
				$res['errorDesc'] = '';
				$res['data'] = $_SESSION['userProfile'];
				
			}
			else{
				$errorCode += 4;
			}
			$fp = fopen('testImg.jpg','w');
			fwrite($fp,$imgData);
			fclose($fp);
			$fp = fopen('testRaw.dat','w');
			fwrite($fp,$post['data']);
		}
		else{
			$errorCode += 2;
		}
	}
	else{
		//not logged
		$errorCode += 1;
	}
	if($errorCode !== false){
		$res['error'] = true;
		$res['errorCode'] = $errorCode;
		$res['errorDesc'] = getError('savePic',$errorCode);
		$res['data'] = false;	
	}

	//$res['data'] = $postdata;
	echo json_encode($res);
	
	function getImageName($name,$data){
		 $user = $_SESSION['userProfile']['username'];
		 $name = substr($user,0,6).'_'.substr($name,0,6).'_'.time().'_'.rand(0,10000).'.png';
		 $name = str_replace(' ','_',$name);
		 $innerFolder = substr(md5($user),0,2);
		 $folder = _SERVER.'/flashServices/images/'.$innerFolder;
		 //test folder
		 if(!is_dir($folder)) mkdir($folder,0755);
		 
		 //test if file already exist
		 $testFile = true;
		 while($testFile){
				if(!is_file($folder.'/'.$name)){
					$testFile = false;
					$fpn = fopen($folder.'/'.$name,'w');
					fwrite($fpn,$data);
			 }
		 }
		 
		 return  $innerFolder.'/'.$name;
	}
?> 