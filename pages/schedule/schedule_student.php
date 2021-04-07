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
                                <li>Students</li>
                            </ol>
                        </div>
                        <button data-target="#addScheduleModal" data-toggle="modal" class="btn btn-primary btn-sm  waves-effect"> <i class="small material-icons">add</i> Add Schedule</button>
                        <!-- <button data-target="#deleteFileCatModal" data-toggle="modal" class="btn btn-danger btn-sm  waves-effect"> <i class="small material-icons">delete_forever</i> Delete</button> -->
                    </div>
                    <div class="row clearfix" >
                        <div class="col--12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <th style="width: 10px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                            <th>Strand</th>
                                            <th>Academic Year</th>
                                            <th>Year Level</th>
                                            <th>Section</th>
                                            <th>Semester</th>
                                            <th>Subject Code</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Room</th>

                                      <th style="width:40px;">Option</th>
                                        </thead> 
                                        <tbody>
                                            <?php
                                       $q = mysqli_query($con,"SELECT *,CONCAT( classstart, ', - ',classend  ) as time from tblschedule ");
                                            while($row = mysqli_fetch_array($q)){
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['strand'].'</td>
                                                    <td>'.$row['ay'].'</td>
                                                    <td>'.$row['year_level'].'</td>
                                                    <td>'.$row['section'].'</td>
                                                    <td>'.$row['semester'].'</td>
                                                    <td>'.$row['subjectcode'].'</td>
                                                    <td>'.$row['day'].'</td>
                                                    <td>'.$row['time'].'</td>
                                                    <td>'.$row['room'].'</td>
                                                    <td><button type="button" data-target="#editScheduleModal'.$row['id'].'" data-toggle="modal" class="btn btn-primary btn-sm  waves-effect"><i class="small material-icons">create</i> Edit</button></td>
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
                <style type="text/css">
                    
                    .body{

                        overflow-x: scroll;
                    }
                </style>
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

    <script>
        $(document).ready(function() {
            $('#dttbl').DataTable( {
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
            } );
        } ); 
    </script>
         