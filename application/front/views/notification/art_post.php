<!-- start head -->
<?php echo $head; ?>
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/select2-4.0.3.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.jMosaic.css'); ?>">
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<!-- END HEADER -->
<?php echo $art_header2; ?>
<!DOCTYPE html>
<html>
   <head>
      <style>
         div.panel {
         display: none;
         }
      </style>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <script>
         $(document).ready(function ()
         {
             /* Uploading Profile BackGround Image */
             $('body').on('change', '#bgphotoimg', function ()
             {
                 $("#bgimageform").ajaxForm({target: '#timelineBackground',
                     beforeSubmit: function () {},
                     success: function () {
                         $("#timelineShade").hide();
                         $("#bgimageform").hide();
                     },
                     error: function () {
                     }}).submit();
             });
             /* Banner position drag */
             $("body").on('mouseover', '.headerimage', function ()
             {
                 var y1 = $('#timelineBackground').height();
                 var y2 = $('.headerimage').height();
                 $(this).draggable({
                     scroll: false,
                     axis: "y",
                     drag: function (event, ui) {
                         if (ui.position.top >= 0)
                         {
                             ui.position.top = 0;
                         } else if (ui.position.top <= y1 - y2)
                         {
                             ui.position.top = y1 - y2;
                         }
                     },
                     stop: function (event, ui)
                     {
                     }
                 });
             });
             /* Bannert Position Save*/
             $("body").on('click', '.bgSave', function ()
             {
                 var id = $(this).attr("id");
                 var p = $("#timelineBGload").attr("style");
                 var Y = p.split("top:");
                 var Z = Y[1].split(";");
                 var dataString = 'position=' + Z[0];
                 $.ajax({
                     type: "POST",
                     url: "<?php echo base_url('artistic/image_saveBG_ajax'); ?>",
                     data: dataString,
                     cache: false,
                     beforeSend: function () { },
                     success: function (html)
                     {
                         if (html)
                         {
                             window.location.reload();
                             $(".bgImage").fadeOut('slow');
                             $(".bgSave").fadeOut('slow');
                             $("#timelineShade").fadeIn("slow");
                             $("#timelineBGload").removeClass("headerimage");
                             $("#timelineBGload").css({'margin-top': html});
                             return false;
                         }
                     }
                 });
                 return false;
             });
         });
      </script>
   </head>
   <body>
      <div class="user-midd-section" id="paddingtop_fixed">
      <div class="container">
      <div class="row">
      <div class="col-md-4 profile-box profile-box-left ">
         <div class="">
            <div class="full-box-module">
               <div class="profile-boxProfileCard  module">
                  <div class="profile-boxProfileCard-cover">
                     <a class="profile-boxProfileCard-bg u-bgUserColor a-block" href="<?php echo site_url('artistic/art_manage_post'); ?>" tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>">
                        <?php if ($artisticdata[0]['profile_background']) { ?>
                        <div class="data_img"><img src="<?php echo base_url($this->config->item('art_bg_thumb_upload_path') . $artisticdata[0]['profile_background']); ?>" alt ="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>" class="bgImage"  >
                        </div>
                        <?php } else { ?>
                        <div class="data_img">
                           <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>"  >
                        </div>
                        <?php } ?>
                     </a>
                  </div>
                  <div class="profile-boxProfileCard-content clearfix">
                     <div class="left_side_box_img buisness-profile-txext">
                        <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo site_url('artistic/art_manage_post'); ?>" title="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>" tabindex="-1" aria-hidden="true" rel="noopener">
                           <!-- box image start -->
                           <?php if ($artisticdata[0]['art_user_image']) { ?>
                           <div class="data_img_2">   
                              <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']); ?>" class="bgImage"  alt="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>" >
                           </div>
                           <?php } else { ?> 
                           <div class="data_img_2">
                              <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>">
                           </div>
                           <?php } ?>
                           <!-- box image end -->
                        </a>
                     </div>
                     <div class="right_left_box_design ">
                        <span class="profile-company-name ">
                        <a   href="<?php echo site_url('artistic/art_manage_post'); ?>"> <?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?></a>
                        </span>
                        <?php $category = $this->db->get_where('industry_type', array('industry_id' => $businessdata[0]['industriyal'], 'status' => 1))->row()->industry_name; ?>
                        <div class="profile-boxProfile-name">
                           <a  href="<?php echo site_url('artistic/art_manage_post'); ?>">
                           <?php
                              if ($artisticdata[0]['designation']) {
                                  echo ucwords($artisticdata[0]['designation']);
                              } else {
                                  echo "Designation";
                              }
                              ?>
                           </a>
                        </div>
                        <ul class=" left_box_menubar">
                           <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_savepost') { ?> class="active" <?php } ?>><a class="padding_less_left" title="Dashboard" href="<?php echo base_url('artistic/art_manage_post'); ?>"> Dashboard</a>
                           </li>
                           <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a title="Followers" href="<?php echo base_url('artistic/followers'); ?>">Followers <br>(<?php echo (count($followerdata)); ?>)</a>
                           </li>
                           <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a class="padding_less_right"  title="Following" href="<?php echo base_url('artistic/following'); ?>">Following<br>(<?php echo (count($followingdata)); ?>)</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- cover pic end -->
         <?php
            function text2link($text) {
                $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
                $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
                $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
                return $text;
            }
            ?>    
         <!-- pop up box start-->
         <div id="popup1" class="overlay">
            <div class="popup">
               <div class="pop_content">
                  Your Post is Successfully Saved.
                  <p class="okk"><a class="okbtn" href="#">Ok</a></p>
               </div>
            </div>
         </div>
         <!-- pop up box end-->
         <!-- pop up box start-->
         <div id="<?php echo "popup2" . $row['art_post_id']; ?>" class="overlay">
            <div class="popup">
               <div class="pop_content">
                  Are You Sure want to delete this post?.
                  <p class="okk"><a class="okbtn" id="<?php echo $row['art_post_id']; ?>" onClick="remove_post(this.id)" href="#">OK</a></p>
                  <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>
               </div>
            </div>
         </div>
         <!-- pop up box end-->
         <!-- pop up box start-->
         <div id="<?php echo "popup5" . $row['art_post_id']; ?>" class="overlay">
            <div class="popup">
               <div class="pop_content">
                  Are You Sure want to delete this post from your profile?.
                  <p class="okk"><a class="okbtn" id="<?php echo $row['art_post_id']; ?>" onClick="del_particular_userpost(this.id)" href="#">OK</a></p>
                  <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>
               </div>
            </div>
         </div>
      </div>
      <!-- pop up box end-->
      <div class="col-md-7 col-sm-7 col-md-push-4 col-md-push-4 custom-right">
         <div class="col-md-12 col-sm-12 post-design-box">
            <div class=" ">
               <div class="post-design-top col-md-12" >
                  <div class="post-design-pro-img col-md-2"> 
                     <?php
                        $art_userimage = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id'], 'status' => 1))->row()->art_user_image;
                        ?>
                     <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>"  alt=""> 
                  </div>
                  <div class="post-design-name fl col-md-10">
                     <ul>
                        <?php
                           $firstname = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->art_name;
                           $lastname = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->art_lastname;
                           $userskill = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->art_skill;
                           $aud = $userskill;
                           $aud_res = explode(',', $aud);
                           foreach ($aud_res as $skill) {
                           
                               $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                               $skill1[] = $cache_time;
                           }
                           $listFinal = implode(', ', $skill1);
                           ?>
                        <li>
                           <div class="post-design-product">
                              <a class="post_dot" 
                                 href="<?php echo base_url('artistic/art_manage_post/' . $row['user_id']); ?>"><?php
                                 echo ucwords($firstname);
                                 print "&nbsp;&nbsp;";
                                 echo ucwords($lastname);
                                 ?> </a>
                                     <span role="presentation" aria-hidden="true"> · </span>
                              <div class="datespan">
                                 <sspan class="ctre_date">  <?php echo date('d-M-Y', strtotime($row['created_date'])); ?></span>
                              </div>
                           </div>
                        </li>
                        <!-- 
                           <li><div class="post-design-product"><a><?php //echo $listFinal ;   ?> </a></div></li>
                           -->
                        <li>
                           <!--    <div id="<?php echo 'editpostdata' . $art_data[0]['art_post_id']; ?>" style="display:block;">
                              <a><?php print text2link($art_data[0]['art_post']); ?></a>
                              </div>
                              <div id="<?php echo 'editpostbox' . $art_data[0]['art_post_id']; ?>" style="display:none;">
                              <input type="text" id="<?php echo 'editpostname' . $art_data[0]['art_post_id']; ?>" name="editpostname" value="<?php echo $art_data[0]['art_post']; ?>">
                              </div> -->
                        </li>
                     </ul>
                  </div>
                  <div class="dropdown1">
                     <a onClick="myFunction(<?php echo $art_data[0]['art_post_id']; ?>)" class="dropbtn1 dropbtn1 fa fa-ellipsis-v"></a>
                     <div id="<?php echo "myDropdown" . $art_data[0]['art_post_id']; ?>" class="dropdown-content1">
                        <?php
                           $userid = $this->session->userdata('aileenuser');
                           if ($art_data[0]['user_id'] == $userid) {
                               ?>
                        <a href="<?php echo "#popup2" . $row['art_post_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>
                        <a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <?php } else { ?>
                        <a href="<?php echo "#popup5" . $row['art_post_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>
                        <?php
                           $userid = $this->session->userdata('aileenuser');
                           $contition_array = array('user_id' => $userid, 'post_save' => '1', 'post_id ' => $row['art_post_id']);
                           $artsave = $this->data['artsave'] = $this->common->select_data_by_condition('art_post_save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                           
                           if ($artsave) {
                               ?>
                        <a><i class="fa fa-bookmark" aria-hidden="true"></i>Saved Post</a>
                        <?php } else { ?>
                        <a id="<?php echo $row['art_post_id']; ?>" onClick="save_post(this.id)" href="#popup1" class="<?php echo 'savedpost' . $row['art_post_id']; ?>"><i class="fa fa-bookmark" aria-hidden="true"></i>Save Post</a>
                        <?php } ?>
                        <a href="<?php echo base_url('artistic/artistic_contactperson/' . $art_data[0]['user_id'] . ''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="post-design-desc">
                     <span>
                        <div class="ft-15 t_artd">
                           <div id="<?php echo 'editpostdata' . $art_data[0]['art_post_id']; ?>" style="display:block;">
                              <a><?php print text2link($art_data[0]['art_post']); ?></a>
                           </div>
                           <div id="<?php echo 'editpostbox' . $art_data[0]['art_post_id']; ?>" style="display:none;">
                              <input type="text" id="<?php echo 'editpostname' . $art_data[0]['art_post_id']; ?>" name="editpostname" value="<?php echo $art_data[0]['art_post']; ?>">
                           </div>
                           <div id="<?php echo 'editpostdetails' . $art_data[0]['art_post_id']; ?>" style="display:block; margin-bottom: 10px;"><span class="show">
                              <?php print text2link($art_data[0]['art_description']); ?></span>
                           </div>
                        </div>
                        <div id="<?php echo 'editpostdetailbox' . $art_data[0]['art_post_id']; ?>" style="display:none;">
                           <div style="" contenteditable="true" id="<?php echo 'editpostdesc' . $art_data[0]['art_post_id']; ?>" name="editpostdesc" class="editable_text " ><?php echo $art_data[0]['art_description']; ?>
                           </div>
                        </div>
                        <button class="fr" id="<?php echo "editpostsubmit" . $art_data[0]['art_post_id']; ?>" style="display:none; margin: 5px 0px; " onClick="edit_postinsert(<?php echo $art_data[0]['art_post_id']; ?>)">Save</button>
                     </span>
                  </div>
               </div>
               <div class="post-design-mid col-md-12" >
                  <!-- 13-4 multiple image code  start-->
                  <!-- multiple image code  start-->
                  <!-- done  start-->
                  <div>
                     <?php
                        $contition_array = array('post_id' => $art_data[0]['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                        $artmultiimage = $this->data['artmultiimage'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        ?>
                     <?php
                        $i = 1;
                        foreach ($artmultiimage as $data) {
                        
                        
                            $allowed = array('gif', 'png', 'jpg');
                            $allowespdf = array('pdf');
                            $allowesvideo = array('mp4', '3gp');
                            $allowesaudio = array('mp3');
                            $filename = $data['image_name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        
                            if (in_array($ext, $allowed)) {
                                ?>
                     <div id="basic-responsive-image" >
                        <img src="<?php echo base_url($this->config->item('art_post_thumb_upload_path')  . $data['image_name']) ?>"  onclick="openModal();
                           currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
                        <!--                                                    <img src="<?php //echo base_url(ARTPOSTIMAGE . str_replace(" ", "_", $data['image_name'])) ?>" style="width: 100%; height: 100%;"  class="hover-shadow cursor">-->
                     </div>
                     <?php } elseif (in_array($ext, $allowesvideo)) { ?>
                     <!-- one video start -->
                     <div>
                        <video style="height: 50%; width: 100%; margin-bottom: 10px;"controls>
                           <source src="<?php echo base_url(ARTPOSTIMAGE . $data['image_name']); ?>" type="video/mp4">
                           <source src="movie.ogg" type="video/ogg">
                           Your browser does not support the video tag.
                        </video>
                     </div>
                     <!-- one video end -->
                     <?php } elseif (in_array($ext, $allowesaudio)) { ?>
                     <!-- one audio start -->
                     <div>
                        <audio style="height: 50%; width: 100%; margin-bottom: 10px;" controls>
                           <source src="<?php echo base_url(ARTPOSTIMAGE . $data['image_name']); ?>" type="audio/mp3">
                           <source src="movie.ogg" type="audio/ogg">
                           Your browser does not support the audio tag.
                        </audio>
                     </div>
                     <!-- one audio end -->
                     <?php } ?>
                     <?php $i++;
                        }
                        ?>
                  </div>
                  <!-- done  end-->
                  <!-- silder start -->
                  <div id="myModal1" class="modal2">
                   
                     <div class="modal-content2">
                        <!--  multiple image start -->
                          <span class="close2 cursor" onclick="closeModal()">&times;</span>
                        <?php
                           $i = 1;
                           $allowed = array('gif', 'png', 'jpg');
                           foreach ($artmultiimage as $mke => $mval) {
                               $ext = pathinfo($mval['image_name'], PATHINFO_EXTENSION);
                               if (in_array($ext, $allowed)) {
                                   $databus1[] = $mval;
                               }
                           }
                           
                           foreach ($databus1 as $artdata) {
                               ?>
                        <div class="mySlides">
                           <div class="numbertext"><?php echo $i ?> / <?php echo count($databus1) ?></div>
                           <div class="slider_img">
                              <img src="<?php echo base_url($this->config->item('art_post_main_upload_path')   .$artdata['image_name']) ?>" >
                           </div>
                           <!-- 9-5 like comment start -->
                           <div class="post-design-like-box col-md-12">
                              <div class="post-design-menu">
                                 <!-- like comment div start -->
                                 <ul class="col-md-6">
                                    <li class="<?php echo 'likepostimg' . $artdata['image_id']; ?>">
                                       <a id="<?php echo $artdata['image_id']; ?>" onClick="post_likeimg(this.id)">
                                          <?php
                                             $userid = $this->session->userdata('aileenuser');
                                             $contition_array = array('post_image_id' => $artdata['image_id'], 'user_id' => $userid, 'is_unlike' => 0);
                                             
                                             $activedata = $this->data['activedata'] = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                             
                                             if ($activedata) {
                                                 ?>
                                          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                          <?php } else { ?>
                                          <i class="fa fa-thumbs-up fa-1x main_color" aria-hidden="true"></i>
                                          <?php } ?>
                                          <!--  <span class="<?php echo 'likeimage' . $artdata['image_id']; ?>"> <?php
                                             $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => 0);
                                             $likecount = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                             
                                             if ($likecount) {
                                                 echo count($likecount);
                                             }
                                             ?>
                                             </span> -->
                                       </a>
                                    </li>
                                    <li id="<?php echo "insertcountimg" . $artdata['image_id']; ?>" style="visibility:show">
                                       <?php
                                          $contition_array = array('post_image_id' => $artdata['image_id'], 'is_delete' => '0');
                                          $commnetcount = $this->common->select_data_by_condition('art_post_image_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                          ?>
                                       <a onClick="commentallimg(this.id)" id="<?php echo $artdata['image_id']; ?>">
                                          <i class="fa fa-comment-o" aria-hidden="true">
                                             <!--      <?php
                                                if (count($commnetcount) > 0) {
                                                    echo count($commnetcount);
                                                }
                                                ?> -->
                                          </i>
                                       </a>
                                    </li>
                                 </ul>
                                 <ul class="col-md-6 like_cmnt_count">
                                    <li>
                                       <div class="like_cmmt_space comnt_count_ext_a like_count_ext<?php echo $row['art_post_id']; ?>">
                                          <span class="comment_count" > 
                                          <?php
                                             if (count($commnetcount) > 0) {
                                                 echo count($commnetcount); ?>
                                          </span> 
                                          <span> Comment</span>
                                          <?php }
                                             ?> 
                                       </div>
                                    </li>
                                    <li>
                                       <div class="comnt_count_ext_a <?php echo 'comnt_count_ext' . $row['art_post_id']; ?>">
                                          <span class="comment_like_count"> 
                                          <?php echo "hiiii";   
                                             if ($row['art_likes_count'] > 0) { 
                                                 echo $row['art_likes_count']; ?>
                                          </span> 
                                          <span> Like</span>
                                          <?php   }
                                             ?> 
                                       </div>
                                    </li>
                                 </ul>
                                 <!-- like comment div end -->
                              </div>
                           </div>
                           <!-- like user list start -->
                           <!-- pop up box start-->
                           <?php
                              $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => '0');
                              $commnetlike = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                              if (count($commnetlike) > 0) {
                                 ?>
                           <div class="likeduserlistimg<?php echo $artdata['image_id']; ?>">
                              <?php
                                 $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => '0');
                                 $commnetcount = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                 // echo '<pre>'; print_r($commnetcount);
                                 foreach ($commnetcount as $comment) {
                                    $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $comment['user_id'], 'status' => 1))->row()->art_name;
                                    $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $comment['user_id'], 'status' => 1))->row()->art_lastname;
                                     ?>
                              <?php } ?>
                              <!-- pop up box end-->
                              <a href="javascript:void(0);"  onclick="likeuserlistimg(<?php echo $artdata['image_id']; ?>);">
                                 <?php
                                    $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => '0');
                                    $commnetcount = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                    
                                      
                                      $art_fname = $this->db->get_where('art_reg', array('user_id' => $commnetcount[0]['user_id'], 'status' => 1))->row()->art_name;
                                      $art_lname = $this->db->get_where('art_reg', array('user_id' => $commnetcount[0]['user_id'], 'status' => 1))->row()->art_lastname;
                                        ?>
                                 <div class="like_one_other">
                                    <?php
                                       echo ucwords($art_fname);
                                       echo "&nbsp;";
                                       echo ucwords($art_lname);
                                       echo "&nbsp;";
                                       ?>
                                    <?php
                                       if (count($commnetcount) > 1) {
                                           echo "and ";
                                            echo '' . count($commnetcount) - 1 . '';
                                           echo "&nbsp;";
                                           echo "others";
                                       }
                                       ?>
                                 </div>
                              </a>
                           </div>
                           <?php
                              }
                              ?>
                           <div class="<?php echo "likeusernameimg" . $artdata['image_id']; ?>" id="<?php echo "likeusernameimg" . $artdata['image_id']; ?>" style="display:none">
                              <?php
                                 $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => '0');
                                    $commnetcount = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                  // echo '<pre>'; print_r($commnetcount);
                                    foreach ($commnetcount as $comment) {
                                       $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $comment['user_id'], 'status' => 1))->row()->art_name;
                                       $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $comment['user_id'], 'status' => 1))->row()->art_lastname;
                                    ?>
                              <?php } ?>
                              <!-- pop up box end-->
                              <a href="javascript:void(0);"  onclick="likeuserlistimg(<?php echo $artdata['image_id']; ?>);">
                                 <?php
                                    $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => '0');
                                    $commnetcount = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                    
                                      
                                      $art_fname = $this->db->get_where('art_reg', array('user_id' => $commnetcount[0]['user_id'], 'status' => 1))->row()->art_name;
                                      $art_lname = $this->db->get_where('art_reg', array('user_id' => $commnetcount[0]['user_id'], 'status' => 1))->row()->art_lastname;
                                        ?>
                                 <div class="like_one_other">
                                    <?php
                                       echo ucwords($art_fname);
                                       echo "&nbsp;";
                                       echo ucwords($art_lname);
                                       echo "&nbsp;";
                                       ?>
                                    <?php
                                       if (count($commnetcount) > 1) {
                                           echo "and ";
                                            echo '' . count($commnetcount) - 1 . '';
                                           echo "&nbsp;";
                                           echo "others";
                                       }
                                       ?>
                                 </div>
                              </a>
                           </div>
                           <!-- like user list end -->
                           <div class="art-all-comment col-md-12">
                              <!-- 18-4 all comment start-->
                              <div id="<?php echo "fourcommentimg" . $artdata['image_id']; ?>" style="display:none">
                              </div>
                              <!-- khyati changes start -->
                              <div  id="<?php echo "threecommentimg" . $artdata['image_id']; ?>" style="display:block">
                                 <div class="<?php echo 'insertcommentimg' . $artdata['image_id']; ?>">
                                    <?php
                                       $contition_array = array('post_image_id' => $artdata['image_id'], 'is_delete' => '0');
                                       $artmulimage = $this->common->select_data_by_condition('art_post_image_comment', $contition_array, $data = '*', $sortby = 'post_image_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');
                                       if ($artmulimage) {
                                           foreach ($artmulimage as $rowdata) {
                                               $companyname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_name;
                                               ?>
                                    <div class="all-comment-comment-box">
                                       <div class="post-design-pro-comment-img"> 
                                          <?php
                                             $art_userimage = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image;
                                             ?>
                                          <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>"  alt="">
                                       </div>
                                       <div class="comment-name">
                                          <b>  <?php
                                             echo ucwords($companyname);
                                             echo '</br>';
                                             ?>
                                          </b>
                                       </div>
                                       <div class="comment-details" id= "<?php echo "showcommentimg" . $rowdata['post_image_comment_id']; ?>">
                                          <?php
                                             echo $rowdata['comment'];
                                             echo '</br>';
                                             ?>
                                       </div>
                                       <div class="edit-comment-box">
                                          <div class="inputtype-edit-comment">
                                             <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="<?php echo $rowdata['post_image_comment_id']; ?>"  id="editcommentimg<?php echo $rowdata['post_image_comment_id']; ?>" placeholder="Enter Your Comment " value= ""  onkeyup="commenteditimg(<?php echo $rowdata['post_image_comment_id']; ?>)"><?php echo $rowdata['comment']; ?></div>
                                             <span class="comment-edit-button"><button id="<?php echo "editsubmitimg" . $rowdata['post_image_comment_id']; ?>" style="display:none" onClick="edit_commentimg(<?php echo $rowdata['post_image_comment_id']; ?>)">Save</button></span>
                                          </div>
                                       </div>
                                       <div class="art-comment-menu-design">
                                          <div class="comment-details-menu" id="<?php echo 'likecommentimg' . $rowdata['post_image_comment_id']; ?>">
                                             <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="comment_likeimg(this.id)">
                                             <?php
                                                $userid = $this->session->userdata('aileenuser');
                                                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'user_id' => $userid, 'is_unlike' => 0);
                                                
                                                $artcommentlike1 = $this->common->select_data_by_condition('art_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                if (count($artcommentlike1) == 0) {
                                                    ?>
                                             <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>
                                             <?php } else { ?>
                                             <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                             <?php } ?>
                                             <span>
                                             <?php
                                                $contition_array = array('post_image_comment_id' => $rowdata['post_image_comment_id'], 'is_unlike' => '0');
                                                $mulcountlike = $this->data['mulcountlike'] = $this->common->select_data_by_condition('art_comment_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                
                                                if (count($mulcountlike) > 0) {
                                                    echo count($mulcountlike);
                                                }
                                                ?>
                                             </span>
                                             </a>
                                          </div>
                                          <?php
                                             $userid = $this->session->userdata('aileenuser');
                                             
                                             if ($rowdata['user_id'] == $userid) {
                                                 ?> 
                                          <span role="presentation" aria-hidden="true"> · </span>
                                          <div class="comment-details-menu">
                                             <div id="<?php echo 'editcommentboximg' . $rowdata['post_image_comment_id']; ?>" style="display:block;">
                                                <a id="<?php echo $rowdata['post_image_comment_id']; ?>" onClick="comment_editboximg(this.id)" class="editbox">Edit
                                                </a>
                                             </div>
                                             <div id="<?php echo 'editcancleimg' . $rowdata['post_image_comment_id']; ?>" style="display:none;">
                                                <a id="<?php echo $rowdata['post_image_comment_id']; ?>" onClick="comment_editcancleimg(this.id)">Cancel
                                                </a>
                                             </div>
                                          </div>
                                          <?php } ?>
                                          <?php
                                             $userid = $this->session->userdata('aileenuser');
                                             
                                             $business_userid = $this->db->get_where('art_post', array('art_post_id' => $rowdata['post_image_id'], 'status' => 1))->row()->user_id;
                                             
                                             
                                             if ($rowdata['user_id'] == $userid || $business_userid == $userid) {
                                              ?> 
                                          <span role="presentation" aria-hidden="true"> · </span>
                                          <div class="comment-details-menu">
                                             <input type="hidden" name="post_deleteimg"  id="post_deleteimg" value= "<?php echo $rowdata['post_image_id']; ?>">
                                             <a id="<?php echo $rowdata['post_image_comment_id']; ?>"   onClick="comment_deleteimg(this.id)"> Delete<span class="<?php echo 'insertcommentimg' . $rowdata['post_image_comment_id']; ?>">
                                             </span>
                                             </a>
                                          </div>
                                          <?php } ?>
                                          <span role="presentation" aria-hidden="true"> · </span>
                                          <div class="comment-details-menu">
                                             <p> <?php
                                                /*   $new_date = date('Y-m-d H:i:s',strtotime($rowdata['created_date']));
                                                 */
                                                /*                          $new_time = $this->time_elapsed_string($new_date);
                                                 */
                                                //                          echo $new_time. '<br>';
                                                echo date('d-M-Y', strtotime($rowdata['created_date']));
                                                echo '</br>';
                                                ?>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </div>
                              </div>
                              <!-- khyati changes end -->
                              <!-- all comment end-->
                           </div>
                           <?php //  }   ?>
                           <div class="post-design-commnet-box col-md-12">
                              <?php
                                 $userid = $this->session->userdata('aileenuser');
                                 $art_userimage = $this->db->get_where('art_reg', array('user_id' => $userid, 'status' => 1))->row()->art_user_image;
                                 ?>
                              <div class="post-design-proo-img">
                                 <?php if ($art_userimage) { ?>
                                 <img src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>" name="image_src" id="image_src" />
                                 <?php
                                    } else {
                                        ?>
                                 <img src="<?php echo base_url(NOIMAGE); ?>" alt="No Image">
                                 <?php
                                    }
                                    ?>
                              </div>
                              <div class="">
                                 <div id="content" class="col-md-10 inputtype-comment" style="padding-left: 7px !important;">
                                    <div contenteditable="true" style="min-height:37px !important; margin-top: 0px!important" class="editable_text" name="<?php echo $artdata['image_id']; ?>"  id="<?php echo "post_commentimg" . $artdata['image_id']; ?>" placeholder="Type Message ..." onkeyup="entercommentimg(<?php echo $artdata['image_id']; ?>)"></div>
                                 </div>
                                 <?php echo form_error('post_commentimg'); ?>
                                 <div class=" comment-edit-butn">   
                                    <button id="<?php echo $artdata['image_id']; ?>" onClick="insert_commentimg(this.id)">Comment</button> 
                                 </div>
                              </div>
                           </div>
                           <!-- 9-5 like comment end -->
                        </div>
                        <?php
                           $i++;
                           }
                           ?>
                        <!-- slider image rotation end  -->
                        <a class="prev" style="left: 10" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        <div class="caption-container">
                           <p id="caption"></p>
                        </div>
                     </div>
                  </div>
                  <!-- slider end -->
                  <!-- data khyati end -->   
               </div>
               <div class="post-design-like-box col-md-12">
                  <div class="post-design-menu">
                     <ul class="col-md-6">
                        <li class="<?php echo 'likepost' . $art_data[0]['art_post_id']; ?>">
                           <a id="<?php echo $art_data[0]['art_post_id']; ?>"   onClick="post_like(this.id)">
                              <?php
                                 $userid = $this->session->userdata('aileenuser');
                                 $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1');
                                 $active = $this->data['active'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                 $likeuser = $this->data['active'][0]['art_like_user'];
                                 $likeuserarray = explode(',', $active[0]['art_like_user']);
                                 if (!in_array($userid, $likeuserarray)) {
                                 ?>               
                              <i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>
                              <?php } else { ?> 
                              <i class="fa fa-thumbs-up main_color" aria-hidden="true"></i>
                              <?php } ?>
                              <span>
                                 <!--  <?php
                                    if ($art_data[0]['art_likes_count'] > 0) {
                                          echo $art_data[0]['art_likes_count'];
                                      }
                                    ?> -->
                              </span>
                           </a>
                        </li>
                        <li id="<?php echo 'insertcount' . $art_data[0]['art_post_id']; ?>" style="visibility:show">
                           <?php
                              $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                              $commnetcount = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                              ?>
                           <a  onClick="commentall(this.id)" id="<?php echo $art_data[0]['art_post_id']; ?>">
                              <i class="fa fa-comment-o" aria-hidden="true">
                                 <!--  
                                    <?php
                                       if (count($commnetcount) > 0) {
                                           echo count($commnetcount);
                                       } else {
                                           
                                       }
                                       ?> -->
                              </i>
                           </a>
                        </li>
                     </ul>
                     <ul class="col-md-6 like_cmnt_count">
                        <li>
                           <div class="like_cmmt_space comnt_count_ext_a like_count_ext<?php echo $row['art_post_id']; ?>">
                              <span class="comment_count" > 
                              <?php
                                 if (count($commnetcount) > 0) {
                                     echo count($commnetcount); ?>
                              </span> 
                              <span> Comment</span>
                              <?php }
                                 ?> 
                           </div>
                        </li>
                        <li>
                           <div class="comnt_count_ext_a <?php echo 'comnt_count_ext' . $row['art_post_id']; ?>">
                              <span class="comment_like_count"> 
                              <?php
                                 if ($art_data[0]['art_likes_count'] > 0) { 
                                     echo $art_data[0]['art_likes_count']; ?>
                              </span> 
                              <span> Like</span>
                              <?php   }
                                 ?> 
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <!-- like user list start -->
               <!-- pop up box start-->
               <?php
                  if ($art_data[0]['art_likes_count'] > 0) {
                      ?>
               <div class="likeduserlist<?php echo $art_data[0]['art_post_id'] ?>">
                  <?php
                     $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                     $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                     $likeuser = $commnetcount[0]['art_like_user'];
                     $countlike = $commnetcount[0]['art_likes_count'] - 1;
                     $likelistarray = explode(',', $likeuser);
                     foreach ($likelistarray as $key => $value) {
                         $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_name;
                         $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_lastname;
                         ?>
                  <?php } ?>
                  <!-- pop up box end-->
                  <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $art_data[0]['art_post_id']; ?>);">
                     <?php
                        $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                        $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        
                        $likeuser = $commnetcount[0]['art_like_user'];
                        $countlike = $commnetcount[0]['art_likes_count'] - 1;
                        
                        $likelistarray = explode(',', $likeuser);
                         $likelistarray = array_reverse($likelistarray);
                        $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                        $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                        ?>
                     <div class="like_one_other">
                        <?php 
                                                                $userid = $this->session->userdata('aileenuser');

                                                                if ($userid == $likelistarray[0]) {

                                                                    echo "You";
                                                                } else {
                                                                    echo ucwords($art_fname);
                                                                    echo "&nbsp;";
                                                                    echo ucwords($art_lname);
                                                                    echo "&nbsp;";
                                                                }
                                                                ?>
                     </div>
                  </a>
               </div>
               <?php
                  }
                  ?>
               <div class="<?php echo "likeusername" . $art_data[0]['art_post_id']; ?>" id="<?php echo "likeusername" . $art_data[0]['art_post_id']; ?>" style="display:none">
                  <?php
                     $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                     $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                     $likeuser = $commnetcount[0]['art_like_user'];
                     $countlike = $commnetcount[0]['art_likes_count'] - 1;
                     $likelistarray = explode(',', $likeuser);
                     foreach ($likelistarray as $key => $value) {
                         $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_name;
                         $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_lastname;
                         ?>
                  <?php } ?>
                  <!-- pop up box end-->
                  <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $art_data[0]['art_post_id']; ?>);">
                     <?php
                        $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                        $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        
                        $likeuser = $commnetcount[0]['art_like_user'];
                        $countlike = $commnetcount[0]['art_likes_count'] - 1;
                        
                        $likelistarray = explode(',', $likeuser);
                        $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                        $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                        ?>
                     <div class="like_one_other">
                        <?php
                           echo ucwords($art_fname);
                           echo "&nbsp;";
                           echo ucwords($art_lname);
                           echo "&nbsp;";
                           ?>
                        <?php
                           if (count($likelistarray) > 1) {
                               echo "and ";
                               echo $countlike;
                               echo "&nbsp;";
                               echo "others";
                           }
                           ?>
                     </div>
                  </a>
               </div>
               <!-- like user list end -->
               <!-- 8-5 comment start -->
               <div class="art-all-comment col-md-12">
                  <!-- 18-4 all comment start-->
                  <div id="<?php echo "fourcomment" . $art_data[0]['art_post_id']; ?>" style="display:none">
                  </div>
                  <!-- khyati changes start -->
                  <div  id="<?php echo "threecomment" . $art_data[0]['art_post_id']; ?>" style="display:block">
                     <div class="<?php echo 'insertcomment' . $art_data[0]['art_post_id']; ?>">
                        <?php
                           $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1');
                           $artdata = $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');
                           
                           if ($artdata) {
                               foreach ($artdata as $rowdata) {
                                   $artname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_name;
                                   $artlastname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_lastname;
                                   ?>
                        <div class="all-comment-comment-box">
                           <div class="post-design-pro-comment-img"> 
                              <?php
                                 $art_userimage = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image;
                                 ?>
                              <?php if ($art_userimage) { ?>
                              <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>"  alt="">
                              <?php
                                 } else {
                                     ?>
                              <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                              <?php
                                 }
                                 ?>
                           </div>
                           <div class="comment-name">
                              <b title=" <?php
                                 echo ucwords($artname);
                                 echo "&nbsp;";
                                 echo ucwords($artlastname);
                                 ?>">
                              <?php
                                 echo ucwords($artname);
                                 echo "&nbsp;";
                                 echo ucwords($artlastname);
                                 ?></b><?php echo '</br>'; ?>
                           </div>
                           <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['artistic_post_comment_id']; ?>">
                              <?php
                                 echo text2link($rowdata['comments']);
                                 ?>
                           </div>
                           <!--                                                                        <div class="col-md-12">
                              <div class="col-md-10">
                                  <div contenteditable="true"   class="editable_text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>" id="<?php echo "editcomment" . $rowdata['artistic_post_comment_id']; ?>" style="display:none;-webkit-min-height: 40px;" onClick="commentedit(<?php echo $rowdata['artistic_post_comment_id']; ?>)" style="height:50px;" ><?php echo $rowdata['comments']; ?></div>
                              </div>
                              
                              <div class="col-md-2 comment-edit-button">
                                  <button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Comment</button>
                              </div>
                              
                              </div>-->
                           <div class="edit-comment-box">
                              <div class="inputtype-edit-comment">
                                 <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>"  id="editcomment<?php echo $rowdata['artistic_post_comment_id']; ?>" placeholder="Enter Your Comment " value= ""  onkeyup="commentedit(<?php echo $rowdata['artistic_post_comment_id']; ?>)"><?php echo $rowdata['comments']; ?></div>
                                 <span class="comment-edit-button"><button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Save</button></span>
                              </div>
                           </div>
                           <div class="art-comment-menu-design">
                              <div class="comment-details-menu" id="<?php echo 'likecomment1' . $rowdata['artistic_post_comment_id']; ?>">
                                 <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like1(this.id)">
                                 <?php
                                    $userid = $this->session->userdata('aileenuser');
                                    $contition_array = array('artistic_post_comment_id' => $rowdata['artistic_post_comment_id'], 'status' => '1');
                                    $artcommentlike = $this->data['artcommentlike'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                    $likeuserarray = explode(',', $artcommentlike[0]['artistic_comment_like_user']);
                                    
                                    if (!in_array($userid, $likeuserarray)) {
                                        ?>
                                 <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> 
                                 <?php } else {
                                    ?>
                                 <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                 <?php }
                                    ?>
                                 <span>
                                 <?php
                                    if ($rowdata['artistic_comment_likes_count'] > 0) {
                                        echo $rowdata['artistic_comment_likes_count'];
                                    }
                                    ?>
                                 </span>
                                 </a>
                              </div>
                              <?php
                                 $userid = $this->session->userdata('aileenuser');
                                 
                                 if ($rowdata['user_id'] == $userid) {
                                     ?> 
                              <span role="presentation" aria-hidden="true"> · </span>
                              <div class="comment-details-menu">
                                 <div id="<?php echo 'editcommentbox' . $rowdata['artistic_post_comment_id']; ?>" style="display:block;">
                                    <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editbox(this.id)" class="editbox">Edit
                                    </a>
                                 </div>
                                 <div id="<?php echo 'editcancle' . $rowdata['artistic_post_comment_id']; ?>" style="display:none;">
                                    <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editcancle(this.id)">Cancel
                                    </a>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $userid = $this->session->userdata('aileenuser');
                                 
                                 $art_userid = $this->db->get_where('art_post', array('art_post_id' => $rowdata['art_post_id'], 'status' => 1))->row()->user_id;
                                 
                                 
                                 if ($rowdata['user_id'] == $userid || $art_userid == $userid) {
                                     ?> 
                              <span role="presentation" aria-hidden="true"> · </span>
                              <div class="comment-details-menu">
                                 <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['art_post_id']; ?>">
                                 <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                 </span>
                                 </a>
                              </div>
                              <?php } ?>
                              <span role="presentation" aria-hidden="true"> · </span>
                              <div class="comment-details-menu">
                                 <p> <?php
                                    /*   $new_date = date('Y-m-d H:i:s',strtotime($rowdata['created_date']));
                                     */
                                    /*                          $new_time = $this->time_elapsed_string($new_date);
                                     */
                                    //                          echo $new_time. '<br>';
                                    echo date('d-M-Y', strtotime($rowdata['created_date']));
                                    echo '</br>';
                                    ?>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                           }
                           ?>
                     </div>
                  </div>
                  <!-- khyati changes end -->
                  <!-- all comment end-->
               </div>
               <!-- 8-5 comment end -->
               <div class="post-design-commnet-box col-md-12">
                  <?php
                     $userid = $this->session->userdata('aileenuser');
                     $art_userimage = $this->db->get_where('art_reg', array('user_id' => $userid, 'status' => 1))->row()->art_user_image;
                     ?>
                  <div class="post-design-proo-img">
                     <?php if ($art_userimage) { ?>
                     <img src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>" name="image_src" id="image_src" />
                     <?php
                        } else {
                            ?>
                     <img src="<?php echo base_url(NOIMAGE); ?>" alt="No Image">
                     <?php
                        }
                        ?>
                  </div>
                  <div class="">
                     <div id="content" class="col-md-10 inputtype-comment" style="padding-left: 7px !important;">
                        <div contenteditable="true" style="min-height:37px !important; margin-top: 0px!important" class="editable_text" name="<?php echo $art_data[0]['art_post_id']; ?>"  id="<?php echo "post_comment" . $art_data[0]['art_post_id']; ?>" placeholder="Type Message ..." onClick="entercomment(<?php echo $art_data[0]['art_post_id']; ?>)"></div>
                     </div>
                     <?php echo form_error('post_comment'); ?>
                     <div class="comment-edit-butn">   
                        <button id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </section>
      <footer>
         <!-- Bid-modal  -->
         <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
            <div class="modal-dialog modal-lm">
               <div class="modal-content">
                  <button type="button" class="modal-close" data-dismiss="modal">&times;
                  </button>       
                  <div class="modal-body">
                     <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                     <span class="mes">
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <!-- Model Popup Close -->
      </footer>
   </body>
   <!-- Model Popup Close -->
   <!-- Bid-modal-2  -->
   <div class="modal fade message-box" id="likeusermodal" role="dialog">
      <div class="modal-dialog modal-lm">
         <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
               <span class="mes">
               </span>
            </div>
         </div>
      </div>
   </div>
   <!-- Model Popup Close -->
</html>
<!-- script for skill textbox automatic start (option 2)-->
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/select2-4.0.3.min.js'); ?>"></script>
<!-- script for skill textbox automatic end (option 2)-->
<script src="<?php echo base_url('js/jquery.jMosaic.js'); ?>"></script>
<script type="text/javascript">
   //For blocks or images of size, you can use $(document).ready
   $(document).ready(function () {
       $('.blocks').jMosaic({items_type: "li", margin: 0});
       $('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
   });
   //If this image without attribute WIDTH or HEIGH, you can use $(window).load
   $(window).load(function () {
       //$('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
   });
   //You can update on $(window).resize
   $(window).resize(function () {
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
       if (n > slides.length) {
           slideIndex = 1
       }
       if (n < 1) {
           slideIndex = slides.length
       }
       for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";
       }
       for (i = 0; i < dots.length; i++) {
           dots[i].className = dots[i].className.replace(" active", "");
       }
       slides[slideIndex - 1].style.display = "block";
       dots[slideIndex - 1].className += " active";
       captionText.innerHTML = dots[slideIndex - 1].alt;
   }
</script>
<script>
   //select2 autocomplete start for skill
   $('#searchskills').select2({
   
       placeholder: 'Find Your Skills',
       ajax: {
   
           url: "<?php echo base_url(); ?>artistic/keyskill",
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
   //select2 autocomplete End for skill
   //select2 autocomplete start for Location
   $('#searchplace').select2({
   
       placeholder: 'Find Your Location',
       maximumSelectionLength: 1,
       ajax: {
   
           url: "<?php echo base_url(); ?>artistic/location",
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
<!-- popup form edit start -->
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
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<script type="text/javascript">
   //validation for edit email formate form
   $(document).ready(function () {
       $("#artpostform").validate({
           rules: {
               postname: {
                   required: true,
               },
               // skills: {
               //   require_from_group: [1, ".skill-group"]
               //     //required: true,
               // },
               // other_skill: {
               //     require_from_group: [1, ".skill-group"]
               //     //required: true,
               // },
               description: {
                   required: true,
               },
               // postattach: {
               //      required: true,
   
               //  },
           },
           messages: {
               postname: {
                   required: "Post name Is Required.",
               },
               // skills: {
               //     required: "Skill Is Required.",
   
               // },
               description: {
                   required: "Description is required",
               },
               // postattach: {
               //     required: "Attachment Is Required.",
   
               // },
           },
       });
   });
</script>
<!-- javascript validation End -->
<!-- comment like script start -->
<script type="text/javascript">
   function comment_like(clicked_id)
   {
   
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_comment" ?>',
           data: 'post_id=' + clicked_id,
           success: function (data) {
               $('#' + 'likecomment' + clicked_id).html(data);
           }
       });
   }
</script>
<script type="text/javascript">
   function comment_like1(clicked_id)
   {
   
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_comment1" ?>',
           data: 'post_id=' + clicked_id,
           success: function (data) {
               $('#' + 'likecomment1' + clicked_id).html(data);
           }
       });
   }
</script>
<!--comment like script end -->
<!-- comment delete script start -->
<script type="text/javascript">
   function comment_delete(clicked_id) {
   $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deleted(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   $('#bidmodal').modal('show');
   }
   
   function comment_deleted(clicked_id)
   {
   var post_delete = document.getElementById("post_delete");
   //alert(post_delete.value);
   $.ajax({
      type: 'POST',
      url: '<?php echo base_url() . "artistic/delete_comment" ?>',
      data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
      dataType: "json",
      success: function (data) {
          //alert('.' + 'insertcomment' + clicked_id);
          $('.' + 'insertcomment' + post_delete.value).html(data.comment);
          $('#' + 'insertcount' + post_delete.value).html(data.count);
          $('.post-design-commnet-box').show();
      }
   });
   }
   function comment_deletetwo(clicked_id)
   {
   $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   $('#bidmodal').modal('show');
   }
   
   function comment_deletedtwo(clicked_id)
   {
   var post_delete1 = document.getElementById("post_deletetwo");
   $.ajax({
      type: 'POST',
      url: '<?php echo base_url() . "artistic/delete_commenttwo" ?>',
      data: 'post_id=' + clicked_id + '&post_delete=' + post_delete1.value,
      dataType: "json",
      success: function (data) {
   
          // $('.' + 'insertcomment' + post_delete.value).html(data);
          $('.' + 'insertcommenttwo' + post_delete1.value).html(data.comment);
          $('#' + 'insertcount' + post_delete1.value).html(data.count);
          $('.post-design-commnet-box').show();
   
      }
   });
   }
</script>
<!--comment delete script end -->
<!-- comment insert script start -->
<script type="text/javascript">
   //                        function insert_comment(clicked_id)
   //                        {
   //                            var $field = $('#post_comment' + clicked_id);
   //                            var post_comment = $('#post_comment' + clicked_id).html();
   //                            
   //                            $('#post_comment' + clicked_id).html("");
   //
   //                            var x = document.getElementById('threecomment' + clicked_id);
   //                            var y = document.getElementById('fourcomment' + clicked_id);
   //
   //                            if (post_comment == '') {
   //
   //                                event.preventDefault();
   //                                return false;
   //                            } else {
   //
   //                                if (x.style.display === 'block' && y.style.display === 'none') {
   //
   //                                    $.ajax({
   //                                        type: 'POST',
   //                                        url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
   //                                        data: 'post_id=' + clicked_id + '&comment=' + post_comment,
   //                                        dataType: "json",
   //                                        success: function (data) {
   //
   //                                            //$('.' + 'insertcomment' + clicked_id).html(data);
   //                                            $('#' + 'insertcount' + clicked_id).html(data.count);
   //                                            $('.insertcomment' + clicked_id).html(data.comment);
   //
   //                                        }
   //                                    });
   //
   //                                } else {
   //
   //                                    $.ajax({
   //                                        type: 'POST',
   //                                        url: '<?php echo base_url() . "artistic/insert_comment" ?>',
   //                                        data: 'post_id=' + clicked_id + '&comment=' + post_comment,
   //                                        dataType: "json",
   //                                        success: function (data) {
   //                                            $('textarea').each(function () {
   //                                                $(this).val('');
   //                                            });
   //                                            $('#' + 'insertcount' + clicked_id).html(data.count);
   //                                            $('#' + 'fourcomment' + clicked_id).html(data.comment);
   //                                        }
   //                                    });
   //
   //                                }
   //                            }
   //
   //                        }
   
                           function insert_comment(clicked_id)
                           {
                               $("#post_comment" + clicked_id).click(function () {
                                   $(this).prop("contentEditable", true);
                                   $(this).html("");
                               });
   
                               var sel = $("#post_comment" + clicked_id);
                               var txt = sel.html();
                               if (txt == '') {
                                   return false;
                               }
   
                               $('#post_comment' + clicked_id).html("");
   
                               var x = document.getElementById('threecomment' + clicked_id);
                               var y = document.getElementById('fourcomment' + clicked_id);
                               
                               if (x.style.display === 'block' && y.style.display === 'none') {
                                   $.ajax({
                                       type: 'POST',
                                       url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
                                       data: 'post_id=' + clicked_id + '&comment=' + txt,
                                       dataType: "json",
                                       success: function (data) {
                                           $('textarea').each(function () {
                                               $(this).val('');
                                           });
                                           $('#' + 'insertcount' + clicked_id).html(data.count);
                                           $('.insertcomment' + clicked_id).html(data.comment);
   
                                       }
                                   });
   
                               } else {
   
                                   $.ajax({
                                       type: 'POST',
                                       url: '<?php echo base_url() . "artistic/insert_comment" ?>',
                                       data: 'post_id=' + clicked_id + '&comment=' + txt,
                                       dataType: "json",
                                       success: function (data) {
                                           $('textarea').each(function () {
                                               $(this).val('');
                                           });
                                           $('#' + 'insertcount' + clicked_id).html(data.count);
                                           $('#' + 'fourcomment' + clicked_id).html(data.comment);
                                       }
                                   });
                               }
                           }
   
                       
</script>
<!-- insert comment using enter -->
<script type="text/javascript">
   //                        function entercomment(clicked_id)
   //                        {
   //                            $('#post_comment' + clicked_id).keypress(function (e) {
   //                                if (e.keyCode == 13 && !e.shiftKey) {
   //                                    var val = $('#post_comment' + clicked_id).val();
   //                                    e.preventDefault();
   //
   //                                    if (window.preventDuplicateKeyPresses)
   //                                        return;
   //
   //                                    window.preventDuplicateKeyPresses = true;
   //                                    window.setTimeout(function () {
   //                                        window.preventDuplicateKeyPresses = false;
   //                                    }, 500);
   //                                    var x = document.getElementById('threecomment' + clicked_id);
   //                                    var y = document.getElementById('fourcomment' + clicked_id);
   //
   //                                    if (val == '') {
   //
   //                                        event.preventDefault();
   //                                        return false;
   //                                    } else {
   //
   //                                        if (x.style.display === 'block' && y.style.display === 'none') {
   //                                            $.ajax({
   //                                                type: 'POST',
   //                                                url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
   //                                                data: 'post_id=' + clicked_id + '&comment=' + val,
   //                                                dataType: "json",
   //                                                success: function (data) {
   //                                                    $('textarea').each(function () {
   //                                                        $(this).val('');
   //                                                    });
   //
   //                                                    //  $('.insertcomment' + clicked_id).html(data);
   //                                                    $('#' + 'insertcount' + clicked_id).html(data.count);
   //                                                    $('.insertcomment' + clicked_id).html(data.comment);
   //
   //                                                }
   //                                            });
   //
   //                                        } else {
   //
   //                                            $.ajax({
   //                                                type: 'POST',
   //                                                url: '<?php echo base_url() . "artistic/insert_comment" ?>',
   //                                                data: 'post_id=' + clicked_id + '&comment=' + val,
   //                                                // dataType: "json",
   //                                                success: function (data) {
   //                                                    $('textarea').each(function () {
   //                                                        $(this).val('');
   //                                                    });
   //                                                    $('#' + 'fourcomment' + clicked_id).html(data);
   //                                                }
   //                                            });
   //                                        }
   //                                    }
   //                                    e.preventDefault();
   //                                }
   //                            });
   //                        }
   
   
                           function entercomment(clicked_id)
                           {     
                               $("#post_comment" + clicked_id).click(function () {
                                   $(this).prop("contentEditable", true);
                               });
   
                               $('#post_comment' + clicked_id).keypress(function (e) {
   
                                   if (e.keyCode == 13 && !e.shiftKey) {
                                       e.preventDefault();
                                       var sel = $("#post_comment" + clicked_id);
                                       var txt = sel.html();
                                       if (txt == '') {
                                           return false;
                                       }
                                       $('#post_comment' + clicked_id).html("");
   
                                       if (window.preventDuplicateKeyPresses)
                                           return;
   
                                       window.preventDuplicateKeyPresses = true;
                                       window.setTimeout(function () {
                                           window.preventDuplicateKeyPresses = false;
                                       }, 500);
                                       
                                       var x = document.getElementById('threecomment' + clicked_id);
                                       var y = document.getElementById('fourcomment' + clicked_id);
                                       
                                       
                                     
                                       if (x.style.display === 'block' && y.style.display === 'none') {
                                           $.ajax({ 
                                               type: 'POST',
                                               url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
                                               data: 'post_id=' + clicked_id + '&comment=' + txt,
                                               dataType: "json",
                                               success: function (data) {
                                                   $('textarea').each(function () {
                                                       $(this).val('');
                                                   });
                                                   $('#' + 'insertcount' + clicked_id).html(data.count);
                                                   $('.insertcomment' + clicked_id).html(data.comment);
                                               }
                                           });
                                       } else {
                                           $.ajax({
                                               type: 'POST',
                                               url: '<?php echo base_url() . "artistic/insert_comment" ?>',
                                               data: 'post_id=' + clicked_id + '&comment=' + txt,
                                               dataType: "json",
                                               success: function (data) {
                                                   $('textarea').each(function () {
                                                       $(this).val('');
                                                   });
                                                   $('#' + 'insertcount' + clicked_id).html(data.count);
                                                   $('#' + 'fourcomment' + clicked_id).html(data.comment);
                                               }
                                           });
                                       }
                                   }
                               });
                               $(".scroll").click(function (event) {
                                   event.preventDefault();
                                   $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                               });
                           }
                       
</script>
<!--comment insert script end -->
<!--comment insert script end -->
<!-- comment edit script start -->
<!-- comment edit box start-->
<script type="text/javascript">
   function comment_editbox(clicked_id) {
   document.getElementById('editcomment' + clicked_id).style.display = 'inline-block';
   document.getElementById('showcomment' + clicked_id).style.display = 'none';
   document.getElementById('editsubmit' + clicked_id).style.display = 'inline-block';
   //document.getElementById('editbox' + clicked_id).style.display = 'none';
   document.getElementById('editcommentbox' + clicked_id).style.display = 'none';
   document.getElementById('editcancle' + clicked_id).style.display = 'block';
   $('.post-design-commnet-box').hide();
   }
   
   
   function comment_editcancle(clicked_id) {
   document.getElementById('editcommentbox' + clicked_id).style.display = 'block';
   document.getElementById('editcancle' + clicked_id).style.display = 'none';
   document.getElementById('editcomment' + clicked_id).style.display = 'none';
   document.getElementById('showcomment' + clicked_id).style.display = 'block';
   document.getElementById('editsubmit' + clicked_id).style.display = 'none';
   
   $('.post-design-commnet-box').show();
   }
   function comment_editboxtwo(clicked_id) {
   //                            alert('editcommentboxtwo' + clicked_id);
   //                            return false;
   $('div[id^=editcommenttwo]').css('display', 'none');
   $('div[id^=showcommenttwo]').css('display', 'block');
   $('button[id^=editsubmittwo]').css('display', 'none');
   $('div[id^=editcommentboxtwo]').css('display', 'block');
   $('div[id^=editcancletwo]').css('display', 'none');
   
   document.getElementById('editcommenttwo' + clicked_id).style.display = 'inline-block';
   document.getElementById('showcommenttwo' + clicked_id).style.display = 'none';
   document.getElementById('editsubmittwo' + clicked_id).style.display = 'inline-block';
   document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'none';
   document.getElementById('editcancletwo' + clicked_id).style.display = 'block';
   $('.post-design-commnet-box').hide();
   }
   
   
   function comment_editcancletwo(clicked_id) {
   
   document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'block';
   document.getElementById('editcancletwo' + clicked_id).style.display = 'none';
   
   document.getElementById('editcommenttwo' + clicked_id).style.display = 'none';
   document.getElementById('showcommenttwo' + clicked_id).style.display = 'block';
   document.getElementById('editsubmittwo' + clicked_id).style.display = 'none';
   $('.post-design-commnet-box').show();
   }
</script>
<!--comment edit box end-->
<script type="text/javascript">
   function edit_comment2(abc)
   {
       var post_comment_edit = document.getElementById("editcomment2" + abc);
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
           data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
           success: function (data) {
   
               document.getElementById('editcomment2' + abc).style.display = 'none';
               document.getElementById('showcomment2' + abc).style.display = 'block';
               document.getElementById('editsubmit2' + abc).style.display = 'none';
               document.getElementById('editbox2' + abc).style.display = 'block';
               document.getElementById('editcancle2' + abc).style.display = 'none';
               $('#' + 'showcomment2' + abc).html(data);
           }
       });
   }
</script>
<script type="text/javascript">
   function commentedit2(abc)
   {
   
       $(document).ready(function () {
           $('#editcomment2' + abc).keypress(function (e) {
               if (e.which == 13) {
                   var val = $('#editcomment2' + abc).val();
                   $.ajax({
                       type: 'POST',
                       url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                       data: 'post_id=' + abc + '&comment=' + val,
                       success: function (data) {
   
                           document.getElementById('editcomment2' + abc).style.display = 'none';
                           document.getElementById('showcomment2' + abc).style.display = 'block';
                           document.getElementById('editsubmit2' + abc).style.display = 'none';
                           document.getElementById('editbox2' + abc).style.display = 'block';
                           document.getElementById('editcancle2' + abc).style.display = 'none';
                           $('#' + 'showcomment2' + abc).html(data);
                       }
                   });
                   //alert(val);
               }
           });
       });
   }
</script>
<!--comment edit insert script end -->
<!-- popup box for post start -->
<script>
   // Get the modal
   var modal = document.getElementById('myModal');
   // Get the button that opens the modal
   var btn = document.getElementById("myBtn");
   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close1")[0];
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
<!-- popup form end-->
<script>
   /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
   function myFunction(clicked_id) {
       document.getElementById('myDropdown' + clicked_id).classList.toggle("show");
   }
   // Close the dropdown if the user clicks outside of it
   window.onclick = function (event) {
       if (!event.target.matches('.dropbtn1')) {
           var dropdowns = document.getElementsByClassName("dropdown-content1");
           var i;
           for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                   openDropdown.classList.remove('show');
               }
           }
       }
   }
</script>
<!-- further and less -->
<script>
   $(function () {
       var showTotalChar = 150, showChar = "more", hideChar = "";
       $('.show').each(function () {
           var content = $(this).text();
           if (content.length > showTotalChar) {
               var con = content.substr(0, showTotalChar);
               var hcon = content.substr(showTotalChar, content.length - showTotalChar);
               var txt = con + '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
               $(this).html(txt);
           }
       });
       $(".showmoretxt").click(function () {
           if ($(this).hasClass("sample")) {
               $(this).removeClass("sample");
               $(this).text(showChar);
           } else {
               $(this).addClass("sample");
               $(this).text(hideChar);
           }
           $(this).parent().prev().toggle();
           $(this).prev().toggle();
           return false;
       });
   });
</script>
<!-- multi image add post khyati start -->
<script type="text/javascript">
   //alert("a");
   var $fileUpload = $("#files"),
           $list = $('#list'),
           thumbsArray = [],
           maxUpload = 10;
   // READ FILE + CREATE IMAGE
   function read(f) {//alert("aa");
       return function (e) {
           var base64 = e.target.result;
           var $img = $('<img/>', {
               src: base64,
               title: encodeURIComponent(f.name), //( escape() is deprecated! )
               "class": "thumb"
           });
           var $thumbParent = $("<span/>", {html: $img, "class": "thumbParent"}).append('<span class="remove_thumb"/>');
           thumbsArray.push(base64); // Push base64 image into array or whatever.
           $list.append($thumbParent);
       };
   }
   // HANDLE FILE/S UPLOAD
   function handleFileSelect(e) {//alert("aaa");
       e.preventDefault(); // Needed?
       var files = e.target.files;
       var len = files.length;
       if (len > maxUpload || thumbsArray.length >= maxUpload) {
           return alert("Sorry you can upload only 5 images");
       }
       for (var i = 0; i < len; i++) {
           var f = files[i];
           if (!f.type.match('image.*'))
               continue; // Only images allowed    
           var reader = new FileReader();
           reader.onload = read(f); // Call read() function
           reader.readAsDataURL(f);
       }
   }
   $fileUpload.change(function (e) {//alert("aaaa");
       handleFileSelect(e);
   });
   $list.on('click', '.remove_thumb', function () {//alert("aaaaa");
       var $removeBtns = $('.remove_thumb'); // Get all of them in collection
       var idx = $removeBtns.index(this); // Exact Index-from-collection
       $(this).closest('span.thumbParent').remove(); // Remove tumbnail parent
       thumbsArray.splice(idx, 1); // Remove from array
   });
</script>
<!-- multi image add post khyati end -->
<!-- success message remove after some second start -->
<script language="javascript" type="text/javascript">
   $(document).ready(function () {
       $('.alert-danger').delay(3000).hide('700');
       $('.alert-success').delay(3000).hide('700');
   });
</script>
<!-- success message remove after some second end -->
<!-- edit post start -->
<script type="text/javascript">
   function editpost(abc)
   {
   
   
       document.getElementById('editpostdata' + abc).style.display = 'none';
       document.getElementById('editpostbox' + abc).style.display = 'block';
       document.getElementById('editpostdetails' + abc).style.display = 'none';
       document.getElementById('editpostdetailbox' + abc).style.display = 'block';
       document.getElementById('editpostsubmit' + abc).style.display = 'block';
   }
</script>
<script type="text/javascript">
   function edit_postinsert(abc)
   {
       var editpostname = document.getElementById("editpostname" + abc);
       var editpostdetails = document.getElementById("editpostdesc" + abc);
   
   // start khyati code
       var $field = $('#editpostdesc' + abc);
       //var data = $field.val();
       var editpostdetails = $('#editpostdesc' + abc).html();
   // end khyati code
   
   if(editpostname.value == '' && editpostdetails == ''){ 
   $('.biderror .mes').html("<div class='pop_content'>You must either fill title or description.");
   $('#bidmodal').modal('show');
   
   document.getElementById('editpostdata' + abc).style.display = 'block';
   document.getElementById('editpostbox' + abc).style.display = 'none';
   document.getElementById('editpostdetails' + abc).style.display = 'block';
   document.getElementById('editpostdetailbox' + abc).style.display = 'none';
   
   document.getElementById('editpostsubmit' + abc).style.display = 'none';
   }else{
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/edit_post_insert" ?>',
           data: 'art_post_id=' + abc + '&art_post=' + editpostname.value + '&art_description=' + editpostdetails,
           dataType: "json",
           success: function (data) {
   
               document.getElementById('editpostdata' + abc).style.display = 'block';
               document.getElementById('editpostbox' + abc).style.display = 'none';
               document.getElementById('editpostdetails' + abc).style.display = 'block';
               document.getElementById('editpostdetailbox' + abc).style.display = 'none';
               document.getElementById('editpostsubmit' + abc).style.display = 'none';
               $('#' + 'editpostdata' + abc).html(data.title);
               $('#' + 'editpostdetails' + abc).html(data.description);
           }
       }); }
   }
</script>
<!-- edit post end -->
<!-- remove save post start -->
<script type="text/javascript">
   function remove_post(abc)
   {
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/art_deletepost" ?>',
           data: 'art_post_id=' + abc,
           //alert(data);
           success: function (data) {
   
               $('#' + 'removepost' + abc).html(data);
           }
       });
   }
