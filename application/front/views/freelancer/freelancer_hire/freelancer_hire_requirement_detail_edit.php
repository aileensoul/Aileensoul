<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/common-style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/media.css'); ?>">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet"> 
</head>
<body>
	<header>
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-5">
						<div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="images/logo.png"></a></div>
					</div>
					<div class="col-md-8 col-sm-7">
						<ul>
							<li><a href="<?php echo base_url('dashboard') ?>">Dashborad</a></li>
							<li><a href="#">Notification <i class="fa fa-bell-slash-o" aria-hidden="true"></i></a></li>
							<li><a href="#">Inbox <i class="fa fa-commenting" aria-hidden="true"></i></a></li>
							<li><a href="#">Friend Request <i class="fa fa-user" aria-hidden="true"></i></a></li>
							<li><a href="#">Masari Odedara <i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="freelancer-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<form>
						<h2>Find your job here</h2>
							<fieldset><input type="text" name="" placeholder="Enter your keyword....">
							</fieldset>
							<fieldset><input type="text" name="" placeholder="Find Location">
							</fieldset>
							<fieldset class="submit"><input type="submit" value="Search">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="user-midd-section" id="paddingtop_fixed">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="left-side-bar">
							<ul>

							<li><a href="<?php echo base_url('freelancer_hire_edit/freelancer_hire_basic_info'); ?>">Basic Info</a></li>
                                <li><a href="<?php echo base_url('freelancer_hire_edit/freelancer_hire_address_info'); ?>">Address Info</a></li>
								<li><a href="<?php echo base_url('freelancer_hire_edit/freelancer_hire_professional_info'); ?>">Professional Info</a></li>
                                <li><a href="<?php echo base_url('freelancer_hire_edit/freelancer_hire_payment'); ?>">Payments</a></li>
							    <li <?php if($this->uri->segment(1) == 'freelancer_hire_edit'){?> class="active" <?php } ?>><a href="#">Requirmeant-details</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-md-9 col-sm-9">
					<div>
                        <?php
                                        if ($this->session->flashdata('error')) {
                                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                        }
                                        if ($this->session->flashdata('success')) {
                                            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                        }?>
                    </div>

						<div class="common-form">
							<h3>Requirement Details</h3>
                            	<?php echo form_open_multipart(base_url('freelancer_hire_edit/freelancer_hire_requirement_detail_edit'), array('id' => 'address_info','name' => 'address_info','class' => 'clearfix')); ?>

                            	<div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div> 

                          <?php
                         $fields_req =  form_error('fields_req');
                         $area_req =  form_error('area_req');
                         $req_skill =  form_error('req_skill');
                         $req_experience =  form_error('req_experience');
                         $req_person =  form_error('req_person'); 

                         ?>
                     			
                            <fieldset <?php if($fields_req) {  ?> class="error-msg" <?php } ?>>
									<label>Fields Of Requirmeant:<span style="color:red">*</span></label>
									<input type="text" name="field_req" id="fields_req" placeholder="Enter Fields Of Requirmeant"  value="<?php echo $freelancer[0]['fields_req'];?>">
									<?php echo form_error('fields_req'); ?>
								</fieldset>
								 

                                <fieldset <?php if($area_req) {  ?> class="error-msg" <?php } ?>>
									<label>Area Of Requirmeant:<span style="color:red">*</span></label>
									<input type="text" name="area_req" id="area_req" placeholder="Area Of Requirmeant"  value="<?php echo $freelancer[0]['area_req'];?>">
								<?php echo form_error('area_req'); ?>	
								</fieldset>
								
								 

                                <fieldset <?php if($req_skill) {  ?> class="error-msg" <?php } ?>>
									<label>Require Skill:<span style="color:red">*</span></label>
									<input type="text" name="req_skill" id="req_skill" placeholder="Require Skill"  value="<?php echo $freelancer[0]['req_skill'];?>">
									<?php echo form_error('req_skill'); ?>
								</fieldset>
								 

                                <fieldset <?php if($req_experience) {  ?> class="error-msg" <?php } ?>>
									<label>Require Experience:<span style="color:red">*</span></label>
									<input type="text" name="req_experience" id="req_experience" placeholder="Require Experience"  value="<?php echo $freelancer[0]['req_experience'];?>">
									 <?php echo form_error('req_experience'); ?>
								</fieldset>
								

                                <fieldset <?php if($req_person) {  ?> class="error-msg" <?php } ?>  class="full-width">
									<label>Require Person:<span style="color:red">*</span></label>
									<input type="text" name="req_person" id="req_person" placeholder="Require Person"  value="<?php echo $freelancer[0]['req_person'];?>">
									<?php echo form_error('req_person'); ?>
								</fieldset>
								 
                                
								<fieldset class="hs-submit full-width">
									<input type="reset" name="" value="Clear">
									<input type="submit" name="" value="Submit">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<p><i class="fa fa-copyright" aria-hidden="true"></i> 2017 All Rights Reserved </p>
					</div>
					<div class="col-md-6 col-sm-6">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>