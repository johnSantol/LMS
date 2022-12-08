<?php 
include "../connection/connection.php";
// session_start();
				//from registration fields
			// 	$_SESSION['username'] = $username;
			// 	$_SESSION['password'] = $password_hash;



			// $un = $_SESSION['username'];
			// $password_hash = $_SESSION['password'];

				$un = $_POST['username'];
			$password_hash = $_POST['password'];
			$pass = password_hash($password_hash, PASSWORD_BCRYPT);


	$query = "INSERT INTO `userinfo` (`username`, `password`, `status`) VALUES ('$un', '$pass', 'Activated');";
    if(mysqli_query($db, $query))
    {
    	header("location:sign_in-admin.php");
    	// $sql = "SELECT accID FROM `userinfo` WHERE username= '$username';";
    	// $result = mysqli_query($db, $sql);
    	// 	if($row = mysqli_fetch_array($result)){
    			// $id = $row['accID'];
    			// $query2 = "INSERT INTO `useracc` (`accID`, `username`, `password`) VALUES ('$id', '$username', '$password_hash', 'Deactivated');";
    			// if (mysqli_query($db, $query2)){
//     				 $_SESSION['status'] = "Account Created Successfully";
    			// }
    			// else{
// 	    			 $_SESSION['status'] = "Sorry We Cannot Create Your Account (error on UserAcc DB)";
	    		// }
    		// }
// 	    		else{
// // 	    			 $_SESSION['status'] = "Sorry We Cannot Create Your Account (no fetched data)";
// 	    		}
       
        header("Location: signup.php");
    }
    else
    {
        // $_SESSION['status'] = "Sorry We Cannot Create Your Account (error on Userinfo DB)";
        header("Location: signup.php");
    }

 ?>
