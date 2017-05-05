<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">

    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
 <?php echo $business_header2?>
    


   <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- <script src="<?php //echo base_url('js/jquery.min.js'); ?>"></script> -->

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
url: "<?php echo base_url('business_profile/image_saveBG_ajax'); ?>",
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
<body class="page-container-bg-solid page-boxed">
<div class="user-midd-section">
            <div class="container">
                <div class="row">

    
    <div class="col-md-4"><div class="profile-box profile-box-left">

    <div class="full-box-module">    

      
      <div class="profile-boxProfileCard  module">
<div class="profile-boxProfileCard-cover">    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
      href="<?php echo base_url('business_profile/business_resume'); ?>"
      tabindex="-1"
      aria-hidden="true"
      rel="noopener">
           <!-- box image start -->
<img src="<?php echo base_url(BUSBGIMG . $businessdata[0]['profile_background']);?>" class="bgImage"  style="    height: 95px;
    width: 100%; " >
<!-- box image end -->

    </a>

 </div>


  
    <div class="profile-boxProfileCard-content clearfix">

<div class="buisness-profile-txext col-md-4">
          <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo base_url('business_profile/business_resume'); ?>" title="zalak" tabindex="-1" aria-hidden="true" rel="noopener">
<img  src="<?php echo base_url(USERIMAGE . $businessdata[0]['business_user_image']);?>"  alt="" style="    height: 77px;
    width: 71px;
    z-index: 3;
    position: relative;
" >
                           
          <!-- 
            <img class="profile-boxProfileCard-avatarImage js-action-profile-avatar" src="images/imgpsh_fullsize (2).jpg" alt="" style="    height: 68px;
    width: 68px;">
           --></a>

</div>
<div class="profile-box-user fr col-md-9">
         <span class="profile-company-name ">
         <a href="<?php echo base_url('business_profile/business_resume/'); ?>"> <?php echo ucwords($businessdata[0]['company_name']); ?></a>          </span>
       <!--  <div class="profile-boxProfile-name">
         <a ><?php echo ucwords($jobdata[0]['designation']); ?></a></div>
     
      </div> -->
    </div>

     <!--  <div class="profile-box-user">
         <span class="profile-box-name ">
         <a href="<?php echo base_url('business_profile/business_resume/'.$businessdata[0]['user_id'].''); ?>"> <?php echo ucwords($businessdata[0]['company_name']); ?></a>          </span>
        <div class="profile-boxProfile-name">
         <a ><?php echo ucwords($jobdata[0]['designation']); ?></a></div>
     
      </div>
      -->  


         <div class="profile-box-bui-menu  col-md-12">
         
                                    <ul class="">

                                     <?php 
                                if(($this->uri->segment(1) == 'business_profile') && ($this->uri->segment(2) == 'business_profile_post' || $this->uri->segment(2) == 'business_resume' || $this->uri->segment(2) == 'business_profile_manage_post' || $this->uri->segment(2) == 'business_profile_save_post' || $this->uri->segment(2) == 'userlist' 
                                    || $this->uri->segment(2) == 'followers' || $this->uri->segment(2) == 'following') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>

<!-- 
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_post'); ?>">Home</a>
                                    </li>
 -->
                                    <?php }?>

                                  <!--    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_resume'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_resume/'.$businessdata[0]['business_slug']); ?>"> Profile</a>
                                    </li> -->
                              <!--       
                                  <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_manage_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>">Manage Your Own Post</a>
                                    </li>
                               -->       <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_manage_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>">Post</a>
                                    </li>

                                    

                                    <?php 
                                if(($this->uri->segment(1) == 'business_profile') && ($this->uri->segment(2) == 'business_profile_post' || $this->uri->segment(2) == 'business_resume' || $this->uri->segment(2) == 'business_profile_manage_post' || $this->uri->segment(2) == 'business_profile_save_post' || $this->uri->segment(2) == 'userlist' 
                                    || $this->uri->segment(2) == 'followers' || $this->uri->segment(2) == 'following') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>

                                 <!--  <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_save_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_save_post'); ?>">Saved Post</a>
                                    </li>
 -->
    <!--                                 <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/userlist'); ?>">Userlist</a>
                                    </li>
 -->
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url('business_profile/followers'); ?>">Followers <br> (<?php echo (count($businessfollowerdata)); ?>)</a>
                                    </li>
                                    
                                    <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/following'); ?>">Following <br> (<?php echo (count($businessfollowingdata)); ?> ) </a>
                                    </li>

                                    <?php }?>
                                </ul>
     

      </div>


     
  </div>

  </div></div>

  
  
   
