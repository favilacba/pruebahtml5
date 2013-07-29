<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	$obj_cuentas = new baseMysql('as_cuentas');
	$tmp_cuentas = $obj_cuentas->getRecords('','id_cuenta asc ');
	$cuentas = $tmp_cuentas['results'];		
	$micountcuentas=count($cuentas);
?>