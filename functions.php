<?php
 include 'include/common.php';
 
 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
                $user_id = $_SESSION['id'];
 
		 if($_FILES["file"]["size"] > 0)
		 {
                    $file = fopen($filename, "r");
                    while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                    {      
                        //$f = $_FILES[$getData[6]]["tmp_name"];
                        $image = addslashes($getData[6]);
                       $sql = "INSERT into items (item_name,base_price,max_price,increment_price,interval_time,item_descp,category,item_image,seller_id,status) 
                       values ('$getData[0]','$getData[1]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]','$getData[6]','$user_id','Ongoing')";
                       $result = mysqli_query($con, $sql) or die(mysqli_errno($result));
                                    if(!isset($result))
                                    {
                                            echo "<script type=\"text/javascript\">
                                                            alert(\"Invalid File:Please Upload CSV File.\");
                                                            window.location = \"index.php\"
                                                      </script>";		
                                    }
                                    else {
                                              echo "<script type=\"text/javascript\">
                                                    alert(\"CSV File has been successfully Imported.\");
                                                    window.location = \"index.php\"
                                            </script>";
                                    }
                     }			
                    fclose($file);	
		 }
        }
 ?>