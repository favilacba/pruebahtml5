<?php
	
	$obj_precipitaciones = new baseMysql('as_precipitaciones');
	$tmp_precipitaciones = $obj_precipitaciones->getRecords('','id_precipitacion asc ');
	$precipitaciones = $tmp_precipitaciones['results'];		
	$micountprecipitaciones=count($precipitaciones);
?>