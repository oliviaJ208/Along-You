<?php
session_start();
define('TITLE', 'Update Product');
include('includes/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['pupdate'])){
  if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginaicost'] == "") || ($_REQUEST['psellingcost'] == "")){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
    $pid = $_REQUEST['pid'];
    $pname = $_REQUEST['pname'];
    $pdop = $_REQUEST['pdop'];
    $pava = $_REQUEST['pava'];
    $ptotal = $_REQUEST['ptotal'];
    $poriginaicost = $_REQUEST['poriginaicost'];
    $psellingcost = $_REQUEST['psellingcost'];
    $sql = "UPDATE assets_tb SET pname = '$pname', pdop = '$pdop', pava = '$pava', ptotal = '$ptotal', poriginaicost = '$poriginaicost', psellingcost = '$psellingcost' WHERE pid = '$pid'";
     if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
     } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
     }
   }
}
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update Product Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $rows = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pid">Product ID</label>
      <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($rows['pid'])) {echo $rows['pid']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($rows['pname'])) {echo $rows['pname']; }?>">
    </div>
    <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if(isset($rows['pdop'])) {echo $rows['pdop']; }?>">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($rows['pava'])) {echo $rows['pava']; }?>">
    </div>
    <div class="form-group">
      <label for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)" value="<?php if(isset($rows['ptotal'])) {echo $rows['ptotal']; }?>">
    </div>
    <div class="form-group">
      <label for="poriginalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginaicost" name="poriginaicost" onkeypress="isInputNumber(event)" value="<?php if(isset($rows['poriginaicost'])) {echo $rows['poriginaicost']; }?>">
    </div>
    <div class="form-group">
      <label for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)" value="<?php if(isset($rows['psellingcost'])) {echo $rows['psellingcost']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Update</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
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