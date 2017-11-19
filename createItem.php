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
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <br><br><br><br>
                                <center>
                                    <h4>Feed Items Information From CSV File  </h4>
                                    <a data-toggle="modal" data-target="#direction"><span class="glyphicon glyphicon glyphicon-pencil"></span>formate of file</a>
                                    <br><br><br>
                                    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="form-group">
                                                   <input type="file" name="file" id="file" class="input-large">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                                            </div>
                                    </form>                                    
                                </center>
                            </td>
                            <td>
                                <h2 style = "text-align: center;">Enter Following Details</h2>
                                <form method="POST" action="newItem_script.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <b>Item Name</b> : <input type="text" class="form-control" name="item_name" placeholder="Item Name" required="true" >    
                                    </div>
                                    <div class="form-group" >
                                        <b>Category</b> :
                                        <select name="category" class="form-control">
                                            <option value="Electronic">Electronic</option>
                                            <option value="Appliances">Appliances</option>
                                            <option value="stationary">Stationary</option>
                                            <option value="Clothes">Clothes</option>
                                            <option value="Book">Book</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Item Description:</label>
                                        <textarea class="form-control" rows="5" name="description"></textarea>
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
                                        <input type="file" name="item_image" id = "item_image">                                    
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
                                </form>
                            </td>
                        </tr>                           
                    </tbody>
                </table>
              </div>
              <br><br><br><br><br><br>
              <div class="container">
                <div class="modal fade" id="direction" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4>formate of file</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th>
                                                    Coloumn
                                                </th>
                                                <th>
                                                    Entry
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Item Name</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Base Price</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Increment value</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Interval</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Item Description</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Item Category</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Item Image</td>
                                            </tr>
                                        </tbody>>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
            <?php 
                include 'include/footer.php';
            ?>
    </body>
</html>
