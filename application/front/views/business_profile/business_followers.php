<!--start head -->
<?php  echo $head; ?>

<style type="text/css">
    #popup-form img{display: none;}
</style>


<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<?php echo $business_header2; ?>
 
  
    <!-- END HEADER -->
   
  <body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">
      <div class="row" id="row1" style="display:none;">
        <div class="col-md-12 text-center">
        <div id="upload-demo" ></div>
        </div>
        <div class="col-md-12 cover-pic" >
            <button class="btn btn-success cancel-result" onclick="" >Cancel</button>
    
        <button class="btn btn-success upload-result fr" onclick="myFunction()">Save</button>

        <div id="message1" style="display:none;">
           <div class="">
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
        </div>
        <div class="col-md-12"  style="visibility: hidden; ">
        <div id="upload-demo-i" ></div>
        </div>
      </div>

<div class="container">
  <div class="row" id="row2">
        <?php
        $userid  = $this->session->userdata('aileenuser');
        if($this->uri->segment(3) == $userid){
                    $user_id = $userid;
                    }elseif($this->uri->segment(3) == ""){
                    $user_id = $userid;
                    }else{
                    $user_id = $this->db->get_where('business_profile',array('business_slug' => $this->uri->segment(3)))->row()->user_id;
                     }
            $contition_array = array( 'user_id' => $user_id, 'is_deleted' => '0' , 'status' => '1');
            $image = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          
            $image_ori=$image[0]['profile_background'];
          if($image_ori)
           {
            ?>
           
            <img src="<?php echo base_url($this->config->item('bus_bg_main_upload_path') . $businessdata1[0]['profile_background']);?>" name="image_src" id="image_src" / >
            <?php
           }
           else
           { ?>
          <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / >
      <?php     }
          
            ?>

    </div>
    </div>
