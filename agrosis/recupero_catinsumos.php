<?php
	
	$obj_catinsumos = new baseMysql('as_cat_insumos');
	$tmp_catinsumos = $obj_catinsumos->getRecords('','id_cat_insumo asc ');
	$catinsumos = $tmp_catinsumos['results'];		
	$micountcatinsumos=count($catinsumos);
?>