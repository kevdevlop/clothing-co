<?php include 'layouts/head.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background: #DDFF;">
		<h2 class="l-text2 t-center">
			Contacto
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="20.705272" data-map-y="-100.444116" data-pin="images/icons/icon.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form method="post" class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Envíanos un mensaje
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nombre Completo">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Telefono">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Mensaje"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="mailer">
								Envíar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<?php include 'layouts/footer.php'; ?>
	<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAA3PEl2EIl_3I2D1S-jkymRLIbtyZ2X3U"></script>
	<script src="js/map-custom.js"></script>