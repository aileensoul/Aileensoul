<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->
<?php echo $business_header2_border ?>
<body class="page-container-bg-solid page-boxed">

    <?php echo $dash_header; ?>
    <!-- BEGIN HEADER MENU -->
    <?php echo $dash_header_menu; ?>

    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<style type="text/css">
   .ani
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.acbutton
{
	position: relative;
	padding: 10px 40px;
  margin: 0px 10px 10px 0px;
  float: left;
	border-radius: 10px;
	font-family: 'Pacifico', cursive;
	font-size: 25px;
	color: #FFF;
	text-decoration: none;	
}
.acbutton:active
{
	transform: translate(0px,5px);
  -webkit-transform: translate(0px,5px);
	border-bottom: 1px solid;
}
</style>
<div class="user-midd-section" id="paddingtop_fixed">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-1">
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="common-form">

                    <div class="contact-list">
                        <h3 class="list-title">Your Contacts</h3>

                    </div>  
                    <div class="all-list">
                        <ul  id="contactlist">
                            <?php
                            if($friendlist){
                                foreach($friendlist as $friend){ 
                   $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $friend['industriyal'], $data = '*', $join_str = array()); ?>
                   

                            <?php 

                           $userid = $this->session->userdata('aileenuser');


                            if($friend['contact_to_id'] == $userid){?>
                            <li id="<?php echo  $friend['contact_from_id']; ?>">
                                <div class="list-box">
                                    <div class="profile-img">
                                         <?php if($friend['business_user_image'] != ''){ ?>
                           <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $friend['business_user_image']);?>">
                            <?php } else { ?>
                            <img src="<?php echo base_url(NOIMAGE); ?>" />
                            <?php } ?>
                                        <!--<img src="http://localhost/aileensoul/uploads/user_profile/thumbs/images_(4).jpg">-->
                                    </div>
                                    <div class="profile-content">
                                      <a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$friend['business_slug']); ?>">
                                           <h5><?php echo $friend['company_name']; ?></h5>
                                        <p><?php echo $inddata[0]['industry_name']; ?></p>
                                        </a>
                                        <p class="connect-link">
                                           <a href="#" class="cr-accept acbutton  ani" onclick = "return contactapprove(<?php echo  $friend['contact_from_id']; ?>,1);"><span class="cr-accept1">Accept </span></a>
                                           <a href="#" class="cr-decline" onclick = "return contactapprove(<?php echo  $friend['contact_from_id']; ?>,0);"><span class="cr-decline1">Cancel </span></a>
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <?php }else{?>

                            <li>
                                <div class="list-box">
                                    <div class="profile-img">
                                         <?php if($friend['business_user_image'] != ''){ ?>
                           <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $friend['business_user_image']);?>">
                            <?php } else { ?>
                            <img src="<?php echo base_url(NOIMAGE); ?>" />
                            <?php } ?>
                                        <!--<img src="http://localhost/aileensoul/uploads/user_profile/thumbs/images_(4).jpg">-->
                                    </div>
                                    <div class="profile-content">
                                      <a href="<?php echo base_url('business_profile/business_profile_manage_post/'.$friend['business_slug']); ?>">
                                           <h5><?php echo ucwords($friend['company_name']); ?></h5> confirmed your contact request
                                        <!-- <p><?php echo $inddata[0]['industry_name']; ?></p> -->
                                        </a>
                                       
                                    </div>
                                </div>
                            </li>

                            <?php }?>
           
                            <?php }}else{ ?>
                            
                            No contacts available...
                            
                            <?php } ?>
                        </ul>
                    </div>        
                </div>
        <!-- END PAGE TITLE -->
            </div>
        </div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE CONTENT BODY -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMBS -->
        <!-- <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Layouts</span>
            </li>
        </ul> -->
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- BEGIN INNER FOOTER -->
<?php echo $footer; ?>

<!-- script for update all read notification start-->
<script type="text/javascript">


    function contactperson() {

        $.ajax({
            url: "<?php echo base_url(); ?>business_profile/contact_notification",
            type: "POST",
            success: function (data) {
               
                $('#addcontactBody').html(data);
               
            }
        });

    }
     
     function contactapprove(toid,status) {
      
        $.ajax({
                url: "<?php echo base_url(); ?>business_profile/contact_list_approve",
                type: "POST",
                data: 'toid=' + toid + '&status=' + status,
                success: function (data) {
               //document.getElementById(toid).remove();
                     $('#contactlist').html(data);
                  
                }
            });

        }

</script>
<!-- script for update all read notification end -->