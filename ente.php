<?php include_once("menu.php"); ?>
<?
 if(isset($_GET['ente'])){
 

// Comprobamos si el usuario esta registrado 

$nuevo_usuario=mysql_query("select nombre from `ente` where Nombre='$_GET[Nombre].' OR Cuit='$_GET[Cuit].'"); 
if(mysql_num_rows($nuevo_usuario)>0) 
{ 
$control=0;
}else{ 
$control=1; 
 
mysql_query("INSERT INTO `ente` (
					Nombre,
					Cuit,
					TipoCuenta,
					Digito1,
					Sucursal,
					Digito2,
					CBU)
			VALUES (
				'".$_GET['Nombre']."',
				'".$_GET['Cuit']."',
				'".$_GET['TipoCuenta']."',
				'".$_GET['Digito1']."',
				'".$_GET['Sucursal']."',
				'".$_GET['Digito2']."',
				'".$_GET['CBU']."')		
			") or die(mysql_error());
			}
			}
			?>
<div class="span9">
<center>

<!--------------------------------------------------------------------
----------------------------------------------------------------------
			Formulario
----------------------------------------------------------------------			
--------------------------------------------------------------------->
<?  if(isset($_GET['ente'])){
	if($control==0){
 ?>
<h4>El nombre de ente ya esta registrado <A class='btn btn-danger'  href='javascript:history.go(-1)'><i class='icon-arrow-left'></i> Volver</A></h4>
<?} else {?>
<h4>El ente se ha cargado con éxito <i class="icon-thumbs-up text-success"></i></h4>
<?  }} ?>
<table class="table table-striped table-hover">

<!-- Cabecera -->
.
<tr class="success">
<td></td>
<td><b>Alta de Ente</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="ente.php" >
<tr>
<td>Nombre</td>
<td><input type="text" class="span6" name="Nombre" maxlength="16" placeholder="Nombre o Razón Social." required></td>
</tr>

<tr>
<td><A href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank" title="Consultas de Cuit">Cuit</td>
<td><input type="text" class="span6" name="Cuit" maxlength="11" onkeypress="return isNumberKey(event)" placeholder="Cuit de la empresa" required></td>
</tr>

<tr>
<td>Tipo Cuenta</td>
<td><select class="span6" name="TipoCuenta" required>
		<option value="">-- Elija una opcion --</option>
		<option value="C">Cuenta Corriente</option>
		<option value="A">Caja de ahorro</option>
		</select></td>
</tr>

<tr>
<td>Digito 1</td>
<td><input type="text" class="span6" name="Digito1" maxlength="1" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito" required></td>
</tr>

<tr>
<td><A href="http://www.bancogalicia.com/portal/site/eGalicia/menuitem.580c6dc13f385d2392e5df84122011ca#" target="_blank" title="Ver sucursales del banco Galicia">Sucursal</a></td>
<td><input type="text" class="span6" name="Sucursal" maxlength="3" onkeypress="return isNumberKey(event)" placeholder="Sucursal de la cuenta de débito" required></td>
</tr>

<tr>
<td>Digito 2</td>
<td><input type="text" class="span6" name="Digito2" maxlength="1" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito" required></td>
</tr>

<tr>
<td>CBU</td>
<td><input type="text" class="span6" name="CBU" maxlength="26" onkeypress="return isNumberKey(event)" placeholder="CBU de débito" required></td>
</tr>


<tr>
<td></td>
<td>
<button type="submit" class="btn btn-primary" name="ente" value="1"><i class="icon-plus-sign-alt"></i> Alta</button>
<A class="btn btn-danger" title="Cancelar el alta" HREF="ente.php"><i class="icon-ban-circle"></i> Cancelar</A></td>
</tr>


</table>
</center>
</div>
