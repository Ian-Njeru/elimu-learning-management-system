<!DOCTYPE html>
<?php include "session_start.php"; 
include "timeout.php";?>
<html>
<head>
<title>My units</title>
</head>

<body>

<?php 
include "connect.php";
include "topAndSideNavigation.php";
echo "<p>The units for <b>INSERT ACADEMIC YEAR</b> will be:</p>";
$sql = "SELECT * FROM unit JOIN unitlist ON unit.unitCode = unitlist.unitCode WHERE staffID = '".$_SESSION['staffID']."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
				$unitName = $row['unitName'];
				$unitCode = $row['unitCode'];
				$year = $row['year'];
				$semester = $row['semester'];
				$academicYear = $row['academicYear'];
				echo "<a href =\"classroom.php?unitCode=$unitCode\"><b>".$unitCode."</b>	";echo $unitName; echo "</a><br>";
	}
}
else
{
	echo "You don't have scheduled units this semester";
}
?>
</body>
</html>