<?php echo $head; ?>


<!-- select 2 validation border start -->
<!-- css for date picker start-->
<style type="text/css">

.date-dropdowns .day, .date-dropdowns .month, .date-dropdowns .year{width: 30%; float: left; margin-right: 5%;}
.date-dropdowns .year{margin-right: 0;}
.example {
    width: 33%;
    min-width: 400px;
    padding: 15px;
    display: inline-block;
    box-sizing: border-box;
    text-align: center;
}

.example:first-of-type {
    position: relative;
    bottom: 35px;
}

/* Example Heading */
.example h2 {
    font-family: "Roboto Condensed", helvetica, arial, sans-serif;
    font-size: 1.3em;
    margin: 15px 0;
    color: #4F5462;
}

.example input {
    display: block;
    margin: 0 auto 20px auto;
    width: 150px;
    padding: 8px 10px;
    border: 1px solid #CCCCCC;
    border-radius: 3px;
    background: #F2F2F2;
    text-align: center;
    font-size: 1em;
    letter-spacing: 0.02em;
    font-family: "Roboto Condensed", helvetica, arial, sans-serif;
}

.example select {
    padding: 10px;
    background: #ffffff;
    border: 1px solid #CCCCCC;
    border-radius: 3px;
    margin: 0 3px;
}

.example select.invalid {
    color: #E9403C;
}

.example input[type="submit"] {
    margin-top: 10px;
}

.example input[type="submit"]:hover {
    cursor: pointer;
    background-color: #e5e5e5;
}


</style>
<!-- css for date picker end-->

 


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> 
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
 <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.fancybox.css" /> 


   <!-- This Css is used for call popup -->
   <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />


<!-- <script src="<?php //echo base_url('js/fb_login.js'); ?>"></script> -->
 
<?php echo $header; ?>

<!-- END HEADER -->
<?php echo $recruiter_header2_border; ?>
<!-- style for span id=notification_count start-->
<style type="text/css">

/* Layout helpers
----------------------------------*/
.ui-helper-hidden {
  display: none;
}
.ui-helper-hidden-accessible {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.ui-front {
  z-index: 100;
}



/* Misc visuals
----------------------------------*/

/* Overlays */
.ui-widget-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.ui-autocomplete {
  position: absolute;
  top: 0;
  left: 0;
  cursor: default;
}

.ui-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  display: block;
  outline: none;
}
.ui-menu .ui-menu {
  position: absolute;
}
.ui-menu .ui-menu-item {
  position: relative;
  margin: 0;
  padding: 3px 1em 3px .4em;
  cursor: pointer;
  min-height: 0; /* support: IE7 */
  /* support: IE10, see #8844 */
  list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
}
.ui-menu .ui-menu-divider {
  margin: 5px 0;
  height: 0;
  font-size: 0;
  line-height: 0;
  border-width: 1px 0 0 0;
}
.ui-menu .ui-state-focus,
.ui-menu .ui-state-active {
  margin: -1px;
}

/* Component containers
----------------------------------*/
.ui-widget {
  font-family: Verdana,Arial,sans-serif;
  font-size: 1.1em;
}
.ui-widget .ui-widget {
  font-size: 1em;
}
.ui-widget input,
.ui-widget select,
.ui-widget textarea,
.ui-widget button {
  font-family: Verdana,Arial,sans-serif;
  font-size: 1em;
}
.ui-widget-content {
  border: 1px solid #aaaaaa;
  background: #ffffff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x;
  color: #222222;
}
.ui-widget-content a {
  color: #222222;
}
.ui-widget-header {
  border: 1px solid #aaaaaa;
  background: #cccccc url("images/ui-bg_highlight-soft_75_cccccc_1x100.png") 50% 50% repeat-x;
  color: #222222;
  font-weight: bold;
}
.ui-widget-header a {
  color: #222222;
}

/* Interaction states
----------------------------------*/
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
  border: 1px solid #d3d3d3;
  background: #e6e6e6 url("images/ui-bg_glass_75_e6e6e6_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #555555;
}

.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
  border: 1px solid #999999;
  background: #dadada url("images/ui-bg_glass_75_dadada_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #212121;
}

.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
  border: 1px solid #aaaaaa;
  background: #ffffff url("images/ui-bg_glass_65_ffffff_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #212121;
}

  </style>
