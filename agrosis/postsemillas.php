<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	
	//validate_login($loginFlag);
	$obj_semillas = new baseMysql('as_semillas');
	?>


<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Semillas</title>
  	<meta charset="utf-8">
    <meta name="description" content="Diseñado exclusivamente para ingenieros agr&oacute;nomos y productores agropecuarios, permitiendo gestionar sus cultivos y mantener un control de los mismos de una manera r&aacute;pida y sencilla en cualquier momento y desde cualquier dispositivo.">
    <meta name="keywords" content="sistema agropecuario sistema agricola agrosis">
    <meta name="author" content="Tomas Jarchum">
	<link rel="icon" href="img/ico/img.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/img.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
</head>
<body>
<div class="main-bg">
    <!-- Header -->
    <header>
    	<div class="inner">
            <?php 
		 include ("menu.php");
		?> 
        </div>
    </header>
    <!-- Content -->
    <section id="content"><div class="ic"></div>
        <div class="container_24">
            <div class="wrapper">
            	<div class="grid_24 content-bg">
                	<div class="wrapper">
                    	<article class="grid_6 suffix_1 prefix_1 alpha">
                        	<?php 
								extract($_POST);

								$updatesemillas['id_cat_semilla'] = $id_cat_semilla;
								$updatesemillas['id_proveedor'] = $id_proveedor;
								$updatesemillas['variedad'] = $variedad;
								$updatesemillas['calidad'] = $calidad;
								$updatesemillas['cantidad'] = $cantidad;
								$updatesemillas['precio'] = $precio;
								$updatesemillas['descripcion'] = $descripcion;
								$saveupdatesemillas = $obj_semillas->saveRecord($updatesemillas);
								
								if($saveupdatesemillas)
								{
								
								echo ' <div class="inner-1"><div class="success"> Datos ingresados correctamente!. <strong> <p>Muchas gracias.</strong> </div></div>';
								}
								else
								{
								echo ' <div class="inner-1"><div class="success"> Error en los datos!. <strong> <p><a href="http://www.fabioavila.com.ar/agrosis/semillas.php">Volver</a>.</strong> </div></div>';
								}
								
							?> 
                        </article>
                        <article class="grid_15 suffix_1 omega">
                        	
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
    	<div class="container_24">
        	<div class="wrapper">
            	<div class="grid_24 footer-bg">
        			<div class="hr-border-2"></div>
                    <div class="wrapper">
                        <div class="grid_7 suffix_1 prefix_1 alpha">
                        	<div class="copyright">
                            	&copy; 2013 <strong class="footer-logo">Agro SiS</strong>
								<div>Servicios para el Agro <a href="www.agrosis.com.ar" target="_blank">www.agrosis.com.ar</a></div>
                                <div><a rel="nofollow" >Consultas: agrosis@gmail.com</a></div>
                            </div>
                        </div>
                        
                        <div class="grid_4">
                        	<h5 class="heading-1">Links:</h5>
                            <ul class="footer-list">
                            	<li><a href="#">Documentaci&oacute;n</a></li>
                               
                            </ul>
                        </div>
                        <div class="grid_4">
                        	<h5 class="heading-1">Soporte:</h5>
                            <ul class="footer-list">
                            	<li><a href="mailto:tomasjarchum@gmail.com?subject=Consulta desde el sitio web">Tomas Jarchum - tomasjarchum@gmail.com</a></li>
                              
                            </ul>
                        </div>
                        <div class="grid_2 suffix_1 omega">
                        	<ul class="social-list">
                            	<li><a href="#"><img src="images/social-icon-1.png" alt=""></a></li>
                                <li><a href="#"><img src="images/social-icon-2.png" alt=""></a></li>
                                <li><a href="#"><img src="images/social-icon-3.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
            	</div>
        	</div>
        </div>
    </footer>
</div>
</body>
</html>


