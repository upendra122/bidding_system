<?php 
    require 'functions.php';
    $file = $_POST['file_name'];
    $data = array();
    $data = tdl_to_array($file);
    print_r($data);
    $data[0] = "hello";
    $data[1] = 'brother';
    print_r($data);
    $table = "items";
    array_to_sql($data,$table);
    //header('location: success.php?from = 1');
?>