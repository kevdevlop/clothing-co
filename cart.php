<?php include 'layouts/head.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40  flex-col-c-m">
		<h3 class="l-text5 t-center">
			Carrito de Compras
		</h3>
	</section>
	<?php 
		if (!empty($_SESSION['shopping_cart'])) {								
	?>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<form method="post" action="cart.php?action=update" class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Producto</th>
								<th class="column-3">Precio</th>
								<th class="column-4 p-l-70">Cantidad</th>
								<th class="column-5">Total</th>
								<th class="column-6"></th>
							</tr>
							<?php foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
								<tr class="table-row">
									<td class="column-1">
										<div class="cart-img-product b-rad-4 o-f-hidden">
											<img src="<?php echo ($value['item_image'] == NULL ? "images/item-01.jpg" : "admin/catalogos/".$value['item_image']) ?>" alt="IMG-PRODUCT">
										</div>
									</td>
									<td class="column-2"><?php echo $value['item_name']; ?></td>
									<td class="column-3">$<?php echo number_format($value['item_price'],2) ?></td>
									<td class="column-4">
										<div class="flex-w bo5 of-hidden w-size17">
											<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
											</button>

											<input class="size8 m-text18 t-center num-product" type="number" name="cantidad-<?php echo $value['item_id']?>" value="<?php echo $value['item_cantidad'] ?>">

											<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
											</button>
											<input type="hidden" id="max_stock" name="max_stock" value="<?php echo($value['item_stock'])?>">
										</div>
									</td>
									<td class="column-5">$<?php echo number_format($value['item_price']*$value['item_cantidad'],2) ?></td>
									<td class="column-6" style="padding-right: 10px;"><a href="cart.php?action=delete&id=<?php echo $value['item_id']?>" class="modify-link">Eliminar</a></td>
								</tr>
							<?php } ?>
						</table>
				</div>
				<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div class="flex-w flex-m w-full-sm">	
					</div>

					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="update_cart"">
							Actualizar Carro
						</button>
					</div>
				</div>
			</form>

			

			<!-- Total -->
			<form method="post" action="confirmacion.php" class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Información
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Ingresa tus datos:
					</span>

					<div class="w-size20 w-full-sm">

						<span class="s-text19">
							Datos cliente:
						</span>
						<p class="s-text8 p-b-23">
							Es importante que ingreses tus datos corectamente para que se te pueda realizar el envío.
						</p>
						<div class="size13 bo4 m-b-12">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name_client" placeholder="Nombre(s)" required>
						</div>
						<div class="size13 bo4 m-b-12">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="last_name_client" placeholder="Apellido(s)">
						</div>
						<div class="size13 bo4 m-b-12">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text-area" name="address_client" placeholder="Calle #, Colonia, Estado, CP " required>
						</div>
						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="phone_client" placeholder="(52)+ 000-9999">
						</div>

						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="email_client" placeholder="ejemplo@gmail.com" required>
						</div>

					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Datos de pago:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							Para realizar el pago, tenemos la opción de pago por depósito o pago con tarjeta de crédito
						</p>

						<span class="s-text19">
							Opciones de pago
						</span>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2 method_pay" name="method_pay">
								<option>Selecciona un método de pago...</option>
								<option value="pay_cash">Deposito</option>
								<option value="pay_card">Tarjeta de crédito/débito</option>
							</select>
						</div>

						<div class="pay">
							
						</div>
												
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$<?php echo number_format($total,2) ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="to_confirm">
						Proceder con la compra
					</button>
				</div>
			</form>
		</div>
	</section>

	<?php }else{ ?>	
		<div class="col-md-12" style="margin-top: 20px;">
			<div class="alert alert-danger">No hay productos en el carrito</div>
		</div>
	<?php } ?>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

<?php include 'layouts/footer.php'; ?>
