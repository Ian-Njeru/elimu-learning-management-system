<?php
  session_start();
  if (!isset($_SESSION['regNo'])){
	  header("Location: login.php");
  }
  ?>