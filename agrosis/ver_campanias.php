<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	
	include_once ("recupero_campanias.php");
	include_once ("recupero_lotes.php");
	include_once ("recupero_catsemillas.php");
	
	$id_campania = $_GET["id"];
	$id_lote = $_GET["id_lote"];
	for($i=0;$i<$micountcampanias;$i++)
		{	
			if($id_campania==$campanias[$i]['id_campania'])
				{
					$id_lote = $campanias[$i]['id_lote'];
					$my_id_cat_semilla=$campanias[$i]['id_cat_semilla'];
				}
		}
		
	
	//recupero lotes	
	for($k=0;$k<$micountlotes;$k++)
		{	
			if($id_lote==$lotes[$k]['id_lote'])
				{
					$my_numero_lote=$lotes[$k]['numero_lote'];
				}
		}
		
	//recupero categoria de semillas	
	for($l=0;$l<$micountcatsemillas;$l++)
		{	
			if($my_id_cat_semilla==$catsemillas[$l]['id_cat_semilla'])
				{
					$my_categoria_semilla=$catsemillas[$l]['descripcion'];
				}
		}
		
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Campa&ntilde;as</title>
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
                        	<h2>Ver Campa&ntilde;as </h2>
							<?php
							 for($i=0;$i<$micountcampanias;$i++)
										{	
											if($id_campania==$campanias[$i]['id_campania'])
											{
												?>
														<form id="contact-form1"  method="post">
														<table>
														<tr>
															<td><label></label></td>
															<td><input type="text" style="display:none;" name="id_campania" id="id_campania" value="<?php echo $campanias[$i]['id_campania'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Fecha de Inicio:</label></td>
															<td><input type="text" name="fecha_inicio" id="fecha_inicio" value="<?php echo $campanias[$i]['fecha_inicio'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Fecha Finalizaci&oacute;n:</label></td>
															<td><input type="text" name="fecha_fin" id="fecha_fin" value="<?php echo $campanias[$i]['fecha_fin'];?>" size="38"/></td>
														</tr>
														<tr>
															<td></td>
															<td><input type="text" name="id_lote" id="id_lote" style="display:none;" value="<?php echo $campanias[$i]['id_lote'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Numero Lote:</td>
															<td><input type="text" name="numero_lote" id="numero_lote" value="<?php echo $my_numero_lote;?>" size="38"/></td>
														</tr>
														<tr>
															<td></td>
															<td><input type="text" name="id_cat_semilla" id="id_cat_semilla" style="display:none;" value="<?php echo  $campanias[$i]['id_cat_semilla'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Cultivo:</td>
															<td><input type="text" name="my_cat_semilla" id="my_cat_semilla" value="<?php echo $my_categoria_semilla;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Precio Total:</td>
															<td><input type="text" name="precio_total" id="precio_total" value="<?php echo $campanias[$i]['precio_total'];?>" size="38"/></td>
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
                        	<h2>Buscar Campa&ntilde;as:</h2>		  						   
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
							  <td height="23"><span class="dropcap">Campa&ntilde;as: </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						  </table>
						  <table  height="111" border="1">
							<tr>
							  <td height="23">Fecha&nbsp;</td>
							  <td>&nbsp;Lote</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountcampanias;$i++)
										{	
										echo '<tr><td>'.$campanias[$i]['fecha_inicio'].'&nbsp;&nbsp;&nbsp;</td><td>'.$campanias[$i]['id_lote'].'</td><td><a href="ver_campanias.php?id='.$campanias[$i]['id_campania'].'">&nbsp;Ver&nbsp; </a></td></tr>' ;
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