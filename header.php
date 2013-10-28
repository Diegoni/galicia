<?php include_once("menu.php"); 

$query="SELECT * FROM `empresa`";   
$empresa=mysql_query($query) or die(mysql_error());
$row_empresa = mysql_fetch_assoc($empresa);
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
<td title="Los datos son tomados de 'Empresa'"><b>Carga del header</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="detalle.php" >
<tr>
<td>Header</td>
<td><select class="span6" name="Header" required>
		<option value="">-- Elija una opcion --</option>
		<option value="*CH">*CH</option>
		<option value="*CP">*CP</option>
		</select></td>
</tr>

<tr>
<td>Empresa</td>
<td><input type="text" class="span6" name="Empresa" value="<?echo $row_empresa['Empresa'] ?>" maxlength="6" onkeypress="return isNumberKey(event)" placeholder="Código de prestación de la empresa." required></td>
</tr>

<tr>
<td>Cuit</td>
<td><input type="text" class="span6" name="Cuit" value="<?echo $row_empresa['Cuit'] ?>" maxlength="11" onkeypress="return isNumberKey(event)" placeholder="Cuit de la empresa" required></td>
</tr>

<tr>
<td>Tipo Cuenta</td>
<td><select class="span6" name="TipoCuenta" required>
		<option value="">-- Elija una opcion --</option>
		<?if ($row_empresa['TipoCuenta']=='C'){ ?>
		<option value="C" selected>Cuenta Corriente</option>
		<option value="A">Caja de ahorro</option>
		<? } else { ?>
		<option value="C">Cuenta Corriente</option>
		<option value="A" selected>Caja de ahorro</option>
		<? } ?>
		</select></td>
</tr>

<tr>
<td>Moneda (*)</td>
<td><select class="span6" name="Moneda">
		<option value="">-- Elija una opcion --</option>
		<option value="1">$</option>
		<option value="2">U$S</option>
		</select></td>
</tr>


<tr>
<td>Folio (*)</td>
<td><input type="text" class="span6" name="Folio" maxlength="7" onkeypress="return isNumberKey(event)" placeholder="Folio de la cuenta de débito"></td></td>
</tr>

<tr>
<td>Digito 1 (*)</td>
<td><input type="text" class="span6" name="Digito1" maxlength="1" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito"></td></td>
</tr>

<tr>
<td>Sucursal (*)</td>
<td><input type="text" class="span6" name="Sucursal" maxlength="3" onkeypress="return isNumberKey(event)" placeholder="Sucursal de la cuenta de débito"></td></td>
</tr>

<tr>
<td>Digito 2 (*)</td>
<td><input type="text" class="span6" name="Digito2" maxlength="1" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito"></td></td>
</tr>

<tr>
<td>CBU</td>
<td><input type="text" class="span6" name="CBU" value="<?echo $row_empresa['CBU'] ?>" maxlength="26" onkeypress="return isNumberKey(event)" placeholder="CBU de débito" required></td></td>
</tr>

<tr>
<td>Importe</td>
<td><input type="text" class="span6" name="Importe" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Importe total del archivo (8 + 2 decimales). Ej: para $10,00 carga 1000" required></td></td>
</tr>

<tr>
<td>Fecha Acreditación</td>
<td><input type="text" id="datepicker" class="span6" maxlength="8" onkeypress="return isNumberKey(event)" name="FecAcred" placeholder="Mínima fecha de acreditación de los registros de detalle" required></td></td>
</tr>

<tr>
<td></td>
<td><button type="submit" class="btn" title="Guardar header" name="id_ente" value="<?echo $_GET['id_ente']?>">Aceptar</button></td>
</tr>

<tr>
<td></td>
<td>(*) = Solo completar si se acreditan cuentas Galicia.</td>
</tr>

</table>
</center>
</div>
