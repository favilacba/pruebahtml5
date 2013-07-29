<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_maquinarias.php");
	include_once ("recupero_catmaquinarias.php");
	$id_maquinaria = $_GET["id"];

	for($i=0;$i<$micountmaquinarias;$i++)
		{	
			if($id_maquinaria==$maquinarias[$i]['id_maquinaria'])
				{
				$my_id_cat_maquinaria=$maquinarias[$i]['id_cat_maquinaria'];
				}
		}
	
	//recupero categoria de maquinarias	
	for($l=0;$l<$micountcatmaquinarias;$l++)
		{	
			if($my_id_cat_maquinaria==$catmaquinarias[$l]['id_cat_maquinaria'])
				{
			
				$my_categoria_maquinaria=$catmaquinarias[$l]['descripcion'];
				}
		}
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Maquinarias</title>
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
                        	<h2>Agregar una M&aacute;quina</h2>
                            <form id="contact-form1"  method="post" action="postmaquinarias.php">
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
										<td>Marca:</td>
										<td><input type="text" name="marca" id="marca" size="38"/></td>
									</tr>
									<tr>
										<td>Categor&iacute;a:</td>
										<td><select name="id_cat_maquinaria" id="id_cat_maquinaria">
												<?php
													for($i=0;$i<$micountcatmaquinarias;$i++)
													{	
														echo '<option value="'.$catmaquinarias[$i]['id_cat_maquinaria'].'">'.$catmaquinarias[$i]['descripcion'].'</option>' ;
													}
												?>   
											</select>
										</td>
										<td>
											<div style="margin-left: -40px; margin-top: 10px; font-style:italic;"">
												<a href="categoria_maquinarias.php">Agregar Categor&iacute;a</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>Modelo:</td>
										<td><input type="text" name="modelo" id="modelo" size="38"/></td>
									</tr>
									<tr>
										<td>Precio Hectarea:</td>
										<td><input type="text" name="precio_hectarea" id="precio_hectarea" size="38"/></td>
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
							  <td height="23"><span class="dropcap">Maquinarias: </span></td>
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
							  <td height="23">Categor&iacute;a&nbsp;</td>
							  <td>&nbsp;Marca</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountmaquinarias;$i++)
										{	
										echo '<tr><td>'.$my_categoria_maquinaria.'&nbsp;</td><td>'.$maquinarias[$i]['marca'].'</td><td><a href="ver_maquinarias.php?id='.$maquinarias[$i]['id_maquinaria'].'">&nbsp;Ver&nbsp; </a></td><td><a href="eliminar_maquinarias.php?id='.$maquinarias[$i]['id_maquinaria'].'">&nbsp;Eliminar&nbsp; </a></td></tr>' ;
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