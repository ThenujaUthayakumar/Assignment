<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Assignment</title>
        <!---- Shorcut icon--->
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="assets/css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
      
  </head>

  <body>

    <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="assets/img/logo.png" alt="logo" class="img-fluid"/><span>Assignment</span></h3>
            </div>
            <ul class="list-unstyled components">
          <li class="<?php if($page=='dashboard'){echo 'active';} ?>">
                    <a href="dashboard" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>

                <li  class="<?php if($page=='customer'){echo 'active';} ?>">
                    <a href="./customer" class="dashboard"><i class="material-icons">group</i><span>Customer</span></a>
                </li>

                <li class="<?php if($page=='item'){echo 'active';} ?>">
                    <a href="./item" class="dashboard"><i class="material-icons">category</i><span>Item</span></a>
                </li>

                <li class="<?php if($page=='invoice'){echo 'active';} ?>">
                    <a href="./invoice" class="dashboard"><i class="material-icons">receipt</i><span>Invoice</span></a>
                </li>

                <li class="<?php if($page=='invoiceItem'){echo 'active';} ?>">
                    <a href="./invoiceitem" class="dashboard"><i class="material-icons">sell</i><span>Invoice Item</span></a>
                </li>
            </ul>
        </nav>
    
    

        <!-- Page Content  -->
        <div id="content">
    
    <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons ml-1">menu</span>
                    </button>
                </div>
            </nav>
      </div>
      
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/jquery-3.3.1.min.js"></script>
  
  <?php  error_reporting(E_ERROR | E_PARSE); ?>
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
            });
      
       $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
      
        });     
</script>
</body>