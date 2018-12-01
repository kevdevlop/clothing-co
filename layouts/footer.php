<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
  <div class="flex-w p-b-90">
    <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
      <h4 class="s-text12 p-b-30">
        ESTAR EN CONTACTO
      </h4>

      <div>
        <p class="s-text7 w-size27">
          ¿Dudas? Visitanos en Av. de las Ciencias S/N, Juriquilla, 76230 Santiago de Querétaro, Qro. o llámanos al (+1) 96 716 6879
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
        Categorias
      </h4>
      <?php 

        $category_query = "SELECT * FROM categorias";
        $res = mysqli_query($connection,$category_query) or die("Error en la consulta de categorias");
        if (mysqli_num_rows($res) > 0) {
           while($category = mysqli_fetch_array($res)){ 
       ?>
          <ul>
            <li><a href="product.php?category=<?php echo($category['id']) ?>"><?php echo($category['nombre']) ?></a></li>
          </ul>
        <?php }
        } ?>
    </div>

   
    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
      <h4 class="s-text12 p-b-30">
        Ayuda
      </h4>

      <ul>
        <li class="p-b-9">
          <a href="contact.php" class="s-text7">
            Contactanos
          </a>
        </li>
      </ul>
    </div>

    <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
      <h4 class="s-text12 p-b-30">
        Novedades
      </h4>

      <form method="post">
        <div class="effect1 w-size9">
          <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
          <span class="effect1-line"></span>
        </div>

        <div class="w-size2 p-t-20">
          <!-- Button -->
          <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4" name="subscribe">
            Suscribir
          </button>
        </div>

      </form>
    </div>
  </div>

  <div class="t-center p-l-15 p-r-15">
    <a href="#">
      <img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
    </a>

    <a href="#">
      <img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
    </a>

    <a href="#">
      <img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
    </a>

    <a href="#">
      <img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
    </a>

    <a href="#">
      <img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
    </a>

    <div class="t-center s-text8 p-t-20">
      Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
<?php include 'layouts/js.php'; ?>
  </body>
</html>