</div>
  </div>
  </div>   

    <div class="container">   

    <?php
    $userid = $this->session->userdata('aileenuser');
    if($businessdata1[0]['user_id'] == $userid) {
    ?>  
      <div class="upload-img">
      
        
        <label class="cameraButton"> <span class="tooltiptext">Upload Cover Photo</span> <i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
     </div>
         <?php }?>  
            <div class="profile-photo">
            <div class="buisness-menu">
              <div class="profile-pho-bui">

                <div class="user-pic">
                        <?php if($businessdata1[0]['business_user_image'] != ''){ ?>
                           <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $businessdata1[0]['business_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt=""  src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>


                             <?php
    $userid = $this->session->userdata('aileenuser');
    if($businessdata1[0]['user_id'] == $userid) {
    ?>

                           <!--  <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a> -->

                           <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>

                            <?php }?>


                        </div>
                        
                       <!--  <div id="popup-form">
                        <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="7">
                        <input type="submit" name="cancel7" id="cancel7" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                     <?php  echo form_close( );?>
                </div> -->

                </div>
                <div class="bui-menu-profile col-md-10">

                  

                    <h4 class="profile-head-text"><a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$businessdata1[0]['business_slug'].''); ?>"> <?php echo ucwords($businessdata1[0]['company_name']); ?></a></h4>

                    <h4 class="profile-head-text_dg"><a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$businessdata1[0]['business_slug'].''); ?>"> 


                   <?php
                   if($businessdata1[0]['industriyal']){ 
                   echo  
                    $this->db->get_where('industry_type',array('industry_id' => $businessdata1[0]['industriyal']))->row()->industry_name;
                  }
                    if($businessdata1[0]['other_industrial']){
                      echo ucwords($businessdata1[0]['other_industrial']);
                    } 

                     ?>

                      
                    </a></h4>


                    <?php 
                    $userid  = $this->session->userdata('aileenuser'); 
                    if($businessdata1[0]['user_id'] != $userid){
                      ?>
                 <!--   <div class="msg_flw_btn_2">
            <div  class="fr msg_flw_btn">

            <div class="<?php echo "fr" . $businessdata1[0]['business_profile_id']; ?>">

    <?php

     $userid = $this->session->userdata('aileenuser');

      $contition_array = array('user_id' => $userid, 'status' => '1');

    $bup_id = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

     $status  =  $this->db->get_where('follow',array('follow_type' => 2, 'follow_from' => $bup_id[0]['business_profile_id'], 'follow_to'=>$businessdata1[0]['business_profile_id'] ))->row()->follow_status; 
    //echo "<pre>"; print_r($status); die();

if($status == 0 || $status == " "){?>
  <div class="msg_flw_btn_1" id= "followdiv">
      <button  id="<?php echo "follow" . $businessdata1[0]['business_profile_id']; ?>" onClick="followuser(<?php echo $businessdata1[0]['business_profile_id']; ?>)">Follow</button>
    </div>
 <?php }elseif($status == 1){ ?>
    <div class="msg_flw_btn_1" id= "unfollowdiv">
      <button  id="<?php echo "unfollow" . $businessdata1[0]['business_profile_id']; ?>" onClick="unfollowuser(<?php echo $businessdata1[0]['business_profile_id']; ?>)">Following </button>
    </div>
<?php }?>
     </div> 
     <a href="<?php echo base_url('chat/abc/'.$businessdata1[0]['user_id']); ?>">Message</a>
   </div>

   


                </div> -->
                <?php }?>


                                <?php
                        $userid = $this->session->userdata('aileenuser');
                        if ($businessdata1[0]['user_id'] != $userid) {
                            ?> 
                    <div id="contact_per">

      <?php 

      $userid = $this->session->userdata('aileenuser');

      $busotherid = $this->uri->segment(3); 
      $contition_array = array('business_slug' => $busotherid, 'status' => '1');
      $busineslug = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
      $busuid = $busineslug[0]['user_id'];
   
     $contition_array = array('contact_type' => 2);

     $search_condition = "((contact_to_id = '$busuid' AND contact_from_id = ' $userid') OR (contact_from_id = '$busuid' AND contact_to_id = '$userid'))";

    $contactperson = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');

            ?>


             <?php if($contactperson[0]['status'] == 'cancel' || $contactperson[0]['status'] == ''){?>
                  <a href="#" onclick="return contact_person(<?php echo $businessdata1[0]['user_id']; ?>);" style="cursor: pointer;">

            <?php }elseif($contactperson[0]['status'] == 'pending' || $contactperson[0]['status'] == 'confirm'){ ?>   
                      <a onclick="return contact_person_model(<?php echo $businessdata1[0]['user_id']; ?>,<?php echo "'" . $contactperson[0]['status'] . "'"; ?>)" style="cursor: pointer;">
            <?php }?>
               
                    <div class="">
                        <div id="ripple" class="centered" >
                            <div class="circle"><span href="" class="add_r_c"><i class="fa fa-user-plus"  aria-hidden="true"></i></span></div>


                        </div>
                        <div class="addtocont" style="    position: absolute;
                             display: block;
                             /* margin-left: 69.4%; */
                             /* margin-top: 0%; */
                             right: 7%;
                             top: 62px;">
                            <span style="    
                                  font-size: 13px; ""><i class="icon-user"></i>
            <?php 

        //print_r($contactperson[0]['status']) ; die();
        
                     if($contactperson[0]['status'] == 'cancel'){?>
                                Add to contact
                     <?php }elseif($contactperson[0]['status'] == 'pending'){ ?>   
                            Cancel request  
                     <?php }elseif($contactperson[0]['status'] == 'confirm'){ ?>
                        In your contact
                   <?php  }else{ ?>

                      Add to contact
                   <?php } ?>
                            </span>
                        </div>
                    </div>
                </a>
                    </div>

                    <?php }?>
                    
              </div>
                <!-- PICKUP -->
                  <div class="business-data-menu  col-md-12 padding_less_right">

