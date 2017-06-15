<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
 --><link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<?php if($jobdata[0]['job_step'] == 10){ ?>
<?php echo $job_header2_border; ?>
<?php } ?>
<!-- END HEADER -->
<div class="js">
<body class="page-container-bg-solid page-boxed">
<div id="preloader"></div>

    <section>

        <div class="user-midd-section" id="paddingtop_fixed_job">
            <div class="common-form1">
                <div class="col-md-3 col-sm-4"></div>

                <?php
                $userid = $this->session->userdata('aileenuser');

                $contition_array = array('user_id' => $userid, 'status' => '1');
                $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($jobdata[0]['job_step'] == 10) { ?>
                  
                  <div class="col-md-6 col-sm-8"><h3>You are updating your Job Profile.</h3></div>
            
               <?php } else {
                    ?>
                    <div class="col-md-6 col-sm-8"><h3>You are making your Job Profile.</h3></div>

                <?php } ?>
                <br>
                <br>
            </div>
       
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul class="left-form-each">
                                <li class="custom-none"><a href="<?php echo base_url('job/job_basicinfo_update'); ?>">Basic Information</a></li>

                                <li class="custom-none"><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                <li class="custom-none"><a href="<?php echo base_url('job/job_education_update'); ?>">Educational Qualification</a></li>


                                <li class="custom-none"><a href="<?php echo base_url('job/job_project_update'); ?>">Project And Training / Internship</a></li>

                                <li class="custom-none"><a href="<?php echo base_url('job/job_skill_update'); ?>">Professional Skills</a></li>

                                <!-- <li class="custom-none"><a href="<?php //echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li> -->

                                <li <?php if ($this->uri->segment(1) == 'job') { ?> class="active init" <?php } ?>><a href="#">Work Experience</a></li>

                                <li class="custom-none <?php
                                if ($jobdata[0]['job_step'] < '7') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_curricular_update'); ?>">Extra Curricular Activities</a></li>

                                <li class="custom-none <?php
                                if ($jobdata[0]['job_step'] < '8') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_reference_update'); ?>">Interest & Reference</a></li>

                                <li class="custom-none <?php
                                if ($jobdata[0]['job_step'] < '9') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Carrier Objectives</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- middle section start -->
                    <div class="col-md-6 col-sm-8">

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

                        <div class="clearfix">
                            


                                <div class="col-md-12 col-sm-12 ">
                                    <div class="clearfix">
                                        <div class="common-form common-form_border">
                                            <h3>Work Experience</h3>
                                            <div class="tablet-hi">
                                                <a href="javascript:void(0)" tabindex="1"  class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Fresher</a>
                                                <a href="javascript:void(0)"  class="tablinks active2" onclick="openCity(event, 'Paris')">Experience</a>
                                            </div>                                 


                                            <div id="London" class="tabcontent1">
                                                <?php echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix')); ?>
                                                <div>
                                                    <span style="color:#7f7f7e;">( </span><span  class="red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                                </div>
                                                <?php //echo $userdata[0]['experience']; die(); ?> 
                                                <label for="Fresher">
                        <input type="checkbox" id="fresher" name="radio" value="Fresher" <?php echo ($userdata[0]['experience'] == 'Fresher') ? 'checked' : '' ?>>
                                                    Fresher&nbsp;&nbsp;
                                                </label>
                                                <fieldset class="hs-submit full-width left_nest">

                                                    <input type="submit" id="next" tabindex="2" name="next" value="Next" onclick="document.getElementById('experience1')[0].style.display = 'block';">


                                                </fieldset>
                                                <?php echo form_close(); ?>
                                            </div>





                         <div id="Paris" class="tabcontent1">
                             <?php echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform1', 'name' => 'jobseeker_regform1', 'class' => 'clearfix')); ?>       
                                                <div>
                                                     <span style="color:#7f7f7e;">( </span><span class="red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                                </div>
                                                <?php
                                                $clone_mathod_count = 1;
                                                if ($workdata) {

                                                    $count = count($workdata);

                                                    if ($count == 0) {
                                                        // this is use for javascript
                                                        $clone_mathod_count = 1;
                                                    } else {
                                                        $clone_mathod_count = $count;
                                                    }

                                                    for ($x = 0; $x < $count; $x++) {

                                                        $experience_year1 = $workdata[$x]['experience_year'];
                                                        $experience_month1 = $workdata[$x]['experience_month'];
                                                        $jobtitle1 = $workdata[$x]['jobtitle'];
                                                        $companyname1 = $workdata[$x]['companyname'];
                                                        $companyemail1 = $workdata[$x]['companyemail'];
                                                        $companyphn1 = $workdata[$x]['companyphn'];
                                                        $work_certificate1 = $workdata[$x]['work_certificate'];
                                                        $y = $x + 1;
                                                        ?>
                                                        <input type="hidden" name="exp_data[]" value="old" class="exp_data" id="exp_data<?php echo $y; ?>">
                                                        <div id="input<?php echo $y; ?>" style="margin-bottom:4px;" class="clonedInput job_work_edit_<?php echo $workdata[$x]['work_id']?>">
                                                            <div class="job_work_experience_main_div">


                                                                <fieldset class="two-select-box full-width" style="padding: 0px;"> 
                                                                    <label>Experience<span class="red">*</span></label>
        <select style="width: 46%; margin-right: 43px; float: left;" tabindex="1" autofocus name="experience_year[]" id="experience_year<?php echo $y; ?>" class="experience_year keyskil">
                                                                        <option value="0 year" selected option disabled>Year</option>
                                                                        <option value="0 year"  <?php if ($experience_year1 == "0 year") echo 'selected'; ?>>0 year</option>
                                                                        <option value="1 year"  <?php if ($experience_year1 == "1 year") echo 'selected'; ?>>1 year</option>
                                                                        <option value="2 year"  <?php if ($experience_year1 == "2 year") echo 'selected'; ?>>2 year</option>
                                                                        <option value="3 year"  <?php if ($experience_year1 == "3 year") echo 'selected'; ?>>3 year</option>
                                                                        <option value="4 year"  <?php if ($experience_year1 == "4 year") echo 'selected'; ?>>4 year</option>
                                                                        <option value="5 year"  <?php if ($experience_year1 == "5 year") echo 'selected'; ?>>5 year</option>
                                                                        <option value="6 year"  <?php if ($experience_year1 == "6 year") echo 'selected'; ?>>6 year</option>
                                                                        <option value="7 year"  <?php if ($experience_year1 == "7 year") echo 'selected'; ?>>7 year</option>  
                                                                        <option value="8 year"  <?php if ($experience_year1 == "8 year") echo 'selected'; ?>>8 year</option>
                                                                        <option value="9 year"  <?php if ($experience_year1 == "9 year") echo 'selected'; ?>>9 year</option> 
                                                                        <option value="10 year"  <?php if ($experience_year1 == "10 year") echo 'selected'; ?>>10 year</option>
                                                                        <option value="11 year"  <?php if ($experience_year1 == "11 year") echo 'selected'; ?>>11 year</option> 
                                                                        <option value="12 year"  <?php if ($experience_year1 == "12 year") echo 'selected'; ?>>12 year</option>
                                                                        <option value="13 year"  <?php if ($experience_year1 == "13 year") echo 'selected'; ?>>13 year</option> 
                                                                        <option value="14 year"  <?php if ($experience_year1 == "14 year") echo 'selected'; ?>>14 year</option>
                                                                        <option value="15 year"  <?php if ($experience_year1 == "15 year") echo 'selected'; ?>>15 year</option>
                                                                        <option value="16 year"  <?php if ($experience_year1 == "16 year") echo 'selected'; ?>>16 year</option>
                                                                        <option value="17 year"  <?php if ($experience_year1 == "17 year") echo 'selected'; ?>>17 year</option>
                                                                        <option value="18 year"  <?php if ($experience_year1 == "18 year") echo 'selected'; ?>>18 year</option>
                                                                        <option value="19 year"  <?php if ($experience_year1 == "19 year") echo 'selected'; ?>>19 year</option>
                                                                        <option value="20 year"  <?php if ($experience_year1 == "20 year") echo 'selected'; ?>>20 year</option>

                                                                    </select>

   <select style="width: 46%;" name="experience_month[]" tabindex="2"   id="experience_month<?php echo $y; ?>" class="experience_month keyskil">
                                                                        <option value="" selected option disabled>Month</option>
                                                                        <option value="0 month"  <?php if ($experience_month1 == "0 month") echo 'selected'; ?>>0 month</option>
                                                                        <option value="1 month"  <?php if ($experience_month1 == "1 month") echo 'selected'; ?>>1 month</option>
                                                                        <option value="2 month"  <?php if ($experience_month1 == "2 month") echo 'selected'; ?>>2 month</option>
                                                                        <option value="3 month"  <?php if ($experience_month1 == "3 month") echo 'selected'; ?>>3 month</option>
                                                                        <option value="4 month"  <?php if ($experience_month1 == "4 month") echo 'selected'; ?>>4 month</option>
                                                                        <option value="5 month"  <?php if ($experience_month1 == "5 month") echo 'selected'; ?>>5 month</option>
                                                                        <option value="6 month"  <?php if ($experience_month1 == "6 month") echo 'selected'; ?>>6 month</option>
                                                                        <option value="7 month"  <?php if ($experience_month1 == "7 month") echo 'selected'; ?>>7 month</option>
                                                                        <option value="8 month"  <?php if ($experience_month1 == "8 month") echo 'selected'; ?>>8 month</option>
                                                                        <option value="9 month"  <?php if ($experience_month1 == "9 month") echo 'selected'; ?>>9 month</option>
                                                                        <option value="10 month"  <?php if ($experience_month1 == "10 month") echo 'selected'; ?>>10 month</option>
                                                                        <option value="11 month"  <?php if ($experience_month1 == "11 month") echo 'selected'; ?>>11 month</option>
                                                                        <option value="12 month"  <?php if ($experience_month1 == "12 month") echo 'selected'; ?>>12 month</option>

                                                                    </select>
                                                                </fieldset>
                                                                <?php echo form_error('experience_year'); ?>
                                                                <?php echo form_error('experience_month'); ?>

                                                                <label  style="    margin-top: 6px;">Job Title<span class="red">*</span></label>
                                                                <input type="text" name="jobtitle[]" tabindex="3"  class="jobtitle" id="jobtitle"  placeholder="Enter Job Title" value="<?php
                                                                if ($jobtitle1) {
                                                                    echo $jobtitle1;
                                                                }
                                                                ?>"/>&nbsp;&nbsp;&nbsp; <!-- <span id="jobtitle-error"> </span> -->
                                                                       <?php echo form_error('jobtitle'); ?>

                                                                <label style="   margin-top: 6px; margin-left: -11px;">Company Name<span class="red">*</span></label>
                                                                <input type="text" name="companyname[]" id="companyname"  class="companyname" placeholder="Enter Company Name" value="<?php
                                                                if ($companyname1) {
                                                                    echo $companyname1;
                                                                }
                                                                ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyname-error"> </span>
                                                                       <?php echo form_error('companyname'); ?>

                                                                <label style="  margin-top: 6px;  margin-left: -11px;">Company Email</label>
                                                                <input type="text" name="companyemail[]" tabindex="4" id="companyemail" class="companyemail" placeholder="Enter Company Email" value="<?php
                                                                if ($companyemail1) {
                                                                    echo $companyemail1;
                                                                }
                                                                ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyemail-error"> </span>


                                                                <label style="  margin-top: 6px;  margin-left: -11px;">Company Phone</label>
                                                                <input type="text" name="companyphn[]" id="companyphn" class="companyphn" placeholder="Enter Company Phone" tabindex="5" value="<?php
                                                                if ($companyphn1) {
                                                                    echo $companyphn1;
                                                                }
                                                                ?>"  onblur="validateForm()" />&nbsp;&nbsp;&nbsp; <span id="companyphn-error"> </span>
                                                                       <?php echo form_error('companyphn'); ?>

                                                                <label style="    margin-top: -14px; display: block;">Experience Certificate</label>

                                                                <input style="width:50%; margin-bottom: 50px; display: inline-block;" type="file" name="certificate[]" id="certificate" tabindex="6" class="certificate" placeholder="CERTIFICATE" />&nbsp;&nbsp;&nbsp; 

                                                                <?php
                                                                if ($work_certificate1) {
                                                                    ?>
                                                                        <div class="img_work_exp" style=" " >
                                                                    <img src="<?php echo base_url($this->config->item('job_work_main_upload_path'). $work_certificate1) ?>" style="width:100px;height:100px;">
</div>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <span id="certificate-error"> </span>
                                                                <?php echo form_error('certificate'); ?>

                                                                <input type="hidden" name="image_hidden_certificate<?php echo $workdata[$x]['work_id']; ?>" value="<?php
                                                                if ($work_certificate1) {
                                                                    echo $work_certificate1;
                                                                }
                                                                ?>">


                                                                <?php if ($y != 1) {
                                                                    ?>
                                                                  
                                                                        <div class="hs-submit full-width fl " style="margin-top: 29px;">
                                                                            <input class="delete_btn" style="min-width: 70px;" type="button" value="Delete" onclick="delete_job_work(<?php echo $workdata[$x]['work_id']; ?>);">
                                                                        </div>
                                                                
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                    ?>

                                                    <div class="hs-submit full-width fl"  style=" width: 100%; text-align: center;">

                                                        <input type="button" tabindex="6" id="btnAdd" value=" + ">
                                                        <input type="button" tabindex="7" id="btnRemove" value=" - " disabled="disabled">
                                                    </div>
                                                    <fieldset class="hs-submit full-width">
               <!--                                     <input type="reset">
                                                   <input type="submit"  id="previous" name="previous" value="previous">-->
                                                        <input style="position: absolute;
    bottom: 8px; 
    right: -183px;" type="submit"  tabindex="8" id="next" name="next" value="Next" onclick="document.getElementById('experience1')[0].style.display = 'block';" >
                                                      <!--<input type="submit"  id="add_workexp" name="add_workexp" value="Add More Work Expierence">--> 


                                                    </fieldset>


                                                    <?php
                                                } else {
                                                    ?>
                                                    <!--clone div start-->              
                                                    <div id="input1" style="margin-bottom:4px;" class="clonedInput">
                                                        <fieldset class="two-select-box full-width" style="padding: 0px; "> 
                                                            <label>Experience<span class="red">*</span></label>
                                                            <select style="width:46%; float: left; margin-right: 43px;" name="experience_year[]" id="experience_year" class="experience_year keyskil">
                                                                <option value="" selected option disabled>Year</option>
                                                                <option value="0 year"  <?php if ($experience_year1 == "0 year") echo 'selected'; ?>>0 year</option>
                                                                <option value="1 year"  <?php if ($experience_year1 == "1 year") echo 'selected'; ?>>1 year</option>
                                                                <option value="2 year"  <?php if ($experience_year1 == "2 year") echo 'selected'; ?>>2 year</option>
                                                                <option value="3 year"  <?php if ($experience_year1 == "3 year") echo 'selected'; ?>>3 year</option>
                                                                <option value="4 year"  <?php if ($experience_year1 == "4 year") echo 'selected'; ?>>4 year</option>
                                                                <option value="5 year"  <?php if ($experience_year1 == "5 year") echo 'selected'; ?>>5 year</option>
                                                                <option value="6 year"  <?php if ($experience_year1 == "6 year") echo 'selected'; ?>>6 year</option>
                                                                <option value="7 year"  <?php if ($experience_year1 == "7 year") echo 'selected'; ?>>7 year</option>  
                                                                <option value="8 year"  <?php if ($experience_year1 == "8 year") echo 'selected'; ?>>8 year</option>
                                                                <option value="9 year"  <?php if ($experience_year1 == "9 year") echo 'selected'; ?>>9 year</option> 
                                                                <option value="10 year"  <?php if ($experience_year1 == "10 year") echo 'selected'; ?>>10 year</option>
                                                                <option value="11 year"  <?php if ($experience_year1 == "11 year") echo 'selected'; ?>>11 year</option> 
                                                                <option value="12 year"  <?php if ($experience_year1 == "12 year") echo 'selected'; ?>>12 year</option>
                                                                <option value="13 year"  <?php if ($experience_year1 == "13 year") echo 'selected'; ?>>13 year</option> 
                                                                <option value="14 year"  <?php if ($experience_year1 == "14 year") echo 'selected'; ?>>14 year</option>
                                                                <option value="15 year"  <?php if ($experience_year1 == "15 year") echo 'selected'; ?>>15 year</option>
                                                                <option value="16 year"  <?php if ($experience_year1 == "16 year") echo 'selected'; ?>>16 year</option>
                                                                <option value="17 year"  <?php if ($experience_year1 == "17 year") echo 'selected'; ?>>17 year</option>
                                                                <option value="18 year"  <?php if ($experience_year1 == "18 year") echo 'selected'; ?>>18 year</option>
                                                                <option value="19 year"  <?php if ($experience_year1 == "19 year") echo 'selected'; ?>>19 year</option>
                                                                <option value="20 year"  <?php if ($experience_year1 == "20 year") echo 'selected'; ?>>20 year</option>

                                                            </select>


                                                            <select style="width:46%;" name="experience_month[]" id="experience_month" class="experience_month keyskil">
                                                                <option value="" selected option disabled>Month</option>
                                                                <option value="0 month"  <?php if ($experience_month1 == "0 month") echo 'selected'; ?>>0 month</option>
                                                                <option value="1 month"  <?php if ($experience_month1 == "1 month") echo 'selected'; ?>>1 month</option>
                                                                <option value="2 month"  <?php if ($experience_month1 == "2 month") echo 'selected'; ?>>2 month</option>
                                                                <option value="3 month"  <?php if ($experience_month1 == "3 month") echo 'selected'; ?>>3 month</option>
                                                                <option value="4 month"  <?php if ($experience_month1 == "4 month") echo 'selected'; ?>>4 month</option>
                                                                <option value="5 month"  <?php if ($experience_month1 == "5 month") echo 'selected'; ?>>5 month</option>
                                                                <option value="6 month"  <?php if ($experience_month1 == "6 month") echo 'selected'; ?>>6 month</option>
                                                                <option value="7 month"  <?php if ($experience_month1 == "7 month") echo 'selected'; ?>>7 month</option>
                                                                <option value="8 month"  <?php if ($experience_month1 == "8 month") echo 'selected'; ?>>8 month</option>
                                                                <option value="9 month"  <?php if ($experience_month1 == "9 month") echo 'selected'; ?>>9 month</option>
                                                                <option value="10 month"  <?php if ($experience_month1 == "10 month") echo 'selected'; ?>>10 month</option>
                                                                <option value="11 month"  <?php if ($experience_month1 == "11 month") echo 'selected'; ?>>11 month</option>
                                                                <option value="12 month"  <?php if ($experience_month1 == "12 month") echo 'selected'; ?>>12 month</option>

                                                            </select>
                                                        </fieldset>
                                                        <!-- <fieldset> -->                                         <?php echo form_error('experience_year'); ?>
                                                        <?php echo form_error('experience_month'); ?>
                                                        <!-- /fieldset>
                                                        
                                                                                                <fieldset class="full-width"> -->
                                                        <label style="    margin-top: 6px;">Job Title<span class="red">*</span></label>
                                                        <input type="text" name="jobtitle[]"  class="jobtitle" id="jobtitle"  placeholder="Enter Job Title" value="<?php
                                                        if ($jobtitle1) {
                                                            echo $jobtitle1;
                                                        }
                                                        ?>"/>&nbsp;&nbsp;&nbsp; <!-- <span id="jobtitle-error"> </span> -->
                                                               <?php echo form_error('jobtitle'); ?>
                                                        </fieldset> 


                                        <!--                                     <fieldset <?php if ($companyname) { ?> class="error-msg" <?php } ?>> 
                                                        -->                         <!--  <fieldset class="full-width">  -->             
                                                        <label style=" margin-top: 6px;   margin-left: -11px;">Company Name<span class="red">*</span></label>
                                                        <input type="text" name="companyname[]" id="companyname"  class="companyname" placeholder="Enter Company Name" value="<?php
                                                        if ($companyname1) {
                                                            echo $companyname1;
                                                        }
                                                        ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyname-error"> </span>
                                                               <?php echo form_error('companyname'); ?>
                                                        <!-- </fieldset> -->
                                                        <!-- </fieldset>   
                                                        -->

                                                        <!--  <fieldset > -->
                                                        <label style="   margin-top: 6px; margin-left: -11px;">Company Email</label>
                                                        <input type="text" name="companyemail[]" id="companyemail" class="companyemail" placeholder="Enter Company Email" value="<?php
                                                        if ($companyemail1) {
                                                            echo $companyemail1;
                                                        }
                                                        ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyemail-error"> </span>

                                                        <!--   </fieldset>
                        
                                                               <fieldset >  -->
                                                        <label style="  margin-top: 6px;  margin-left: -11px;">Company Phone</label>
                                                        <input type="text" name="companyphn[]" id="companyphn" class="companyphn" placeholder="Enter Company Phone" value="<?php
                                                        if ($companyphn1) {
                                                            echo $companyphn1;
                                                        }
                                                        ?>"  onblur="validateForm()" />&nbsp;&nbsp;&nbsp; <span id="companyphn-error"> </span>
                                                               <?php echo form_error('companyphn'); ?>
                                                        <!--  </fieldset>
                     
                                                          <fieldset class="full-width"> -->
                                                        <label style="      margin-top: -14px;  display: block;">Experience Certificate</label>
                                                        <input style="width: 50%; margin-bottom: 10px; display: inline-block;" type="file" name="certificate[]" id="certificate" class="certificate" placeholder="CERTIFICATE" />&nbsp;&nbsp;&nbsp; 

                                                        <?php
                                                        if ($work_certificate1) {
                                                            ?>
                                                                <div class="img_work_exp" style="">
                                                            <img src="<?php echo base_url($this->config->item('job_work_main_upload_path'). $work_certificate1) ?>" style="width:100px;height:100px;">
</div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <span id="certificate-error"> </span>
                                                        <?php echo form_error('certificate'); ?>
                                                        <!--  </fieldset> -->
                                                    </div> 
                                                    <!--clone div End-->
                                                    <div class="hs-submit full-width fl" style="width: 100%; text-align: center;">

                                                        <input type="button" id="btnAdd" value=" + ">
                                                        <input type="button" id="btnRemove" value=" - " disabled="disabled">
                                                    </div>
                                                    <fieldset class="hs-submit full-width"> 
                                                        <input style="position: absolute;
    bottom: 8px;
    right: -183px;" type="submit" id="next" name="next" value="Next" onclick="document.getElementById('experience1')[0].style.display = 'block';">
                                                    </fieldset> 

                                                    <?php echo form_close(); ?> 
                                                </div>


                                                <?php // echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform2','name' => 'jobseeker_regform2','class'=>'clearfix'));    ?>         
                                         <!--<input type="submit" id="previous" name="previous" value="previous">-->
                                                <?php // echo form_close();    ?>                                 

                                                <?php
                                            }
                                            ?>
                                        </div>    
                                    </div>
                                </div>

                                <!-- middle section end -->


                            </div>
                        </div>
                    </div>

                    </section>
                    <!-- END CONTAINER -->

                    </body>
                    </html>



                    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('js/jquery-ui.js') ?>"></script>
                    <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>

                    <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
                    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
                    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
                  
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

                <script>

var data1= <?php echo json_encode($city_data); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#searchplace" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data1, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#searchplace").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#searchplace").val(ui.item.label);
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

                   <!--  <script>
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

                    </script> -->
                    <!-- duplicate div end -->
         <!-- <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script> -->
                <script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script> 
<script type="text/javascript">
    
    function validateForm(){

  var z = document.forms["jobseeker_regform1"]["companyphn"].value;

  if(!/^[0-9]+$/.test(z)){
    alert("Please only enter numeric characters")
  }

}
</script>


<script type="text/javascript">

                        //validation for edit email formate form


    //                     jQuery.validator.addMethod("noSpace", function(value, element) { 
    //   return value == '' || value.trim().length != 0;  
    // }, "No space please and don't leave it empty");


                        
    $(document).ready(function () {

$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Only space, only number and only special characters are not allow");


$.validator.addMethod("regx1", function(value, element, regexpr) {          
    //return value == '' || value.trim().length != 0; 
     if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }
     // return regexpr.test(value);
}, "Only space, only number and only special characters are not allow");
 

                        

                            $("#jobseeker_regform1").validate({

                                ignore: ":hidden",

                                rules: {

                                    'jobtitle[]': {
                                        required: true,
                                        regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                                        //noSpace: true
                                    },
                                    'companyname[]': {

                                        required: true,
                                        regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                                        //noSpace: true
                                    },
                                    // 'experience_year[]': {

                                    //     required: true,
                                    // },
                                    // 'experience_month[]': {

                                    //     required: true,

                                    // },  
                                     'experience_year[]': {
                            
                                        require_from_group: [1, ".keyskil"] 
                                         //required:true 
                                           }, 

                                     'experience_month[]': {
                            
                                        require_from_group: [1, ".keyskil"]
                                         // required:true 
                                        },

                                    'companyemail[]': {
                                        email: true,
                                    },
                                    // 'companyphn[]': {
                                         
                                    //     regx: /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/
                                    // },
                                },
                                messages: {

                                    'jobtitle[]': {

                                        required: "Job title Is Required.",
                                    },
                                    'companyname[]': {

                                        required: "Company name Is Required.",
                                    },
                                    'experience_year[]': {

                                      require_from_group: "You must either fill out 'month' or 'year'"
                                    },
                                     'experience_month[]': {

                                   require_from_group: "You must either fill out 'month' or 'year'"

                                    },
                                    'companyemail[]': {

                                        email: "Please Enter Valid Email Id.",
                                    },

                                    //  'companyphn[]': {
                                    //      required: "Please Enter Numeric Value."
                                    // },
                                }

                            });
                        });
                    </script>

<script type="text/javascript">                     

    $(document).ready(function () {

$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Only space, only number and only special characters are not allow");

                        

                            $("#jobseeker_regform").validate({

                                ignore: ":hidden",

                                rules: {

                                    'radio': {
                                        required: true,
                                       
                                        //noSpace: true
                                    }  
                                    
                                },
                                messages: {

                                    'radio': {

                                        required: "Please Tick mark Fresher or Fill Experiance",
                                    },
                                    
                                    
                                   
                                }

                            });
                        });
                    </script>



                    <!--javascript for fresher and experience radio button End -->

                    <!-- Clone input type start-->
                    <script>

                        $('#btnRemove').attr('disabled', 'disabled');
                        $('#btnAdd').click(function () {
                            var num = $('.clonedInput').length;
                            var newNum = new Number(num + 1);
                            if (newNum > 5)
                            {
                                $('#btnAdd').attr('disabled', 'disabled');
                                alert("You Can add only 5 fields");
                                return false;
                            }
                            var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
                            newElem.children('.exp_data').attr('id', 'exp_data' + newNum).attr('name', 'exp_data[]').attr('value', 'new');
                            newElem.children('.experience_year').attr('id', 'experience_year' + newNum).attr('name', 'experience_year[]').val();
                            newElem.children('.experience_month').attr('id', 'experience_month' + newNum).attr('name', 'experience_month[]').val();
                            newElem.children('.jobtitle').attr('id', 'jobtitle' + newNum).attr('name', 'jobtitle[]');
                            newElem.children('.companyname').attr('id', 'companyname' + newNum).attr('name', 'companyname[]');
                            newElem.children('.companyemail').attr('id', 'companyemail' + newNum).attr('name', 'companyemail[]');
                            newElem.children('.companyphn').attr('id', 'companyphn' + newNum).attr('name', 'companyphn[]');
                            newElem.children('.certificate').attr('id', 'certificate' + newNum).attr('name', 'certificate[]').val();
                            $('#input' + num).after(newElem);
                            $('#btnRemove').removeAttr('disabled', 'disabled');
                            $('#input' + newNum + ' .experience_year').val('');
                            $('#input' + newNum + ' .experience_month').val('');
                            $('#input' + newNum + ' .hs-submit').remove();
                            $("#input" + newNum + ' img').remove();
                            $("#input" + newNum + ' .img_work_exp').remove();

                            
                        });
                        
                        $('#btnRemove').on('click', function () {

                            var num = $('.clonedInput').length;
                            if (num - 1 == <?php echo $clone_mathod_count; ?>)
                            {

                                $('#btnRemove').attr('disabled', 'disabled');
                            }
                            $('.clonedInput').last().remove();
                        });
                        $('#btnAdd').on('click', function () {

                            $('.clonedInput').last().add().find("input:text").val("");
                        });
                    </script>
                    <!-- Clone input type End-->


                    <script>
                        function openCity(evt, cityName) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent1");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }
                            tablinks = document.getElementsByClassName("tablinks");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].className = tablinks[i].className.replace(" active2", "");
                            }
                            document.getElementById(cityName).style.display = "block";
                            evt.currentTarget.className += " active2";
                        }

                        // Get the element with id="defaultOpen" and click on it
                        document.getElementById("defaultOpen").click();
                    </script>

                    <script type="text/javascript">
                        $(".alert").delay(3200).fadeOut(300);
                    </script>

                    <style type="text/css">
                        .job_work_experience_main_div{
                            margin-top: 10px;
                               border-bottom: 2px solid #d9d9d9;
    margin-bottom: 20px;
                        }
                    </style>

                    <script type="text/javascript">
                        function delete_job_work(work_id) {
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() . "job/jon_work_delete" ?>',
                                data: 'work_id=' + work_id,
                               // dataType: "html",
                                success: function (data) {
                                    if(data == 'ok'){
                                        $('.job_work_edit_' + work_id).remove();
                                    }
                                }
                            });
                        }
                    </script>
                    
                    <style type="text/css">
                        .hs-submit img{
                        display: none !important;
                        }
                    </style>
                    <script type="text/javascript">
  jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
  $('#preloader').fadeOut('slow',function(){$(this).remove();});
});
});
</script>

<style type="text/css">
    #experience_month-error{margin-top: 40px;}
    #experience_year-error{margin-top: 40px;}
    #jobtitle-error{margin-right: 25px;}
    #companyname-error{margin-right: 25px;}
</style>

                   