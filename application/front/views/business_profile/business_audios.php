<!-- start head -->
<?php  echo $head; ?>


<!--post save success pop up style strat -->
<style>
body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
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


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.jMosaic.css'); ?>">
  
<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/croppie.css'); ?>">
 --><style type="text/css" media="screen">
#row2 { overflow: hidden; width: 100%; }
#row2 img { height: 350px;width: 100%; } 
.upload-img { float: right;
    position: relative; margin-top: -135px; right: 50px; }

   label.cameraButton {
  display: inline-block;
  margin: 1em 0;
cursor: pointer;
  /* Styles to make it look like a button */
  padding: 0.5em;
  border: 2px solid #666;
  border-color: #EEE #CCC #CCC #EEE;
  background-color: #DDD;
  opacity: 0.7;
}

/* Look like a clicked/depressed button */
label.cameraButton:active {
  border-color: #CCC #EEE #EEE #CCC;
}

/* This is the part that actually hides the 'Choose file' text box for camera inputs */
label.cameraButton input[accept*="camera"] {
  display: none;
}
</style>
    <!-- END HEAD -->

    <!-- start header -->
<?php echo $header; ?>

 <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->


 <!-- script for cropiee immage End-->
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  
    <!-- END HEADER -->
   
<?php echo $business_header2?>
   

  <body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container">
            <!--- select thaya pachhi ave ae -->
      <div class="row" id="row1" style="display:none;">
        <div class="col-md-12 text-center">
        <div id="upload-demo" style="width:100%"></div>
        </div>
        <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
            <button class="btn btn-success  cancel-result">Cancel</button>
    
        <button class="btn btn-success upload-result" onclick="myFunction()">Upload Image</button>

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
        <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:1px;margin-top:30px"></div>
        </div>
      </div>

      <!--- select thaya pachhi ave ae end-->
  
