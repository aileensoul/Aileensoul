
<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" /> 
<!-- Calender Css Start-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
<!-- Calender Css End-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="<?php echo base_url('z2/scrollbar/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('z2/scrollbar/jquery.mCustomScrollbar.css')?>"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">

<!-- start header -->
<!-- <Don't Remove this Script SEO> -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91486853-1', 'auto');
  ga('send', 'pageview');

</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6060111582812113",
    enable_page_level_ads: true
  });
</script>
<!-- header -->

<!-- IMAGE PRELOADER SCRIPT -->
<script type="text/javascript">
 function preload(arrayOfImages) {
    $(arrayOfImages).each(function () {
        $('<img />').attr('src',this).appendTo('body').css('display','none');
    });
}
</script>
<!-- IMAGE PRELOADER SCRIPT -->
<!-- <script type="text/javascript">
$(window).load(function(){
        $('#message_count').hide();
        return false;
    });
</script> -->


<!-- style for span id=notification_count start-->
<style>
.see_link{float: right;}
#notificationTitle .see_link a{color: black !important ;
font-size: 14px !important;
padding: 2px !important;
margin: 0;}
#notificationTitle .see_link a:hover {
    text-decoration: underline;
    color: #1b8ab9!important;
}
    /*style for span id=notification_count start*/
    .msg_dot{padding: 0!important;}
    #notification_count
    {   padding: 3px;
        background: #1b8ab9;
        color: #ffffff;
        font-weight: bold;
        margin-left: 7px;
        /* border-radius: 80%; */
        -moz-border-radius: 9px;
        -webkit-border-radius: 2px;
        position: absolute;
        
      
    }
    /*style for span id=notification_count End*/

    /*style for span id=message_count start*/


    #message_count
    {
        padding: 3px;
        background: #1b8ab9;
        color: #ffffff;
        font-weight: bold;
        margin-left: 7px;
        /* border-radius: 80%; */
        -moz-border-radius: 9px;
        -webkit-border-radius: 2px;
        position: absolute;

      font-size: 10px;
        top: 3px;
        line-height: normal;
        right: 1px;
    }
    /*style for span id=message_count End*/

</style>
<!-- style for span id=notification_count end-->
<link rel="stylesheet" href="<?php echo base_url() ?>css/animate.css" />
<!-- script for fetch all unread notification start-->
<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php // echo base_url('js/script.js'); ?>"></script>
<!-- <script type="text/javascript" src="<?php //echo base_url('js/select2_new.js'); ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script> 
<script type="text/javascript" charset="utf-8">

    function addmsg(type, msg)
    {

        if (msg == 0)
        {  
            $("#notification_count").html('');
            $('#notificationLink').removeClass('notification_available');
        } else
        {
            $('#notification_count').html(msg);
            $('#notification_count').css({"background-color": "#FF4500" , "height": "18px" ,"width": "18px" , "padding" : "5px 6px"});
            $('#notificationLink').addClass('notification_available');
        }
    }

    function waitForMsg()
    {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>notification/select_notification",

            async: true,
            cache: false,
            timeout: 50000,

            success: function (data) {
                addmsg("new", data);
                setTimeout(
                        waitForMsg,
                        10000
                        );
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
//                addmsg("error", textStatus + " (" + errorThrown + ")");
//                setTimeout(
//                        waitForMsg,
//                        15000);
            }
        });
    }
    ;

    $(document).ready(function () {

        waitForMsg();

    });
    $(document).ready(function () {
        $menuLeft = $('.pushmenu-left');
        $nav_list = $('#nav_list');

        $nav_list.click(function () {
            $(this).toggleClass('active');
            $('.pushmenu-push').toggleClass('pushmenu-push-toright');
            $menuLeft.toggleClass('pushmenu-open');
        });
    });

</script>
<!-- script for fetch all unread notification end-->

<!-- script for fetch all unread message notification start-->


