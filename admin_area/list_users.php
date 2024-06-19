<h3 class="text-center text-success">List Users</h3>
<table class="table table-bordered mt-4">
    <thead class="bg-info text-center">
        <?php 
        
        $get_users="Select * from `user_table`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);
        echo "
        <tr>
            <th>S1 No</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-center text-light'>
        ";

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'> No Users Yet </h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../user_area/user_images/$user_image' alt='$username' class='product_img'></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><a href=''class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
                ";
            }
        }
        ?>
        
    
        
    </tbody>
</table>
