<?php
include 'database/config.php'; //database connection

$sql = "SELECT * from item"; //select item table

if ($result = mysqli_query($con, $sql)) {

    //customers count
    $rowcount = mysqli_num_rows( $result );
    
    // Display output
   	echo $rowcount;
 }
?>