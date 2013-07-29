<?php
	$obj_insumos = new baseMysql('as_insumos');
	$tmp_insumos = $obj_insumos->getRecords('','id_insumo asc ');
	$insumos = $tmp_insumos['results'];		
	$micountinsumos=count($insumos);
?>