<?php
session_destroy();
unset($_SESSION["regNo"]);
#unset($_SESSION["name"]);
header("Location: login.php");
?>