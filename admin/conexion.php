<?php 
	function conexion (){
		$con = mysqli_connect("localhost", "root", "root", "company");
		if(!$con){
			echo 'error al conectarse a la base de datos';
			die('.'); 
		}		
		return $con; 
	}
	function query($consulta){
		$con = conexion(); 
		$res = mysqli_query($con, $consulta) or die("Error en la consulta");
		mysqli_close($con);
		if($res){
			return $res; 
		} else {
			return NULL;
		}
		
	}
 ?>