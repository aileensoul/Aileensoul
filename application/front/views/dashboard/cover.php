<!-- start head --> 
<?php echo $head; ?>

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
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 55%;

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


<style type="text/css" media="screen">
    #row2 { overflow: hidden; width: 100%; }
    #row2 img { height: 350px;width: 100%; } 
    .upload-img { float: right;
                  position: relative; margin-top: -135px; right: 50px; }

    label.cameraButton {
        display: inline-block;
        margin: 1em 0;

        /* Styles to make it look like a button */
        padding: 0.5em;
        border: 2px solid #666;
        border-color: #EEE #CCC #CCC #EEE;
        background-color: #DDD;
        opacity: 0.7;
    }

    /* Look like a clicked/depressed button */
    label.cameraButton:active {
        border-color: #CCC #EEE #EEE #CCC;
    }

    /* This is the part that actually hides the 'Choose file' text box for camera inputs */
    label.cameraButton input[accept*="camera"] {
        display: none;
    }
</style>
<!-- END HEAD -->
<!-- start header -->

<?php echo $header; ?>


<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<!--END HEADER -->


<body   class="page-container-bg-solid page-boxed">

    <section>
        <!-- coer image start-->
        <div class="container">

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success  cancel-result" onclick="myFunction()">Cancel</button>

                    <button class="btn btn-success upload-result fr" onclick="myFunction()">Upload Image</button>

                    <div id="message1" style="display:none;">
                        <div class="loader"><div id="floatBarsG">
                                <div id="floatBarsG_1" class="floatBarsG"></div>
                                <div id="floatBarsG_2" class="floatBarsG"></div>
                                <div id="floatBarsG_3" class="floatBarsG"></div>
                                <div id="floatBarsG_4" class="floatBarsG"></div>
                                <div id="floatBarsG_5" class="floatBarsG"></div>
                                <div id="floatBarsG_6" class="floatBarsG"></div>
                                <div id="floatBarsG_7" class="floatBarsG"></div>
                                <div id="floatBarsG_8" class="floatBarsG"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"  style="visibility: hidden; ">
                    <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:1px;margin-top:30px"></div>
                </div>
            </div>




            <div class="container">
                <div class="row" id="row2">
                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
                    $image = $this->common->select_data_by_condition('user', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    //echo "<pre>";print_r($image);
                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(USERBGIMAGE . $userdata[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
                        <?php
                    } else {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo WHITEIMAGE; ?>" name="image_src" id="image_src" / ></div>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
       

<div class="container">    
    <div class="upload-img">


        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
    </div>
</div>
       
        <!-- coer image end-->

<div class="profile-photo">
    <div class="profile-main-pho">
        <div class="user-pic-picture">
            <div class="user-pic">
                <?php
                $image_ori = $userdata[0]['user_image'];
                if ($image_ori) {
                    ?>
                    <img src="<?php echo base_url(USERIMAGE . $userdata[0]['user_image']); ?>" alt="" >

<?php } else { ?>

                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="" > 
<?php } ?>
            <!--<a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>-->

                <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>


            </div>
        </div>
        <!--        <div id="popup-form">
<?php // echo form_open_multipart(base_url('dashboard/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix'));  ?>
        
                    <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic" required>
        
                    <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
<?php // form_close()  ?>   </div>
            </div>-->
    </div>
    <div class="main-font-name">
        <h5 align="center"> <?php echo ucwords($userdata[0]['first_name']) . ' ' . ucwords($userdata[0]['last_name']); ?></h5>
        <div>
            <p align="center"><?php echo ucwords($userdata[0]['user_name']) ?></p>  
        </div>   

        <div class="profile-text1" >
            <?php
            $userid = $this->session->userdata('aileenuser');
            $this->db->select('*');
            $this->db->where('created_date BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
            $this->db->where('user_id', $userid);
            $result = $this->db->get('user')->result_array();


            if ($userdata[0]['user_verify'] == 0 && count($result) > 0) {
                ?>

                <div class="alert alert-danger">


                    <!-- pop up box start-->
                    <div id="popup1" class="overlay">
                        <div class="popup">

                            <div class="pop_content">
                                Email send Successfully.
                                <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                            </div>

                        </div>
                    </div>
                    <!-- pop up box end-->


                    <a onClick="sendmail(this.id)" id="<?php echo $userdata[0]['user_email']; ?>" href="#popup1">
                        Verify Your E-mail Account
                    </a>

                </div>

            <?php }
            ?>

        </div> 
    </div>


    <div class="user-midd-section">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-12 col-sm-12">
                    <div class="mid-bar">
                        <div class="first-mid-bar">
                            <ul class="clearfix">
                                <li><a href="<?php echo base_url('job'); ?>">Job Profile</a></li>
                                <li><a href="<?php echo base_url('recruiter'); ?>">Recruiter Profile</a></li>
                                <li><a href="<?php echo base_url('freelancer'); ?>">Freelancer Profile</a></li>

                            </ul>
                        </div>
                        <div  class="second-mid-bar">
                            <ul class="clearfix">

                                <li><a href="<?php echo base_url('business_profile'); ?>">Business Profile</a></li>
                                <li><a href="<?php echo base_url('artistic'); ?>">Artistic Profile</a></li>

                            </ul>

                        </div>
                    </div>
                </div>
                <!-- 	<div class="col-md-2">
                        </div> -->

            </div>
        </div>
    </div>
</section>


<!-- Model Popup Open -->
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
                        <!--<input type="hidden" name="hitext" id="hitext" value="3">-->
                        <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
<?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Bid-modal-2  -->
<!-- Model Popup Close -->

<!-- end search validation -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
                    function updateprofilepopup(id) {
                        $('#bidmodal-2').modal('show');
                    }
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


<!-- cover image start -->
<script>
    function myFunction() {
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";

        // setTimeout(function () { location.reload(1); }, 9000);

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
                //url: "https://www.aileensoul.com/dashboard/ajaxpro",
                url: "<?php echo base_url() ?>dashboard/ajaxpro",
                type: "POST",
                data: {"image": resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    if (html) {
                        window.location.reload();
                    }
                    //  $("#kkk").html(html);
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
        //alert(reader);
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

        //alert(size);

        if (size > 4194304)
        {
            //show an alert to the user
            alert("Allowed file size exceeded. (Max. 4 MB)")

            document.getElementById('row1').style.display = "none";
            document.getElementById('row2').style.display = "block";

            // window.location.href = "https://www.aileensoul.com/dashboard"
            //reset file upload control
            return false;
        }

        $.ajax({

            url: "<?php echo base_url(); ?>dashboard/image",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                //alert(response);

            }
        });
    });

//aarati code end
</script>
<!-- cover image end -->



<script>
    function sendmail(abc) {

//alert(abc);

        $.ajax({

            url: "<?php echo base_url(); ?>registration/res_mail",
            type: "POST",
            data: 'user_email=' + abc,
            success: function (response) {
                window.open(response);
            }
        });
    }
</script>



</body>
</html>