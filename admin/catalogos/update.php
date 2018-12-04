<?php 
session_start();
define ('SITE_ROOT', realpath(dirname(__FILE__))); 
include('../conexion.php');

if(!$_POST){
	//header('location: index.php');
	//exit;
	echo "NO hay variable post";
}
if(!isset($_POST['nombre'],$_POST['precio'])){
	header('location: index.php');
	exit;
}

$producto 	= trim($_POST['nombre']);
$precio 	= trim($_POST['precio']);
$descripcion 	= trim($_POST['descripcion']);
$stock 	= trim($_POST['stock']);
$idpro = $_POST['id'];
if($producto == "" && $price == "" ){
	header('location: index.php?status=0');
	exit;	
}

if (is_uploaded_file($_FILES['file']['tmp_name']))
	{
		 //$nombreFichero = $_FILES['file']['name']; -- indicamos que el archivo va a tener el nombre del archivo temp
		 $ext = substr($_FILES['file']['name'], -3);
		 // $num = rand(1,1000); 
		 $nombreCompleto = "img/img-".$producto.'.'.$ext;  
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],SITE_ROOT.'/'.$nombreCompleto)){
			
			 if(query("UPDATE products SET nombre = '".$producto."', price = '".$precio."', image = '".$nombreCompleto."', descripcion = '".$descripcion."', stock = '".$stock."' WHERE id = ".$idpro)){
			 	header('location: index.php?status=1');
			 	exit;
			 }else{
			 	header('location: index.php?status=0');
			 	exit;
			 }
			
		} else {
			echo "No se ha podido subir el fichero";	
		}
		
	} else{
		if(query("UPDATE products SET nombre = '".$producto."', price = '".$precio."', descripcion = '".$descripcion."', stock = '".$stock."' WHERE id = ".$idpro)){
			header('location: index.php?status=1');
			exit;
		}
		else{
			header('location: index.php?status=0');
			exit;
		}
	}
	