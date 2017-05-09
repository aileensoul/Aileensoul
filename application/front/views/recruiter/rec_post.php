

<!-- start head -->
<?php
//echo "<pre>"; print_r($recdata); die();
echo $head;
?>



<!--post save success pop up style strat -->
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

   
</style>

<!--post save success pop up style end -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>



<!-- END HEADER -->
<?php
$returnpage = $_GET['page'];
if ($returnpage == 'job') {
    echo $job_header2;
} else {
    echo $recruiter_header2;
}
?>

<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">
            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success  cancel-result" onclick="">Cancel</button>

                    <button class="btn btn-success set-btn upload-result " onclick="myFunction()">Upload Image</button>

                    <div id="message1" style="display:none;">
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
                <div class="col-md-12"  style="visibility: hidden; ">
                    <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:300px;margin-top:30px"></div>
                </div>
            </div>


            <div class="container">
                <div class="row" id="row2">
                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    if($this->uri->segment(3) == $userid){
                    $user_id = $userid;
                  }elseif($this->uri->segment(3) == ""){
                     $user_id = $userid;
                    }else{
                $user_id = $this->uri->segment(3);
                   }  
                    $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 're_status' => '1');
                    $image = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                  $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>

                        <div class="bg-images">
                            <img src="<?php echo base_url(RECBGIMAGE . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
                        <?php
                    } else {
                        ?>

                        <div class="bg-images">
                            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / ></div>
                    <?php }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container">    
    <div class="upload-img">
        <?php if ($returnpage == '') { ?>
            <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
                <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
            </label>
        <?php } ?>

    </div>
    <!--     </div>
    -->
    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic">
              <?php 
             
              if($recdata[0]['recruiter_user_image'] != '' ){ ?>
                           <img src="<?php echo base_url(USERIMAGE . $recdata[0]['recruiter_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>
                            <!-- <?php 
                             $userid = $this->session->userdata('aileenuser');
                            if($recdata[0]['user_id'] == $userid) {?>
    <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                        <?php }?> -->
               
                <?php if ($returnpage != ' ') { ?>
                    <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                <?php } ?>

            </div>

            <!-- <div id="popup-form">
            <?php //echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                <input type="hidden" name="hitext" id="hitext" value="3">
                <input type="submit" name="cancel3" id="cancel3" value="Cancel">
                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                </form>

            </div> -->


        </div>


        <!-- menubar --><div class="profile-main-rec-box-menu  col-md-12 ">

            <div class="left-side-menu col-md-2">  </div>
            <div class="right-side-menu col-md-8">
                <ul class="">



                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile') { ?> class="active" <?php } ?>>
                        <?php if ($returnpage == 'job') { ?>
                            <a title="Details" href="<?php echo base_url('recruiter/rec_profile/' . $this->uri->segment(3) . '?page=' . $returnpage); ?>">Details</a>
                        <?php } else { ?>
                            <a title="Details" href="<?php echo base_url('recruiter/rec_profile'); ?>">Details</a>
                        <?php } ?>
                    </li>




                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post') { ?> class="active" <?php } ?>>
                        <?php if ($returnpage == 'job') { ?>
                            <a title="Candidate Post" href="<?php echo base_url('recruiter/rec_post/' . $this->uri->segment(3) . '?page=' . $returnpage); ?>">Post</a>
                        <?php } else { ?>
                            <a title="Candidate Post" href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                        <?php } ?>
                    </li>


                    <?php if (($this->uri->segment(1) == 'recruiter') && ($this->uri->segment(2) == 'rec_post' || $this->uri->segment(2) == 'rec_profile' || $this->uri->segment(2) == 'add_post' || $this->uri->segment(2) == 'save_candidate') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>
                        <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate') { ?> class="active" <?php } ?>><a title="Saved Candidate" href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                        </li> 
                        <fa>
                            </li> 


                        <?php } ?>   
                </ul>
            </div>

            <div class="col-md-2">
                <div class="flw_msg_btn fr">
                   <ul>
                    <?php
                    if($this->uri->segment(3) != ""){ ?>
                       <li> <a href="<?php echo base_url('chat/abc/' . $this->uri->segment(3)); ?>">Message</a> </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>  
        <!-- menubar -->    
    </div>                       
    
    <div class="job-menu-profile1 col-md-3">
                         <a href="javascript:void(0);" title="<?php echo $postdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?>"><h5><?php echo $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?></h5></a>
        <!-- text head start -->
        <div class="profile-text" >

            <?php
            if ($returnpage == '') {
                if ($postdata[0]['designation'] == "") {
                    ?>
                                                    <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                    <a id="designation" class="designation" title="Designation">Designation</a>
                    <?php
                } else {
                    ?> 
                    <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                    <a id="designation" class="designation" title="<?php echo ucwords($postdata[0]['designation']); ?>"><?php echo ucwords($postdata[0]['designation']); ?></a>
                    <?php
                }
            } else {
                echo ucwords($postdata[0]['designation']);
            }
            ?>


            <!-- The Modal -->
            <!--   <div id="myModal" class="modal">
            <!-- <!-- Modal content --><!-- <div class="col-md-2"></div> -->
            <!--   <div class="modal-content col-md-8">
                  <span class="close">&times;</span>
                  <fieldset></fieldset> 
            <?php //echo form_open(base_url('recruiter/recruiter_designation/'), array('id' => 'recdesignation', 'name' => 'recdesignation', 'class' => 'clearfix'));   ?> -->

                   <!--  <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php //echo $recruiterdata[0]['designation'];    ?>"></fieldset>
                    <input type="hidden" name="hitext" id="hitext" value="2">
                    <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
            <?php //echo form_close();  ?>



                </div> -->

            <!--    <div class="col-md-2">

               </div>

           </div>  -->

        </div>
        <div  class="add-post-button">
<!--   <a href="" class="btn btn-2 btn-2i"><i class="fa fa-plus" aria-hidden="true"></i></a> -->
            <?php if ($returnpage == '') { ?>
                <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
            <?php } ?>
        </div>

        
        <!-- text head end -->
    </div>
    <div class="col-md-7 col-sm-7">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Post</h3>
                <div class="contact-frnd-post">
                    <?php
                    $returnpage = $_GET['page'];
                    if ($returnpage == 'job')
                    {
                    foreach ($postdata as $post) {
                        ?>
                        <div class="job-contact-frnd ">
                            <div class="profile-job-post-detail clearfix" id="<?php echo "removepost" . $post['post_id']; ?>">
                                <!-- vishang 14-4 end -->
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
       <div class="profile-job-details col-md-12">
          <ul>
              <li class="fr">
                  Created Date : <?php echo date('d-M-Y',strtotime($post['created_date'])); ?>
               </li>
     
              <li>
              <a class="post_title" href="#" title="Post Title">
               <?php echo $post['post_name'] ?> </a>     </li>
     
             <li>   
                 <div class="fr lction">
            <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;
            $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>
               <?php  
             if($cityname || $countryname)
               { 
                ?>
            <p><i class="fa fa-map-marker" aria-hidden="true">

                                                            <?php  echo $cityname .', '. $countryname; ?> 
                                                            </i></p>
                                                            
                                                            <?php
                                                             }

                                                             else{}?> 
                                                    </div>




                                                    <a class="display_inline" title="<?php echo $post['re_comp_name']?>" href="#">

      
                                                     <?php   $out = strlen($post['re_comp_name']) > 40 ? substr($post['re_comp_name'],0,40)."..." : $post['re_comp_name'];

                                                                 
                                                            echo $out;?> </a>
                                                </li>
                                                <li><a class="display_inline" title="Recruiter Name" href="#"> <?php echo $post['rec_firstname']; ?> </a></li>
                                                <!-- vishang 14-4 end -->    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
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


                                                                            echo $cache_time;
                                                                            $k++;
                                                                        }
                                                                        ?>     
                                                
                                                </span>
                                            </li>
                                            <li><b>Other Skill</b><span> <?php if($post['other_skill'] != ''){ echo $post['other_skill']; } else{ echo PROFILENA;} ?></span>
                                            </li>
                                            <li><b>Job Description</b><span><p><?php echo $post['post_description']; ?></p></span>
                                            </li>
                                            <li><b>Interview Process</b><span><?php echo $post['interview_process']; ?></span>
                                            </li>
                                            <!-- vishang 14-4 start -->
                                            <li>
                                                <b>Required Experience</b>
                                                <span title="Min - Max">
     <p>
     <?php 


  if(($post['min_year'] !='0' || $post['min_month'] !='0' || $post['max_month'] !='0' || $post['max_year'] !='0') && ($post['fresher'] == 1))
     { 
 echo $post['min_year'].'.'.$post['min_month'] . ' Year - '.$post['max_year'] .'.'.$post['max_month'] . ' Year'." , ". "Fresher can also apply.";
     } 
    else
    {
  echo $post['min_year'].'.'.$post['min_month'] . ' Year - '.$post['max_year'] .'.'.$post['max_month'] . ' Year';
         
    }

 ?> 
    
    </p>  
                                                </span>
                                            </li>
                <li><b>Salary</b><span title="Min - Max"><?php echo $post['min_sal']." - ".$post['max_sal']; ?></span>
                                            </li>

                                           <!--  <li><b>Maximum Salary</b><span><?php echo $post['max_sal']; ?></span>
                                            </li> -->

                                            <li><b>No of Position</b><span><?php echo $post['post_position']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="profile-job-profile-button clearfix">
                       <div class="profile-job-details col-md-12">
                                         <?php
                                        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

                                          $contition_array = array('post_id' => $post['post_id'], 'job_delete' => 0, 'user_id' => $userid);
                                          $jobsave = $this->data['jobsave'] = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                if ($jobsave) {
                                                     ?>

                                                 <a href="javascript:void(0);" class="button applied">Applied</a>
                                                 <?php
                                                 } else {
                                                 ?>
                                                 <li class="fr">
                                                 <a href="javascript:void(0);"  class= "<?php echo 'applypost' . $post['post_id']; ?>  button" onclick="applypopup(<?php echo $post['post_id'] ?>,<?php echo $post['user_id'] ?>)">Apply</a>

                                                    </li>
                                                 <li class="fr">
                                               <?php
                                                 $userid = $this->session->userdata('aileenuser');
                                                 $contition_array = array('user_id' => $userid, 'job_save' => '2', 'post_id ' => $post['post_id'], 'job_delete' => '0');
                                                $jobsave = $this->data['jobsave'] = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                if ($jobsave) {
                                             ?>
                                            <a class="button saved">Saved</a>
                                            <?php } else { ?>
                                            <a id="<?php echo $post['post_id']; ?>" onClick="savepopup(<?php echo $post['post_id']; ?>)" href="javascript:void(0);" class="<?php echo 'savedpost' . $post['post_id']; ?> button">Save</a>
                                            <?php } ?>
                                            </li>
                                         <?php
                                        }
                                     ?>       
 

                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                    {
                    foreach ($postdata as $post) {
                        ?>

                       
                    
                        <div class="job-contact-frnd ">
                            <div class="profile-job-post-detail clearfix" id="<?php echo "removepost" . $post['post_id']; ?>">
                                <!-- vishang 14-4 end -->
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
           <div class="profile-job-details col-md-12">
                  <ul>
                              <li class="fr">
             Created Date : <?php echo date('d-M-Y',strtotime($post['created_date'])); ?>
                  </li>
              
                  <li>
               <a class="post_title" href="#" title="Post Title">
                  <?php echo $post['post_name'] ?> </a>     </li>
                  
                    <li>   
                       <div class="fr lction">
                  <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;
                 $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>
                    <?php  
                  if($cityname || $countryname)
                       { 
                        ?>
                <p><i class="fa fa-map-marker" aria-hidden="true">

                  <?php  echo $cityname .', '. $countryname; ?> 
                  </i></p>
                                                            
                      <?php
                         }
                        else{}?> 
           </div>
                                                      <a class="display_inline" title="<?php echo $post['re_comp_name'];?>" href="#"> <?php 
                                                          $out = strlen($post['re_comp_name']) > 40? substr($post['re_comp_name'],0,40)."..." : $post['re_comp_name'];

                                                                 
                                                            echo $out;
                                                     ?> </a>
                                                </li>
                                                <li><a class="display_inline" title="Recruiter Name" href="#"> <?php echo $post['rec_firstname']; ?> </a></li>
                                                <!-- vishang 14-4 end -->    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
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


                                                                            echo $cache_time;
                                                                            $k++;
                                                                        }
                                                                        ?>     
                                                
                                                </span>
                                            </li>
                                            <li><b>Other Skill</b><span> <?php if($post['other_skill'] != ''){ echo $post['other_skill']; } else{ echo PROFILENA;} ?></span>
                                            </li>
                                            <li><b>Job Description</b><span><p><?php echo $post['post_description']; ?></p></span>
                                            </li>
                                            <li><b>Interview Process</b><span><?php echo $post['interview_process']; ?></span>
                                            </li>
                                            <!-- vishang 14-4 start -->
                                            <li>
                                                <b>Required Experience</b>
                                                <span>
                                                    <p><?php 




      if(($post['min_year'] !='0' || $post['min_month'] !='0' || $post['max_month'] !='0' || $post['max_year'] !='0') && ($post['fresher'] == 1))
     { 
        echo $post['min_year'].'.'.$post['min_month'] . ' Year - '.$post['max_year'] .'.'.$post['max_month'] . ' Year'." , ". "Fresher can also apply.";
     } 
    else
    {
  echo $post['min_year'].'.'.$post['min_month'] . ' Year - '.$post['max_year'] .'.'.$post['max_month'] . ' Year';
         
    }

 ?> 
    </p>  
                                                </span>
                                            </li>
         <li><b>Salary</b><span title="Min - Max" ><?php echo $post['min_sal']." - ".$post['max_sal']; ?></span>
                                            </li>
                                            

                                           <!--  <li><b>Maximum Salary</b><span><?php echo $post['max_sal']; ?></span>
                                            </li>
 -->
                                            <li><b>No of Position</b><span><?php echo $post['post_position']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details col-md-12">
                                            <ul><li class="job_all_post last_date">
                                                    Last Date :<?php if($post['post_last_date'] != "0000-00-00"){ echo date('d-M-Y',strtotime($post['post_last_date'])); }else{ echo PROFILENA;} ?></li>
                                                <li class="fr">
<!--                                                    <a class="button">Save</a>
                                                    <a  class="button ">Message</a>-->

<a href="<?php echo base_url('recruiter/edit_post/' . $post['post_id']); ?>" class="button">Edit</a>
<!-- <a href="#popup1" class="button">Remove </a> -->
 <a href="javascript:void(0);" class="button" onclick="removepopup(<?php echo $post['post_id'] ?>)">Remove</a>
                                                        <a href="<?php echo base_url('recruiter/view_apply_list/' . $post['post_id']); ?>" class="button">Applied  Candidate : <?php echo count($this->common->select_data_by_id('job_apply', 'post_id', $post['post_id'], $data = '*', $join_str = array())); ?></a>
                                                </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                    ?>


                </div>


            </div>





            <!DOCTYPE html>
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


                </head>
                <body>

                    <div class="user-midd-section">
                        <div class="container">
                            <div class="row">


                                <div class="col-md-4">



                                </div>


                                <!--- search end -->

                            </div>
                        </div>
                    </div>
                    </section>
                    <footer>

                        <?php echo $footer; ?>
                    </footer>
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
                    <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                                <div class="modal-body">
                                    <span class="mes">
                                        <div id="popup-form">
                                            <?php echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                            <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                            <input type="hidden" name="hitext" id="hitext" value="1">
                                            <!-- <input type="submit" name="cancel3" id="cancel2" value="Cancel"> -->
                                            <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                                            <?php echo form_close(); ?>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

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
                </body>

            </html>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --> 




            <!-- script for skill textbox automatic end (option 2)-->


            <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
            <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
            <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
            <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>







            <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
            <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">

            <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
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
            <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
            <script>
                    function removepopup(id) {
                        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show');
                    }
                    function updateprofilepopup(id) {
                        $('#bidmodal-2').modal('show');
                    }
            </script>

            <script type="text/javascript">
                function checkvalue() {
                    //alert("hi");
                    var searchkeyword = document.getElementById('tags').value;
                    var searchplace = document.getElementById('searchplace').value;
                    // alert(searchkeyword);
                    // alert(searchplace);
                    if (searchkeyword == "" && searchplace == "") {
                        // alert('Please enter Keyword');
                        return false;
                    }
                }
            </script>




            <script>
                //select2 autocomplete start for skill
                $('#searchskills').select2({

                    placeholder: 'Find Your Skills',

                    ajax: {

                        url: "<?php echo base_url(); ?>recruiter/keyskill",
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

                        url: "<?php echo base_url(); ?>recruiter/location",
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
            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function () {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

            <!-- cover image start -->
            <script>
                function myFunction() {
                    // alert("hhhjhj");
                    document.getElementById("upload-demo").style.visibility = "hidden";
                    document.getElementById("upload-demo-i").style.visibility = "hidden";
                    document.getElementById('message1').style.display = "block";


                    //setTimeout(function () { location.reload(1); }, 5000);

                }


                function showDiv() {
                    //alert(hi);
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
                    //  alert("hi");
                    $uploadCrop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function (resp) {

                        $.ajax({
                            url: "<?php echo base_url() ?>recruiter/ajaxpro",
                            type: "POST",
                            data: {"image": resp},
                            success: function (data) {
                                html = '<img src="' + resp + '" />';
                                if (html) {
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
                    //alert("hello");


                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });

                    }
                    reader.readAsDataURL(this.files[0]);



                });

                $('#upload').on('change', function () {

                    var fd = new FormData();
                    fd.append("image", $("#upload")[0].files[0]);

                    files = this.files;
                    size = files[0].size;



                    if (size > 4194304)
                    {
                        //show an alert to the user
                        alert("Allowed file size exceeded. (Max. 4 MB)")

                        document.getElementById('row1').style.display = "none";
                        document.getElementById('row2').style.display = "block";

                        return false;
                    }


                    $.ajax({

                        url: "<?php echo base_url(); ?>recruiter/image",
                        type: "POST",
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (response) {

                        }
                    });
                });

                //aarati code end
            </script>
            <!-- cover image end -->
            <!-- remove post start -->

            <script type="text/javascript">
                function remove_post(abc)
                {


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "recruiter/remove_post" ?>',
                        data: 'post_id=' + abc,
                        success: function (data) {

                            $('#' + 'removepost' + abc).html(data);
                            $('#' + 'removepost' + abc).parent().removeClass();
                            var numItems = $('.contact-frnd-post .job-contact-frnd').length;

                            if (numItems == '0') {
                                var nodataHtml = "<div class='text-center rio'><h4 class='page-heading  product-listing' style='border:0px;margin-bottom: 11px;'>No Job Post.</h4></div>";
                                $('.contact-frnd-post').html(nodataHtml);
                            }




                        }
                    });




                }
            </script>

            <!-- remove  post end -->
            <!-- <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
            <script>
                function removepopup(id) {
                    $('.biderror .mes').html("<div class='pop_content'>Are you sure want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id="+ id +" onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                    $('#bidmodal').modal('show');
                }
            </script> -->


            <script>
                function divClicked() {
                    var divHtml = $(this).html();
                    var editableText = $("<textarea/>");
                    editableText.val(divHtml);
                    $(this).replaceWith(editableText);
                    editableText.focus();
                    // setup the blur event for this new textarea
                    editableText.blur(editableTextBlurred);
                }

                function editableTextBlurred() {
                    var html = $(this).val();
                    var viewableText = $("<a>");
                    viewableText.html(html);
                    $(this).replaceWith(viewableText);
                    // setup the click event for this new div
                    viewableText.click(divClicked);

                    $.ajax({
                        url: "<?php echo base_url(); ?>recruiter/ajax_designation",
                        type: "POST",
                        data: {"designation": html},
                        success: function (response) {

                        }
                    });
                }

                $(document).ready(function () {
                    $("a.designation").click(divClicked);
                });
            </script>

            <script type="text/javascript">
                    function save_post(abc)
                    {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "job/job_save" ?>',
                            data: 'post_id=' + abc,
                            success: function (data) {
                                $('.' + 'savedpost' + abc).html(data).addClass('saved');
                            }
                        });

                    }
                </script>

                <!-- save post end -->

                <!-- apply post start -->

                <script type="text/javascript">
                    function apply_post(abc, xyz) {
                        //var alldata = document.getElementById("allpost" + abc);
                        var alldata = 'all';
                        //var user = document.getElementById("userid" + abc);
                        var user = xyz;

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "job/job_apply_post" ?>',
//                            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
                            data: 'post_id=' + abc + '&allpost=' + alldata + '&userid=' + user,
                            success: function (data) {
                                $('.savedpost' + abc).hide();
                                $('.applypost' + abc).html(data);
                                $('.applypost' + abc).attr('disabled', 'disabled');
                                $('.applypost' + abc).attr('onclick', 'myFunction()');
                                $('.applypost' + abc).addClass('applied');
                            }
                        });
                    }
                </script>


 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                <script>
                    function savepopup(id) {
                        save_post(id);
//                        $('.biderror .mes').html("<div class='pop_content'>Your Post is Successfully Saved.<div class='model_ok_cancel'><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal' style='right:235px !important;'>Ok</a></div></div>");
                        $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
                        $('#bidmodal').modal('show');
                    }
                    function applypopup(postid, userid) {
                        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to apply this post?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + userid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show');
                    }
                </script>