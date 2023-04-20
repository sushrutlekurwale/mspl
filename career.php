<?php
 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $age = $_POST['age'];
 $yearsofexperience = $_POST['yearsofexperience'];
 $field = $_POST['field'];
 $organization = $_POST['organization'];
 $introduction = $_POST['introduction'];

 $conn = new mysqli("localhost","root","","contactus");
 if($conn->connect_error){
    die('Connection failed:'.$conn->connect_error);
  }
 else{
    $stmt= $conn->prepare("INSERT INTO careers(name,email,phone,age,yearsofexperience,field,organization,introduction)VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiisss", $name, $email, $phone, $age, $yearsofexperience, $field, $organization, $introduction);
    $stmt->execute();
    echo "Your application is submitted successfully! Our HR team will contact you soon to convey the information about further interview process! Thank you!";
    $stmt->close();
    $conn->close();
 }


?>
