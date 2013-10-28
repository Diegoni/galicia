<?php include_once("menu.php"); ?>
<?
  	mysql_query("INSERT INTO `detalle` (
					Nombre,
					Cuit,
					FechAcred,
					TipoCuenta,
					Moneda,
					Folio,
					Digito1,
					Sucursal,
					Digito2,
					CBU,
					CodTransac,
					TipoTransc,
					Importe,
					Referencia,
					IdCliente,
					FecMov,
					Filler)
			VALUES (
				'".$_GET['Nombre']."',
				'".$_GET['Cuit']."',
				'".$_GET['FecAcred']."',
				'".$_GET['TipoCuenta']."',
				'".$_GET['Moneda']."',
				'".$_GET['Folio']."',
				'".$_GET['Digito1']."',
				'".$_GET['Sucursal']."',
				'".$_GET['Digito2']."',
				'".$_GET['CBU']."',
				'".$_GET['CodTransac']."',
				'".$_GET['TipoTransc']."',
				'".$_GET['Importe']."',
				'".$_GET['Referencia']."',
				'".$_GET['IdCliente']."',
				'".$_GET['FecMov']."',
				'".$_GET['Filler']."')	
			") or die(mysql_error());

  	
			?>
			


<div class="span9">
<center>

<!--------------------------------------------------------------------
----------------------------------------------------------------------
			Formulario
----------------------------------------------------------------------			
--------------------------------------------------------------------->
<h4>El detalle se ha modificado con éxito <i class="icon-thumbs-up text-success"></i></h4>
<table class="table table-striped table-hover">

<!-- Cabecera -->
.
<tr class="success">
<td></td>
<td><b>Carga del footer</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="armartxt.php" >
<tr>
<td>Tipo Registro</td>
<td><input type="text" class="span6" name="TipoRegistro" maxlength="2" placeholder="*F" required></td>
</tr>

<tr>
<td>Empresas</td>
<td><input type="text" class="span6" name="Empresas" maxlength="6" onkeypress="return isNumberKey(event)" placeholder="Código de prestación de la empresa." required></td>
</tr>

<tr>
<td>Cantidad de Registros</td>
<td><input type="text" class="span6" name="CantRegistros" maxlength="11" onkeypress="return isNumberKey(event)" placeholder="Cantidad de registros" required></td>
</tr>

<tr>
<td>Filler</td>
<td><input type="text" class="span6" name="Filler" maxlength="135" placeholder=""></td></td>
</tr>

<tr>
<td></td>
<td><button type="submit" class="btn" title="Guardar footer" name="id_ente" value="<?echo $_GET['id_ente']?>">Aceptar</button></td>
</tr>


</table>
</center>
</div>
