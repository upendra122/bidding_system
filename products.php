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
         <script type="text/javascript" src="js/timer.js"></script>
       
    </head
 >
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
                        <tr><th style="text-align: center"><h3>ITEM</h3></th><th style="text-align:center"><h3>YOUR BID</h3></th><th style="text-align:center"><h3>PRESENT MAX BID</h3></th></tr>
                        </thead>        
                           
                         <tbody>
                         <?php
                         while($fetch= mysqli_fetch_array($result))
                         {
                             $temp=$fetch['item_id'];
                             $query2="Select * from items where item_id='$temp' and status='Ongoing'";
                              $result2= mysqli_query($con, $query2);
                             $fetch2=mysqli_fetch_array($result2);
                             
                             $query3="SELECT t.start_time, DATE_ADD(t.start_time, INTERVAL t.interval_time DAY) as p FROM items t where item_id='$temp'";
                             $result3= mysqli_query($con, $query3);
                             $fetch3= mysqli_fetch_array($result3); 
                             if(mysqli_num_rows($result2)>0)
                        {
                          ?>
                             <tr><td style="width:30%"><a href="itemdetails.php?iddd= <?php echo $fetch['item_id'] ?>"><img style="width:30%; height:30%" src="data:image/jpeg;base64,<?php echo base64_encode( $fetch2['item_image']); ?>" style="height:14%;width:40% "/></a></td><td><h3><?php echo $fetch['price']?> Rupees</h3></td><td  ><b    ><h3><?php echo $fetch2['max_price']?> Rupees</h3></b></td></tr>
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
                        <tr><th style="text-align: center"><h3>ITEM</h3></th><th style="text-align:center"><h3>YOUR BID</h3></th><th style="text-align:center"><h3></h3></th></tr>
                       
                        </thead>        
                         <tbody>
                         <?php
                         while($fetch= mysqli_fetch_array($result))
                         {
                          ?>
                             <tr><td style="width:30%"><br><a href="itemdetails.php?iddd= <?php echo $fetch['item_id'] ?>"><img style="width:30%; height:30%" src="data:image/jpeg;base64,<?php echo base64_encode( $fetch['item_image']); ?>" style="height:14%;width:40% "/></a></td><td><h3></h3><br><h3><?php echo $fetch['price']?> Rupees</h3></td>
                                 <td><h3>Congratulation You Won</h3> <a href="success.php?from=0"><br> <h4>Place Your Order</h4></a></td></tr>
                         <?php
                             }
                         ?>
                        </tbody>
                <?php
                }
                ?>
                </table>  
            <hr>
                 <div class="row text-center" id="item">
                     <?php
                        $queryt="Select * from items where status='Ongoing' and seller_id!='$user_id'";
                        $result= mysqli_query($con, $queryt);
                         while($fetch= mysqli_fetch_array($result))
                         {
                     ?>
                <div class="col-md-3 col-sm-6 home-feature" style="margin-left:7%">
                    <div class="thumbnail" >
                        <a href="itemdetails.php?iddd= <?php echo $fetch['item_id'] ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode( $fetch['item_image']); ?>" alt="image not available" style="height:30%;width: 100%;"></a>
                        <div class="caption">
                            <h3><?php echo $fetch['item_name'] ?> </h3>
                            <p> <b>Max Bid: Rs. <?php echo $fetch['max_price']?> </b></p>
                        <?php if (!isset($_SESSION['id'])) { ?>
                            <p><a href="login.php" role="button" class="btn btn-primary btn-block">Bid Now</a></p> 
                                <?php } else 
                                    {
                                        ?> 
                            <a href="itemdetails.php?iddd= <?php echo $fetch['item_id'] ?>" name="add" value="add" class="btn btn-block btn-primary">Bid Now</a> 
                                <?php }  ?>    
                        </div>
                    </div>
                </div>
                     <?php
                     }
                     ?>
                     </div>
        <br><br><br><br><br>
        <?php 
        include 'include/footer.php';
        ?>
           </body>
</html>
