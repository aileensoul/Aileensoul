
<!-- start head -->

<?php  echo $head; ?>

<style type="text/css">
  
  .thumb {
  width:100px;
    height: 100px;
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
    height: 90px;
    color: #999999;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
  }


</style>


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/select2-4.0.3.min.css'); ?>">
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
<header>
    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                  <div class="col-md-2 col-sm-5">
                       <div class="pushmenu pushmenu-left">
                            <ul class="">
                                    <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_post'); ?>">Home</a>
                                    </li>
                                <!-- Friend Request Start-->

                                <div>

                                </div>
                                <!-- Friend Request End-->

                                <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </div> 
                    </div>
                  
                     <?php echo $artistic_search; ?>
                </div>
            </div>
        </div>
       </div> 
    </header>


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
</script>
</head>
<body>

<div class="user-midd-section">
            <div class="container">
                <div class="row">

    
    <div class="profile-box profile-box-left col-md-4"><div class="full-box-module">

    
      
      <div class="profile-boxProfileCard  module">
<div class="profile-boxProfileCard-cover">
    <a class="profile-boxProfileCard-bg u-bgUserColor a-block" href="<?php echo site_url('artistic/artistic_profile/'.$artisticdata[0]['user_id']); ?>" tabindex="-1"
 aria-hidden="true" rel="noopener">
      <img src="<?php echo base_url(ARTBGIMAGE . $artisticdata[0]['profile_background']);?>" class="bgImage" style="    height: 95px;
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
          <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo site_url('artistic/artistic_profile/'.$artisticdata[0]['user_id']); ?>" title="zalak" tabindex="-1" aria-hidden="true" rel="noopener">

          <!-- box image start -->
<img src="<?php echo base_url(USERIMAGE . $artisticdata[0]['art_user_image']);?>" class="bgImage"  style="" >
<!-- box image end -->
           </a>
</div>
      <div class="profile-box-user">
         <span class="profile-box-name ">
           <a href="<?php echo site_url('artistic/artistic_profile/'.$artisticdata[0]['user_id']); ?>"> <?php echo ucwords($artisticdata[0]['art_name']) .' '.  ucwords($artisticdata[0]['art_lastname']); ?></a>
          </span>
        <div class="profile-boxProfile-name">
         <a href="<?php echo site_url('artistic/artistic_profile/'.$artisticdata[0]['user_id']); ?>">
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

  <div  class="add-post-button">
    
        <a class="btn btn-3 btn-3b" href="<?php echo site_url('artistic/art_addpost'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>Add Post</a>
  </div>
  </div>


<!-- cover pic end -->
       
<!-- popup start -->
<div class="col-md-7 col-sm-7 all-form-content">

  <div class="post-editor col-md-12">
                                <div class="main-text-area col-md-12">
                                <div class="popup-img col-md-1"> <img  src="<?php echo base_url(USERIMAGE . $businessdata[0]['business_user_image']);?>"  alt="">
 </div>
 <div id="myBtn"  class="editor-content col-md-11 popup-text" contenteditable>
        <span> Post Your Product....</span> 
   <span class="fr">
                                  <input type="file" id="FileID" style="display:none;">
                                    <label for="FileID"><i class=" fa fa-camera fa"  style=" margin: 8px; cursor:pointer">  </i></label>

                                     
                                    </span>     
      
     </div>
    </div>
    <div class="fr">
     <a href="" class="button">Post</a>    </div>
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
  <form id="bgimageform" method="post" enctype="multipart/form-data" action="<?php echo base_url('artistic/art_post_insert'); ?>">
   <div class="post-editor col-md-12">
                                <div class="main-text-area col-md-12">
                                <div class="popup-img col-md-1"> <img  src="<?php echo base_url(USERIMAGE . $businessdata[0]['business_user_image']);?>"  alt="">
 </div>
 <div id="myBtn"  class="editor-content col-md-10 popup-text" >
        <!-- <textarea name="product_title" placeholder="Post Your Product...."></textarea>  -->
         <textarea placeholder="Post Your Product...."  onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); 
 name=my_text rows=4 cols=30></textarea>
    <br>                               
