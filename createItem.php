<?php 
    require 'include/common.php';
    #if (!isset($_SESSION['email'])) 
           # { header('location: index.php'); }    
?>
<html>
    <head>
        <title>create item</title>
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
        <div class="container" id="contain">
            <div class="row row_style">
                <div class="col-xs-4 col-xs-offset-4 ">
                        <h2>Enter Following Details</h2>                   
                        <form method="POST" action="newItem_script.php">
                            <div class="form-group">
                            <b>Item Name</b> : <input type="text" class="form-control" name="item_name" placeholder="Item Name" required="true" >    
                            </div>

                            <div class="form-group" >
                                <b>Category</b> :
                                <select name="category" class="form-control">
                                    <option value="electronic">Electronic</option>
                                    <option value="electrical">Electrical</option>
                                    <option value="stationary">Stationary</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <b>Starting Price</b> :
                                <input type="text" class="form-control" name="start_price" placeholder="default value is set to ₹5">
                            </div>
                            <div class="form-group">
                            <b>Minimum Increment Value</b> : 
                            <input type="text" class="form-control" name="jump_price" placeholder="defualt value is set to ₹3" >    
                            </div>
                            <div class="form-group">
                                <b>Auction Interval</b> :
                                <input type="text" class="form-control" name="interval" placeholder="default value is set to 3 days">
                            </div>
                            <div>
                                <b>Item Image</b> 
                                <input type="file" name="item_image">                                    
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
                        </form>                           
              </div>
        </div>
        </div>
        <br><br><br><br><br><br>
            <?php 
                include 'include/footer.php';
            ?>
           </body>
</html>
