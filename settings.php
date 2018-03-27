<?php 
    require 'include/common.php';
      if (!isset($_SESSION['email'])) 
            { header('location:index.php'); }
 
?>
<html>
    <head>
        <title>setting</title>
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
                        <h2>Change Password</h2>
                   
                        <form method="POST" action="setting_script.php">
                        <div class="form-group">
                        <input type="password" class="form-control" name="old_password" placeholder="Old password" required="true" >    
                        </div>
                        
                        <div class="form-group">
                       
                            <input type="password" class="form-control" name="new_password" placeholder="New password" required="true" >    
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" name="re_new_password" placeholder="Re-type New Password " required="true">
                        </div>
                         <br>
                        <button type="submit" class="btn btn-primary" name="submit">Change</button><br><br>
                                          </form>
                    
              </div>
        </div>
        </div>
        <div style="margin-top: 250px">
        <?php 
            include 'include/footer.php' ;
        ?>
    </div>      
    </body>
</html>
