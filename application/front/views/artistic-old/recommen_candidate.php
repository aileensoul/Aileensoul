<!-- start head -->

<?php echo $head; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->

<?php echo $art_header2; ?>


<!DOCTYPE html>
<html>
    <head>

        <style>



            div.panel {

                display: none;

            }
        </style>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
                        url: "<?php echo base_url('artistic/image_saveBG_ajax'); ?>",
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

        <div class="user-midd-section">
            <div class="container">
                <div class="row">


                    <div class="profile-box profile-box-left col-md-4"><div class="full-box-module">



                            <div class="profile-boxProfileCard  module">
                                <div class="profile-boxProfileCard-cover">
                                    <a class="profile-boxProfileCard-bg u-bgUserColor a-block" href="<?php echo site_url('artistic/artistic_profile'); ?>" tabindex="-1"
                                       aria-hidden="true" rel="noopener">
                                        <img src="<?php echo base_url(ARTBGIMAGE . $artisticdata[0]['profile_background_main']); ?>" class="bgImage" style="    height: 95px;
                                             width: 393px; " >

                                    </a></div>
                                <div class="profile-box-menu-2 fr col-md-12">
                                    <div class="left- col-md-2"></div>
                                    <div  class="right-section col-md-10">
                                        <ul class="">                           
                                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_savepost') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_savepost'); ?>"> Post</a>
                                            </li>



                                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers'); ?>">Followers <br>(<?php echo (count($followerdata)); ?>)</a>
                                            </li>

                                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following'); ?>">Following<br>(<?php echo (count($followingdata)); ?>)</a>
                                            </li>



                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-boxProfileCard-content">
                                    <div class="buisness-profile-txext ">
                                        <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo site_url('artistic/artistic_profile'); ?>" title="zalak" tabindex="-1" aria-hidden="true" rel="noopener">

                                            <!-- box image start -->
                                            <img src="<?php echo base_url(USERIMAGE . $artisticdata[0]['art_user_image']); ?>" class="bgImage"  style="" >
                                            <!-- box image end -->
                                        </a>
                                    </div>
                                    <div class="profile-box-user">
                                        <span class="profile-box-name ">
                                            <a href="<?php echo site_url('artistic/artistic_profile'); ?>"> <?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?></a>
                                        </span>
                                        <div class="profile-boxProfile-name">
                                            <a href="<?php echo site_url('artistic/artistic_profile'); ?>">
                                                <?php
                                                if ($artisticdata[0]['designation']) {
                                                    echo ucwords($artisticdata[0]['designation']);
                                                } else {
                                                    echo "Designation";
                                                }
                                                ?></a></div>

                                    </div>
                                    <div id="profile-box-profile-prompt"></div>

                                </div>
                            </div>

                        </div>

                        <!--  <div  class="add-post-button">
                           
                               <a class="btn btn-3 btn-3b" href="<?php echo site_url('artistic/art_addpost'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>Add Post</a>
                         </div> -->
                    </div>


                    <!-- cover pic end -->

                    <!-- popup start -->
                    <div class="col-md-7 col-sm-7 all-form-content">

                        <!--  <div class="post-editor col-md-12">
                                                       <div class="main-text-area col-md-12">
                                                       <div class="popup-img col-md-1"> <img  src="<?php echo base_url(USERIMAGE . $businessdata[0]['business_user_image']); ?>"  alt="">
                        </div>
                        <div id="myBtn"  class="editor-content col-md-11 popup-text" contenteditable>
                               <span> Post Your Product....</span> 
                          <span class="fr">
                                                         <input type="file" id="FileID" style="display:none;">
                                                           <label for="FileID"><i class=" fa fa-camera fa"  style=" margin: 8px; cursor:pointer">  </i></label>
                                                           </span>     
                             
                            </div>
                           </div>
                           <div class="fr">
                            <a href="" class="button">Post</a>    </div>
                             </div> -->
                    </div>
                    <!-- Trigger/Open The Modal -->
                    <!-- <div id="myBtn">Open Modal</div>
                    -->
                    <!-- The Modal -->
                    <div id="myModal" class="modal-post">

                        <!-- Modal content -->
                        <div class="modal-content-post">
                            <span class="close1">&times;</span>
                            <form>
                                <div class="post-editor col-md-12">
                                    <div class="main-text-area col-md-12">
                                        <div class="popup-img col-md-1"> <img  src="<?php echo base_url(USERIMAGE . $businessdata[0]['business_user_image']); ?>"  alt="">
                                        </div>
                                        <div id="myBtn"  class="editor-content col-md-10 popup-text" >
                                            <textarea placeholder="Post Your Product...."></textarea> 


                                        </div>
                                        <span class="fr">
                                            <input type="file" id="FileID" style="display:none;">
                                            <label for="FileID"><i class=" fa fa-camera fa"  style="    cursor: pointer;
                                                                   font-size: 30px;
                                                                   margin-top: 21px;
                                                                   margin-right: 10px">  </i></label>
                                        </span>
                                    </div>
                                    <div  id="text"  class="editor-content col-md-12 popup-textarea" >
                                        <textarea placeholder="Enter Description"> </textarea>
                                    </div>
                                    <div class="popup-social-icon">
                                        <ul class="editor-header">

                                            <li><input type="file" id="FileID" style="display:none;">
                                                <label for="FileID"><i class=" fa fa-camera "  style=" margin: 8px; cursor:pointer"> Photo/Video </i> </label>
                                            </li>
                                            <li><input type="file" id="FileID" style="display:none;">
                                                <label for="FileID"><i class="fa fa-music "  style=" margin: 8px; cursor:pointer"> Audio </i></label>
                                            </li>
                                            <li><input type="file" id="FileID" style="display:none;">
                                                <label for="FileID"><i class=" fa fa-file-pdf-o fa-2x"  style=" margin: 8px; cursor:pointer"> PDF </i></label>
                                            </li>

                                        </ul>


                                    </div>
                                    <div class="fr">
                                        <a href="" class="button">Post</a>    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <!-- popup end -->

                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Search Results</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">

                                        <!-- khyati start -->
                                        <!-- @nk!t 7-4-2017 start -->   
                                        <?php
                                        if ($artuserdata) {
                                            ?>
                                        <!-- @nk!t 7-4-2017 end -->   
                                            <?php
                                            foreach ($artuserdata as $row) {
                                                ?>

                                                <div class="profile-job-post-detail clearfix search">
                                                    <div class="profile-job-post-title-inside clearfix">
                                                        <div class="profile-job-profile-button clearfix">
                                                            <div class="profile-job-post-location-name-rec">
                                                                <ul>
                                                                    <ul>
                                                                        <li>

                                                                            <div  class="buisness-profile-pic-candidate"><img src="<?php echo base_url(USERIMAGE . $artisticdata[0]['art_user_image']); ?>" alt="" >
                                                                            </div>
                                                                        </li>

                                                                        <li class="">
                                                                            <a href="<?php echo base_url('artistic/artistic_profile'); ?>">
                                                                                <?php echo ucwords($row['art_name']) . ' ' . ucwords($row['art_lastname']); ?>
                                                                            </a></li>


                                                                    </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="profile-job-post-title clearfix">

                                                        <div class="profile-job-profile-menu">

                                                            <ul>
                                                                <li><b>Skills:</b>
                                                                    <?php
                                                                    $comma = ",";
                                                                    $k = 0;
                                                                    $aud = $row['art_skill'];
                                                                    $aud_res = explode(',', $aud);
                                                                    foreach ($aud_res as $skill) {
                                                                        if ($k != 0) {
                                                                            echo $comma;
                                                                        }
                                                                        $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;


                                                                        echo $cache_time;
                                                                        $k++;
                                                                    }
                                                                    ?>       

                                                                </li>


                                                                <li><b>Other Skill:</b>
                                                                    <?php echo $row['other_skill']; ?>
                                                                </li>

                                                                <?php $cityname = $this->db->get_where('cities', array('city_id' => $row['art_city']))->row()->city_name; ?>

                                                                <li><b>Location:</b> <?php echo $cityname; ?></li>
                                                                <li><b>Speciality :</b> <?php echo $row['art_yourart']; ?></li>
                                                                <li><b>Designation :</b> <?php echo $row['designation']; ?></li>

                                                                <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">
                                                            </ul>
                                                        </div>

                                                        <div class="profile-job-profile-button clearfix">
                                                            <div class="apply-btn">


                                                                <?php
                                                                $userid = $this->session->userdata('aileenuser');
                                                                $contition_array = array('from_id' => $userid, 'to_id' => $row['user_id']);
                                                                $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                                                                if ($data[0]['status'] != 0 || $data[0]['status'] == '') {
                                                                    ?> 
                                                                    <a href="<?php echo base_url('recruiter/save_search_user/' . $row['user_id'] . '/' . $data[0]['save_id']); ?>">Save User</a>
                                                                    <?php
                                                                } else {
                                                                    ?>

                                                                    <a href=" ">Saved User</a> 
                                                                <?php }
                                                                ?> 

                                                                <a href="<?php echo base_url('message/message_chats/' . $row['user_id']); ?>">Message</a>     


                                                            </div> </div>

                                                        <!--  <div class="profile-job-profile-button clearfix">
                                                               
                                                              </div> -->


                                                    </div>
                                                </div>

                                            <?php } ?> 
                                        <!-- @nk!t 7-4-2017 start -->   
                                                <?php
                                        } else {
                                            ?>
                                            <div class="text-center rio">
                                                <h1 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">Oops No Data Found.</h1>
                                                <p style="margin-left:4%;text-transform:none !important;border:0px;">We couldn't find what you were looking for.</p>
                                                <ul>
                                                    <li style="text-transform:none !important; list-style: none;">Make sure you used the right keywords.</li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                        <!-- @nk!t 7-4-2017 end -->   
                                        <!-- khyati end -->
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- script for skill textbox automatic end (option 2)-->

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
    $(function () {

        var complex = <?php echo json_encode($demo); ?>;

// alert(complex);
        var availableTags = complex;
        $("#tags").autocomplete({
            source: availableTags
        });
    });
</script>

<script>
//select2 autocomplete start for skill
    $('#searchskills').select2({

        placeholder: 'Find Your Skills',

        ajax: {

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
        ajax: {

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

<!-- popup form edit start -->

<script>
// Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
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
            type: 'POST',
            url: '<?php echo base_url() . "artistic/like_post" ?>',
            data: 'post_id=' + clicked_id,
            success: function (data) {
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
            type: 'POST',
            url: '<?php echo base_url() . "artistic/like_comment" ?>',
            data: 'post_id=' + clicked_id,
            success: function (data) {
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
            type: 'POST',
            url: '<?php echo base_url() . "artistic/delete_comment" ?>',
            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
            success: function (data) {


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
        var post_comment = document.getElementById("post_comment" + clicked_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/insert_comment" ?>',
            data: 'post_id=' + clicked_id + '&comment=' + post_comment.value,
            success: function (data) {
                $('input').each(function () {
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

    function comment_editbox(clicked_id) {
        document.getElementById('editcomment' + clicked_id).style.display = 'block';
        document.getElementById('showcomment' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit' + clicked_id).style.display = 'block';

    }

    function comment_editbox2(clicked_id) {
        document.getElementById('editcomment2' + clicked_id).style.display = 'block';
        document.getElementById('showcomment2' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit2' + clicked_id).style.display = 'block';

    }

</script>

<!--comment edit box end-->

<!-- comment edit insert start -->

<script type="text/javascript">
    function edit_comment(abc)
    {

        var post_comment_edit = document.getElementById("editcomment" + abc);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
            success: function (data) {


                document.getElementById('editcomment' + abc).style.display = 'none';
                document.getElementById('showcomment' + abc).style.display = 'block';
                document.getElementById('editsubmit' + abc).style.display = 'none';

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
            type: 'POST',
            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
            success: function (data) {

                document.getElementById('editcomment2' + abc).style.display = 'none';
                document.getElementById('showcomment2' + abc).style.display = 'block';
                document.getElementById('editsubmit2' + abc).style.display = 'none';

                $('#' + 'showcomment' + abc).html(data);



            }
        });

    }
</script>


<!--comment edit insert script end -->

<!-- hide and show data start-->
<script type="text/javascript">
    function commentall(clicked_id) {

        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);
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








<!-- popup box for post start -->

<script>
// Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!-- popup form end-->

<script>
    /* When the user clicks on the button, 
     toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown1").classList.toggle("show");
    }

// Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn1')) {

            var dropdowns = document.getElementsByClassName("dropdown-content1");
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