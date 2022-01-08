<!DOCTYPE html>
<html>

  <head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="#">
  </head>
<?php 
 include "session_start.php";
 //include "timeout.php";
 include "connect.php";
 
 $id = $_GET['id'];
 $sql = "SELECT * FROM staff WHERE id = '$id'";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)){
	 $id = $row['id'];
	 $firstName = $row['firstName'];
	 $middleName = $row['middleName'];
	 $lastName = $row['lastName'];
	 $staffID = $row['staffID'];
	 $email = $row['email'];
	 $phoneNumber = $row['phoneNumber'];
 ?>
  <body>
  <?php include "topAndSideNavigation.php";?>
    <p>
      Update Profile
    </p>
	
	<form action = "update.php?id=<?php echo $id; ?>" method = "post">
	<label for = "firstName">
	First Name:</label> <input type = "text" value = "<?php echo $firstName;?>" id = "firstName" name = "firstName">
	<br>
	<label for = "middleName">
	Middle Name:</label> <input type = "text" value = "<?php echo $middleName;?>" id = "middleName" name = "middleName">
	<br>
	<label for = "lastName">
	Last Name:</label> <input type = "text" value = "<?php echo $lastName;?>" id = "lastName" name = "lastName">
	<br>
	<label for = "staffID">
	Staff ID:</label> <input type = "hidden" value = "<?php echo $staffID;?>" id = "staffID" name = "staffID">
	<input type = "text" value = "<?php echo $staffID;?>" id = "staffID" name = "staffID" disabled>
	<br>
	<label for = "email">
	Email:</label> <input type = "email" value = "<?php echo $email;?>" id = "email" name = "email">
	<br><label for = "phoneNumber">
	Phone No:</label> <input type = "text" value = "<?php echo $phoneNumber;?>" id = "phoneNumber" name = "phoneNumber">
	<br>
	<input type = "submit" value = "Update Profile" name = "update">
    
	</form>
  </body>
 <?php
 }
 }
 ?>
</html>
