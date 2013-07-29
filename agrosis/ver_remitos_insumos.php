<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_cuentas.php");
	include_once ("recupero_insumos.php");
	include_once ("recupero_proveedores.php");
	include_once ("recupero_catinsumos.php");
	include_once ("recupero_remitos.php");
	
	$id_remito = $_GET["id"];
	$id_proveedor = $_GET["id_proveedor"];
	$id_insumo = $_GET["id_insumo"];
	for($i=0;$i<$micountremitos;$i++)
		{	
			if($id_remito==$remitos[$i]['id_remito'])
				{
				$my_id_proveedor=$remitos[$i]['id_proveedor'];
				$my_id_cat_insumo=$remitos[$i]['id_cat_insumo'];
				$my_id_insumo=$remitos[$i]['id_insumo'];
				}
		}
		
		//recupero proveedores	
	for($j=0;$j<$micountproveedores;$j++)
		{	
			if($my_id_proveedor==$proveedores[$j]['id_proveedor'])
				{
			
				$my_nombre_proveedor=$proveedores[$j]['nombre'];
				}
		}
	//recupero insumos	
	for($j=0;$j<$micountinsumos;$j++)
		{	
			if($my_id_insumo==$insumos[$j]['id_insumo'])
				{
			
				$my_nombre_insumo=$insumos[$j]['nombre'];
				}
		}
	//recupero categoria de insumos	
	for($l=0;$l<$micountcatinsumos;$l++)
		{	
			if($my_id_cat_insumo==$catinsumos[$l]['id_cat_insumos'])
				{
			
				$my_categoria_insumo=$catinsumos[$l]['descripcion'];
				}
		}
	

	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Remitos</title>
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
                        	<h2>Ver Remitos </h2>
							<?php
							 for($i=0;$i<$micountremitos;$i++)
										{	
											if($id_remito==$remitos[$i]['id_remito'])
											{
												?>
													<form id="contact-form1"  method="post">
														<table>
														<tr>
															<td><label></label></td>
															<td><input type="text" style="display:none;" name="id_remito" id="id_remito" value="<?php echo $remitos[$i]['id_remito'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Fecha:</label></td>
															<td><input type="text" name="fecha" id="fecha" value="<?php echo $remitos[$i]['fecha'];?>" size="38"/></td>
														</tr>
														<tr>
															<td><label>Nro. Remito:</label></td>
															<td><input type="text" name="numero_remito" id="numero_remito" value="<?php echo $remitos[$i]['numero_remito'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Insumos:</td>
															<td><input type="text" name="my_nom_insumo" id="my_nom_insumo" value="<?php echo $my_nombre_insumo?>" size="38"/></td>
														</tr>
														<tr>
															<td>Cantidad:</td>
															<td><input type="text" name="cantidad" id="cantidad" value="<?php echo $remitos[$i]['cantidad'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Precio Unitario:</td>
															<td><input type="text" name="precio" id="precio" value="<?php echo $remitos[$i]['precio'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Precio Total:</td>
															<td><input type="text" name="precio_total" id="precio_total" value="<?php echo $remitos[$i]['precio_total'];?>" size="38"/></td>
														</tr>
														<tr>
															<td>Origen:</td>
															<td><input type="text" name="my_nom_proveedor" id="my_nom_proveedor" value="<?php echo $my_nombre_proveedor;?>" size="38"/></td>
														</tr>
														<tr>
															<td>Cuenta:</td>
															<td><input type="text" name="cuenta" id="cuenta" value="<?php echo $remitos[$i]['precio_total'];?>" size="38"/></td>
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
                        	<h2>Buscar Remitos:</h2>		  						   
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
							  <td height="23"><span class="dropcap">Remitos: </span></td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						  </table>
						  <table  height="111" border="1">
							<tr>
							  <td height="23">Fecha</td>
							  <td>&nbsp;Remito</td>
							  <td>&nbsp;Proveedor</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
							<?php
										 for($i=0;$i<$micountremitos;$i++)
										{	
										echo '<tr><td>'.$remitos[$i]['fecha'].'&nbsp;&nbsp;&nbsp;</td><td>'.$remitos[$i]['numero_remito'].'</td><td>'.$remitos[$i]['id_proveedor'].'</td><td><a href="ver_remitos_insumos.php?id='.$remitos[$i]['id_remito'].'">&nbsp;Ver&nbsp; </a></td></tr>' ;
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