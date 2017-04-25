

<!-- start head -->

<?php  echo $head; ?>

<!--post save success pop up style strat -->
<style>
body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
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

<style type="text/css">
  
  .thumb {
  width:99px;
    height: 99px;
    margin: 0.2em -0.7em 0 0;
}
.remove_thumb {
    position: relative;
    top: -38px;
    right: 5px;
    background: black;
    color: white;
    border-radius: 50px;
    font-size: 1.5em;
    padding: 0 0.3em 0;
    text-align: center;
    cursor: pointer;
}
.remove_thumb:before {
    content: "×";
}
.popup-textarea .description{
       width: 100%;
    height: 30%;
    color: #999999;
    padding: 12px 20px;
    box-sizing: border-box;
    /* border: 2px solid #ccc; */
    border-radius: 4px;
    background-color: #fff;
    font-size: 16px;
    resize: none;
    border: none;
}
  .post_product_name{ resize: none;
    border: 1px solid #d9d9d9;
    background-color: #fff;
    font-size: 16px;
    height: 10%;}
.popup-textarea{border-bottom: 5px solid #ced5df;}

</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
 <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
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
$(document).ready(function()
{


/* Uploading Profile BackGround Image */
$('body').on('change','#bgphotoimg', function()
{

$("#bgimageform").ajaxForm({target: '#timelineBackground',
beforeSubmit:function(){},
success:function(){

$("#timelineShade").hide();
$("#bgimageform").hide();
},
error:function(){

} }).submit();
});


/* Banner position drag */
$("body").on('mouseover','.headerimage',function ()
{
var y1 = $('#timelineBackground').height();
var y2 =  $('.headerimage').height();
$(this).draggable({
scroll: false,
axis: "y",
drag: function(event, ui) {
if(ui.position.top >= 0)
{
ui.position.top = 0;
}
else if(ui.position.top <= y1 - y2)
{
ui.position.top = y1 - y2;
}
},
stop: function(event, ui)
{
}
});
});

/* Bannert Position Save*/
$("body").on('click','.bgSave',function ()
{
var id = $(this).attr("id");
var p = $("#timelineBGload").attr("style");
var Y =p.split("top:");
var Z=Y[1].split(";");
var dataString ='position='+Z[0];
$.ajax({
type: "POST",
url: "<?php echo base_url('artistic/image_saveBG_ajax'); ?>",
data: dataString,
cache: false,
beforeSend: function(){ },
success: function(html)
{
if(html)
{
  window.location.reload();
$(".bgImage").fadeOut('slow');
$(".bgSave").fadeOut('slow');
$("#timelineShade").fadeIn("slow");
$("#timelineBGload").removeClass("headerimage");
$("#timelineBGload").css({'margin-top':html});
return false;
}
}
});
return false;
});



});


// $(document).ready(function(){
//     $('.dropdown_hover').click(function(event){
//         event.stopPropagation();
//          $(".dropdown-content_hover").slideToggle("fast");
//     });
//     $(".dropdown-content_hover").on("dropdown_hover", function (event) {
//         event.stopPropagation();
//     });
// });

// $(document).on("dropdown_hover", function () {
//     $(".dropdown-content_hover").hide();
// });

// $(document).ready(function() {
//      $("body").click(function(event) {
//         $(".dropdown-content_hover").hide();
//         event.stopPropagation();
//     });
 
// });



</script>
</head>
<body>

<div class="user-midd-section">
            <div class="container">
                <div class="row">

    
    <div class="profile-box profile-box-left col-md-4"><div class="full-box-module">

    
      
      <div class="profile-boxProfileCard  module">
<div class="profile-boxProfileCard-cover">
    <a class="profile-boxProfileCard-bg u-bgUserColor a-block" href="<?php echo site_url('artistic/artistic_profile'); ?>" tabindex="-1"
 aria-hidden="true" rel="noopener">
      <img src="<?php echo base_url(ARTBGIMAGE . $artisticdata[0]['profile_background_main']);?>" class="bgImage" style="    height: 95px;
    width: 393px; " >

    </a></div>
  <div class="profile-box-menu-2 fr col-md-12">
<div class="left- col-md-2"></div>
  <div  class="right-section col-md-10">
    <ul class="">                           
                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_savepost'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_savepost'); ?>"> Post</a>
                                    </li>

                                

                                    <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers'); ?>">Followers <br>(<?php echo (count($followerdata)); ?>)</a>
                                    </li>
                                    
                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following'); ?>">Following<br>(<?php echo (count($followingdata)); ?>)</a>
                                    </li>

  
</ul>
  </div>
  </div>
    <div class="profile-boxProfileCard-content">
        <div class="buisness-profile-txext ">
          <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo site_url('artistic/artistic_profile'); ?>" title="zalak" tabindex="-1" aria-hidden="true" rel="noopener">

          <!-- box image start -->
<img src="<?php echo base_url(ARTISTICIMAGE . $artisticdata[0]['art_user_image']);?>" class="bgImage"  style="" >
<!-- box image end -->
           </a>
</div>
      <div class="profile-box-user">
         <span class="profile-box-name ">
           <a href="<?php echo site_url('artistic/artistic_profile'); ?>"> <?php echo ucwords($artisticdata[0]['art_name']) .' '.  ucwords($artisticdata[0]['art_lastname']); ?></a>
          </span>
        <div class="profile-boxProfile-name">
         <a href="<?php echo site_url('artistic/artistic_profile'); ?>">
         <?php if($artisticdata[0]['designation']){
          echo ucwords($artisticdata[0]['designation']);
        } 
        else{
            echo "Designation";
          }?></a></div>
     
      </div>
          <div id="profile-box-profile-prompt"></div>

    </div>
  </div>
  </div>
<div class="full-box-module_follow">

 <!-- follower list start  -->  
      
      <div class="profile-boxProfileCard_follow  module">
      <ul>