<body>

    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2"> 
                        <div  class="add-post-button">

                        
                        </div></div>
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
                            <div class="job-saved-box">
                                <h3>Add New Job Post</h3>

                               <?php echo form_open(base_url('recruiter/add_post_store'), array('id' => 'artpost', 'name' => 'artpost', 'class' => 'clearfix form_addedit', 'onsubmit' => "return imgval()")); ?>


                          <div> <span class="required_field" >( <span style="color: red">*</span> ) Indicates required field</span></div>
                                <?php
                                $postname = form_error('postname');
                                $skills1 = form_error('skills1');
                                $description = form_error('description');
                                $postattach = form_error('postattach');
                                $degree1 = form_error('education1');


                                ?>
                                <fieldset class="full-width"<?php if ($post_name) { ?> class=" error-msg" <?php } ?> >
                                    <label class="control-label">Job Title:<span style="color:red">*</span></label>
                                   <!--  <input name="post_name" tabindex="1" autofocus type="text" id="post_name" placeholder="Position [Ex:- Sr. Engineer, Jr. Engineer]" /> -->
                                     <input type="search" tabindex="1" autofocus id="post_name" name="post_name" value="" placeholder="Position [Ex:- Sr. Engineer, Jr. Engineer]" style="text-transform: capitalize;" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" maxlength="255">
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('post_name'); ?>
                                </fieldset>

                            
                                  <fieldset class="full-width" <?php if ($skills) { ?> class="error-msg" <?php } ?>>
                                    <label class="control-label">Skills<span style="color:red">*</span>:</label>

                                    <input id="skills2" name="skills" tabindex="7" size="90" placeholder="Enter SKills">

                                    <!-- <select class="skill_other full-width" name="skills[]" tabindex="2" id="skills" multiple="multiple">

                                      <option></option>

                                 <?php //foreach ($skill as $ski) { ?>
                                  <option value="<?php //echo $ski['skill_id']; ?>"><?php// echo $ski['skill']; ?></option>
                                 <?php //} ?>
                                    </select>  -->
                                    <?php echo form_error('skills'); ?>
                                </fieldset>
                                 
                                
                              <!--   <fieldset class="full-width" <?php //if ($other_skill) { ?> class="error-msg" <?php//} ?> >
                                    <label class="control-label">Other Skill: --><!-- <span style="color:red">*</span> --><!-- </label>
                                    <input name="other_skill" type="text" class="skill_other" tabindex="3" id="other_skill" placeholder="Enter Your Skill" />
                                    <span id="fullname-error"></span>
                                    <?php //echo form_error('other_skill'); ?> -->
                                </fieldset>
                                <!--  </div> -->
                                      <fieldset class="full-width" <?php if ($position) { ?> class="error-msg" <?php } ?>>
                                    <label class="control-label">No of Position:<span style="color:red">*</span> </label>
                                    <input name="position_no" type="text"  id="position" value="1" tabindex="4" placeholder="Enter No of Candidate"/>
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('position'); ?>        
                                </fieldset>


                                <fieldset <?php if ($month) { ?> class="error-msg" <?php } ?> class="two-select-box1">
                                
                                <label style="cursor:pointer;" class="control-label">Minimum experience:<span style="color:red">*</span></label>


                            <select name="minyear" style="cursor:pointer;" class="keyskil" id="minyear" tabindex="5">
                                        <option value="" selected option disabled>Year</option>
                                        
                                         <option value="0">0 Year</option>
                                        <option value="0.5">0.5 Year</option>
                                        <option value="1">1 Year</option>
                                        <option value="1.5">1.5 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="2.5"> 2.5 Year</option>
                                        <option value="3">3 Year</option>
                                        <option value="4">4 Year</option>
                                        <option value="5">5 Year</option>
                                        <option value="6">6 Year</option>
                                        <option value="7">7 Year</option>
                                        <option value="8">8 Year</option>
                                        <option value="9">9 Year</option>
                                        <option value="10">10 Year</option>
                                        <option value="11">11 Year</option>
                                        <option value="12">12 Year</option>
                                        <option value="13">13 Year</option>
                                        <option value="14">14 Year</option>
                                        <option value="15">15 Year</option>
                                        <option value="16">16 Year</option>
                                        <option value="17">17 Year</option>
                                        <option value="18">18 Year</option>
                                        <option value="19">19 Year</option>
                                        <option value="20">20 Year</option>
                                    </select>
                   
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('month'); ?> &nbsp;&nbsp; <?php echo form_error('year'); ?>

                                </fieldset>


                                <fieldset <?php if ($month) { ?> class="error-msg" <?php } ?> class="two-select-box1">
                                    <label style="cursor:pointer;" class="control-label">&nbsp;Maximum experience:<span style="color:red">*</span></label>


                                      <select tabindex="7" name="maxyear" style="cursor:pointer;" class="keyskil1" id="maxyear">
                                        <option value="" selected option disabled>Year</option>
                                         <option value="0">0 Year</option>
                                        <option value="0.5">0.5 Year</option>
                                        <option value="1">1 Year</option>
                                        <option value="1.5">1.5 Year</option>
                                        <option value="2">2 Year</option>
                                        <option value="2.5"> 2.5 Year</option>
                                        <option value="3">3 Year</option>
                                        <option value="4">4 Year</option>
                                        <option value="5">5 Year</option>
                                        <option value="6">6 Year</option>
                                        <option value="7">7 Year</option>
                                        <option value="8">8 Year</option>
                                        <option value="9">9 Year</option>
                                        <option value="10">10 Year</option>
                                        <option value="11">11 Year </option>
                                        <option value="12">12 Year </option>
                                        <option value="13">13 Year </option>
                                        <option value="14">14 Year </option>
                                        <option value="15">15 Year </option>
                                        <option value="16">16 Year </option>
                                        <option value="17">17 Year </option>
                                        <option value="18">18 Year </option>
                                        <option value="19">19 Year </option>
                                        <option value="20">20 Year </option>
                                    </select>

                                   <span id="fullname-error"></span>
                                    <?php echo form_error('month'); ?> &nbsp;&nbsp; <?php echo form_error('year'); ?>
                                </fieldset>

                                <fieldset class="rec_check form-group full-width">
                                    <input  type="checkbox" tabindex="9" name="fresher" value="1"> Fresher can also apply..!
                                </fieldset>

                                <fieldset class="" <?php if($industry) {  ?> class="error-msg" <?php } ?> class="two-select-box"> 
                             <label>Industry:<span style="color:red">*</span></label>
                            <select name="industry" id="industry" tabindex="18">

                               <option value="" selected option disabled>Select Industry</option>
                                 
                            <?php foreach($industry as $indu){ ?>
                             <option value="<?php echo $indu['industry_id']; ?>"><?php echo $indu['industry_name']; ?></option>
                             <?php } ?>

                           <option value="<?php echo $industry_otherdata[0]['industry_id']; ?> "><?php echo $industry_otherdata[0]['industry_name']; ?></option>    
                             </select>

          
                             <?php echo form_error('industry'); ?>
                             </fieldset>


                               <fieldset <?php if ($emp_type) { ?> class="error-msg" <?php } ?> class="two-select-box1">
                                
                                <label style="cursor:pointer;" class="control-label">Employment Type:</label>


                                   <select name="emp_type" style="cursor:pointer;" class="keyskil" id="emp_type">
                                        <option value="" selected option disabled>Employment Type</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                    
                         
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('emp_type'); ?> &nbsp;&nbsp; <?php echo form_error('emp_type'); ?>

                                </fieldset>


                             <fieldset id="erroe_nn" <?php if ($degree1) { ?> class="error-msg" <?php } ?>>
                                    <label>Education:</label> 

                                  <select name="education[]" id ="education" multiple="multiple" style="width: 100%"  tabindex="8">
                                  <option></option>

                                 <?php foreach ($degree as $deg) { ?>
                                  <option value="<?php echo $deg['degree_id']; ?>"><?php echo $deg['degree_name']; ?></option>
                                 <?php } ?>
                                 </select>
                                <?php echo form_error('education'); ?>

                                 </fieldset>


                                <fieldset>
                                    <label class="control-label">Other Education:</label>
                                    <input name="other_education" type="text" id="other_education"  placeholder="Enter Other Education" /><span id="fullname-error"></span>
                                <?php echo form_error('other_education'); ?>
                                </fieldset>
                                
                       

                            
                          
                                <fieldset class="form-group full-width">
                                    <label class="control-label">Job description:<span style="color:red">*</span></label>


                                 <textarea name="post_desc" id="post_desc" tabindex="10" rows="4" cols="50"  placeholder="Enter Job Description" style="resize: none;"></textarea>

                                <?php echo form_error('post_desc'); ?>
                                </fieldset>

                                <fieldset class="form-group full-width">
                                    <label class="control-label">Interview process:<!-- <span style="color:red">*</span> --></label>



                                <textarea name="interview" id="interview" rows="4" tabindex="11" cols="50"  placeholder="Enter Interview Process" style="resize: none;"></textarea>

                                  <?php echo form_error('interview'); ?> 
                                </fieldset>

                                <fieldset <?php if ($country) { ?> class="error-msg" <?php } ?>>
                                    <label >Country:<span style="color:red">*</span></label>
                                    <select style="cursor:pointer;" name="country" id="country" tabindex="12">
                                       <option value="" selected option disabled>Select Country</option>
                                        <?php
                                        if (count($countries) > 0) {
                                            foreach ($countries as $cnt) {
                                                ?>
                                                <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name']; ?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select> 
                                    <?php echo form_error('country'); ?>
                                </fieldset>

                                <fieldset <?php if ($state) { ?> class="error-msg" <?php } ?>>
                                    <label>State:<span style="color:red">*</span></label>
                                    <select style="cursor:pointer;" name="state" id="state" tabindex="13">
                                        <option value="">Select country first</option>
                                    </select>
                                    <?php echo form_error('state'); ?> 
                                </fieldset>

                                <fieldset <?php if ($city) { ?> class="error-msg" <?php } ?>>
                                    <label>City:</label>
                                    <select style="cursor:pointer;" name="city" id="city" tabindex="14">
                                        <option value="">Select state first</option>
                                    </select>

                                </fieldset>

                                 <fieldset <?php if ($salary_type) { ?> class="error-msg" <?php } ?> class="two-select-box1">
                                
                                <label style="cursor:pointer;" class="control-label">Salary Type:</label>


                                   <select name="salary_type" style="cursor:pointer;" class="keyskil" id="salary_type">
                                        <option value="" selected option disabled>Salary Type</option>
                                        <option value="Per Year"> Per Year</option>
                                        <option value="Per Month">Per Month</option>
                                        <option value="Per Week">Per Week</option>
                                        <option value="Per Day">Per Day</option>

                                    </select>
                                    
                         
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('salary_type'); ?> &nbsp;&nbsp; <?php echo form_error('salary_type'); ?>

                                </fieldset>

                           <fieldset class="form-group">
                                    <label class="control-label">Last date for apply:<span style="color:red">*</span></label>

                                    <input type="hidden" id="example2">
 
                                    <?php echo form_error('last_date'); ?> 
                                </fieldset>

                                <fieldset class=" " <?php if ($minsal) { ?> class="error-msg" <?php } ?>>
                                    <label class="control-label">Min salary:</label>
                                    <input name="minsal" type="text" id="minsal" placeholder="Enter Minimum salary" tabindex="16" /><span id="fullname-error"></span>
                                    <?php echo form_error('minsal'); ?>
                                </fieldset>

                                <fieldset class="" <?php if ($maxsal) { ?> class="error-msg " <?php } ?>>
                                    <label class="control-label">Max salary:</label>
                                    <input name="maxsal" type="text" id="maxsal" tabindex="17" placeholder="Enter Maximum salary" /><span id="fullname-error"></span>
                                    <?php echo form_error('maxsal'); ?>
                                </fieldset>

                                 <fieldset class="" <?php if($currency) {  ?> class="error-msg" <?php } ?> class="two-select-box"> 
                               <label>Currency:</label>
                            <select name="currency" id="currency" tabindex="18">

                               <option value="" selected option disabled>Select Currency</option>
                                 
                            <?php foreach($currency as $cur){ ?>
                             <option value="<?php echo $cur['currency_id']; ?>"><?php echo $cur['currency_name']; ?></option>
                             <?php } ?>
                             </select>

          
                             <?php echo form_error('currency'); ?>
                           </fieldset>


                               

                                <input type="hidden" id="tagSelect" tabindex="19" value="brown,red,green" style="width:300px;" />



                                <fieldset  class="hs-submit col-md-12 col-sm-12 col-xs-12">
                                 
                                 <?php if(($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'add_post') || ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'edit_post')){?>
                                
                               
                                 <a class="add_post_btnc" onclick="return leave_page(9)">Cancel</a>
                                 <?php }else{?>

                                 <a class="add_post_btnc" href="javascript:history.back()">Cancel</a>
                                 <?php } ?>

                                
                                  <input type="submit" id="submit" class="add_post_btns" tabindex="20" name="submit" value="Post">
                                   
                                </fieldset>

                            </div>      
                            </form>

                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
    <footer>
<?php echo $footer; ?>
    </footer>      


</body>

</html>

<script>

</script>

<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<!--  <script src="<?php //echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script> 
 -->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
<script src="<?php echo base_url('js/jquery.fancybox.js'); ?>"></script>

<!-- This Js is used for call popup -->

<script type="text/javascript">
$(document).ready(function () {
   
         $("#education").select2({
         placeholder: "Select a Education",
 
        });

          $("#skills").select2({
         placeholder: "Find Your Skills",
 
        });
 
 

});

</script>

<!-- This script always put under fancybox js-->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script> 

<!-- script for date start -->

<script src="<?php echo base_url('js/jquery.date-dropdowns.js'); ?>"></script>


<script>
$(function() {
                

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

var today = yyyy;


                $("#example2").dateDropdowns({
                    submitFieldName: 'last_date',
                    submitFormat: "dd/mm/yyyy",
                    minYear: today,
                    maxYear: today + 1,
                    daySuffixes: false,
                    monthFormat: "short",
                    dayLabel: 'DD',
                    monthLabel: 'MM',
                    yearLabel: 'YYYY',


                    //startDate: today,

                });   
                
            });


</script>

<!-- script for date end -->.

<script type="text/javascript">
  
function imgval(){ 
 
 var skill_main = document.getElementById("skills").value;
 var skill_other = document.getElementById("other_skill").value;

 
     if(skill_main =='' && skill_other == ''){
  
  $('#artpost .select2-selection').addClass("keyskill_border_active").style('border','1px solid #f00');
  }
  }
</script>
<script type="text/javascript">



$.validator.addMethod("regx", function(value, element, regexpr) {          
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

jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");

$.validator.addMethod("reg_candidate", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Float Number Is Not Allowed");

//for min max value validator start

// $.validator.addMethod("greaterThan",
//     function (value, element, param) {
//           var $otherElement = $(param);
//           return parseInt(value, 10) > parseInt($otherElement.val(), 10);
//     });
// $.validator.addMethod("greaterThan",

// function (value, element, param) {
//   var $min = $(param);
//   if (this.settings.onfocusout) {
//     $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
//       $(element).valid();
//     });
//   }
//   return parseInt(value) > parseInt($min.val());
// }, "Max must be greater than min");

$.validator.addMethod("greaterThan",
    function (value, element, param) {
          var $otherElement = $(param);
           if(!value) 
            {
                return true;
            }
            else
            {
          return parseInt(value, 10) > parseInt($otherElement.val(), 10);}
    });

$.validator.addMethod("greaterThan1",

function (value, element, param) {
  var $min = $(param);
  if (this.settings.onfocusout) {
    $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
      $(element).valid();
    });
  }
   if(!value) 
            {
                return true;
            }
            else
            {
                    //return parseInt(value) > parseInt($min.val());
                     return (value) > ($min.val());
            }
}, "Max must be greater than min");



$.validator.addMethod("greaterThanmonth",

function (value, element, param) { 
    //alert(value); alert(element); alert(param);alert("#maxyear");
    var $maxyear = $('#maxyear');
    var maxyear = parseInt($maxyear.val());

    var $minyear = $('#minyear');
    var minyear = parseInt($minyear.val());

  var $min = $(param);
  if (this.settings.onfocusout) {
    $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
      $(element).valid();
    });
  }
if(!value) 
            {
                return true;
            }
            else if((maxyear == minyear))
            {
 //if((maxyear == minyear) ){// alert("gaai");
  return parseInt(value) >= parseInt($min.val());
}
else
{
      return true;
}

}, "Max month must be greater than Min month");



