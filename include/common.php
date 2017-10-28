<?php 
$con= mysqli_connect("localhost", "root", "", "bidding_system") or die(mysqli_errno($con));
if(!isset($_SESSION))
session_start();
?>