<li class="follow_box_ul_li">
      <div class="contact-frnd-post follow_left_main_box">
 <?php

 if($userlistview1 > 0){
 foreach ($userlistview1 as $userlist) {

$userid = $this->session->userdata('aileenuser');

$followfrom =  $this->db->get_where('art_reg',array('user_id' => $userid, 'status' => 1))->row()->art_id;

  
      $contition_array = array('follow_to' =>  $userlist['art_id'], 'follow_from' => $followfrom, 'follow_status' =>'1', 'follow_type' =>'1');
      $artfollow =   $this->data['artfollow'] = $this->common->select_data_by_condition('follow', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

      

      if(!$artfollow){

    
 ?>                             
                              
        <div class="profile-job-post-title-inside clearfix">
                                            
               <div class=" col-md-12 follow_left_box_main" id="<?php echo "fad" . $userlist['art_id']; ?>">                   
                    <div class="post-design-pro-img_follow">

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $userlist['art_user_image']);?>"  alt="">

                    </div>


                      <div class="post-design-name_follow fl">
                      <ul>
                                       

                        <li><div class="post-design-product_follow">
                        <a href="<?php echo base_url('artistic/artistic_profile/'.$userlist['user_id'].''); ?>">
                        <h6>
                        <?php
                        echo ucwords($userlist['art_name']); echo"&nbsp;"; echo ucwords($userlist['art_lastname']);

                        ?>
                        </h6>
                        </a> </div></li>
                        

                           <li>
                         <div class="post-design-product_follow_main" style="display:block;">
                          <a>
                          <p>
                          <?php
                          if($userlist['designation']) {
                            echo $userlist['designation']; 
                          }else{ echo "Designation"; }
                          ?>
                          </p></a>
                         </div>

                       
                          </li>
                      </ul> 
                      </div>  
  
<div class="follow_left_box_main_btn">

<div class="<?php echo "fr" . $userlist['art_id']; ?>">
  <button id="<?php echo "followdiv" . $userlist['art_id']; ?>" onClick="followuser(<?php echo $userlist['art_id']; ?>)">Follow</button>
</div>

</div>


<span class="Follow_close" onClick="followclose(<?php echo $userlist['art_id']; ?>)"><i class="fa fa-times" aria-hidden="true"></i></span>
  
  
                </div>

</div>


<?php

} } }

?>


<!-- second condition start -->



<?php

 if($userlistview2 > 0){
 foreach ($userlistview2 as $userlist) {

$userid = $this->session->userdata('aileenuser');

$followfrom =  $this->db->get_where('art_reg',array('user_id' => $userid, 'status' => 1))->row()->art_id;

  
      $contition_array = array('follow_to' =>  $userlist['art_id'], 'follow_from' => $followfrom, 'follow_status' =>'1', 'follow_type' =>'1');
      $artfollow =   $this->data['artfollow'] = $this->common->select_data_by_condition('follow', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

      

      if(!$artfollow){

    
 ?>                             
                              
        <div class="profile-job-post-title-inside clearfix">
                                            
               <div class=" col-md-12 follow_left_box_main" id="<?php echo "fad" . $userlist['art_id']; ?>">                   
                    <div class="post-design-pro-img_follow">

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $userlist['art_user_image']);?>"  alt="">

                    </div>


                      <div class="post-design-name_follow fl">
                      <ul>
                                       

                        <li><div class="post-design-product_follow">
                        <a href="<?php echo base_url('artistic/artistic_profile/'.$userlist['user_id'].''); ?>">
                        <h6>
                        <?php
                        echo ucwords($userlist['art_name']); echo"&nbsp;"; echo ucwords($userlist['art_lastname']);

                        ?>
                        </h6>
                        </a> </div></li>
                        

                           <li>
                         <div class="post-design-product_follow_main" style="display:block;">
                          <a>
                          <p>
                          <?php
                          if($userlist['designation']) {
                            echo $userlist['designation']; 
                          }else{ echo "Designation"; }
                          ?>
                          </p></a>
                         </div>

                       
                          </li>
                      </ul> 
                      </div>  
  
<div class="follow_left_box_main_btn">

<div class="<?php echo "fr" . $userlist['art_id']; ?>">
  <button id="<?php echo "followdiv" . $userlist['art_id']; ?>" onClick="followuser(<?php echo $userlist['art_id']; ?>)">Follow</button>
</div>

</div>


<span class="Follow_close" onClick="followclose(<?php echo $userlist['art_id']; ?>)"><i class="fa fa-times" aria-hidden="true"></i></span>
  
  
                </div>

</div>


<?php

} } }

?>

<!-- third condition start -->
<?php

 if($userlistview3 > 0){
 foreach ($userlistview3 as $userlist) {

$userid = $this->session->userdata('aileenuser');

$followfrom =  $this->db->get_where('art_reg',array('user_id' => $userid, 'status' => 1))->row()->art_id;

  
      $contition_array = array('follow_to' =>  $userlist['art_id'], 'follow_from' => $followfrom, 'follow_status' =>'1', 'follow_type' =>'1');
      $artfollow =   $this->data['artfollow'] = $this->common->select_data_by_condition('follow', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

      

      if(!$artfollow){

    
 ?>                             
                              
        <div class="profile-job-post-title-inside clearfix">
                                            
               <div class=" col-md-12 follow_left_box_main" id="<?php echo "fad" . $userlist['art_id']; ?>">                   
                    <div class="post-design-pro-img_follow">

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $userlist['art_user_image']);?>"  alt="">

                    </div>


                      <div class="post-design-name_follow fl">
                      <ul>
                                       

                        <li><div class="post-design-product_follow">
                        <a href="<?php echo base_url('artistic/artistic_profile/'.$userlist['user_id'].''); ?>">
                        <h6>
                        <?php
                        echo ucwords($userlist['art_name']); echo"&nbsp;"; echo ucwords($userlist['art_lastname']);

                        ?>
                        </h6>
                        </a> </div></li>
                        

                           <li>
                         <div class="post-design-product_follow_main" style="display:block;">
                          <a>
                          <p>
                          <?php
                          if($userlist['designation']) {
                            echo $userlist['designation']; 
                          }else{ echo "Designation"; }
                          ?>
                          </p></a>
                         </div>

                       
                          </li>
                      </ul> 
                      </div>  
  
<div class="follow_left_box_main_btn">

<div class="<?php echo "fr" . $userlist['art_id']; ?>">
  <button id="<?php echo "followdiv" . $userlist['art_id']; ?>" onClick="followuser(<?php echo $userlist['art_id']; ?>)">Follow</button>
</div>

</div>


<span class="Follow_close" onClick="followclose(<?php echo $userlist['art_id']; ?>)"><i class="fa fa-times" aria-hidden="true"></i></span>
  
  
                </div>

</div>


<?php

} } }

