<?php 
    function check_if_added_to_cart($item_id)
    {    
        require 'include/common.php';
        $user_id=$_SESSION['id'];
        $query="SELECT * FROM bid_table b,item i WHERE user_id = '$user_id' AND i.item_id = b.item_id and status='Complete' and max_price = bid_price";
        
        $submit_query = mysqli_query($con,$query);
        $rows= mysqli_num_rows($submit_query);
        if($rows>=1)
        {?>
            <table class="table table-striped">
                <?php
                $id=array();
                while($fetch= mysqli_fetch_array($result))
                {?>
                    <tbody>             
                        <tr>
                            <td><?php echo $fetch['item_image'] ?></td>
                            <td> <?php echo "Congractulation!<br>This item is yours.</br>price : $fetch['max_price']";?>
                                <button type="submit" class="btn btn-primary" name="submit">Place Your Order</button><br><br>   
                            </td>
                        </tr>
                    </tbody>
        <?php}}?>
        else
        {
            return 0;
        }
    }
?>