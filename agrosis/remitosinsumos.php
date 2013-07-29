<?php
	include_once ("include/config.inc.php");
	include_once ("include/baseMySql.inc.php");
	include_once ("recupero_cuentas.php");
	include_once ("recupero_insumos.php");
	include_once ("recupero_proveedores.php");
	include_once ("recupero_catinsumos.php");
	include_once ("recupero_remitos.php");
	?>
<!DOCTYPE html>
<html lang="es">
<head>
  	<title>Remitos de Insumos</title>
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
                        	<h2>Agregar un Remito de Insumos:</h2>
                            <form id="contact-form1"  method="post" action="postremitosinsumos.php">
								<table>
									<tr>
										<td valign="top">Fecha: </td>
										<td valign="top">
										<span style="display:inline;width:100;">
										<input id="idfechaIni" type="Text" onFocus="idfechaIniCalendar.showCalendar();" size="10" value="" name="fechaIni" readonly="true">
										<div id="idfechaIniCalendarContiner" class="calendario" style="display:none;"></div>
										</span>
										<script>
										idfechaIniCalendar = createCalendario( "idfechaIni", "idfechaIniCalendarContiner", "resources/img/", "yyyy-mm-dd", "spanish" );
										</script>
										</td>
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
										<td>Remito Numero:</td>
										<td><input type="text" name="numero_remito" id="numero_remito" size="20"/></td>
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
								<div class="hr-border-2"></div>
								<div style="height: 160px; overflow:auto; color: #707070; font-family: Arial,Helvetica,sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: bold; line-height: normal; text-decoration: none; ">
                                <table id="table_results">
                                  <thead>
								   <tr>
                                      <th colspan="4">&nbsp;</th>
                                      <th> <a href="#" title="">&nbsp;</a></th>
                                  
                                      <th> <a href="#" title="">&nbsp;</a></th>
                                       <th> <a href="#" title="">&nbsp;</a></th>
                                      <th> <a href="#" title="">&nbsp;</a></th>
                                      <th> <a href="#" title="">&nbsp;</a></th>
                                      <th> <a href="http://www.fabioavila.com.ar:2082/cpsess1128750240/3rdparty/phpMyAdmin/sql.php?db=fabi729_phpl901&table=as_insumos&sql_query=SELECT+%2A+FROM+%60as_insumos%60%0AORDER+BY+%60as_insumos%60.%60id_cat_insumo%60+ASC&session_max_rows=30&token=96e38b87573d091401a5843022912366" title="">&nbsp;</a></th>
                                     
                                    <th> <a href="http://www.fabioavila.com.ar:2082/cpsess1128750240/3rdparty/phpMyAdmin/sql.php?db=fabi729_phpl901&table=as_insumos&sql_query=SELECT+%2A+FROM+%60as_insumos%60%0AORDER+BY+%60as_insumos%60.%60cantidad%60+ASC&session_max_rows=30&token=96e38b87573d091401a5843022912366" title="">&nbsp;</a></th>
                                     
                                    </tr>
                                    <tr>
                                      <th colspan="4">&nbsp;</th>
                                      <th> <a href="#" title="">Codigo</a></th>
                                  
                                      <th> <a href="#" title="">Nombre</a></th>
                                       <th> <a href="#" title="">Marca</a></th>
                                      <th> <a href="#" title="">Descripcion</a></th>
                                      <th> <a href="http://www.fabioavila.com.ar:2082/cpsess1128750240/3rdparty/phpMyAdmin/sql.php?db=fabi729_phpl901&table=as_insumos&sql_query=SELECT+%2A+FROM+%60as_insumos%60%0AORDER+BY+%60as_insumos%60.%60precio%60+ASC&session_max_rows=30&token=96e38b87573d091401a5843022912366" title="">Precio</a></th>
                                      <th> <a href="http://www.fabioavila.com.ar:2082/cpsess1128750240/3rdparty/phpMyAdmin/sql.php?db=fabi729_phpl901&table=as_insumos&sql_query=SELECT+%2A+FROM+%60as_insumos%60%0AORDER+BY+%60as_insumos%60.%60id_cat_insumo%60+ASC&session_max_rows=30&token=96e38b87573d091401a5843022912366" title="">Categoria</a></th>
                                     
                                    <th> <a href="http://www.fabioavila.com.ar:2082/cpsess1128750240/3rdparty/phpMyAdmin/sql.php?db=fabi729_phpl901&table=as_insumos&sql_query=SELECT+%2A+FROM+%60as_insumos%60%0AORDER+BY+%60as_insumos%60.%60cantidad%60+ASC&session_max_rows=30&token=96e38b87573d091401a5843022912366" title="">Cantidad</a></th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="right">2</td>
                                    
                                      <td>Glifosato</td>
                                       <td>Ultra Max</td>
                                      <td>matayuyos</td>
                                      <td>500</td>
                                      <td align="right">Herbicidas</td> 
                                    
                                      <td><label>
                                        <input type="text" name="textfield" id="textfield">
                                      </label></td>
                                    <td>
                                   <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar </a> 
                                </div>
                                </td>
                                    </tr>
                                    <tr>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="right">3</td>
                                     
                                      <td>abcd</td>
                                        <td>Bayer</td>
                                      <td>asdasdasd</td>
                                      <td>45</td>
                                      <td align="right">Fungicidas</td> 
                                      
                                      <td><label>
                                        <input type="text" name="textfield2" id="textfield2">
                                      </label></td>
                                      <td>
                                   <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar </a> 
                                </div>
                                </td>
                                    </tr>
									
									  <tr>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="right">3</td>
                                     
                                      <td>abcd</td>
                                        <td>Bayer</td>
                                      <td>asdasdasd</td>
                                      <td>45</td>
                                      <td align="right">Fungicidas</td> 
                                      
                                      <td><label>
                                        <input type="text" name="textfield2" id="textfield2">
                                      </label></td>
                                      <td>
                                   <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar </a> 
                                </div>
                                </td>
                                    </tr>
									  <tr>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="right">3</td>
                                     
                                      <td>abcd</td>
                                        <td>Bayer</td>
                                      <td>asdasdasd</td>
                                      <td>45</td>
                                      <td align="right">Fungicidas</td> 
                                      
                                      <td><label>
                                        <input type="text" name="textfield2" id="textfield2">
                                      </label></td>
                                      <td>
                                   <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar </a> 
                                </div>
                                </td>
                                    </tr>
									  <tr>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="center">&nbsp;</td>
                                      <td align="right">3</td>
                                     
                                      <td>abcd</td>
                                        <td>Bayer</td>
                                      <td>asdasdasd</td>
                                      <td>45</td>
                                      <td align="right">Fungicidas</td> 
                                      
                                      <td><label>
                                        <input type="text" name="textfield2" id="textfield2">
                                      </label></td>
                                      <td>
                                   <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Agregar </a> 
                                </div>
                                </td>
                                    </tr>
                                  </tbody>
                                </table>
								</div>
                                <p>&nbsp;</p>
                                <div class="btns">
                                    <a class="button" onClick="document.getElementById('contact-form1').submit()">Confirmar Remito</a> 
                                </div>
                              </fieldset>
                            </form>
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