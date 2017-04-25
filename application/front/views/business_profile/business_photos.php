<!-- start head -->
<?php  echo $head; ?>


<!--post save success pop up style strat -->
<style>
body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
}

/* The Modal (background) */
.modal2 {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content2 {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 65%;
  max-width: 1200px;
}


/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* The Close Button */
.close2 {
  color: white;
  position: absolute;
  top: 75px;
  right: 196px;
  font-size: 35px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}


.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
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
                        
                        <div id="popup-form">
                        <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="5">
                        <input type="submit" name="cancel5" id="cancel5" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                     <?php  echo form_close( );?>
                </div>

                </div>

                <div class="bui-menu-profile col-md-10">

                  

                    <h4 class="profile-head-text"><a href="<?php echo base_url('business_profile/business_resume/'.$businessdata[0]['user_id'].''); ?>"> <?php echo ucwords($businessdata[0]['company_name']); ?></a></h4>


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

                              <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_save_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_save_post'); ?>">Saved Post</a>
                                    </li>

                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/userlist'); ?>">Userlist</a>
                                    </li>


                         <?php }?>

                         <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?> 


                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers  (<?php echo (count($businessfollowerdata)); ?>)</a>
                                    </li>
                                    

                          <?php }else{

            $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_to' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                            ?> 
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers  (<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>

                          <?php }?>

                          <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?>          
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following  (<?php echo (count($businessfollowingdata)); ?>)</a>
                                    </li>
                                    <?php }else{
      $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_from' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        ?>
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following  (<?php echo (count($followerotherdata)); ?>)</a>
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
            <li class="active"> <a href="<?php echo base_url('business_profile/business_photos/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-camera" aria-hidden="true"></i>   Photos</a></li>
            <li>       <a href="<?php echo base_url('business_profile/business_videos/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>  Video</a></li>
            <li>    <a href="<?php echo base_url('business_profile/business_audios/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-music" aria-hidden="true"></i>  Audio</a></li>
            <li>    <a href="<?php echo base_url('business_profile/business_pdf/'.$businessdata1[0]['business_slug']) ?>" data-toggle="tab"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Pdf</a></li>
          </ul>
        </div>

       <div class="col-xs-9" style="padding-left: 0; height: 100%; border-left: 1px solid #ccc">

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home"><div class="common-form">
                            <div class="">

                                <h2 class="add_tag_design"> Photos</h2>
                                 <div class="contact-frnd-post">


  <div class="pictures">

        <?php
                $i=1;

                $allowed =  array('gif','png','jpg');
              foreach($business_profile_data as $mke => $mval){

                      $ext = pathinfo($mval['image_name'], PATHINFO_EXTENSION);

                     if(in_array($ext,$allowed)){
                   $databus[] = $mval;
                     }
                  
                } 

               if($databus) { 
                foreach ($databus as $data) {
                  

        ?>
        <img src="<?php echo base_url(BUSPOSTIMAGE. str_replace(" ","_",$data['image_name']))?>" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor" width="600" height="669"/>

        <?php
          $i++;
            } } else{
            echo "no Images"; 
              }?>
  
    </div>


<!-- silder start -->
<div id="myModal1" class="modal2">
  <span class="close2 cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content2">

 <!--  multiple image start -->

  <?php
                $i=1;

                $allowed =  array('gif','png','jpg');
              foreach($business_profile_data as $mke => $mval){

                      $ext = pathinfo($mval['image_name'], PATHINFO_EXTENSION);

                     if(in_array($ext,$allowed)){
                   $databus1[] = $mval;
                     }
                  
                } 
   
                foreach ($databus1 as $busdata) {  
           
        ?>

      <div class="mySlides">
      <div class="numbertext"><?php echo $i ?> / <?php  echo count($databus1)?></div>
      <div>
      <img src="<?php echo base_url(BUSPOSTIMAGE. str_replace(" ","_",$busdata['image_name']))?>" style="width:100%; height: 70%;">
      </div>

<!-- like comment start -->


                <div>
       <div class="post-design-like-box col-md-12">
                <div class="post-design-menu">
                  <ul>
                    <li class="<?php echo 'likepost' . $busdata['image_id']; ?>">


                    <a id="<?php echo $busdata['image_id']; ?>" onClick="mulimg_like(this.id)">

                    <?php 

                  $userid = $this->session->userdata('aileenuser');
                  $contition_array = array('post_image_id' =>  $busdata['image_id'], 'user_id' => $userid, 'is_unlike' => 0);

                  $activedata = $this->data['activedata'] = $this->common->select_data_by_condition('bus_post_image_like', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
                     
                    if($activedata){ 
                      ?>
                   <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                      <?php }else{?>
                    <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>
                    <?php }?>

                    <span class="<?php echo 'likeimage' . $busdata['image_id']; ?>"> <?php 
                    
                  $contition_array = array('post_image_id' => $busdata['image_id'], 'is_unlike' => 0);
                  $likecount = $this->common->select_data_by_condition('bus_post_image_like', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
                    if($likecount){
                    echo count($likecount);  }?>

                    </span>
                    </a>
                    </li>

                   <li id="<?php echo "insertcount" . $busdata['image_id']; ?>" style="display:block;">

                     <?php 

          $contition_array = array('post_image_id' => $busdata['image_id'], 'is_delete' =>'0');
           $commnetcount = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 

                  ?>

                    <a onClick="commentall(this.id)" id="<?php echo $busdata['image_id']; ?>">
                    <i class="fa fa-comment-o" aria-hidden="true">
                     <?php 
                    if(count($commnetcount) > 0){
                    echo count($commnetcount); 
                   }
                    ?>
                     </i> 
                    </a>
                    </li>
                  </ul>

                  </div>
                </div>

<!-- show comment div start -->
                <div>

                  <div  id="<?php echo "threecomment" . $busdata['image_id']; ?>" style="display:block">
                  <div class="<?php echo 'insertcomment' . $busdata['image_id']; ?>">

                  <?php 

           $contition_array = array('post_image_id' =>  $busdata['image_id'], 'is_delete' =>'0');

        $busmulimage = $this->common->select_data_by_condition('bus_post_image_comment', $contition_array , $data='*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str= array(), $groupby = ''); 
                                   
                                        if($busmulimage){ 
                                      foreach($busmulimage as $rowdata)
                                        {
                                          $companyname =  $this->db->get_where('business_profile',array('user_id' => $rowdata['user_id']))->row()->company_name; ?>

    <div class="all-comment-comment-box">

                        <div class="post-design-pro-comment-img"> 
                  <?php 
                 $business_userimage =  $this->db->get_where('business_profile',array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->business_user_image;
                 ?>

                 <img  src="<?php echo base_url(USERIMAGE . $business_userimage);?>"  alt="">
                  </div>

                  <div class="comment-name">

                  <b>  <?php echo ucwords($companyname); echo '</br>'; ?>
                  </b>
                  </div>

                  <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['post_image_comment_id']; ?>">
                                        <?php
                                        
                                        echo $rowdata['comment']; echo '</br>';
                                        ?>
                  </div>


                  <!-- edit box start -->

                <div class="col-md-12">
                                        <div class="col-md-10">
                                        <input type="text" name="<?php echo $rowdata['post_image_comment_id']; ?>" id="<?php echo "editcomment" . $rowdata['post_image_comment_id']; ?>" style="display: none;" value="<?php  echo $rowdata['comment']; ?>" onClick="commentedit(this.name)">

                </div>  <div class="col-md-2 comment-edit-button">
                                        <button id="<?php echo "editsubmit" . $rowdata['post_image_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['post_image_comment_id']; ?>)">Comment</button>
                      </div>

                   </div>

        <!-- edit box end -->


<!-- comment like start -->
                  <div class="comment-details-menu"  id="<?php echo 'likecomment' . $rowdata['post_image_comment_id']; ?>">

                <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="comment_like(this.id)">

               <?php 

               $userid = $this->session->userdata('aileenuser');
                $contition_array = array('post_image_comment_id' =>  $rowdata['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);

                $businesscommentlike1 = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                //echo "<pre>"; print_r($businesscommentlike); 
               //echo count($businesscommentlike); 
            if(count($businesscommentlike1) == 0)
            { ?>
              <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>

             <?php   }
         else{ ?>
           <i class="fa fa-thumbs-up" aria-hidden="true"></i>
          <?php } ?>
                  <span>

                  <?php 

            $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'is_unlike' =>'0');
             $mulcountlike =   $this->data['mulcountlike'] = $this->common->select_data_by_condition('bus_comment_image_like', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

                 if(count($mulcountlike) > 0){
                    echo count($mulcountlike); 
                        }
                      ?>
                
                  </span>
                  </a>

                  </div>

<!--   comment like end -->


<!-- comment edit start -->

<?php
            $userid  = $this->session->userdata('aileenuser');
              if($rowdata['user_id'] == $userid){ 
                 ?>
          <div class="comment-details-menu">

                                    <div id="<?php echo 'editcommentbox' . $rowdata['post_image_comment_id']; ?>" style="display:block;">
                                     <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="comment_editbox(this.id)" class="editbox">Edit
                                      </a>
                                      </div>

                                      <div id="<?php echo 'editcancle' . $rowdata['post_image_comment_id']; ?>" style="display:none;">
                                      <a id="<?php echo $rowdata['post_image_comment_id']; ?>" onClick="comment_editcancle(this.id)">Cancle
                                      </a>
                                      </div>

      </div>

      <?php }?>
<!-- comment edit end -->

<!-- comment delete start -->
<?php
       $userid  = $this->session->userdata('aileenuser');

       $business_userid =  $this->db->get_where('business_profile_post',array('business_profile_post_id' => $rowdata['post_image_id'], 'status' => 1))->row()->user_id;


    if($rowdata['user_id'] == $userid ||  $business_userid == $userid){ 
    ?>
<span role="presentation" aria-hidden="true"> · </span>
                                   <div class="comment-details-menu">

                                      

                                      <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['post_image_id']; ?>">
                                      <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['post_image_comment_id']; ?>">
                                      </span>
                                      </a>
                                      </div>

<?php }?>
<!-- comment delete end -->


<!-- created date start -->

 <span role="presentation" aria-hidden="true"> · </span>
<div class="comment-details-menu">
  <p><?php
 echo date('d-M-Y',strtotime($rowdata['created_date'])); echo '</br>'; ?>
</p></div>

 <!-- created date end -->

     </div>

                                <?php }
                                       } 
                                      ?>

                  </div>
                  </div>

            <div id="<?php echo "fourcomment" .   $busdata['image_id']; ?>" style="display:none;">

             
              </div>

                </div>

<!-- show comment div end -->

<!-- insert comment code start -->
                <div class="post-design-commnet-box col-md-12">
                
                  <div class="post-design-proo-img"> 
                  
                  <?php 
                  $userid  = $this->session->userdata('aileenuser'); 
                 $business_userimage =  $this->db->get_where('business_profile',array('user_id' => $userid, 'status' => 1))->row()->business_user_image;
                 ?>

                 <img src="<?php echo base_url(USERIMAGE . $business_userimage);?>" alt="">
                  </div>


                  <div class="">
                  <div class="col-md-10 inputtype-comment">
                  <input type="text" name="<?php echo $busdata['image_id']; ?>" id="<?php echo "post_comment" . $busdata['image_id']; ?>" placeholder="Type Comment ..." value="" onClick="entercommentimg(this.name)">
                  </div>

                  <div class="col-md-1 comment-edit-butn">                                      
                  <button id="<?php echo $busdata['image_id']; ?>" onClick="insert_commenting(this.id)">Comment</button>
                                             
                  </div>
</div>

      </div>
<!-- insert comment code end -->

    </div>

<!-- like comment end -->

    </div>
<?php
    $i++;
  } ?>

<!-- slider image rotation end  -->
       
    <a class="prev" style="left: 10" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


  
  </div>
</div>


<!-- slider end -->
    </div>
</div>
</div>
</div></div>
     
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

<script>
function openModal() {
  document.getElementById('myModal1').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal1').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<!-- images like script start -->

<script type="text/javascript">
function mulimg_like(clicked_id)
{
    //alert(clicked_id);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_like" ?>',
                data:'post_image_id='+clicked_id,
                success:function(data){ 
                    $('.' + 'likepost' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<!--images like script end -->


<!-- insert comment using enter -->
<script type="text/javascript">

function insert_commenting(clicked_id)
{  
     var post_comment = document.getElementById("post_comment" + clicked_id);
 
   // $.ajax({ 
   //              type:'POST',
   //              url:'<?php// echo base_url() . "business_profile/mulimg_comment" ?>',
   //               data:'post_image_id='+clicked_id + '&comment='+post_comment.value,
   //                 success:function(data){ 
   //                   $('input').each(function(){
   //                    $(this).val('');
   //                }); 
   //                  $('.' + 'insertcomment' + clicked_id).html(data);
                    
   //              }
   //          }); 



   // khyati chnages  start
                  
   var x = document.getElementById('threecomment'+ clicked_id);
   var y = document.getElementById('fourcomment'+ clicked_id);
 
 if (x.style.display === 'block' && y.style.display === 'none') { 
       $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_commentthree" ?>',
                data:'post_image_id='+clicked_id + '&comment='+post_comment.value,
                dataType: "json",
                   success:function(data){ 
                     $('input').each(function(){
                      $(this).val('');
                  });
        
       //  $('.insertcomment' + clicked_id).html(data);
         $('#' + 'insertcount' + clicked_id).html(data.count);
         $('.insertcomment' + clicked_id).html(data.comment);

          }
            }); 
 
      } else { 

        $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_comment" ?>',
                data:'post_image_id='+clicked_id + '&comment='+post_comment.value,
                // dataType: "json",
                   success:function(data){ 
                     $('input').each(function(){
                      $(this).val('');
                  });
         $('#' + 'fourcomment' + clicked_id).html(data);
        // $('#' + 'commnetpost' + clicked_id).html(data.count);
        //  $('#' + 'fourcomment' + clicked_id).html(data.comment);

          }
            }); 
     }
                // khyati chnages end
}

</script>

<script type="text/javascript">
  
function entercommentimg(clicked_id)
{
 //alert(clicked_id);
  $(document).ready(function() { 
  $('#post_comment' + clicked_id).keypress(function(e) { 

    if (e.keyCode == 13 && !e.shiftKey) {
                var val = $('#post_comment' + clicked_id).val();
                e.preventDefault();

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);

      // $.ajax({ 
      //           type:'POST',
      //           url:'<?php //echo base_url() . "business_profile/mulimg_comment" ?>',
      //            data:'post_image_id='+clicked_id + '&comment='+val,
      //              success:function(data){ 
      //                $('input').each(function(){
      //                 $(this).val('');
      //             }); 
      //               $('.' + 'insertcomment' + clicked_id).html(data);
                    
      //           }
      //       }); 

      // khyati chnages  start
                  
   var x = document.getElementById('threecomment'+ clicked_id);
   var y = document.getElementById('fourcomment'+ clicked_id);
 
 if (x.style.display === 'block' && y.style.display === 'none') { 
       $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_commentthree" ?>',
                data:'post_image_id='+clicked_id + '&comment='+val,
                dataType: "json",
                   success:function(data){ 
                     $('input').each(function(){
                      $(this).val('');
                  });
        
       //  $('.insertcomment' + clicked_id).html(data);
         $('#' + 'insertcount' + clicked_id).html(data.count);
         $('.insertcomment' + clicked_id).html(data.comment);

          }
            }); 
 
      } else { 

        $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_comment" ?>',
                data:'post_image_id='+clicked_id + '&comment='+val,
                // dataType: "json",
                   success:function(data){ 
                     $('input').each(function(){
                      $(this).val('');
                  });
         $('#' + 'fourcomment' + clicked_id).html(data);
        // $('#' + 'commnetpost' + clicked_id).html(data.count);
        //  $('#' + 'fourcomment' + clicked_id).html(data.comment);

          }
            }); 
     }
                // khyati chnages end

    }        
  });
});

}
</script>

<!-- hide and show data start-->
<script type="text/javascript">
  function commentall(clicked_id){ 
 
  var x = document.getElementById('threecomment'+ clicked_id);
   var y = document.getElementById('fourcomment'+ clicked_id);
   var z = document.getElementById('insertcount'+ clicked_id);

          
               
      if(x.style.display === 'block' && y.style.display === 'none') {

         x.style.display = 'none';
         y.style.display = 'block';
         z.style.display = 'none';
        
        $.ajax({ 
    type:'POST',
    url:'<?php echo base_url() . "business_profile/mulfourcomment" ?>',
        data:'bus_post_id='+clicked_id,
                //alert(data);
                success:function(data){
          $('#' + 'fourcomment' + clicked_id).html(data);

          }
            });

 }
    // } else {
    //      x.style.display = 'block';
    //      y.style.display = 'block';
    //      z.style.display = 'block';

    //      $.ajax({ 
    //             type:'POST',
    //          url:'<?php //echo base_url() . "business_profile/fourcomment" ?>',
    //             data:'art_post_id='+clicked_id,
    //             //alert(data);
    //             success:function(data){
    //       $('#' + 'threecomment' + clicked_id).html(data);

    //       }
    //         });
    // }

                
    


  }
</script>
<!-- hide and show data end-->
<!-- comment like script start -->

<script type="text/javascript">
function comment_like(clicked_id)
{
    //alert(clicked_id);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_comment_like" ?>',
                 data:'post_image_comment_id='+clicked_id,
                success:function(data){ //alert(data);
                    $('#' + 'likecomment' + clicked_id).html(data);
                    
                }
            }); 
}


