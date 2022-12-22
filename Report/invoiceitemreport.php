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
    $this->Cell(30,20,'Invoice Item Report',0,2,'C');
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
$select ="SELECT invoice_master.id,invoice_master.invoice_no,date,first_name,item_name,item_code,category,invoice_master.unit_price FROM invoice_master,invoice,item,customer,item_category WHERE invoice_master.item_id=item.id AND invoice.customer=customer.id AND item.id=item_category.id AND invoice_master.invoice_no=invoice.invoice_no";
$result=mysqli_query($con, $select);


$pdf->AliasNbPages();
$pdf->AddPage();

//Call Tables headings
$pdf->SetFont('Times','B',14);
$pdf->Cell(25,10,'Invoice No',1,0,'C');
$pdf->Cell(25,10,'Date',1,0,'C');
$pdf->Cell(25,10,'Customer',1,0,'C');
$pdf->Cell(40,10,'Item Name',1,0,'C');
$pdf->Cell(30,10,'Price',1,0,'C');
$pdf->Cell(30,10,'Category',1,0,'C');
$pdf->Cell(30,10,'Item Code',1,0,'C');
$pdf->Ln(10);

//call data's using database
$pdf->SetFont('Times','',12);
while($row = $result->fetch_object()){
  $invoice_no = $row->invoice_no;
  $date = $row->date;
  $first_name = $row->first_name;
  $item_name = $row->item_name;
  $unit_price = $row->unit_price;
  $category = $row->category;
  $item_code = $row->item_code;


  $pdf->Cell(25,10,$invoice_no,1);
  $pdf->Cell(25,10,$date,1);
  $pdf->Cell(25,10,$first_name,1);
  $pdf->Cell(40,10,$item_name,1);
  $pdf->Cell(30,10,$unit_price,1);
  $pdf->Cell(30,10,$category,1);
  $pdf->Cell(30,10,$item_code,1);
  $pdf->Ln();
}
$pdf->Output();
?>