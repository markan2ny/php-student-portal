

<!-- SCHOOL YEAR -->
<div class="modal fade" id="editSubjectModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Subject</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <input type="hidden" name="hidden_idsubj" value="<?php echo $row['id']; ?>"/>
                        <div class="form-group">
                            <label>Subject:</label>
                            <div class="form-line">
                                <input name="txt_edit_subj" type="text" class="form-control" placeholder="Subject" value="<?php echo $row['subjectname']; ?>">
                            </div>
                            <div class="form-inline">
                                <label>Category</label>
                                <div class="form-line">
                                    <select class="form-control input-md" name="txt_edit_category">
                                        <option value="" selected="" disabled="">-- Select Category --</option>
                                        <option value="CORE" <?php echo ($row['category'] == 'CORE') ? 'selected' : ''; ?> >Core</option>                                         
                                        <option value="APPLIED" <?php echo ($row['category'] == 'APPLIED') ? 'selected' : ''; ?> >Applied and Specialized</option>                                         
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_savesubj" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>     
</div>



<!-- STUDENT -->

<div class="modal fade" id="editStudentModal<?php echo $row['studentid']; ?>" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Student Information</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label> ID Number:</label>
                            <div class="form-line">
                                <input name="txt_edit_studnumber" type="text" class="form-control" value="<?php echo $row['studentid']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lastname:</label>
                            <div class="form-line">
                                <input name="txt_edit_lname" type="text" class="form-control" value="<?php echo $row['lname']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Firstname:</label>
                            <div class="form-line">
                                <input name="txt_edit_fname" type="text" class="form-control" value="<?php echo $row['fname']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Middle Initial:</label>
                            <div class="form-line">
                                <input name="txt_edit_mname" type="text" class="form-control" value="<?php echo $row['mname']; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Age:</label>
                            <div class="form-line">
                                <input name="txt_age" type="text" class="form-control" value="<?php echo $row['age']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_gender">
                                    <option value="" selected="" disabled="">-- Select Gender --</option>
                                    <option <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?> >Female</option>    
                                    <option <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?> >Male</option>                                          
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_strand">
                                    <option value="" selected="" disabled="">-- Select Strand --</option>
                                    <?php
                                      $qedit = mysqli_query($con,"SELECT * from tblstrand");
                                       while($srow=mysqli_fetch_array($qedit)){
                                            $selected = ($row['strand'] == $srow['strand']) ? 'selected' : '';

                                            echo '<option value="'.$srow['strand'].'" '.$selected.'>'.$srow['strand'].' </option>';
                                            }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_ay">
                                    <option value="" selected="" disabled="">-- Select AY --</option>
                                    <?php
                                        
                                        for ($i=2014; $i <= DATE('Y'); $i++) { 

                                            $ay_set = $i .'-'.($i+1);
                                            $selected = ($row['ay'] == $ay_set) ? 'selected' : '';
                                            echo '<option value="'.$ay_set.'" '.$selected.'>'.$ay_set.' </option>';
                                        }

                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_sem">
                                    <option value="" selected="" disabled="">-- Select Semester --</option>
                                    <option <?php echo ($row['semester'] == '1st') ? 'selected' : ''; ?> >1st</option>    
                                    <option <?php echo ($row['semester'] == '2nd') ? 'selected' : ''; ?>>2nd</option>                                    
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_year_level">
                                    <option value="" selected="" disabled="">-- Select Year Level --</option>
                                    <option <?php echo ($row['year_level'] == '11') ? 'selected' : ''; ?> >11</option>    
                                    <option <?php echo ($row['year_level'] == '12') ? 'selected' : ''; ?> >12</option>                                          
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_section">
                                    <option value="" selected="" disabled="">-- Select Section --</option>
                                    <option <?php echo ($row['section'] == '1') ? 'selected' : ''; ?> >1</option>    
                                    <option <?php echo ($row['section'] == '2') ? 'selected' : ''; ?>>2</option>    
                                    <option <?php echo ($row['section'] == '3') ? 'selected' : ''; ?> >3</option>    
                                    <option <?php echo ($row['section'] == '4') ? 'selected' : ''; ?>>4</option>                                      
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address:</label>
                            <div class="form-line">
                                <input name="txt_edit_address" type="text" class="form-control" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contact #:</label>
                            <div class="form-line">
                                <input name="txt_edit_contact" type="number" min="0" class="form-control" value="<?php echo $row['contact']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username:</label>
                            <div class="form-line">
                                <input name="txt_edit_uname" type="text" class="form-control" value="<?php echo $row['username']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <div class="form-line">
                                <input name="txt_edit_pass" type="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_savestud" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>     
</div>

<!-- STUDENT -->




<!-- FACULTY -->