// for date validtaion start

jQuery.validator.addMethod("isValid", function (value, element) {


var todaydate = new Date();
var dd = todaydate.getDate();
var mm = todaydate.getMonth()+1; //January is 0!
var yyyy = todaydate.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

   var todaydate = dd+'/'+mm+'/'+yyyy;

   var lastDate = $("input[name=last_date]").val();
    //alert(lastDate); alert(todaydate);

     lastDate=lastDate.split("/");
     var lastdata_new=lastDate[1]+"/"+lastDate[0]+"/"+lastDate[2];
     var lastdata_new_one = new Date(lastdata_new).getTime();

     todaydate=todaydate.split("/");
     var todaydate_new=todaydate[1]+"/"+todaydate[0]+"/"+todaydate[2];
     var todaydate_new_one = new Date(todaydate_new).getTime();
     

    return lastdata_new_one >= todaydate_new_one;
}, "Last date should be grater than and equal to today date");

//date validation end

//pattern validation at salary start//
   $.validator.addMethod("pattern", function(value, element, param) {
   if (this.optional(element)) {
   return true;
   }
   if (typeof param === "string") {
   param = new RegExp("^(?:" + param + ")$");
   }
   return param.test(value);
   }, "Salary is not in correct format");
   
   //pattern validation at salary end//

            $(document).ready(function () { 
           
        $.validator.addMethod("regnum", function(value, element, regexpr) {          
     return regexpr.test(value);
   }, "Please enter a valid pasword.");      

                $("#artpost").validate({
                  //ignore: [],

                    ignore: '*:not([name])',
                    rules: {
                       
                        post_name: {
                            
                            required: true,
                            regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                            
                        },
                          skills: {
                            
                         required: true,
                         regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                        }, 

                      
                       position_no:{
                            required: true,
                             number:true,
                             min: 1,
                            reg_candidate:/^-?(([0-9]{0,100}))$/,
                            range: [1, 100]
                        },


                         minyear: {
                            
                         required: true
                        }, 
                       
                         post_desc: {

                            required: true,
                          maxlength : 2500
                           
                        },

                        interview: {

                         
                          maxlength : 2500
                           
                        },
                        
                         country: {

                            required: true
                           
                        },
                        state: {

                            required: true
                           
                        },
                        maxyear: {
                            
                          required: true,
                          greaterThan1: "#minyear"
                          //required:true 
                        }, 

                         emp_type: {
                            
                          required: true
                          
                          
                        }, 
                        industry: {
                            
                          required: true
                          
                          
                        }, 


                        last_date: {
                            
                            required: true,
                           isValid: 'Last date should be grater than and equal to today date'
                            
                        },
                        minsal:{
                            //number:true,
                            maxlength:11,
                             pattern: /^([0-9]\d*)(\\d+)?$/

                        },
                        maxsal:{
                            
                             number:true,
                              min: 0,
                             greaterThan: "#minsal",
                            maxlength:11,
                          pattern: /^([0-9]\d*)(\\d+)?$/
                        },
                       
                     },

                    messages: {

                        post_name: {

                            required: "Job title  Is Required."
                        },
                          skills: {

                            required: "Skill  Is Required."
                        },

                      
                         position_no:{
                          required: "You Have TO Select Minimum 1 Candidate"
                        },
                        minyear: {

                             required:  "Minimum Experience is Required"
                        },
                       
                         post_desc: {

                            required: "Post Description Is Required"
                           
                        },
                        country: {

                            required: "Country Is Required."
                            
                        },
                        state: {

                            required: "State Is Required."
                            
                        },
                        maxyear: {

                            required: "Maximum Experience is Required"
                            // greaterThan1:"Maximum Year Experience should be grater than Minimum Year"

                        },

                         industry: {

                            required: "Industry is Required"
                            // greaterThan1:"Maximum Year Experience should be grater than Minimum Year"

                        },

                        emp_type: {

                            required: "Employment Type is Required"
                            // greaterThan1:"Maximum Year Experience should be grater than Minimum Year"

                        },

                        last_date: {

                            required: "Last Date for apply required"
                        },
                       
                        maxsal:{
                            greaterThan:"Maximum salary should be grater than Minimum salary"
                        },
                       


                    }

                });


                   });
  </script>

   <!-- popup form edit start -->

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

