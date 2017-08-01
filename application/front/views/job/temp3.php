
<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" /> 
<!-- Calender Css Start-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
<!-- Calender Css End-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">

<!-- start header -->
<?php echo $header; ?>

<?php if ($jobdata[0]['job_step'] == 10) { ?>
    <?php echo $job_header2_border; ?>
<?php } ?>
<!-- END HEADER -->
<body>
    <section>
        <div class="user-midd-section " id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="clearfix">
                        <div class="col-md-6">
                            <div class="common-form job_reg_main">
                                <h3>Welcome In Job Profile</h3>

                                <?php echo form_open(base_url('job/job_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix')); ?>
                                <fieldset>
                                    <label >First Name <font  color="red">*</font> :</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="Enter your First Name">
                                </fieldset>
                                <fieldset>
                                    <label >Last Name <font  color="red">*</font>:</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Enter your Last Name">
                                </fieldset>
                                <fieldset class="full-width">
                                    <label >Email Address <font  color="red">*</font> :</label>
                                    <input type="text" name="email" id="email" placeholder="Enter your Email Address">
                                </fieldset>

                                <fieldset class="fresher_radio" >
                                    <label>Fresher ? <font  color="red">*</font> : </label>
                                    <div class="main_raio">
                                        <input type="radio" id="test1" name="fresher" id="fresher">
                                        <label for="test1">Yes</label>
                                    </div>


                                    <div class="main_raio">
                                        <input type="radio" id="test2" name="fresher" id="fresher">
                                        <label for="test2">No</label>
                                    </div>


                                </fieldset>
                                <fieldset class="full-width">
                                    <label >Job Title :</label>
                                     <input type="search" id="job_title" name="job_title" value="" placeholder="Ex:- Sr. Engineer, Jr. Engineer, Software Developer, Account Manager">
                                </fieldset>

                                <fieldset class="full-width fresher_select main_select_data" >
                                    <label>skill <font  color="red">*</font> :</label>
                                     <select name="skills1[]"  class="keyskil skil" id ="skills1" tabindex="1" autofocus  multiple="multiple" style="width:100%;" placeholder='Enter Skill'>
                                                         <option></option>
                                   <?php foreach ($skill as $ski) { ?>
                                            <option value="<?php echo $ski['skill_id']; ?>"><?php echo $ski['skill']; ?></option>
<?php } ?>
                                     </select>

                                </fieldset>
                                <fieldset class="full-width pt0 pb0">
                                    <label id="other_skill">If you have not found your skill <span class="other_skill_clik"> click Here </span>to add your skill.</label>

                                    <div id="other_skill_data" style="display: none;">
                                        <label>Other Skill :</label>
                                        <input type="text" name="other_skill" class="keyskil" id="other_skill">
                                    </div>

                                </fieldset>


                                <fieldset class="full-width main_select_data">
                                    <label>Industry <font  color="red">*</font>:</label>
                                    <select name="industry" id="industry">
                                        <option value="">Select industry</option>
                                        <?php foreach ($industry as $indu) { ?>
                                            <option value="<?php echo $indu['industry_id']; ?>"><?php echo $indu['industry_name']; ?></option>
<?php } ?>
                                    </select>
                                </fieldset>
                                 <fieldset class="full-width fresher_select main_select_data" >
                                    <label>city <font  color="red">*</font> :</label>
                                     <select name="city1[]"  class="city" id ="city1" tabindex="1" autofocus  multiple="multiple" style="width:100%;" placeholder='Enter Skill'>
                                                         <option></option>
                                   <?php foreach ($citydata as $city) { ?>
                                            <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>
<?php } ?>
                                     </select>

                                </fieldset>
                                <fieldset class=" full-width">

                                    <div class="job_reg">
                              <!--<input type="reset">-->
                                        <input type="submit"  id="" name="" value="Register" tabindex="10">

                                    </div>
                                </fieldset>

                                </form>
                            </div>
                        </div>
                    </div>                

                </div>
            </div>
        </div>


    </section>
    
    
    <!-- END CONTAINER -->
    <script type="text/javascript">
        $('#other_skill').click(function () {
            $('#other_skill_data').toggle()
        })
    </script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>
   
    <script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    
    <script type="text/javascript">
