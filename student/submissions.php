<!DOCTYPE html>
<html>
<?php 
include "session_start.php"; 
include "connect.php";
?>
<head>
<title>Submissions</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src = "https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"></script>

</head>

<body>

<?php 
include "topAndSideNavigation.php";
include "secondaryHeader.php";

$query = "SELECT * FROM assignment_submission WHERE regNo = '".$_SESSION['regNo']."'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
?>

<table border = "1">
<table border = "1">
<tr>
<th>ID</th>
<th>Submission Number</th>
<th>Name</th>
<th>Submission Date</th>
</tr>
<?php
	while ($row = mysqli_fetch_assoc($result)){
		$id = $row['assignmentSubmissionId'];
		$submissionNumber = $row['submissionNumber'];
		$fileName = $row['fileName'];
		//$title = $row['title'];
		$fileLocation = $row['fileLocation'];
		//$dateUploaded = $row['dateUploaded'];
		$submissionDate = $row['submissionDate'];
		
		
		
		
		
echo "<tr>";
echo "<td>";echo $id;echo"</td>";
echo "<td>";echo $submissionNumber;echo"</td>";
echo "<td><a href=\"download.php?file=$fileLocation\">";echo $fileName;echo"</a></td>";
//echo "<td>";echo $dateUploaded;echo"</td>";

echo "<td>";
$subDate = strtotime($submissionDate);
echo date('d-m-Y H:m:s',$subDate);
echo"</td>";

	}
	echo '</table>';
}
else{
	echo 'No assignments available';
}
?>
</body>
</html>