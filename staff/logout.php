<?php
session_destroy();
unset($_SESSION["staffID"]);
#unset($_SESSION["name"]);
header("Location: login.php");
?>