<!-- script for fetch all conatct notification start -->
<script type="text/javascript">

    function addmsg_contact(type, msg)
    {

        if (msg == 0)
        {
            $("#addcontact_count").html('');
            $('#addcontactLink').removeClass('contact_notification_available');

        } else
        {
            $('#addcontact_count').html(msg);
            $('#addcontact_count').css({"background-color": "#FF4500" , "height": "16px" ,"width": "16px" , "padding" : "3px 4px"});
            $('#addcontactLink').addClass('contact_notification_available');

        }

    }

    function waitForMsg_contact()
    {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>business_profile/contact_count",

            async: true,
            cache: false,
            timeout: 50000,

            success: function (data) {
                addmsg_contact("new", data);
                setTimeout(
                        waitForMsg_contact,
                        10000
                        );
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
//                addmsg("error", textStatus + " (" + errorThrown + ")");
//                setTimeout(
//                        waitForMsg,
//                        15000);
            }
        });
    }
    ;

    $(document).ready(function () {

        waitForMsg_contact();

    });
    $(document).ready(function () {
        $menuLeft = $('.pushmenu-left');
        $nav_list = $('#nav_list');

        $nav_list.click(function () {
            $(this).toggleClass('active');
            $('.pushmenu-push').toggleClass('pushmenu-push-toright');
            $menuLeft.toggleClass('pushmenu-open');
        });
    });

</script>
<!-- script for fetch all unread notification end-->
</script>

<!-- scrpt for fatch a;; conatct notification end -->


<!-- script header notifaction-->
<!-- Click event on body hide the element notification & Message start -->
<script>
    $(document).ready(function () {

       
        $("body").click(function (event) {
            $("#notificationContainer").fadeOut("slow");
           // event.stopPropagation();
        });

    });
       $(document).ready(function () {
        $("body").click(function (event) {
            $("#acon").fadeOut("slow");
           // event.stopPropagation();
        });

    });
     /*$(document).ready(function () {
        $("body").click(function (event) {
            $("#acon").hide(600);
           // event.stopPropagation();
        });

    });*/

    $(document).ready(function () {
        $("body").click(function (event) {
            $("#InboxContainer").fadeOut("slow");

           // event.stopPropagation();
        });

    });



    $(document).ready(function () {
        $('.dropdown-user').click(function (event) {
        event.stopPropagation();
            $(".dropdown-menu").slideToggle("fast");
        });
        $(".dropdown-menu").on("dropdown-user", function (event) {
           // event.stopPropagation();
        });
    });

    $(document).on("dropdown-user", function () {
        $(".dropdown-menu").hide();
    });

    $(document).ready(function () {
        $("body").click(function (event) {
            $(".dropdown-menu").fadeOut("slow");
          //event.stopPropagation();
        });

    });

</script>
<!-- Click event on button show the element notification & Message end-->

<script type="text/javascript" >

// click on escape notification & message drop down close start
$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $( "#notificationContainer" ).hide();
    }
});
$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $( "#acon" ).hide();
    }
});
$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $( "#acon" ).hide();
    }
});

$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $( "#InboxContainer" ).hide();
    }
});
// click on escape notification & message drop down close end
  

    $(document).ready(function ()
    {
        $("#notificationLink").click(function ()
        {
//$("#notificationLink").hide();

            $("#InboxContainer").hide();
            $("#Inbox_count").hide();
            $(".dropdown-menu").hide();
            $("#dropdown-content_hover").hide();
            $("#addcontactContainer").hide();
             $("#acon").hide();


            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
            $("#notificationContainer").fadeToggle(300);
            $("#notification_count").fadeOut("slow");
            return false;
        });

    });

//Document Click
    $(document).ready(function ()
    {
        $("#InboxLink").click(function ()
        {
            
//$("#notificationLink").hide();

            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
            $(".dropdown-menu").hide();
            $("#addcontactContainer").hide();
            $("#notificationContainer").hide();
            $("#notification_count").hide();
            $("#dropdown-content_hover").hide();
            $("#acon").hide();
            $("#InboxContainer").fadeToggle(300);
            $("#Inbox_count").fadeOut("slow");
            return false;
        });

    });

    $(document).ready(function ()
    {
        $(".dropdown-user").click(function ()
        {
//$("#notificationLink").hide();

            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
            $("#addcontactContainer").hide();
            $("#notificationContainer").hide();
            $("#notification_count").hide();
            $("#InboxContainer").hide();
            $("#Inbox_count").hide();
            $("#dropdown-content_hover").hide();
            $("#acon").hide();
            return true;
        });

    });

    $(document).ready(function ()
    {
        $(".dropdown_hover").click(function ()
        {
//$("#notificationLink").hide();

            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
            $("#acon").hide();
            $("#notificationContainer").hide();
            $("#notification_count").hide();
            $("#InboxContainer").hide();
            $("#Inbox_count").hide();
//$(".dropdown-user").hide();
            return true;
        });

    });

