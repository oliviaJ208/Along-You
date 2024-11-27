<?php
session_start();
define('TITLE','Reqest');
define('PAGE','reqest');

include('includes/header.php');
include('../dbConnection.php');


if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>
<!-- start 2nd column -->
 <div class="col-sm-4">
  <?php
  $sql= "SELECT request_id, request_info,request_desc,request_date FROM submitrequest_tb" ;
  $result=$conn->query($sql);
  if($result->num_rows > 0){
    while($rows = $result->fetch_assoc()){
      echo '<div class="card mt-5 mx-7">';
     echo '<div class="card-header">';
      echo 'Request ID:'. $rows['request_id'];
     echo '</div>';
     echo '<div class="card-body">';
      echo '<h5 class="card-title">Request Info: '.$rows['request_info'];
      echo '</h5>';
      echo '<p class="card-text">'.$rows['request_desc'];
      echo '</p>';
      echo '<p class="card-text">Request Date: '.$rows['request_date'];
      echo '</p>';
      echo '<div class="float-right">';
       echo '<form action="" method="POST">';
        echo '<input type="hidden" name="id" value='.$rows["request_id"].'>';
        echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view">';
        echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';
       echo '</form>';
      echo '</div>';
     echo '</div>';
    echo '</div>';
    }
  }
  ?>
  </div>
<!-- end 2nd column -->
<?php
  include('assignworkform.php');
  include('includes/footer.php');
?>