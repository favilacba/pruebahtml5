<?php
$db_host="localhost";
$db_usuario="fabi729_phpl901";
$db_password="8PSi2jn80o";
$db_nombre="fabi729_phpl901";
$conexion = @mysql_connect($db_host, $db_usuario, $db_password) or die(mysql_error());
$db = @mysql_select_db($db_nombre, $conexion) or die(mysql_error());
?> 