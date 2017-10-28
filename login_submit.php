<?php 
    require 'include/common.php';
    
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $password= md5($password);
    $query= "SELECT user_email,user_id FROM users WHERE user_password = '$password' AND user_email ='$email' ";
    $submit_query= mysqli_query($con, $query);
    $rows= mysqli_num_rows($submit_query);
    if($rows==0)
    {
        echo "User doesn't exist";
    }
    else
    {
        $info= mysqli_fetch_array($submit_query);
        $_SESSION['email']=$info['email'];
        $_SESSION['id']=$info['user_id'];
        if (isset($_SESSION['id'])) 
            { 
                header('location: products.php'); 
                
            }
        
    }
    
?>