<div class="modal fade" id="editFacultyModal<?php echo $row['facultyid']; ?>" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Instructor Information</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <input type="hidden" name="hidden_idfac" value="<?php echo $row['facultyid']; ?>"/>
                        <div class="form-group">
                            <label>Instructor Id:</label>
                            <div class="form-line">
                                <input name="txt_edit_facnumber" type="text" class="form-control" value="<?php echo $row['facultyid']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lastname:</label>
                            <div class="form-line">
                                <input name="txt_edit_lname" type="text" class="form-control" value="<?php echo $row['lname']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Firstname:</label>
                            <div class="form-line">
                                <input name="txt_edit_fname" type="text" class="form-control" value="<?php echo $row['fname']; ?>" required>
                            </div>
                        </div><div class="form-group">
                            <label>Middlename:</label>
                            <div class="form-line">
                                <input name="txt_edit_mname" type="text" class="form-control" value="<?php echo $row['mname']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <div class="form-line">
                                <input name="txt_edit_address" type="text" class="form-control" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contact #:</label>
                            <div class="form-line">
                                <input name="txt_edit_contact" type="number" min="0" class="form-control" value="<?php echo $row['contact']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username:</label>
                            <div class="form-line">
                                <input name="txt_edit_uname" type="text" class="form-control" value="<?php echo $row['username']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <div class="form-line">
                                <input name="txt_edit_pass" type="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_savefac" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>     
</div>

<!-- FACULTY -->


<!-- schedule -->

<div class="modal fade" id="editScheduleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Schedule</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>"/>
                        
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_scode">
                                    <option value="" selected="" disabled="">-- Select Subject --</option>
                                    <?php
                                      $qedit = mysqli_query($con,"SELECT * from tblsubjects");
                                       while($srow=mysqli_fetch_array($qedit)){

                                            $selected = ($row['subjectcode'] == $srow['subjectname']) ? 'selected' : '';

                                            echo '<option value="'.$srow['subjectname'].'" '.$selected.'>'.$srow['subjectname'].' </option>';
                                        }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_strand">
                                    <option value="" selected="" disabled="">-- Select Strand --</option>
                                    <?php
                                      $qedit = mysqli_query($con,"SELECT * from tblstrand");
                                       while($srow=mysqli_fetch_array($qedit)){
                                            $selected = ($row['strand'] == $srow['strand']) ? 'selected' : '';

                                            echo '<option value="'.$srow['strand'].'" '.$selected.'>'.$srow['strand'].' </option>';
                                            }
                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_ay">
                                    <option value="" selected="" disabled="">-- Select AY --</option>
                                    <?php
                                        
                                        for ($i=2014; $i <= DATE('Y'); $i++) { 

                                            $ay_set = $i .'-'.($i+1);
                                            $selected = ($row['ay'] == $ay_set) ? 'selected' : '';
                                            echo '<option value="'.$ay_set.'" '.$selected.'>'.$ay_set.' </option>';
                                        }

                                     ?>                                         
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_sem">
                                    <option value="" selected="" disabled="">-- Select Semester --</option>
                                    <option <?php echo ($row['semester'] == '1st') ? 'selected' : ''; ?> >1st</option>    
                                    <option <?php echo ($row['semester'] == '2nd') ? 'selected' : ''; ?>>2nd</option>                                    
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_yl">
                                    <option value="" selected="" disabled="">-- Select Year Level --</option>
                                    <option <?php echo ($row['year_level'] == '11') ? 'selected' : ''; ?> >11</option>    
                                    <option <?php echo ($row['year_level'] == '12') ? 'selected' : ''; ?> >12</option>                                          
                                  </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_section">
                                    <option value="" selected="" disabled="">-- Select Section --</option>
                                    <option <?php echo ($row['section'] == '1') ? 'selected' : ''; ?> >1</option>    
                                    <option <?php echo ($row['section'] == '2') ? 'selected' : ''; ?>>2</option>    
                                    <option <?php echo ($row['section'] == '3') ? 'selected' : ''; ?> >3</option>    
                                    <option <?php echo ($row['section'] == '4') ? 'selected' : ''; ?>>4</option>                                      
                                  </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="form-line">
                                <select class="form-control input-md" name="txt_day">
                                    <option value="" selected="" disabled="">-- Select Day --</option>
                                    <option <?php echo ($row['day'] == 'Monday') ? 'selected' : ''; ?> >Monday</option>    
                                    <option <?php echo ($row['day'] == 'Tuesday') ? 'selected' : ''; ?>>Tuesday</option>    
                                    <option <?php echo ($row['day'] == 'Wedneday') ? 'selected' : ''; ?> >Wednesday</option>    
                                    <option <?php echo ($row['day'] == 'Thursday') ? 'selected' : ''; ?>>Thursday</option>  
                                    <option <?php echo ($row['day'] == 'Friday') ? 'selected' : ''; ?> >Friday</option>    
                                    <option <?php echo ($row['day'] == 'Saturday') ? 'selected' : ''; ?>>Saturday</option>                                 
                                  </select>
                            </div>
                        </div>

                        
                        <div class="form-group">
                         
                            <div class="form-line">
                                <input name="txt_cstart" type="time" class="form-control" placeholder="Time Start" value="<?php echo $row['classstart']; ?>" required>
                            </div>
                             <div class="form-line">
                                <input name="txt_cend" type="time" class="form-control" placeholder="Time End" value="<?php echo $row['classend']; ?>" required>
                            </div>
                             <div class="form-group">
                          
                            <div class="form-line">
                                <input name="txt_room" type="text" class="form-control" placeholder="Room" value="<?php echo $row['room']; ?>" required>
                            </div>
                        </div>
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_savesched" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>     
</div>

