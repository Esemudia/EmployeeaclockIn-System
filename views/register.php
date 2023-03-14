<?php

session_start();
error_reporting(0);
require_once('../private/initiliaze.php');
if(isset($_POST['signin']))
{
    $uuid=Rand(10,20);
    $company_name=$_POST['CompanyName'];
    $logopath=$_POST['path'];
    $FirstName=$_POST['FirstName'];
    $LastName=$_POST['LastName'];
    $email=$_POST['emailaddress'];
    $password=md5($_POST['password']);
    $arg=["uuid"=> $uuid,"company_name"=> $company_name,"logopath"=> $logopath];
   
    $reg = new CompanyDetails($arg);
    $retval= $reg->save();
    $vall=json_encode($retval);
    if ($retval!=1) {
        echo  $vall;
    } 
    else
    { 
        if($retval>0) 
        {
            $args=["FirstName"=> $FirstName,"LastName"=> $LastName,"email"=> $email,"pword"=> $password];
            $reg = new Admin($arg);
            $value= $reg->save();
            echo $this->value;
            header("Location:login.php");
        }
    } 
   

 }
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Management Sytem</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://coderthemes.com/ubold/layouts/assets/images/favicon.ico">

		<!-- App css -->
		<link href="../assets/css/bootstrap-modern.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="../assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="../assets/css/bootstrap-modern-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="../assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading auth-fluid-pages pb-0">

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box" style=" margin: auto; box-shadow: 0px 0px 30px 30px #eee; border-radius: 30px;">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <!-- <div class="auth-brand text-center text-lg-left">
                            <div class="auth-logo" style=" width: 100px; height: 80px;">
                                <a href="index.html" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="" alt="" style=" height: 100%; width: 100%;  object-fit: cover;">
                                    </span>
                                </a>
                            </div>
                        </div> -->

                        <!-- title-->
                        <h4 class="mt-0" style=" text-align: center; color: black; font-size: 30px;">Sign Up</h4>
                        <!-- <p class="text-muted mb-4">Enter your email address and password to access account.</p> -->

                        <!-- form -->
                        <form name="signin" method="post"  style=" margin-top: 50px;">
                            <div class="form-group">
                                <label for="emailaddress">Company Name</label>
                                <input class="form-control" type="text" name="CompanyName"  id="CompanyName" required="" placeholder="Enter your Company Name" style="border-radius: 30px;">
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Company Logo</label>
                                <input class="form-control" type="file"  name="logo" onchange="imageUpload()"  id="logo" required=""  style="border-radius: 30px;">
                               
                            </div> 
                            <div style="display:none" class="form-group">
                                <label for="emailaddress">Path</label>
                               
                                <input class="form-control" type="text"  name="path"   id="path"   style="border-radius: 30px;">
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Admin FirstName</label>
                                <input class="form-control" type="text" name="FirstName"  id="FirstName" required="" placeholder="Enter your FirstName" style="border-radius: 30px;">
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Admin LastName</label>
                                <input class="form-control" type="text" name="LastName"  id="LastName" required="" placeholder="Enter your LastName" style="border-radius: 30px;">
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Admin Email</label>
                                <input class="form-control" type="email" name="emailaddress"  id="emailaddress" required="" placeholder="Enter your Email" style="border-radius: 30px;">
                            </div>
                            <div class="form-group">
                                <!-- <a href="auth-recoverpw-2.html" class="text-muted float-right"><small>Forgot your password?</small></a> -->
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password"style="border-radius: 30px;">
                                    <div class="input-group-append" data-password="false">
                                        <!-- <div class="input-group-text"> -->
                                            <!-- <span class="password-eye font-12"></span> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <!-- <input type="checkbox" class="custom-control-input" id="checkbox-signin"> -->
                                    <!-- <label class="custom-control-label" for="checkbox-signin">Remember me</label> -->
                                    <!-- <a href="auth-recoverpw-2.html" class="text-muted float-right"><small>Forgot your password?</small></a> -->
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" name="signin" type="submit" style="border-radius: 30px;">Log In </button>
                            </div>
                            <!-- social-->
                           
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <!-- <p class="text-muted">Don't have an account? <a href="auth-register-2.html" class="text-muted ml-1"><b>Sign Up</b></a></p> -->
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
          
        </div>
        <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/js/fileupload.js"></script>
        
    </body>
</html>