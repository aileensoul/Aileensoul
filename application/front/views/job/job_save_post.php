<!-- start head -->
<?php echo $head; ?>



<!--post save success pop up style strat -->
<style>
    /*body {
        font-family: Arial, sans-serif;
        background-size: cover;
        height: 100vh;
    }

    .box {
        width: 40%;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        padding: 35px;
        border: 2px solid #fff;
        border-radius: 20px/50px;
        background-clip: padding-box;
        text-align: center;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.3);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index: 10;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        width: 30%;
        height: 200px;
        position: relative;
        transition: all 5s ease-in-out;
    }
    */
           /* .okk{  text-align: center;  } 8-5-17 v*/

    /*   .popup .okbtn{
           position: absolute;
           transition: all 200ms;
           font-size: 18px;
           font-weight: bold;
           text-decoration: none;
           color: #fff;
           padding: 8px 18px;
           background-color: darkcyan;
           left: 25px;
           margin-top: 15px;
           width: 100px; 
           border-radius: 8px;
       }
    */
            /*.pop_content .okbtn{
                position: absolute;
                transition: all 200ms;
                font-size: 16px;
                text-decoration: none;
                color: #fff;
                padding: 8px 18px;
                background-color: #0A2C5D;
                left: 170px;
                margin-top: 8px;
                width: 100px; 
                border-radius: 8px;
            } 8-5-17 v*/

    /*  .popup .cnclbtn {
          position: absolute;
          transition: all 200ms;
          font-size: 18px;
          font-weight: bold;
          text-decoration: none;
          color: #fff;
          padding: 8px 18px;
          background-color: darkcyan;
          right: 25px;
          margin-top: 15px;
          width: 100px;
          border-radius: 8px;
      } */
            /*.pop_content .cnclbtn {
                position: absolute;
                transition: all 200ms;
                font-size: 16px;
                text-decoration: none;
                color: #fff;
                padding: 8px 18px;
                background-color: #0A2C5D;
                right: 170px;
                margin-top: 8px;
                width: 100px;
                border-radius: 8px;
            }

            .popup .pop_content {
                text-align: center;
                margin-top: 40px;
            }

            .model_ok_cancel{
                width:200px !important;
            } 8-5-17 v */
    /*
        @media screen and (max-width: 700px){
            .box{
                width: 70%;
            }
            .popup{
                width: 70%;
            }
        } */


</style>


<!--post save success pop up style end -->



<!-- <style type="text/css" media="screen">
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




</style> -->
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

