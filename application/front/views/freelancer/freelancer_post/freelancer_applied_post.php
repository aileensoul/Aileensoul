<!-- start head -->
<?php echo $head; ?>

<!--post save success pop up style strat -->

<style type="text/css">
    #popup-form img{display: none;}
</style>

<style>
 
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
<!-- start header -->
<?php echo $header; ?>

<!-- END HEADER -->

<!-- CSS START -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">

<!-- END CSS -->

<?php echo $freelancer_post_header2; ?>


<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed"> 

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success cancel-result" onclick="" >Cancel</button>

                    <button class="btn btn-success set-btn upload-result" onclick="myFunction()">Save</button>

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
                    if($this->uri->segment(3) == $userid){
                    $user_id = $userid;
                    }elseif($this->uri->segment(3) == ""){
                    $user_id = $userid;
                    }else{
                   $user_id = $this->uri->segment(3);
                     }
                    $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                    $image = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    // rash code start 12-4
 $image_ori=$image[0]['profile_background'];
           if($image_ori)
           {
            ?>
            <div class="bg-images">
            <img src="<?php echo base_url($this->config->item('free_post_bg_main_upload_path') . $image[0]['profile_background']);?>" name="image_src" id="image_src" / ></div>
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


        <label class="cameraButton"><span class="tooltiptext">Upload Cover Photo</span><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
    </div>




    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic">
<?php if ($jobdata[0]['freelancer_post_user_image'] != '') { ?>
                    <img src="<?php echo base_url($this->config->item('free_post_profile_thumb_upload_path') . $jobdata[0]['freelancer_post_user_image']); ?>" alt="" >
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
                </form> -->
            <!-- </div> -->


        </div>    <div class="profile-main-rec-box-menu  col-md-12 ">

            <div class="left-side-menu col-md-2">  </div>
            <div class="right-side-menu col-md-9">  
                <ul class="">
                    <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>><a title="Freelancer Details" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">
Details</a>
                    </li>


<?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile' || $this->uri->segment(2) == 'freelancer_apply_post' || $this->uri->segment(2) == 'freelancer_save_post' || $this->uri->segment(2) == 'freelancer_applied_post') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>




                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a title="Saved Post" href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved Post</a>
                        </li>

                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a title="Applied Post" href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied Post</a>
                        </li>


<?php } ?>

                </ul>
            </div>
        </div>
        <div class="job-menu-profile1">
         <h5> <?php echo ucwords($freepostdata[0]['freelancer_post_fullname']) . ' ' . ucwords($freepostdata[0]['freelancer_post_username']); ?></h5>
         
            <div class="profile-text">

                 <?php 
                  
            if ($freepostdata[0]['designation'] == "") {

                ?> <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <a id="designation" class="designation" title="Designation">Current Work</a>
            <?php }
             else {
                ?> 
                <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($freepostdata[0]['designation']); ?>"><?php echo ucwords($freepostdata[0]['designation']); ?></a>
            <?php } ?>


                </div>

        </div>
        <!-- The Modal -->
      <!--   <div id="myModal" class="modal"> -->
            <!-- Modal content -->
           <!--  <div class="col-md-2"></div>
            <div class="modal-content col-md-8">
                <span class="close">&times;</span>
                <fieldset></fieldset>
<?php echo form_open(base_url('freelancer/designation'), array('id' => 'artdesignation', 'name' => 'artdesignation', 'class' => 'clearfix')); ?>

                <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $userdata[0]['designation']; ?>">

                <?php echo form_error('designation'); ?>
                </fieldset>

                <input type="hidden" name="hitext" id="hitext" value="1">
                <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                    <?php echo form_close(); ?>



            </div>
        </div> -->

        <div class="col-md-7 col-sm-7">
            <div class="common-form">
                <div class="job-saved-box">
                    <h3>Applied Posts</h3>
                    <div class="contact-frnd-post">

                         
                        <?php
                        if ($postdata) {

                            foreach ($postdata as $post) {
                                ?>
                                <div class="job-contact-frnd ">
                                    <div class="job-detail clearfix" id="<?php echo "removeapply" . $post['app_id']; ?>">


                                        


                                              
                                        <div class="job-contact-frnd ">
                                        <div class="profile-job-post-detail clearfix" id="<?php echo "removeapply" . $post['post_id']; ?>">
                                            <div class="profile-job-post-title-inside clearfix">


                                                
                  <div class="profile-job-post-title clearfix" style="margin-bottom:0px">
                  <div class="profile-job-profile-button clearfix">
                     <div class="profile-job-details col-md-12">
                          <ul>
                           <li class="fr">
                              Applied Date : <?php 
                                                if($post['modify_date'] != 0000-00-00)
                                                    { 

                                                    echo date('d-M-Y', strtotime($post['modify_date'])); 
                                                    }else{
                                                       echo date('d-M-Y', strtotime($post['created_date']));  
                                                    }
                                                    
                                                    ?>
                            </li>
                             <li>
                              <a href="#" title="Post Title" class="post_title">
                              <?php echo ucwords( $this->common->make_links($post['post_name'])); ?> </a>   </li>

                            <!--  <li>   
                               <div class="fr lction">
                              <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name; ?>
                              <?php $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>

                                <p title="Location"><i class="fa fa-map-marker" aria-hidden="true">  <?php echo $cityname.","; ?><?php echo $countryname; ?></i></p>
                                 </div>
                           </li> -->
                             <?php
                $firstname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->fullname;
                $lastname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->username;
                    ?>

                            <li><a class="display_inline" title="<?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>" href="<?php echo base_url('freelancer/freelancer_hire_profile/' . $post['user_id'].'?page=freelancer_post'); ?>"><?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>
                            </a>
                            <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name; ?>
                              <?php $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>

                              <?php if($cityname || $countryname){?>
                             <div class="fr lction">
                              
                                <p title="Location"><i class="fa fa-map-marker" aria-hidden="true">  <?php if ($cityname){echo $cityname.","; }?><?php if($countryname) { echo $countryname; } ?></i></p>
                                 </div>
                                 <?php }?>
                            </li>
                    <!-- vishang 14-4 end -->    
                </ul>
             </div>
          </div>
                       <div class="profile-job-profile-menu">
                            <ul class="clearfix">
                              <li> <b> Field</b> <span><?php echo $this->db->get_where('category', array('category_id' => $post['post_field_req']))->row()->category_name;?>
                              
                                                                    </span>
                                                                </li>
                               <li> <b> Skills</b> <span> 
                               <?php
                  $comma = ", ";
                  $k = 0;
                  $aud = $post['post_skill'];
                  $aud_res = explode(',', $aud);

                  if(!$post['post_skill']){

                    echo $post['post_other_skill'];
                  }else if(!$post['post_other_skill']){


                    foreach ($aud_res as $skill) {
                    if ($k != 0) {
                        echo $comma;
                    }
                $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                    echo $cache_time;
                        $k++;
                    }


                  }else if($post['post_skill'] && $post['post_other_skill']){
                 foreach ($aud_res as $skill) {
                    if ($k != 0) {
                        echo $comma;
                    }
                $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                    echo $cache_time;
                        $k++;
                    } echo "," .$post['post_other_skill']; }
            ?>     
                              
                                                                    </span>
                                                                </li>


                                                                <!-- <?php if ($post['post_other_skill']) { ?>
                                                                    <li><b>Other Skill</b><span><?php echo $post['post_other_skill']; ?></span>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li><b>Other Skill</b><span><?php echo "-"; ?></span></li><?php } ?> -->

                                                                <li><b>Post Description</b><span><p>
                                                                            <?php if($post['post_description']){echo  $this->common->make_links($post['post_description']);}else{echo PROFILENA;} ?> </p></span>
                                                                </li>
                                                                <li><b>Rate</b><span>
                                                                        <?php if($post['post_rate']){
                     echo $post['post_rate'];
                     echo "&nbsp";
                     echo $this->db->get_where('currency', array('currency_id' => $post['post_currency']))->row()->currency_name; echo "&nbsp";
                      if($post['post_rating_type'] == 1){
                        echo "Hourly";
                      }else{echo "Fixed";}}
                     else{ echo PROFILENA;}
                        ?></span>
                                                                </li>
                                                                <!-- vishang 14-4 start -->
                                                                <li>
                                                                    <b>Required Experience</b>
                                                                    <span>
                                                                        <?php if($post['post_exp_month'] ||  $post['post_exp_year']){
            echo $post['post_exp_year'].".";?>&nbsp;<?php  echo $post['post_exp_month']." Year";}
                else{echo PROFILENA;} ?>
                                                                    </span>
                                                                </li>


                                                                <!-- vishang 14-4 end -->

                                                               
                                                                
                                                                <li><b>Estimated Time</b><span> <?php if($post['post_est_time']) {echo $post['post_est_time'];} else{echo PROFILENA; } ?></span>
                                                                </li>


                                                            </ul>
                                                        </div>
                                                        <div class="profile-job-profile-button clearfix">
                                                            <div class="profile-job-details col-md-12">
                      <ul><li class="job_all_post last_date">
                           Last Date : <?php if($post['post_last_date']){echo date('d-M-Y', strtotime($post['post_last_date']));} else{echo PROFILENA;} ?>                                                          </li>

                                                                   
                                                                                            
                                          <li class=fr>

<a href="javascript:void(0);" class="button fr" onclick="removepopup(<?php echo  $post['app_id'];?>)">Remove</a>

                                          

                                                                   </li>                        
</ul>

                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                        </div>


                                                </div>
                                                </div>
                                    

                                
    <?php }
} else {
    ?>
                            <div class="text-center rio">
                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Applied Posts Found.</h4>
                            </div>                               
    <?php }
?>   
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
                                                <?php echo form_open_multipart(base_url('freelancer/user_image_add'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">

                                                 <img id="preview" src="#" alt="your image" style="border: 2px solid rgb(204, 204, 204); display: none; margin: 0 auto; margin-top: 5px;padding: 5px;"/>
                                                <input type="hidden" name="hitext" id="hitext" value="1">
                                                <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save"  style="margin-top:32px!important;">
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

<!-- script for skill textbox automatic end (option 2)-->

<!-- Script for Coppier  -->


    <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>

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

<!-- Script for Coppier  End -->

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

        //setTimeout(function () { location.reload(1); }, 5000);

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



<!-- remove apply post start -->

<!-- <script type="text/javascript">
    function remove_post(abc)
    {
        // var x = document.getElementById('removehidden' + abc);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "freelancer/freelancer_delete_apply" ?>',
            data: 'app_id=' + abc + '&para=' + x.value,
            success: function (data) {

                $('#' + 'removesavedata' + abc).html(data);


            }
        });

    }
</script> -->

<!-- remove apply post end -->


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
            //alert('Please enter Keyword');
            return false;
        }
    }