</script>
<!-- remove save post end -->
<!-- remove particular user post start -->
<script type="text/javascript">
   function del_particular_userpost(abc)
   {
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/del_particular_userpost" ?>',
           data: 'art_post_id=' + abc,
           //alert(data);
           success: function (data) {
   
               $('#' + 'removepost' + abc).html(data);
           }
       });
   }
</script>
<!-- remove particular user post end -->
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
       if (n > slides.length) {
           slideIndex = 1
       }
       if (n < 1) {
           slideIndex = slides.length
       }
       for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";
       }
       for (i = 0; i < dots.length; i++) {
           dots[i].className = dots[i].className.replace(" active", "");
       }
       slides[slideIndex - 1].style.display = "block";
       dots[slideIndex - 1].className += " active";
       captionText.innerHTML = dots[slideIndex - 1].alt;
   }
</script>
<!-- script for skill textbox automatic end (option 2)-->
<script>
   //select2 autocomplete start for Location
   $('#searchplace').select2({
   
       placeholder: 'Find Your Location',
       maximumSelectionLength: 1,
       ajax: {
   
           url: "<?php echo base_url(); ?>business_profile/location",
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
</script>
<!-- like comment script start -->
<!-- post like script start -->
<script type="text/javascript">
   function post_like(clicked_id)
   {
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_post" ?>',
           dataType: 'json',
           data: 'post_id=' + clicked_id,
           success: function (data) {
               $('.' + 'likepost' + clicked_id).html(data.like);
               $('.likeusername' + clicked_id).html(data.likeuser);
   
               $('.likeduserlist' + clicked_id).hide();
               if (data.like_user_count == '0') {
                   document.getElementById('likeusername' + clicked_id).style.display = "none";
               } else {
                   document.getElementById('likeusername' + clicked_id).style.display = "block";
               }
               $('#likeusername' + clicked_id).addClass('likeduserlist1');
           }
       });
   }
</script>
<!--post like script end -->
<!-- comment insert script start -->
<script type="text/javascript">
   function insert_comment(clicked_id)
   {
       var post_comment = document.getElementById("post_comment" + clicked_id);
       //alert(clicked_id);
       //alert(post_comment.value);
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/insert_comment" ?>',
           data: 'post_id=' + clicked_id + '&comment=' + post_comment.value,
           success: function (data) {
               $('input').each(function () {
                   $(this).val('');
               });
               $('.' + 'insertcomment' + clicked_id).html(data);
           }
       });
   }
