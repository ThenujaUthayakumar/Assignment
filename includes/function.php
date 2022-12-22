<?php
//customer validation function
function emptyCheck($title,$first_name,$middle_name,$last_name,$contact_no,$district)
{
	if (empty($title) || empty($first_name) || empty($middle_name) || empty($last_name)
        || empty($contact_no) ||  empty($district)) 
	{
		$result =true;
	}
	else
	{
		$result =false;
	}
	return $result;
}

//customer Contact number check
function ContactnumberCheck($contact_no)
{
	include 'database/config.php';
	
	 
	  $sql=mysqli_query($con,"SELECT * FROM customer WHERE contact_no='$contact_no'");
	  $res=mysqli_num_rows($sql);

      if (!$res > 0) 
      {
 		 $result =false;	
	  }
	 else
	 {
	 	 $result =true;
	 
	 }
	return $result;
		

}

//customer create function
function createCustomer($con,$title,$first_name,$middle_name,$last_name,$contact_no,$district)
{
  include 'database/config.php';
  
    $sql = "INSERT INTO customer(title,first_name,middle_name,last_name,contact_no,district) VALUES 
    ('$title','$first_name','$middle_name','$last_name','$contact_no','$district')";
    
  
      if (mysqli_query($con,$sql))
      {
        header("location: ../customeradd?error=none");
        exit();
      }
      else
      {
        header("location: ../customeradd?error=stmtfailed");
          exit();
    
      }
}

//customer view function
function viewCustomer($con,$id,$title,$first_name,$middle_name,$last_name,$contact_no,$district){

	 $sql="SELECT customer.id,customer.title,customer.first_name,customer.middle_name,customer.last_name,customer.contact_no,district.district FROM customer,district WHERE customer.district=district.id";

   	 $res=mysqli_query($con,$sql);

   	 echo "<table class='table'>
                <tr>
                	<th scope='col'>ID</th>
                	<th scope='col'>Title</th>
                    <th scope='col'>First Name</th>
                    <th scope='col'>Middle Name</th>
                    <th scope='col'>Last Name</th>
                    <th scope='col'>Contact Number</th>
                    <th scope='col'>District</th>
                    <th scope='col'>Action</th>

                   
                </tr>
        ";  

   	 while($row=mysqli_fetch_array($res)){
           echo "<tr>
                <td>" .$row['id']. " </td>
                <td>" .$row['title']. " </td>
                <td>". $row['first_name']."</td>
                <td>".$row['middle_name']."</td>
                <td>". $row['last_name']."</td>
                <td>". $row['contact_no']."</td>
                <td>".$row['district']."</td>";
                
                              
              echo "  <td>
					<a href='customeredit?id=".$row['id']."' style='text-decoration:none;'><i class='material-icons'>edit</i></a>&nbsp;
				
					
             		<a href='deleteCustomer?id=".$row['id']."'' style='text-decoration:none;'>
             		<i class='material-icons'>delete</i></a>&nbsp;

                  </td>

                
              </tr>";
              

          }

echo "</table>";

}

//customer detele function
function deleteCustomer(){

   	include 'database/config.php';
   	
 	$delete_sql="DELETE FROM customer WHERE id='".$_GET['id']."'";

 	if (mysqli_query($con,$delete_sql)) {
 		echo "<script>alert('Deleted successfully !')</script>";
	   echo "<script>window.open('./customer','_self')</script>"; 
 	}	
}

/* ================================================================================ */
/* ================================= ITEM =========================================== */
/* ================================================================================ */


//Item view function
function viewItem($con,$id,$item_code,$item_category,$item_subcategory,$item_name,$quantity,$unit_price)
{

    $sql="SELECT item.id,item_code,category,sub_category,item_name,quantity,unit_price FROM item,item_category,item_subcategory WHERE item.item_category=item_category.id AND item.item_subcategory=item_subcategory.id";

     $res=mysqli_query($con,$sql);

     echo "<table class='table'>
                <tr>
                  <th scope='col'>ID</th>
                  <th scope='col'>Code</th>
                    <th scope='col'>Category</th>
                    <th scope='col'>Subcategory</th>
                    <th scope='col'>Item Name</th>
                    <th scope='col'>Quantity</th>
                    <th scope='col'>Unit Price</th>
                    <th scope='col'>Action</th>

                   
                </tr>
        ";  

     while($row=mysqli_fetch_array($res)){
           echo "<tr>
                <td>" .$row['id']. " </td>
                <td>" .$row['item_code']. " </td>
                <td>".$row['category']."</td>
                <td>". $row['sub_category']."</td>
                <td>". $row['item_name']."</td>
                <td>". $row['quantity']."</td>
                <td>".$row['unit_price']."</td>";
                
                              
              echo "  <td>
          <a href='itemedit?id=".$row['id']."' style='text-decoration:none;'><i class='material-icons'>edit</i></a>&nbsp;
        
          
                <a href='deleteItem?id=".$row['id']."'' style='text-decoration:none;'>
                <i class='material-icons'>delete</i></a>&nbsp;

                  </td>

                
              </tr>";
              

          }

echo "</table>";

}

