<?php 

	$query = "SELECT * FROM products ORDER by id ASC";
	$result = mysqli_query($connection,$query) or die("Error en la consulta de products");
	$data = [];
	if (mysqli_num_rows($result) > 0) {
	 //echo "<script> alert('im in') </script>";
	 	while($product = mysqli_fetch_array($result)){
			array_push($data, array(
				'id' => $product['id'],
				'nombre' => $product['nombre'],
				'price' => $product['price'],
				'image' => $product['image'],
				'descripcion' => $product['descripcion'],
				'stock' => $product['stock']
			));
		}
	}else{
		echo "<div class='col-md-12' style='margin-top: 20px;'>
              <div class='alert alert-danger'>No hay productos en esta categoria</div>
            </div>";
	}
	
      



 ?>