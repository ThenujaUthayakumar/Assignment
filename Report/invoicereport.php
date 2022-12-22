<?php
require('fpdf/fpdf.php');//call fdpf
require('../includes/database/config.php');//call database connection
class PDF extends FPDF
{
/* Page header */
function Header()
{
    
    $this->SetFont('Arial','B',15);
    $this->image('../assets/img/logo.png',10,10,40);
    $this->cell(80);
    $this->Cell(30,20,'Invoice Report',0,2,'C');
    $this->Ln(5);
}

/* Page footer */
function Footer()
{
    
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

/* Report */
$pdf = new PDF();

//Query for get data's
$select ="SELECT invoice.id,invoice_no,date,first_name,middle_name,last_name,district.district,item_count,amount FROM invoice,customer,district WHERE invoice.customer=customer.id AND customer.district=district.id";
$result=mysqli_query($con, $select);


$pdf->AliasNbPages();
$pdf->AddPage();

//Call Tables headings
$pdf->SetFont('Times','B',14);
$pdf->Cell(25,10,'Invoice No',1,0,'C');
$pdf->Cell(25,10,'Date',1,0,'C');
$pdf->Cell(40,10,'Customer Name',1,0,'C');
$pdf->Cell(25,10,'District',1,0,'C');
$pdf->Cell(30,10,'Item Count',1,0,'C');
$pdf->Cell(20,10,'Amount',1,0,'C');
$pdf->Ln(10);

//call data's using database
$pdf->SetFont('Times','',12);
while($row = $result->fetch_object()){
  $invoice_no = $row->invoice_no;
  $date = $row->date;
  $first_name = $row->first_name;
  $district = $row->district;
  $item_count = $row->item_count;
  $amount = $row->amount;


  $pdf->Cell(25,10,$invoice_no,1);
  $pdf->Cell(25,10,$date,1);
  $pdf->Cell(40,10,$first_name,1);
  $pdf->Cell(25,10,$district,1);
  $pdf->Cell(30,10,$item_count,1);
  $pdf->Cell(20,10,$amount,1);
  $pdf->Ln();
}
$pdf->Output();
?>