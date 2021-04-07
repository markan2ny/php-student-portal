<?php 
session_start();
ob_start();
    include "../header.php"; 
    include "../connection.php";    

    $total_quantity = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent;"));
    // var_dump($total_quantity);
    $grade_11 = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where year_level=11;"));
    $grade_12 = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where year_level=12;"));

    $grade_11f = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where gender='Female' and year_level=11;"));
    $grade_11m = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where gender='Male' and year_level=11;"));
    $grade_12f = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where gender='Female' and year_level=12;"));
    $grade_12m = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where gender='Male' and year_level=12;"));
    $stem = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where strand = 'STEM';"));
    $abm = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where strand  = 'ABM';"));
    $hes = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where strand  = 'HES';"));
    $ict = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where strand  = 'ICT';"));
    $humms = mysqli_fetch_array(mysqli_query($con, "Select count(*) total_quantity from tblstudent where strand  = 'HUMMS';"));

    $ay = DATE('Y') . '-' . (DATE('Y')+1);
    
    echo $total_quantity['total_quantity'];
?>
<style>
.bg-dash {
 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: right 1% bottom 0%;
    width:100%;
    overflow:hidden;
    color: black;
    height: 430px;
}
.j-box{
    color: #000000;
    height: 150px;
    text-align: center;
    border: solid 5px #e9e9e9;
    background-color: #ffffff;
    padding: 10px;
    margin-top: -35px;
}

.j-box-gender{
    color: #000000;
    height: 130px;
    text-align: center;
    border: solid 5px #e9e9e9;
    background-color: #ffffff;
    padding: 10px;
    margin-top: -5px;


}

.j-box .j-label {
    font-weight: bold;


}

.j-box .percentage {
    font-weight: bold;
    font-size: 60px;
    color: #b535cb;
}


.j-box-gender .grade_11f, .grade_11m, .grade_12f, .grade_12m {
    font-weight: bold;
    font-size: 30px;
    color: #b535cb;
    text-align: center; 
}

.j-box-gender .j-female, .j-male{
    font-size: 13px;
    font-weight: bold;
    text-align: center; 
}


.jtable{
    margin-top: 20px;
    text-align: center;cccc
}
.jtable thead th{
    text-align: center;
    font-size: 20px;
    color: #b535cb;
}

.jtable tbody td{
    text-align: center;
    font-size: 19px;
}
</style>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
             
            <!-- START CONTENT -->
            <section class="content">
            <?php include "../modals/account_modal.php"; ?>
                <div class="container-fluid ">
                    <div class="block-header" >
                            
                  
                    
                    </div>

                    <!-- Widgets -->
                    <div class="row clearfix">

                  <?php
                        if($_SESSION['role'] == "Administrator"){
                    ?>
                        <!-- design ni Irmaganda Here -->                
                        <div class="col-xs-6 j-box">
                            <span class="j-label">NUMBER OF GRADE 11 <br>STUDENTS</span>
                            <br>
                            <span class="percentage"><?php echo number_format($grade_11['total_quantity']); ?></span>
                        </div> 

                        <div class="col-xs-6 j-box">
                            <span class="j-label">NUMBER OF GRADE 12 <br>STUDENTS</span>
                            <br>
                            <span class="percentage"><?php echo number_format($grade_12['total_quantity']); ?></span>
                            
                        </div>
                    
   

                        <div class="col-xs-3 j-box-gender">   
                            <span class="j-female">NUMBER OF FEMALE GRADE 11 <br>STUDENTS</span>
                            <br>
                            <br>
                            <span class="grade_11f"><?php echo number_format($grade_11f['total_quantity']); ?></span>
                        </div>

                        <div class="col-xs-3 j-box-gender">   
                            <span class="j-male">NUMBER OF MALE GRADE 11 <br>STUDENTS</span>
                            <br>
                            <br>
                            <span class="grade_11m"><?php echo number_format($grade_11m['total_quantity']); ?></span>
                        </div>
                        <div class="col-xs-3 j-box-gender">   
                            <span class="j-female">NUMBER OF FEMALE GRADE 12 <br>STUDENTS</span>
                            <br>
                            <br>
                            <span class="grade_12f"><?php echo number_format($grade_12f['total_quantity']); ?></span>
                        </div>

                        <div class="col-xs-3 j-box-gender">   
                            <span class="j-male">NUMBER OF MALE GRADE 12 <br>STUDENTS</span>
                            <br>
                            <br>
                            <span class="grade_12m"><?php echo number_format($grade_12m['total_quantity']); ?></span>
                        </div>

                        
                        <div class="col-xs-8 col-xs-offset-2">
                        <table  class="table table-bordered table-striped jtable" >
                            <thead>
                                <tr>
                                <th> STRAND</th>
                                <th> NUMBER OF STUDENTS</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> ABM </td>
                                    <td> <?php echo $abm['total_quantity']; ?> </td>
                                </tr>

                                 <tr>
                                    <td> HUMMS </td>
                                    <td> <?php echo $humms['total_quantity']; ?> </td>
                                </tr>

                                <tr>
                                    <td> STEM </td>
                                    <td> <?php echo $stem['total_quantity']; ?> </td>
                                </tr>

                                 <tr>
                                    <td> ICT </td>
                                    <td> <?php echo $ict['total_quantity']; ?> </td>
                                </tr>

                               <tr>
                                    <td> HES </td>
                                    <td> <?php echo $hes['total_quantity']; ?> </td>
                                </tr>

                            </tbody>
                        </table>
                        </div>
                        <!-- design ni Irmaganda Here -->
                        <!-- administrator -->
                        
                    <?php
                        }
                    else if ($_SESSION['role'] == "Faculty"){
                    ?>

                        <?php  
                            $facultyid = $_SESSION['userid'];
                            $faculty_first_sub = (mysqli_query($con, "Select subjectcode from tblschedule where facultyid = '$facultyid' and ay = '$ay' and semester = '1st';"));
                            $faculty_second_sub = (mysqli_query($con, "Select subjectcode from tblschedule where facultyid = '$facultyid' and ay = '$ay' and semester = '2nd';"));
                        
                        ?>
                       <!--  <div class="col-xs-6 j-box">
                            <span class="j-label">LIST OF SUBJECTS</span>
                            <br>
                            <?php if (mysqli_num_rows($faculty_first_sub)!=0): ?>
                                <?php 
                                while ($row = mysqli_fetch_array($faculty_first_sub)) {
                                    echo '<span class="subject">'.$row['subjectcode'].'</span>';
                                    echo '<br>';
                                }
                                 ?>
                            <?php endif ?>
                            
                        </div>  -->
                    
                        <!-- faculty -->

                    <?php
                        }
                    else if ($_SESSION['role'] == "Student"){
                        
                        ?>
                     <!--    <div class="col-xs-6 j-box">
                            <span class="j-label">NUMBER OF GRADE 11 <br>STUDENTS</span>
                            <br>
                            <span class="percentage"><?php echo number_format($grade_11['total_quantity']); ?></span>
                        </div>  -->


                    <?php
                        }
                    else if ($_SESSION['role'] == ""){}
                        
                        ?>
                        
                    

                </div>

                </div>
                
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
        $(document).ready(function() {
            $('#dttbl').DataTable( {
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,2 ] } ],"aaSorting": []
            } );
        } ); 
    </script>
         