?>
<!-- forth condition start -->
<?php

 if($userlistview4 > 0){
 foreach ($userlistview4 as $userlist) {

$userid = $this->session->userdata('aileenuser');

$followfrom =  $this->db->get_where('art_reg',array('user_id' => $userid, 'status' => 1))->row()->art_id;

  
      $contition_array = array('follow_to' =>  $userlist['art_id'], 'follow_from' => $followfrom, 'follow_status' =>'1', 'follow_type' =>'1');
      $artfollow =   $this->data['artfollow'] = $this->common->select_data_by_condition('follow', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

      

      if(!$artfollow){

    
 ?>                             
                              
        <div class="profile-job-post-title-inside clearfix">
                                            
               <div class=" col-md-12 follow_left_box_main" id="<?php echo "fad" . $userlist['art_id']; ?>">                   
                    <div class="post-design-pro-img_follow">

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $userlist['art_user_image']);?>"  alt="">

                    </div>


                      <div class="post-design-name_follow fl">
                      <ul>
                                       

                        <li><div class="post-design-product_follow">
                        <a href="<?php echo base_url('artistic/artistic_profile/'.$userlist['user_id'].''); ?>">
                        <h6>
                        <?php
                        echo ucwords($userlist['art_name']); echo"&nbsp;"; echo ucwords($userlist['art_lastname']);

                        ?>
                        </h6>
                        </a> </div></li>
                        

                           <li>
                         <div class="post-design-product_follow_main" style="display:block;">
                          <a>
                          <p>
                          <?php
                          if($userlist['designation']) {
                            echo $userlist['designation']; 
                          }else{ echo "Designation"; }
                          ?>
                          </p></a>
                         </div>

                       
                          </li>
                      </ul> 
                      </div>  
  
<div class="follow_left_box_main_btn">

<div class="<?php echo "fr" . $userlist['art_id']; ?>">
  <button id="<?php echo "followdiv" . $userlist['art_id']; ?>" onClick="followuser(<?php echo $userlist['art_id']; ?>)">Follow</button>
</div>

</div>


<span class="Follow_close" onClick="followclose(<?php echo $userlist['art_id']; ?>)"><i class="fa fa-times" aria-hidden="true"></i></span>
  
  
                </div>

</div>


<?php

} } }

?>


<div class="seeall">
<a href="<?php echo base_url('artistic/userlist'); ?>">All User</a>
</div>


</div>
</li>


</ul>
  </div>

<!-- follower list end  -->


  </div>
  
  </div>


<!-- cover pic end -->
       
<!-- popup start -->
<div class="col-md-7 col-sm-7 all-form-content">

  <div class="post-editor col-md-12">
                                <div class="main-text-area col-md-12">
                                <div class="popup-img col-md-1"> <img  src="<?php echo base_url(ARTISTICIMAGE . $artisticdata[0]['art_user_image']);?>"  alt="">
 </div>
 <div id="myBtn"  class="editor-content col-md-11 popup-text" contenteditable>
        <span> Post Your Art....</span> 
      <!--  <span class="fr">
        <input type="file" id="FileID" style="display:none;">
         <label for="FileID"><i class=" fa fa-camera fa"  style=" margin: 8px; cursor:pointer">  </i>
         </label>
          </span>     
       -->
     </div>
    </div>
    <div class="fr">
     <a href="" class="button">Post</a></div>
      </div>
</div>
    <!-- Trigger/Open The Modal -->
<!-- <div id="myBtn">Open Modal</div>
 -->
<!-- The Modal -->
<div id="myModal" class="modal-post">

  <!-- Modal content -->
  <div class="modal-content-post">
   <span class="close1">&times;</span>
  
   <div class="post-editor col-md-12">
   
    <?php echo form_open_multipart(base_url('artistic/art_post_insert/'), array('id' => 'artpostform','name' => 'artpostform', 'class' => 'clearfix')); ?>

                                <div class="main-text-area col-md-12"  style="border-bottom: 5px solid #ced5df;">
                                <div class="popup-img col-md-1"> <img  src="<?php echo base_url(ARTISTICIMAGE . $artisticdata[0]['art_user_image']);?>"  alt="">
 </div>
 <div id="myBtn"  class="editor-content col-md-10 popup-text" >
        <!-- <textarea name="product_title" placeholder="Post Your Product...."></textarea>  -->
         <textarea placeholder="Post Your Art...."  onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); 
 name=my_text rows=4 cols=30 class="post_product_name"></textarea>
  <div>                        
<input size=1 value=50 name=text_num style="width: 52px;"> 
       </div>
      
     </div>
    <!--   <span class="fr">

    <input type="file" id="files" name="postattach[]" multiple style="display:block;">  </span> -->
<div class="col-md-1"><i class=" fa fa-camera "  style="margin: 0px;
    font-size: 27px;
    cursor: pointer;
    /* margin-right: -38px; */
    margin-top: 20px;"></i> </div>

 </div>
<div  id="text"  class="editor-content col-md-12 popup-textarea" >
      <textarea name="product_desc" class="description" placeholder="Enter Description"> </textarea>

      <output id="list"></output>
</div>
<div class="print_privew_post">
  
</div>
<div class="popup-social-icon">
  <ul class="editor-header">
   
                      <li><input type="file" id="file-es" style="display:none;" id="files" name="postattach[]" multiple style="display:block;">
                                    <label for="file-es"><i class=" fa fa-camera "  style=" margin: 8px; cursor:pointer"> Photo/Video </i> </label>
                                    </li>
                                
                                  <li><input type="file-es" id="files" style="display:none;" id="files" name="postattach[]" multiple style="display:block;">
                                    <label for="file-es"><i class="fa fa-music "  style=" margin: 8px; cursor:pointer"> Audio </i></label>
                                    </li>
                                
                                 <li><input type="file" id="file-es" style="display:none;" id="files" name="postattach[]" multiple style="display:block;">
                                    <label for="file-es"><i class=" fa fa-file-pdf-o fa-2x"  style=" margin: 8px; cursor:pointer"> PDF </i></label>
                                    </li>
                               
                                    </ul>
     

</div>
    <div class="fr">
     <button type="submit"  value="Submit">Submit</button>    </div>
     <?php echo form_close(); ?>
      </div>
  </div>
</div>
<!-- popup end -->

 <div class="col-md-7 col-sm-7 all-form-content">


<?php

function text2link($text){
    $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
    return $text;
  } 
   
?>
                    
