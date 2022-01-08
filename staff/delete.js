function delete(){
	var del = confirm("You are about to delete this record. Are you sure you want to delete this record?");
	if(del == true){
		alert("Record deleted successfully");
	}
	else{
		alert("Aborted");
	}
	return del;
}