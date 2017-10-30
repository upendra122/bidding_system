<?php 
    require 'include/common.php';
    
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $password= md5($password);
    $query= "SELECT * FROM users WHERE  user_email ='$email' ";
    $submit_query= mysqli_query($con, $query);
    $rows= mysqli_num_rows($submit_query);
    $info= mysqli_fetch_array($submit_query);
    if($rows==0)
    {
        echo "<span id=invalid2>User doesn't exist</span>";
    }
    else if($password!=$info['user_password'])
    {
         echo "<span id=invalid2>Incorrect password</span>";
    }      
    else
    { 
        $_SESSION['email']=$info['user_email'];
        $_SESSION['id']=$info['user_id'];
        //if (isset($_SESSION['id'])) 
          //  { 
            //    header('location: products.php'); 
                
            //}
        
    }
    
?>
