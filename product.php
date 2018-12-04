<?php include 'layouts/head.php'; ?>

<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background: #DDF;">
		<?php 
			if ($_GET['category'] != 'all') {
				$q_title = "SELECT nombre FROM categorias WHERE id=".$_GET['category'];
				$r_title = mysqli_query($connection,$q_title) or die("Error en la consulta de categorias");
				$name = mysqli_fetch_assoc($r_title);
		?>
			<h2 class="l-text2 t-center">
				<?php echo($name['nombre']) ?>
			</h2>
		<?php 
			}else{
				echo '<h2 class="l-text2 t-center"> Todos los productos</h2>';
			}
			
		 ?>
		
		<p class="m-text13 t-center">
			Nuevas colecciones 2018
		</p>
	</section>

<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categorias
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php?category=all" class="s-text13 <?php if($_GET['category'] == 'all') echo("active1") ?>">
									Todas
								</a>
							</li>
							<?php 
							$res = mysqli_query($connection,$category_query) or die("Error en la consulta de categorias");
							if (mysqli_num_rows($res) > 0) {
                        		while($category = mysqli_fetch_array($res)){ 

                         ?>
							<li class="p-t-4">
								<a href="product.php?category=<?php echo($category['id']) ?>" class="s-text13 <?php if($_GET['category'] == $category['id']) echo("active1") ?>">
									<?php echo($category['nombre']) ?>
								</a>
							</li>

						<?php }

							} 
							?>
						</ul>

						
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<!-- <div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div> -->

						<span class="s-text8 p-t-5 p-b-5">
							<div class="search-product pos-relative bo4 of-hidden">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Buscar productos...">

								<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
						</span>
					</div>

					<!-- Product -->
					<div class="row">
						<?php 						
							if ($_GET['category'] == "all") {
								include 'includes/get_all.php';
							}else{
								include 'includes/get_by_category.php';
							}
						?>

						<?php foreach ($data as $key => $value) {
							
						?>
						<form method="post" action="product.php?category=<?php echo($_GET['category']) ?>&action=add&id=<?php echo $value['id']; ?>" class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?php echo(($value['image'] == NULL ? "images/item-01.jpg" : "admin/catalogos/".$value['image'])) ?>" alt="IMG-PRODUCT">
									<input type="hidden" name="hidden_image" value="<?php echo $value['image']; ?>">
									<div class="block2-overlay trans-0-4">
										<?php if ($value['stock'] > 0){ ?>
											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
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
												<input type="hidden" id="max_stock" name="max_stock" value="<?php echo($value['stock'])?>">
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
									<a href="product-detail.php?id=<?php echo $value['id']; ?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $value['nombre']; ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										$<?php echo number_format($value['price'], 2); ?>
									</span>
									<input type="hidden" name="hidden_name" value="<?php echo $value['nombre']; ?>">
									<input type="hidden" name="hidden_price" value="<?php echo ($value['price']); ?>">
								</div>
							</div>
						</form>


					<?php	} ?>

						
					</div>

					
				</div>
			</div>
		</div>
	</section>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

	

<?php include 'layouts/footer.php'; ?>
