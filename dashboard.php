<?php 
    $page="dashboard";
    include "assets/php/header.php";
?>
  <body>
    <div class="wrapper">
    <div class="body-overlay"></div>
        
			
			<div class="main-content">
			
			<div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                       <span class="material-icons">follow_the_signs</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Customers</strong></p>
                                    <h3 class="card-title">
                                        <?php 
                                            include 'Report/dashboard/customerdashboard.php';
                                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">info</i>
                                        <a href="#pablo">Customer report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-rose">
                                       <span class="material-icons">shopping_cart</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Items</strong></p>
                                    <h3 class="card-title">
                                        <?php include 'Report/dashboard/itemreport.php'; ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Item Report
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <span class="material-icons">
                                            attach_money
                                            </span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Invoice</strong></p>
                                    <h3 class="card-title">
                                        <?php include 'Report/dashboard/invoicereport.php'; ?>     
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Sales Amount
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-info">
                                    
                                    <span class="material-icons">
                                        equalizer
                                    </span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Invoice Item</strong></p>
                                    <h3 class="card-title">
                                        <?php include 'Report/dashboard/invoiceitemreport.php'; ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Invoice Item Amount
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					

			</div>
        </div>
        <div style="margin-top: 260px;">
           <?php 
                include "assets/php/footer.php";
            ?>
        </div>
    </div>


</body>
</html>


