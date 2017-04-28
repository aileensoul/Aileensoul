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
                                
                            <li <?php if($this->uri->segment(1) == 'recruiter'){?> class="active" <?php } ?>><a href="#">Basic information</a></li>
                            
                             <li  class="<?php if($recdata[0]['re_step'] < '1'){echo "khyati";}?>"><a href="<?php echo base_url('recruiter/company_info_form'); ?>">Company information</a></li>
                            
                             <li class="<?php if($recdata[0]['re_step'] < '1'){echo "khyati";}?>"><a href="<?php echo base_url('recruiter/rec_comp_address'); ?>">Company address</a></li>
                                
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
                                        }?>
                    </div>

                    <!--- middle section start -->
                     <div class="common-form">
                     <h3>Basic information</h3>
                 <?php echo form_open(base_url('recruiter/basic_information'), array('id' => 'basicinfo','name' => 'basicinfo','class' => 'clearfix')); ?>

                    <div><span style="color:red">(*)</span><span style="color: #7f7f7e">Indicates required field</span></div> 
                                
                    <fieldset>
                        <label>First Name:<span style="color:red">*</span></label>
                        <input name="first_name" type="text" id="first_name"  placeholder="Enter First Name" value="<?php if($firstname){ echo $firstname; } else{ echo $userdata[0]['first_name']; } ?>" /><span id="fullname-error"></span>
                        <?php echo form_error('first_name'); ?>
                    </fieldset>
                    

                    <fieldset>
                        <label>Last Name:<span style="color:red">*</span></label>
                      <input name="last_name" type="text" placeholder="Enter Last Name"
                      value="<?php if($lastname){ echo $lastname; } else{echo $userdata[0]['last_name'];} ?>" id="last_name" /><span id="fullname-error" ></span>
                      <?php echo form_error('last_name'); ?>
                    </fieldset>
                    

                    <fieldset>
                        <label>E-mail address:<span style="color:red">*</span></label>
                        <input name="email"  type="text" id="email" placeholder="Enter Email"  value="<?php if($email){ echo $email; } else{echo $userdata[0]['user_email'];}?>" /><span id="email-error" ></span>
                        <?php echo form_error('email'); ?>
                    </fieldset>
                    
                    <fieldset>
                        <label>Phone number:<span style="color:red">*</span></label>
                        <input name="phoneno" placeholder="Enter Phone Number"  value="<?php if($phone){ echo $phone; } ?>" type="text" id="phoneno"  /><span ></span>
                        <?php echo form_error('phoneno'); ?>
                    </fieldset>
                    

                    <fieldset class="hs-submit full-width">

                                 
                                    <input type="submit"  id="next" name="next" value="Next">
                                  
                                    
                                </fieldset>
             </form>
            </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <?php echo $footer; ?>
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

                        first_name: {

                            required: true,
                           
                        },

                         last_name: {

                            required: true,
                           
                        },
                       
                      email: {
                            required: true,
                            email: true,
                            remote: {
                                url: "<?php echo site_url() . 'recruiter/check_email' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                        return $("#email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                            },
                        },
                       
                    },

                    messages: {

                        first_name: {

                            required: "First name Is Required.",
                            
                        },

                        last_name: {

                            required: "Last name Is Required.",
                            
                        },

                         email: {
                            required: "Email id is required",
                            email: "Please enter valid email id",
                            remote: "Email already exists"
                        },

                       
                      

                    },

                });
                   });


  </script>