</script>
<!-- hide and show data start-->
<script type="text/javascript">
   function commentall(clicked_id) {
   var x = document.getElementById('threecomment' + clicked_id);
   var y = document.getElementById('fourcomment' + clicked_id);
   var z = document.getElementById('insertcount' + clicked_id);
   
   if (x.style.display === 'block' && y.style.display === 'none') {
      x.style.display = 'none';
      y.style.display = 'block';
      z.style.visibility = 'show';
      $.ajax({
          type: 'POST',
          url: '<?php echo base_url() . "artistic/fourcomment" ?>',
          data: 'art_post_id=' + clicked_id,
          //alert(data);
          success: function (data) {
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
   //             url:'<?php echo base_url() . "artistic/fourcomment" ?>',
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
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_comment" ?>',
           data: 'post_id=' + clicked_id,
           success: function (data) { //alert('.' + 'likepost' + clicked_id);
               $('#' + 'likecomment' + clicked_id).html(data);
           }
       });
   }
</script>
<script type="text/javascript">
   function comment_like1(clicked_id)
   {
       //alert(clicked_id);
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_comment1" ?>',
           data: 'post_id=' + clicked_id,
           success: function (data) { //alert('.' + 'likepost' + clicked_id);
               $('#' + 'likecomment1' + clicked_id).html(data);
           }
       });
   }
