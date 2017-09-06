<!--start head -->

<style type="text/css">
    #popup-form img{display: none;}
</style>

<?php echo $head; ?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">


<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<!-- END HEADER -->

<?php echo $business_header2_border ?>

<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">
            
            
        </div>
    

</div>
<div class="user-midd-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4  animated fadeInLeftBig">
                            <div class="">

                                <div class="full-box-module">   
                                    <div class="profile-boxProfileCard  module">
                                        <div class="profile-boxProfileCard-cover"> 
                                            <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                               href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>"
                                               tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo $businessdata[0]['company_name']; ?>">
                                                <!-- box image start -->
                                                <?php if ($businessdata[0]['profile_background'] != '') { ?>
                                                    <div>  <img src="<?php echo base_url($this->config->item('bus_bg_thumb_upload_path') . $businessdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo $businessdata[0]['company_name']; ?>" >
                                                    </div> <?php
                                                } else {
                                                    ?>
                                                    <div> 
                                                        <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo $businessdata[0]['company_name']; ?>" >
                                                    </div> <?php } ?>
                                            </a>
                                        </div>
                                        <div class="profile-boxProfileCard-content clearfix">
                                            <div class="left_side_box_img buisness-profile-txext">

                                                <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>" title="<?php echo $businessdata[0]['company_name']; ?>" tabindex="-1" aria-hidden="true" rel="noopener" >
                                                    <?php
                                                    if ($businessdata[0]['business_user_image']) {
                                                        ?>
                                                        <div class="left_iner_img_profile"> 
                                                            <?php
                                                            if (!file_exists($this->config->item('bus_profile_thumb_upload_path') . $businessdata[0]['business_user_image'])) {
                                                                $a = $businessdata[0]['company_name'];
                                                                $acr = substr($a, 0, 1);
                                                                ?>
                                                                <div class="post-img-profile">
                                                                    <?php echo ucfirst(strtolower($acr)) ?>
                                                                </div> 
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img  src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $businessdata[0]['business_user_image']); ?>"  alt="<?php echo $businessdata[0]['company_name']; ?>" >
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="left_iner_img_profile">
                                                            <!-- <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $businessdata[0]['company_name']; ?>"> -->
                                                            <?php
                                                            $a = $businessdata[0]['company_name'];
                                                            $acr = substr($a, 0, 1);
                                                            ?>
                                                            <div class="post-img-profile">
                                                                <?php echo ucfirst(strtolower($acr)) ?>
                                                            </div>

                                                        </div>  <?php } ?>                           

                                                </a>
                                            </div>
                                            <div class="right_left_box_design ">
                                                <span class="profile-company-name ">
                                                    <a  href="<?php echo base_url('business_profile/business_profile_manage_post/'); ?> " title="<?php echo ucfirst(strtolower($businessdata[0]['company_name'])); ?>"> 
                                                        <?php echo ucfirst(strtolower($businessdata[0]['company_name'])); ?>
                                                    </a> 
                                                </span>

                                                <?php $category = $this->db->get_where('industry_type', array('industry_id' => $businessdata[0]['industriyal'], 'status' => 1))->row()->industry_name; ?>
                                                <div class="profile-boxProfile-name">
                                                    <a  href="<?php echo base_url('business_profile/business_profile_manage_post/'); ?> " title="<?php echo ucfirst(strtolower($businessdata[0]['company_name'])); ?>" >
                                                        <?php
                                                        if ($category) {
                                                            echo $category;
                                                        } else {
                                                            echo $businessdata[0]['other_industrial'];
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                                <ul class=" left_box_menubar">
                                                    <li
                                                        <?php if ($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_manage_post') { ?> class="active" 
                                                        <?php } ?>>
                                                        <a  class="padding_less_left" title="Dashboard" href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>">Dashboard
                                                        </a>
                                                    </li>
                                                    <li 
                                                        <?php if ($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'followers') { ?> class="active" 
                                                        <?php } ?>>
                                                        <a title="Followers" href="<?php echo base_url('business_profile/followers'); ?>">Followers 
                                                            <br> (<?php echo ($flubuscount); ?>)
                                                        </a>
                                                    </li>
                                                    <li  
                                                        <?php if ($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'following') { ?> class="active" 
                                                        <?php } ?>>
                                                        <a  class="padding_less_right" title="Following" href="<?php echo base_url('business_profile/following/' . $businessdata[0]['business_slug']); ?>">Following 
                                                            <br> (<?php echo (count($businessfollowingdata)); ?>) 
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                             
                                </div>
                                
                            </div>


                            <br>

                            <div id="result"></div>   

                        </div>


            <div class="col-md-7 col-sm-7">
                <div class="common-form">
                    <div class="job-saved-box">

                        <h3>User list</h3>
                        <div class="contact-frnd-post">

                            <?php foreach ($userlist as $user) { ?>
                                <div class="job-contact-frnd ">

                                    <div class="profile-job-post-detail clearfix">
                                        <div class="profile-job-post-title-inside clearfix">
                                            <div class="profile-job-post-location-name">
                                                <div class="user_lst"><ul>

                                                        <li class="fl">
                                                            <div class="follow-img">
                                                                <?php if ($user['business_user_image'] != '') { ?>
                                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post/' . $user['business_slug']); ?>">
                                                                        <img src="<?php echo base_url($this->config->item('bus_profile_thumb_upload_path') . $user['business_user_image']); ?>" height="50px" width="50px" alt="" >
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo base_url('business_profile/business_profile_manage_post/' . $user['business_slug']); ?>">
                                                                        <?php 
                                          $a = $user['company_name'];
                                          $acr = substr($a, 0, 1);?>
                                            <div class="post-img-userlist">
                                            <?php echo   ucfirst(strtolower($acr))?>
                                            </div>
                                                                    </a>
                                                                <?php } ?> 
                                                            </div>
                                                        </li>
                                                        <li class="folle_text">
                                                            <div class="">
                                                                <div class="follow-li-text " style="padding: 0;">
                                                                    <a title="<?php echo $user['company_name']; ?>" href="<?php echo base_url('business_profile/business_profile_manage_post/' . $user['business_slug']); ?>"><?php echo $user['company_name']; ?></a>
                                                                </div>
                                                                <!-- category start -->
                                                                <div>

                                                                    <?php $category = $this->db->get_where('industry_type', array('industry_id' => $user['industriyal'], 'status' => 1))->row()->industry_name; ?>


                                                                    <a><?php
                                                                        if ($category) {
                                                                            echo $category;
                                                                        } else {
                                                                            echo $user['other_industrial'];
                                                                        }
                                                                        ?></a>

                                                                </div>

                                                                <!--  category end -->

                                                        </li>

                                                        <li class="<?php echo "fruser" . $user['business_profile_id']; ?> fr">

                                                            <?php
                                                            $status = $this->db->get_where('follow', array('follow_type' => 2, 'follow_from' => $artdata[0]['business_profile_id'], 'follow_to' => $user['business_profile_id']))->row()->follow_status;

                                                            if ($status == 0 || $status == " ") {
                                                                ?>

                                                                <div id= "followdiv " class="user_btn">

                                                                    <button id="<?php echo "follow" . $user['business_profile_id']; ?>" onClick="followuser(<?php echo $user['business_profile_id']; ?>)">
                                                                        Follow 
                                                                    </button></div>

    <?php } elseif ($status == 1) { ?>

                                                                <div id= "unfollowdiv"  class="user_btn" > 
                                                                    <button class="bg_following" id="<?php echo "unfollow" . $user['business_profile_id']; ?>" onClick="unfollowuser(<?php echo $user['business_profile_id']; ?>)">
                                                                        Following 
                                                                    </button></div>
    <?php } ?>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
<?php } ?>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </section>
            <footer>
<?php echo $footer; ?>
            </footer>      

            <!-- Bid-modal  -->
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
            <!-- Model Popup Close -->

            <!-- Bid-modal-2  -->
            <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                <div class="modal-dialog modal-lm">
                    <div class="modal-content">
                        <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                        <div class="modal-body">
                            <span class="mes">
                                <div id="popup-form">
<?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                    <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                    <input type="hidden" name="hitext" id="hitext" value="6">
                                    <div class="popup_previred">
                                        <img id="preview" src="#" alt="your image" /></div>
                                       <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                                    <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
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


            <!-- script for skill textbox automatic start (option 2)-->


            <!-- script for skill textbox automatic end (option 2)-->

            <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
            <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
            <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>


            <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
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
            <!-- script for business autofill -->
            <script>

                                                               // var data = <?php// echo json_encode($demo); ?>;


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

            <script>

               // var data1 = <?php //echo json_encode($city_data); ?>;
                //alert(data);


                $(function () {
                    // alert('hi');
                    $("#searchplace").autocomplete({
                        source: function (request, response) {
                            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                            response($.grep(data1, function (item) {
                                return matcher.test(item.label);
                            }));
                        },
                        minLength: 1,
                        select: function (event, ui) {
                            event.preventDefault();
                            $("#searchplace").val(ui.item.label);
                            $("#selected-tag").val(ui.item.label);
                            // window.location.href = ui.item.value;
                        }
                        ,
                        focus: function (event, ui) {
                            event.preventDefault();
                            $("#searchplace").val(ui.item.label);
                        }
                    });
                });

            </script>

            <script>
   jQuery.noConflict();
   
   (function ($) {
   
      // var data = <?php// echo json_encode($demo); ?>;
       //alert(data);
   
   
       $(function () {
           // alert('hi');
           $("#tags1").autocomplete({
               source: function (request, response) {
                   var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                   response($.grep(data, function (item) {
                       return matcher.test(item.label);
                   }));
               },
               minLength: 1,
               select: function (event, ui) {
                   event.preventDefault();
                   $("#tag1").val(ui.item.label);
                   $("#selected-tag").val(ui.item.label);
                   // window.location.href = ui.item.value;
               }
               ,
               focus: function (event, ui) {
                   event.preventDefault();
                   $("#tags1").val(ui.item.label);
               }
           });
       });
   
   })(jQuery);
   
</script>
<script>
   jQuery.noConflict();
   
   (function ($) {
   
       var data1 = <?php echo json_encode($de); ?>;
       //alert(data);
   
   
       $(function () {
           // alert('hi');
           $("#searchplace1").autocomplete({
               source: function (request, response) {
                   var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                   response($.grep(data1, function (item) {
                       return matcher.test(item.label);
                   }));
               },
               minLength: 1,
               select: function (event, ui) {
                   event.preventDefault();
                   $("#searchplace1").val(ui.item.label);
                   $("#selected-tag").val(ui.item.label);
                   // window.location.href = ui.item.value;
               }
               ,
               focus: function (event, ui) {
                   event.preventDefault();
                   $("#searchplace1").val(ui.item.label);
               }
           });
       });
   
   })(jQuery);
   
</script>

<script type="text/javascript">
                        function check() {
                            var keyword = $.trim(document.getElementById('tags1').value);
                            var place = $.trim(document.getElementById('searchplace1').value);
                            if (keyword == "" && place == "") {
                                return false;
                            }
                        }
                    </script>
            <script type="text/javascript">
                function checkvalue() {
                    //alert("hi");
                    var searchkeyword = $.trim(document.getElementById('tags').value);
                    var searchplace = $.trim(document.getElementById('searchplace').value);
                    // alert(searchkeyword);
                    // alert(searchplace);
                    if (searchkeyword == "" && searchplace == "") {
                        //alert('Please enter Keyword');
                        return false;
                    }
                }
            </script>

            <!-- end of business search auto fill -->

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
                            url: "<?php echo base_url() ?>business_profile/ajaxpro",
                            type: "POST",
                            data: {"image": resp},
                            success: function (data) {
                                html = '<img src="' + resp + '" />';
                                if (html)
                                {
                                    window.location.reload();
                                }
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


                    // pallavi code start for file type support
                    if (!files[0].name.match(/.(jpg|jpeg|png|gif)$/i)) {
                        //alert('not an image');
                        picpopup();

                        document.getElementById('row1').style.display = "none";
                        document.getElementById('row2').style.display = "block";
                        $("#upload").val('');
                        return false;
                    }
                    // file type code end

                    if (size > 4194304)
                    {
                        //show an alert to the user
                        alert("Allowed file size exceeded. (Max. 4 MB)")

                        document.getElementById('row1').style.display = "none";
                        document.getElementById('row2').style.display = "block";


                        //reset file upload control
                        return false;
                    }

                    $.ajax({

                        url: "<?php echo base_url(); ?>business_profile/imagedata",
                        type: "POST",
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (response) {


                        }
                    });
                });

                //aarati code end
            </script>
            <!-- cover image end -->

            <!-- follow user script start -->

            <script type="text/javascript">
                function followuser(clicked_id)
                {

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "business_profile/follow" ?>',
                        dataType: 'json',

                        data: 'follow_to=' + clicked_id,
                        success: function (data) {

                            $('.' + 'fruser' + clicked_id).html(data.follow);
                            $('#countfollow').html(data.count);

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
                        url: '<?php echo base_url() . "business_profile/unfollow" ?>',
                        dataType: 'json',

                        data: 'follow_to=' + clicked_id,
                        success: function (data) {

                            $('.' + 'fruser' + clicked_id).html(data.follow);
                            $('#countfollow').html(data.count);

                        }
                    });
                }
            </script>

            <!--follow like script end -->

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

                $("#profilepic").change(function () {
                    profile = this.files;
                    //alert(profile);
                    if (!profile[0].name.match(/.(jpg|jpeg|png|gif)$/i)) {
                        //alert('not an image');
                        $('#profilepic').val('');
                        picpopup();
                        return false;
                    } else {
                        readURL(this);
                    }
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
            <script>
                function picpopup() {


                    $('.biderror .mes').html("<div class='pop_content'>This is not valid file. Please Uplode valid Image File.");
                    $('#bidmodal').modal('show');
                }
            </script>

            <script type="text/javascript">



                $(document).on('keydown', function (e) {
                    if (e.keyCode === 27) {
                        //$( "#bidmodal" ).hide();
                        $('#bidmodal-2').modal('hide');
                    }
                });

            </script>  


            <!-- scroll page script start -->
            <script type="text/javascript">
                //For Scroll page at perticular position js Start
                $(document).ready(function () {

                    //  $(document).load().scrollTop(1000);

                    $('html,body').animate({scrollTop: 330}, 500);

                });
                //For Scroll page at perticular position js End
            </script>

            <!-- scroll page script end -->
