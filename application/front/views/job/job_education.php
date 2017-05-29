<!-- start head -->
<?php echo $head; ?> 
<!-- END HEAD -->
<style type="text/css">
    h1 {

        font-family: arial, sans-serif;
        margin: 1em auto;
        width: 80%;
    }
    .none_aaaart{border: 1px solid #ccc}
    .tabordion {

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

   .job_education_certificate_img { height: 100px; width: 100px; } /* add in style*/
</style>

<!-- start header -->
<?php echo $header; ?> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<?php if($jobdata[0]['job_step'] == 10){ ?>
<?php echo $job_header2_border; ?>
<?php } ?>
<!-- END HEADER -->

<body class="page-container-bg-solid page-boxed">

    <section style="overflow:auto;">

        <div class="user-midd-section" id="paddingtop_fixed_job">

            <div class="common-form1">
                <div class="col-md-3 col-sm-4"></div>

                <?php
                $userid = $this->session->userdata('aileenuser');

                $contition_array = array('user_id' => $userid, 'status' => '1');
                $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($jobdata[0]['job_step'] == 10) { ?>
                 <div class="col-md-6 col-sm-8"><h3>You are updating your Job Profile.</h3></div>
                    
              <?php  } else {
                    ?>

                    <div class="col-md-6 col-sm-8"><h3>You are making your Job Profile.</h3></div>

                <?php } ?>
            </div>
            <br>
            <br>
            <br>

            <div class="container">
                <div class="row row4">
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

                                    <!-- <li class="<?php
                                    if ($jobdata[0]['job_step'] < '3') {
                                        //echo "khyati";
                                    }
                                    ?>"><a href="<?php //echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li> -->

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
                            <div class="job-saved-boxe_2" >
                                <h3>Educational  Qualification</h3>
                                <div class="contact-frnd-post1" style="padding: 10px; height: 100%;">

                                    <div class="tabordion">

                                        <section id="section1">
                                            <input type="radio" name="sections" id="option1" <?php
                                            if ($postid == " ") {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="option1" class="label-d">Primary</label>
                                            <article class="none_aaaart">

                                                <?php echo form_open_multipart(base_url('job/job_education_primary_insert'), array('id' => 'jobseeker_regform_primary', 'name' => 'jobseeker_regform_primary', 'class' => 'clearfix')); ?>

                                                <?php
                                                $contition_array = array('user_id' => $userid, 'status' => 1);
                                                $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                            //echo '<pre>'; print_r($jobdata); die();
                                                $board_primary1 = $jobdata[0]['board_primary'];
                                               // echo $board_primary1; die();
                                                $school_primary1 = $jobdata[0]['school_primary'];
                                                $percentage_primary1 = $jobdata[0]['percentage_primary'];
                                                $pass_year_primary1 = $jobdata[0]['pass_year_primary'];
                                                $edu_certificate_primary1 = $jobdata[0]['edu_certificate_primary'];
                                                ?>
                                                <fieldset class="full-width">
                                               <h6>Board :<span style="color:red">*</span></h6>
                                                    <input type="text" name="board_primary" id="board_primary" placeholder="Enter Board" value="<?php
                                                    if ($board_primary1) {
                                                        echo $board_primary1;
                                                    }
                                                    ?>">
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6>School :<span class="red">*</span></h6>
                                                    <input type="text" name="school_primary" id="school_primary" placeholder="Enter School Name" value="<?php
                                                    if ($school_primary1) {
                                                        echo $school_primary1;
                                                    }
                                                    ?>">
                                                </fieldset> 

                                                <fieldset class="full-width">
                                                    <h6>Percentage :<span class="red">*</span></h6>
                                                    <input type="number" name="percentage_primary" id="percentage_primary" placeholder="Enter Percentage"  value="<?php
                                                    if ($percentage_primary1) {
                                                        echo $percentage_primary1;
                                                    }
                                                    ?>" />
                                                </fieldset>  

                                                <fieldset class="full-width">
                                                    <h6>Year Of Passing :<span style="color:red">*</span></h6>
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
                                                    <h6>Education Certificate:</h6>
                                                    <input  type="file" name="edu_certificate_primary" id="edu_certificate_primary" class="edu_certificate_primary" placeholder="CERTIFICATE" multiple="" />

                                                    <?php
                                                    if ($edu_certificate_primary1) {
                                                        ?>

            <img src="<?php echo base_url($this->config->item('job_edu_thumb_upload_path')  . $edu_certificate_primary1) ?>"  style="width:100px;height:100px;" class="job_education_certificate_img" >

                                      <?php
                                                   }
                                                    ?>
                                                </fieldset>

                 <div class="fr job_education_submitbox">
                   <input type="hidden" name="image_hidden_primary" value="<?php
                          if ($edu_certificate_primary1) {
                           echo $edu_certificate_primary1;
                               }
                               ?>">
                          <button class="submit_btn">Submit</button>
                                                    <br>
                             <fieldset class="hs-submit full-width" style="    position: absolute;
                                        right: -24%;  width: 24%;
                                          bottom: 1%;">

                                     <input type="button" id="next" name="next" value="Next" style="font-size: 16px;min-width: 120px;" onclick="next_page()">

                                                    </fieldset>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </article>
                                        </section>


                                        <section id="section2">
                                            <input type="radio" name="sections" id="option2" <?php
                                            if ($postid == "secondary") {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="option2" class="label-d">Secondary</label>
                                    <article class="none_aaaart">

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
                                                    <h6>Board :<span style="color:red">*</span></h6>
                                                    <input type="text" name="board_secondary" id="board_secondary" placeholder="Enter Board" value="<?php
                                                    if ($board_secondary1) {
                                                        echo $board_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6>School :<span class="red">*</span></h6>
                                                    <input type="text" name="school_secondary" id="school_secondary" placeholder="Enter School Name" value="<?php
                                                    if ($school_secondary1) {
                                                        echo $school_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>     

                                                <fieldset class="full-width">
                                                    <h6>Percentage :<span class="red">*</span></h6>
                                                    <input type="number" name="percentage_secondary" id="percentage_secondary" placeholder="Enter Percentage"  value="<?php
                                                    if ($percentage_secondary1) {
                                                        echo $percentage_secondary1;
                                                    }
                                                    ?>" />
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6>Year Of Passing :<span class="red">*</span></h6>
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
                                                    <h6>Education Certificate:</h6>
                                                    <input type="file" name="edu_certificate_secondary" id="edu_certificate_secondary" class="edu_certificate_secondary" placeholder="CERTIFICATE" multiple="" />

                                                    <?php
                                                    if ($edu_certificate_secondary1) {
                                                        ?>

                     <img src="<?php echo base_url($this->config->item('job_edu_thumb_upload_path')  . $edu_certificate_secondary1) ?>" style="width:100px;height:100px;" class="job_education_certificate_img ">

                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>

                                     <div class="fr job_education_submitbox">

                                      <input type="hidden" name="image_hidden_secondary" value="<?php
                                      if ($edu_certificate_secondary1) {
                                           echo $edu_certificate_secondary1;
                                           }
                                          ?>">

                                     <button class="submit_btn">Submit</button>
                                                    <br>
                                                    <fieldset class="hs-submit full-width" style="    position: absolute;
                                                              right: -24%;  width: 24%;
                                                              bottom: 5%;">

                                          <input type="button" id="next" name="next" value="Next" style="font-size: 16px;min-width: 120px;" onclick="next_page1()">

                                                    </fieldset>

                                                </div>

                                                <?php echo form_close(); ?>

                                            </article>
                                        </section>



                                        <section id="section3">
                                            <input type="radio" name="sections" id="option3" <?php
                                            if ($postid == "higher-secondary") {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="option3" class="label-d">Higher Secondary</label>
                                      <article class="none_aaaart">

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
                                                    <h6>Board :<span class="red">*</span></h6>
                                                    <input type="text" name="board_higher_secondary" id="board_higher_secondary" placeholder="Enter Board" value="<?php
                                                    if ($board_higher_secondary1) {
                                                        echo $board_higher_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>

                                                <fieldset class="full-width">
                                                    <h6>Stream :<span class="red">*</span></h6>
                                                    <input type="text" name="stream_higher_secondary" id="stream_higher_secondary" placeholder="Enter Stream" value="<?php
                                                    if ($stream_higher_secondary1) {
                                                        echo $stream_higher_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6>School :<span class="red">*</span></h6>
                                                    <input type="text" name="school_higher_secondary" id="school_higher_secondary" placeholder="Enter School Name" value="<?php
                                                    if ($school_higher_secondary1) {
                                                        echo $school_higher_secondary1;
                                                    }
                                                    ?>">
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6>Percentage :<span class="red">*</span></h6>
                                                    <input type="number" name="percentage_higher_secondary" id="percentage_higher_secondary" placeholder="Enter Percentage"  value="<?php
                                                    if ($percentage_higher_secondary1) {
                                                        echo $percentage_higher_secondary1;
                                                    }
                                                    ?>" />
                                                </fieldset>      

                                                <fieldset class="full-width">
                                                    <h6>Year Of Passing :<span class="red">*</span></h6>
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
                                                    <h6>Education Certificate:</h6>
                                                    <input type="file" name="edu_certificate_higher_secondary" id="edu_certificate_higher_secondary" class="edu_certificate_higher_secondary" placeholder="CERTIFICATE" multiple="" />

                                                    <?php
                                                    if ($edu_certificate_higher_secondary1) {
                                                        ?>

                 <img src="<?php echo base_url($this->config->item('job_edu_thumb_upload_path')  . $edu_certificate_higher_secondary1) ?>" style="width:100px;height:100px;" class="job_education_certificate_img">

                                                        <?php
                                                    }
                                                    ?>
                                                </fieldset>

                             <div class="fr job_education_submitbox">

                                                    <input type="hidden" name="image_hidden_higher_secondary" value="<?php
                                                    if ($edu_certificate_higher_secondary1) {
                                                        echo $edu_certificate_higher_secondary1;
                                                    }
                                                    ?>">

                                     <button class="submit_btn">Submit</button>
                                                    <br>
                                                    <fieldset class="hs-submit full-width" style="    position: absolute;
                                                              right: -24%;  width: 24%;
                                                              bottom: 5%;">

                                                        <input type="button" id="next" name="next" value="Next" style="font-size: 16px;min-width: 120px;" onclick="next_page2()">

                                                    </fieldset>
                                                </div>

                                                <?php echo form_close(); ?>

                                            </article>
                                        </section>




                                        <section id="section4" style="overflow: auto;">
                                            <input type="radio" name="sections" id="option4" <?php
                                            if ($postid == "graduation") {
                                                echo "checked";
                                            }
                                            ?>>
                                            <label for="option4" class="label-d">Graduation</label>
                                            <article class="none_aaaart">

                                  <?php echo form_open_multipart(base_url('job/job_education_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix border_none')); ?>

                                                <?php
                                                $predefine_data = 1;
                                                if ($jobgrad) {
                                                    $count = count($jobgrad);
                                                    //echo"<pre>";print_r($jobdata1);die();
                                                    for ($x = 0; $x < $count; $x++) {

                                                        $degree1 = $jobgrad[$x]['degree'];
                                                        $stream1 = $jobgrad[$x]['stream'];
                                                        $university1 = $jobgrad[$x]['university'];
                                                        $college1 = $jobgrad[$x]['college'];
                                                        $grade1 = $jobgrad[$x]['grade'];
                                                        $percentage1 = $jobgrad[$x]['percentage'];
                                                        $pass_year1 = $jobgrad[$x]['pass_year'];
                                                        $degree_sequence = $jobgrad[$x]['degree_sequence'];
                                                        $stream_sequence = $jobgrad[$x]['stream_sequence'];
                                                        $edu_certificate1 = $jobgrad[$x]['edu_certificate']; 

                                                        $y = $x + 1;
                                                        
                                                        if ($count == 0) {
                                                            $predefine_data = 1;
                                                        } else {
                                                            $predefine_data = $count;
                                                        }
                                                        ?>   
                                                        
                                  <div id="input<?php echo $y ?>" style="margin-bottom:4px;" class="clonedInput job_work_edit_<?php echo $jobgrad[$x]['job_graduation_id']?>">
                                    <input type="hidden" name="education_data[]" value="old" class="exp_data" id="exp_data<?php echo $y; ?>">
                                       <div class="job_work_experience_main_div">
                                                            <fieldset class="">
                                                 <h6>Degree :<span class="red">*</span></h6>
                             <select name="degree[]" id="degree1"  class="degree">
                       <option value="0">Select your Degree</option>

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
                        //echo "string"; die();
                               ?>
                      <option value="<?php echo $cnt['degree_id']; ?>"><?php echo $cnt['degree_name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <?php echo form_error('degree'); ?>
                                                            </fieldset>

                                                            <?php
                                                            $contition_array = array('status' => 1);

                                                            $stream_data = $this->data['stream_data'] = $this->common->select_data_by_condition('stream', $contition_array, $data = '*', $sortby = 'stream_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                            //echo "<pre>"; print_r($stream1); die();

                                                            ?>


                                                            <fieldset class="">
                                        <h6>Stream :<span class="red">*</span></h6>
                                             <select name="stream[]" id="stream1" class="stream" >
                                            <option value="">Select Degree First</option>
                                           <?php
                                           if ($stream1) {
                         foreach ($stream_data as $cnt) {
                                ?>
                        <option value="<?php echo $cnt['stream_id']; ?>" <?php if ($cnt['stream_id'] == $stream1) echo 'selected'; ?>><?php echo $cnt['stream_name'];?></option>


                                <?php
                             }
                              }
                                  else {
                                  ?>
                         <option value="0">Select Degree First</option>
                              <?php
                                     }
                                ?>
                                    ?>
                       </select>
                      <?php echo form_error('stream'); ?> 
                                                            </fieldset>      

                                                            <fieldset class="">
                                                <h6>University :<span class="red">*</span></h6>                                    <select name="university[]" id="university1" class="university">

                              <option value="0" selected option disabled>Select your University</option>

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
                                                <h6>College :<span class="red">*</span></h6>

                                                 <input type="text" name="college[]" id="college1" class="college" placeholder="Enter College" value="<?php
                                            if ($college1) {
                                             echo $college1;
                                                 }
                                                 ?>">
                                   <?php echo form_error('college'); ?>
                                                            </fieldset>


                                                            <fieldset class="">
                                          <h6>Grade :<span class="red">*</span></h6>
                                   <input type="text" name="grade[]" id="grade1" class="grade" placeholder="Enter Grade" value="<?php
                                     if ($grade1) {
                                     echo $grade1;
                                          }
                                      ?>">
                  <?php echo form_error('grade'); ?>
                                    </fieldset>
                                <fieldset class="">
                                             <h6>Percentage :<span class="red">*</span></h6>
                          <input type="number" name="percentage[]" id="percentage1" class="percentage" placeholder="Enter Percentage"  value="<?php
                         if ($percentage1) {
                            echo $percentage1;
                           }
                           ?>" />
                  <?php echo form_error('percentage'); ?>
                           </fieldset>
                       <fieldset class="">
                      <h6>Education Certificate:</h6>
                   <input style="" type="file" name="certificate[]" id="certificate1" class="certificate" placeholder="CERTIFICATE" multiple="" />&nbsp;&nbsp;&nbsp; <span id="certificate-error"> </span>
                          <?php
                          if ($edu_certificate1) {
                                ?>
 <div class="img_work_exp" style=" margin-top: 14px;" >
                
          <img src="<?php echo base_url($this->config->item('job_edu_main_upload_path') . $edu_certificate1) ?>" style="width:100px;height:100px;" class="job_education_certificate_img">
</div>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php echo form_error('certificate'); ?>
                                                            </fieldset>

                                                            <fieldset class="">
                                                   <h6>Year Of Passing :<span class="red">*</span></h6>
                                                                <select name="pass_year[]" id="pass_year1" class="pass_year" >
                <option value="0" selected option disabled>--SELECT--</option>
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

                                                          

         <input type="hidden" name="image_hidden_degree<?php echo $jobgrad[$x]['job_graduation_id']; ?>" value="<?php
                     if ($edu_certificate1) {
                     echo $edu_certificate1;
                     }
              ?>">
                                                            
                   <?php if ($y != 1) {
                             ?>
                     <div style="float: left;">
            <div class="hs-submit full-width fl">
               <input type="button" value="Delete" onclick="delete_job_exp(<?php echo $jobgrad[$x]['job_graduation_id']; ?>);">
                        </div>
                              </div>
                                    <?php } ?>
                           </div></div> 
                                   <?php
                                          }
                                    ?>
                               <div class="fr img_remove">
                        <input  style="padding: 6px 9px 6px;
    font-size: 14px;" class="job_edu_graduation_submit_btn" type="Submit"  id="next" name="next" value="Submit">
                        <!--<input type="submit"  id="add_edu" name="add_edu" value="Add More Education">--> 
                                    </div>


<div class="display_inline_block" >
              <div class="fr img_remove job_edu_graduation_removebox" >
                        <input class="job_edu_graduation_removebtn" type="button" id="btnRemove" name="btnRemove"  value=" - "   />
                                                </div>
                          <div class="fr img_remove" >
                           <input type="button" id="btnAdd"  name="btnAdd" class="job_edu_graduation_addbtn"  value=" + ">
                                                    </div>

                                                 </div>
         <fieldset class="hs-submit full-width job_edu_graduation_nextbtnbox">

                <input type="button" id="next" name="next"          class="job_edu_graduation_nextbtn" value="Next" style="font-size: 16px;min-width: 120px;margin-right: 0px;" onclick="next_page_graduation()">

                                                    </fieldset>

                                                    <?php
                                                } else {
                                                    ?>

                                                    <!--clone div start-->              
                                                    <div id="input1" style="margin-bottom:4px;" class="clonedInput">

                                                        <!-- <fieldset class=""> -->
                                                 <h6>Degree :<span class="red">*</span></h6>
                                                        <select name="degree[]" id="degree1" class="degree error">
                                                            <option value="0">Select your Degree</option>

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
                                                 <h6>Stream :<span class="red">*</span></h6>
                                                        <select name="stream[]" id="stream1" class="stream" >
                                                            <option value="">Select Degree First</option>
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
                                                                <option value="0">Select Degree First</option>
                                                                <?php
                                                            }
                                                            ?>

                                                        </select>

                                                        <?php echo form_error('stream'); ?> 

                                                        <!-- </fieldset>      
                                                  
                                                        <fieldset class=""> -->
                                                        <h6>University :<span class="red">*</span></h6>
                                                        <select name="university[]" id="university1" class="university">

                                                            <option value="0" selected option disabled>Select your University</option>

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
                                                        <h6>College :<span class="red">*</span></h6>

                                                        <input type="text" name="college[]" id="college1" class="college" placeholder="Enter College" value="<?php
                                                        if ($college1) {
                                                            echo $college1;
                                                        }
                                                        ?>">
                                                               <?php echo form_error('college'); ?>    
                                                        <!--    </fieldset>
                                                     
                                                     
                                                           <fieldset class=""> -->
                                                        <h6>Grade :<span class="red">*</span></h6>
                                                        <input type="text" name="grade[]" id="grade1" class="grade" placeholder="Enter Grade" value="<?php
                                                        if ($grade1) {
                                                            echo $grade1;
                                                        }
                                                        ?>">
                                                               <?php echo form_error('grade'); ?>
                                                        <!-- </fieldset>
                                                  
                                                        <fieldset class=""> -->
                                                        <h6>Percentage :<span class="red">*</span></h6>
                                                        <input type="number" name="percentage[]" id="percentage1" class="percentage" placeholder="Enter Percentage"  value="<?php
                                                        if ($percentage1) {
                                                            echo $percentage1;
                                                        }
                                                        ?>" />
                                                               <?php echo form_error('percentage'); ?>
                                                        <!--    </fieldset>
                                                     
                                                           <fieldset class=""> -->
                                                        <h6>Year Of Passing :<span class="red">*</span></h6>
                                                        <select name="pass_year[]" id="pass_year1" class="pass_year" >
                                                            <option value="0" selected option disabled>--SELECT--</option>

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
                                                        <h6>Education Certificate:</h6>
                                                        <input type="file" name="certificate[]" id="certificate1" class="certificate" placeholder="CERTIFICATE" multiple="" />&nbsp;&nbsp;&nbsp; <span id="certificate-error"> </span>

                                                        <?php
                                                        if ($edu_certificate1) {
                                                            ?>

                                                            <img src="<?php echo base_url($this->config->item('job_edu_main_upload_path') . $edu_certificate1) ?>" style="width:100px;height:100px;">

                                                            <?php
                                                        }
                                                        ?>

                                                        <?php echo form_error('certificate'); ?>
                                                        <!--  </fieldset> -->

                                                    </div> 
                                                    <!--clone div End-->


            <div class="fl job_edu_graduation_addbtnbox" >

            <input type="button" id="btnAdd" class="job_edu_graduation_addbtn" value=" + " /><br>

             </div>

                     <div class="fl">

            <input type="button" id="btnRemove" class="job_edu_graduation_removebtn" value=" - "   />

                      </div>

                  <div class="fr job_edu_graduation_submitposition">
             <input type="Submit"  id="next" name="next" value="Submit" class="job_edu_graduation_submitbtn" style="padding: 5px 9px;margin-right: 0px;">
                   </div> 
                                  <br>
                <fieldset class="hs-submit full-width"  style="     right: -24%; position: absolute; bottom: 2.3%;
                  display: inline-block; width: 24%;">

                <input type="button" id="next" name="next" value="Next" style="font-size: 16px;min-width: 120px;margin-right: 0px;" onclick="next_page_graduation()">

                                                    </fieldset>

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


                            <!-- next button start -->
                            <!-- <fieldset class="hs-submit full-width">
                                                   
                            <input type="button"  id="next" name="next" value="Next" onclick="next_page()">
                            
                             </fieldset> -->
                            <!-- next button end -->
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

jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


                            $("#jobseeker_regform_primary").validate({

                                rules: {

                                    board_primary: {

                                        required: true,
                                        noSpace: true

                                    },

                                    school_primary: {

                                        required: true,
                                        noSpace: true

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
                            jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


                            $("#jobseeker_regform_secondary").validate({

                                rules: {

                                    board_secondary: {

                                        required: true,
                                        noSpace: true

                                    },

                                    school_secondary: {

                                        required: true,
                                        noSpace: true

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

                            jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


                            $("#jobseeker_regform_higher_secondary").validate({

                                rules: {

                                    board_higher_secondary: {

                                        required: true,
                                        noSpace: true

                                    },
                                    stream_higher_secondary: {

                                        required: true,
                                        noSpace: true

                                    },

                                    school_higher_secondary: {

                                        required: true,
                                        noSpace: true

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

                            jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");



$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "This is not allow");

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
                                        noSpace: true

                                    },
                                    'grade[]': {

                                        required: true,
                                        regx:/^[a-zA-Z+-]/

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
                           var $clone = $('#input' + num).clone();
                         //  $clone.find('input').val('');
                          // $clone.find('select').val('0');
                          
                            newElem.children('.education_data').attr('id', 'education_data' + newNum).attr('name', 'education_data[]').attr('value', 'new');
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
                            $('#input' + newNum + ' #pass_year1').val('0');   
                            $('#input' + newNum + ' .degree').val('0'); 
                            $('#input' + newNum + ' .stream').val('');
                            $('#input' + newNum + ' .university').val('0'); 
                            $('#input' + newNum + ' #percentage1').val(''); 
                            $('#input' + newNum + ' .exp_data').val(''); 
                            $('#input' + newNum + ' .hs-submit').remove();    
                            $("#input" + newNum + ' img').remove();
                             });


                        $('#btnRemove').on('click', function () {

                            var num = $('.clonedInput').length;

                            if (num - 1 == <?php echo $predefine_data; ?>)
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

<!-- <script type="text/javascript">   
 $(".formSentMsg").delay(3200).fadeOut(300);
</script> -->

                    <script type="text/javascript">
                        $(".alert").delay(3200).fadeOut(300);
                    </script>


                    <!-- script start for next button -->
                    <script type="text/javascript">
                        function next_page() {

                             var board_primary = document.getElementById("board_primary").value;
                             var school_primary = document.getElementById("school_primary").value;
                             var percentage_primary = document.getElementById("percentage_primary").value;
                             var pass_year_primary = document.getElementById("pass_year_primary").value;

                            

                             if(board_primary == '' || school_primary == '' || percentage_primary == '' || pass_year_primary == ''){
                                alert("please fill out details");
                                 return false;
                             }
                             else{
                                window.location = "<?php echo base_url() ?>job/job_project_update";
                             }

                        }
                    </script>


                    <script type="text/javascript">
                        function next_page1() {
                            //alert('ghh');
                             var board_secondary = document.getElementById("board_secondary").value;
                             var board_primary=document.getElementById("board_primary").value;
                             //alert(board_primary);
                             var school_secondary = document.getElementById("school_secondary").value;
                             var percentage_secondary = document.getElementById("percentage_secondary").value;
                             var pass_year_secondary = document.getElementById("pass_year_secondary").value;

                            

                             if(school_secondary == '' || percentage_secondary == '' || pass_year_secondary == '' || board_secondary == ''){
                                //alert(789);
                                if(board_primary == ''){
                                alert("please fill out details");
                                 return false;
                             }
                                 else{
                                    window.location = "<?php echo base_url() ?>job/job_project_update";

                                 }
                             }
                             else{
                                window.location = "<?php echo base_url() ?>job/job_project_update";
                             }

                        }
                    </script>

                    <script type="text/javascript">
                        function next_page2() {
                            alert('ghh');
                            var board_higher_secondary = document.getElementById("board_higher_secondary").value;
                             var board_secondary = document.getElementById("board_secondary").value;
                             var board_primary=document.getElementById("board_primary").value;
                             var school_higher_secondary = document.getElementById("school_higher_secondary").value;
                             var percentage_higher_secondary = document.getElementById("percentage_primary").value;
                             var pass_year_higher_secondary = document.getElementById("pass_year_primary").value;

                            

                             if(board_higher_secondary == '' || school_higher_secondary == '' || percentage_higher_secondary == '' || pass_year_higher_secondary == ''){

                                if(board_secondary == '' && board_primary == ''){
                                    //alert(hhhhhhhh); return false;
                                    alert("please fill out details");
                                 return false;} 
                                    else{
                                        window.location = "<?php echo base_url() ?>job/job_project_update";
                                    }
                             }
                             else{
                                window.location = "<?php echo base_url() ?>job/job_project_update";
                             }

                        }
                    </script>

                    <script type="text/javascript">
                        function next_page_graduation() {
                            alert('hfgh');

                             var degree = document.getElementById("degree1").value;
                             var stream = document.getElementById("stream1").value;
                             var university = document.getElementById("university1").value;
                             var college = document.getElementById("college1").value;
                              var grade = document.getElementById("grade1").value;
                               var percentage = document.getElementById("percentage1").value;
                                var pass_year = document.getElementById("pass_year1").value;
                                var board_higher_secondary = document.getElementById("board_higher_secondary").value;
                                var board_secondary = document.getElementById("board_secondary").value;
                             var board_primary=document.getElementById("board_primary").value;

                            //alert(456);

                             if(degree == '' || stream == '' || university == '' || college == ''|| grade == '' || percentage == '' || pass_year == ''){

                                if(board_higher_secondary == '' && board_secondary == '' && board_primary == ''){ 
                                alert("please fill out details");
                                 return false;
                            
                             }
                             else{
                                window.location = "<?php echo base_url() ?>job/job_project_update";
                             }
                             }
                             else{
                                window.location = "<?php echo base_url() ?>job/job_project_update";
                             }

                        }
                    </script>



                    <script type="text/javascript">
                        $(".alert").delay(3200).fadeOut(300);
                    </script>
<!--                    <style type="text/css">   
                        .clonedInput{  
                            border-bottom: 2px solid #060606;   
                        } 
                    </style>-->
                    <script type="text/javascript">
                        function delete_job_exp(grade_id) {
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() . "job/job_edu_delete" ?>',
                                data: 'grade_id=' + grade_id,
                                // dataType: "html",
                                success: function (data) {
                                    if (data == 'ok') {
                                        $('.job_work_edit_' + grade_id).remove();
                                    }
                                }
                            });
                        }
                    </script>
                    <style type="text/css">
                        .job_work_experience_main_div{
                            margin-top: 10px;
                               border-bottom: 2px solid #d9d9d9;
    margin-bottom: 20px;
    display: inline-block;
                        }
                        .img_remove img{display: none!important;}
                    </style>