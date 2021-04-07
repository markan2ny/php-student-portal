<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
             <style>
    input{
     float: left;
        margin-bottom:50px;
        margin-left: 100px;
    
    
    }
    
</style>




            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                 <div class="container-fluid">
                    <div class="block-header">
                       
                     <div class="body">
                           
                            <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :green; ">
                                <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                    <li class="active">Grading</li>
                                <li class="active">Student Grades</li>
                               
                        </div>
              
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                     <form method="POST"> 
                                    
                                     <input style="width:200px ;" type="text" class="form-control sm" placeholder="Student Id" name="studentid" required="">
                                     <input style="width:200px ;" type="text" class="form-control sm" placeholder="Student Name" name="student" >
                                    
                                     
                                                                                
                                        
                                        <center><button type="submit" class="btn btn-link waves-effect" name="btn_viewgrades" >SEARCH</button>
                                            </center>
                                              <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            
                                        <thead >
                                            
                                            <th rowspan="2">Subject</th>

                                            <th style="width:100px;" >1st Grading</th>
                                            <th style="width:100px;" >2nd Grading</th>
                                            <th style="width:100px;" >Final Grade</th>                                  
                                            </thead> 

                                        <tbody>
                                            <?php
                                            if (isset($_POST['btn_viewgrades'])) {
                                                $studentid = $_POST['studentid'];
                                                  $student = $_POST['student'];
                                   


                                                $q = mysqli_query($con,"SELECT 
                                                     (SELECT transmu from tblgrade where grading_period = '1st grading' and studentid = tg.studentid and student = tg.student) first_transmu,
                                                    (SELECT transmu from tblgrade where grading_period = '2nd grading' and studentid = tg.studentid and student = tg.student) second_transmu, subject
                                                                     from tblgrade tg where tg.studentid = '$studentid' or tg.student = '$student' group by tg.subject" ) ;
                                                while($row = mysqli_fetch_array($q)){
                                                    $average = (($row['first_transmu']+$row['second_transmu'])/2);
                                                    echo '
                                                    <tr> 
                                                        <td>'.$row['subject'].'</td>
                                                          <td>'.$row['first_transmu'].'</td>
                                                            <td>'.$row['second_transmu'].'</td>
                                                              <td>'.$average.'</td>
                                                
                                        
                                                       
                                                       
                                                    </tr>';

                                                    include "../modals/edit_modals.php";
                                                         }
                                                     }
                                            
                                            ?>
                                            
                                        </tbody>
                                    </table>                
                                    
                                               </form>                      
                                        </div>

                                 
                                </div><!-- /.box-body -->
                            </div> <!-- /.box -->
                            
                                
                        

                    </div>   <!-- /.row -->
                </section><!-- /.content -->        
                <!--end container-->
    
            

            </section>
            <!-- END CONTENT -->

            
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include "../footer.php"; ?>

    
         
<script>
 
  
</script>