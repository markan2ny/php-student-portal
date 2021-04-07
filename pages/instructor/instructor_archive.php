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
                           
                            <ol class="breadcrumb breadcrumb-col-purple " style="margin-bottom: 10px; ">
                                <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                <li class="active">Archive</li>
                                 <li class="active">Instructor</li>
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
                                            <th>Instructor Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Option</th>
                                          
                                          
                                                                                  </thead> 
                                        <tbody>
                                           <?php 
                                       
                                            $q = mysqli_query($con,"SELECT *,CONCAT(lname, ', ', fname, ' ',mname ) as name from instructor_archive");
                                            while($row = mysqli_fetch_array($q)){
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['facultyid'].'" /></td>
                                                    <td>'.$row['facultyid'].'</td>
                                                    <td>'.$row['name'].'</td>     
                                                    <td>'.$row['address'].'</td>
                                                    <td>'.$row['contact'].'</td>
                                                     <td><button type="button" " class="btn btn-primary btn-sm  waves-effect"><i class="small material-icons">restore</i> Restore</button></td>
                                               
                                                    
                                                </tr>';
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
         