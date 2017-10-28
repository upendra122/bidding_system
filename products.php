<?php 
require 'include/common.php';
if (!isset($_SESSION['id'])) 
            { header('location: login.php'); }   
?>
<html>
    <head>
        <title>Product</title>
           <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
 </head>
    <body>
        <?php 
        include 'include/header.php';
        
        ?>
            <div class="container" id="content">
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to Bidding Portal!</h1>
                <p>You have item to sell sell here You are great at bidding bid here</p>
            </div>
            <hr>
            </div>
                <?php
                $user_id=$_SESSION['id'];
                $query="Select * from bid_table where user_id='$user_id'";
                $result= mysqli_query($con, $query);
                ?>
        <table class="table table-striped" style="text-align: center;">
                <?php
                if(mysqli_num_rows($result)==0)
                {
                    echo '<tr><td><h3>You have not bid yet on any item</h3></td></tr>';
                }
                else
                {
                ?>
                        <thead>
                        </thead>        
                         <tbody>
                         <?php
                         while($fetch= mysqli_fetch_array($result))
                         {
                             $temp=$fetch['item_id'];
                             $query2="Select * from items where item_id='$temp' and status='Ongoing'";
                              $result2= mysqli_query($con, $query2);
                             $fetch2=mysqli_fetch_array($result2);
                              if(mysqli_num_rows($result2)>0)
                        {
                          ?>
                             <tr><td style="width:30%">Item<br><img src="data:image/jpeg;base64,<?php echo base64_encode( $fetch2['item_image']); ?>" style="height:14%;width:40% "/></td><td><h3>Your bid<h3><br><h3><?php echo $fetch['price']?> Rupees</h3></td><td>Time Left</td></tr>
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
                <?php
                $query="Select * from items as i,bid_table as b where status='Complete' and max_price=price and user_id='$user_id' and i.item_id=b.item_id";
                $result= mysqli_query($con, $query);
                ?>
                <table class="table table-striped" style="text-align: center;">
                <?php
                if(mysqli_num_rows($result)==0)
                {
                    echo '<tr><td><h3>You have not won any bid yet</h3></td></tr>';
                }
                else
                {
                ?>
                        <thead>
                        </thead>        
                         <tbody>
                         <?php
                         while($fetch= mysqli_fetch_array($result))
                         {
                          ?>
                             <tr><td style="width:30%">Item<br><img src="data:image/jpeg;base64,<?php echo base64_encode( $fetch['item_image']); ?>" style="height:14%;width:40% "/></td><td><h3>Your bid<h3><br><h3><?php echo $fetch['price']?> Rupees</h3></td>
                       <td><h3>Congratulation You Won</h3> <a href=""><br> <h4>Place Your Order</h4></a></td></tr>
                         <?php
                             }
                         ?>
                        </tbody>
                <?php
                }
                ?>
                </table>  
            <hr>
        </div>        
        <br><br><br><br><br>
        <?php 
        include 'include/footer.php';
        ?>
           </body>
</html>
