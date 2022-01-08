<?php
require('connect.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['staffID'])){
        // removes backslashes
	$staffID= stripslashes($_REQUEST['staffID']);
        //escapes special characters in a string
	$staffID = mysqli_real_escape_string($conn,$staffID);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	//$designation = stripslashes($_REQUEST['designation']);
	//$designation = mysqli_real_escape_string($conn,$designation);
	///Checking is user existing in the database or not
        $query = "SELECT * FROM login JOIN staff ON login.staffID = staff.staffID WHERE staff.staffID = '$staffID' AND password='$password'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) > 0){
		while($rows = mysqli_fetch_assoc($result)){
			
	#$rows = mysqli_num_rows($result);
        #if($rows==1){
	    $_SESSION['staffID'] = $staffID;
		$_SESSION['designation'] = $rows['designation'];
		$_SESSION['firstName'] = $rows['firstName'];
		$_SESSION['middleName'] = $rows['middleName'];
		$_SESSION['lastName'] = $rows['lastName'];
		$_SESSION['last_acted_on'] = time();
            // Redirect user to index.php
	    header("Location: homepage.php");
         }
		}
		else{
	echo "
<h3>staffID/password is incorrect.</h3>";
	}
}
 ?>   