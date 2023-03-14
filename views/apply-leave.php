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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Leave</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Apply For Leave</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Leave Details</h4>
                                        <?php
                                           if (isset($_POST["apply"])) {
                                            $from =$_POST["from_date"];
                                            $to =$_POST["to_date"];
                                            $Description =$_POST["Description"];
                                            $leavetype =$_POST["leav_type"];
                                            $args=["LeaveType"=>$leavetype,'ToDate'=> $to,'FromDate'=>$from,'Description'=>$Description,'Status'=>'0','IsRead'=>'0','empid'=>$_SESSION["Id"]];
                                            $user= new Leaves($args);
                                            $args=array();
                                            $result = $user->save();
                                            
                                            if($result==1){
                                                echo"<script>swal({
                                                    text: 'Application is in process..... ',
                                                  });</script>";
                                                header("loction:leave-history.php");
                                            }
                                            else{

                                            }
                                           }
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form name="apply" method="POST">
                                                    <input id="currentdate" type="hidden" />
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="from_date">From Date</label>
                                                            <input required class="form-control" id="from_date" type="date" name="from_date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="to_date">To Date</label>
                                                            <input required class="form-control" id="to_date" type="date" name="to_date">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="example-textarea">Description</label>
                                                            <textarea required class="form-control" name="Description" id="Description" rows="5"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="form-group col-lg-12">
                                                                <label for="example-select">Leave Type</label>
                                                                <select required class="form-control" name="leav_type" id="leav_type"> 
                                                                 <option class="form-control">Select a Leave Type</option>
                                                                     
                                                                <?php
                                                                    $retval=leavetype::find_all();
                                                                   
                                                                    if ($retval==null) {
                                                                        echo json_encode("No value found");
                                                                    } else {
                                                                        foreach ($retval as $key => $variable) {
                                                                            echo "<option class='form-control'>".$variable["LeaveType"]."</option>";
                                                                        }
                                                                    }
                                                                    
                                                                ?> 
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <button type="submit" style="float:right;" name="apply" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>

        
                                                </form>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
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
                <script>
                    var today = new Date();
                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    let fromdate = document.querySelector("#from_date");
                    fromdate.setAttribute("min", date);
                   
                    fromdate.onchange = function() {validate()};
                    function validate(){
                        let todate = document.querySelector("#to_date");
                        todate.value ="";
                        todate.setAttribute("min", fromdate.value);
                    }
                </script>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<?php include_once "../inc/footer.php"; ?>