<?php 
session_start();
define ('SITE_ROOT', realpath(dirname(__FILE__))); 
include('../conexion.php');

if(!$_POST){
	header('location: index.php');
	exit;
}
if(!isset($_POST['nombre'],$_POST['precio'],$_POST['descripcion'],$_POST['stock'],$_POST['categoria_id'])){
	header('location: index.php');
	exit;
}

$producto 	= trim($_POST['nombre']);
$precio 	= trim($_POST['precio']);
$descripcion 	= trim($_POST['descripcion']);
$stock 	= trim($_POST['stock']);
$idcat 	= trim($_POST['categoria_id']);
if($producto == "" && $precio == "" ){
	header('location: index.php');
	exit;	
}

if (is_uploaded_file($_FILES['file']['tmp_name']))
	{
		 //$nombreFichero = $_FILES['file']['name']; -- indicamos que el archivo va a tener el nombre del archivo temp
		 $ext = substr($_FILES['file']['name'], -3);
		 // $num = rand(1,1000); 
		 $nombreCompleto = "img/img-".$producto.'.'.$ext;  
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],SITE_ROOT.'/'.$nombreCompleto)){
			echo($nombreCompleto);
			query("INSERT INTO products (nombre,image,price,descripcion,stock,categoria_id) VALUES ('".$producto."','".$nombreCompleto."','".$precio."','".$descripcion."','".$stock."','".$idcat."')");	
			
		} else {
			echo "No se ha podido subir el fichero";	
		}
		
	} else{
		query("INSERT INTO products (nombre,price,descripcion,stock,categoria_id) VALUES ('".$producto."','".$precio."','".$descripcion."','".$stock."','".$idcat."')");
	}


header('location: index.php');
exit;	