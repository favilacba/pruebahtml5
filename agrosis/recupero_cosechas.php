<?php
	$obj_cosechas = new baseMysql('as_cosechas');
	$tmp_cosechas = $obj_cosechas->getRecords('','id_cosecha asc ');
	$cosechas = $tmp_cosechas['results'];		
	$micountcosechas=count($cosechas);
?>