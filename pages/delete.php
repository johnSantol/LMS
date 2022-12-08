<?php
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection, 'timemanagement2');
include "../connection/connection.php";


if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM `students` WHERE studentID='$id'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
//         echo '<script> alert("Data Deleted"); </script>';
        header("Location:students.php");
    }
    else
    {
//         echo '<script> alert("Data Not Deleted"); </script>';
        header("Location:students.php");
    }
}

?>
