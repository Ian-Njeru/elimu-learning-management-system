<!DOCTYPE html>
<?php 
include "session_start.php"; 
include "connect.php";
//$regNo = $_SESSION['regNo'];?>
<head>
<title>My classes</title>
<link rel="stylesheet" href="#">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php include "topAndSideNavigation.php";?>
<p>Register and or drop classes</p>
<?php
if(isset($_POST['submit'])){
for($i=0;$i<count($_POST['unitCode']);$i++){
	//$regNo = $_SESSION['regNo'][$i]??"";
        $unitCode = $_POST['unitCode'][$i]??"";
        $classType = $_POST['classType'][$i]??"";
       // $semester = $_POST['semester'][$i]??"";
        if($unitCode!=='' && $classType!== ''){
    $sql="INSERT INTO student_registered_classes(regNo, unitCode, classType, dropped)VALUES('".$_SESSION['regNo']."', '$unitCode', '$classType', 0)";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            //echo '<div class="alert alert-success" role="alert">Submitted Successfully</div>';
			#echo "<script type='text/javascript'>";
        #echo "alert('Submitted successfully')";
		$message = "Submitted successfully";
        #echo "</script>";
        }
        else{
			$message = "Error in submitting data";
            #echo '<div class="alert alert-danger" role="alert">Error in Submitting  Data</div>';
        }
    }
    
}	
?>
<form method = "post" action = "">
<?php if(isset($message)){ 
echo $message; 
}
unset($message);?>
<div class="row">
<Label for = "unitCode">
<input type = "text" name = "unitCode[]" id = "unitCode" placeholder = "Enter unit code">
</label>


<label for = "class_type">
<select name = "classType[]" id = "class_type">
<option value = "" disabled selected>Select class type</option>
<option for = "first attempt">First Attempt</option>
<option for = "retake">Retake</option>
<option for = "re-retake">Re-retake</option>
</select>
</label>

</div><br>
<div id="next"></div>
<button type="button" name="addrow" id="addrow" >Add More </button><br><br>
<button type="submit" name="submit">Register</button>
<p><b>Note</b></p>
<ol><li>Please note that classes registered can only be dropped before registration period ends. If you widh to drop a class after the window closes, please consult your lecturer</li>
<li>Unit codes are to be written without spaces</li>
</ol>
</form>

<script>
$('#addrow').click(function(){
        var length = $('#regNo').length;
        var i   = parseInt(length)+parseInt(1);
        var newrow = $('#next').append('<div class="row"><Label for = "unitCode"><input type = "text" name = "unitCode[]" id = "unitCode'+i+'" placeholder = "Enter unit code"></label><label for = "class_type"><select name = "classType[]" id = "class_type"><option value = "" disabled selected>Select class type</option><option for = "first attempt">First Attempt</option><option for = "retake">Retake</option><option for = "re-retake">Re-retake</option></select></label> <input type="button" class="btnRemove" value="Remove"/></div><br><br>');         
        });
     
    // Removing event here
  $('body').on('click','.btnRemove',function() {
       $(this).closest('div').remove()
 
  });
         
</script>

<?php 
 $result = mysqli_query($conn, "SELECT src.id, src.unitCode, u.unitName FROM student_registered_classes src JOIN unitlist u ON  src.unitCode = u.unitCode WHERE regNo = '".$_SESSION['regNo']."'");
 if(mysqli_num_rows($result)>0){
echo '	<p><b>Registered Classes</b></p>
<form action = "drop.php" method = "post">
<table>
<tr><th>Unit Code</th>
<th>UnitName</th>
<th>Drop unit</th>
</tr>';
	 while($row = mysqli_fetch_assoc($result)){
		 $id = $row['id'];
		 $unitCode = $row['unitCode'];
		 $unitName = $row['unitName'];
		 ?>

<tr id=<?=$id ?>>
<td><?php echo "<a href =\"syllabus.php?unitCode=$unitCode&unitName=$unitName\">".$unitCode."</a>";?></td>
<td><?php echo "<a href =\"syllabus.php?unitCode=$unitCode&unitName=$unitName\">".$unitName."</a>";?></td>
<?php  ?>
<td><input type = "checkbox" name = "drop[]" value='<?=$id ?>'></td>
</tr>
<?php
	 }
	 
echo '</table>
<input type="submit" value="Delete" name="delete">
<form>';
 }

?>

</body>
</html>