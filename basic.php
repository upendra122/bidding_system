<?php 
     require 'include/common.php';
     if(!$_SESSION['id'])
         header('location:index.php');
?>
<html>
    <head>
        <title>Item's Detail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 </head>
    <body>
        <?php 
            include 'include/header.php';
        ?>
        <?php
            $id=$_SESSION['id'];
            $query="select * from users where user_id='$id'";
            $result= mysqli_query($con,$query);
            $fetch= mysqli_fetch_array($result);
        ?>
                
        <div class="col-md-6 col-sm-6 home-feature" id="basic">
            <table class="table table-striped" style="text-align: center;">
                <thead ><h2 style="text-align:center">USER DETAILS</h2></thead>
                <tbody>
                <tr><td style="color:grey;text-align:left;  "><b>USER ID</b></td><td style="float:left"><?php echo $fetch['user_id']?></td></tr>
                <tr><td style="color:grey;text-align: left;"><b>USER NAME</b></td><td style="float:left"><?php echo $fetch['user_name']?></td></tr>
                <tr><td style="color:grey;text-align: left;"><b>USER EMAIL</b></td><td style="float:left"><?php echo $fetch['user_email']?></td></tr>
                <tr><td style="color:grey;text-align: left;"><b>USER CONTACT</b></td><td style="float:left"><?php echo $fetch['user_contact']?></td></tr>
                <tr><td><a href="settings.php">click here </a>to change password</td></tr>
                </tbody>
                
            </table>
            
        </div>
