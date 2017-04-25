<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->

   <!DOCTYPE html>
<html>

<body>

<!-- cover pic start -->

<!-- cover pic end -->
        
        

        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2" ></div>
                    <div class="col-md-7 col-sm-7">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Home</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                        
<!-- khyati start -->


 
                                        <div class="profile-job-post-detail clearfix">
                                            <div class="profile-job-post-title-inside clearfix">
                                                <div class="profile-job-post-location-name">
                                                    <ul>
                                                      <li><?php echo $postdata[0]['rec_firstname']; ?></li>
                                                     <li><?php echo $postdata[0]['post_name']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
                                                            <li>
                                                                <p> <i class="fa fa-lock" aria-hidden="true"></i>
                        <?php echo $postdata[0]['exp_month'] . "m -" . $postdata[0]['exp_year'] . "y" ; ?></p>
                                                            </li>
                                                            <li>
                                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $postdata[0]['city']; ?></p>
                                                            </li>
                                                            <!-- <li>
                                                                <p> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                </p>
                                                            </li> -->


                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <li> <b> Skills:</b> <span> <?php

                                                     $skills =  explode(',',$postdata[0]['post_skill']); 
foreach($skills as $skil){
$abc =   $this->db->get_where('skill',array('skill_id' => $skil['post_skill']))->row()->skill;

echo  $abc . " ";
 }  
                                                     ?></span>
                                                        </li>

                                                       <li> <b>Location:</b><span> <?php echo  $this->db->get_where('cities',array('city_id' => $postdata[0]['city']))->row()->city_name; ?>  </span>
                                                        </li>

                                                        <li> <b>Job Description:</b><span> <?php echo $postdata[0]['post_description']; ?>   </span>
                                                        </li>
                                                        <li><b>  <?php echo $postdata[0]['min_sal'] . '-' .   $postdata[0]['max_sal'] .  ' P.A'; ?> </b> <span></span> </li>

                                                    </ul>
                                                </div>
                                                 <?php if($postdata[0]['user_id'] == $userid){ ?>
                                                <div class="profile-job-profile-button clearfix">
                                                      <div class="apply-btn">
                                                    
                                                      <a href="<?php echo base_url('recruiter/edit_post/' . $postdata[0]['post_id']); ?>" class="button">Edit</a>
                          
                                                     <a href="<?php echo base_url('recruiter/remove_post/' . $postdata[0]['post_id']); ?>" class="button">Remove</a>
                                                        <a href="<?php echo base_url('recruiter/view_apply_list/' . $postdata[0]['post_id']); ?>" class="button">Applied  Candidate : <?php echo count($this->common->select_data_by_id('job_apply', 'post_id', $postdata[0]['post_id'], $data = '*', $join_str = array())); ?></a>

                                                    </div>
                                                     </div>
                                                    <?php } ?>
                                               
                                            </div>
                                        </div>

                                        <!-- khyati end -->
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


</body>

</html>
<!-- script for skill textbox automatic start (option 2)-->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  