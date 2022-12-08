<?php
		include "../connection/connection.php";

			$sql = "SELECT * FROM `students`";
	$result = mysqli_query($db, $sql);
	$rstset = mysqli_num_rows($result);
	if($row = mysqli_fetch_array($result)){
		$setQR=$row['studentID'];
		$setName=$row['firstname']."".$row['lastname'];
		
			// echo $row['studentID'];
			
		}	
		if(isset($_POST["newqr"])){
			
			require_once('../phpqrcode/qrlib.php'); 
			$qrvalue = $setQR;
			$tempDir = ""; 
			$codeContents = $qrvalue; 
			$fileName = '../StudentQR/'.$qrvalue .$setName. '.png'; 
			$pngAbsoluteFilePath = $tempDir.$fileName; 
			$urlRelativeFilePath = $tempDir.$fileName; 
			if (!file_exists($pngAbsoluteFilePath)) { 
				QRcode::png($codeContents, $pngAbsoluteFilePath); 
			}
			
			?>
			<!-- <center><h1>This is your QR</h1></center> -->
			<img src="<?php echo $_POST["newqr"] ?>.png" width="1000">
			<?php
		}else{
			
			?>
			<form method="post">
				<input name="newqr"><br>
				<input type="submit">
			</form>
			<?php
			
		}
		?>