//Item Code Check 
function ItemcodeCheck($item_code)
{
 include 'database/config.php';
  
   
   $sql=mysqli_query($con,"SELECT * FROM item WHERE item_code='$item_code'");
   $res=mysqli_num_rows($sql);

      if (!$res > 0) 
      {
      $result =false;  
   }
  else
  {
    $result =true;
   
  }
 return $result;
}

//Item Name Check 
function ItemNameCheck($item_name)
{
 include 'database/config.php';
  
   
   $sql=mysqli_query($con,"SELECT * FROM item WHERE item_name='$item_name'");
   $res=mysqli_num_rows($sql);

      if (!$res > 0) 
      {
      $result =false;  
   }
  else
  {
    $result =true;
   
  }
 return $result;
}

//item validation function
function itememptyCheck($item_code,$item_category,$item_subcategory,$item_name,$quantity,$unit_price)
{
  if (empty($item_code) || empty($item_category) || empty($item_subcategory) || empty($item_name)
        || empty($quantity) ||  empty($unit_price)) 
  {
    $result =true;
  }
  else
  {
    $result =false;
  }
  return $result;
}

//item create function
function createItem($con,$item_code,$item_category,$item_subcategory,$item_name,$quantity,$unit_price)
{
  include 'database/config.php';
  
    $sql = "INSERT INTO item(item_code,item_category,item_subcategory,item_name,quantity,unit_price) VALUES 
    ('$item_code','$item_category','$item_subcategory','$item_name','$quantity','$unit_price')";
    
  
      if (mysqli_query($con,$sql))
      {
        header("location: ../itemadd?error=none");
        exit();
      }
      else
      {
        header("location: ../itemadd?error=stmtfailed");
          exit();
    
      }
}

//item detele function
function deleteItem(){

    include 'database/config.php';
    
  $delete_sql="DELETE FROM item WHERE id='".$_GET['id']."'";

  if (mysqli_query($con,$delete_sql)) {
    echo "<script>alert('Deleted successfully !')</script>";
     echo "<script>window.open('./item','_self')</script>"; 
  } 
}

/* ================================================================================ */
/* ================================= Invoice =========================================== */
/* ================================================================================ */

function viewInvoice($con,$id,$date,$time,$invoice_no,$customer,$item_count,$amount)
{
   $sql="SELECT invoice.id,invoice_no,date,first_name,middle_name,last_name,district.district,item_count,amount FROM invoice,customer,district WHERE invoice.customer=customer.id AND customer.district=district.id";

     $res=mysqli_query($con,$sql);

     echo "<table class='table'>
                <tr>
                  <th scope='col'>ID</th>
                  <th scope='col'>Invoice No</th>
                    <th scope='col'>Date</th>
                    <th scope='col' colspan='3'>Customer Name</th>
                    <th scope='col'>Customer District</th>
                    <th scope='col'>Item Count</th>
                    <th scope='col'>Invoice Amount</th> 
                </tr>
        ";  

     while($row=mysqli_fetch_array($res)){
           echo "<tr>
                <td>" .$row['id']. " </td>
                <td>" .$row['invoice_no']. " </td>
                <td>".$row['date']."</td>
                <td >". $row['first_name']."</td>
                <td >". $row['middle_name']."</td>
                <td >". $row['last_name']."</td>
                <td>". $row['district']."</td>
                <td>". $row['item_count']."</td>
                <td>".$row['amount']."</td>";
                
                              
              echo "  <td>
         

                  </td>

                
              </tr>";
              

          }

echo "</table>";

}

/* ================================================================================ */
/* ================================= Invoice Item =========================================== */
/* ================================================================================ */

function viewInvoiceItem($con,$id,$invoice_no,$date,$first_name,$item_name,$item_code,$item_category,$unit_price)
{
   $sql="SELECT invoice_master.id,invoice_master.invoice_no,date,first_name,item_name,item_code,category,invoice_master.unit_price FROM invoice_master,invoice,item,customer,item_category WHERE invoice_master.item_id=item.id AND invoice.customer=customer.id AND item.id=item_category.id AND invoice_master.invoice_no=invoice.invoice_no";

     $res=mysqli_query($con,$sql);

     echo "<table class='table'>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Invoice No</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Customer Name</th>
                    <th scope='col'>Item Name</th>
                    <th scope='col'>Unit Price</th>
                    <th scope='col'>Item Category</th> 
                    <th scope='col'>Item Code</th> 
                </tr>
        ";  

     while($row=mysqli_fetch_array($res)){
           echo "<tr>
                <td>".$row['id']." </td>
                <td>".$row['invoice_no']." </td>
                <td>".$row['date']."</td>
                <td >".$row['first_name']."</td>
                <td>".$row['item_name']."</td>
                <td>".$row['unit_price']."</td>
                <td>".$row['category']."</td>
                <td>".$row['item_code']."</td>
                ";
                
                
                              
              echo "  <td>
         

                  </td>

                
              </tr>";
              

          }

echo "</table>";

}
?>

