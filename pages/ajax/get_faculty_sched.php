<?php  
	
	include "../connection.php"; 

	$facultyid = $_POST['facultyid'];

	$q = mysqli_query($con,"SELECT 
	                            *,
	                            CONCAT(s.classstart, ' - ', s.classend) time,
	                            CONCAT(f.fname, '')
	                        FROM
	                            tblschedule s
	                            LEFT JOIN tblfaculty f ON f.facultyid = s.facultyid
	                        WHERE s.facultyid = '$facultyid';");

	$data = '';
    while($row=mysqli_fetch_array($q)){
        $data .= '<option value="'.$row['id'].'">'.$row['subjectcode'].' </option>';
    }

    echo $data;

?>