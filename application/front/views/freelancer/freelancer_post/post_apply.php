
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
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->
<?php echo $freelancer_post_header2; ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
       
        <script>
            $(document).ready(function ()
            {
                /* Uploading Profile BackGround Image */
                $('body').on('change', '#bgphotoimg', function ()
                {
                    $("#bgimageform").ajaxForm({target: '#timelineBackground',
                        beforeSubmit: function () {},
                        success: function () {
                            $("#timelineShade").hide();
                            $("#bgimageform").hide();
                        },
                        error: function () {
                        }}).submit();
                });
                /* Banner position drag */
                $("body").on('mouseover', '.headerimage', function ()
                {
                    var y1 = $('#timelineBackground').height();
                    var y2 = $('.headerimage').height();
                    $(this).draggable({
                        scroll: false,
                        axis: "y",
                        drag: function (event, ui) {
                            if (ui.position.top >= 0)
                            {
                                ui.position.top = 0;
                            } else if (ui.position.top <= y1 - y2)
                            {
                                ui.position.top = y1 - y2;
                            }
                        },
                        stop: function (event, ui)
                        {
                        }
                    });
                });
                /* Bannert Position Save*/
                $("body").on('click', '.bgSave', function ()
                {
                    var id = $(this).attr("id");
                    var p = $("#timelineBGload").attr("style");
                    var Y = p.split("top:");
                    var Z = Y[1].split(";");
                    var dataString = 'position=' + Z[0];
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('freelancer/image_saveBG_ajax_hire'); ?>",
                        data: dataString,
                        cache: false,
                        beforeSend: function () { },
                        success: function (html)
                        {
                            if (html)
                            {
                                window.location.reload();
                                $(".bgImage").fadeOut('slow');
                                $(".bgSave").fadeOut('slow');
                                $("#timelineShade").fadeIn("slow");
                                $("#timelineBGload").removeClass("headerimage");
                                $("#timelineBGload").css({'margin-top': html});
                                return false;
                            }
                        }
                    });
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <!-- cover pic start -->
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"><div class="profile-box profile-box-left">
<!--                            <div class="full-box-module">    
                                <div class="profile-boxProfileCard  module">
                                    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                       href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"
                                       tabindex="-1"
                                       aria-hidden="true"
                                       rel="noopener">
                                        rash code start 12-4 
                                       <?php
                                       if ($freepostdata[0]['profile_background'] != '') {
                                           ?>
                                         box image start 
                                        <img src="<?php echo base_url(JOBBGIMAGE . $freepostdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo  $freepostdata[0]['freelancer_post_fullname'] . ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="height: 95px;
                                             width: 100%;">
                                         box image end 
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo  $freepostdata[0]['freelancer_post_fullname'] . ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="height: 95px;
                                             width: 100%;">
                                             <?php
                                         }
                                         ?>
                                    </a>
 rash code end 12-4 
                                    <div class="profile-box-menu  fr col-md-12">
                                        <div class="left- col-md-2"></div>
                                        <div  class="right-section col-md-10">
                                            <ul>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">Details</a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved </a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-boxProfileCard-content">
                                        <div class="buisness-profile-txext ">
                                             <rash code 12-4 start> 
                                              <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo base_url('freelancer/freelancer_post_profile/' . $freelancerdata[0]['user_id']); ?>" title="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>" tabindex="-1" aria-hidden="true" rel="noopener">
                                              <?php
                                            if ($freelancerdata[0]['freelancer_post_user_image']) {
                                                ?>
                                                <img src="<?php echo base_url(USERIMAGE . $freelancerdata[0]['freelancer_post_user_image']); ?>" alt="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>"   style="   height: 80px;
                                                     width: 77px;     z-index: 3;
                                                     position: relative;">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>"   style="   height: 80px;
                                                     width: 77px;     z-index: 3;
                                                     position: relative;">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                         <rash code 12-4 end> 
                                        </div>
                                        <div class="profile-box-user">
                                            <span class="profile-box-name ">
                                                <a style="font-size: 18px; font-weight: 600;" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php echo ucwords($userdata[0]['first_name']) . ' ' . ucwords($userdata[0]['last_name']); ?></a></span>
                                        </div>
                                        <div class="profile-box-user">
                                            <span class="profile-box-name"><a style=" font-weight: 600; font-size: 15px;" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php
if ($freepostdata[0]['designation']) {
    echo ucwords($freepostdata[0]['designation']);
} else {
    echo "Current Work";
}
?></a></span>
                                        </div>
                                        <div id="profile-box-profile-prompt"></div>
                                    </div>
                                </div></div>-->
<div class="full-box-module">    
      
      <div class="profile-boxProfileCard  module">
<div class="profile-boxProfileCard-cover">   
                                    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                       href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"
                                       tabindex="-1"
                                       aria-hidden="true"
                                       rel="noopener">
                                       <!-- rash code start 12-4 -->
                                       <?php
                                       if ($freepostdata[0]['profile_background'] != '') {
                                           ?>
                                        <!-- box image start -->
                                        <img src="<?php echo base_url(FREEWORKIMG . $freepostdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo  $freepostdata[0]['freelancer_post_fullname'] . ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="height: 95px;
                                             width: 100%;">
                                        <!-- box image end -->
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo  $freepostdata[0]['freelancer_post_fullname'] . ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="height: 95px;
                                             width: 100%;">
                                             <?php
                                         }
                                         ?>
                                        </a>
 </div>
  
    <div class="profile-boxProfileCard-content clearfix">
<div class="buisness-profile-txext col-md-4">
       
                                                              <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" 
                                                              href="<?php echo base_url('freelancer/freelancer_post_profile/' . $freelancerdata[0]['user_id']); ?>" title="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>" tabindex="-1" aria-hidden="true" rel="noopener">
                                                   <?php
                                            if ($freelancerdata[0]['freelancer_post_user_image']) {
                                                ?>
                                                 <img src="<?php echo base_url(USERIMAGE . $freelancerdata[0]['freelancer_post_user_image']); ?>" alt="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>"  style="    height: 77px;
    width: 71px;
    z-index: 3;
    position: relative;
">
                                                <?php
                                            } else {
                                                ?>
                                                 <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>"   style="   height: 80px;
                                                     width: 77px;     z-index: 3;
                                                     position: relative;"> <?php
                                            }
                                            ?>
                                        </a>
</div>
<div class="profile-box-user  profile-text-bui-user  fr col-md-9">
            <span class="profile-company-name ">
                                         <a style="font-size: 18px; font-weight: 600;" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php echo ucwords($userdata[0]['first_name']) . ' ' . ucwords($userdata[0]['last_name']); ?></a>
                                        </span>
       
         
         <div class="profile-boxProfile-name">
        <a style=" font-weight: 600; font-size: 15px;" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php
if ($freepostdata[0]['designation']) {
    echo ucwords($freepostdata[0]['designation']);
} else {
    echo "Current Work";
}
?></a></div>
     
     
    </div>
   
          <div class="profile-box-job-menu  col-md-12">
         
                                    <ul class="">
                                             <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">Details</a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved </a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied</a>
                                                </li>
                                </ul>
     
      </div>
     
  </div>
  </div>
  </div>
                        </div>
                    </div>
                    <!-- cover pic end -->
                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3> Recommended Post</h3>
                                <div class="contact-frnd-post">
                                    <div >
                                        <!-- start -->
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
                                        foreach ($postdetail as $post_key => $post_value) {
                                            foreach ($post_value as $post) {
                                                ?>
                                                <div class="job-post-detail clearfix">
                                                    <!-- pop up box start-->
                               <div id="popup1" class="overlay">
                                       <div class="popup">
                                        <div class="pop_content">
                                         Your Post is Successfully Saved.
                                 <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- pop up box end-->
                                                    
                                                    <!-- pallavi 10/4/2017 -->
                                                    <!-- pop up box start-->
<!-- <div id="<?php //echo "popup5" . $post['post_id']; ?>" class="overlay">
  <div class="popup">
    
    <div class="pop_content">
      Are You Sure want to apply this post?.
      <p class="okk"><a class="okbtn" id="<?php //echo $post['post_id']; ?>" onClick="apply_post(this.id)" href="#">Apply</a></p>
      <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>
    </div>
  </div>
</div> -->
<!-- pop up box end-->
<!-- pallavi end 10/04/2017 -->
   <div class="job-contact-frnd ">
                                        <div class="profile-job-post-detail clearfix" id="<?php echo "removeapply" . $post['post_id']; ?>">
                                            <div class="profile-job-post-title-inside clearfix">


                                                <!-- pop up box start-->
                                                <!-- <div id="<?php echo 'popup3' . $post['post_id']; ?>" class="overlay">
                                                    <div class="popup"> -->
<!-- khati changes 11-4 start -->
                                                        <!-- div class="pop_content">
                                                            Are You Sure want to delete this post?.

                                                            <p class="okk"><a class="okbtn" id="<?php echo $post['post_id']; ?>" onClick="remove_post(this.id)" href="#">Yes</a></p>

                                                            <p class="okk"><a class="cnclbtn" href="#">No</a></p>

                                                        </div> -->
<!-- khati changes 11-4 end -->
                                                   <!--  </div>
                                                </div> -->
                                                <!-- pop up box end-->
                  <div class="profile-job-post-title clearfix" style="margin-bottom:0px">
                  <div class="profile-job-profile-button clearfix">
                     <div class="profile-job-details col-md-12">
                          <ul>
                           <li class="fr">
                              Created Date : <?php
                            echo trim(date('d-M-Y', strtotime($post['created_date'])));
                                   ?>
                            </li>
                             <li>
                              <a href="#" title="Post Title" class="display_inline" style="font-size: 19px;font-weight: 600;cursor: default;">
                              <?php echo ucwords(text2link($post['post_name'])); ?> </a>   </li>

                             <li>   
                               <div class="fr lction">
                              <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name; ?>
                              <?php $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>

                                <p><i class="fa fa-map-marker" aria-hidden="true">  <?php echo $cityname.","; ?><?php echo $countryname; ?></i></p>
                                 </div>

                             <?php
                $firstname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->fullname;
                $lastname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->username;
                    ?>

                            <li><a class="display_inline" title="<?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>" href="<?php echo base_url('freelancer/freelancer_hire_profile/' . $post['user_id'].'?page=freelancer_post'); ?>"><?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>
                            </a></li>
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
                                                                foreach ($aud_res as $skill) {
                                                                    if ($k != 0) {
                                                                        echo $comma;
                                                                    }
                                                                    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;

                                                                    if($cache_time){
                                                                    echo $cache_time;}
                                                                    else{echo PROFILENA;}
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

                                                                <li><b>Post Description</b><span><p>
                                                                            <?php if($post['post_description']){echo text2link($post['post_description']);}else{echo PROFILENA;} ?> </p></span>
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
            echo $post['post_exp_year'];   ?> year&nbsp;&nbsp;<?php  echo $post['post_exp_month'];}
                else{echo PROFILENA;} ?> month
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
                                          <?php
$this->data['userid'] = $userid = $this->session->userdata('aileenuser');
 $contition_array = array('post_id' => $post['post_id'], 'job_delete' => 0, 'user_id' => $userid);
$freelancerapply1 = $this->data['freelancerapply'] = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
 if ($freelancerapply1) {
          ?>
        <a href="javascript:void(0);" class="button saved">Applied</a>
 <?php
} else {
?>
<input type="hidden" id="<?php echo 'allpost' . $post['post_id']; ?>" value="all">

 <input type="hidden" id="<?php echo 'userid' . $post['post_id']; ?>" value="<?php echo $post['user_id']; ?>">
                <a class="applypost button" href="javascript:void(0);"  class= "<?php echo 'applypost' . $post['post_id']; ?>  button" onclick="applypopup(<?php echo $post['post_id'] ?>,<?php echo $post['user_id'] ?>)">Apply</a>
                                                                    </li> 
                <li>
                <?php
$userid = $this->session->userdata('aileenuser');
            
$contition_array = array('from_id' => $userid, 'to_id' => $post['user_id'],'save_type' => 2,'status'=> 0);
$data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            if ($data){
                ?>
       <a class="saved  button">Saved</a>
    <?php } else { ?>
                <input type="hidden" name="saveuser"  id="saveuser" value= "<?php echo $data[0]['save_id']; ?>"> 
<a id="<?php echo $post['user_id']; ?>" onClick="savepopup(<?php echo $post['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $post['user_id']; ?> applypost button">Save</a>

                <?php }?>
                <?php }?>

                                                                   </li>                        

                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                        </div>


                                                </div>

                                                        <?php }
                                        } }else{
                                            ?>
                                         <div class="text-center rio">
                                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Recommended Post Found.</h4>
                                            </div>
                                        <?php
                                        } ?> 
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
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
                </body>
                </html>
                <!-- script for skill textbox automatic start (option 2)-->
                <!-- script for skill textbox automatic end (option 2)-->
    <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                <!-- save post start -->
                
                <script type="text/javascript">
                   function save_post(abc)
                   {  
                    //alert(abc);
                    var saveid = document.getElementById("saveuser");
                    //alert(saveid);
                      $.ajax({ 
                                type:'POST',
                                url:'<?php echo base_url() . "freelancer/save_user" ?>',
                                // data:'post_id='+abc,
                                data: 'user_id=' + abc + 'save_id=' + saveid.value,
                                success:function(data){ 
                                
                                 $('.' + 'saveduser' + abc).html(data).addClass('saved');
                                 
                                }
                            }); 
                        
                }
                </script>
                
              
                <script type="text/javascript">
    function apply_post(abc)
    {
    var alldata = document.getElementById("allpost" + abc);
    var user = document.getElementById("userid" + abc);


    $.ajax({
    type:'POST',
            url:'<?php echo base_url() . "freelancer/apply_insert" ?>',
            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
            success:function(data){
                //alert(data);
            $('.' + 'applypost' + abc).html(data);
            }
    });
    }
                        </script>
                <!-- apply post end-->
                              <!-- save post end -->
 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                     <script>
                    function savepopup(id) {
                        //alert(id);
                        save_post(id);
//                       
                        $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
                        $('#bidmodal').modal('show');
                    }
            function applypopup(postid, userid) {

                // alert(postid);
                // alert(userid);
               
                $('.biderror .mes').html("<div class='pop_content'>Are you sure want to apply this post?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + userid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show');
                    }
                   
                    </script>