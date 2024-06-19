<?php 

include('../includes/koneksi.php');
include('../functions/common_function.php');
@session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
body{
    overflow: hidden;
}

    </style>
</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Login</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../image/adminlogin.png" alt="Admin Login" 
            class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            
        <?php

if($_POST['admin_login']){




$admin_name = $_POST["username"];
$p = $_POST["password"];

$sql = "select * from `admin_tabel` where admin_name='".$admin_name."' and admin_password='".$p."' limit 1";
$hasil = mysqli_query ($con,$sql);
$jumlah = mysqli_num_rows($hasil);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["admin_id"]=$row["admin_id"];
		
	

		header("Location:index.php");
		
	}else {
		echo "Username atau password salah";
	}
}
?>

            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" 
                    placeholder="Enter Your Username" required="required"
                    class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                    placeholder="Enter Your password" required="required"
                    class="form-control">
                </div>
                
                <div>
                    <input type="submit" class="bg-info py-2 px-4 border-0" name="admin_login"
                    value="Login">
                </div>
            </form>
        </div>
    </div>
    
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>

