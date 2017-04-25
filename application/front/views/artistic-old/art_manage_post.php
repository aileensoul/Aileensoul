<!-- start head -->
<?php echo $head; ?>

<link rel="stylesheet" href="<?php echo base_url('css/select2-4.0.3.min.css'); ?>">

<style type="text/css" media="screen">
#row2 img{height: 350px;width: 1138px;} 
.upload-img{    float: right;
    position: relative;
    margin-top: -135px;
    right: 50px; }

   label.cameraButton {
  display: inline-block;
  margin: 1em 0;

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

  <!-- <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script> -->
  <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
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
<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container">
            <!--- select thaya pachhi ave ae -->
      <div class="row" id="row1" style="display:none;">
        <div class="col-md-12 text-center">
        <div id="upload-demo" style="width:1030px"></div>
        </div>
        <div class="col-md-12" style="padding-top: 25px;text-align: center;">
            <button class="btn btn-success upload-result cancel-result" onclick="" >Cancel</button>
    
        <button class="btn btn-success upload-result cancel-result" onclick="myFunction()">Upload Image</button>

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
        <div id="upload-demo-i" style="background:#e1e1e1;width:1030px;padding:30px;height:300px;margin-top:30px"></div>
        </div>
      </div>

      <!--- select thaya pachhi ave ae end-->


  
<!--- select thai ne ave ae pelaj -->
<div class="container">
  <div class="row" id="row2">
        <?php
        $userid  = $this->session->userdata('aileenuser');
            $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');
            $image = $this->common->select_data_by_condition('art_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
         
            $image_ori=$image[0]['profile_background'];
           if($image_ori)
           {
            ?>
            <div class="bg-images">
            <img src="<?php echo $image[0]['profile_background']; ?>" name="image_src" id="image_src" / >
            <?php
           }
           else
           {
            echo " ";
           }
          
            ?>

    </div>
    </div>
</div>
  </div>
  </div>   

    <div class="container">    
      <div class="upload-img">
      
        
        <label class="cameraButton">Take a picture
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>

<!--- select thai ne ave ae pelaj puru -->
                
            </div>
               
                <div class="profile-photo">
                    <div class="profile-pho">

                        <div class="user-pic">
                        <?php if($artdata[0]['art_user_image'] != ''){ ?>
                           <img src="<?php echo base_url(USERIMAGE . $artdata[0]['art_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>
                            <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>

                        </div>

                        <div id="popup-form">
                        <?php echo form_open_multipart(base_url('artistic/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="5">
                        <input type="submit" name="cancel5" id="cancel5" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                    </form>
                </div>

                    </div>
                    <div class="profile-main-rec-box-menu  col-md-12 ">

<div class="left-side-menu col-md-2">  </div>
<div class="right-side-menu col-md-9">
                                    <ul>

                                    <?php 
                                if(($this->uri->segment(1) == 'artistic') && ($this->uri->segment(2) == 'artistic_profile') && ($this->uri->segment(3) == $this->session->userdata('aileenuser'))) { ?>

                                   <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_post'); ?>">Home</a>
                                    </li>
                             <?php }?>

                                   <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'artistic_profile'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/artistic_profile'); ?>"> Profile</a>
                                    </li>

                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_manage_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_manage_post'); ?>"> Post</a>
                                    </li>

                                

                                    <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_savepost'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_savepost'); ?>">Saved </a>
                                    </li>

                                

                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'userlist'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/userlist'); ?>">Userlist</a>
                                    </li>

                                    <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers'); ?>">Followers  (<?php echo $followers; ?>)</a>
                                    </li>
                                    
                                     <li <?php if($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following'){?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following'); ?>">Following  (<?php echo $following; ?> )</a>
                                    </li>

                                   
                                    
                                </ul>
</div>

  </div>  
    <!-- menubar -->      <div class="job-menu-profile">
                          <a href="<?php echo site_url('artistic/artistic_profile/'.$artisticdata[0]['user_id']); ?>"><h5><?php echo ucwords($artisticdata[0]['art_name']) .' '.  ucwords($artisticdata[0]['art_lastname']); ?></h5></a>
                          
                             <!-- text head start -->
                    <div class="profile-text" >
                   
                     <?php 
                     if($artisticdata[0]['designation'] == '')
                     {
                     ?>
                     <a id="myBtn">Designation</a>
                     <?php }else{?> 
                      <a id="myBtn"><?php echo ucwords($artisticdata[0]['designation']); ?></a>
                      <?php }?>
                  

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                      <!-- Modal content --><div class="col-md-2"></div>
                      <div class="modal-content col-md-8">
                        <span class="close">&times;</span>
                        <fieldset></fieldset>
                         <?php echo form_open(base_url('artistic/art_designation/'), array('id' => 'artdesignation','name' => 'artdesignation', 'class' => 'clearfix')); ?>

  <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $artisticdata[0]['designation']; ?>">
<?php echo form_error('designation'); ?>
  </fieldset>
         <input type="hidden" name="hitext" id="hitext" value="5">
  <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                        <?php echo form_close();?>
  
                    
                     
                    </div>
                   
                    <div class="col-md-2"></div>

              </div>

            </div>


            <!-- text head end -->
                      </div>
                      <div class="col-md-6 col-sm-8">

                     <div>
                        <?php
                                        if ($this->session->flashdata('error')) {
                                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                        }
                                        if ($this->session->flashdata('success')) {
                                            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                        }?>
                    </div>

                        <div>
                           
                        <?php
                        foreach($artsdata as $row)
                       {
                                            ?>
                                                 <div class="job-post-detail clearfix">
                                <div class="job-post-title-inside clearfix">
                                    <div class="job-post-title clearfix">


                                        <div class="profile-job-post-location-name">
                          
                                            <ul>
                                            <?php 
                            if($this->session->userdata('aileenuser') == $row['user_id']){?>
                            
                                                <li class="fr">  <a href="<?php echo base_url('artistic/art_deletepost/'.$row['art_post_id'].''); ?>" onclick="return confirm('Are you sure to delete post?')"; > <i class="fa fa-times" aria-hidden="true"> </i>Delete</a>
                                                    
                                                </li>
                                                <li class="fr">  <a href="<?php echo base_url('artistic/art_editpost/'.$row['art_post_id'].''); ?>"> <i class="fa fa-pencil" aria-hidden="true"></i>Edit </a> </li>
                                                 <?php  } ?>
                                                <li><a href="<?php echo base_url('artistic/artistic_profile/'.$row['user_id']); ?>">  <?php print $userdata[0]['first_name'] . $userdata[0]['last_name'];?></a>
                                                </li>

                                            </ul>

                                        </div>

                        
                      <div class="profile-job-post-title clearfix">
                                            <div class="profile-job-profile-button clearfix">
                                                <div class="profile-job-details">
                                                    <ul>
                                                        <li><a href="#"> <?php  print date('d-M-Y',strtotime($row['created_date'])); ?> </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                      
                                        <div class="profile-job-post-location-name">
                                            <ul class="clearfix">
                                                <li>      
                                                </li>
                                                <li>
                                                    <?php
                        print $row['art_post'];
                        ?>
                                                </li>

                                               
                                              <li> <b> Skills:</b> <span>
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
                                                        </li>

                                                         <li><b>Other Skill:</b>
                                                         <?php if($row['other_skill']){?>
                                                         <span>
                                                        <?php print $row['other_skill']; ?>
                                                       </span>
                                                        <?php }else{?>
                                                        <span>
                                                        <?php print "-"; ?>
                                                       </span>
                                                        <?php }?>  
                                                        </li>


                                                <li><b>Description:</b>  <?php
                        print $row['art_description'];
                        ?> </li>
                                                
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

                                            <ul class="fl buttons">
                                              <?php 
                            if($this->session->userdata('aileenuser') != $row['user_id']){?>

                                            <li>
                                             <a href="<?php echo base_url('artistic/artistic_contactperson/'.$row['user_id'].''); ?>"> <div class="button"> contact person</div></a>
                                             </li>

                                             <li>
                                        <a href="<?php echo base_url('artistic/artistic_save/'.$row['art_post_id'].''); ?>"> <div class="button"> Save</div></a>
                                        </li>

                                        <?php } ?>

                                        

                                      <button  onClick="commentall(this.id)" id="hide">View All Comments</button>
                                     
                                    <div id="fourcomment" style="display:none">

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

                                           }else{ echo 'No comments Available!!!';} ?>
                 
                                    </div>
                                    <button id="<?php echo $row['art_post_id']; ?>"   onClick="post_like(this.id)"><i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> <span class="<?php echo 'likepost' . $row['art_post_id']; ?>">
                                       <?php echo $row['art_likes_count']; ?>
                                      </span>
                                      </button>


                                    <div  id="threecomment" style="display:block">
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

                                                <div>
                                               <input type="text" name="post_comment"  id="post_comment" placeholder="Type Message ..." value= "">
                                                 <?php echo form_error('post_comment'); ?>
                                                 
                                                 <button id="<?php echo $row['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button>
                                             
                                                </div>
                                                
                                            </ul>
                                            
                                        </div>

                                  </div>
                    </div>
                   
                </div>

                     <?php
                        }
                        ?>
                         
            </div>
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
   </div>     
    </section>
   <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- footer start -->
    <footer>
        
        <?php echo $footer;  ?>
    </footer>
    
</body>
</html>

<!-- footer End -->

  <script src="<?php echo base_url('js/select2-4.0.3.min.js'); ?>"></script>
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

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

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
    var post_comment = document.getElementById("post_comment");
  
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
  function commentall(){ 
 

   var x = document.getElementById('threecomment');
   var y = document.getElementById('fourcomment');
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



<!-- cover image start -->
<script>
function myFunction() {
   document.getElementById("upload-demo").style.visibility = "hidden";
   document.getElementById("upload-demo-i").style.visibility = "hidden";
   document.getElementById('message1').style.display = "block";

   setTimeout(function () { location.reload(1); }, 5000);
   
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
        width: 1000,
        height: 300,
        type: 'square'
    },
    boundary: {
        width: 1030,
        height: 350
    }
});


$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {

    $.ajax({
      url: "https://www.aileensoul.com/artistic/ajaxpro",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
        html = '<img src="' + resp + '" />';
         $("#upload-demo-i").html(html);
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

    $.ajax({

        url: "<?php echo base_url(); ?>artistic/image",
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
 

