<!DOCTYPE html>

<html>
<?php 
include "session_start.php";
//include "timeout.php"; 
include "connect.php";
$id=$_GET['id'];
?>
<head>
<title></title>
</head>

<body>
<?php 
include "topAndSideNavigation.php";

			$query=mysqli_query($conn,"SELECT * FROM lessons WHERE id = '$id'");
			while($row=mysqli_fetch_array($query)){
	$id = $row['id'];
	$filename = $row['filename'];
	$title = $row['title'];
	$long_desc = $row['long_desc'];
	$filelocation = $row['filelocation'];
	
	echo $title;
	echo "<a href=\"download.php?file=$filelocation\">";echo $filename; echo '</a>';
	echo $long_desc;

}
?>
</body>
</html>