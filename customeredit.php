<?php 
$page="customer";
include "assets/php/header.php";
include "includes/database/config.php";//connect database

if(isset($_GET['id'])){
 $sql = "SELECT * FROM customer WHERE id =".$_GET['id'];
 $res=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);

}

if (isset($_POST['submit'])) {
 
  $id=$_POST['id'];
  $title=$_POST['title'];
  $first_name=$_POST['first_name'];
  $middle_name=$_POST['middle_name'];
  $last_name=$_POST['last_name'];
  $contact_no=$_POST['contact_no'];
  $district=$_POST['district'];
     

 $query="UPDATE customer SET title='$title',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',contact_no='$contact_no',district='$district' 
 WHERE id='$id'";

    // execute query
    if (mysqli_query($con,$query))
    {
        header("location: customeredit?error=none");
        exit();
    }
    else
    {
        header("location: customeredit?error=stmtfailed");
        exit();
    
    }
}
//end
?>
<body style="background-color: rgba(200, 200, 200, 0.2);">
<div class="main-content">
    <h1 align="center">Customer Form</h1>
    <?php
            if (isset($_GET['error'])) {
                  if ($_GET['error']== "emptyCheck")
                  {
                        echo "<div class='alert alert-danger w-50' role='alert'> All Field must be filled out ! </div>";
                  }

                  else if($_GET["error"] == "returncontactno")
                  {

                      echo "<div class='alert alert-danger w-50' role='alert'>Contact Number Already Exists !</div>";
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
<form class="row g-3 needs-validation" action="customeredit" method="post" novalidate>
    <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
    <div class="col-md-12">
    <label class="form-label">Title</label>
    <select class="form-control w-50" id="title" name="title" value="<?php echo $row['title']; ?>" required>
      <option selected disabled>Title</option>
      <option value="Mr">Mr</option>
      <option value="Mrs">Mrs</option>
      <option value="Miss">Miss</option>
      <option value="Dr">Dr</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Middle name</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $row['middle_name']; ?>" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required>
  </div>

   <div class="col-md-4">
    <label class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $row['contact_no']; ?>" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">District</label>
    <select class="form-control" id="district" name="district" value="<?php echo $row['district']; ?>" required>
      <option selected disabled>District</option>
        <?php 
          include "assets/php/selectdistrict.php";      
        ?> 
    </select>
  </div>

  <div class="col-12 mt-5">
    <button class="btn btn-primary" id="submit" name="submit" type="submit">Submit form</button>
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


