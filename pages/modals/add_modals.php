<?php include "../connection.php"; ?>

<!-- SUBJECT -->

<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add Subject</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Subject:</label>
                                <div class="form-line">
                                    <input name="txt_scode" type="text" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <div class="form-line">
                                    <select class="form-control input-md" name="txt_scategory" required>
                                        <option value="" selected="" disabled="">-- Select Category --</option>
                                        <option value="CORE">Core</option>                                         
                                        <option value="APPLIED">Applied and Specialized</option>                                         
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect" name="btn_addsubject" >ADD</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>


<!-- SCHOOL YEAR -->

<div class="modal fade" id="addSYModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add School Year/Semester</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>School Year:</label>
                            <div class="form-line">
                                <input name="txt_sy" type="text" class="form-control" placeholder="School Year" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label>Semester:</label>
                            <div class="form-line">
                                <input name="txt_sem" type="text" class="form-control" placeholder="Semester" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_addsy" >ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>

<!-- SCHOOL YEAR -->


<!-- STUDENT-->

<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add Student</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Lastname:</label>
                            <div class="form-line">
                                <input name="txt_lname" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Firstname:</label>
                            <div class="form-line">
                                <input name="txt_fname" type="text" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Middle Initials:</label>
                            <div class="form-line">
                                <input name="txt_mname" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Age:</label>
                            <div class="form-line">
                                <input name="txt_age" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_gender">
                                    <option value="" selected="" disabled="" required>-- Select Gender --</option>
                                    <option>Female</option>    
                                    <option>Male</option>                                    
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_strand">
                                    <option value="" selected="" disabled="" required>-- Select Strand --</option>
                                    <?php
                                        $q = mysqli_query($con,"SELECT * from tblstrand");
                                        while($row=mysqli_fetch_array($q)){
                                            echo '<option value="'.$row['strand'].'">'.$row['strand'].' </option>';
                                        }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_ay" required>
                                    <option value="" selected="" disabled="">-- Select AY --</option>
                                    <?php
                                        
                                        for ($i=2014; $i <= DATE('Y'); $i++) { 
                                            echo '<option value="'.$i .'-'.($i+1).'">'.$i .'-'.($i+1).' </option>';
                                        }

                                     ?>                                         
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_sem">
                                    <option value="" selected="" disabled="">-- Select Semester --</option>
                                    <option>1st</option>    
                                    <option>2nd</option>                                    
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_year_level">
                                    <option value="" selected="" disabled="">-- Select Year Level --</option>
                                    <option>11</option>    
                                    <option>12</option>                                    
                                  </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_section">
                                    <option value="" selected="" disabled="" required>-- Select Section --</option>
                                    <option>1</option>    
                                    <option>2</option>  
                                    <option>3</option>    
                                    <option>4</option>                                   
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <div class="form-line">
                                <input name="txt_address" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contact #:</label>
                            <div class="form-line">
                                <input name="txt_contact" type="number" min="0" class="form-control" >
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Username</label>
                            <div class="form-line">
                                <input name="txt_uname" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <div class="form-line">
                                <input name="txt_pass" type="password" class="form-control"  required>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_addstud" >ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>

<!-- STUDENT -->

<!-- FACULTY -->

<div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add Instructor</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Lastname:</label>
                            <div class="form-line">
                                <input name="txt_lname" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Firstname:</label>
                            <div class="form-line">
                                <input name="txt_fname" type="text" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Middlename:</label>
                            <div class="form-line">
                                <input name="txt_mname" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <div class="form-line">
                                <input name="txt_address" type="text" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contact #:</label>
                            <div class="form-line">
                                <input name="txt_contact" type="number" min="0" class="form-control" required>
                            </div>
                        </div>
                       <!--  <div class="form-group">
                            <label>Username</label>
                            <div class="form-line">
                                <input name="txt_uname" type="text" class="form-control" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <div class="form-line">
                                <input name="txt_pass" type="password" class="form-control" required>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_addfac" >ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>

