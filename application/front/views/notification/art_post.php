<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->

   <!DOCTYPE html>
<html>

<body>



        
        
      

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
// foreach($artdata as $row)
// {

  $userid = $this->session->userdata('aileenuser');
       $contition_array = array('user_id'=> $userid,'post_id' => $row['art_post_id'],'is_delete' =>0);

$userdata =  $this->common->select_data_by_condition('art_post_save', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 
//echo "<pre>";print_r($jobdata);die();
                            
if($userdata[0]['post_save'] != 1)
{ 

?>
                                        <div class="profile-job-post-detail clearfix">
                                            <div class="profile-job-post-title-inside clearfix">

                                            
                                                <div class="profile-job-post-location-name">
                                                    <ul>
                                                      <li><a href="<?php echo base_url('artistic/artistic_profile/'.$artdata[0]['user_id']); ?>"><?php print $artdata[0]['first_name']; print "&nbsp;&nbsp;"; print $artdata[0]['last_name']; ?></a></li>
                                                      <li><!-- <a href="#"> --><?php print $artdata[0]['art_post'];?> <!-- </a> --></li>
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
                                                            <li>
                                                            <?php print $artdata[0]['created_date']; ?>
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
                                                        <li> <b> Skills:</b> <span>
                                                           <?php
                                                        $comma = ",";
                                                        $k=0;
                                                        $aud=$artdata[0]['art_category'];
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
                                                         </span>
                                                        </li>
                                                       
                                                        <li> <b>Job Description:</b><span> <?php print $artdata[0]['art_description']; ?>  </span>
                                                        </li>
                                                        <!-- <li><b>   50,000 - 3,00,000 P.A </b> <span></span> </li> -->

                                                    </ul>
                                                </div>
                                                
                                               
                                                <div class="profile-job-profile-button clearfix">
                                                    <div>
                                                     <!-- <a href="" class="button">Remove</a>
                                                        <a href="" class="button">Edit  </a> -->

                                   
                                    
                                    <a href="<?php echo base_url('artistic/artistic_commentpost/'.$artdata[0]['art_post_id'].''); ?>">   <div class="button">    view all comment </div></a>
                                     
                                     <!-- <a href="<?php //echo base_url('artistic/artistic_commentpost/'.$row['art_post_id'].''); ?>">   <div class="button">    Comment </div></a>  -->
                                       
                                    <a href="<?php echo base_url('artistic/art_likepost/'.$artdata[0]['art_post_id'].''); ?>"> <div class="button"> Like  <?php  print $artdata[0]['art_likes_count'];?> </div></a> 
                                    <!-- <span id="Likes"><?php echo $numlikes; ?></span> -->
                                   
                                  
                                     
                                      <a href="<?php echo base_url('artistic/artistic_contactperson/'.$artdata[0]['user_id'].''); ?>"> <div class="button"> contact person</div></a>

                                        <a href="<?php echo base_url('artistic/artistic_save/'.$artdata[0]['art_post_id'].''); ?>"> <div class="button"> Save</div></a>


                                                    </div>

                                                    
                                                </div>
                                                 <div class="profile-job-post-title-inside clearfix">

                                            
                                                <div class="profile-job-post-location-name">
                                                    <?php echo form_open(base_url('artistic/artistic_commentpost_insert/'.$artdata[0]['art_post_id']), array('id' => 'comment','name' => 'comment','class' => 'clearfix')); ?>

           
                                              <div class="input-group">
                                                <input type="text" name="post_comment"  id="post_comment" placeholder="Type Message ..." class="form-control">
                                                 <?php echo form_error('post_comment'); ?>
                                                    <span class="input-group-btn">
                                                    <input type="submit"  id="submitartisticpost" name="submitartisticpost" value="Comment" class="btn btn-flat">
                                                <!--<button type="submit" class="btn btn-flat">Comment</button> -->
                                                    </span>
                                              </div>
                                              </form>
                                                </div>
                                            </div>
                                            </div>


                                        </div>

                                        <?php
                                        //}
                                      }
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
    <?php echo $footer;  ?>
    </footer>
</body>

</html>

<!-- script for skill textbox automatic start (option 2)-->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
 
<!-- script for skill textbox automatic end (option 2)-->

