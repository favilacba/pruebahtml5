<?php
	
	$obj_maquinistas = new baseMysql('as_maquinistas');
	$tmp_maquinistas = $obj_maquinistas->getRecords('','id_maquinista asc ');
	$maquinistas = $tmp_maquinistas['results'];		
	$micountmaquinistas=count($maquinistas);
?>