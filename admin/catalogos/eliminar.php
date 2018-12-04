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
$idpro 	= trim($_GET['id']);
if($idpro == ""){
	header('location: index.php');
	exit;	
}

query("DELETE FROM products WHERE id = ".$idpro);

header('location: index.php');
exit;	