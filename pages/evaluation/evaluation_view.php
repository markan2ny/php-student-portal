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

   $studentid = $_SESSION['userid'];

   // get the details of the student to use for filtering faculty
   $squery = mysqli_query($con,"SELECT * FROM tblstudent WHERE studentid='$studentid';");
   while($row=mysqli_fetch_array($squery)){
        $search_ay = $row['ay'];
        $search_year_level = $row['year_level'];
        $search_section = $row['section'];
        $search_semester = $row['semester'];

    }

   $sheet = (mysqli_query($con,"SELECT * FROM tblevaluation WHERE studentid='$studentid' ORDER BY id ASC;"));

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
                        <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :black; ">
                                  <li class="active"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                               <li>Evaluation</li>
                           
                            </ol>
                      <span><h4>Evaluation Sheet</h4></span>
                    </div>
                    <div class="row clearfix" >
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
                                            <li class="RS" >4 - Outstanding</li>
                                            <li class="RS">3 - Highly Satisfactory</li>
                                            <li class="RS">2 - Satisfactory</li>
                                            <li class="RS">1 - Need Improvement</li>
                                        </ul>
                                        </div>
                                       
                                        <div class="row-fluid">
                                            <div class="col-md-12 col-xs-12">
                                                <select style=""  aria-controls="dttbl" data-style="btn-primary" id="search_faculty" name="search_faculty" class="form-control input-md">
                                                    <option value="" selected="" disabled="">-- Select Instructor --</option>
                                                    <?php
                                                        $q = mysqli_query($con,"SELECT DISTINCT
                                                                                    (f.facultyid) faculty_id,
                                                                                    CONCAT(f.lname, ', ', f.fname, ' ', f.mname) name,
                                                                                    e.*
                                                                                FROM
                                                                                    tblschedule sc
                                                                                        LEFT JOIN
                                                                                    tblfaculty f ON f.facultyid = sc.facultyid
                                                                                        LEFT JOIN
                                                                                    tblevaluation e ON e.facultyid = f.facultyid
                                                                                WHERE
                                                                                    sc.ay = '$search_ay'
                                                                                        AND sc.year_level = '$search_year_level'
                                                                                        AND sc.section = '$search_section'
                                                                                        AND sc.semester = '$search_semester'
                                                                                        AND e.evaluationid IS NULL;");

                                                        while($row=mysqli_fetch_array($q)){
                                                            echo '<option value="'.$row['faculty_id'].'">'.$row['name'].' </option>';
                                                        }
                                                    ?>                                         
                                                </select>
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
                                                        $qquery = (mysqli_query($con,"SELECT * FROM tblquestions WHERE category='$category' ORDER BY id ASC;"));

                                                   ?>
                                                   <tr >
                                                        <th rowspan="6" style="width:5px;text-align:center;border" ;><h4><?php echo $catrow; ?></h4> </th>
                                                    </tr>        
                                                    <?php while ($row = mysqli_fetch_array($qquery)): ?>
                                                        <tr >
                                                            <td><?php echo $row['criteria']; ?></td>
                                                            <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['id'];?>" value="1" class="cbxMain"/> </td>
                                                            <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['id'];?>" value="2" class="cbxMain"/></td>
                                                            <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['id'];?>" value="3" class="cbxMain"/></td>
                                                            <td style="width: 5px !important;"><input type="radio" name="selection<?php echo $row['id'];?>" value="4" class="cbxMain"/></td>
                                                        </tr>

                                                    <?php endwhile ?>
                                                <?php endforeach ?>

                                                 
                                                <?php #echo $_POST['selection']; ?>




                                        </tbody>
                                    </table> 
                        <div class="form-group" style="width:500px;padding-top:50px;">
                             <label>Your Commet Here</label>
                                <div class="form-line">
                                <input name="txt_comment" type="text" class="form-control" placeholder="Type here..........">
                            </div>
                            <?php if ($sheet == FALSE) : ?>
                               <button style="margin-left:850px;" data-target="" data-toggle="modal" class="btn btn-primary btn-lg  waves-effect" name="btn_evaluation">Submit </button>
                            <?php endif ?>
                        </div>

                                

                                <?php include "../modals/delete_modals.php"; ?> 
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end container-->
            
                <script type="text/javascript">
                    $(document).ready(function(){

                        $(document).on('change', '#search_faculty', function(){
                            //get_faculty_sched($(this).find('option:selected').attr('value'), $('#search_subject'));
                        });

                    });
                </script>
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

  