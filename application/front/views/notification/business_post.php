<?php echo $head; ?>
<!-- header -->

<!-- style for span id=notification_count start-->
<!-- header -->


<body class="pushmenu-push">
<?php echo $header; ?>
    
    <section class="buttonset">
        <div id="nav_list"></div>
    </section>

    <!-- header end -->


    <section>
        

        

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

<?php
    // foreach($business_profile_data as $row)
    // { 

         $userid = $this->session->userdata('aileenuser');
       $contition_array = array('user_id'=> $userid,'post_id' => $row['business_profile_post_id'],'is_delete' =>0);

$jobdata =  $this->common->select_data_by_condition('business_profile_save', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 
//echo "<pre>";print_r($jobdata);die();
                            
if($jobdata[0]['business_save'] != 1)
{ 
                                        ?>

                                        <div class="profile-job-post-detail clearfix">

                                            <div class="profile-job-post-title-inside clearfix">
                                                <div class="profile-job-post-location-name">
                                                    <ul>

                                                   
                                                     <?php 
                 $companyname =  $this->db->get_where('business_profile',array('user_id' => $business_profile_data[0]['user_id']))->row()->company_name;

                  ?>
                                                       <!-- <li><a href="<?php //echo base_url('business_profile/business_resume/'.$row['user_id']); ?>"><?php //echo ucwords($firstname);?>&nbsp;&nbsp;<?php //echo ucwords($lastname);?></a></li>  -->

                                                      <li><h4><a href="<?php echo base_url('business_profile/business_resume/'.$business_profile_data[0]['user_id']); ?>"><?php echo ucwords($companyname); ?></a><h4></li>

                                                      <li><h5><?php echo $business_profile_data[0]['product_name']; ?></h5></li> 
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
                                                            <!-- <li>
                                                                <p> <i class="fa fa-lock" aria-hidden="true"></i> 1-4</p>
                                                            </li> -->
                                                            <!-- <li>
                                                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Ahmedabad</p>
                                                            </li> -->
                                                            <!-- <li>
                                                                <p> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                </p>
                                                            </li> -->
                                                            <li>
                                                           <a href="" title=""> <?php  echo $business_profile_data[0]['product_description'];  ?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <!-- <li> <b> Skills:</b> <span> Hii </span>
                                                        </li>
                                                       
                                                        <li> <b>Job Description:</b><span> Should be well versed in SQL Reports   </span>
                                                        </li>
                                                        <li><b>   50,000 - 3,00,000 P.A </b> <span></span> </li> -->
                                                        <li>

                                                        <img src="<?php echo base_url(BUSINESSPROFILEIMAGE . $business_profile_data[0]['product_image'])?>" >
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="profile-job-profile-button clearfix">
                                                   <div class="apply-btn">

                                                   <a href="<?php echo base_url('business_profile/business_profile_save/'.$business_profile_data[0]['business_profile_post_id'].''); ?>">Save</a>


                                                    <a href="<?php echo base_url('business_profile/business_profile_contactperson/'.$business_profile_data[0]['user_id']. ''); ?>">contact person</a>


                                                    <a href="<?php echo base_url('business_profile/business_profile_likepost/'.$business_profile_data[0]['business_profile_post_id']. ''); ?>">Like 
                                                    <?php 
                                                        if($business_profile_data[0]['business_likes_count'] > 0)
                                                        {
                                                             echo $business_profile_data[0]['business_likes_count'];
                                                        } ?>
                                                
                                                    </a>



                                                   <a href="<?php echo base_url('business_profile/business_profile_commentpost/'.$business_profile_data[0]['business_profile_post_id']. ''); ?>">Comment</a> 

                                                   <a href="<?php echo base_url('business_profile/business_profile_commentpost/'.$business_profile_data[0]['business_profile_post_id']. ''); ?>">view all comments</a>


                                                   
                                                    <!--  <a href="" class="button">Remove</a>
                                                        <a href="" class="button">Edit  </a> -->

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                        }
                    //}
                        ?>
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
    </section>
    <footer>

        <footer>
             <?php echo $footer;  ?>
        </footer>



</body>

</html>
