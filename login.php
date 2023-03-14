<?php

session_start();
error_reporting(0);
require_once('../private/initiliaze.php');
if(isset($_POST['signin']))
{
    $uname=$_POST['emailaddress'];
    $password=md5($_POST['password']);
     $retval = User::login($uname,$password);
     if ($retval==null) {
         echo json_encode("No value found");
     } else {
            $arr=array($retval);
         foreach ($arr as $key => $value) {
            $_SESSION["uname"]=$value["FirstName"]." ".$value["LastName"];
            $_SESSION["email"]=$value["EmailId"];
            $_SESSION["array"]=$value["Dob"]." ".$value["Department"]." ".$value["Address"];
            $_SESSION["phone"]=$value["Phonenumber"];
            $_SESSION["country"]=$value["Country"];
            $_SESSION["empId"]=$value["EmpId"];
            $_SESSION["Id"]=$value["id"];
            $_SESSION["access_control"]=$value["access_control"];
            $_SESSION["Position"]=$value["Position"];
         }
         echo $_SESSION["access_control"];
         //return;
         
         if($_SESSION["access_control"]==2)
           {
               header("Location:index.php");
           } 
        else if($_SESSION["access_control"]==1 || $_SESSION["access_control"]==0)
        {
            header("Location:admin/index.php");
        }
            
     }
   
}

?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/modern/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jan 2021 10:15:00 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Parcel Properties Admin Dashboard</title>
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
                        <div class="auth-brand text-center text-lg-left">
                            <div class="auth-logo">
                                <a href="index.html" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="JCPLOGO.png" alt="" height="92">
                                    </span>
                                </a>
            
                                <a href="index.html" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0" style=" text-align: center; color: black; font-size: 30px;">Sign In</h4>
                        <!-- <p class="text-muted mb-4">Enter your email address and password to access account.</p> -->

                        <!-- form -->
                        <form name="signin" method="post">
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="emailaddress"  id="emailaddress" required="" placeholder="Enter your email" style="border-radius: 30px;">
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
                            <div class="text-center mt-4">
                                <!-- <p class="text-muted font-16">Sign in with</p> -->
                                <!-- <ul class="social-list list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul> -->
                            </div>
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a href="auth-register-2.html" class="text-muted ml-1"><b>Sign Up</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <!-- <div class="auth-fluid-right text-center"> -->
                <!-- <div class="overlay"></div> -->
                <!-- <div class="auth-user-testimonial"> -->
                    <!-- <h2 class="mb-3 text-white">I love the color!</h2> -->
                    <!-- <p class="lead"><i class="mdi mdi-format-quote-open"></i> I've been using your theme from the previous developer for our web app, once I knew new version is out, I immediately bought with no hesitation. Great themes, good documentation with lots of customization available and sample app that really fit our need. <i class="mdi mdi-format-quote-close"></i> -->
                    <!-- </p> -->
                    <!-- <h5 class="text-white"> -->
                        <!-- - Fadlisaad (Ubold Admin User) -->
                    <!-- </h5> -->
                <!-- </div> end auth-user-testimonial -->
            <!-- </div> -->
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/modern/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jan 2021 10:15:00 GMT -->
</html>