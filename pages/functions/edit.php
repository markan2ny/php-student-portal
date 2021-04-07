<?php
	
	
//SUBJECT

	if(isset($_POST['btn_savesubj'])){
		$hidden_id = $_POST['hidden_idsubj'];
		$txt_edit_subj = $_POST['txt_edit_subj'];
		$txt_edit_category = $_POST['txt_edit_category'];

		$q = mysqli_query($con,"SELECT * from tblsubjects where subjectname = '".$txt_edit_subj."' and id != '".$hidden_id."' ");
		$ct = mysqli_num_rows($q);

		if($ct == 0){
			$u = mysqli_query($con,"UPDATE tblsubjects set subjectname = '".$txt_edit_subj."', category = '".$txt_edit_category."' where id = '".$hidden_id."' ");
			if($u == true){
	 			$_SESSION['edit'] = 1;
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
	//SCHOOL YEAR

	if(isset($_POST['btn_savesy'])){
		$hidden_id = $_POST['hidden_idsy'];
		$txt_edit_sy = $_POST['txt_edit_sy'];
		$txt_edit_sem = $_POST['txt_edit_sem'];
		$q = mysqli_query($con,"SELECT * from tblschoolyear where schoolyear = '".$txt_edit_sy."',semester ='".$txt_edit_sem."' and id != '".$hidden_id."' ");
		$ct = mysqli_num_rows($q);

		if($ct == 0){
			$u = mysqli_query($con,"UPDATE tblschoolyear set schoolyear = '".$txt_edit_sy."',semester='".$txt_edit_sem."' where id = '".$hidden_id."' ");
			if($u == true){
	 			$_SESSION['edit'] = 1;
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


//STUDENT

	if(isset($_POST['btn_savestud'])){
		$hidden_id = $_POST['txt_edit_studnumber'];
		$txt_edit_lname = $_POST['txt_edit_lname'];
		$txt_edit_fname = $_POST['txt_edit_fname'];
		$txt_edit_mname = $_POST['txt_edit_mname'];
	    $txt_age = $_POST['txt_age'];
	    $txt_gender = $_POST['txt_gender'];
	    $txt_strand = $_POST['txt_strand'];
	    $txt_year_level = $_POST['txt_year_level'];
	    $txt_semester = $_POST['txt_sem'];
	    $txt_section = $_POST['txt_section'];
	    $txt_ay = $_POST['txt_ay'];
		
		$txt_edit_address = $_POST['txt_edit_address'];
		$txt_edit_contact = $_POST['txt_edit_contact'];
		$txt_edit_uname = $_POST['txt_edit_uname'];
		$txt_edit_pass = $_POST['txt_edit_pass'];

		//$q = mysqli_query($con,"SELECT * from tblschoolyear where schoolyear = '".$txt_edit_sy."' ");
		//$ct = mysqli_num_rows($q);

		//if($ct == 0){
			$u = mysqli_query($con,"UPDATE tblstudent set lname = '".$txt_edit_lname."'
														,fname = '".$txt_edit_fname."'
														,mname = '".$txt_edit_mname."'
														,age = '".$txt_age."'
														,gender = '".$txt_gender."'
														,strand = '".$txt_strand."'
														,ay = '".$txt_ay."'
														,year_level = '".$txt_year_level."'
														,semester = '".$txt_semester."'
														,section = '".$txt_section."'
															
														,address = '".$txt_edit_address."'
														,contact = '".$txt_edit_contact."'
														,username = '".$txt_edit_uname."'
														,password = '".$txt_edit_pass."'
									where studentid = '".$hidden_id."' ");
			if($u == true){
	 			$_SESSION['edit'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
	            exit;
 			}
 		//}
		//else{
		//	$_SESSION['duplicate'] = 1;
	    //    header ("location: ".$_SERVER['REQUEST_URI']);
	    //    exit;
		//}
	}
	

	//FACULTY

	if(isset($_POST['btn_savefac'])){
		$hidden_id = $_POST['txt_edit_facnumber'];
		$txt_edit_lname = $_POST['txt_edit_lname'];
		$txt_edit_fname = $_POST['txt_edit_fname'];
		$txt_edit_mname = $_POST['txt_edit_mname'];
		$txt_edit_address = $_POST['txt_edit_address'];
		$txt_edit_contact = $_POST['txt_edit_contact'];
		$txt_edit_uname = $_POST['txt_edit_uname'];
		$txt_edit_pass = $_POST['txt_edit_pass'];

		//$q = mysqli_query($con,"SELECT * from tblschoolyear where schoolyear = '".$txt_edit_sy."' ");
		//$ct = mysqli_num_rows($q);

		//if($ct == 0){
			$u = mysqli_query($con,"UPDATE tblfaculty set
														 lname = '".$txt_edit_lname."'
														,fname = '".$txt_edit_fname."'
														,mname = '".$txt_edit_mname."'
														,address = '".$txt_edit_address."'
														,contact = '".$txt_edit_contact."'
														,username = '".$txt_edit_uname."'
														,password = '".$txt_edit_pass."'
									where facultyid = '".$hidden_id."' ");
			if($u == true){
	 			$_SESSION['edit'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
	            exit;
 			}
 		//}
		//else{
		//	$_SESSION['duplicate'] = 1;
	    //    header ("location: ".$_SERVER['REQUEST_URI']);
	    //    exit;
		//}
	}


	

	//Schedule

	if(isset($_POST['btn_savesched'])){
    $hidden_id = $_POST['hidden_id'];
    $txt_scode = $_POST['txt_scode'];
    $txt_strand = $_POST['txt_strand'];
     $txt_ay = $_POST['txt_ay'];
     $txt_yl = $_POST['txt_yl'];
      $txt_sem = $_POST['txt_sem'];
     $txt_section = $_POST['txt_section'];
    $txt_day = $_POST['txt_day'];
    $txt_cstart = $_POST['txt_cstart'];
    $txt_cend = $_POST['txt_cend'];     
    $txt_room = $_POST['txt_room'];
 
    
   
		
    	$u = mysqli_query($con,"UPDATE tblschedule set subjectcode = '$txt_scode'
    													,day = '$txt_day'
    													,classstart = '$txt_cstart'
    													,strand = '$txt_strand'
    													,ay = '$txt_ay'
    													,semester = '$txt_sem'
    													,year_level = '$txt_yl'
    												    ,section = '$txt_section'
														
														
														,classend= '$txt_cend'
														,room = '$txt_room'
														where id= '$hidden_id' ");
			if($u == true){
	 			$_SESSION['edit'] = 1;
	           header ("location: ".$_SERVER['REQUEST_URI']);
	           exit;
			
	 			}
			else{
				$_SESSION['duplicate'] = 1;
		        header ("location: ".$_SERVER['REQUEST_URI']);
		        exit;
			}
	}


	

?>

