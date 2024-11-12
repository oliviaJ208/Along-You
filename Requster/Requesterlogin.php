<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
if (isset($_REQUEST['rEmail'])){
$rEmail=$_REQUEST['rEmail'];
$rpassword=$_REQUEST['rPassword'];
$sql= "SELECT r_email,r_password FROM requesterlogin_tb WHERE r_email ='".$rEmail."'AND r_Password ='".$rpassword."' limit 1";
$result = $conn->query($sql);
if($result->num_rows==1){
$_SESSION['is_login'] = true;
$_SESSION['rEmail']= $rEmail;
   
    echo "<script>location.href='RequesterProifile.php';</script>";
    exit;

   }
   else{
          $msg='<div class= "alert alert-warning mt-2">Enter valid Email and Password</div>';
        }
  }
}
else{
  echo "<script> location.href='RequesterProifile.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--bootstrap css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- font awesom css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .custom-margin{
    margin-top: 8vh;
  }
</style>

    <title>Login</title>
</head>
<body>
<div class="mt-5 text-center style="font-size:30px;">
<i class="fa-solid fa-stethoscope"></i>
<span>Online services management system(Along u)</span>
</div>
<p class="text-center" style="font size:20px;"><i class="fa-sharp-duotone fa-solid fa-user-secret"></i>Requestor Area(Demo)</p>
<div class=" container-fluid">
    <div class="row justify-content-center custom-margin">
        <div class="col-sm-6 col-md-4">
          <form action="" class="shadow-lg p-4" methord="POST">
            <div class="form-group">
            <i class="fa-solid fa-envelope"></i> <label for="email" class="font-weight-bold pl-2"> Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
             <small class="form-text">we'll never shere your email with anyone else.</small>
            </div>
            <div class=" form-group">
            <i class="fa-solid fa-lock"></i><lable for="pass" class="font-weight-bold pl-2">Password</lable><input type="password" class="form-control" placeholder="Password" name="rPassword">
            </div>
            <button type="submit" class="btn btn-outline-info mt-3 font-weight-bold btn-block shadow-sm"> Login</button>
            <?php if(isset($msg)){echo $msg;}?>
          </form> 
          <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm"> Back To Home</a></div> 
        </div>
    </div>
</div>
<!-- JavaScript File -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>