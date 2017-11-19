<?php 
     require 'include/common.php';
?>
<html>
    <head>
        <title>Item's Detail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/timer.js"> </script>
 </head>
    <body>
        <?php 
            require 'include/header.php';
        ?>
        <?php
                $idd=$_GET['iddd'];
                $user_id=$_SESSION['id'];
                $query="select * from items where item_id='$idd'";
                $result= mysqli_query($con, $query);
                $fetch= mysqli_fetch_array($result);
                $userid=$fetch['seller_id'];
                $query2="select * from  users where user_id='$userid'";
                $result2= mysqli_query($con, $query2);
                $fetch2= mysqli_fetch_array($result2);
                if($fetch['status']=='Complete' && $fetch['buyer_id']!=NULL)
                {
                    $item_status='SOLD';
                }
                else
                    $item_status='NOT SOLD';
                  $query3="SELECT t.start_time, DATE_ADD(t.start_time, INTERVAL t.interval_time DAY) as p,seller_id FROM items t where item_id='$idd'";
                             $result3= mysqli_query($con, $query3);
                             $fetch3= mysqli_fetch_array($result3); 
                           
                ?>
        <div class="col-md-3 col-sm-6 home-feature" id="itemimage" ><img src="data:image/jpeg;base64,<?php echo base64_encode( $fetch['item_image']); ?>" style="height:100%;width:100% "/>
        </div>
                
        <div class="col-md-3 col-sm-6 home-feature" id="itemdescription">
            <table class="table table-striped" style="text-align: center;">
                <thead ><h2 style="text-align:center">ITEM DETAILS</h2></thead>
                <tbody>
                <tr><td style="color:grey;text-align: left" ><b>Item Name</b></td><td style="text-align: left"><?php echo $fetch['item_name']?></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Item Id</b></td><td style="text-align: left"><?php echo $fetch['item_id']?></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Seller's Name</b></td><td style="text-align: left"><?php echo $fetch2['user_name']?></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Seller's Contact</b></td><td style="text-align: left"><?php echo $fetch2['user_contact']?></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Present Max Bid</b></td><td style="text-align: left"><?php echo $fetch['max_price']?></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Description</b></td><td style="text-align: left"><p><?php echo $fetch['item_descp']?></p></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Base Price</b></td><td style="text-align: left"><p><?php echo $fetch['base_price']?></p></td></tr>
                <tr><td style="color:grey;text-align: left"><b>End Time</b></td><td style="text-align: left" id="timeleft"><p><script>timerr("<?php echo $fetch3['p'] ?>")</script></p></td></tr>
                <tr><td style="color:grey;text-align: left"><b>Item Status</b></td><td style="text-align: left"><p><?php echo "$item_status" ?></p></td></tr>
                </tbody>
            </table>
            <?php  
            if($fetch3['p']>=date('Y-m-d H:i:s') )
            {
              if( $fetch3['seller_id']!=$user_id)
              {
            ?>
            <form method="POST" action="bid_script.php" style="margin-bottom: 50%">
                <div class="form-group">
                    <lable style="color:grey;"><h3>Place Your Bid</h3></lable>
                    <?php
                    if($fetch['max_price']==NULL)
                    $current_bid= $fetch['base_price'];
                    $current_bid= $fetch['max_price']+$fetch['increment_price'];
                    print '<select name="bid_price" id="bid_price">';
                   $i=0;
                   $_SESSION['c_item']=$idd;
                    for($i;$i<100;$i++)
                    {
                        
                         print '<option value="'.$current_bid.'">'.$current_bid.'</option>';
                         $current_bid= $current_bid+$fetch['increment_price'];
                    }
                     print '</select>'
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Confirm Bid">
            </form>
            <?php }
            }
            else
            {
                $queryt="update  items set status='Complete'  where item_id='$idd'";
                $resultt= mysqli_query($con, $queryt);
            }
            ?>
        </div>
                
             <?php 
            include 'include/footer.php';
        ?>
   
    </body>
</html>
