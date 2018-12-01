<?php

	$usuario = "root";
	$contrasena = "root";
	$servidor = "localhost";
	$basededatos = "company";
	$connection = mysqli_connect( $servidor, $usuario, $contrasena ) or die("No se pudo conectar con mysql server");
	$db = mysqli_select_db( $connection, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
 ?>