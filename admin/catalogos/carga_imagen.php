<?php
	session_start();
	define ('SITE_ROOT', realpath(dirname(__FILE__))); 
	//die(var_dump(SITE_ROOT));
	include('conexion.php');
	if(!isset($_SESSION['login'])){
		if($_SESSION['login'] != 1){
			header('location:login.php');
		}
	}
	$idUsuario = $_SESSION['idUsuario'];
	#$fecha = date('Y-m-d');

	if (is_uploaded_file($_FILES['file']['tmp_name']))
	{
		 //$nombreFichero = $_FILES['file']['name']; -- indicamos que el archivo va a tener el nombre del archivo temp
		 $ext = substr($_FILES['file']['name'], -3);
		 $num = rand(1,1000); 
		$nombreCompleto = "img/img-".$num.$ext;  
		
		if(move_uploaded_file($_FILES['file']['tmp_name'],SITE_ROOT.'/'.$nombreCompleto)){
			
			// Lo que voy a hacer en caso de que si se suba	 y se mueva		
			header('location:index.php');	
		} else {
			echo "No se ha podido subir el fichero";	
		}
		
	} else{
		 echo "No se ha podido subir el fichero";
	}
