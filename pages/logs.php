<?php 
$servername = "localhost";
$name = "root";
$password = "";
$dbname = "systemdb";
session_start();
$local_id = $_SESSION['global_id'];
// Create connection
$conn = mysqli_connect($servername, $name, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM logs WHERE studentID = '$local_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // include "time-in.php";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     $studentID = $row["studentID"];
    $in = $row["TimeIn"];
    $out = $row["TimeOut"];
    $logID = $row["LogID"];
  }
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Team JuanBayabas">
    <meta name="LMS" content="LMS">
    <title>Library Management System</title>

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
    <a class="navbar-brand" href="#">LMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
       <!--  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Logs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resetPassword.php">Reset Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign_in-student.php">Log Out</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h2>DAILY LOG</h2>
    <?php 
      
    ?>
    <table class="table">
      <thead>
       <!--  <th>Day</th>
        <th>Date</th> -->
        <th>Time In</th>
        <th>Time Out</th>
      </thead>
      <tr>
        <td><?php if(isset($in)){echo $in;} ?></td>
        <td><?php if(isset($out)){echo $in;} ?></td>
        <!-- <td>07:50 PM</td>
        <td>07:54 PM</td> -->
      </tr>
      
    </table>
    
    <a class="btn btn-lg btn-primary" href="QR.php" role="button">MY QR CODE &raquo;</a>
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
