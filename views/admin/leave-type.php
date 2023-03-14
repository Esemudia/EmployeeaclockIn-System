<?php 
 include_once "inc/header.php";
 if(isset($_POST['save']))
 {
     $lname=$_POST['lname'];
     $args=['LeaveName'=> $lname,'CreationDate'=>date("Y-m-d")];
     $leave= new Department($args);
     $result = $leave->save();
     $result->free();

 }
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
                                            <div style="padding-left: 6px;padding-right: 3px;"><i class="fa fa-plane"></i></div>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Leave Management</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Department</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <button type="button" data-toggle="modal" data-target="#custom-modal" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add Leave
                                    </button>
                                    <h4 class="header-title mb-4">Manage Leaves</h4>

                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>
                                            <th>
                                                S/N
                                            </th>
                                            <th>Leave Name</th>
                                            <th>Creation Date</th>
                                            <th class="hidden-sm">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $retval=Department::find_all();
                                                if ($retval==null) {
                                                    echo json_encode("No value found");
                                                } else {
                                                $i=1;
                                                foreach ( $retval as $key => $value) {
                                                    echo
                                                "
                                                <tr>
                                                <td>".$i++."</td>
                                                <td>".$value['LeaveName']."</td>
                                                <td>
                                                ".$value['CreationDate']."</td>
                                                ";
                                                echo"<td><button class='badge label-table badge-danger'>Edit</button>
                                                
                                            </tr>
                                            
                                                ";
                                                }
                                                
                                                }
                                                
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end col -->
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
                <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Add New Leave Type</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" name="save">
                                    <div class="form-group">
                                        <label for="name">Leave Name</label>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter leave name">
                                    </div>
                                   
                                    <div class="text-right">
                                        <button type="submit" name="save" class="btn btn-success waves-effect waves-light">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <?php
              
            ?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<?php include_once "inc/footer.php"; ?>