<?php 
     require 'include/common.php';
     #if(!$_SESSION['id'])
      #   header('location:index.php');
?>
<html>
    <head>
        <title>Purchased</title>
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
                  <?php
                $user_id=$_SESSION['id'];                
                $f=$_GET['flag'];
                if($f==0){
                    $cat=$_POST['category'];
                    $min = $_POST['min_price'];
                    $max = $_POST['max_price'];
                    $query = "Select * from items where status='Ongoing' and seller_id!='$user_id' and category='$cat' and max_price BETWEEN '$min' AND '$max'";
                }
                else{
                    $name = $_POST['name'];
                    $query="Select * from items where status='Ongoing' and seller_id!='$user_id' and item_name like '%$name%'";                
                }
                $result= mysqli_query($con, $query);
                if(mysqli_num_rows($result)>0)
                { ?>
                    <br><br><br><br>
                    <table class="table table-striped" style="text-align: center;">  
                    <tbody>
                             <?php
                          while($fetch= mysqli_fetch_array($result))
                         {
                     ?>
                <div class="col-md-3 col-sm-6 home-feature" style="margin-left:7%">
                    <div class="thumbnail">
                        <a href="itemdetails.php?iddd= <?php echo $fetch['item_id'] ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode( $fetch['item_image']); ?>" alt="" style="height:30%;width: 100%;"></a>
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
                        </tbody>
                        </table>
                       
                <?php }
                else{ ?>               
                    <center>
            <div class="container">
            <div id="banner-content">
                <h4 style="text-align: center;color: white ;">Sorry!<br><br>No Result Found<br><br><a href="products.php"><u>Click here</u></a> to purchase any other item  </h4>             
            </div>
            </div>
       </center>
                 <?php
                }
                include 'include/footer.php'
                ?>
                   
                
                
    </body>
</html>