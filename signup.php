<?php 
    require 'include/common.php';
?>
<html>
    <head>
        <title>SignUp</title>
           <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        
 </head>
    <body>
        <?php
            include 'include/header.php';
        ?>  
        <div class="container" id="contain">
            <div class="row row_style">
                <div class="col-xs-4 col-xs-offset-4 ">
                        <h2>Sign Up</h2>
                   
                        <form method="POST" action="" id="signup">
                            <div class="form-group">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Name" required="true" >    
                            <div id="msg_name"></div>
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required="true" >    
                                <div id="msg_email" class="msg"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password"  class="form-control" name="password" placeholder="Password " required="true" >
                                <div id="msg_pass" class="msg"></div>
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required="true" >    
                            <div id="msg_mob" class="msg"> </div>
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required="true" >    
                            <div id="msg_add" class="msg"></div>
                            </div>

                            <br>
                            <input type="submit" id="submit"  class="btn btn-primary" name="submit" value="SUBMIT"><br><br>
                        </form>   
                        <div id="invalid"></div>
                        <div id="success"></div>
              </div>
        </div>
        </div>
        <br><br><br><br><br><br>
            <?php 
                include 'include/footer.php';
            ?>
           </body>
</html>
