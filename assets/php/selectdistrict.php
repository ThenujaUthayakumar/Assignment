<?php
include './includes/database/config.php';
$sql="SELECT * FROM district";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

// $value=$row['district'];
echo "<option value='{$row['id']}'>".$row['district']."</option>";
while($row=mysqli_fetch_array($res))
    {
        // $value=$row['district'];
        echo "<option value='{$row['id']}'>".$row['district']."</option>";
                  
    }
?>