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
                       <ol class="breadcrumb breadcrumb-col-purple " style="margin-bottom: 10px; ">
                                <li class="active"><a href="../../pages/dashboard/dashboard.php">Dashboard</a></li>
                                <li class="active">Import</li>
                                 <li class="active">Import Grades</li>
                            </ol>  
                       
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body" class="a">
                                     <form    action="../../IMPORT/imports/import.php" method="POST" enctype="multipart/form-data"> 

                                     <select name="school_year" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required>
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

                                         <select name="grading_period" id="grading_period" style="width:200px;"  aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required="">
                                                       <option selected disabled>-- Grading Period--</option>
                                                     <!--  <option>1st Grading</option>
                                                        <option>2ndGrading</option>
                                                          <option>3rd Grading</option>
                                                            <option>4th Grading</option>
                                                      
                                                       -->
                                                                                                       
                                         </select>

                                        <select name="strand" style="width:200px;" aria-controls="dttbl" data-style="btn-primary" class="form-control input-md" required="">
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
                                       
                  
                                         
                                  <!-- import/Export of exel-->
                                
                                        
                                        <input  class="form-control input-md" type="file" name="fileToUpload" id="fileToUpload" required><br>
                                         <input class="btn btn-success"  type="submit" value="Upload File" name="submit">
                                         </div>
                                         </form>                      
                                        
                                 
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
