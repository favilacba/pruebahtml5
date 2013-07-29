<?php
	$obj_fertilizaciones = new baseMysql('as_fertilizaciones');
	$tmp_fertilizaciones = $obj_fertilizaciones->getRecords('','id_fertilizacion asc ');
	$fertilizaciones = $tmp_fertilizaciones['results'];		
	$micountfertilizaciones=count($fertilizaciones);
?>