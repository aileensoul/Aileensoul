<!-- start head -->
<?php  echo $head; ?>

<style type="text/css">
    #popup-form img{display: none;}
</style>

<!--post save success pop up style end -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.jMosaic.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
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

  <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
    <!-- END HEADER -->
   
<?php echo $art_header2?>
   

  <body   class="page-container-bg-solid page-boxed">

    <section>
         <div class="container" id="paddingtop_fixed">

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">

                    <button class="btn btn-success cancel-result">Cancel</button>
                    <button class="btn btn-success set-btn upload-result" onclick="myFunction()">Upload Image</button>

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

            <div class="container">
                <div class="row" id="row2">
                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    if ($this->uri->segment(3) == $userid) {
                        $user_id = $userid;
                    } elseif ($this->uri->segment(3) == "") {
                        $user_id = $userid;
                    } else {
                        $user_id = $this->uri->segment(3);
                    }
                    $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                    $image = $this->common->select_data_by_condition('art_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url($this->config->item('art_bg_main_upload_path') . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
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
    <?php
    $userid = $this->session->userdata('aileenuser');
    if($artisticdata[0]['user_id'] == $userid) {
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
                        <?php if($artisticdata[0]['art_user_image'] != ''){ ?>
                           <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>

                            <?php
    $userid = $this->session->userdata('aileenuser');
    if($artisticdata[0]['user_id'] == $userid) {
    ?>

                            <!--<a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>-->
<a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                            <?php }?>

                        </div>
                        
<!--                        <div id="popup-form">
                        <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="5">
                        <input type="submit" name="cancel5" id="cancel5" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                     <?php  echo form_close();?>
                </div>-->

                </div>

                <div class="bui-menu-profile col-md-10">

                  

                     <h4 class="profile-head-text"><a href="<?php echo base_url('artistic/art_manage_post/'.$artisticdata[0]['user_id'].''); ?>"> <?php echo ucwords($artisticdata[0]['art_name']); ?><?php echo ucwords($artisticdata[0]['art_lastname']); ?></a></h4>

                     <?php
                    if ($artisticdata[0]['designation'] == '') {
                        ?>

                        <?php if ($artisticdata[0]['user_id'] == $userid) { ?>
                            <a id="myBtn">Designation</a>
                        <?php } ?>

                    <?php } else { ?> 

                        <?php if ($artisticdata[0]['user_id'] == $userid) { ?>
                            <a id="myBtn"><?php echo ucwords($artisticdata[0]['designation']); ?></a>
                        <?php } else { ?>
                            <a><?php echo ucwords($artisticdata[0]['designation']); ?></a>
                        <?php } ?>

                    <?php } ?>


                   
              </div>
                <!-- PICKUP -->
                                   <!-- menubar --><div class="business-data-menu  col-md-12 ">

<div class="left-side-menu col-md-2">   </div>
        
       <div class="profile-main-box-buis-menu  col-md-7">  
 <ul class="">
 
                                    <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_manage_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_manage_post/'.$artisticdata[0]['user_id']); ?>"> Dashboard</a>
                                    
                                    </li>

                                      <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'artistic_profile'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/artistic_profile/'.$artisticdata[0]['user_id']); ?>"> Details</a>
                                    </li>
                                

              <?php
              $userid = $this->session->userdata('aileenuser');
              if($artisticdata[0]['user_id'] == $userid)
               { 
                ?> 

                                    

                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/userlist'); ?>">Userlist</a>
                                    </li>
                     <?php }?>


                                    <?php
                      $userid = $this->session->userdata('aileenuser'); 
                       if($artisticdata[0]['user_id'] == $userid)
                       { 
                        ?>
                                    <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers'); ?>">Followers  <br> (<?php echo (count($followerdata)); ?>)</a>
                                    </li>
                          <?php }else{

        $artregid = $artisticdata[0]['art_id'];
        $contition_array = array('follow_to' => $artregid, 'follow_status' =>'1',  'follow_type' =>'1');
        $followerotherdata = $this->data['followerotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                              ?> 
                              <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers/'.$artisticdata[0]['user_id']); ?>">Followers  <br> (<?php echo (count($followerotherdata)); ?>)</a>
                                    </li>

                            <?php }?> 
                                    <?php
                            if($artisticdata[0]['user_id'] == $userid){ 
                            ?>        
                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following'); ?>">Following  <br>  (<?php echo (count($followingdata)); ?>)</a>
                                    </li>
                                    <?php }else{

$artregid = $artisticdata[0]['art_id'];
$contition_array = array('follow_from' => $artregid, 'follow_status' =>'1',  'follow_type' =>'1');
$followingotherdata = $this->data['followingotherdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                      ?>
                                  <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following/'.$artisticdata[0]['user_id']); ?>">Following  <br>  (<?php echo (count($followingotherdata)); ?>)</a>
                                    </li> 
                                  <?php }?>  
                                    
                                 
                                </ul>

</div>
  <?php 
                    $userid  = $this->session->userdata('aileenuser'); 
                    if($artisticdata[0]['user_id'] != $userid){
                      ?>
            <div class="col-md-2 padding_les" style="width: 24%;">
                <div class="flw_msg_btn">
                    <ul>

                        <li class="<?php echo "fruser" . $artisticdata[0]['art_id']; ?>">

<?php
$userid = $this->session->userdata('aileenuser');

$contition_array = array('user_id' => $userid, 'status' => '1');

$bup_id = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

$status = $this->db->get_where('follow', array('follow_type' => 1, 'follow_from' => $bup_id[0]['art_id'], 'follow_to' => $artisticdata[0]['art_id']))->row()->follow_status;
//echo "<pre>"; print_r($status); die();

if ($status == 0 || $status == " ") {
    ?>

                                <div id= "followdiv">
                                    <button id="<?php echo "follow" . $artisticdata[0]['art_id']; ?>" onClick="followuser(<?php echo $artisticdata[0]['art_id']; ?>)">Follow</a>
                                </div>
<?php } elseif ($status == 1) { ?>
                                <div id= "unfollowdiv">
                                    <button id="<?php echo "unfollow" . $artisticdata[0]['art_id']; ?>" onClick="unfollowuser(<?php echo $artisticdata[0]['art_id']; ?>)"> Following</a>
                                </div>


<?php } ?>
                        </li>

                        <li>
                            <a href="<?php echo base_url('chat/abc/' . $artisticdata[0]['user_id']); ?>">Message</a></li>

                    </ul>
                </div>
            </div>
            <?php
                    }
            ?>
</div>

              <!-- pickup -->
            </div>
            </div>
        </div>
       </div>
        
  
  </div>



        
        <div class="container " >
    <div class="user-midd-section"  style="">





      <div  class="col-sm-12 border_tag padding_low_data padding_les" >
      
        <div class="col-xs-3 padding_low_data padding_les"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left remove_tab">
            <li> <a href="<?php echo base_url('artistic/art_photos/'.$artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-camera" aria-hidden="true"></i>   Photos</a></li>
            <li> <a href="<?php echo base_url('artistic/art_videos/'.$artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>  Video</a></li>
            <li><a href="<?php echo base_url('artistic/art_audios/'.$artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-music" aria-hidden="true"></i>  Audio</a></li>
            <li class="active">    <a href="<?php echo base_url('artistic/art_pdf/'.$artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Pdf</a></li>
          </ul>
        </div>

                    <div class="col-xs-9 padding_less" style="padding-left: 0;padding-right: 0; height: 100%; border-left: 1px solid #d9d9d9">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home"><div class="common-form">
                            <div class="">

                                <h2 class="add_tag_design"> PDF</h2>
                              <div class="" style="padding: 10px;">
                                 <div class="pictures1">


                                 <?php

          $contition_array = array('user_id' => $artisticdata[0]['user_id']);
         $artisticimage = $this->data['artisticimage'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

           
            foreach ($artisticimage as $val) {
             
            

              $contition_array = array('post_id' => $val['art_post_id'], 'is_deleted' =>'1', 'image_type' => '1');
            $artmultipdf = $this->data['artmultipdf'] =  $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

              $multiplepdf[] = $artmultipdf;
             }

                  ?>
              <?php   

                $allowed =  array('pdf');
              
                foreach ($multiplepdf as $mke => $mval) {
                  
                  foreach ($mval as $mke1 => $mval1) {
                      $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);

                     if(in_array($ext,$allowed)){
                   $singlearray3[] = $mval1;
                     }
                  }
                } 
                ?>


              <?php 
               if($singlearray3) {

                foreach ($singlearray3 as $pdfv) {
                  
              ?>

  <div class="main_box_pdf" style="">
<div class="main_box_img" style="">
        <a href="<?php echo base_url('artistic/creat_pdf/'.$pdfv['image_id']) ?>">
        <div class="" style="margin: 0!important;">
              <img src="<?php echo base_url('images/PDF.jpg')?>" style="height: 100%; width: 100%;">
                                                              
              </div></a> </div> 

              <?php 
              $contition_array = array('art_post_id' => $pdfv['post_id']);
             $artistictitle = $this->data['artistictitle'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
              ?>
        <div class="pdf_name"><a title="Zalak infotech .in pdf" href="<?php echo base_url('artistic/creat_pdf/'.$pdfv['image_id']) ?>"><?php echo ucwords($artistictitle[0]['art_post']); ?></a> </div>
</div>

        <!-- <a href="<?php echo base_url('artistic/creat_pdf/'.$pdfv['image_id']) ?>">
        <div class="pdf_name"><a title="Zalak infotech .in pdf" href="">Zalak infotech .in pdf</a> </div></a> -->

        <?php } } else{?>
 
      <div style="margin-left:380px; margin-top: 20px;">
                 <div class="not_avali" >
                                <img src="<?php echo base_url('images/020.png'); ?>" >
                               <div>
                               <div class="not_text" >Pdf not avalible</div>
                               </div>
                               </div>
                               </div>
        <?php }?>
      
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
<!-- Bid-modal-2  -->
                        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                            <div class="modal-dialog modal-lm">
                                <div class="modal-content">
                                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>     	
                                    <div class="modal-body">
                                        <span class="mes">
                                            <div id="popup-form">
                                                <?php echo form_open_multipart(base_url('artistic/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                                <input type="hidden" name="hitext" id="hitext" value="12">

                                                 <img id="preview" src="#" alt="your image" style="border: 2px solid rgb(204, 204, 204); display: none; margin: 0 auto; margin-top: 5px;padding: 5px;"/>
                                                <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" style="margin-top:32px!important;">
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
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
  <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>

 

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="<?php echo base_url('js/jquery.jMosaic.js'); ?>"></script>
 
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

<script>
//select2 autocomplete start for skill
                                                
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
    
      <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                        <script>
                            function updateprofilepopup(id) {
                                $('#bidmodal-2').modal('show');
                            }
                        </script>
                        
                        <!-- cover image start -->
<script>
    function myFunction() {
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";

        // setTimeout(function () { location.reload(1); }, 9000);

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
                url: "<?php echo base_url() ?>artistic/ajaxpro",
                type: "POST",
                data: {"image": resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    if (html) {
                        window.location.reload();
                    }
                    //  $("#kkk").html(html);
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


        var reader = new FileReader();
        //alert(reader);
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

        //alert(size);

        if (size > 4194304)
        {
            //show an alert to the user
            alert("Allowed file size exceeded. (Max. 4 MB)")

            document.getElementById('row1').style.display = "none";
            document.getElementById('row2').style.display = "block";

            // window.location.href = "https://www.aileensoul.com/dashboard"
            //reset file upload control
            return false;
        }

        $.ajax({

            url: "<?php echo base_url(); ?>artistic/image",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                //alert(response);

            }
        });
    });

//aarati code end
</script>
<!-- cover image end -->


<!-- follow user script start -->

<script type="text/javascript">
    function followuser(clicked_id)
    { //alert(clicked_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/follow" ?>',
            data: 'follow_to=' + clicked_id,
            success: function (data) {

                $('.' + 'fruser' + clicked_id).html(data);

            }
        });
    }
</script>

<!--follow like script end -->

<!-- Unfollow user script start -->

<script type="text/javascript">
    function unfollowuser(clicked_id)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/unfollow" ?>',
            data: 'follow_to=' + clicked_id,
            success: function (data) {

                $('.' + 'fruser' + clicked_id).html(data);

            }
        });
    }
</script>

<!-- script for profile pic strat -->
<script type="text/javascript">
    

     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            
            document.getElementById('preview').style.display = 'block';
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#profilepic").change(function(){
        readURL(this);
    });
</script>

<!-- script for profile pic end -->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>


<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#userimage").validate({

                    rules: {

                        profilepic: {

                            required: true,
                         
                        },
  

                    },

                    messages: {

                        profilepic: {

                            required: "Photo Required",
                            
                        },

                },

                });
                   });
  </script>