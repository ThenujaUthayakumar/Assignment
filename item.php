<?php 
	$page="item";
    include "assets/php/header.php";
    include 'includes/database/config.php';
    include "includes/function.php";
?>
<body>
<div class="main-content">
            <div class="card">
                <div class="card-header card-header-text">
                    <h4 class="card-title">Items</h4>
                        <p class="card-title" style='text-decoration:none;float: left;'><a href="itemadd"><i class='material-icons'>add</i>Add</a></p>
                        <a href='Report/itemreport' target="blank" style='text-decoration:none;float: right;'>
                        <i class='material-icons'>print</i></a>
                </div>
                        <div class="card-content table-responsive">
                            <?php
                           viewItem($con,$id,$item_code,$item_category,$item_subcategory,$item_name,$quantity,$unit_price);

                             ?>
                        </div>
            </div>
</div>



<?php 
    include "assets/php/footer.php";
?>
</body>
</html>


