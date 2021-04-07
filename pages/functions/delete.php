<?php
	
	
//SUBJECT
	
	if(isset($_POST['btn_deletesubj']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $delete_query = mysqli_query($con,"DELETE from tblsubjects where id = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
	}




//STUDENT

	if(isset($_POST['btn_deletestud']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	        	$query = mysqli_query($con,"INSERT into student_archive where studentid = '$value'
	        		");
	            $delete_query = mysqli_query($con,"DELETE from tblstudent where studentid = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            } 
	        }
	    }
	}

	//FACULTY

	if(isset($_POST['btn_deletefac']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	        	$query = mysqli_query($con,"INSERT into instrutor_archive where facultyid = '$value'
	        		");
	            $delete_query = mysqli_query($con,"DELETE from tblfaculty where facultyid = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
	}
	


//SUBJECt

	if(isset($_POST['btn_deletesubject']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $delete_query = mysqli_query($con,"DELETE from tblsubject where id = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
	}

	



?>