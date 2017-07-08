<!DOCTYPE html>
<html lang="en">
<head>
  <title>aileensoul</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/common-style.css">
  <link rel="stylesheet" href="css/style-main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<?php echo $head; ?>
<?php echo $header; ?>
	<div class="middle-section">
		<div class="container">
			<section class="banner">
				<div class="banner-box">
					<div class="banner-img">
						<img class="main-cover" src="img/banner1.jpg">
					</div>
					<div class="upload-camera">
						<a href="#"><img src="img/cam.png"></a>
					</div>
					<div class="left-profile">
						<div class="profile-photo">

					<?php
                $image_ori = $userdata[0]['user_image'];
                if ($image_ori) {
                    ?>
                    <img src="<?php echo base_url($this->config->item('user_thumb_upload_path') . $userdata[0]['user_image']); ?>" alt="" class="main-pic">

              <?php } else { ?>

                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="" class="main-pic"> 
               <?php } ?>

						<a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
	

						</div>
						<div class="profile-detail">
							<h2> <?php echo ucwords($userdata[0]['first_name']) . ' ' . ucwords($userdata[0]['last_name']); ?></h2>
							<!-- <p>Ahmedabad, Gujarat</p> -->
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="right-profile">
			<ul>
				<li><a href="#job-scroll" class="right-menu-box job-r"></a></li>
				<li><a href="#rec-scroll" class="right-menu-box rec-r"></a></li>
				<li><a href="#free-scroll" class="right-menu-box free-r"></a></li>
				<li><a href="#bus-scroll" class="right-menu-box bus-r"></a></li>
				<li><a href="#art-scroll" class="right-menu-box art-r"></a></li>
			</ul>
		</div>
			<section class="all-profile-custom">
				<div id="job-scroll" class="custom-box odd">
					<div class="custom-width">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="left-box">
									<a href="<?php echo base_url('job'); ?>"><img src="img/i1.jpg"></a>
								</div>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="right-box">
									<h1><a href="<?php echo base_url('job'); ?>">Job Profile</a></h1>
									<p>Find best job options and connect with recruiters.</p>
									<div class="btns">

										<?php if($job[0]['job_step'] != 9){?>
										<a class="btn-1" href="<?php echo base_url('job'); ?>">Register</a>
										<?php }else{?> 

										<a class="btn-1" href="<?php echo base_url('job'); ?>">Takre me in</a> 

										<?php }?>

										<a data-toggle="modal" data-target="#jop-popup" class="pl20 ml20" href="#">How it work?</a> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="rec-scroll" class="custom-box even">
					<div class="custom-width">
						<div class="row">
							<div class="col-md-4 pull-right col-sm-4 col-xs-12">
								<div class="left-box">
									<a href="<?php echo base_url('recruiter'); ?>"><img src="img/i2.jpg"></a>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<div class="right-box">
									<h1><a href="<?php echo base_url('recruiter'); ?>">Recruiter Profile</a></h1>
									<p>Hire quality employees here.</p>
									<div class="btns">
										<a data-toggle="modal" data-target="#rec-popup" class="pr20 mr20" href="#">How it work?</a> 

										 <?php if($recrdata[0]['re_step'] != 2){?>

										<a class="btn-1" href="<?php echo base_url('recruiter'); ?>">Register</a>
										<?php }else{?>

										<a class="btn-1" href="<?php echo base_url('recruiter'); ?>">Take me in</a>

										<?php }?>

									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div id="free-scroll" class="custom-box odd">
					<div class="custom-width">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="left-box">
									<a href="<?php echo base_url('freelancer'); ?>"><img src="img/i3.jpg"></a>
								</div>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="right-box">
									<h1><a href="<?php echo base_url('freelancer'); ?>">Freelance Profile</a></h1>
									<p>Hire freelancers and also find freelance work.</p>
									<div class="btns">


										<a class="btn-1" href="<?php echo base_url('freelancer'); ?>">Register</a>


										<a data-toggle="modal" data-target="#fre-popup" class="pl20 ml20" href="#">How it work?</a> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="bus-scroll" class="custom-box even">
					<div class="custom-width">
						<div class="row">
							<div class="col-md-4 col-sm-4 pull-right col-xs-12">
								<div class="left-box">
									<a href="<?php echo base_url('business_profile'); ?>"><img src="img/i4.jpg"></a>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<div class="right-box">
									<h1><a href="<?php echo base_url('business_profile'); ?>">Business Profile</a></h1>
									<p>Grow your business network.</p>
									<div class="btns">
										<a data-toggle="modal" data-target="#bus-popup" class="pr20 mr20" href="#">How it work?</a>

										<?php if($busdata[0]['business_step'] != 4){ ?>
										<a class="btn-1" href="<?php echo base_url('business_profile'); ?>">Register</a> 
										<?php }else{?>
										<a class="btn-1" href="<?php echo base_url('business_profile'); ?>">Take me in</a> 

										<?php }?>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div id="art-scroll" class="custom-box odd">
					<div class="custom-width">
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="left-box">
									<a href="<?php echo base_url('artistic'); ?>"><img src="img/i5.jpg"></a>
								</div>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="right-box">
									<h1><a href="<?php echo base_url('artistic'); ?>">Artistics Profile</a></h1>
									<p>Show your art & talent to the world.</p>
									<div class="btns">

										<?php if($artdata[0]['art_step'] != 4){?>
										<a class="btn-1" href="<?php echo base_url('artistic'); ?>">Register</a> 
										<?php }else{?>
										<a class="btn-1" href="<?php echo base_url('artistic'); ?>">Take me in</a>
										<?php }?>

										<a data-toggle="modal" data-target="#art-popup" class="pl20 ml20" href="#">How it work?</a> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		
	</div>

	<!-- <footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-4">
					© 2017 | by Aileensoul
				</div>
				<div class="col-md-6 col-sm-8">
					<ul>
						<li><a href="#">About Us</a>|</li>
						<li><a href="#">Contact Us</a>|</li>
						<li><a href="#">Blogs</a>|</li>
						<li><a href="#">Send Us Feedback</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer> -->
	
	<!--  how it work popup  -->
	<div class="modal fade how-it-popup" id="jop-popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<h1 class="modal-title">How It Work ?</h1>
				</div>
				<div class="modal-body">
					<div class="row"> 
						<div class="col-md-6 col-sm-6 pro_img">
							<h3>Job Profile</h3>
							<img src="img/how-it.png">
						</div>
						<div class="col-md-6 col-sm-6 por_content">
							<ul>
								<li><img src="img/p1.png"><span class="pro-text"><span class="count">1.</span><span class="text">Register</span></span></li>
								<li><img src="img/p2.png"><span class="pro-text"><span class="count">2.</span><span class="text">Get job recommendation as per your skills</span></span></li>
								<li><img src="img/p3.png"><span class="pro-text"><span class="count">3.</span><span class="text">Shortlist - Save - Apply for the job</span></span></li>
								<li><img src="img/p4.png"><span class="pro-text"><span class="count">4.</span><span class="text">Connect with the recruiter and view recruiter's profile.</span></span></li>
							</ul>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn-2" href="#">Register Now</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade how-it-popup" id="rec-popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<h1 class="modal-title">How It Work ?</h1>
				</div>
				<div class="modal-body">
					<div class="row"> 
						<div class="col-md-6 col-sm-6 pro_img">
							<h3>Recruiter Profile</h3>
							<img src="img/how-it.png">
						</div>
						<div class="col-md-6 col-sm-6 por_content">
							<ul>
								<li><img src="img/p1.png"><span class="pro-text"><span class="count">1.</span><span class="text">Register</span></span></li>
								<li><img src="img/p5.png"><span class="pro-text"><span class="count">2.</span><span class="text">Post job and see recommended candidates</span></span></li>
								<li><img src="img/p6.png"><span class="pro-text"><span class="count">3.</span><span class="text">Invite from applied candidates for an interview</span></span></li>
								<li><img src="img/p4.png"><span class="pro-text"><span class="count">4.</span><span class="text">Connect with job seekers and view their profiles.</span></span></li>
							</ul>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn-2" href="#">Register Now</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade how-it-popup" id="fre-popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<h1 class="modal-title">How It Work ?</h1>
				</div>
				<div class="modal-body">
					<div class="row"> 
						<div class="col-md-6 col-sm-6 pro_img">
							<h3>Freelance Profile</h3>
							<img src="img/how-it.png">
						</div>
						<div class="col-md-6 col-sm-6 por_content">
							<ul>
								<li><img src="img/p1.png"><span class="pro-text"><span class="count">1.</span><span class="text">Register</span></span></li>
								<li><img src="img/p7.png"><span class="pro-text"><span class="count">2.</span><span class="text">Get freelance work as per your skills</span></span></li>
								<li><img src="img/p3.png"><span class="pro-text"><span class="count">3.</span><span class="text">Shortlist - save - apply for freelance work </span></span></li>
								<li><img src="img/p8.png"><span class="pro-text"><span class="count">4.</span><span class="text">Chat with the employer.</span></span></li>
							</ul>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn-2" href="#">Register Now</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade how-it-popup" id="bus-popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<h1 class="modal-title">How It Work ?</h1>
				</div>
				<div class="modal-body">
					<div class="row"> 
						<div class="col-md-6 col-sm-6 pro_img">
							<h3>Business Profile</h3>
							<img src="img/how-it.png">
						</div>
						<div class="col-md-6 col-sm-6 por_content">
							<ul>
								<li><img src="img/p1.png"><span class="pro-text"><span class="count">1.</span><span class="text">Register</span></span></li>
								<li><img src="img/p4.png"><span class="pro-text"><span class="count">2.</span><span class="text">Build business network.</span></span>
								</li>
							</ul>
							<div class="sub-text">
								<p>Get all news feed about your business category and of business you follow</p>
								<p>You can add to your contacts and grow your business network</p>
								<p>You can upload your products photos and also like and comment on other photos</p>
							</div>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn-2" href="#">Register Now</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade how-it-popup" id="art-popup">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
					<h1 class="modal-title">How It Work ?</h1>
				</div>
				<div class="modal-body">
					<div class="row"> 
						<div class="col-md-6 col-sm-6 pro_img">
							<h3>Artistics Profile</h3>
							<img src="img/how-it.png">
						</div>
						<div class="col-md-6 col-sm-6 por_content">
							<ul>
								<li><img src="img/p1.png"><span class="pro-text"><span class="count">1.</span><span class="text">Register</span></span></li>
								<li><img src="img/p9.png"><span class="pro-text"><span class="count">2.</span><span class="text">You can upload photos/videos/audios and pdf of your art/talent.</span></span>
								</li>
							</ul>
							<div class="sub-text">
								<p>Get all news feed about your artistic category and of the various arts you follow</p>
								
							</div>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn-2" href="#">Register Now</a>
				</div>
			</div>
		</div>
	</div>


