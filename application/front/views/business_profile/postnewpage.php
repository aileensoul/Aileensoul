<!-- start head -->
<?php echo $head; ?>
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
        left: 168px;
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
<!--post save success pop up style strat -->
<style>

    /* The Modal (background) */
    .modal2 {
        display: none;
        position: fixed;
          z-index:1000;
        padding-top: 35px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content2 {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 65%;
        max-width: 1200px;
    }


    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* The Close Button */
    .close2 {
        color: white;
        position: absolute;
        top: 10px;
        right: 196px;
        font-size: 35px;
        font-weight: bold;
    }

    .close2:hover,
    .close2:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }


    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }


    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }
    /*!
     * bootstrap-vertical-tabs - v1.2.2
     * https://dbtek.github.io/bootstrap-vertical-tabs
     * 2016-12-02
     * Copyright (c) 2016 İsmail Demirbilek
     * License: MIT
     */
    .tabs-left, .tabs-right {
        border-bottom: none;
        padding-top: 2px;
    }
    .tabs-left {
        /*border-right: 1px solid #ddd;*/
        padding-top: 15px;
        height: 100%;
    }
    .tabs-right {
        border-left: 1px solid #ddd;
    }
    .tabs-left>li, .tabs-right>li {
        float: none;
        margin-bottom: 2px;
    }
    .tabs-left>li {
        margin-right: -1px;
        padding: 0;
    }
    .tabs-right>li {
        margin-left: -1px;
    }
    .tabs-left>li.active>a,
    .tabs-left>li.active>a:hover,
    .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
    }

    .tabs-right>li.active>a,
    .tabs-right>li.active>a:hover,
    .tabs-right>li.active>a:focus {
        border-bottom: 1px solid #ddd;
        border-left-color: transparent;
    }
    .tabs-left>li>a {
        /*border-radius: 4px 0 0 4px;*/
        margin-right: 0;
        display:block;
        letter-spacing: 2px;
        font-size: 18px;
        font-weight: 600;
    }
    .tabs-right>li>a {
        border-radius: 0 4px 4px 0;
        margin-right: 0;

    }
    .sideways {
        margin-top:50px;
        border: none;
        position: relative;
    }
    .sideways>li {
        height: 20px;
        width: 120px;
        margin-bottom: 100px;
    }
    .sideways>li>a {
        border-bottom: 1px solid #ddd;
        border-right-color: transparent;
        text-align: center;
        border-radius: 4px 4px 0px 0px;
    }
    .sideways>li.active>a,
    .sideways>li.active>a:hover,
    .sideways>li.active>a:focus {
        border-bottom-color: transparent;
        border-right-color: #ddd;
        border-left-color: #ddd;
    }
    .sideways.tabs-left {
        left: -50px;
    }
    .sideways.tabs-right {
        right: -50px;
    }
    .sideways.tabs-right>li {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .sideways.tabs-left>li {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
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

    .okk{
        text-align: center;
    }

    .popup .okbtn {
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

    .popup .cnclbtn {
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
    }

    .popup .pop_content {
        text-align: center;
        margin-top: 40px;

    }

    @media screen and (max-width: 700px){
        .box{
            width: 70%;
        }
        .popup{
            width: 70%;
        }
    }
</style>

<!--post save success pop up style end -->

<style type="text/css">

    .thumb {
        width:99px;
        height: 99px;
        margin: 0.2em -0.7em 0 0;
    }
    .remove_thumb {
        position: relative;
        top: -38px;
        right: 5px;
        background: black;
        color: white;
        border-radius: 50px;
        font-size: 1.5em;
        padding: 0 0.3em 0;
        text-align: center;
        cursor: pointer;
    }
    .remove_thumb:before {
        content: "×";
    }
    .popup-textarea .description{
        width: 100%;
        height: 90px;
        color: #999999;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }


</style>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>


<?php echo $business_header2; ?>

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.jMosaic.css'); ?>">

<!-- <script src="<?php //echo base_url('js/jquery.min.js');                            ?>"></script> -->
        <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                        url: "<?php echo base_url('business_profile/image_saveBG_ajax'); ?>",
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
    <body class="page-container-bg-solid page-boxed">
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">


                    <div class="col-md-4"><div class="profile-box profile-box-left">

                            <div class="full-box-module">    
                                <div class="profile-boxProfileCard  module">
                                    <div class="profile-boxProfileCard-cover">    
                                        <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                           href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>"
                                           tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo $businessdata[0]['company_name']; ?>">
                                            <!-- box image start -->
                                            <?php if ($businessdata[0]['profile_background'] != '') { ?>
                                                <img src="<?php echo base_url(BUSBGIMG . $businessdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo $businessdata[0]['company_name']; ?>"  style="height: 95px; width: 100%; ">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo $businessdata[0]['company_name']; ?>"  style="height: 95px; width: 100%;">
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="profile-boxProfileCard-content clearfix">
                                        <div class="buisness-profile-txext col-md-4">
                                            <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>" title="<?php echo $businessdata[0]['company_name']; ?>" tabindex="-1" aria-hidden="true" rel="noopener" >
                                                <?php
                                                if ($businessdata[0]['business_user_image']) {
                                                    ?>
                                                    <img  src="<?php echo base_url(USERIMAGE . $businessdata[0]['business_user_image']); ?>"  alt="<?php echo $businessdata[0]['company_name']; ?>" style="height: 77px; width: 71px; z-index: 3; position: relative; ">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $businessdata[0]['company_name']; ?>">
                                                <?php } ?>                           
                                                <!-- 
                        <img class="profile-boxProfileCard-avatarImage js-action-profile-avatar" src="images/imgpsh_fullsize (2).jpg" alt="" style="    height: 68px;
                        width: 68px;">
                                                -->
                                            </a>
                                        </div>
                                        <div class="profile-box-user  profile-text-bui-user  fr col-md-9">
                                            <span class="profile-company-name ">
                                                <a style="margin-left: 1px;" href="<?php echo base_url('business_profile/business_profile_manage_post/'); ?> " title="<?php echo ucwords($businessdata[0]['company_name']); ?>"> 
                                                    <?php echo ucwords($businessdata[0]['company_name']); ?>
                                                </a> 
                                            </span>
                                            <?php $category = $this->db->get_where('industry_type', array('industry_id' => $businessdata[0]['industriyal'], 'status' => 1))->row()->industry_name; ?>
                                            <div class="profile-boxProfile-name">
                                                <a style="padding-left: 1px;" href="<?php echo base_url('business_profile/business_profile_manage_post/'); ?> " title="<?php echo ucwords($businessdata[0]['company_name']); ?>" >
                                                    <b> <?php 
                                                    if($category){
                                                        echo $category;
                                                    }else{
                                                    echo $businessdata[0]['other_industrial'];
                                                    } ?></b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="profile-box-bui-menu  col-md-12">
                                            <ul class="">
                                                <li 
                                                    <?php if ($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_manage_post') { ?> class="active" 
                                                    <?php } ?>>
                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>">Dashboard
                                                    </a>
                                                </li>
                                                <li 
                                                    <?php if ($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers') { ?> class="active" 
                                                    <?php } ?>>
                                                    <a href="<?php echo base_url('business_profile/followers'); ?>">Followers 
                                                        <br> (<?php echo (count($businessfollowerdata)); ?>)
                                                    </a>
                                                </li>
                                                <li 
                                                    <?php if ($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following') { ?> class="active" 
                                                    <?php } ?>>
                                                    <a href="<?php echo base_url('business_profile/following'); ?>">Following 
                                                        <br> (<?php echo (count($businessfollowingdata)); ?>) 
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--  <div  class="add-post-button">
                                    <a class="btn btn-3 btn-3b"href="<?php echo base_url('recruiter'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Recruiter</a>
                              </div>-->

                        </div>
                    </div>


                    <!-- Trigger/Open The Modal -->
                    <!-- <div id="myBtn">Open Modal</div>
                    -->
                    <!-- The Modal -->

                    <div class="col-md-7 col-sm-7 all-form-content ">

                        <!-- body content start-->

                        <div class="col-md-12 col-sm-12 post-design-box">


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

                            <div  class="">  
                                <div class="post-design-top col-md-12" >  
                                    <div class="post-design-pro-img col-md-2" style="padding-left: 17px;"> 
                                        <?php
                                        $business_userimage = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['user_id'], 'status' => 1))->row()->business_user_image;

                                         $userimageposted = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['posted_user_id']))->row()->business_user_image;

                                        ?>

                                        <?php $slugname = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['user_id'], 'status' => 1))->row()->business_slug;
                                            $slugnameposted = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['posted_user_id'], 'status' => 1))->row()->business_slug;
                                                ?>

                                               <?php if ($busienss_data[0]['posted_user_id']) {
                                                    ?>

                                                    <?php if ($userimageposted) { ?>
                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post/' . $slugnameposted); ?>">
                                                        <img src="<?php echo base_url(USERIMAGE . $userimageposted); ?>" name="image_src" id="image_src" />
                                                        </a>
                                                    <?php } else { ?>
                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post/' . $slugnameposted); ?>">
                                                        <img alt="" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                                                        </a>
                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <?php if ($business_userimage) { ?>
                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post/' . $slugname); ?>">
                                                        <img  src="<?php echo base_url(USERIMAGE . $business_userimage); ?>"  alt="">
                                                        </a>
                                                    <?php } else { ?>
                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post/' . $slugname); ?>">
                                                        <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                    </div>


                                    <div class="post-design-name fl col-md-9">
                                        <ul>


                                            <?php
                                            $companyname = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['user_id'], 'status' => 1))->row()->company_name;

                                            $slugname = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['user_id'], 'status' => 1))->row()->business_slug;

                                            $categoryid = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['user_id'], 'status' => 1))->row()->industriyal;


                                            $category = $this->db->get_where('industry_type', array('industry_id' => $categoryid, 'status' => 1))->row()->industry_name;

                                             $companynameposted = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['posted_user_id']))->row()->company_name;

                                                    $slugnameposted = $this->db->get_where('business_profile', array('user_id' => $busienss_data[0]['posted_user_id'], 'status' => 1))->row()->business_slug;
                                            ?>

                <?php if ($busienss_data[0]['posted_user_id']) { ?>
                     <li>
                        <div class="else_post_d">
                            <div class="post-design-product">
                            <a style="
    max-width: 26%;
    width: auto;
    font-size: 18px;
    display: inline-block;
    line-height: 15px;
    font-weight: 600;
    color: #000033;
    margin-bottom: -3px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap; " href="<?php echo base_url('business_profile/business_profile_manage_post/' . $slugnameposted); ?>"><?php echo ucwords($companynameposted); ?></a>
                                                                 <p style="font-weight: 600; display: inline-block;"> Posted With </p> <a style=" font-size: 15px;                    line-height: 24px; font-weight: 600; color: #000033; margin-bottom: 4px; " href="<?php echo base_url('business_profile/business_profile_manage_post/' . $slugname); ?>"><?php echo ucwords($companyname); ?></a> <span  style="font-weight: 400;  cursor: default;"><?php echo date('d-M-Y', strtotime($row['created_date'])); ?> </span> </div></div>
                                                        </li>
                                                    <?php } else { ?>
                                            <li><div class="post-design-product"><a class="post_dot" href="<?php echo base_url('business_profile/business_resume/' . $slugname); ?>"> <span class="span_main_name">  <?php echo ucwords($companyname); ?> </span> </a>

                                                    <span> <?php echo date('d-M-Y', strtotime($busienss_data[0]['created_date'])); ?></span></div></li>

                                                    <?php }?>
                                            <li><div class="post-design-product"><a>
                                            <?php 
                                            if($category){
                                                 echo ucwords($category);
                                            }else{
                                            echo ucwords($busienss_data[0]['other_industrial']);
                                               }
                                             ?>
                                                
                                            </a></div></li>

                                        </ul> 
                                    </div>  


