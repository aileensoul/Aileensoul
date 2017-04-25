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
                        <div class="left-side-bar">
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
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8">


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
                    <input action="action" type="button" value="Back" class="back-btn" onclick="history.back();" /> <br/>
                    <?php 
foreach($applydata as $user){ 

    $contition_array = array('user_id' => $user['user_id'],  'is_delete' => 0);
      $usta =  $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                      ?>
                  <div class="freelancer_apply_list">
                     <ul>
                        <li>
                          <label>Name:</label> <?php echo $usta[0]['freelancer_post_fullname']?>
                        </li>
                        <li>
                          <label>Skill:</label>
                           <?php
                                                        $comma = ",";
                                                        $k=0;
                                                        $aud=$usta[0]['freelancer_post_area']; 
                                                        $aud_res=explode(',',$aud);
                                                        foreach ($aud_res as $skill)
                                                        {
                                                            if($k!=0)
                                                            {
                                                               echo $comma;
                                                            }
                                                            $cache_time  =  $this->db->get_where('skill',array('skill_id' => $skill))->row()->skill;  
                                                             //$skill1[]= $cache_time;

                                                            echo  $cache_time;
                                                           $k++;
                                                        }
                                                        ?>       
                         
                        </li>
                       

                        <li>
                          <label>City:</label><?php echo  $this->db->get_where('cities',array('city_id' => $usta[0]['freelancer_post_city']))->row()->city_name;  ?>
                        </li>
                       </ul>
                        <?php if($user['status'] == 1){ ?>
                          <a href="<?php echo base_url('freelancer/invite_user/'  . $user['app_id'] . '/0/'. $user['post_id'].'/'.$user['user_id'] ); ?>"><button type="submit" value="Submit">Invite</button></a> <br>
                        <?php }else{ ?>
                          <a href=""><button type="submit" value="Submit">Invited</button></a> <br>
                        <?php } ?> 
                  </div>
              <?php } ?> 
                      <!--- middle section end -->
                       
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <?php echo $footer; ?>
    <!-- end footer -->
 

