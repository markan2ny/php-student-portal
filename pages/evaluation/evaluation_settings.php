<?php 
session_start();
ob_start();
    include "../header.php"; 
?>
<?php include "../sidebar.php"; ?>
<?php include "../connection.php"; ?>
<?php  
	if (isset($_POST['btn_update'])) {
			$u = mysqli_query($con,"UPDATE tblconfiguration set config_value = '".$_POST['config_value']."' where config_name = 'evaluation' ");
      if ($u = true) {
        
      header ("location: ../../pages/dashboard/dashboard.php");
		}
}
	$config = mysqli_query($con,"SELECT * from tblconfiguration where config_name = 'evaluation' ");
  $row = mysqli_fetch_array($config);
  $evaluation = $row['config_value'];

?>

	<style>
		.btn-update{
			background: #b535cb;
			
		}
	
	</style>

 <section class="content">
      <div class="container-fluid">
        <div class="block-header"> 
           <div class="body">
                           
                            <ol class="breadcrumb breadcrumb-col-purple" style="margin-bottom: 10px;color :green; ">
                                <li><a href="../dashboard/dashboard.php" ">Dashboard</a></li>
                                    <li class="active">Evaluation</li>
                                <li class="active">Evaluation Setting</li>
                               
                        </div>
         </div>
          <div class="row clearfix">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
             <div class="body">
				<form method="post" >
				<select class="form-control input-md" name="config_value">
                <option <?php echo ($evaluation == 'Enabled') ? 'selected' : ''; ?> >Enabled</option>    
                <option <?php echo ($evaluation == 'Disabled') ? 'selected' : ''; ?> >Disabled</option>                                    
            	</select>
            	<br>
            	<br>
            	<button type="submit" class="btn btn-primary btn-sm  waves-effect" name="btn_update" >SUBMIT</button>
				</form>
</div>
</div>
</div>
</div>
</div>
</section>