//select2 autocomplete start for skill
    var complex = <?php echo json_encode($selectdata); ?>;
   // $('#skils').select2().select2('val', complex)

    if(complex != null && complex != '')
    { 
        
         $(".skil").select2({
         placeholder: "Select a Language",
         }).select2('val', complex);
    }
//    if(complex != '')
//    { 
//        alert(789);
//         $(".skil").select2({
//         placeholder: "Select a Language",
//         }).select2('val', complex);
//    }
   if(complex == '' || complex == null)
    {
       
         $(".skil").select2({
         placeholder: "Select a Language",
 
        });
    }
//select2 autocomplete End for skill
</script>

<script type="text/javascript">
//select2 autocomplete start for skill
   // var complex = <?php echo json_encode($selectdata); ?>;
   // $('#skils').select2().select2('val', complex)

  //  if(complex != null && complex != '')
  //  { 
        
         $(".city").select2({
         placeholder: "Select a Language",
         }).select2('val', complex);
   // }
//    if(complex != '')
//    { 
//        alert(789);
//         $(".skil").select2({
//         placeholder: "Select a Language",
//         }).select2('val', complex);
//    }
//   if(complex == '' || complex == null)
//    {
//       
//         $(".skil").select2({
//         placeholder: "Select a Language",
// 
//        });
//    }
//select2 autocomplete End for skill
</script>

<script>
    // job title script start
   var jobdata = <?php echo json_encode($jobtitle); ?>;
   
   $(function () {
       // alert('hi');
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
//    // job title script start
//   var data = <?php echo json_encode($city_data); ?>;
//  
//   $(function () {
//       // alert('hi');
//       $("#cities").autocomplete({
//           source: function (request, response) {
//               var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
//               response($.grep(data, function (item) {
//                   return matcher.test(item.label);
//               }));
//           },
//           minLength: 1,
//           select: function (event, ui) {
//               event.preventDefault();
//               $("#cities").val(ui.item.label);
//               $("#selected-tag").val(ui.item.label);
//               // window.location.href = ui.item.value;
//           }
//           ,
//           focus: function (event, ui) {
//               event.preventDefault();
//               $("#cities").val(ui.item.label);
//           }
//       });
//   });
   
   
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

           ignore: '*:not([name])',
        
         rules: {

                first_name: {

                    required: true,
                 //  regx2:/^[^-\s][a-zA-Z_\s-]+$/,
                    //noSpace: true

                },

                last_name: {

                    required: true,
                 //   regx2:/^[^-\s][a-zA-Z_\s-]+$/,
                    //noSpace: true

                },
                
                cities: {

                    required: true,
                 //   regx2:/^[^-\s][a-zA-Z_\s-]+$/,
                    //noSpace: true

                },

                email: {

                    required: true,
                    email: true,
                    lowercase: /^[0-9a-z\s\r\n@!#\$\^%&*()+=_\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/,
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

                fresher: {

                    required: true,

                },
                
                 job_title: {

                    required: true,
                  //  regx2:/^[^-\s][a-zA-Z_\s-]+$/,
                    //noSpace: true
                 },
                 
                 industry: {

                    required: true,
                  //  regx2:/^[^-\s][a-zA-Z_\s-]+$/,
                    //noSpace: true
                 },
                 
                 cities: {

                    required: true,
                  //  regx2:/^[^-\s][a-zA-Z_\s-]+$/,
                    //noSpace: true
                 },
                 
                 'skills1[]': {

                    require_from_group: [1, ".keyskil"],
                            //required:true 
                },

                other_skill: {

                    require_from_group: [1, ".keyskil"],
                  //   regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                    //regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                    //noSpace: true
                            // required:true 
                },
               
            },

            messages: {

                first_name: {

                    required: "First name Is Required.",

                },

                last_name: {

                    required: "Last name Is Required.",

                },

                email: {

                    required: "Email Address Is Required.",
                    email: "Please Enter Valid Email Id.",
                    remote: "Email already exists"
                },
               
                fresher: {

                    required: "Fresher Is Required.",

                },
                
                industry: {

                    required: "Industry Is Required.",

                },
                
                cities: {

                    required: "City Is Required.",

                },
                
                job_title: {

                    required: "Job title Is Required.",

                },
                
                'skills1[]': {

                    require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'",

                },

                other_skill: {

                    require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'",
                }


            },

        });
    
</script>

</body>
</html>
