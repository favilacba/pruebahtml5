<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_cultivos.php");
	include_once ("recupero_lotes.php");
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Servicios</title>
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
					<div  style="margin-top:20px;margin-left:50px;">
                    	<article class="grid_15 suffix_1 omega">
                        	<h2>Agregar un Servicio</h2>
                            <form id="contact-form1"  method="post" action="postservicios.php">
								<table>
								<tr>
										<td>Nro. Lote:</td>
										<td><select name="id_lote" id="id_lote">
												<?php
										 for($i=0;$i<$micountlotes;$i++)
										{	
										echo '<option value="'.$lotes[$i]['id_lote'].'">'.$lotes[$i]['ubicacion'].' - '.$lotes[$i]['numero_lote'].'</option>' ;
										}
										?>   
											</select></td>
									</tr>
									<tr>
										<td><label>Fecha Inicio:</label></td>
										<td><input type="text" name="fecha_inicio" id="fecha_inicio" size="38"/></td>
									</tr>
									<tr>
										<td><label>Fecha Fin:</label></td>
										<td><input type="text" name="fecha_fin" id="fecha_fin" size="38"/></td>
									</tr>
									
									
									<tr>
										<td>Cultivo:</td>
										<td>
										<select name="id_cultivo" id="id_cultivo">
												<?php
										 for($i=0;$i<$micountcultivos;$i++)
										{	
										echo '<option value="'.$cultivos[$i]['id_cultivo'].'">'.$cultivos[$i]['descripcion'].'</option>' ;
										}
										?>  
											</select>
										</td>
									</tr>
									
									<tr>
										<td>Precio Total:</td>
										<td><input type="text" name="precio_total" id="precio_total" size="38"/></td>
									</tr>
									
									
																		
								</table>
                                <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar</a> 
                                </div>
                              </fieldset>
                            </form>
                        </article>
                        <article class="grid_7 suffix_1 omega">
                        	<h2>Buscar un Servicio</h2>
								 <p>
														   
						 <form id="form1" name="form1" method="post" action="">
						  <table width="457" border="0">
							<tr>
							  <td width="160"><label>
								<input type="text" name="buscar" id="buscar" />
							  </label></td>
							  <td width="287"><input type="submit" name="button" id="button" value="Buscar" /></td>
							</tr>
						  </table>
						  <table  height="111" border="0">
							<tr>
							  <td height="23">&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<tr>
							  <td height="23"><span class="dropcap"> Datos del titular </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<tr>
							  <td>Marcelo Tinelli&nbsp;</td>
							  <td> <p class="p1 color-1">
								<i> &nbsp;Eliminar&nbsp; </i>
								</p>
								</td>
							  <td> <p class="p1 color-1">
								<i> &nbsp;Ver&nbsp; </i>
								</p>
								</td>
							</tr>
							<tr>
							  <td>Marcelo Cuevas&nbsp;</td>
							  <td> <p class="p1 color-1">
								<i> &nbsp;Eliminar&nbsp; </i>
								</p>
								</td>
							   <td> <p class="p1 color-1">
								<i> &nbsp;Ver&nbsp; </i>
								</p>
								</td>
							</tr>
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