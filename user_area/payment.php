<?php 
include('../includes/koneksi.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<style>
img{
    width: 50%;
    margin: auto;
    display: block;
}

</style>
<body>
    <!-- php code untuk access user id -->
    <?php 
    $user_ip=getIPAddress();

    $username=$_SESSION['username'];



    $get_user="Select * from `user_table` where username='$username'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="http://www.paypal.com" target="_blank"><img 
                src="../image/paypal.png" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 
                class="text-center">Payment Offline</h2></a>
            </div>
        </div>
    </div>
    

</body>
</html>