<div class="left-side-menu col-md-2">   </div>
        
       <div class="profile-main-box-buis-menu  col-md-7">  
 <ul class="">
 
 <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_manage_post'){?> class="active" <?php } ?>><a title="Dashboard" href="<?php echo base_url('business_profile/business_profile_manage_post/'.$businessdata1[0]['business_slug']); ?>">Dashboard</a>
                                    </li>

                                     <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_resume'){?> class="active" <?php } ?>><a title="Details" href="<?php echo base_url('business_profile/business_resume/'.$businessdata1[0]['business_slug']); ?>"> Details</a>
                                    </li>
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'bus_contact'){?> class="active" <?php } ?>><a title="Details" href="<?php echo base_url('business_profile/bus_contact/'.$businessdata1[0]['business_slug']); ?>">Contacts</a>
                                    </li>
                              
     <?php
    $userid = $this->session->userdata('aileenuser');
    if($businessdata1[0]['user_id'] == $userid) {
    ?> 

                              <!-- <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_save_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_save_post'); ?>">Saved Post</a>
                                    </li> -->

                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a title="Userlist" href="<?php echo base_url('business_profile/userlist/'.$businessdata1[0]['business_slug']); ?>">Userlist</a>
                                    </li>


                         <?php }?>

                         <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?> 


                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a title="Followers" href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers <br> (<?php echo (count($businessfollowerdata)); ?>)</a>
                                    </li>
                                    

                          <?php }else{

            $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_to' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                            ?> 
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a title="Followers" href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers  <br> (<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>

                          <?php }?>

                          <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?>          
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a title="Following" href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following  <br>  (<?php echo (count($businessfollowingdata)); ?>)</a>
                                    </li>
                                    <?php }else{
      $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_from' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        ?>
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a title="Following" href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following   <br>(<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>
                                    <?php }?>


                                </ul>

</div>


     <?php 
       $userid = $this->session->userdata('aileenuser');

        if($businessdata1[0]['user_id'] != $userid){?>
      <div class="col-md-3 padding_les flw_with">
                        <div class="flw_msg_btn fr top_follow">
                            <ul>

                                <li class="<?php echo "fruser" . $artisticdata[0]['art_id']; ?>">
   <div class="<?php echo "fr" . $businessdata1[0]['business_profile_id']; ?>">

    <?php

     $userid = $this->session->userdata('aileenuser');

      $contition_array = array('user_id' => $userid, 'status' => '1');

    $bup_id = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

     $status  =  $this->db->get_where('follow',array('follow_type' => 2, 'follow_from' => $bup_id[0]['business_profile_id'], 'follow_to'=>$businessdata1[0]['business_profile_id'] ))->row()->follow_status; 
    //echo "<pre>"; print_r($status); die();

$logslug = $this->db->get_where('business_profile', array('user_id' => $userid))->row()->business_slug;
                                   if($logslug != $this->uri->segment(3)){
                                    if ($status == 0 || $status == " ") {
                                        ?>
                                        <div class="msg_flw_btn_1" id= "followdiv">
                                            <button  id="<?php echo "follow" . $businessdata1[0]['business_profile_id']; ?>" onClick="followuser(<?php echo $businessdata1[0]['business_profile_id']; ?>)">Follow</button>
                                        </div>
                                    <?php } elseif ($status == 1) { ?>
                                        <div class="msg_flw_btn_1" id= "unfollowdiv">
                                            <button class="bg_following" id="<?php echo "unfollow" . $businessdata1[0]['business_profile_id']; ?>" onClick="unfollowuser(<?php echo $businessdata1[0]['business_profile_id']; ?>)">Following </button>
                                        </div>
                                    <?php } ?>
                                </div>         


                            </li>

                            <li>
                                <a  href="<?php echo base_url('chat/abc/' . $businessdata1[0]['user_id']); ?>">Message</a></li>
                                   <?php } ?>


                            </ul>
                        </div>
                    </div>
                    <?php }?>
</div>

              <!-- pickup -->
            </div>
            </div>
        </div>
       </div>
        
  
  </div>

        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                   
                    <div class="col-md-3">
    <!-- <div  class="add-post-button">
    
        <a class="btn btn-3 btn-3b" href="<?php echo base_url('business_profile/business_profile_addpost'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
  </div> -->
  <!-- <div  class="add-post-button">
    
      
        <a class="btn btn-3 btn-3b"href="<?php echo base_url('recruiter'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Recruiter</a>
  </div> -->
  </div>

                    
                        <div class="col-md-8 col-sm-8">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3> Followers</h3>
                                 <div class="contact-frnd-post">

                                 <?php if(count($userlist) > 0){ ?>
                              
                        <?php foreach ($userlist as $user) { ?>
                                  <div class="job-contact-frnd ">

                                        <div class="profile-job-post-detail clearfix">
                                            <div class="profile-job-post-title-inside clearfix">
                                                <div class="profile-job-post-location-name">
                                                    <div class="user_lst"><ul>

                            <li class="fl">
                            <div class="follow-img">

                            <?php 
                 $followerimage =  $this->db->get_where('business_profile',array('business_profile_id' => $user['follow_from']))->row()->business_user_image;

                 $followername =  $this->db->get_where('business_profile',array('business_profile_id' => $user['follow_from']))->row()->company_name;

                 $followerslug =  $this->db->get_where('business_profile',array('business_profile_id' => $user['follow_from']))->row()->business_slug;

                 ?>
                                <?php if($followerimage != ''){ ?>
                                <a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$followerslug); ?>">
                           <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $followerimage);?>" height="50px" width="50px" alt="" >
                           </a>
                            <?php } else { ?>
                            <a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$followerslug); ?>">
                            <img alt="" src="<?php echo base_url(NOIMAGE); ?>" alt="" /></a>
                            <?php } ?> 
                            </div>
                            </li>
                            <li style="width: 67%">
                             <div class="">
                         <div class="follow-li-text " style="padding: 0;">
                                <a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$followerslug); ?>"><?php echo ucwords($followername);?></a></div>


                                <!-- category start -->
                                <div>

                                <?php 

                                $categoryid =  $this->db->get_where('business_profile',array('business_profile_id' => $user['follow_from'], 'status' => 1))->row()->industriyal;

                                 $category =  $this->db->get_where('industry_type',array('industry_id' =>  $categoryid, 'status' => 1))->row()->industry_name; 

                                  $othercategory =  $this->db->get_where('business_profile',array('business_profile_id' => $user['follow_from'], 'status' => 1))->row()->other_industrial;


                                  ?>
         
         
                               <a><?php 
                               if($category){
                                  echo $category; 
                               }else{

                               echo  $othercategory; 
                                }
                               ?></a>
     
                                </div>

                               <!--  category end -->
                            </li>
                            
                            <li class="fr" id ="<?php echo "frfollow" . $user['follow_from']; ?>">

                              <?php
                 
             $contition_array = array('user_id' => $userid, 'status' =>'1');
             $busdatauser =  $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                  //echo $artisticdatauser[0]['art_id']; die();
              $contition_array = array('follow_from' =>$busdatauser[0]['business_profile_id'], 'follow_status' => 1,'follow_type' => 2, 'follow_to' => $user['follow_from']);


             $status_list =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str, $groupby = '');

       
        if(($status_list[0]['follow_status'] == 0 || $status_list[0]['follow_status'] == ' '  ) && $user['follow_from'] != $busdatauser[0]['business_profile_id']){ ?>

                            
                            <div class="user_btn follow_btn_<?php echo $user['follow_from']; ?>" id= "followdiv">
                        <button id="<?php echo "follow" . $user['follow_from']; ?>" onClick="followuser_two(<?php echo $user['follow_from']; ?>)">Follow</button>
                           </div> 

       <?php }else if($user['follow_from'] == $busdatauser[0]['business_profile_id']){ ?>

    <?php }else{ ?>

                     <div class="user_btn_f follow_btn_<?php echo $user['follow_from']; ?>" id= "unfollowdiv">
                            <button class="bg_following" id="<?php echo "unfollow" . $user['follow_from']; ?>" onClick="unfollowuser_two(<?php echo $user['follow_from']; ?>)"><span>Following</span></button>
                           </div>   

     <?php }?>
                             </li>

                            </ul>
                            </div>
                            </div>
                            </div>
                            
                           
                         </div>
                                                        <?php } ?>
                                  </div>


                                  <?php }else{?>

                            <div class="text-center rio">
                            <h4 class="page-heading  product-listing">No Followers Found.</h4>
                           </div>

                                   <?php }?>
                                 
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
    </section>
    <footer>
 <?php echo $footer;  ?>
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
<!-- Bid-modal-2  -->
                        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                            <div class="modal-dialog modal-lm">
                                <div class="modal-content">
                                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                                    <div class="modal-body">
                                        <span class="mes">
                                            <div id="popup-form">
                                                <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                                <input type="hidden" name="hitext" id="hitext" value="7">
 <div class="popup_previred">
                                                <img id="preview" src="#" alt="your image"/>
                                              </div>
                                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
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

 
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>

 <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>

 

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<!-- script for skill textbox automatic end (option 2)-->

