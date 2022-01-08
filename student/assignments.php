<!DOCTYPE html>
<html>
<?php 
include "session_start.php"; 
include "connect.php";
$unitCode=$_GET['unitCode'];
if(isset($_POST['submit'])){
	if(isset($_POST['unitCode']) && isset($_FILES['file']['name'])){
		$rand = rand();
			$filename = $_FILES['file']['name'];
			$unitCode = $_POST['unitCode'];
			$filename = $_FILES['file']['name'];
			//$filesize = $_FILES['file']['size'];
			$location = $_SERVER['DOCUMENT_ROOT']."/learning-management-system/student/directories/assignments/".$unitCode;
			if(!is_dir($location)){
				mkdir($location, 0777);
			}
		
		$location .="/".$filename;
		
		if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
			$sql = "INSERT INTO assignment_submission(submissionNumber,regNo,unitCode,fileLocation, fileName, submissionDate) VALUES ('$rand','".$_SESSION['regNo']."','$unitCode','$location','$filename',now())";
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

$query = "SELECT * FROM assignments WHERE unitCode = '$unitCode' AND deleted != 1 ";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
?>

<table border = "1">
<table border = "1">
<tr>
<th>ID</th>
<th>Assignment</th>
<th>Date Uploaded</th>
<th>Submission Date</th>
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


<input type = "submit" name = "submit" value = "Submit">
</form>

<script src = "ckeditor.js"></script>
</body>
</html>