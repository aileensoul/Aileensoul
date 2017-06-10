

<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<!-- Calender Css Start-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
<!-- Calender Css End-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">


 -->
<!-- start header -->
<?php echo $header; ?>

<?php if($jobdata[0]['job_step'] == 10){ ?>
<?php echo $job_header2_border; ?>
<?php } ?>
<!-- END HEADER -->
<style type="text/css">
   
</style>
<div class="js">
<body class="page-container-bg-solid page-boxed">
<div id="preloader"></div>
    <section>

        <div class="user-midd-section " id="paddingtop_fixed_job">
            
           <div class="common-form1 ">
             <div class="col-md-3 col-sm-4"></div>

             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($jobdata[0]['job_step'] == 10){ ?>
                <div class="col-md-6 col-sm-8"><h3>You are updating your Job Profile.</h3></div>
            <?php  }else{

             ?>


                      <div class="col-md-6 col-sm-8"><h3>You are making your Job Profile.</h3></div>

                      <?php }?>
            </div>
            <br>
           <br>
           <br>
            <div class="container">
                <div class="row row4">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                <li  <?php if ($this->uri->segment(1) == 'job') { ?> class="active" <?php } ?> ><a href="#">Basic Information</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('job/job_education_update'); ?>">Educational Qualification</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('job/job_project_update'); ?>">Project And Training / Internship</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('job/job_skill_update'); ?>">Professional Skills</a></li>

                              <!--   <li class="<?php if ($jobdata[0]['job_step'] < '1') {
   // echo "khyati";
} ?>"><a href="<?php //echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li> -->

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('job/job_work_exp_update'); ?>">Work Experience</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('job/job_curricular_update'); ?>">Extra Curricular Activities</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
                                echo "khyati";
                            } ?>"><a href="<?php echo base_url('job/job_reference_update'); ?>">Interest & Reference</a></li>

                                <li class="<?php if ($jobdata[0]['job_step'] < '1') {
                                echo "khyati";
                            } ?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Carrier Objectives</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- middle section start -->
                    <div class="col-lg-6 col-md-6 col-sm-8">

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
                                <h3>Basic Information</h3>
<?php echo form_open(base_url('job/job_basicinfo_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix')); ?>
                            <!-- <div>
                                <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div> -->

     <div> <span class="required_field" >( <span class="red">*</span> ) Indicates required field</span></div>

<?php
$fname = form_error('fname');
$lname = form_error('lname');
$email = form_error('email');
$phnno = form_error('phnno');
$marital_status = form_error('marital_status');
$nationality = form_error('nationality');
$language = form_error('lan');
$dob = form_error('dob');
$gender = form_error('gender');
?>



                                <fieldset <?php if ($fname) { ?> class="error-msg" <?php } ?>>
                                    <label>First Name: <span class="red">*</span></label>
                                    <input type="text" name="fname" id="fname" placeholder="Enter First name" value="<?php if ($fname1) {
                                        echo $fname1;
                                    } else {
                                        echo $job[0]['first_name'];
                                    } ?>"/> <span id="fname-error"> </span>
<?php echo form_error('fname'); ?>
                                </fieldset>

                                <fieldset <?php if ($lname) { ?> class="error-msg" <?php } ?>>  
                                    <label>Last Name <span class="red">*</span></label>
                                    <input type="text" name="lname"  id="lname" placeholder="Enter Last name" value="<?php if ($lname1) {
    echo $lname1;
} else {
    echo $job[0]['last_name'];
} ?>"/> <span id="lname-error"> </span>
<?php echo form_error('lname'); ?>
                                </fieldset>

                                <fieldset <?php if ($email) { ?> class="error-msg" <?php } ?>>
                                    <label>Email Address <span class="red">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="Enter Email Address"  value="<?php if ($email1) {
    echo $email1;
} else {
    echo $job[0]['user_email'];
} ?>"/> <span id="email-error"> </span>
                                        <?php echo form_error('email'); ?>
                                </fieldset>

                                <fieldset <?php if ($phnno) { ?> class="error-msg" <?php } ?>>
                                    <label>Phone Number <span class="red">*</span></label>
                                    <input type="text" name="phnno" id="phnno" placeholder="Enter Phone Number" value="<?php if ($phnno1) {
                                            echo $phnno1;
                                        } ?>" /> <span id="phnno-error"> </span>
                                        <?php echo form_error('phnno'); ?>
                                </fieldset>

                                <fieldset <?php if ($marital_status) { ?> class="error-msg" <?php } ?>>
                                    <label>Marital Status <span class="red">*</span></label>
                                    <input type="radio" name="marital_status" value="married" id="marital_status"  <?php echo ($marital_status1 == 'married') ? 'checked' : '' ?>>
                    <span class="radio_check_text">Married</span>
                                    
                                    <input type="radio" name="marital_status" value="unmarried" id="marital_status" <?php echo ($marital_status1 == 'unmarried') ? 'checked' : '' ?>  > 
                    <span class="radio_check_text">Unmarried</span>

                                    <span id="marital_status-error"> </span>
                                        <?php echo form_error('marital_status'); ?>
                                </fieldset>

                                <fieldset <?php if ($nationality) { ?> class="error-msg" <?php } ?>>
                                    <label>Nationality:<span class="red">*</span></label>

                                    <select name="nationality" id="nationality">

                                        <option value="" selected option disabled>--Select--</option>
