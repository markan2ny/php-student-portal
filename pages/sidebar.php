<?php
    include "connection.php";

  $config = mysqli_query($con,"SELECT * from tblconfiguration where config_name = 'evaluation' ");
  $row = mysqli_fetch_array($config);
  $evaluation = $row['config_value'];

  #echo $evaluation;
  
?>

<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
           <div class="user-info" style="height: 85px;">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <?php

                            if($_SESSION['role'] == "Administrator")
                            {
                                $p = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                                $row = mysqli_fetch_array($p);
                                echo 'Administrator';
                                
                            }
                            else if($_SESSION['role'] == "Faculty"){
                                $p = mysqli_query($con,"SELECT * from tblfaculty where facultyid = '".$_SESSION['userid']."' ");
                                $row = mysqli_fetch_array($p);
                                echo $row['lname'].', '.$row['fname'];
                            }
                             else if($_SESSION['role'] == "Student"){
                                $p = mysqli_query($con,"SELECT * from tblstudent where studentid = '".$_SESSION['userid']."' ");
                                $row = mysqli_fetch_array($p);
                                echo $row['lname'].', '.$row['fname'];
                            }


                        ?>


                    </div>
                    <div  class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#AccountModal" data-target="#AccountModal" data-toggle="modal"><i class="material-icons">settings</i>Account</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu" >
                <ul class="list" class="">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php
                    if($_SESSION['role'] == "Administrator")
                    {
                    ?>
                        <li>
                            <a href="../../pages/dashboard/dashboard.php">
                                <i class="material-icons">dashboard</i>
                                <span>Dashboard</span>
                            </a>
                        </li >
                       
                        <li >
                            <a  href="javascript:void(0);" class="menu-toggle"><i class="material-icons">people</i><span>Users<span></a>
                            <ul class ="ml-menu">
                                <li>
                                    <a href="../../pages/student/students.php"   >
                                    <span>Student</span></a>
                                </li>
                                <li>
                                    <a href="../../pages/instructor/instructor.php">
                                    <span>Instructor</span></a>
                                </li>                                   
                            </ul>
                        </li>

                        <li>
                                   <a  href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">schedule</i><span>Schedule<span></a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../../pages/schedule/schedule_student.php"   >
                                    <span>Student</span></a></li>
                                <li >
                                    <a href="../../pages/schedule/schedule_faculty.php">
                                    <span>Instructor</span></a></li>
                            </ul>
                        </li>
                        
                        <li >
                                   <a  href="javascript:void(0);" class="menu-toggle"><i class="material-icons">event_available</i><span>Grading<span></a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../../pages/grading/grading_summary.php"   >
                                    <span>Submitted Grades</span></a></li>
                                <li >
                                    <a href="../../pages/grading/grading_admin.php">
                                    <span>Student Grades</span></a>
                                    </li>
                            </ul>
                       </li>

                      
                        <li ><!-- Link with dropdown items -->
                                  <a  href="javascript:void(0);" class="menu-toggle"><i class="material-icons">question_answer</i><span>Evaluation<span></a>
                            <ul class="ml-menu">
                                <li >
                                    <a href="../../pages/evaluation/evaluation_form.php"   >
                                    <span>Evaluation Form</span></a></li>
                                <li >
                                    <a href="../../pages/evaluation/evaluation_results.php">
                                    <span>Evaluation Results</span></a>
                                    </li>
                                <li>
                                    <a href="../../pages/evaluation/evaluation_settings.php">
                                    <span>Settings</span></a>
                                    </li>
                            </ul>
                       </li>

                    
                           <li >
                            <a  href="javascript:void(0);" class="menu-toggle"><i class="material-icons">build</i><span>Data Entry<span></a>
                            <ul class="ml-menu">
                               
                                     <li>
                                    <a  href="../../pages/subjects/subjects.php" > 
                                    <span>Subject</span></a></li>
                               </ul>
                       </li>
                               

                        <li >
                                  <a  href="javascript:void(0);" class="menu-toggle"><i class="material-icons">archive</i><span>Archive<span></a>
                            <ul class="ml-menu">
                                <li >
                                    <a href="../../pages/student/students_archive.php">
                                 <span>Students</span></a>
                                           
                                <li >
                                   <a href="../../pages/instructor/instructor_archive.php">
                                    <span>Instructors</span></a>
                                    </li>
                               
                            </ul>
                       </li>
                     
                        

                    <?php
                    }
                     else if($_SESSION['role'] == "Faculty")
                    {
                    ?>

                        <li ><!-- Link with dropdown items -->
                            <a  href="javascript:void(0);" class="menu-toggle"><i class="material-icons">file_upload</i><span>Grades<span></a>
                            <ul class="ml-menu">
                                <li >
                                    <a href="../../pages/grading/grading.php"   >
                                    <span>Import</span></a>
                                </li>
                                <li>
                                    <a href="../../IMPORT/imports/import.php">
                                    <span>Filter</span></a>
                                </li>
                            </ul>
                       </li>
                        
                       
                         <li >
                            <a href="../../pages/schedule/sched_view_faculty.php">
                                <i class="material-icons">assignment</i>
                                <span>Schedule</span>
                            </a>
                        </li>
                    <?php
                    }
                    else if($_SESSION['role'] == "Student")
                    {
                    ?>                    
                      <li >
                            <a href="../../pages/grading/grading_student.php">
                                <i class="material-icons">assessment</i>
                                <span>My Grades</span>
                            </a>
                        </li>
                        <?php if ($evaluation=='Enabled'): ?>
                            <li >
                            <a href="../../pages/evaluation/evaluation_view.php">
                                <i class="material-icons">question_answer</i>
                                <span>Evaluation</span>
                            </a>
                            </li>
                            
                        <?php endif ?>
                        
                       
                             <li >
                            <a href="../../pages/schedule/sched_view.php">
                                <i class="material-icons">event</i>
                                <span>Schedule</span>
                            </a>
                        </li>

                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- #Menu -->
            
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017       <a href="javascript:void(0);">The Invincible Team</a>.
                </div>
               
            </div>
            <!-- #Footer -->
        </aside>
        </section>
        <!-- #END# Left Sidebar -->
        <style >
            .submenu{
                    margin-left: 20px;
            }
        </style>