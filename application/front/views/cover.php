<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
    
<?php echo $header; ?>
    <!-- END HEADER -->



<?php  
// include 'db.php';
// session_start();
// $session_uid='1'; // $_SESSION['user_id'];
// include 'userUpdates.php';
// $userUpdates = new userUpdates($db);
// $userData=$userUpdates->userDetails($session_uid);
// $username=$userData['username'];
// $name=$userData['name'];
// $profile_background=$userData['profile_background'];
// $profile_background_position=$userData['profile_background_position'];

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Background drag using jquery</title>
<!-- <link href="<?php echo base_url('css/timeline.css'); ?>" rel='stylesheet' type='text/css'/> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">

<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
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
url: "<?php echo base_url('dashboard/image_saveBG_ajax'); ?>",
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
<body onLoad="window.scroll(0, 200)">
<div class="container" id="container">

<div id="timelineContainer">

<!-- timeline background -->
<div id="timelineBackground">
<img src="<?php echo base_url(USERIMAGE . $userdata[0]['profile_background']);?>" class="bgImage" style="margin-top: <?php echo $userdata[0]['profile_background_position']; ?>;">

</div>

<!-- timeline background -->
<div  id="timelineShade" style="background:url(<?php echo base_url('images/timeline_shade.png'); ?>">
<form id="bgimageform" method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/image_upload_ajax'); ?>">

<!-- <label for="bgphotoimg"><i class=" fa fa-camera fa-2x">  </i></label>
 -->


<div class="uploadFile timelineUploadBG" style="background:url(<?php echo base_url('images/whitecam.png'); ?>">

<input type="file" name="photoimg" id="bgphotoimg" class=" custom-file-input" original-title="Change Cover Picture"  ">

</div>
</form>
</div>

<!-- timeline profile picture -->
<!-- <div id="timelineProfilePic"></div> -->

<!-- timeline title -->
<!-- <div id="timelineTitle"><?php //echo $name; ?></div> -->

<!-- timeline nav -->
<div id="timelineNav"></div>

</div>

</div>
<!-- dfbvyhujb duhyfxb -->
<div>
		<div class="container">
        <!-- 	<div class="profile-banner">
				<img src="<?php echo base_url(USERIMAGE . $userdata[0]['profile_background']);?>" class="bgImage" style="margin-top: <?php echo $userdata[0]['profile_background_position']; ?>;">
        		
        	</div>
         -->	<div class="profile-photo">
              <div class="profile-main-pho">
              <div class="user-pic-picture">
              	<div class="user-pic">

              		<img src="<?php echo base_url(USERIMAGE . $userdata[0]['user_image']);?>" alt="" >

              		<a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
              		
              	</div>
              	</div>
              	<div id="popup-form">
              	<?php echo form_open_multipart(base_url('dashboard/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>

              			<input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
              			
              			<input type="submit"  id="cancel" name="cancel" value="Cancel"> 

              			<input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
              		<?php form_close() ?>              	</div>
               	</div>
               	</div>
        <div class="main-font-name">
               	<h5 align="center"> <?php echo ucwords($userdata[0]['first_name']) .' '. ucwords($userdata[0]['last_name']); ?></h5>
               		<div class="profile-text1" >
         				<p align="center">Jr. Owner</p>
         			</div>
        		</div>	  
			   </div>
	<div class="user-midd-section">
			<div class="container">
				<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8 col-sm-8">
						<div class="mid-bar">
							<div class="first-mid-bar">
							<ul class="clearfix">
								<li><a href="<?php echo base_url('job'); ?>">Job Seeker</a></li>
                                <li><a href="<?php echo base_url('recruiter'); ?>">Recruiter</a></li>
                                <li><a href="<?php echo base_url('freelancer'); ?>">Freelancer</a></li>
                               
							</ul>
							</div>
							<div  class="second-mid-bar">
							<ul class="clearfix">
							
							    <li><a href="<?php echo base_url('business_profile'); ?>">Bussiness Profile</a></li>
                                <li><a href="<?php echo base_url('artistic'); ?>">Artistic Person</a></li>
                               
							</ul>
								
                	</div>
						</div>
					</div>
					<div class="col-md-2">
					</div>

				</div>
			</div>
		</div>
	</section>


</body>
</html>