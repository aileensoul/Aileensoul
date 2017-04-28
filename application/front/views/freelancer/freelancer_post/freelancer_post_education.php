<!-- HEAD start -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<?php echo $freelancer_post_header2; ?>
<body>

    <section>



        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Basic Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">ADD Your Avability</a></li>
                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active" <?php } ?>><a href="#"> Education</a></li>	

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '6') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_portfolio'); ?>">Portfolio</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">

                        <div>
                            <?php
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                            }
                            if ($this->session->flashdata('success')) {
                                echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                            }
                            ?>
                        </div>
                        <div class="common-form">
                            <h3>Education Info</h3>
                            <?php echo form_open(base_url('freelancer/freelancer_post_education_insert'), array('id' => 'freelancer_post_education', 'name' => 'freelancer_post_education', 'class' => 'clearfix')); ?>

                          <div>
                                    <span style="color:red"> (*)</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>


                            <?php
                            $degree = form_error('degree');
                            $stream = form_error('stream');
                            $univercity = form_error('univercity');
                            $collage = form_error('collage');
                            $percentage = form_error('percentage');
                            $passingyear = form_error('passingyear');
                            $address = form_error('address');
                            ?>


                            <fieldset <?php if ($degree) { ?> class="error-msg" <?php } ?>>
                                <label>Degree:<span style="color:red">*</span></label>
                                <select name="degree" id="degree">
                                    <option value="">Select your degree</option>

                                    <?php
                                    if (count($degree_data) > 0) {
                                        foreach ($degree_data as $cnt) {
                                            if ($degree1) {
                                                ?>
                                                <option value="<?php echo $cnt['degree_id']; ?>" <?php if ($cnt['degree_id'] == $degree1) echo 'selected'; ?>><?php echo $cnt['degree_name']; ?></option>

                                                <?php
                                            }
                                            else {
                                                ?>
                                                <option value="<?php echo $cnt['degree_id']; ?>"><?php echo $cnt['degree_name']; ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
<?php echo form_error('degree'); ?>

                            </fieldset>

                            <fieldset <?php if ($stream) { ?> class="error-msg" <?php } ?>>
                                <label>Stream:<span style="color:red">*</span></label>
                                <select name="stream" id="stream">
                                    <?php
                                    foreach ($stream_data as $cnt) {
                                        if ($stream1) {
                                            ?>
                                            <option value="<?php echo $cnt['stream_id']; ?>" <?php if ($cnt['stream_id'] == $stream1) echo 'selected'; ?>><?php echo $cnt['stream_name']; ?></option>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <option value="">Select Degree first</option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                    <?php echo form_error('stream'); ?>  
                            </fieldset>

                            <fieldset <?php if ($univercity) { ?> class="error-msg" <?php } ?>>
                                <label>University:<span style="color:red">*</span></label>
                                <select name="university" id="university" >
                                    <option value="" selected option disabled>Select your University</option>
<?php
if (count($university_data) > 0) {
    foreach ($university_data as $cnt) {

        if ($university1) {
            ?>
                                                <option value="<?php echo $cnt['university_id']; ?>" <?php if ($cnt['university_id'] == $university1) echo 'selected'; ?>><?php echo $cnt['university_name']; ?></option>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <option value="<?php echo $cnt['university_id']; ?>"><?php echo $cnt['university_name']; ?></option>

                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                    <?php echo form_error('university'); ?> 
                            </fieldset>

                            <fieldset <?php if ($college) { ?> class="error-msg" <?php } ?>>
                                <label>College:<span style="color:red">*</span></label>
                                <input type="text" name="college" id="college" placeholder="Enter college"  value="<?php if ($college1) {
                                        echo $college1;
                                    } ?>">
<?php echo form_error('college'); ?> 
                            </fieldset>

                            <fieldset <?php if ($percentage) { ?> class="error-msg" <?php } ?>>
                                <label>Percentage:<span style="color:red">*</span></label>
                                <input type="text" name="percentage" placeholder="Enter percentage" value="<?php if ($percentage1) {
    echo $percentage1;
} ?>">
                                <?php echo form_error('percentage'); ?>
                            </fieldset>

                            <fieldset <?php if ($passingyear) { ?> class="error-msg" <?php } ?>>
                                <label>Year of passing:<span style="color:red">*</span></label>
                                <select name="passingyear">
                                    <option value="" selected option disabled>Select your Passing year</option>
                                    <?php
                                    $curYear = date('Y');

                                    for ($i = $curYear; $i >= 1900; $i--) {
                                        if ($pass_year1) {
                                            ?>

                                            <option value="<?php echo $i ?>" <?php if ($i == $pass_year1) echo 'selected'; ?>><?php echo $i ?></option>


        <?php
    }
    else {
        ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                        }
                                    }
                                    ?> 

                                </select> 
                                    <?php echo form_error('passingyear'); ?>
                            </fieldset>




                            <fieldset class="hs-submit full-width">

<!--                                <input type="reset">
                                <a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">Previous</a>-->
                                <input type="submit"  id="next" name="next" value="Next">


                            </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php echo $footer; ?>


    <script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>


    <!-- script for degree,stream start -->

    <script type="text/javascript">

        $(document).ready(function () {
            $('#degree').on('change', function () {

                var degreeID = $(this).val();

                if (degreeID) {

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "freelancer/ajax_data"; ?>',
                        data: 'degree_id=' + degreeID,
                        success: function (html) {
                            $('#stream').html(html);

                        }
                    });
                } else {
                    $('#stream').html('<option value="">Select Degree first</option>');

                }
            });
        });



    </script>


    <script type="text/javascript">

        //validation for edit email formate form

        $(document).ready(function () {

            $("#freelancer_post_education").validate({

                rules: {

                    degree: {

                        required: true,

                    },

                    stream: {

                        required: true,

                    },
                    university: {

                        required: true,

                    },

                    college: {

                        required: true,

                    },
                    percentage: {

                        required: true,
                        number: true,

                    },

                    passingyear: {

                        required: true,

                    },

                },

                messages: {

                    degree: {

                        required: "Degree is required.",

                    },

                    stream: {

                        required: "Stream is required.",

                    },
                    university: {

                        required: "University is required.",

                    },

                    college: {

                        required: "College is required.",

                    },
                    percentage: {

                        required: "Percentage is required.",

                    },

                    passingyear: {

                        required: "Passing year is required.",

                    },

                },

            });
        });
    </script>


