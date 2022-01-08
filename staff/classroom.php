<!DOCTYPE html>
<html>
<?php 
include "session_start.php";
include "timeout.php";
include "connect.php";
$unitCode = $_GET['unitCode'];
?>
	<head>
		<title>Classroom:<?php echo " ".$unitCode?></title>
		<script src = "js/jquery-3.6.0.js"></script>
		<script src = "js/livesearch.js"></script>
		<script src = "js/print.js"></script>
		<style>
		table a {
			text-decoration: none;
			color: black;
		}
		</style>
	</head>
	
	<body>
	
	<?php
	include "topAndSideNavigation.php";
	include "secondaryHeader.php";
	?>
	<input type = "button" onclick = "printTable('enrolledStudents')" value = "Print">
	<input type="text" id="myInput" placeholder="Search...">
	
	<?php
	$query = "SELECT * FROM student_registered_classes JOIN student ON student_registered_classes.regNo = student.regNo WHERE unitCode = '$unitCode'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0){
	?>
		<div id = "enrolledStudents">
		<table>
		<thead>
		<tr>
			<th>ID</th>
			<th>Registration Number</th>
			<th>Name</th>
		</tr>
		</thead>
		<tbody id = "myTable">
	<?php
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$regNo = $row['regNo'];
			$firstName = $row['firstName'];
			$middleName = $row['middleName'];
			$lastName = $row['lastName'];
	?>
	
			<tr>
				<td><a href="<?php echo "student.php?regNo=$regNo"?>"> <?php echo $id;?></a></td>
				<td><a href="<?php echo "student.php?regNo=$regNo"?>"><?php echo $regNo;?></a></td>
				<td><a href="<?php echo "student.php?regNo=$regNo"?>"><?php echo $firstName." ".$middleName." ".$lastName;?></a></td>
			</tr>
			
			<?php
		}
		echo "</tbody>
		</table>
		</div>";
	}
	?>
	
	</body>
</html>