<?php
echo $head;
?>

<style type="text/css" media="screen">
    #row2 { overflow: hidden; width: 100%; }
    #row2 img { height: 350px;width: 100%; }
    .upload-img{    float: right;
                    position: relative;
                    margin-top: -135px;
                    right: 50px; }

    label.cameraButton {
        display: inline-block;
        margin: 1em 0;
        cursor: pointer;
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/select2.min.css'); ?>">
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->

<?php 
    $returnpage= $_GET['page'];
    if($returnpage == 'recruiter'){
        echo $recruiter_header2;
    }
    else{
echo $job_header2;
    }?>
<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container">

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success  cancel-result" onclick="" >Cancel</button>

                    <button class="btn btn-success set-btn upload-result " onclick="myFunction()">Upload Image</button>

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
                        </div> </div>
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
                    $image = $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <img src="<?php echo base_url(JOBBGIMAGE . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / >
                        <?php
                    } else {
                        ?>
                             <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / >
                         <?php }
                         ?>

                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container">    
    <div class="upload-img">

        <?php if($returnpage == ''){ ?>
        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
        <?php }?>
    </div>
    <div class="profile-photo">
        <div class="profile-pho">
            <div class="user-pic">
                <?php if ($job[0]['job_user_image'] != '') { ?>
                    <img src="<?php echo base_url(USERIMAGE . $job[0]['job_user_image']); ?>" alt="" >
                <?php } else { ?>
                    <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                <?php } ?>
        <!--<a href="#popup-form" class="fancybox" title="Update Profile Picture"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>-->
                    <?php if($returnpage == ''){ ?>
                <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                    <?php }?>
            </div>
            <!--            <div id="popup-form">
            <?php // echo form_open_multipart(base_url('job/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                            <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                            <input type="hidden" name="hitext" id="hitext" value="2">
                            <input type="submit" name="cancel2" id="cancel2" value="Cancel">
                            <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
            <?php // echo form_close(); ?>
                        </div>-->
        </div>
        <?php echo $job_menubar; ?>   
    </div>
    <div class="job-menu-profile">
        <a  href="javascript: void(0);" title="<?php echo $job[0]['fname'] . ' ' . $job[0]['lname']; ?>"><h3 class="profile-head-text"> <?php echo $job[0]['fname'] . ' ' . $job[0]['lname']; ?></h3></a>
        <!-- text head start -->
        <div class="profile-text" >
            <?php if($returnpage == ''){
            if ($job[0]['designation'] == '') {
                ?>
                            <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <center><a id="designation" class="designation" title="Designation">Current Work</a></center>
            <?php } else {
                ?> 
                <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>
            <?php }
            
            } else { echo ucwords($job[0]['designation']); } ?>
            <!-- The Modal -->
            <!--            <div id="myModal" class="modal">
                             Modal content <div class="col-md-2"></div>
                            <div class="modal-content col-md-8">
                                <span class="close">&times;</span>
                                <fieldset></fieldset>
            <?php // echo form_open(base_url('job/job_designation/'), array('id' => 'jobdesignation', 'name' => 'jobdesignation', 'class' => 'clearfix')); ?>
            
                                <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $job[0]['designation']; ?>">
            <?php // echo form_error('designation'); ?>
                                </fieldset>
                                <input type="hidden" name="hitext" id="hitext" value="2">
                                <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
            <?php // echo form_close(); ?>
            
            
            
                            </div>
            
                            <div class="col-md-2"></div>
            
                        </div>-->

        </div>

        <!-- text head end -->

    </div>

    <div class="col-md-8 col-sm-8">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Details</h3>
                <div class=" fr rec-edit-pro">
                    <ul>

                    </ul>
                </div> 

                <div class="contact-frnd-post">
                    <div class="job-contact-frnd ">
                        <div class="profile-job-post-detail clearfix">
                            <div class="profile-job-post-title-inside clearfix">

                            </div>
                            <div class="profile-job-post-title clearfix">
                                <div class="profile-job-profile-button clearfix">
                                    <div class="profile-job-details">

                                        <ul>
                                <li><p class="details_all_tital"> Basic Information</p>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-profile-menu">
                                    <ul class="clearfix">
                                        <li> <b> Name </b> <span> <?php echo $job[0]['fname']; ?> <?php echo $job[0]['lname']; ?></span>
                                        </li>

                                        <li> <b>Email </b><span> <?php echo $job[0]['email']; ?> </span>
                                        </li>

                                        <li><b> Phone Number</b> <span><?php echo $job[0]['phnno']; ?></span> </li>

                                        <li> <b>Marital Status </b><span> <?php echo $job[0]['marital_status']; ?></span>
                                        </li>

                                        <li> <b>Nationality </b><span>
                                                <?php
                                                $cache_time = $this->db->get_where('nation', array('nation_id' => $job[0]['nationality']))->row()->nation_name;
                                                echo $cache_time;
                                                ?>
                                            </span>
                                        </li>

                                        <li> <b>language </b><span>

                                                <?php
                                                $aud = $job[0]['language'];

                                                $aud_res = explode(',', $aud);
                                                foreach ($aud_res as $lan) {

                                                    $cache_time = $this->db->get_where('language', array('language_id' => $lan))->row()->language_name;
                                                    $language1[] = $cache_time;
                                                }
                                                $listFinal = implode(', ', $language1);
                                                echo $listFinal;
                                                ?>     


                                            </span>
                                        </li>

                                        <li> <b>Date Of Birth </b><span><?php echo date('d-M-Y', strtotime($job[0]['dob'])); ?></span>
                                        </li>

                                        <li> <b>Gender </b><span><?php echo $job[0]['gender']; ?></span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="profile-job-post-title-inside clearfix">

                                </div>
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                    
                    <li><p class="details_all_tital"> Address</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <h5 style="text-decoration: underline; text-align: center; margin: 5px;">Present Address</h5>
                                            <li> <b> Country</b> <span><?php
                                                    $cache_time = $this->db->get_where('countries', array('country_id' => $job[0]['country_id']))->row()->country_name;
                                                    echo $cache_time;
                                                    ?></span>
                                            </li>

                                            <li> <b>State </b><span><?php
                                                    $cache_time = $this->db->get_where('states', array('state_id' => $job[0]['state_id']))->row()->state_name;
                                                    echo $cache_time;
                                                    ?> </span>
                                            </li>


                                            <?php
                                            if ($job[0]['city_id']) {
                                                ?>
                                                <li><b> City</b> <span><?php
                                                        $cache_time = $this->db->get_where('cities', array('city_id' => $job[0]['city_id']))->row()->city_name;
                                                        echo $cache_time;
                                                        ?></span> </li>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if ($job[0]['pincode']) {
                                                ?>
                                                <li> <b>Pincode </b><span><?php echo $job[0]['pincode']; ?></span>
                                                </li>
                                                <?php
                                            }
                                            ?>

                                            <li> <b>Address </b><span> <?php echo $job[0]['address']; ?></span>
                                            </li>

                                        </ul>
                                        <ul class="clearfix">
                                            <h5 style="text-decoration: underline; text-align: center; margin: 5px;">Permenant Address</h5>
                                            <li> <b> Country</b> <span><?php
                                                    $cache_time = $this->db->get_where('countries', array('country_id' => $job[0]['country_permenant']))->row()->country_name;
                                                    echo $cache_time;
                                                    ?></span>
                                            </li>

                                            <li> <b>State </b><span><?php
                                                    $cache_time = $this->db->get_where('states', array('state_id' => $job[0]['state_permenant']))->row()->state_name;
                                                    echo $cache_time;
                                                    ?> </span>
                                            </li>


                                            <?php
                                            if ($job[0]['city_permenant']) {
                                                ?>
                                                <li><b> City</b> <span><?php
                                                        $cache_time = $this->db->get_where('cities', array('city_id' => $job[0]['city_permenant']))->row()->city_name;
                                                        echo $cache_time;
                                                        ?></span> </li>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if ($job[0]['pincode_permenant']) {
                                                ?>
                                                <li> <b>Pincode </b><span><?php echo $job[0]['pincode_permenant']; ?></span>
                                                </li>
                                                <?php
                                            }
                                            ?>

                                            <li> <b>Address </b><span> <?php echo $job[0]['address_permenant']; ?></span>
                                            </li>

                                        </ul>

                                    </div>
                                    <div class="profile-job-post-title clearfix">
                                        <div class="profile-job-profile-button clearfix">
                                            <div class="profile-job-details">
                                                <ul>
           
           <li><p class="details_all_tital"> Education</p></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-job-profile-menu " id="job_education">
                                            <ul class="clearfix">

                                                <?php
                                                if ($job_edu[0]['board_primary']) {
                                                    ?>

                                                    <li> <b>Board </b><span> <?php echo $job_edu[0]['board_primary']; ?></span>
                                                    </li>

                                                    <li> <b>School </b><span> <?php echo $job_edu[0]['school_primary']; ?></span>
                                                    </li>

                                                    <li> <b>Percentage </b><span> <?php echo $job_edu[0]['percentage_primary']; ?></span>
                                                    </li>

                                                    <li> <b>Year of Passing </b><span> <?php echo $job_edu[0]['pass_year_primary']; ?></span>
                                                    </li>

                                                    <?php
                                                    if ($job_edu[0]['edu_certificate_primary'] != "") {
                                                        ?>
                                                        <li> <b>Education Certificate </b><span> 
                                                                <img src="<?php echo base_url(JOBEDUCERTIFICATE . $job_edu[0]['edu_certificate_primary']) ?>" style="width:100px;height:100px;"></span>
                                                        </li>

                                                        <?php
                                                    }
                                                }
                                                ?>


                                                <?php
                                                if ($job_edu[0]['board_secondary']) {
                                                    ?>
                                                    <li> <b>Board </b><span> <?php echo $job_edu[0]['board_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>School </b><span> <?php echo $job_edu[0]['school_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>Percentage </b><span> <?php echo $job_edu[0]['percentage_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>Year of Passing </b><span> <?php echo $job_edu[0]['pass_year_secondary']; ?></span>
                                                    </li>

                                                    <?php
                                                    if ($job_edu[0]['edu_certificate_secondary'] != "") {
                                                        ?>
                                                        <li> <b>Education Certificate </b><span> 
                                                                <img src="<?php echo base_url(JOBEDUCERTIFICATE . $job_edu[0]['edu_certificate_secondary']) ?>" style="width:100px;height:100px;"></span>
                                                        </li>

                                                        <?php
                                                    }
                                                }
                                                ?>

                                                <?php
                                                if ($job_edu[0]['board_higher_secondary']) {
                                                    ?>
                                                    <li> <b>Board </b><span> <?php echo $job_edu[0]['board_higher_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>Stream</b><span> <?php echo $job_edu[0]['stream_higher_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>School </b><span> <?php echo $job_edu[0]['school_higher_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>Percentage </b><span> <?php echo $job_edu[0]['percentage_higher_secondary']; ?></span>
                                                    </li>

                                                    <li> <b>Year of Passing </b><span> <?php echo $job_edu[0]['pass_year_higher_secondary']; ?></span>
                                                    </li>

                                                    <?php
                                                    if ($job_edu[0]['edu_certificate_higher_secondary'] != "") {
                                                        ?>
                                                        <li> <b>Education Certificate </b><span> 
                                                                <img src="<?php echo base_url(JOBEDUCERTIFICATE . $job_edu[0]['edu_certificate_higher_secondary']) ?>" style="width:100px;height:100px;"></span>
                                                        </li>

                                                        <?php
                                                    }
                                                }
                                                ?>



                                                <?php
                                                foreach ($job_edu as $job1) {
                                                    if ($job1['degree']) {
                                                        ?>


                                                        <li> <b> Degree</b> <span>
                                                                <?php
                                                                $cache_time = $this->db->get_where('degree', array('degree_id' => $job1['degree']))->row()->degree_name;
                                                                echo $cache_time;
                                                                ?> 
                                                            </span>
                                                        </li>

                                                        <li> <b>Stream </b><span>
                                                                <?php
                                                                $cache_time = $this->db->get_where('stream', array('stream_id' => $job1['stream']))->row()->stream_name;
                                                                echo $cache_time;
                                                                ?>
                                                            </span>
                                                        </li>

                                                        <li><b> University</b> <span>
                                                                <?php
                                                                $cache_time = $this->db->get_where('university', array('university_id' => $job1['university']))->row()->university_name;
                                                                echo $cache_time;
                                                                ?>
                                                            </span> </li>

                                                        <li> <b>College  </b><span><?php echo $job1['college']; ?></span>
                                                        </li>

                                                        <li> <b>Grade </b><span><?php echo $job1['grade']; ?></span>
                                                        </li>

                                                        <li> <b>Percentage </b><span><?php echo $job1['percentage']; ?></span>
                                                        </li>

                                                        <li> <b>Year Of Passing </b><span><?php echo $job1['pass_year']; ?></span>
                                                        </li>



                                                        <?php
                                                        if ($job1['edu_certificate'] != "") {
                                                            ?>
                                                            <li> <b>Education Certificate </b><span> 
                                                                    <img src="<?php echo base_url(JOBEDUCERTIFICATE . $job1['edu_certificate']) ?>" style="width:100px;height:100px;"></span>
                                                            </li>

                                                            <?php
                                                        }
                                                        ?>



                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>

                                        <?php
                                        if ($job[0]['project_name'] != "" || $job[0]['project_duration'] != "" || $job[0]['project_description'] != "" || $job[0]['training_as'] != "" || $job[0]['training_duration'] != "" || $job[0]['training_organization'] != "") {
                                            ?>
                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>

            <li><p class="details_all_tital">Project And Training / Internship</p></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">

                                                        <?php
                                                        if ($job[0]['project_name'] != "" || $job[0]['project_duration'] != "" || $job[0]['project_description'] != "") {
                                                            ?>
                                                            <li>
    <h5 style="text-decoration: underline; text-align: center; margin: 5px;" > Project And Training</h5>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>


                                                        <?php
                                                        if ($job[0]['project_name']) {
                                                            ?>
                                                            <li> <b> Project Name (Title)</b> <span><?php echo $job[0]['project_name']; ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>


                                                        <?php
                                                        if ($job[0]['project_duration']) {
                                                            ?>
                                                            <li> <b>Duration</b><span><?php echo $job[0]['project_duration']; ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>


                                                        <?php
                                                        if ($job[0]['project_description']) {
                                                            ?>
                                                            <li><b>Project Description</b> <span><?php echo $job[0]['project_description']; ?></span> </li>
                                                            <?php
                                                        }
                                                        ?>
                                                        <br>

                                                        <?php
                                                        if ($job[0]['training_as'] != "" || $job[0]['training_duration'] != "" || $job[0]['training_organization'] != "") {
                                                            ?>
                                                            <li>
     <h5 style="text-decoration: underline; text-align: center; margin: 5px;" >Internship</h5>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($job[0]['training_as']) {
                                                            ?>
                                                            <li> <b>Intern / Trainee As </b><span><?php echo $job[0]['training_as']; ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($job[0]['training_duration']) {
                                                            ?>
                                                            <li> <b>Duration</b><span> <?php echo $job[0]['training_duration']; ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>


                                                        <?php
                                                        if ($job[0]['training_organization']) {
                                                            ?>
                                                            <li> <b>Name of Organization</b><span> <?php echo $job[0]['training_organization']; ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
             <li><p class="details_all_tital"> Key Skill</p></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <?php
                                                        if ($job[0]['keyskill']) {
                                                            ?>
                                                            <li> <b> Skill</b> <span>
                                                                    <?php
                                                                    $aud = $job[0]['keyskill'];

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

                                                        if ($other_skill) {
                                                            ?>
                                                            <li><b>Other Skill</b><span>


                                                                    <?php
                                                                    foreach ($other_skill as $skill1) {
                                                                        ?>
                                                                        <?php $skill2[] = $skill1['skill']; ?>
                                                                        <?php
                                                                    }
                                                                    $listFinal = implode(', ', $skill2);
                                                                    echo $listFinal;
                                                                    ?></span>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>


                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
          
            <li><p class="details_all_tital"> Apply For</p></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <li> <b> Skill</b> <span>
                                                                <?php
                                                                $aud = $job[0]['ApplyFor'];
                                                                $aud_res = explode(',', $aud);
                                                                foreach ($aud_res as $skill) {

                                                                    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                                                                    echo $cache_time;
                                                                }
                                                                ?></span>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
                 
                 <li><p class="details_all_tital"> Work Experience</p></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php
                                                $total_work_year = 0;
                                                $total_work_month = 0;
                                                foreach ($job_work as $work) {
                                                    ?>

                                                    <div class="profile-job-profile-menu" id="job_workexp">

                                                        <ul class="clearfix">
                                                            <?php
                                                            if ($work['experience'] == "Experience") {
                                                                ?>           

                                                                <li> <b> Job Title </b> <span> <?php echo $work['jobtitle']; ?> </span>
                                                                </li>
                                                                <?php
                                                            }
                                                            if ($work['experience'] == "Experience") {
                                                                ?> 

                                                                <li> <b>Company Name </b><span><?php echo $work['companyname']; ?></span>
                                                                </li>

                                                                <?php
                                                            }
                                                            if ($work['experience'] == "Experience" && $work['companyemail']) {
                                                                ?>

                                                                <li><b> Company Email Address </b> <span><?php echo $work['companyemail']; ?></span> </li>

                                                                <?php
                                                            }
                                                            if ($work['experience'] == "Experience" && $work['companyphn']) {
                                                                ?>

                                                                <li> <b>Company Phone Number </b><span> <?php echo $work['companyphn']; ?></span>
                                                                </li>

                                                                <?php
                                                            }
                                                            ?>

                                                            <li> <b>Experience </b><span><?php
                                                                    if ($work['experience'] == "Fresher") {

                                                                        echo $work['experience'];
                                                                    } else {
                                                                        if ($work['experience_year'] == "0 year") {
                                                                            echo $work['experience_month'];
                                                                        } else {
                                                                            echo $work['experience_year'];
                                                                            echo "&nbsp";
                                                                            echo $work['experience_month'];
                                                                        }
                                                                    }
                                                                    ?></span>
                                                            </li>

                                                            <?php
                                                            if ($work['work_certificate'] != "") {
                                                                ?>
                                                                <li> <b>Experience Certificate  </b><span>
                                                                        <img src="<?php echo base_url(JOBWORKCERTIFICATE . $work['work_certificate']) ?>" style="width:100px;height:100px;"></span>
                                                                </li>

                                                                <?php
                                                            }
                                                            ?>

                                                        </ul>
                                                        <?php
                                                        $total_work_year += $work['experience_year'];
                                                        $total_work_month += $work['experience_month'];
                                                        ?>


                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="profile-job-profile-menu" id="job_workexp">

                                                        <ul><li> <b> Total Experience </b><span><?php if ($total_work_year != '0' && $total_work_month != '0') { ?> <?php if ($total_work_year != '0') { ?><?php echo $total_work_year; ?> year <?php } ?> <?php if ($total_work_month != '0') { ?><?php echo $total_work_month; ?> month <?php } ?> <?php
                                                                    } else {
                                                                        echo PROFILENA;
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="profile-job-post-title clearfix">
                                                    <div class="profile-job-profile-button clearfix">
                                                        <div class="profile-job-details">
                                                            <ul>
                                                            
        <li><p class="details_all_tital"> Extra Curricular Activities</p></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="profile-job-profile-menu">
                                                        <ul class="clearfix">
                                                            <li> <b> Extra Curricular Activites</b><span><?php echo $job[0]['curricular']; ?></span>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-post-title clearfix">
                                                    <div class="profile-job-profile-button clearfix">
                                                        <div class="profile-job-details">
                                                            <ul>
           
    <li> <p class="details_all_tital"> Interest & Reference</p></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="profile-job-profile-menu">
                                                        <ul class="clearfix">
                                                            <li> <b> Interest </b> <span><?php echo $job[0]['interest']; ?></span>
                                                            </li>

                                                            <?php
                                                            if ($job[0]['reference']) {
                                                                ?>
                                                                <li> <b> Reference </b> <span><?php echo $job[0]['reference']; ?></span>
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
                                                               
             <li><p class="details_all_tital">Carrier Objectives</p></li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="profile-job-profile-menu">
                                                            <ul class="clearfix">
                                                                <li> <b> Carrier Objectives </b> <span><?php echo $job[0]['carrier']; ?></span>
                                                                </li>


                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>            

                                        </div>

                                    </div>            


                                </div>

                                <div class="user-midd-section">
                                    <div class="container">
                                        <div class="row">

                                            <div  class="col-md-3">  </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </section>

                        <!-- Bid-modal-2  -->
                        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                            <div class="modal-dialog modal-lm">
                                <div class="modal-content">
                                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>     	
                                    <div class="modal-body">
                                        <span class="mes">
                                            <div id="popup-form">
                                                <?php echo form_open_multipart(base_url('job/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                                <input type="hidden" name="hitext" id="hitext" value="2">
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


                        <!-- script for skill textbox automatic start-->
                         <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
                <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
                <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
                <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


                           <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
                        <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">

                        <!-- script for skill textbox automatic end (option 2)-->
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
                            //location.reload(1); return false;
                            //select2 autocomplete start for skill
                            $('#searchskills').select2({

                                placeholder: 'Find Your Skills',

                                ajax: {

                                    url: "<?php echo base_url(); ?>job/keyskill",
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

                                    url: "<?php echo base_url(); ?>job/location",
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

                        <!-- crop image js start--> 

                        <!-- crop image js End--> 
                        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
                        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

                        <script type="text/javascript">

                            //validation for edit email formate form

                            $(document).ready(function () {

                                $("#jobdesignation").validate({

                                    rules: {

                                        designation: {

                                            required: true,

                                        },

                                    },

                                    messages: {

                                        designation: {

                                            required: "Designation Is Required.",

                                        },

                                    },

                                });
                            });
                        </script>


                        <!-- cover image start -->
                        <script>
                            function myFunction() {
                                document.getElementById("upload-demo").style.visibility = "hidden";
                                document.getElementById("upload-demo-i").style.visibility = "hidden";
                                document.getElementById('message1').style.display = "block";

                                //  setTimeout(function () { location.reload(1); }, 5000);

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
                                        url: "<?php echo base_url(); ?>job/ajaxpro",
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

                                var reader = new FileReader();

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

                                    return false;
                                }

                                $.ajax({
                                    url: "<?php echo base_url(); ?>job/image",
                                    type: "POST",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                    }
                                });
                            });

                            //aarati code end
                        </script>

                        <!-- end search validation -->
                        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                        <script>
                            function updateprofilepopup(id) {
                                $('#bidmodal-2').modal('show');
                            }
                        </script>

                        <!-- for search validation -->
                        <script type="text/javascript">
                            function checkvalue() {
                                // alert("hi");
                                var searchkeyword = document.getElementById('tags').value;
                                var searchplace = document.getElementById('searchplace').value;
                                // alert(searchkeyword);
                                // alert(searchplace);
                                if (searchkeyword == "" && searchplace == "") {
                                    //  alert('Please enter Keyword');
                                    return false;
                                }
                            }
                        </script>
                        <!-- end search validation -->
                        <script>
                            function divClicked() {
                                var divHtml = $(this).html();
                                var editableText = $("<textarea />");
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
                                    url: "<?php echo base_url(); ?>job/ajax_designation",
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