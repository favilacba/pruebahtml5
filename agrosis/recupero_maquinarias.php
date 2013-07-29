<?php
	
	$obj_maquinarias = new baseMysql('as_maquinarias');
	$tmp_maquinarias = $obj_maquinarias->getRecords('','id_maquinaria asc ');
	$maquinarias = $tmp_maquinarias['results'];		
	$micountmaquinarias=count($maquinarias);
?>