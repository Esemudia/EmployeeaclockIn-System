<?php 
 include_once "inc/header.php";
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
                                    <h4 class="page-title">All Leaves</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <!-- <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add Ticket
                                    </button> -->
                                    <h4 class="header-title mb-4">Manage Leaves</h4>

                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Staff Name</th>
                                            <th>Position</th>
                                            <th>Leave Type</th>
                                            <th>Status</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th class="hidden-sm">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                
                                                $retval=Leaves::find_all();
                                                 if ($retval==null) {
                                                     echo json_encode("No value found");
                                                 } else {
                                                    $i=1;
                                                    foreach ($retval as $key => $value) {
                                                        $newval=user::find_by_id($value["empid"]);
                                                        $newvaln=array($newval);
                                                        foreach ($newvaln as $key => $valuess) {
                                                            echo
                                                    "
                                                    <tr>
                                                    <td><b>".$i++."</b></td>
                                                    <td>

                                                        <a href='javascript: void(0);' class='text-body'>
                                                            <img src='../../assets/images/users/user-2.jpg' alt='contact-img' title='contact-img' class='rounded-circle avatar-xs' />
                                                            <span class='ml-2'>".$valuess["FirstName"]." ".$valuess["LastName"]."</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        ". $valuess["Position"]."
                                                    </td>";
                                                        }
                                                    echo"
                                                    
                                                    <td>
                                                    ". $value["LeaveType"]."
                                                    </td>";
                                                    if($value['Status']==1)
                                                    {
                                                        echo"<td><span class='badge label-table badge-success'>Approved</span></td>";
                                                    }else if($value['Status']==0)
                                                    {
                                                        echo"<td><span class='badge label-table badge-warning'> awating HR's Approval</span></td>";
                                                    }else if($value['Status']==2)
                                                    {
                                                        echo"<td><span class='badge label-table badge-warn' style='color:blue;background-color:#7fff00'> awating MD`s Approval</span></td>";
                                                    }else
                                                    {
                                                        echo"<td><span class='badge label-table badge-danger'>Rejected</span></td>";
                                                    }
                                                    echo"
                                                    <td>
                                                    ". $value["FromDate"]."
                                                    </td>
                                                    
                                                    <td>
                                                    ". $value["ToDate"]."
                                                    </td>
                                                    
                                                    <td>
                                                        <div class='btn-group dropdown'>
                                                            <a href='javascript: void(0);' class='table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-cogs'></i></a>
                                                            <div class='dropdown-menu dropdown-menu-right'>
                                                                <a class='dropdown-item' href='leave-details.php?id=". $value["id"]."'><i class='mdi mdi-pencil mr-2 text-muted font-18 vertical-middle'></i>Edit Ticket</a>
                                                            </div>
                                                        </div>
                                                    </td>
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

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<?php include_once "inc/footer.php"; ?>