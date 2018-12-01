<?php 

$query = "SELECT * FROM products WHERE id = ". $_GET['id'];
$result = mysqli_query($connection, $query) or die("Error en la consulta de products");
if (mysqli_num_rows($result) > 0) {
	$product = mysqli_fetch_assoc($result);
}

$query_category = "SELECT nombre FROM categorias WHERE id = ".$product['categoria_id'];
$r_category = mysqli_query($connection, $query_category);
$category = mysqli_fetch_assoc($r_category);

 ?>