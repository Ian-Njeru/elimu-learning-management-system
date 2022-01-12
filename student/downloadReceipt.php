<?php
include "session_start.php"; 
$submissionNumber = $_GET['submissionNumber'];
$unitCode = $_GET['unitCode'];
$unitName = $_GET['unitName'];
require('fpdf184/fpdf.php');
include "connect.php";

$query = "SELECT * FROM assignment_submission a_s 
	JOIN unitlist u 
	ON a_s.unitCode = u.unitCode 
	JOIN student s 
	ON s.regNo = a_s.regNo 
	WHERE submissionNumber = '$submissionNumber'";
$result = mysqli_query($conn, $query);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$pdf->Cell(80,10,'Registration Number: '.strtoupper($_SESSION['regNo']),0,'C');
$pdf->Cell(60,10,'Submission Number: '.$submissionNumber,0);
		$pdf->Ln();
		$pdf->Cell(60,10,$unitCode.": ".$unitName,0);
		$pdf->Ln(); 
		$pdf->Ln();
		
		$pdf->Cell(20,10,'Id',1);
		$pdf->Cell(120,10,'File Name',1);
		$pdf->Cell(40,10,'Submission Time',1);
		$pdf->Ln();
		
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['assignmentSubmissionId'];
		$submissionNumber = $row['submissionNumber'];
		$fileName = $row['fileName'];
		$unitName = $row['unitName'];
		$fileLocation = $row['fileLocation'];
		$unitCode = $row['unitCode'];
		$submissionDate = $row['submissionDate'];
		$name = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
		function myData(){
			global $name;
		}
		
		$pdf->Cell(20,10,$id,0);
		$pdf->Cell(120,10,$fileName,0);
		$subDate = strtotime($submissionDate);
		$pdf->Cell(40,10,date('d-m-Y H:m:s',$subDate),0);
		$pdf->Ln();
		
	}
myData();
$pdf->Cell(80,10,'This slip belongs to: '.strtoupper($name),0);
$pdf->Output();
?>