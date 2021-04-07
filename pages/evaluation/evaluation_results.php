<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>

<?php  
    
    $cat = array(
        'Lesson Implementation',
        'Motivation on Student',
        'Maximizing Learning Time',
        'Classroom Time Management',
        'Interaction with students'
    );

    $search_faculty = (isset($_POST['search_faculty'])) ? $_POST['search_faculty'] : '';
    $search_ay = (isset($_POST['search_ay'])) ? $_POST['search_ay'] : '';
    $search_semester = (isset($_POST['search_semester'])) ? $_POST['search_semester'] : '';
?>
              <style>
                  
                  .RS {
                    color: black;
                    padding: 10px;
                    margin-top:100px;
                    display: inline;
                    text-decoration:none;
            
                    text-align: center;

                  }
                  .eform{
                    padding-bottom: 50px;
                    text-align: center;
                  } 
              </style>
            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid">
                    <div class="block-header">
                       <div class="body">
                           
                            <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :green; ">
                                <li><a href="../dashboard/dashboard.php" ">Dashboard</a></li>
                                    <li class="active">Evaluation</li>
                                <li class="active">Evaluation Results</li>
                               
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                    <form method="post">
                                        <!-- table header-->
                                        <div class="row-fluid">
                                            <div class="col-md-4 col-xs-12">
                                                <select class="form-control input-md" name="search_faculty">
                                                    <option value="" selected="" disabled="">-- Select Faculty --</option>
                                                    <?php
                                                      $q = mysqli_query($con,"SELECT * from tblfaculty");
                                                       while($row=mysqli_fetch_array($q)){
                                                            if ($search_faculty == $row['facultyid']) {
                                                                echo '<option value="'.$row['facultyid'].'" selected>'.$row['lname']. ', '.$row['fname'].' </option>';
                                                            } else {
                                                                echo '<option value="'.$row['facultyid'].'">'.$row['lname']. ', '.$row['fname'].' </option>';
                                                            }
                                                        }
                                                     ?>                                         
                                                  </select>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <select class="form-control input-md" name="search_ay">
                                                    <option value="" selected="" disabled="">-- Select AY --</option>
                                                    <?php
                                                        
                                                        for ($i=2014; $i <= DATE('Y'); $i++) { 
                                                            if ($search_ay == ($i .'-'.($i+1))) {
                                                                echo '<option value="'.$i .'-'.($i+1).'" selected>'.$i .'-'.($i+1).' </option>';
                                                            } else {
                                                                echo '<option value="'.$i .'-'.($i+1).'">'.$i .'-'.($i+1).' </option>';
                                                            }
                                                            
                                                        }

                                                    ?>                                         
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <select class="form-control input-md" name="search_semester">
                                                    <option value="" selected="" disabled="">-- Select Semester --</option>
                                                    <option <?php echo ($search_semester == '1st') ? 'selected' : ''; ?> >1st</option>    
                                                    <option <?php echo ($search_semester == '2nd') ? 'selected' : ''; ?> >2nd</option>                                    
                                                </select>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <button type="submit" class="btn btn-link waves-effect" name="btn_search" >SEARCH</button>
                                            </div> 
                                        </div>    

                                        <div class="row-fluid">
                                            <table class="table">
                                                <tr>
                                                    <th>Criteria</th>
                                                    <th>Average</th>
                                                </tr>
                                                <?php foreach ($cat as $category): ?>
                                                    <tr>
                                                        <td><?php echo $category; ?></td>
                                                        <?php  
                                                            $q = mysqli_query($con,"SELECT
                                                                                        AVG(answer) average
                                                                                    FROM
                                                                                        tblevaluation e
                                                                                            LEFT JOIN
                                                                                        tblevaluation_details ed ON ed.evaluationid = e.evaluationid
                                                                                            LEFT JOIN 
                                                                                        tblquestions q ON q.id = ed.question_id
                                                                                    WHERE
                                                                                        e.ay = '$search_ay'
                                                                                            AND e.semester = '$search_semester'
                                                                                            AND e.facultyid = '$search_faculty'
                                                                                        AND q.category = '$category';");

                                                            while($row=mysqli_fetch_array($q)){
                                                                echo '<td>'.$row['average'].' </td>';
                                                            }

                                                        ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </table>
                                        </div>

                                        <div class="row-fluid">
                                            <table class="table">
                                                <tr>
                                                    <th>Total Average</th>
                                                    <?php  
                                                        $q = mysqli_query($con,"SELECT
                                                                                    AVG(answer) average
                                                                                FROM
                                                                                    tblevaluation e
                                                                                        LEFT JOIN
                                                                                    tblevaluation_details ed ON ed.evaluationid = e.evaluationid
                                                                                        LEFT JOIN 
                                                                                    tblquestions q ON q.id = ed.question_id
                                                                                WHERE
                                                                                    e.ay = '$search_ay'
                                                                                        AND e.semester = '$search_semester'
                                                                                        AND e.facultyid = '$search_faculty';");

                                                        while($row=mysqli_fetch_array($q)){
                                                            echo '<th>'.$row['average'].' </th>';
                                                        }
                                                    ?>
                                                </tr>
                                            </table>
                                        </div>
                                        <?php #include "../modals/delete_modals.php"; ?> 
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

  