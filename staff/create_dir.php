<?php
	if(ISSET($_POST['add'])){
		$dir = str_replace(" ", "", $_POST['dir']);
		if(!file_exists("folders/".$dir)){
			mkdir("folders/".$dir);
			echo "<script>alert('You create directory successfully')</script>";
			echo "<script>window.location='index.php'</script>";
		}
	}
?>