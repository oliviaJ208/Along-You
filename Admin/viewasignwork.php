<?php
session_start();
define('TITLE', 'Work Order');
include('includes/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd COlumn -->
<div class="col-sm-6 mt-5 mx-3">
 <h3 class="text-center">Assigned Work Details</h3>
 <?php
  if(isset($_REQUEST['view'])){
   $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $rows = $result->fetch_assoc(); ?>
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
     <form action="" class="mb-3 d-print-none d-inline">
      <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"> </form>
      <form action="work.php" class="mb-3 d-print-none d-inline"><input class="btn btn-secondary" type="submit" value="Close">
     </form>
    </div>
 <?php }?>
</div>
<!-- End 2nd COlumn -->

<?php include('includes/footer.php')?>