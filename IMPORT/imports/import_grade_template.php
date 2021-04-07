<?php 
	
	if (!empty($_FILES["fileToUpload"]['tmp_name'])) {

		session_start();
		include_once( '../core/class.ManageTables.php' );
		$init = new ManageTables;

		$sched = $init->getSchedBySubject('cur_'.substr($_SESSION['sys_cll_tablename'], 0, -10),
										str_replace('_', '-', substr($_SESSION['sys_cll_tablename'], -9)),
										$_SESSION['sys_cll_yearlevel'],  
										$_SESSION['sys_cll_semester'], 
										$_SESSION['sys_cll_section'], 
										$_SESSION['sys_cll_subjectcode'], 'id');
		$course = $init->getSpecific('course','code',substr($_SESSION['sys_cll_tablename'], 0, -10));

		$enr_table_name = str_replace("-","_",'enroll_'.$sched[0]['academic_year'].'_'.$_SESSION['sys_cll_semester']) ;

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

			    // check if there is a student_no exist
			    if (is_numeric($rowData[0][1])) {
			    	// check if grade is numeric to avoid conflict with INC grades
			    	if (is_numeric($rowData[0][4])) {
			    		if ($rowData[0][4] >= 50 && $rowData[0][4] <= 100) {
			    			$prelim = number_format(floatval($rowData[0][4]), 2);
			    		} else {
			    			$prelim = '';
			    		}
			    	} else {
			    		$prelim = $rowData[0][4];
			    	}

			    	if (is_numeric($rowData[0][5])) {
			    		if ($rowData[0][5] >= 50 && $rowData[0][5] <= 100) {
			    			$midterm = number_format(floatval($rowData[0][5]), 2);
			    		} else {
			    			$midterm = '';
			    		}		    		
			    	} else {
			    		$midterm = $rowData[0][5];
			    	}

			    	if (is_numeric($rowData[0][6])) {
			    		if ($rowData[0][6] >= 50 && $rowData[0][6] <= 100) {
			    			$prefinal = number_format(floatval($rowData[0][6]), 2);
			    		} else {
			    			$prefinal = '';
			    		}	
			    	} else {
			    		$prefinal= $rowData[0][6];
			    	}

			    	if (is_numeric($rowData[0][7])) {
			    		if ($rowData[0][7] >= 50 && $rowData[0][7] <= 100) {
			    			$final = number_format(floatval($rowData[0][7]), 2);
			    		} else {
			    			$final = '';
			    		}
			    	} else {
			    		$final= $rowData[0][7];
			    	}


				    $mergeExcelToDB = $init->mergeExcelToGrade($enr_table_name, $rowData[0][1], $_SESSION['sys_cll_subjectcode'], $prelim, $midterm, $prefinal, $final);
				    if ($mergeExcelToDB) {
				    	$counter+=1;
				    }
			    } else {
			    	$mergeExcelToDB = false;
			    }
			    

			    //  Insert row data array into your database of choice here
			    // var_dump($rowData);
			}
			    // echo "true";

			if ($counter != 0) {
		    	echo "true";
		    	// echo $counter;
		    } else {
		    	echo "No record updated. There are some problem in your excel file.";
		    }

		} else { 

			echo $error;

		}//end of upload ok



	} else {
		echo "Please browse your file first!";
	}

?>