</div>
</div>




                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Recommended Business</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                           
<!-- khyati start -->

 <?php if($businessuserdata){

                                    foreach ($businessuserdata as  $p) {
                                        
                                  ?>

                                    <div class="profile-job-post-detail clearfix search">
                                            <div class="profile-job-post-title-inside clearfix">
                                            <div class="profile-job-profile-button clearfix">
                                                <div class="profile-job-post-location-name-rec">
                                                <ul>
                                                                                                      <ul>
 <li>

                                                      <div  class="buisness-profile-pic-candidate"><img src="<?php echo base_url(USERIMAGE . $p['job_user_image']);?>" alt="" >
                                                    </div>
                                                    </li>
                                                    
                                                    <li class="">
                                                      <a href="<?php echo base_url('business_profile/business_resume/'.$p['user_id']); ?>">
                                                        <?php echo ucwords($p['contact_person']); ?>  </br>
                                                         <?php echo ucwords($p['company_name']); ?>
                                                      </a></li>
                                                     
                                                      
                                                    </ul>
</div>
                                            </div>
                                            </div>
                                            <div class="profile-job-post-title clearfix">
                                                
                                                  <div class="profile-job-profile-menu">
                                                   
                    <ul>
                       <li><b>Product Name:</b>
                                                       <?php echo $p['product_name']; ?>
                                                     </li>


                   <?php 
                 $business_type =  $this->db->get_where('business_type',array('type_id' => $p['business_type']))->row()->business_name; ?>

                                                      <li><b>Business Type:</b> <?php echo $business_type; ?></li>
                                                      
                 <?php 
                 $industry_type =  $this->db->get_where('industry_type',array('industry_id' => $p['industriyal']))->row()->industry_name; ?>

                                                      <li><b>Industry Type:</b>
                                                      <?php echo $industry_type; ?>
                                                     </li>

                                                        <?php 
                 $cityname =  $this->db->get_where('cities',array('city_id' => $p['city']))->row()->city_name; ?>

                                                      <li><b>Location:</b> <?php echo $cityname; ?></li>
                                          

                                             <li><b>Contact Website:</b>
                                                       <?php echo $p['contact_website']; ?>
                                                     </li>
                    <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">
                                                      

                                                        </ul>
                                                    </div>
                                              
                                                 <div class="profile-job-profile-button clearfix">
                                                      <div class="apply-btn">
                                                  

                                                   <?php
                                        $userid  = $this->session->userdata('aileenuser');
                                            $contition_array = array('from_id' => $userid,'to_id'=> $p['user_id']);
                                            $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                           

                                    if($data[0]['status'] != 0 || $data[0]['status'] == '')
                                      {
                                      ?> 
                                          <a href="<?php echo base_url('recruiter/save_search_user/'  . $p['user_id'].'/'. $data[0]['save_id'] ); ?>">Save User</a>
                                         <?php 
                                          } 
                                         else{
                                        ?>

                                          <a href=" ">Saved User</a> 
                                        <?php
                                 }?> 

                                 <a href="<?php echo base_url('message/message_chats/'  . $p['user_id']); ?>">Message</a>     

 
                                                </div> </div>
                                                
                                              
                                               
                                               
                                             </div>
                                        </div>

                                        <?php } }else{?>

                                            <div class="text-center rio">
                                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Recommended Business  Found.</h4>
                                            </div>

                                        <?php }?>
                              
                           <!-- khyati end -->
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>

</div>
                            </div>
                        </div>
    <!-- Trigger/Open The Modal -->
<!-- <div id="myBtn">Open Modal</div>
 -->
<!-- The Modal -->
<div id="myModal" class="modal-post">

  <!-- Modal content -->
  

<!-- popup end -->    
<div class="col-md-7 col-sm-7 all-form-content ">
  
<!-- body content start-->

 <!-- body content end-->
 </div>
</div>
</div></div></div>

    </section>
  







        <footer>
             <?php echo $footer;  ?>
        </footer>




</body>

</html>

   <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<!-- script for skill textbox automatic end (option 2)-->



<script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script>

<!-- script for skill textbox automatic end -->

