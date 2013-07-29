<?php
	$obj_fumigaciones = new baseMysql('as_fumigaciones');
	$tmp_fumigaciones = $obj_fumigaciones->getRecords('','id_fumigacion asc ');
	$fumigaciones = $tmp_fumigaciones['results'];		
	$micountfumigaciones=count($fumigaciones);
?>