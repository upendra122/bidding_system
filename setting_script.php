<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>GEU Bidding System</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
         <link rel="stylesheet" type="text/css" href="style.css">

        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
<?php
    require 'include/common.php';
      if (!isset($_SESSION['email'])) 
            { header('location:index.php'); }
       $old_password=mysqli_real_escape_string($con,$_POST['old_password']);
       $new_password=mysqli_real_escape_string($con,$_POST['new_password']);
       $email=$_SESSION['email'];
       //echo $email;
       if(strlen($new_password)<6)
       { ?>
                    <center>
                        <div class = "container">
                            <div id="banner-content">
                                <h4 style="text-align: center;color: white ;">Sorry!<br><br>New password should be atleast of 6 digit long<br><br><a href="products.php"><u>Click here</u></a> to visit HomePage  </h4>             
                            </div>
                        </div>
                    </center>
        <?php }
       else
       {
           $re_new_password=mysqli_real_escape_string($con,$_POST['re_new_password']);
           if($new_password!=$re_new_password)
           {  ?>
                    <center>
                        <div class = "container">
                            <div id="banner-content">
                                <h4 style="text-align: center;color: white ;">Sorry!<br><br>New Passwords don't matches<br><br><a href="products.php"><u>Click here</u></a> to visit HomePage  </h4>             
                            </div>
                        </div>
                    </center>
               <?php }
           else
           {
               
               $query="Select user_password from users where user_email='$email'";               
               $result= mysqli_query($con, $query) or die(mysqli_error($result));
               $fetch= mysqli_fetch_array($result);
               if($fetch['user_password']!=md5($old_password))
               { ?>
                    <center>
                        <div class = "container">
                            <div id="banner-content">
                                <h4 style="text-align: center;color: white ;">Sorry!<br><br>You have typed wrong password<br><br><a href="products.php"><u>Click here</u></a> to visit HomePage  </h4>             
                            </div>
                        </div>
                    </center>
               <?php }
               else
               {
                   $new_password = md5($new_password);
                   $query="Update users set user_password='$new_password' where user_email='$email'";
                   $result= mysqli_query($con, $query) or die(mysqli_error($result)); ?>
                   <center>
                        <div class = "container">
                            <div id="banner-content">
                                <h4 style="text-align: center;color: white ;">Done!<br><br>Your password has changed successfully<br><br><a href="products.php"><u>Click here</u></a> to visit HomePage  </h4>             
                            </div>
                        </div>
                    </center>                   
               <?php }               
            }
       } ?>
</body>
</html>