function comment_liketwo(clicked_id)
{
    //alert(clicked_id);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mulimg_comment_like1" ?>',
                 data:'post_image_comment_id='+clicked_id,
                success:function(data){ //alert(data);
                    $('#' + 'likecomment1' + clicked_id).html(data);
                    
                }
            }); 
}
</script>
<!-- comment like script end -->

<!-- comment edit box start-->
<script type="text/javascript">
    
    function comment_editbox(clicked_id){  
        document.getElementById('editcomment' + clicked_id).style.display='block';
        document.getElementById('showcomment' + clicked_id).style.display='none';
        document.getElementById('editsubmit' + clicked_id).style.display='block';


        document.getElementById('editcommentbox' + clicked_id).style.display='none';
        document.getElementById('editcancle' + clicked_id).style.display='block';
        
        
}

function comment_editcancle(clicked_id){ 

        document.getElementById('editcommentbox' + clicked_id).style.display='block';
        document.getElementById('editcancle' + clicked_id).style.display='none';

        document.getElementById('editcomment' + clicked_id).style.display='none';
       document.getElementById('showcomment' + clicked_id).style.display='block';
       document.getElementById('editsubmit' + clicked_id).style.display='none';
   
} 

function comment_editboxtwo(clicked_id){  //alert('editsubmit2' + clicked_id);
        document.getElementById('editcommenttwo' + clicked_id).style.display='block';
        document.getElementById('showcommenttwo' + clicked_id).style.display='none';
        document.getElementById('editsubmittwo' + clicked_id).style.display='block';


        document.getElementById('editcommentboxtwo' + clicked_id).style.display='none';
        document.getElementById('editcancletwo' + clicked_id).style.display='block';
        
}