</script>



<script type="text/javascript">
    $(document).ready(function () {
        // Show hide popover
        $("myDropdown").click(function () {
            $(this).find(".dropdown-menu").slideToggle("slow");
        });
    });
    $(document).on("click", function (event) {
        var $trigger = $(".myDropdown");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".myDropdown").slideUp("slow");
        }
    });
</script>

<!-- -->
<body class="pushmenu-push">
<!-- 
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div> -->

  <header class="">
        <div class="header animated fadeInDownBig">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5 col-xs-5 mob-zindex">
                        <!-- <div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('images/logo-white.png'); ?>"></a></div> -->
                        <div class="logo">
                            <a tabindex="-200" href="<?php echo base_url('dashboard') ?>"> <h2  style="color: white;">Aileensoul</h2></a>
                        </div>
                    </div>

                    
<?php 
   $userid = $this->session->userdata('aileenuser');
if($userid){?>
                    <div class="col-md-8 col-sm-7 col-xs-7 header-left-menu">
                        <div class="main-menu-right">
                            <ul class="">


                                <?php if(($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'add_post') || ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'edit_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_add_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_edit_post')){?>
                                <li id="a_li"><a class=" action-button shadow animate" onclick="return leave_page(5)"><span class="img-all"></span></a>
                                
                                    <div id="acon">
                                    <div id="atittle">Profiles <a href="<?php echo base_url('dashboard') ?>" class="fr">All</a></div>
                                    <div id="abody" class="as">
                                    <ul>
                                        <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('job'); ?>">
                                        
                                             <div class="all-img">
                                                 <img src="<?php echo base_url('img/i1.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Job Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('recruiter'); ?>">
                                        
                                             <div class="all-img">
                                                  <img src="<?php echo base_url('img/i2.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Recruiter Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('freelancer'); ?>">
                                        
                                             <div class="all-img">
                                                 <img src="<?php echo base_url('img/i3.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Freelance Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('business_profile'); ?>">
                                        
                                             <div class="all-img">
                                                  <img src="<?php echo base_url('img/i4.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Business Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('artistic'); ?>">
                                        
                                             <div class="all-img">
                                                 <img src="<?php echo base_url('img/i5.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Artistic Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                       
                                    </ul>
                                    </div>

                                    </div>
                                    </li>
                               
                                 <?php }else{?>

                                 <li id="a_li">
                                 <a id="alink" class=" action-button shadow animate" href="javascript:void(0)"><span class="img-all"></span>
                                    </a>

                                    <div id="acon">
                                    <div id="atittle">Profiles <a href="<?php echo base_url('dashboard') ?>" class="fr">All</a></div>
                                    <div id="abody" class="as">
                                    <ul>
                                        <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('job'); ?>">
                                        
                                             <div class="all-img">
                                                 <img src="<?php echo base_url('img/i1.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Job Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('recruiter'); ?>">
                                        
                                             <div class="all-img">
                                                   <img src="<?php echo base_url('img/i2.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Recruiter Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('freelancer'); ?>">
                                        
                                             <div class="all-img">
                                                  <img src="<?php echo base_url('img/i3.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Freelance Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('business_profile'); ?>">
                                        
                                             <div class="all-img">
                                                  <img src="<?php echo base_url('img/i4.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Business Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                          <li>
                                             <div class="all-down">
                                        <a href="<?php echo base_url('artistic'); ?>">
                                        
                                             <div class="all-img">
                                                  <img src="<?php echo base_url('img/i5.jpg')?>">
                                             </div>
                                             <div class="text-all">
                                                    Artistic Profile
                                             </div>
                                              </a>
                                         </div>
                                        
                                          </li>
                                       
                                    </ul>
                                    </div>

                                    </div>

                                </li>
                                 <?php } ?>

                               

  <!-- <li><a href="#" id="notificationLink" onclick = "return getNotification()">Notification <i class="fa fa-bell-slash-o" aria-hidden="true"></i>
      <span id="notification_count"></span>
  </a></li> -->
                                <!-- general notification start -->


                         

                            <!-- <li><a href="<?php //echo base_url('message/message_chat/')      ?>">Message <i class="fa fa-commenting" aria-hidden="true"></i></a></li> -->
                                       <li id="notification_li">
                                    <a class="action-button shadow animate" href="javascript:void(0)" id="notificationLink" onclick = "return Notificationheader();"><em class="hidden-xs"></em> <i class="img-noti"></i>

                                        <span id="notification_count"></span>

                                    </a><div id="notificationContainer">
                                        <div id="notificationTitle">Notifications <span class="see_link"><a href="http://localhost/aileensoul/notification">See All</a></span></div>

                                             <div class="content mCustomScrollbar light notifications" id="notification_main_in" data-mcs-theme="minimal-dark">
                                            
