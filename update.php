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


$srno = $_GET['updateid'];
$sql = "select * from `detail` where sr_no='$srno'";
$result = mysqli_query($conn, $sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $emailid=$row['emailid'];
    $phonenumber=$row['phonenumber'];


}


if(isset($_POST['submit'] )){
    $firstname=$_POST['firstname'];
    $lastname= $_POST['lastname'];
    $emailid=$_POST['emailid'];
    $phonenumber=$_POST['phonenumber'];

    $sql = "UPDATE `detail` SET firstname='$firstname', lastname='$lastname', emailid='$emailid', phonenumber='$phonenumber' WHERE sr_no='$srno'";

   // $result = mysqli_query($conn, $sql);
  $result= $conn->query($sql);
    if($result){
        echo 'data inserted succefully';
      header('location: main.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="">Users</h1>
        <form method="post">
  <div class="mb-3">
    <label for="firstname" class="form-label">FirstName</label>
    <input type="text" class="form-control" id="firstname" aria-describedby="firstname" name="firstname" value="<?php echo $firstname;?>">

  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">LastName</label>
    <input type="text" class="form-control" id="lastname" aria-describedby="lastname" name="lastname" value="<?php echo $lastname;?>">

  </div>
  <div class="mb-3">
    <label for="emailid" class="form-label">EmailId</label>
    <input type="email" class="form-control" id="emailid" name="emailid" value="<?php echo $emailid ?>">
  </div>
  <div class="mb-3">
    <label for="phonenumber" class="form-label">PhoneNumber</label>
    <input type="number" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>