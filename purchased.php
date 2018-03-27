<?php 
     require 'include/common.php';
     if(!$_SESSION['id'])
         header('location:index.php');
?>
<html>
    <head>
        <title>Purchased</title>
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
                $user_id=$_SESSION['id'];
                $query="Select * from bid_table where user_id='$user_id'";
                $result= mysqli_query($con, $query);
                ?>
        <table class="table table-striped" style="text-align: center;margin-top: 10%">
                <?php
                if(mysqli_num_rows($result)==0)
                {
                    echo '<tr><td><h3>You have not bid yet on any item</h3></td></tr>';
                }
                else
                {
                ?>
                        <thead>
                        <tr><th style="text-align: center"><h3>ITEM</h3></th><th style="text-align:center"><h3>YOUR BID</h3></th><th style="text-align:center"><h3>STATUS</h3></th></tr>
                        </thead>        
                         <tbody>
                         <?php
                         while($fetch= mysqli_fetch_array($result))
                         {
                             $temp=$fetch['item_id'];
                             $query2="Select * from items where item_id='$temp'";
                             
                              $result2= mysqli_query($con, $query2);
                             $fetch2=mysqli_fetch_array($result2);
                             $status;
                             if($fetch2['status']=='Complete' && $fetch2['buyer_id']==$_SESSION['id'])
                             {
                                 $status='YOU WON';
                             }
                             else
                             {
                                 $status=$fetch2['status'];
                             }
                              if(mysqli_num_rows($result2)>0)
                        {
                          ?>
                             <tr><td style="width:30%"><a href="itemdetails.php?iddd= <?php echo $fetch['item_id'] ?>"><img style="width:30%; height:30%" src="data:image/jpeg;base64,<?php echo base64_encode( $fetch2['item_image']); ?>" style="height:14%;width:40% "/></a></td><td><h3><?php echo $fetch['price']?> Rupees</h3></td><td><h3><?php echo $status?></h3></td></tr>
                         <?php
                             }
                         }
                         ?>
                        </tbody>
                <?php
                }
                ?>
                </table>   
                <hr>
                
    </body>
</html>