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
                         
                        <div class="body">
                           
                            <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :green; ">
                                <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                    <li class="active">Grading</li>
                                <li class="active">Submitted Grades</li>
                               
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card" style="padding-top: 10px;">
                                <div class="col-xs-12">
                                     <form method="POST" enctype="multipart/form-data"> 

                                     <select name="strand" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required="">
                                                    <option value="" selected="" disabled="">--Strand--</option>
                                                     <?php

                                                    $strand= mysqli_query($con,"SELECT *,strand from tblstrand");
                                                    while($row=mysqli_fetch_array($strand)){
                                                        echo '<option>'.$row['strand'].' </option>';
                                                    }
                                                ?> 
              
                                     </select>

                                     <select name="ay" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required>
                                                        <option  selected disabled>--School Year--</option>  
                                                           <?php
                                        
                                        for ($i=2014; $i <= DATE('Y'); $i++) { 
                                            echo '<option value="'.$i .'-'.($i+1).'">'.$i .'-'.($i+1).' </option>';
                                        }

                                     ?>            
                                                      
                                        </select>

                                        

                                        <select name="semester" id="semester" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required="">
                                                        <option  selected="" disabled="">--Semester--</option>  
                                                        <option value="1st">1st</option>
                                                        <option value="2nd">2nd</option>                                      
                                        </select>

                                        
                                        <select name="year_level" id="year_level" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required="">
                                                        <option  selected="" disabled="">--Year Level--</option>  
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>                                      
                                        </select>                                        
                                        

                                         <select name="section" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md">
                                        <option value="" selected="" disabled="" required>--Section--</option>  
                                                        <option>1</option>
                                                        <option>2</option>
                                                          <option>3</option>
                                                            <option>4</option>
                                                              <option>5</option>
                                                                                  
                                            </select>

                                        
                                            <input class="btn btn-success"  style="margin-left: 100px; width:100px;" type="submit" value="Search" name="btn_search">
                                            </form>                      
                                            
                                        </div>
                                        
                                        <?php if (isset($_POST['btn_search'])): ?>
                                            <?php  
                                                $strand = $_POST['strand'];
                                                $ay = $_POST['ay'];
                                                $semester = $_POST['semester'];
                                                $section = $_POST['section'];
                                                $year_level = $_POST['year_level'];


                                                $qstudents = mysqli_query($con, "SELECT * FROM tblstudent 
                                                                                WHERE strand = '$strand'
                                                                                AND ay = '$ay' 
                                                                                AND semester = '$semester'
                                                                                AND section = '$section'
                                                                                AND year_level = '$year_level'; ");

                                                $qsubjects = mysqli_query($con,"SELECT 
                                                                            *,
                                                                            CONCAT(s.classstart, ' - ', s.classend) time
                                                                        FROM
                                                                            tblschedule s
                                                                            LEFT JOIN tblfaculty f ON f.facultyid = s.facultyid
                                                                        WHERE s.ay = '$ay'
                                                                        AND s.year_level = '$year_level'
                                                                        AND s.section = '$section'
                                                                        AND s.semester = '$semester'
                                                                        AND s.strand = '$strand';");

                                            ?>
                                            <table class="table">
                                                <tr>
                                                    <th>Student Name</th>
                                                    <?php  
                                                        $subjects = array();

                                                        if (mysqli_num_rows($qsubjects) != 0) {
                                                            while ($sjrow = mysqli_fetch_array($qsubjects)) {
                                                            
                                                                echo '<td>' . $sjrow['subjectcode'] . '</td>';

                                                                array_push($subjects, $sjrow['subjectcode']);
                                                            }
                                                        }
                                                    ?>
                                                    <th>Average</th>
                                                </tr>
                                                <?php  

                                                    if (mysqli_num_rows($qstudents) != 0) {
                                                        while ($student_row = mysqli_fetch_array($qstudents)) {
                                                            // open a row
                                                            echo '<tr>';
                                                            
                                                            $grand_avg = 0;
                                                            $avg_count = 0;

                                                            $studentid = $student_row['studentid'];

                                                            echo '<td>' . $student_row['lname'] . ', '. $student_row['fname'] . ' ' . $student_row['mname'] . '</td>';
                                                                    

                                                                foreach ($subjects as $current_subject) {
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

                                                                    $average = ($f_transmu + $s_transmu) / 2;

                                                                    $grand_avg+=$average;
                                                                    $avg_count++;

                                                                    echo '<td>' . number_format($average, 2, '.', '') . '</td>';
                                                                }
                                                            


                                                            

                                                            echo '<td>' . number_format(($grand_avg/$avg_count), 2, '.', '') . '</td>';

                                                            echo '</tr>';
                                                        }
                                                    }
                                                ?>
                                                
                                            </table>                                         
                                        <?php endif ?>


                                        <table class="table"></table>
                                          
                                 
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
 
  $(document).on('change','#semester',function(){
    if ($('#semester').val()=='1st') {
        $('#grading_period').html(' <option selected disabled>-- Grading Period--</option>')
         $('#grading_period').append('<option>1st Grading</option')
          $('#grading_period').append('<option>2nd Grading</option>')
        }
       else if($('#semester').val()=='2nd'){
            $('#grading_period').append('<option>3rd Grading</option')
            $('#grading_period').append('<option>4th Grading</option>')
       }

   })

     
</script>
