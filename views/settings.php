<?php include_once "../inc/header.php"; ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">BMS</a></li>
                                            <div style="padding-left: 6px;padding-right: 3px"><i class="fa fa-briefcase"></i></div>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile Management</a></li>
                                            <div style="padding-left: 6px;padding-right: 3px;"><i class="fa fa-cog"></i></div>
                                            <li class="breadcrumb-item active">Settings</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Profile Management</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                           
                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    <h4 class="mb-0"><?php echo ($name = $_SESSION["uname"]); ?></h4>
                                    <p class="text-muted">@webdesigner</p>

                                   
                                    <div class="text-left mt-3">
                                        <h4 class="font-13 text-uppercase">About Me :</h4>
                                        <p class="text-muted font-13 mb-3">
                                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type.
                                        </p>
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2"><?php echo ($name = $_SESSION["uname"]); ?></span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2"><?php echo ($_SESSION["phone"]); ?></span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?php echo $_SESSION["email"]; ?></span></p>

                                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2"><?php echo $_SESSION["country"]?></span></p>
                                    </div>

                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                                    class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                                    class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                    class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                                    class="mdi mdi-github"></i></a>
                                        </li>
                                    </ul>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->

                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="settings">
                                            <form>
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php
                                                             $value=explode(" ",$_SESSION["uname"]); 
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="firstname">First Name</label>
                                                            <input type="text" value="<?php echo $value[0]; ?>" disabled value="" class="form-control" id="firstname" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input disabled  type="text" value="<?php echo $value[1];?>" class="form-control" id="lastname" >
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Email Address</label>
                                                            <input type="email" disabled  value="<?php echo  $_SESSION["email"];?>" class="form-control" id="useremail" >
                                                            <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="userpassword">Password</label>
                                                            <input type="password" class="form-control" id="userpassword" >
                                                            <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <?php
                                                   $arrays=explode(" ",$_SESSION["array"]);
                                                ?>
                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Company Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="companyname">Department</label>
                                                            <input disabled type="text" value="<?php echo  $arrays[3]." ".$arrays[4];?>" class="form-control" id="department" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cwebsite">Position</label>
                                                            <input type="text" class="form-control" id="currentposition" placeholder="">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                      <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                              <script>document.write(new Date().getFullYear())</script> &copy; BMS Dashboard
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<?php include_once "../inc/footer.php"; ?>