<!--start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->

<!-- Calender Css Start-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
   <!-- Calender Css End-->

	<section>
		<div class="user-midd-section">
			<div class="container">
				<div class="row">
					 <div class="col-md-2"></div>
          <div class="col-md-8">

     
						<div class="common-form">
							<h3>Edit Profile</h3>
  

 <?php echo form_open_multipart(base_url('profile/edit_profile'), array('id' => 'basicinfo','name' => 'basicinfo','class' => "clearfix")); ?>
								    <fieldset class="">
									    <label>First Name </label>
                      <input name="first_name" type="text" id="first_name" value="<?php echo $userdata[0]['first_name']?>" onblur="return full_name();"/><span id="fullname-error"></span>   <?php echo form_error('first_name'); ?>

								    </fieldset>
								    <fieldset class="">
                      <label>Last Name</label>
                     							<input name="last_name" type="text" id="last_name" value="<?php echo $userdata[0]['last_name']?>" onblur="return full_name();"/><span id="fullname-error"></span>
 <?php echo form_error('last_name'); ?>

                    </fieldset>
	   <fieldset>           
					
						<label >E-mail Address:</label>
							<input name="email"  type="text" id="email" class="form-control"  value="<?php echo $userdata[0]['user_email']?>"   onblur="return email_id();"/><span id="email-error"></span>	<?php echo form_error('email'); ?>

					</fieldset>
			<fieldset>				

						<label>Birthday:</label>
                        <input type="text" name="datepicker" id="datepicker" placeholder="dd/mm/yyyy"   autocomplete="off" value="<?php echo date('Y-m-d', strtotime($userdata[0]['user_dob']))?>" >

					<!-- <input name="dob"  type="date" id="date" class="form-control"  value="<?php //echo date('Y-m-d', strtotime($userdata[0]['user_dob']))?>"   onblur="return email_id();"/> <span id="email-error"></span> -->
					
					<?php echo form_error('email'); ?>
					
					</fieldset>

                    <fieldset>
                      <label>Gender</label>
                      <input type="radio" id="gen" name="gender" value="M" <?php if($userdata[0]['user_gender'] == M){ echo 'checked'; } ?>>Male
                      <input type="radio" id="gen" name="gender" value="F" <?php if($userdata[0]['user_gender'] == F){ echo 'checked'; } ?>>Female
                    <input type="radio" id="gen" name="gender" value="O" <?php if($userdata[0]['user_gender'] == O){ echo 'checked'; } ?>> Other
  
                     
					<?php echo form_error('gender'); ?>
					</fieldset>
					<!-- <fieldset>
						<label >Image:</label>
							 <?php if($userdata[0]['user_image'] != ''){ ?>
                            <img alt="" class="" src="<?php echo base_url(USERIMAGE . $userdata[0]['user_image']);?>" height="100" width="100" alt="Smiley face" />
                        <?php } else { ?>
                            <img alt=""  src="<?php echo base_url(NOIMAGE); ?>" height="100" width="200" alt="Smiley face" />
                        <?php } ?>
                        <input type="file" name="profileimg" id="profileimg" value="">
					<?php echo form_error('profileimg'); ?>
					
					</fieldset> -->

					 
						
                    <fieldset class="hs-submit full-width">


                        <!-- <input type="reset" value="Reset" name="cancel"> -->
                      <input type="submit" value="submit" name="submit" id="submit">
                      								
                    </fieldset>
				</div>
				</div>
				</div>
				</div>
				</div>
			<!-- Calender JS Start-->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.datetimepicker.full.js'); ?>"></script>
<script type="text/javascript">
$('#datepicker').datetimepicker({
  //yearOffset:222,
  startDate: "2013/02/14",
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d'
  //minDate:'-1970/01/02', // yesterday is minimum date
  //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
</script>
<!-- Calender Js End-->

<footer>
        <!-- <div class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-logo">
                            <a href="index.html"><img src="images/logo-white.png"></a>
                        </div>
                        <ul>
                            <li>E-912 Titanium City Center Anandngar Ahmedabad-380015</li>
                            <li><a href="mailto:AileenSoul@gmail.com">AileenSoul@gmail.com</a></li>
                            <li>+91 903-353-8102</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="copyright">
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
        </div> -->
        <?php echo $footer;  ?>
    </footer>


<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
                               $(document).ready(function () { 

                $("#basicinfo").validate({

                    rules: {
                      
                        first_name: {

                            required: true,
                            //pattern: /^[A-Za-z]{0,}$/
                        },
                        last_name: {

                            required: true,
                             //pattern: /^[A-Za-z]{0,}$/
                        },
                        email: {

                            required: true,
                            email:true,
                             remote: {
                                url: "<?php echo site_url() . 'registration/check_email' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                     // alert("hi");
                                        return $("#email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                              },
                        },
                        
                        datepicker: {

                            required: true
                            // date: true
                        },
                        gen: {

                            required: true,
                        }
                       
                    },

                    messages: {

                      
                        first_name: {

                            required: "First Name Is Required.",
                            
                        },
                        last_name: {

                            required: "Last Name Is Required."
                        },
                         email: {

                            required: "Email Address Is Required.",
                             email:"Please Enter Valid Email Id.",
                              remote: "Email already exists"
                        },
                        
                         datepicker: {

                            required: "Date of Birth Is Required."

                        },
                         
                        gen: {

                            required: "Gender Is Required."
                        }
                 
                    },

                });
                   });

</script>
    