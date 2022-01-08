<?php
include "connect.php";
$unitCode=$_GET['unitCode'];
if(isset($_POST['submit'])){
	
	$title = $_POST['title'];
	$short_desc = $_POST['short_desc'];
	$long_desc = $_POST['long_desc'];
	if($title != ''){
		mysqli_query($conn, "INSERT INTO lessons (title, long_desc, short_desc, unitCode) VALUEs('".$title."','".$long_desc."','".$short_desc."','".$unitCode."')");
		header("location: syllabus.php?unitCode=$unitCode");
	}
}
?>