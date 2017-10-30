<?php 
    require 'include/common.php';
    #if (!isset($_SESSION['email'])) 
    #{ header('location: index.php'); }    
?>
html>
    <head>
        <title>Cart</title>
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
      $name=$_POST['item_name'];
      $cat=$_POST['category'];
      $price=$_POST['start_price'];
      $jump=$_POST['jump_price'];    
      $interval = $_POST['interval'];
      $image = $_POST['item_image'];
      $query="INSERT INTO items(item_name,category,price,jump_price,interval,item_image) values ('$name','$cat','$price','$jump','$interval','$image')";
      $result= mysqli_query($con,$query);
      ?>
        <center>
            <div class="container">
            <div id="banner-content">
                <h4 style="text-align: center;color: white ;">Your item is successfully added for auction.<br><br>Thank you for being with us<br></br><a href="products.php"><u>Click here</u></a> for purchase more items.</h4>             
            </div>
       </center>         
            </div>  
        <div align="bottom">
            <?php 
                include 'include/footer.php';
            ?>
           </body>
        </div>
</html>