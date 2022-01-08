<!DOCTYPE html>

<html>
<?php 
include "session_start.php"; 
include "connect.php";
$id=$_GET['id'];
?>
<head>
<title></title>
</head>

<body>
<?php 
include "topAndSideNavigation.php";
//$query = "SELECT * FROM resources WHERE id = '$id'";
//$result = mysqli_query($conn, $query);

			$query=mysqli_query($conn,"SELECT * FROM announcements WHERE id = '$id'");
			while($row=mysqli_fetch_array($query)){
	$id = $row['id'];
		$title = $row['title'];
		$announcement = $row['announcement'];
		$dateUploaded = $row['dateUploaded'];
	
	echo $title;
	echo $announcement;

}
?>
</body>
</html>