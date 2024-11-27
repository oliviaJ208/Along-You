<?php
session_start();
define('TITLE','work');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'</script>";
}
?>
<!-- start 2nd column -->
 <div class="col-sm-9 col-md-10 mt-5">
  <?php
   $sql="SELECT * FROM assignwork_tb";
   $result = $conn->query($sql);
   $rows = $result->fetch_assoc();
   if($result->num_rows > 0) {
    echo '<table class="table">';
     echo '<thead>';
      echo '<tr>';
       echo '<th scope="col">Req ID</th>';
       echo '<th scope="col">Req Info</th>';
       echo '<th scope="col">Name</th>';
       echo '<th scope="col">Address</th>';
       echo '<th scope="col">City</th>';
       echo '<th scope="col">Mobile</th>';
       echo '<th scope="col">Technician</th>';
       echo '<th scope="col">Assigned Date</th>';
       echo '<th scope="col">Action</th>';
      echo '</tr>';
     echo '</thead>';
     echo '<tbody>';
      while ($rowss = $result->fetch_assoc()){
       echo '<tr>';
        echo '<td>'.$rows['request_id'].'</td>';
        echo '<td>'.$rows['request_info'].'</td>';
        echo '<td>'.$rows['requester_name'].'</td>';
        echo '<td>'.$rows['requester_add2'].'</td>';
        echo '<td>'.$rows['requester_city'].'</td>';
        echo '<td>'.$rows['requester_mobile'].'</td>';
        echo '<td>'.$rows['assigm_tech'].'</td>';
        echo '<td>'.$rows['assign_date'].'</td>';
        echo '<td>';
         echo '<form action="viewasignwork.php" method="POST" class="d-inline mr-2">';
          echo '<input type="hidden" name="id" value='.$rows['request_id'].'><button class="btn btn-warning" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
         echo '</form>';
         echo '<form action="" method="POST" class="d-inline">';
         echo '<input type="hidden" name="id" value='.$rows['request_id'].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
        echo '</form>';
        echo '</td>';
       echo '</tr>';
      }
     echo '</tbody>';
    echo '</table>';
   } else{
    echo '0 Result';
   }
   if(isset($_REQUEST['delete'])){
   $sql= "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
   if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
   } else {
    echo "Unable to Delete Data";
   }
   }
  ?>
 </div>
<!-- end 2nd column -->
<?php
  include('includes/footer.php');
?>