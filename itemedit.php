<?php 
$page="item";
include "assets/php/header.php";
include "includes/database/config.php";//connect database

if(isset($_GET['id'])){
 $sql = "SELECT * FROM item WHERE id =".$_GET['id'];
 $res=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);

}

if (isset($_POST['itemsubmit'])) {
 
  $id=$_POST['id'];
  $item_code=$_POST['item_code'];
  $item_category=$_POST['item_category'];
  $item_subcategory=$_POST['item_subcategory'];
  $item_name=$_POST['item_name'];
  $quantity=$_POST['quantity'];
  $unit_price=$_POST['unit_price'];
     

 $query="UPDATE item SET item_code='$item_code',item_category='$item_category',item_subcategory='$item_subcategory',item_name='$item_name',quantity='$quantity',unit_price='$unit_price'
  WHERE id='$id'";

    // execute query
    if (mysqli_query($con,$query))
    {
        header("location: itemedit?error=none");
        exit();
    }
    else
    {
        header("location: itemedit?error=stmtfailed");
        exit();
    
    }
}
//end
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

                    echo "<div class='alert alert-success w-50' role='alert'>Update Successfully ! </div>";

                  }
            }
            ?>
<form class="row g-3 needs-validation" action="itemedit" method="post" novalidate>
  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
   <div class="col-md-4">
    <label class="form-label">Item Code</label>
    <input type="text" class="form-control" id="item_code" name="item_code" value="<?php echo $row['item_code']; ?>" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity" 
    value="<?php echo $row['quantity']; ?>" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Unit Price</label>
    <input type="text" class="form-control" id="unit_price" name="unit_price" 
    value="<?php echo $row['unit_price']; ?>" required>
  </div>
  
  <div class="col-md-4">
    <label class="form-label">Item Category</label>
    <select class="form-control" id="item_category" name="item_category" value="<?php echo $row['item_category']; ?>" required>
      <option selected disabled>Category</option>
        <?php 
          include "assets/php/itemCategory.php";      
        ?> 
    </select>
  </div>

    <div class="col-md-4">
    <label class="form-label">Item SubCategory</label>
    <select class="form-control" id="item_subcategory" name="item_subcategory" value="<?php echo $row['item_subcategory']; ?>" required>
      <option selected disabled>SubCategory</option>
        <?php 
          include "assets/php/itemSubcategory.php";      
        ?> 
    </select>
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