<script>

   var data1 = <?php echo json_encode($de); ?>;
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

   var data = <?php echo json_encode($demo); ?>;
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
               $("#tags1").val(ui.item.label);
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

</script>

<script>

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

</script>

<script>
    // job title script start
   var jobdata = <?php echo json_encode($jobtitle); ?>;
   
   $(function () {
    
       $("#post_name").autocomplete({
           source: function (request, response) {
               var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
               response($.grep(jobdata, function (item) {
                   return matcher.test(item.label);
               }));
           },
           minLength: 1,
           select: function (event, ui) {
               event.preventDefault();
               $("#post_name").val(ui.item.label);
               $("#selected-tag").val(ui.item.label);
               // window.location.href = ui.item.value;
           }
           ,
           focus: function (event, ui) {
               event.preventDefault();
               $("#post_name").val(ui.item.label);
           }
       });
   });
   
</script>

 <script>
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        
        $( "#skills2" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON("<?php echo base_url();?>general/get_skill", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 20) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( ", " );
                    return false;
                }else{
                    var last = terms.pop();
                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                    $(this).effect("highlight", {}, 1000);
                    $(this).attr("style","border: solid 1px red;");
                    return false;
                }
            }

  
 
        });
    });
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

        var searchkeyword =$.trim(document.getElementById('tags').value);
        var searchplace =$.trim(document.getElementById('searchplace').value);
        // alert(searchkeyword);
        // alert(searchplace);
        if (searchkeyword == "" && searchplace == "") {
            //alert('Please enter Keyword');
            return false;
        }
    }

    function checkvalue_search() {
       
        var searchkeyword =$.trim(document.getElementById('tags').value);
        var searchplace =$.trim(document.getElementById('searchplace').value);
        // alert(searchkeyword);
        
        if (searchkeyword == "" && searchplace == "") 
        {
          //  alert('Please enter Keyword');
            return false;
        }
    }