</script>
<!-- comment edit insert start -->
<script type="text/javascript">
   function edit_comment(abc)
   {
   $("#editcomment" + abc).click(function () {
       $(this).prop("contentEditable", true);
   });
   
   var sel = $("#editcomment" + abc);
   var txt = sel.html();
   if (txt == '' || txt == '<br>') {
       $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
       return false;
   }
   $.ajax({
       type: 'POST',
       url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
       data: 'post_id=' + abc + '&comment=' + txt,
       success: function (data) {
           document.getElementById('editcomment' + abc).style.display = 'none';
           document.getElementById('showcomment' + abc).style.display = 'block';
           document.getElementById('editsubmit' + abc).style.display = 'none';
           document.getElementById('editcommentbox' + abc).style.display = 'block';
           document.getElementById('editcancle' + abc).style.display = 'none';
           $('#' + 'showcomment' + abc).html(data);
           $('.post-design-commnet-box').show();
       }
   });
   $(".scroll").click(function (event) {
       event.preventDefault();
       $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
   });
   }
</script>
<script type="text/javascript">
   function commentedit(abc)
   {
    $("#editcomment" + abc).click(function () {
        $(this).prop("contentEditable", true);
    });
    $('#editcomment' + abc).keypress(function (event) {
        if (event.which == 13 && event.shiftKey != 1) {
            event.preventDefault();
            var sel = $("#editcomment" + abc);
            var txt = sel.html();
            if (txt == '' || txt == '<br>') {
                $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                $('#bidmodal').modal('show');
                return false;
            }
            if (window.preventDuplicateKeyPresses)
                return;
            window.preventDuplicateKeyPresses = true;
            window.setTimeout(function () {
                window.preventDuplicateKeyPresses = false;
            }, 500);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                data: 'post_id=' + abc + '&comment=' + txt,
                success: function (data) {
                    document.getElementById('editcomment' + abc).style.display = 'none';
                    document.getElementById('showcomment' + abc).style.display = 'block';
                    document.getElementById('editsubmit' + abc).style.display = 'none';
                    document.getElementById('editcommentbox' + abc).style.display = 'block';
                    document.getElementById('editcancle' + abc).style.display = 'none';
                    $('#' + 'showcomment' + abc).html(data);
                    $('.post-design-commnet-box').show();
                }
            });
        }
    });
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
    });
   }
