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
<p>Register classes</p>
<?php
if(isset($_POST['submit'])){
for($i=0;$i<count($_POST['unitCode']);$i++){
	//$regNo = $_SESSION['regNo'][$i]??"";
        $unitCode = $_POST['unitCode'][$i]??"";
        $classType = $_POST['classType'][$i]??"";
       // $semester = $_POST['semester'][$i]??"";
        if($unitCode!=='' && $classType!== ''){
    $sql="
		
	INSERT INTO student_registered_classes(regNo, unitCode, classType, dropped)VALUES('".$_SESSION['regNo']."', '$unitCode', '$classType', 0)";
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
<li>Unit codes are to be written without spaced</li>
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
	
?>
</body>
</html>