<div>
    <ul class="">
    <li class="active2">
        <a href="http://localhost/aileensoul/business_profile/business_resume/zalak-infotech-pvt-ltd" onclick="not_active(1422)">
            <div class="notification-database">
                <div class="notification-pic">
                    <div class="post-img-div">Z</div>
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Zalak Infotech Pvt Ltd</b> <span class="noti-msg-y">Started following you in business profile.</span></h6>
                    <div><i class="clockimg"></i><span class="day-text">3 days ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/business_profile/business_resume/zalak-infotech-pvt-ltd" onclick="not_active(1387)">
            <div class="notification-database">
                <div class="notification-pic">
                    <div class="post-img-div">Z</div>
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Zalak Infotech Pvt Ltd</b> <span class="noti-msg-y">Started following you in business profile.</span></h6>
                    <div><i class="clockimg"></i><span class="day-text">1 week ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/notification/business_post/60" onclick="not_active(1366)">
            <div class="notification-database">
                <div class="notification-pic"><img src="http://localhost/aileensoul/uploads/business_profile/thumbs/images.png">
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Abhinandan Hosiery</b> <span class="noti-msg-y"> Likes your post in business profile. </span> </h6>
                    <div><i class="clockimg"></i><span class="day-text">2 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/business_profile/business_resume/hemstechnosys-pvt-ltd" onclick="not_active(1270)">
            <div class="notification-database">
                <div class="notification-pic">
                    <div class="post-img-div">H</div>
                </div>
                <div class="notification-data-inside">
                    <h6><b>  HEMSTECHNOSYS PVT. LTD.</b> <span class="noti-msg-y">Started following you in business profile.</span></h6>
                    <div><i class="clockimg"></i><span class="day-text">3 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/business_profile/business_resume/rout-digital-duniya" onclick="not_active(1195)">
            <div class="notification-database">
                <div class="notification-pic"><img src="http://localhost/aileensoul/uploads/business_profile/thumbs/index3.jpg">
                </div>
                <div class="notification-data-inside">
                    <h6><b>  ROUT DIGITAL DUNIYA</b> <span class="noti-msg-y">Started following you in business profile.</span></h6>
                    <div><i class="clockimg"></i><span class="day-text">3 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/business_profile/business_resume/abhinandan-hosiery" onclick="not_active(1154)">
            <div class="notification-database">
                <div class="notification-pic"><img src="http://localhost/aileensoul/uploads/business_profile/thumbs/images.png">
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Abhinandan Hosiery</b> <span class="noti-msg-y">Started following you in business profile.</span></h6>
                    <div><i class="clockimg"></i><span class="day-text">3 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/notification/business_post/65" onclick="not_active(1151)">
            <div class="notification-database">
                <div class="notification-pic"><img src="http://localhost/aileensoul/uploads/business_profile/thumbs/images.png">
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Abhinandan Hosiery</b> <span class="noti-msg-y"> Likes your post in business profile. </span> </h6>
                    <div><i class="clockimg"></i><span class="day-text">3 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/notification/business_post/66" onclick="not_active(1150)">
            <div class="notification-database">
                <div class="notification-pic"><img src="http://localhost/aileensoul/uploads/business_profile/thumbs/images.png">
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Abhinandan Hosiery</b> <span class="noti-msg-y"> Likes your post in business profile. </span> </h6>
                    <div><i class="clockimg"></i><span class="day-text">3 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="active2">
        <a href="http://localhost/aileensoul/notification/business_post/67" onclick="not_active(1149)">
            <div class="notification-database">
                <div class="notification-pic"><img src="http://localhost/aileensoul/uploads/business_profile/thumbs/images.png">
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Abhinandan Hosiery</b> <span class="noti-msg-y"> Likes your post in business profile. </span> </h6>
                    <div><i class="clockimg"></i><span class="day-text">3 weeks ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="">
        <a href="http://localhost/aileensoul/artistic/artistic_profile/318" onclick="not_active(1126)">
            <div class="notification-database">
                <div class="notification-pic">
                    <div class="post-img-div">DP</div>
                </div>
                <div class="notification-data-inside">
                    <h6><b>  Dhruti Panchal</b> <span class="noti-msg-y"> Started following you in artistic.</span></h6>
                    <div><i class="clockimg"></i><span class="day-text">1 month ago</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