<div class="dropdown1">
 <a onClick="myFunction(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)" class="dropbtn1 dropbtn1 fa fa-ellipsis-v"></a>
        <div id="<?php echo "myDropdown" . $busienss_data[0]['business_profile_post_id']; ?>" class="dropdown-content1">

 <?php if($busienss_data[0]['posted_user_id'] != 0){ 

                  if($this->session->userdata('aileenuser') == $busienss_data[0]['posted_user_id']){
                    ?>
             <a onclick="user_postdelete(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)">
                <i class="fa fa-trash-o" aria-hidden="true">
                  </i> Delete Post
            </a>
            <a id="<?php echo $busienss_data[0]['business_profile_post_id']; ?>" onClick="editpost(this.id)">
            <i class="fa fa-pencil-square-o" aria-hidden="true">
             </i>Edit
            </a>

            <?php }else{
                ?>
           
           <a onclick="user_postdelete(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)">
                <i class="fa fa-trash-o" aria-hidden="true">
                  </i> Delete Post
            </a>
        <a href="<?php echo base_url('business_profile/business_profile_contactperson/' . $busienss_data[0]['posted_user_id'] . ''); ?>">
            <i class="fa fa-user" aria-hidden="true">
            </i> Contact Person
             </a>

            <?php } }else{?>

         <?php if ($this->session->userdata('aileenuser') == $busienss_data[0]['user_id']) { ?> 

            <a onclick="user_postdelete(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>

                <a id="<?php echo $busienss_data[0]['business_profile_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                <?php } else { ?>
                     <a onclick="user_postdeleteparticular(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>



                <a href="<?php echo base_url('business_profile/business_profile_contactperson/' . $busienss_data[0]['user_id'] . ''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a>
                     <?php } }?>

             </div>
        </div>

                                    <div class="post-design-desc " style="padding: 5px 17px 5px 17px;">
                                        <div id="<?php echo 'editpostdata' . $busienss_data[0]['business_profile_post_id']; ?>" style="display:block;">
                                            <a  style="margin-bottom: 0px;   font-weight: 600;  font-size: 16px"><?php echo $this->common->make_links($busienss_data[0]['product_name']); ?></a>
                                        </div>

                                        <div id="<?php echo 'editpostbox' . $busienss_data[0]['business_profile_post_id']; ?>" style="display:none;">
                                            <input type="text" id="<?php echo 'editpostname' . $busienss_data[0]['business_profile_post_id']; ?>" name="editpostname" placeholder="Product Name" value="<?php echo $busienss_data[0]['product_name']; ?>">
                                        </div>


                                        <div id="<?php echo 'editpostdetails' . $busienss_data[0]['business_profile_post_id']; ?>" style="display:block;">
                                            <span class="show">  <?php print $this->common->make_links($busienss_data[0]['product_description']); ?>
                                            </span>
                                        </div>

                                        <div id="<?php echo 'editpostdetailbox' . $busienss_data[0]['business_profile_post_id']; ?>" style="display:none;">

              <!-- <textarea id="<?php echo 'editpostdesc' . $row['business_profile_post_id']; ?>" name="editpostdesc"><?php echo $row['product_description']; ?>
                     </textarea>  -->
                                            <div  contenteditable="true" id="<?php echo 'editpostdesc' . $busienss_data[0]['business_profile_post_id']; ?>" placeholder="Product Description" class="textbuis  editable_text" placeholder="Description of Your Product"  name="editpostdesc"><?php echo $busienss_data[0]['product_description']; ?></div>

                <!-- <div contenteditable="true"  id="<?php echo 'editpostdesc' . $row['business_profile_post_id']; ?>" placeholder="Product Description" class="textbuis  editable_text"  name="editpostdesc"><?php echo $row['product_description']; ?></div>  -->

                                        </div>
                                        <button class="fr" id="<?php echo "editpostsubmit" . $busienss_data[0]['business_profile_post_id']; ?>" style="display:none;margin: 5px 0;" onClick="edit_postinsert(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)">Save</button>
                                    </div> 
                                </div>


                                <div class="post-design-mid col-md-12">

                                    <!-- multiple image code  start-->

                                    <div>
                                        <?php
                                        $contition_array = array('post_id' => $busienss_data[0]['business_profile_post_id'], 'is_deleted' => '1', 'image_type' => '2');
                                        $businessmultiimage = $this->data['businessmultiimage'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                        ?>


                                        <?php
                                        $i = 1;
                                        foreach ($businessmultiimage as $data) {

                                            //echo '<pre>'; print_r($businessmultiimage); die();

                                            $allowed = array('gif', 'png', 'jpg');
                                            $allowespdf = array('pdf');
                                            $allowesvideo = array('mp4', '3gp');
                                            $allowesaudio = array('mp3');
                                            $filename = $data['image_name'];
                                            $ext = pathinfo($filename, PATHINFO_EXTENSION);

                                            if (in_array($ext, $allowed)) {
                                                ?>

<?php   if (count($businessmultiimage) == 1) { ?>
                                                   
                                                        <!-- two image start -->
                                                       <div id="basic-responsive-image" style="height: 50%;" >
                                                    <img src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']) ?>" style="width: 100%; height: 100%;" onclick="openModal();
                                                            currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
                                                </div>
                                                        <!-- two image end -->
                                                  
                                                <?php } ?>
                                                

                                            <?php    if (count($businessmultiimage) == 2) {?>
                                                    
                                                        <!-- two image start -->
                                                       <div id="two_images_bui" style="height: 50%;" >
                                                    <img src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']) ?>" style="width: 100%; height: 100%;" onclick="openModal();
                                                            currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
                                                </div>
                                                        <!-- two image end -->
                                                    <?php } ?>
                                                


                                                <?php    if (count($businessmultiimage) == 3) { ?>
                                                    <?php 
                                                 //   foreach ($businessmultiimage as $multiimage) {
                                                        ?>
                                                        <!-- two image start -->
                                                       <div id="three_images_art" style="height: 40%;
    width: 33.3%;
    display: inline-block;
    float: left;" >
                                                    <img src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']) ?>" style="width: 100%; height: 100%;" onclick="openModal();
                                                            currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
                                                </div>
                                                        <!-- two image end -->
                                                    <?php// } ?>
                                                <?php } ?>

<?php    if (count($businessmultiimage) == 4) { ?>
                                                    
                                                        <!-- two image start -->
                                                       <div id="two_images_bui" style="height: 50%;" >
                                                    <img src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']) ?>" style="width: 100%; height: 100%;" onclick="openModal();
                                                            currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
                                                </div>
                                                        <!-- two image end -->
                                                    <?php }else{ ?>
                                                
                                      <div id="two_images_bui" style="height: 50%;" >
                                                    <img src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']) ?>" style="width: 100%; height: 100%;" onclick="openModal();
                                                            currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
                                                </div>
                                            <?php } } elseif (in_array($ext, $allowespdf)) { ?>

                                                <!-- one pdf start -->
                                                <div>
                                                    <a href="<?php echo base_url('business_profile/creat_pdf/' . $data['image_id']) ?>"><div class="pdf_img">
                                                            <img src="<?php echo base_url('images/PDF.jpg') ?>" style="height: 100%; width: 100%;">
                                                        </div></a>
                                                </div>
                                                <!-- one pdf end -->

                                            <?php } elseif (in_array($ext, $allowesvideo)) { ?>

                                                <!-- one video start -->
                                                <div>
                                                    <video width="320" height="240" controls>
                                                        <source src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']); ?>" type="video/mp4">
                                                        <source src="movie.ogg" type="video/ogg">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                                <!-- one video end -->

                                            <?php } elseif (in_array($ext, $allowesaudio)) { ?>

                                                <!-- one audio start -->
                                                <div>
                                                    <audio width="120" height="100" controls>

                                                        <source src="<?php echo base_url(BUSPOSTIMAGE . $data['image_name']); ?>" type="audio/mp3">
                                                        <source src="movie.ogg" type="audio/ogg">
                                                        Your browser does not support the audio tag.

                                                    </audio>

                                                </div>

                                                <!-- one audio end -->

                                            <?php } ?>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </div>


                                    <!-- silder start -->
                                    <div id="myModal1" class="modal2">
                                        <span class="close2 cursor" onclick="closeModal()">&times;</span>
                                        <div class="modal-content2">

                                            <!--  multiple image start -->

                                            <?php
                                            $i = 1;

                                            $allowed = array('gif', 'png', 'jpg');
                                            foreach ($businessmultiimage as $mke => $mval) {

                                                $ext = pathinfo($mval['image_name'], PATHINFO_EXTENSION);

                                                if (in_array($ext, $allowed)) {
                                                    $databus1[] = $mval;
                                                }
                                            }

                                            foreach ($databus1 as $busdata) {
                                                ?>

                                                <div class="mySlides">
                                                    <div class="numbertext"><?php echo $i ?> / <?php echo count($databus1) ?></div>
                                                    <div>
                                                        <img src="<?php echo base_url(BUSPOSTIMAGE . $busdata['image_name']) ?>" style="width:100%; height: 70%;">
                                                    </div>

                                                    <!-- like comment start -->

<?php
if(count($databus1) > 1){ 
?>
                                                    <div>
                                                        <div class="post-design-like-box col-md-12">
                                                            <div class="post-design-menu">
                                                                <ul>
                                                                    <li class="<?php echo 'likepostimg' . $busdata['image_id']; ?>">
                                             <a id="<?php echo $busdata['image_id']; ?>" onClick="mulimg_like(this.id)">
                                             <?php
                                        $userid = $this->session->userdata('aileenuser');
                                         $contition_array = array('post_image_id' => $busdata['image_id'], 'user_id' => $userid, 'is_unlike' => 0);

                                     $activedata = $this->data['activedata'] = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                         if ($activedata) {
                                             ?>
                                                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                                            <?php } else { ?>
                                                                                <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>
                                                                            <?php } ?>

                                                                            <span class="<?php echo 'likeimage' . $busdata['image_id']; ?>"> <?php
                                                                                $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => 0);
                                                                                $likecount = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                                if ($likecount) {
                                                                                    echo count($likecount);
                                                                                }
                                                                                ?>

                                                                            </span>
                                                                        </a>
                                                                    </li>

                                                                    <li id="<?php echo 'insertcountimg' . $busdata['image_id']; ?>">

                                                                        <?php
                                                                        $contition_array = array('post_image_id' => $busdata['image_id'], 'is_delete' => '0');
                                                                        $commnetcount = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                        ?>

                                                                        <a onClick="imgcommentall(this.id)" id="<?php echo $busdata['image_id']; ?>">
                                                                            <i class="fa fa-comment-o" aria-hidden="true">
                                                                                <?php
                                                                                if (count($commnetcount) > 0) {
                                                                                    echo count($commnetcount);
                                                                                }
                                                                                ?>
                                                                            </i> 
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                        <?php
                                                        $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => '0');
                                                        $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                        if (count($commneteduser) > 0) {
                                                            ?>
                                                            <div class="likeduserlistimg<?php echo $busdata['image_id'] ?>">
                                                                <?php
                                                                $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => '0');
                                                                $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//                                                                echo '<pre>';
//                                                                print_r($commneteduser);
//                                                                
                                                                $countlike = count($commneteduser) - 1;
                                                                foreach ($commneteduser as $userdata) {
                                                                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                                                                }
                                                                ?>
                                                                <!-- pop up box end-->
                                                                <a href="javascript:void(0);"  onclick="likeuserlistimg(<?php echo $busdata['image_id'] ?>);">
                                                                    <?php
                                                                    $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => '0');
                                                                    $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//                                                              
                                                                    $countlike = count($commneteduser) - 1;
                                                                    $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;
                                                                    ?>
                                 <div class="like_one_other_img">
                                <?php
                                if($userid == $commneteduser[0]['user_id']){
                                echo "You";
                                echo "&nbsp;";
                                }else{
                                echo ucwords($business_fname1);
                                echo "&nbsp;";
                                }
                                ?>
                                                                        <?php
                                                                        if (count($commneteduser) > 1) {
                                                                            ?>
                                                                            <?php echo "and"; ?>
                                                                            <?php
                                                                            echo $countlike;
                                                                            echo "&nbsp;";
                                                                            echo "others";
                                                                            ?> 
                                                                        <?php } ?>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="<?php echo "likeusernameimg" . $busdata['image_id']; ?>" id="<?php echo "likeusernameimg" . $busdata['image_id']; ?>" style="display:none">
                                                            <?php
                                                            $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => '0');
                                                            $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//                                                                echo '<pre>';