//Leave Page on add and edit post page start
    function leave_page(clicked_id)
{
//alert(clicked_id);
 
 var post_name = document.getElementById('post_name').value;
 var skills = document.getElementById('skills2').value;
  var position = document.getElementById('position').value;
 var minyear = document.getElementById('minyear').value;
 var maxyear = document.getElementById('maxyear').value;
 var industry = document.getElementById('industry').value;
 var emp_type = document.getElementById('emp_type').value;
 var education = document.getElementById('education').value;
 var other_education = document.getElementById('other_education').value;
 var post_desc = document.getElementById('post_desc').value;
 var interview = document.getElementById('interview').value;
 var country = document.getElementById('country').value;
 var state = document.getElementById('state').value;
 var city = document.getElementById('city').value;
  var salary_type = document.getElementById('salary_type').value;
 var datepicker = document.getElementById('example2').value;
 var minsal = document.getElementById('minsal').value;
 var maxsal = document.getElementById('maxsal').value;
 var currency = document.getElementById('currency').value;
 
    var searchkeyword =$.trim(document.getElementById('tags').value);
        var searchplace =$.trim(document.getElementById('searchplace').value);
      //   alert(datepicker);
       
 if(post_name=="" && skills=="" && minyear==""  && maxyear=="" && industry=="" && emp_type=="" && education=="" && other_education=="" &&  post_desc=="" && interview=="" && country=="" && state=="" && salary_type=="" && datepicker=="" && minsal=="" && maxsal=="" && currency=="" && searchkeyword =="" && searchplace =="")
 {
    //alert("hi");
    if(clicked_id==1)
    {
            location.href = '<?php echo base_url() ?>recruiter/recommen_candidate';
    }
    if(clicked_id==2)
    {
            location.href = '<?php echo base_url() ?>recruiter/rec_profile';
    }
    if(clicked_id==3)
    {
            location.href = '<?php echo base_url() ?>recruiter/rec_basic_information';
    }
    if(clicked_id==4)

    {


       if(searchkeyword == "" && searchplace =="" )
       {
            return checkvalue_search;
       }
       else
       {
            if(searchkeyword=="")
            {
               location.href = '<?php echo base_url() ?>search/recruiter_search/'+0+'/'+searchplace;

            }
            else if(searchplace=="")
            {
                location.href = '<?php echo base_url() ?>search/recruiter_search/'+searchkeyword+'/'+0;
            }
            else
            {
               location.href = '<?php echo base_url() ?>search/recruiter_search/'+searchkeyword+'/'+searchplace;
            }

           
        }   
    }
     if(clicked_id==5)
    { 
        
        document.getElementById('acon').style.display = 'block';
      
    }
       if(clicked_id==6)
    {
            location.href = '<?php echo base_url() . 'profile' ?>';
    }
        if(clicked_id==7)
    {
            location.href = '<?php echo base_url('registration/changepassword') ?>';
    }
        if(clicked_id==8)
    {
            location.href = '<?php echo base_url('dashboard/logout') ?>';
    }
     if(clicked_id==9)
    {
            location.href = 'javascript:history.back()';

    }

 }
 else
 {
  
      return home(clicked_id,searchkeyword,searchplace);

 }

    }
      function home(clicked_id,searchkeyword,searchplace) {

                              
      $('.biderror .mes').html("<div class='pop_content'> Do you want to leave this page?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='home_profile("+ clicked_id +','+'"'+ searchkeyword + '"'+','+'"'+ searchplace + '"' +")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
          $('#bidmodal').modal('show');

 }

 function home_profile(clicked_id,searchkeyword,searchplace){
  
  var  url,data;
  
  
if (clicked_id == 4) {
    url = '<?php echo base_url() . "search/recruiter_search" ?>';

   
    data='id=' + clicked_id + '&skills=' + searchkeyword+ '&searchplace=' + searchplace;
    
} 

  
                  $.ajax({
                      type: 'POST',
                      url: url,
                      data: data,
                        success: function (data) {
                            if(clicked_id==1)
                            {
                              // alert("hsjdh");

                                  window.location= "<?php echo base_url() ?>recruiter/recommen_candidate";    
                            }
                            else if(clicked_id==2)
                            {
                                window.location= "<?php echo base_url() ?>recruiter/rec_profile"; 
                            }
                            else if(clicked_id==3)
                            {
                                window.location= "<?php echo base_url() ?>recruiter/rec_basic_information"; 
                            }
                            else if(clicked_id==4)
                            {
                                   if(searchkeyword=="")
                                        {
               
                                        window.location= "<?php echo base_url() ?>search/recruiter_search/"+0+"/"+searchplace; 

                                        }
                                    else if(searchplace=="")
                                        {
                
                                             window.location= "<?php echo base_url() ?>search/recruiter_search/"+searchkeyword+"/"+0; 
                                        }
                                        else
                                         {
                                            window.location= "<?php echo base_url() ?>search/recruiter_search/"+searchkeyword+"/"+searchplace; 
                                        }
                           
                                
                                 
                                
                            }
                             else if(clicked_id==5)
                            { 
        document.getElementById('acon').style.display = 'block';
                               
                            }
                             else if(clicked_id==6)
                            {
                                window.location= "<?php echo base_url() . 'profile' ?>"; 
                            }
                             else if(clicked_id==7)
                            {
                                window.location= "<?php echo base_url('registration/changepassword') ?>"; 
                            }
                             else if(clicked_id==8)
                            {
                                window.location= "<?php echo base_url('dashboard/logout') ?>"; 
                            }
                            else if(clicked_id==9)
                            {
                                        location.href = 'javascript:history.back()';
                            }
                            else
                            {
                                alert("edit profilw");
                            }
                                     
                                }
                            });


 }
 //Leave Page on add and edit post page End

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
//    btn.onclick = function () {
//        modal.style.display = "block";
//    }

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
<!-- auto search skills start -->
<script>
    function checkvalue(val)
    {

        if (val == 1308)
        {
            document.getElementById("other_skill1").hidden = false;

            $('#other_skill').prop('required', true);
        } else
        {
            document.getElementById("other_skill1").hidden = true;

            $('#other_skill').prop('required', false);
        }


    }

</script>

<!-- footer end

<!- auto search skills end -->
<!-- script for country,state,city start -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () { 
            var countryID = $(this).val();

            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "job_profile/ajax_data"; ?>',
                    data: 'country_id=' + countryID,
                    success: function (html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $('#state').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "job_profile/ajax_data"; ?>',
                    data: 'state_id=' + stateID,
                    success: function (html) {
                        $('#city').html(html);
                    }
                });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    });
