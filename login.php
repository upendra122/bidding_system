<?php 
    require 'include/common.php';
?>
<html>
    <head>
        <title>Login</title>
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
        <div class="container-fluid dcore_bg" id="login-panel" style="padding-top: 75px">
            <div class="row ">
                <div class="col-md-4 col-md-offset-4 ">
                    
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Login</h3>
                    </div>
                    <div class="panel-body">
                    <p class="text-warning">Login to make a purchase</p><br>
                    <form method="POST" action="login_submit.php">
                        <div class="form-group">
                            Email:
                        <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">    
                        </div>
                        <div class="form-group">
                            Password:
                        <input type="password" class="form-control" name="password" placeholder="password " required="true">
                        </div><br>
                        <button type="submit" class="btn btn-primary" name="submit">Login</button><br><br>
                    </form>
                        <div class="panel-footer">
                            <p> Don't have an account ?<a href="signup.php">Register</a></p>
                            </div>
                   
                    </div>
                </div>
        </div>     
        </div>
        </div>
        <br><br><br><br><br>
        <?php 
            include 'include/footer.php';
        ?>
           </body>
</html>
