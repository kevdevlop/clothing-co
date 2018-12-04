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
$idcart 	= trim($_GET['id']);
if($idcart == ""){
	header('location: index.php');
	exit;	
}

query("DELETE FROM facturacompra WHERE id = ".$idcart);

header('location: index.php');
exit;	