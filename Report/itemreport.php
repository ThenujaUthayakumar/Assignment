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
    $this->Cell(30,20,'Item Report',0,2,'C');
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
$select ="SELECT category,sub_category,item_name,quantity FROM item,item_category,item_subcategory WHERE item.item_category=item_category.id AND item.item_subcategory=item_subcategory.id";
$result=mysqli_query($con, $select);


$pdf->AliasNbPages();
$pdf->AddPage();

//Call Tables headings
$pdf->SetFont('Times','B',14);
$pdf->Cell(60,10,'Item Name',1,0,'C');
$pdf->Cell(40,10,'Categoery',1,0,'C');
$pdf->Cell(40,10,'SubCategoery',1,0,'C');
$pdf->Cell(20,10,'Quantity',1,0,'C');
$pdf->Ln(10);

//call data's using database
$pdf->SetFont('Times','',12);
while($row = $result->fetch_object()){
  $item_name = $row->item_name;
  $item_categoery = $row->category;
  $item_subcategoery = $row->sub_category;
  $quantity = $row->quantity;


  $pdf->Cell(60,10,$item_name,1);
  $pdf->Cell(40,10,$item_categoery,1);
  $pdf->Cell(40,10,$item_subcategoery,1);
  $pdf->Cell(20,10,$quantity,1);
  $pdf->Ln();
}
$pdf->Output();
?>