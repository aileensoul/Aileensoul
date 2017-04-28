
<?php echo $head; ?>


<!--post save success pop up style strat -->
<style>
   /* body {
        font-family: Arial, sans-serif;
        background-size: cover;
        height: 100vh;
    }*/

    /*.box {
        width: 40%;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        padding: 35px;
        border: 2px solid #fff;
        border-radius: 20px/50px;
        background-clip: padding-box;
        text-align: center;
    }*/



   /* .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index: 10;
    }*/
    /*.overlay:target {
        visibility: visible;
        opacity: 1;
    }*/

    /*.popup {
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
.okk{
        text-align: center;
    }
     .pop_content .okbtn{
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
    }
      .pop_content .cnclbtn {
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
    }
  
/*    @media screen and (max-width: 700px){
        .box{
            width: 70%;
        }
        .popup{
            width: 70%;
        }
    }*/
</style>

<!--post save success pop up style end -->

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


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<!-- END HEADER -->

<?php echo $freelancer_post_header2; ?>


<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container">
            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success  cancel-result set-btn" onclick="" >Cancel</button>

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
                    //echo "<pre>";print_r($image);
                    // rash code 12-4 start
                   $image_ori=$image[0]['profile_background'];
           if($image_ori)
           {
            ?>
            <div class="bg-images">
            <img src="<?php echo base_url(FREEWORKIMG . $image[0]['profile_background']);?>" name="image_src" id="image_src" / ></div>
            <?php
           }
           else
           { ?>
          <div class="bg-images">  
            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / >
            </div>
         <?php  }
          
            ?>
