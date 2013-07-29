<?php
	$obj_analisis = new baseMysql('as_analisis');
	$tmp_analisis = $obj_analisis->getRecords('','id_analisis asc ');
	$analisis = $tmp_analisis['results'];		
	$micountanalisis=count($analisis);
?>