<?php
foreach($finalsorting as $row)
    {

      $userid = $this->session->userdata('aileenuser');

      $contition_array = array('art_post_id' =>  $row['art_post_id'], 'status' =>'1');
      $artdelete =   $this->data['artdelete'] = $this->common->select_data_by_condition('art_post', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');

      $likeuserarray = explode(',', $artdelete[0]['delete_post']);

      if(!in_array($userid, $likeuserarray)){

?>
                         

<div class="col-md-12 col-sm-12 post-design-box" id="<?php echo "removepost" . $row['art_post_id']; ?>">

                   
                <div class=" ">
                    <div class="post-design-top col-md-12" id= "showpost">  
                    <div class="post-design-pro-img"> 



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
<!-- pop up box end-->



              <?php 
                 $art_userimage =  $this->db->get_where('art_reg',array('user_id' => $row['user_id'], 'status' => 1))->row()->art_user_image;
                 ?>

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage);?>"  alt=""> 
                    </div>


                      <div class="post-design-name fl">
                      <ul>
                      <?php 
                 $firstname =  $this->db->get_where('art_reg',array('user_id' => $row['user_id']))->row()->art_name; 

                 $lastname =  $this->db->get_where('art_reg',array('user_id' => $row['user_id']))->row()->art_lastname; 
                 $userskill =  $this->db->get_where('art_reg',array('user_id' => $row['user_id']))->row()->art_skill; 


                    $aud= $userskill;
                    $aud_res=explode(',',$aud);
                    foreach ($aud_res as $skill)
                        {
                                                
                          $cache_time  =  $this->db->get_where('skill',array('skill_id' => $skill))->row()->skill;  
                          $skill1[]= $cache_time;
                                                   
                        }
                        $listFinal = implode(', ',$skill1);
                                                    
                 ?>
                 

                        <li><div class="post-design-product"><a href="<?php echo base_url('artistic/artistic_profile/'.$row['user_id']); ?>"><?php echo ucwords($firstname); print "&nbsp;&nbsp;"; echo ucwords($lastname); ?> <span> <?php echo date('d-M-Y',strtotime($row['created_date'])); ?></span></a> </div></li>
                        <!-- 
                        <li><div class="post-design-product"><a><?php  //echo $listFinal ; ?> </a></div></li>
                         -->

                         <li>
                         <div id="<?php echo 'editpostdata' . $row['art_post_id']; ?>" style="display:block;">
                          <a><?php print text2link($row['art_post']);?></a>
                         </div>

                         <div id="<?php echo 'editpostbox' . $row['art_post_id']; ?>" style="display:none;">
                         <input type="text" id="<?php echo 'editpostname' . $row['art_post_id']; ?>" name="editpostname" value="<?php echo $row['art_post'];?>">
                         </div>

                          </li>
                        
                      </ul> 
                      </div>  
  
<div class="dropdown1">
<a onClick="myFunction(<?php echo $row['art_post_id']; ?>)" class="dropbtn1 dropbtn1 fa fa-ellipsis-v"></a>
  <div id="<?php echo "myDropdown" . $row['art_post_id']; ?>" class="dropdown-content1">


    <?php 
    $userid  = $this->session->userdata('aileenuser');
    if($row['user_id'] == $userid) {
    ?>
    <a href="<?php echo "#popup2" . $row['art_post_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>
    

     <a id="<?php echo $row['art_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>


    <?php }else{?>
    <a href="<?php echo "#popup5" . $row['art_post_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>

    <?php

  $userid  = $this->session->userdata('aileenuser'); 
  $contition_array = array( 'user_id' => $userid, 'post_save' => '1', 'post_id ' => $row['art_post_id']);
         $artsave = $this->data['artsave']  = $this->common->select_data_by_condition('art_post_save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
     
         if($artsave){

?>

   <a><i class="fa fa-bookmark" aria-hidden="true"></i>Saved Post</a>

<?php }else{?>

 <a id="<?php echo $row['art_post_id']; ?>" onClick="save_post(this.id)" href="#popup1" class="<?php echo 'savedpost' . $row['art_post_id']; ?>"><i class="fa fa-bookmark" aria-hidden="true"></i>Save Post</a>
<?php }?>


    <a href="<?php echo base_url('artistic/artistic_contactperson/'.$row['user_id'].''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a>
    <?php }?>
  </div>
</div>


  <div class="post-design-desc show">
  <span> 

  <div id="<?php echo 'editpostdetails' . $row['art_post_id']; ?>" style="display:block;">
  <?php print text2link($row['art_description']); ?>
  </div>

  <div id="<?php echo 'editpostdetailbox' . $row['art_post_id']; ?>" style="display:none;">

  <textarea id="<?php echo 'editpostdesc' . $row['art_post_id']; ?>" name="editpostdesc"><?php echo $row['art_description'];?>
  </textarea> 
  </div>

  <button id="<?php echo "editpostsubmit" . $row['art_post_id']; ?>" style="display:none" onClick="edit_postinsert(<?php echo $row['art_post_id']; ?>)">EditPost</button>
  

   </span></div> 
                </div>


                 <div class="post-design-mid col-md-12" >  
                <div>

                     
                     <?php
 
              $contition_array = array('post_id' => $row['art_post_id'], 'is_deleted' =>'1', 'image_type' => '1');
            $artmultiimage = $this->data['artmultiimage'] =  $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
                  ?>
                  <?php  if($artmultiimage) {  ?>
                    <div class="post-design-product-img">
                  <?php 
                      foreach ($artmultiimage as $multiimage) {
                    
                                                       $allowed =  array('gif','png','jpg');
                                                       $allowespdf = array('pdf');
                                                       $allowesvideo = array('mp4','3gp');
                                                       $allowesaudio = array('mp3');

                                                       $filename = $multiimage['image_name'];
                                                       
                                                       $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                      
                           // echo '<pre>'; print_r($ext);
                           //  echo '<pre>'; print_r($allowed); 
                                                       if(in_array($ext,$allowed) ) 
                                                       { 
                                                         
                                                          ?>
                                                         
                                                       <a href="<?php echo base_url('artistic/postnewpage/'.$row['art_post_id']) ?>"><img src="<?php echo base_url(ARTPOSTIMAGE. str_replace(" ","_",$multiimage['image_name']))?>" style=""> </a>
                                                          <?php
                                                       }
                                                       elseif(in_array($ext,$allowespdf))
                                                       {  ?>

                                                      

                                                        <a href="<?php echo base_url('artistic/creat_pdf/'.$multiimage['image_id']) ?>">PDF</a>
                                                       <?php }
                                                       elseif(in_array($ext,$allowesvideo))
                                                       { 
                                                        
                                                       ?>

                                                        <video width="320" height="240" controls>
                                                          <source src="<?php echo base_url(ARTPOSTIMAGE.$multiimage['image_name']); ?>" type="video/mp4">
                                                          <source src="movie.ogg" type="video/ogg">
                                                          Your browser does not support the video tag.
                                                       </video>
                                                       <?php
                                                        }

                                                        elseif(in_array($ext,$allowesaudio)){
                                                          ?>
                                                  <audio width="120" height="100" controls>

                                                          <source src="<?php echo base_url(ARTPOSTIMAGE.$multiimage['image_name']); ?>" type="audio/mp3">
                                                          <source src="movie.ogg" type="audio/ogg">
                                                          Your browser does not support the audio tag.
                                                      
                                                  </audio>

                                                         <?php }?> 

                                                       <?php   }
                                                       ?> </div> <?php }?>                 

                </div>   
                </div>
                <div class="post-design-like-box col-md-12">
                <div class="post-design-menu">
                  <ul>

                    <li class="<?php echo 'likepost' . $row['art_post_id']; ?>">
                    <a id="<?php echo $row['art_post_id']; ?>" onClick="post_like(this.id)">

                    <?php

             $userid = $this->session->userdata('aileenuser');
          $contition_array = array('art_post_id' => $row['art_post_id'], 'status' =>'1');
          $artlike =   $this->data['artlike'] = $this->common->select_data_by_condition('art_post', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
          $likeuserarray = explode(',', $artlike[0]['art_like_user']);

                      if(!in_array($userid, $likeuserarray)){
                        ?>
                        <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>
                      <?php }else{
                        ?>
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                     <?php }
                     ?>
                     

                    <span>
                               
                                <?php 
                                if($row['art_likes_count'] > 0){
                                echo $row['art_likes_count'];
                                }
                                ?>

                                      </span>
                                      </a>
                    </li>

                    <li>

                     <?php 

          $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' =>'0');
           $commnetcount = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 

                                   ?>

                    <a  onClick="commentall(this.id)" id="<?php echo $row['art_post_id']; ?>">
                    <i class="fa fa-comment-o" aria-hidden="true">
                     <?php 
                    if(count($commnetcount) > 0){
                    echo count($commnetcount); 
                   }else{}
                    ?>
                     </i> 
                    </a>
                    </li>
                  </ul>

                  </div>
                </div>


<!-- like user list start -->

<!-- pop up box start-->
<div id="<?php echo "popuplike" . $row['art_post_id']; ?>" class="overlay">
  <div class="popup">
    
    <div class="pop_content">
      
      <?php 


$contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' =>'0');
$commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 

$likeuser = $commnetcount[0]['art_like_user'];
$countlike = $commnetcount[0]['art_likes_count'] - 1;

$likelistarray = explode(',', $likeuser);


      foreach ($likelistarray as $key => $value) {
       
$art_fname1 =  $this->db->get_where('art_reg',array('user_id' => $value, 'status' => 1))->row()->art_name;

$art_lname1 =  $this->db->get_where('art_reg',array('user_id' => $value, 'status' => 1))->row()->art_lastname;
      ?>

      <a href="<?php echo base_url('artistic/artistic_profile/'.$value); ?>">
      <?php echo ucwords($art_fname1); echo "&nbsp;"; echo ucwords($art_lname1); ?>
        
      </a>

<?php }?>

<p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>

    </div>

  </div>
</div>
<!-- pop up box end-->

                        <a  href="<?php echo "#popuplike" . $row['art_post_id']; ?>">
                        <?php

$contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' =>'0');
$commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 

$likeuser = $commnetcount[0]['art_like_user'];
$countlike = $commnetcount[0]['art_likes_count'] - 1;

$likelistarray = explode(',', $likeuser);

$art_fname =  $this->db->get_where('art_reg',array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;

$art_lname =  $this->db->get_where('art_reg',array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                        ?>


<div>


<?php echo ucwords($art_fname); echo "&nbsp;"; echo ucwords($art_lname); echo "&nbsp;"; ?>

</div>

<?php

if(count($likelistarray) > 1) {
?>
<div>
<?php  echo "and"; ?>
</div>

<b><?php echo $countlike; echo "others"; ?> </b>


<?php }?>
</a>

<!-- like user list end -->

                <div class="art-all-comment col-md-12">
                  

<!-- all comment start-->

                    <div id="<?php echo "fourcomment" . $row['art_post_id']; ?>" style="display:none">

                    <div class="<?php echo 'insertcomment2' . $row['art_post_id']; ?>">
                                    <?php 

                                    $contition_array = array('art_post_id' =>  $row['art_post_id'], 'status' =>'1');
        $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data='*', $sortby = 'artistic_post_comment_id', $orderby = 'ASC', $limit = '', $offset = '', $join_str= array(), $groupby = ''); 
                                      
                                        if($artdata){
                                      foreach($artdata as $rowdata)
                                        { 

                 $artname =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id']))->row()->art_name;


                 $artlastname =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id']))->row()->art_lastname;

                                        ?>

<div class="all-comment-comment-box">
 <div class="post-design-pro-comment-img"> 
                  <?php 
                 $art_userimage =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image;
                 ?>

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage);?>"  alt="">
                  </div>
<div class="comment-name">
                                        <b><?php echo ucwords($artname); echo "&nbsp;"; echo ucwords($artlastname); ?></b><?php echo '</br>';
                                        ?></div>
                                        <div class="comment-details" id= "<?php echo "showcomment2" . $rowdata['artistic_post_comment_id']; ?>">
                      <?php  echo text2link($rowdata['comments']); echo '</br>';
                                       ?>
                                       </div>
                                      

                                        <input type="text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>" id="<?php echo "editcomment2" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" value="<?php  echo $rowdata['comments']; ?>"  onClick="commentedit2(this.name)">

                                        <button id="<?php echo "editsubmit2" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment2(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Comment</button>



                                         <!-- b><?php
                                        // echo $rowdata['created_date']; echo '</br>'; ?></b> -->
                                                                
 <div class="art-comment-menu-design"> 
                 
                                <div class="comment-details-menu" id="<?php echo 'likecomment' . $rowdata['artistic_post_comment_id']; ?>">
                                <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like(this.id)">

            <?php

             $userid = $this->session->userdata('aileenuser');
          $contition_array = array('artistic_post_comment_id' => $rowdata['artistic_post_comment_id'], 'status' =>'1');
          $artcommentlike =   $this->data['artcommentlike'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
          $likeuserarray = explode(',', $artcommentlike[0]['artistic_comment_like_user']);

                      if(!in_array($userid, $likeuserarray)){
                        ?>
                      <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>
                      <?php }else{
                        ?>
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                     <?php }
                     ?>

                                  <span>
                                       <?php
                                       if($rowdata['artistic_comment_likes_count']){
                                        echo $rowdata['artistic_comment_likes_count']; 
                                         }
                                        ?>
                                  </span>
                                  </a>
                                 </div>

                 <?php
                    $userid  = $this->session->userdata('aileenuser');
                      if($rowdata['user_id'] == $userid){ 
                           ?>                                
<span role="presentation" aria-hidden="true"> · </span>

<div class="comment-details-menu">

                                      <div id="<?php echo 'editbox2' . $rowdata['artistic_post_comment_id']; ?>" style="display:block;">

                 
                                      <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_editbox2(this.id)">Edit
                                      </a>

                                      </div>
                  
                                      <div id="<?php echo 'editcancle2' . $rowdata['artistic_post_comment_id']; ?>" style="display:none;">
                                      <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editcancle2(this.id)">Cancle
                                      </a>
                                      </div>
       </div>
       <?php }?>

 

 <?php
       $userid  = $this->session->userdata('aileenuser');

       $art_userid =  $this->db->get_where('art_post',array('art_post_id' => $rowdata['art_post_id'], 'status' => 1))->row()->user_id;


          if($rowdata['user_id'] == $userid ||  $art_userid == $userid){ 
             ?>       
<span role="presentation" aria-hidden="true"> · </span>
<div class="comment-details-menu">                             

                                      <input type="hidden" name="post_delete"  id="post_delete2" value= "<?php echo $rowdata['art_post_id']; ?>">
                                      <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete2(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                      </span>
                                      </a>
               </div>

               <?php }?>
<span role="presentation" aria-hidden="true"> · </span>
<div class="comment-details-menu">  <p>

                             
                                      <?php 
                                        echo date('d-M-Y',strtotime($rowdata['created_date'])); echo '</br>'; ?></p></div>



                                       </div>
                                       </div>
 
                                        <?php    } 

                                           }else{ 

                                            echo 'No comments Available!!!';} ?>
                 
                                    </div>
                                    </div>
                                   
                                    <!-- khyati changes start -->

                                                <div  id="<?php echo "threecomment" . $row['art_post_id']; ?>" style="display:block">
                                                <div class="<?php echo 'insertcomment' . $row['art_post_id']; ?>">
                                                <?php 

                                    $contition_array = array('art_post_id' =>  $row['art_post_id'], 'status' =>'1');
        $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data='*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str= array(), $groupby = ''); 
                                      
                                        if($artdata){
                                      foreach($artdata as $rowdata)
                                        {
                                          $artname =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id']))->row()->art_name;

                                          $artlastname =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id']))->row()->art_lastname;

                                       ?>
                                       <div class="all-comment-comment-box">
   <div class="post-design-pro-comment-img"> 
                  <?php 
                 $art_userimage =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image;
                 ?>

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage);?>"  alt="">
                  </div>
<div class="comment-name">
                                       <b><?php echo ucwords($artname); echo "&nbsp;"; echo ucwords($artlastname); ?></b><?php echo '</br>'; ?></div>

                                        <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['artistic_post_comment_id']; ?>">
                                        <?php
                                        echo text2link($rowdata['comments']); echo '</br>';
                                        ?>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="col-md-10">                             
                                        <input type="text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>" id="<?php echo "editcomment" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" value="<?php  echo $rowdata['comments']; ?>" onClick="commentedit(this.name)">
                                        </div>

                                        <div class="col-md-2 comment-edit-button">
                                        <button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Comment</button>
                                        </div>

</div>
                                   
                      
 <div class="art-comment-menu-design"> 
                                <div class="comment-details-menu" id="<?php echo 'likecomment1' . $rowdata['artistic_post_comment_id']; ?>">
                                  <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like1(this.id)">

                                   <?php

             $userid = $this->session->userdata('aileenuser');
          $contition_array = array('artistic_post_comment_id' => $rowdata['artistic_post_comment_id'], 'status' =>'1');
          $artcommentlike =   $this->data['artcommentlike'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str= array(), $groupby = '');
          $likeuserarray = explode(',', $artcommentlike[0]['artistic_comment_like_user']);

                      if(!in_array($userid, $likeuserarray)){
                        ?>

                        <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> 
                    <?php }else{
                    ?>
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                     <?php }
                     ?>
                        <span>
                       <?php 
                       if($rowdata['artistic_comment_likes_count'] > 0){
                       echo $rowdata['artistic_comment_likes_count'];
                        }
                        ?>
                        </span>
                        </a>
</div>


<?php
       $userid  = $this->session->userdata('aileenuser');

          if($rowdata['user_id'] == $userid){ 
             ?> 

<span role="presentation" aria-hidden="true"> · </span>
<div class="comment-details-menu">

                                      <div id="<?php echo 'editbox' . $rowdata['artistic_post_comment_id']; ?>" style="display:block;">
                                      <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editbox(this.id)">Edit
                                      </a>
                                      </div>

                                      <div id="<?php echo 'editcancle' . $rowdata['artistic_post_comment_id']; ?>" style="display:none;">
                                      <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editcancle(this.id)">Cancle
                                      </a>
                                      </div>
                                      
</div>
<?php }?>

<?php
       $userid  = $this->session->userdata('aileenuser');

       $art_userid =  $this->db->get_where('art_post',array('art_post_id' => $rowdata['art_post_id'], 'status' => 1))->row()->user_id;


          if($rowdata['user_id'] == $userid ||  $art_userid == $userid){ 
             ?> 
<span role="presentation" aria-hidden="true"> · </span>
<div class="comment-details-menu">
                                      <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['art_post_id']; ?>">
                                      <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                      </span>
                                      </a>
                                      </div>
<?php }?>

                                      <span role="presentation" aria-hidden="true"> · </span>

<div class="comment-details-menu">
                                         <p> <?php 
                                        echo date('d-M-Y',strtotime($rowdata['created_date'])); echo '</br>'; ?>
                                      </p></div></div>
                                       </div>
                                              

                                      
                                         <?php 
                                       } }
                                      ?>
                                                  
                                                </div>
                                                </div>
                                                <!-- khyati changes end -->
                                                
<!-- all comment end-->


                </div>
                <div class="post-design-commnet-box col-md-12">
                
                  <div class="post-design-proo-img" > 
                  <?php 
                  $userid  = $this->session->userdata('aileenuser'); 
                 $art_userimage =  $this->db->get_where('art_reg',array('user_id' => $userid, 'status' => 1))->row()->art_user_image;
                 ?>

                 <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage);?>"  alt="">
                  </div>


                  <div class="">
                  <div class="col-md-10 inputtype-comment">
                  <input type="text" name="<?php echo $row['art_post_id']; ?>"  id="<?php echo "post_comment" . $row['art_post_id']; ?>" placeholder="Type Comment ..." value= "" onClick="entercomment(this.name)">
                  </div>

                  <?php echo form_error('post_comment'); ?>
                    <div class="col-md-1 comment-edit-butn">                                      
                  <button id="<?php echo $row['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button>
                                             
                  </div>
</div>

      </div>
      </div>
                        </div>


                                        <?php
                                        } }
                                      
                                        ?>


                    </div>
    </section>
    <footer>
    <?php echo $footer;  ?>
    </footer>
</body>

</html>

<!-- script for skill textbox automatic start (option 2)-->

<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  
<!-- script for skill textbox automatic end (option 2)-->

<script>
  $( function() {

    var complex = <?php echo json_encode($demo); ?>;
    

    var availableTags = complex; 
    $( "#tags" ).autocomplete({ 
      source: availableTags
    });
  } );
  </script>

<script>
//select2 autocomplete start for skill
$('#searchskills').select2({
        
        placeholder: 'Find Your Skills',
       
        ajax:{

         
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
        ajax:{

         
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
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
 

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

  

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



<!-- post like script start -->

<script type="text/javascript">
function post_like(clicked_id)
{
    
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "artistic/like_post" ?>',
                 data:'post_id='+clicked_id,
                success:function(data){ 
                    $('.' + 'likepost' + clicked_id).html(data);
                    
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
                type:'POST',
                url:'<?php echo base_url() . "artistic/like_comment" ?>',
                 data:'post_id='+clicked_id,
                success:function(data){ 
                    $('#' + 'likecomment' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<script type="text/javascript">
function comment_like1(clicked_id)
{
  
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "artistic/like_comment1" ?>',
                 data:'post_id='+clicked_id,
                success:function(data){ 
                    $('#' + 'likecomment1' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<!--comment like script end -->

<!-- comment delete script start -->

<script type="text/javascript">
function comment_delete(clicked_id)
{  
    
     var post_delete = document.getElementById("post_delete");
   
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "artistic/delete_comment" ?>',
                 data:'post_id='+clicked_id + '&post_delete='+post_delete.value,
                success:function(data){ 


                    $('.' + 'insertcomment' + post_delete.value).html(data);
                    
                }
            }); 
}


function comment_delete2(clicked_id)
{
    
     var post_delete = document.getElementById("post_delete2");
   
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "artistic/delete_comment" ?>',
                 data:'post_id='+clicked_id + '&post_delete='+post_delete.value,
                success:function(data){ 


                    $('.' + 'insertcomment2' + post_delete.value).html(data);
                    
                }
            }); 
}
</script>

<!--comment delete script end -->


<!-- comment insert script start -->
<!-- insert comment using comment button-- > 
<!-- insert comment using enter -->
<script type="text/javascript">

function insert_comment(clicked_id)
{  
     var post_comment = document.getElementById("post_comment" + clicked_id);
 
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/insert_comment" ?>',
                 data:'post_id='+clicked_id + '&comment='+post_comment.value,
                   success:function(data){ 
                     $('input').each(function(){
                      $(this).val('');
                  }); 
                    $('.' + 'insertcomment' + clicked_id).html(data);
                    
                }
            }); 
}

</script>

<script type="text/javascript">
  
function entercomment(clicked_id)
{
 //alert(clicked_id);
  $(document).ready(function() {
  $('#post_comment' + clicked_id).keypress(function(e) {
    if (e.which == 13) { 
      var val = $('#post_comment' + clicked_id).val();
      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/insert_comment" ?>',
                 data:'post_id='+clicked_id + '&comment='+val,
                   success:function(data){ 
                     $('input').each(function(){
                      $(this).val('');
                  }); 
                    $('.' + 'insertcomment' + clicked_id).html(data);
                    
                }
            }); 
      //alert(val);
    }        
  });
});

}
</script>

<!--comment insert script end -->

<!-- comment edit script start -->

<!-- comment edit box start-->
<script type="text/javascript">
    
    function comment_editbox(clicked_id){ 
        
    
        document.getElementById('editcomment' + clicked_id).style.display='block';
        document.getElementById('showcomment' + clicked_id).style.display='none';
        document.getElementById('editsubmit' + clicked_id).style.display='block';

        document.getElementById('editbox' + clicked_id).style.display='none';
        document.getElementById('editcancle' + clicked_id).style.display='block';
        
}


function comment_editcancle(clicked_id){ 

        document.getElementById('editbox' + clicked_id).style.display='block';
        document.getElementById('editcancle' + clicked_id).style.display='none';

        document.getElementById('editcomment' + clicked_id).style.display='none';
       document.getElementById('showcomment' + clicked_id).style.display='block';
       document.getElementById('editsubmit' + clicked_id).style.display='none';
   
} 

function comment_editbox2(clicked_id){ 
        document.getElementById('editcomment2' + clicked_id).style.display='block';
        document.getElementById('showcomment2' + clicked_id).style.display='none';
        document.getElementById('editsubmit2' + clicked_id).style.display='block';

        document.getElementById('editbox2' + clicked_id).style.display='none';
        document.getElementById('editcancle2' + clicked_id).style.display='block';
        
}


function comment_editcancle2(clicked_id){ 
 
        document.getElementById('editbox2' + clicked_id).style.display='block';
        document.getElementById('editcancle2' + clicked_id).style.display='none';

        document.getElementById('editcomment2' + clicked_id).style.display='none';
       document.getElementById('showcomment2' + clicked_id).style.display='block';
       document.getElementById('editsubmit2' + clicked_id).style.display='none';
   
} 


</script>

<!--comment edit box end-->

<!-- comment edit insert start -->

<script type="text/javascript">
function edit_comment(abc)
{ 

   var post_comment_edit = document.getElementById("editcomment" + abc);
   
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                 data:'post_id='+abc + '&comment='+post_comment_edit.value,
                   success:function(data){ 

                  
         document.getElementById('editcomment' + abc).style.display='none';
       document.getElementById('showcomment' + abc).style.display='block';
       document.getElementById('editsubmit' + abc).style.display='none';

       document.getElementById('editbox' + abc).style.display='block';
        document.getElementById('editcancle' + abc).style.display='none';
                     
                    $('#' + 'showcomment' + abc).html(data);


                    
                }
            }); 
   
}
</script>


<script type="text/javascript">

function commentedit(abc)
{
 
  $(document).ready(function() {
  $('#editcomment' + abc).keypress(function(e) {
    if (e.which == 13) {
      var val = $('#editcomment' + abc).val();
      
      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                 data:'post_id='+abc + '&comment='+val,
                   success:function(data){ 

                  
         document.getElementById('editcomment' + abc).style.display='none';
       document.getElementById('showcomment' + abc).style.display='block';
       document.getElementById('editsubmit' + abc).style.display='none';

       document.getElementById('editbox' + abc).style.display='block';
        document.getElementById('editcancle' + abc).style.display='none';
                     
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
function edit_comment2(abc)
{ 

   var post_comment_edit = document.getElementById("editcomment2" + abc);
  
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                 data:'post_id='+abc + '&comment='+post_comment_edit.value,
                   success:function(data){ 
                 
         document.getElementById('editcomment2' + abc).style.display='none';
       document.getElementById('showcomment2' + abc).style.display='block';
       document.getElementById('editsubmit2' + abc).style.display='none';

       document.getElementById('editbox2' + abc).style.display='block';
        document.getElementById('editcancle2' + abc).style.display='none';
                     
                    $('#' + 'showcomment2' + abc).html(data);


                    
                }
            }); 
   
}
</script>


<script type="text/javascript">

function commentedit2(abc)
{
 
  $(document).ready(function() {
  $('#editcomment2' + abc).keypress(function(e) {
    if (e.which == 13) {
      var val = $('#editcomment2' + abc).val();
      
      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                 data:'post_id='+abc + '&comment='+val,
                   success:function(data){ 

                  
         document.getElementById('editcomment2' + abc).style.display='none';
       document.getElementById('showcomment2' + abc).style.display='block';
       document.getElementById('editsubmit2' + abc).style.display='none';

       document.getElementById('editbox2' + abc).style.display='block';
        document.getElementById('editcancle2' + abc).style.display='none';
                     
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

<!-- hide and show data start-->
<script type="text/javascript">
  function commentall(clicked_id){ 

   var x = document.getElementById('threecomment'+ clicked_id);
   var y = document.getElementById('fourcomment'+ clicked_id);
    if (x.style.display === 'block' && y.style.display === 'none') {
        x.style.display = 'none';
        y.style.display = 'block';
 
    } else {
        x.style.display = 'block';
        y.style.display = 'none';
    }

  }
</script>
<!-- hide and show data end-->


<!-- popup box for post start -->

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
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
window.onclick = function(event) {
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
$(function() {
var showTotalChar = 150, showChar = "More", hideChar = "less";
$('.show').each(function() {
var content = $(this).text();
if (content.length > showTotalChar) {
var con = content.substr(0, showTotalChar);
var hcon = content.substr(showTotalChar, content.length - showTotalChar);
var txt= con +  '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
$(this).html(txt);
}
});
$(".showmoretxt").click(function() {
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
function read( f ) {//alert("aa");
  return function( e ) {
  var base64 =  e.target.result;
  var $img = $('<img/>', {
    src: base64,
    title: encodeURIComponent(f.name), //( escape() is deprecated! )
    "class": "thumb"
    });
  var $thumbParent = $("<span/>",{html:$img, "class":"thumbParent"}).append('<span class="remove_thumb"/>');
  thumbsArray.push(base64); // Push base64 image into array or whatever.
    $list.append(  $thumbParent  );
  };
}

// HANDLE FILE/S UPLOAD
function handleFileSelect( e ) {//alert("aaa");
    e.preventDefault(); // Needed?
  var files = e.target.files;
    var len = files.length;
    if(len>maxUpload || thumbsArray.length >= maxUpload){
    return alert("Sorry you can upload only 5 images");
  }
    for (var i=0; i<len; i++) { 
      var f = files[i];
      if (!f.type.match('image.*')) continue; // Only images allowed    
        var reader = new FileReader();
        reader.onload = read(f); // Call read() function
        reader.readAsDataURL(f);
    }
} 

$fileUpload.change(function( e ) {//alert("aaaa");
    handleFileSelect(e);
});

$list.on('click', '.remove_thumb', function () {//alert("aaaaa");
    var $removeBtns = $('.remove_thumb'); // Get all of them in collection
    var idx = $removeBtns.index(this );   // Exact Index-from-collection
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
 }
else{ // Maximum length not reached so update the value of my_text counter
  my_form.text_num.value = maxLen - my_form.my_text.value.length;
}
}
//-->
</script>

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

   
                  
       document.getElementById('editpostdata' + abc).style.display='none';
       document.getElementById('editpostbox' + abc).style.display='block';
       document.getElementById('editpostdetails' + abc).style.display='none';
       document.getElementById('editpostdetailbox' + abc).style.display='block';
       document.getElementById('editpostsubmit' + abc).style.display='block';

        
}
</script>


<script type="text/javascript">
   function edit_postinsert(abc)
   { 

    var editpostname = document.getElementById("editpostname" + abc);
    var editpostdetails = document.getElementById("editpostdesc" + abc);

      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/edit_post_insert" ?>',
                data:'art_post_id='+abc + '&art_post='+editpostname.value + '&art_description='+editpostdetails.value,
                dataType: "json",
                   success:function(data){ 
                
            document.getElementById('editpostdata' + abc).style.display='block'; 
            document.getElementById('editpostbox' + abc).style.display='none';
            document.getElementById('editpostdetails' + abc).style.display='block';
            document.getElementById('editpostdetailbox' + abc).style.display='none';

            document.getElementById('editpostsubmit' + abc).style.display='none';
          
                 $('#' + 'editpostdata' + abc).html(data.title);
                 $('#' + 'editpostdetails' + abc).html(data.description);

                }
            }); 
        
}
</script>


<!-- edit post end -->
<!-- save post start -->

<script type="text/javascript">
   function save_post(abc)
   {  

      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/artistic_save" ?>',
                data:'art_post_id='+abc,
                success:function(data){ 
                
                 $('.' + 'savedpost'+ abc).html(data);
                 //window.setTimeout(update, 10000);

                }
            }); 
        
}
</script>

<!-- save post end -->

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

</script>

<!-- remove save post start -->

<script type="text/javascript">
   function remove_post(abc)
   {  

      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/art_deletepost" ?>',
                data:'art_post_id='+abc,
                //alert(data);
                success:function(data){ 
                
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
                type:'POST',
                url:'<?php echo base_url() . "artistic/del_particular_userpost" ?>',
                data:'art_post_id='+abc,
                //alert(data);
                success:function(data){ 
                
                 $('#' + 'removepost' + abc).html(data);
                 

                }
            }); 
        
}
</script>

<!-- remove particular user post end -->


<!-- follow user script start -->

<script type="text/javascript">
function followuser(clicked_id)
{  
     
        $("#fad" + clicked_id).fadeOut(4000);
   
  
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "artistic/follow" ?>',
                 data:'follow_to='+clicked_id,
                success:function(data){ 

               $('.' + 'fr' + clicked_id).html(data);
                    
                }


            }); 

}

</script>


<script type="text/javascript">
function followclose(clicked_id)
{ 
      $("#fad" + clicked_id).fadeOut(3000); 
}
</script>
<!--follow like script end -->



