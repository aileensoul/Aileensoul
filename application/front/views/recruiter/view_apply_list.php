start head -->
<?php echo $head; ?>

<!--post save success pop up style strat -->
<style>
   /* body {
        font-family: Arial, sans-serif;
        background-size: cover;
        height: 100vh;
    }*/
    /*.designation_rec ul li{    display: block;
    padding-bottom: 10px;
    padding-left: 10px;
padding-top: 1px;}
*/
    /*.box {
        width: 40%;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        padding: 35px;
        border: 2px solid #fff;
        border-radius: 20px/50px;
        background-clip: padding-box;
        text-align: center;
    }*/

    /*.overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index: 10;
    }*/
   /* .overlay:target {
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
    }*/

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
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>

<?php echo $recruiter_header2; ?>

    <!-- END HEADER -->
  
    <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>
<body>

<div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">

    
    <div class="col-md-4">

    <!-- <div class="profile-box profile-box-left">
<div class="full-box-module">    
      
      <div class="profile-boxProfileCard  module">
<div class="profile-boxProfileCard-cover">  
    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
      href="<?php echo base_url('recruiter/rec_profile'); ?>"
      tabindex="-1"
      aria-hidden="true"
      rel="noopener"> -->
     <!-- box image start -->
<!-- <img src="<?php echo base_url(RECBGIMAGE . $recdata[0]['profile_background']);?>" class="bgImage"  style="    height: 95px;
    width: 100%; " > -->
<!-- box image end -->
    <!-- </a></div>
<div class="profile-box-menu  fr col-md-12">
<div class="left- col-md-2"></div>
  <div  class="right-section col-md-10">
    <ul class="">

    <li <?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile'){?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_profile'); ?>"> Profile</a>
                                    </li>                                
                                        <li <?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                                    </li>

                                 
  <li <?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate'){?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                                    </li>

                                                  
</ul>
  </div>
  </div>
    <div class="profile-boxProfileCard-content">
<div class="buisness-profile-txext ">
<a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo base_url('recruiter/rec_profile'); ?>" title="zalak" tabindex="-1" aria-hidden="true" rel="noopener">
<img src="<?php echo base_url(USERIMAGE . $recdata[0]['recruiter_user_image']);?>" alt=""></a>
</div>   
          
         <div class="profile-box-user">
         <span class="profile-box-name ">
           <a href="<?php echo site_url('recruiter/rec_profile'); ?>">   <?php echo $recdata[0]['rec_firstname'] . ' '.$recdata[0]['rec_lastname']; ?></a>
                                             </span>
        <div class="profile-boxProfile-name">
         <a href="<?php echo site_url('recruiter/rec_profile/'.$recdata[0]['user_id']); ?>" ><?php if (ucwords($recdata[0]['designation'])){
          echo ucwords($recdata[0]['designation']);

          }
          else{
            echo "Designation";
            }  ?></a>
      </div>                
      </div>
          <div id="profile-box-profile-prompt"></div>

    </div>
   </div>

  </div>
</div> -->
  <!-- <div  class="add-post-button">
   
        <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
  </div> -->

   <div class="add-post-button">
     
      <a href="<?php echo base_url('recruiter/rec_post'); ?>"><div class="back">
        <div class="but1">
             Back To Post
        </div>
   </div></a>

   </div>


  </div>


      <!--- search end -->
        
                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Applied candidate</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                           
