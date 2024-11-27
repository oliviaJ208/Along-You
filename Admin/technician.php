<?php
session_start();
define('TITLE','technician');
include('includes/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'</script>";
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center"><!-- starting of 2 column-->
 <p class="bg-dark text-white p-2">List of Technician</p>
 <?php 
  $sql = "SELECT * FROM technician_tb"; 
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">Emp ID</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">City</th>';
      echo '<th scope="col">Mobile</th>';
      echo '<th scope="col">Email</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$rows["empid"].'</td>';
       echo '<td>'.$rows["empName"].'</td>';
       echo '<td>'.$rows["empCity"].'</td>';
       echo '<td>'.$rows["empMobile"].'</td>';
       echo '<td>'.$rows["empEmail"].'</td>';
       echo '<td>';
        echo '<form action="editemp.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$rows["empid"].'><button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
        echo '</form>';
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$rows["empid"].'><button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
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
</div><!-- end of 2 column-->
<?php
 if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
 if($conn->query($sql) == TRUE){
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
 } else {
  echo 'Unable to Delete';
 }
 }
?>
</div> <!-- End Row -->
  <div class="float-right"><a href="insertemp.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
 </div> <!-- End Container -->

<?php
  include('includes/footer.php');
?>