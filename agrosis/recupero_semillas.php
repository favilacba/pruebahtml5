<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	$obj_semillas = new baseMysql('as_semillas');
	$tmp_semillas = $obj_semillas->getRecords('','id_semilla asc ');
	$semillas = $tmp_semillas['results'];		
	$micountsemillas=count($semillas);
?>