<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
             
   <style>
    select{
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
                        <div class="block-header">
                        <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :black; ">
                                  <li class="active"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                               <li>My Grades</li>
                            
                            </ol>
                   
                     <span><h4>Your Grade</h4></span>
                    </div>

            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid">
                    <div class="block-header">
                      
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <img src="../../images/richwell_logo.png" style="width:80px; height:auto; position:absolute; margin-left:140px; margin-top:5px;">
                                
                                    <center> <h5> RICHWELL COLLEGES INCORPORATED</h5> </center>
                                    <center> <h6> Gen. Alejo st., San Jose, Plaridel, Bulacan</h6> </center>
                                    <br>
                                    <center> <h4> REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h4> </center>
                                       
                                    <label>Student Id: <?php echo $_SESSION['userid']; ?> <br>
                                    <label>Name: <?php echo $_SESSION['student']; ?> <br>
                              
                                    <?php 
                                        if (isset($_SESSION['userid'])){
                                                $studentid = $_SESSION['userid'];
                                                

                                            $g = mysqli_query($con,"  SELECT * from tblstudent where studentid = '$studentid' ");
                                            while($row = mysqli_fetch_array($g)){ 
                                                    $year_level=$row['year_level'];
                                                    $ay =  $row['ay'];
                                                    $section = $row['section'];
                                                    $semester = $row['semester'];
                                                    $strand = $row['strand'];

                                                    echo '
                                                        <div class="form-group">
                                                            <label>Age:</label>'.$row['age'].'   <label>Sex:</label>'.$row['gender'].'<br>
                                                            <label>Grade:</label>'.$row['year_level'].'       <label>Section:</label>'.$row['section'].' <br>
                                                            <label>School Year:</label> '.$row['ay'].' <br>
                                                            <label>Track/Strand:</label>'.$row['strand'].' <br>
                                                            <label>Semester:</label> '.$row['semester'].'
                                                    </div> ';
                                            }
                                        }
                                    ?>

                                    <div>
                                        <table id="tbl_grades" class="table table-bordered table-hover dataTable" style="width: 160%;">
                                            <thead>
                                                <tr>                                        
                                                    <th style="text-align:center;width:300px;">Subjects</th>
                                                    <th colspan="2" style="text-align:center;" class="col table-bordered">Quarter</th>
                                                    <th style="text-align:center;">Semester</th>
                                                </tr>

                                                <tr>                                        
                                                    <th> </th>
                                                    <th style="text-align:center;" >1</th>
                                                    <th style="text-align:center;">2</th>
                                                    <th style="text-align:center;" >Final Grades</th>
                                                </tr>
                                            </thead> 

                                            <tbody>
                                                <tr>
                                                    <td colspan="4" class="col table-bordered"><b>Core Subjects</b></td>
                                                </tr>

                                                <?php  
                                                    $grand_avg = array();
                                                    $subject_count = 0;
                                                ?>  
                                                <?php  
                                                    $core = mysqli_query($con, "SELECT 
                                                                                    *,
                                                                                    CONCAT(s.classstart, ' - ', s.classend) time
                                                                                FROM
                                                                                    tblschedule s
                                                                                    LEFT JOIN tblfaculty f ON f.facultyid = s.facultyid
                                                                                    LEFT JOIN tblsubjects sj ON sj.subjectname = s.subjectcode
                                                                                WHERE s.ay = '$ay'
                                                                                AND s.year_level = '$year_level'
                                                                                AND s.section = '$section'
                                                                                AND s.semester = '$semester'
                                                                                AND sj.category = 'CORE'
                                                                                ORDER BY s.subjectcode;");

                                                    if (mysqli_num_rows($core) != 0) {
                                                        $subject_count+=mysqli_num_rows($core);

                                                        while($core_row = mysqli_fetch_array($core)){ 
                                                            $current_subject = $core_row['subjectname'];

                                                            // get the first transmu 
                                                            $first_transmu = mysqli_query($con, "SELECT 
                                                                                                    g.transmu
                                                                                                FROM
                                                                                                    tblgrade g
                                                                                                WHERE g.school_year = '$ay'
                                                                                                AND g.semester = '$semester'
                                                                                                AND g.section = '$section'
                                                                                                AND g.strand = '$strand'
                                                                                                AND g.subject = '$current_subject'
                                                                                                AND g.studentid = '$studentid'
                                                                                                AND g.grading_period = '1st Grading';");
                                                            if (mysqli_num_rows($first_transmu) != 0) {
                                                                while($transmu_row = mysqli_fetch_array($first_transmu)){ 
                                                                    $f_transmu = $transmu_row['transmu'];
                                                                }
                                                            } else {
                                                                $f_transmu = 0;
                                                            }


                                                            // get the second transmu 
                                                            $second_transmu = mysqli_query($con, "SELECT 
                                                                                                    g.transmu
                                                                                                FROM
                                                                                                    tblgrade g
                                                                                                WHERE g.school_year = '$ay'
                                                                                                AND g.semester = '$semester'
                                                                                                AND g.section = '$section'
                                                                                                AND g.strand = '$strand'
                                                                                                AND g.subject = '$current_subject'
                                                                                                AND g.studentid = '$studentid'
                                                                                                AND g.grading_period = '2nd Grading';");
                                                            if (mysqli_num_rows($second_transmu) != 0) {
                                                                while($transmu_row = mysqli_fetch_array($second_transmu)){ 
                                                                    $s_transmu = $transmu_row['transmu'];
                                                                }
                                                            } else {
                                                                $s_transmu = 0;
                                                            }

                                                            $avg = ($f_transmu + $s_transmu) / 2;
                                                            array_push($grand_avg, $avg);

                                                            // display the row
                                                            echo '<tr>
                                                                    <td> ' . $current_subject . ' </td>
                                                                    <td> ' . number_format($f_transmu, 2, '.', '') . ' </td>
                                                                    <td> ' . number_format($s_transmu, 2, '.', '') . ' </td>
                                                                    <td> ' . number_format($avg, 2, '.', '') . ' </td>
                                                                </tr>';            
                                                        }                
                                                    }
                                                ?>
                                                

                                                <tr>
                                                    <td colspan="4" class="col table-bordered"><b>Applied and Specialized Subjects</b></td>
                                                </tr>
                                                
                                                <?php  
                                                    $applied = mysqli_query($con, "SELECT 
                                                                                    *,
                                                                                    CONCAT(s.classstart, ' - ', s.classend) time
                                                                                FROM
                                                                                    tblschedule s
                                                                                    LEFT JOIN tblfaculty f ON f.facultyid = s.facultyid
                                                                                    LEFT JOIN tblsubjects sj ON sj.subjectname = s.subjectcode
                                                                                WHERE s.ay = '$ay'
                                                                                AND s.year_level = '$year_level'
                                                                                AND s.section = '$section'
                                                                                AND s.semester = '$semester'
                                                                                AND sj.category = 'APPLIED'
                                                                                ORDER BY s.subjectcode;");

                                                    if (mysqli_num_rows($applied) != 0) {
                                                        $subject_count+=mysqli_num_rows($applied);
                                                        
                                                        while($core_row = mysqli_fetch_array($applied)){ 
                                                            $current_subject = $core_row['subjectname'];

                                                            // get the first transmu 
                                                            $first_transmu = mysqli_query($con, "SELECT 
                                                                                                    g.transmu
                                                                                                FROM
                                                                                                    tblgrade g
                                                                                                WHERE g.school_year = '$ay'
                                                                                                AND g.semester = '$semester'
                                                                                                AND g.section = '$section'
                                                                                                AND g.strand = '$strand'
                                                                                                AND g.subject = '$current_subject'
                                                                                                AND g.studentid = '$studentid'
                                                                                                AND g.grading_period = '1st Grading';");
                                                            if (mysqli_num_rows($first_transmu) != 0) {
                                                                while($transmu_row = mysqli_fetch_array($first_transmu)){ 
                                                                    $f_transmu = $transmu_row['transmu'];
                                                                }
                                                            } else {
                                                                $f_transmu = 0;
                                                            }


                                                            // get the second transmu 
                                                            $second_transmu = mysqli_query($con, "SELECT 
                                                                                                    g.transmu
                                                                                                FROM
                                                                                                    tblgrade g
                                                                                                WHERE g.school_year = '$ay'
                                                                                                AND g.semester = '$semester'
                                                                                                AND g.section = '$section'
                                                                                                AND g.strand = '$strand'
                                                                                                AND g.subject = '$current_subject'
                                                                                                AND g.studentid = '$studentid'
                                                                                                AND g.grading_period = '2nd Grading';");
                                                            if (mysqli_num_rows($second_transmu) != 0) {
                                                                while($transmu_row = mysqli_fetch_array($second_transmu)){ 
                                                                    $s_transmu = $transmu_row['transmu'];
                                                                }
                                                            } else {
                                                                $s_transmu = 0;
                                                            }

                                                            $avg = ($f_transmu + $s_transmu) / 2;
                                                            array_push($grand_avg, $avg);
                                                            
                                                            // display the row
                                                            echo '<tr>
                                                                    <td> ' . $current_subject . ' </td>
                                                                    <td> ' . number_format($f_transmu, 2, '.', '') . ' </td>
                                                                    <td> ' . number_format($s_transmu, 2, '.', '') . ' </td>
                                                                    <td> ' . number_format($avg, 2, '.', '') . ' </td>
                                                                </tr>';            
                                                        }                
                                                    }
                                                ?>


                                                <?php  
                                                    $total_avg = 0;

                                                    foreach ($grand_avg as $average) {
                                                        $total_avg+=$average;
                                                    }

                                                    $general_avg = $total_avg / $subject_count;

                                                ?>
                                                <tr>
                                                    <td class="col table-bordered"><b>General Average for the Semester</b></td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> <?php echo number_format($general_avg, 2, '.', ''); ?> </td>
                                                </tr>


                                            </tbody>

                                        </table> 
                                    </div>
<!--                
                                      <div class="form-group" style="width:500px;padding-top:50px;">
                                      </div> -->

                                     <!-- <center> <h5 class="eform"> REPORT ON ATTENDANCE</h5></center>

                                     <table id="tbl_attendance" class="table table-bordered  table-hover dataTable">
                                        <thead>
                                           <tr>         
                                           <th style="text-align:center;"></th>                               
                                            <th style="text-align:center;">Jun</th>
                                            <th style="text-align:center;">Jul</th>
                                            <th style="text-align:center;">Aug</th>
                                            <th style="text-align:center;">Sept</th>
                                            <th style="text-align:center;">Oct</th>
                                            <th style="text-align:center;">Nov</th>
                                            <th style="text-align:center;">Dec</th>
                                            <th style="text-align:center;">Jan</th>
                                            <th style="text-align:center;">Feb</th>
                                            <th style="text-align:center;">Mar</th>
                                            <th style="text-align:center;">Apr</th>
                                            </tr>

                                            <tr>
                                        <td class="col table-bordered"><b>No. of School Days</b></td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>

                                        </tr>

                                          <tr>
                                        <td class="col table-bordered"><b>No. of Days Present</b></td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>

                                        </tr>

                                          <tr>
                                        <td class="col table-bordered"><b>No. of Days Absent</b></td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>

                                        </tr>
                                        </thead> 
                                        </table> -->

                                    <!-- <div class="form-group" style="width:300px;padding-top:50px;margin-left:300px; ">
                                        <div class="form-line">
                                            <input name="comment" type="text" class="form-control" placeholder="Teacher" style="text-align:center;"   >
                                        </div>
                                       <center> <label>Teacher</label></center>
                                    </div>

                                    <div  class="form-group" style="width:300px;padding-top:20px;margin-left: 300px;">
                                        <div class="form-line">
                                            <input name="comment" type="text" class="form-control" placeholder="Principal" style="text-align:center;"   >
                                        </div>
                                       <center> <label>Principal</label></center>
                                    </div> -->


            <?php include "../modals/add_modals.php"; ?>
            <?php include "../functions/add.php"; ?>
            <?php include "../functions/edit.php"; ?>
            <?php include "../functions/delete.php"; ?>


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

   
         



<style type="text/css">
    @media print{
        nav.navbar,
        aside.sidebar{
            display: none;
        }    

        div.body{
            position: absolute;
            left: 0;
            margin-left: -220px;
            margin-top: -120px;
            width: 120%;
        }
    }

    @media screen{
        nav.navbar{
            /*display: block;*/
        }   
    }
    
</style>