</ul>
</div>

                                    </div>

                                        </div>
                                </li>

                           <!--  <li><a href="<?php //echo base_url('friendrequest')      ?>">Friend Request <i class="fa fa-user" aria-hidden="true"></i></a></li> -->

                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                <li class="dropdown dropdown-user">

                                    <a class="dropbtn action-button shadow animate" href="javascript:void(0)" type="button" id="menu1" data-toggle="dropdown" >
                                        <!-- <div id="hi" class="notifications"> -->
                                        <?php if ($userdata[0]['user_image'] != '') { ?>
                                            <img alt="" class="img-circle" src="<?php echo base_url($this->config->item('user_thumb_upload_path') . $userdata[0]['user_image']); ?>" height="50" width="50" alt="Smiley face" />
                                        <?php } else { 

                                              $a = $userdata[0]['first_name'];
               $acr = substr($a, 0, 1);

              ?>
              <div class="custom-user">
             <?php echo  ucfirst(strtolower($acr)); ?>
              
             </div>
                                             <!-- <img alt="" class="img-circle" src="<?php //echo base_url(NOIMAGE); ?>" height="50" width="50" alt="Smiley face" /> -->
                                        <?php } ?>

                                        <span class="u2 username username-hide-on-mobile hidden-xs"> <?php
                                            if (isset($userdata[0]['first_name'])) {
                                                echo $userdata[0]['first_name'];
                                            }
                                            ?> </span>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>

                                    </a>


                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="myDropdown">

                                        <!-- <li>
                                        <?php if(($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'add_post') || ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'edit_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_add_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_edit_post')){?>
                                
                               <a  onclick="return leave_page(6)">
                                                <i class="fa fa-user" aria-hidden="true"></i> Edit Profile </a>
                                
                                 <?php }else{?>

                               <a href="<?php echo base_url() . 'profile' ?>">
                                                <i class="fa fa-user" aria-hidden="true"></i> Edit Profile </a>
                                 <?php } ?>
                                            
                                        </li>
                                        <li>
                                        <?php if(($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'add_post') || ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'edit_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_add_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_edit_post')){?>
                                
                               <a  onclick="return leave_page(7)">
                                                <i class="fa fa-exchange" aria-hidden="true"></i> Change password </a>
                                
                                 <?php }else{?>

                              <a href="<?php echo base_url('registration/changepassword') ?>">
                                                <i class="fa fa-exchange" aria-hidden="true"></i> Change password </a>
                                 <?php } ?>
                                            
                                        </li> -->
                                        <li class="my_account">
                                        <div class="my_S">Account</div>
                                            
                                        </li>
                                        <li class="Setting">
                                            <a href="<?php echo base_url('profile') ?>">
                                                <i class="fa fa-cog" aria-hidden="true"></i> Setting</a> 
                                        </li>
                                        <li class="logout">
                                         <?php if(($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'add_post') || ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'edit_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_add_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_edit_post')){?>
                                
                               <a  onclick="return leave_page(8)">
                                                <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a> 
                                
                                 <?php }else{?>

                               <a href="<?php echo base_url('dashboard/logout') ?>">
                                                <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a> 
                                 <?php } ?>
                                           

                                            <!--                                            Logout-->
                                        </li>

                                    </ul>
                                    <!--  </div> -->
                                </li>


                                <!-- Friend Request Start-->
                                <!--  -->
                                <!-- Friend Request End-->

                                <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </div>
                    </div>


                    <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- header end -->

    <!-- script for update all read notification start-->
    <script type="text/javascript">

        function Notificationheader() {
            getNotification();
            notheader();

        }
        function getNotification() {
            // first click alert('here'); 

            $.ajax({
                url: "<?php echo base_url(); ?>notification/update_notification",
                type: "POST",
                //data: {uid: 12341234}, //this sends the user-id to php as a post variable, in php it can be accessed as $_POST['uid']
                success: function (data) {
                    data = JSON.parse(data);
                    //alert(data);
                    //update some fields with the updated data
                    //you can access the data like 'data["driver"]'
                }
            });

        }

        function notheader()
        {

            // $("#fad" + clicked_id).fadeOut(6000);


            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "notification/not_header" ?>',
                data: '',
                success: function (data) {
                    //    alert(data);
                    $('#' + 'notificationsBody').html(data);

                }


            });

        }

    </script>
    <!-- script for update all read notification end -->

    <script>
        jQuery(document).ready(function($) {
         if(screen.width <= 767){
             
             $("ul.left-form-each").on("click", ".init", function() {
                $(this).closest("ul").children('li:not(.init)').toggle();
            });

            var allOptions = $("ul").children('li:not(.init)');
            $("ul.left-form-each").on("click", "li:not(.init)", function() {
                allOptions.removeClass('selected');
                $(this).addClass('selected');
                $("ul.left-form-each").children('.init').html($(this).html());
                allOptions.toggle();
            });
             
             
          
            }
            
            
           $(function () {
                $('a[href="#search"]').on('click', function(event) {
                    event.preventDefault();
                    $('#search').addClass('open');
                    $('#search > form > input[type="search"]').focus();
                });

                $('#search, #search button.close').on('click keyup', function(event) {
                    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                        $(this).removeClass('open');
                    }
                });

            });
        });
    </script>
    <!-- script for update all read notification end -->
