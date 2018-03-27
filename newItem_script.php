<?php 
        require 'include/common.php';    
        $name=$_POST['item_name'];
        $cat=$_POST['category'];
        //echo $cat;
        $price=$_POST['start_price'];
        $jump=$_POST['jump_price'];    
        $interval = $_POST['interval'];
        $file = $_FILES["item_image"]["tmp_name"];
        //echo "$file</br>";
        $image = addslashes(file_get_contents($file));
        //echo $image;
        //echo "$image";
        $descp=$_POST['description'];
        $seller_id=$_SESSION['id'];
        if(!$price)
            $price = 5;
        if(!$jump)
            $jump = 3;
        if(!$interval)
            $interval = 3;
        //$query2="INSERT INTO users(name,email,password,contact,address) values ('$name','$email','$password','$contact','$address')";
        $query="INSERT INTO items(item_name,seller_id,category,base_price,max_price,increment_price,interval_time,item_image,item_descp,status) values ('$name','$seller_id','$cat','$price','$price','$jump','$interval','$image','$descp','Ongoing')";        
        $result= mysqli_query($con,$query) or die(mysqli_error($result)) ;
        header('location: success.php?from=1');
?>