<?php
if (count($nation) > 0) {
    foreach ($nation as $cnt) {

        if ($nationality1) {
            ?>

                                                    <option value="<?php echo $cnt['nation_id']; ?>" <?php if ($cnt['nation_id'] == $nationality1) echo 'selected'; ?>><?php echo $cnt['nation_name']; ?></option>

                                                <?php
                                            }
                                            else {
                                                ?>

                                                    <option value="<?php echo $cnt['nation_id']; ?>"><?php echo $cnt['nation_name']; ?></option>

                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    </select>

                                    <?php echo form_error('nationality'); ?>
                                </fieldset>

                                <fieldset id="erroe_nn" <?php if ($language) { ?> class="error-msg" <?php } ?>>
                                    <label>Languages Known:<span class="red">*</span></label> 

             <select name="language[]" id ="lan" multiple="multiple" style="width: 100%"  required="true"  >

<?php foreach ($language1 as $language) { ?>
                                            <option value="<?php echo $language['language_id']; ?>"><?php echo $language['language_name']; ?></option>
<?php } ?>

                                    </select>


<?php echo form_error('lan'); ?>

        
                                </fieldset>
                                <fieldset <?php if ($dob) { ?> class="error-msg" <?php } ?>>
                                    <label>Date of Birth<span class="red">*</span></label>
                                
                                    <input type="text" name="dob" id="datepicker" placeholder="dd-MM-yyyy"   autocomplete="off" value="<?php
                                     if($dob1){
                                        echo date('d/m/Y',strtotime($dob1));}
                                        else{

                                           echo date('d/m/Y',strtotime($job[0]['user_dob']));  } ?>" >
<?php echo form_error('dob'); ?>
                                </fieldset>

                                <fieldset <?php if ($gender) { ?> class="error-msg" <?php } ?>>
                                    <label>Gender<span class="red">*</span></label>
                                    <input type="radio" name="gender" value="male" id="gender" <?php echo ($gender1 == 'male') ? 'checked' : '' ?>>Male
                                    <input type="radio" name="gender" value="female" id="gender" <?php echo ($gender1 == 'female') ? 'checked' : '' ?> >Female
                                    <span id="gender-error"> </span>
<?php echo form_error('gender'); ?>
                                </fieldset>

                                <fieldset class="hs-submit full-width">

                              <!--<input type="reset">-->
                                    <input type="submit"  id="next" name="next" value="Next">


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

<!-- Calender JS Start-->

<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

 -->





 <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
 <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
 <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
 



<script src="<?php echo base_url('js/jquery.datetimepicker.full.js'); ?>"></script>

<script type="text/javascript">
    $('#datepicker').datetimepicker({
        //yearOffset:222,
       
        startDate: "2013/02/14",
        lang: 'ch',
        timepicker: false,
        format: 'd/m/Y',
        formatDate: 'Y/m/d'
                //minDate:'-1970/01/02', // yesterday is minimum date
                //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
    });

</script>
<!-- Calender Js End-->
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



<!-- <script>
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


<!-- Field Validation Js Start -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<!-- Field Validation Js End -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>


<!-- javascript validation start -->
<script type="text/javascript">

    $(document).ready(function () {

 // jQuery.validator.addMethod("noSpace", function(value, element) { 
 //      return value == '' || value.trim().length != 0;  
 //    }, "No space please and don't leave it empty");


$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Number, space and special character are not allowed");


        $("#jobseeker_regform").validate({

            ignore: ".language",
            rules: {

                fname: {

                    required: true,
                    regx:/^[a-zA-Z]+$/,
                    //noSpace: true

                },

                lname: {

                    required: true,
                    regx:/^[a-zA-Z]+$/,
                    //noSpace: true

                },

                email: {

                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo site_url() . 'job/check_email' ?>",
                        type: "post",
                        data: {
                            email: function () {

                                return $("#email").val();
                            },
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                        },
                    },
                },

                phnno: {

                            number: true,
                            required: true,
                            minLength:5
                            
                        },
                        
                marital_status: {

                    required: true,

                },
                nationality: {

                    required: true,

                },
                language: {

                    required: true,

                },
                dob: {

                    required: true,

                },
                gender: {

                    required: true,

                },
            },

            messages: {

                fname: {

                    required: "First name Is Required.",

                },

                lname: {

                    required: "Last name Is Required.",

                },

                email: {

                    required: "Email Address Is Required.",
                    email: "Please Enter Valid Email Id.",
                    remote: "Email already exists"
                },

                marital_status: {

                    required: "Marital Status Is Required.",

                },
                nationality: {

                    required: "Nationality Is Required.",

                },
                language: {

                    required: "Language  Is Required.",

                },
                dob: {

                    required: "Date of Birth Is Required.",

                },
                gender: {

                    required: "Gender Is Required.",

                },

            },

        });
    });
</script>
<!-- javascript validation End -->

<!-- script for Language textbox automatic end (option 2)-->



<script>

    var complex = <?php echo json_encode($selectdata); ?>;
    $("#lan").select2().select2('val', complex)

</script>
<!-- script for Language textbox automatic end (option 2)-->
<script type="text/javascript">
    $(".alert").delay(3200).fadeOut(300);
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
  $('#preloader').fadeOut('slow',function(){$(this).remove();});
});
});
</script>

