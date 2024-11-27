<?php
define('TITLE',' Requester Profile');
define('PAGE ',' RequesterProfile');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
$rEmail=$_SESSION['rEmail'];
}else{
   echo"<script> location.href='RequestorLogin.php'</script>"; 
}

$sql="SELECT r_name,r_email FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result= $conn->query($sql);
// $rName="";
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $rName=$row['r_name'];
   
}
if(isset($_REQUEST['nameupdate'])){
  if($_REQUEST['rName'] == ""){
  
    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" roll="alert"> Fill All The Detail</div>';
  } else{
     $rName = $_REQUEST['rName'];
     $sql="UPDATE requesterlogin_tb SET r_name ='$rName' WHERE r_email='$rEmail'";
     if($conn->query($sql) == TRUE){
        $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';

     }else{
        $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>'; 
     }
  } 
}
?>






<!--  end end side bar 1 column -->
        <div class="col-sm-6 mt-5">  <!-- start profile area 2 nd column-->
           <form action="" methord="POST" class="mx-5">
            <div class="form-group">
                <label for="rEmail">Email</label><input type="email" class="form-control" name="rEmail" id="rEmail"  value="<?php echo $rEmail ?>"readonly>
            </div>
            <div class="form-group">
            <label for="rName">Name</label><input type="text" class="form-control" name="rName" id="rName"  value="<?php echo $rName ?>">
            <button type="submit" class="btn btn-info" style="margin-top : 25px" name="nameupdate">update</button>
             <?php if(isset($passmsg)){echo $passmsg;}?>
            </div>
           </form> 
        </div><!-- end profile area2 nd column-->
 <?php
include('includes/footer.php');
?>