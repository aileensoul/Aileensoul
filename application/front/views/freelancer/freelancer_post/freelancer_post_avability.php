<!-- Head start -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<?php echo $freelancer_post_header2; ?>
<!-- End header -->

<body>
    <header>

    </header>
    <section>


        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Basic Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>

                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active" <?php } ?>><a href="#">ADD Your Avability</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '5') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>		    
                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '5') {
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
                            <h3>ADD Your Avability</h3>
                            <?php echo form_open(base_url('freelancer/freelancer_post_avability_insert'), array('id' => 'freelancer_post_avability', 'name' => 'freelancer_post_avability', 'class' => 'clearfix')); ?>



<?php
$job_type = form_error('job_type');
$work_hour = form_error('work_hour');
?>

                            <fieldset class="col-md-4" <?php if ($inweek) { ?> class="error-msg" <?php } ?>>
                            <label> Working As</label>
                                <input type="radio" name="job_type" id="job_type" value="Full Time" <?php if ($job_type1 == 'Full Time') {
                                    echo 'checked';
                                } ?>>Full Time
                                <input type="radio" name="job_type" id="job_type" value="Part Time" <?php if ($job_type1 == 'Part Time') {
                                    echo 'checked';
                                } ?>>Part Time
<?php echo form_error('job_type'); ?>
                            </fieldset>


                            <fieldset class=""<?php if ($work_hour) { ?> class="error-msg" <?php } ?>>
                                <label>Working hours per week:</label>
                                <input type="text" name="work_hour" placeholder="Enter working hour" value="<?php if ($work_hour1) {
    echo $work_hour1;
} ?>">
<?php echo form_error('work_hour'); ?>
                            </fieldset>


                            <fieldset class="hs-submit full-width">


<!--                                <input type="reset">
                                <a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Previous</a>-->

                                <input type="submit"  id="next" name="next" value="Next">


                            </fieldset>

                            </form>
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

<script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

<script type="text/javascript">

    //validation for edit email formate form

    $(document).ready(function () {

        $("#freelancer_post_avability").validate({

            rules: {

                inweek: {

                    number: true,

                },

                inday: {

                    number: true,

                },

            },

            messages: {

            },

        });
    });
</script>
