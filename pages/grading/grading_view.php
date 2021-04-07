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
                         
                     
    <div class="content" style="margin-top:120px">
          
                <div class="container-fluid">
                    <div class="block-header">
                        
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 ">
                            <div class="card">
                                <div class="body">
                                
                            
                                <form method="post">
                                        <label>View By :</label> 
                         <select name="school_year" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required>
                                                        <option  selected disabled>--School Year--</option>  
                                                           <?php
                                        
                                        for ($i=2014; $i <= DATE('Y'); $i++) { 
                                            echo '<option value="'.$i .'-'.($i+1).'">'.$i .'-'.($i+1).' </option>';
                                        }

                                     ?>            
                                                      
                                        </select>

                                        

                                        <select name="semester" id="semester" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required>
                                                        <option  selected="" disabled="">--Semester--</option>  
                                                        <option value="1st">1st</option>
                                                        <option value="2nd">2nd</option>                                      
                                        </select>

                                         <select name="grading_period" id="grading_period" style="width:200px;"  aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" riquired >
                                                       <option selected disabled>-- Grading Period--</option>
                                                     <!--  <option>1st Grading</option>
                                                        <option>2ndGrading</option>
                                                          <option>3rd Grading</option>
                                                            <option>4th Grading</option>
                                                      
                                                       -->
                                                                                                       
                                         </select>

                                        <select name="strand" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required>
                                                        <option value="" selected="" disabled="">--Strand--</option>
                                                         <?php

                                                        $strand= mysqli_query($con,"SELECT *,strand from tblstrand");
                                                        while($row=mysqli_fetch_array($strand)){
                                                            echo '<option>'.$row['strand'].' </option>';
                                                        }
                                                    ?> 
                  
                                         </select>

                                         <select name="section" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md">
                                        <option value="" selected="" disabled="" required>--Section--</option>  
                                                        <option>1</option>
                                                        <option>2</option>
                                                          <option>3</option>
                                                            <option>4</option>
                                                              <option>5</option>
                                                                                  
                                            </select>

                                        <select name="subject" style="width:300px;margin-left:40px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required>

                                                        <option value="" selected="" disabled="">--Subject--</option>  
                                                         <?php

                                                        $subject = mysqli_query($con,"SELECT *,subjectname from tblsubjects");
                                                        while($row=mysqli_fetch_array($subject)){
                                                            echo '<option>'.$row['subjectname'].' </option>';
                                                        }
                                                    ?> 

                                        </select>
                            <input class="btn btn-primary"  type="submit"  name="search_grade" >
                                    <table id="dttbl" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead style="border:collapse">
                                
                                            <th >Student Id</th>
                                            <th >Student Name</th>
                                            <th colspan="4" style="text-align: center">Writen Works</th>

                                            <th colspan="7" style="text-align: center">Minitask</th>
                                            <th colspan="7" style="text-align: center">Performance</th>
                                             <th colspan="2">Quarterly Assesment</th>
                                           
                                               <th >Total Raw Score</th>
                                               <th  >Transmu</th>
                                              
                                          
                                        </thead> 
                                        <tbody>
                                           
                                           <?php
                                           
                                    
                                   
                                 
                                      if(isset($_POST['search_grade'])){                                   
                                           $school_year = $_POST['school_year'];
                                           $semester = $_POST['semester'];
                                           $grading_period = $_POST['grading_period'];
                                             $strand = $_POST['strand'];
                                            $section = $_POST['section'];
                                             $subject = $_POST['subject'];

                                       

                                            $grade = mysqli_query($con,"SELECT * from tblgrade where 
                                                                            school_year = '$school_year'and
                                                                             semester = '$semester' and
                                                                             grading_period = '$grading_period'and
                                                                            strand = '$strand' and
                                                                            section = '$section' and
                                                                            subject = '$subject'
                                                                            ");
                                            while($row = mysqli_fetch_array($grade)){
                                                echo '
                                                 <tr>
                                              
                                                <td>'.$row['studentid'].'</td>
                                                <td>'.$row['student'].'</td>
                                                 <td>'.$row['ww_s1'].'</td>
                                                <td>'.$row['ww_s2'].'</td>
                                                <td>'.$row['ww_total'].'</td>
                                                <td>'.$row['ww_percent'].'</td>
                                                <td>'.$row['mt_1'].'</td>
                                                <td>'.$row['mt_2'].'</td>
                                                <td>'.$row['mt_3'].'</td>
                                                <td>'.$row['mt_4'].'</td>
                                                 <td>'.$row['mt_5'].'</td>
                                                <td>'.$row['mt_total'].'</td>
                                                 <td>'.$row['mt_percent'].'</td>
                                                <td>'.$row['pt_self'].'</td>
                                                <td>'.$row['pt_self'].'</td>
                                                 <td>'.$row['pt_tg1'].'</td>
                                                <td>'.$row['pt_peer'].'</td>
                                                <td>'.$row['pt_tg2'].'</td>
                                                <td>'.$row['pt_teacher'].'</td>
                                                <td>'.$row['pt_tg3'].'</td>
                                                <td>'.$row['qa_total'].'</td>
                                                <td>'.$row['qa_percent'].'</td>
                                                <td>'.$row['total_raw'].'</td>
                                                <td>'.$row['transmu'].'</td>
                                                   
                                                </tr>';
                                            }
                                        }
                                            ?>

                                        </tbody>
                                    </table> 

                            

                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end container-->
    
            

            </div>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->        
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

<style>
    label,select,input{
     float: left;
        margin-bottom:50px;
        margin-left: 100px;
    
    
    }
    
</style>

