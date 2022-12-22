<?php
include './includes/database/config.php';
$sql="SELECT * FROM item_subcategory";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

// $value=$row['district'];
echo "<option value='{$row['id']}'>".$row['sub_category']."</option>";
while($row=mysqli_fetch_array($res))
    {
        // $value=$row['district'];
        echo "<option value='{$row['id']}'>".$row['sub_category']."</option>";
                  
    }
?>