</script>
<script type="text/javascript">
   function edit_commenttwo(abc)
   {
   $("#editcommenttwo" + abc).click(function () {
       $(this).prop("contentEditable", true);
   });
   
   var sel = $("#editcommenttwo" + abc);
   var txt = sel.html();
   if (txt == '' || txt == '<br>') {
       $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
       return false;
   }
   $.ajax({
       type: 'POST',
       url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
       data: 'post_id=' + abc + '&comment=' + txt,
       success: function (data) {
           document.getElementById('editcommenttwo' + abc).style.display = 'none';
           document.getElementById('showcommenttwo' + abc).style.display = 'block';
           document.getElementById('editsubmittwo' + abc).style.display = 'none';
           document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
           document.getElementById('editcancletwo' + abc).style.display = 'none';
           $('#' + 'showcommenttwo' + abc).html(data);
           $('.post-design-commnet-box').show();
       }
   });
   $(".scroll").click(function (event) {
       event.preventDefault();
       $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
   });
   }
</script>
<script type="text/javascript">
   function commentedittwo(abc)
   {
    $("#editcommenttwo" + abc).click(function () {
        $(this).prop("contentEditable", true);
        //$(this).html("");
    });
    $('#editcommenttwo' + abc).keypress(function (event) {
        if (event.which == 13 && event.shiftKey != 1) {
            event.preventDefault();
            var sel = $("#editcommenttwo" + abc);
            var txt = sel.html();
            if (txt == '' || txt == '<br>') {
                $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                $('#bidmodal').modal('show');
                return false;
            }
   
            if (window.preventDuplicateKeyPresses)
                return;
   
            window.preventDuplicateKeyPresses = true;
            window.setTimeout(function () {
                window.preventDuplicateKeyPresses = false;
            }, 500);
   
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                data: 'post_id=' + abc + '&comment=' + txt,
                success: function (data) {
                    document.getElementById('editcommenttwo' + abc).style.display = 'none';
                    document.getElementById('showcommenttwo' + abc).style.display = 'block';
                    document.getElementById('editsubmittwo' + abc).style.display = 'none';
   
                    document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                    document.getElementById('editcancletwo' + abc).style.display = 'none';
   
                    $('#' + 'showcommenttwo' + abc).html(data);
                    $('.post-design-commnet-box').show();
   
                }
            });
        }
    });
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
    });
   }
</script>
<!--comment edit insert script end -->
<!-- like comment script end -->
<!-- popup box for post start -->
<script>
   // Get the modal
   var modal = document.getElementById('myModal');
   // Get the button that opens the modal
   var btn = document.getElementById("myBtn");
   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close1")[0];
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
<!-- further and less -->
<!-- drop down script zalak start -->
<script>
   /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
   function myFunction(clicked_id) {
       document.getElementById('myDropdown' + clicked_id).classList.toggle("show");
   }
   // Close the dropdown if the user clicks outside of it
   window.onclick = function (event) {
       if (!event.target.matches('.dropbtn1')) {
           var dropdowns = document.getElementsByClassName("dropdown-content1");
           var i;
           for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                   openDropdown.classList.remove('show');
               }
           }
       }
   }