<!-- script for business autofill -->
<script>

var data= <?php echo json_encode($demo); ?>;
// alert(data);

        
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

var data1= <?php echo json_encode($city_data); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#searchplace" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data1, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#searchplace").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#searchplace").val(ui.item.label);
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
  <!-- end of business search auto fill -->

<script>
                            function updateprofilepopup(id) {
                                $('#bidmodal-2').modal('show');
                            }
                        </script>
<script>

//select2 autocomplete start for Location
$('#searchplace').select2({
        
        placeholder: 'Find Your Location',
        maximumSelectionLength: 1,
        ajax:{

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
//select2 autocomplete End for Location

</script>

<!-- cover image start -->
<script>
function myFunction() {
   document.getElementById("upload-demo").style.visibility = "hidden";
   document.getElementById("upload-demo-i").style.visibility = "hidden";
   document.getElementById('message1').style.display = "block";

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
      url: "<?php echo base_url() ?>business_profile/ajaxpro",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
        html = '<img src="' + resp + '" />';
         if(html)
{
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
  
  
  
  var reader = new FileReader();
  
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);

    

});

$('#upload').on('change', function () { 
  
  var fd = new FormData();
 fd.append( "image", $("#upload")[0].files[0]);

 files = this.files;
     size = files[0].size;

   // pallavi code start for file type support
if (!files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
    //alert('not an image');
    picpopup();

    document.getElementById('row1').style.display = "none";
    document.getElementById('row2').style.display = "block";
    return false;
  }
  // file type code end
    

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

        url: "<?php echo base_url(); ?>business_profile/imagedata",
        type: "POST",
        data: fd,
        processData: false,
        contentType: false,
        success:function(response){
          

        }
      });
  });

