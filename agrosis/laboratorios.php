<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_laboratorios.php");
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Laboratorios</title>
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
	<script>
    function validar(formulario){
      if (formulario.nombre.value == ""){
        alert("Escribe tu nombre para poder enviarlo al servidor");
		formulario.nombre.focus()
        return(false);
      }
      else if (formulario.domicilio.value == ""){
        alert("Escribe tu domicilio para poder enviarlo al servidor");
		formulario.domicilio.focus()
        return(false);
      }
      else if (formulario.telefono.value.length < 8 ) {
            alert ("Escribe tu telefono para poder enviarlo al servidor");
			formulario.telefono.focus()
            return (false);
       }
       else if (formulario.provincia.value == ""){
        alert("Escribe el nombre de tu provincia para poder enviarlo al servidor");
		formulario.provincia.focus()
        return(false);
      }
      else if (formulario.ciudad.value == ""){
        alert("Escribe tu ciudad para poder enviarlo al servidor");
		formulario.ciudad.focus()
        return(false);
      }
      var mail = document.getElementById('mail').value;
        var formato = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var v_email = formato.test(mail);
        if((v_email != true)||(mail == "")){
            alert("Introduzca una direccion de correo valida.");
            return false;
        } 
    }
</script> 
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
					<div  style="margin-top:20px;margin-left:50px;">
                    	<article class="grid_15 suffix_1 omega">
                        	<h2>Registrar un Laboratorio</h2>
                            <form id="contact-form1"  method="post" action="postlaboratorios.php" onsubmit="return validar(this);">
								<table>
									<tr>
										<td><label>Nombre:</label></td>
										<td><input type="text" name="nombre" id="nombre" size="38" placeholder="nombre y apellido"/></td>
									</tr>
									<tr>
										<td>Domicilio:</td>
										<td><input type="text" name="domicilio" id="domicilio" size="38" placeholder="domicio"/></td>
									</tr>
									<tr>
										<td>Telefono:</td>
										<td><input type="text" name="telefono" id="telefono" size="38" placeholder="telefono"/></td>
									</tr>
									<tr>
										<td>Provincia:</td>
										<td><input type="text" name="provincia" id="provincia" size="38" placeholder="provincia"/></td>
									</tr>
									<tr>
										<td>Ciudad:</td>
										<td><input type="text" name="ciudad" id="ciudad" size="38" placeholder="ciudad"/></td>
									</tr>
									<tr>
										<td>E-Mail:</td>
										<td><input type="text" name="mail" id="mail" size="38" placeholder="alguien@example.com"/></td>
									</tr>
																		
								
								<tr>
										<td></td>
										<td><div class="btns">
                                    <input type="submit" name="button" id="button" value="Enviar" />
                                </div></td>
									</tr>
                                </table>
                              </fieldset>
                            </form>
                        </article>
                        <article class="grid_7 suffix_1 omega">
                        	<h2>Buscar:</h2>
								 <p>
														   
						 <form id="form1" name="form1" method="post" action="">
						  <table width="457" border="0">
							<tr>
							  <td width="160"><label>
								<input type="text" name="buscar" id="buscar" />
							  </label></td>
							  <td width="287"><input type="submit" name="button" id="button" value="Buscar" /></td>
							</tr>
							<tr>
							  <td height="23">&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<tr>
							  <td height="23"><span class="dropcap">Laboratorios: </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						  </table>
						  <table  height="111" border="1">
						  <tr>
							  <td height="23">&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<tr>
							  <td height="23">Nombre:&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountlaboratorios;$i++)
										{	
										echo '<tr><td>'.$laboratorios[$i]['nombre'].'&nbsp;</td><td></td><td><a href="verlaboratorios.php?id='.$laboratorios[$i]['id_laboratorio'].'">&nbsp;Ver&nbsp; </a></td><td><a href="eliminarlaboratorios.php?id='.$laboratorios[$i]['id_laboratorio'].'">&nbsp;Eliminar&nbsp; </a></td></tr>' ;
										}
							?>   
						  </table>
						  <p>&nbsp;</p>
						</form>
													  
													</p>
                        </article>
                    </div>
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