<!--- select thai ne ave ae pelaj -->
<div class="container">
  <div class="row" id="row2">
        <?php
        $userid  = $this->session->userdata('aileenuser');
            $contition_array = array( 'user_id' => $userid, 'is_deleted' => '0' , 'status' => '1');
            $image = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
           
            $image_ori=$image[0]['profile_background'];
           if($image_ori)
           {
            ?>
            <div class="bg-images">
            <img src="<?php echo base_url(BUSBGIMG . $businessdata1[0]['profile_background']);?>" name="image_src" id="image_src" / ></div>
            <?php
           }
           else
           { ?>
         <div class="bg-images">
            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / ></div>
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
      
        
        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>


<!--- select thai ne ave ae pelaj puru -->
                
            </div>
           <?php }?>
            <div class="profile-photo">
            <div class="buisness-menu">
              <div class="profile-pho-bui">

                <div class="user-pic">
                        <?php if($businessdata1[0]['business_user_image'] != ''){ ?>
                           <img src="<?php echo base_url(USERIMAGE . $businessdata1[0]['business_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>

                            <?php
    $userid = $this->session->userdata('aileenuser');
    if($businessdata1[0]['user_id'] == $userid) {
    ?>
                            <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>

                        <?php }?>

                        </div>
                        
<!--                        <div id="popup-form">
                        <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="5">
                        <input type="submit" name="cancel5" id="cancel5" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                     <?php  echo form_close( );?>
                </div>-->

                </div>

                <div class="bui-menu-profile col-md-10">

                  

                    <h4 class="profile-head-text"><a href="<?php echo base_url('business_profile/business_resume/'.$businessdata1[0]['business_slug'].''); ?>"> <?php echo ucwords($businessdata[0]['company_name']); ?></a></h4>


                    <h4 class="profile-head-text"><a href="<?php echo base_url('business_profile/business_resume/'.$businessdata1[0]['business_slug'].''); ?>"> 


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

                   
              </div>
                <!-- PICKUP -->
                                   <!-- menubar --><div class="buisness-data-menu  col-md-12 ">

<div class="left-side-menu col-md-2">   </div>
        
       <div class="profile-main-box-buis-menu  col-md-9">  
 <ul class="">
 
                                     <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_manage_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$businessdata1[0]['business_slug']); ?>">Dashboard</a>
                                    </li>

                                     <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_resume'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_resume/'.$businessdata1[0]['business_slug']); ?>"> Details</a>
                                    </li>
                              
     <?php
    $userid = $this->session->userdata('aileenuser');
    if($businessdata1[0]['user_id'] == $userid) {
    ?> 
                               <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/userlist'); ?>">Userlist</a>
                                    </li>


                         <?php }?>

                         <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?> 


                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers<br>  (<?php echo (count($businessfollowerdata)); ?>)</a>
                                    </li>
                                    

                          <?php }else{

            $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_to' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                            ?> 
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers <br> (<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>

                          <?php }?>

                          <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?>          
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following  <br>(<?php echo (count($businessfollowingdata)); ?>)</a>
                                    </li>
                                    <?php }else{
      $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_from' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        ?>
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following <br> (<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>
                                    <?php }?>
                                    

                                 
                                </ul>

</div>

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
                 
                    
   </div>
                     


</div>

               </div>
<div class="user-midd-section">
            <div class="container ">
                <div class="row">


      <div  class="col-sm-10 border_tag padding_low_data" style="margin: 16px;">
      
        <div class="col-xs-3 padding_low_data"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
            <li > <a href="<?php echo base_url('business_profile/business_photos/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-camera" aria-hidden="true"></i>   Photos</a></li>
            <li>       <a href="<?php echo base_url('business_profile/business_videos/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>  Video</a></li>
            <li class="active">    <a href="<?php echo base_url('business_profile/business_audios/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-music" aria-hidden="true"></i>  Audio</a></li>
            <li>    <a href="<?php echo base_url('business_profile/business_pdf/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Pdf</a></li>
          </ul>
        </div>

      <div class="col-xs-9" style="padding-left: 0; height: 100%; border-left: 1px solid #ccc">

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home"><div class="common-form">
                            <div class="">

                                <h2 class="add_tag_design"> Audio</h2>
                                 <div class="contact-frnd-post">
                                 <div class="vidoe_tag">
       
                                  <?php

          $contition_array = array('user_id' => $businessdata1[0]['user_id']);
         $busaudio = $this->data['busaudio'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

          
            foreach ($busaudio as $val) {
             
            

            $contition_array = array('post_id' => $val['business_profile_post_id'], 'is_deleted' =>'1', 'image_type' => '2');
            $busmultiaudio = $this->data['busmultiaudio'] =  $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

              $multipleaudio[] = $busmultiaudio;
             }  

                  ?>
              <?php   

                $allowesaudio = array('mp3');
              
                foreach ($multipleaudio as $mke => $mval) {
                  
                  foreach ($mval as $mke1 => $mval1) {
                      $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);
                    
                     if(in_array($ext,$allowesaudio)){ 
                   $singlearray2[] = $mval1;
                     }
                  }
                } 
                ?>

               <?php  if($singlearray2) { 
                foreach ($singlearray2 as $audiov) {
                  
                 ?>

                            <audio controls>
                            <source src="<?php echo base_url(ARTPOSTIMAGE.$audiov['image_name']); ?>" type="audio/ogg">
                            <source src="movie.ogg" type="audio/mpeg">
                           Your browser does not support the audio tag.
                            </audio>

               <?php } } else{?>
                Audio Not Available
               <?php }?>             
      
                         </div>
</div>
</div>
</div></div>
            <div class="tab-pane" id="profile">Profile Tab.</div>
            <div class="tab-pane" id="messages">Messages Tab.</div>
            <div class="tab-pane" id="settings">Settings Tab.</div>
          </div>
        </div>

        <div class="clearfix"></div>

      </div>

   
    </div>


  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


</div>
</div>


</div>
</div>
</section>

</body>

</html>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="<?php echo base_url('js/jquery.jMosaic.js'); ?>"></script>
 


   <script type="text/javascript">
    //For blocks or images of size, you can use $(document).ready
    $(document).ready(function() {
      $('.blocks').jMosaic({items_type: "li", margin: 0});
      $('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
    });
    
    //If this image without attribute WIDTH or HEIGH, you can use $(window).load
    $(window).load(function() {
            //$('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
        });
    
    //You can update on $(window).resize
    $(window).resize(function() {
      //$('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
      //$('.blocks').jMosaic({items_type: "li", margin: 0});
    });
    </script>