<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <?php echo $recruiter_header2; ?>
    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                
                                <li><a href="<?php echo base_url('recruiter/rec_basic_information'); ?>">Basic information</a></li>
                             <li <?php if($this->uri->segment(1) == 'recruiter'){?> class="active" <?php } ?>><a href="#">Company information</a></li>
                             <li class="<?php if($recdata[0]['re_step'] < '2'){echo "khyati";}?>"><a href="<?php echo base_url('recruiter/rec_comp_address'); ?>">Company address</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8">
                    <div>
                        <?php
                                if ($this->session->flashdata('error')) {
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                }
                                if ($this->session->flashdata('success')) {
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                }
                                ?>
                    </div>
                     <!--- middle section start -->
			    <div class="common-form">
                <h3>Company information</h3>
				 <?php echo form_open(base_url('recruiter/company_info_store'), array('id' => 'basicinfo','name' => 'basicinfo','class' => 'clearfix')); ?>
                 <div><span style="color:red">(*)</span><span style="color: #7f7f7e">Indicates required field</span></div> 
				 	
                    <?php
                         $comp_name =  form_error('comp_name');
                         $comp_email =  form_error('comp_email');
                         $comp_num =  form_error('comp_num');
                         $comp_project =  form_error('comp_project'); 
                        $other_activities =  form_error('other_activities');

                         ?>
                                
					<fieldset <?php if($comp_name) {  ?> class="error-msg" <?php } ?>>
						<label>Company Name:<span style="color:red">*</span></label>
						<input name="comp_name" type="text" id="comp_name" placeholder="Enter Company Name"  value="<?php if($compname){ echo $compname; } ?>"/><span id="fullname-error"></span>
					</fieldset>
                    <?php echo form_error('comp_name'); ?>

                    <fieldset <?php if($comp_email) {  ?> class="error-msg" <?php } ?>>
						<label>Company Email:<span style="color:red">*</span></label>
							<input name="comp_email" type="text" id="comp_email" placeholder="Enter Company Email" value="<?php if($compemail){ echo $compemail; } ?>" /><span id="fullname-error"></span>
					</fieldset>
                <?php echo form_error('comp_email'); ?>

					<fieldset <?php if($comp_num) {  ?> class="error-msg" <?php } ?>>
						<label>Company Number:<span style="color:red">*</span></label>
						<input name="comp_num"  type="text" id="comp_num" placeholder="Enter Comapny Number" value="<?php if($compnum){ echo $compnum; } ?>"/><span id="email-error"></span>
					</fieldset>
					<?php echo form_error('comp_num'); ?>

					<fieldset>
						<label>Company Website:</span></label>				
						<input name="comp_site"  type="text" id="comp_url" placeholder="Enter Comapny Website" value="<?php if($compweb){ echo $compweb; } ?>" /><span ></span>
					</fieldset>
					

					<fieldset class="full-width">
						<label for="country-suggestions">Interview Process:</span></label>
                      

                         <textarea name ="interview" id="varmailformat" rows="4" cols="50" placeholder="Enter Interview Process" style="resize: none;"><?php if($compservices){ echo $compservices; } ?></textarea>
                                      
					</fieldset>
					
                    <fieldset <?php if($comp_project) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label>Company best project:<!-- <span style="color:red">*</span> -->

                        <textarea name ="comp_project" id="comp_project" rows="4" cols="50" placeholder="Enter Company Project" style="resize: none;"><?php if($comp_project1){ echo $comp_project1; } ?></textarea>
                        <?php ?> 
                    </fieldset>

                   

                    <fieldset <?php if($other_activities) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label>Other activities:<!-- <span style="color:red">*</span> --></label>
                       

                        <textarea name ="other_activities" id="other_activities" rows="4" cols="50" placeholder="Enter Other Activities" style="resize: none;"><?php if($other_activities1){ echo $other_activities1; } ?></textarea>
                       
                    </fieldset>

					<fieldset class="hs-submit full-width">
                                   
                                  
                                    <input type="submit"  id="next" name="next" value="Next">
                                 
                                    
                     </fieldset>
			</div>

		</form>		
	
                      </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <!-- footer start -->
    <?php echo $footer; ?>

  
     <!-- footer end -->
    <!-- end footer -->
    
      <!-- Field Validation Js start -->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<!-- Field Validation Js End -->


 <script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#basicinfo").validate({

                    rules: {

                        comp_name: {

                            required: true,
                           
                        },

                        
                       
                       comp_email: {

                            required: true,
                            email:true,
                             remote: {
                                url: "<?php echo site_url() . 'recruiter/check_email_com' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                        return $("#comp_email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                            },
                        },
                       
                        comp_num:{
                            required:true,
                            minlength:10,
                            maxlength:11,
                            number: true
                       },

                       
                    },

                    messages: {

                        comp_name: {

                            required: "Company Name Is Required.",
                            
                        },

                       

                         comp_email: {

                            required: "Email Address Is Required.",
                             email:"Please Enter Valid Email Id.",
                             remote: "Email already exists"
                        },

                        comp_num: {

                            required: "Phone no Is Required.",
                            
                        },
                        
                      
                        
                      
                    },

                });
                   });


  </script>