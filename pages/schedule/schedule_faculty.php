<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
             
            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid">
                    <div class="block-header">
                       <div class="body">
                           
                            <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :black; ">
                                <li class="active"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                <li>Schedule</li>
                                <li>Instructor</li>
                            </ol>
                        </div>
                    <div class="row clearfix">
                        <div class="col--12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                    <div class="form-group">
                                        <div class="col-xs-9">
                                            
                                            <select class="form-control input-md" name="search_faculty">
                                                <option value="" selected="" disabled="">-- Select Faculty --</option>


                                                <?php
                                                  $q = mysqli_query($con,"SELECT * from tblfaculty");
                                                   while($row=mysqli_fetch_array($q)){
                                                        echo '<option value="'.$row['facultyid'].'">'.$row['fname']. ' '.$row['lname'].' </option>';
                                                        }
                                                 ?>                                         
                                              </select>
                                        </div>
                                        <div class="col-xs-3">
                                            <button type="submit" class="btn btn-link waves-effect" name="btn_searcg" >SEARCH</button>
                                        </div>
                                    </div>
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            
                                            <th>Subject Code</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Room</th>

                                  
                                        </thead> 
                                        <tbody>
                                            <?php
                                            if (isset($_POST['search_faculty'])) {
                                                $facultyid = $_POST['search_faculty'];

                                                $q = mysqli_query($con,"SELECT 
                                                                            *,
                                                                            CONCAT(s.classstart, ' - ', s.classend) time
                                                                        FROM
                                                                            tblschedule s
                                                                            LEFT JOIN tblfaculty f ON f.facultyid = s.facultyid
                                                                        WHERE s.facultyid = '$facultyid';");
                                                while($row = mysqli_fetch_array($q)){
                                                    echo '
                                                    <tr>
                                                        
                                                        <td>'.$row['subjectcode'].'</td>
                                                        <td>'.$row['day'].'</td>
                                                        <td>'.$row['time'].'</td>
                                                        <td>'.$row['room'].'</td>
                                                       
                                                    </tr>';

                                                    include "../modals/edit_modals.php";
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

  