<!-- Bid-modal-2  -->
<div class="modal fade message-box" id="bidmodal-2" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>     	
            <div class="modal-body">
                <span class="mes">
                    <div id="popup-form">
<?php echo form_open_multipart(base_url('dashboard/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
 <div class="popup_previred">
                        <img id="preview" src="#" alt="your image"/>
</div>
                        <!--<input type="hidden" name="hitext" id="hitext" value="3">-->
                        <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
<?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Bid-modal-2  -->

<!-- model for popup start -->
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
                    <!-- model for popup -->


<script>
	$( document ).ready(function() {
    
		// hover
		$(function(){
		$(".dropdown").hover(            
				function() {
					$('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
					$(this).toggleClass('open');
					//$('b', this).toggleClass("caret caret-up");                
				},
				function() {
					$('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
					$(this).toggleClass('open');
					//$('b', this).toggleClass("caret caret-up");                
				});
		});

			
			
	
	});
	
	// scroll top
	$(document).ready(function(){
	  // Add smooth scrolling to all links
	  $(".right-profile ul li a").on('click', function(event) {

		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
		  // Prevent default anchor click behavior
		  event.preventDefault();

		  // Store hash
		  var hash = this.hash;

		  // Using jQuery's animate() method to add smooth page scroll
		  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		  $('html, body').animate({
			scrollTop: $(hash).offset().top
		  }, 800, function(){
	   
			// Add hash (#) to URL when done scrolling (default click behavior)
			window.location.hash = hash;
		  });
		} // End if
	  });
	});
	
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
        // pallavi code for not supported file type 15/06/2017
      profile = this.files;
      //alert(profile);
      if (!profile[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
       //alert('not an image');
        $('#profilepic').val('');
         picpopup();
         return false;
          }else{
          readURL(this);}

          // end supported code 
    });
</script>

<!-- script for profile pic end -->

<!-- popup for file type -->
  <script>
         function picpopup() {           
            $('.biderror .mes').html("<div class='pop_content'>Only Image Type Supported");
            $('#bidmodal').modal('show');
                        }
                    </script>

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

<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
                    function updateprofilepopup(id) {
                        $('#bidmodal-2').modal('show');
                    }
</script>



  <script type="text/javascript">
// all popup close close using esc start
    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal-2').modal('hide');
    }
});  

     $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal').modal('hide');
    }
});  
    //all popup close close using esc end
</script>

</body>
</html>