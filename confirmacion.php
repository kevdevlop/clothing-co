<?php include 'layouts/head.php'; ?>
<?php 
//session_start();
if (isset($_POST['to_confirm'])) {

	if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {

		if (!isset($_SESSION['details_buy_client']) ){
			//echo "<script>swal('HOlaaa', 'SCSCSCs', 'info')</script>";
			$item_array_client = array( 
	          	'item_name_client' => $_POST['name_client'],
	          	'item_last_name_client' => $_POST['last_name_client'],
	          	'item_address_client' =>$_POST['address_client'],
	          	'item_phone_client' => $_POST['phone_client'],
	          	'item_email_client' => $_POST['email_client']
         	);
         	
	        $_SESSION['details_buy_client'][0] = $item_array_client;
      	   	
		}

	}else{
		header("Location: index.php");
	}
            
}else{
	header("Location: index.php");
}

 ?>
<!-- Title Page -->
<section class="bg-title-page p-t-40  flex-col-c-m">
	<h3 class="l-text5 t-center">
			Confirmación de la Compra
	</h3>
</section>
<section class="cart bgwhite p-t-70 p-b-100">
		<form method="post" action="includes/generar_factura.php" class="container">
			<div class="container-table-cart pos-relative">
					<div class="container-table-cart pos-relative">
							<div class="wrap-table-shopping-cart bgwhite">
									<table class="table-shopping-cart">
										<tr class="table-head">
											<th class="column-1"></th>
											<th class="column-2">Product</th>
											<th class="column-3">Price</th>
											<th class="column-4">Quantity</th>
											<th class="column-5">Total</th>
											
										</tr>
										<?php foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
											<tr class="table-row">
												<td class="column-1">
													<div class="cart-img-product b-rad-4 o-f-hidden">
														<img src="<?php echo "admin/catalogos/".$value['item_image'] ?>" alt="IMG-PRODUCT">
													</div>
												</td>
												<td class="column-2"><?php echo $value['item_name']; ?></td>
												<td class="column-3">$<?php echo number_format($value['item_price'],2) ?></td>
												<td class="column-4"><?php echo $value['item_cantidad'] ?></td>
												<td class="column-5">$<?php echo number_format($value['item_price']*$value['item_cantidad'],2) ?></td>
											
											</tr>
										<?php } ?>
										<tr class="table-row">
											<td class="column-1">
													
												</td>
												<td class="column-2"></td>
												<td class="column-3"></td>
												<td class="column-4"></td>
											
											<td class="column-5"><strong>Total a pagar:</strong> $<?php echo number_format($total,2) ?></td>
											<input type="hidden" name="total_pay" value="<?php echo $total ?>">
										</tr>
									</table>
							</div>
													
					</div>

			</div>
			<div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Información de la compra
				</h5>
				<hr>
				<div class="flex-w p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Datos del cliente:
					</span>
					
						<div class="w-size20 w-full-sm">
							<div class="size15 m-b-12">
								<p><span class="m-text11">Nombre(s):</span> <?php echo $_SESSION['details_buy_client'][0]['item_name_client'] ?></p>
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Apellido(s):</span> <?php echo $_SESSION['details_buy_client'][0]['item_last_name_client'] ?></p>
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Dirección:</span> <?php echo $_SESSION['details_buy_client'][0]['item_address_client'] ?></p>
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Telefono:</span> <?php echo $_SESSION['details_buy_client'][0]['item_phone_client'] ?></p>
							</div>

							<div class="size15 m-b-22">
								<p><span class="m-text11">Email:</span> <?php echo $_SESSION['details_buy_client'][0]['item_email_client'] ?></p>
							</div>

						</div>

				</div>
				<hr>
				<div class="flex-w p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Datos de pago:
					</span>
					<?php if(strcmp($_POST['cash'], 'cash') == 0) { ?>
						<div class="w-size20 w-full-sm">
							<div class="size15 m-b-12">
								<p><span class="m-text11">Metodo de pago:</span>  Depósito bancario</p>
								<input type="hidden" name="method_pay" value="cash">
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Banco:</span> <?php echo $_POST['name_bank_cash'] ?> </p>
								<input type="hidden" name="name_bank_cash" value="<?php echo $_POST['name_bank_cash'] ?>">
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Número de cuenta:</span> <?php echo $_POST['account_cash'] ?></p>
								<input type="hidden" name="account_cash" value="<?php echo $_POST['account_cash'] ?>">
							</div>

						</div>
					<?php }else { ?>
						<div class="w-size20 w-full-sm">
							<div class="size15 m-b-12">
								<p><span class="m-text11">Metodo de pago:</span>  tarjeta de crédito/débito</p>
								<input type="hidden" name="method_pay" value="card">
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Nombre del titular:</span> <?php echo $_POST['name_client_card'] ?> </p>
								<input type="hidden" name="name_client_card" value="<?php echo $_POST['name_client_card'] ?>">
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Tarjeta:</span> <?php echo $_POST['number_card'] ?></p>
								<input type="hidden" name="number_card" value="<?php echo $_POST['number_card'] ?>">
							</div>
							<div class="size15 m-b-12">
								<p><span class="m-text11">Banco:</span> <?php echo $_POST['name_bank_card'] ?></p>
								<input type="hidden" name="name_bank_card" value="<?php echo $_POST['name_bank_card'] ?>">
							</div>

						</div>
					<?php } ?>

				</div>
				<div class="flex-w flex-sb-m p-t-25 p-b-25 p-l-35 p-r-60 p-lr-15-sm">
					<div class="flex-w flex-m trans-0-4 size10">
									<a href="cart.php?action=delete_session" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="update_cart"">
										Regresar
									</a>	
					</div>

					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="update_cart"">
										Comfirmar
						</button>
					</div>
				</div>
			</div> 

				
					
		</form>
</section>

<?php include 'layouts/footer.php'; ?>