<?php
	
	$obj_cuenta = new baseMysql('as_cuentas');
	$tmp_cuenta = $obj_cuenta->getRecord($idcuenta,'id_cuenta');
	$micuenta = $tmp_cuenta['results'];		
	$micountcuenta=count($micuenta);
?>