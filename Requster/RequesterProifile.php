<?php
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
$rEmail=$_SESSION['rEmail'];
}else{
   echo"<script> location.href='RequestorLogin.php'</script>"; 
}
$sql="SELECT r_name,r_email FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result= $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $rName=$row['r_name'];
   
}
if(isset($_REQUEST['namedate'])){
  if($_REQUEST['rName']==""){
    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" roll="alert"> Fill All The Detail</div>';
  } else{
     $rName = $_REQUEST['rName'];
     $sql="UTATE requesterlogin_tb SET r_name ='$rName' WHERE r_email='$rEmail'";
     if($con->Query($sql) == TRUE){
        $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';

     }else{
        $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>'; 
     }
  } 
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesom css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- custom css -->
      <link rel="stylesheet" href="..\css\costom.css">
      <link rel="stylesheet" href="..\css\hover.css">
    <title>profile</title>

   
</head>
<body>

<header style="position:fixed;top:0">
       
        <input type ="checkbox" name ="" id ="chk1">
            <div>
                <img src="..\image\img2.png" alt="Logo" width="30%" height="50%" class="d-inline-block align-text-top" style="margin-right: -45px;">
            </div>
               
                
            
              
                <li style="list-style-type:none; ">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-square-instagram"></i>

                </li>
             
          
             <!-- end nevigation -->
    </header> 
    
    <!-- container Start -->
<div class="container-fluid" style=" margin-top:100px;">
    <div class="row"><!-- row Start -->
        <!-- start start side bar 1 column -->
        <nav class="col-sm-2 bg-light sidebar py-5">
          <div class=" sidebar-sticky">
          <ul class= "nav-flex-column">
            <li class ="nav-item"style="list-style-type:none; ">
                <a  class="nav-link active" href="RequesterProifile.php" ><i class="fa-solid fa-user text-black"></i>Profile</a>
            </li>
            <li class ="nav-item"style="list-style-type:none; ">
                <a  class="nav-link" href="#"><i class="fa-brands fa-accessible-icon text-black"></i>Submit Request</a>
            </li>
            <li class ="nav-item"style="list-style-type:none; ">
                <a  class="nav-link" href="#"><i class="fa-solid fa-align-center text-black"></i>Service Status</a>
            </li>
            <li class ="nav-item"style="list-style-type:none; ">
                <a  class="nav-link" href="#"><i class="fa-sharp fa-solid fa-key text-black"></i>Change Password</a>
            </li>
            <li class ="nav-item"style="list-style-type:none; ">
                <a  class="nav-link" href="#"><i class="fa-solid fa-right-from-bracket text-black "></i>Logout</a>
            </li>
            </ul>
          </div>
        </nav><!--  end end side bar 1 column -->
        <div class="col-sm-6 mt-5">  <!-- start profile area 2 nd column-->
           <form action="" methord="POST" class="mx-5">
            <div class="form-group">
                <label for="rEmail">Email</label><input type="email" class="form-control" name="rEmail" id="rEmail"  value="<?php echo $rEmail ?>"readonly>
            </div>
            <div class="form-group">
            <label for="rName">Name</label><input type="text" class="form-control name="rName" id="rName"  value="<?php echo $rName ?>">
            <button type="submit" class="btn btn-info" name="nameupdate">update</button>
             <?php if(isset($passmsg)){echo $passmsg;}?>
            </div>
           </form> 
        </div><!-- end profile area2 nd column-->

    </div><!-- row end-->
</div>
<!-- container End -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>   
</body>
</html>