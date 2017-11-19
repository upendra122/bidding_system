<?php 
    require 'include/common.php';
    #if (!isset($_SESSION['email'])) 
           # { header('location: index.php'); }    
?>
<html>
    <head>
        <title>Report</title>
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
                                <h2 style="text-align: center ;margin-bottom: 5%">GENERATE REPORT</h2>
                                <form method="POST" action="generate_script.php" style="text-align: center">
                                    <label style="margin-right: 2%">Select Type Of Report</label>
                                    <select name="report" id="report" style="margin-left: 1%">
                                        <option id="1">Item Sold</option>
                                        <option id="2">Item Bought</option>
                                        <option id="3">History</option>
                                    </select>
                                    <label>Select First Date</label>
                                    <input type="datetime" name="startdate" id="startdate" placeholder="yyyy-mm-dd h:m:s">
                                    <label>Select Last Date</label>
                                    <input type="datetime" name="lastdate" id="lastdate" placeholder="yyyy-mm-dd h:m:s">
                                    <input type="submit" id="reportsubmit" value="GENERATE">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            <br><br><br><br><br><br>
            <?php 
                include 'include/footer.php';
            ?>

    </body>
</html>
