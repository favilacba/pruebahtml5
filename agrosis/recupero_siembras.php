<?php
	$obj_siembras = new baseMysql('as_siembras');
	$tmp_siembras = $obj_siembras->getRecords('','id_siembra asc ');
	$siembras = $tmp_siembras['results'];		
	$micountsiembras=count($siembras);
?>