//                                                                print_r($commneteduser);
//                                                                
                                                            $countlike = count($commneteduser) - 1;
                                                            foreach ($commneteduser as $userdata) {
                                                                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                                                            }
                                                            ?>
                                                            <!-- pop up box end-->
                                                            <a href="javascript:void(0);"  onclick="likeuserlistimg(<?php echo $busdata['image_id'] ?>);">
                                                                <?php
                                                                $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => '0');
                                                                $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//                                                              
                                                                $countlike = count($commneteduser) - 1;
                                                                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;
                                                                ?>
                                                                <div class="like_one_other_img" style="">
                                                                    <?php
                                                                    echo ucwords($business_fname1);
                                                                    echo "&nbsp;";
                                                                    ?>
                                                                    <?php
                                                                    if (count($commneteduser) > 1) {
                                                                        ?>
                                                                        <?php echo "and"; ?>
                                                                        <?php
                                                                        echo $countlike;
                                                                        echo "&nbsp;";
                                                                        echo "others";
                                                                        ?> 
                                                                    <?php } ?>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <!-- show comment div start -->
                                                        <div class="art-all-comment">

                                                            <div  id="<?php echo "threeimgcomment" . $busdata['image_id']; ?>" style="display:block">
                                                                <div class="<?php echo 'insertimgcomment' . $busdata['image_id']; ?>">

                                                                    <?php
                                                                    $contition_array = array('post_image_id' => $busdata['image_id'], 'is_delete' => '0');

                                                                    $busmulimage = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

                                                                    if ($busmulimage) {
                                                                        foreach ($busmulimage as $rowdata) {
                                                                            $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;
                                                                            ?>

                                                                            <div class="all-comment-comment-box">

                                                                                <div class="post-design-pro-comment-img"> 
                                                                                    <?php
                                                                                    $business_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;
                                                                                    ?>

                                                                                    <img  src="<?php echo base_url(USERIMAGE . $business_userimage); ?>"  alt="">
                                                                                </div>

                                                                                <div class="comment-name">

                                                                                    <b>  <?php
                                                                                        echo ucwords($companyname);
                                                                                        echo '</br>';
                                                                                        ?>
                                                                                    </b>
                                                                                </div>

                                                                                <div class="comment-details" id= "<?php echo "imgshowcomment" . $rowdata['post_image_comment_id']; ?>">
                                                                                    <?php
                                                                                    echo $this->common->make_links($rowdata['comment']);
                                                                                    ?>
                                                                                </div>


                                                                                <!-- edit box start -->

                                                                                <!--                                                                                <div class="col-md-12">
                                                                                                                                                                    <div class="col-md-10">
                                                                                                                                                                        <div contenteditable="true" class="editable_text"  name="<?php echo $rowdata['post_image_comment_id']; ?>" id="<?php echo "imgeditcomment" . $rowdata['post_image_comment_id']; ?>" style="display: none;" onkeyup="imgcommentedit(<?php echo $rowdata['post_image_comment_id']; ?>)"><?php echo $rowdata['comment']; ?>
                                                                                                                                                                        </div>
                                                                                
                                                                                                                                                                    </div>  <div class="col-md-2 comment-edit-button">
                                                                                                                                                                        <button id="<?php echo "imgeditsubmit" . $rowdata['post_image_comment_id']; ?>" style="display:none" onClick="imgedit_comment(<?php echo $rowdata['post_image_comment_id']; ?>)">Save</button>
                                                                                                                                                                    </div>
                                                                                
                                                                                                                                                                </div>-->

                                                                                <div class="edit-comment-box">
                                                                                    <div class="inputtype-edit-comment">
                                                                                        <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="<?php echo $rowdata['post_image_comment_id']; ?>"  id="<?php echo "imgeditcomment" . $rowdata['post_image_comment_id']; ?>" placeholder="Add a Comment ... " value= ""  onkeyup="imgcommentedit(<?php echo $rowdata['post_image_comment_id']; ?>)"><?php echo $rowdata['comment']; ?></div>
                                                                                        <span class="comment-edit-button"><button id="<?php echo "imgeditsubmit" . $rowdata['post_image_comment_id']; ?>" style="display:none" onClick="imgedit_comment(<?php echo $rowdata['post_image_comment_id']; ?>)">Save</button></span>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- edit box end -->
                                                                                <div class="art-comment-menu-design"> 

                                                                                    <!-- comment like start -->
                                                                                    <div class="comment-details-menu"  id="<?php echo 'imglikecomment' . $rowdata['post_image_comment_id']; ?>">

                                                                                        <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="imgcomment_like(this.id)">

                                                                                            <?php
                                                                                            $userid = $this->session->userdata('aileenuser');
                                                                                            $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

                                                                                            $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                                            //echo "<pre>"; print_r($businesscommentlike); 
                                                                                            //echo count($businesscommentlike); 
                                                                                            if (count($businesscommentlike1) == 0) {
                                                                                                ?>
                                                                                                <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>

                                                                                            <?php } else {
                                                                                                ?>
                                                                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                                                            <?php } ?>
                                                                                            <span>

                                                                                                <?php
                                                                                                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'is_unlike' => '0');
                                                                                                $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                                                                if (count($mulcountlike) > 0) {
                                                                                                    echo count($mulcountlike);
                                                                                                }
                                                                                                ?>

                                                                                            </span>
                                                                                        </a>

                                                                                    </div>

                                                                                    <!--   comment like end -->


                                                                                    <!-- comment edit start -->

                                                                                    <?php
                                                                                    $userid = $this->session->userdata('aileenuser');
                                                                                    if ($rowdata['user_id'] == $userid) {
                                                                                        ?>
                                                                                        <div class="comment-details-menu">

                                                                                            <div id="<?php echo 'imgeditcommentbox' . $rowdata['post_image_comment_id']; ?>" style="display:block;">
                                                                                                <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="imgcomment_editbox(this.id)" class="editbox">Edit</a></div>

                                                                                            <div id="<?php echo 'imgeditcancle' . $rowdata['post_image_comment_id']; ?>" style="display:none;">
                                                                                                <a id="<?php echo $rowdata['post_image_comment_id']; ?>" onClick="imgcomment_editcancle(this.id)">Cancle</a></div>

                                                                                        </div>

                                                                                    <?php } ?>
                                                                                    <!-- comment edit end -->

                                                                                    <!-- comment delete start -->
                                                                                    <?php
                                                                                    $userid = $this->session->userdata('aileenuser');

                                                                                    $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['post_image_id'], 'status' => 1))->row()->user_id;


                                                                                    if ($rowdata['user_id'] == $userid || $business_userid == $userid) {
                                                                                        ?>
                                                                                        <span role="presentation" aria-hidden="true"> · </span>
                                                                                        <div class="comment-details-menu">
                                                                                            <input type="hidden" name="imgpost_delete"  id="imgpost_delete_<?php echo $rowdata['post_image_comment_id']; ?>" value= "<?php echo $rowdata['post_image_id']; ?>">
                                                                                            <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="imgcomment_delete(this.id)"> Delete<span class="<?php echo 'imginsertcomment' . $rowdata['post_image_comment_id']; ?>">
                                                                                                </span> </a> </div>

                                                                                    <?php } ?>
                                                                                    <!-- comment delete end -->


                                                                                    <!-- created date start -->

                                                                                    <span role="presentation" aria-hidden="true"> · </span>
                                                                                    <div class="comment-details-menu">
                                                                                        <p><?php
                                                                                            echo date('d-M-Y', strtotime($rowdata['created_date']));
                                                                                            echo '</br>';
                                                                                            ?>
                                                                                        </p></div>

                                                                                    <!-- created date end -->

                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                            <!-- 27-4 mulimage comment start -->
                                                            <div id="<?php echo "fourimgcomment" . $busdata['image_id']; ?>" style="display:none;">


                                                            </div>
                                                            <!-- 27-4 mulimage comment end -->

                                                        </div>

                                                        <!-- show comment div end -->

                                                        <!-- insert comment code start -->
                                                        <div class="post-design-commnet-box col-md-12">

                                                            <div class="post-design-proo-img"> 

                                                                <?php
                                                                $userid = $this->session->userdata('aileenuser');
                                                                $business_userimage = $this->db->get_where('business_profile', array('user_id' => $userid, 'status' => 1))->row()->business_user_image;
                                                                ?>

                                                                <img src="<?php echo base_url(USERIMAGE . $business_userimage); ?>" alt="">
                                                            </div>


                                                            <div class="">
                                                                <div class="col-md-12 inputtype-comment" style="width: 80%; padding-left: 7px;">
                                                                    <div contenteditable="true" class="editable_text" name="<?php echo $busdata['image_id']; ?>" id="<?php echo "post_imgcomment" . $busdata['image_id']; ?>" placeholder="Type Comment ..." onkeyup="entercommentimg(<?php echo $busdata['image_id']; ?>)"></div>
                                                                </div>

                                                                <div class="comment-edit-butn">                                      
                                                                    <button id="<?php echo $busdata['image_id']; ?>" onClick="insert_commentimg(this.id)">Comment</button>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- insert comment code end -->

                                                    </div>
