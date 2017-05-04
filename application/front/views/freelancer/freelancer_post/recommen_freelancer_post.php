<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<style>
body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}



.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.3);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
  z-index: 10;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    height: 200px;
    position: relative;
    transition: all 5s ease-in-out;
}

.okk{
  text-align: center;
}

.popup .okbtn {
  position: absolute;
    transition: all 200ms;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    padding: 8px 18px;
    background-color: darkcyan;
    left: 25px;
    margin-top: 15px;
    width: 100px; 
    border-radius: 8px;
}

.popup .cnclbtn {
  position: absolute;
    transition: all 200ms;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    padding: 8px 18px;
    background-color: darkcyan;
    right: 25px;
    margin-top: 15px;
    width: 100px;
    border-radius: 8px;
}

.popup .pop_content {
 text-align: center;
 margin-top: 40px;
  
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">
<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->
<?php echo $freelancer_post_header2; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

        <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


        <script>
            $(document).ready(function ()
            {


                /* Uploading Profile BackGround Image */
                $('body').on('change', '#bgphotoimg', function ()
                {

                    $("#bgimageform").ajaxForm({target: '#timelineBackground',
                        beforeSubmit: function () {},
                        success: function () {

                            $("#timelineShade").hide();
                            $("#bgimageform").hide();
                        },
                        error: function () {

                        }}).submit();
                });


                /* Banner position drag */
                $("body").on('mouseover', '.headerimage', function ()
                {
                    var y1 = $('#timelineBackground').height();
                    var y2 = $('.headerimage').height();
                    $(this).draggable({
                        scroll: false,
                        axis: "y",
                        drag: function (event, ui) {
                            if (ui.position.top >= 0)
                            {
                                ui.position.top = 0;
                            } else if (ui.position.top <= y1 - y2)
                            {
                                ui.position.top = y1 - y2;
                            }
                        },
                        stop: function (event, ui)
                        {
                        }
                    });
                });


                /* Bannert Position Save*/
                $("body").on('click', '.bgSave', function ()
                {
                    var id = $(this).attr("id");
                    var p = $("#timelineBGload").attr("style");
                    var Y = p.split("top:");
                    var Z = Y[1].split(";");
                    var dataString = 'position=' + Z[0];
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('freelancer/image_saveBG_ajax_hire'); ?>",
                        data: dataString,
                        cache: false,
                        beforeSend: function () { },
                        success: function (html)
                        {
                            if (html)
                            {
                                window.location.reload();
                                $(".bgImage").fadeOut('slow');
                                $(".bgSave").fadeOut('slow');
                                $("#timelineShade").fadeIn("slow");
                                $("#timelineBGload").removeClass("headerimage");
                                $("#timelineBGload").css({'margin-top': html});
                                return false;
                            }
                        }
                    });
                    return false;
                });



            });
        </script>
    </head>
    <body>

        <!-- cover pic start -->
        <div class="user-midd-section">
            <div class="container">
                <div class="row">


                    <div class="col-md-4"><div class="profile-box profile-box-left">

                            <div class="full-box-module">    


                                <div class="profile-boxProfileCard  module">

                                    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                       href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"
                                       tabindex="-1"
                                       aria-hidden="true"
                                       rel="noopener">

                                        <!-- box image start -->
                                        <img src="<?php echo base_url(FREEWORKIMG . $freepostdata[0]['profile_background']); ?>" class="bgImage"  style="    height: 95px;
                                             width: 100%; " >
                                        <!-- box image end -->


                                    </a>


                                    <div class="profile-box-menu  fr col-md-12">
                                        <div class="left- col-md-2"></div>
                                        <div  class="right-section col-md-10">
                                            <ul>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">Profile</a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved </a>
                                                </li>

                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied</a>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>

                                    <div class="profile-boxProfileCard-content">
                                        <div class="buisness-profile-txext ">

                                            <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>" title="zalak" tabindex="-1" aria-hidden="true" rel="noopener">
                                                <img src="<?php echo base_url(USERIMAGE . $freepostdata[0]['freelancer_post_user_image']); ?>"   alt=""  style="   height: 80px;
                                                     width: 77px;     z-index: 3;
                                                     position: relative;" >
                                            </a>
                                        </div>

                                        <div class="profile-box-user">
                                            <span class="profile-box-name ">
                                                <a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php echo ucwords($userdata[0]['first_name']) . ' ' . ucwords($userdata[0]['last_name']); ?></a></span>
                                        </div>
                                        <div class="profile-box-user">
                                            <span class="profile-box-name"><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php
                                                    if ($freepostdata[0]['designation']) {
                                                        echo ucwords($freepostdata[0]['designation']);
                                                    } else {
                                                        echo "Current Work";
                                                    }
                                                    ?></a></span>
                                        </div>

                                        <div id="profile-box-profile-prompt"></div>

                                    </div>
                                </div></div>

                        </div>

                    </div>
                    <!-- cover pic end -->




                    <!-- pop up box start-->
                    <div id="popup1" class="overlay">
                        <div class="popup">

                            <div class="pop_content">
                                Your Post is Successfully Saved.
                                <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                            </div>

                        </div>
                    </div>
                    <!-- pop up box end-->

                    <!-- pop up box start-->
                    <div id="popup2" class="overlay">
                        <div class="popup">

                            <div class="pop_content">
                                Successfully Apply this post..
                                <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                            </div>

                        </div>
                    </div>
                    <!-- pop up box end-->

                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Search Result</h3>


                                <div class="contact-frnd-post">

                                <?php

