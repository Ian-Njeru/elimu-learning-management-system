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
 $sql = "SELECT * FROM staff WHERE staffID = '".$_SESSION['staffID']."'";
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
  <?php include "topAndSideNavigation.php";
  #echo "efhaighohaog";
  //if(isset($message)){
	//  echo $message;
  //}
  //unset($message);?>
    <p>
      Profile
    </p>
    <table border="1">
	<tr>
        <td rowspan = "7"><img src = "#" alt = "proilepic"></td>
        <td><b>Name</b></td>
        <td><?php echo $firstName.' '.$middleName.' '.$lastName;?></td>
      </tr>
      <tr>
        <td><b>Staff ID</b></td>
        <td><?php echo $staffID;?></td>
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
