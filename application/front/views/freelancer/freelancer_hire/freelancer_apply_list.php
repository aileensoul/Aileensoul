<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
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
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
    <body class="page-container-bg-solid page-boxed">

      <section>
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <!-- <div class="left-side-bar">
                           <ul>
                                  <li><a href="<?php echo base_url('freelancer_hire_edit/freelancer_hire_profile'); ?>">Freelancer hire Profile</a>
                                    </li>
                                    <li <?php if($this->uri->segment(1) == 'freelancer'){?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_hire_post'); ?>">Home</a>
                                    </li>
                                   
                                    <li><a href="<?php echo base_url('freelancer/freelancer_add_post'); ?>">Add New Post</a>
                                    </li>
                                  <li><a href="<?php echo base_url('freelancer/freelancer_save'); ?>">Saved Freelancer</a>
                                    </li>
                                </ul>
                        </div> -->


                    <div class="add-post-button">
     
                        <a href="<?php echo base_url("freelancer/freelancer_hire_post"); ?>"><div class="back">
                          <div class="but1">
                               Back To Post
                          </div>
                     </div></a>

                   </div>

                    </div>
                    <!-- <div class="col-md-6 col-sm-8"> -->


                      <div>
                        <?php
                                        if ($this->session->flashdata('error')) {
                                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                        }
                                        if ($this->session->flashdata('success')) {
                                            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                        }?>
                    </div>

                    <!--- middle section start -->
                   <!-- middle div stat -->
                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3> Applied Freelancer </h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                        <!-- body tag inner data start-->
                                        <?php
// echo "<pre>"; print_r($candidatefreelancer);die();
                                        if ($postdata) {
                                            foreach ($postdata as $row) {
                                                
                                                    // echo "<pre>"; print_r($row);die();
                                                    ?> 
             <div class="profile-job-post-detail clearfix">
                        <!-- pop up box start-->
                   <!-- <div id="popup1" class="overlay">
                       <div class="popup">
                         <div class="pop_content">
                              Your User is Successfully Saved.
                       <p class="okk"><a class="okbtn" href="">Ok</a></p>
                         </div>
                      </div>
                    </div> -->
 
                    <!-- pop up box end-->
             <div class="profile-job-post-title-inside clearfix">
                 <div class="profile-job-profile-button clearfix">
                    <div class="profile-job-post-location-name-rec">
                  

             <div style="display: inline-block; float: left;">
                     <div  class="buisness-profile-pic-candidate">
                                   <?php
                                if ($row['freelancer_post_user_image']) {
                              ?>
                 <img src="<?php echo base_url(USERIMAGE . $row['freelancer_post_user_image']); ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
                    <?php
                  } else {
                      ?>
                <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
               <?php
                    }
                     ?>
            </div>
           </div>

              
             <div class="designation_rec" style="float: left;">
          <ul>
               <li>        
             <a href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"><h6>
              <?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?></h6>
            </a>
          </li>

          <li style="display: block;" ><a href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="" > <?php
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
             <!--  <li><b>Designation</b>
               <span><?php
                 if ($row['designation']) {
                  echo $row['designation'];
                } else {
                  echo PROFILENA;
                   }
                ?></span>
              </li> --> 
   
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
                 $rate_type = 'Fixed';
               } else {
           $rate_type = 'Hourly';
                 }
        echo $row['freelancer_post_hourly'] . "   " . $currency . "  " . $rate_type;
              ;
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
            $savedata = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            
            // khayti changes start 6-4
            ?>
              <!--<a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Saved</a>-->
           
          <?php if($userid != $row['user_id']){ ?>
       <a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Message</a>

 <?php  $contition_array = array('invite_user_id' => $row['user_id'], 'post_id' => $postid, 'profile' => 'freelancer');
        $userdata = $this->common->select_data_by_condition('user_invite', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if($userdata){ ?>
          <a href="javascript:void(0);" class="button invited" id="<?php echo 'invited' . $row['user_id']; ?>" > Invited</a>       
         <?php }else{ ?>
         <a  href="#" class="button invite_border" id="<?php echo 'invited' . $row['user_id']; ?>" onClick="inviteuserpopup(<?php echo $row['user_id']; ?>)"> Invite</a>
              <!-- <a href="javascript:void(0);" class="button invite_border" id="<?php echo 'invited' . $row['user_id']; ?>" onclick="inviteuserpopup(<?php echo $row['user_id']; ?>)"> Invite</a> -->
          <?php  } ?>


        <?php
            if ($savedata) {
                ?> 
                <a class="saved">Saved </a>
        
                <?php
            } else {
                ?>

     <input type="hidden" id="<?php echo 'hideenuser' . $row['user_id']; ?>" value= "<?php echo $data[0]['save_id']; ?>">
               
              <a id="<?php echo $row['user_id']; ?>" onClick="savepopup(<?php echo $row['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save</a>
          <!-- pallavi changes end 15-4 -->
         <!--  <a id="<?php echo $row['user_id']; ?>" onClick="save_user(this.id)" href="#popup1" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save User</a> -->
                          <?php
                                          
            }
          
         
         }?>
                 </div>
              </div>
            </div>
          </div>
                                                    <?php
                                                
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
                    <!-- middle div end -->
                      <!--- middle section end -->
                       
                     
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
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
    <!-- BEGIN INNER FOOTER -->
    <?php echo $footer; ?>
    
    <script type="text/javascript">
    
   function inviteuser(clicked_id)
    {  

      var post_id = "<?php echo $postid; ?>";
//alert(post_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "freelancer/free_invite_user" ?>',
            data: 'post_id=' + post_id + '&invited_user=' + clicked_id,
            success: function (data) { //alert(data);
                $('#' + 'invited' + clicked_id).html(data).addClass('button invited').removeClass('button invite_border');

            }
        });
    }

   
</script>

<script type="text/javascript">
                  function save_user(abc)
                        {
                          
           var saveid = document.getElementById("hideenuser" + abc);
           //alert(saveid);
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

<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

<script>
                        function savepopup(id) {
                          //alert(123);
                            save_user(id);
                            //alert(456);
                      
            $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
            $('#bidmodal').modal('show');
                        }
                    </script>

                    <script >
                  function inviteuserpopup(abc){

    $('.biderror .mes').html("<div class='pop_content'>Do you want to invite this candidate?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='inviteuser(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');

   } 

  </script>
    <!-- end footer -->
 

