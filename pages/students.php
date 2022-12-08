<?php include "../connection/connection.php";
 ?>
<?php 
$servername = "localhost";
$name = "root";
$password = "";
$dbname = "systemdb";
session_start();
// $local_id = $_SESSION['global_id'];
// Create connection
$conn = mysqli_connect($servername, $name, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// $sql = "SELECT * FROM logs WHERE studentID = '$local_id'";
$sql = "SELECT * FROM logs ";

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
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Student's Attendance Monitoring System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

          .add-button{
            color: ;
            font-size: 30px;
            position: relative;
            top:-60px;
            right: -140px;
          }
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
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
       <!--  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
         <li class="nav-item">
          <a class="nav-link " href="scanQR.php">ScanQR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="students.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign_in-admin.php">Log Out</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
     
    <h2>Students</h2><div class="add-button"><a data-toggle="modal" data-target="#studentaddmodal" ><i class="bi bi-plus-circle-fill"></i></a></div>
        </div>
   <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Guardian</th>
                <th scope="col">Contact #</th>
              </tr>
            </thead>
            <tbody>
<?php 
if(isset($_GET['s_id']) && isset($_GET['s_id']) > 0){

  echo "<script>
        $(document).ready(function () {

              $('#editmodal').modal('show');
        });
    </script>";
 $gID = $_GET['s_id'];  

 $sq = "SELECT * FROM `students` WHERE studentID = $gID";
 $query_exe = mysqli_query($db,$sq);
 if($query_exe)
    {
                   if($row = mysqli_fetch_assoc($query_exe))
                    { 
                        
                    $studentID = $row['studentID'];
                    $temp_fname = $row['firstname'];
                    $temp_mname = $row['middlename'];
                    $temp_lname = $row['lastname'];
                    $temp_gender = $row['gender'];
                    $temp_gname = $row['nameOfguardian'];
                    $temp_contact = $row['cont_of_guardian'];

 }} 

}
 ?>
              <?php 
$sql = "SELECT * FROM `students`";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $eid = $row ['studentID'];
        $fname = $row['firstname'];
        $mname = $row['middlename'];
        $lname= $row['lastname'];
        $gender= $row['gender'];
        $gname= $row['nameOfguardian'];
        $contact = $row['cont_of_guardian'];
      echo '<tr>';
      echo '
                                <td scope="row">'.$eid.'</td>
                                <td>'.$fname.'</td>
                                <td>'.$mname.'</td>
                                <td>'.$lname.'</td>
                                <td>'.$gender.'</td>
                                <td>'.$gname.'</td>
                                <td>'.$contact.'</td>
                                <td>';
                               
                                 
                                 echo "<a href='students.php?s_id=$eid'  class='btn btn-warning editbtn'><i class='bi bi-pencil-square'></i></a>
                                 <button class='btn btn-danger deletebtn '><i class='bi bi-trash2-fill'></i></button>
                                
                                
                              </th>";
                            echo '</tr>';
       
    }
} else {
    echo '
                              <div class="results">No Data Record </div>';
}

?> 
            </tbody>
          </table>
 <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="bi bi-exclamation-diamond"></i> Delete </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="delete.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- end delete modal -->
<!-- delete script -->
 <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
             

            });
        });
    </script>
     <script>  
 $(document).ready(function(){  
      $('#datatableid').DataTable();  
 });  
 </script>  
<!-- end delete script -->
<!-- edit modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- insert title here -->
                    <h5 class="modal-title" id="exampleModalLabel">Add New Student </h5>
                    <!-- header close button -->
                    <button href=<?php unset($_SESSION['s_id']); ?>type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="saveEdit.php" method="POST">

                    <div class="modal-body">
                       <div class="form-group">
                            <label> Student ID </label>
                            <input  readonly oninput="this.value = this.value.toUpperCase()" required type="text" name="sID" class="form-control" placeholder="Enter Student ID" value="<?php echo $_GET['s_id'] ?>">
                        </div>
                        <div class="form-group">
                            <label> First Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="fname" class="form-control" placeholder="Enter First Name" value="<?php if(isset($_GET['s_id']) > 0 ){echo $temp_fname;}?>">
                        </div>
                        <div class="form-group">
                            <label> Middle Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="mname" class="form-control" placeholder="Enter Middle Name" value="<?php if(isset($_GET['s_id']) > 0 ){echo $temp_mname;}?>">
                        </div>
                        <div class="form-group">
                            <label> Last Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="lname" class="form-control" placeholder="Enter Last Name"value="<?php if(isset($_GET['s_id']) > 0 ){echo $temp_lname;}?>">
                        </div>
                        <div class="form-group">
                            <label> Gender </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="gender" class="form-control" placeholder="Enter Gender" value="<?php if(isset($_GET['s_id']) > 0 ){echo $temp_gender;}?>">
                        </div>
                        <div class="form-group">
                            <label> Guardian Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="gname" class="form-control" placeholder="Enter Guardian Name" value="<?php if(isset($_GET['s_id']) > 0 ){echo $temp_gname;}?>">
                        </div>
                         <div class="form-group">
                            <label> Contact Number </label>
                            <input required type="number" name="contact" class="form-control" placeholder="Enter Contact #" value="<?php if(isset($_GET['s_id']) > 0 ){echo $temp_contact;}?>">

                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- end modal -->
<!-- modal area -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- insert title here -->
                    <h5 class="modal-title" id="exampleModalLabel">Add New Student </h5>
                    <!-- header close button -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insert.php" method="POST">

                    <div class="modal-body">
                      <!--  <div class="form-group">
                            <label> Student ID </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="sID" class="form-control" placeholder="Enter Student ID">
                        </div> -->
                        <div class="form-group">
                            <label> First Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="fname" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label> Middle Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="mname" class="form-control" placeholder="Enter Middle Name">
                        </div>
                        <div class="form-group">
                            <label> Last Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                        </div>
                       <!--  <div class="form-group">
                            <label> Student Photo </label>
                            <input required type="file" name="photo" class="form-control" placeholder="Upload Student Photo">
                        </div> -->
                        <div class="form-group">
                            <label> Gender </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="gender" class="form-control" placeholder="Enter Gender">
                        </div>
                        <div class="form-group">
                            <label> Guardian Name </label>
                            <input  oninput="this.value = this.value.toUpperCase()" required type="text" name="gname" class="form-control" placeholder="Enter Guardian Name">
                        </div>
                         <div class="form-group">
                            <label> Contact Number </label>
                            <input required type="number" name="contact" class="form-control" placeholder="Enter Contact #">

                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- end modal -->
    <!-- <a class="btn btn-lg btn-primary" href="QR.php" role="button">MY QR CODE &raquo;</a> -->
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
