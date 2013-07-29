<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Contacto</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
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
								$my_email = trim($email);
								include ("phpmailer/class.phpmailer.php");
								$mensaje = "<h2>Nuevo mensaje</h2>\n";
								$mensaje .= "<p><strong>Nombre :</strong> $nombre\n</p>
								<p><strong>Email:</strong> $my_email</p>\n";
								$mensaje .= "<p><strong>Telefono:</strong> $telefono</p>\n";
								$mensaje .= "<p><strong>Celular:</strong> $celular</p>\n";
								$mensaje .= "<p><strong>Domicilio:</strong> $domicilio</p>\n";
								$mensaje .= "<p><strong>Mensaje:</strong> $consulta</p>\n";
								$mensaje.= "<br /><p style=\"font-size: 90%\">Email generado autom&aacute;ticamente el dia " . date('j-n-Y') . " a la hora " . date ('H:i:s') . ".</p>\n";
								$mail = new PHPMailer();
								$mail->From     = "$my_email";
								$mail->FromName = "$nombre ";
								$mail->AddAddress("tomasjarchum@gmail.com"); 
								$mail->IsHTML(true);                               // enviar mail en formato HTML
								$mail->Subject  =  "Nuevo mensaje";
								$mail->Body     =  "$mensaje";
								@ $mail->Send();
								echo ' <div class="inner-1"><div class="success"> Formulario de cont&aacute;cto enviado!. <strong> <p>Nos comunicaremos en breve.</strong> </div></div>';
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