<input size=1 value=50 name=text_num> Characters Left
       
      
     </div>
      <span class="fr">

    <input type="file" id="files" name="postattach[]" multiple style="display:block;">  </span>


    </div>
<div  id="text"  class="editor-content col-md-12 popup-textarea" >
      <textarea name="product_desc" class="description" placeholder="Enter Description"> </textarea>

      <output id="list"></output>
</div>
<div class="popup-social-icon">
  <ul class="editor-header">
   
                                  <li><input type="file" id="FileID" style="display:none;">
                                    <label for="FileID"><i class=" fa fa-camera "  style=" margin: 8px; cursor:pointer"> Photo/Video </i> </label>
                                    </li>
                                
                                  <li><input type="file" id="FileID" style="display:none;">
                                    <label for="FileID"><i class="fa fa-music "  style=" margin: 8px; cursor:pointer"> Audio </i></label>
                                    </li>
                                
                                 <li><input type="file" id="FileID" style="display:none;">
                                    <label for="FileID"><i class=" fa fa-file-pdf-o fa-2x"  style=" margin: 8px; cursor:pointer"> PDF </i></label>
                                    </li>
                               
                                    </ul>
     

</div>
    <div class="fr">
     <button type="submit"  value="Submit">Submit</button>    </div>
      </div>
      </form>
</div>

</div>

<!-- popup end -->
  
                    <div class="col-md-7 col-sm-7 all-form-content">

                    <div>
                        <?php
                                        if ($this->session->flashdata('error')) {
                                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                        }
                                        if ($this->session->flashdata('success')) {
                                            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                        }?>
                    </div>

                        <div class="common-form">
                            <div class="job-saved-box">
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">

<?php


