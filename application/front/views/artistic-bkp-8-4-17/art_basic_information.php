<!--start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                <li <?php if($this->uri->segment(1) == 'artistic'){?> class="active" <?php } ?>><a href="#">Basic information</a></li>

                                <li class="<?php if($artdata[0]['art_step'] < '1'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_address'); ?>">Address</a></li>

                                <li class="<?php if($artdata[0]['art_step'] < '1'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_information'); ?>">Art information</a></li>

                                <li class="<?php if($artdata[0]['art_step'] < '1'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_portfolio'); ?>">Portfolio</a></li>

                            </ul>
                        </div>
                    </div>

                    <!-- middle section start -->
 
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

                        <div class="common-form clearfix">
                         <h3>
                            Basic information
                        </h3>
                        
                            <?php echo form_open(base_url('artistic/art_basic_information_insert'), array('id' => 'artbasicinfo','name' => 'artbasicinfo', 'class' => 'clearfix')); ?>
                            <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div> 


                                <?php
                                 $firstname =  form_error('firstname');
                                 $lastname = form_error('lastname');
                                 $email =  form_error('email');
                                 $phoneno =  form_error('phoneno');
                                 
                         		?>

                                <fieldset <?php if($firstname) {  ?> class="error-msg" <?php } ?>>
                                    <label>First Name:<span style="color:red">*</span></label>
                                    <input name="firstname" type="text" id="firstname" placeholder="Enter First Name" value="<?php if($firstname1){ echo $firstname1; } else { echo $art[0]['first_name']; }?>"/>
                                    <?php echo form_error('firstname'); ?>
                                </fieldset>
                                

                                <fieldset <?php if($lastname) {  ?> class="error-msg" <?php } ?>>
                                    <label>Last Name:<span style="color:red">*</span></label>
                                    <input name="lastname" type="text" id="lastname" placeholder="Enter Last Name" value="<?php if($lastname1){ echo $lastname1; } else { echo $art[0]['last_name']; } ?>"/>
                                    <?php echo form_error('lastname'); ?>
                                </fieldset>

                                <fieldset <?php if($email) {  ?> class="error-msg" <?php } ?>>
                                    <label>E-mail address:<span style="color:red">*</span></label>
                                    <input name="email"  type="text" id="email" placeholder="Enter E-mail address" value="<?php if($email1){ echo $email1; } else { echo $art[0]['user_email']; } ?>">
                                     <?php echo form_error('email'); ?>
                                </fieldset>
                               

                                <fieldset <?php if($phoneno) {  ?> class="error-msg" <?php } ?>>
                                    <label>Phone number:<span style="color:red">*</span></label>
                                    <input name="phoneno"  type="text" id="phoneno" placeholder="Enter Phone number" value="<?php if($phoneno1){ echo $phoneno1; } ?>">
                                    <?php echo form_error('phoneno'); ?><br/>
                                </fieldset>
                                

                                <fieldset class="hs-submit full-width">
                                    <input type="reset">
                                    <input type="submit"  id="next" name="next" value="Next">
                                    
                                </fieldset>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
   <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- footer start -->
    <footer>
        
        <?php echo $footer;  ?>
    </footer>
    
</body>
</html>

  <script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>


<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#artbasicinfo").validate({

                    rules: {

                        firstname: {

                            required: true,
                        },


                        lastname: {

                            required: true,
                        },


                        email: {
                            required: true,
                            email: true,
                            remote: {
                                url: "<?php echo site_url() . 'artistic/check_email' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                        return $("#email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                            },
                        },

                       phoneno: {

                            required: true,
                            number: true,
                            minlength:10,
                            maxlength:11,
                        },

                    },

                    messages: {

                        firstname: {

                            required: "First name Is Required.",
                            
                        },

                        lastname: {

                            required: "Last name Is Required.",
                            
                        },

                        email: {
                            required: "Email id is required",
                            email: "Please enter valid email id",
                            remote: "Email already exists"
                        },
                        phoneno: {

                            required: "Phoneno Is Required.",
                            
                        },

                    },

                });
                   });
  </script>



    <!-- footer end -->