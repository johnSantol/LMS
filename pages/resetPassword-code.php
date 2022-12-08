<?php 
session_start();
$old = $_POST['oldpassword'];
$new = $_POST['npassword'];
$cnew = $_POST['cnpassword'];

if ($new == $cnew) {
	$newpass = password_hash($new, PASSWORD_BCRYPT);
}
else{
	header("location:resetPassword.php");
}
$local_id = $_Session['global_id'];
 ?>
<?php 
 $sql = "SELECT * FROM students WHERE studentID = '$local_id'";
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

    if (password_verify($old,$student_pw)) {
      // echo "<script>alert('Correct Username');</script>";
         if (password_verify($pw,$student_pw)){
            // echo "<script>alert('Correct Password');</script>";
            // echo "<script>alert('Login Successfuly');</script>";
            // // session_start();
            // // $_SESSION['global_id'] = $studentID;
            // header("location:logs.php");
            $sql1 = "UPDATE students SET student_pw ='$new' WHERE studentID = '$stud_ID'";

if (mysqli_query($conn, $sql1)) {
  echo "New record created successfully";
  header("location:logs.php")
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
          
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
?>