<?php
	$obj_desmalezados = new baseMysql('as_desmalezados');
	$tmp_desmalezados = $obj_desmalezados->getRecords('','id_desmalezado asc ');
	$desmalezados = $tmp_desmalezados['results'];		
	$micountdesmalezados=count($desmalezados);
?>