</script>
<!-- script for country,state,city end -->


<script type="text/javascript">

    $(document).ready(function () {

        //Transforms the listbox visually into a Select2.
        $("#lstColors").select2({
            placeholder: "Select a Color",
            width: "200px"
        });

        //Initialize the validation object which will be called on form submit.
        var validobj = $("#frm").validate({
            onkeyup: false,
            errorClass: "myErrorClass",

            //put error message behind each form element
            errorPlacement: function (error, element) {
                var elem = $(element);
                error.insertAfter(element);
            },

            highlight: function (element, errorClass, validClass) {
                var elem = $(element);
                if (elem.hasClass("select2-offscreen")) {
                    $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                } else {
                    elem.addClass(errorClass);
                }
            },

            //When removing make the same adjustments as when adding
            unhighlight: function (element, errorClass, validClass) {
                var elem = $(element);
                if (elem.hasClass("select2-offscreen")) {
                    $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                } else {
                    elem.removeClass(errorClass);
                }
            }
        });

        //If the change event fires we want to see if the form validates.
        //But we don't want to check before the form has been submitted by the user
        //initially.
        $(document).on("change", ".select2-offscreen", function () {
            if (!$.isEmptyObject(validobj.submitted)) {
                validobj.form();
            }
        });

        //A select2 visually resembles a textbox and a dropdown.  A textbox when
        //unselected (or searching) and a dropdown when selecting. This code makes
        //the dropdown portion reflect an error if the textbox portion has the
        //error class. If no error then it cleans itself up.
        $(document).on("select2-opening", function (arg) {
            var elem = $(arg.target);
            if ($("#s2id_" + elem.attr("id") + " ul").hasClass("myErrorClass")) {
                //jquery checks if the class exists before adding.
                $(".select2-drop ul").addClass("myErrorClass");
            } else {
                $(".select2-drop ul").removeClass("myErrorClass");
            }
        });
    });
