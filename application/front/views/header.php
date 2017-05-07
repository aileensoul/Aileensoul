<!-- header -->

<!-- <script type="text/javascript">
$(window).load(function(){
        $('#message_count').hide();
        return false;
    });
</script> -->


<!-- style for span id=notification_count start-->
<style>
    /*style for span id=notification_count start*/
    #notification_count
    {   padding: 3px;
        background: #0c3168;
        color: #ffffff;
        font-weight: bold;
        margin-left: 7px;
        /* border-radius: 80%; */
        -moz-border-radius: 9px;
        -webkit-border-radius: 2px;
        position: absolute;
        margin-top: -1px;
        /*padding: 4px 8px;
    background: #cc3300;
    
    color: #ffffff;
    font-weight: bold;
    margin-left: 7px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    position: absolute;
    margin-top: -3px;
    font-size: 10px;
        top: 7px;
        line-height: normal;
        right: 7px;
    
        */
    }
    /*style for span id=notification_count End*/


    /*style for span id=message_count start*/


    #message_count
    {
        padding: 3px;
        background: #0c3168;
        color: #ffffff;
        font-weight: bold;
        margin-left: 7px;
        /* border-radius: 80%; */
        -moz-border-radius: 9px;
        -webkit-border-radius: 2px;
        position: absolute;

        margin-top: -2px;font-size: 10px;
        top: 9px;
        line-height: normal;
        right: 11px;
    }
    /*style for span id=message_count End*/

</style>
<!-- style for span id=notification_count end-->