</script>
<!-- drop down script zalak end -->
<!-- multi image add post khyati start -->
<script type="text/javascript">
   //alert("a");
   var $fileUpload = $("#files"),
           $list = $('#list'),
           thumbsArray = [],
           maxUpload = 5;
   // READ FILE + CREATE IMAGE
   function read(f) {//alert("aa");
       return function (e) {
           var base64 = e.target.result;
           var $img = $('<img/>', {
               src: base64,
               title: encodeURIComponent(f.name), //( escape() is deprecated! )
               "class": "thumb"
           });
           var $thumbParent = $("<span/>", {html: $img, "class": "thumbParent"}).append('<span class="remove_thumb"/>');
           thumbsArray.push(base64); // Push base64 image into array or whatever.
           $list.append($thumbParent);
       };
   }
   // HANDLE FILE/S UPLOAD
   function handleFileSelect(e) {//alert("aaa");
       e.preventDefault(); // Needed?
       var files = e.target.files;
       var len = files.length;
       if (len > maxUpload || thumbsArray.length >= maxUpload) {
           return alert("Sorry you can upload only 5 images");
       }
       for (var i = 0; i < len; i++) {
           var f = files[i];
           if (!f.type.match('image.*'))
               continue; // Only images allowed    
           var reader = new FileReader();
           reader.onload = read(f); // Call read() function
           reader.readAsDataURL(f);
       }
   }
   $fileUpload.change(function (e) {
   //    alert("aaaa");
       handleFileSelect(e);
   });
   $list.on('click', '.remove_thumb', function () {//alert("aaaaa");
       var $removeBtns = $('.remove_thumb'); // Get all of them in collection
       var idx = $removeBtns.index(this); // Exact Index-from-collection
       $(this).closest('span.thumbParent').remove(); // Remove tumbnail parent
       thumbsArray.splice(idx, 1); // Remove from array
   });
</script>
<!-- multi image add post khyati end -->
<script language=JavaScript>
   <!--
                               function check_length(my_form)
                               {
                                   maxLen = 50; // max number of characters allowed
                                   if (my_form.my_text.value.length >= maxLen) {
   // Alert message if maximum limit is reached. 
   // If required Alert can be removed. 
                                       var msg = "You have reached your maximum limit of characters allowed";
                                       alert(msg);
   // Reached the Maximum length so trim the textarea
                                       my_form.my_text.value = my_form.my_text.value.substring(0, maxLen);
                                   } else { // Maximum length not reached so update the value of my_text counter
                                       my_form.text_num.value = maxLen - my_form.my_text.value.length;
                                   }
                               }
                               //-->
                           
</script>
<!--- khyati change end             -->
<!-- multiple images all scriptlike comment start -->
<!-- image                            s like script start -->
<!-- post like script start -->
<script type="text/javascript">
   function post_like(clicked_id)
   {
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_post" ?>',
           dataType: 'json',
           data: 'post_id=' + clicked_id,
           success: function (data) {
               $('.' + 'likepost' + clicked_id).html(data.like);
               $('.likeusername' + clicked_id).html(data.likeuser);
   
               $('.likeduserlist' + clicked_id).hide();
               if (data.like_user_count == '0') {
                   document.getElementById('likeusername' + clicked_id).style.display = "none";
               } else {
                   document.getElementById('likeusername' + clicked_id).style.display = "block";
               }
               $('#likeusername' + clicked_id).addClass('likeduserlist1');
           }
       });
   }
</script>
<!--post like script end -->
<!-- comment like script start -->
<script type="text/javascript">
   function comment_like(clicked_id)
   {
   
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_comment" ?>',
           data: 'post_id=' + clicked_id,
           success: function (data) {
               $('#' + 'likecomment' + clicked_id).html(data);
   
           }
       });
   }
</script>
<script type="text/javascript">
   function comment_like1(clicked_id)
   {
   
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/like_comment1" ?>',
           data: 'post_id=' + clicked_id,
           success: function (data) {
               $('#' + 'likecomment1' + clicked_id).html(data);
   
           }
       });
   }
</script>
<!--comment like script end -->
<!-- comment delete script start -->
<script type="text/javascript">
   function comment_delete(clicked_id) {
       $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deleted(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
   }
   
   function comment_deleted(clicked_id)
   {
       var post_delete = document.getElementById("post_delete");
       //alert(post_delete.value);
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/delete_comment" ?>',
           data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
           dataType: "json",
           success: function (data) {
               //alert('.' + 'insertcomment' + clicked_id);
               $('.' + 'insertcomment' + post_delete.value).html(data.comment);
               $('#' + 'insertcount' + post_delete.value).html(data.count);
               $('.post-design-commnet-box').show();
           }
       });
   }
   
   function comment_deletetwo(clicked_id)
   {
       $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
   }
   
</script>
<script type="text/javascript">
   function comment_deletedtwo(clicked_id)
   {
       var post_delete1 = document.getElementById("post_deletetwo");
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/delete_commenttwo" ?>',
           data: 'post_id=' + clicked_id + '&post_delete=' + post_delete1.value,
           dataType: "json",
           success: function (data) {
   
               // $('.' + 'insertcomment' + post_delete.value).html(data);
               $('.' + 'insertcommenttwo' + post_delete1.value).html(data.comment);
               $('#' + 'insertcount' + post_delete1.value).html(data.count);
               $('.post-design-commnet-box').show();
   
           }
       });
   }
   
   
   //                        function comment_deletetwo(clicked_id)
   //                        {
   //
   //                            var post_delete = document.getElementById("post_delete2");
   //
   //                            $.ajax({
   //                                type: 'POST',
   //                                url: '<?php echo base_url() . "artistic/delete_commenttwo" ?>',
   //                                data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
   //                                success: function (data) {
   //
   //                                    $('#' + 'fourcomment' + post_delete.value).html(data);
   //
   //                                }
   //                            });
   //                        }
</script>
<!--comment delete script end -->
<!-- comment insert script start -->
<!-- insert comment using comment button-- > 
   <!-- insert comment using enter -->
<script type="text/javascript">
   //                        function insert_comment(clicked_id)
   //                        {
   //                            var $field = $('#post_comment' + clicked_id);
   //                            var post_comment = $('#post_comment' + clicked_id).html();
   //                            
   //                            $('#post_comment' + clicked_id).html("");
   //
   //                            var x = document.getElementById('threecomment' + clicked_id);
   //                            var y = document.getElementById('fourcomment' + clicked_id);
   //
   //                            if (post_comment == '') {
   //
   //                                event.preventDefault();
   //                                return false;
   //                            } else {
   //
   //                                if (x.style.display === 'block' && y.style.display === 'none') {
   //
   //                                    $.ajax({
   //                                        type: 'POST',
   //                                        url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
   //                                        data: 'post_id=' + clicked_id + '&comment=' + post_comment,
   //                                        dataType: "json",
   //                                        success: function (data) {
   //
   //                                            //$('.' + 'insertcomment' + clicked_id).html(data);
   //                                            $('#' + 'insertcount' + clicked_id).html(data.count);
   //                                            $('.insertcomment' + clicked_id).html(data.comment);
   //
   //                                        }
   //                                    });
   //
   //                                } else {
   //
   //                                    $.ajax({
   //                                        type: 'POST',
   //                                        url: '<?php echo base_url() . "artistic/insert_comment" ?>',
   //                                        data: 'post_id=' + clicked_id + '&comment=' + post_comment,
   //                                        dataType: "json",
   //                                        success: function (data) {
   //                                            $('textarea').each(function () {
   //                                                $(this).val('');
   //                                            });
   //                                            $('#' + 'insertcount' + clicked_id).html(data.count);
   //                                            $('#' + 'fourcomment' + clicked_id).html(data.comment);
   //                                        }
   //                                    });
   //
   //                                }
   //                            }
   //
   //                        }
   
   function insert_comment(clicked_id)
   {
       $("#post_comment" + clicked_id).click(function () {
           $(this).prop("contentEditable", true);
           $(this).html("");
       });
   
       var sel = $("#post_comment" + clicked_id);
       var txt = sel.html();
       txt = txt.replace(/&nbsp;/gi, " ");
       txt = txt.replace(/<br>$/, '');
       if (txt == '' || txt == '<br>') {
          return false;
           }
       if (/^\s+$/gi.test(txt))
       {
         return false;
       }
   
       $('#post_comment' + clicked_id).html("");
   
       var x = document.getElementById('threecomment' + clicked_id);
       var y = document.getElementById('fourcomment' + clicked_id);
   
       if (x.style.display === 'block' && y.style.display === 'none') {
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
               data: 'post_id=' + clicked_id + '&comment=' + txt,
               dataType: "json",
               success: function (data) {
                   $('textarea').each(function () {
                       $(this).val('');
                   });
                   $('#' + 'insertcount' + clicked_id).html(data.count);
                   $('.insertcomment' + clicked_id).html(data.comment);
   
               }
           });
   
       } else {
   
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url() . "artistic/insert_comment" ?>',
               data: 'post_id=' + clicked_id + '&comment=' + txt,
               dataType: "json",
               success: function (data) {
                   $('textarea').each(function () {
                       $(this).val('');
                   });
                   $('#' + 'insertcount' + clicked_id).html(data.count);
                   $('#' + 'fourcomment' + clicked_id).html(data.comment);
               }
           });
       }
   }
   
</script>
<script type="text/javascript">
   //                        function entercomment(clicked_id)
   //                        {
   //                            $('#post_comment' + clicked_id).keypress(function (e) {
   //                                if (e.keyCode == 13 && !e.shiftKey) {
   //                                    var val = $('#post_comment' + clicked_id).val();
   //                                    e.preventDefault();
   //
   //                                    if (window.preventDuplicateKeyPresses)
   //                                        return;
   //
   //                                    window.preventDuplicateKeyPresses = true;
   //                                    window.setTimeout(function () {
   //                                        window.preventDuplicateKeyPresses = false;
   //                                    }, 500);
   //                                    var x = document.getElementById('threecomment' + clicked_id);
   //                                    var y = document.getElementById('fourcomment' + clicked_id);
   //
   //                                    if (val == '') {
   //
   //                                        event.preventDefault();
   //                                        return false;
   //                                    } else {
   //
   //                                        if (x.style.display === 'block' && y.style.display === 'none') {
   //                                            $.ajax({
   //                                                type: 'POST',
   //                                                url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
   //                                                data: 'post_id=' + clicked_id + '&comment=' + val,
   //                                                dataType: "json",
   //                                                success: function (data) {
   //                                                    $('textarea').each(function () {
   //                                                        $(this).val('');
   //                                                    });
   //
   //                                                    //  $('.insertcomment' + clicked_id).html(data);
   //                                                    $('#' + 'insertcount' + clicked_id).html(data.count);
   //                                                    $('.insertcomment' + clicked_id).html(data.comment);
   //
   //                                                }
   //                                            });
   //
   //                                        } else {
   //
   //                                            $.ajax({
   //                                                type: 'POST',
   //                                                url: '<?php echo base_url() . "artistic/insert_comment" ?>',
   //                                                data: 'post_id=' + clicked_id + '&comment=' + val,
   //                                                // dataType: "json",
   //                                                success: function (data) {
   //                                                    $('textarea').each(function () {
   //                                                        $(this).val('');
   //                                                    });
   //                                                    $('#' + 'fourcomment' + clicked_id).html(data);
   //                                                }
   //                                            });
   //                                        }
   //                                    }
   //                                    e.preventDefault();
   //                                }
   //                            });
   //                        }
   
   
   function entercomment(clicked_id)
   {
       $("#post_comment" + clicked_id).click(function () {
           $(this).prop("contentEditable", true);
       });
   
       $('#post_comment' + clicked_id).keypress(function (e) {
   
           if (e.keyCode == 13 && !e.shiftKey) {
               e.preventDefault();
               var sel = $("#post_comment" + clicked_id);
               var txt = sel.html();
             
              txt = txt.replace(/&nbsp;/gi, " ");
               txt = txt.replace(/<br>$/, '');
               if (txt == '' || txt == '<br>') {
                return false;
                  }
             if (/^\s+$/gi.test(txt))
                     {
                  return false;
                  }
                  
               $('#post_comment' + clicked_id).html("");
   
               if (window.preventDuplicateKeyPresses)
                   return;
   
               window.preventDuplicateKeyPresses = true;
               window.setTimeout(function () {
                   window.preventDuplicateKeyPresses = false;
               }, 500);
   
               var x = document.getElementById('threecomment' + clicked_id);
               var y = document.getElementById('fourcomment' + clicked_id);
   
   
   
               if (x.style.display === 'block' && y.style.display === 'none') {
                   $.ajax({
                       type: 'POST',
                       url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
                       data: 'post_id=' + clicked_id + '&comment=' + txt,
                       dataType: "json",
                       success: function (data) {
                           $('textarea').each(function () {
                               $(this).val('');
                           });
                           $('#' + 'insertcount' + clicked_id).html(data.count);
                           $('.insertcomment' + clicked_id).html(data.comment);
                       }
                   });
               } else {
                   $.ajax({
                       type: 'POST',
                       url: '<?php echo base_url() . "artistic/insert_comment" ?>',
                       data: 'post_id=' + clicked_id + '&comment=' + txt,
                       dataType: "json",
                       success: function (data) {
                           $('textarea').each(function () {
                               $(this).val('');
                           });
                           $('#' + 'insertcount' + clicked_id).html(data.count);
                           $('#' + 'fourcomment' + clicked_id).html(data.comment);
                       }
                   });
               }
           }
       });
       $(".scroll").click(function (event) {
           event.preventDefault();
           $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
       });
   }
