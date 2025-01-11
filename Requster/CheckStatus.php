<?php
define('TITLE','Check statous');
define('PAGE', 'CheckStatus');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>
<!-- Start 2nd Column  -->
<div class="col-sm-6 mt-5 mx-3 ">
 <form action="" method="post" class="form-inline d-print-none">
  <div class="form-group mr-3">
   <label for="checkid">Enter Request ID: </label>
   <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
  </div>
  <button type="submit" class="btn btn-danger">Search</button>
 </form>
 <?php 
  if(isset($_REQUEST['checkid'])){

   if($_REQUEST['checkid'] == ""){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
    $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $rows = $result->fetch_assoc();
    if(($rows['request_id'] == $_REQUEST['checkid'])){ 
      ?>
    <h3 class="text-center mt-5">Assigned Work Details</h3>
    <table class="table table-bordered">
     <tbody>
      <tr>
        
       <td>Request ID</td>
       <td><?php if(isset($rows['request_id'])){echo $rows['request_id'];} ?></td>
      </tr>
      <tr>
       <td>Request Info</td>
       <td><?php if(isset($rows['request_info'])){echo $rows['request_info'];} ?></td>
      </tr>
      <tr>
       <td>Request Description</td>
       <td><?php if(isset($rows['requester_desc'])){echo $rows['requester_desc'];} ?></td>
      </tr>
      <tr>
       <td>Name</td>
       <td>
         <?php if(isset($rows['requester_name'])) {echo $rows['requester_name']; } ?>
       </td>
      </tr>
      <tr>
       <td>Address Line 1</td>
       <td>
         <?php if(isset($rows['requester_add1'])) {echo $rows['requester_add1']; } ?>
       </td>
      </tr>
      <tr>
       <td>Address Line 2</td>
       <td>
         <?php if(isset($rows['requester_add2'])) {echo $rows['requester_add2']; } ?>
       </td>
      </tr>
      <tr>
       <td>City</td>
       <td>
         <?php if(isset($rows['requester_city'])) {echo $rows['requester_city']; } ?>
       </td>
      </tr>
      <tr>
       <td>State</td>
       <td>
         <?php if(isset($rows['requester_state'])) {echo $rows['requester_state']; } ?>
       </td>
      </tr>
      <tr>
       <td>Pin Code</td>
       <td>
         <?php if(isset($rows['requester_zip'])) {echo $rows['requester_zip']; } ?>
       </td>
      </tr>
      <tr>
       <td>Email</td>
       <td>
         <?php if(isset($rows['requester_email'])) {echo $rows['requester_email']; } ?>
       </td>
      </tr>
      <tr>
       <td>Mobile</td>
       <td>
         <?php if(isset($rows['requester_mobile'])) {echo $rows['requester_mobile']; } ?>
       </td>
      </tr>
      <tr>
       <td>Assigned Date</td>
       <td>
         <?php if(isset($rows['assign_date'])) {echo $rows['assign_date']; } ?>
       </td>
      </tr>
      <tr>
       <td>Technician Name</td>
       <td><?php if(isset($rows['assigm_tech'])) {echo $rows['assigm_tech']; } ?></td>
      </tr>
      <tr>
       <td>Customer Sign</td>
       <td></td>
      </tr>
      <tr>
       <td>Technician Sign</td>
       <td></td>
      </tr>
     </tbody>
    </table>
    <div class="text-center">
     <form action="" class="mb-3 d-print-none">
      <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
      <input class="btn btn-secondary" type="submit" value="Close">
     </form>
    </div>
    <?php } 
    }else {
      echo '<div class="alert alert-warning mt-4">Your Request is Still Pending</div>';
     }
   }
 }?>
 <?php if(isset($msg)){echo $msg;} ?>
</div> <!-- End 2nd Column  -->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php');
?>