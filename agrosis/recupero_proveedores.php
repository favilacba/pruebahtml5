<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	$obj_proveedores = new baseMysql('as_proveedores');
	$tmp_proveedores = $obj_proveedores->getRecords('','id_proveedor asc ');
	$proveedores = $tmp_proveedores['results'];		
	$micountproveedores=count($proveedores);
?>