</script>
<!--comment insert script end -->
<!-- comment edit script start -->
<!-- comment edit box start-->
<script type="text/javascript">
   function comment_editbox(clicked_id) {
       document.getElementById('editcomment' + clicked_id).style.display = 'inline-block';
       document.getElementById('showcomment' + clicked_id).style.display = 'none';
       document.getElementById('editsubmit' + clicked_id).style.display = 'inline-block';
       //document.getElementById('editbox' + clicked_id).style.display = 'none';
       document.getElementById('editcommentbox' + clicked_id).style.display = 'none';
       document.getElementById('editcancle' + clicked_id).style.display = 'block';
       $('.post-design-commnet-box').hide();
   }
   
   
   function comment_editcancle(clicked_id) {
       document.getElementById('editcommentbox' + clicked_id).style.display = 'block';
       document.getElementById('editcancle' + clicked_id).style.display = 'none';
       document.getElementById('editcomment' + clicked_id).style.display = 'none';
       document.getElementById('showcomment' + clicked_id).style.display = 'block';
       document.getElementById('editsubmit' + clicked_id).style.display = 'none';
   
       $('.post-design-commnet-box').show();
   }
   
   function comment_editboxtwo(clicked_id) {
       //                            alert('editcommentboxtwo' + clicked_id);
       //                            return false;
       $('div[id^=editcommenttwo]').css('display', 'none');
       $('div[id^=showcommenttwo]').css('display', 'block');
       $('button[id^=editsubmittwo]').css('display', 'none');
       $('div[id^=editcommentboxtwo]').css('display', 'block');
       $('div[id^=editcancletwo]').css('display', 'none');
   
       document.getElementById('editcommenttwo' + clicked_id).style.display = 'inline-block';
       document.getElementById('showcommenttwo' + clicked_id).style.display = 'none';
       document.getElementById('editsubmittwo' + clicked_id).style.display = 'inline-block';
       document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'none';
       document.getElementById('editcancletwo' + clicked_id).style.display = 'block';
       $('.post-design-commnet-box').hide();
   }
   
   
   function comment_editcancletwo(clicked_id) {
   
       document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'block';
       document.getElementById('editcancletwo' + clicked_id).style.display = 'none';
   
       document.getElementById('editcommenttwo' + clicked_id).style.display = 'none';
       document.getElementById('showcommenttwo' + clicked_id).style.display = 'block';
       document.getElementById('editsubmittwo' + clicked_id).style.display = 'none';
       $('.post-design-commnet-box').show();
   }
   
   function comment_editbox3(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
       document.getElementById('editcomment3' + clicked_id).style.display = 'block';
       document.getElementById('showcomment3' + clicked_id).style.display = 'none';
       document.getElementById('editsubmit3' + clicked_id).style.display = 'block';
   
       document.getElementById('editcommentbox3' + clicked_id).style.display = 'none';
       document.getElementById('editcancle3' + clicked_id).style.display = 'block';
       $('.post-design-commnet-box').hide();
   
   }
   
   function comment_editcancle3(clicked_id) {
   
       document.getElementById('editcommentbox3' + clicked_id).style.display = 'block';
       document.getElementById('editcancle3' + clicked_id).style.display = 'none';
   
       document.getElementById('editcomment3' + clicked_id).style.display = 'none';
       document.getElementById('showcomment3' + clicked_id).style.display = 'block';
       document.getElementById('editsubmit3' + clicked_id).style.display = 'none';
   
       $('.post-design-commnet-box').show();
   
   }
   
   function comment_editbox4(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
       document.getElementById('editcomment4' + clicked_id).style.display = 'block';
       document.getElementById('showcomment4' + clicked_id).style.display = 'none';
       document.getElementById('editsubmit4' + clicked_id).style.display = 'block';
   
       document.getElementById('editcommentbox4' + clicked_id).style.display = 'none';
       document.getElementById('editcancle4' + clicked_id).style.display = 'block';
   
       $('.post-design-commnet-box').hide();
   
   }
   
   function comment_editcancle4(clicked_id) {
   
       document.getElementById('editcommentbox4' + clicked_id).style.display = 'block';
       document.getElementById('editcancle4' + clicked_id).style.display = 'none';
   
       document.getElementById('editcomment4' + clicked_id).style.display = 'none';
       document.getElementById('showcomment4' + clicked_id).style.display = 'block';
       document.getElementById('editsubmit4' + clicked_id).style.display = 'none';
   
       $('.post-design-commnet-box').show();
   
   }
</script>
<!--comment edit box end-->
<!-- comment edit insert start -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
   //                        function edit_comment(abc)
   //                        {
   //                            var $field = $('#editcomment' + abc);
   //                            var editpostdetails = $('#editcomment' + abc).html();
   //                            if (editpostdetails == '') {
   //                                $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   //                                $('#bidmodal').modal('show');
   //                            } else {
   //                                $.ajax({
   //                                    type: 'POST',
   //                                    url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
   //                                    data: 'post_id=' + abc + '&comment=' + editpostdetails,
   //                                    success: function (data) {
   //                                        document.getElementById('editcomment' + abc).style.display = 'none';
   //                                        document.getElementById('showcomment' + abc).style.display = 'block';
   //                                        document.getElementById('editsubmit' + abc).style.display = 'none';
   //                                        document.getElementById('editbox' + abc).style.display = 'block';
   //                                        document.getElementById('editcancle' + abc).style.display = 'none';
   //                                        $('#' + 'showcomment' + abc).html(data);
   //                                    }
   //                                });
   //                            }
   //                        }
   
   function edit_comment(abc)
   {
       $("#editcomment" + abc).click(function () {
           $(this).prop("contentEditable", true);
       });
   
       var sel = $("#editcomment" + abc);
       var txt = sel.html();
       
   txt = txt.replace(/&nbsp;/gi, " ");
   txt = txt.replace(/<br>$/, '');
   if (txt == '' || txt == '<br>') {
   $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   $('#bidmodal').modal('show');
       return false;
   }
   if (/^\s+$/gi.test(txt))
   {
       return false;
   }
   
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
           data: 'post_id=' + abc + '&comment=' + txt,
           success: function (data) {
               document.getElementById('editcomment' + abc).style.display = 'none';
               document.getElementById('showcomment' + abc).style.display = 'block';
               document.getElementById('editsubmit' + abc).style.display = 'none';
               document.getElementById('editcommentbox' + abc).style.display = 'block';
               document.getElementById('editcancle' + abc).style.display = 'none';
               $('#' + 'showcomment' + abc).html(data);
               $('.post-design-commnet-box').show();
           }
       });
       $(".scroll").click(function (event) {
           event.preventDefault();
           $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
       });
   }
</script>
<script type="text/javascript">
   //                        function commentedit(abc)
   //                        {
   //                                $('#editcomment' + abc).keypress(function (e) {
   //                                if (event.which == 13 && event.shiftKey != 1) {
   //                                    var $field = $('#editcomment' + abc);
   //                                    var editpostdetails = $('#editcomment' + abc).html();
   //                                    if (editpostdetails == '') {
   //                                        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   //                                        $('#bidmodal').modal('show');
   //                                    } else {
   //                                        $.ajax({
   //                                            type: 'POST',
   //                                            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
   //                                            data: 'post_id=' + abc + '&comment=' + editpostdetails,
   //                                            success: function (data) {
   //                                                document.getElementById('editcomment' + abc).style.display = 'none';
   //                                                document.getElementById('showcomment' + abc).style.display = 'block';
   //                                                document.getElementById('editsubmit' + abc).style.display = 'none';
   //                                                document.getElementById('editbox' + abc).style.display = 'block';
   //                                                document.getElementById('editcancle' + abc).style.display = 'none';
   //                                                $('#' + 'showcomment' + abc).html(data);
   //                                            }
   //                                        });
   //                                    }
   //                                    e.preventDefault();
   //                                }
   //                            });
   //                        }
   
   function commentedit(abc)
   {
       $("#editcomment" + abc).click(function () {
           $(this).prop("contentEditable", true);
       });
       $('#editcomment' + abc).keypress(function (event) {
           if (event.which == 13 && event.shiftKey != 1) {
               event.preventDefault();
               var sel = $("#editcomment" + abc);
               var txt = sel.html();
             
   txt = txt.replace(/&nbsp;/gi, " ");
   txt = txt.replace(/<br>$/, '');
   if (txt == '' || txt == '<br>') {
   $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   $('#bidmodal').modal('show');
   return false;
   }
   if (/^\s+$/gi.test(txt))
   {
   return false;
   }
   //                                       
            
          if (window.preventDuplicateKeyPresses)
                   return;
               window.preventDuplicateKeyPresses = true;
               window.setTimeout(function () {
                   window.preventDuplicateKeyPresses = false;
               }, 500);
               $.ajax({
                   type: 'POST',
                   url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                   data: 'post_id=' + abc + '&comment=' + txt,
                   success: function (data) {
                       document.getElementById('editcomment' + abc).style.display = 'none';
                       document.getElementById('showcomment' + abc).style.display = 'block';
                       document.getElementById('editsubmit' + abc).style.display = 'none';
                       document.getElementById('editcommentbox' + abc).style.display = 'block';
                       document.getElementById('editcancle' + abc).style.display = 'none';
                       $('#' + 'showcomment' + abc).html(data);
                       $('.post-design-commnet-box').show();
                   }
               });
           }
       });
       $(".scroll").click(function (event) {
           event.preventDefault();
           $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
       });
   }
</script>
<script type="text/javascript">
   //                        function edit_commenttwo(abc)
   //                        {
   //                            var post_comment_edit = document.getElementById("editcommenttwo" + abc);
   //                            if (post_comment_edit.value == '') {
   //                                $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   //                                $('#bidmodal').modal('show');
   //                            } else {
   //                                $.ajax({
   //                                    type: 'POST',
   //                                    url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
   //                                    data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
   //                                    success: function (data) {
   //                                        document.getElementById('showcommenttwo' + abc).style.display = 'block';
   //                                        document.getElementById('showcommenttwo' + abc).innerHTML = data;
   //                                        document.getElementById('editboxtwo' + abc).style.display = 'block';
   //                                        document.getElementById('editcommenttwo' + abc).style.display = 'none';
   //                                        document.getElementById('editsubmittwo' + abc).style.display = 'none';
   //                                        document.getElementById('editcancletwo' + abc).style.display = 'none';
   //                                    }
   //                                });
   //                            }
   //                        }
   
   function edit_commenttwo(abc)
   {
       $("#editcommenttwo" + abc).click(function () {
           $(this).prop("contentEditable", true);
       });
   
       var sel = $("#editcommenttwo" + abc);
       var txt = sel.html();
       
   txt = txt.replace(/&nbsp;/gi, " ");
   txt = txt.replace(/<br>$/, '');
   if (txt == '' || txt == '<br>') {
        $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
           $('#bidmodal').modal('show');
       return false;
   }
   if (/^\s+$/gi.test(txt))
   {
       return false;
   }
   
   
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
           data: 'post_id=' + abc + '&comment=' + txt,
           success: function (data) {
               document.getElementById('editcommenttwo' + abc).style.display = 'none';
               document.getElementById('showcommenttwo' + abc).style.display = 'block';
               document.getElementById('editsubmittwo' + abc).style.display = 'none';
               document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
               document.getElementById('editcancletwo' + abc).style.display = 'none';
               $('#' + 'showcommenttwo' + abc).html(data);
               $('.post-design-commnet-box').show();
           }
       });
       $(".scroll").click(function (event) {
           event.preventDefault();
           $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
       });
   }
</script>
<script type="text/javascript">
   //                        function commentedittwo(abc)
   //                        {
   //                            $('#editcommenttwo' + abc).keypress(function (e) {
   //                                if (e.which == 13) {
   //                                    var val = $('#editcommenttwo' + abc).val();
   //
   //                                    if (val == '') {
   //                                        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
   //                                        $('#bidmodal').modal('show');
   //                                    } else {
   //                                        $.ajax({
   //                                            type: 'POST',
   //                                            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
   //                                            data: 'post_id=' + abc + '&comment=' + val,
   //                                            success: function (data) {
   //                                                document.getElementById('editcommenttwo' + abc).style.display = 'none';
   //                                                document.getElementById('showcommenttwo' + abc).style.display = 'block';
   //                                                document.getElementById('editsubmittwo' + abc).style.display = 'none';
   //                                                document.getElementById('editboxtwo' + abc).style.display = 'block';
   //                                                document.getElementById('editcancletwo' + abc).style.display = 'none';
   //                                                $('#' + 'showcommenttwo' + abc).html(data);
   //                                            }
   //                                        });
   //                                    }
   //                                    e.preventDefault();
   //                                }
   //                            });
   //                        }
   
   function commentedittwo(abc)
   {
       $("#editcommenttwo" + abc).click(function () {
           $(this).prop("contentEditable", true);
           //$(this).html("");
       });
       $('#editcommenttwo' + abc).keypress(function (event) {
           if (event.which == 13 && event.shiftKey != 1) {
               event.preventDefault();
               var sel = $("#editcommenttwo" + abc);
               var txt = sel.html();
               
                txt = txt.replace(/&nbsp;/gi, " ");
                txt = txt.replace(/<br>$/, '');
                  if (txt == '' || txt == '<br>') {
                 $('.biderror .mes').html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                 $('#bidmodal').modal('show');
                    return false;
                      }
                 if (/^\s+$/gi.test(txt))
                  {
                        return false;
                     }
   
               if (window.preventDuplicateKeyPresses)
                   return;
   
               window.preventDuplicateKeyPresses = true;
               window.setTimeout(function () {
                   window.preventDuplicateKeyPresses = false;
               }, 500);
   
               $.ajax({
                   type: 'POST',
                   url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                   data: 'post_id=' + abc + '&comment=' + txt,
                   success: function (data) {
                       document.getElementById('editcommenttwo' + abc).style.display = 'none';
                       document.getElementById('showcommenttwo' + abc).style.display = 'block';
                       document.getElementById('editsubmittwo' + abc).style.display = 'none';
   
                       document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                       document.getElementById('editcancletwo' + abc).style.display = 'none';
   
                       $('#' + 'showcommenttwo' + abc).html(data);
                       $('.post-design-commnet-box').show();
   
                   }
               });
           }
       });
       $(".scroll").click(function (event) {
           event.preventDefault();
           $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
       });
   }
