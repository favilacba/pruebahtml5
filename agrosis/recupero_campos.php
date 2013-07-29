<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	$obj_campos = new baseMysql('as_campos');
	$tmp_campos = $obj_campos->getRecords('','id_campo asc ');
	$campos = $tmp_campos['results'];		
	$micount=count($campos);
?>