    <?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>

    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                  <li><a href="<?php echo base_url('business_profile/business_resume'); ?>">Buisness Profile</a>
                                    </li>
                                    <li><a href="<?php echo base_url('business_profile/business_profile_post'); ?>">Home</a>
                                    </li>
                                   
                                    <li><a href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>"> Manage Post</a>
                                    </li>
                                    <li><a href="<?php echo base_url('business_profile/business_profile_save_post'); ?>"">Saved Post</a>
                                    </li>
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
                    
                        <div>
                            <div>
                                
                            </div> 
                            <div>
                               <div class="business_pf_ct_person_form clearfix">
                          
                            <h3>Contact Person</h3> 
                                
                            <?php echo form_open_multipart(base_url('business_profile/business_profile_contactperson_query/'.$contactperson[0]['user_id']), array('id' => 'contactperson','name' => 'contactperson','class' => 'clearfix')); ?>
                            <ul class="business_pf_ct_person_detail">
                                <li><b>Comapny Name: </b> <span><?php echo $contactperson[0]['company_name'];?></span></li>
                                <li><b>Contact Person: </b><span><?php echo $contactperson[0]['contact_person'];?></span></li>
                                <li><b >Phone No: </b><?php echo $contactperson[0]['contact_mobile'];?></li>
                                <li><b>WebSite: </b><?php echo $contactperson[0]['contact_website'];?></li>
                                <li><b>Email Id: </b> <?php echo $contactperson[0]['contact_email'];?></li>
                               
                            </ul>
                            <div class="business_pf_ct_ clearfix">
                             <div class="buisness-contact-head"> <h2>Inquiry</h2></div>
                                <fieldset >
                                    <label>Email Address</label>
                                    <input name="email"  type="text" id="email" placeholder="Enter Your Email Address" value="<?php echo $userdata[0]['user_email']; ?>">
                                    <input name="toemail"  type="hidden" id="toemail" placeholder="Enter Your Email Address" value="<?php echo $contactperson[0]['contact_email']; ?>">
                                    <?php echo form_error('email'); ?>
                                    </fieldset>
                                

                               

                                <fieldset class="full-width">
                                    <label>Details</label>
                                    <textarea name="msg" id="msg" placeholder="Enter Query"></textarea>
                                    
                                    <?php echo form_error('msg'); ?>
                                </fieldset>
                                
                                <fieldset class="hs-submit full-width">
                                    <input type="submit"  id="submitcontact" name="submitcontact" value="send">
                                </fieldset>
                                </div>
                           <?php echo form_close(); ?>
                            </div>
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
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

    <!-- footer end -->