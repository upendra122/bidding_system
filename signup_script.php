<?php 
    require 'include/common.php';
    $email=$_POST['email'];
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
    if(!preg_match($pattern, $email))
    {
        echo "<span id='invalid'>Invalid email</span>";
    }
    $password=$_POST['password'];
    if(strlen($password)<6)
    {
        echo "<span id='invalid'>Password should have atleast six character</span>";
    }
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=mysqli_real_escape_string($con,$email);
    $password= mysqli_real_escape_string($con,$password);
    $name=mysqli_real_escape_string($con,$name);
    $address=mysqli_real_escape_string($con,$address);
    $contact=mysqli_real_escape_string($con,$contact);
    $password=md5($password);
    $query = "SELECT * FROM users where user_email='$email'";
    $result = mysqli_query($con,$query);
    $row= mysqli_num_rows($result);
    if($row>0)
    {
            echo "<span id='invalid'>Email already exist</span>";
    }
    else
    {
        $query2="INSERT INTO users(user_name,user_email,user_password,user_contact,user_address) values ('$name','$email','$password','$contact','$address')";
        $result= mysqli_query($con,$query2);
         echo "<span id='success'><b>Registration Successful</b><br><a href='login.php'>Login Now</a></span>";
    }   
?>