<!-- rash code end 12-4 -->
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
                <?php if ($jobdata[0]['freelancer_post_user_image'] != '') { ?>
                    <img src="<?php echo base_url(USERIMAGE . $jobdata[0]['freelancer_post_user_image']); ?>" alt="" >
                <?php } else { ?>
                    <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                <?php } ?>
                <!-- <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a> -->
                <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>


            </div>

            <!-- <div id="popup-form">
                <?php echo form_open_multipart(base_url('freelancer/user_image_add'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                <input type="hidden" name="hitext" id="hitext" value="2">
                <input type="submit" name="cancel2" id="cancel2" value="Cancel">
                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                </form>
            </div>
 -->

        </div>          <div class="profile-main-rec-box-menu  col-md-12 ">

            <div class="left-side-menu col-md-2">  </div>
            <div class="right-side-menu col-md-9">  
                <ul class="">
                    <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">Profile</a>
                    </li>


                    <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile' || $this->uri->segment(2) == 'freelancer_apply_post' || $this->uri->segment(2) == 'freelancer_save_post' || $this->uri->segment(2) == 'freelancer_applied_post') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>




                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved Post</a>
                        </li>

                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied Post</a>
                        </li>


                    <?php } ?>

                </ul>
            </div></div>
        <div class="job-menu-profile1">
            <h3 > <?php echo ucwords($freepostdata[0]['freelancer_post_fullname']) . ' ' . ucwords($freepostdata[0]['freelancer_post_username']); ?></h3>
            <div class="profile-text">
             


                 <?php 
                  
            if ($freepostdata[0]['designation'] == "") {

                ?> <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <center><a id="designation" class="designation" title="Designation">Current Work</a></center>
            <?php }
             else {
                ?> 
                <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($freepostdata[0]['designation']); ?>"><?php echo ucwords($freepostdata[0]['designation']); ?></a>
            <?php } ?>

                </div>

        </div>
        <!-- The Modal -->
   <!--      <div id="myModal" class="modal"> -->
            <!-- Modal content -->
            <!-- <div class="col-md-2"></div>
            <div class="modal-content col-md-8">
                <span class="close">&times;</span>
                <fieldset></fieldset>
                <?php echo form_open(base_url('freelancer/designation'), array('id' => 'artdesignation', 'name' => 'artdesignation', 'class' => 'clearfix')); ?>

                <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $userdata[0]['designation']; ?>">

                    <?php echo form_error('designation'); ?>
                </fieldset>

                <input type="hidden" name="hitext" id="hitext" value="2">
                <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                <?php echo form_close(); ?>



            </div>
        </div> -->

        <div class="col-md-7 col-sm-7">
            <div class="common-form">
                <div class="job-saved-box">
                    <h3>Saved Posts</h3>
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
                        if($postdetail){
                        foreach ($postdetail as $post) {

                            ?> 
                            <div class="job-contact-frnd ">


                                <!-- pop up box start-->
                               <!--  <div id="popup2" class="overlay">
                                    <div class="popup">

                                        <div class="pop_content">
                                            Successfully Apply this post..
                                            <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                                        </div>

                                    </div>
                                </div> -->
                                <!-- pop up box end-->


                                <!-- pop up box start-->
                                <!-- <div id="popup3" class="overlay">
                                    <div class="popup">

                                        <div class="pop_content">
                                            Are You sure want to delete this post?.

                                            <input type="hidden" id="<?php echo 'removehidden' . $post['save_id']; ?>" value="save">

                                            <p class="okk"><a class="okbtn" id="<?php echo $post['save_id']; ?>" onClick="remove_post(this.id)" href="#">OK</a></p>

                                            <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>

                                        </div>

                                    </div>
                                </div> -->
                                <!-- pop up box end-->


                                <div class="job-post-detail clearfix"  id="<?php echo "removeapply" . $post['save_id']?>">
                                    <div class="job-post-title">
                                        <h6><a href="<?php echo base_url('freelancer/freelancer_hire_profile/' . $post['user_id']); ?>" title="Post Title" >
                                            </a></h6>
                                    </div>
                                    <div class="exper-location">
                                        <ul>

                                          <li>Posted-<?php echo date('d-M-Y', strtotime($post['created_date'])); ?></li>

                                            <li>

                           <?php
                      $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;
                             $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name;
                           if( $cityname != 0 || $countryname != 0)
                                                                {
                                                                    ?>

                                                                <p><i class="fa fa-map-marker" aria-hidden="true"><?php echo $cityname . ", " . $countryname; ?></i></p>

                                                                <?php }
                                                                else
                                                                {

                                                                }
                                                                ?>

                                                            </li>
                                        </ul>
                                    </div>
                                     <div class="profile-job-post-detail clearfix" style="border: none;" >
                                                    <div class="profile-job-post-title clearfix">

                                                        <div class="profile-job-profile-menu">

                                        <ul>
                                             <li><b>Skills</b> <span>
                                                                    <?php
                                                                    $comma = ",";
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
                                                                </span></li>
                                                            <?php $field = $this->db->get_where('category', array('category_id' => $post['post_field_req']))->row()->category_name; ?>
                                                            <li><b>Field</b> <span><?php 
                                                            if($field)
                                                            {

                                                            echo $field;
                                                            }
                                                            else
                                                            {
                                                                echo PROFILENA;
                                                                } ?></span></li>

                                                            <li><b>Description</b> <span><p><?php 

                                                                  if($post['post_description'])
                                                            {

                                                            echo $post['post_description'];
                                                            }
                                                            else
                                                            {
                                                                echo PROFILENA;
                                                                } 


                                                            ?></p></span></li>
                                                            <?php
                                                            $cache_time = $this->db->get_where('currency', array('currency_id' => $post['post_currency']))->row()->currency_name;
                                                            $type = $post['post_rating_type'];

                                                            if ($type == 0) {
                                                                $ratetype = 'Hourly';
                                                            } else {
                                                                $ratetype = 'Fixed';
                                                            }
                                                            ?>
                                                            <li><b>Rate</b><span><?php

                                                                 if($post['post_rate'])
                                                            {

                                                             echo $post['post_rate'] . " " . $cache_time . " " . $ratetype;
                                                            }
                                                            else
                                                            {
                                                                echo PROFILENA;
                                                                } 


                                                              ?></span></li>
                                                            <li><b>Require Experience</b><span><?php

                                                                  if($post['post_exp_year'])
                                                            {

                                                            echo $post['post_exp_year'];
                                                            }
                                                            else
                                                            {
                                                                echo PROFILENA;
                                                            } ?>-year 
                                                            <?php 


                                                            if($post['post_exp_month'])
                                                            {

                                                               echo "  " . $post['post_exp_month'];
                                                            }
                                                            else
                                                            {
                                                                echo PROFILENA;
                                                                } 

                                                             ?>-month</span></li>
                                                            <li><b>Estimate Time</b><span><?php 
                                                                      if($post['post_est_time'])
                                                            {

                                                            echo $post['post_est_time'];
                                                            }
                                                            else
                                                            {
                                                                echo PROFILENA;
                                                            } 


                                                         ?></span></li>
                                            <li class="clearfix salary-age">
<!-- 
                                                 <div class="pull-right">
                                                                    Last Date for apply : <?php //echo date('d-M-Y', strtotime($post['post_last_date'])); ?>
                                                                </div> -->
                                            </li>
                                        </ul>
                                    </div></div></div>
                                    <div class="profile-job-profile-button clearfix">
                                     <div class="fl"  style="padding-top: 20px; padding-left: 10px;">
                                                                    Last Date for apply : <?php echo date('d-M-Y', strtotime($post['post_last_date'])); ?>
                                                                </div>
                                            
                                        <div class="apply-btn fr">
                                          
                                            <?php
                                            $cache_time = $this->db->get_where('freelancer_post', array('post_id' => $post['post_id']))->row()->user_id;
                                            ?>

                                            <?php
                                            $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

                                            $contition_array = array('post_id' => $post['post_id'], 'job_delete' => 0, 'user_id' => $userid);
                                            $jobsave = $this->data['jobsave'] = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                            if ($jobsave[0]['job_save'] == 1) {
                                                ?>

                  <button  class="button_applied" disabled>Applied</button>

                                                <?php
                                            } else {
                                                ?>

                                                <input type="hidden" id="<?php echo 'allpost' . $post['post_id']; ?>" value="all">
                                                <input type="hidden" id="<?php echo 'userid' . $post['post_id']; ?>" value="<?php echo $cache_time; ?>">

                                               <a href="javascript:void(0);"  class= "<?php echo 'applypost' . $post['post_id']; ?>  button" onclick="applypopup(<?php echo $post['post_id'] ?>,<?php echo $post['user_id'] ?>)">Apply</a>

                                            <?php } ?>

                                            <a href="javascript:void(0);" class="button" onclick="removepopup(<?php echo  $post['save_id']?>)">Remove</a>


                                        </div>
                                    </div>

                                </div>
                        <?php } }else{
                            ?>
                                <div class="text-center rio">
                                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Saved Posts Found.</h4>
                                            </div>
                                <?php
                        } ?>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

</div>    </section>
<footer>

    <footer>
        <?php echo $footer; ?>
    </footer>

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
<!-- Model Popup Close -->

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

<!-- script for skill textbox automatic start (option 2)-->
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
     <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>



<!-- script for skill textbox automatic end (option 2)-->
<script>

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#tags" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
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
            ajax:{


            url: "<?php echo base_url(); ?>freelancer/keyskill",
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
            ajax:{


            url: "<?php echo base_url(); ?>freelancer/location",
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
    
     url: "<?php echo base_url() ?>freelancer/ajaxpro_work",

            type: "POST",
            data: {"image":resp},
            success: function (data) {
            html = '<img src="' + resp + '" />';
            if (html){
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
    }).then(function(){
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

    url: "<?php echo base_url(); ?>freelancer/image_work",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){


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
    btn.onclick = function() {
    modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
    }
</script>


<script>

<!-- remove save post start -->

    function remove_post(abc)
    {
        // alert(abc); 
    
    $.ajax({
    type:'POST',
            url:'<?php echo base_url() . "freelancer/remove_save" ?>',
            data:'save_id=' + abc,
            success:function(data){
                $('#' + 'removeapply' + abc).html(data);
                $('#' + 'removeapply' + abc).parent().removeClass();
                var numItems = $('.contact-frnd-post .job-contact-frnd').length;
                if (numItems == '0') {
                    var nodataHtml = "<div class='text-center rio'><h4 class='page-heading  product-listing' style='border:0px;margin-bottom: 11px;'>No Saved Freelancer Found.</h4></div>";

                 $('.contact-frnd-post').html(nodataHtml);

}
            
            }
    });
    }

      function apply_post(abc)
    {
    var alldata = document.getElementById("allpost" + abc);
    var user = document.getElementById("userid" + abc);
    $.ajax({
    type:'POST',
            url:'<?php echo base_url() . "freelancer/apply_insert" ?>',
            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
            success:function(data){
            $('.' + 'applypost' + abc).html(data);
            }
    });
    }
</script>

<!-- remove save post end -->


<!-- apply post start -->

<!-- <script type="text/javascript">
    function apply_post(abc)
    {

    var alldata = document.getElementById("allpost" + abc);
    var user = document.getElementById("userid" + abc);
    $.ajax({
    type:'POST',
            url:'<?php echo base_url() . "freelancer/apply_insert" ?>',
            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
            success:function(data){

            $('.' + 'applypost' + abc).html(data);
            }
    });
    }
    
  </script> -->


                        <script>
                            function updateprofilepopup(id) {
                                $('#bidmodal-2').modal('show');
                            }
                        </script>




                        <script type="text/javascript">
            function checkvalue() {
            
            var searchkeyword = document.getElementById('tags').value;
            var searchplace = document.getElementById('searchplace').value;
            // alert(searchke                                    yword);
            // alert(search                                    place);
            if (searchkeyword == "" && searchplace = = "") {
            //alert('Please enter Key                                        word');
            return  false;
            }
            }
        </script> 
         <!-- <script type="text/javascript">
                    function apply_post(abc, xyz) {
                        //var alldata = document.getElementById("allpost" + abc);
                        var alldata = 'all';
                        //var user = document.getElementById("userid" + abc);
                        var user = xyz;

                        $.ajax({
                            type: 'POST',
                            url: '<?php //echo base_url() . "freelancer/save_insert"?>',
//                            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
                            data: 'post_id=' + abc + '&allpost=' + alldata + '&userid=' + user,
                            success: function (data) {
                                $('.savedpost' + abc).hide();
                                $('.applypost' + abc).html(data);
                                $('.applypost' + abc).attr('disabled', 'disabled');
                                $('.applypost' + abc).attr('onclick', 'myFunction()');
                            }
                        });
                    }
                </script>
 -->
                <

        <!-- apply post end-->

<script>
    function removepopup(id) {
         //alert(id); return false;
        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to remove this Freelancer?<div class='model_ok_cancel'><a class='okbtn' id="+ id +" onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
       function applypopup(postid, userid) {
                        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to apply this post?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + userid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show');
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
                                    url: "<?php echo base_url(); ?>recruiter/ajax_designation",
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

