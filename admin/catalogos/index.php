<?php 
	session_start();
	include('../conexion.php');
	if(!$_SESSION){
		header('location: ../index.php?error=4');
		exit;
	}
	if(!isset($_SESSION['sesion'])){
		header('location: ../index.php?error=4');
		exit;
	}
	if(!isset($_SESSION['id'],$_SESSION['nombre'])){
		header('location: ../index.php?error=4');
		exit;
	}
	$nombreUsuario 	= $_SESSION['nombre'];
	$idUsuario 		= $_SESSION['id'];

	function catalogo(){
		$cat = query("SELECT * FROM products ");
		if(mysqli_num_rows($cat) == 0){
			$cat = NULL; 
		} 
		return $cat;
	}
	if($_GET && isset($_GET['status'])){
		switch ($_GET['status']) {
			case 0:
				echo '<script>swal("Uhps!","Este hay un error al actualizar!", "warning")</script>';
				break;
			case 1:
				echo '<script>swal("Actualizado!","El articulo se ha actualizado!", "success")</script>';
				break;
			default:
				$mensaje = '<h4 style="color:red;">¡No juegues conmigo!</h4>';
				break;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administrador de Catalogos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
			<div class="wrap_header">
				<!-- Logo -->
				<a href="../admin.php" class="logo">
					<img src="../logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Administracion de Catálogos</a>
							</li>

							<li>
								<a href="../usuarios/index.php">Administración de Usuarios</a>
							</li>
							<li>
								<a href="../carrito/index.php">Administración de Carrito de Compras</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						<?php echo $nombreUsuario; ?>
					</a>
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<a href="../cerrar.php">cerrar sesión</a>
					</div>	

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				
			</nav>
		</div>
	</header>

	<!-- Slide1 -->
<table style="width:100%; top:0; left:0; position: fixed; background-color:#ddd; height: 50px; z-index:999;">		
		<tbody>
			
		</tbody>
	</table>

	<?php 
	 	$cata = catalogo();
	 	if(!is_null($cata)):
	?>
		<table style="position:relative;width:90%; margin: 60px auto 0 auto; ">
			<thead>
				<tr>
					<td colspan="6">
						<H2>AGREGAR INVENTARIO</H2>
						<form action="agregar.php" method="post" enctype="multipart/form-data">
							<label>
								NOMBRE PRODUCTO
								<input type="text" name="nombre">
							</label>
							<label>
								PRECIO
								<input type="text" name="precio">
							</label>
							<label>
								DESCRIPCION
								<textarea class="form-control" rows="5" cols="40" id="comment" name="descripcion"></textarea>
							</label>
							<label>
								STOCK
								<input type="text" name="stock">
							</label>
							<label>
								IMAGEN
								<input type="file" name="file">
							</label>
							<label>
								CATEGORIA
								<select name="categoria_id">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</label>
							<br>
							<br>
							<input type="submit" value="Agregar" class=" flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
						</form>
					</td>
				</tr>				
				<tr>
					<th>ID</th>
					<th>PRODUCTO</th>
					<th>PRECIO</th>
					<th>DESCRIPCION</th>
					<th>STOCK</th>
					<th>IMAGEN</th>
					<th coslpan="2">ACCIÓN</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					while($r = mysqli_fetch_array($cata)):
				?>
					<tr>
						<td><?php echo $r['id'];?></td>
						<td><?php echo utf8_encode($r['nombre']);?></td>
						<td><?php echo $r['price'];?></td>
						<td><?php echo $r['descripcion'];?></td>
						<td><?php echo $r['stock'];?></td>
						<td>
							<?php 
							if(!is_null($r['image'])):
							?>
							<img src="<?php echo $r['image'];?>" style="width:100px;"/>
							<?php 
							endif; 
							?>		
						</td>
						<td>
							<a href="editar.php?id=<?php echo $r['id'];?>">EDITAR</a>
						</td>
						<td>
							<a href="eliminar.php?id=<?php echo $r['id'];?>" >ELIMINAR</a>
						</td>
					</tr>
				<?php 
					endwhile; 
				?>
			</tbody>
		</table>
	<?php 
		endif; 
		if (is_null($cata)) {
	?>
		<div class="col-md-12" style="margin-top: 20px;">
			<div class="alert alert-danger">No hay productos</div>
		</div>
	<?php } ?>
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>			
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>