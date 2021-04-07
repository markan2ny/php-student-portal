<?php 


    include "../../pages/header.php"; 
   include "../../pages/connection.php";

    if (!empty($_FILES["fileToUpload"]['tmp_name'])) {

       session_start();

        //  Include PHPExcel_IOFactory
        include_once('../phpExcel/Classes/PHPExcel.php');
        include '../phpExcel/Classes/PHPExcel/IOFactory.php';

        $counter = 0;
        // get the temporary location
        $inputFileName = $_FILES["fileToUpload"]["tmp_name"];

        // identify file extension
        $target_file = 'imports/'.basename($_FILES["fileToUpload"]["name"]);
        $inputFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // echo $inputFileType;
        $uploadOk = true;
        $error = '';
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2048000) {
            $error = $error.'<br> Sorry, large excel file is not allowed. You are suspicious!';
            $uploadOk = false;
        }

        // Allow certain file formats
        if($inputFileType != "xlsx") {
            $error = $error.'<br> Sorry, only excel file with .xlsx file extension (MS Office 2007 +/ Excel Workbook) is allowed.';
            $uploadOk = false;
        }

        if ($uploadOk) {
        
            //  Read the Excel workbook
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();

            //  Loop through each row of the worksheet in turn
            for ($row = 1; $row <= $highestRow; $row++){ 
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);


                //check if there is a student_no exist
                
                if (is_numeric($rowData[0][0])) {
                    // do sql insert of row here

                    // just to display the array per row 
                    // var_dump($rowData);
                    $schoolyear = $_POST['school_year'];
                    $semester = $_POST['semester'];
                    $grading_period = $_POST['grading_period'];
                     $facultyid = $_SESSION['facultyid'];
                     $faculty = $_SESSION['faculty'];
                    $subject = $_POST['subject'];
                    $section = $_POST['section'];
                    $strand = $_POST['strand'];
                      $id  =    $rowData[0][0];
                   $studentid   =   $rowData[0][1];
                    $student    =  $rowData[0][2];
                    $ww_s1 =  $rowData[0][3];
                    $ww_s2 =   $rowData[0][4];
                    $ww_total =$rowData[0][5];
                    $ww_percent = $rowData[0][6];
                    $mt_1   =   $rowData[0][7];
                    $mt_2   =   $rowData[0][8];
                    $mt_3   =   $rowData[0][9];
                    $mt_4   =   $rowData[0][10];
                     $mt_5   =   $rowData[0][11];
                     $mt_total  =   $rowData[0][12];
                     $mt_percent   =    $rowData[0][13];
                     $pt_self   =   $rowData[0][14];
                     $pt_tg1    =   $rowData[0][15];
                    $pt_peer   =   $rowData[0][16];
                    $pt_tg2    =   $rowData[0][17];
                    $pt_teacher = $rowData[0][18];
                     $pt_tg3    =   $rowData[0][19];
                     $pt_percent =  $rowData[0][20];
                     $qa_total  =   $rowData[0][21];
                     $qa_percent =   $rowData[0][22];
                    $total_raw =      $rowData[0][23];
                    $transmu = $rowData[0][24];
                
                

            $qry = mysqli_query($con,"INSERT into tblgrade (id,school_year,semester,grading_period,facultyid,faculty,subject,section,strand,studentid,student,ww_s1,ww_s2,ww_total,ww_percent,mt_1,mt_2,mt_3,mt_4,mt_5,mt_total,mt_percent,pt_self,pt_tg1,pt_peer,pt_tg2,pt_teacher,pt_tg3,pt_percent,qa_total,qa_percent,total_raw,transmu) 
                values('$id',
                '$schoolyear',
                '$semester',
                '$grading_period',
                '$facultyid',
                '$faculty',
                '$subject',
                '$section',
                '$strand',
                '$studentid',
                '$student',
                '$ww_s1',
                '$ww_s2',
                '$ww_total',
                '$ww_percent',
                '$mt_1',
                '$mt_2',
                '$mt_3',
                '$mt_4',
                '$mt_5',
                '$mt_total',
                '$mt_percent',
                '$pt_self',
                '$pt_tg1',
                '$pt_peer',
                '$pt_tg2',
                '$pt_teacher',
                '$pt_tg3',
                '$pt_percent',
                '$qa_total',
                '$qa_percent',
                '$total_raw',
                '$transmu') ");
            
                 if($qry == false){
         
            header ("location: ".$_SERVER['REQUEST_URI']);
            exit;
                 
          
    }
        
        }

                //  Insert row data array into your database of choice here
                // var_dump($rowData);



            }
          }
          }      // echo "true";

            // if ($counter != 0) {
            //     echo "true";
            //     // echo $counter;
            // } else {
            //     echo "No record updated. There are some problem in your excel file.";
            // }

        //} else { 

          //  echo $error;

        //}//end of upload ok



    //} else {
      //  echo "Please browse your file first!";
    //}

?>

    <div class="content" style="margin-top:120px">
          
                <div class="container-fluid">
                    <div class="block-header">
                        <ol class="breadcrumb breadcrumb-col-purple " style="margin-bottom: 10px; ">
                                <li class="active"><a href="../../pages/dashboard/dashboard.php">Dashboard</a></li>
                                <li class="active">Grades</li>
                                 <li class="active">View Grades</li>
                            </ol>
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

    <script>
        $(document).ready(function() {
            $('#dttbl').DataTable( {
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,2 ] } ],"aaSorting": []
            } );
        } ); 
    </script>
         
