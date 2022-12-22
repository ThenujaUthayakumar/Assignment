<?php
include 'database/config.php'; //database connection

$sql = "SELECT * from customer"; //select customer table

if ($result = mysqli_query($con, $sql)) {

    //customers count
    $rowcount = mysqli_num_rows( $result );
    
    // Display output
   	echo $rowcount;
 }
?>