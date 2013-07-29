<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	$obj_climas = new baseMysql('as_climas');
	$tmp_climas = $obj_climas->getRecords('','id_clima asc ');
	$climas = $tmp_climas['results'];		
	$micountclimas=count($climas);
?>