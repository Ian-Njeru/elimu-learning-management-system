<!DOCTYPE html>
<html>
<?php 
include "session_start.php"; 
include "timeout.php";
include "connect.php";
$unitCode=$_GET['unitCode'];?>
<head>
<title><?php echo $unitCode?></title>
</head>

<body>

<?php 

include "topAndSideNavigation.php";
include "secondaryHeader.php";
?>
</body>
</html>