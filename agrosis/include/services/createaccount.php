<?php 
include_once ("include/config.inc.php");
include_once ("include/baseMySql.inc.php");


$myusername=$_POST["username"];
$myemail=$_POST["email"];
$mypassword=$_POST["password"];
$myrpassword=$_POST["rpassword"];



	$obj_base = new baseMysql('users_profiles');
	$tmp = $obj_base->getRecords('email = "'.$myemail.'"', '' ,'');
	if($tmp['results'])
	{
	echo "el mail ya existe";
	var_dump($tmp);
	}
	else
	{
	echo "Mail indexistente, debo enviar el mail<br>";
	
	    $SQL = "INSERT INTO `" .$DB_NAME  . "`.`users_profiles` (`user_id`, `username`, `password`, `email`, `pEmail`, `newsletter`, `validHash`, `validAccount`, `pwdHash`, `pwdHash_time`, `added`, `lastmove`) 
			  VALUES (NULL, '".$myusername."', '".$mypassword."', '".$myemail."', '".$myemail."', '', NULL, '0', '', NULL, NULL, NULL')";
        $r = mysql_query($SQL);
        if (!$r) 
		{
                    die(mysql_error());
        } 
		else 
		{
		echo "Se inserto el registro en la base de datos<br>";
		}
	
	}
		
	






?> 