<script type="text/javascript">
var text=document.getElementById("search").value;
//alert(text);

  $(".search").highlite({

      text: text

  });

</script>
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
    //alert(clicked_id);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/like_post" ?>',
                 data:'post_id='+clicked_id,
                success:function(data){ //alert('.' + 'likepost' + clicked_id);
                    $('.' + 'likepost' + clicked_id).html(data);
                    
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
                type:'POST',
                url:'<?php echo base_url() . "business_profile/insert_comment" ?>',
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


<!-- hide and show data start-->
<script type="text/javascript">
  function commentall(clicked_id){ //alert("xyz");
 
  //alert(clicked_id);
   var x = document.getElementById('threecomment' + clicked_id);
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


<!-- comment like script start -->

<script type="text/javascript">
function comment_like(clicked_id)
{
    //alert(clicked_id);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/like_comment" ?>',
                 data:'post_id='+clicked_id,
                success:function(data){ //alert('.' + 'likepost' + clicked_id);
                    $('.' + 'likecomment' + clicked_id).html(data);
                    
                }
            }); 
}
</script>

<!--comment like script end -->

<script type="text/javascript">
function comment_delete(clicked_id)
{
    
     var post_delete = document.getElementById("post_delete");
     //alert(post_delete.value);
   $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "business_profile/delete_comment" ?>',
                 data:'post_id='+clicked_id + '&post_delete='+post_delete.value,
                success:function(data){ //alert('.' + 'insertcomment' + clicked_id);

                 // document.getElementById('editcomment' + clicked_id).style.display='none';
       //document.getElementById('showcomment' + clicked_id).style.display='block';
       //document.getElementById('editsubmit' + clicked_id).style.display='none';

                    $('.' + 'insertcomment' + post_delete.value).html(data);
                    
                }
            }); 
}
</script>

<!--comment delete script end -->

<!-- comment edit box start-->
<script type="text/javascript">
    
    function comment_editbox(clicked_id){ //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment' + clicked_id).style.display='block';
        document.getElementById('showcomment' + clicked_id).style.display='none';
        document.getElementById('editsubmit' + clicked_id).style.display='block';
        
}

function comment_editbox2(clicked_id){ //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment2' + clicked_id).style.display='block';
        document.getElementById('showcomment2' + clicked_id).style.display='none';
        document.getElementById('editsubmit2' + clicked_id).style.display='block';
        
}

</script>

<!--comment edit box end-->

<!-- comment edit insert start -->

<script type="text/javascript">
function edit_comment(abc)
{ //alert('editsubmit' + abc);

   var post_comment_edit = document.getElementById("editcomment" + abc);
   //alert(post_comment.value);
   //alert(post_comment.value);
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
                 data:'post_id='+abc + '&comment='+post_comment_edit.value,
                   success:function(data){ //alert('falguni');

                  //  $('input').each(function(){
                  //     $(this).val('');
                  // }); 
         document.getElementById('editcomment' + abc).style.display='none';
       document.getElementById('showcomment' + abc).style.display='block';
       document.getElementById('editsubmit' + abc).style.display='none';
                     //alert('.' + 'showcomment' + abc);
                    $('#' + 'showcomment' + abc).html(data);


                    
                }
            }); 
   //window.location.reload();
}
</script>


<script type="text/javascript">
function edit_comment2(abc)
{ //alert('editsubmit' + abc);

   var post_comment_edit = document.getElementById("editcomment2" + abc);
   //alert(post_comment.value);
   //alert(post_comment.value);
   $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "business_profile/edit_comment_insert" ?>',
                 data:'post_id='+abc + '&comment='+post_comment_edit.value,
                   success:function(data){ //alert('falguni');

                  //  $('input').each(function(){
                  //     $(this).val('');
                  // }); 
         document.getElementById('editcomment2' + abc).style.display='none';
       document.getElementById('showcomment2' + abc).style.display='block';
       document.getElementById('editsubmit2' + abc).style.display='none';
                     //alert('.' + 'showcomment' + abc);
                    $('#' + 'showcomment' + abc).html(data);


                    
                }
            }); 
   //window.location.reload();
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

<!-- further and less -->

<script src="jquery-1.8.2.js"></script>
<script>
$(function() {
var showTotalChar = 270, showChar = "Further", hideChar = "less";
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

<!-- drop down script zalak start -->


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown1").classList.toggle("show");
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

<!-- drop down script zalak end -->
