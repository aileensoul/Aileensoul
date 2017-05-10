<!-- start head -->
<?php echo $head; ?> 
<!-- END HEAD -->
<style type="text/css">
    h1 {

        font-family: arial, sans-serif;
        margin: 1em auto;
        width: 80%;
    }
.none_aaaart{border: 1px solid #ccc;}
    .tabordion {
}
z-index: 1;
        display: block;
        font-family: arial, sans-serif;
        margin: auto;
        position: relative;
        width: 80%;
    }

    .tabordion input[name="sections"] {
        left: -9999px;
        position: absolute;
        top: -9999px;
    }

    .tabordion section {
        height: 43px;
        display: block;
    }

    .tabordion section .label-d {
          background: #728bc0;
    color: #fff;
    border: 1px solid #fff;
    cursor: pointer;
    display: block;
    font-size: 16px;
    font-weight: bold;
    padding: 9px 6px;
    position: relative;
    width: 195px;
    z-index: 1;
    }

    .tabordion section article {
        display: none;
        left: 230px;
        min-width: 300px;
        padding: 0 0 0 0px;
        position: absolute;  
        top: 0;
    }
    /*
    .tabordion section article:after {
     
      bottom: 0;
      content: "";
      display: block;
      left:-229px;
      position: absolute;
      top: 0;
      width: 220px;
      z-index:1;
    }
    */
    .a_education{margin-right: 20px;
                 margin-top: 10px;text-decoration: underline; font-size: 18px;}
    .a_education:hover{ text-decoration: underline; }
    .job-saved-box_2{height: 100%;    border: 2px solid #efefef;
                     border-top: 0;}
    .tabordion input[name="sections"]:checked + .label-d { 
        background: #3b5283;
        color: #fff;
    }
    .tabordion input[name="sections"]:checked + label:after { content:"\f00c"; font-family: 'FontAwesome'; position:absolute; top:11px; right:8px; color:#fff; }

    .tabordion input[name="sections"]:checked ~ article {
        display: block;
    }


    @media (max-width: 533px) {

        h1 {
            width: 100%;
        }

        .tabordion {
            width: 100%;
        }

        .tabordion section label {
            font-size: 1em;
            width: 160px;
        }  

        .tabordion section article {
            left: 200px;
            min-width: 270px;
        } 

        .tabordion section article:after {
            background-color: #ccc;
            bottom: 0;
            content: "";
            display: block;
            left:-199px;
            position: absolute;
            top: 0;
            width: 200px;

        }  

    }


    @media (max-width: 768px) {
        h1 {
            width: 96%;
        }

        .tabordion {
            width: 96%;
        }
    }


    @media (min-width: 1366px) {
        h1 {
            width: 70%;
        }

        .tabordion {
            width: 100%;
        }
    }


</style>

<!-- start header -->
<?php echo $header; ?> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<?php echo $job_header2; ?>
<!-- END HEADER -->

<body class="page-container-bg-solid page-boxed">

    <section style="overflow:auto;">

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="job-profile-left-side-bar">
                            <div class="left-side-bar">
                                <ul>
                                    <li><a href="<?php echo base_url('job/job_basicinfo_update'); ?>">Basic Information</a></li>

                                    <li><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                    <li <?php if ($this->uri->segment(1) == 'job') { ?> class="active" <?php } ?>><a href="#">Educational Qualification</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_project_update'); ?>">Project And Training / Internship</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_skill_update'); ?>">Professional Skills</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_work_exp_update'); ?>">Work Experience</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_curricular_update'); ?>">Extra Curricular Activities</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_reference_update'); ?>">Interest & Reference</a></li>

                                    <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        echo "khyati";
                                    }
                                    ?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Carrier Objectives</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="common-form">
                            <div class="job-saved-boxe_2" >
                                <h3>Educational  Qualification</h3>
                                <div class="contact-frnd-post1" style="padding: 10px; height: 100%;">
                                    <?php
                                    if ($this->session->flashdata('error')) {
                                        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                    }
                                    if ($this->session->flashdata('success')) {
                                        echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                    }
                                    ?>
                                    <div class="tabordion">

                                        <section id="section1">
                                            <input type="radio" name="sections" id="option1" checked>
                                            <label for="option1" class="label-d">Primary</label>
                                            <article class="none_aaaart">

                                                <?php echo form_open_multipart(base_url('job/job_education_primary_insert'), array('id' => 'jobseeker_regform_primary', 'name' => 'jobseeker_regform_primary', 'class' => 'clearfix')); ?>

                                                <?php
                                                $contition_array = array('user_id' => $userid, 'status' => 1);
                                                $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                $board_primary1 = $jobdata[0]['board_primary'];
                                                $school_primary1 = $jobdata[0]['school_primary'];
                                                $percentage_primary1 = $jobdata[0]['percentage_primary'];
                                                $pass_year_primary1 = $jobdata[0]['pass_year_primary'];
                                                $edu_certificate_primary1 = $jobdata[0]['edu_certificate_primary'];
                                                ?>
                                                <fieldset class="full-width">
                                                   <h6 style="font-size: 16px;">Board :<span style="color:red">*</span></h6>
                                                    <input type="text" name="board_primary" id="board_primary" placeholder="Enter Board" value="<?php
                                                    if ($board_primary1) {
                                                        echo $board_primary1;
                                                    }
                                                    ?>">
                                                </fieldset>

                                                <fieldset class="full-width">
                                                   <h6 style="font-size: 16px;">School :<span style="color:red">*</span></h6>
                                                    <input type="text" name="school_primary" id="school_primary" placeholder="Enter School Name" value="<?php
                                                    if ($school_primary1) {
                                                        echo $school_primary1;
                                                    }
                                                    ?>">
                                                </fieldset> 

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Percentage :<span style="color:red">*</span></h6>
                                                    <input type="number" name="percentage_primary" id="percentage_primary" placeholder="Enter Percentage"  value="<?php
                                                    if ($percentage_primary1) {
                                                        echo $percentage_primary1;
                                                    }
                                                    ?>" />
                                                </fieldset>  

                                                <fieldset class="full-width">
                                                   <h6 style="font-size: 16px;">Year Of Passing :<span style="color:red">*</span></h6>
                                                    <select name="pass_year_primary" id="pass_year_primary" class="pass_year_primary" >
                                                        <option value="" selected option disabled>--SELECT--</option>

                                                        <?php
                                                        $curYear = date('Y');

                                                        for ($i = $curYear; $i >= 1900; $i--) {
                                                            if ($pass_year_primary1) {
                                                                ?>

                                                                <option value="<?php echo $i ?>" <?php if ($i == $pass_year_primary1) echo 'selected'; ?>><?php echo $i ?></option>


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
                                                </fieldset>

                                                <fieldset class="full-width">
                                                   <h6 style="font-size: 16px;">Education Certificate:</h6>
                                                    <input type="file" name="edu_certificate_primary" id="edu_certificate_primary" class="edu_certificate_primary" placeholder="CERTIFICATE" multiple="" />

                                                    <?php
                                                    if ($edu_certificate_primary1) {
                                                        ?>

                                                        <img src="<?php echo base_url(JOBEDUCERTIFICATE . $edu_certificate_primary1) ?>" style="width:100px;height:100px;">

                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>

                                                <div class="fr">
                                                    <input type="hidden" name="image_hidden_primary" value="<?php
                                                    if ($edu_certificate_primary1) {
                                                        echo $edu_certificate_primary1;
                                                    }
                                                    ?>">
                                                    <button>Submit</button>
                                                    <br>

                                                </div>
                                                <?php echo form_close(); ?>
                                            </article>
                                        </section>


                                        <section id="section2">
                                            <input type="radio" name="sections" id="option2">
                                            <label for="option2" class="label-d">Secondary</label>
                                              <article class="">

                                                <?php echo form_open_multipart(base_url('job/job_education_secondary_insert'), array('id' => 'jobseeker_regform_secondary', 'name' => 'jobseeker_regform_secondary', 'class' => 'clearfix')); ?>

                                                <?php
                                                $contition_array = array('user_id' => $userid, 'status' => 1);
                                                $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                $board_secondary1 = $jobdata[0]['board_secondary'];
                                                $school_secondary1 = $jobdata[0]['school_secondary'];
                                                $percentage_secondary1 = $jobdata[0]['percentage_secondary'];
                                                $pass_year_secondary1 = $jobdata[0]['pass_year_secondary'];
                                                $edu_certificate_secondary1 = $jobdata[0]['edu_certificate_secondary'];
                                                ?>

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Board :<span style="color:red">*</span></h6>
                                                    <input type="text" name="board_secondary" id="board_secondary" placeholder="Enter Board" value="<?php
                                                    if ($board_secondary1) {
                                                        echo $board_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">School :<span style="color:red">*</span></h6>
                                                    <input type="text" name="school_secondary" id="school_secondary" placeholder="Enter School Name" value="<?php
                                                    if ($school_secondary1) {
                                                        echo $school_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>     

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Percentage :<span style="color:red">*</span></h6>
                                                    <input type="number" name="percentage_secondary" id="percentage_secondary" placeholder="Enter Percentage"  value="<?php
                                                    if ($percentage_secondary1) {
                                                        echo $percentage_secondary1;
                                                    }
                                                    ?>" />
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Year Of Passing :<span style="color:red">*</span></h6>
                                                    <select name="pass_year_secondary" id="pass_year_secondary" class="pass_year_secondary" >
                                                        <option value="" selected option disabled>--SELECT--</option>

                                                        <?php
                                                        $curYear = date('Y');

                                                        for ($i = $curYear; $i >= 1900; $i--) {
                                                            if ($pass_year_secondary1) {
                                                                ?>

                                                                <option value="<?php echo $i ?>" <?php if ($i == $pass_year_secondary1) echo 'selected'; ?>><?php echo $i ?></option>


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
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Education Certificate:</h6>
                                                    <input type="file" name="edu_certificate_secondary" id="edu_certificate_secondary" class="edu_certificate_secondary" placeholder="CERTIFICATE" multiple="" />

                                                    <?php
                                                    if ($edu_certificate_secondary1) {
                                                        ?>

                                                        <img src="<?php echo base_url(JOBEDUCERTIFICATE . $edu_certificate_secondary1) ?>" style="width:100px;height:100px;">

                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>

                                                <div class="fr">

                                                    <input type="hidden" name="image_hidden_secondary" value="<?php
                                                    if ($edu_certificate_secondary1) {
                                                        echo $edu_certificate_secondary1;
                                                    }
                                                    ?>">

                                                    <button>Submit</button>
                                                    <br>

                                                </div>

                                                <?php echo form_close(); ?>

                                            </article>
                                        </section>



                                        <section id="section3">
                                            <input type="radio" name="sections" id="option3">
                                            <label for="option3" class="label-d">Higher Secondary</label>
                                              <article class="">

                                                <?php echo form_open_multipart(base_url('job/job_education_higher_secondary_insert'), array('id' => 'jobseeker_regform_higher_secondary', 'name' => 'jobseeker_regform_higher_secondary', 'class' => 'clearfix')); ?>

                                                <?php
                                                $contition_array = array('user_id' => $userid, 'status' => 1);
                                                $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                $board_higher_secondary1 = $jobdata[0]['board_higher_secondary'];
                                                $stream_higher_secondary1 = $jobdata[0]['stream_higher_secondary'];
                                                $school_higher_secondary1 = $jobdata[0]['school_higher_secondary'];
                                                $percentage_higher_secondary1 = $jobdata[0]['percentage_higher_secondary'];
                                                $pass_year_higher_secondary1 = $jobdata[0]['pass_year_higher_secondary'];
                                                $edu_certificate_higher_secondary1 = $jobdata[0]['edu_certificate_higher_secondary'];
                                                ?>

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Board :<span style="color:red">*</span></h6>
                                                    <input type="text" name="board_higher_secondary" id="board_higher_secondary" placeholder="Enter Board" value="<?php
                                                    if ($board_higher_secondary1) {
                                                        echo $board_higher_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Stream :<span style="color:red">*</span></h6>
                                                    <input type="text" name="stream_higher_secondary" id="stream_higher_secondary" placeholder="Enter Stream" value="<?php
                                                    if ($stream_higher_secondary1) {
                                                        echo $stream_higher_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">School :<span style="color:red">*</span></h6>
                                                    <input type="text" name="school_higher_secondary" id="school_higher_secondary" placeholder="Enter School Name" value="<?php
                                                    if ($school_higher_secondary1) {
                                                        echo $school_higher_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Percentage :<span style="color:red">*</span></h6>
                                                    <input type="number" name="percentage_higher_secondary" id="percentage_higher_secondary" placeholder="Enter Percentage"  value="<?php
                                                    if ($percentage_higher_secondary1) {
                                                        echo $percentage_higher_secondary1;
                                                    }
                                                    ?>" />
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Year Of Passing :<span style="color:red">*</span></h6>
                                                    <select name="pass_year_higher_secondary" id="pass_year_higher_secondary" class="pass_year_higher_secondary" >
                                                        <option value="" selected option disabled>--SELECT--</option>

                                                        <?php
                                                        $curYear = date('Y');

                                                        for ($i = $curYear; $i >= 1900; $i--) {
                                                            if ($pass_year_higher_secondary1) {
                                                                ?>

                                                                <option value="<?php echo $i ?>" <?php if ($i == $pass_year_higher_secondary1) echo 'selected'; ?>><?php echo $i ?></option>


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
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6 style="font-size: 16px;">Education Certificate:</h6>
                                                    <input type="file" name="edu_certificate_higher_secondary" id="edu_certificate_higher_secondary" class="edu_certificate_higher_secondary" placeholder="CERTIFICATE" multiple="" />

                                                    <?php
                                                    if ($edu_certificate_higher_secondary1) {
                                                        ?>

                                                        <img src="<?php echo base_url(JOBEDUCERTIFICATE . $edu_certificate_higher_secondary1) ?>" style="width:100px;height:100px;">

                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>

                                                <div class="fr">

                                                    <input type="hidden" name="image_hidden_higher_secondary" value="<?php
                                                    if ($edu_certificate_higher_secondary1) {
                                                        echo $edu_certificate_higher_secondary1;
                                                    }
                                                    ?>">

                                                    <button>Submit</button>
                                                    <br>

                                                </div>

                                                <?php echo form_close(); ?>

                                            </article>
                                        </section>




                                        <section id="section4" style="overflow: auto;">
                                            <input type="radio" name="sections" id="option4">
                                            <label for="option4" class="label-d">Graduation</label>
                                             <article class="none_aaaart">

                                                <?php echo form_open_multipart(base_url('job/job_education_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix border_none')); ?>

                                                <?php
                                                if ($jobdata1) {
                                                    $count = count($jobdata1);
                                                    //echo"<pre>";print_r($jobdata1);die();
                                                    for ($x = 0; $x < $count; $x++) {

                                                        $degree1 = $jobdata1[$x]['degree'];
                                                        $stream1 = $jobdata1[$x]['stream'];
                                                        $university1 = $jobdata1[$x]['university'];
                                                        $college1 = $jobdata1[$x]['college'];
                                                        $grade1 = $jobdata1[$x]['grade'];
                                                        $percentage1 = $jobdata1[$x]['percentage'];
                                                        $pass_year1 = $jobdata1[$x]['pass_year'];
                                                        $degree_sequence = $jobdata1[$x]['degree_sequence'];
                                                        $stream_sequence = $jobdata1[$x]['stream_sequence'];
                                                        $edu_certificate1 = $jobdata1[$x]['edu_certificate'];
                                                        ?>   

                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">Degree :<span style="color:red">*</span></h6>
                                                            <select name="degree[]" id="<?php echo $degree_sequence ?>"  class="degree">
                                                                <option value="">Select your degree</option>

                                                                <?php
                                                                //if(count($degree_data) > 0){ //echo"hii";die();
                                                                if ($degree1) {
                                                                    foreach ($degree_data as $cnt) {
                                                                        ?>
                                                                        <option value="<?php echo $cnt['degree_id']; ?>" <?php if ($cnt['degree_id'] == $degree1) echo 'selected'; ?>><?php echo $cnt['degree_name']; ?></option>

                                                                        <?php
                                                                    }
                                                                }
                                                                else {
                                                                    ?>
                                                                    <option value="<?php echo $cnt['degree_id']; ?>"><?php echo $cnt['degree_name']; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('degree'); ?>
                                                        </fieldset>

                                                        <?php
                                                        $contition_array = array('status' => 1, 'degree_id' => $degree1);

                                                        $stream_data = $this->data['stream_data'] = $this->common->select_data_by_condition('stream', $contition_array, $data = '*', $sortby = 'stream_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                        ?>


                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">Stream :<span style="color:red">*</span></h6>
                                                            <select name="stream[]" id="<?php echo $stream_sequence ?>" class="stream" >

                                                                <?php
                                                                if ($stream1) {
                                                                    foreach ($stream_data as $cnt) {
                                                                        ?>
                                                                        <option value="<?php echo $cnt['stream_id']; ?>" <?php if ($cnt['stream_id'] == $stream1) echo 'selected'; ?>><?php echo $cnt['stream_name']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                else {
                                                                    ?>
                                                                    <option value="">Select Degree first</option>
                                                                    <?php
                                                                }
                                                                ?>

                                                                ?>

                                                            </select>
                                                            <?php echo form_error('stream'); ?> 
                                                        </fieldset>      

                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">University :<span style="color:red">*</span></h6>
                                                            <select name="university[]" id="university1" class="university">

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
                                                            <?php echo form_error('univercity'); ?>
                                                        </fieldset>      

                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">College :<span style="color:red">*</span></h6>

                                                            <input type="text" name="college[]" id="college1" class="college" placeholder="Enter College" value="<?php
                                                            if ($college1) {
                                                                echo $college1;
                                                            }
                                                            ?>">
                                                                   <?php echo form_error('college'); ?>
                                                        </fieldset>


                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">Grade :<span style="color:red">*</span></h6>
                                                            <input type="text" name="grade[]" id="grade1" class="grade" placeholder="Enter Grade" value="<?php
                                                            if ($grade1) {
                                                                echo $grade1;
                                                            }
                                                            ?>">
                                                                   <?php echo form_error('grade'); ?>
                                                        </fieldset>

                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">Percentage :<span style="color:red">*</span></h6>
                                                            <input type="number" name="percentage[]" id="percentage1" class="percentage" placeholder="Enter Percentage"  value="<?php
                                                            if ($percentage1) {
                                                                echo $percentage1;
                                                            }
                                                            ?>" />
                                                                   <?php echo form_error('percentage'); ?>
                                                        </fieldset>

                                                        <fieldset class="">
                                                            <h6 style="font-size: 16px;">Year Of Passing :<span style="color:red">*</span></h6>
                                                            <select name="pass_year[]" id="pass_year1" class="pass_year" >
                                                                <option value="" selected option disabled>--SELECT--</option>

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
                                                            <?php echo form_error('pass_year'); ?>
                                                        </fieldset>

                                                        <fieldset class="full-width">
                                                            <h6 style="font-size: 16px;">Education Certificate:</h6>
                                                            <input type="file" name="certificate[]" id="certificate1" class="certificate" placeholder="CERTIFICATE" multiple="" />&nbsp;&nbsp;&nbsp; <span id="certificate-error"> </span>

                                                            <?php
                                                            if ($edu_certificate1) {
                                                                ?>

                                                                <img src="<?php echo base_url(JOBEDUCERTIFICATE . $edu_certificate1) ?>" style="width:100px;height:100px;">

                                                                <?php
                                                            }
                                                            ?>
                                                            <?php echo form_error('certificate'); ?>
                                                        </fieldset>


                                                        <input type="hidden" name="image_hidden_degree<?php echo $jobdata1[$x]['edu_id']; ?>" value="<?php
                                                        if ($edu_certificate1) {
                                                            echo $edu_certificate1;
                                                        }
                                                        ?>">

                                                        <?php
                                                    }
                                                    ?>

                                                    <div class="fr">
                                                        <input type="submit"  id="next" name="next" value="Submit">
                                                        <input type="submit"  id="add_edu" name="add_edu" value="Add More Education"> 
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>

                                                    <!--clone div start-->              
                                                    <div id="input1" style="margin-bottom:4px;" class="clonedInput">

                                                        <!-- <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">Degree :<span style="color:red">*</span></h6>
                                                        <select name="degree[]" id="degree1" class="degree">
                                                            <option value="">Select your degree</option>

                                                            <?php
                                                            //if(count($degree_data) > 0){ //echo"hii";die();
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
                                                                //}
                                                            }
                                                            ?>
                                                        </select>

                                                        <?php echo form_error('degree'); ?>

                                                        <!--     </fieldset>
                                                        
                                                        
                                                              <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">Stream :<span style="color:red">*</span></h6>
                                                        <select name="stream[]" id="stream1" class="stream" >

                                                            <?php
                                                            if ($stream1) {
                                                                foreach ($stream_data as $cnt) {
                                                                    ?>
                                                                    <option value="<?php echo $cnt['stream_id']; ?>" <?php if ($cnt['stream_id'] == $stream1) echo 'selected'; ?>><?php echo $cnt['stream_name']; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            else {
                                                                ?>
                                                                <option value="">Select Degree first</option>
                                                                <?php
                                                            }
                                                            ?>

                                                        </select>

                                                        <?php echo form_error('stream'); ?> 

                                                        <!-- </fieldset>      
                                                  
                                                        <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">University :<span style="color:red">*</span></h6>
                                                        <select name="university[]" id="university1" class="university">

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
                                                        <?php echo form_error('univercity'); ?> 
                                                        <!--  </fieldset>      
                                                   
                                                         <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">College :<span style="color:red">*</span></h6>

                                                        <input type="text" name="college[]" id="college1" class="college" placeholder="Enter College" value="<?php
                                                        if ($college1) {
                                                            echo $college1;
                                                        }
                                                        ?>">
                                                               <?php echo form_error('college'); ?>    
                                                        <!--    </fieldset>
                                                     
                                                     
                                                           <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">Grade :<span style="color:red">*</span></h6>
                                                        <input type="text" name="grade[]" id="grade1" class="grade" placeholder="Enter Grade" value="<?php
                                                        if ($grade1) {
                                                            echo $grade1;
                                                        }
                                                        ?>">
                                                               <?php echo form_error('grade'); ?>
                                                        <!-- </fieldset>
                                                  
                                                        <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">Percentage :<span style="color:red">*</span></h6>
                                                        <input type="number" name="percentage[]" id="percentage1" class="percentage" placeholder="Enter Percentage"  value="<?php
                                                        if ($percentage1) {
                                                            echo $percentage1;
                                                        }
                                                        ?>" />
                                                               <?php echo form_error('percentage'); ?>
                                                        <!--    </fieldset>
                                                     
                                                           <fieldset class=""> -->
                                                        <h6 style="font-size: 16px;">Year Of Passing :<span style="color:red">*</span></h6>
                                                        <select name="pass_year[]" id="pass_year1" class="pass_year" >
                                                            <option value="" selected option disabled>--SELECT--</option>

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

                                                        <?php echo form_error('pass_year'); ?>
                                                        <!--  </fieldset>
                                                   
                                                         <fieldset class="full-width"> -->
                                                        <h6 style="font-size: 16px;">Education Certificate:</h6>
                                                        <input type="file" name="certificate[]" id="certificate1" class="certificate" placeholder="CERTIFICATE" multiple="" />&nbsp;&nbsp;&nbsp; <span id="certificate-error"> </span>

                                                        <?php
                                                        if ($edu_certificate1) {
                                                            ?>

                                                            <img src="<?php echo base_url(JOBEDUCERTIFICATE . $edu_certificate1) ?>" style="width:100px;height:100px;">

                                                            <?php
                                                        }
                                                        ?>

                                                        <?php echo form_error('certificate'); ?>
                                                        <!--  </fieldset> -->

                                                    </div> 
                                                    <!--clone div End-->

                                                    <fieldset class="full-width">
                                                        <h6 style="font-size: 16px;">Add More Education</h6>
                                                    </fieldset>

                                                    <div class="fl" style="margin-right: 10px;" >

                                                        <input type="button" id="btnAdd" value=" + " />

                                                    </div>

                                                    <div class="fl">

                                                        <input type="button" id="btnRemove" value=" - "   />

                                                    </div>

                                                    <div class="fr">
                                                        <input type="submit"  id="next" name="next" value="submit">
                                                    </div> 

                                                    <?php
                                                }
                                                ?>
                                                <?php echo form_close(); ?>

                                            </article>
                                        </section>



                                    </div>

                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                </section>
                <footer>

                    </body>

                    </html>


                    <!-- Calender JS Start-->
                    
<!-- Calender JS Start-->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery-ui.js') ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- script for skill textbox automatic end -->
<script>

                                        var data = <?php echo json_encode($demo); ?>;

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

<script>
//select2 autocomplete start for skill
    $('#searchskills').select2({

        placeholder: 'Find Your Skills',

        ajax: {

            url: "<?php echo base_url(); ?>job/keyskill",
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

            url: "<?php echo base_url(); ?>job/location",
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
                    <!-- duplicate div -->
                    <script type="text/javascript" src="<?php echo base_url('js/app.js') ?>"></script> 
                    <!-- duplicate div end -->

                    <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>



                    <!--validation for edit email formate form-->
                    <script type="text/javascript">
                        $().ready(function () {

                            $("#jobseeker_regform_primary").validate({

                                rules: {

                                    board_primary: {

                                        required: true,

                                    },

                                    school_primary: {

                                        required: true,

                                    },

                                    percentage_primary: {

                                        required: true,

                                    },

                                    pass_year_primary: {

                                        required: true,

                                    },

                                },

                                messages: {

                                    board_primary: {

                                        required: "Board Is Required.",

                                    },

                                    school_primary: {

                                        required: "School Is Required.",

                                    },

                                    percentage_primary: {

                                        required: "Percentage Is Required.",

                                    },

                                    pass_year_primary: {

                                        required: "Year Of Passing Is Required.",

                                    },

                                }

                            });
                        });
                    </script>

                    <script type="text/javascript">
                        $().ready(function () {

                            $("#jobseeker_regform_secondary").validate({

                                rules: {

                                    board_secondary: {

                                        required: true,

                                    },

                                    school_secondary: {

                                        required: true,

                                    },

                                    percentage_secondary: {

                                        required: true,

                                    },

                                    pass_year_secondary: {

                                        required: true,

                                    },

                                },

                                messages: {

                                    board_secondary: {

                                        required: "Board Is Required.",

                                    },

                                    school_secondary: {

                                        required: "School Is Required.",

                                    },

                                    percentage_secondary: {

                                        required: "Percentage Is Required.",

                                    },

                                    pass_year_secondary: {

                                        required: "Passing Year Is Required.",

                                    },

                                }

                            });
                        });
                    </script>

                    <script type="text/javascript">
                        $().ready(function () {

                            $("#jobseeker_regform_higher_secondary").validate({

                                rules: {

                                    board_higher_secondary: {

                                        required: true,

                                    },
                                    stream_higher_secondary: {

                                        required: true,

                                    },

                                    school_higher_secondary: {

                                        required: true,

                                    },

                                    percentage_higher_secondary: {

                                        required: true,

                                    },

                                    pass_year_higher_secondary: {

                                        required: true,

                                    },

                                },

                                messages: {

                                    board_higher_secondary: {

                                        required: "Board Is Required.",

                                    },
                                    stream_higher_secondary: {

                                        required: "Stream Is Required",

                                    },

                                    school_higher_secondary: {

                                        required: "School Is Required.",

                                    },

                                    percentage_higher_secondary: {

                                        required: "Percentage Is Required.",

                                    },

                                    pass_year_higher_secondary: {

                                        required: "Year Of Passing Is Required.",

                                    },

                                }

                            });
                        });
                    </script>



                    <script type="text/javascript">
                        $().ready(function () {

                            $("#jobseeker_regform").validate({

                                rules: {

                                    'degree[]': {

                                        required: true,

                                    },

                                    'stream[]': {

                                        required: true,

                                    },

                                    'university[]': {

                                        required: true,

                                    },

                                    'college[]': {

                                        required: true,

                                    },
                                    'grade[]': {

                                        required: true,

                                    },
                                    'percentage[]': {

                                        required: true,

                                    },
                                    'pass_year[]': {

                                        required: true,

                                    },

                                },

                                messages: {

                                    'degree[]': {

                                        required: "Degree Is Required.",

                                    },

                                    'stream[]': {

                                        required: "Stream Is Required.",

                                    },

                                    'university[]': {

                                        required: "University Is Required.",

                                    },

                                    'college[]': {

                                        required: "College Is Required.",

                                    },
                                    'grade[]': {

                                        required: "Grade Is Required.",

                                    },
                                    'percentage[]': {

                                        required: "Percentage Is Required.",

                                    },
                                    'pass_year[]': {

                                        required: "Year Of Passing Is Required.",

                                    },

                                }

                            });
                        });
                    </script>

                    <!-- Clone input type start-->
                    <script>

                        $('#btnRemove').attr('disabled', 'disabled');

                        $('#btnAdd').click(function () {
                            var num = $('.clonedInput').length;
                            var newNum = new Number(num + 1);
                            //alert(newNum);

                            if (newNum > 5)
                            {

                                $('#btnAdd').attr('disabled', 'disabled');
                                alert("You Can add only 5 fields");
                                return false;

                            }

                            var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

                            newElem.children('.degree').attr('id', 'degree' + newNum).attr('name', 'degree[]');
                            newElem.children('.stream').attr('id', 'stream' + newNum).attr('name', 'stream[]');
                            newElem.children('.university').attr('id', 'university' + newNum).attr('name', 'university[]');
                            newElem.children('.college').attr('id', 'college' + newNum).attr('name', 'college[]');
                            newElem.children('.grade').attr('id', 'grade' + newNum).attr('name', 'grade[]');
                            newElem.children('.percentage').attr('id', 'percentage' + newNum).attr('name', 'percentage[]');
                            newElem.children('.pass_year').attr('id', 'pass_year' + newNum).attr('name', 'pass_year[]');
                            newElem.children('.certificate').attr('id', 'certificate' + newNum).attr('name', 'certificate[]');

                            $('#input' + num).after(newElem);
                            $('#btnRemove').removeAttr('disabled', 'disabled');



                        });


                        $('#btnRemove').on('click', function () {

                            var num = $('.clonedInput').length;

                            if (num - 1 == 1)
                            {

                                $('#btnRemove').attr('disabled', 'disabled');


                            }
                            $('.clonedInput').last().remove();

                        });

                        // $('#btnRemove').on('click', function() {
                        //     $('.clonedInput').last().remove();


                        // });


                        $('#btnAdd').on('click', function () {

                            $('.clonedInput').last().add().find("input:text").val("");



                        });
                    </script>
                    <!-- Clone input type End-->



                    <!-- stream change depend on degeree start-->
                    <script>
                        $(document).on('change', 'select.degree', function (event) {//alert('SDDSD');
                            var aa = $(this).attr('id');
                            var lastChar = aa.substr(aa.length - 1);

                            var degreeID = $('option:selected', this).val();

                            //alert(".DeleteBtn Click Function -  " + $(this).attr('id'));

                            // var degreeID = $(this).val();
                            //alert(degreeID);
                            if (degreeID) {

                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo base_url() . "job/ajax_data"; ?>',
                                    data: 'degree_id=' + degreeID,
                                    success: function (html) {//alert("#stream"+lastChar);
                                        $("#stream" + lastChar).html(html);
                                        //   $('#productid2').html(html);

                                    }
                                });
                            } else {
                                $('#stream' + lastChar).html('<option value="">Select Degree first</option>');

                            }
                        });
                    </script>
                    <!-- stream change depend on degeree start-->
