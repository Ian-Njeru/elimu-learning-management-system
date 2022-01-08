<!DOCTYPE html>
<html>
<?php include "session_start.php";
include "timeout.php";
include "connect.php";
$unitCode=$_GET['unitCode'];
if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$long_desc = $_POST['long_desc'];
		
			$sql = "INSERT INTO announcements (dateUploaded,announcement,staffID, title, unitCode) VALUES (now(), '$long_desc','".$_SESSION['staffID']."','$title','$unitCode')";
			mysqli_query($conn,$sql);
			echo "<script>alert('Announcement posted successfully')</script>";
	}
?>
<head>
<title>Announcement: <?php echo " ".$unitCode?></title>
<!--<script src = "https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"></script>//-->
<script src = "ckeditor_full_nightly/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<?php 

include "topAndSideNavigation.php";
include "secondaryHeader.php";
$query = "SELECT * FROM announcements WHERE unitCode = '$unitCode'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
?>

<table border = "1">
<table border = "1">
<tr>
<th>ID</th>
<th>Date</th>
<th>Announcement</th>
<th>Void</th>
</tr>
<?php
	while ($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$title = $row['title'];
		$announcement = $row['announcement'];
		$dateUploaded = $row['dateUploaded'];
		//$submissionDate = $row['submissionDate'];
echo "<tr>";
echo "<td>";echo $id;echo"</td>";
echo "<td>";echo $dateUploaded;echo"</td>";

echo "<td><a href = \"anview.php?id=$id\">";echo $announcement;echo"</a></td>";

echo"<td><a onclick = \"javascript: return confirm('Are you sure you want to delete this file?')\" href = \"andelete.php?unitCode=$unitCode&&id=$id\"><i class = \"fa fa-times\" aria-hidden = \"true\" ></i></a></td>
</tr>";
	}
	echo '</table>';
}
else{
	echo 'You have made no announcement';
}
?>
<form method="post" action="" >
<?php include "wysiwyg-editor.php"?>
<input type = "submit" name = "submit" value = "Submit">
</form>
<script src = "js/ckeditor.js"></script>
</body>
</html>