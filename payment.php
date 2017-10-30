<?php 
    require 'include/common.php';
    #if (!isset($_SESSION['email'])) 
           # { header('location: index.php'); }    
?>
<html>
    <head>
        <title>payment</title>
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
                        <h2>Enter Bank Details Details</h2>                   
                        <form method="POST" action="newItem_script.php">
                            <div class="form-group" >
                                <b>Bank</b> :
                                <select name="category" class="form-control">
                                    <option value="sbi">SBI</option>
                                    <option value="pnb">PNB</option>
                                    <option value="boi">BOI</option>
                                    <option value="icici">ICICI</option>
                                    <option value="canera">Canera</option>
                                    <option value="syndicate">Syndicate</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <b>Card Type :</b> :
                                <input type="radio"  name="type">  Debit Card
                                <input type="radio"  name="type">  Credit Card
                            </div>
                            <div class="form-group">
                                <b>Card No.</b> :
                                <input type="text" class="form-control" name="card_no">
                            </div>
                            
                            <div class="form-group">
                            <b>please enter the otp<b> : 
                            <input type="text" class="form-control" name="otp" >    
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
