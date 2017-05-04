<!-- start head -->
<?php echo $head; ?>

<style type="text/css" media="screen">
    #row2 { overflow: hidden;  width: 100%; }
    #row2 img { height: 350px;width: 100%; }
    .upload-img{    float: right;
                    position: relative;
                    margin-top: -135px;
                    right: 50px; }

    label.cameraButton {
        display: inline-block;
        margin: 1em 0;

        /* Styles to make it look like a button */
        padding: 0.5em;
        border: 2px solid #666;
        border-color: #EEE #CCC #CCC #EEE;
        background-color: #DDD;
        opacity: 0.7;
    }

    /* Look like a clicked/depressed button */
    label.cameraButton:active {
        border-color: #CCC #EEE #EEE #CCC;
    }

    /* This is the part that actually hides the 'Choose file' text box for camera inputs */
    label.cameraButton input[accept*="camera"] {
        display: none;
    }




</style>



<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<?php
    $returnpage=$_GET['page'];
    if($returnpage == 'freelancer_hire'){
    echo  $freelancer_hire_header2;  
    }
    else{
echo $freelancer_post_header2;
    }?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">

<!-- END HEADER -->

<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container">

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success  cancel-result" onclick="" >Cancel</button>
                    <button class="btn btn-success set-btn upload-result" onclick="myFunction()">Upload Image</button>

                    <div id="message1" style="display:none;">
                        <div id="floatBarsG">
                            <div id="floatBarsG_1" class="floatBarsG"></div>
                            <div id="floatBarsG_2" class="floatBarsG"></div>
                            <div id="floatBarsG_3" class="floatBarsG"></div>
                            <div id="floatBarsG_4" class="floatBarsG"></div>
                            <div id="floatBarsG_5" class="floatBarsG"></div>
                            <div id="floatBarsG_6" class="floatBarsG"></div>
                            <div id="floatBarsG_7" class="floatBarsG"></div>
                            <div id="floatBarsG_8" class="floatBarsG"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12"  style="visibility: hidden; ">
                    <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:1px;margin-top:30px"></div>
                </div>
            </div>

            <div class="container">
                <div class="row" id="row2">
                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
                    $image = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(FREEWORKIMG . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
                        <?php
                    } else {
                        ?>
                        <div class="bg-images">  
                            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / >
                        </div>
<?php }
?>

                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container">    
    <div class="upload-img">

        <?php if($returnpage == ''){?>
        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
        <?php }?>
    </div>


    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic">
<?php if ($freelancerpostdata[0]['freelancer_post_user_image'] != '') { ?>
                    <img src="<?php echo base_url(USERIMAGE . $freelancerpostdata[0]['freelancer_post_user_image']); ?>" alt="" >
                <?php } else { ?>
                    <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                <?php } ?>
                <!-- <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a> -->
                    <?php if($returnpage == ''){ ?>
                <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                    <?php } ?>

            </div>

            <!-- <div id="popup-form">