<!-- <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
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
    -->

    <!-- Extra js if not work then add Start-->
    <!-- <script type="text/javascript" src="<?php //echo base_url('js/jquery.min-notification.js');      ?>"></script> -->
    <!-- Extra js if not work then add End-->

<script type="text/javascript" >

$(document).ready(function ()
    {
        $("#alink").click(function ()
        {

          
//$("#notificationLink").hide();
            $("#acon").fadeToggle(300);
            $("#acont").fadeOut("slow");

            $("#InboxContainer").hide();
            $("#Inbox_count").hide();
            $(".dropdown-menu").hide();
            $("#dropdown-content_hover").hide();
            $("#addcontactContainer").hide();
            $("#notificationContainer").hide();
            $("#notification_count").hide();


            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
           

            return false;
        });

    });

// $(document).ready(function ()
//     {
//         $("#notificationLink").click(function ()
//         {
// //$("#notificationLink").hide();
                
//             $("#InboxContainer").hide();
//             $("#Inbox_count").hide();
//             $(".dropdown-menu").hide();
//             $("#dropdown-content_hover").hide();
//             $("#addcontactContainer").hide();


//             $("#Frnd_reqContainer").hide();
//             $("#Frnd_req_count").hide();
//             $("#notificationContainer").fadeToggle(300);
//             $("#notification_count").fadeOut("slow");
//             return false;
//         });

//     });
</script>

<script type="text/javascript">
   function not_active(not_id)
   { 
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "notification/not_active" ?>',
           data: 'not_id=' + not_id,
           success: function (data) {
              }
          });
      }
   
</script>



<body>
    <section>
      <div class="user-midd-section " id="paddingtop_fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                  <div class="clearfix">
                  <div class="col-md-6">
                 
                  </div>
                </div>                

            </div>
        </div>
     </div>


    </section>
    <!-- END CONTAINER -->
<script type="text/javascript">
    $('#other_skill').click(function(){
$('#other_skill_data').toggle()
})
</script>

</body>
</html>

  
  <!-- custom scrollbar plugin -->
  <script src="../z2/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>