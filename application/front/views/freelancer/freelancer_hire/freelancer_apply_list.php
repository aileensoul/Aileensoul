<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
    <body class="page-container-bg-solid page-boxed">

      <section>
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
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
                       <ul>
                           <ul>
                              <li>
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
              </li>

               <li>
             <a href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"><h4>
              <?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?></h4>
            </a>
          </li>
       </ul>
        </div>
         </div>
          </div>  <div class="profile-job-post-title clearfix">
              <div class="profile-job-profile-menu">
               <ul>
                  <li><b>Skills</b><span>
                  <?php
                  $comma = ",";
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
              <li><b>Designation</b>
               <span><?php
                 if ($row['designation']) {
                  echo $row['designation'];
                } else {
                  echo PROFILENA;
                   }
                ?></span>
              </li>
   
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
            $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            // khayti changes start 6-4
            ?>
              <!--<a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Saved</a>-->
           
          <?php if($userid != $row['user_id']){ ?>
       <a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Message</a>
        <?php    if (!$data) {
                ?> 
         <input type="hidden" name="saveuser"  id="saveuser" value= "<?php echo $data[0]['save_id']; ?>">
        <!-- pallavi changes 15-4 -->
        <a id="<?php echo $row['user_id']; ?>" onClick="savepopup(<?php echo$row['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save</a>
          <!-- pallavi changes end 15-4 -->

         <!--  <a id="<?php echo $row['user_id']; ?>" onClick="save_user(this.id)" href="#popup1" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save User</a> -->
                <?php
            } else {
                ?>
         <a class="saved" href="javascript:void(0);" onclick="return false">Saved</a>
         
                <?php
                // khayti changes end 6-4                              
            }
            ?> 
         
         <?php  $contition_array = array('invite_user_id' => $row['user_id'], 'post_id' => $postid, 'profile' => 'freelancer');
        $userdata = $this->common->select_data_by_condition('user_invite', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if($userdata){ ?>
          <div class="button" id="<?php echo 'invited' . $row['user_id']; ?>" > Invited</div>       
         <?php }else{ ?>
              <div class="button" id="<?php echo 'invited' . $row['user_id']; ?>" onclick="inviteuser(<?php echo $row['user_id']; ?>)"> Invite</div>
          <?php  } }?>
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
            success: function (data) { alert(data);
                $('#' + 'invited' + clicked_id).html(data);

            }
        });
    }

   
</script>
    <!-- end footer -->
 

