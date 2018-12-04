<?php 
    if (isset($_POST['add_to_cart'])) {
      if (isset($_SESSION['shopping_cart'])){
        $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
          # code...
          $count = count($_SESSION['shopping_cart']);
          $item_array = array( 
            'item_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'item_price' =>$_POST['hidden_price'],
            'item_cantidad' => $_POST['cantidad'],
            'item_image' => $_POST['hidden_image'],
            'item_stock' => $_POST['max_stock']
          );
          $_SESSION['shopping_cart'][$count] = $item_array;
          echo '<script>swal("Bien!","Artículo agregado!", "success")</script>';
          //echo '<script>window.location="index.php"</script>';
        } else {
          # code...
          echo '<script>swal("Uhps!","Este artículo ya ha sido agregado!", "warning")</script>';
          //echo '<script>window.location="index.php"</script>';
        }
        
      }else{
        $item_array = array( 
          'item_id' => $_GET['id'],
          'item_name' => $_POST['hidden_name'],
          'item_price' =>$_POST['hidden_price'],
          'item_cantidad' => $_POST['cantidad'],
          'item_image' => $_POST['hidden_image'],
          'item_stock' => $_POST['max_stock']
        );
        $_SESSION['shopping_cart'][0] = $item_array;
        echo '<script>swal("Bien!","Artículo agregado!", "success")</script>';
        //echo '<script>window.location="index.php"</script>';
      }
    }

    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
          if ($value['item_id'] == $_GET['id']) {
            unset($_SESSION['shopping_cart'][$key]);
            echo '<script>swal("Eliminado!","Artículo eliminado correctamente!", "success")</script>';
            //echo '<script>window.location="index.php"</script>';
          }           
        }
      }
    }

    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'delete_session') {
        if (isset($_SESSION['details_buy_client']) && !empty($_SESSION['details_buy_client'])){
          # code...
          //session_unregister('details_buy_pay');
          unset($_SESSION['details_buy_client'][0]);
          //echo '<script>swal("Actualizado!","Carrito actualizado correctamente!", "success")</script>';
        }
      
      }
    }

    if (isset($_POST['update_cart'])) {
        if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
          foreach ($_SESSION['shopping_cart'] as $key => $value) {
             $clave = 'cantidad-'.$value['item_id'];
             $_SESSION['shopping_cart'][$key]['item_cantidad'] = $_POST[$clave];
           }
           echo '<script>swal("Actualizado!","Carrito actualizado correctamente!", "success")</script>';
          
      }
    }

    if (isset($_POST['subscribe'])) {
      echo '<script>swal("Felicidades!","Te enviaremos nuestras novedades a tu email :D", "success")</script>';
    }
    

    if (isset($_POST['mailer'])) {
      echo '<script>swal("Envíado!","Gracias, nos pondremos en contacto contigo lo más pronto posible.", "success")</script>';
    }

   ?>


  <!-- Header -->
  <header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
      <div class="topbar">
      

        

        <div class="topbar-child2">
          <span class="topbar-email">
            <strong>Contacto: </strong>contacto@clothing-co.com
          </span>

      
        </div>
      </div>

      <div class="wrap_header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <h2>CLOTHING & CO.</h2>
        </a>

        <!-- Menu -->
        <div class="wrap_menu">
          <nav class="menu">
            <ul class="main_menu">
              <li>
                <a href="product.php?category=all">Categorias</a>
                <ul class="sub_menu">
                  <?php 
                      $category_query = "SELECT * FROM categorias";
                      $res = mysqli_query($connection,$category_query) or die("Error en la consulta de categorias");
                      if (mysqli_num_rows($res) > 0) {
                        while($category = mysqli_fetch_array($res)){ 
                   ?>
                      <li><a href="product.php?category=<?php echo($category['id']) ?>"><?php echo($category['nombre']) ?></a></li>
                <?php   }
                      } 
                ?>
                </ul>
              </li>
              <li>
                <a href="about.php">Nosotros</a>
              </li>
              <li>
                <a href="contact.php">Contacto</a>
              </li>
              
            </ul>
          </nav>
        </div>

        <!-- Header Icon -->
        <div class="header-icons">
          
          <div class="header-wrapicon2">
            <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">
            <?php 
              if (!empty($_SESSION['shopping_cart'])) {
                # code...
                echo $count = count($_SESSION['shopping_cart']); 
              }else {echo "0";}
            
            ?></span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
           <?php 
              if (!empty($_SESSION['shopping_cart'])) {
                $total = 0;
            ?>
            
              <?php foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
              <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                  <a class="header-cart-item-img" href="index.php?action=delete&id=<?php echo $value['item_id']?>">
                    <img src="<?php echo  ($value['item_image'] == NULL ? "images/item-01.jpg" : "admin/catalogos/".$value['item_image'])?>" alt="IMG">
                  </a>

                  <div class="header-cart-item-txt">
                    <a href="product-detail.php?id=<?php echo $value['item_id']?>" class="header-cart-item-name">
                      <?php echo $value['item_name'] ?>
                    </a>

                    <span class="header-cart-item-info">
                      <?php echo $value['item_cantidad']." x ".$value['item_price'] ?>
                    </span>
                  </div>
                </li>

              </ul>
              <?php
                  $total = $total + ($value['item_cantidad'] * $value['item_price']);
                } 
              ?>
              <div class="header-cart-total">
                Total: $<?php echo number_format($total,2) ?>
              </div>

              <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Ver Carrtio
                  </a>
                </div>

                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="index.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Agregar más
                  </a>
                </div>
              </div>
          
          <?php }else{ ?>
            <div class="col-md-12" style="margin-top: 20px;">
              <div class="alert alert-danger">No hay productos en el carrito</div>
            </div>
          <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
      <!-- Logo moblie -->
      <a href="index.php" class="logo-mobile">
          <h4>CLOTHING & CO.</h4>
        </a>

      <!-- Button show menu -->
      <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
          <div class="header-wrapicon2">
            <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">
            <?php 
              if (!empty($_SESSION['shopping_cart'])) {
                # code...
                echo $count = count($_SESSION['shopping_cart']); 
              }else {echo "0";}
            
            ?></span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
           <?php 
              if (!empty($_SESSION['shopping_cart'])) {
                $total = 0;
            ?>
            
              <?php foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
              <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    <img src="<?php echo $value['item_image']?>" alt="IMG">
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      <?php echo $value['item_name'] ?>
                    </a>

                    <span class="header-cart-item-info">
                      <?php echo $value['item_cantidad']." x ".$value['item_price'] ?>
                    </span>
                  </div>
                </li>

              </ul>
              <?php
                  $total = $total + ($value['item_cantidad'] * $value['item_price']);
                } 
              ?>
              <div class="header-cart-total">
                Total: $<?php echo number_format($total,2) ?>
              </div>

              <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Ver Carrtio
                  </a>
                </div>

                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="index.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Agregar más
                  </a>
                </div>
              </div>
            
          <?php }else{ ?>
            <div class="col-md-12" style="margin-top: 20px;">
              <div class="alert alert-danger">No hay productos en el carrito</div>
            </div>
          <?php } ?>
            </div>
          </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
      <nav class="side-menu">
        <ul class="main-menu">

          <li class="item-menu-mobile">
            <a href="product.php?category=all">Categorias</a>
            <ul class="sub-menu">
              <?php 
                   $q = "SELECT * FROM categorias";
                   $r = mysqli_query($connection,$q) or die("Error en la consulta de categorias");
                  if (mysqli_num_rows($r) > 0) {
                    while($category = mysqli_fetch_array($r)){ 
               ?>
                  
                    <li><a href="product.php?category=<?php echo($category['id']) ?>"><?php echo($category['nombre']) ?></a></li>
              <?php 
                     }
                   } 


              ?>  
             
            </ul>
            <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
          </li>
          <li class="item-menu-mobile">
            <a href="about.php">Nosotros</a>
          </li>

          <li class="item-menu-mobile">
            <a href="contact.php">Contacto</a>
          </li>

          
        </ul>
      </nav>
    </div>
  </header>