function comment_editcancletwo(clicked_id){ 

        document.getElementById('editcommentboxtwo' + clicked_id).style.display='block';
        document.getElementById('editcancletwo' + clicked_id).style.display='none';

        document.getElementById('editcommenttwo' + clicked_id).style.display='none';
       document.getElementById('showcommenttwo' + clicked_id).style.display='block';
       document.getElementById('editsubmittwo' + clicked_id).style.display='none';
   
} 

</script>
<!-- comment edit box end -->


<!-- comment edit insert start -->

<script type="text/javascript">
function edit_comment(abc)
{ //alert('editsubmit' + abc);

   var post_comment_edit = document.getElementById("editcomment" + abc);
   //alert(post_comment.value);
   //alert(post_comment.value);
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                 data:'post_image_comment_id='+abc + '&comment='+post_comment_edit.value,
                   success:function(data){ //alert('falguni');

                  //  $('input').each(function(){
                  //     $(this).val('');
                  // }); 
         document.getElementById('editcomment' + abc).style.display='none';
       document.getElementById('showcomment' + abc).style.display='block';
       document.getElementById('editsubmit' + abc).style.display='none';

       document.getElementById('editcommentbox' + abc).style.display='block';
        document.getElementById('editcancle' + abc).style.display='none';
                     //alert('.' + 'showcomment' + abc);
                    $('#' + 'showcomment' + abc).html(data);


                    
                }
            }); 
   //window.location.reload();
}
</script>


