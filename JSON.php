<?php 
if(isset($_POST['submit_form'])){
$srcode = $_POST['srcode'];
    $fullname = $_POST['fullname'];
    $timestamp = $_POST['timestamp'];
    $type = $_POST['type'];
    $userid = $_POST['userid'];
echo $srcode ."<br>" .$fullname ."<br>".$timestamp ."<br>".$type ."<br>".$userid ."<br>";
}
?>

