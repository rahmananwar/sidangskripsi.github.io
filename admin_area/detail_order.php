<h3 class="text-center text-success">Detail Orders</h3>
<?php 

$cek_order=mysqli_query($con,"Select * from user_orders where order_id=$_GET[order_id]");
if(mysqli_num_rows($cek_order)>0){
    $detail_order=mysqli_fetch_array($cek_order);
        ?>


<table class="table table-bordered mt-4">
    <thead class="bg-info text-center">
        <tr>
            <td>Product</td>
            <td>Quantity</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        $semua_product=json_decode($detail_order['product'],true);
        foreach($semua_product as $product){
            $info_product=mysqli_fetch_array(mysqli_query($con,"select * from products 
            where product_id='$product[product_id]'"));
            echo "
            <tr>
            <td>$info_product[product_title]</td>
            <td>$product[quantity]</td>
            </tr>";
        }

        ?>
    </tbody>

</table>
<br>
<br>
<?php 

$pemesan=mysqli_fetch_array(mysqli_query($con,"select * from user_table where user_id='$detail_order[user_id]'"))
?>
<table class="table table-bordered mt-4">
    <tbody>
        <tr>
            <td style="width: 20%;">Nama Pemesan</td>
            <td style="width: 80%;"><?php echo $pemesan['username']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $pemesan['user_address']; ?></td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><?php echo $pemesan['user_mobile']; ?></td>
        </tr>
        
    </tbody>
</table>
<?php
}else{
    echo "Pesenan tidak ditemukan";
}

?>
