<?php
echo '

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
   
<h2 class="text-center my-3">Details</h2>
<a href="index.html" class="btn btn-primary">Add Details</a>
   <table class="table table-striped my-3">

  <thead>
    <tr>   
    <th scope="col">Sr_no</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">emailid</th>
      <th scope="col">PhoneNumber</th>
    </tr>
  </thead>
  <tbody>';

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "form";

  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
$sql = "SELECT * FROM `detail`";


$result = mysqli_query($conn, $sql);

if($result){
   while ($row = mysqli_fetch_assoc($result)) {
    $srno=$row['sr_no'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $emailid=$row['emailid'];
    $phonenumber=$row['phonenumber'];

    echo '
    <tr>
      <th scope="row">'.$srno.'</th>
      <td>'.$firstname.'</td>
      <td>'.$lastname.'</td>
      <td>'.$emailid.'</td>
      <td>'.$phonenumber.'</td>
      <td> <a href="delete.php?deleteid='.$srno.'" class="btn btn-danger">Delete</a>
      <a href="update.php?updateid='.$srno.'"  class="btn btn-primary">Update</a></td>
    </tr>';
    

  }
   echo'
   </tbody>
</table></div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 </body>
</html> ';
    
}


  ?>



   
 