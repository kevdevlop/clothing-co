<?php 
	session_start();
	if($_SESSION && isset($_SESSION['sesion'],$_SESSION['id'],$_SESSION['nombre'])){
		header('location: app.php');
		exit;
	}
	$mensaje = ''; 
	if($_GET && isset($_GET['error'])){
		switch ($_GET['error']) {
			case 0:
				$mensaje = '<h4 style="color:red;">¡Debes ingresar todos los campos!</h4>'; 
				break;
			case 1:
				$mensaje = '<h4 style="color:red;">¡Tus datos son incorrectos!</h4>';
				break;
			case 4:
				$mensaje = '<h4 style="color:red;">¡Debes tener una sesión activa!</h4>';
				break;
			default:
				$mensaje = '<h4 style="color:red;">¡No juegues conmigo!</h4>';
				break;
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">

form{
	margin-top: 90px;
	width: 25%;
	background-color: rgba(255,255,255,0.3);
	margin-left: 37%;
	height: 500px;
}

h1{
	text-align: center;
	margin-top: 60px;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 3.2em;
	color: white;
	/*background-color: #0F742E;*/
}

.correo {
	margin-top: 10px;
	width: 250px;
	height: 20px;
	opacity: .3px;
	background-color: rgba(255,255,255,1s);

}
.password{
	margin-top: 20px;
	width: 250px;
	height: 20px;
	margin-bottom: 20px;
	background-color: rgba(255,255,255,1);
}

.iniciar_sesion{
	width: 120px;
	height: 30px;
	border-radius: 5px;
	background-color: #003322;
	outline: none;
	color: white;
	font-family: 'Noto Serif', serif;
	border-style: none;
}

}

	</style>
</head>
<body>
	
	<div class="contenedor">
		<form action="sesion.php" method="post">
		
			<h1><img src="logo.png" style="width: 300px; height: 100px;"></h1>
			<br>
			<center>
				<div class="contenedor2">
					<input type="text" name="email" placeholder="Correo Electrónico" class="w3-input w3-border w3-sand" size="25" value="" autocomplete="off" style="">
					<br><br>
					<input type="password" name="password" placeholder="Contraseña" class="w3-input w3-border w3-sand">
				
			<br><br>
			<input type="submit" value="Iniciar Sesión" class="w3-btn w3-blue">
			<br>
			<br>
			<?php 
				echo $mensaje; 
			?>
			</div>
		</center>
			
		</form>
	</div>

	
</body>
</html>