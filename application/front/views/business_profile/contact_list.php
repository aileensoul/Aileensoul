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

<div class="col-md-4 col-xs-12  hidden-md hidden-sm hidden-lg pt1201 ">
    <div class="common-form ">
        <div class="main_cqlist-1"> 
            <div class="contact-list ">
                <h3 class="list-title">Contact Request Notifications</h3>
                <div class="noti_cq">
                    <div class="cq_post">
                        <ul>
                            <?php
                            if ($friendlist_con) { //echo "hii";
                                foreach ($friendlist_con as $friend) {
                                ?>
                                    <?php
                                    $userid = $this->session->userdata('aileenuser');


                                    if ($friend['contact_from_id'] == $userid) {
                                        ?>
                                        <li> 
                                            <div class="cq_main_lp">
                                                <div class="cq_latest_left">
                                                    <div class="cq_post_img">

                                                        <?php if ($friend['business_user_image'] != '') { ?>
                                                            <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                                <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $friend['business_user_image']); ?>">
                                                            </a>
                                                        <?php } else { ?>
                                                            <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                                <img src="<?php echo base_url(NOIMAGE); ?>" />
                                                            </a>
                                                        <?php } ?>


                                                    </div>
                                                </div>  
                                                <div class="cq_latest_right">
                                                    <div class="cq_desc_post">
                                                        <sapn class="rifght_fname">  
                                                            <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                                <span class="main_name">
                                                                    <?php echo ucfirst(strtolower($friend['company_name'])); ?> 
                                                                </span>
                                                            </a>
                                                            <span style="color: #8c8c8c;">confirmed your contact request .</span>
                                                        </sapn>
                                                    </div>

                                                    <div class="cq_desc_post">
                                                        <sapn class="cq_rifght_desc">  <?php echo $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($friend['modify_date']))); ?> </sapn>
                                                    </div>  
                                                </div>



                                            </div>

                                        </li>
                                    <?php }
                                }
                            } else { ?>

                                <li>
                                    <div class="cq_main_lp2">
                                        No Notifications  available...
                                    </div>
                                </li>
<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<div class="user-midd-section" id="paddingtop_fixed pt_mn">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 pt120 pt_mn2">
                <div class="common-form main_cqlist">

                    <div class="contact-list">
                        <h3 class="list-title list-title2"> Contact Request</h3>

                    </div>  
                    <div class="all-list">
                        <ul  id="contactlist">
                            <?php
                            if ($friendlist_req) {
                                foreach ($friendlist_req as $friend) {
                                    $inddata = $this->common->select_data_by_id('industry_type', 'industry_id', $friend['industriyal'], $data = '*', $join_str = array());
                                    ?>


                                    <?php
                                    $userid = $this->session->userdata('aileenuser');


                                    if ($friend['contact_to_id'] == $userid) {
                                        ?>
                                        <li id="<?php echo $friend['contact_from_id']; ?>">
                                            <div class="list-box">
                                                <div class="profile-img">
            <?php if ($friend['business_user_image'] != '') { ?>
                                                        <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                            <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $friend['business_user_image']); ?>">
                                                        </a>
            <?php } else { ?>
                                                        <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                            <img src="<?php echo base_url(NOIMAGE); ?>" />
                                                        </a>
            <?php } ?>
                                                        <!--<img src="http://localhost/aileensoul/uploads/user_profile/thumbs/images_(4).jpg">-->
                                                </div>
                                                <div class="profile-content">
                                                    <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                        <div class="main_data_cq">   <span title="<?php echo $friend['company_name']; ?>" class="main_compny_name"><?php echo $friend['company_name']; ?></span></div>
                                                        <div class="main_data_cq">

                                                            <?php if ($inddata[0]['industry_name']) { ?>
                                                                <span class="dc_cl_m"   title="<?php echo $inddata[0]['industry_name']; ?>"> <?php echo $inddata[0]['industry_name']; ?></span>
                                                            <?php } else { ?>

                                                                <span class="dc_cl_m"   title="<?php echo $friend['other_industrial']; ?>"> <?php echo $friend['other_industrial']; ?></span>
            <?php } ?>
                                                        </div>
                                                    </a>
                                                    </span>

                                                </div>
                                                <div class="fw">
                                                    <p class="connect-link">
                                                        <a href="#" class="cr-accept acbutton  ani" onclick = "return contactapprove1(<?php echo $friend['contact_from_id']; ?>, 1);"><span class="cr-accept1"><i class="fa fa-check" aria-hidden="true"></i>
                                                            </span></a>
                                                        <a href="#" class="cr-decline" onclick = "return contactapprove1(<?php echo $friend['contact_from_id']; ?>, 0);"><span class="cr-decline1"><i class="fa fa-times" aria-hidden="true"></i>
                                                            </span></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                    <?php } ?>

                                <?php
                                }
                            } else { //echo "hi"i; die();
                                ?>
                                <!--                                <li>
                                                               
                                                                No contact request available
                                                              
                                                                </li>-->
                                <li><div class="art-img-nn" id= "art-blank">
                                    <div class="art_no_post_img">

                                        <img src="<?php echo base_url('img/No_Contact_Request.png') ?>">

                                    </div>
                                    <div class="art_no_post_text">
                                        No Contact Request Available.
                                    </div>
                                    </div></li>

<?php } ?>
                        </ul>
                    </div>        
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <div class="col-md-4 col-sm-5 pt120 hidden-xs ">
                <div class="common-form ">
                    <div class="main_cqlist-1"> 
                        <div class="contact-list ">
                            <h3 class="list-title">Contact Request Notifications</h3>
                            <div class="noti_cq">

                                <div class="cq_post">
                                    <ul>


                                        <?php
                                        if ($friendlist_con) { //echo "hii";
                                            foreach ($friendlist_con as $friend) {
                                                ?>


                                                <?php
                                                $userid = $this->session->userdata('aileenuser');


                                                if ($friend['contact_from_id'] == $userid) {
                                                    ?>
                                                    <li> 
                                                        <div class="cq_main_lp">
                                                            <div class="cq_latest_left">
                                                                <div class="cq_post_img">

                                                                    <?php if ($friend['business_user_image'] != '') { ?>
                                                                        <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                                            <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $friend['business_user_image']); ?>">
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                                            <img src="<?php echo base_url(NOIMAGE); ?>" />
                                                                        </a>
            <?php } ?>


                                                                </div>
                                                            </div>  
                                                            <div class="cq_latest_right">
                                                                <div class="cq_desc_post">
                                                                    <sapn class="rifght_fname">  
                                                                        <a  href="<?php echo base_url('business_profile/business_profile_manage_post/' . $friend['business_slug']); ?>">
                                                                            <span class="main_name">
            <?php echo ucfirst(strtolower($friend['company_name'])); ?> 
                                                                            </span>
                                                                        </a>
                                                                        <span style="color: #8c8c8c;">confirmed your contact request .</span>
                                                                    </sapn>
                                                                </div>

                                                                <div class="cq_desc_post">
                                                                    <sapn class="cq_rifght_desc">  <?php echo $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($friend['modify_date']))); ?> </sapn>
                                                                </div>  
                                                            </div>



                                                        </div>

                                                    </li>
        <?php }
    }
} else { ?>

<!--                                            <li>
                                                <div class="cq_main_lp2">
                                                    No Notifiaction  available...
                                                </div>
                                            </li>-->
<li><div class="art-img-nn" id= "art-blank">
                                    <div class="art_no_post_img">

                                        <img src="<?php echo base_url('img/No_Contact_Request.png') ?>" width="100">

                                    </div>
        <div class="art_no_post_text" style="font-size: 20px;">
                                        No Notifiaction Available.
                                    </div>
                                    </div></li>
<?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
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


//    function contactperson() {
//
//        $.ajax({
//            url: "<?php echo base_url(); ?>business_profile/contact_notification",
//            type: "POST",
//            success: function (data) {
//
//                $('#addcontactBody').html(data);
//
//            }
//        });
//
//    }

    function contactapprove1(toid, status) {

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
<script>
    // recruiter search header 2  start
// recruiter search header 2 location start
  var base_url = '<?php echo base_url(); ?>';
$(function () {  
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".bus_search_loc").bind("keydown", function (event) { 
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
            .autocomplete({
                minLength: 2,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "business_profile/get_location", {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {

                    var text = this.value;
                    var terms = split(this.value);

                    text = text == null || text == undefined ? "" : text;
                    var checked = (text.indexOf(ui.item.value + ', ') > -1 ? 'checked' : '');
                    if (checked == 'checked') {

                        terms.push(ui.item.value);
                        this.value = terms.split(", ");
                    }//if end

                    else {
                        if (terms.length <= 1) {
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join("");
                            return false;
                        } else {
                            var last = terms.pop();
                            $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                            $(this).effect("highlight", {}, 1000);
                            $(this).attr("style", "border: solid 1px red;");
                            return false;
                        }
                    }
                }//end else
            });
});

// recruiter searc location end
// recruiter searc title start
$(function () { 
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".bus_search_comp").bind("keydown", function (event) { 
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
            .autocomplete({
                minLength: 2,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "business_profile/get_all_data", {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {

                    var text = this.value;
                    var terms = split(this.value);

                    text = text == null || text == undefined ? "" : text;
                    var checked = (text.indexOf(ui.item.value + ', ') > -1 ? 'checked' : '');
                    if (checked == 'checked') {

                        terms.push(ui.item.value);
                        this.value = terms.split("");
                    }//if end

                    else {
                        if (terms.length <= 1) {
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join("");
                            return false;
                        } else {
                            var last = terms.pop();
                            $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                            $(this).effect("highlight", {}, 1000);
                            $(this).attr("style", "border: solid 1px red;");
                            return false;
                        }
                    }
                }//end else
            });
});

// recruiter searc title end
// recruiter search end
    </script>