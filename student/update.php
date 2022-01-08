<?php 
include "connect.php";
$id=$_GET['id'];
if(isset($_POST['update'])){
     $firstName = $_POST['firstName'];
     $middleName = $_POST['middleName'];
     $lastName = $_POST['lastName'];
	 $regNo = $_POST['regNo'];
	 $email = $_POST['email'];
	 $phoneNumber = $_POST['phoneNumber'];
	 $address = $_POST['address'];
$sql2 = "UPDATE student SET firstName = '$firstName', middleName = '$middleName', lastName = '$lastName', regNo = '$regNo', email = '$email', phoneNumber = '$phoneNumber', address = '$address' WHERE id = '$id'";

mysqli_query($conn, $sql2);
header("location:profile.php");
}
?>