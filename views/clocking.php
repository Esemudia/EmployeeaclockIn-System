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
                                            <div style="padding-left: 6px;padding-right: 3px;"><i class="fa fa-clock"></i></div>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clocking System</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Clocking History</h4>
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
                                                            <th>Clock In Date</th>
                                                            <th>Time In</th>
                                                            <th>Time Out</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Jan 03, 2015</td>
                                                            <td>6:00am</td>
                                                            <td>6:00pm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Jan 03, 2015</td>
                                                            <td>6:00am</td>
                                                            <td>6:00pm</td>
                                                        </tr>
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