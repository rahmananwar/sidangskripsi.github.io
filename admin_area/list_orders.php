<h3 class="text-center text-success">List All Orders</h3>
<table class="table table-bordered mt-4">
    <thead class="bg-info text-center">
        <?php 
        
        $get_orders="Select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        echo "
        <tr>
            <th>S1 No</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-center text-light'>
        ";

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'> No Orders Yet </h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td><a href='index.php?detail_order&order_id=$order_id' class='text-light'>$invoice_number</a></td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href=''class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
                ";
            }
        }
        ?>
        
    
        
    </tbody>
</table>