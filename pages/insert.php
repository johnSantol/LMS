<?php
session_start();
include "../connection/connection.php";

$uid = $_SESSION['uid'];


if(isset($_POST['insertdata']))
{
    // $title = 'sample';
    $sID = $_POST['sID'];
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
     $lastname = $_POST['lname'];
      $gender = $_POST['gender'];
       $guardian = $_POST['gname'];
        $contact = $_POST['contact'];
        // $student_password = $_POST['student_password'];
        $student_password_hash = password_hash($middlename, PASSWORD_BCRYPT);

    $query = "INSERT INTO students (`studentID`, `firstname`,`middlename`,`lastname`,`gender`,`nameOfguardian`, `cont_of_guardian`, `student_password`) VALUES ('$sID','$firstname','$middlename','$lastname','$gender','$guardian','$contact', '$student_password_hash');";
    $query_run = mysqli_query($db, $query);


    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: students.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
