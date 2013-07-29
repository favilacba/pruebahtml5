<?php
	
	$obj_laboratorios = new baseMysql('as_laboratorios');
	$tmp_laboratorios = $obj_laboratorios->getRecords('','id_laboratorio asc ');
	$laboratorios = $tmp_laboratorios['results'];		
	$micountlaboratorios=count($laboratorios);
?>