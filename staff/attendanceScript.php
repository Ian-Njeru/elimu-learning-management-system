<?php
 include "connect.php";
$unitCode=$_GET['unitCode'];
	if(isset($_POST['submit'])){
		for($i=0; $i<count($_POST['attended']);$i++){
			
			$attended = $_POST['attended'][$i]??"";
			$regNo = $_POST['regNo'][$i]??"";
			if($attended !==''){
			$sql = "INSERT INTO attendance(unitCode, regNo, attended, date) VALUES('$unitCode','$regNo','$attended',now())";
			mysqli_query($conn, $sql);
			$message = "Marked as attended";
			}
			else{
				$message = "Try again";
			}
		}
	}
?>