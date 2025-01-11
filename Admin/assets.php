<?php
session_start();
define('TITLE','assets');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">Product/Part Details</p>
 <?php 
  $sql = "SELECT * FROM assets_tb"; 
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">Product ID</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">DOP</th>';
      echo '<th scope="col">Available</th>';
      echo '<th scope="col">Total</th>';
      echo '<th scope="col">Original Cost Each</th>';
      echo '<th scope="col">Selling Cost Each</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($rows = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$rows["pid"].'</td>';
       echo '<td>'.$rows["pname"].'</td>';
       echo '<td>'.$rows["pdop"].'</td>';
       echo '<td>'.$rows["pava"].'</td>';
       echo '<td>'.$rows["ptotal"].'</td>';
       echo '<td>'.$rows["poriginaicost"].'</td>';
       echo '<td>'.$rows["psellingcost"].'</td>';
       echo '<td>';
        echo '<form action="editproduct.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$rows["pid"].'><button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
        echo '</form>';
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$rows["pid"].'><button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
       echo '</form>';
       echo '<form action="sellproduct.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$rows["pid"].'><button type="submit" class="btn btn-warning mr-3" name="issue" value="Issue"><i class="fas fa-handshake"></i></button>';
        echo '</form>';
       echo '</td>';
      echo '</tr>';
     }
    echo '</tbody>';
   echo '</table>';
  } else {
   echo '0 Result';
  }
 ?>
</div>
<?php
 if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
 if($conn->query($sql) == TRUE){
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
 } else {
  echo 'Unable to Delete';
 }
 }
?>
</div> <!-- End Row -->
  <div class="float-right"><a href="addproduct.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
 </div> <!-- End Container -->


<?php
  include('includes/footer.php');
?>