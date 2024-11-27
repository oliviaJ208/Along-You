<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesom css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- custom css -->
      <link rel="stylesheet" href="..\css\costom.css">
      <link rel="stylesheet" href="..\css\hover.css">
      <link rel="stylesheet" href="..\css\active.css">
      
    <title><?php echo TITLE?></title>
    <script>
      function active(e) {
        const navItems = document.querySelectorAll('.nav-item');
        localStorage.setItem("item",JSON.stringify(e.innerHTML));

        navItems.forEach((item) => {
          item.classList.remove('active');
        });

        if (!e.classList.contains('active')) {
          e.classList.add('active');
        }
      }
    </script>
   
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
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
          <!-- start start side bar 1 column -->
        
          <div class=" sidebar-sticky">
        <ul class="nav flex-column">
                  
            <li class ="nav-item active " onclick = "active(this)" style="list-style-type:none; ">
                <a  class="nav-link "  href="RequesterProifile.php " ><i class="fa-solid fa-user" style="color : black; margin-right:10px;"></i>Profile</a>
            </li>
            <li class ="nav-item" onclick = "active(this)"style="list-style-type:none; ">
                <a  class="nav-link" href="SubmitRequest.php"><i class="fa-brands fa-accessible-icon" style="color : black; margin-right:10px;"></i>Submit Request</a>
            </li>
            <li class ="nav-item" onclick = "active(this)"style="list-style-type:none; ">
                <a  class="nav-link" href="CheckStatus.php"><i class="fa-solid fa-align-center" style="color : black; margin-right:10px;"></i>Service Status</a>
            </li>
            <li class ="nav-item"  onclick = "active(this)"style="list-style-type:none; ">
                <a  class="nav-link"  href="Requesterchangepass.php"><i class="fa-sharp fa-solid fa-key "style="color : black; margin-right:10px;k"></i>Change Password</a>
            </li>
            <li class ="nav-item"style="list-style-type:none;" onclick="logout()">
                <a  class="nav-link"  href="../logout.php"><i class="fa-solid fa-right-from-bracket "style="color : black; margin-right:10px;" ></i>Logout</a>
            </li>
            </ul>
          </div>
        </nav><!--  end end side bar 1 column -->
        
