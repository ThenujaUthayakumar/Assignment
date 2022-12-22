<?php
include 'database/config.php'; //database connection

$sql = "SELECT SUM(amount) from invoice"; //select invoice table

$result =mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)){
    echo $row['SUM(amount)'];
}
?>