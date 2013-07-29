<?php
	
	$obj_catmaquinarias = new baseMysql('as_cat_maquinarias');
	$tmp_catmaquinarias = $obj_catmaquinarias->getRecords('','id_cat_maquinaria asc ');
	$catmaquinarias = $tmp_catmaquinarias['results'];		
	$micountcatmaquinarias=count($catmaquinarias);
?>