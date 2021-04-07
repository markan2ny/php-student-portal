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
    $search_student = (isset($_POST['search_student'])) ? $_POST['search_student'] : '';
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
                                <li><a href="../dashboard/dashboard.php">Dashboard</a></li>
                                    <li class="active">Evaluation</li>
                                <li class="active">Evaluation Form</li>
                               
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body">
                                <form method="post">
                                        <!-- table header-->
                                        <div class="table-header">
                                        <h2 class="eform"> Evaluation Form</h2>
                                        </div>
                                         <h4 style="text-align:center;"> Rating Scale</h4>
                                        <div class="RS">
                                        <ul >
                                            <li class="RS" >1 - Outstanding</li>
                                            <li class="RS">2 - Highly Satisfactory</li>
                                            <li class="RS">3 - Satisfactory</li>
                                            <li class="RS">4 - Need Improvement</li>
                                        </ul>
                                        </div>

                                        <div class="row-fluid">
                                            <div class="col-md-3 col-xs-12">
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
                                                <select class="form-control input-md" name="search_student">
                                                    <option value="" selected="" disabled="">-- Select Student --</option>
                                                    <?php
                                                      $q = mysqli_query($con,"SELECT * from tblstudent");
                                                       while($row=mysqli_fetch_array($q)){
                                                            if ($search_student == $row['studentid']) {
                                                                echo '<option value="'.$row['studentid'].'" selected>'.$row['lname']. ', '.$row['fname'].' </option>';
                                                            } else {
                                                                echo '<option value="'.$row['studentid'].'">'.$row['lname']. ', '.$row['fname'].' </option>';
                                                            }
                                                        }
                                                     ?>                                         
                                                  </select>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
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
                                            <div class="col-md-2 col-xs-12">
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

                                        <table id="dttbl" class="table table-bordered  table-hover dataTable">
                                            <thead>
                                               <tr>
                                                <th colspan="2" style="text-align:center;" class="col table-bordered"><h4>Criteria</h4></th>
                                               
                                                <th >1</th>
                                                <th >2</th>
                                                <th >3</th>
                                                <th >4</th>
                                                 </tr>
                                            

                                            </thead> 
                                            <tbody>

                                                    
                                                    <?php foreach ($cat as $catrow): ?>
                                                       <?php  
                                                            $category = $catrow;
                                                            $qquery = mysqli_query($con,"SELECT
                                                                                                e.*,
                                                                                                ed.*,
                                                                                                q.*,
                                                                                                q.id question_id
                                                                                            FROM
                                                                                                tblevaluation e
                                                                                                    LEFT JOIN
                                                                                                tblevaluation_details ed ON ed.evaluationid = e.evaluationid
                                                                                                    LEFT JOIN 
                                                                                                tblquestions q ON q.id = ed.question_id
                                                                                            WHERE
                                                                                                e.ay = '$search_ay'
                                                                                                    AND e.semester = '$search_semester'
                                                                                                    AND e.studentid = '$search_student'
                                                                                                    AND e.facultyid = '$search_faculty'
                                                                                                AND q.category = '$category';");


                                                       ?>
                                                       <tr >
                                                            <th rowspan="6" style="width:5px;text-align:center;border"><h4><?php echo $catrow; ?></h4> </th>
                                                        </tr>        
                                                        <?php while ($row = mysqli_fetch_array($qquery)): ?>
                                                            <tr >
                                                                <td><?php echo $row['criteria']; ?></td>
                                                                <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['question_id'];?>" value="1" class="cbxMain" <?php echo ($row['answer'] == 1) ? 'checked' : ''; ?> disabled/> </td>
                                                                <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['question_id'];?>" value="2" class="cbxMain" <?php echo ($row['answer'] == 2) ? 'checked' : ''; ?> disabled/></td>
                                                                <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['question_id'];?>" value="3" class="cbxMain" <?php echo ($row['answer'] == 3) ? 'checked' : ''; ?> disabled/></td>
                                                                <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['question_id'];?>" value="4" class="cbxMain" <?php echo ($row['answer'] == 4) ? 'checked' : ''; ?> disabled/></td>
                                                            </tr>
                                                            <?php $comment = $row['comment']; ?>
                                                        <?php endwhile ?>
                                                    <?php endforeach ?>

                                                     
                                                    <?php #echo $_POST['selection']; ?>




                                            </tbody>
                                        </table>  

                                     <div class="form-group" style="width:500px;padding-top:50px;">
                            <label>Your Commet Here</label>
                            <div class="form-line">
                                <input name="comment" type="text" class="form-control" placeholder="Type here.........." readonly value="<?php echo (isset($comment)) ? $comment : ''; ?>">
                            </div>
                        </div>

                                 <!--   <button style="margin-left:700px;" data-target="" data-toggle="modal" class="btn btn-primary btn-lg  waves-effect">Submit</button>-->

                                <?php include "../modals/delete_modals.php"; ?> 
                                     
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

    <style type="text/css">
    input[type="radio"]{
        display: inline-block;
    }
    </style>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include "../footer.php"; ?>

  