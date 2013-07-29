<?php
	
	$obj_lotes = new baseMysql('as_lotes');
	$tmp_lotes = $obj_lotes->getRecords('','id_lote asc ');
	$lotes = $tmp_lotes['results'];		
	$micountlotes=count($lotes);
?>