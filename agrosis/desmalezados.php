<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_lotes.php");
	include_once ("recupero_maquinarias.php");
	include_once ("recupero_maquinistas.php");
    include_once ("recupero_campanias.php");
	include_once ("recupero_desmalezados.php");
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Desmalezados</title>
  	<meta charset="utf-8">
    <meta name="description" content="Diseñado exclusivamente para ingenieros agr&oacute;nomos y productores agropecuarios, permitiendo gestionar sus cultivos y mantener un control de los mismos de una manera r&aacute;pida y sencilla en cualquier momento y desde cualquier dispositivo.">
    <meta name="keywords" content="sistema agropecuario sistema agricola agrosis">
    <meta name="author" content="Tomas Jarchum">
	<link rel="icon" href="img/ico/img.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/img.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
	<link rel="STYLESHEET" type="text/css" href="resources/css/calendario.css"></link>
	<script type="text/javascript" src="resources/js/Fecha.js" ></script>
	<script type="text/javascript" src="resources/js/Calendario.js" ></script>
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
                        	<h2>Registrar un Desmalezado</h2>
                            <form id="contact-form1"  method="post" action="postdesmalezados.php">
								<table>
								    <tr>
										<td><?php echo  utf8_encode('Nro. campa&ntilde;a:') ;?> </td>
										<td><select name="id_campania" id="id_campania">
												<?php
													echo  utf8_encode('<option value="0">Seleccione una campa&ntilde;a...</option>') ;
													 for($i=0;$i<$micountcampanias;$i++)
														{	
															for($j=0;$j<$micountlotes;$j++)
															{	
																if($campanias[$i]['id_lote']==$lotes[$j]['id_lote'])
																{
																$my_nombrelote='Lote:'.$lotes[$j]['ubicacion'];
																$my_numerolote='Nro.Lote:'.$lotes[$j]['numero_lote'];
																}
															
															}
															echo  utf8_encode('<option value="'.$campanias[$i]['id_campania'].'">'.$my_nombrelote.' - '.$my_numerolote.' - Inicio:'.$campanias[$i]['fecha_inicio'].' - Fin:'.
															$campanias[$i]['fecha_fin'].'</option>') ;
														}
												?>   
											</select></td>
									</tr>
									<tr>
										<td valign="top">Fecha Inicio: </td>
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
									<tr>	<TD valign="top">Fecha Fin: </TD>
												<TD valign="top">
									<SPAN style='display:inline;width:100;'>
									<input readonly='true' type='Text' id="idfechaFin" name="fechaFin" value="" size="10" onfocus='idfechaFinCalendar.showCalendar();'>
									<div id="idfechaFinCalendarContiner" style='display:none;' class='calendario' ></div></SPAN>
									<script> 
									idfechaFinCalendar = createCalendario( "idfechaFin", "idfechaFinCalendarContiner", "resources/img/", "yyyy-mm-dd", "spanish" );
									</script>
									</TD>
									</tr>
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
										<td>Maquinaria:</td>
										<td><select name="id_maquinaria" id="id_maquinaria">
												<?php
										 for($i=0;$i<$micountmaquinarias;$i++)
										{	
										echo '<option value="'.$maquinarias[$i]['id_maquinaria'].'">'.$maquinarias[$i]['id_cat_maquinaria'].' - '.$maquinarias[$i]['marca'].'</option>' ;
										}
										?>   
											</select></td>
									</tr>
									<tr>
										<td>Maquinista:</td>
										<td><select name="id_maquinista" id="id_maquinista">
												<?php
										 for($i=0;$i<$micountmaquinistas;$i++)
										{	
										echo '<option value="'.$maquinistas[$i]['id_maquinista'].'">'.$maquinistas[$i]['nombre'].' - '.$maquinistas[$i]['dni'].'</option>' ;
										}
										?>   
											</select></td>
									</tr>
									<tr>
										<td>Cantidad Hectareas:</td>
										<td><input type="text" name="cant_hectareas" id="cant_hectareas" size="38"/></td>
									</tr>
									<tr>
										<td>Precio Hectarea:</td>
										<td><input type="text" name="precio_hectarea" id="precio_hectarea" size="38"/></td>
									</tr>
									<tr>
										<td>Precio Total:</td>
										<td><input type="text" name="precio_total" id="precio_total" size="38"/></td>
									</tr>
									<tr>
										<td>Descripci&oacute;n:</td>
										<td><textarea  name="descripcion" id="descripcion"></textarea></td>
									</tr>
																		
								</table>
                                <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar</a> 
                                </div>
                              </fieldset>
                            </form>
                        </article>
                        <article class="grid_7 suffix_1 omega">
                        	<h2>Buscar Desmalezados:</h2>		  						   
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
							  <td height="23"><span class="dropcap">Desmalezados: </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						  </table>
						  <table  height="111" border="1">
							<tr>
							  <td height="23">Fecha&nbsp;</td>
							  <td>&nbsp;Lote</td>
							  <td>&nbsp;Cantidad Ha</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountdesmalezados;$i++)
										{	
										echo '<tr><td>'.$desmalezados[$i]['fecha_inicio'].'&nbsp;&nbsp;&nbsp;</td><td>'.$desmalezados[$i]['id_lote'].'</td><td>'.$desmalezados[$i]['cant_hectareas'].'</td><td><a href="ver_desmalezados.php?id='.$desmalezados[$i]['id_desmalezado'].'">&nbsp;Ver&nbsp; </a></td></tr>' ;
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