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
  .msg_dot{padding: 0!important;}
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
        background: #003;
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
                        10000
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
                        10000
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
                        <!-- <div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('images/logo-white.png'); ?>"></a></div> -->
                        <div class="logo">
                           <a href="<?php echo base_url('dashboard') ?>"> <h2  style="color: white;">Aileensoul</h2></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7 header-left-menu">
                        <div class="pushmenu pushmenu-left">
                            <ul class="">

                                <li><a class=" action-button shadow animate" href="<?php echo base_url('dashboard') ?>">All</a></li>


  <!-- <li><a href="#" id="notificationLink" onclick = "return getNotification()">Notification <i class="fa fa-bell-slash-o" aria-hidden="true"></i>
      <span id="notification_count"></span>
  </a></li> -->
<!-- general notification start -->
                                <li id="notification_li">
                                    <a class="action-button shadow animate" href="javascript:void(0)" id="notificationLink" onclick = "return Notificationheader();">Notification <i class="fa fa-bell-slash-o" aria-hidden="true"></i>

                                        <span id="notification_count"></span>

                                    </a><div id="notificationContainer">
                                        <div id="notificationTitle">Notifications</div>

                                        <div id="notificationsBody" class="notifications">
                                
                                        
                                    </div>
                                </li>
<!-- general notification end -->
                                    <?php
                                    $userid = $this->session->userdata('aileenuser');
                                    ?>

                            <!-- <li><a href="<?php //echo base_url('message/message_chat/')     ?>">Message <i class="fa fa-commenting" aria-hidden="true"></i></a></li> -->
                                <li id="Inbox_link">
<?php if ($message_count) { ?>
                                               <!--  <span class="badge bg-theme"><?php echo $message_count; ?></span> -->
<?php } ?>
                                    <a class="action-button shadow animate" href="#" id="InboxLink" onclick = "return getmsgNotification()">Messages<i class="fa fa-commenting" aria-hidden="true"></i>
                                        <span id="message_count"></span>
                                    </a>

                                    <div id="InboxContainer">
                                        <div id="InboxBody" class="Inbox">
                                            <div id="notificationTitle">Messages</div>

                                            <div id="notificationsmsgBody" class="notificationsmsg">
                       

                                            </div>
                                            <div id="InboxFooter"><a href="<?php echo base_url('chat') ?>">See All</a></div>
                                        </div>
                                </li>

                           <!--  <li><a href="<?php //echo base_url('friendrequest')     ?>">Friend Request <i class="fa fa-user" aria-hidden="true"></i></a></li> -->

                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                <li class="dropdown dropdown-user">

                                    <a class="dropbtn action-button shadow animate" href="javascript:void(0)" type="button" id="menu1" data-toggle="dropdown" >
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
            
    function Notificationheader(){
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
        
        function getmsgNotification(){
              msgNotification();
               msgheader();
                  
    }

        function msgNotification() {
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
        
        function msgheader()
                        {

                           // $("#fad" + clicked_id).fadeOut(6000);


                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() . "notification/msg_header" ?>',
                                data: '',
                                success: function (data) {
                               //    alert(data);
                                   $('#' + 'notificationsmsgBody').html(data);

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


