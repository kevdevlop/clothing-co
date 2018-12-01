<?php 

	include 'conexion.php';
	session_start();
	if (isset($_SESSION['details_buy_client']) && isset($_SESSION['shopping_cart'])) {
				//var_dump($_POST);
				//Se crea primero el cliente con los datos proporcionados
				$res_cliente = crearCliente(
						$_SESSION['details_buy_client'][0]['item_name_client'], 
						$_SESSION['details_buy_client'][0]["item_last_name_client"],
						$_SESSION['details_buy_client'][0]["item_address_client"],
						$_SESSION['details_buy_client'][0]["item_phone_client"],
						$_SESSION['details_buy_client'][0]["item_email_client"],
						$connection
					);
                if ($res_cliente) {
                	
					$id_cliente = mysqli_insert_id($connection);
                	if ($_POST['method_pay'] != 'cash') {
                		//una vez creado el cliente satisfactoriamente, se crea el registro de la tarjeta, en caso de que se haya
                		//pagado con tarjeta
                		$res_card = crearTarjeta(
                				$_POST['name_client_card'], 
	                			$_POST['number_card'], 
	                			$_POST['name_bank_card'], 
	                			$connection
	                		);
                		if ($res_card){
                			$id_card = mysqli_insert_id($connection);
                			$res_factura = crearFacturaCliente($id_cliente, $_POST['method_pay'], $id_card, $connection);
                		}
                		echo "Se creo la factura";
                	}else{
                		$res_factura = crearFacturaCliente($id_cliente, $_POST['method_pay'], NULL, $connection);
                		echo "Se creo la factura";
                	}
                	if ($res_factura) {
                		$id_factura = mysqli_insert_id($connection);
                		echo($id_factura);
                		$total = 0;
                		foreach ($_SESSION['shopping_cart'] as $key => $value) {
                			$precio_cantidad = $value['item_price']*$value['item_cantidad'];
                			$total = $total + $precio_cantidad;
                			crearItemCompra($value['item_id'], $value['item_cantidad'], $precio_cantidad, $id_factura, $connection);
                			actualizarStock($value['item_id'], $value['item_cantidad'], $connection);
                			
                		}
                		echo("<br>".$total);
                		actualizarTotalFactura($id_factura, $total, $connection);
                	}
                	
                }

                session_destroy();
                echo "<div class='col-md-12' style='margin-top: 20px;'>
              		<div class='alert alert-info'><h3>La compra se ha realizado correctamente</h3><br><p>Se le enviará un email con los datos de su compra</p><p><a href='../index.php'>Regresar a comprar</a></p>
              		</div>
            		</div>";
			
	}

	function crearCliente($nombre_cliente, $apellido_cliente, $direccion, $telefono, $email, $connection)
	{
		$query_cliente = "INSERT INTO clientes (id, nombre, apellido, email, telefono, direccion) VALUES (NULL, '".$nombre_cliente."', '".$apellido_cliente."', '".$email."', '".$telefono."', '".$direccion."')";

        $res_cliente = mysqli_query($connection,$query_cliente) or die("Error al crear al cliente");
        return $res_cliente;
	}

	function crearTarjeta($nombre_titular, $numero_tarjeta, $banco, $connection)
	{
        $query_card = "INSERT INTO tarjeta (id, nombre_titular, numero, banco) VALUES (NULL, '".$nombre_titular."', '".$numero_tarjeta."', '".$banco."')" ;
        $res_card = mysqli_query($connection, $query_card) or die("Error al crear la tarjeta");
        return $res_card;
	}

	function crearFacturaCliente($cliente_id, $method_pay, $tarjeta_id, $connection)
	{
		$pay_card = ($method_pay != 'cash' ? 1 : 0);
		$pay_cash = ($method_pay == 'cash' ? 1 : 0);
		if ($tarjeta_id != NULL) {
			$query_factura = "INSERT INTO facturaCompra (id, fecha_pago, tarjeta_id, cliente_id, pay_cash, pay_card, total_payed) VALUES (NULL, CURRENT_TIMESTAMP, '".$tarjeta_id."', '".$cliente_id."', '".$pay_cash."', '".$pay_card."', NULL)";
		}else{
			$query_factura = "INSERT INTO facturaCompra (id, fecha_pago, tarjeta_id, cliente_id, pay_cash, pay_card, total_payed) VALUES (NULL, CURRENT_TIMESTAMP, NULL, '".$cliente_id."', '".$pay_cash."', '".$pay_card."', NULL)";
		}
		
		$res_factura = mysqli_query($connection, $query_factura) or die("Error al crear la factura");
		return $res_factura;
	}
	
	function crearItemCompra($id_producto, $cantidad, $precio_cantidad, $id_factura, $connection)
	{
		$query_item_compra = "INSERT INTO compraItem (cantidad, precio_cantidad, producto_id, facturaCompra_id) VALUES ('".$cantidad."', '".$precio_cantidad."', '".$id_producto."', '".$id_factura."')";
		mysqli_query($connection, $query_item_compra) or die("Error al crear la compraItem");
	}

	function actualizarTotalFactura($id_factura, $total, $connection)
	{
		$query_total_factura = "UPDATE facturaCompra SET total_payed = '".$total."' WHERE id = '".$id_factura."'";
		return mysqli_query($connection, $query_total_factura) or die("Error al actualizar el total");
	}

	function actualizarStock($id_producto, $cantidad, $connection)
	{
		$q_num_stock = "SELECT stock FROM products WHERE id=".$id_producto;
		$r_num_sotck = mysqli_query($connection,$q_num_stock) or die("Error en la consulta de categorias");
		$stock_anterior = mysqli_fetch_assoc($r_num_sotck);
		$nuevo_stock = $stock_anterior['stock'] - $cantidad;
		$query_stock = "UPDATE products SET stock = '".$nuevo_stock."' WHERE id = '".$id_producto."' ";
		mysqli_query($connection, $query_stock) or die("error al actualizar el stock");
	}

 ?>