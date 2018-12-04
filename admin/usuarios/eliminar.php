<?php 
session_start();
include('../conexion.php');
if(!$_GET){
	header('location: index.php');
	exit;
}
if(!isset($_GET['id'])){
	header('location: index.php');
	exit;
}
$idusu 	= trim($_GET['id']);
if($idusu == ""){
	header('location: index.php');
	exit;	
}

query("DELETE FROM clientes WHERE id = ".$idusu);

header('location: index.php');
exit;	