<!-- start head -->

<?php echo $head; ?>
<!-- END HEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">
<!--post save success pop up style strat -->
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
        background: rgba(0, 0, 0, 0.7);
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
        font-size: 26px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        padding: 12px 30px;
        background-color: darkcyan;
        margin-left: -45px;
        margin-top: 15px;
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

<!--post save success pop up style end -->


<!-- start header -->
<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<!-- END HEADER -->
<?php echo $recruiter_header2; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body>

        <div class="user-midd-section">
            <div class="container">
                <div class="row">


                    <div class="col-md-4"><div class="profile-box profile-box-left">
                            <div class="full-box-module">    

                                <div class="profile-boxProfileCard  module">
                                    <div class="profile-boxProfileCard-cover">  
                                        <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                           href="<?php echo base_url('recruiter/rec_profile'); ?>"
                                           tabindex="-1"
                                           aria-hidden="true"
                                           rel="noopener">
                                           
                                            <!-- rash code start 12-4 -->

                                       <?php
                                       if ($recdata[0]['profile_background'] != '') {
                                           ?>
                                        <!-- box image start -->
                                        <img src="<?php echo base_url(JOBBGIMAGE . $recdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo  $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?>"  style="height: 95px;
                                             width: 100%;">
                                        <!-- box image end -->
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo  $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?>"  style="height: 95px;
                                             width: 100%;">
                                             <?php
                                         }
                                         ?>
                                            <!-- rash code end 12-4 -->



                                        </a></div>
                                    <div class="profile-box-menu  fr col-md-12">
                                        <div class="left- col-md-2"></div>
                                        <div  class="right-section col-md-10">
                                            <ul class="">

                                                <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_profile'); ?>"> Profile</a>
                                                </li>                                
                                                <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                                                </li>


                                                <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-boxProfileCard-content">
                                        <div class="buisness-profile-txext ">
                                        <!-- <rash code 12-4 start> -->

                                            <a class="profile-boxProfileCard-avatarLink a-inlineBlock" href="<?php echo base_url('recruiter/rec_profile' . $recdata[0]['user_id']); ?>" title="<?php echo $recdata[0]['rec_firstname']. ' ' . $recdata[0]['rec_lastname']; ?>" tabindex="-1" aria-hidden="true" rel="noopener">
                                                

                                            <?php
                                            if ($recdata[0]['recruiter_user_image']) {
                                                ?>
                                                <img src="<?php echo base_url(USERIMAGE . $recdata[0]['recruiter_user_image']); ?>" alt="<?php echo $recdata[0]['rec_firstname']. ' ' . $recdata[0]['rec_lastname']; ?>">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $recdata[0]['rec_firstname']. ' ' . $recdata[0]['rec_lastname']; ?>">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <!-- <rash code 12-4 end> -->

                                            </div>   

                                        <div class="profile-box-user">
                                            <span class="profile-box-name ">
                                                <a href="<?php echo site_url('recruiter/rec_profile'); ?>">   <?php echo $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?></a>
                                            </span>
                                            <div class="profile-boxProfile-name">
                                                <a href="<?php echo site_url('recruiter/rec_profile/' . $recdata[0]['user_id']); ?>" ><?php
                                                    if (ucwords($recdata[0]['designation'])) {
                                                        echo ucwords($recdata[0]['designation']);
                                                    } else {
                                                        echo "Designation";
                                                    }
                                                    ?></a>
                                            </div>                
                                        </div>
                                        <div id="profile-box-profile-prompt"></div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div  class="add-post-button">

                            <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
                        </div>
                    </div>



                    <!--- search end -->

                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Search Results</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">

                                        

<!-- @nk!t 7-4-2017 start -->
                                        <?php
                                        if ($postdetail) {
                                            ?>
<!-- @nk!t 7-4-2017 end -->
<?php
                                            foreach ($postdetail as $p) {
                                                ?>

                                                <div class="profile-job-post-detail clearfix ">

                                                  <div id="popup1" class="overlay">
                                                            <div class="popup">

                                                                <div class="pop_content">
                                                                    Your User is Successfully Saved.
                                                                    <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <div class="profile-job-post-title-inside clearfix">
           <div class="profile-job-profile-button clearfix">
             <div class="profile-job-post-location-name-rec">


               <div style="display: inline-block; float: left;">
             
                <div  class="buisness-profile-pic-candidate ">
                <img src="<?php echo base_url(USERIMAGE . $p['job_user_image']); ?>" alt="" >
                      </div>
                  </div> 


            <div class="designation_rec" style="float: left;">
                <ul>
                         

                     <li>
                   <a style=" font-size: 19px;
         font-weight: 600;" href="<?php echo base_url('job/job_printpreview/' . $p['user_id']); ?>">
                   <?php echo ucwords($p['fname']) . ' ' . ucwords($p['lname']); ?>
                      <?php
                  if ($p['designation']) {
                          ?>
                      (<?php echo $p['designation']; ?>)
                                                     
                   <?php
                    } else {
                     ?>
                  ( <?php echo "Designation"; ?>)
                 <?php
                    }
                  ?>
                 </a></li>

            <li style="display: block;"><a href="#"> Designation  </a>  </li>
            
          </ul>
        </div>

      </div>
       </div>
       </div>

        <div class="profile-job-post-title clearfix search1">

                                                        <div class="profile-job-profile-menu  search ">

                 <ul>
                <li><b>E-mail</b><span>
                                                                    <?php
                                                                    echo $p['email'];
                                                                    ?></span>
                                                                </li>

                                                                <li><b>Mobile Number</b>
                                                                 <span>   <?php
                                                                    echo $p['phnno'];
                                                                    ?></span>
                                                                </li>

                                                                <?php
                                                                if ($p['keyskill']) {
                                                                    ?>
                                                                    <li><b>Skills</b>
                                                                      <span>  <?php
                                                                        $comma = ",";
                                                                        $k = 0;
                                                                        $aud = $p['keyskill'];
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
</span>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <?php
                                                                if ($p['other_skill']) {
                                                                    ?>
                                                                    
                                                                    <li><b>Other Skill</b>
                                                                       <span> <?php echo $p['other_skill']; ?></span>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>



                                                                <li> <b> Degree </b>
                                                                   <span> <?php
                                                                    $cache_time = $this->db->get_where('degree', array('degree_id' => $p['degree']))->row()->degree_name;
                                                                    echo $cache_time;
                                                                    ?> </span>

                                                                </li>

                                                                <li> <b>Stream </b>
                                                                    <span><?php
                                                                    $cache_time = $this->db->get_where('stream', array('stream_id' => $p['stream']))->row()->stream_name;
                                                                    echo $cache_time;
                                                                    ?>
</span>
                                                                </li>

                                                                <?php
                                                                $countryname = $this->db->get_where('countries', array('country_id' => $p['country_id']))->row()->country_name;
                                                                $cityname = $this->db->get_where('cities', array('city_id' => $p['city_id']))->row()->city_name;
                                                                ?>

                                                                <li><b>Location</b> 

       <span> <?php echo $countryname; ?> <?php echo $cityname; ?></span></li>





                                                                <li> <b> Total Experience </b>
                                                                <span><?php echo $p['experience_year']; ?>  <?php echo $p['experience_month']; ?> 
</span>
                                                                </li>





                                                                <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">

                                                                <input type="hidden" name="search" id="search1
                                                                       " value="<?php echo $keyword1; ?>">

                                                            </ul>
                                                        </div>

                                                        <div class="profile-job-profile-button clearfix">
             <div class="apply-btn fr">


                                                                <?php
                                                                $userid = $this->session->userdata('aileenuser');
                                                                $contition_array = array('from_id' => $userid, 'to_id' => $p['user_id']);
                                                                $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                                                               if(!$data) {
                ?>


                 <input type="hidden" name="saveuser"  id="saveuser" value= "<?php echo $data[0]['save_id']; ?>">
                                                                        <a id="<?php echo $p['user_id']; ?>" onClick="save_user(this.id)" href="#popup1" class="<?php echo 'saveduser' . $p['user_id']; ?>">Save User</a>
                                                                    <?php
                                                                } else {
                                                                    ?>

                                                                    <a href=" ">Saved User</a> 
                                                                <?php }
                                                                ?> 

                                                                <a href="<?php echo base_url('message/message_chats/' . $p['user_id']); ?>">Message</a>     


                                                            </div> </div>

                                                        <!--  <div class="profile-job-profile-button clearfix">
                                                               
                                                              </div> -->


                                                    </div>
                                                </div>



                                            <?php }
                                            ?>
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
<?php } ?>
                                        <!-- @nk!t 7-4-2017 start -->
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


</body>

</html>
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script>


<script>

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
$(function() {
    //alert('data');
$( "#tags" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
    }
});
});
  
</script>

<script type="text/javascript">
    function checkvalue() {
//alert("hi");
        var searchkeyword = document.getElementById('tags').value;
        var searchplace = document.getElementById('searchplace').value;
// alert(searchkeyword);
// alert(searchplace);
        if (searchkeyword == "" && searchplace == "") {
       //     alert('Please enter Keyword');
            return false;
        }
    }
</script>


  <script type="text/javascript">
                        function save_user(abc)
                        {

                            var saveid = document.getElementById("saveuser");
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() . "recruiter/save_search_user" ?>',
                                data: 'user_id=' + abc + 'save_id=' + saveid.value,
                                success: function (data) {

                                    $('.' + 'saveduser' + abc).html(data);


                                }
                            });

                        }
                    </script>


<script type="text/javascript">
    var text = document.getElementById("search").value;
//alert(text);

    $(".search").highlite({

        text: text



    });
</script>
<script type="text/javascript">

    var text = document.getElementById("search1").value;
    alert(text);

    $(".search1").highlite({

        text: text

    });

</script>


<!-- script for skill textbox automatic end (option 2)-->



<!-- script for skill textbox automatic end (option 2)-->


<script>
//select2 autocomplete start for skill
    $('#searchskills').select2({

        placeholder: 'Find Your Skills',

        ajax: {

            url: "<?php echo base_url(); ?>recruiter/keyskill",
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

            url: "<?php echo base_url(); ?>recruiter/location",
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

<!-- Cover Image upload Start--> 

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
                url: "<?php echo base_url('recruiter/image_saveBG_ajax'); ?>",
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
<!-- Cover Image upload Start--> 