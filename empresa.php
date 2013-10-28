<?php include_once("menu.php"); ?>
<?
 if(isset($_GET['empresa'])){
 mysql_query("UPDATE `empresa` SET	
				Nombre='".$_GET['Nombre']."',
				Empresa='".$_GET['Empresa']."',
				Cuit='".$_GET['Cuit']."',
				TipoCuenta='".$_GET['TipoCuenta']."',
				CBU='".$_GET['CBU']."'
				WHERE id_empresa=1") or die(mysql_error());
} 
		
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
<?  if(isset($_GET['empresa'])){ ?>
<h4>La empresa se ha modificado con éxito <i class="icon-thumbs-up text-success"></i></h4>
<?  } ?>
<table class="table table-striped table-hover">

<!-- Cabecera -->
.
<tr class="success">
<td></td>
<td><b>Datos de la empresa</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="empresa.php" >

<tr>
<td>Nombre</td>
<td><input type="text" class="span6" value="<?echo $row_empresa['Nombre'] ?>" name="Nombre" placeholder="Nombre de la empresa." required></td>
</tr>

<tr>
<td>Empresa</td>
<td><input type="text" class="span6" value="<?echo $row_empresa['Empresa'] ?>" name="Empresa" maxlength="6" onkeypress="return isNumberKey(event)" placeholder="Código de prestación de la empresa." required></td>
</tr>

<tr>
<td><A href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank" title="Consultas de Cuit">Cuit</td>
<td><input type="text" class="span6" value="<?echo $row_empresa['Cuit'] ?>" name="Cuit" maxlength="11" onkeypress="return isNumberKey(event)" placeholder="Cuit de la empresa" required></td>
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
<td>CBU</td>
<td><input type="text" class="span6" value="<?echo $row_empresa['CBU'] ?>" name="CBU" maxlength="26" onkeypress="return isNumberKey(event)" placeholder="CBU de débito" required></td></td>
</tr>


<tr>
<td></td>
<td><button type="submit" class="btn btn-primary" title="Guardar cambios en empresa" name="empresa" value="1">Aceptar</button></td>
</tr>


</table>
</center>
</div>
