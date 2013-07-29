<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_campanias.php");
	include_once ("recupero_lotes.php");
	include_once ("recupero_maquinarias.php");
	include_once ("recupero_catmaquinarias.php");
	include_once ("recupero_maquinistas.php");
	include_once ("recupero_desmalezados.php");
	
	$id_desmalezado = $_GET["id"];
	$id_lote = $_GET["id_lote"];
	$id_maquinista = $_GET["id_maquinista"];
	$id_maquinaria = $_GET["id_maquinaria"];
	$id_campania = $_GET["id_campania"];
	for($i=0;$i<$micountdesmalezados;$i++)
		{	
			if($id_desmalezado==$desmalezados[$i]['id_desmalezado'])
				{
				$id_lote = $desmalezados[$i]['id_lote'];
				$id_maquinista = $desmalezados[$i]['id_maquinista'];
				$id_maquinaria = $desmalezados[$i]['id_maquinaria'];
				$my_idcat_maquinaria=$desmalezados[$i]['id_cat_maquinaria'];
				$id_campania = $desmalezados[$i]['id_campania'];
				}
		}
	
	//recupero campanias
	for($p=0;$p<$micountcampanias;$p++)
		{	
			if($id_campania==$campanias[$p]['id_campania'])
				{
					$my_fechaini_campania=$campanias[$p]['fecha_inicio'];
					$my_fechafin_campania=$campanias[$p]['fecha_fin'];
				}
		}	
		//recupero lotes	
	for($k=0;$k<$micountlotes;$k++)
		{	
			if($id_lote==$lotes[$k]['id_lote'])
				{
					$my_numero_lote=$lotes[$k]['numero_lote'];
					$my_ubicacion_lote=$lotes[$k]['ubicacion'];
				}
		}
	//recupero maquinistas	
	for($j=0;$j<$micountmaquinistas;$j++)
		{	
			if($id_maquinista==$maquinistas[$j]['id_maquinista'])
				{
					$my_nombre_maquinista=$maquinistas[$j]['nombre'];
					$my_dni_maquinista=$maquinistas[$j]['dni'];
				}
		}	
     //recupero maquinarias	
	for($l=0;$l<$micountmaquinarias;$l++)
		{	
			if($id_maquinaria==$maquinarias[$l]['id_maquinaria'])
				{
					$my_marca_maquinaria=$maquinarias[$l]['marca'];
					$my_idcat_maquinaria=$maquinarias[$l]['id_cat_maquinaria'];
				}
		}
		
		//recupero categoria maquinarias	
	for($m=0;$m<$micountcatmaquinarias;$m++)
		{	
			if($my_idcat_maquinaria==$catmaquinarias[$m]['id_cat_maquinaria'])
				{
			
				$my_cat_maquinaria=$catmaquinarias[$m]['descripcion'];
				}
		}

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
                        	<h2>Ver Desmalezados </h2>
							<?php
							 for($i=0;$i<$micountdesmalezados;$i++)
										{	
											if($id_desmalezado==$desmalezados[$i]['id_desmalezado'])
											{
												?>
													<form id="contact-form1"  method="post">
														<table>
														<tr>
															<td><label></label></td>
															<td><input type="text" style="display:none;" name="id_desmalezado" id="id_desmalezado" value="<?php echo $desmalezados[$i]['id_desmalezado'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Campa&ntilde;a:</label></td>
															<td><input type="text" name="my_campania" id="my_campania" value="<?php echo "Nro.Lote: ";echo $my_numero_lote;echo " - "; echo "Lote: "; echo $my_ubicacion_lote;echo " - "; echo "Fecha Inicio: ";echo $my_fechaini_campania;echo " - ";echo "Fecha Fin: ";echo $my_fechafin_campania;?>" size="75"/></td>
														</tr>
														<tr>
															<td><label>Fecha de Inicio:</label></td>
															<td><input type="text" name="fecha_inicio" id="fecha_inicio" value="<?php echo $desmalezados[$i]['fecha_inicio'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Fecha Finalizaci&oacute;n:</label></td>
															<td><input type="text" name="fecha_fin" id="fecha_fin" value="<?php echo $desmalezados[$i]['fecha_fin'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Maquinaria:</td>
															<td><input type="text" name="my_maquinaria" id="my_maquinaria" value="<?php echo $my_cat_maquinaria; echo " - ";echo $my_marca_maquinaria;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Maquinista:</td>
															<td><input type="text" name="my_maquinista" id="my_maquinista" value="<?php echo $my_nombre_maquinista;echo " - "; echo $my_dni_maquinista;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Nro. Lote:</td>
															<td><input type="text" name="my_lote" id="my_lote" value="<?php echo $my_numero_lote;echo " - "; echo $my_ubicacion_lote;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Cantidad Hectareas:</td>
															<td><input type="text" name="cant_hectareas" id="cant_hectareas" value="<?php echo $desmalezados[$i]['cant_hectareas'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Precio Hectarea:</td>
															<td><input type="text" name="precio_hectarea" id="precio_hectarea" value="<?php echo $desmalezados[$i]['precio_hectarea'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Precio Total:</td>
															<td><input type="text" name="precio_total" id="precio_total" value="<?php echo $desmalezados[$i]['precio_total'];?>" size="38"/></td>
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