<script>
$(document).ready(function(){
    document.getElementsByName("txt_edit_dline")[0].setAttribute('min', new Date().toISOString().split('T')[0]); 
});
</script>

<!-- SCHEDULE -->


<!-- DOWNLOADABLE FILE -->

<div class="modal fade" id="editDownloadableModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
<form method="post"  enctype="multipart/form-data">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Downloadable File</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <input type="hidden" name="hidden_iddownload" value="<?php echo $row['id']; ?>"/>
                        <div class="form-group">
                            <label>File:</label>
                            <div class="form-line">
                                <input name="txt_edit_file" type="file" class="form-control" value="<?php echo $row['downloadablefile']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <div class="form-line">
                                <input name="txt_edit_desc" type="text" class="form-control" value="<?php echo $row['description']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_savedownload" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>     
</div>

<!-- DOWNLOADABLE FILE -->


<!-- ACTIVITY -->

<div class="modal fade" id="editScheduleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
<form method="post">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Activity</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <input type="hidden" name="hidden_idacts" value="<?php echo $row['id']; ?>"/>
                        <div class="form-group">
                       
                            <div class="form-line">
                                <input name="txt_edit_scode" type="text" class="form-control" placeholder="Subject Code" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input name="txt_edit_subject" type="text" class="form-control" placeholder="Description">
                            </div>
                        </div>
                         <div class="form-group">
                       
                            <div class="form-line">
                                <input name="txt_edit_day" type="day" class="form-control" placeholder="Day">
                            </div>
                        </div>
                        <div class="form-group">
                         
                            <div class="form-line">
                                <input name="txt_edit_cstart" type="time" class="form-control" placeholder="Time">
                            </div>
                            </div>

                              <div class="form-group">
                             <div class="form-line">
                                <input name="txt_edit_cend" type="time" class="form-control" placeholder="Time">
                            </div>
                            </div>
                             <div class="form-group">
                          
                            <div class="form-line">
                                <input name="txt_edit_room" type="text" class="form-control" placeholder="Room">
                            </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_savesched" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>     
</div>

<script>
$(document).ready(function(){
    document.getElementsByName("txt_edit_actdate")[0].setAttribute('min', new Date().toISOString().split('T')[0]); 
});
</script>

<!-- ACTIVITY -->


<!-- UPLOAD FILE -->

<div class="modal fade" id="editSubmitFileModal<?php echo $row['fsid'];?>" tabindex="-1" role="dialog">
<form method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="defaultModalLabel">Edit Submitted File</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <input type="hidden" name="hidden_iddownload" value="<?php echo $row['fsid']; ?>"/>
                        <div class="form-group">
                            <label>File:</label>
                            <div class="form-line">
                                <input name="txt_edit_file" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category:</label>
                            <div class="form-line">
                                <select name="edit_ddl_cat" class="form-control">
                                    <?php
                                    echo '<option value="'.$row['categoryid'].'">'.$row['categoryname'].'</option>';
                                    $q1 = mysqli_query($con,"SELECT * from tblfilecategory where id != '".$row['categoryid']."' ");
                                    while($row1 = mysqli_fetch_array($q1)){
                                        echo '
                                            <option value="'.$row1['id'].'">'.$row1['categoryname'].'</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <div class="form-line">
                                <input name="txt_edit_desc" type="text" class="form-control" required placeholder="Description" value="<?php echo $row['fsdescription'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Semester:</label>
                            <div class="form-line">
                                <select name="edit_ddl_sem" class="form-control">
                                    <?php
                                    echo '<option value="'.$row['semesterid'].'">'.$row['semester'].'</option>';
                                    $q2 = mysqli_query($con,"SELECT * from tblsemester where id != '".$row['semesterid']."' ");
                                    while($row1 = mysqli_fetch_array($q2)){
                                        echo '
                                            <option value="'.$row1['id'].'">'.$row1['semester'].'</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>School Year:</label>
                            <div class="form-line">
                                <select name="edit_ddl_sy" class="form-control">
                                    <?php
                                    echo '<option value="'.$row['schoolyearid'].'">'.$row['schoolyear'].'</option>';
                                    $q3 = mysqli_query($con,"SELECT * from tblschoolyear where id != '".$row['schoolyearid']."' ");
                                    while($row1 = mysqli_fetch_array($q3)){
                                        echo '
                                            <option value="'.$row1['id'].'">'.$row1['schoolyear'].'</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" name="btn_edit_upload" >SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</form>
</div>


<!-- UPLOAD FILE -->