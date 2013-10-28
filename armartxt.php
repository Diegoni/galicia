<?php include_once("menu.php");?>
<?php
mysql_query("INSERT INTO `footer` (
					TipoRegistro,
					Empresas,
					CantRegistros,
					Filler)
			VALUES (			
				'".$_GET['TipoRegistro']."',
				'".$_GET['Empresas']."',
				'".$_GET['CantRegistros']."',
				'".$_GET['Filler']."')	
			") or die(mysql_error());
			
$query="SELECT * FROM `header` ORDER BY id_header DESC";   
$header=mysql_query($query) or die(mysql_error());
$row_header = mysql_fetch_assoc($header);
mysql_query("SET NAMES 'utf8'");


$query="SELECT * FROM `detalle` ORDER BY id_detalle DESC";   
$detalle=mysql_query($query) or die(mysql_error());
$row_detalle = mysql_fetch_assoc($detalle);
mysql_query("SET NAMES 'utf8'");


$query="SELECT * FROM `footer` ORDER BY id_footer DESC";   
$footer=mysql_query($query) or die(mysql_error());
$row_footer = mysql_fetch_assoc($footer);
mysql_query("SET NAMES 'utf8'");

mysql_query("INSERT INTO `movimiento` (
					id_ente,
					id_header,
					id_detalle,
					id_footer)
			VALUES (
				'".$_GET['id_ente']."',
				'".$row_header['id_header']."',
				'".$row_detalle['id_detalle']."',
				'".$row_footer['id_footer']."')	
			") or die(mysql_error());

			
$query="SELECT * FROM `movimiento` ORDER BY id_movimiento DESC";   
$movimiento=mysql_query($query) or die(mysql_error());
$row_movimiento = mysql_fetch_assoc($movimiento);
mysql_query("SET NAMES 'utf8'");			
  /*
$contenido="lo que quieras escribir en el archivo";
$fp=fopen("archivo.txt","x");
fwrite($fp,$contenido);
fwrite($fp,"\r");
fclose($fp) ;*/
  ?>
  <div class="span9">
  <h4>El archivo se ha creado con éxito <i class="icon-thumbs-up text-success"></i></h4>
  <h4>Descargar el archivo 
  <!--<a href="Header  Registros de detalle  Footer.txt" title="txt generado")"></a></h4>-->
 <A class="btn btn-primary" title="Ver txt" href="descarga.php?id=<? echo $row_movimiento['id_movimiento'];?>" target="_blank"><i class="icon-circle-arrow-right"></i></A></h4>
  <br>
  <b>Si desea ver el contenido del archivo, solo debe cargarlo</b>
  <br>
  <input id="fileInput" type="file" size="50" onchange="processFiles(this.files)">
  <div id="fileOutput"></div>

  </div>