<?php
}
?>
                                                    <!-- like comment end -->

                                                </div>
                                                <?php
                                                $i++;
                                            }
                                            ?>

                                            <!-- slider image rotation end  -->

                                            <a class="prev" style="left: 10" onclick="plusSlides(-1)">&#10094;</a>
                                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                            <div class="caption-container">
                                                <p id="caption"></p>
                                            </div>



                                        </div>
                                    </div>


                                    <!-- slider end -->

                                    <!-- multiple image code  end-->

                                </div>



                                <div class="post-design-like-box col-md-12">
                                    <div class="post-design-menu">
                                        <ul>
                                            <li class="<?php echo 'likepost' . $busienss_data[0]['business_profile_post_id']; ?>">
                                                <a id="<?php echo $busienss_data[0]['business_profile_post_id']; ?>"   onClick="post_like(this.id)">

                                                    <?php
                                                    $userid = $this->session->userdata('aileenuser');
                                                    $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1');
                                                    $active = $this->data['active'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                    $likeuser = $this->data['active'][0]['business_like_user'];
                                                    $likeuserarray = explode(',', $active[0]['business_like_user']);

                                                    if (!in_array($userid, $likeuserarray)) {
                                                        ?>               

                                                        <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>

                                                    <?php } else { ?> 
                                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    <?php } ?>
                                                    <span>
                                                        <?php
                                                        if ($busienss_data[0]['business_likes_count'] > 0) {
                                                            echo $busienss_data[0]['business_likes_count'];
                                                        }
                                                        ?>
                                                    </span>
                                                </a>
                                            </li>

                                            <li id="<?php echo 'insertcount' . $busienss_data[0]['business_profile_post_id']; ?>">
                                                <?php
                                                $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                                $commnetcount = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                ?>

                                                <a  onClick="commentall(this.id)" id="<?php echo $busienss_data[0]['business_profile_post_id']; ?>"><i class="fa fa-comment-o" aria-hidden="true"> 
                                                        <?php
                                                        if (count($commnetcount) > 0) {
                                                            echo count($commnetcount);
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </i> 
                                                </a>

                                            </li>
                                        </ul>

                                    </div>
                                </div>





                                <!-- like user list start -->

                                <!-- pop up box start-->

                                <?php
                                if ($busienss_data[0]['business_likes_count'] > 0) {
                                    ?>
                                    <div class="likeduserlist<?php echo $busienss_data[0]['business_profile_post_id'] ?>">
                                        <?php
                                        $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                        $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                        $likeuser = $commnetcount[0]['business_like_user'];
                                        $countlike = $commnetcount[0]['business_likes_count'] - 1;
                                        $likelistarray = explode(',', $likeuser);
                                        foreach ($likelistarray as $key => $value) {
                                            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                                        }
                                        ?>
                                        <!-- pop up box end-->
                                        <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $busienss_data[0]['business_profile_post_id']; ?>);">
                                            <?php
                                            $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                            $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                            $likeuser = $commnetcount[0]['business_like_user'];
                                            $countlike = $commnetcount[0]['business_likes_count'] - 1;
                                            $likelistarray = explode(',', $likeuser);

                                            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                                            ?>
                                            <div class="like_one_other">
                                                <?php
                                                if($userid == $value){
                                                echo "You";
                                                echo "&nbsp;";
                                                }else{
                                                echo ucwords($business_fname1);
                                                echo "&nbsp;";
                                                 }
                                                ?>
                                                <?php
                                                if (count($likelistarray) > 1) {
                                                    ?>
                                                    <?php echo "and"; ?>
                                                    <?php
                                                    echo $countlike;
                                                    echo "&nbsp;";
                                                    echo "others";
                                                    ?> 
                                                <?php } ?>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="<?php echo "likeusername" . $busienss_data[0]['business_profile_post_id']; ?>" id="<?php echo "likeusername" . $busienss_data[0]['business_profile_post_id']; ?>" style="display:none">
                                    <?php
                                    $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                    $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                    $likeuser = $commnetcount[0]['business_like_user'];
                                    $countlike = $commnetcount[0]['business_likes_count'] - 1;
                                    $likelistarray = explode(',', $likeuser);
                                    foreach ($likelistarray as $key => $value) {
                                        $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                                    }
                                    ?>
                                    <!-- pop up box end-->
                                    <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $busienss_data[0]['business_profile_post_id']; ?>);">
                                        <?php
                                        $contition_array = array('business_profile_post_id' => $row['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                        $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                        $likeuser = $commnetcount[0]['business_like_user'];
                                        $countlike = $commnetcount[0]['business_likes_count'] - 1;
                                        $likelistarray = explode(',', $likeuser);

                                        $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                                        ?>
                                        <div class="like_one_other">
                                            <?php
                                            echo ucwords($business_fname1);
                                            echo "&nbsp;";
                                            ?>
                                            <?php
                                            if (count($likelistarray) > 1) {
                                                ?>
                                                <?php echo "and"; ?>
                                                <?php
                                                echo $countlike;
                                                echo "&nbsp;";
                                                echo "others";
                                                ?> 
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>

<!--                                <div id="<?php echo "popuplike" . $busienss_data[0]['business_profile_post_id']; ?>" class="overlay">
                                    <div class="popup">

                                        <div class="pop_content">

                                <?php /*
                                  $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                  $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                  $likeuser = $commnetcount[0]['business_like_user'];
                                  $countlike = $commnetcount[0]['business_likes_count'] - 1;

                                  $likelistarray = explode(',', $likeuser);


                                  foreach ($likelistarray as $key => $value) {

                                  $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                                  ?>

                                  <a href="<?php echo base_url('business_profile/business_resume/' . $value); ?>">
                                  <?php echo ucwords($business_fname1); ?>

                                  </a>

                                  <?php } */ ?>

                                            <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>

                                        </div>

                                    </div>
                                </div>-->
                                <!-- pop up box end-->
                                <!--                                <div class="like_other">
                                                                    <a  href="<?php echo "#popuplike" . $busienss_data[0]['business_profile_post_id']; ?>">
                                <?php /*
                                  $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1', 'is_delete' => '0');
                                  $commnetcount = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                  $likeuser = $commnetcount[0]['business_like_user'];
                                  $countlike = $commnetcount[0]['business_likes_count'] - 1;

                                  $likelistarray = explode(',', $likeuser);

                                  $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $value, 'status' => 1))->row()->company_name;
                                  ?>



                                  <div class="like_one_other">

                                  <?php
                                  echo ucwords($business_fname1);
                                  echo "&nbsp;";
                                  ?>

                                  </div>

                                  <?php
                                  if (count($likelistarray) > 1) {
                                  ?>
                                  <div>
                                  <?php echo "and"; ?>

                                  <?php
                                  echo $countlike;
                                  echo "&nbsp;";
                                  echo "others";
                                  ?>


                                  <?php } */ ?>
                                                                        </div>
                                                                    </a>
                                                                </div>-->
                                <!-- like user list end -->


                                <!-- all comment start-->

                                <div class="art-all-comment col-md-12">
                                    <!-- all fourcomment comment start-->
                                    <div id="<?php echo "fourcomment" . $busienss_data[0]['business_profile_post_id']; ?>" style="display:none;">

                                    </div>

                                    <!-- all fourcomment comment end-->


                                    <!-- khyati changes start -->
                                    <div  id="<?php echo "threecomment" . $busienss_data[0]['business_profile_post_id']; ?>" style="display:block">
                                        <div class="<?php echo 'insertcomment' . $busienss_data[0]['business_profile_post_id']; ?>">

                                            <?php
                                            $contition_array = array('business_profile_post_id' => $busienss_data[0]['business_profile_post_id'], 'status' => '1');

                                            $businessprofiledata = $this->data['businessprofiledata'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = 'business_profile_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

                                            if ($businessprofiledata) {
                                                foreach ($businessprofiledata as $rowdata) {
                                                    $companyname = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id']))->row()->company_name;
                                                    ?>
                                                    <div class="all-comment-comment-box">
                                                        <div class="post-design-pro-comment-img"> 
                                                            <?php
                                                            $business_userimage = $this->db->get_where('business_profile', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;
                                                            ?>

                                                            <img  src="<?php echo base_url(USERIMAGE . $business_userimage); ?>"  alt="">
                                                        </div>
                                                        <div class="comment-name">

                                                            <b>  <?php
                                                                echo $companyname;
                                                                echo '</br>';
                                                                ?>
                                                            </b>
                                                        </div>
                                                        <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['business_profile_post_comment_id']; ?>">
                                                            <?php
                                                            echo $this->common->make_links($rowdata['comments']);
//                                                            echo '</br>';
                                                            ?>
                                                        </div>
                                                        <!--                                                        <div class="col-md-12">
                                                                                                                    <div class="col-md-10">
                                                                                                                        <div contenteditable="true" class="editable_text" name="<?php echo $rowdata['business_profile_post_comment_id']; ?>" id="<?php echo "editcomment" . $rowdata['business_profile_post_comment_id']; ?>" style="display:none"  onkeyup="commentedit(<?php echo $rowdata['business_profile_post_comment_id']; ?>)"><?php echo $rowdata['comments']; ?></div>
                                                                                                                    </div> 
                                                        
                                                                                                                    <div class="col-md-2 comment-edit-button">
                                                                                                                        <button id="<?php echo "editsubmit" . $rowdata['business_profile_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['business_profile_post_comment_id']; ?>)">Save</button>
                                                                                                                    </div>
                                                                                                                </div>-->
                                                        <div class="edit-comment-box">
                                                            <div class="inputtype-edit-comment">
                                                                <!--<textarea type="text" class="textarea" name="<?php echo $rowdata['business_profile_post_comment_id']; ?>" id="<?php echo "editcomment" . $rowdata['business_profile_post_comment_id']; ?>" style="display:none;resize: none;" onClick="commentedit(this.name)"><?php echo $rowdata['comments']; ?></textarea>-->
                                                                <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="<?php echo $rowdata['business_profile_post_comment_id']; ?>"  id="<?php echo "editcomment" . $rowdata['business_profile_post_comment_id']; ?>" placeholder="Enter Your Comment " value= ""  onkeyup="commentedit(<?php echo $rowdata['business_profile_post_comment_id']; ?>)"><?php echo $rowdata['comments']; ?></div>
                                                                <span class="comment-edit-button"><button id="<?php echo "editsubmit" . $rowdata['business_profile_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['business_profile_post_comment_id']; ?>)">Save</button></span>
                                                            </div>
                                                        </div>
                                                        <div class="art-comment-menu-design"> 


                                                            <div class="comment-details-menu" id="<?php echo 'likecomment1' . $rowdata['business_profile_post_comment_id']; ?>">

                                                                <a id="<?php echo $rowdata['business_profile_post_comment_id']; ?>" onClick="comment_like1(this.id)">

                                                                    <?php
                                                                    $userid = $this->session->userdata('aileenuser');
                                                                    $contition_array = array('business_profile_post_comment_id' => $rowdata['business_profile_post_comment_id'], 'status' => '1');
                                                                    $businesscommentlike = $this->data['businesscommentlike'] = $this->common->select_data_by_condition('business_profile_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                    $likeuserarray = explode(',', $businesscommentlike[0]['business_comment_like_user']);

                                                                    if (!in_array($userid, $likeuserarray)) {
                                                                        ?>
                                                                        <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> 
                                                                    <?php } else { ?>

                                                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>

                                                                    <?php } ?>
                                                                    <span>
                                                                        <?php
                                                                        if ($rowdata['business_comment_likes_count']) {
                                                                            echo $rowdata['business_comment_likes_count'];
                                                                        }
                                                                        ?>
                                                                    </span>
                                                                </a>
                                                            </div>

                                                            <?php
                                                            $userid = $this->session->userdata('aileenuser');
                                                            if ($rowdata['user_id'] == $userid) {
                                                                ?>                                     
                                                                <span role="presentation" aria-hidden="true"> · </span>
                                                                <div class="comment-details-menu">

                                                                    <div id="<?php echo 'editcommentbox' . $rowdata['business_profile_post_comment_id']; ?>" style="display:block;">
                                                                        <a id="<?php echo $rowdata['business_profile_post_comment_id']; ?>"   onClick="comment_editbox(this.id)" class="editbox">Edit
                                                                        </a>
                                                                    </div>

                                                                    <div id="<?php echo 'editcancle' . $rowdata['business_profile_post_comment_id']; ?>" style="display:none;">
                                                                        <a id="<?php echo $rowdata['business_profile_post_comment_id']; ?>" onClick="comment_editcancle(this.id)">Cancle
                                                                        </a>
                                                                    </div>

                                                                </div>


                                                            <?php } ?>



                                                            <?php
                                                            $userid = $this->session->userdata('aileenuser');

                                                            $business_userid = $this->db->get_where('business_profile_post', array('business_profile_post_id' => $rowdata['business_profile_post_id'], 'status' => 1))->row()->user_id;


                                                            if ($rowdata['user_id'] == $userid || $business_userid == $userid) {
                                                                ?>      
                                                                <span role="presentation" aria-hidden="true"> · </span>
                                                                <div class="comment-details-menu">



                                                                    <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['business_profile_post_id']; ?>">
                                                                    <a id="<?php echo $rowdata['business_profile_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['business_profile_post_comment_id']; ?>">
                                                                        </span>
                                                                    </a>
                                                                </div>


                                                            <?php } ?>                                       
                                                            <span role="presentation" aria-hidden="true"> · </span>
                                                            <div class="comment-details-menu">
                                                                <p><?php
                                                                    echo date('d-M-Y', strtotime($rowdata['created_date']));
                                                                    echo '</br>';
                                                                    ?></p></div>
                                                        </div></div>


                                                    <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <!-- khyati changes end -->

                                    <!-- all comment end -->



                                </div>

                                <div class="post-design-commnet-box col-md-12">

                                    <div class="post-design-proo-img"> 


                                        <?php
                                        $userid = $this->session->userdata('aileenuser');
                                        $business_userimage = $this->db->get_where('business_profile', array('user_id' => $userid, 'status' => 1))->row()->business_user_image;
                                        ?>

                                        <img  src="<?php echo base_url(USERIMAGE . $business_userimage); ?>"  alt="">
                                    </div>



                                    <div class="">
                                        <div class="col-md-12 inputtype-comment" style="  width: 80%;  padding-left: 7px;">
                                            <div contenteditable="true" class="editable_text" name="<?php echo $busienss_data[0]['business_profile_post_id']; ?>"  id="<?php echo "post_comment" . $busienss_data[0]['business_profile_post_id']; ?>" placeholder="Add a Comment ..." value= "" onClick="entercomment(<?php echo $busienss_data[0]['business_profile_post_id']; ?>)"></div></div>
                                        <div class="comment-edit-butn">        
                                            <button id="<?php echo $busienss_data[0]['business_profile_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- body content end-->
                    </div>
                </div>
            </div></div></div>

</section>

<footer>
    <?php // echo $footer;     ?> 
    <!-- Bid-modal  -->
    <div class="modal fade message-box biderror" id="bidmodal" role="dialog" style="z-index: 999999 !important;">
        <div class="modal-dialog modal-lm">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal">&times;
                </button>       
                <div class="modal-body">
                  <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                    <span class="mes">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Model Popup Close -->
</footer>
<!-- Bid-modal-2  -->
<div class="modal fade message-box" id="likeusermodal" role="dialog" style="z-index: 999999 !important;">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
                <span class="mes">
                </span>
            </div>
        </div>
    </div>
</div>
</body>

</html>


<script src="<?php echo base_url('js/jquery.jMosaic.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>


<script type="text/javascript">
                                                $(document).ready(function () {
                                                    $('.blocks').jMosaic({items_type: "li", margin: 0});
                                                    $('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
                                                });

                                                $(window).load(function () {
                                                });

                                                $(window).resize(function () {
                                                });
</script>

<script>
    function openModal() {
        document.getElementById('myModal1').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal1').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>


<script>

    $('#searchplace').select2({

        placeholder: 'Find Your Location',
        maximumSelectionLength: 1,
        ajax: {

            url: "<?php echo base_url(); ?>business_profile/location",
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

</script>

<script type="text/javascript">
//    function post_like(clicked_id)
//    {
//        $.ajax({
//            type: 'POST',
//            url: '<?php echo base_url() . "business_profile/like_post" ?>',
//            data: 'post_id=' + clicked_id,
//            success: function (data) {
//                $('.' + 'likepost' + clicked_id).html(data);
//            }
//        });
//    }

    function post_like(clicked_id)
    {
        //alert(clicked_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/like_post" ?>',
            data: 'post_id=' + clicked_id,
            dataType: 'json',
            success: function (data) { //alert('.' + 'likepost' + clicked_id);
                // $('.' + 'likepost' + clicked_id).html(data);
                $('.' + 'likepost' + clicked_id).html(data.like);
                $('.likeusername' + clicked_id).html(data.likeuser);

                $('.likeduserlist' + clicked_id).hide();
                if (data.like_user_count == '0') {
                    document.getElementById('likeusername' + clicked_id).style.display = "none";
                } else {
                    document.getElementById('likeusername' + clicked_id).style.display = "block";
                }
                $('#likeusername' + clicked_id).addClass('likeduserlist1');

            }
        });
    }
</script>

<script type="text/javascript">
    function insert_comment(clicked_id)
    {
        /*$("#post_comment" + clicked_id).click(function () {
         $(this).prop("contentEditable", true);
         $(this).html("");
         });
         
         var sel = $("#post_comment" + clicked_id);
         var txt = sel.html();
         if (txt == '') {
         return false;
         }
         
         $('#post_comment' + clicked_id).html("");
         $.ajax({
         type: 'POST',
         url: '<?php echo base_url() . "business_profile/pninsert_comment" ?>',
         data: 'post_id=' + clicked_id + '&comment=' + txt,
         success: function (data) {
         $('textarea').each(function () {
         $(this).val('');
         });
         $('.' + 'insertcomment' + clicked_id).html(data);
         
         }
         }); */

        $("#post_comment" + clicked_id).click(function () {
            $(this).prop("contentEditable", true);
            $(this).html("");
        });

        var sel = $("#post_comment" + clicked_id);
        var txt = sel.html();
        if (txt == '') {
            return false;
        }

        $('#post_comment' + clicked_id).html("");

        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);

        if (x.style.display === 'block' && y.style.display === 'none') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/pninsert_commentthree" ?>',
                data: 'post_id=' + clicked_id + '&comment=' + txt,
                dataType: "json",
                success: function (data) {
                    $('textarea').each(function () {
                        $(this).val('');
                    });
                    $('#' + 'insertcount' + clicked_id).html(data.count);
                    $('.insertcomment' + clicked_id).html(data.comment);

                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/pninsert_comment" ?>',
                data: 'post_id=' + clicked_id + '&comment=' + txt,
                dataType: "json",
                success: function (data) {
                    $('textarea').each(function () {
                        $(this).val('');
                    });
                    $('#' + 'insertcount' + clicked_id).html(data.count);
                    $('#' + 'fourcomment' + clicked_id).html(data.comment);
                }
            });
        }
    }
</script>
<script type="text/javascript">

    function entercomment(clicked_id)
    {
        $("#post_comment" + clicked_id).click(function () {
            $(this).prop("contentEditable", true);
        });
        $('#post_comment' + clicked_id).keypress(function (e) {
            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();
                var sel = $("#post_comment" + clicked_id);
                var txt = sel.html();
                if (txt == '') {
                    return false;
                }
                $('#post_comment' + clicked_id).html("");
                if (window.preventDuplicateKeyPresses)
                    return;
                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);

                /*
                 $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() . "business_profile/pninsert_comment" ?>',
                 data: 'post_id=' + clicked_id + '&comment=' + txt,
                 success: function (data) {
                 $('textarea').each(function () {
                 $(this).val('');
                 });
                 $('.' + 'insertcomment' + clicked_id).html(data);
                 
                 }
                 });  */

                var x = document.getElementById('threecomment' + clicked_id);
                var y = document.getElementById('fourcomment' + clicked_id);

                if (x.style.display === 'block' && y.style.display === 'none') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/pninsert_commentthree" ?>',
                        data: 'post_id=' + clicked_id + '&comment=' + txt,
                        dataType: "json",
                        success: function (data) {
                            $('textarea').each(function () {
                                $(this).val('');
                            });

                            //  $('.insertcomment' + clicked_id).html(data);
                            //alert('.insertcount' + clicked_id);
                            $('#' + 'insertcount' + clicked_id).html(data.count);
                            $('.insertcomment' + clicked_id).html(data.comment);

                        }
                    });

                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/pninsert_comment" ?>',
                        data: 'post_id=' + clicked_id + '&comment=' + txt,
                        dataType: "json",
                        success: function (data) {
                            $('textarea').each(function () {
                                $(this).val('');
                            });
                            //$('#' + 'fourcomment' + clicked_id).html(data);
                            $('#' + 'insertcount' + clicked_id).html(data.count);
                            $('#' + 'fourcomment' + clicked_id).html(data.comment);

                        }
                    });
                }


            }
        });


    }
</script>

<script type="text/javascript">
//    function commentall(clicked_id) {
//
//
//        var x = document.getElementById('threecomment' + clicked_id);
//        var y = document.getElementById('fourcomment' + clicked_id);
//        var z = document.getElementById('commnetpost' + clicked_id);
//
//
//
//
//        if (x.style.display === 'block' && y.style.display === 'none') {
//            x.style.display = 'none';
//            y.style.display = 'block';
//            z.style.display = 'none';
//            $.ajax({
//                type: 'POST',
//                url: '<?php echo base_url() . "business_profile/pnfourcomment" ?>',
//                data: 'bus_post_id=' + clicked_id,
//                //alert(data);
//                success: function (data) {
//                    $('#' + 'fourcomment' + clicked_id).html(data);
//
//                }
//            });
//
//        }
//
//    }


    function commentall(clicked_id) {

        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);
        var z = document.getElementById('insertcount' + clicked_id);

        if (x.style.display === 'block' && y.style.display === 'none') {

            x.style.display = 'none';
            y.style.display = 'block';
            z.style.visibility = 'show';

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/pnfourcomment" ?>',
                data: 'bus_post_id=' + clicked_id,
                //alert(data);
                success: function (data) {
                    $('#' + 'fourcomment' + clicked_id).html(data);

                }
            });
        }
    }

