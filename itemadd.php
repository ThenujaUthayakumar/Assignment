<?php 
	$page="item";
    include "assets/php/header.php";
?>
<body style="background-color: rgba(200, 200, 200, 0.2);">
<div class="main-content">
    <h1 align="center">Item Form</h1>
    <?php
            if (isset($_GET['error'])) {
                  if ($_GET['error']== "itememptyCheck")
                  {
                        echo "<div class='alert alert-danger w-50' role='alert'> All Field must be filled out ! </div>";
                  }
                  else if($_GET["error"] == "returnitemcode")
                  {

                      echo "<div class='alert alert-danger w-50' role='alert'>Item Code Already Exists !</div>";

                  }
                  else if($_GET["error"] == "returnitemname")
                  {

                      echo "<div class='alert alert-danger w-50' role='alert'>Item Name Already Exists !</div>";

                  }
                  
                  else if($_GET["error"] == "stmtfailed")
                  {

                      echo "<div class='alert alert-danger w-50' role='alert'>Connection Error !</div>";

                  }
                  else if($_GET["error"] == "none")
                  {

                    echo "<div class='alert alert-success w-50' role='alert'>Add Successfully ! </div>";

                  }
            }
            ?>
<form class="row g-3 needs-validation" action="includes/signup.php" method="post" novalidate>
   <div class="col-md-4">
    <label class="form-label">Item Code</label>
    <input type="text" class="form-control" id="item_code" name="item_code" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Item Category</label>
    <select class="form-control" id="item_category" name="item_category" required>
      <option selected disabled>Category</option>
        <?php 
          include "assets/php/itemCategory.php";      
        ?> 
    </select>
  </div>

    <div class="col-md-4">
    <label class="form-label">Item SubCategory</label>
    <select class="form-control" id="item_subcategory" name="item_subcategory" required>
      <option selected disabled>SubCategory</option>
        <?php 
          include "assets/php/itemSubcategory.php";      
        ?> 
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Unit Price</label>
    <input type="text" class="form-control" id="unit_price" name="unit_price" required>
  </div>

  <div class="col-12 mt-5">
    <button class="btn btn-primary" id="itemsubmit" name="itemsubmit" type="submit">Submit form</button>
  </div>
</form>

</div>

<div>
<?php 
    include "assets/php/footer.php";
?>
</div>
</body>
</html>


