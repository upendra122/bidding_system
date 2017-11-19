<?php 
    require 'include/common.php';
    $bid=$_POST['bid_price'];
    $user_id=$_SESSION['id'];
    $item_id=$_SESSION['c_item'];
    $query="Select * from bid_table where user_id='$user_id' and item_id='$item_id'";
    
    $result= mysqli_query($con, $query);
    if(mysqli_num_rows($result)==1)
    {
        $query="update  bid_table set price='$bid' where user_id='$user_id' and item_id='$item_id'";
            $result= mysqli_query($con, $query);
            $query="update  items set max_price='$bid' where item_id='$item_id' ";
            $result= mysqli_query($con, $query);

        
    }
    else
    {
        $query="insert into  bid_table (user_id,item_id,price) values('$user_id','$item_id','$bid')";
            $result= mysqli_query($con, $query);
            $query="update  items set max_price='$bid' where item_id='$item_id' ";
            $result= mysqli_query($con, $query);

        }
    header('location:products.php');