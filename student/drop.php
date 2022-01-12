<?php 
include "connect.php";

if(isset($_POST['delete']) && count($_POST['drop'])>0){

  for($i=0; $i<count($_POST['drop']); $i++){
	  $deleteid = $_POST['drop'][$i];

      $deleteUser = "UPDATE student_registered_classes SET dropped = 1 WHERE id ='$deleteid'";
      mysqli_query($conn,$deleteUser);
    } 
}
header("location:registerClass.php");
?>
