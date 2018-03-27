<?php
    require 'include/common.php';
     #if (!isset($_SESSION['email'])) 
      #      { header('location: index.php'); }
   

?>
<html>
    <head>
        <title>success</title>
           <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
 </head>
    <body>        
      <?php 
      require 'include/header.php';
      ?>
        <center>
            <div class="container">
                <?php 
                    $from = $_GET['from'];
                    if($from==1){ ?>
                        <div id="banner-content">
                            <h4 style="text-align: center;color: white ;">Your Items are now ready for bidding<br><br>Thank you for being with us<br><br><a href="products.php"><u>Click here</u></a> to purchase any other item  </h4>             
                        </div>
                    <?php } else{ ?>
                        <div id="banner-content">
                            <h4 style="text-align: center;color: white ;">Your Order is confirmed<br><br>Thank you for shopping with us<br><br><a href="products.php"><u>Click here</u></a> to purchase any other item  </h4>             
                        </div>
                    <?php } ?>
            </div>
       </center>             
        <div align="bottom">
            <?php 
                  require  'include/footer.php';
            ?>           
        </div>
    </body>
</html>
