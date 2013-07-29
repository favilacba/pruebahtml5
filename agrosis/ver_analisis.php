<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_responsables.php");
	include_once ("recupero_laboratorios.php");
	include_once ("recupero_analisis.php");
	include_once ("recupero_catanalisis.php");
	
	
	$id_analisis = $_GET["id"];
	$id_laboratorio = $_GET["id_laboratorio"];
	for($i=0;$i<$micountanalisis;$i++)
		{	
			if($id_analisis==$analisis[$i]['id_analisis'])
				{
				$my_id_laboratorio=$analisis[$i]['id_laboratorio'];
				$id_responsable = $analisis[$i]['id_responsable'];
				$my_id_cat_analisis=$analisis[$i]['id_cat_analisis'];
				}
		}
		
	
	//recupero responsables	
	for($j=0;$j<$micountresponsables;$j++)
		{	
			if($id_responsable==$responsables[$j]['id_responsable'])
				{
					$my_nombre_responsable=$responsables[$j]['nombre'];
					$my_dni_responsable=$responsables[$j]['dni'];
				}
		}
		
		//recupero laboratorios	
	for($j=0;$j<$micountlaboratorios;$j++)
		{	
			if($my_id_laboratorio==$laboratorios[$j]['id_laboratorio'])
				{
			
				$my_nombre_laboratorio=$laboratorios[$j]['nombre'];
				}
		}
	//recupero categoria de analisis	
	for($l=0;$l<$micountcatanalisis;$l++)
		{	
			if($my_id_cat_analisis==$catanalisis[$l]['id_cat_analisis'])
				{
			
				$my_categoria_analisis=$catanalisis[$l]['descripcion'];
				}
		}
		

	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>An&aacute;lisis</title>
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
                        	<h2>Ver An&aacute;lisis </h2>
							<?php
							 for($i=0;$i<$micountanalisis;$i++)
										{	
											if($id_analisis==$analisis[$i]['id_analisis'])
											{
												?>
														<form id="contact-form1"  method="post">
														<table>
														<tr>
															<td><label></label></td>
															<td><input type="text" style="display:none;" name="id_analisis" id="id_analisis" value="<?php echo $analisis[$i]['id_analisis'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Fecha:</label></td>
															<td><input type="text" name="fecha" id="fecha" value="<?php echo $analisis[$i]['fecha'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Responsables:</td>
															<td><input type="text" name="my_responsable" id="my_responsable" value="<?php echo $my_nombre_responsable;echo " - "; echo $my_dni_responsable;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Tipo de An&aacute;lisis:</td>
															<td><input type="text" name="my_cat_analisis" id="my_cat_analisis" value="<?php echo $my_categoria_analisis;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Laboratorio:</td>
															<td><input type="text" name="my_laboratorio" id="my_laboratorio" value="<?php echo $my_nombre_laboratorio;?>" size="38"/></td>
														</tr>
														<tr><td>Descripci&oacute;n:</td>
															<td><textarea name="descripcion" id="descripcion" cols="45" rows="5"><?php echo $analisis[$i]['descripcion'];?></textarea>
														</tr>														
													</table>
													<div class="btns">
														<a class="button" onClick="history.back(-1);">Volver</a> 
													</div>
												  </fieldset>
												</form>
											<?php
											}// fin if
										}//fin ciclo for
							?>  
							
                            
                        </article>
                        <article class="grid_7 suffix_1 omega">
                        	<h2>Buscar An&aacute;lisis:</h2>		  						   
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
							  <td height="23"><span class="dropcap">An&aacute;lisis encontrados: </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						  </table>
						  <table  height="111" border="1">
							<tr>
							  <td height="23">Fecha&nbsp;</td>
							  <td>&nbsp;An&aacute;lisis</td>
							  <td>&nbsp;Laboratorio</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountanalisis;$i++)
										{	
										echo '<tr><td>'.$analisis[$i]['fecha'].'&nbsp;&nbsp;&nbsp;</td><td>'.$analisis[$i]['id_cat_analisis'].'</td><td>'.$analisis[$i]['id_laboratorio'].'</td><td><a href="ver_analisis.php?id='.$analisis[$i]['id_analisis'].'">&nbsp;Ver&nbsp; </a></td></tr>' ;
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