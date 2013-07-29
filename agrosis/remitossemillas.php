<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_cuentas.php");
	include_once ("recupero_semillas.php");
	include_once ("recupero_proveedores.php");
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Remitos de Semillas</title>
  	<meta charset="utf-8">
    <meta name="description" content="Diseñado exclusivamente para ingenieros agr&oacute;nomos y productores agropecuarios, permitiendo gestionar sus cultivos y mantener un control de los mismos de una manera r&aacute;pida y sencilla en cualquier momento y desde cualquier dispositivo.">
    <meta name="keywords" content="sistema agropecuario sistema agricola agrosis">
    <meta name="author" content="Tomas Jarchum">
	<link rel="icon" href="img/ico/img.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/img.ico" type="image/x-icon" />
	<script type="text/javascript" src="resources/js/Fecha.js" ></script>
	<script type="text/javascript" src="resources/js/Calendario.js" ></script>
	<link rel="STYLESHEET" type="text/css" href="resources/css/calendario.css"></link>
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
                        	<h2>Agregar un Remito de semillas:</h2>
                            <form id="contact-form1"  method="post" action="postremitossemillas.php">
								<table>
									<tr>
										<td valign="top">Fecha: </td>
										<td valign="top">
										<span style="display:inline;width:100;">
										<input id="idfechaIni" type="Text" onfocus="idfechaIniCalendar.showCalendar();" size="10" value="" name="fechaIni" readonly="true">
										<div id="idfechaIniCalendarContiner" class="calendario" style="display:none;"></div>
										</span>
										<script>
										idfechaIniCalendar = createCalendario( "idfechaIni", "idfechaIniCalendarContiner", "resources/img/", "yyyy-mm-dd", "spanish" );
										</script>
										</td>	
									</tr>
									<tr>
										<td>Remito Numero:</td>
										<td><input type="text" name="numero_remito" id="numero_remito" size="38"/></td>
									</tr>
									<tr>
										<td>Semillas:</td>
										<td><select name="id_semilla" id="id_semilla">
												<?php
										 for($i=0;$i<$micountsemillas;$i++)
										{	
										echo '<option value="'.$semillas[$i]['id_semilla'].'">'.$semillas[$i]['semilla'].' - '.$semillas[$i]['variedad'].'</option>' ;
										}
										?>   
											</select></td>
									</tr>
									<tr>
										<td>Cantidad:</td>
										<td><input type="text" name="cantidad" id="cantidad" size="38"/></td>
									</tr>
									<tr>
										<td>Precio Unitario:</td>
										<td><input type="text" name="precio" id="precio" size="38"/></td>
									</tr>
									<tr>
										<td>Precio Total:</td>
										<td><input type="text" name="precio_total" id="precio_total" size="38"/></td>
									</tr>
									<tr>
										<td>Origen:</td>
										<td><select name="id_proveedor" id="id_proveedor">
												<?php
										 for($i=0;$i<$micountproveedores;$i++)
										{	
										echo '<option value="'.$proveedores[$i]['id_proveedor'].'">'.$proveedores[$i]['nombre'].' - '.$proveedores[$i]['empresa'].'</option>' ;
										}
										?>   
											</select></td>
									</tr>
									<tr>
										<td>Cuenta:</td>
										<td><select name="id_cuenta" id="id_cuenta">
												<?php
										 for($i=0;$i<$micountcuentas;$i++)
										{	
										echo '<option value="'.$cuentas[$i]['id_cuenta'].'">'.$cuentas[$i]['nombre'].' - '.$cuentas[$i]['dni'].'</option>' ;
										}
										?>   
											</select></td>
									</tr>									
								</table>
                                <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar</a> 
                                </div>
                              </fieldset>
                            </form>
                        </article>
                        <article class="grid_7 suffix_1 omega">
                        	<h2>Buscar Remitos</h2>
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
							  <td height="23"><span class="dropcap"> Remitos Actuales </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<tr>
							  <td>23/07/2010 17-1866 Tecnocampo&nbsp;</td>
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
							  <td>17/10/2011 17-1984 Novagro&nbsp;</td>
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