<!-- script for fetch all unread notification start-->
<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/script.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script> 
<script type="text/javascript" charset="utf-8">

    function addmsg(type, msg)
    {

        if (msg == 0)
        {
            $("#notification_count").html('');


        } else
        {
            $('#notification_count').html(msg);
            $('#notification_count').css('background-color', '#FF4500');

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
                        1000
                        );
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                addmsg("error", textStatus + " (" + errorThrown + ")");
                setTimeout(
                        waitForMsg,
                        15000);
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

<script type="text/javascript" charset="utf-8">

    function addmsg1(type, msg)
    {
        if (msg == 0)
        {
            $("#message_count").html('');

        } else
        {
            $('#message_count').html(msg);
            $('#message_count').css('background-color', '#FF4500');
            //alert("welcome");
        }


    }

    function waitForMsg1()
    {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>notification/select_msg_noti",

            async: true,
            cache: false,
            timeout: 50000,

            success: function (data) {
                addmsg1("new", data);
                setTimeout(
                        waitForMsg1,
                        1000
                        );
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                addmsg1("error", textStatus + " (" + errorThrown + ")");
                setTimeout(
                        waitForMsg1,
                        15000);
            }
        });
    }
    ;

    $(document).ready(function () {

        waitForMsg1();

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
<!-- script for fetch all unread message notification end-->

<!-- script header notifaction-->
<!-- Click event on body hide the element notification & Message start -->
<script>
    $(document).ready(function () {
        $("body").click(function (event) {
            $("#notificationContainer").hide(600);
            event.stopPropagation();
        });

    });

    $(document).ready(function () {
        $("body").click(function (event) {
            $("#InboxContainer").hide(600);
            event.stopPropagation();
        });

    });



    $(document).ready(function () {
        $('.dropdown-user').click(function (event) {
            event.stopPropagation();
            $(".dropdown-menu").slideToggle("fast");
        });
        $(".dropdown-menu").on("dropdown-user", function (event) {
            event.stopPropagation();
        });
    });

    $(document).on("dropdown-user", function () {
        $(".dropdown-menu").hide();
    });

    $(document).ready(function () {
        $("body").click(function (event) {
            $(".dropdown-menu").hide(600);
            event.stopPropagation();
        });

    });

</script>
<!-- Click event on button show the element notification & Message end-->

<script type="text/javascript" >
//Document Click
    $(document).ready(function ()
    {
        $("#notificationLink").click(function ()
        {
//$("#notificationLink").hide();

            $("#InboxContainer").hide();
            $("#Inbox_count").hide();
            $(".dropdown-menu").hide();
            $("#dropdown-content_hover").hide();



            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
            $("#notificationContainer").fadeToggle(300);
            $("#notification_count").fadeOut("slow");
            return false;
        });

    });

    $(document).ready(function ()
    {
        $("#InboxLink").click(function ()
        {
//$("#notificationLink").hide();

            $("#Frnd_reqContainer").hide();
            $("#Frnd_req_count").hide();
            $(".dropdown-menu").hide();

            $("#notificationContainer").hide();
            $("#notification_count").hide();
            $("#dropdown-content_hover").hide();

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

            $("#notificationContainer").hide();
            $("#notification_count").hide();
            $("#InboxContainer").hide();
            $("#Inbox_count").hide();
            $("#dropdown-content_hover").hide();

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
    <header>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('images/logo-white.png'); ?>"></a></div>
                    </div>
                    <div class="col-md-8 col-sm-7 header-left-menu">
                        <div class="pushmenu pushmenu-left">
                            <ul class="">

                                <li><a href="<?php echo base_url('dashboard') ?>">All</a></li>


  <!-- <li><a href="#" id="notificationLink" onclick = "return getNotification()">Notification <i class="fa fa-bell-slash-o" aria-hidden="true"></i>
      <span id="notification_count"></span>
  </a></li> -->

                                <li id="notification_li">
                                    <a href="javascript:void(0)" id="notificationLink" onclick = "return myFunction();">Notification <i class="fa fa-bell-slash-o" aria-hidden="true"></i>

                                        <span id="notification_count"></span>

                                    </a><div id="notificationContainer">
                                        <div id="notificationTitle">Notifications</div>

                                        <div id="notificationsBody" class="notifications">
                                            <div class="notification-data">
                                                <ul>

                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >

                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <h6> Notification updates</h6>
                                                                <div ></div>
                                                            </div>

                                                        </div>

                                                    </li>

                                                    <!--1-->
                                                    <?php
                                                    foreach ($job_not as $job) {
                                                    if ($job['not_from'] == 1) {
                                                    ?> ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $job['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/recruiter_post/' . $job['post_id']); ?>"><h6><?php echo "HI.. !  <font color='blue'><b><i> Rectuiter</i></font></b><b>" . "  " . $job['first_name'] . ' ' . $job['last_name'] . "</b> invited you for an interview"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                                    <?php echo $this->common->time_elapsed_string($job['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </li>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                    <!--2-->                                                    
                                                    <?php
                                                    foreach ($artfollow as $art) {
                                                    if ($art['not_from'] == 3) {
                                                    ?> ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('artistic/artistic_profile/' . $art['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Artistic</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> started to following you"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                                    <?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </li>
                                                    <?php
                                                    }
                                                    }
                                                    ?>

                                                    <!--3-->                                                    
                                                    <?php
                                                    foreach($artcommnet as $art) {
                                              $art_not_from = $art['not_from'];
                                                    $art_not_img = $art['not_img'];          
                                                  if($art_not_from == '3' && $art_not_img == '1'){
                                                    ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('artistic/postnewpage/' .$art['art_post_id']); ?>">
                                                                    <h6>
<?php echo "HI.. !  <font color='#4e6db1'><b><i> Artistic</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> commneted on your post"; ?>
                                                                    </h6>
                                                                </a>
                                                                <div>
                                                                    <i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </li>
<?php }else{ ?>

                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('artistic/postnewpage/' .$art['art_post_id']); ?>">
                                                                    <h6>
<?php echo "HI.. !  <font color='#4e6db1'><b><i> Artistic</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> commneted on your image"; ?>
                                                                    </h6>
                                                                </a>
                                                                <div>
                                                                    <i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </li>
<?php } } ?>         <!--4-->  

                                                    <?php
                                                    foreach($artlike as $art){
                                                    $art_not_from = $art['not_from'];
                                                    $art_not_img = $art['not_img'];

                                                    if($art_not_from == '3' && $art_not_img == '2'){
                                                    ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('artistic/postnewpage/' .$art['art_post_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Artistic</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> liked on your post"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php
                                                    }
                                                    elseif($art_not_from == '3' && $art_not_img == '5'){
                                                    ?>
                                                    <li> <?php echo $art_not_img; ?>
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('artistic/postnewpage/' .$art['art_post_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Artistic</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> liked on your image"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>       
                                                    <?php }else{ ?>
                                                     <li> <?php echo $art_not_img; ?>
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('artistic/postnewpage/' .$art['art_post_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Artistic</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> liked on your comment"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php                 } }
                                                      ?>

                                                    
                                                    <!--5-->                                                    
                                                    <?php
                                                    foreach($buscommnet as $bus) {
                                                   $bus_not_from = $bus['not_from'];
                                                    $bus_not_img = $bus['not_img'];

                                                    if($bus_not_from == '6' && $bus_not_img == '1'){ ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $bus['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/business_post/' . $bus['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Business</i></font></b><b>" . "  " . $bus['first_name'] . ' ' . $bus['last_name'] . "</b> commneted on your post"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($bus['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
<?php }else{ ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $bus['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/business_post/' . $bus['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Business</i></font></b><b>" . "  " . $bus['first_name'] . ' ' . $bus['last_name'] . "</b> commneted on your image"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($bus['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php }} ?>   

                                                    <!--6-->                                                    
<?php
foreach($busifollow as $bus) {
if ($bus['not_from'] == 6) {
?> 
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $bus['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('business_profile/business_resume/' . $bus['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Businessman</i></font></b><b>" . "  " . $bus['first_name'] . ' ' . $bus['last_name'] . "</b> started to following you"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($bus['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php }} ?>

                                                    <!--7-->                                                    
<?php
foreach($buslike as $bus) {
$bus_not_from = $bus['not_from'];
$bus_not_img = $bus['not_img'];

if($bus_not_from == '6' && $bus_not_img == '2'){ ?> 
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $bus['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/art_post/' . $bus['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Businessman</i></font></b><b>" . "  " . $bus['first_name'] . ' ' . $bus['last_name'] . "</b> liked on your post"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($bus['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
<?php }elseif($bus_not_from == '6' && $bus_not_img == '5'){ ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $bus['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/art_post/' . $bus['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Businessman</i></font></b><b>" . "  " . $bus['first_name'] . ' ' . $bus['last_name'] . "</b> liked on your image"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($bus['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
<?php }else{ ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $bus['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/art_post/' . $bus['user_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Businessman</i></font></b><b>" . "  " . $bus['first_name'] . ' ' . $bus['last_name'] . "</b> liked on your comment"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($bus['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php }} ?>

                                                    <!--9-->                                                    
<?php
foreach($rec_not as $art) {
if ($art['not_from'] == 2) {
?> ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('job/job_printpreview/' . $id); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Job seeker</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> Aplied on your post"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php }} ?>

                                                    <!--10-->                                                    
<?php
foreach($hire_not as $art) {
if($art['not_from'] == 6){
?> ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('job/job_printpreview/' . $id); ?>"><h6><?php echo "HI.. !  <font color='yellow'><b><i>Freelancer work</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> Aplied on your post"; ?></h6></a> 
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
<?php }} ?> 
                                                    <!--11-->                                                    
<?php
foreach($work_not as $art) {
if($art['not_from'] == 5){
?> ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $art['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('job/job_printpreview/' . $id); ?>"><h6><?php echo "HI.. !  <font color='black'><b><i>Freelance Hire</i></font></b><b>" . "  " . $art['first_name'] . ' ' . $art['last_name'] . "</b> Aplied on your post"; ?></h6></a>
                                                                <div ><i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
                                                    <?php echo $this->common->time_elapsed_string($art['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
                                                    <?php }} ?>

                                                    <!--12--> 
<?php
foreach($work_post as $work) {
if($work['not_from'] == 4){
?> ?>
                                                    <li> 
                                                        <div class="notification-database">
                                                            <div class="notification-pic" >
                                                                <img src="<?php echo base_url(USERIMAGE . $work['user_image']); ?>" >
                                                            </div>
                                                            <div class="notification-data-inside">
                                                                <a href="<?php echo base_url('notification/recruiter_post/' . $work['post_id']); ?>"><h6><?php echo "HI.. !  <font color='#4e6db1'><b><i> Freelancer hire</i></font></b><b>" . "  " . $work['first_name'] . ' ' . $work['last_name'] . "</b> invited you for an interview"; ?></h6></a>
                                                                <div>
                                                                    <i class="fa fa-comment" aria-hidden="true" style="margin-right:8px;"></i>
<?php echo $this->common->time_elapsed_string($work['message_create_date'], $full = false); ?>
                                                                </div>
                                                            </div> </div> </li>
<?php }} ?>                   
                                            </div>  

                                        </div>
                                        <div id="notificationFooter"><a href="<?php echo base_url('notification'); ?>">See All</a></div>
                                    </div>
                                </li>

                                    <?php
                                    $userid = $this->session->userdata('aileenuser');
                                    ?>

                            <!-- <li><a href="<?php //echo base_url('message/message_chat/')     ?>">Message <i class="fa fa-commenting" aria-hidden="true"></i></a></li> -->
                                <li id="Inbox_link">
<?php if ($message_count) { ?>
                                               <!--  <span class="badge bg-theme"><?php echo $message_count; ?></span> -->
<?php } ?>
                                    <a href="#" id="InboxLink" onclick = "return getmsgNotification()">Messages<i class="fa fa-commenting" aria-hidden="true"></i>
                                        <span id="message_count"></span>
                                    </a>

                                    <div id="InboxContainer">
                                        <div id="InboxBody" class="Inbox">
                                            <div id="notificationTitle">Messages</div>

                                            <div id="notificationsBody" class="notifications">
                                                <div class="notification-data">
                                                    <ul>

                                                        <li> 
                                                            <div class="notification-database">
                                                                <div class="notification-pic" >

                                                                </div>
                                                                <div class="notification-data-inside">
                                                                    <h6> Message updates</h6>
                                                                    <div ></div>
                                                                </div>

                                                            </div>

                                                        </li>

<?php foreach ($user_message as $msg) { ?>

                                                        <a href="<?php echo base_url('chat/' . $msg['not_from_id']); ?>" class="clearfix">
                                                            <li> 
                                                                <div class="notification-database">
                                                                    <div class="notification-pic" >
                                                                        <img src="<?php echo base_url(USERIMAGE . $msg['user_image']); ?>" >
                                                                    </div>
                                                                    <div class="notification-data-inside">
                                                                        <h6><?php echo ucwords($msg['first_name']) . " " . ucwords($msg['last_name']); ?></h6>
                                                                        <div >
                                                                            <?php
                                                                            $contition_array = array('message.message_from' => $msg['not_from_id'], 'message.message_to' => $userid);


                                                                            $data = array(' message.*');
//$data = array('notification.*');
                                                                            $messages = $this->common->select_data_by_condition('message', $contition_array, $data, $sortby = 'message_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = "", $groupby = '');
//echo '<pre>'; print_r($messages); die();
                                                                            echo $messages[0]['message'];
                                                                            ?>

                                                                        </div>
                                                                        <div ><?php echo date('d M ', strtotime($msg['message_create_date'])); ?></div>
                                                                    </div>

                                                                </div>

                                                            </li>
                                                        </a>
<?php } ?>
                                                    </ul>
                                                </div>  

                                            </div>
                                            <div id="InboxFooter"><a href="<?php echo base_url('chat') ?>">See All</a></div>
                                        </div>
                                </li>

                           <!--  <li><a href="<?php //echo base_url('friendrequest')     ?>">Friend Request <i class="fa fa-user" aria-hidden="true"></i></a></li> -->

                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                <li class="dropdown dropdown-user">

                                    <a class="dropbtn" href="javascript:void(0)" type="button" id="menu1" data-toggle="dropdown" >
                                        <!-- <div id="hi" class="notifications"> -->
<?php if ($userdata[0]['user_image'] != '') { ?>
                                        <img alt="" class="img-circle" src="<?php echo base_url(USERIMAGE . $userdata[0]['user_image']); ?>" height="50" width="50" alt="Smiley face" />
                                            <?php } else { ?>
                                        <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" height="50" width="50" alt="Smiley face" />
                                            <?php } ?>

                                        <span class="username username-hide-on-mobile"> <?php
                                            if (isset($userdata[0]['first_name'])) {
                                            echo $userdata[0]['first_name'];
                                            }
                                            ?> </span>
                                        <i class="fa fa-angle-down" ></i>
                                    </a>


                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="myDropdown">

                                        <li>
                                            <a href="<?php echo base_url() . 'profile' ?>">
                                                <i class="fa fa-user" aria-hidden="true"></i> Edit Profile </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('registration/changepassword') ?>">
                                                <i class="fa fa-exchange" aria-hidden="true"></i> Change password </a>
                                        </li>
                                        <li class="logout">
                                            <a href="<?php echo base_url('dashboard/logout') ?>">
                                                <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a> 

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
                </div>
            </div>
        </div>
    </header>

    <section class="buttonset">
        <div id="nav_list"></div>
    </section>

    <!-- header end -->

    <!-- script for update all read notification start-->
    <script type="text/javascript">
            function myFunction(){
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

    <!-- script for update all read notification start-->
    <script type="text/javascript">

        function getmsgNotification() {
            // first click alert('here'); 

            $.ajax({
                url: "<?php echo base_url(); ?>notification/update_msg_noti",
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
    <!-- <script type="text/javascript" src="<?php //echo base_url('js/jquery.min-notification.js');     ?>"></script> -->
    <!-- Extra js if not work then add End-->


