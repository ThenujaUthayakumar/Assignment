<?php 
	$page="invoice";
    include "assets/php/header.php";
    include 'includes/database/config.php';
    include "includes/function.php";

  if (isset($_GET['go'])) {

   $date_from   = $_GET['from'];
   $date_to     = $_GET['to'];
   $sql = "SELECT * 
            FROM invoice 
            WHERE date 
            BETWEEN  '$date_from' AND '$date_to'
            ORDER BY id 
            DESC"; 
}
?>
<body style="background-color: rgba(200, 200, 200, 0.2);">
<div class="main-content">
            <div class="card">
                <div class="card-header card-header-text">
                    <h4 class="card-title">Invoice Report</h4>
                    <form action="invoice" method="GET" style="float: left;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" placeholder="From Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" placeholder="To Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a href='Report/invoicereport' target="blank" style='text-decoration:none;float: right;'>
                        <i class='material-icons'>print</i></a>
                </div>
                        <div class="card-content table-responsive">
                            <table class='table'>   
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Invoice No</th>
                                <th scope='col'>Date</th>
                                <th scope='col' colspan='3'>Customer Name</th>
                                <th scope='col'>Customer District</th>
                                <th scope='col'>Item Count</th>
                                <th scope='col'>Invoice Amount</th> 
                            </tr>
         
                        <tbody>
                            <?php
                             if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT invoice.id,invoice_no,date,first_name,middle_name,last_name,district.district,item_count,amount FROM invoice,customer,district WHERE invoice.customer=customer.id AND customer.district=district.id AND date BETWEEN '$from_date' AND '$to_date' ";

                                    $query_run = mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {                                ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['invoice_no']; ?></td>
                                                <td><?= $row['date']; ?></td>
                                                <td ><?= $row['first_name']; ?></td>
                                                <td><?= $row['middle_name']; ?></td>
                                                <td><?= $row['last_name']; ?></td>
                                                <td><?= $row['district']; ?></td>
                                                <td><?= $row['item_count']; ?></td>
                                                <td><?= $row['amount']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                         // viewInvoice($con,$id,$date,$time,$invoice_no,$customer,$item_count,$amount);

                             ?>
                         </tbody>
                     </table>
                </div>
          </div>
</div>



<?php 
    include "assets/php/footer.php";
?>
<script>
$(function(){

    $("#from").datepicker({
        defaultDate:"+lw",
        changeMonth: true,
        numberOfMonths:3,
        onClose:function(selectedDate){
            $("#to").datepicker("option","minDate",selectDate);
        }
    });

    $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth:true,
        numberOfMonths: 3,
        onClose: function(selectedDate){
            $("#from").datepicker("option", "maxDate", selectedDate);
        }
    });
});
</script>
</body>
</html>


