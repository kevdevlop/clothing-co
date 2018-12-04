<?php 
session_start();
include('../conexion.php');

if(!$_POST){
	header('location: index.php');
	exit;
}
if(!isset($_POST['nombre'],$_POST['apellido'])){
	header('location: index.php');
	exit;
}

$nombre 	= trim($_POST['nombre']);
$apellido 	= trim($_POST['apellido']);
$email 	= trim($_POST['email']);
$telefono 	= trim($_POST['telefono']);
$direccion 	= trim($_POST['direccion']);
$idusu = $_POST['id'];
if($producto == "" && $apellido == "" ){
	header('location: index.php');
	exit;	
}
else{
	query("UPDATE clientes SET nombre = '".$nombre."', apellido = '".$apellido."', email = '".$email."', telefono = '".$telefono."', direccion = '".$direccion."' WHERE id = ".$idusu);	
}
header('location: index.php');
exit;	