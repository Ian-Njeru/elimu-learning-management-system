<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "learning_management_system";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  if(mysqli_connect_error()){
	  echo "connection establishing failed!";
  }
  ?> 