function text2link($text) {
    $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
    return $text;
}
?>
                                    <div >
                                        <!-- start -->
                                        <!-- @nk!t 7-4-2017 start -->
                                        <?php
                                        if ($freelancerhiredata) {
                                            ?>
                                            <!-- @nk!t 7-4-2017 end -->
                                            <?php
                                            // foreach($postdetail as $post_key => $post_value){ 
                                            foreach ($freelancerhiredata as $post) {
                                                $userid = $this->session->userdata('aileenuser');



                                                $contition_array = array('user_id' => $userid, 'post_id' => $post['post_id'], 'job_delete' => 0);
                                                $jobdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                                                if ($jobdata[0]['job_save'] != 2) {
                                                    ?>
                                                    <div class="job-post-detail clearfix search">
                                                        <div id="<?php echo "popup11" . $post['post_id']; ?>" class="overlay">
                                                            <div class="popup">

                                                                <div class="pop_content">
                                                                    Are You Sure want to apply this post?.

                                                                    <p class="okk"><a class="okbtn" id="<?php echo $post['post_id']; ?>" onClick="apply_post(this.id)" href="#">Apply</a></p>

                                                                    <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>

                                                                </div>

                                                            </div>
                                                        </div>
                                    
                                                <div class="profile-job-profile-button clearfix">
                     <div class="profile-job-details col-md-12">
                          <ul>
                           <li class="fr">
                              Created Date : <?php
                            echo trim(date('d-M-Y', strtotime($post['created_date'])));
                                   ?>
                            </li>
                             <li>
                              <a href="#" title="Post Title" class="display_inline" style="font-size: 19px;font-weight: 600;cursor: default;">
                              <?php echo ucwords(text2link($post['post_name'])); ?> </a>   </li>

                             <li>   
                               <div class="fr lction">
                              <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name; ?>
                              <?php $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>

                                <p><i class="fa fa-map-marker" aria-hidden="true">  <?php echo $cityname.","; ?><?php echo $countryname; ?></i></p>
                                 </div>

                             <?php
                $firstname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->fullname;
                $lastname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->username;
                    ?>

                            <li><a class="display_inline" title="<?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>" href="<?php echo base_url('freelancer/freelancer_hire_profile/' . $post['user_id']); ?>"><?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>
                            </a></li>
                    <!-- vishang 14-4 end -->    
                </ul>
             </div>
          </div>
                                                </div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>
                                        <?php 
                                        ?>  
                                    <?php } ?>
                                    <!-- @nk!t 7-4-2017 start -->
                                <?php } else {
                                    ?>
                                    <div class="text-center rio">
                                        <h1 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">Oops No Data Found.</h1>
                                        <p style="margin-left:4%;text-transform:none !important;border:0px;">We couldn't find what you were looking for.</p>
                                        <ul>
                                            <li style="text-transform:none !important; list-style: none;">Make sure you used the right keywords.</li>
                                        </ul>
                                    </div>
                                    <?php }
                                ?> 
                                <!-- @nk!t 7-4-2017 end -->
                            </div>


                        </div>
                    </div>
                </div>
                </section>

                <footer>
                    <?php echo $footer; ?>
                </footer>

                </body>

                </html>

                <!-- script for skill textbox automatic start (option 2)-->

                <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
                <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
                <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
                <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

                <script>

                         var data = <?php echo json_encode($demo); ?>;
               //alert(data);


                         $(function () {
                             // alert('hi');
                             $("#tags").autocomplete({
                                 source: function (request, response) {
                                     var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                     response($.grep(data, function (item) {
                                         return matcher.test(item.label);
                                     }));
                                 },
                                 minLength: 1,
                                 select: function (event, ui) {
                                     event.preventDefault();
                                     $("#tags").val(ui.item.label);
                                     $("#selected-tag").val(ui.item.label);
                                     // window.location.href = ui.item.value;
                                 }
                                 ,
                                 focus: function (event, ui) {
                                     event.preventDefault();
                                     $("#tags").val(ui.item.label);
                                 }
                             });
                         });

                </script>


                <script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script>

                <!-- script for skill textbox automatic end -->

                <script type="text/javascript">
          var text = document.getElementById("search").value;
          //alert(text);

          $(".search").highlite({

              text: text

          });

                </script>


                <script>
                    //select2 autocomplete start for skill
                    $('#searchskills').select2({

                        placeholder: 'Find Your Skills',

                        ajax: {

                            url: "<?php echo base_url(); ?>freelancer/keyskill",
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
                    //select2 autocomplete End for skill

                    //select2 autocomplete start for Location
                    $('#searchplace').select2({

                        placeholder: 'Find Your Location',
                        maximumSelectionLength: 1,

                        ajax: {

                            url: "<?php echo base_url(); ?>freelancer/location",
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
                    //select2 autocomplete End for Location

                </script>

                <script>
                    /* When the user clicks on the button, 
                     toggle between hiding and showing the dropdown content */
                    function myFunction() {
                        document.getElementById("myDropdown_h").classList.toggle("show");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function (event) {
                        if (!event.target.matches('.dropbtn_h')) {

                            var dropdowns = document.getElementsByClassName("dropdown-content_h");
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
                <!-- for search validation -->
                <script type="text/javascript">
                    function checkvalue() {
                        // alert("hi");
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
                <!-- save post start -->
                
                 <!-- apply post start -->

                <script type="text/javascript">
                    function apply_post(abc)
                    {

                        var alldata = document.getElementById("allpost" + abc);

                        var user = document.getElementById("userid" + abc);

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "freelancer/apply_insert" ?>',
                            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
                            success: function (data) {

                                $('.' + 'applypost' + abc).html(data);


                            }
                        });

                    }
                </script>

                 <!-- apply post end -->

                 <!-- save post start -->
                
                <script type="text/javascript">
                   function save_post(abc)
                   {  
                
                      $.ajax({ 
                                type:'POST',
                                url:'<?php echo base_url() . "freelancer/save_insert" ?>',
                                data:'post_id='+abc,
                                success:function(data){ 
                                
                                 $('.' + 'savedpost' + abc).html(data);
                                 
                                }
                            }); 
                        
                }
                </script>
                
                <!-- save post end