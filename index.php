<?php 

include('./includes/koneksi.php');
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandiri Jaya Store</title>
    <link rel="stylesheet" href="../mandiri/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mandiri/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Navbar -->
<div class="container fluid p-0">
    <!--fisrt child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./image/MJ.jpg.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Produk</a>
        </li>
        <?php 
        
      if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_registration.php'>Registrasi</a>
        </li>";
        }
        
        ?>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup><?php cart_item($con); ?></sup></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Total Price: <?php total_cart_price($con); ?></a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" 
        placeholder="Search" aria-label="Search" name="search_data">
      <input type="submit" value="search" class="btn 
      btn-outline-light" name="search_data_product">
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php 
cart($con);
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        <?php 
              if(!isset($_SESSION['username'])){
                echo "
              <li class='nav-item'>
                  <a href='#' class='nav-link'>Welcome Guest</a>
              </li>";
              }else{
                echo "
              <li class='nav-item'>
                  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
              </li>";
              }

        if(!isset($_SESSION['username'])){
          echo "
        <li class='nav-item'>
            <a href='./user_area/user_login.php' class='nav-link'>Login</a>
        </li>";
        }else{
          echo "
        <li class='nav-item'>
            <a href='./user_area/logout.php' class='nav-link'>Logout</a>
        </li>";
        }
        ?>
    </ul>
</nav>

<!--third child -->
<div class="bg-light">
    <h3 class="text-center">Mandiri Jaya </h3>
    <p class="text-center">Selamat datang Silahkan Berbelanja Di Toko Mandiri Jaya Kami</p>
</div>

<!--fourth child -->
<div class="row px-1">
    <div class="col-md-10">
        <!--products -->
        <div class="row">
            <!-- fetchin gproduct -->
        <?php 
    // calling function
        getproducts($con);
        get_unique_categories($con);
        get_unique_brands($con);
        //$ip = getIPAddress();  
        //echo 'User Real IP Address - '.$ip;
        ?>

            <!--  row end -->
        </div>
        <!-- col end -->
    </div>
    <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
            </li>
            <?php 

            getbrands($con);
            ?>

        </ul>

        <!-- categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
    
            <?php 
            getcategories($con);
            ?>

        </ul>
    </div>
</div>

<!-- last child -->
<!-- include footer -->
<?php include("./includes/footer.php"); ?>

</div>

<script src="../mandiri/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../mandiri/fontawesome/js/all.min.js"></script>
</body>
</html>