<?php echo form_open_multipart(base_url('freelancer/user_image_add'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                <input type="hidden" name="hitext" id="hitext" value="3">
                <input type="submit" name="cancel3" id="cancel3" value="Cancel">
                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
<?php echo form_close(); ?>
            </div>
 -->
        </div>
        <div class="profile-main-rec-box-menu  col-md-12 ">

            <div class="left-side-menu col-md-2">  </div>
            <div class="right-side-menu col-md-8">  
                <ul class="">
                    <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>>
                        <?php if($returnpage == 'freelancer_hire'){ ?><a href="<?php echo base_url('freelancer/freelancer_post_profile/').$this->uri->segment(3).'?page=freelancer_hire'; ?>">Details</a><?php } else { ?><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">Details</a><?php } ?>
                    </li>


        <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile' || $this->uri->segment(2) == 'freelancer_apply_post' || $this->uri->segment(2) == 'freelancer_save_post' || $this->uri->segment(2) == 'freelancer_applied_post') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>




                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved Post</a>
                        </li>

                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied Post</a>
                        </li>


<?php } ?>

                </ul>
            </div>

            <div class="col-md-2">
                <div class="flw_msg_btn fr">
                    <ul>
                     
                        <li>
                            
 <?php 
   $userid = $this->session->userdata('aileenuser');
   $contition_array = array('from_id' => $userid, 'to_id' => $this->uri->segment(3), 'save_type' => 2, 'status' => '0');
   $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
  if($userid != $this->uri->segment(3)){ 
    if (!$data) { ?> 
                        <li> 
                            <input type="hidden" id="<?php echo 'hideenuser' . $this->uri->segment(3); ?>" value= "<?php echo $this->uri->segment(3); ?>">
                    <a id="<?php echo $this->uri->segment(3); ?>" onClick="savepopup(<?php echo $this->uri->segment(3); ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $this->uri->segment(3); ?>">
                        Save
                    </a> 
                        </li> <?php } else{ ?>
                        <li> 
                           <a class="saved">Saved </a> 
                        </li> <?php 
                                                                } ?>
                      <li>
           <a href="<?php echo base_url('chat/abc/' . $this->uri->segment(3)); ?>">Message</a>
                 </li>
  <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="job-menu-profile1">
            <h3 > <?php echo ucwords($freelancerpostdata[0]['freelancer_post_fullname']) . ' ' . ucwords($freelancerpostdata[0]['freelancer_post_username']); ?></h3>
            <div class="profile-text">


         <?php 
                if($returnpage == ''){
            if ($freelancerpostdata[0]['designation'] == "") {
                

                ?> <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <a id="designation" class="designation" title="Designation">Designation</a>
                
            <?php }
             else {
                 
                ?> 
                <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($freelancerpostdata[0]['designation']); ?>"><?php echo ucwords($freelancerpostdata[0]['designation']); ?></a>
                <?php }} else { echo ucwords($freelancerpostdata[0]['designation']);} ?>

            </div>
        </div>
        <!-- The Modal -->
      <!--   <div id="myModal" class="modal"> -->
            <!-- Modal content -->
            <!-- <div class="col-md-2"></div>
            <div class="modal-content col-md-8">
                <span class="close">&times;</span>
                <fieldset></fieldset>
<?php echo form_open(base_url('freelancer/designation'), array('id' => 'designation', 'name' => 'designation', 'class' => 'clearfix')); ?>

                <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $freepostdata[0]['designation']; ?>">

                <?php echo form_error('designation'); ?>
                </fieldset>

                <input type="hidden" name="hitext" id="hitext" value="1">
                <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                    <?php echo form_close(); ?>



            </div>
        </div> -->
    </div>

    <div class="col-md-7 col-sm-7">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Freelancer Details  </h3>
                <div class=" fr rec-edit-pro">
<?php

function text2link($text) {
    $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
    return $text;
}
?>
                    <?php
                    $userid = $this->session->userdata('aileenuser');

                    if ($freelancerpostdata[0]['user_id'] === $userid) {
                        ?>

                        <ul>
                      <!--   <li>  <a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Edit </a> </li> -->
                            <!--  <li><a href="<?php echo base_url('freelancer/deactivate/' . $this->session->userdata('aileenuser')); ?>" onclick="return confirm('Are you sure you want to Deactivate?')">Deactivate </a>
                           </li> -->
                        </ul>
<?php } ?>
                </div> 


                <div class="contact-frnd-post">
                    <div class="job-contact-frnd ">
                        <div class="profile-job-post-detail clearfix">
                            <div class="profile-job-post-title clearfix">
                                <div class="profile-job-profile-button clearfix">
                                    <div class="profile-job-details">
                                        <ul>
         <li><p class="details_all_tital "> Basic Information</p> </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-profile-menu">
                                    <ul class="clearfix">
                                        <li> <b>First Name</b> <span> <?php echo $freelancerpostdata[0]['freelancer_post_fullname']; ?> </span>
                                        </li>
                                        <li> <b>Last Name</b> <span> <?php echo $freelancerpostdata[0]['freelancer_post_username']; ?> </span>
                                        </li>

                                        <li> <b>Email</b><span> <?php echo $freelancerpostdata[0]['freelancer_post_email']; ?> </span>
                                        </li>
                                        <li><b> PhoneNo</b> <span><?php echo $freelancerpostdata[0]['freelancer_post_phoneno']; ?></span> </li>

<?php
if ($freelancerpostdata[0]['freelancer_post_skypeid']) {
    ?>
                                            <li> <b>Skype Id</b> <span> <?php echo $freelancerpostdata[0]['freelancer_post_skypeid']; ?> </span>
                                            </li> 
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
          <li><p class="details_all_tital "> Address</p> </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <li> <b> Country</b> <span> <?php echo $this->db->get_where('countries', array('country_id' => $freelancerpostdata[0]['freelancer_post_country']))->row()->country_name; ?></span>
                                            </li>

                                            <li> <b>State</b><span> <?php echo
                                        $this->db->get_where('states', array('state_id' => $freelancerpostdata[0]['freelancer_post_state']))->row()->state_name;
                                        ?> </span>
                                            </li>

<?php
if ($freelancerpostdata[0]['freelancer_post_city']) {
    ?>
                                                <li><b> City</b> <span><?php echo
    $this->db->get_where('cities', array('city_id' => $freelancerpostdata[0]['freelancer_post_city']))->row()->city_name;
    ?></span> </li>
                                                <?php
                                            }
                                            ?>


                                            <?php
                                            if ($freelancerpostdata[0]['freelancer_post_pincode']) {
                                                ?>
                                                <li> <b>Pincode</b><span><?php echo $freelancerpostdata[0]['freelancer_post_pincode']; ?></span>
                                                </li>
                                                <?php
                                            }
                                            ?>

                                            <li> <b>Postal Address</b><span> <?php echo $freelancerpostdata[0]['freelancer_post_address']; ?> </span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                                            
        <li><p class="details_all_tital ">Professional Information</p></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">

<?php $categoryname = $this->db->get_where('category', array('category_id' => $freelancerpostdata[0]['freelancer_post_field']))->row()->category_name; ?>
                                            <li> <b>Field</b> <span> <?php echo $categoryname; ?> </span>
                                            </li>

<?php
if ($freelancerpostdata[0]['freelancer_post_area']) {
    ?>
                                                <li> <b>What Is Your Area</b><span>
    <?php
    $aud = $freelancerpostdata[0]['freelancer_post_area'];
    $aud_res = explode(',', $aud);
    foreach ($aud_res as $skill) {

        $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
        $skill1[] = $cache_time;
    }
    $listFinal = implode(', ', $skill1);
    echo $listFinal;
    ?>     
                                                    </span>
                                                </li>
                                                        <?php
                                                    }
                                                    ?>

                                                    <?php if ($freelancerpostdata[0]['freelancer_post_otherskill']) { ?>
                                                <li><b>Other Skill</b> <span><?php echo $freelancerpostdata[0]['freelancer_post_otherskill']; ?></span> </li>
                                                    <?php } ?>



                                            <li><b>Describe Your Skill In Brief</b> <span><?php echo $freelancerpostdata[0]['freelancer_post_skill_description']; ?></span> </li>

                                            <li><b>Total Experience</b> <span><?php echo $freelancerpostdata[0]['freelancer_post_exp_month'] . ' ' . $freelancerpostdata[0]['freelancer_post_exp_year']; ?></span> </li>  


                                        </ul>
                                    </div>
                                </div> 
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                                                <li>
                          <p class="details_all_tital "> Rate</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
<?php
if ($freelancerpostdata[0]['freelancer_post_hourly']) {
    ?>
                                                <li> <b>Hourly</b> <span> <?php echo $freelancerpostdata[0]['freelancer_post_hourly']; ?> </span>
                                                </li>
    <?php
} else {
    ?>
                                                <li> <b>Hourly</b> <span> - </span>
                                                </li>
    <?php
}
?>

<?php
if ($freelancerpostdata[0]['freelancer_post_ratestate']) {
    ?>
                                                <li> <b>currency </b> <span>  <?php echo $this->db->get_where('currency', array('currency_id' => $freelancerpostdata[0]['freelancer_post_ratestate']))->row()->currency_name; ?> </span>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li> <b>currency</b> <span> - </span>
                                                </li>
                                                <?php
                                            }
                                            ?>


                                            <?php
                                            if ($freelancerpostdata[0]['freelancer_post_fixed_rate'] == 1) {
                                                ?>
                                                <li><b>Also  Work On Fixed Rate</b> 
                                                </li>
                                                <?php
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                            ?>


                                        </ul>
                                    </div>
                                </div> 
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                                                <li>
                    <p class="details_all_tital ">Avability</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <?php
                                            if ($freelancerpostdata[0]['freelancer_post_job_type']) {
                                                ?>
                                                <li> <b>Timing</b> <span><?php echo $freelancerpostdata[0]['freelancer_post_job_type']; ?> </span>
                                                </li>
                                                <?php
                                            }
                                            ?>

                                            <li> <b> Working Hours Per Week</b> <span> <?php echo $freelancerpostdata[0]['freelancer_post_work_hour']; ?></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div> 
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                                                <li>
                    <p class="details_all_tital ">Education</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <li> <b> Degree</b> <span><?php echo $this->db->get_where('degree', array('degree_id' => $freelancerpostdata[0]['freelancer_post_degree']))->row()->degree_name; ?> </span>
                                            </li>

                                            <li> <b>Stream</b><span> <?php echo $this->db->get_where('stream', array('stream_id' => $freelancerpostdata[0]['freelancer_post_stream']))->row()->stream_name; ?> </span>
                                            </li>
                                            <li><b> University</b> <span><?php echo $this->db->get_where('university', array('university_id' => $freelancerpostdata[0]['freelancer_post_univercity']))->row()->university_name; ?></span> </li>

                                            <li><b> College</b> <span><?php echo $freelancerpostdata[0]['freelancer_post_collage']; ?></span> </li>

                                            <li> <b>Percentage</b><span> <?php echo $freelancerpostdata[0]['freelancer_post_percentage']; ?> </span>
                                            </li>
                                            <li> <b>Year Of Passing</b><span> <?php echo $freelancerpostdata[0]['freelancer_post_passingyear']; ?></span>
                                            </li>


                                        </ul>
                                    </div>
                                </div> 
                                <div class="profile-job-profile-button clearfix">
                                    <div class="profile-job-details">
                                        <ul>
         <li><p class="details_all_tital ">Portfolio</p> </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-profile-menu">
                                    <ul class="clearfix">

<?php
if ($freelancerpostdata[0]['freelancer_post_portfolio_attachment'] != "") {
    ?>
                                            <li> <b>Attachment</b><span>
                                                    <img src="<?php echo base_url(FREELANCERPORTFOLIOIMG . $freelancerpostdata[0]['freelancer_post_portfolio_attachment']) ?>" style="width:100px;height:100px;display: block;"></span>
                                            </li>

    <?php
}
?>


<?php
if ($freelancerpostdata[0]['freelancer_post_portfolio']) {
    ?>
                                            <li> <b>Description</b> <span><p>
    <?php echo text2link($freelancerpostdata[0]['freelancer_post_portfolio']); ?> </p></span>
                                            </li>
    <?php
}
?>

                                    </ul>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</section>
<footer>

    <footer>
<?php echo $footer; ?>
    </footer>


<!-- Bid-modal-2  -->
                        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                            <div class="modal-dialog modal-lm">
                                <div class="modal-content">
                                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                                    <div class="modal-body">
                                        <span class="mes">
                                            <div id="popup-form">
                                                <?php echo form_open_multipart(base_url('freelancer/user_image_add'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                                <input type="hidden" name="hitext" id="hitext" value="3">
                                                <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                                                <?php echo form_close(); ?>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Model Popup Close -->


</body>

</html>

<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
<script>

                var data = <?php echo json_encode($demo); ?>;
//alert(data);


                $(function () {
                    // alert('hi');
                    $("#tags").autocomplete({
                        source: function (request, response) {
                            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                            response($.grep(data, function (item) {
                                return matcher.test(item.label);
                            }));
                        },
                        minLength: 1,
                        select: function (event, ui) {
                            event.preventDefault();
                            $("#tags").val(ui.item.label);
                            $("#selected-tag").val(ui.item.label);
                            // window.location.href = ui.item.value;
                        }
                        ,
                        focus: function (event, ui) {
                            event.preventDefault();
                            $("#tags").val(ui.item.label);
                        }
                    });
                });

</script>


<script>
//select2 autocomplete start for skill
    $('#searchskills').select2({

        placeholder: 'Find Your Skills',

        ajax: {

            url: "<?php echo base_url(); ?>freelancer/keyskill",
            dataType: 'json',
            delay: 250,

            processResults: function (data) {

                return {
                    //alert(data);

                    results: data


                };

            },
            cache: true
        }
    });
//select2 autocomplete End for skill

//select2 autocomplete start for Location
    $('#searchplace').select2({

        placeholder: 'Find Your Location',
        maximumSelectionLength: 1,
        ajax: {

            url: "<?php echo base_url(); ?>freelancer/location",
            dataType: 'json',
            delay: 250,

            processResults: function (data) {

                return {
                    //alert(data);

                    results: data


                };

            },
            cache: true
        }
    });
//select2 autocomplete End for Location

</script>


<!-- cover image start -->
<script>
    function myFunction() {
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";

        // setTimeout(function () { location.reload(1); }, 5000);

    }


    function showDiv() {
        document.getElementById('row1').style.display = "block";
        document.getElementById('row2').style.display = "none";
    }
</script>


<script type="text/javascript">
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 1250,
            height: 350,
            type: 'square'
        },
        boundary: {
            width: 1250,
            height: 350
        }
    });



    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {

            $.ajax({
                url: "<?php echo base_url() ?>freelancer/ajaxpro_work",
                type: "POST",
                data: {"image": resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    if (html) {
                        window.location.reload();
                    }
                }
            });

        });
    });

    $('.cancel-result').on('click', function (ev) {

        document.getElementById('row2').style.display = "block";
        document.getElementById('row1').style.display = "none";
        document.getElementById('message1').style.display = "none";


    });

//aarati code start
    $('#upload').on('change', function () {
        //alert("hi");


        var reader = new FileReader();
        //alert(reader);
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);



    });

    $('#upload').on('change', function () {

        var fd = new FormData();
        fd.append("image", $("#upload")[0].files[0]);

        files = this.files;
        size = files[0].size;

        //alert(size);

        if (size > 4194304)
        {
            //show an alert to the user
            alert("Allowed file size exceeded. (Max. 4 MB)")

            document.getElementById('row1').style.display = "none";
            document.getElementById('row2').style.display = "block";


            //reset file upload control
            return false;
        }


        $.ajax({

            url: "<?php echo base_url(); ?>freelancer/image_work",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                //alert(response);

            }
        });
    });

