<?php 
include_once "inc/header.php";
//  $retval=Department::find_all();
//  if ($retval==null) {
//      echo json_encode("No value found");
//  } else {
//     echo $retval;
//     return;
//      foreach ($retval as $key => $variable) {
//          echo "<option class='form-control'>".$variable["DepartmentName"]."</option>";
//      }
//  }
 ?>

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
                                            <div style="padding-left: 6px;padding-right: 3px;"><i class="fa fa-users"></i></div>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Staffs</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Staffs</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label for="inputPassword2" class="sr-only">Search</label>
                                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                </div>
                                                <div class="form-group mx-sm-3">
                                                    <label for="status-select" class="mr-2">Sort By</label>
                                                    <select class="custom-select" id="status-select">
                                                        <option selected="">All</option>
                                                        <option value="1">Name</option>
                                                        <option value="2">Post</option>
                                                        <option value="3">Followers</option>
                                                        <option value="4">Followings</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-lg-right mt-3 mt-lg-0">
                                                <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-cog"></i></button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add New</button>
                                            </div>
                                        </div><!-- end col-->
                                    </div> <!-- end row -->
                                </div> <!-- end card-box -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row --> 
                        <div class="row">  
                            <?php
                                $retval = User::find_all();
                                foreach( $retval as $key=>$value)
                                {
                                    
                                     echo"
                                     <div class='col-lg-4'>
                                     <div class='text-center card-box'>
                                         <div class='pt-2 pb-2'>
                                             <img src='../../assets/images/users/user-3.jpg' class='rounded-circle img-thumbnail avatar-xl' alt='profile-image'>
     
                                             <h4 class='mt-3'><a href='extras-profile.html' class='text-dark'>".$value["FirstName"]." ".$value["LastName"]."</a></h4>
                                            
                                             <button type='button' class='btn btn-primary btn-sm waves-effect waves-light'>Message</button>
                                             <button type='button' class='btn btn-success btn-sm waves-effect'>Active</button>
     
                                             <div class='row mt-4'>
                                                 <div class='col-4'>
                                                     <div class='mt-3'>
                                                         <h4>50%</h4>
                                                         <p class='mb-0 text-muted text-truncate'>Regularity</p>
                                                     </div>
                                                 </div>
                                                 <div class='col-4'>
                                                     <div class='mt-3'>
                                                         <h4>45%</h4>
                                                         <p class='mb-0 text-muted text-truncate'>Punctuality</p>
                                                     </div>
                                                 </div>
                                                 <div class='col-4'>
                                                     <div class='mt-3'>
                                                         <h4>60%</h4>
                                                         <p class='mb-0 text-muted text-truncate'>Office Performance</p>
                                                     </div>
                                                 </div>
                                             </div> <!-- end row-->
     
                                         </div> <!-- end .padding -->
                                     </div> <!-- end card-box-->
                                 </div> <!-- end col -->
     
                                     ";   
                                }
                            ?>
                         </div>
                        <!-- end row -->


                        
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
            <!-- Modal -->
            <?php
                if(isset($_POST['reg']))
                {
                    $fname=$_POST['fname'];
                    $lname=$_POST['lname'];
                    $position=$_POST['position'];
                    $phone=$_POST['phone'];
                    $department=$_POST['department'];
                    $gender=$_POST['gender'];
                    $address=$_POST['address'];
                    $city=$_POST['city'];
                    $email=$_POST['email'];
                    $dob=$_POST['dob'];
                    $empId=rand(12,100);
                    function random_strings($length_of_string)
                    {
                        // String of all alphanumeric character
                        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                        return substr(str_shuffle($str_result),0, $length_of_string);
                    }
                    $pass =random_strings(8);
                    $args=['EmpId'=> $empId,'firstname'=>$fname,'lastname'=>$lname,'email'=>$email,'pword'=>md5($pass),'Dob'=>$dob ,
                    'Department'=> $department,'Address'=>$address,'City'=>$city,'Country'=>null,'Phonenumber'=>$phone,'Status'=>1,'RegDate'=>date("Y-m-d")];
                    $user= new User($args);
                    $result = $user->save();
                    //echo"<script>alert(".$result.")</script>";
                    echo $result;

                }
            ?>
            <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h4 class="modal-title" id="myCenterModalLabel">Add New Staff</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body p-4">
                            <form method="post" name="reg">
                                <div class="form-group">
                                    <label for="name">FirstName</label>
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="name">LastName</label>
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" name="position"  id="position" placeholder="Enter position">
                                </div>
                                <div class="form-group">
                                    <label for="position">Phone</label>
                                    <input type="Phone" class="form-control" name="phone"  id="Phone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department">
                                        <option>Select a Department</option>
                                        <?php
                                             $retval=Department::find_all();
                                             if ($retval==null) {
                                                 echo json_encode("No value found");
                                             } else 
                                             {
                                             $i=1;
                                             foreach ( $retval as $key => $value) {
                                                     echo "<option class='form-control'>".$value["DepartmentName"]."</option>";
                                                 }
                                             }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="staffpassword">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option>Select a Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="department">Address</label>
                                    <input type="text" class="form-control" name="address"  id="address" placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label for="department">City</label>
                                    <input type="text" class="form-control" name="city"  id="city" placeholder="Enter City">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email"  id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" class="form-control" name="dob"  id="dob">
                                </div>
            
                                <div class="text-right">
                                    <button type="submit" name="reg" class="btn btn-success waves-effect waves-light">Save</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

<?php include_once "inc/footer.php"; ?>