</script>
<script type="text/javascript">
    function comment_like(clicked_id)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/like_comment" ?>',
            data: 'post_id=' + clicked_id,
            success: function (data) {
                $('#' + 'likecomment' + clicked_id).html(data);

            }
        });
    }
</script>


<script type="text/javascript">
    function comment_like1(clicked_id)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/like_comment1" ?>',
            data: 'post_id=' + clicked_id,
            success: function (data) {
                $('#' + 'likecomment1' + clicked_id).html(data);

            }
        });
    }
</script>


<script type="text/javascript">


    function comment_delete(clicked_id) {
        $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deleted(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }


    function comment_deleted(clicked_id)
    {
        var post_delete = document.getElementById("post_delete");
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/pndelete_comment" ?>',
            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
            dataType: "json",
            success: function (data) {
                $('.' + 'insertcomment' + post_delete.value).html(data.comment);
                $('#' + 'insertcount' + post_delete.value).html(data.count);

                $('.post-design-commnet-box').show();
            }
        });
    }


    /*  function comment_deletetwo(clicked_id)
     {
     
     $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
     $('#bidmodal').modal('show');
     }
     
     function comment_deletedtwo(clicked_id)
     {
     
     var post_delete = document.getElementById("post_delete");
     $.ajax({
     type: 'POST',
     url: '<?php echo base_url() . "business_profile/pndelete_commenttwo" ?>',
     dataType: 'json',
     data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
     success: function (data) { //alert('.' + 'insertcomment' + clicked_id);
     
     $('#' + 'fourcomment' + post_delete.value).html(data.comment);
     $('#' + 'commnetpost' + post_delete.value).html(data.count);
     
     }
     });
     } */

    function comment_deletetwo(clicked_id)
    {

        $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

    function comment_deletedtwo(clicked_id)
    {

        var post_delete1 = document.getElementById("post_deletetwo");

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/pndelete_commenttwo" ?>',
            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete1.value,
            dataType: "json",
            success: function (data) { //alert('.' + 'insertcomment' + clicked_id);
                $('.' + 'insertcommenttwo' + post_delete1.value).html(data.comment);
                $('#' + 'insertcount' + post_delete1.value).html(data.count);

                $('.post-design-commnet-box').show();
            }
        });
    }
</script>

