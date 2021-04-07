<?php include '../notification/notification.php' ?>
<?php


 
 if(isset($_POST['btn_addsubj'])){
    $subj = $_POST['txt_subj'];

    $q = mysqli_query($con,"SELECT * from tblsubjects where subjectname = '".$subj."' ");
    $ct = mysqli_num_rows($q);
    if($ct == 0){
        $i = mysqli_query($con,"INSERT into tblsubjects (subjectname) values ('$subj')");
        if($i == true){
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
            exit;
        }
    }
    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
        exit;
    }
 }

 

 //student

  if(isset($_POST['btn_addstud'])){
    $txt_lname = $_POST['txt_lname'];
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_age = $_POST['txt_age'];
    $txt_gender = $_POST['txt_gender'];
    $txt_strand = $_POST['txt_strand'];
    $txt_year_level = $_POST['txt_year_level'];
    $txt_section = $_POST['txt_section'];
    $txt_ay = $_POST['txt_ay'];
    $txt_sem = $_POST['txt_sem'];
   
    $txt_address = $_POST['txt_address'];
    $txt_contact = $_POST['txt_contact'];

    $txt_uname = $_POST['txt_fname'] . DATE('ymd');
    $txt_pass = $_POST['txt_fname'] . DATE('ymd');

    //$q = mysqli_query($con,"SELECT * from tblfaculty where schoolyear = '".$sy."' ");
    //$ct = mysqli_num_rows($q);
    //if($ct == 0){
        $i = mysqli_query($con,"INSERT into tblstudent (lname,fname,mname,age,gender,strand, ay, semester, year_level, section,address,contact,username,password)
                                values ('$txt_lname','$txt_fname','$txt_mname','$txt_age','$txt_gender','$txt_strand', '$txt_ay', '$txt_sem', '$txt_year_level','$txt_section','$txt_address','$txt_contact','$txt_uname','$txt_pass')");
        if($i == true){
         
           
            header ("location: ".$_SERVER['REQUEST_URI']);
              $_SESSION['added'] = 1;
            exit;
        }
    //}
    //else{
    //  $_SESSION['duplicate'] = 1;
    //    header ("location: ".$_SERVER['REQUEST_URI']);
    //    exit;
    //}
 }

  //evaluation

  if(isset($_POST['btn_evaluation'])){
        $facultyid = $_POST['search_faculty'];

        // create an evaluation id
        $evaluationid = $studentid . $facultyid . DATE('YmdHis');
        
        // get all questions
        $question = (mysqli_query($con,"SELECT * FROM tblquestions ORDER BY id ASC;"));

        // get the student detail
        $studentid = $_SESSION['userid'];
        $student = (mysqli_query($con,"SELECT * FROM tblstudent WHERE studentid = '$studentid';"));

        while ($row = mysqli_fetch_array($student)) {
            // insert in evaluation
            $comment = $_POST['txt_comment'];
            $ay = $row['ay'];
            $semester = $row['semester'];

            $i = mysqli_query($con,"INSERT into tblevaluation (evaluationid,comment,facultyid,studentid,ay,semester)
                                    values ('$evaluationid','$comment','$facultyid', '$studentid', '$ay', '$semester')");    
        }
        
        

        // insert into evaluation details
        while ($row = mysqli_fetch_array($question)) {
            $id = $row['id'];
            $answer = (isset($_POST['selection' . $row['id']])) ? $_POST['selection' . $row['id']] : 0;

            $i = mysqli_query($con,"INSERT into tblevaluation_details (question_id,answer,evaluationid)
                                values ('$id','$answer','$evaluationid')");

        }

        
        header ("location: ".$_SERVER['REQUEST_URI']);
            
 }




 //FACULTY

  if(isset($_POST['btn_addfac'])){
    $txt_lname = $_POST['txt_lname'];
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_address = $_POST['txt_address'];
    $txt_contact = $_POST['txt_contact'];
    

    $txt_uname = $_POST['txt_fname'] . DATE('ymd');
    $txt_pass = $_POST['txt_fname'] . DATE('ymd');

    //$q = mysqli_query($con,"SELECT * from tblfaculty where schoolyear = '".$sy."' ");
    //$ct = mysqli_num_rows($q);
    //if($ct == 0){
        $i = mysqli_query($con,"INSERT into tblfaculty (lname,fname,mname,address,contact,username,password)
                                values ('$txt_lname','$txt_fname','$txt_mname','$txt_address','$txt_contact','$txt_uname','$txt_pass')");
        if($i == true){
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
            exit;
        }
    //}
    //else{
    //  $_SESSION['duplicate'] = 1;
    //    header ("location: ".$_SERVER['REQUEST_URI']);
    //    exit;
    //}
 }



 //SUBJECT
 
  if(isset($_POST['btn_addsubject'])){
     $scode = $_POST['txt_scode'];
     $scategory = $_POST['txt_scategory'];

    if($ct == 0){
        $i = mysqli_query($con,"INSERT into tblsubjects (subjectname, category) values ('$scode','$scategory')");
        if($i == true){
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
            exit;
        }
    }
    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
        exit;
    }
 }


?>
 <!--STUDENT GRADES-->
 <?php

    if(isset($_POST['btn_add_studgrade'])){
        $txt_studid = $_POST['txt_studid'];
        $txt_stud = $_POST['txt_stud'];
        $txt_cys = $_POST['txt_cys'];
        $txt_subj = $_POST['txt_subj'];
        $txt_adviser = $_POST['txt_adviser'];
        $txt_1stgrading = $_POST['txt_1stgrading'];

        $chk = mysqli_query($con,"SELECT * from tblstudentgrade where studentid = '$txt_stud' and studentname = '$txt_stud' and cys = '$txt_cys' and  subject = '$text_subj' adviser = '$text_adviser' ");
        $ct = mysqli_num_rows($chk);

        if($ct == 0)
        {
        $query = mysqli_query($con,"INSERT INTO tblstudentgrade (studentid,schoolyearid,subjectid,classid,adviserid,1stgrading) values ('".$txt_studid."','".$txt_stud."','".$txt_cys."','".$txt_subj."','".$_SESSION['userid']."','".$txt_1stgrading."')") or die(mysqli_error($con)); 
            if($query == true){
                $_SESSION['added'] = 1;
                header ("location: ".$_SERVER['REQUEST_URI']);
            }
        }
        else{
            $_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }
  
    }


//SCHEDule

    if(isset($_POST['btn_addsched'])){
    $txt_scode = $_POST['txt_scode'];
    $txt_day = $_POST['txt_day'];
    $txt_cstart = $_POST['txt_cstart'];
    $txt_cend = $_POST['txt_cend'];
    $txt_room = $_POST['txt_room'];
    $txt_faculty = $_POST['txt_faculty'];

    $txt_strand = $_POST['txt_strand'];
    $txt_ay = $_POST['txt_ay'];
    $txt_sem = $_POST['txt_sem'];
    $txt_yl = $_POST['txt_yl'];
    $txt_section = $_POST['txt_section'];


   

    //$q = mysqli_query($con,"SELECT * from tblfaculty where schoolyear = '".$sy."' ");
    //$ct = mysqli_num_rows($q);
    //if($ct == 0){
        $i = mysqli_query($con,"INSERT into tblschedule 
                                (subjectcode,day,classstart,classend,room,strand,ay,year_level,section,semester,facultyid)
                                values 
                                ('$txt_scode','$txt_day','$txt_cstart','$txt_cend','$txt_room','$txt_strand','$txt_ay','$txt_yl','$txt_section','$txt_sem', '$txt_faculty')");
        if($i == true){
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
            exit;
        }
    //}
    //else{
    //  $_SESSION['duplicate'] = 1;
    //    header ("location: ".$_SERVER['REQUEST_URI']);
    //    exit;
    //}
 }

?>


    
