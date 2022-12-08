<?php 
$_GET['text'] = $_POST['text'];
echo $_GET['text'];
$stud_ID = $_GET['text'];
$command = escapeshellcmd('sms.py');
$output = shell_exec($command);
// header("location:show_log.php");


?>
<form action="show_log.php" name="formscan" method="post">
   <input value="<?php echo $_GET['text']; ?>" type="text" name="text" id="text" readonly="" placeholder="scan qrcode" class="form-control">
</form>
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

$stats = $_POST['STATUS'];
// echo $stats;
$sql = "UPDATE scanstatus SET studentID ='$stud_ID', status ='$stats'  WHERE scanID=1";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

// mysqli_close($conn);
?>
<?php
if ($stats == "OUT") {
	// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$event_dt = date('Y-m-d h:i:s');
$sql = "UPDATE logs SET TimeOut ='$event_dt' WHERE studentID = '$stud_ID'";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// mysqli_close($conn);
}
else{
	// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$event_dt = date('Y-m-d h:i:s');
$blank="2022-05-26 05:27:11";
// $sql = "INSERT INTO logs (studentID, TimeIn, TimeOut) VALUES ('$stud_ID', '$event_dt', '$event_dt')";
echo $stud_ID;
$sql1 = "INSERT INTO `logs`(`studentID`, `TimeIn`) VALUES ('$stud_ID','$event_dt')";

if (mysqli_query($conn, $sql1)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

// mysqli_close($conn);
}



 ?> 
 <script >
 

               

     setTimeout(function(){
//   // alert("Sup!"); 
  // window.open("show_log.php", "_self");
  document.formscan.submit();
}, );
   </script>