<?php
	include_once (_INC.'/baseMySql.inc.php'); 
	$passForgotTime = 20; //minutes
	$siteUrl = "http://";
	$siteUrl .= (DEVEL_MODE) ? 'dev.': '';
	$siteUrl .=  _DOMAIN;
	
	class userProfile extends baseMysql{
		private $table = 'users_profiles';
		private $picTable = 'users_pics';
		private $uObj;
		private $upObj;
		public $userData;
		
		function __construct(){
			$this->uObj = new baseMysql($this->table);							
			$this->upObj = new baseMysql($this->picTable);
		}
		
		public function saveUser($userData,$userPics=array()){
			$profSave = $this->uObj->saveRecord($userData,'user_id');
			if (count($userPics) > 0){
				foreach($userPics as $k=>$v){
					if(isset($v['picPath']) && isset($v['picName']) && $userData['user_id'] > 0){
						$savePic['pid'] = 0;
						$savePic['user_id'] = $userData['user_id'];
						$savePic['pic'] = $v['picPath'];
						$savePic['name'] = $v['picName'];
						$this->upObj->saveRecord($savePic,'pid');
					}
				}
			}
			return $profSave;
		}
		
		public function getUserById($userId){
			$userId = (int)$userId;
			$user = $this->uObj->getRecord($userId,'user_id');
			if($user !== false){
				$pics = $this->upObj->getRecords("user_id={$user['user_id']}");
				$user['pics'] = $pics['results'];
			}
			return $user;
		}
		
		public function getUser($userName){
			$username = mysql_real_escape_string($userName);
			$user = $this->uObj->getRecord($username,'username');
			
			if($user !== false){
				$pics = $this->upObj->getRecords("user_id={$user['user_id']}");
				$user['pics'] = $pics['results'];
			}
			return $user;
		}
		
		public function getUserByEmail($userEmail){
			$userEmail = mysql_real_escape_string($userEmail);
			$user = $this->uObj->getRecord($userEmail,'email');
			
			if($user !== false){
				$pics = $this->upObj->getRecords("user_id={$user['user_id']}");
				$user['pics'] = $pics['results'];
			}
			return $user;
		}
		
		public function login($username, $password){
			if(isset($_SESSION['userProfile'])) unset($_SESSION['userProfile']);
			$user = $this->getUser($username);
			//validate password
			$res = (isset($user['password']) && $user['password'] == md5($password)) ? true : false;
			if($res){
				$updateUser['user_id'] = $user['user_id'];
				$updateUser['lastmove'] = $user['lastmove'] = time();
				$this->uObj->saveRecord($updateUser,'user_id');
				unset($user['password']);
				unset($user['user_id']);
				unset($user['validHash']);
				unset($user['pwdHash']);
				$_SESSION['userProfile'] = $user;
			}
			return $res;
		}
		
		public function loguedUser(){
			$res = false;
			$user = (isset($_SESSION['userProfile'])) ? $_SESSION['userProfile'] : false;
			
			if($user !== false && isset($user['username'])){
				 $checkuser = $this->getUser($user['username']);
				if($checkuser !== false){
					//update session
					$updateUser['user_id'] = $checkuser['user_id'];
					$updateUser['lastmove'] = time();
					$this->uObj->saveRecord($updateUser,'user_id');
					$res = true;
					$this->userData =  $checkuser;
					
					unset($checkuser['password']);
					unset($checkuser['user_id']);
					unset($checkuser['validHash']);
					unset($checkuser['pwdHash']);
					$_SESSION['userProfile'] = $checkuser;
				}
			}
			return $res;
		}
		
		public function uploadPicture($file){
			
		}
		
		public function activateAccount($key, $username){
			$activate = false;
			$where = "username = '".mysql_real_escape_string($username)."' AND `validHash` = '".mysql_real_escape_string($key)."'";
			$sql = "SELECT user_id, pEmail FROM `{$this->uObj->tableName}` WHERE $where";
			$res = $this->uObj->query($sql);
			if(isset($res[0]['user_id']) && (int)$res[0]['user_id'] > 0){
				$updateUser['user_id'] = (int)$res[0]['user_id'];
				$updateUser['validHash'] = '';
				$updateUser['validAccount'] = 1;
				$updateUser['lastmove'] = $now;
				if($res[0]['pEmail'] != ''){
					$updateUser['email'] = $res[0]['pEmail'];
					$updateUser['pEmail'] = '';
				}
					
				$this->saveUser($updateUser);
				$activate = true;
			}
			return $activate;
		}
		
		public function getValidationHash(){
			
			//test if is not there already the hash
			$testHash = true;
			while($testHash){
				$hash = substr(md5( rand(0,10000).time() ),0,10) ;
				$sql = 	"SELECT * FROM {$this->uObj->tableName} WHERE `validHash`='$hash'";
				$res = $this->uObj->query($sql);
				if($res === false) $testHash = false;
			}
			return  $hash;
		}
	}
?>