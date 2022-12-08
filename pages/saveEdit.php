<?php
session_start();



include "../connection/connection.php";

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

  $ID = $_POST['sID'];
  $first = trim($_POST['fname']);
  $middle = trim($_POST['mname']);
  $last = trim($_POST['lname']);
  $gend = trim($_POST['gender']);
  $guardian = trim($_POST['gname']);
  $number = trim($_POST['contact']);


$sql = "UPDATE `students` SET `firstname`='$first', `middlename`='$middle',`lastname`='$last',`gender`='$gend',`nameOfguardian`='$guardian',`cont_of_guardian`='$number' WHERE `studentID` = '$ID'";
$result = mysqli_query($db, $sql);

if (mysqli_query($db, $sql)) {

//   echo "Record updated Successfully";
  header("location:students.php");
}
else{
  echo 'not saved';
}
 
?>
