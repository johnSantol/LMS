<?php
include 'connection/connection.php';
    $srcode=$_POST['srcode'];
    $fullname=$_POST['fullname'];
    $status = "ONLINE";
    // $phone=$_POST['phone'];
    // $city=$_POST['city'];
    $sql = "INSERT INTO `libraryvisitors`(`SR_Code`, `Fullname`, `Status`) VALUES ('$srcode','$fullname','$status')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
    } 
    else {
        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
?>
