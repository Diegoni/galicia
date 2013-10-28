<?php include_once("menu.php"); ?>
<?
mysql_query("INSERT INTO `header` (
					Header,
					Empresa,
					Cuit,
					TipoCuenta,
					Moneda,
					Folio,
					Digito1,
					Sucursal,
					Digito2,
					CBU,
					Importe,
					FecAcred,
					Filler)
			VALUES (
				'".$_GET['Header']."',
				'".$_GET['Empresa']."',
				'".$_GET['Cuit']."',
				'".$_GET['TipoCuenta']."',
				'".$_GET['Moneda']."',
				'".$_GET['Folio']."',
				'".$_GET['Digito1']."',
				'".$_GET['Sucursal']."',
				'".$_GET['Digito2']."',
				'".$_GET['CBU']."',
				'".$_GET['Importe']."',
				'".$_GET['FecAcred']."',
				'".$_GET['Filler']."')	
			") or die(mysql_error());
			
$query="SELECT * FROM `ente` WHERE id_ente='".$_GET['id_ente']."'";   
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
<h4>El header se ha modificado con éxito <i class="icon-thumbs-up text-success"></i></h4>
<table class="table table-striped table-hover">

<!-- Cabecera -->
.
<tr class="success">
<td></td>
<td title="Los datos son tomados del ente seleccionado"><b>Carga de detalle</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="footer.php" >
<tr>
<td>Nombre</td>
<td><input type="text" class="span6" name="Nombre" maxlength="16" value="<?echo $row_ente['Nombre'] ?>" placeholder="Nombre o Razón Social." required></td>
</tr>

<tr>
<td><A href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank" title="Consultas de Cuit">Cuit</td>
<td><input type="text" class="span6" name="Cuit" maxlength="11" value="<?echo $row_ente['Cuit'] ?>" onkeypress="return isNumberKey(event)" placeholder="Cuit de la empresa" required></td>
</tr>

<tr>
<td>Fecha Acreditación</td>
<td><input type="text" class="span6" id="datepicker" name="FecAcred" maxlength="11" onkeypress="return isNumberKey(event)" placeholder="Fecha en la que se deberían acreditar los fondos" required></td>
</tr>


<tr>
<td>Tipo Cuenta</td>
<td><select class="span6" name="TipoCuenta" required>
		<option value="">-- Elija una opcion --</option>
		<?if ($row_ente['TipoCuenta']=='C'){ ?>
		<option value="C" selected>Cuenta Corriente</option>
		<option value="A">Caja de ahorro</option>
		<? } else { ?>
		<option value="C">Cuenta Corriente</option>
		<option value="A" selected>Caja de ahorro</option>
		<? } ?>
		</select></td>
</tr>

<tr>
<td>Moneda</td>
<td><select class="span6" name="Moneda" required>
		<option value="">-- Elija una opcion --</option>
		<option value="1">$</option>
		<option value="2">U$S</option>
		</select></td>
</tr>

<tr>
<td>Folio</td>
<td><input type="text" class="span6" name="Folio" maxlength="7" onkeypress="return isNumberKey(event)" placeholder="Folio de la cuenta de débito" required></td></td>
</tr>

<tr>
<td>Digito 1</td>
<td><input type="text" class="span6" name="Digito1" maxlength="1" value="<?echo $row_ente['Digito1'] ?>" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito" required></td></td>
</tr>

<tr>
<td><A href="http://www.bancogalicia.com/portal/site/eGalicia/menuitem.580c6dc13f385d2392e5df84122011ca#" target="_blank" title="Ver sucursales del banco Galicia">Sucursal</a></td>
<td><input type="text" class="span6" name="Sucursal" maxlength="3" value="<?echo $row_ente['Sucursal'] ?>" onkeypress="return isNumberKey(event)" placeholder="Sucursal de la cuenta de débito" required></td></td>
</tr>

<tr>
<td>Digito 2</td>
<td><input type="text" class="span6" name="Digito2" maxlength="1" value="<?echo $row_ente['Digito2'] ?>" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito" required></td></td>
</tr>

<tr>
<td>CBU</td>
<td><input type="text" class="span6" name="CBU" maxlength="26" value="<?echo $row_ente['CBU'] ?>" onkeypress="return isNumberKey(event)" placeholder="CBU de débito" required></td></td>
</tr>

<tr>
<td>Código Transacción</td>
<td><input type="text" class="span6" name="CodTransac" maxlength="2" onkeypress="return isNumberKey(event)" placeholder="Siempre es 32" required></td></td>
</tr>

<tr>
<td>Tipo Transacción</td>
<td><select class="span6" name="TipoTransc" required>
		<option value="">-- Elija una opcion --</option>
		<option value="1">Acreditamiento de Sueldo</option>
		<option value="2">Pago a Proveedores</option>
		</select></td>
</tr>

<tr>
<td>Importe</td>
<td><input type="text" class="span6" name="Importe" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Importe total del archivo (8 + 2 decimales). Ej: para $10,00 carga 1000" required></td></td>
</tr>

<tr>
<td>Referencia</td>
<td><input type="text" class="span6" name="Referencia" maxlength="15" placeholder="Referencia unívoca. Ej: “Sueldo de Mayo”" required></td></td>
</tr>

<tr>
<td>Id Cliente</td>
<td><input type="text" class="span6" name="IdCliente" maxlength="22" placeholder="Identificación del cliente" required></td></td>
</tr>


<tr>
<td>Fecha Movimiento</td>
<td><input type="text" id="datepicker2" class="span6" maxlength="8" onkeypress="return isNumberKey(event)" name="FecMov" placeholder="Fecha en que se remitió el movimiento" required></td></td>
</tr>

<tr>
<td></td>
<td><button type="submit" class="btn" title="Buscar movimiento de entes" name="id_ente" value="<?echo $_GET['id_ente']?>">Aceptar</button></td>
</tr>


</table>
</center>
</div>
