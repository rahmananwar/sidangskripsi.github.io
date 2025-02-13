<?php 

include('../includes/koneksi.php');
include('../functions/common_function.php');
session_start();
if($_SESSION["admin_id"]){
    $cek_admin=mysqli_query($con,"select * from admin_tabel where admin_id='$_SESSION[admin_id]'");
    if(mysqli_num_rows($cek_admin)>0){
        $admin=mysqli_fetch_array($cek_admin);
    }else{
        header("Location:admin_login.php");
    }
}else{
    header("Location:admin_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style.css">

    <style>
.admin_image {
  width: 100px;
  object-fit: contain;
}
.footer{
    position: absolute;
    bottom: 0;
}
body{
    overflow-x: hidden;
}
.product_img{
    width: 100px;
    object-fit: contain;
}
    </style>

</head>
<body>
    <!-- Navbar  -->
    <div class="container-fluid p-0">
        <!--fisrt child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <a href="index.php"><i class="fa-solid fa-user-tie fa-2xl" 
                    style="color: black;"></i></a>
                </nav>
                <nav>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><?php echo $admin['admin_name']; ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Detail</h3>
        </div>

        <!--third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex
            align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../image/iconadmin.jpg"
                    alt="" class="admin_image"></a>
                <p class="text-light text-center"><?php echo $admin['admin_name']; ?></p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">
                        Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">
                        View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">
                        Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">
                        View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">
                        Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">
                        View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">
                        All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">
                        All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">
                        List User</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">
                        Logout</a></button>
                </div>
            </div>
        </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brands'])){
            include('edit_brands.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['detail_order'])){
            include('detail_order.php');
        }
        ?>
    </div>

<!-- last child -->
<?php include('../includes/footer.php'); ?>




<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>

<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>