<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Contacto</title>
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
                        	<h2>Nuestros Datos</h2>
                            <p class="p1">
                            	<strong class="str-2">
                                	Agro SiS
                                </strong>
                                <dl class="adress">
                                	<dt>Marcelo De Francisco - Productor Agropecuario</dt>
                                	<dd><span>Telefono:</span><b>+1 959 603 6035</b></dd>
                                    <dd><span>Celular:</span><b>+1 504 889 9898</b></dd>
                                    <dd><span>Email:</span><a href="#">tomasjarchum@gmail.com</a></dd>
                                </dl>
                                <dl class="adress">
                                	<dt></dt>
                                	<dd><span></span><b></b></dd>
                                    <dd><span></span><b></b></dd>
                                    <dd><span></span><a href="#"></a></dd>
                                </dl>
                            </p>
                        </article>
                        <article class="grid_15 suffix_1 omega">
                        	<h2>Contacto:</h2>
                            <form id="contact-form" method="post" action="post.php">
                              <fieldset>
                                <label class="nombre_apellido">
                                	<span>Nombre y Apellido:</span>
                                    <input type="text" name="nombre" id="nombre">
                                </label>
								<label class="domicilio">
                                	<span>Domicilio:</span>
                                    <input type="text" name="domicilio" id="domicilio">
                                </label>
								<label class="telefono">
                                	<span>Telefono:</span>
                                    <input type="text" name="telefono" id="telefono">
                                </label>
								<label class="celular">
                                	<span>Celular:</span>
                                    <input type="text" name="celular" id="celular">
                                </label>
                                <label class="email">
                                  <span>E-mail:</span>
                                  <input type="text" name="email" id="email">
                                </label>
                                <label class="consulta">
                                  <span>Consultas:</span>	
                                  <textarea  name="consulta" id="consulta"></textarea>
                                </label>
                                <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form').submit()">Enviar</a> 
                                </div>
                              </fieldset>
                            </form>
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