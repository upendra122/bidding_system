<?php 
    require 'include/common.php';
    include 'include/header.php';
        $name=$_POST['item_name'];
        $cat=$_POST['category'];
        $price=$_POST['start_price'];
        $jump=$_POST['jump_price'];    
        $interval = $_POST['interval'];
        $image = $_POST['item_image'];
        $query="INSERT INTO items(item_name,category,price,jump_price,interval,item_image) values ('$name','$cat','$price','$jump','$interval','$image')";
        $result= mysqli_query($con,$query);
        header('location: include/success.php');
?>