<script type="text/javascript">

    function comment_editbox(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment' + clicked_id).style.display = 'inline-block';
        document.getElementById('showcomment' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit' + clicked_id).style.display = 'inline-block';

        document.getElementById('editcommentbox' + clicked_id).style.display = 'none';
        document.getElementById('editcancle' + clicked_id).style.display = 'block';

        $('.post-design-commnet-box').hide();

    }

    function comment_editcancle(clicked_id) {

        document.getElementById('editcommentbox' + clicked_id).style.display = 'block';
        document.getElementById('editcancle' + clicked_id).style.display = 'none';

        document.getElementById('editcomment' + clicked_id).style.display = 'none';
        document.getElementById('showcomment' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit' + clicked_id).style.display = 'none';

        $('.post-design-commnet-box').show();
    }

    function comment_editboxtwo(clicked_id) {
//                    alert(clicked_id);
//                    return false;

        $('div[id^=editcommenttwo]').css('display', 'none');
        $('div[id^=showcommenttwo]').css('display', 'block');
        $('button[id^=editsubmittwo]').css('display', 'none');
        $('div[id^=editcommentboxtwo]').css('display', 'block');
        $('div[id^=editcancletwo]').css('display', 'none');

        document.getElementById('editcommenttwo' + clicked_id).style.display = 'inline-block';
        document.getElementById('showcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('editsubmittwo' + clicked_id).style.display = 'inline-block';
        document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'none';
        document.getElementById('editcancletwo' + clicked_id).style.display = 'block';
        $('.post-design-commnet-box').hide();
//                    document.getElementById('editcomment' + clicked_id).style.display = 'block';
//                    document.getElementById('showcomment' + clicked_id).style.display = 'none';
//                    document.getElementById('editsubmit' + clicked_id).style.display = 'block';
//                    document.getElementById('editcommentbox' + clicked_id).style.display = 'none';
//                    document.getElementById('editcancle' + clicked_id).style.display = 'block';

    }

    function comment_editcancletwo(clicked_id) {
        document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'block';
        document.getElementById('editcancletwo' + clicked_id).style.display = 'none';
        document.getElementById('editcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('showcommenttwo' + clicked_id).style.display = 'block';
        document.getElementById('editsubmittwo' + clicked_id).style.display = 'none';
        $('.post-design-commnet-box').show();
    }

    function comment_editbox3(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment3' + clicked_id).style.display = 'block';
        document.getElementById('showcomment3' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit3' + clicked_id).style.display = 'block';

        document.getElementById('editcommentbox3' + clicked_id).style.display = 'none';
        document.getElementById('editcancle3' + clicked_id).style.display = 'block';
        $('.post-design-commnet-box').hide();

    }

    function comment_editcancle3(clicked_id) {

        document.getElementById('editcommentbox3' + clicked_id).style.display = 'block';
        document.getElementById('editcancle3' + clicked_id).style.display = 'none';

        document.getElementById('editcomment3' + clicked_id).style.display = 'none';
        document.getElementById('showcomment3' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit3' + clicked_id).style.display = 'none';

        $('.post-design-commnet-box').show();

    }

    function comment_editbox4(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment4' + clicked_id).style.display = 'block';
        document.getElementById('showcomment4' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit4' + clicked_id).style.display = 'block';

        document.getElementById('editcommentbox4' + clicked_id).style.display = 'none';
        document.getElementById('editcancle4' + clicked_id).style.display = 'block';

        $('.post-design-commnet-box').hide();

    }

    function comment_editcancle4(clicked_id) {

        document.getElementById('editcommentbox4' + clicked_id).style.display = 'block';
        document.getElementById('editcancle4' + clicked_id).style.display = 'none';

        document.getElementById('editcomment4' + clicked_id).style.display = 'none';
        document.getElementById('showcomment4' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit4' + clicked_id).style.display = 'none';

        $('.post-design-commnet-box').show();

    }

</script>
<script type="text/javascript">
    /*  function edit_comment(abc)
     {
     
     $("#editcomment" + abc).click(function () {
     $(this).prop("contentEditable", true);
     });
     
     
     var sel = $("#editcomment" + abc);
     var txt = sel.html();
     if (txt == '' || txt == '<br>') {
     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
     $('#bidmodal').modal('show');
     return false;
     }
     $.ajax({
     type: 'POST',
     url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
     data: 'post_id=' + abc + '&comment=' + txt,
     success: function (data) {
     
     document.getElementById('editcomment' + abc).style.display = 'none';
     document.getElementById('showcomment' + abc).style.display = 'block';
     document.getElementById('editsubmit' + abc).style.display = 'none';
     
     
     document.getElementById('editcommentbox' + abc).style.display = 'block';
     document.getElementById('editcancle' + abc).style.display = 'none';
     $('#' + 'showcomment' + abc).html(data);
     
     
     
     }
     });
     
     } */

    function edit_comment(abc)
    {

        $("#editcomment" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });

        var sel = $("#editcomment" + abc);
        var txt = sel.html();
        if (txt == '' || txt == '<br>') {
            return false;
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + txt,
            success: function (data) {

                document.getElementById('editcomment' + abc).style.display = 'none';
                document.getElementById('showcomment' + abc).style.display = 'block';
                document.getElementById('editsubmit' + abc).style.display = 'none';

                document.getElementById('editcommentbox' + abc).style.display = 'block';
                document.getElementById('editcancle' + abc).style.display = 'none';
                $('#' + 'showcomment' + abc).html(data);
                $('.post-design-commnet-box').show();


            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });

    }
</script>


<script type="text/javascript">

    /* function commentedit(abc)
     {
     $("#editcomment" + abc).click(function () {
     $(this).prop("contentEditable", true);
     });
     
     $('#editcomment' + abc).keypress(function (event) {
     if (event.which == 13 && event.shiftKey != 1) {
     event.preventDefault();
     var sel = $("#editcomment" + abc);
     var txt = sel.html();
     if (txt == '' || txt == '<br>') {
     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
     $('#bidmodal').modal('show');
     return false;
     }
     if (window.preventDuplicateKeyPresses)
     return;
     window.preventDuplicateKeyPresses = true;
     window.setTimeout(function () {
     window.preventDuplicateKeyPresses = false;
     }, 500);
     
     $.ajax({
     type: 'POST',
     url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
     data: 'post_id=' + abc + '&comment=' + txt,
     success: function (data) {
     
     
     document.getElementById('editcomment' + abc).style.display = 'none';
     document.getElementById('showcomment' + abc).style.display = 'block';
     document.getElementById('editsubmit' + abc).style.display = 'none';
     
     document.getElementById('editcommentbox' + abc).style.display = 'block';
     document.getElementById('editcancle' + abc).style.display = 'none';
     
     $('#' + 'showcomment' + abc).html(data);
     
     }
     });
     
     }
     });
     
     
     } */

    function commentedit(abc)
    {

        $("#editcomment" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });
        $('#editcomment' + abc).keypress(function (event) {
            if (event.which == 13 && event.shiftKey != 1) {
                event.preventDefault();
                var sel = $("#editcomment" + abc);
                var txt = sel.html();
                if (txt == '' || txt == '<br>') {
                    return false;
                }
                if (window.preventDuplicateKeyPresses)
                    return;
                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
                    data: 'post_id=' + abc + '&comment=' + txt,
                    success: function (data) { //alert('falguni');
                        document.getElementById('editcomment' + abc).style.display = 'none';
                        document.getElementById('showcomment' + abc).style.display = 'block';
                        document.getElementById('editsubmit' + abc).style.display = 'none';
                        document.getElementById('editcommentbox' + abc).style.display = 'block';
                        document.getElementById('editcancle' + abc).style.display = 'none';
                        $('#' + 'showcomment' + abc).html(data);
                        $('.post-design-commnet-box').show();
                    }
                });
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }
</script>


<script type="text/javascript">
    /*function edit_commenttwo(abc)
     {
     $("#editcommenttwo" + abc).click(function () {
     $(this).prop("contentEditable", true);
     });
     var sel = $("#editcommenttwo" + abc);
     var txt = sel.html();
     if (txt == '' || txt == '<br>') {
     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
     $('#bidmodal').modal('show');
     return false;
     } else {
     $.ajax({
     type: 'POST',
     url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
     data: 'post_id=' + abc + '&comment=' + txt,
     success: function (data) {
     document.getElementById('editcommenttwo' + abc).style.display = 'none';
     document.getElementById('showcommenttwo' + abc).style.display = 'block';
     document.getElementById('editsubmittwo' + abc).style.display = 'none';
     
     document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
     document.getElementById('editcancletwo' + abc).style.display = 'none';
     //alert('.' + 'showcomment' + abc);
     $('#' + 'showcommenttwo' + abc).html(data);
     
     }
     });
     }
     
     }*/

    function edit_commenttwo(abc)
    {
        //var post_comment_edit = document.getElementById("editcommenttwo" + abc);

        $("#editcommenttwo" + abc).click(function () {
            $(this).prop("contentEditable", true);
            //$(this).html("");
        });

        var sel = $("#editcommenttwo" + abc);
        var txt = sel.html();
        if (txt == '' || txt == '<br>') {
            return false;
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + txt,
            success: function (data) { //alert('falguni');

                document.getElementById('editcommenttwo' + abc).style.display = 'none';
                document.getElementById('showcommenttwo' + abc).style.display = 'block';
                document.getElementById('editsubmittwo' + abc).style.display = 'none';

                document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                document.getElementById('editcancletwo' + abc).style.display = 'none';
                $('#' + 'showcommenttwo' + abc).html(data);
                $('.post-design-commnet-box').show();
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });

    }
</script>


<script type="text/javascript">
    /*
     function commentedittwo(abc)
     {
     $("#editcommenttwo" + abc).click(function () {
     $(this).prop("contentEditable", true);
     });
     
     
     $('#editcommenttwo' + abc).keypress(function (event) {
     if (event.which == 13 && event.shiftKey != 1) {
     var sel = $("#editcommenttwo" + abc);
     var txt = sel.html();
     if (txt == '' || txt == '<br>') {
     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
     $('#bidmodal').modal('show');
     return false;
     }
     
     if (window.preventDuplicateKeyPresses)
     return;
     
     window.preventDuplicateKeyPresses = true;
     window.setTimeout(function () {
     window.preventDuplicateKeyPresses = false;
     }, 500);
     
     
     $.ajax({
     type: 'POST',
     url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
     data: 'post_id=' + abc + '&comment=' + txt,
     success: function (data) { //alert('falguni');
     
     document.getElementById('editcommenttwo' + abc).style.display = 'none';
     document.getElementById('showcommenttwo' + abc).style.display = 'block';
     document.getElementById('editsubmittwo' + abc).style.display = 'none';
     
     document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
     document.getElementById('editcancletwo' + abc).style.display = 'none';
     $('#' + 'showcommenttwo' + abc).html(data);
     
     }
     });
     
     }
     });
     
     } */

    function commentedittwo(abc)
    {
        //$(document).ready(function () {
        $("#editcommenttwo" + abc).click(function () {
            $(this).prop("contentEditable", true);
            //$(this).html("");
        });

        $('#editcommenttwo' + abc).keypress(function (event) {
            if (event.which == 13 && event.shiftKey != 1) {
                event.preventDefault();

                var sel = $("#editcommenttwo" + abc);
                var txt = sel.html();

                if (txt == '' || txt == '<br>') {
                    return false;
                }

                //$('#editcommenttwo' + abc).html("");

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
                    data: 'post_id=' + abc + '&comment=' + txt,
                    success: function (data) { //alert('falguni');


                        document.getElementById('editcommenttwo' + abc).style.display = 'none';
                        document.getElementById('showcommenttwo' + abc).style.display = 'block';
                        document.getElementById('editsubmittwo' + abc).style.display = 'none';

                        document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                        document.getElementById('editcancletwo' + abc).style.display = 'none';
                        //alert('.' + 'showcomment' + abc);

                        $('#' + 'showcommenttwo' + abc).html(data);
                        $('.post-design-commnet-box').show();


                    }
                });
            }
        });
        //});
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });

    }

</script>

<script>
    var modal = document.getElementById('myModal');

    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close1")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script src="jquery-1.8.2.js"></script>
<script>
    $(function () {
                var showTotalChar = 150, showChar = "More", hideChar = "less";
                $('.show').each(function () {
                    //var content = $(this).text();
                    var content = $(this).html();
                    if (content.length > showTotalChar) {
                        var con = content.substr(0, showTotalChar);
                        var hcon = content.substr(showTotalChar, content.length - showTotalChar);
                        var txt = con + '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
                        $(this).html(txt);
                    }
                });
                $(".showmoretxt").click(function () {
                    if ($(this).hasClass("sample")) {
                        $(this).removeClass("sample");
                        $(this).text(showChar);
                    } else {
                        $(this).addClass("sample");
                        $(this).text(hideChar);
                    }
                    $(this).parent().prev().toggle();
                    $(this).prev().toggle();
                    return false;
                });
            });
</script>

<script>
    function myFunction(clicked_id) {
        document.getElementById('myDropdown' + clicked_id).classList.toggle("show");
    }
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn1')) {

            var dropdowns = document.getElementsByClassName("dropdown-content1");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<script type="text/javascript">
    var $fileUpload = $("#files"),
            $list = $('#list'),
            thumbsArray = [],
            maxUpload = 5;

    function read(f) {
        return function (e) {
            var base64 = e.target.result;
            var $img = $('<img/>', {
                src: base64,
                title: encodeURIComponent(f.name),
                "class": "thumb"
            });
            var $thumbParent = $("<span/>", {html: $img, "class": "thumbParent"}).append('<span class="remove_thumb"/>');
            thumbsArray.push(base64);
            $list.append($thumbParent);
        };
    }


    function handleFileSelect(e) {
        e.preventDefault();
        var files = e.target.files;
        var len = files.length;
        if (len > maxUpload || thumbsArray.length >= maxUpload) {
            return alert("Sorry you can upload only 5 images");
        }
        for (var i = 0; i < len; i++) {
            var f = files[i];
            if (!f.type.match('image.*'))
                continue;
            var reader = new FileReader();
            reader.onload = read(f);
            reader.readAsDataURL(f);
        }
    }

    $fileUpload.change(function (e) {
        handleFileSelect(e);
    });

    $list.on('click', '.remove_thumb', function () {
        var $removeBtns = $('.remove_thumb');
        var idx = $removeBtns.index(this);
        $(this).closest('span.thumbParent').remove();
        thumbsArray.splice(idx, 1);
    });



</script>
<script type="text/javascript">
    function save_post(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/business_profile_save" ?>',
            data: 'business_profile_post_id=' + abc,
            success: function (data) {

                $('.' + 'savedpost' + abc).html(data);


            }
        });

    }
</script>

<script type="text/javascript">
    function remove_post(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/business_profile_deletepost" ?>',
            data: 'business_profile_post_id=' + abc,
            success: function (data) {

                $('#' + 'removepost' + abc).html(data);
                 window.location= "<?php echo base_url() ?>business_profile/business_profile_post";


            }
        });

    }
