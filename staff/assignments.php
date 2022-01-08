<!DOCTYPE html>
<html>
<?php 
include "session_start.php"; 
include "timeout.php";
include "connect.php";
$unitCode=$_GET['unitCode'];
if(isset($_POST['submit'])){
	if(isset($_POST['unitCode']) && isset($_FILES['file']['name'])){
		$unitCode = $_POST['unitCode'];
		//$title = $_POST['title'];
		//$short_desc = $_POST['short_desc'];
		//$long_desc = $_POST['long_desc'];
		//$dateUploaded = date("Y-m-d H:i:s");
		$submissionDate = $_POST['date'];
		$filename = $_FILES['file']['name'];
		$filesize = $_FILES['file']['size'];
		$location = $_SERVER['DOCUMENT_ROOT']."/learning-management-system/directories/assignments/".$unitCode;
		if(!is_dir($location)){
			mkdir($location, 0777);
		}
		
		$location .="/".$filename;
		
		if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
			$sql = "INSERT INTO assignments(filelocation, filename, dateUploaded, submissionDate, staffID, unitCode) VALUES ('$location','$filename',now(),'$submissionDate','".$_SESSION['staffID']."','$unitCode')";
			mysqli_query($conn,$sql);
			echo "<script>alert('data uploaded successfully')</script>";
		}
	}
}
?>
<head>
<title>Assignment: <?php echo " ".$unitCode?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src = "ckeditor_full_nightly/ckeditor/ckeditor.js"></script><!--<script src = "https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"></script>//-->

</head>

<body>

<?php 
include "topAndSideNavigation.php";
include "secondaryHeader.php";

$query = "SELECT * FROM assignments WHERE unitCode = '$unitCode' AND deleted != 1 ";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
?>

<table border = "1">
<table border = "1">
<tr>
<th>ID</th>
<th>Resources</th>
<th>Date Uploaded</th>
<th>Submission Date</th>
<th>Void</th>
</tr>
<?php
	while ($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$filename = $row['filename'];
		$title = $row['title'];
		$filelocation = $row['filelocation'];
		$dateUploaded = $row['dateUploaded'];
		$submissionDate = $row['submissionDate'];
echo "<tr>";
echo "<td>";echo $id;echo"</td>";
echo "<td><a href=\"download.php?file=$filelocation\">";echo $filename;echo"</a></td>";
echo "<td>";echo $dateUploaded;echo"</td>";

echo "<td>";
$subDate = strtotime($submissionDate);
echo date('d-m-Y',$subDate);
echo"</td>";

echo"<td><a onclick = \"javascript: return confirm('Are you sure you want to delete this file?')\" href = \"adelete.php?unitCode=$unitCode&id=$id\"><i class = \"fa fa-times\" aria-hidden = \"true\" ></i></a></td>
</tr>";
	}
	echo '</table>';
}
else{
	echo 'No assignments available';
}
?>
<form method="post" action="" class="form-inline" enctype = "multipart/form-data">
<p>Assignmnts</p>
<input type = "hidden" value = "<?php echo $unitCode?>" name = "unitCode">

<label for = "file">
<input type = "file" name = "file" id = "file" multiple><br>
</label>

<?php include "wysiwyg-editor.php"?>

<label for = "date">Submission date</label>
<input type = "date" name = "date">


<input type = "submit" name = "submit" value = "Submit">
</form>

<script src = "js/ckeditor.js"></script>
</body>
</html>