<script type="text/javascript">

function commentedit(abc)
{  
 
 
  $(document).ready(function() {
  $('#editcomment' + abc).keypress(function(e) {
   
      if (e.keyCode == 13 && !e.shiftKey) {
                var val = $('#editcomment' + abc).val();
                e.preventDefault();

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);
      
      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                 data:'post_image_comment_id='+abc + '&comment='+val,
                   success:function(data){ //alert('falguni');

                  
         document.getElementById('editcomment' + abc).style.display='none';
       document.getElementById('showcomment' + abc).style.display='block';
       document.getElementById('editsubmit' + abc).style.display='none';

       document.getElementById('editcommentbox' + abc).style.display='block';
        document.getElementById('editcancle' + abc).style.display='none';
                     //alert('.' + 'showcomment' + abc);
                    $('#' + 'showcomment' + abc).html(data);


                    
                }
            }); 
      //alert(val);
    }        
  });
});

}
</script>



<script type="text/javascript">
function edit_commenttwo(abc)
{ //alert('editsubmit' + abc);

   var post_comment_edit = document.getElementById("editcommenttwo" + abc);
   //alert(post_comment.value);
   //alert(post_comment.value);
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                 data:'post_image_comment_id='+abc + '&comment='+post_comment_edit.value,
                   success:function(data){ //alert('falguni');

                  //  $('input').each(function(){
                  //     $(this).val('');
                  // }); 
         document.getElementById('editcommenttwo' + abc).style.display='none';
       document.getElementById('showcommenttwo' + abc).style.display='block';
       document.getElementById('editsubmittwo' + abc).style.display='none';

       document.getElementById('editcommentboxtwo' + abc).style.display='block';
        document.getElementById('editcancletwo' + abc).style.display='none';
                     //alert('.' + 'showcomment' + abc);
                    $('#' + 'showcommenttwo' + abc).html(data);


                    
                }
            }); 
   
}
</script>

