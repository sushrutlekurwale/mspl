<?php
 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];

 $conn = new mysqli("localhost","root","","contactus");
 if($conn->connect_error){
    die('Connection failed:'.$conn->connect_error);
  }
 else{
    $stmt= $conn->prepare("INSERT INTO form(name,email,subject,message)VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    echo "Form submitted successfully! We will contact you soon! Thank you!";
    $stmt->close();
    $conn->close();
 }


?>
