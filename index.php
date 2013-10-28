<?php include_once("menu.php"); 
/*
$serv =  "C:/";

$ruta = $serv . "Galicia";
if(!file_exists($ruta))
{
mkdir ($ruta);
echo "<b>Se ha creado el directorio: " . $ruta. "/</b>";
} else {
echo "<b>Los archivos creados se encuentran en: " . $ruta . "/</b>";
}
*/

$query="SELECT * FROM `ente` WHERE estado=1 ORDER BY Nombre ASC ";   
$ente=mysql_query($query) or die(mysql_error());
$row_ente = mysql_fetch_assoc($ente);
mysql_query("SET NAMES 'utf8'");


?>
<div class="span9">
<center>

<!--------------------------------------------------------------------
----------------------------------------------------------------------
			Formulario
----------------------------------------------------------------------			
--------------------------------------------------------------------->
<p></p>

<table class="table table-striped table-hover">

<!-- Cabecera -->
.
<tr class="success">
<td></td>
<td title="Lista de todos los entes creados y en estado de alta"><b>Selección de ente</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="header.php" >

<tr>
<td>Ente</td>
<td><select class="span6" name="id_ente" required>
		<option value="">-- Elija un ente --</option>
		<? do{ ?>	
		<option value="<? echo $row_ente['id_ente'];?>"><? echo $row_ente['Nombre'];?></option>
		<? } while ($row_ente = mysql_fetch_array($ente))?>
		</select></td>
</tr>


<tr>
<td></td>
<td><button type="submit" class="btn" title="Seleccionar ente">Aceptar</button></td>
</tr>



</table>
</center>
</div>
