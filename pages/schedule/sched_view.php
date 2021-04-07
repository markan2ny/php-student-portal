<?php 
    session_start();
    ob_start();
        include "../header.php"; 

    

?>

<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
<?php  
    $studentid = $_SESSION['userid'];

    $squery = mysqli_query($con,"SELECT * FROM tblstudent WHERE studentid='$studentid';");
    while($row=mysqli_fetch_array($squery)){
        $search_ay = $row['ay'];
        $search_year_level = $row['year_level'];
        $search_section = $row['section'];
        $search_semester = $row['semester'];
    }

?>     
            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid">
                    <div class="block-header">
                        <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :black; ">
                                  <li class="active"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                               <li>Schedule</li>
                            
                            </ol>
                      <span><h4>Your Schedule</h4></span>
                    </div>
                    <div class="row clearfix">
                        <div class="col--12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                    
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            
                                            <th>Subject Code</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Room</th>
                                            <th>Faculty</th>
                                  
                                        </thead> 
                                        <tbody>
                                            <?php
                                                

                                                $q = mysqli_query($con,"SELECT 
                                                                            *,
                                                                            CONCAT(s.classstart, ' - ', s.classend) time
                                                                        FROM
                                                                            tblschedule s
                                                                            LEFT JOIN tblfaculty f ON f.facultyid = s.facultyid
                                                                        WHERE s.ay = '$search_ay'
                                                                        AND s.year_level = '$search_year_level'
                                                                        AND s.section = '$search_section'
                                                                        AND s.semester = '$search_semester';");

                                                while($row = mysqli_fetch_array($q)){
                                                    echo '
                                                    <tr>
                                                        
                                                        <td>'.$row['subjectcode'].'</td>
                                                        <td>'.$row['day'].'</td>
                                                        <td>'.$row['time'].'</td>
                                                        <td>'.$row['room'].'</td>
                                                        <td>'.$row['lname']. ', ' . $row['fname'] . ' ' . $row['mname'] . '</td>
                                                    </tr>';

                                                    include "../modals/edit_modals.php";
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

  