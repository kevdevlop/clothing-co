<?php include 'layouts/head.php'; ?>
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/season_women.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Para ellas Colección 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							Nuevos productos
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.php?category=2" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Comprar
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/season-men.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Para ellos Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							Nuevos productos
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="product.php?category=1" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Comprar
							</a>
						</div>
					</div>
				</div>


			</div>
		</div>
	</section>


	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
				 	Productos destacados
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php 						
						$query = "SELECT * FROM products ORDER by id ASC";
						$result = mysqli_query($connection,$query) or die("Error en la consulta de products");
						if (mysqli_num_rows($result) > 0) {
							while($product = mysqli_fetch_array($result)){ 
					?>
								<form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>" class="item-slick2 p-l-15 p-r-15">
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
											<img src="<?php echo ($product['image'] == NULL ? "images/item-01.jpg" : "admin/catalogos/".$product['image']) ?>" alt="IMG-PRODUCT">
											<input type="hidden" name="hidden_image" value="<?php echo $product['image']; ?>">
											<div class="block2-overlay trans-0-4">
												<?php if($product['stock'] > 0){ ?>
												<div class="block2-btn-addcart w-size1 trans-0-4">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add_to_cart">
														Add to Cart
													</button>
												</div>
													<div class="flex-w bo5 of-hidden w-size17" style="position: absolute;
																		    left: 50%;
																		    -webkit-transform: translateX(-50%);
																		    -moz-transform: translateX(-50%);
																		    -ms-transform: translateX(-50%);
																		    -o-transform: translateX(-50%);
																		    transform: translateX(-50%);
																		    bottom: 62px;">
														<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
															<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
														</button>

														<input class="size8 m-text18 t-center num-product" type="number" name="cantidad" value="1">

														<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
															<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
														</button>
														<input type="hidden" id="max_stock" name="max_stock" value="<?php echo($product['stock'])?>">
													</div>
												<?php }else{ ?>
													<div class="flex-w  of-hidden w-size17" style="position: absolute;
																		    left: 61%;
																		    -webkit-transform: translateX(-50%);
																		    -moz-transform: translateX(-50%);
																		    -ms-transform: translateX(-50%);
																		    -o-transform: translateX(-50%);
																		    transform: translateX(-50%);
																		    bottom: 98px;">
														<p class="s-text1">Sin stock</p>
													</div>
												<?php } ?>
											</div>
										</div>

										<div class="block2-txt p-t-20">
											<a href="product-detail.php?id=<?php echo $product['id']; ?>" class="block2-name dis-block s-text3 p-b-5">
												<?php echo $product['nombre']; ?>
											</a>

											<span class="block2-price m-text6 p-r-5">
												$<?php echo number_format($product['price'], 2); ?>
											</span>
											<input type="hidden" name="hidden_name" value="<?php echo $product['nombre']; ?>">
											<input type="hidden" name="hidden_price" value="<?php echo ($product['price']); ?>">
										</div>
									</div>
								</form>

					<?php			
						 	}
						 }
					 ?>
					

				</div>
			</div>

		</div>
	</section>

	
	

<?php include 'layouts/footer.php'; ?>