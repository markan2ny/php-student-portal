<?php 
session_start();
if(!isset($_SESSION['role']))
{
    header("Location: ../login.php"); 
}
else
{
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
                        <?php
                        if($_SESSION['role'] == "Administrator")
                        {
                        ?>
                        <button data-target="#addActivityModal" data-toggle="modal" class="btn btn-primary btn-sm  waves-effect"> <i class="small material-icons">add</i> Add Activity</button>
                        <button data-target="#deleteActivityModal" data-toggle="modal" class="btn btn-danger btn-sm  waves-effect"> <i class="small material-icons">delete_forever</i> Delete</button>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                          <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Section Name</th>
                                                <th>Student Name</th>
                                                <th>Subject</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "select *,c.id as cid, st.id as stid, sb.id as sbid, sc.id as sid,CONCAT(st.lname, ', ', st.fname, ' ',st.mname) as sname from tblstudentclass sc left join tblclass c on sc.classid = c.id left join tblstudent st on sc.studentid = st.id left join tblsubjects sb on sc.subjectid = sb.id");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['sid'].'" /></td>
                                                    <td>'.$row['classname'].'</td>
                                                    <td>'.$row['sname'].'</td>
                                                    <td>'.$row['subjectname'].' - '.$row['description'].'</td>
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['sid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                </tr>
                                                ';
                                                
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

    <script>
        <?php
        if($_SESSION['role'] == "Administrator")
        {
        ?>
            $(document).ready(function() {
                $('#dttbl').DataTable( {
                    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
                } );
            } ); 

        <?php
        }
        else
        {
        ?>
            $(document).ready(function() {
                $('#dttbl').DataTable( {
                    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ ] } ],"aaSorting": []
                } );
            } );

        <?php
        }
        ?> 
    </script>
         
<?php
}
?>