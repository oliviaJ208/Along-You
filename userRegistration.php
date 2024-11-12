<?php 
include('dbconnection.php');
if(isset($_REQUEST['rsignup']))
{//checking  for empty fields
           if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPassword']==""))
       {
        $regmsg = '<div class="alert alert-warning mt-2" 
        role="alert"> All Fields are Required</div>';
       }
 else{//Email alrady Registered
       $sql="Select r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
       $result=$conn->query($sql);
   
           if($result->num_rows==1)
             {
              $regmsg = '<div class="alert alert-warning mt-2" 
        role="alert"> Email ID Already Registered </div>';
             }
         else{//Assigning users valure to variable
              $rName= $_REQUEST['rName'];
              $rEmail= $_REQUEST['rEmail'];
              $rpassword= $_REQUEST['rPassword'];
              $sql="INSERT INTO requesterlogin_tb(r_Name,r_Email,r_Password) VALUES('$rName','$rEmail','$rpassword')";
            if($conn->query($sql)==TRUE){
              $regmsg = '<div class="alert alert-success mt-2"  role="alert"> successful signup</div>';
             }else{
                $regmsg = '<div class="alert alert-danger mt-2" 
                role="alert"> failed</div>';
                }
               
            }
     }
}

?>

<div class="container pt-5" id="create_account">
                <h2 class="text-center">Create an Account</h2>
                  <form action="" class="shadow-lg p-4" method="Post">
                    <div class="row mt-5">
                        <div class="col-6 col-md-12  col-sm-12">
                            <div class="form-group d-flex" style="flex-direction: column;
                            align-items: flex-start; flex-direction: column; align-items: flex-start;">
                                <span>
                                    <i class="fa fa-user text-black" aria-hidden="true"></i>
                                    <label for="name" class="font-weight-bold pl-2">Name</label>
                                </span>
                                    <input type="text" class="form-control" placeholder="Name" name="rName" id="name">
                            </div>
                        </div>

                        <div class="col-6 col-md-12  col-sm-12">
                            <div class="form-group d-flex" style="flex-direction: column;
                            align-items: flex-start; flex-direction: column; align-items: flex-start;">
                            <span>
                                        <i class="fa fa-envelope text-black" aria-hidden="true"></i>
                                        <label for="email" class="font-weight-bold pl-2">Email</label>
                            </span>
                                        <input type="email" class="form-control" placeholder="Email" name="rEmail" id="email">
                            </div> 
                        </div> 

                        <div class="col-6 col-md-12 col-sm-12">
                            <div class="form-group d-flex" style="flex-direction: column;
                            align-items: flex-start; flex-direction: column; align-items: flex-start;">
                                <small class="form-text"> we'll never Share your email with anyone else</small><br>
                        <span>
                                <i class="fa fa-lock text-black" aria-hidden="true"></i>
                                <label for="pass" class="font-weight-bold pl-2">Password</label>
                        </span>
                                <input type="password" class="form-control" placeholder="Password" name="rPassword" id="pass">
                            </div>
                        </div>

                        <div class="d-flex"style="flex-direction: column;align-items: flex-start; flex-direction: column; align-items: flex-start">
                            <button type ="submit" class="form-control btn btn-info mt-5 btn-block shadow-sm font-weight-bold" name="rsignup">Sign up</button>
                            <em  style="font-size:12px;"> Note-By clicking Sign Up,you agree to our Terms,data policy and Cookie policy</em>
                            <?php if(isset($regmsg))
                           { echo $regmsg; }
                           
                           ?> 
                        </div>
                      
                    </div>
                     
                  
                
                </form>
                
            </div>
        </div>  