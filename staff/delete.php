<?php 
include "connect.php";
$id=$_GET['id'];
$unitCode=$_GET['unitCode'];
//if(isset($_POST['delete'])){

$sql = "UPDATE lessons SET deleted = 1 WHERE unitCode = '$unitCode' AND id = '$id'";

mysqli_query($conn, $sql);
header("location:syllabus.php?unitCode=$unitCode");
//}
?>