//aarati code end
</script>
<!-- cover image end -->

<script>
// Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                        <script>
                            function updateprofilepopup(id) {
                                $('#bidmodal-2').modal('show');
                            }
                        </script>


<script type="text/javascript">
    function checkvalue() {
        //alert("hi");
        var searchkeyword = document.getElementById('tags').value;
        var searchplace = document.getElementById('searchplace').value;
        // alert(searchkeyword);
        // alert(searchplace);
        if (searchkeyword == "" && searchplace == "") {
            //alert('Please enter Keyword');
            return false;
        }
    }
</script> 

<script>
                            function divClicked() {
                                var divHtml = $(this).html();
                                var editableText = $("<textarea/>");
                                editableText.val(divHtml);
                                $(this).replaceWith(editableText);
                                editableText.focus();
                                // setup the blur event for this new textarea
                                editableText.blur(editableTextBlurred);
                            }

                            function editableTextBlurred() {
                                var html = $(this).val();
                                var viewableText = $("<a>");
                                viewableText.html(html);
                                $(this).replaceWith(viewableText);
                                // setup the click event for this new div
                                viewableText.click(divClicked);

                                $.ajax({
                                    url: "<?php echo base_url(); ?>freelancer/designation",
                                    type: "POST",
                                    data: {"designation": html},
                                    success: function (response) {

                                    }
                                });
                            }

                            $(document).ready(function () {
                                $("a.designation").click(divClicked);
                            });
                        </script>
                        
                        <!-- save post start -->
                    <script type="text/javascript">
                        function save_user(abc)
                        {
                            var saveid = document.getElementById("saveuser");
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() . "freelancer/save_user" ?>',
                                data: 'user_id=' + abc + 'save_id=' + saveid.value,
                                success: function (data) {
                                    $('.' + 'saveduser' + abc).html(data).addClass('saved');
                                }
                            });
                        }
                    </script>
                    <!-- pallavi changes 15-4 -->
                        
                   <script>
                        function savepopup(id) {

                            save_user(id);
//                       
                            $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
                            $('#bidmodal').modal('show');
                        }
                    </script>

