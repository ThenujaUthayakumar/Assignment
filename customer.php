<?php 
	$page="customer";
    include "assets/php/header.php";
    include 'includes/database/config.php';
    include "includes/function.php";
?>
<body>
<div class="main-content">
            <div class="card">
                <div class="card-header card-header-text">
                    <h4 class="card-title">Customers</h4>
                        <p class="card-title"><a href="customeradd"><i class='material-icons'>add</i>Add</a></p>
                </div>
                        <div class="card-content table-responsive">
                            <?php
                           viewCustomer($con,$id,$title,$first_name,$middle_name,$last_name,$contact_no,$district);

                             ?>
                        </div>
            </div>
</div>



<?php 
    include "assets/php/footer.php";
?>
</body>
</html>