//aarati code end
</script>
<!-- cover image end -->

<!-- follow user script start -->

<script type="text/javascript">
function followuser(clicked_id)
{
  
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/follow" ?>',
                 data:'follow_to='+clicked_id,
                success:function(data){ 

               $('.' + 'fr' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<!-- follow user script end -->


<!-- Unfollow user script start -->

<script type="text/javascript">
function unfollowuser(clicked_id)
{
  
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/unfollow" ?>',
                 data:'follow_to='+clicked_id,
                success:function(data){ 

               $('.' + 'fr' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<!-- Unfollow user script end -->


<!-- follow user script start -->

<script type="text/javascript">
function followuser_two(clicked_id)
{ 
  //alert(clicked_id);
  // return false;
  
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/follow_two" ?>',
                 data:'follow_to='+clicked_id,
                success:function(data){ 
                  //alert(data);
                  // return false;
               //$('.' + 'fruser_list' + clicked_id).html(data);

               // $('.' + 'follow_btn_' + clicked_id).html(data);
               // $('.' + 'follow_btn_' + clicked_id).removeClass('user_btn');
               // $('.' + 'follow_btn_' + clicked_id).addClass('user_btn_h');
               // $('#unfollow' + clicked_id).html('');
               $('#' + 'frfollow' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<!--follow like script end -->


<!-- Unfollow user script start -->

<script type="text/javascript">
    function unfollowuser_two(clicked_id)
    { 
      //alert(clicked_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "business_profile/unfollow_two" ?>',
            data: 'follow_to=' + clicked_id,
            success: function (data) { 
               //  $('.' + 'follow_btn_' + clicked_id).html(data);

               //  $('.' + 'follow_btn_' + clicked_id).removeClass('user_btn_h');
               //  $('.' + 'follow_btn_' + clicked_id).removeClass('user_btn_f');
               // $('.' + 'follow_btn_' + clicked_id).addClass('user_btn_i');
               //$('#unfollow' + clicked_id).html('');

               $('#' + 'frfollow' + clicked_id).html(data);
            }
        });
    }
</script>

<!--follow like script end -->

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
        profile = this.files;
                   //alert(profile);
                      if (!profile[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
                       //alert('not an image');
                  $('#profilepic').val('');
                   picpopup();
                     return false;
                   }else{
                      readURL(this);}
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
   <script>
                        function picpopup() {
                            
                      
            $('.biderror .mes').html("<div class='pop_content'>Image Type is not Supported");
            $('#bidmodal').modal('show');
                        }
                    </script>


<script type="text/javascript">
     

     
    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal-2').modal('hide');
    }
});  

 </script>  


 <!-- contact person script start -->
            <script type="text/javascript">
                

                 function contact_person(clicked_id) { 
                     $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/contact_person" ?>',
                        data: 'toid=' + clicked_id,
                        success: function (data) {
                          //   alert(data);
                            $('#contact_per').html(data);

                        }
                    });
    }
            </script>

<!-- contact person script end -->

<!-- scroll page script start -->
<script type="text/javascript">
//For Scroll page at perticular position js Start
$(document).ready(function(){
 
//  $(document).load().scrollTop(1000);
     
    $('html,body').animate({scrollTop:330}, 100);

});
//For Scroll page at perticular position js End
</script>

<!-- scroll page script end -->



<script type="text/javascript">
    

    function contact_person_model(clicked_id , status){

    if(status == 'pending'){

    $('.biderror .mes').html("<div class='pop_content'> Do you want to cancel  contact request?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='contact_person(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');

    }else if(status == 'confirm'){

    $('.biderror .mes').html("<div class='pop_content'> Do you want to remove this user from your contact list?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='contact_person(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');
    
   }

  }
</script>



