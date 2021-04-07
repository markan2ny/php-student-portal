<?php 
    session_start();
    ob_start();
        include "../header.php"; 

    

?>

<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
<?php  
    $facultyid = $_SESSION['userid'];
   

?>     
            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid">
                    <div class="block-header">
                      <ol class="breadcrumb breadcrumb-col-purple " style="margin-bottom: 10px; ">
                                <li class="active"><a href="../../pages/dashboard/dashboard.php">Dashboard</a></li>
                                <li class="active">Schedule</li>
                                 <li class="active">View Schedule</li>
                            </ol>
                    </div>
                    <div class="row clearfix">
                        <div class="col--12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                    
                                <div class="form-group">
                                    <div class="form-line">
                                         <select class="form-control input-md" name="txt_ay" required="">
                                            <option value="" selected="" disabled="">-- Select AY --</option>
                                            <?php
                                                
                                                for ($i=2014; $i <= DATE('Y'); $i++) { 
                                                    echo '<option value="'.$i .'-'.($i+1).'">'.$i .'-'.($i+1).' </option>';
                                                }

                                             ?>                                         
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control input-md" name="txt_sem" required="">
                                            <option value="" selected="" disabled="">-- Select Semester --</option>
                                            <option>1st</option>    
                                            <option>2nd</option>                                    
                                          </select>
                                    </div>
                                </div>

                                <button  type= "submit" name="btn_search" class="btn btn-primary btn-sm  waves-effect"> <i class="small material-icons"></i> Search</button>
                                <br>
                                <br>
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            
                                            <th>Subject Name</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Room</th>
                                            <th>Strand</th>
                                  
                                        </thead> 
                                        <tbody>
                                            <?php
                                                
                                                if (isset($_POST ['btn_search'])) {
                                                    # code...
                                                    $ay = $_POST['txt_ay'];
                                                    $semester = $_POST['txt_sem'];
                                                    $q = mysqli_query($con,"SELECT 
                                                                                *,
                                                                                CONCAT(classstart, ' - ', classend) time
                                                                            FROM
                                                                                tblschedule 
                                                                                
                                                                            WHERE facultyid = '$facultyid'
                                                                            AND ay = '$ay'
                                                                            AND semester = '$semester';");

                                                    while($row = mysqli_fetch_array($q)){
                                                        echo '
                                                        <tr>
                                                            
                                                            <td>'.$row['subjectcode'].'</td>
                                                            <td>'.$row['day'].'</td>
                                                            <td>'.$row['time'].'</td>
                                                            <td>'.$row['room'].'</td>
                                                            <td>'.$row['strand'].'</td>
                                                        </tr>';

                                                    }
                                                }
                                            
                                            ?>
                                            
                                        </tbody>
                                    </table> 

                                <?php include "../modals/delete_modals.php"; ?> 

                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end container-->
    
            <?php include "../modals/add_modals.php"; ?> 
         
            <?php include "../functions/add.php"; ?>          
            <?php include "../functions/edit.php"; ?>   
            <?php include "../functions/delete.php"; ?> 
            

            </section>
            <!-- END CONTENT -->

            
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include "../footer.php"; ?>

  