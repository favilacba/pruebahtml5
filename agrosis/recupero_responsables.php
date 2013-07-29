<?php
	
	$obj_responsables = new baseMysql('as_responsables');
	$tmp_responsables = $obj_responsables->getRecords('','id_responsable asc ');
	$responsables = $tmp_responsables['results'];		
	$micountresponsables=count($responsables);
?>