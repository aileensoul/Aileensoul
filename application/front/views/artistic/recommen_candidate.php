<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">

    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
 <?php echo $art_header2; ?>
    <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">


       <div class="col-md-4">
       <div class="profile-box profile-box-left">

   <div class="full-box-module">    
                                <div class="profile-boxProfileCard  module">
                                    <div class="profile-boxProfileCard-cover">    
                                        <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                           href="<?php echo site_url('artistic/art_manage_post'); ?>"
                                           tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo $businessdata[0]['company_name']; ?>">
                                            
                                            <?php if ($artdata[0]['profile_background'] != '') { ?>
                                                <img src="<?php echo base_url(ARTBGIMAGE . $artdata[0]['profile_background']); ?>" class="bgImage" alt=""  style="height: 95px; width: 100%; ">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt=""  style="height: 95px; width: 100%;">
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="profile-boxProfileCard-content clearfix">
                                        <div class="buisness-profile-txext col-md-4">
                                            <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo base_url('artistic/art_manage_post'); ?>" title="" tabindex="-1" aria-hidden="true" rel="noopener" >
                                                <?php
                                                if ($artdata[0]['art_user_image']) {
                                                    ?>
                                                    <img  src="<?php echo base_url(ARTISTICIMAGE . $artdata[0]['art_user_image']); ?>"  alt="" style="height: 77px; width: 71px; z-index: 3; position: relative; ">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                                                <?php } ?>                           
                                               
                                            </a>
                                        </div>
                                        <div class="profile-box-user  profile-text-bui-user  fr col-md-9">
                                            <span class="profile-company-name ">
                                                <a style="margin-left: 3px;" href="<?php echo base_url('artistic/art_manage_post'); ?> " title="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>"> 
                                                    <?php echo ucwords($artdata[0]['art_name']) . ' ' . ucwords($artdata[0]['art_lastname']); ?>
                                                </a> 
                                            </span>
                                            
                                            <div class="profile-boxProfile-name">
                                                <a style="padding-left: 1px;" href="<?php echo base_url('artistic/art_manage_post'); ?> " title="<?php echo ucwords($artdata[0]['art_name']) . ' ' . ucwords($artdata[0]['art_lastname']); ?>" >
                                                    <b> <?php
                                                if ($artdata[0]['designation']) {
                                                    echo ucwords($artdata[0]['designation']);
                                                } else {
                                                    echo "Designation";
                                                }
                                                ?></b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="profile-box-bui-menu  col-md-12">
                                            <ul class="">
                                                <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_savepost') { ?> class="active" <?php } ?>><a title="Dashboard" href="<?php echo base_url('artistic/art_manage_post'); ?>"> Dashboard</a>
                                            </li>
                                                <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a title="Followers" href="<?php echo base_url('artistic/followers'); ?>">Followers <br>(<?php echo (count($followerdata)); ?>)</a>
                                            </li>
                                                <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a title="Following" href="<?php echo base_url('artistic/following'); ?>">Following<br>(<?php echo (count($followingdata)); ?>)</a>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

  
  
   
</div>
</div>



   <div class="col-md-7 col-sm-7 all-form-content" style="height: 150%;">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Search Result of <?php echo ucwords($keyword)?></h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">

                       <?php if($artuserdata){

                                  
                             $contition_array = array('post_id' => $key['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                              $artmulti = $this->data['artmulti'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                            
                              foreach($artuserdata as $key){
                               if($key['art_id']){ ?>
                              
                                  
                                  <div class="profile-job-post-title-inside clearfix" style="border: 1px solid #d9d9d9;">
          <div class="profile-job-profile-button clearfix box_search_module" style="height: 16%;">
                                                          
     <div class="profile-job-post-location-name-rec">
          <div class="module_Ssearch" style="display: inline-block; float: left;">
             <div class="search_img">
                           <img src="<?php echo base_url(ARTISTICIMAGE . $key['art_user_image']); ?>" alt=" ">
                        </div>
       </div>
   
       <div class="designation_rec" style="    float: left;
    width: 60%;
    padding-top: 16px;">
          <ul>
       <li>
      <a style="  font-size: 19px;
         font-weight: 600;" href="<?php echo base_url('artistic/art_manage_post/' . $userlist['user_id'] . ''); ?>" title="<?php echo $key['art_name'].' '.$key['art_lastname'];?>">
       <?php echo $key['art_name'].' '.$key['art_lastname'];?>
       </a>
      </li>
      
      <li style="display: block;">
        <a  class="color-search" style="font-size: 16px;" href="" title="<?php echo $key['art_name'].' '.$key['art_lastname'];?>">
                <?php  if($key['art_yourart']){echo $key['art_yourart']; }else {echo PROFILENA;}?>             
           </a>
       </li>
         <li style="display: block;">
         <a  class="color-search" href="">
           <?php if($key['designation']){echo $key['designation'];} else{echo PROFILENA;} ?>
         </a>

       </li>
       <li style="display: block;">
         <a  class="color-search" href="">
           <?php
                  $comma = ", ";
                  $k = 0;
                  $aud = $key['art_skill'];
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
               ?>
         </a>

       </li>
       <li style="display: block;">
         <a  class="color-search" href=""><?php echo $key['country'].$key['city']; ?></a>
       </li>
         <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">
      
    </ul>
      </div>
      <div class="fl search_button">
        <button>follow</button>
        <br>
         <button>Message</button>
      </div>



     </div>
       </div>
    <div class="view_more_details">
                                          <!-- <a href="">View more in Aileensoul's Profile</a> -->
                                        </div>
                                


         </div>
                               
                            <?php   } }  foreach($artuserdata as $key){
                               if($key['art_description']){ ?>

                        

  <div class="profile-job-post-title-inside clearfix search" style="border: 1px solid #d9d9d9;">
          <!-- <div class="profile-job-profile-button clearfix box_search_module" style="height: 16%;">
                                                           
     <div class="profile-job-post-location-name-rec">
          <div class="module_Ssearch" style="display: inline-block; float: left;">
             <div class="search_img">
                           <img src="<?php echo base_url(ARTISTICIMAGE . $key['art_user_image']); ?>" alt=" ">
                        </div>
       </div>
   
       <div class="designation_rec" style="    float: left;
    width: 60%;
    padding-top: 16px;">
          <ul>
       <li>
      <a style="  font-size: 19px;
         font-weight: 600;" href="<?php echo base_url('artistic/art_manage_post/' . $userlist['user_id'] . ''); ?>" title="<?php echo $key['art_name'].' '.$key['art_lastname'];?>">
       <?php echo $key['art_name'].' '.$key['art_lastname'];?></a>
       </a>
      </li>
      
      <li style="display: block;">
        <a  class="color-search" style="font-size: 16px;" href="<?php echo site_url('artistic/art_manage_post'); ?>" title="<?php echo $key['art_name'].' '.$key['art_lastname'];?>">
                <?php  if($key['art_yourart']){echo $key['art_yourart']; }else {echo PROFILENA;}?>
           </a>
       </li>
         <li style="display: block;">
         <a  class="color-search" href="<?php echo site_url('artistic/art_manage_post'); ?>">
           <?php if($key['designation']){echo $key['designation'];} else{echo PROFILENA;} ?>
         </a>

       </li>
       <li style="display: block;">
         <a  class="color-search" href="">
           <?php
                  $comma = ", ";
                  $k = 0;
                  $aud = $key['art_skill'];
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
               ?> 
         </a>

       </li>
       <li style="display: block;">
         <a  class="color-search" href=""><?php echo $key['country'].$key['city']; ?></a>
       </li>
      
    </ul>
      </div>
      <div class="fl search_button">
        <button>follow</button>
        <br>
         <button>Message</button>
      </div>



     </div> --> 
       </div>
       <div class="col-md-12 col-sm-12 post-design-box" id="removepost5" style="margin-bottom: 0px; box-shadow: none; border: none;">
                                    <div class="post_radius_box">  
                                        <div class="post-design-search-top col-md-12" style="background-color: none!important;">  
                                            <div class="post-design-pro-img col-md-2"> 
                                              
                                                <div id="popup1" class="overlay">
                                                    <div class="popup">
                                                        <div class="pop_content">
                                                            Your Post is Successfully Saved.
                                                            <p class="okk">
                                                                <a class="okbtn" href="#">Ok
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="popup25" class="overlay">
                                                    <div class="popup">
                                                        <div class="pop_content">
                                                            Are You Sure want to delete this post?.
                                                            <p class="okk">
                                                                <a class="okbtn" id="5" onclick="remove_post(this.id)" href="#">Yes
                                                                </a>
                                                            </p>
                                                            <p class="okk">
                                                                <a class="cnclbtn" href="#">No
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div id="popup55" class="overlay">
                                                    <div class="popup">
                                                        <div class="pop_content">
                                                            Are You Sure want to delete this post from your profile?.
                                                            <p class="okk">
                                                                <a class="okbtn" id="5" onclick="del_particular_userpost(this.id)" href="#">OK
                                                                </a>
                                                            </p>
                                                            <p class="okk">
                                                                <a class="cnclbtn" href="#">Cancel
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="http://localhost/aileensoul/uploads/user_image/photo2.jpg" alt="">
                                                                                                </div>
                                            <div class="post-design-name fl col-md-9">
                                                <ul>
                                                    
                                                    <li>
                                                    </li>

                                                                                                            <li>
                                            <div class="post-design-product">
                      <a class="post_dot" href="<?php echo site_url('artistic/art_manage_post'); ?>" title="<?php echo $key['art_name'].' '.$key['art_lastname'];?>">

                            <?php echo $key['art_name'].' '.$key['art_lastname'];?>

                             </a>
                                       <div class="datespan"> 
                                        <span style="font-weight: 400;
                                                    font-size: 14px;
                                                    color: #91949d; cursor: default;"> 
                                           <?php echo date('d-M-Y', strtotime($key['created_date'])); ?>
                                                   

                                                                        </span></div>

                                                            </div>



                                                        </li>

                                                    
                                                    <li>
                                                        <div class="post-design-product">
                                                            <a href="javascript:void(0);" style=" color: #000033; font-weight: 400; cursor: default;" title="Category">
                                                 <?php echo $key['art_post'];?>                                                   </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="post-design-product">
                                                            <a href="javascript:void(0);" style=" color: #000033; font-weight: 400; cursor: default;" title="">
                                                                                                  </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                    </li> 
                                                </ul> 
                                            </div>  
                                            <div class="dropdown1">
                                                <a onclick="myFunction(5)" class="dropbtn1 dropbtn1 fa fa-ellipsis-v">
                                                </a>
                                                <div id="myDropdown5" class="dropdown-content1">
                                                     
                                                        <a href="#popup25">
                                                            <i class="fa fa-trash-o" aria-hidden="true">
                                                            </i> Delete Post
                                                        </a>
                                                        <a id="5" onclick="editpost(this.id)">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true">
                                                            </i>Edit
                                                        </a>
                                                                                                    </div>
                                            </div>
                                            <div class="post-design-desc ">
                                                <div>
                                                    <div id="editpostdata5" style="display:block;">
                                                        <a style="margin-bottom: 0px;     font-size: 16px">
                                                          </a>
                                                    </div>
                                                    <div id="editpostbox5" style="display:none;">
                                                        <input type="text" id="editpostname5" name="editpostname" placeholder="Product Name" value="zalak">
                                                    </div>
                                                </div>                    

                                                <div id="editpostdetails5" style="display:block;">
                                                    <span class="show">
                                                    <?php echo $key['art_description'];?> 
                                                          </span>
                                                </div>
                                                <div id="editpostdetailbox5" style="display:none;">
                                                  
                                                    <div contenteditable="true" id="editpostdesc5" placeholder="Product Description" class="textbuis  editable_text" name="editpostdesc">     </div>                  
                                                </div>
                                                <button class="fr" id="editpostsubmit5" style="display:none;margin: 5px 0; border-radius: 3px;" onclick="edit_postinsert(5)">Save
                                                </button>

                                            </div> 
                                        </div>
                                        
                                        <div class="post-design-mid col-md-12" style="border: none;">
            
             <div>                                     
                                  <div class="mange_post_image">
                                            <?php
                                            $contition_array = array('post_id' => $key['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                                            $artmultiimage = $this->data['artmultiimage'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                            ?>

                                            <?php if (count($artmultiimage) == 1) { ?>

                                                <?php
                                                $allowed = array('gif', 'png', 'jpg');
                                                $allowespdf = array('pdf');
                                                $allowesvideo = array('mp4', '3gp', 'avi');
                                                $allowesaudio = array('mp3');
                                                $filename = $artmultiimage[0]['image_name'];
                                                $ext = pathinfo($filename, PATHINFO_EXTENSION);

         if (in_array($ext, $allowed)) {
                ?>

                                                   
            <div id="basic-responsive-image" style="height: 80%; width: 100%;">
             <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img src="<?php echo base_url(ARTPOSTIMAGE .$artmultiimage[0]['image_name'])?>" style="width: 100%; height: 100%;"> </a>
                                                    </div>
                                                    

                                                <?php } elseif (in_array($ext, $allowespdf)) { ?>

                                                  
             <div>
            <a href="<?php echo base_url('artistic/creat_pdf/' . $artmultiimage[0]['image_id']) ?>"><div class="pdf_img">
                <img src="<?php echo base_url('images/PDF.jpg')?>" style="height: 100%; width: 100%;">
                                </div></a>
                                                    </div>
                                                   

                                                <?php } elseif (in_array($ext, $allowesvideo)) { ?>

                                                   
                                                    <div class="video_post">
                                                        <video width="100%" height="55%" controls>


                        <source src="<?php echo base_url(ARTPOSTIMAGE .$artmultiimage[0]['image_name']) ?>" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                         </video>
                    </div>
                                                   

                <?php } elseif (in_array($ext, $allowesaudio)) { ?>

                                                    
                                 <div>
                        <audio width="120" height="100" controls>

                    <source src="<?php echo base_url(ARTPOSTIMAGE . $artmultiimage[0]['image_name']); ?>" type="audio/mp3">
                    <source src="movie.ogg" type="audio/ogg">
                        Your browser does not support the audio tag.

             </audio>

                                                    </div>

                                                    

                                                <?php } ?>

                                            <?php } elseif (count($artmultiimage) == 2) { ?>

                                                <?php
                                                foreach ($artmultiimage as $multiimage) {
                                                    ?>

                                                    
                                                    <div  id="two_manage_images_art" >
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="two-columns" src="<?php echo base_url(ARTPOSTIMAGE .$multiimage['image_name']) ?>" > </a>
                                                    </div>

                                                    
                                                <?php } ?>

                                            <?php } elseif (count($artmultiimage) == 3) { ?>



                                              
                                                <div id="three_images_art" >
                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url(ARTPOSTIMAGE .$artmultiimage[0]['image_name']) ?>" style="width: 100%; height:100%; "> </a>
                                                </div>
                                                <div  id="three_images_2_art">
                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url(ARTPOSTIMAGE . $artmultiimage[1]['image_name'])?>" style="width: 100%; height:100%; "> </a>
                                                </div>

                                                <div  id="three_images_2_art">
                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url(ARTPOSTIMAGE . $artmultiimage[2]['image_name'])?>" style="width: 100%; height:100%; "> </a>
                                                </div>

                                                


                                            <?php } elseif (count($artmultiimage) == 4) { ?>


                                                <?php
                                                foreach ($artmultiimage as $multiimage) {
                                                    ?>

                                                    
                                                    <div id="responsive_manage-images-breakpoints" style="   ">
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="breakpoint" src="<?php echo base_url(ARTPOSTIMAGE . $multiimage['image_name'])?>" style="width: 100%; height: 100%;"> </a>

                                                    </div>

                                                    

                                                <?php } ?>


                                            <?php } elseif (count($artmultiimage) > 4) { ?>



                                                <?php
                                                $i = 0;
                                                foreach ($artmultiimage as $multiimage) {
                                                    ?>

                                                    
                                                    <div>
                                                        <div id="responsive-manage_images_2-breakpoints">
                                                            <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img src="<?php echo base_url(ARTPOSTIMAGE . $multiimage['image_name']) ?>" style=""> </a>
                                                        </div>
                                                    </div>

                                                    

                                                    <?php
                                                    $i++;
                                                    if ($i == 3)
                                                        break;
                                                }
                                                ?>
                                               
                                                <div>
                                                    <div id="responsive-manage_images_3-breakpoints" >
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img src="<?php echo base_url(ARTPOSTIMAGE .$artmultiimage[3]['image_name'])?>" > </a></div>


                                                    <div class="manage_images_view_more" >


                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>" >View All (+<?php echo (count($artmultiimage) - 4); ?>)</a>
                                                    </div>

                                                </div>
                                              


                                            <?php } ?>
                                            <div>


                                            </div>

                                        </div>     
              </div>
            
                                        </div>
                                        <div class="post-design-like-box col-md-12" style="border: none;">
                                            <div class="post-design-menu">
                                                <ul>
                                                    <li class="likepost5">
                                                        <a id="5" onclick="post_like(this.id)">
                                                                           
                                                                <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true">
                                                                </i>                                                    <span>                                                </span>
                                                        </a>
                                                    </li>
                                                    <li id="insertcount5" style="visibility:show">
                                                                                                                <a onclick="commentall(this.id)" id="5">
                                                            <i class="fa fa-comment-o" aria-hidden="true"> 
                                                                11                                                            </i> 
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                      
                                        
                                        <div class="likeusername5" id="likeusername5" style="display:none">
                                                                                        <!-- pop up box end-->
                                            <a href="javascript:void(0);" onclick="likeuserlist(5);">
                                                                                                <div class="like_one_other">
                                                    &nbsp;                                                                                                    </div>
                                            </a>
                                        </div>


                               
                                        <div class="art-all-comment col-md-12">
                                            <div id="fourcomment5" style="display:none;">
                                                
                                            </div>
                                          
                                           
                                        </div>
                                        
                                        <div class="post-design-commnet-box col-md-12">
                                            <div class="post-design-proo-img">                                                                      <img src="http://localhost/aileensoul/uploads/user_image/photo2.jpg" alt="">
                                                                                            </div>
                                            <div class="">
                                                <div id="content" class="col-md-10  inputtype-comment" style="padding-left: 7px;">
                                                    <div contenteditable="true" style="min-height:37px !important; margin-top: 0px!important" class="editable_text" name="5" id="post_comment5" placeholder="Type Message ..." onclick="entercomment(5)"></div>
                                                </div>
         
                                                <div class="col-md-1 comment-edit-butn">       
                                                    <button id="5" onclick="insert_comment(this.id)">Comment
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                       
                                       
                                    </div> </div>
                                    <div class="view_more_details">
                                          <a href="">View more in Aileensoul's Profile</a>
                                        </div>

                                </div>
                           



                     <?php     }} }?>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                 
</div>
</div>
</div>
<script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script>

<script type="text/javascript">
                                                                        var text = document.getElementById("search").value;
//alert(text);

                                                                        $(".search").highlite({

                                                                            text: text



                                                                        });
</script>