<!-- FACULTY -->







<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add Subject</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="txt_scode" type="text" class="form-control" placeholder="SubjectCode">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input name="txt_desc" type="text" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input name="txt_adv" type="text" class="form-control" placeholder="Adviser">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_addsubject" >ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>


<!-- FACULTY -->


<div class="modal fade" id="addStudentGradeModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add Student</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Student Id:</label>
                            <div class="form-line">
                                <input name="txt_studid" type="number" required class="form-control" placeholder="Student Id">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name:</label>
                            <div class="form-line">
                                <input name="txt_lname" type="text" class="form-control" placeholder="Lastname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Firstname:</label>
                            <div class="form-line">
                                <input name="txt_fname" type="text" class="form-control" placeholder="Firstname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Middlename:</label>
                            <div class="form-line">
                                <input name="txt_mname" type="text" class="form-control" placeholder="Middlename" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Adviser</label>
                            <div class="form-line">
                                <input name="txt_uname" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <div class="form-line">
                                <input name="txt_pass" type="text" min="0" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-line">
                                <input name="txt_status" type="text" class="form-control" placeholder="Status" >
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_addstudgrade" >ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>



<!-- STUDENT GRADES -->





<!-- SCHEDULE -->

<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Add Schedule</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_scode" required>
                                    <option value="" selected="" disabled="">-- Select Subject --</option>
                                    <?php
                                        $q = mysqli_query($con,"SELECT * from tblsubjects");
                                        while($row=mysqli_fetch_array($q)){
                                            echo '<option value="'.$row['subjectname'].'">'.$row['subjectname'].' </option>';
                                        }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_strand" required>
                                    <option value="" selected="" disabled="">-- Select Strand --</option>
                                    <?php
                                        $q = mysqli_query($con,"SELECT * from tblstrand");
                                        while($row=mysqli_fetch_array($q)){
                                            echo '<option value="'.$row['strand'].'">'.$row['strand'].' </option>';
                                        }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_ay" required>
                                    <option value="" selected="" disabled="">-- Select AY --</option>
                                    <?php
                                        
                                        for ($i=2014; $i <= DATE('Y'); $i++) { 
                                            echo '<option value="'.$i .'-'.($i+1).'">'.$i .'-'.($i+1).' </option>';
                                        }

                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_sem" required>
                                    <option value="" selected="" disabled="">-- Select Semester --</option>
                                    <option>1st</option>    
                                    <option>2nd</option>                                    
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_yl" required>
                                    <option value="" selected="" disabled="">-- Select Year Level --</option>
                                    <option>11</option>    
                                    <option>12</option>                                    
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_section" required>
                                    <option value="" selected="" disabled="">-- Select Section --</option>
                                    <option>1</option>    
                                    <option>2</option>  
                                    <option>3</option>    
                                    <option>4</option>                                   
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_day" required>
                                    <option value="" selected="" disabled="">-- Select Day --</option>
                                    <option>Monday</option>    
                                    <option>Tuesday</option>  
                                    <option>Wednesday</option>    
                                    <option>Thursday</option> 
                                    <option>Friday</option>    
                                    <option>Saturday</option>                                  
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_faculty" required>
                                    <option value="" selected="" disabled="">-- Select Faculty --</option>
                                    <?php
                                      $q = mysqli_query($con,"SELECT * from tblfaculty");
                                       while($row=mysqli_fetch_array($q)){
                                            echo '<option value="'.$row['facultyid'].'">'.$row['fname']. ' '.$row['lname'].' </option>';
                                            }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                         
                            <div class="form-line">
                                <input name="txt_cstart" type="time" class="form-control" placeholder="Time Start" required>
                            </div>
                             <div class="form-line">
                                <input name="txt_cend" type="time" class="form-control" placeholder="Time End" required>
                            </div>
                             <div class="form-group">
                          
                            <div class="form-line">
                                <input name="txt_room" type="text" class="form-control" placeholder="Room" required>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_addsched" >ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>







