<!-- start head  -->
<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>

<?php echo $freelancer_hire_header2; ?>

<!--post save success pop up style strat -->
<style>
    /*body {
        font-family: Arial, sans-serif;
        background-size: cover;
        height: 100vh;
    }*/
    /*    .box {
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
    }*/
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
    /*.popup .okbtn {
        position: absolute;
        transition: all 200ms;
        font-size: 26px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        padding: 12px 30px;
        background-color: darkcyan;
        margin-left: -45px;
        margin-top: 15px;
    }*/
    .popup .pop_content {
        text-align: center;
        margin-top: 40px;
    }
    .model_ok_cancel{
        width:200px !important;
    }
    /* @media screen and (max-width: 700px){
         .box{
             width: 70%;
         }
         .popup{
             width: 70%;
         }*/
    /* }*/
</style>
<!--post save success pop up style end -->
<!-- END HEADER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
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
                        url: "<?php echo base_url('freelancer/image_saveBG_ajax'); ?>",
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
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row row4">

                    <div class="col-md-4"><div class="profile-box profile-box-left">
                            <!--                            <div class="full-box-module">    
                                                            <div class="profile-boxProfileCard  module">
                                                                <div class="profile-boxProfileCard-cover">  
                                                                    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                                                       href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>"
                                                                       tabindex="-1"
                                                                       aria-hidden="true"
                                                                       rel="noopener" 
                                                                       title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                                                        
                            <?php
                            if ($freehiredata[0]['profile_background'] != '') {
                                ?>
                          box image start 
                        <img src="<?php echo base_url(FREEHIREIMG . $freehiredata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"  style="height: 95px;
                         width: 100%;">
                      box image end 
                                <?php
                            } else {
                                ?>
                    <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"  style="height: 95px;
                       width: 100%;">
                                <?php
                            }
                            ?>
                                                                        
                     </a></div>
                     <div class="profile-box-menu  fr col-md-12">
                    <div class="left- col-md-2"></div>
                    <div  class="right-section col-md-10">
                      <ul>
                     <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_hire_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" > Profile</a>
                                                                            </li>
                                                                            <li ><a href="<?php echo base_url('freelancer/freelancer_hire_post'); ?>"> Posts</a>
                                                                            </li>
                                                                            <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save'); ?>">Saved</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="profile-boxProfileCard-content">
                                                                    <div class="buisness-profile-txext ">
                                                                        <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>""  tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                            <?php
                            if ($freehiredata[0]['freelancer_hire_user_image']) {
                                ?>
                                                                                    <img src="<?php echo base_url(FREEHIREIMG . $freehiredata[0]['freelancer_hire_user_image']); ?>" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                <?php
                            } else {
                                ?>
                                                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                <?php
                            }
                            ?>
                                                                           
                                                                        </a>
                                                                    </div>
                                                                    <div class="profile-box-user">
                                                                        <span class="profile-box-name ">
                                                                            <a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"> <?php echo ucwords($freehiredata[0]['fullname']) . ' ' . ucwords($freehiredata[0]['username']); ?></a>          </span>
                                                                    </div>
                                                                    <div class="profile-box-user">
                                                                        <span class="profile-box-name">
                                                                        <a style="font-size: 17px;" href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"><?php
                            if ($freehiredata[0]['designation']) {
                                echo $freehiredata[0]['designation'];
                            } else {
                                echo "Designation";
                            }
                            ?></a></span>
                                                                    </div>
                                                                    <div id="profile-box-profile-prompt"></div>
                                                                </div>
                                                            </div>
                                                        </div>-->

                            <div class="full-box-module">    

                                <div class="profile-boxProfileCard  module">
 <div class="profile-boxProfileCard-cover"> 
   <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
     href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>"  tabindex="-1" aria-hidden="true" rel="noopener" 
      title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">

                                            <?php
                                            if ($freehiredata[0]['profile_background'] != '') {
                                                ?>
                                                <!-- box image start -->
              <img src="<?php echo base_url(FREEHIREIMG . $freehiredata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>" >
                                                <!-- box image end -->
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"  style="height: 95px;
                                                     width: 100%;">
                                                     <?php
                                                 }
                                                 ?>


                                        </a>
                                    </div>

                                    <div class="profile-boxProfileCard-content clearfix">
                                        <div class="buisness-profile-txext col-md-4">
                                <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>""  tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                                <?php
                                                if ($freehiredata[0]['freelancer_hire_user_image']) {
                                                    ?>
                                                    <img src="<?php echo base_url(USERIMAGE . $freehiredata[0]['freelancer_hire_user_image']); ?>" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>" >
                                                    
                                                         <?php
                                                     } else {
                                                         ?>
                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="profile-box-user  profile-text-bui-user  fr col-md-9">
                                            <span class="profile-company-name ">
                                                <a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"> <?php echo ucwords($freehiredata[0]['fullname']) . ' ' . ucwords($freehiredata[0]['username']); ?></a>  
                                            </span>


       <div class="profile-boxProfile-name">
          <a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"><?php
           if ($freehiredata[0]['designation']) {
            echo $freehiredata[0]['designation'];
                 } else {
            echo "Designation";
                }
           ?></a></div>
       </div>

          <div class="profile-box-job-menu  col-md-12 rec_menubox">

                                            <ul class="">
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_hire_profile')) { ?> class="active" <?php } ?>><a title="Employer Details" href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" > Details</a></li>
                                                <li><a title="Post" href="<?php echo base_url('freelancer/freelancer_hire_post'); ?>">Posts</a></li>
<!--                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save'); ?>">Message</a>
                                                </li>-->
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')) { ?> class="active" <?php } ?>><a title="Saved Freelancer" href="<?php echo base_url('freelancer/freelancer_save'); ?>">Saved</a></li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                              <div  class="add-post-button">
                            <a class="btn btn-3 btn-3b" href="<?php echo base_url('freelancer/freelancer_add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
                        </div>
                        </div>
                      
                    </div>
                    <?php

                    function text2link($text) {
                        $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
                        $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
                        $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
                        return $text;
                    }
                    ?>
                    <!-- middle div stat -->
                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Recommended Freelancer</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                        <!-- body tag inner data start-->
                                        <?php
// echo "<pre>"; print_r($candidatefreelancer);die();
                                        if ($candidatefreelancer) {
                                            foreach ($candidatefreelancer as $cand_key => $cand_value) {
                                                foreach ($cand_value as $row) {
                                                    // echo "<pre>"; print_r($row);die();
                                                    ?> 
             <div class="profile-job-post-detail clearfix">
                                                        <!-- pop up box start-->
                   <div id="popup1" class="overlay">
                       <div class="popup">
                         <div class="pop_content">
                              Your User is Successfully Saved.
                          <p class="okk"><a class="okbtn" href="">Ok</a></p>
                         </div>
                      </div>
                    </div>
 
                    <!-- pop up box end-->
             <div class="profile-job-post-title-inside clearfix">
                 <div class="profile-job-profile-button clearfix">
                    <div class="profile-job-post-location-name-rec">
                       

          <div style="display: inline-block; float: left;">
              <div  class="buisness-profile-pic-candidate">
                                   <?php
                                if ($row['freelancer_post_user_image']) {
                              ?>
                <a href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
                 <img src="<?php echo base_url(USERIMAGE . $row['freelancer_post_user_image']); ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
                 </a>
                    <?php
                  } else {
                      ?>
                      <a href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
                <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"> </a>
               <?php
                    }
                     ?>
            </div>
        </div>
              
        <div class="designation_rec" style="float: left;">
          <ul>
               <li>
             <a style="margin-right: 4px;" href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"><h6>
              <?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?></h6>
            </a>
          </li>

          <li style="display: block;" ><a href="#"> <?php
                 if ($row['designation']) {
                  echo $row['designation'];
                } else {
                  echo PROFILENA;
                   }
                ?> </a></li>
       </ul>
       </div>

        </div>
         </div>
          </div>  <div class="profile-job-post-title clearfix">
              <div class="profile-job-profile-menu">
               <ul>
                  <li><b>Skills</b><span>
                  <?php
                  $comma = ", ";
                  $k = 0;
                  $aud = $row['freelancer_post_area'];
                  $aud_res = explode(',', $aud);
                  foreach ($aud_res as $skill) {
                 if ($k != 0) {
                 echo $comma;
                     }
               $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
               if ($cache_time) {
               echo $cache_time;
             } else {
                echo PROFILENA;
                }
                 $k++;
                }
               ?>   </span>    
           </li>
             <li><b>Other Skill</b><span>
                <?php
                  if ($row['freelancer_post_otherskill']) {
                    echo $row['freelancer_post_otherskill'];
                 } else {
                      echo PROFILENA;
                    }
               ?></span>
              </li>
           <?php $cityname = $this->db->get_where('cities', array('city_id' => $row['freelancer_post_city']))->row()->city_name; ?>
           <li><b>Location</b><span> <?php
                if ($cityname) {
                   echo $cityname;
                } else {
               echo PROFILENA;
                }
               ?></span></li>
            <li><b>Skill Description</b> <span> <p>
            <?php
          if ($row['freelancer_post_skill_description']) {
             echo $row['freelancer_post_skill_description'];
        } else {
                echo PROFILENA;
             }
            ?></p></span>
         </li>
             
              <!-- <li><b>Designation</b>
               <span><?php
                 if ($row['designation']) {
                  echo $row['designation'];
                } else {
                  echo PROFILENA;
                   }
                ?></span>
              </li>
    -->
             <li><b>Avaiability</b><span>
              <?php
                if ($row['freelancer_post_work_hour']) {
                   echo $row['freelancer_post_work_hour'] . "  " . "Hours per week ";
                } else {
                    echo PROFILENA;
                 }
                  ?></span>
               </li>
             <li><b>Rate Hourly</b> <span>
                <?php
             if ($row['freelancer_post_hourly']) {
             $currency = $this->db->get_where('currency', array('currency_id' => $row['freelancer_post_ratestate']))->row()->currency_name;
             if ($row['freelancer_post_fixed_rate'] == '1') {
                 echo $row['freelancer_post_hourly'] . "   " . $currency . "  (Also work on fixed Rate) " ;
               } else {
           echo $row['freelancer_post_hourly'] . "   " . $currency . "  " . $rate_type;
                 }

              } else {
               echo PROFILENA;
                 }
           ?></span>
               </li>
                  <li><b>Total Experience</b>
                     <span> <?php
                       if ($row['freelancer_post_exp_year'] || $row['freelancer_post_exp_month']) {
                  echo $row['freelancer_post_exp_year'] . ' ' . $row['freelancer_post_exp_month'];
                  } else {
                       echo PROFILENA;
                     }
                 ?></span>
              </li>
         </ul>
    </div>

             <div class="profile-job-profile-button clearfix">
                   <div class="apply-btn fr">
            <?php
            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('from_id' => $userid, 'to_id' => $row['user_id'], 'save_type' => 2, 'status' => '0');
            $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            // khayti changes start 6-4
            ?>
              <!--<a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Saved</a>-->
            <?php   
            
            if($userid != $row['user_id']){ ?>
          <a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Message</a>

          <?php
            if (!$data) {
                ?> 
        <input type="hidden" id="<?php echo 'hideenuser' . $row['user_id']; ?>" value= "<?php echo $data[0]['save_id']; ?>">
               
              <a id="<?php echo $row['user_id']; ?>" onClick="savepopup(<?php echo $row['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save</a>
          <!-- pallavi changes end 15-4 -->
         <!--  <a id="<?php echo $row['user_id']; ?>" onClick="save_user(this.id)" href="#popup1" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save User</a> -->
                <?php
            } else {
                ?>


       

    <a class="saved">Saved </a> 
              
                <?php
                // khayti changes end 6-4                              
            } }
            ?> 
                 </div>
              </div>
            </div>
          </div>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            ?>
                                            <div class="text-center rio">
                                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Recommended Freelancer Found.</h4>
                                            </div>
    <?php
}
?>
                                        <!-- body tag inner data end -->
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- middle div  -->

                    </section>
                    <footer>
<?php echo $footer; ?>
                    </footer>
                    <!-- pallavi changes 15-4 -->
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
                    <!-- Model Popup Close -->
                    <!-- pallavi changes end 15-4 -->
                    </body>
                    </html>
                    <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
                    <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
                    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
                    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                  function save_user(abc)
                        {
           var saveid = document.getElementById("hideenuser" + abc);
                $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . "freelancer/save_user1" ?>',
        data: 'user_id=' + abc + '&save_id=' + saveid.value,
        success: function (data) {
    $('.' + 'saveduser' + abc).html(data).addClass('saved');
                                }
                            });
                        }
                    </script>
                    <!-- save post end-->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                   
                    <script>
                        function savepopup(id) {
                            save_user(id);
                      
            $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
            $('#bidmodal').modal('show');
                        }
                    </script>
                    <!-- pallavi changes end 15-4