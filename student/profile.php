<!DOCTYPE html>

<html>

  <head>
    <title>Profile</title>
    <link rel="stylesheet" href="#">
  </head>
<?php 
 include "session_start.php";
//include "timeout.php";
 include "connect.php";
 $sql = "SELECT * FROM student WHERE regNo = '".$_SESSION['regNo']."'";
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
      Profile
    </p>
    <table border="1">
	<tr>
        <td rowspan = "7"><img src = "#" alt = "profilepic"></td>
        <td><b>Name</b></td>
        <td><?php echo $firstName.' '.$middleName.' '.$lastName;?></td>
      </tr>
      <tr>
        <td><b>Registration Number</b></td>
        <td><?php echo $regNo;?></td>
      </tr>
      <tr>
        <td><b>Email</b></td>
        <td><?php echo $email;?></td>
      </tr>
	  <tr>
        <td><b>Phone No</b></td>
        <td><?php echo $phoneNumber;?></td>
      </tr>
	  <tr>
        <td><b>Address</b></td>
        <td><?php echo $address;?></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo "<a href = \"changepassword.php?id=$id \">";?>change password</a></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo "<a href = \"edit-profile.php?id=$id \">";?>Edit Profile</a></td>
      </tr>
    </table>
  </body>
 <?php
 }
 }
 ?>
</html>
