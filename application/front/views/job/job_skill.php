 
<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->

<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" />--> 
<!--<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />-->

<!-- start header -->
<?php echo $header; ?> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<?php if($jobdata[0]['job_step'] == 10){ ?>
<?php //echo $job_header2_border; ?>
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
             
             if($jobdata[0]['job_step'] == 10 || $jobdata[0]['job_step'] >= 5){ ?>

<div class="col-md-6 col-sm-8"><h3>You are updating your Job Profile.</h3></div>
                <?php }else{

             ?>
                      <div class="col-md-6 col-sm-8"><h3>You are making your Job Profile.</h3></div>

            <?php }?>
            </div>
            <br>
            <br>
            <br>

            <div class="container">
                <div class="row row4">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <?php
                            $userid = $this->session->userdata('user_id');
                            $job = $this->db->get_where('job_reg', array('user_id' => $userid))->row()->job_step;
                            ?>
                            <ul class="left-form-each">
                                <li class="custom-none"><a href="<?php echo base_url('job/job_basicinfo_update'); ?>">Basic Information</a></li>

                                <li class="custom-none"><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                <li class="custom-none"><a href="<?php echo base_url('job/job_education_update'); ?>">Educational Qualification</a></li>


                                <li class="custom-none"><a href="<?php echo base_url('job/job_project_update'); ?>">Project And Training / Internship</a></li>

                                <li <?php if ($this->uri->segment(1) == 'job') { ?> class="active init" <?php } ?>><a href="#">Work Area</a></li>
<!-- 
                                <li class="custom-none <?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    //echo "khyati";
                                }
                                ?>"><a href="<?php //echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li> -->

                                <li class="custom-none <?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_work_exp_update'); ?>">Work Experience</a></li>

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
                                ?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Career Objectives</a></li>
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

                            <div class="common-form common-form_border">
                                <h3>Keyskills</h3>
<?php echo form_open(base_url('job/job_skill_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix', 'onsubmit' => "imgval()")); ?>


                   <fieldset class="full-width">
                                    <label >Job Title :</label>
                                     <input type="search" id="job_title" name="job_title" value="<?php echo $work_title; ?>" placeholder="Ex:- Sr. Engineer, Jr. Engineer, Software Developer, Account Manager">
                                </fieldset>

<fieldset class="full-width fresher_select main_select_data" >
    <label for="skills"> Skills: </label>
    <input id="skills2" value="<?php echo $work_skill; ?>" name="skills" id="cities" size="90">
  </fieldset>


                                <fieldset class="full-width main_select_data">
                                    <label>Industry <font  color="red">*</font>:</label>
                                    <select name="industry" id="industry">
                                        <option value="">Select industry</option>
                                        <?php foreach ($industry as $indu) { ?>
                                            <option value="<?php echo $indu['industry_id']; ?>" <?php if($indu['industry_id'] == $work_industry){ echo "selected"; } ?>><?php echo $indu['industry_name']; ?></option>
<?php } ?>
                                    </select>
                                </fieldset>

                                
                             <fieldset class="full-width fresher_select main_select_data" >
    <label for="cities">Preferred Cites: </label>
    <!--<input id="cities2"  value="<?php// echo $work_city.','; ?>" name="cities" id="cities" size="90">-->
    <input id="cities2"  value="<?php echo $work_city; ?>" name="cities" id="cities" size="90">
  </fieldset>
          

                               
                                <fieldset class="hs-submit full-width">
<!--                                    <input type="reset">
                                    <input type="submit"  id="previous" name="previous" value="previous">-->
                                    <input type="submit"  id="next" name="next" tabindex="3" value="next">


                                </fieldset>




                                </form>
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

<style type="text/css">
    
    .keyskil, #other_keyskill1, #other_keyskill{
        width:93% !important;
        
    }    
.common-form .edit_other_skill1{width: 93% !important;margin-top: 6px;}
</style>

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>
   
    <script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
 
<script>
    // job title script start
   var jobdata = <?php echo json_encode($jobtitle); ?>;
   
   $(function () {
    
       $("#job_title").autocomplete({
           source: function (request, response) {
               var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
               response($.grep(jobdata, function (item) {
                   return matcher.test(item.label);
               }));
           },
           minLength: 1,
           select: function (event, ui) {
               event.preventDefault();
               $("#job_title").val(ui.item.label);
               $("#selected-tag").val(ui.item.label);
               // window.location.href = ui.item.value;
           }
           ,
           focus: function (event, ui) {
               event.preventDefault();
               $("#job_title").val(ui.item.label);
           }
       });
   });
   
</script>

<script>

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
// validation js

 $("#jobseeker_regform").validate({

        
         rules: {

                industry: {

                    required: true,
                 
                },

                job_title: {

                    required: true,
                 
                },
                
                
                skills: {

                    required: true,

                },
                
                 cities: {

                    required: true,
                  
                 },
                 
            },

            messages: {

                industry: {

                    required: "First name Is Required.",

                },

                job_title: {

                    required: "Job Title Is Required.",

                },

                skills: {

                    required: "Skill Is Required.",
                   
                },
               
                cities: {

                    required: "City Is Required.",

                },
                
               
            },

        });
    
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

// site preloader -- also uncomment the div in the header and the css style for #preloader
        $(window).load(function () {
            $('#preloader').fadeOut('slow', function () {
                $(this).remove();
            });
        });
    });
</script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--new script for cities start-->
 <script>
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }
        
        $( "#cities2" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON("<?php echo base_url();?>general/get_location", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                alert(ui.item.value);
                alert(ui.item.id);
                alert();
                var terms = split( this.value );
                if(terms.length <= 10) {
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
<!--new script for cities end-->
<!--new script for skill start-->
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
                alert(ui.item.value);
                alert(ui.item.id);
                alert();
                var terms = split( this.value );
                if(terms.length <= 10) {
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
<!--new script for skill end-->