</script>


<style type="text/css">
 
.keyskill_border_active {
  border: 3px solid #f00 !important;

}
#skills-error{margin-top: 40px !important;}

#minmonth-error{    margin-top: 40px; margin-right: 9px;}
#minyear-error{margin-top: 42px !important;margin-right: 9px;}
#maxmonth-error{margin-top: 42px !important;margin-right: 9px;}
#maxyear-error{margin-top: 42px !important;margin-right: 9px;}

#minmonth-error{margin-top: 39px !important;}
#minyear-error{margin-top: auto !important;}
#maxmonth-error{margin-top: 39px !important;}
#maxyear-error{margin-top: auto !important;}
#example2-error{margin-top: 40px !important}


</style>

<script type="text/javascript">

//Click on University other option process Start 
   $(document).on('change', '#industry', function (event) {

    //alert(111);
      var item=$(this);
      var uni=(item.val());
      if(uni == 288)
      {
            $.fancybox.open('<div class="message"><h2>Add Industry</h2><input type="text" name="other_indu" id="other_indu"><a id="indus" class="btn">OK</a></div>');
   
             $('.message #indus').on('click', function () {
      var $textbox = $('.message').find('input[type="text"]'),
      textVal  = $textbox.val();
      $.ajax({
                          type: 'POST',
                          url: '<?php echo base_url() . "recruiter/recruiter_other_industry" ?>',
                          dataType: 'json',
                          data: 'other_industry=' + textVal,
                          success: function (response) {
                       
                               if(response.select == 0)
                              {
                                $.fancybox.open('<div class="message"><h2>Written industry already available in industry Selection</h2><button data-fancybox-close="" class="btn">OK</button></div>');
                              }
                              else if(response.select == 1)
                              {
                                $.fancybox.open('<div class="message"><h2>Empty industry is not valid</h2><button data-fancybox-close="" class="btn">OK</button></div>');
                              }  
                              else
                              {
                                   $.fancybox.close();
                                   $('#industry').html(response.select1);
                                   $('#industry').html(response.select);
                              }
                          }
                      });
      
                  });
      }
     
   });
</script>

