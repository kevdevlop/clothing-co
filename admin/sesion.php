<?php 
session_start();
include('conexion.php');
if(!$_POST){
	header('location: index.php?error=0');
	exit;
}
if(!isset($_POST['email'],$_POST['password'])){
	header('location: index.php?error=0');
	exit;
}
$user 			= trim($_POST['email']);
$password 	= trim($_POST['password']);
if($user == "" && $password == "" ){
	header('location: index.php?error=1');
	exit;	
}
$usuario = query('SELECT * FROM administradores WHERE email = "'.$user.'";'); 
if(mysqli_num_rows($usuario) == 0){
	header('location: index.php?error=1');
	exit;	
}
$row = mysqli_fetch_array($usuario,MYSQLI_ASSOC); 
$sesionActiva = FALSE; 
if($row['password'] ==  $password){
	$_SESSION['sesion'] = 'true';
	$_SESSION['id'] 	= $row['id'];
	$_SESSION['nombre'] = $row['nombre'];
	$sesionActiva = TRUE; 
}
if($sesionActiva){
	header('location: admin.php');
	exit;
} else {
	header('location: index.php?error=1');
	exit;	
}
?>
