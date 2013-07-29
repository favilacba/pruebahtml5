<?php
    include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_campos.php");
	include_once ("recupero_climas.php");
	include_once ("recupero_lotes.php");
	include_once ("recupero_catclimas.php");
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Climas</title>
  	<meta charset="utf-8">
    <meta name="description" content="Diseñado exclusivamente para ingenieros agr&oacute;nomos y productores agropecuarios, permitiendo gestionar sus cultivos y mantener un control de los mismos de una manera r&aacute;pida y sencilla en cualquier momento y desde cualquier dispositivo.">
    <meta name="keywords" content="sistema agropecuario sistema agricola agrosis">
    <meta name="author" content="Tomas Jarchum">
	<link rel="icon" href="img/ico/img.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/img.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="resources/js/Fecha.js" ></script>
	<script type="text/javascript" src="resources/js/Calendario.js" ></script>
	<link rel="STYLESHEET" type="text/css" href="resources/css/calendario.css"></link>
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
                        	<h2>Cambios Clim&aacute;ticos</h2>
                            <form id="contact-form1"  method="post" action="postclimas.php">
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
										<td>Campo:</td>
										<td>
										 <select name="id_campo" id="id_campo">
										 <?php
										 for($i=0;$i<$micount;$i++)
										{	
										echo '<option value="'.$campos[$i]['id_campo'].'">'.$campos[$i]['nombre'].' - '.$campos[$i]['ciudad'].' - '.$campos[$i]['provincia'].'</option>' ;
										}
										?>    
										</select>
										</td>
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
										<td>Categoria:</td>
										<td><select name="id_cat_clima" id="id_cat_clima">
												<?php
													for($i=0;$i<$micountcatclimas;$i++)
													{	
														echo '<option value="'.$catclimas[$i]['id_cat_clima'].'">'.$catclimas[$i]['descripcion'].'</option>' ;
													}
												?>   
											</select>
										</td>
										<td>
											<div style="margin-left: -40px; margin-top: 10px; font-style:italic;"">
												<a href="categoria_climas.php">Agregar Categor&iacute;a</a>
											</div>
										</td>	
									</tr>
									<tr>
										<td>Sup. Afectada:</td>
										<td><input type="text" name="superficie" id="superficie" size="38"/></td>
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
                        	<h2>Buscar:</h2>		  						   
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
							  <td height="23"><span class="dropcap">Climas: </span></td>
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
							  <td height="23">Fecha&nbsp;</td>
							  <td>&nbsp;Categoria</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountclimas;$i++)
										{
										for($a=0;$a<$micountcatclimas;$a++)
											{	
											if($climas[$i]['id_cat_clima']==$catclimas[$a]['id_cat_clima'])
												{
												$descripcion_clima=$catclimas[$a]['descripcion'] ;
												}
											}
										echo '<tr><td>'.$climas[$i]['fecha'].'&nbsp;</td><td>'.$descripcion_clima.'</td><td><a href="ver_climas.php?id='.$climas[$i]['id_clima'].'&idlote='.$climas[$i]['id_lote'].'">&nbsp;Ver&nbsp; </a></td><td><a href="eliminar_climas.php?id='.$climas[$i]['id_clima'].'">&nbsp;Eliminar&nbsp; </a></td></tr>' ;
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