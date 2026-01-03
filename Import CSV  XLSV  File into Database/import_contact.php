<?php 
	$PAGE="Import Contact";
	include('header.php');	

	
?>



<?php
	if(isset($_POST['save_file'])){
	
		
		 
		$sql = mysql_query("insert into contact (`company_id`,`first_name`,`last_name`,`phone_no`,`title`,`email`,`type`,`site`,`portal_security`) values(".$_POST['company_id'].",'".$_POST['first_name']."','".$_POST['last_name']."',".$_POST['phone_no'].",'".$_POST['title']."','".$_POST['email']."','".$_POST['type']."','".$_POST['site']."','".$_POST['portal_security']."')");

		header('Location: contact_list.php');

		?>
			<script type="text/javascript">
				$("#record_msg").css('display','');
				$("#contact_form").reset();
			</script>
		<?php
	}
	
?>	


<div class="container-fluid">
	
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Import Contact</h5>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo SITE_URL; ?>dashboard.php">Dashboard</a></li>
				<li class="active"><span><?php echo $page_title; ?></span></li>
			</ol>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading"> 
					<h6 class="panel-title txt-dark">Add New Contact Details Here<span id="record_msg" style="float: right;display: none;color: red;">Contact Added Successfully</span></h6>
				</div>
				<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form id="contact_form" action="import_contact_db.php" method="POST" enctype="multipart/form-data">
						<div class="form-wrap col-sm-5 col-xs-12 contact_list__form">
							<div class="form-group col-sm-12">
									<button type="button" class="btn-format btn-anim btn-anim" id="go_back"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
								  
										<button type="submit" id="importSubmit" name="importSubmit" class="btn-format btn-anim importSubmit"><img src="http://rtportal.thinkbluedesign.com/img/save.png" style="width: 18px;vertical-align: sub;"></button>
									<!-- <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">-->
									
								
										
							</div>
							<br>
							<br>
							 
							 
							 
						  
							<div class="form-group col-sm-12">
								<label class="control-label mb-10 text-left">Choose File:</label>
							 	<input type="file" name="importfile">
								
							</div>
						
						</div>
					</form>
				</div>
			</div>
			</div>

			

		</div>

	</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<?php include('footer.php'); ?>


