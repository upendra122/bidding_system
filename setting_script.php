<?php
    require 'include/common.php';
      if (!isset($_SESSION['email'])) 
            { header('location:index.php'); }
       $old_password=mysqli_real_escape_string($con,$_POST['old_password']);
       $new_password=mysqli_real_escape_string($con,$_POST['new_password']);
       $email=$_SESSION['email'];
       echo $email;
       if(strlen($new_password)<6)
       {
           echo "password should be greater then 6 charachter";
       }
       else
       {
           $re_new_password=mysqli_real_escape_string($con,$_POST['re_new_password']);
           if(strlen($new_password)!=strlen($re_new_password))
           {
               
               echo "password should be same";
           }
           else
           {
               
               $query="Select password from users where email='$email'";
               die($query);
               $result= mysqli_query($con, $query);
               $fetch= mysqli_fetch_array($result);
               if($fetch!=md5($old_password))
               {
                   echo $fetch ;
                   echo "hello";
                   echo md5($old_password);
               }
               else
               {
                   $query="Update  users set password=$new_password where email=$email";
                   $result= mysqli_query($con, $query);
                   echo "password update success";
               }
               
           }
       }
       
         

?>