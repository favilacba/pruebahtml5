<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_lotes.php");
	include_once ("recupero_campos.php");
	$id_lote = $_GET["id"];
	for($i=0;$i<$micountlotes;$i++)
		{	
			if($id_lote==$lotes[$i]['id_lote'])
				{
				$my_id_campo=$lotes[$i]['id_campo'];
				}
		}
		
	for($i=0;$i<$micount;$i++)
		{	
			if($my_id_campo==$campos[$i]['id_campo'])
				{
				$my_nombre_campo=$campos[$i]['nombre'];
				}
		}
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Lotes</title>
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
					<div  style="margin-top:20px;margin-left:50px;">
                    	<article class="grid_15 suffix_1 omega">
                        	<h2>Ver o Modificar lotes </h2>
							<?php
							 for($i=0;$i<$micountlotes;$i++)
										{	
											if($id_lote==$lotes[$i]['id_lote'])
											{
												?>
														<form id="contact-form1"  method="post" action="modificar_lotes.php">
														<table>
														<tr>
															<td><label></label></td>
															<td><input type="text" style="display:none;" name="id_lote" id="id_lote" value="<?php echo $lotes[$i]['id_lote'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Campo:</td>
															<td><input type="text" name="$my_nombre_campo" id="$my_nombre_campo" value="<?php echo $my_nombre_campo;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Nro. Lote:</td>
															<td><input type="text" name="numero_lote" id="numero_lote" value="<?php echo $lotes[$i]['numero_lote'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Ubicaci&oacute;n:</td>
															<td><input type="text" name="ubicacion" id="ubicacion" value="<?php echo $lotes[$i]['ubicacion'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Superficie:</td>
															<td><input type="text" name="superficie" id="superficie" value="<?php echo $lotes[$i]['superficie'];?>" size="38"/></td>
														</tr>
														<tr><td>Descripci&oacute;n:</td>
															<td><textarea name="descripcion" id="descripcion" cols="45" rows="5"><?php echo $lotes[$i]['descripcion'];?></textarea>
														</tr>																	
													</table>
													<div class="btns">
														<a class="button" onClick="document.getElementById('contact-form1').submit()">Modificar</a> 
													</div>
												  </fieldset>
												</form>
											<?php
											}// fin if
										}//fin ciclo for
							?>  
							
                            
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
							  <td height="23"><span class="dropcap">Lotes: </span></td>
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
							  <td height="23">Ubicación&nbsp;</td>
							  <td>&nbsp;Nro.Lote</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountlotes;$i++)
										{	
										echo '<tr><td>'.$lotes[$i]['ubicacion'].'&nbsp;</td><td>'.$lotes[$i]['numero_lote'].'</td><td><a href="ver_lotes.php?id='.$lotes[$i]['id_lote'].'">&nbsp;Ver&nbsp; </a></td><td><a href="eliminar_lotes.php?id='.$lotes[$i]['id_lote'].'">&nbsp;Eliminar&nbsp; </a></td></tr>' ;
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