<?php 
include "connect.php";
$id = $_GET['id'];
if(isset($_POST['change'])){
	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$retypePassword = $_POST['retypePassword'];
	if($oldPassword == $newPassword){
		echo "<script>alert('New password cannot be the same as the old password')</script>";
		//header("location:changepassword.php?id=$id");
	}
	elseif($newPassword != $retypePassword){
		echo "<script>alert('Both new password and confirm password must match')</script>";
		//header("location:changepassword.php?id=$id");
		}

else{
		$sql = "UPDATE student_login SET password = '$newPassword' WHERE id = '$id'";
		mysqli_query($conn, $sql) or die(mysqli_connect_error());
		//$message = "Password changed successfully";
		header("location:profile.php");
}

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Change password</title>
</head>

<body>

<form method = "post" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
<label for = "oldPassword">Type old password</label>
<input type = "password" name = "oldPassword" id = "oldPassword">

<label for = "newPassword">Type New Password</label>
<input type = "password" name = "newPassword" id = "newPassword">

<label for = "retypePassword">Confirm new password</label>
<input type = "password" name = "retypePassword" id = "retypePassword">

<input type = "submit" value ="Change" name = "change">
</form>