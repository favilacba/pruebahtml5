<?php
	$obj_remitos = new baseMysql('as_remitos');
	$tmp_remitos = $obj_remitos->getRecords('','id_remito asc ');
	$remitos = $tmp_remitos['results'];		
	$micountremitos=count($remitos);
?>