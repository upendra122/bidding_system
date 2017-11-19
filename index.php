<?php 
    require 'include/common.php';
?>
<?php 
    if (isset($_SESSION['id'])) { header('location: products.php'); }
?>
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
            include 'include/header.php';
        ?>
        <div id="content">
            <div  id="banner-image">
                <center>
                    <div class="container">
                        <div id="banner-content">
                                  <h1>Bidding Portal</h1>
                                        <p>Ab Sab Kuch Bikega</p>
                            <a href="products.php" class="btn btn-danger btn-lg active">
                            Start Trading    
                          </a>    
                        </div>
                    </div>
                </center>
            </div>
        </div>      
        <?php
            include 'include/footer.php';
        ?>
    </body>
</html>
