<?php
include_once("menu.php");

//seleccion del ente
$query="SELECT * FROM `ente` WHERE id_ente='".$_GET['id']."'";   
$ente=mysql_query($query) or die(mysql_error());
$row_ente = mysql_fetch_assoc($ente);
mysql_query("SET NAMES 'utf8'");


?>
<div class="span9">
<center>

<!-- formulario de modificacion-->
<form class="form-inline" action="entes.php">
<table class="table table-hover">
<tr>
<input type="hidden" name="id" class="span4" value="<? echo $row_ente['id_ente'];?>">

<!-- Cabecera -->
.
<tr class="success">
<td></td>
<td><b>Modificación de ente</b></td>
</tr>

<!-- Formulario -->

<form class="form-inline" action="ente.php" >
<tr>
<td>Nombre</td>
<td><input type="text" class="span6" name="Nombre" maxlength="16" value="<? echo $row_ente['Nombre'];?>" placeholder="Nombre o Razón Social." required></td>
</tr>

<tr>
<td><A href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank" title="Consultas de Cuit">Cuit</td>
<td><input type="text" class="span6" name="Cuit" maxlength="11" value="<? echo $row_ente['Cuit'];?>" onkeypress="return isNumberKey(event)" placeholder="Cuit de la empresa" required></td>
</tr>

<tr>
<td>Tipo Cuenta</td>
<td><select class="span6" name="TipoCuenta" required>
		<option value="">-- Elija una opcion --</option>
		<? if($row_ente['Cuit']=="C"){ ?>
		<option value="C" selected>Cuenta Corriente</option>
		<option value="A">Caja de ahorro</option>
		<? } else { ?>
		<option value="C">Cuenta Corriente</option>
		<option value="A" selected>Caja de ahorro</option>
		<? } ?>
		</select></td>
</tr>

<tr>
<td>Digito 1</td>
<td><input type="text" class="span6" name="Digito1" maxlength="1" value="<? echo $row_ente['Digito1'];?>" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito" required></td></td>
</tr>

<tr>
<td><A href="http://www.bancogalicia.com/portal/site/eGalicia/menuitem.580c6dc13f385d2392e5df84122011ca#" target="_blank" title="Ver sucursales del banco Galicia">Sucursal</a></td>
<td><input type="text" class="span6" name="Sucursal" maxlength="3" value="<? echo $row_ente['Sucursal'];?>" onkeypress="return isNumberKey(event)" placeholder="Sucursal de la cuenta de débito" required></td></td>
</tr>

<tr>
<td>Digito 2</td>
<td><input type="text" class="span6" name="Digito2" maxlength="1" value="<? echo $row_ente['Digito2'];?>" onkeypress="return isNumberKey(event)" placeholder="Dígito 1 de la cuenta de débito" required></td></td>
</tr>

<tr>
<td>CBU</td>
<td><input type="text" class="span6" name="CBU" maxlength="26" value="<? echo $row_ente['CBU'];?>" onkeypress="return isNumberKey(event)" placeholder="CBU de débito" required></td></td>
</tr>

<tr>
<td>Estado</td>
<td>
<input type="radio" name="estado" id="alta" value="1" checked>
 Alta
<input type="radio" name="estado" id="baja" value="0">
 Baja
</td>
</tr>


<tr>
<td></td>
<td>
<button type="submit" class="btn btn-primary" name="modificar" value="1" title="Editar al ente <? echo $row_ente['Nombre'];?>"><i class="icon-edit"></i> Editar</button>
<A class="btn btn-danger"  title="Cancelar la edición" HREF="entes.php"><i class="icon-ban-circle"></i> Cancelar</A></td>
</tr>  


</table>
</form>



</center>
</div>
