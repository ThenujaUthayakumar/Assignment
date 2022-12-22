<?php

include 'database/config.php';

//customer create
if (isset($_POST['submit'])) {

	$title=$_POST['title'];
	$first_name=$_POST['first_name'];
	$middle_name=$_POST['middle_name'];
	$last_name=$_POST['last_name'];
	$contact_no=$_POST['contact_no'];
	$district=$_POST['district'];

	include 'function.php';

	if (empty($title) || empty($first_name) || empty($middle_name) || empty($last_name)
        || empty($contact_no) ||  empty($district))
	{
		header("location: ../customeradd?error=emptyCheck");
		exit();
	}
	else if (ContactnumberCheck($contact_no) !== false) {
		header("location: ../customeradd?error=returncontactno");
		exit();
	}
	createCustomer($con,$title,$first_name,$middle_name,$last_name,$contact_no,$district);

}


//Item Create
if (isset($_POST['itemsubmit'])) {

	$item_code=$_POST['item_code'];
	$item_category=$_POST['item_category'];
	$item_subcategory=$_POST['item_subcategory'];
	$item_name=$_POST['item_name'];
	$quantity=$_POST['quantity'];
	$unit_price=$_POST['unit_price'];

	include 'function.php';

	if (empty($item_code) || empty($item_category) || empty($item_subcategory) || empty($item_name)
        || empty($quantity) ||  empty($unit_price)) {
		header("location: ../itemadd?error=itememptyCheck");
		exit();
	}
	else if (ItemcodeCheck($item_code)!== false)
	{
	 	header("location: ../itemadd?error=returnitemcode");
	 	exit();
	}
	else if (ItemNameCheck($item_name)!== false)
	{
	 	header("location: ../itemadd?error=returnitemname");
	 	exit();
	}
	createItem($con,$item_code,$item_category,$item_subcategory,$item_name,$quantity,$unit_price);
}

?>