foreach($artdata as $row)
    { 
       

  $userid = $this->session->userdata('aileenuser');
       $contition_array = array('user_id'=> $userid,'post_id' => $row['art_post_id'],'is_delete' =>0);

$userdata =  $this->common->select_data_by_condition('art_post_save', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = ''); 

if($userdata[0]['post_save'] != 1)
{ 

?>
                                        <div class="profile-job-post-detail clearfix">
                                            <div class="profile-job-post-title-inside clearfix">

                                            
                                                <div class="profile-job-post-location-name">
                                                    <ul>


                                                    <?php 
                 $firstname =  $this->db->get_where('art_reg',array('user_id' => $row['user_id']))->row()->art_name; 

                 $lastname =  $this->db->get_where('art_reg',array('user_id' => $row['user_id']))->row()->art_lastname; 

                 ?>
                 
                                                      <li><a href="<?php echo base_url('artistic/artistic_profile/'.$row['user_id']); ?>"><?php echo ucwords($firstname); print "&nbsp;&nbsp;"; echo ucwords($lastname); ?></a></li>
                                                      <li><?php print $row['art_post'];?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
                                                          
                                                            <li>
                                                            <?php print date('d-M-Y',strtotime($row['created_date'])); ?>
                                                            </li>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <li> <b> Skills:</b> 
                                                        <?php if($row['art_category']){?>
                                                        <span>
                                                           <?php
                                                        $comma = ",";
                                                        $k=0;
                                                        $aud=$row['art_category'];
                                                        $aud_res=explode(',',$aud);
                                                        foreach ($aud_res as $skill)
                                                        {
                                                            if($k!=0)
                                                            {
                                                               echo $comma;
                                                            }
    $cache_time  =  $this->db->get_where('skill',array('skill_id' => $skill))->row()->skill;  
                            echo  $cache_time;
                                                           $k++;
                                                        }
                                                        ?>       
                                                         </span>
                                                         <?php }else{?>
                                                         <span><?php echo "-"; ?></span>
                                                         <?php }?>
                                                        </li>

                                                       <li><b>Other Skill:</b>
                                                       <?php if($row['other_skill']){?>
                                                       <span>
                                                        <?php print $row['other_skill']; ?>  
                                                        </span>
                                                        <?php } else{?>
                                                        <span>
                                                        <?php print "-"; ?>  
                                                        </span>
                                                        <?php }?>
                                                        </li>

                                                        <li> <b>Job Description:</b><span> <?php print $row['art_description']; ?>  </span>
                                                        </li>

<!--video and audio display start -->


                                                         <li>
                                                            <?php
                                                       $allowed =  array('gif','png','jpg');
                                                       $allowespdf = array('pdf');
                                                       $allowesvideo = array('mp4','3gp');
                                                       
                                                       $filename = $row['art_attachment'];
                                                       
                                                       $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                      

                                                       if(in_array($ext,$allowed) ) 
                                                       { 
                                                         
                                                          ?>
                                                         
                                                       <img src="<?php echo base_url(ARTISTICIMAGE.$row['art_attachment'])?>" style="width:100px;height:100px;"> 
                                                          <?php
                                                       }
                                                       elseif(in_array($ext,$allowespdf))
                                                       { ?>

                                                      

                                                        <a href="<?php echo base_url('artistic/creat_pdf/'.$row['art_post_id']) ?>">PDF</a>
                                                       <?php }
                                                       elseif(in_array($ext,$allowesvideo))
                                                       {
                                                        
                                                       ?>

                                                        <video width="320" height="240" controls>
                                                          <source src="<?php echo base_url(ARTISTICIMAGE.$row['art_attachment']); ?>" type="video/mp4">
                                                          <source src="movie.ogg" type="video/ogg">
                                                          Your browser does not support the video tag.
                                                       </video>
                                                       <?php
                                                        }

                                                        else{ ?>

                                                       <?php  }
                                                       ?>
                                                         </li>
<!--video and audio display end -->


                                                       
                                                    </ul>
                                                </div>
                                                
                                               
                                                <div class="profile-job-profile-button clearfix">
                                                    <div>
                                                    
                                   
                                     <button  onClick="commentall(this.id)" id="<?php echo $row['art_post_id']; ?>">View All Comments</button>
                                     
                                    <div id="<?php echo "fourcomment" . $row['art_post_id']; ?>" style="display:none">

                                    <?php 

                                    $contition_array = array('art_post_id' =>  $row['art_post_id'], 'status' =>'1');
        $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data='*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str= array(), $groupby = ''); 
                                      
                                        if($artdata){
                                      foreach($artdata as $rowdata)
                                        { 

                 $artname =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id']))->row()->art_name;
                                        echo $artname; echo '</br>';
                                        ?>
                                        <div id= "<?php echo "showcomment2" . $rowdata['artistic_post_comment_id']; ?>">
                                       <?php  echo $rowdata['comments']; echo '</br>';
                                       ?>
                                       </div>
                                      

                                        <input type="text" name="editcomment2" id="<?php echo "editcomment2" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" value="<?php  echo $rowdata['comments']; ?>">

                                        <button id="<?php echo "editsubmit2" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment2(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Comment</button>

                                         <?php
                                        echo $rowdata['created_date']; echo '</br>'; ?>

                                        <button id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like(this.id)"><i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> <span class="<?php echo 'likecomment' . $rowdata['artistic_post_comment_id']; ?>">
                                       <?php echo $rowdata['artistic_comment_likes_count']; ?>
                                      </span>
                                      </button>

                                     <button id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_editbox2(this.id)" class="editbox">Edit
                                      </button>

                                     <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['art_post_id']; ?>">
                                      <button id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                      </span>
                                      </button>

                                       <br/><br/>

                                        <?php    } 

                                           }else{ 

                                            echo 'No comments Available!!!';} ?>
                 
                                    </div>
                                    

                                       <button id="<?php echo $row['art_post_id']; ?>"   onClick="post_like(this.id)"><i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> <span class="<?php echo 'likepost' . $row['art_post_id']; ?>">
                                       <?php echo $row['art_likes_count']; ?>
                                      </span>
                                      </button>
                                     
                                      <a href="<?php echo base_url('artistic/artistic_contactperson/'.$row['user_id'].''); ?>"> <div class="button"> contact person</div></a>

                                        <a href="<?php echo base_url('artistic/artistic_save/'.$row['art_post_id'].''); ?>"> <div class="button"> Save</div></a>


                                                    </div>

                                                    
                                                </div>
                                                
                                                <!-- khyati changes start -->
                                                <div  id="<?php echo "threecomment" . $row['art_post_id']; ?>" style="display:block">
                                                <div class="<?php echo 'insertcomment' . $row['art_post_id']; ?>">
                                                <?php 

                                    $contition_array = array('art_post_id' =>  $row['art_post_id'], 'status' =>'1');
        $artdata =   $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array , $data='*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '3', $offset = '', $join_str= array(), $groupby = ''); 
                                      
                                        if($artdata){
                                      foreach($artdata as $rowdata)
                                        {
                                          $artname =  $this->db->get_where('art_reg',array('user_id' => $rowdata['user_id']))->row()->art_name;
                                        echo $artname; echo '</br>'; ?>

                                        <div id= "<?php echo "showcomment" . $rowdata['artistic_post_comment_id']; ?>">
                                        <?php
                                        echo $rowdata['comments']; echo '</br>';
                                        ?>
                                        </div>

                                        <input type="text" name="editcomment" id="<?php echo "editcomment" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" value="<?php  echo $rowdata['comments']; ?>">

                                        
                                        <button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Comment</button>

                                        <?php 
                                        echo $rowdata['created_date']; echo '</br>'; ?>

                                        <button id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like(this.id)"><i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> <span class="<?php echo 'likecomment' . $rowdata['artistic_post_comment_id']; ?>">
                                       <?php echo $rowdata['artistic_comment_likes_count']; ?>
                                      </span>
                                      </button>

                                      <button id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_editbox(this.id)" class="editbox">Edit
                                      </button>
                                      

                                      <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['art_post_id']; ?>">
                                      <button id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                      </span>
                                      </button>

                                       <br/><br/>

                                         <?php }
                                       }
                                      ?>
                                                  
                                                </div>
                                                </div>
                                               
                                                <!-- khyati changes end -->
                                                
                                                <div>
                                               <input type="text" name="post_comment"  id="<?php echo "post_comment" . $row['art_post_id']; ?>" placeholder="Type Message ..." value= "">
                                                 <?php echo form_error('post_comment'); ?>
                                                
                                                 <button id="<?php echo $row['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button>
                                             
                                                </div>
                                               
                                           
                                            </div>


                                        </div>

                                        <?php
                                        }
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
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
 
  <script type="text/javascript" src="<?php echo base_url('js/select2-4.0.3.min.js'); ?>"></script>
<!-- script for skill textbox automatic end (option 2)-->

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
 
 <!-- popup form edit END -->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#artdesignation").validate({

                    rules: {

                        designation: {

                            required: true,
                         
                        },
            },

                    messages: {

                        designation: {

                            required: "Designation Is Required.",
                            
                        },
                },

                });
                   });
  </script>

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
                    $('.' + 'likecomment' + clicked_id).html(data);
                    
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
</script>

