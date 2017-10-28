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
                   
                        <form method="POST" action="signup_script.php">
                            <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="true" >    
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">    

                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password " required="true" pattern="{6,}">

                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control" name="contact" placeholder="Contact" required="true" >    
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="true" >    
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