</script>

<script>

<!-- remove save post start -->

    function remove_post(abc)
    {
         //alert(abc); 
    
    $.ajax({
    type:'POST',
            url:'<?php echo base_url() . "freelancer/freelancer_delete_apply" ?>',
            data:'app_id=' + abc,
            success:function(data){
                $('#' + 'removeapply' + abc).html(data).removeClass();
                $('#' + 'removeapply' + abc).parent();
                var numItems = $('.contact-frnd-post .job-contact-frnd').length;
                if (numItems == '0') {
                    var nodataHtml = "<div class='text-center rio'><h4 class='page-heading  product-listing' style='border:0px;margin-bottom: 11px;'>No Saved Freelancer Found.</h4></div>";

                 $('.contact-frnd-post').html(nodataHtml);

}
            
            }
    });
    }
</script>

<script>
    function removepopup(id) {
        //alert(id); return false;
        $('.biderror .mes').html("<div class='pop_content'>Do you want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id="+ id +" onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
</script>
<!-- save post start -->
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
                                 if(html == ''){
                                    html = "Current Work";
                                 }
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

<!-- script for profile pic strat -->
<script type="text/javascript">
    

     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            
            document.getElementById('preview').style.display = 'block';
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#profilepic").change(function(){
        readURL(this);
    });
</script>

<!-- script for profile pic end -->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>


<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#userimage").validate({

                    rules: {

                        profilepic: {

                            required: true,
                         
                        },
  

                    },

                    messages: {

                        profilepic: {

                            required: "Photo Required",
                            
                        },

                },

                });
                   });
  </script>