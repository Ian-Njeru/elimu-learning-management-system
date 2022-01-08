<!DOCTYPE html>
<html>
<?php 
include "session_start.php";
include "timeout.php";
include "connect.php";
$unitCode = $_GET['unitCode'];
?>
<head>
<title>Attendance:<?php echo " ".$unitCode?> </title>
<script src = "js/jquery-3.6.0.js"></script>
<script src = "js/livesearch.js"></script>
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
	
if(isset($_POST['submit'])){
	
    
		for($i=0; $i<sizeof($_POST['attended']);$i++){
			$attended = $_POST['attended'][$i];
			$regNo = $_POST['regNo'][$i];
			$sql = "INSERT INTO attendance(unitCode, regNo, attended, date) VALUES('$unitCode','$regNo','$attended',now())";
		
			mysqli_query($conn, $sql);
		}	
		$message = "Marked as attended";
}
	$query = "SELECT * FROM student_registered_classes JOIN student ON student_registered_classes.regNo = student.regNo WHERE unitCode = '$unitCode'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0){
	?>
	<input type="text" id="myInput" placeholder="Search...">
	
	<form method = "post" action="" >
	<?php if(isset($message)){ 
echo $message; 
}
unset($message);?>
		<table border ="1">
		<thead>
		<tr>
			<th>ID</th>
			<th>Registration Number</th>
			<th>Name</th>
			<th>Attended</th>
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
				<td><?php echo $id;?></td>
				<td><input type="hidden" name="regNo[]" value="<?php echo $regNo?>"><?php echo $regNo;?></td>
				<td><?php echo $firstName." ".$middleName." ".$lastName;?></td>
				<td><input type = "checkbox" name = "attended[]" value="Attended"></td>
			</tr>
			
			<?php
		}
		echo "</tbody>
		<tfoot>
		<tr>
		<td colspan = \"4\"><input type = \"submit\" value=\"Mark Attendance\" name =\"submit\"></td>
		</tr>
		</tfoot>
		</table>
		</form>";
	}
	?>
	
	</body>
</html>