</script>

<script type="text/javascript">
    function del_particular_userpost(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/del_particular_userpost" ?>',
            data: 'business_profile_post_id=' + abc,
            success: function (data) {

                $('#' + 'removepost' + abc).html(data);


            }
        });

    }
</script>

<script type="text/javascript">
    function mulimg_like(clicked_id)
    {
        /*$.ajax({
         type: 'POST',
         url: '<?php echo base_url() . "business_profile/mulimg_like" ?>',
         data: 'post_image_id=' + clicked_id,
         success: function (data) {
         //alert(data);
         $('.' + 'likeimgpost' + clicked_id).html(data);
         
         }
         }); */

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/mulimg_like" ?>',
            data: 'post_image_id=' + clicked_id,
            dataType: 'json',
            success: function (data) {
                // $('.' + 'likepost' + clicked_id).html(data);
                //alert(data.like_user_count);

                $('.' + 'likepostimg' + clicked_id).html(data.like);
                $('.likeusernameimg' + clicked_id).html(data.likeuser);

                $('.likeduserlistimg' + clicked_id).hide();
                if (data.like_user_count == '0') {
                    document.getElementById('likeusernameimg' + clicked_id).style.display = "none";
                } else {
                    document.getElementById('likeusernameimg' + clicked_id).style.display = "block";
                }
                $('#likeusernameimg' + clicked_id).addClass('likeduserlistimg1');
            }
        });
    }
</script>

<script type="text/javascript">

    function insert_commentimg(clicked_id)
    {

        $("#post_imgcomment" + clicked_id).click(function () {
            $(this).prop("contentEditable", true);
            $(this).html("");
        });

        var sel = $("#post_imgcomment" + clicked_id);
        var txt = sel.html();
        if (txt == '') {
            return false;
        }
        $('#post_imgcomment' + clicked_id).html("");

        var x = document.getElementById('threeimgcomment' + clicked_id);
        var y = document.getElementById('fourimgcomment' + clicked_id);

        if (x.style.display === 'block' && y.style.display === 'none') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/pnmulimgcommentthree" ?>',
                data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                dataType: "json",
                success: function (data) {
                    $('textarea').each(function () {
                        $(this).val('');
                    });
                    $('.' + 'insertimgcomment' + clicked_id).html(data.comment);
                    $('#' + 'insertcountimg' + clicked_id).html(data.count);

                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/pnmulimg_comment" ?>',
                data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                dataType: "json",
                success: function (data) {
                    $('textarea').each(function () {
                        $(this).val('');
                    });
//                    alert('#' + 'insertimgcount' + clicked_id);
//                    alert(data.count);
//                    
//                    alert('#' + 'fourimgcomment' + clicked_id);
//                    alert(data.comment);

                    $('#' + 'insertcountimg' + clicked_id).html(data.count);
                    $('#' + 'fourimgcomment' + clicked_id).html(data.comment);

                    //$('#' + 'insertcommenttwo' + clicked_id).html(data);

                }
            });
        }
    }

</script>

<script type="text/javascript">

    function entercommentimg(clicked_id)
    {


        $("#post_imgcomment" + clicked_id).click(function () {
            $(this).prop("contentEditable", true);
        });

        $('#post_imgcomment' + clicked_id).keypress(function (e) {

            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();
                var sel = $("#post_imgcomment" + clicked_id);
                var txt = sel.html();
                if (txt == '' || txt == '<br>') {
                    return false;
                }

                $('#post_imgcomment' + clicked_id).html("");

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);



                var x = document.getElementById('threeimgcomment' + clicked_id);
                var y = document.getElementById('fourimgcomment' + clicked_id);

                if (x.style.display === 'block' && y.style.display === 'none') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/pnmulimgcommentthree" ?>',
                        data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                        dataType: "json",
                        success: function (data) {

                            $('.' + 'insertimgcomment' + clicked_id).html(data.comment);
                            $('#' + 'insertcountimg' + clicked_id).html(data.count);

                        }
                    });

                } else {

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/pnmulimg_comment" ?>',
                        data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                        success: function (data) {
//                            $('#' + 'insertcommenttwo' + clicked_id).html(data);
//alert('#' + 'insertimgcount' + clicked_id);

                            $('#' + 'insertcountimg' + clicked_id).html(data.count);
                            $('#' + 'fourimgcomment' + clicked_id).html(data.comment);

                        }
                    });
                }
            }
        });


    }
</script>

<script type="text/javascript">
    function imgcommentall(clicked_id) {


        var x = document.getElementById('threeimgcomment' + clicked_id);
        var y = document.getElementById('fourimgcomment' + clicked_id);
        var z = document.getElementById('insertcountimg' + clicked_id);

        if (x.style.display === 'block' && y.style.display === 'none') {
            x.style.display = 'none';
            y.style.display = 'block';
            z.style.visibility = 'show';
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/pnmulimagefourcomment" ?>',
                data: 'bus_img_id=' + clicked_id,
                success: function (data) {
                    $('#' + 'fourimgcomment' + clicked_id).html(data);

                }
            });
        }
    }
</script>


<script type="text/javascript">
    function commentall1(clicked_id) { //alert("xyz");

        //alert(clicked_id);
        var x = document.getElementById('threecomment1' + clicked_id);
        var y = document.getElementById('fourcomment1' + clicked_id);
        if (x.style.display === 'block' && y.style.display === 'none') {
            x.style.display = 'none';
            y.style.display = 'block';

        } else {
            x.style.display = 'block';
            y.style.display = 'none';
        }

    }
</script>

<script type="text/javascript">
    function imgcommentall1(clicked_id) { //alert("xyz");

        //alert(clicked_id);
        var x = document.getElementById('threeimgcomment1' + clicked_id);
        var y = document.getElementById('fourimgcomment1' + clicked_id);
        if (x.style.display === 'block' && y.style.display === 'none') {
            x.style.display = 'none';
            y.style.display = 'block';

        } else {
            x.style.display = 'block';
            y.style.display = 'none';
        }

    }
</script>
<script type="text/javascript">
    function imgcomment_like(clicked_id)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/mulimg_comment_like" ?>',
            data: 'post_image_comment_id=' + clicked_id,
            success: function (data) {
                $('#' + 'imglikecomment' + clicked_id).html(data);
            }
        });
    }
    function imgcomment_liketwo(clicked_id)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/mulimg_comment_liketwo" ?>',
            data: 'post_image_comment_id=' + clicked_id,
            success: function (data) {
                $('#' + 'imglikecomment1' + clicked_id).html(data);

            }
        });
    }
</script>
<script type="text/javascript">

    function imgcomment_editbox(clicked_id) {
        document.getElementById('imgeditcomment' + clicked_id).style.display = 'inline-block';
        document.getElementById('imgshowcomment' + clicked_id).style.display = 'none';
        document.getElementById('imgeditsubmit' + clicked_id).style.display = 'inline-block';
        document.getElementById('imgeditcommentbox' + clicked_id).style.display = 'none';
        document.getElementById('imgeditcancle' + clicked_id).style.display = 'block';

        $('.post-design-commnet-box').hide();
    }

    function imgcomment_editcancle(clicked_id) {

        document.getElementById('imgeditcommentbox' + clicked_id).style.display = 'block';
        document.getElementById('imgeditcancle' + clicked_id).style.display = 'none';

        document.getElementById('imgeditcomment' + clicked_id).style.display = 'none';
        document.getElementById('imgshowcomment' + clicked_id).style.display = 'block';
        document.getElementById('imgeditsubmit' + clicked_id).style.display = 'none';
        $('.post-design-commnet-box').show();
    }

    function imgcomment_editboxtwo(clicked_id) {

        $('div[id^=imgeditcommenttwo]').css('display', 'none');
        $('div[id^=imgshowcommenttwo]').css('display', 'block');
        $('button[id^=imgeditsubmittwo]').css('display', 'none');
        $('div[id^=imgeditcommentboxtwo]').css('display', 'block');
        $('div[id^=imgeditcancletwo]').css('display', 'none');

        document.getElementById('imgeditcommenttwo' + clicked_id).style.display = 'inline-block';
        document.getElementById('imgshowcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('imgeditsubmittwo' + clicked_id).style.display = 'inline-block';
        document.getElementById('imgeditcommentboxtwo' + clicked_id).style.display = 'none';
        document.getElementById('imgeditcancletwo' + clicked_id).style.display = 'block';
        $('.post-design-commnet-box').hide();
    }

    function imgcomment_editcancletwo(clicked_id) {
        document.getElementById('imgeditcommentboxtwo' + clicked_id).style.display = 'block';
        document.getElementById('imgeditcancletwo' + clicked_id).style.display = 'none';
        document.getElementById('imgeditcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('imgshowcommenttwo' + clicked_id).style.display = 'block';
        document.getElementById('imgeditsubmittwo' + clicked_id).style.display = 'none';
        $('.post-design-commnet-box').show();
    }

</script>
<script type="text/javascript">
    function imgedit_comment(abc)
    {
        $("#imgeditcomment" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });

        var sel = $("#imgeditcomment" + abc);
        var txt = sel.html();
        if (txt == '' || txt == '<br>') {
            $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='imgcomment_deleted(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
            $('#bidmodal').modal('show');
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                data: 'post_image_comment_id=' + abc + '&comment=' + txt,
                success: function (data) {


                    document.getElementById('imgeditcomment' + abc).style.display = 'none';
                    document.getElementById('imgshowcomment' + abc).style.display = 'block';
                    document.getElementById('imgeditsubmit' + abc).style.display = 'none';

                    document.getElementById('imgeditcommentbox' + abc).style.display = 'block';
                    document.getElementById('imgeditcancle' + abc).style.display = 'none';
                    $('#' + 'imgshowcomment' + abc).html(data);

                    $('.post-design-commnet-box').show();

                }
            });
        }

    }
