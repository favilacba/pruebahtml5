<?php
	
	$obj_catanalisis = new baseMysql('as_cat_analisis');
	$tmp_catanalisis = $obj_catanalisis->getRecords('','id_cat_analisis asc ');
	$catanalisis = $tmp_catanalisis['results'];		
	$micountcatanalisis=count($catanalisis);
?>