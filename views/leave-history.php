 <?php 
include_once "../inc/header.php";

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Leave History</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Leave History</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <!-- Portlet card -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-widgets">
                                            <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        </div>
                                        <h4 class="header-title mb-0">Leaves</h4>

                                        <div id="cardCollpase4" class="collapse pt-3 show">
                                            <div class="table-responsive">
                                                <table class="table table-centered table-borderless mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Leave Type</th>
                                                            <th>Start Date</th>
                                                            <th>Due Date</th>
                                                            <th>Description</th>
                                                            <th>Status</th>
                                                            <th>Admin Remark</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        require_once('../private/initiliaze.php');
                                                        $retval=Leaves::find_by_empID($_SESSION["Id"]);
                                                         if ($retval==null) {
                                                             echo json_encode("No value found");
                                                         } else {
                                                            $i=1;
                                                            foreach ( $retval as $key => $value) {
                                                                echo
                                                            "
                                                            <tr>
                                                            <td>".$i++."</td>
                                                            <td>".$value['LeaveType']."</td>
                                                            <td>".$value['FromDate']."</td>
                                                            <td>".$value['ToDate']."</td>
                                                            <td>
                                                            ".$value['Description']."</td>
                                                            ";
                                                            if($value['Status']==1)
                                                            {
                                                                echo"<td><span class='badge label-table badge-success'>Approved</span></td>";
                                                            }else if($value['Status']==0)
                                                            {
                                                                echo"<td><span class='badge label-table badge-warning'>Pending</span></td>";
                                                            }else
                                                            {
                                                                echo"<td><span class='badge label-table badge-danger'>Rejected</span></td>";
                                                            }
                                                            
                                                            echo"<td>".$value['AdminRemark']."</td>
                                                        </tr>
                                                        
                                                            ";
                                                            }
                                                            
                                                            }
                                                            
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div> <!-- .table-responsive -->
                                        </div> <!-- end collapse-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
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

<?php include_once "../inc/footer.php"; ?>