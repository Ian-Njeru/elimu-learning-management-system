<!DOCTYPE html>
<html>
<?php 
include "session_start.php"; 
include "connect.php";
?>
<head>
<title>Submissions</title>
</head>

<body>

<?php 
include "topAndSideNavigation.php";

$query = "SELECT * FROM assignment_submission a_s JOIN unitlist u ON a_s.unitCode = u.unitCode WHERE regNo = '".$_SESSION['regNo']."'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
?>

<table border = "1">
<table border = "1">
<tr>
<th>ID</th>
<th>Submission Number</th>
<th>Unit Name</th>
<th>Name</th>
<th>Submission Date</th>
<th>Download Receipt</th>
</tr>
<?php
	while ($row = mysqli_fetch_assoc($result)){
		$id = $row['assignmentSubmissionId'];
		$submissionNumber = $row['submissionNumber'];
		$fileName = $row['fileName'];
		$unitName = $row['unitName'];
		$fileLocation = $row['fileLocation'];
		$unitCode = $row['unitCode'];
		$submissionDate = $row['submissionDate'];
		
		
		
		
		
echo "<tr>";
echo "<td>";echo $id;echo"</td>";
echo "<td>";echo $submissionNumber;echo"</td>";
echo "<td>";echo $unitName;echo"</td>";
echo "<td><a href=\"download.php?file=$fileLocation\">";echo $fileName;echo"</a></td>";

echo "<td>";
$subDate = strtotime($submissionDate);
echo date('d-m-Y H:m:s',$subDate);
echo"</td>";
echo "<td><a href=\"downloadReceipt.php?submissionNumber=$submissionNumber&unitCode=$unitCode&unitName=$unitName\">";echo 'Download';echo"</a></td>";
	}
	echo '</table>';
}
else{
	echo 'No submissions';
}
?>
</body>
</html>