</script>


<script type="text/javascript">

    /*
     function imgcommentedit(abc)
     {
     
     $("#imgeditcomment" + abc).click(function () {
     $(this).prop("contentEditable", true);
     
     });
     
     $('#imgeditcomment' + abc).keypress(function (event) {
     
     if (event.which == 13 && event.shiftKey != 1) {
     vent.preventDefault();
     var sel = $("#imgeditcomment" + abc);
     var txt = sel.html();
     if (txt == '' || txt == '<br>') {
     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='imgcomment_deleted(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
     $('#bidmodal').modal('show');
     return false;
     } else {
     
     if (window.preventDuplicateKeyPresses)
     return;
     window.preventDuplicateKeyPresses = true;
     window.setTimeout(function () {
     window.preventDuplicateKeyPresses = false;
     }, 500);
     
     
     $.ajax({
     type: 'POST',
     url: '<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
     data: 'post_image_comment_id=' + abc + '&comment=' + txt,
     success: function (data) {
     
     
     document.getElementById('imgeditcomment' + abc).style.display = 'none';
     document.getElementById('imgshowcomment' + abc).style.display = 'block';
     document.getElementById('imgeditsubmit' + abc).style.display = 'none';
     
     document.getElementById('imgeditcommentbox' + abc).style.display = 'block';
     document.getElementById('imgeditcancle' + abc).style.display = 'none';
     
     $('#' + 'imgshowcomment' + abc).html(data);
     
     
     
     }
     });
     }
     
     }
     });
     
     
     } */

    function imgcommentedit(abc)
    {
        $("#imgeditcomment" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });

        $('#imgeditcomment' + abc).keypress(function (event) {

            if (event.which == 13 && event.shiftKey != 1) {
                event.preventDefault();
                var sel = $("#imgeditcomment" + abc);
                var txt = sel.html();
                if (txt == '' || txt == '<br>') {
                    $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='imgcomment_deleted(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                    $('#bidmodal').modal('show');
                    return false;
                } else {

                    if (window.preventDuplicateKeyPresses)
                        return;
                    window.preventDuplicateKeyPresses = true;
                    window.setTimeout(function () {
                        window.preventDuplicateKeyPresses = false;
                    }, 500);


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                        data: 'post_image_comment_id=' + abc + '&comment=' + txt,
                        success: function (data) {


                            document.getElementById('imgeditcomment' + abc).style.display = 'none';
                            document.getElementById('imgshowcomment' + abc).style.display = 'block';
                            document.getElementById('imgeditsubmit' + abc).style.display = 'none';

                            document.getElementById('imgeditcommentbox' + abc).style.display = 'block';
                            document.getElementById('imgeditcancle' + abc).style.display = 'none';

                            $('#' + 'imgshowcomment' + abc).html(data);
                            $('.post-design-commnet-box').show();


                        }
                    });
                }

            }
        });


    }
</script>



<script type="text/javascript">
    function imgedit_commenttwo(abc)
    {

        $("#imgeditcommenttwo" + abc).click(function () {
            $(this).prop("contentEditable", true);

        });

        var sel = $("#imgeditcommenttwo" + abc);
        var txt = sel.html();
        if (txt == '' || txt == '<br>') {
            $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='imgcomment_deletedtwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
            $('#bidmodal').modal('show');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
            data: 'post_image_comment_id=' + abc + '&comment=' + txt,
            success: function (data) {
                //alert(data);
                document.getElementById('imgeditcommenttwo' + abc).style.display = 'none';
                document.getElementById('imgshowcommenttwo' + abc).style.display = 'block';
                document.getElementById('imgeditsubmittwo' + abc).style.display = 'none';

                document.getElementById('imgeditcommentboxtwo' + abc).style.display = 'block';
                document.getElementById('imgeditcancletwo' + abc).style.display = 'none';
                $('#' + 'imgshowcommenttwo' + abc).html(data);
                $('.post-design-commnet-box').show();
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }
</script>

<script type="text/javascript">

    function imgcommentedittwo(abc)
    {

        $("#imgeditcommenttwo" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });

        $('#imgeditcommenttwo' + abc).keypress(function (event) {
            if (event.which == 13 && event.shiftKey != 1) {
                event.preventDefault();
                var sel = $("#imgeditcommenttwo" + abc);
                var txt = sel.html();
                if (txt == '' || txt == '<br>') {
                    $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='imgcomment_deletedtwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                    $('#bidmodal').modal('show');
                    return false;
                }

                if (window.preventDuplicateKeyPresses)
                    return;
                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                    data: 'post_image_comment_id=' + abc + '&comment=' + txt,
                    success: function (data) {


                        document.getElementById('imgeditcommenttwo' + abc).style.display = 'none';
                        document.getElementById('imgshowcommenttwo' + abc).style.display = 'block';
                        document.getElementById('imgeditsubmittwo' + abc).style.display = 'none';

                        document.getElementById('imgeditcommentboxtwo' + abc).style.display = 'block';
                        document.getElementById('imgeditcancletwo' + abc).style.display = 'none';
                        $('#' + 'imgshowcommenttwo' + abc).html(data);
                        $('.post-design-commnet-box').show();
                    }
                });


            }
        });


    }
</script>


<script type="text/javascript">


    function imgcomment_delete(clicked_id) {
        $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='imgcomment_deleted(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

    function imgcomment_deleted(clicked_id)
    {
        var post_delete = document.getElementById("imgpost_delete_" + clicked_id);
        //alert(post_delete.value);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/mul_delete_comment" ?>',
            dataType: 'json',
            data: 'post_image_comment_id=' + clicked_id + '&post_delete=' + post_delete.value,
            success: function (data) {

                //$('#' + 'insertimgcount' + post_delete.value).html(data.count);
                $('#' + 'insertcountimg' + post_delete.value).html(data.count);
                $('.' + 'insertimgcomment' + post_delete.value).html(data.comment);
                $('.post-design-commnet-box').show();
            }
        });
    }


    function imgcomment_deletetwo(clicked_id)
    {
        $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='imgcomment_deletedtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }


    function imgcomment_deletedtwo(clicked_id)
    {
        var post_delete1 = document.getElementById("imgpost_deletetwo_" + clicked_id);
//        alert(post_delete1.value);
//        return false;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/mul_delete_commenttwo" ?>',
            data: 'post_image_comment_id=' + clicked_id + '&post_delete=' + post_delete1.value,
            dataType: "json",
            success: function (data) {
                //$('.' + 'insertcommenttwo' + post_delete1.value).html(data);
                $('.' + 'insertimgcommenttwo' + post_delete1.value).html(data.comment);
                $('#' + 'insertimgcount' + post_delete1.value).html(data.count);
                $('.post-design-commnet-box').show();
            }
        });
    }
</script>

<script type="text/javascript">
    function h(e) {
        $(e).css({'height': '29px', 'overflow-y': 'hidden'}).height(e.scrollHeight);
    }
    $('.textarea').each(function ()
    {
        h(this);
    }).on('input', function () {
        h(this);
    });
</script>
<script type="text/javascript">
    function editpost(abc)
    {
        document.getElementById('editpostdata' + abc).style.display = 'none';
        document.getElementById('editpostbox' + abc).style.display = 'block';
        document.getElementById('editpostdetails' + abc).style.display = 'none';
        document.getElementById('editpostdetailbox' + abc).style.display = 'block';
        document.getElementById('editpostsubmit' + abc).style.display = 'block';
    }
</script>


<script type="text/javascript">
    function edit_postinsert(abc)
    {

        var editpostname = document.getElementById("editpostname" + abc);
        var $field = $('#editpostname' + abc);
        var editpostdetails = $('#editpostdesc' + abc).html();
        if (editpostname.value == '' && editpostdetails == '') {
            $('.biderror .mes').html("<div class='pop_content'>You must either fill title or description.");
            $('#bidmodal').modal('show');

            document.getElementById('editpostdata' + abc).style.display = 'block';
            document.getElementById('editpostbox' + abc).style.display = 'none';
            document.getElementById('editpostdetails' + abc).style.display = 'block';
            document.getElementById('editpostdetailbox' + abc).style.display = 'none';

            document.getElementById('editpostsubmit' + abc).style.display = 'none';

        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "business_profile/edit_post_insert" ?>',
                data: 'business_profile_post_id=' + abc + '&product_name=' + editpostname.value + '&product_description=' + editpostdetails,
                dataType: "json",
                success: function (data) {

                    document.getElementById('editpostdata' + abc).style.display = 'block';
                    document.getElementById('editpostbox' + abc).style.display = 'none';
                    document.getElementById('editpostdetails' + abc).style.display = 'block';
                    document.getElementById('editpostdetailbox' + abc).style.display = 'none';

                    document.getElementById('editpostsubmit' + abc).style.display = 'none';

                    $('#' + 'editpostdata' + abc).html(data.title);
                    $('#' + 'editpostdetails' + abc).html(data.description);
                }
            });
        }
    }
</script>

<!-- cover image end -->
<script type="text/javascript">
    function likeuserlist(post_id) {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/imglikeuserlist" ?>',
            data: 'post_id=' + post_id,
            dataType: "html",
            success: function (data) {
                var html_data = data;
                $('#likeusermodal .mes').html(html_data);
                $('#likeusermodal').modal('show');
            }
        });


    }
    function likeuserlistimg(post_id) {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/imglikeuserlist" ?>',
            data: 'post_id=' + post_id,
            dataType: "html",
            success: function (data) {
                var html_data = data;
                $('#likeusermodal .mes').html(html_data);
                $('#likeusermodal').modal('show');
            }
        });


    }
</script>


<!-- post delete login user script start -->
<script type="text/javascript">
    function user_postdelete(clicked_id)
    {

        $('.biderror .mes').html("<div class='pop_content'> Do you want to delete this post?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='remove_post(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
</script>
<!-- post delete login user end -->

<!-- post delete particular login user script start -->
<script type="text/javascript">
    function user_postdeleteparticular(clicked_id)
    {

        $('.biderror .mes').html("<div class='pop_content'> Do You want to delete this post from your profile?.<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='del_particular_userpost(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
</script>
<!-- post delete particular login user end -->


<style type="text/css">
    .likeduser, .likeduser1{
        width: 100%;
        background-color: #00002D;
    }
    .likeduser-title, .likeduser-title1{
        color: #fff;
        margin-bottom: 5px;
        padding: 7px;
    }
    .likeuser_list, .likeuser_list1{
        background-color: #ccc;
        float: left;
        margin: 0px 6px 5px 9px;
        padding: 5px;
        width: 47%;
        font-size: 14px;
    }
    .likeduserlist, .likeduserlist1 {
        float: left;
        /*        margin-left: 15px;
                margin-right: 15px;*/
        width: 96%;
    }
    div[class^="likeduserlist"]{
        width: 100% !important;
        background-color: #fff !important;
    }
    .like_one_other_img{
        margin-left: 25px;
        /*  margin-right: 15px;*/

    }

</style>
<!-- This  script use for close dropdown in every post -->
<script type="text/javascript">
    $('body').on("click", "*", function (e) {
        var classNames = $(e.target).attr("class").toString().split(' ').pop();
        if (classNames != 'fa-ellipsis-v') {
            $('div[id^=myDropdown]').hide().removeClass('show');
        }

    });

</script>
<!-- This  script use for close dropdown in every post -->