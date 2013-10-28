<?php
include_once("menu.php");


/*--------------------------------------------------------------------
----------------------------------------------------------------------
			Consulta para traer los usuarios
----------------------------------------------------------------------			
--------------------------------------------------------------------*/
//si no hay busqueda los trae a todos
if(empty($_GET['buscar'])){
$query="SELECT * FROM `ente` ORDER BY Nombre ASC";   
}
//si no busca por legajo busca por los otros campos
else {
			$query="SELECT * FROM `ente`
					WHERE 
					Nombre like '%".$_GET['Nombre']."%' AND
					Cuit like '%".$_GET['Cuit']."%' AND
					TipoCuenta like '%".$_GET['TipoCuenta']."%' AND
					Sucursal like '%".$_GET['Sucursal']."%' AND
					CBU like '%".$_GET['CBU']."%' AND
					estado like '%".$_GET['estado']."%'
					ORDER BY Nombre ASC"; 
}	
			$ente=mysql_query($query) or die(mysql_error());
			$row_ente = mysql_fetch_assoc($ente);
			mysql_query("SET NAMES 'utf8'");
			$numero_filas = mysql_num_rows($ente);


//modifica los entes segun el formulario de modificar.php
if(isset($_GET['modificar'])){
	mysql_query("UPDATE `ente` SET	
					Nombre='".$_GET['Nombre']."',
					Cuit='".$_GET['Cuit']."',
					TipoCuenta='".$_GET['TipoCuenta']."',
					Digito1='".$_GET['Digito1']."',
					Sucursal='".$_GET['Sucursal']."',
					Digito2='".$_GET['Digito2']."',
					CBU='".$_GET['CBU']."',
					estado='".$_GET['estado']."'
				WHERE id_ente='".$_GET['id']."'			
				") or die(mysql_error());	
}

//da de baja al ente segun el formulario de eliminar.php
if(isset($_GET['eliminar'])){
	mysql_query("UPDATE `ente` SET	
				estado=0
			WHERE id_ente='".$_GET['id']."'			
				") or die(mysql_error());
}

?>
<div class="span9">
<center>

<!-- si hay modificacion o eliminacion de ente se da aviso que se realizado exitosamente -->
<? if(isset($_GET['modificar']) || isset($_GET['eliminar'])){?>
<h4>El ente: "<? echo $_GET['Nombre'];?>" se ha modificado con éxito <i class="icon-thumbs-up text-success"></i></h4>
<? } ?>


<!--------------------------------------------------------------------
----------------------------------------------------------------------
			Tabla de entes
----------------------------------------------------------------------			
--------------------------------------------------------------------->

<b>Cantidad de registros <? echo $numero_filas; ?></b>
<table class="table table-striped table-hover">

<!-- Cabecera -->
.
<tr class="success">
<td>Nombre</td>
<td>Cuit</td>
<td>Tipo</td>
<td>Sucursal</td>
<td>CBU</td>
<td>Estado</td>
<td>Operación</td>
</tr>

<!-- Formulario de busqueda -->

<form class="form-inline">
<tr class="warning">
<td><input type="text" class="input-small" name="Nombre" placeholder="Nombre"></td>
<td><input type="text" class="input-small" name="Cuit" onkeypress="return isNumberKey(event)" placeholder="Cuit"></td>
<td><select class="input-small" name="TipoCuenta">
		<option></option>
		<option value="C">Cuenta Corriente</option>
		<option value="A">Caja de ahorro</option>
	</select></td>
<td><input type="text" class="input-small" name="Sucursal" onkeypress="return isNumberKey(event)" placeholder="Sucursal"></td>
<td><input type="text" class="input-small" name="CBU" onkeypress="return isNumberKey(event)" placeholder="CBU"></td>
<td><select class="input-small" name="estado">
		<option></option>
		<option value="1">Alta</option>
		<option value="0">Baja</option>
	</select></td>
<td><button type="submit" class="btn" title="Buscar ente" name="buscar" value="1"><i class="icon-search" ></i></button>
	<button class="btn" title="Refresh" onclick="location.reload();" ><i class="icon-refresh"></i></button></td>
</tr>

<!-- si no hay registros se muestra aviso -->
<? if($numero_filas==0){ ?>
</table>
<b>No hay entes con esa búsqueda</b>
<? } 
else{

// tabla con todos los usuarios

do{ ?>
<tr>
<td><? echo $row_ente['Nombre'];?></td>
<td><? echo $row_ente['Cuit'];?></td>
<? if($row_ente['TipoCuenta']=="C"){ ?> 
<td>Cuenta Corriente</td>
<?} else {?>
<td>Caja de ahorro</td>
<? } ?>
<td><? echo $row_ente['Sucursal'];?></td>
<td><? echo $row_ente['CBU'];?></td>
<? if($row_ente['estado']==0){ ?> 	
<td><i class="icon-minus-sign text-danger"></i></i> Baja</td>	
<?} else { ?>
<td><i class="icon-plus-sign text-success"></i> Alta</td>	
<? } ?>
<td><A class="btn btn-primary" title="Editar ente" HREF="modificar.php?id=<? echo $row_ente['id_ente'];?>"><i class="icon-edit"></i></A>
	<?if ($row_ente['estado']==0) {?>
	<A type="submit" class="btn btn-danger disabled"  title="El ente ya esta dado de baja"><i class="icon-minus-sign"></i></i></A>
	<? } else { ?>
	<A type="submit" class="btn btn-danger"  title="Dar de baja" HREF="eliminar.php?id=<? echo $row_ente['id_ente'];?>"><i class="icon-minus-sign"></i></i></A>
	<? } ?>
	</td>

</tr>
<? }while ($row_ente = mysql_fetch_array($ente)) ?>

<? } //cierra el else?>

</table>
</center>
</div>
