<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
$sql = "SELECT * FROM `detail`";
  

if(isset($_GET['deleteid'])){
    $id = (int)$_GET['deleteid'];

   

    $sql = "DELETE FROM detail WHERE sr_no =$id";

    $result= $conn->query($sql);

    if($result){
        // echo 'deleted successfully';
        header('location: main.php');
    }else{
        die("Error" . $conn->error);
    }
}
?>