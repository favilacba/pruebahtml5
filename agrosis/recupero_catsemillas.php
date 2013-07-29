<?php
	
	$obj_catsemillas = new baseMysql('as_cat_semillas');
	$tmp_catsemillas = $obj_catsemillas->getRecords('','id_cat_semilla asc ');
	$catsemillas = $tmp_catsemillas['results'];		
	$micountcatsemillas=count($catsemillas);
?>