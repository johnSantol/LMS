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

$event_dt = date('Y-m-d h:i:s');
$sql = "INSERT INTO logs ( studentID, TimeOut)
VALUES ( '$ID', '$event_dt')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    
mysqli_close($conn);

 ?>