<script type="text/javascript">

function commentedittwo(abc)
{ 
  $(document).ready(function() {
  $('#editcomment2' + abc).keypress(function(e) {
     if (e.keyCode == 13 && !e.shiftKey) {
                var val = $('#editcommenttwo' + abc).val();
                e.preventDefault();

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);
      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mul_edit_com_insert" ?>',
                 data:'post_image_comment_id='+abc + '&comment='+val,
                   success:function(data){ //alert('falguni');

                  //  $('input').each(function(){
                  //     $(this).val('');
                  // }); 
         document.getElementById('editcommenttwo' + abc).style.display='none';
       document.getElementById('showcommenttwo' + abc).style.display='block';
       document.getElementById('editsubmittwo' + abc).style.display='none';

       document.getElementById('editcommentboxtwo' + abc).style.display='block';
        document.getElementById('editcancletwo' + abc).style.display='none';
                     //alert('.' + 'showcomment' + abc);
                    $('#' + 'showcommenttwo' + abc).html(data);


                    
                }
            }); 
   
      //alert(val);
    }        
  });
});

}
</script>
<!-- comment edit insert end -->
<!-- comment delete start -->


<script type="text/javascript">
function comment_delete(clicked_id)
{
    
     var post_delete = document.getElementById("post_delete");
     //alert(post_delete.value);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mul_delete_comment" ?>',
                dataType: "json",
                data:'post_image_comment_id='+clicked_id + '&post_delete='+post_delete.value,
                success:function(data){ //alert('.' + 'insertcomment' + clicked_id);

                    // $('.' + 'insertcomment' + post_delete.value).html(data);
         $('#' + 'insertcount' + post_delete.value).html(data.count);
         $('.insertcomment' + post_delete.value).html(data.comment);
                    
                }
            }); 
}

function comment_deletetwo(clicked_id)
{
    
     var post_delete1 = document.getElementById("post_deletetwo");
     //alert(post_delete.value);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/mul_delete_commenttwo" ?>',
                 data:'post_image_comment_id='+clicked_id + '&post_delete='+post_delete1.value,
                success:function(data){ //alert('.' + 'insertcomment' + clicked_id);

                    $('.' + 'insertcommenttwo' + post_delete1.value).html(data);
                    
                }
            }); 
}
</script>

<!-- commenmt delete end