<!--comment delete script end -->


<!-- comment insert script start -->

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

<!--comment insert script end -->

<!-- comment edit script start -->

<!-- comment edit box start-->
<script type="text/javascript">
    
     function comment_editbox(clicked_id){  
        document.getElementById('editcomment' + clicked_id).style.display='block';
        document.getElementById('showcomment' + clicked_id).style.display='none';
        document.getElementById('editsubmit' + clicked_id).style.display='block';
        
}

function comment_editbox2(clicked_id){ 
        document.getElementById('editcomment2' + clicked_id).style.display='block';
        document.getElementById('showcomment2' + clicked_id).style.display='none';
        document.getElementById('editsubmit2' + clicked_id).style.display='block';
        
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
                     
                    $('#' + 'showcomment' + abc).html(data);
     
                }
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
                     
                    $('#' + 'showcomment' + abc).html(data);
       
                }
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


<!-- multi image add post khyati start -->

<script type="text/javascript">
alert("a");
  var $fileUpload = $("#files"),
    $list = $('#list'),
    thumbsArray = [],
    maxUpload = 5;

// READ FILE + CREATE IMAGE
function read( f ) {alert("aa");
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
function handleFileSelect( e ) {alert("aaa");
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

$fileUpload.change(function( e ) {alert("aaaa");
    handleFileSelect(e);
});

$list.on('click', '.remove_thumb', function () {alert("aaaaa");
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