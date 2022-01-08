<?php
include "connect.php";
$id=$_GET['id'];
if(isset($_POST['change'])){
	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$retypePassword = $_POST['retypePassword'];
	if($oldPassword == $newPassword){
		echo "<script>alert('New password cannot be the same as the old password')</script>";
		header("location:changepassword.php?id=$id");
	}
	elseif($newPassword != $retypePassword){
		echo "<script>alert('Both new password and confirm password must match')</script>";
		header("location:changepassword.php?id=$id");
		}

else{
		$sql = "UPDATE login SET password = '$newPassword' WHERE id = '$id'";
		mysqli_query($conn, $sql) or die(mysqli_connect_error());
			header("location:profile.php");
}
}
?>