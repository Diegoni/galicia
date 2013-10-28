<?php
include("config/database.php"); //conectamos con base de datos

if(isset($_GET['id'])){

$query="SELECT * FROM `movimiento` WHERE id_movimiento='".$_GET['id']."'";   
$movimiento=mysql_query($query) or die(mysql_error());
$row_movimiento = mysql_fetch_assoc($movimiento);
mysql_query("SET NAMES 'utf8'");

$id_header=$row_movimiento['id_header'];
$id_detalle=$row_movimiento['id_detalle'];
$id_footer=$row_movimiento['id_footer'];


$query="SELECT * FROM `header` WHERE id_header='".$id_header."'";  
$header=mysql_query($query) or die(mysql_error());
$row_header = mysql_fetch_assoc($header);
mysql_query("SET NAMES 'utf8'");


$query="SELECT * FROM `detalle` WHERE id_detalle='".$id_detalle."'";  
$detalle=mysql_query($query) or die(mysql_error());
$row_detalle = mysql_fetch_assoc($detalle);
mysql_query("SET NAMES 'utf8'");


$query="SELECT * FROM `footer` WHERE id_footer='".$id_footer."'";  
$footer=mysql_query($query) or die(mysql_error());
$row_footer = mysql_fetch_assoc($footer);
mysql_query("SET NAMES 'utf8'");

}

