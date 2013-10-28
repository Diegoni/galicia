<?php
include_once("menu.php");

//si no hay busqueda traemos los ultimos 50 movimientos
if(empty($_GET['buscar'])){
$query="SELECT 	movimiento.id_movimiento,
				movimiento.id_ente,
				movimiento.id_detalle,
				ente.id_ente,
				ente.Nombre as Nombre, 
				detalle.id_detalle,
				detalle.Referencia as Referencia,
				detalle.FechAcred as Fecha
		FROM `movimiento` 
		INNER JOIN `ente` ON(movimiento.id_ente=ente.id_ente)
		INNER JOIN `detalle` ON(movimiento.id_detalle=detalle.id_detalle)
		ORDER BY id_movimiento DESC 
		LIMIT 0 , 50";   
}

//con busqueda
else if(empty($_GET['fecha'])){
			$query="SELECT 	
				movimiento.id_movimiento,
				movimiento.id_ente,
				movimiento.id_detalle,
				ente.id_ente,
				ente.Nombre as Nombre, 
				detalle.id_detalle,
				detalle.Referencia as Referencia,
				detalle.FechAcred as Fecha 
			FROM `movimiento` 
			INNER JOIN `ente` ON(movimiento.id_ente=ente.id_ente)
			INNER JOIN `detalle` ON(movimiento.id_detalle=detalle.id_detalle) 
			WHERE 
			movimiento.id_movimiento like '%".$_GET['id_movimiento']."%' AND
			ente.Nombre like '%".$_GET['nombre']."%' AND
			detalle.Referencia like '%".$_GET['detalle']."%' 
			ORDER BY id_movimiento DESC"; 
}
else{
//cambiamos el formato de la fecha y le sumamos un dia a la fecha para hacer el intervalo de tiempo
			$fecha_americana=	date( "Y-m-d", strtotime( $_GET['fecha'] ) );
				
			
			$query="SELECT movimiento.id_movimiento,
				movimiento.id_ente,
				movimiento.id_detalle,
				ente.id_ente,
				ente.Nombre as Nombre, 
				detalle.id_detalle,
				detalle.Referencia as Referencia,
				detalle.FechAcred as Fecha 
			FROM `movimiento` 
			INNER JOIN `ente` ON(movimiento.id_ente=ente.id_ente)
			INNER JOIN `detalle` ON(movimiento.id_detalle=detalle.id_detalle) 
			WHERE 
			movimiento.id_movimiento like '%".$_GET['id_movimiento']."%' AND
			ente.Nombre like '%".$_GET['nombre']."%' AND
			detalle.FechAcred like '".$fecha_americana."' AND
			detalle.Referencia like '%".$_GET['detalle']."%' 
			ORDER BY id_movimiento DESC"; 

}
$movimiento=mysql_query($query) or die(mysql_error());
$row_movimiento = mysql_fetch_assoc($movimiento);
mysql_query("SET NAMES 'utf8'");
$numero_filas = mysql_num_rows($movimiento);
?>

<div class="span9">
<center>

<!-- cantidad de registros -->
<b>Últimos <? echo $numero_filas;?> movimientos</b>

<table class="table table-striped table-hover">
<tr class="success">
<td>Movimiento</td>
<td>Ente</td>
<td>Detalle</td>
<td>Fecha</td>
<td>Operación</td>
</tr>

<!-- formulario de busqueda -->
<form class="form-inline">
<tr class="warning">

<td><input type="text" class="input-small" name="id_movimiento" placeholder="movimiento"></td>
<td><input type="text" class="input-small" name="nombre" placeholder="ente"></td>
<td><input type="text" class="input-small" name="detalle" placeholder="detalle"></td>
<td><input type="text" class="input-small" name="fecha" id="datepicker" placeholder="fecha" readonly></td>
<td><button  class="btn" title="Buscar movimientos" name="buscar" value="1"><i class="icon-search" ></i></button></td>
</tr>

<!-- si no hay registros se muestra aviso -->
<? if($numero_filas==0){ ?>
</table>
<b>No hay movimientos</b>
<? } 
else{

// tabla con todos los movimientos
do{ ?>
<tr>
<td><? echo $row_movimiento['id_movimiento'];?></td>
<td><? echo $row_movimiento['Nombre'];?></td>
<td><? echo $row_movimiento['Referencia'];?></td>
<td><? echo date( "d-m-Y", strtotime( $row_movimiento['Fecha'] ) );  ?></td><!-- Cambio de formato de fecha -->
<td><A class="btn btn-primary" title="Ver txt" href="descarga.php?id=<? echo $row_movimiento['id_movimiento'];?>" target="_blank"><i class="icon-circle-arrow-right"></i></A></td>
</tr>
<? }while ($row_movimiento = mysql_fetch_array($movimiento)) ?>

<? } //cierra el else?>


</table>
</center>
</div>
