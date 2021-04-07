<?php
session_start();
include "connection.php";


if(isset($_POST['btn_submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$a = mysqli_query($con,"SELECT * from tbladmin where username = '".$username."' and password = '".$password."' ");
	$ad = mysqli_num_rows($a);

	$f = mysqli_query($con,"SELECT * from tblfaculty where username = '".$username."' and password = '".$password."' ");
	$fa = mysqli_num_rows($f);

	 $s= mysqli_query($con,"SELECT * from tblstudent where username = '".$username."' and password = '".$password."' ");
	$sa = mysqli_num_rows($s);

	if($ad > 0){
		while($row = mysqli_fetch_array($a)){
		  $_SESSION['role'] = "Administrator";
		  $_SESSION['userid'] = $row['id'];
		  $_SESSION['username'] = $row['username'];
          
		}    

		header ('location: dashboard/dashboard.php');
	}
	else if($fa > 0){
		while($row = mysqli_fetch_array($f)){
		  $_SESSION['role'] = "Faculty";
		  $_SESSION['userid'] = $row['facultyid'];
		  $_SESSION['username'] = $row['username'];
		  $_SESSION['facultyid'] = $row['facultyid'];      
		  $_SESSION['faculty']    =   $row['lname'].', '.$row['fname'];
		}    
		header ('location: dashboard/dashboard.php');
	}

 else if($sa > 0){
		while($row = mysqli_fetch_array($s)){
		  $_SESSION['role'] = "Student";
		  $_SESSION['userid'] = $row['studentid'];
		  $_SESSION['username'] = $row['username'];
          $_SESSION['student'] = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'];

		}    
		header ('location: dashboard/dashboard.php');
	}

}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>RWCStudentPortal</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="../css/font.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

<style>

.panel-body {
    padding: 15px;
 background-color:#e6e2d3;
}
.navbar-default {
border-color: #27A6BE;
}
.panel-default > .panel-heading {
    height: 200px;
    color: #fff;
 
    border-color: #fff;
   
}

.body-Login-back {
background-color: #b2b2b2;
   
    background-size: 100;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: right bottom;
  

}
.logo-margin {
    margin-top: 50px;
}
.login-panel {
    margin-top: 10%;
   

 
}
.btn-success{
    background-color:#AB47BC !important;
}
.btn-success:hover{
    background-color: #AB47BC!important;
}
h3{
    color: white
}
</style>
 
</head>
<div class="containers-fluid" style="color:white;background-color:#9C27B0; height: 70px;">
    <div class="navbar-header">        
                <a style="color:white"; class="navbar-brand" href="#">RICHWELL COLLEGES STUDENT PORTAL FOR SENIOR HIGHSCHOOL</a>
            </div>

    


<body class="body-Login-back">
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
        
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    <center>
                  <img src="../images/richwell_logo.png" style=" width: 200px; height:auto; margin:0 auto;">
                  </center>
                    </div>
                    <div class="panel-body">
                        
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control input-lg" placeholder="Username" style="text-align:center;" name="username" type="text" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" placeholder="Password" style="text-align:center;" name="password" type="password" value="" required>
                                </div>
                                 
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="btn_submit" value="Login">
                                <!-- <a href="main.php" class="btn btn-lg btn-success btn-block">Login</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php   include 'notification/notification.php';?>
 <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-in.js"></script>
</body>

</html>