<?php 
include('../includes/koneksi.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}


// mendapatkan total item dan total harga semua item
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="Select * from `cart_details` where 
ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="Select * from `products` where 
    product_id=$product_id";
    $run_price=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}


// mendapatkan kuantitas dari keranjang
$get_cart="Select * from `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
$pp=0;
$isi_keranjang=mysqli_query($con,"select * from `cart_details` where ip_address='$get_ip_address'");
$semua_barang=array();
while($keranjang=mysqli_fetch_array($isi_keranjang)){
    $semua_barang[$pp]['product_id']=$keranjang['product_id'];
    $semua_barang[$pp]['quantity']=$keranjang['quantity'];
    $pp++;
}
$fix_barang=json_encode($semua_barang);

$insert_orders="Insert into `user_orders` (user_id,amount_due,invoice_number,total_products,
order_date,order_status,product) values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status','$fix_barang')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Orders are submitted succesfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// pesanan tertunda (orders pending)
$insert_pending_orders="Insert into `orders_pending` (user_id,invoice_number,product_id,
quantity,order_status) values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);



// menghapus barang dari keranjang (delete items from cart)
$empty_cart="Delete from `cart_details` where ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);

?>