$nombre = 'Header – Registros de detalle – Footer.txt'; // Nombre del archivo final
header( "Content-Type: application/octet-stream");
header( "Content-Disposition: attachment; filename=".$nombre.""); //archivo de salida




	$filename="Header  Registros de detalle  Footer.txt";
	unlink($filename); 	
	$ar=fopen("Header  Registros de detalle  Footer.txt","a") or die("Problemas en la creacion");
  
  
  //Cargamos el header  

  echo $row_header['Header'];
  
  if(strlen($row_header['Empresa'])<6){
	  $cantidad=strlen($row_header['Empresa']);
	  $Cadena=$row_header['Empresa'];
	
  	  for ($cantidad; $cantidad < 6; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_header['Empresa'];}
  
  
  if(strlen($row_header['Cuit'])<11){
	  $cantidad=strlen($row_header['Cuit']);
	  $Cadena=$row_header['Cuit'];
	
  	  for ($cantidad; $cantidad < 11; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_header['Cuit'];}

  echo $row_header['TipoCuenta'];
  echo $row_header['Moneda'];
  
  if(strlen($row_header['Folio'])<7){
	  $cantidad=strlen($row_header['Folio']);
	  $Cadena=$row_header['Folio'];
	
  	  for ($cantidad; $cantidad <7; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_header['Folio'];}
    
  echo $row_header['Digito1'];
  
  if(strlen($row_header['Sucursal'])<3){
	  $cantidad=strlen($row_header['Sucursal']);
	  $Cadena=$row_header['Sucursal'];
	
  	  for ($cantidad; $cantidad < 3; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_header['Sucursal'];}
  
  echo $row_header['Digito2'];
  
  if(strlen($row_header['CBU'])<26){
	  $cantidad=strlen($row_header['CBU']);
	  $Cadena=$row_header['CBU'];
	
  	  for ($cantidad; $cantidad < 26; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_header['CBU'];}
  
  if(strlen($row_header['Importe'])<10){
	  $cantidad=strlen($row_header['Importe']);
	  $Cadena=$row_header['Importe'];
	
  	  for ($cantidad; $cantidad < 10; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_header['Importe'];}
    
  $FecAcred=date("Ymd", strtotime($row_header['FecAcred']));
  fputs($ar,$FecAcred);
  echo $row_header['Filler'];

  echo "\r\n";
  
  //Cargamos el detalle
  
  if(strlen($row_detalle['nombre'])<16){
	  $cantidad=strlen($row_detalle['Nombre']);
	  $Cadena=$row_detalle['Nombre'];
	
  	  for ($cantidad; $cantidad < 16; $cantidad++) {
		$Cadena=$Cadena.' ';
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['Nombre'];}

  
  if(strlen($row_detalle['Cuit'])<11){
	  $cantidad=strlen($row_detalle['Cuit']);
	  $Cadena=$row_detalle['Cuit'];
	
  	  for ($cantidad; $cantidad < 11; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['Cuit'];}
  
  $FecAcred=date("Ymd", strtotime($row_detalle['FechAcred']));
  fputs($ar,$FecAcred);
  
  echo $row_detalle['TipoCuenta'];
  echo $row_detalle['Moneda'];
  
  
  if(strlen($row_detalle['Folio'])<7){
	  $cantidad=strlen($row_detalle['Folio']);
	  $Cadena=$row_detalle['Folio'];
	
  	  for ($cantidad; $cantidad < 7; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['Folio'];}  
  
  
  echo $row_detalle['Digito1'];
  
  
  if(strlen($row_detalle['Sucursal'])< 3){
	  $cantidad=strlen($row_detalle['Sucursal']);
	  $Cadena=$row_detalle['Sucursal'];
	
  	  for ($cantidad; $cantidad < 3; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['Sucursal'];}  
  
  
  echo $row_detalle['Digito2'];
  
  
  if(strlen($row_detalle['CBU'])< 26){
	  $cantidad=strlen($row_detalle['CBU']);
	  $Cadena=$row_detalle['CBU'];
	
  	  for ($cantidad; $cantidad < 26; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['CBU'];}    
  

  if(strlen($row_detalle['CodTransac'])< 2){
	  $cantidad=strlen($row_detalle['CodTransac']);
	  $Cadena=$row_detalle['CodTransac'];
	
  	  for ($cantidad; $cantidad < 2; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['CodTransac'];}    

  
  echo $row_detalle['TipoTransc'];
  
  
  if(strlen($row_detalle['Importe'])< 10){
	  $cantidad=strlen($row_detalle['Importe']);
	  $Cadena=$row_detalle['Importe'];
	
  	  for ($cantidad; $cantidad < 10; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['Importe'];}   
  

  if(strlen($row_detalle['Referencia'])< 15){
	  $cantidad=strlen($row_detalle['Referencia']);
	  $Cadena=$row_detalle['Referencia'];
	
  	  for ($cantidad; $cantidad < 15; $cantidad++) {
		$Cadena=$Cadena.' ';
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['Referencia'];}   
  

  if(strlen($row_detalle['IdCliente'])< 22){
	  $cantidad=strlen($row_detalle['IdCliente']);
	  $Cadena=$row_detalle['IdCliente'];
	
  	  for ($cantidad; $cantidad < 22; $cantidad++) {
		$Cadena=$Cadena.' ';
	  }
  echo $Cadena;  
  }else{
  echo $row_detalle['IdCliente'];}  
  
  $FecAcred=date("Ymd", strtotime($row_detalle['FecMov']));
  fputs($ar, $FecAcred);
  echo $row_detalle['Filler'];
  
  echo "\r\n";
  
  //Cargamos el footer
	
  if(strlen($row_footer['TipoRegistro'])< 2){
	  $cantidad=strlen($row_footer['TipoRegistro']);
	  $Cadena=$row_footer['TipoRegistro'];
	
  	  for ($cantidad; $cantidad < 2; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_footer['TipoRegistro'];}   
  

  if(strlen($row_footer['Empresas'])< 6){
	  $cantidad=strlen($row_footer['Empresas']);
	  $Cadena=$row_footer['Empresas'];
	
  	  for ($cantidad; $cantidad < 6; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_footer['Empresas'];} 
  

  if(strlen($row_footer['CantRegistros'])< 7){
	  $cantidad=strlen($row_footer['CantRegistros']);
	  $Cadena=$row_footer['CantRegistros'];
	
  	  for ($cantidad; $cantidad < 7; $cantidad++) {
		$Cadena='0'.$Cadena;
	  }
  echo $Cadena;  
  }else{
  echo $row_footer['CantRegistros'];}
  
  echo $row_footer['Filler'];	
		
?>