<?php 
include_once "inc/header.php"; 
//require_once('../../private/initiliaze.php');
echo isset($_SESSION["Position"]);
if(isset($_POST["approval"]))
{
    $id=$_GET["id"];
    $status= $_POST["demo"];
    if(isset($_SESSION["Position"])=="HR")
    {
        if($status=="Approved")
        {
            $args=['id'=> $id,'Status'=>2];
            echo json_encode( $args);
            $user= new updateleave($args);
            $result = $user->save();
           if($result==1)
           {
               header("Location:Leaves.php");
           }
           else
           {
               header("Location:Leaves.php");
           }
        }
        else if($status=="Not Approved")
        {
            $args=  $args=['Id'=> $id,'Status'=>0];;
            echo json_encode( $args);
            $user= new updateleave($args);
            $result = $user->save();
            if($result==1)
            {
                header("Location:Leaves.php");
            }
            else
            {
                header("Location:Leaves.php");
            }
        }
        else
        {

        }
    }
    else if($_SESSION['Position']=="MD")
    {
        if($status=="Approved")
        {
            $args=['Id'=> $id,'firstname'=>$fname,'RegDate'=>date("Y-m-d")];
            $user= new User($args);
            $result = $user->save();
        }
        else if($status=="Not Approved")
        {
            $args=['EmpId'=> $id,'firstname'=>$fname,'RegDate'=>date("Y-m-d")];
            $user= new User($args);
            $result = $user->save();
        }
        else
        {

        }

    }
 
    echo $status;
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Leave Management</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Leave Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <?php
                                $id =$_GET["id"];
                                $retvalue=Leaves::find_by_id($id);
                                $retval =array($retvalue);
                            ?>
                        <div class="row">
                            <div class="col-xl-8 col-lg-12">
                                <!-- project card -->
                                <?php
                                    foreach($retval as $key =>$value)
                                    {
                                        $newval=user::find_by_id($value["empid"]);
                                        $newvaln=array($newval);
                                        foreach ($newvaln as $key => $valuess)
                                        ;{
                                        echo"
                                        <div class='card d-block'>
                                        <div class='card-body'>
                                            <div class='clerfix'></div>
                                            <div class='row'>
                                                <div class='col-md-3'>
                                                    <!-- Reported by -->
                                                    <label class='mt-2 mb-1'>Reported By :</label>
                                                    <div class='media'>
                                                        <img src='../../assets/images/users/user-9.jpg' alt='Arya S'
                                                            class='rounded-circle mr-2' height='24' />
                                                        <div class='media-body'>
                                                            <p>".$valuess["FirstName"]." ".$valuess["LastName"]."</p>
                                                        </div>
                                                    </div>
                                                    <!-- end Reported by -->
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->";}
                                            echo"
                                            <div class='row'>
                                                <div class='col-md-3'>
                                                    <!-- Ticket type -->
                                                    <label class='mt-2 mb-1'>Leave Type :</label>
                                                    <p>
                                                        <i class='mdi mdi-ticket font-18 text-success mr-1 align-middle'></i>".$value["LeaveType"]."
                                                    </p>
                                                    <!-- end Ticket Type -->
                                                </div>
                                                
    
                                                <div class='col-md-3'>
                                                    <!-- assignee -->
                                                    <label class='mt-2 mb-1'>From :</label>
                                                    <p>".$value["FromDate"]."</p>
                                                    <!-- end assignee -->
                                                </div> <!-- end col -->
                                                <div class='col-md-3'>
                                                    <!-- assignee -->
                                                    <label class='mt-2 mb-1'>To :</label>
                                                    <p>".$value["ToDate"]."</p>
                                                    <!-- end assignee -->
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
    
                                            <div class='row'>
                                                <div class='col-md-3'>
                                                    <!-- Ticket type -->
                                                    <div class='form-group'>
                                                        <label for='example-select'>Status</label>
                                                        <select  onchange='myFunction()' name='status' class='form-control' id='example-select'>
                                                        <option>Select an Approval Option </option>
                                                            <option>Not Approved</option>
                                                            <option>Approved</option>
                                                        </select>
                                                    </div>
                                                    <!-- end Ticket Type -->
                                                </div>
                                                <div class='col-md-6'>
                                                    <!-- Ticket type -->
                                                    <label class='mt-1 mb-1'>Description :</label>
    
                                                    <p class='text-muted mb-0'>
                                                    ".$value["Description"]."
                                                    </p>
                                                    <!-- end Ticket Type -->
                                                </div>
                                            </div> <!-- end row -->
                                            <div class='border rounded mt-4'>
                                                <form method='post' name='approval'  class='comment-area-box'>
                                                    <textarea rows='3' class='form-control border-0 resize-none' name='comments' placeholder='Your remark...'></textarea>
                                                    <div class='p-2 bg-light d-flex justify-content-between align-items-center'>
                                                       
                                                        <input type='hidden' id='demo' name='demo'>
                                                         <div>
                                                        </div>
                                                        <button type='submit' name='approval' class='btn btn-sm btn-success'><i class='uil uil-message mr-1'></i>Submit</button>
                                                    </div>
                                                </form>
                                            </div> <!-- end .border-->
                                           
    
                                        </div> <!-- end card-body-->
                                        
                                    </div> <!-- end card-->
                                
                                        ";
                                    }
                                ?>
                               </div> <!-- end col -->
                               <script>
       function myFunction() {
  var x = document.getElementById("example-select").value;
   document.getElementById("demo").value =  x;
}
</script>
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