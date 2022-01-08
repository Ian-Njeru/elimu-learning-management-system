<?php
require('connect.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['regNo'])){
        // removes backslashes
	$regNo= stripslashes($_REQUEST['regNo']);
        //escapes special characters in a string
	$regNo = mysqli_real_escape_string($conn,$regNo);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	//$designation = stripslashes($_REQUEST['designation']);
	//$designation = mysqli_real_escape_string($conn,$designation);
	///Checking is user existing in the database or not
        $query = "SELECT * 
				FROM student_login JOIN student 
				ON student_login.regNo = student.regNo WHERE student.regNo = '$regNo' AND password='$password'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) > 0){
		while($rows = mysqli_fetch_assoc($result)){
			
	#$rows = mysqli_num_rows($result);
        #if($rows==1){
	    $_SESSION['regNo'] = $regNo;
		//$_SESSION['designation'] = $rows['designation'];
		$_SESSION['firstName'] = $rows['firstName'];
		$_SESSION['middleName'] = $rows['middleName'];
		$_SESSION['lastName'] = $rows['lastName'];
            // Redirect user to index.php
	    header("Location: homepage.php");
         }
		}
		else{
	echo "
<h3>Incorrect registration number or password</h3>";
	}
}
 ?>   