</script>
<!--comment edit insert script end -->
<!-- hide and show data start-->
<script type="text/javascript">
   function commentall(clicked_id) {
       var x = document.getElementById('threecomment' + clicked_id);
       var y = document.getElementById('fourcomment' + clicked_id);
       var z = document.getElementById('insertcount' + clicked_id);
   
       if (x.style.display === 'block' && y.style.display === 'none') {
           x.style.display = 'none';
           y.style.display = 'block';
           z.style.visibility = 'show';
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url() . "artistic/fourcomment" ?>',
               data: 'art_post_id=' + clicked_id,
               //alert(data);
               success: function (data) {
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
       //             url:'<?php echo base_url() . "artistic/fourcomment" ?>',
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
<!-- 9-5 chnages start --> 
<script type="text/javascript">
   function post_likeimg(clicked_id)
     {
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/like_postimg" ?>',
            dataType: 'json',
             data: 'post_image_id=' + clicked_id,
             success: function (data) {;
                 $('.' + 'likepostimg' + clicked_id).html(data.like);
                 $('.likeusernameimg' + clicked_id).html(data.likeuser);
   
                 $('.likeduserlistimg' + clicked_id).hide();
                 if (data.like_user_count == '0') { 
                     document.getElementById('likeusernameimg' + clicked_id).style.display = "none";
                 } else {
                     document.getElementById('likeusernameimg' + clicked_id).style.display = "block";
                 }
                 $('#likeusernameimg' + clicked_id).addClass('likeduserlistimg1');
             }
         });
     }
     
    
     function comment_likeimg(clicked_id)
     {
              //alert(clicked_id);
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/like_commentimg1" ?>',
             data: 'post_image_comment_id=' + clicked_id,
             success: function (data) {
                 $('#' + 'likecommentimg' + clicked_id).html(data);
   
             }
         });
     }
     
     function comment_likeimgtwo(clicked_id)
     {// alert("hi");
             // alert(clicked_id);
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/like_commentimg1" ?>',
             data: 'post_image_comment_id=' + clicked_id,
             success: function (data) {
                 $('#' + 'likecommentimg' + clicked_id).html(data);
   
             }
         });
     }
     
     
      function comment_editboximg(clicked_id) {
         document.getElementById('editcommentimg' + clicked_id).style.display = 'inline-block';
         document.getElementById('showcommentimg' + clicked_id).style.display = 'none';
         document.getElementById('editsubmitimg' + clicked_id).style.display = 'inline-block';
         //document.getElementById('editbox' + clicked_id).style.display = 'none';
         document.getElementById('editcommentboximg' + clicked_id).style.display = 'none';
         document.getElementById('editcancleimg' + clicked_id).style.display = 'block';
         $('.post-design-commnet-box').hide();
     }
   
   
     function comment_editcancleimg(clicked_id) {
         document.getElementById('editcommentboximg' + clicked_id).style.display = 'block';
         document.getElementById('editcancleimg' + clicked_id).style.display = 'none';
         document.getElementById('editcommentimg' + clicked_id).style.display = 'none';
         document.getElementById('showcommentimg' + clicked_id).style.display = 'block';
         document.getElementById('editsubmitimg' + clicked_id).style.display = 'none';
   
         $('.post-design-commnet-box').show();
     }
     
     function comment_editboximgtwo(clicked_id) {
   //                            alert('editcommentboxtwo' + clicked_id);
   //                            return false;
         $('div[id^=editcommentimgtwo]').css('display', 'none');
         $('div[id^=showcommentimgtwo]').css('display', 'block');
         $('button[id^=editsubmitimgtwo]').css('display', 'none');
         $('div[id^=editcommentboximgtwo]').css('display', 'block');
         $('div[id^=editcancleimgtwo]').css('display', 'none');
   
         document.getElementById('editcommentimgtwo' + clicked_id).style.display = 'inline-block';
         document.getElementById('showcommentimgtwo' + clicked_id).style.display = 'none';
         document.getElementById('editsubmitimgtwo' + clicked_id).style.display = 'inline-block';
         document.getElementById('editcommentboximgtwo' + clicked_id).style.display = 'none';
         document.getElementById('editcancleimgtwo' + clicked_id).style.display = 'block';
         $('.post-design-commnet-box').hide();
     }
   
   
     function comment_editcancleimgtwo(clicked_id) {
   
         document.getElementById('editcommentboximgtwo' + clicked_id).style.display = 'block';
         document.getElementById('editcancleimgtwo' + clicked_id).style.display = 'none';
   
         document.getElementById('editcommentimgtwo' + clicked_id).style.display = 'none';
         document.getElementById('showcommentimgtwo' + clicked_id).style.display = 'block';
         document.getElementById('editsubmitimgtwo' + clicked_id).style.display = 'none';
         $('.post-design-commnet-box').show();
     }
     
     function comment_deleteimg(clicked_id) {
         $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedimg(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
         $('#bidmodal').modal('show');
     }
   
     function comment_deletedimg(clicked_id)
     {
         var post_delete = document.getElementById("post_deleteimg");
      //   alert(post_delete.value);
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/delete_commentimg" ?>',
             data: 'post_image_comment_id=' + clicked_id + '&post_delete=' + post_delete.value,
             dataType: "json",
             success: function (data) {
                 //alert('.' + 'insertcomment' + clicked_id);
                 $('.' + 'insertcommentimg' + post_delete.value).html(data.comment);
                 $('#' + 'insertcountimg' + post_delete.value).html(data.count);
                 $('.post-design-commnet-box').show();
             }
         });
     }
     
     function insert_commentimg(clicked_id)
     {
         $("#post_commentimg" + clicked_id).click(function () {
             $(this).prop("contentEditable", true);
             $(this).html("");
         });
   
         var sel = $("#post_commentimg" + clicked_id);
         var txt = sel.html();
         if (txt == '') {
             return false;
         }
   
         $('#post_commentimg' + clicked_id).html("");
   
         var x = document.getElementById('threecommentimg' + clicked_id);
         var y = document.getElementById('fourcommentimg' + clicked_id);
         
         if (x.style.display === 'block' && y.style.display === 'none') {
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() . "artistic/insert_commentthreeimg" ?>',
                 data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                 dataType: "json",
                 success: function (data) {
                     $('textarea').each(function () {
                         $(this).val('');
                     });
                     $('#' + 'insertcountimg' + clicked_id).html(data.count);
                     $('.insertcommentimg' + clicked_id).html(data.comment);
   
                 }
             });
   
         } else {
   
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() . "artistic/insert_commentimg" ?>',
                 data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                 dataType: "json",
                 success: function (data) {
                     $('textarea').each(function () {
                         $(this).val('');
                     });
                     $('#' + 'insertcountimg' + clicked_id).html(data.count);
                     $('#' + 'fourcommentimg' + clicked_id).html(data.comment);
                 }
             });
         }
     }
     
             function edit_commentimg(abc)
     {
         $("#editcommentimg" + abc).click(function () {
             $(this).prop("contentEditable", true);
         });
   
         var sel = $("#editcommentimg" + abc);
         var txt = sel.html();
         if (txt == '' || txt == '<br>') {
             $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
             $('#bidmodal').modal('show');
             return false;
         }
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/edit_comment_insertimg" ?>',
             data: 'post_image_comment_id=' + abc + '&comment=' + txt,
             success: function (data) {
                 document.getElementById('editcommentimg' + abc).style.display = 'none';
                 document.getElementById('showcommentimg' + abc).style.display = 'block';
                 document.getElementById('editsubmitimg' + abc).style.display = 'none';
                 document.getElementById('editcommentboximg' + abc).style.display = 'block';
                 document.getElementById('editcancleimg' + abc).style.display = 'none';
                 $('#' + 'showcommentimg' + abc).html(data);
                 $('.post-design-commnet-box').show();
             }
         });
         $(".scroll").click(function (event) {
             event.preventDefault();
             $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
         });
     }
     
     function commentallimg(clicked_id) {
         var x = document.getElementById('threecommentimg' + clicked_id);
         var y = document.getElementById('fourcommentimg' + clicked_id);
         var z = document.getElementById('insertcountimg' + clicked_id);
   
         if (x.style.display === 'block' && y.style.display === 'none') {
             x.style.display = 'none';
             y.style.display = 'block';
             z.style.visibility = 'show';
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() . "artistic/fourcommentimg" ?>',
                 data: 'art_post_id=' + clicked_id,
                 //alert(data);
                 success: function (data) {
                     $('#' + 'fourcommentimg' + clicked_id).html(data);
                 }
             });
         }
         // } else {
         //      x.style.display = 'block';
         //      y.style.display = 'block';
         //      z.style.display = 'block';
   
         //      $.ajax({ 
         //             type:'POST',
         //             url:'<?php echo base_url() . "artistic/fourcomment" ?>',
         //             data:'art_post_id='+clicked_id,
         //             //alert(data);
         //             success:function(data){
         //       $('#' + 'threecomment' + clicked_id).html(data);
   
         //       }
         //         });
         // }
     }
     
     function comment_deleteimgtwo(clicked_id)
     {
         $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedimgtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
         $('#bidmodal').modal('show');
     }
   
   
     function comment_deletedimgtwo(clicked_id)
     { 
         var post_delete1 = document.getElementById("post_deleteimgtwo");
     //    alert(post_delete1.value);
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/delete_commenttwoimg" ?>',
             data: 'post_image_comment_id=' + clicked_id + '&post_delete=' + post_delete1.value,
             dataType: "json",
             success: function (data) {
                 
                 $('.' + 'insertcommentimgtwo' + post_delete1.value).html(data.comment);
                 $('#' + 'insertcountimg' + post_delete1.value).html(data.count);
                 $('.post-design-commnet-box').show();
   
             }
         });
     }
     
     function edit_commentimgtwo(abc)
     {
         $("#editcommentimgtwo" + abc).click(function () {
             $(this).prop("contentEditable", true);
         });
   
         var sel = $("#editcommentimgtwo" + abc);
         var txt = sel.html();
         if (txt == '' || txt == '<br>') {
             $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
             $('#bidmodal').modal('show');
             return false;
         }
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/edit_comment_insertimg" ?>',
             data: 'post_image_comment_id=' + abc + '&comment=' + txt,
             success: function (data) {
                 document.getElementById('editcommentimgtwo' + abc).style.display = 'none';
                 document.getElementById('showcommentimgtwo' + abc).style.display = 'block';
                 document.getElementById('editsubmitimgtwo' + abc).style.display = 'none';
                 document.getElementById('editcommentboximgtwo' + abc).style.display = 'block';
                 document.getElementById('editcancleimgtwo' + abc).style.display = 'none';
                 $('#' + 'showcommentimgtwo' + abc).html(data);
                 $('.post-design-commnet-box').show();
             }
         });
         $(".scroll").click(function (event) {
             event.preventDefault();
             $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
         });
     }
     
     
     function likeuserlistimg(post_id) {
   
         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "artistic/likeuserlistimg" ?>',
             data: 'post_id=' + post_id,
             dataType: "html",
             success: function (data) {
                 var html_data = data;
                 $('#likeusermodal .mes').html(html_data);
                 $('#likeusermodal').modal('show');
             }
         });
   
   
     }
     
         function commenteditimg(abc)
     {
         $("#editcommentimg" + abc).click(function () {
             $(this).prop("contentEditable", true);
         });
         $('#editcommentimg' + abc).keypress(function (event) {
             if (event.which == 13 && event.shiftKey != 1) {
                 event.preventDefault();
                 var sel = $("#editcommentimg" + abc);
                 var txt = sel.html();
                 if (txt == '' || txt == '<br>') {
                     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deleteimg(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                     $('#bidmodal').modal('show');
                     return false;
                 }
                 if (window.preventDuplicateKeyPresses)
                     return;
                 window.preventDuplicateKeyPresses = true;
                 window.setTimeout(function () {
                     window.preventDuplicateKeyPresses = false;
                 }, 500);
                 $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url() . "artistic/edit_comment_insertimg" ?>',
                     data: 'post_image_comment_id=' + abc + '&comment=' + txt,
                     success: function (data) {
                         document.getElementById('editcommentimg' + abc).style.display = 'none';
                         document.getElementById('showcommentimg' + abc).style.display = 'block';
                         document.getElementById('editsubmitimg' + abc).style.display = 'none';
                         document.getElementById('editcommentboximg' + abc).style.display = 'block';
                         document.getElementById('editcancleimg' + abc).style.display = 'none';
                         $('#' + 'showcommentimg' + abc).html(data);
                         $('.post-design-commnet-box').show();
                     }
                 });
             }
         });
         $(".scroll").click(function (event) {
             event.preventDefault();
             $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
         });
     }
     
     function commenteditimgtwo(abc)
     {
         $("#editcommentimgtwo" + abc).click(function () {
             $(this).prop("contentEditable", true);
             //$(this).html("");
         });
         $('#editcommentimgtwo' + abc).keypress(function (event) {
             if (event.which == 13 && event.shiftKey != 1) {
                 event.preventDefault();
                 var sel = $("#editcommentimgtwo" + abc);
                 var txt = sel.html();
                 if (txt == '' || txt == '<br>') {
                     $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deleteimgtwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                     $('#bidmodal').modal('show');
                     return false;
                 }
   
                 if (window.preventDuplicateKeyPresses)
                     return;
   
                 window.preventDuplicateKeyPresses = true;
                 window.setTimeout(function () {
                     window.preventDuplicateKeyPresses = false;
                 }, 500);
   
                 $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url() . "artistic/edit_comment_insertimg" ?>',
                     data: 'post_image_comment_id=' + abc + '&comment=' + txt,
                     success: function (data) {
                         document.getElementById('editcommentimgtwo' + abc).style.display = 'none';
                         document.getElementById('showcommentimgtwo' + abc).style.display = 'block';
                         document.getElementById('editsubmitimgtwo' + abc).style.display = 'none';
   
                         document.getElementById('editcommentboximgtwo' + abc).style.display = 'block';
                         document.getElementById('editcancleimgtwo' + abc).style.display = 'none';
   
                         $('#' + 'showcommentimgtwo' + abc).html(data);
                         $('.post-design-commnet-box').show();
   
                     }
                 });
             }
         });
         $(".scroll").click(function (event) {
             event.preventDefault();
             $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
         });
     }
     
       function entercommentimg(clicked_id)
     {   
         $("#post_commentimg" + clicked_id).click(function () {
             $(this).prop("contentEditable", true);
         });
   
         $('#post_commentimg' + clicked_id).keypress(function (e) {
   
             if (e.keyCode == 13 && !e.shiftKey) {
                 e.preventDefault();
                 var sel = $("#post_commentimg" + clicked_id);
                 var txt = sel.html();
                 if (txt == '') {
                     return false;
                 }
                 $('#post_commentimg' + clicked_id).html("");
   
                 if (window.preventDuplicateKeyPresses)
                     return;
   
                 window.preventDuplicateKeyPresses = true;
                 window.setTimeout(function () {
                     window.preventDuplicateKeyPresses = false;
                 }, 500);
                 
                 var x = document.getElementById('threecommentimg' + clicked_id);
                 var y = document.getElementById('fourcommentimg' + clicked_id);
                 
                 
                 
                 if (x.style.display === 'block' && y.style.display === 'none') {
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() . "artistic/insert_commentthreeimg" ?>',
                 data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                 dataType: "json",
                 success: function (data) {
                     $('textarea').each(function () {
                         $(this).val('');
                     });
                     $('#' + 'insertcountimg' + clicked_id).html(data.count);
                     $('.insertcommentimg' + clicked_id).html(data.comment);
   
                 }
             });
   
         } else {
   
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url() . "artistic/insert_commentimg" ?>',
                 data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                 dataType: "json",
                 success: function (data) {
                     $('textarea').each(function () {
                         $(this).val('');
                     });
                     $('#' + 'insertcountimg' + clicked_id).html(data.count);
                     $('#' + 'fourcommentimg' + clicked_id).html(data.comment);
                 }
             });
         }
             }
         });
         $(".scroll").click(function (event) {
             event.preventDefault();
             $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
         });
     }
</script>
<!-- 9-5 khyati image script  emd -->