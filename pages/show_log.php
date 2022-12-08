<?php 
include "../connection/connection.php";

$ID = $_POST['text'];
// $ID = 11;

?>
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systemdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students WHERE studentID = $ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     $studentID = $row["studentID"];
    $fname = $row["firstname"];
    $mname = $row["middlename"];
    $lname = $row["lastname"];
  }
} else {
  echo "0 results";
}
// get students data
$sql12 = "SELECT * FROM scanstatus WHERE studentID = $ID";
$result12 = mysqli_query($conn, $sql12);

if (mysqli_num_rows($result12) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $stats1 = $row['status']; 
  }
} else {
  // echo "0 results";
}

$sql = "SELECT * FROM logs WHERE studentID = $ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $studentID = $row["studentID"];
    $timeIn = $row["TimeIn"];
    $timeOut = $row["TimeOut"];
  }
} else {
  // echo "0 results";
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Student's Attendance Monitoring System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
     <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SAMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      
    </div>
  </div>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1><?php echo $fname." ".$mname." ". $lname; ?></h1><br> <br>  
    <!-- <h2>JOHN HENRY B. LIWAG</h2><br><br> -->
    <svg style="position: relative;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-app" viewBox="0 0 16 16">
  <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z"/>
</svg>

<h2 style="position: relative; top: -40px; left: 35px;">TIME IN</h2> 
<h2 style="position:absolute; top: 210px; left: 800px;" ><?php if(isset($timeIn) && isset($stats1) && $stats1=="IN"){echo $timeIn;} ?></h2>
<h2 style="position:absolute; top: 210px; left: 800px;" ><?php echo $timeIn; ?></h2>

    <svg style="position: relative;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-app" viewBox="0 0 16 16">
  <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z"/>
</svg>

<h2 style="position: relative; top: -40px; left: 35px;">TIME OUT</h2>

<h2 style="position:absolute; top: 300px; left: 800px;" ><?php if(isset($timeOut) && isset($stats1) && $stats1=="OUT"){echo $timeOut;} ?></h2>
<h2 style="position:absolute; top: 300px; left: 800px;" ><?php echo $timeOut; ?></h2>
   
   <!--  -->
   <script >
     setTimeout(function(){
//   // alert("Sup!"); 
  window.open("scanQR.php");
}, 3000);
   </script>
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
