<!DOCTYPE html>
<html>
<?php 
include "session_start.php";
//include "timeout.php"; 
include "connect.php";
$unitCode=$_GET['unitCode'];
$unitName=$_GET['unitName'];
if(isset($_POST['submit'])){
	if(isset($_POST['unitCode']) || isset($_FILES['file']['name']) && isset($_POST['title'])){
		$unitCode = $_POST['unitCode'];
		$unitName = $_POST['unitName'];
		$title = $_POST['title'];
		$short_desc = $_POST['short_desc'];
		$long_desc = $_POST['long_desc'];
		$filename = $_FILES['file']['name'];
		$filesize = $_FILES['file']['size'];
		$location = "directories/syllabus/".$unitCode;
		if(!is_dir($location)){
			mkdir($location, 0777);
		}
		
		$location .="/".$filename;
		
		if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
			$sql = "INSERT INTO lessons(filelocation, filename, long_desc, staffID, title, unitCode) VALUES ('$location','$filename','$long_desc','".$_SESSION['staffID']."','$title','$unitCode')";
			mysqli_query($conn,$sql);
			echo "<script>alert('data uploaded successfully')</script>";
		}
	}
}
?>
<head>
<title><?php echo $unitCode?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src = "https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"></script>
</head>

<body>

<?php 
include "topAndSideNavigation.php";
include "secondaryHeader.php";

$query = "SELECT * FROM lessons WHERE unitCode = '$unitCode' AND deleted != 1";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
?>

<table border = "1">
<tr>
<th>ID</th>
<th>Syllabus/ lessons</th>
<th>Void</th>
</tr>
<?php
	while ($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$filename = $row['filename'];
		$title = $row['title'];

echo "<tr>";
echo "<td>";echo $id;echo"</td>";
echo "<td><a href = \"view.php?id=$id\">";echo $title;echo"</a></td>";
echo"<td><a href = \"delete.php?unitCode=$unitCode&&id=$id\"><i class = \"fa fa-times\" aria-hidden = \"true\" ></i></a></td>
</tr>";

	}
	echo '</table>';
}
else{
	echo 'No lesson available';
}
?>

</body>
</html>