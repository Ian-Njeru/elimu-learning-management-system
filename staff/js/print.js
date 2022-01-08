function printTable(tableName){
	var printContents = document.getElementById(tableName).innerHTML;
	var originalContents = document.body.innerHTML;
	
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}