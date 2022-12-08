 <?php
$servername = "localhost";
$name = "root";
$password = "";
$dbname = "systemdb";

$un = $_POST['username'];
$pw = $_POST['password'];

// Create connection
$conn = mysqli_connect($servername, $name, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM userinfo WHERE username = '$un'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // include "time-in.php";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $name = $row['username'];
    $pass = $row['password'];

    if ($name == $un) {
      // echo "<script>alert('Correct Username');</script>";
         if (password_verify($pw, $pass)){
            // echo "<script>alert('Correct Password');</script>";
            echo "<script>alert('Login Successfuly');</script>";
            header("location:scanQR.php");
          
          }
          else{
            echo "<script>alert('Wrong Password');</script>";
            header("location:sign_in-admin.php");
          }
    }
    else{
      echo "<script>alert('Wrong Username');</script>";
      header("location:sign_in-admin.php");
    }
  }
} else {
  echo "0 results";
}