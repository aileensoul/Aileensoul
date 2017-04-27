<!--start head -->
<?php  echo $head; ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />
<style type="text/css" media="screen">
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
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<?php echo $business_header2; ?>
 
  
    <!-- END HEADER -->
   
  <body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container">
      <div class="row" id="row1" style="display:none;">
        <div class="col-md-12 text-center">
        <div id="upload-demo" style="width:100%"></div>
        </div>
        <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
            <button class="btn btn-success upload-result cancel-result" onclick="" >Cancel</button>
    
        <button class="btn btn-success upload-result cancel-result" onclick="myFunction()">Upload Image</button>

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
        <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:1px;margin-top:30px"></div>
        </div>
      </div>

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

                    <h4 class="profile-head-text"><a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$businessdata1[0]['business_slug'].''); ?>"> 


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
                   <div class="msg_flw_btn_2">
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
      <button id="<?php echo "unfollow" . $businessdata1[0]['business_profile_id']; ?>" onClick="unfollowuser(<?php echo $businessdata1[0]['business_profile_id']; ?>)">Following </button>
    </div>
<?php }?>
     </div> 
     <a href="<?php echo base_url('chat/abc/'.$businessdata1[0]['user_id']); ?>">Message</a>
   </div>

   


                </div>
                <?php }?>
                    
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

                              <!-- <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_save_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_save_post'); ?>">Saved Post</a>
                                    </li> -->

                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/userlist'); ?>">Userlist</a>
                                    </li>


                         <?php }?>

                         <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?> 


                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers <br> (<?php echo (count($businessfollowerdata)); ?>)</a>
                                    </li>
                                    

                          <?php }else{

            $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_to' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                            ?> 
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/followers/'.$businessdata1[0]['business_slug']); ?>">Followers  <br> (<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>

                          <?php }?>

                          <?php
                  $userid = $this->session->userdata('aileenuser');
                   if($businessdata1[0]['user_id'] == $userid) {
                    ?>          
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following  <br>  (<?php echo (count($businessfollowingdata)); ?>)</a>
                                    </li>
                                    <?php }else{
      $businessregid = $businessdata1[0]['business_profile_id'];
        $contition_array = array('follow_from' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        ?>
                          <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following/'.$businessdata1[0]['business_slug']); ?>">Following   <br>(<?php echo (count($followerotherdata)); ?>)</a>
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
    <!-- <div  class="add-post-button">
    
        <a class="btn btn-3 btn-3b" href="<?php echo base_url('business_profile/business_profile_addpost'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
  </div> -->
  <div  class="add-post-button">
    
      
        <a class="btn btn-3 btn-3b"href="<?php echo base_url('recruiter'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Recruiter</a>
  </div>
  </div>

                    
                        <div class="col-md-8 col-sm-8">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3> Followers</h3>
                                 <div class="contact-frnd-post">
                              
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
                           <img src="<?php echo base_url(USERIMAGE . $followerimage);?>" height="50px" width="50px" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?> 
                            </div>
                            </li>
                            <li>
                             <div class="">
                         <div class="follow-li-text " style="padding: 0;">
                                <a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$followerslug); ?>"><?php echo ucwords($followername);?></a></div>


                                <!-- category start -->
                                <div>

                                <?php  $category =  $this->db->get_where('industry_type',array('industry_id' => $user['industriyal'], 'status' => 1))->row()->industry_name;  ?>
         
         
                               <a><?php echo $category; ?></a>
     
                                </div>

                               <!--  category end -->
                            </li>
                            
                            <li class="fr">

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
                            <button id="<?php echo "unfollow" . $user['follow_from']; ?>" onClick="unfollowuser_two(<?php echo $user['follow_from']; ?>)"><span>Following</span></button>
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
                                                <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
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
      url: "https://www.aileensoul.com/business_profile/ajaxpro",
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

               $('.' + 'follow_btn_' + clicked_id).html(data);
               $('.' + 'follow_btn_' + clicked_id).removeClass('user_btn');
               $('.' + 'follow_btn_' + clicked_id).addClass('user_btn_h');
               $('#unfollow' + clicked_id).html('');
                    
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
                $('.' + 'follow_btn_' + clicked_id).html(data);

                $('.' + 'follow_btn_' + clicked_id).removeClass('user_btn_h');
                $('.' + 'follow_btn_' + clicked_id).removeClass('user_btn_f');
               $('.' + 'follow_btn_' + clicked_id).addClass('user_btn_i');
               //$('#unfollow' + clicked_id).html('');
            }
        });
    }
</script>

<!--follow like script end -->



