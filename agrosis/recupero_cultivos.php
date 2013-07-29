<?php
	
	$obj_cultivos = new baseMysql('as_cultivos');
	$tmp_cultivos = $obj_cultivos->getRecords('','id_cultivo asc ');
	$cultivos = $tmp_cultivos['results'];		
	$micountcultivos=count($cultivos);
?>