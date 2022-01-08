<?php 
include "connect.php";
$id = $_GET['id'];
if(isset($_POST['delete'])){

  if(isset($_POST['drop'])){
    foreach($_POST['drop'] as $deleteid){

      $deleteUser = "UPDATE student_registered_classes SET droppd = 1 WHERE id =".$deleteid;
      mysqli_query($conn,$deleteUser);
    }
  }
 
}
header("location:registerClass.php");
?>