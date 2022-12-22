<?php 
	$page="customer";
    include "assets/php/header.php";
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
<form class="row g-3 needs-validation" action="includes/signup.php" method="post" novalidate>
    <div class="col-md-12">
    <label class="form-label" for="title">Title</label>
    <select class="form-control w-50" id="title" name="title">
      <option selected disabled>Title</option>
      <option value="Mr">Mr</option>
      <option value="Mrs">Mrs</option>
      <option value="Miss">Miss</option>
      <option value="Dr">Dr</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label" for="first_name">First name</label>
    <input type="text" class="form-control" id="first_name" name="first_name">
  </div>

  <div class="col-md-4">
    <label class="form-label" for="middle_name">Middle name</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name">
  </div>

  <div class="col-md-4">
    <label class="form-label" for="last_name">Last name</label>
    <input type="text" class="form-control" id="last_name" name="last_name">
  </div>

   <div class="col-md-4">
    <label class="form-label" for="contact_no">Contact Number</label>
    <input type="text" class="form-control" id="contact_no" name="contact_no">
  </div>

  <div class="col-md-4">
    <label class="form-label" for="district">District</label>
    <select class="form-control" id="district" name="district">
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


