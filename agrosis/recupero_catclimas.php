<?php
	
	$obj_catclimas = new baseMysql('as_cat_climas');
	$tmp_catclimas = $obj_catclimas->getRecords('','id_cat_clima asc ');
	$catclimas = $tmp_catclimas['results'];		
	$micountcatclimas=count($catclimas);
?>