<!-- khyati start -->
<?php
if ($user_data) {
  foreach ($user_data as $ukey => $uvalue) {
    foreach ($uvalue as $row) {

?>
 <div class="profile-job-post-detail clearfix">
<div class="profile-job-post-title-inside clearfix"> <div class="profile-job-profile-button clearfix">


    <!-- pop up box start-->
<!-- <div id="popup1" class="overlay">
  <div class="popup">
    
    <div class="pop_content">
      Your User is Successfully Saved.
      <p class="okk"><a class="okbtn" href="#">Ok</a></p>
    </div>

  </div>
</div> -->
<!-- pop up box end-->

                                                            <div class="profile-job-post-location-name-rec">
                                                                <div style="display: inline-block; float: left;">
                                                                     <div  class="buisness-profile-pic-candidate"><img src="<?php echo base_url(USERIMAGE . $row['job_user_image']); ?>" alt="" >
                                                                            </div>

                     </div>
               <div class="designation_rec" style="float: left;">
                     <ul>
                         <li>
                             <a style="  font-size: 19px;
    font-weight: 600;" href="<?php echo base_url('job/job_printpreview/' . $row['user_id'].'?page=recruiter'); ?>">
                <?php echo ucwords($row['fname']) . ' ' . ucwords($row['lname']); ?></a>
                          </li>
                         <li class="show">
                   <a  style="font-size: 19px;" href="<?php echo base_url('job/job_printpreview/' . $row['user_id']); ?>">
                      <?php
                   if ($row['designation']) {
                       ?>
                   <?php echo $row['designation']; ?>
                    <?php
                } else {
                       ?>
                                                                                    
                                                                                    <?php echo "Designation"; ?>
                                                                                    
                                                                                    <?php
                                                                                }
                                                                                ?> 
                                                                                </a>
                                                                      </li>
                                                                      </ul>
                                                                </div>
                                                                
                                                            </div>
                                            </div>
                                            </div>
                                            <div class="profile-job-post-title clearfix">
                                                
                                                  <div class="profile-job-profile-menu">
                                                   
                                                        <ul>
                                                        

                                         <li> <b> Skill</b> <span>
                                                        <?php 

                                                        $aud=$row['keyskill'];
                                                        $aud_res=explode(',',$aud);
                                                        foreach ($aud_res as $skill)
                                                        {
                                                
                                                            $cache_time  =  $this->db->get_where('skill',array('skill_id' => $skill))->row()->skill;  
                                                            echo $cache_time; 

                                                        }
                                                        ?></span>
                                                        </li>
                                                      


                                     <li><b>Other Skill </b> 
                                    <span> <?php
                                     if($row['other_skill']){
                                    echo ucwords($row['other_skill']);
                                    }else{
                                      echo "-";
                                    } 
                                      ?></span>
                                                       
                                    </li>
                                 <li><b>Total Experience </b>     <span>  <?php echo $row['experience']; ?></span> </li>

                                 <li><b> Location</b> <span>

                                 <?php if($row['city_permenant']) { ?>
                                 <?php $cache_time  =  $this->db->get_where('cities',array('city_id' => $row['city_permenant']))->row()->city_name;  
                                                        echo $cache_time; ?>
                                       <?php }else{ echo PROFILENA; }?>                   
                                    </span> </li>

                                             <li> <b> Degree </b>
                                                 <span>
                                                  <?php

                                                  if($row['degree']){
                                                 $cache_time = $this->db->get_where('degree', array('degree_id' => $row['degree']))->row()->degree_name;
                                                     echo $cache_time;
                                                   }else{
                                                    echo PROFILENA;
                                                   }
                                                     ?> </span>

                                                                </li>

                                                                <li> <b>Stream </b>
                                                                    <span>
                                                                    <?php
                                                                    if($row['stream']){
                                                                    $cache_time = $this->db->get_where('stream', array('stream_id' => $row['stream']))->row()->stream_name;
                                                                    echo $cache_time;
                                                                  }else{ echo PROFILENA; }
                                                                    ?>
                                                                 
                                                 
</span>
                                                                </li>

 
   <li><b>E-mail</b>
      <span><?php
       echo $row['email'];
     ?></span>
     </li>

               <li><b>Mobile Number</b>
                      <span><?php
                   echo $row['phnno'];
                     ?></span>
               </li>


               </ul>
             </div>
                                              
                  <div class="profile-job-profile-button clearfix">
                                     <div class="apply-btn fr">
                                                  
 <?php $userid = $this->session->userdata('aileenuser');
 if($userid != $row['user_id']){ 
             
    $contition_array = array('from_id' => $userid, 'to_id' => $row['user_id'], 'save_type' => 1, 'status' => '0');
    $savedata = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

     ?>

            <a href="<?php echo base_url('message/message_chats/' . $row['user_id']); ?>">Message</a>

            <?php  $contition_array = array('invite_user_id' => $row['user_id'], 'post_id' => $postid);
        $userdata = $this->common->select_data_by_condition('user_invite', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if($userdata){ ?>
      <a href="#" class="button invited" id="<?php echo 'invited' . $row['user_id']; ?>" > Invited</a>      
         <?php }else{ ?>

              <a  href="#" class="button invite_border" id="<?php echo 'invited' . $row['user_id']; ?>" onClick="inviteusermodel(<?php echo $row['user_id']; ?>)"> Invite</a>
              <!-- <a href="#"><div class="button invite_border" id="<?php echo 'invited' . $row['user_id']; ?>" onClick="inviteuser(<?php echo $row['user_id']; ?>)"> Invite</div></a> -->
 <?php  } ?>



       <?php if ($savedata) { ?> 
<!--        <div id="invited" onclick="inviteuser()"> Invite</div> -->         
       
<a class="saved">Saved </a> 
       
     <?php } else { ?>
       <input type="hidden" id="<?php echo 'hideenuser' . $row['user_id']; ?>" value= "<?php echo $data[0]['save_id']; ?>"> 
       <a  id="<?php echo $row['user_id']; ?>" onClick="savepopup(<?php echo $row['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save</a>
        <?php }
         
       
        } ?>
                                                </div> </div>
                                                
                                               <!--  <div class="profile-job-profile-button clearfix">
                                                    </div> -->
                                               
                                               
                                             </div>
                                        </div>

                            <?php } }  } else {
                            ?>
                            <div class="text-center rio">
                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Applied Candidate Found.</h4>
                            </div>
                            <?php
                        }
                        ?>      
                           <!-- khyati end -->
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>

</div>
                            </div>
                        </div>
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


</body>

</html>





<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />
<!-- script for skill textbox automatic end (option 2)-->

<script>
//select2 autocomplete start for skill
$('#searchskills').select2({
        
        placeholder: 'Find Your Skills',
       
        ajax:{

         
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
        ajax:{

         
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

<!-- Cover Image upload Start--> 
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
       <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
  <script>

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
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
url: "<?php echo base_url('recruiter/image_saveBG_ajax'); ?>",
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
<!-- Cover Image upload Start--> 

<!-- save post start -->

<script type="text/javascript">
   function save_user(abc)
   {  
      
 var saveid = document.getElementById("hideenuser" + abc);

      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "recruiter/save_search_user" ?>',
                data:'user_id='+abc + '&save_id='+saveid.value,
                success:function(data){ 
                
                 $('.' + 'saveduser' + abc).html(data).addClass('saved');
                 

                }
            }); 
        
}
</script>

<!-- save post end -->

 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script>
    function savepopup(id) { 
                        
      save_user(id);
//                       
    $('.biderror .mes').html("<div class='pop_content'>Candidate successfully saved.");
        $('#bidmodal').modal('show');
          }
        </script>
                    
                    
  <script type="text/javascript">
   

   function inviteusermodel(abc){

    $('.biderror .mes').html("<div class='pop_content'>Do you want to invite this candidate?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='inviteuser(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');

   } 

   function inviteuser(clicked_id)
    {  
     
      var post_id = "<?php echo $postid; ?>";
        //alert(post_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "recruiter/invite_user" ?>',
            data: 'post_id=' + post_id + '&invited_user=' + clicked_id,
            success: function (data) { //alert(data);
                $('#' + 'invited' + clicked_id).html(data).addClass('button invited').removeClass('button invite_border');

              //    $('.biderror .mes').html("<div class='pop_content'>Candidate invite successfully.");
              // $('#bidmodal').modal('show');
          }
           
        });
    }

   
</script>

<!-- comment like script end