<?php echo $job_header2; ?>
<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">
            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success cancel-result" onclick="" >Cancel</button>

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
                    <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:300px;margin-top:30px"></div>
                </div>
            </div>

            <div class="container">
                <div class="row" id="row2">
                    <?php
                    $userid = $this->session->userdata('aileenuser');
                     if($this->uri->segment(3) == $userid){
                     $user_id = $userid;
                     }elseif($this->uri->segment(3) == ""){
                     $user_id = $userid;
                     }else{
                     $user_id = $this->uri->segment(3);
                      }
                    $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                    $image = $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    //echo "<pre>";print_r($image);



                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(JOBBGIMAGE . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
                        <?php
                    } else {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / ></div>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>   

<div class="container">    
    <div class="upload-img">


        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>

    </div>
    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic">
                <?php if ($jobdata[0]['job_user_image'] != '') { ?>
                    <img src="<?php echo base_url(USERIMAGE . $jobdata[0]['job_user_image']); ?>" alt="" >
                <?php } else { ?>
                    <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                <?php } ?>
            <!--<a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>-->
                <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>

            </div>

            <!--            <div id="popup-form">
            <?php // echo form_open_multipart(base_url('job/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                            <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                            <input type="hidden" name="hitext" id="hitext" value="4">
                            <input type="submit" name="cancel4" id="cancel4" value="Cancel">
                            <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
            <?php // echo form_close(); ?>
                        </div>-->

        </div>
        <!-- menubar -->
        <div class="profile-main-rec-box-menu  col-md-12 ">

            <div class="left-side-menu col-md-2">  </div>
            <div class="right-side-menu col-md-9">  
                <ul class="">
                    <li <?php if ($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_printpreview') { ?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_printpreview'); ?>"> Details</a>
                    </li>
                    <?php if (($this->uri->segment(1) == 'job') && ($this->uri->segment(2) == 'job_all_post' || $this->uri->segment(2) == 'job_printpreview' || $this->uri->segment(2) == 'job_resume' || $this->uri->segment(2) == 'job_save_post' || $this->uri->segment(2) == 'job_applied_post') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>

                        <li <?php if ($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_resume') { ?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_resume'); ?>">Resume</a>
                        </li>

                        <li <?php if ($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_save_post') { ?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_save_post'); ?>">Saved </a>
                        </li>

                        <li <?php if ($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_applied_post') { ?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_applied_post'); ?>">Applied </a>
                        </li>

                    <?php } ?>


                </ul>
            </div>

      </div>
    </div>

    <div class="job-menu-profile">
        <a  href="<?php echo site_url('job/job_printpreview/' . $jobdata[0]['user_id']); ?>"><h5 class="profile-head-text"> <?php echo $jobdata[0]['fname'] . ' ' . $jobdata[0]['lname']; ?></h5></a>
        <!-- text head start -->
        <div class="profile-text" >

            <?php
            if ($jobdata[0]['designation'] == '') {
                ?>
                        <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <center><a id="designation" class="designation" title="Designation">Designation</a></center>
            <?php } else {
                ?> 
                    <!--<a id="myBtn" title="<?php echo ucwords($jobdata[0]['designation']); ?>"><?php echo ucwords($jobdata[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($jobdata[0]['designation']); ?>"><?php echo ucwords($jobdata[0]['designation']); ?></a>

            <?php } ?>


            <!-- The Modal -->
            <!--            <div id="myModal" class="modal">
                             Modal content <div class="col-md-2"></div>
                            <div class="modal-content col-md-8">
                                <span class="close">&times;</span>
                                <fieldset></fieldset>
            <?php // echo form_open(base_url('job/job_designation/'), array('id' => 'jobdesignation', 'name' => 'jobdesignation', 'class' => 'clearfix')); ?>
            
                                <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $jobdata[0]['designation']; ?>">
            <?php // echo form_error('designation'); ?>
                                </fieldset>
                                <input type="hidden" name="hitext" id="hitext" value="3">
                                <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
            <?php // echo form_close(); ?>
            
            
            
                            </div>
                            <div class="col-md-2"></div>
                        </div>-->
        </div>

        <!-- text head end -->

    </div><div class="col-md-7 col-sm-7">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Saved Job</h3>
                <div class="contact-frnd-post">
                    <?php

                    function text2link($text) {
                        $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
                        $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
                        $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
                        return $text;
                    }
                    ?>

                    <?php
                    if ($postdetail) {

                        foreach ($postdetail as $post) {
                            //    $post['user_id'] = $post['userid'];
                            ?> 
                            <div class="job-contact-frnd ">
                                <div class="profile-job-post-detail clearfix" id="<?php echo "postdata" . $post['app_id']; ?>">

     <div class="profile-job-post-title clearfix">
        <div class="profile-job-profile-button clearfix">
             <div class="profile-job-details col-md-12">
                    <ul>
                       <li class="fr">
                                                    Created Date : <?php echo date('d/m/Y',strtotime($post['created_date'])); ?>
                                                </li>
                     <li>
               <a  class="display_inline post_title" href="#" title="Post Title" >
               <?php echo ucwords(text2link($post['post_name'])); ?> </a>   </li>

             <li>   
                                                    <div class="fr lction">
                                                    <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;


                                                     $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>
                                                            <?php  
                                                            if($cityname || $countryname)
                                                            { 
                                                            ?>
                                                            <p><i class="fa fa-map-marker" aria-hidden="true">

                                                            <?php  echo $cityname .', '. $countryname; ?> 
                                                            </i></p>
                                                            
                                                            <?php
                                                             }

                                                             else{}?> 
                                                    </div>
<?php
                 $cache_time1= $this->db->get_where('recruiter', array('user_id' => $post['user_id']))->row()->re_comp_name; ?>
              <a class="display_inline" href="<?php echo base_url('recruiter/rec_profile/' . $post['user_id'].'?page=job'); ?>"  title="<?php echo $cache_time1;?>" ><?php
                
                   $out = strlen($cache_time1) > 40 ? substr($cache_time1,0,40)."..." : $cache_time1;       
                    echo $out;
                  
              ?></a>

            </li>

            <li><a  class="display_inline" title="Recruiter Name" href="<?php echo base_url('recruiter/rec_profile/' . $post['user_id'].'?page=job'); ?>"><?php
             $cache_time = $this->db->get_where('recruiter', array('user_id' => $post['user_id']))->row()->rec_firstname;
              $cache_time1 = $this->db->get_where('recruiter', array('user_id' => $post['user_id']))->row()->rec_lastname;
             echo ucwords($cache_time)."  ".ucwords($cache_time1);
           ?></a></li>
       </ul>
          </div>
               </div>
                                        <div class="profile-job-profile-menu">
                                            <ul class="clearfix">
                                                <li> <b> Skills</b> <span> 
                                                        <?php
                                                        $comma = ", ";
                                                        $k = 0;
                                                        $aud = $post['post_skill'];
                                                        $aud_res = explode(',', $aud);
                                                        foreach ($aud_res as $skill) {
                                                            if ($k != 0) {
                                                                echo $comma;
                                                            }
                                                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;


                                                            echo $cache_time;
                                                            $k++;
                                                        }
                                                        ?>       
                                                    </span>
                                                </li>


                                                <?php if ($post['other_skill']) { ?>
                                                    <li><b>Other Skill</b><span><?php echo $post['other_skill']; ?></span>
                                                    </li>
                                                <?php } else { ?>
                                                    <li><b>Other Skill</b><span><?php echo "-"; ?></span></li><?php } ?>

                                                <li><b>Job Description</b><span><p>
                                                            <?php echo text2link($post['post_description']); ?> </p></span>
                                                </li>
                                                <li><b>Interview Process</b><span>
                                                        <?php echo $post['interview_process']; ?></span>
                                                </li>
                                                   <li>
                                                <b>Required Experience</b>
                                                <span title="Min - Max">
                                                    <p><?php 




      if(($post['min_year'] !='0' || $post['min_month'] !='0' || $post['max_month'] !='0' || $post['max_year'] !='0') && ($post['fresher'] == 1))
     { 
        echo $post['min_year'].'.'.$post['min_month'] . ' Year - '.$post['max_year'] .'.'.$post['max_month'] . ' Year'." , ". "Fresher can also apply.";
     } 
    else
    {
  echo $post['min_year'].'.'.$post['min_month'] . ' Year - '.$post['max_year'] .'.'.$post['max_month'] . ' Year';
         
    }

 ?> 
    </p>  
                                                </span>
                                            </li>

     <li><b>Salary</b><span title="Min - Max" ><?php echo $post['min_sal']." - ".$post['max_sal']; ?></span>
                                            </li>

                                                <li><b>No of Position</b><span><?php echo $post['post_position']; ?></span>
                                                </li>


                                            </ul>
                                        </div>
                                        <div class="profile-job-profile-button clearfix">
                                            <div class="profile-job-details col-md-12">
                                                <ul>
                                                    <li class="job_all_post last_date">
                                                    Last Date : <?php echo date('d/m/Y',strtotime($post['post_last_date'])); ?></li>
                                                    <?php
                                                    $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

                                                    $contition_array = array('post_id' => $post['post_id'], 'job_delete' => 0, 'user_id' => $userid);
                                                    $jobsave = $this->data['jobsave'] = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                    if ($jobsave[0]['job_save'] == 1) {
                                                        ?>

                                                        <button  class="button" disabled>Applied</button>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li class="fr"> 

                                                                                                <!--<a href="<?php echo '#popup5' . $post['post_id']; ?>"  class= "<?php echo 'applypost' . $post['post_id']; ?>  button">Apply</a>-->
                                                            <a href="javascript:void(0);" class="button" onclick="applypopup(<?php echo $post['post_id'] ?>,<?php echo $post['app_id'] ?>)">Apply</a>

                                                        </li>
                                                        <li class="fr"> 
                                                            <!--<a href="#popup1" class="button">Remove</a>-->
                                                            <a href="javascript:void(0);" class="button" onclick="removepopup(<?php echo $post['app_id'] ?>)">Remove</a>
                                                        </li>

                                                        <?php
                                                    }
                                                    ?>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="text-center rio">
                            <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Saved Job Found.</h4>
                        </div>
                    <?php } ?> 
                </div>
                <div class="col-md-1">
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
            <div class="col-md-3"></div>

        </div>
    </div>
</div>
</section>

<!-- Model Popup Open -->
<!-- Bid-modal  -->
<div class="modal fade message-box biderror" id="bidmodal" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>     	
            <div class="modal-body">
                <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                <span class="mes"></span>
            </div>
        </div>
    </div>
</div>

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
                        <input type="hidden" name="hitext" id="hitext" value="4">
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

<!-- script for skill textbox automatic end -->

<script>

 var data = <?php echo json_encode($demo); ?>;
//alert(data);
 $(function () {
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
  } ,
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

            url: "<?php echo base_url(); ?>job/keyskill",
            dataType: 'json',
            delay: 250,

            processResults: function (data) {

                return {

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
<!-- Validation Start -->
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

<!-- Validation End -->

<!-- cover image start -->
<script>
    function myFunction() {
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";


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
                url: "<?php echo base_url() ?>job/ajaxpro",
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

<!-- modal javascript start -->

<script type="text/javascript">
    function remove_post(abc)
    {
        //var savepara = document.getElementById("saveid" + abc);
        var savepara = 'save';
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "job/job_delete_apply" ?>',
            data: 'app_id=' + abc + '&para=' + savepara,
            success: function (data) {
                $('#' + 'postdata' + abc).html(data);
                $('#' + 'postdata' + abc).parent().removeClass();
                var numItems = $('.contact-frnd-post .job-contact-frnd').length;
                if (numItems == '0') {
                    var nodataHtml = "<div class='text-center rio'><h4 class='page-heading  product-listing' style='border:0px;margin-bottom: 11px;'>No Saved Job Found.</h4></div>";
                    $('.contact-frnd-post').html(nodataHtml);
                }
            }
        });
    }
    function apply_post(abc, xyz)
    {

//      var alldata = document.getElementById("allpost" + abc);
        var alldata = 'all';
        //var user = document.getElementById("userid" + abc);
        var user = <?php echo $aileenuser_id; ?>;
        alert(user);
        var appid = xyz;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "job/job_apply_post" ?>',
            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
            success: function (data) {
                $('#' + 'postdata' + appid).html(data);
                $('#' + 'postdata' + appid).parent().removeClass();
                var numItems = $('.contact-frnd-post .job-contact-frnd').length;
                if (numItems == '0') {
                    var nodataHtml = "<div class='text-center rio'><h4 class='page-heading  product-listing' style='border:0px;margin-bottom: 11px;'>No Saved Job Found.</h4></div>";
                    $('.contact-frnd-post').html(nodataHtml);
                }

            }
        });

    }
</script>

<!-- model javascript end -->

<!-- for search validation -->
<script type="text/javascript">
    function checkvalue() {
        // alert("hi");
        var searchkeyword = document.getElementById('tags').value;
        var searchplace = document.getElementById('searchplace').value;
        // alert(searchkeyword);
        // alert(searchplace);
        if (searchkeyword == "" && searchplace == "") {
            // alert('Please enter Keyword');
            return false;
        }
    }
</script>
<!-- end search validation -->


<!-- end search validation -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
    function removepopup(id) {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
    function applypopup(postid, appid) {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to apply this post?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + appid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
    function updateprofilepopup(id) {
        $('#bidmodal-2').modal('show');
    }
</script>
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