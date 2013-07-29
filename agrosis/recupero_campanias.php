<?php
	
	$obj_campanias = new baseMysql('as_campanias');
	$tmp_campanias = $obj_campanias ->getRecords('','id_campania asc ');
	$campanias = $tmp_campanias['results'];		
	$micountcampanias=count($campanias);
?>