<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
             
         
  <!--  sTART CONTENt -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid">
                    <div class="block-header">
                        <div class="body">
                           
                            <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :black; ">
                                <li class="active"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                <li>Users</li>
                              
                                <li>Students</li>
                            </ol>
                        </div>
                        <button data-target="#addStudentModal" data-toggle="modal" class="btn btn-primary btn-sm  waves-effect"> <i class="small material-icons">add</i> Add Student</button>
                        <button data-target="#deleteStudentModal" data-toggle="modal" class="btn btn-danger btn-sm  waves-effect"> <i class="small material-icons">archive</i>Archive</button>
                    </div>
                    <div class="row clearfix">
              
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <th style="width: 10px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                            <th>ID Number</th>
                                            <th>Student Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Strand</th>
                                            <th>Year Level</th>
                                            <th>Section</th>
                                           <!--  <th>Address</th> -->
                                            <!-- <th>Contact</th> -->
                                            <th>Username</th>
                                            <th style="width:40px;">Option</th>
                                        </thead> 
                                        <tbody>
                                            <?php
                                            $q = mysqli_query($con,"SELECT *,CONCAT(lname, ', ', fname, ' ',mname ) as name from tblstudent");
                                            while($row = mysqli_fetch_array($q)){
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['studentid'].'" /></td>
                                                    <td>'.$row['studentid'].'</td>
                                                    <td>'.$row['name'].'</td>     
                                                    <td>'.$row['age'].'</td>
                                                    <td>'.$row['gender'].'</td>
                                                    <td>'.$row['strand'].'</td>
                                                    <td>'.$row['year_level'].'</td>
                                                    <td>'.$row['section'].'</td>
                                                    <td>'.$row['username'].'</td>
                                                    <td><button type="button" data-target="#editStudentModal'.$row['studentid'].'" data-toggle="modal" class="btn btn-primary btn-sm  waves-effect"><i class="small material-icons">create</i> Edit</button></td>
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
                  .card {
                    overflow-x: scroll;
                  }  

                </style>


            <?php include "../modals/add_modals.php"; ?> 
                   <?php include "../notification/notification.php"; ?> 
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
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,2 ] } ],"aaSorting": []
            } );
        } ); 
    </script>
         