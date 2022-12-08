 <?php
$servername = "localhost";
$name = "root";
$password = "";
$dbname = "systemdb";

$fn = $_POST['username'];
$pw = $_POST['password'];

// Create connection
$conn = mysqli_connect($servername, $name, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students WHERE lastname = '$fn'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // include "time-in.php";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     $studentID = $row["studentID"];
    $fname = $row["firstname"];
    $mname = $row["middlename"];
    $lname = $row["lastname"];
    $student_pw = $row['student_password'];

    if ($lname == $fn) {
      // echo "<script>alert('Correct Username');</script>";
         if (password_verify($pw,$student_pw)){
            // echo "<script>alert('Correct Password');</script>";
            echo "<script>alert('Login Successfuly');</script>";
            session_start();
            $_SESSION['global_id'] = $studentID;
            header("location:logs.php");
          
          }
          else{
            echo "<script>alert('Wrong Password');</script>";
            header("location:sign_in-student.php");
          }
    }
    else{
      echo "<script>alert('Wrong Username');</script>";
      echo $fn;
      // header("location:sign_in-student.php");
    }
  }
} else {
  echo "0 results";
}