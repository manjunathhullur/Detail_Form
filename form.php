<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "form";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  

  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $emailid = $_POST["emailid"];
  $phonenumber = $_POST["phonenumber"];
  

 /* $firstname = mysqli_real_escape_string($conn, $firstname);
  $lastname = mysqli_real_escape_string($conn, $lastname);
  $emailid = mysqli_real_escape_string($conn, $emailid);
  $phonenumber = mysqli_real_escape_int($conn, $phonenumber);*/
  
  $sql = "INSERT INTO detail (firstname, lastname, emailid, phonenumber) VALUES ('$firstname', '$lastname', '$emailid', '$phonenumber')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('location: main.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>