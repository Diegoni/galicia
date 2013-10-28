<? include_once("head.php");?>
<body>

<div class="container">

<!--------------------------------------------------------------------
----------------------------------------------------------------------
							Cabecera
----------------------------------------------------------------------
--------------------------------------------------------------------->

		<div class="cabecera">
		<div class="row">
			<div class="span9">
				<p>Sistema de archivo Galicia</p>
			</div>
			<div class="span2">
				<a href="http://www.tmsgroup.com.ar/" title="Sitio de TMS Group" target="_blank"><img class="imagenlogo"src="imagenes/logo.png"></a>
			</div>
			<a href='#' class='show_hide' title='Ayuda' id="ayuda-boton"><i class='icon-question-sign'></i></a>
			
		</div>
		</div>
		

<!--------------------------------------------------------------------
----------------------------------------------------------------------
							Menu principal
----------------------------------------------------------------------
--------------------------------------------------------------------->		
		
		<div class="row">	
		<div class="span3; menu">
			<ul class="nav nav-pills nav-stacked">
				<li><a  class="opciones" href="ente.php"><i class="icon-user"></i> Nuevo ente</a></li>
				<li><a  class="opciones" href="entes.php"><i class="icon-group"></i> Entes</a></li>
				<li><a  class="opciones" href="empresa.php"><i class="icon-suitcase"></i> Empresa</a></li>
				<li><a  class="opciones" href="index.php"><i class="icon-usd"></i> Movimiento</a></li>
				<li><a  class="opciones" href="log.php" ><i class="icon-list-ol"></i>  Ver movimientos</a></li>		
				<li><a  class="opciones" href="archivo.php" ><i class="icon-folder-open"></i>  Ver archivo</a></li>	
			</ul>
			
<!--
            <a href="buscardni.php"><img src="imagenes/boton.jpg" width="180" height="40" border="0"></a><br>
			<div style="margin-top:-30px;margin-bottom:13px;width:180px;text-align:center">
			<a style="color: white;text-decoration:none" href="buscardni.php">Buscar por DNI</a></div>


            <a href="buscarnombre.php"><img src="imagenes/boton.jpg" width="180" height="40" border="0"></a><br>
			<div style="margin-top:-30px;margin-bottom:13px;width:180px;text-align:center">
			<a style="color: white;text-decoration:none" href="buscarnombre.php">Buscar por Nombre</a></div>

            <a href="buscarapellido.php"><img src="imagenes/boton.jpg" width="180" height="40" border="0"></a><br>
			<div style="margin-top:-30px;margin-bottom:13px;width:180px;text-align:center">
			<a style="color: white;text-decoration:none" href="buscarapellido.php">Buscar por Apellido</a></div>
-->           
          
        </div>
	
		<div class='slidingDiv'>
		<div class="span9">
		<div id="ayuda">
		<i class='icon-question-sign'></i> Esta aplicación permite crear los archivos .txt necesarios para realizar transferencias en el Banco Galicia.
Para hacerlo debe crear entes y llenar los datos de su empresa, luego diríjase a "$ Movimiento" y completes los datos necesarios para la transferencia.
El .txt se le generara en la carpeta “C:/Galicia/” debe buscar el correspondiente a su movimiento.
		</div><br>
	    </div>
		</div>
		
