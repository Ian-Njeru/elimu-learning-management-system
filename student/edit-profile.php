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
 $sql = "SELECT * FROM student WHERE id = '$id'";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)){
	 $id = $row['id'];
	 $firstName = $row['firstName'];
	 $middleName = $row['middleName'];
	 $lastName = $row['lastName'];
	 $regNo = $row['regNo'];
	 $email = $row['email'];
	 $phoneNumber = $row['phoneNumber'];
	 $address = $row['address'];
 ?>
  <body>
  <?php include "topAndSideNavigation.php";?>
    <p>
      Update Profile
    </p>
	
	<form action = "update.php?id=<?php echo $id; ?>" method = "post">
	<label for = "firstname">
	First name:</label> <input type = "text" value = "<?php echo $firstName;?>" id = "firstName" name = "firstName">
	<br>
	<label for = "middlename">
	Middle name:</label> <input type = "text" value = "<?php echo $middleName;?>" id = "middleName" name = "middleName">
	<br>
	<label for = "lastname">
	Last name:</label> <input type = "text" value = "<?php echo $lastName;?>" id = "lastName" name = "lastName">
	<br>
	<label for = "regNo">
	Registration Number:</label> <input type = "text" value = "<?php echo $regNo;?>" id = "regNo" name = "regNo">
	<br>
	<label for = "email">
	Email:</label> <input type = "email" value = "<?php echo $email;?>" id = "email" name = "email">
	<br>
	<label for = "phoneNo">
	Phone No:</label> <input type = "text" value = "<?php echo $phoneNumber;?>" id = "phoneNumber" name = "phoneNumber">
	<br>
	<label for = "address">
	Address:</label> <input type = "text" value = "<?php echo $address;?>" id = "address" name = "address">
	<br>
	<input type = "submit" value = "Update Profile" name = "update">
    
	</form>
  </body>
 <?php
 }
 }
 ?>
</html>
