  <!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
    <!-- start header -->
<?php echo $header; ?>
    <?php if($recdata[0]['re_step'] == 3){?>
    <?php echo $recruiter_header2_border; ?>
<?php }?>
    <!-- END HEADER -->
    <div class="js">
    <body class="page-container-bg-solid page-boxed">
<div id="preloader"></div>
      <section>
        
        <div class="user-midd-section" id="paddingtop_fixed">
           <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>
                      
             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 're_status' => '1');
             $recdata = $this->common->select_data_by_condition('recruiter', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($recdata[0]['re_step'] == 3){ ?>
<div class="col-md-6 col-sm-8"><h3>You are updating your Recruiter Profile.</h3></div>

             <?php }else{

             ?>

                      <div class="col-md-6 col-sm-8"><h3>You are making your Recruiter Profile.</h3></div>
                       <?php }?>

            </div>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row row4">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul class="left-form-each">
                                
                                <li class="custom-none"><a href="<?php echo base_url('recruiter/rec_basic_information'); ?>">Basic Information</a></li>
                             <li <?php if($this->uri->segment(1) == 'recruiter'){?> class="active init" <?php } ?>><a href="#">Company Information</a></li>
                            <!--  <li class="custom-none <?php// if($recdata[0]['re_step'] < '2'){//echo "khyati";}?>"><a href="<?php //echo base_url('recruiter/rec_comp_address'); ?>">Company Address</a></li> -->
                                
                            </ul>
                        </div>
                    </div>
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
                     <!--- middle section start -->
          <div class="common-form common-form_border">
                <h3>Company Information</h3>
         <?php echo form_open_multipart(base_url('recruiter/company_info_store'), array('id' => 'basicinfo','name' => 'basicinfo','class' => 'clearfix', 'onsubmit' => "comlogo(event)")); ?>
                                

          <div> <span class="required_field" >( <span class="red">*</span> ) Indicates required field</span></div>


                    <?php
                         $comp_name =  form_error('comp_name');
                         $comp_email =  form_error('comp_email');
                         $comp_num =  form_error('comp_num');
                         $comp_profile =  form_error('comp_profile'); 
                        $other_activities =  form_error('other_activities');
                         $country =  form_error('country');
                         $state =  form_error('state');
                         $city =  form_error('city');

                         ?>
                                
          <fieldset <?php if($comp_name) {  ?> class="error-msg" <?php } ?>>
            <label>Company Name :<span class="red">*</span> </label>
            <input name="comp_name" tabindex="1" autofocus type="text" id="comp_name" placeholder="Enter Company Name"  value="<?php if($compname){ echo $compname; } ?>"/><span id="fullname-error"></span>
          </fieldset>
                    <?php echo form_error('comp_name'); ?>

                    <fieldset <?php if($comp_email) {  ?> class="error-msg" <?php } ?>>
            <label>Company Email:<span class="red">* </span></label>
              <input name="comp_email" type="text" tabindex="2" id="comp_email" placeholder="Enter Company Email" value="<?php if($compemail){ echo $compemail; } ?>" /><span id="fullname-error"></span>
          </fieldset>
                <?php echo form_error('comp_email'); ?>

          <fieldset <?php if($comp_num) {  ?> class="error-msg" <?php } ?>>
            <label>Company Number:</label>
            <input name="comp_num"  type="text" id="comp_num" tabindex="3" placeholder="Enter Comapny Number" value="<?php if($compnum){ echo $compnum; } ?>"/><span id="email-error"></span>
          </fieldset>
          <?php echo form_error('comp_num'); ?>

          <fieldset>
            <label>Company Website:</span></label>        
            <input name="comp_site"  type="url" id="comp_url" tabindex="4" placeholder="Enter Comapny Website" value="<?php if($compweb){ echo $compweb; } ?>" /> <span class="website_hint" style="font-size: 13px; color: #1b8ab9;">Note : <i>Enter website url with http or https</i></span>  
          </fieldset>
           <fieldset <?php if($country) {  ?> class="error-msg" <?php } ?>>
                        <label>Country:<span class="red">*</span></label>
                                
                                        <select tabindex="1" autofocus name="country" id="country">
                                        <option value="">Select Country</option>
                                         <?php
                                            if(count($countries) > 0){
                                                foreach($countries as $cnt){
                                          
                                            if($country1)
                                            {
                                              ?>
                                                 <option value="<?php echo $cnt['country_id']; ?>" <?php if($cnt['country_id']==$country1) echo 'selected';?>><?php echo $cnt['country_name'];?></option>
                                             
                                                <?php
                                                }
                                                else
                                                {
                                            ?>
                                                 <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name'];?></option>
                                                  <?php
                                            
                                            }
       
                                            }}
                                            ?>
                                    </select><span id="country-error"></span>
                                 <?php echo form_error('country'); ?>
                    </fieldset>

                   <fieldset <?php if($state) {  ?> class="error-msg" <?php } ?>>
                        <label>State:<span class="red">*</span> </label>
                        <select name="state" id="state" tabindex="2">
                         <?php
                                           if($state1){
                                            foreach($states as $cnt)

                                            {
                                               
                                              ?>

                                                 <option value="<?php echo $cnt['state_id']; ?>" <?php if($cnt['state_id']==$state1) echo 'selected';?>><?php echo $cnt['state_name'];?></option>
                                              
                                                <?php
                                                }
                                              }
                                                else
                                                {
                                            ?>
                                                 <option value="">Select country first</option>
                                                  <?php
                                            
                                            }
                                            ?>
                                        
                        </select><span id="state-error"></span>
                        <?php echo form_error('state'); ?>
                 </fieldset>
                     

                      <fieldset <?php if($city) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label> City:</label>
                                    <select name="city" id="city" tabindex="3">
                                     <?php
                                    
                                                if($city1)

                                            {
                                                foreach($cities as $cnt){ 
                                              ?>

                                               <option value="<?php echo $cnt['city_id']; ?>" <?php if($cnt['city_id']==$city1) echo 'selected';?>><?php echo $cnt['city_name'];?></option>

                                                <?php
                                                } }
                                               else if($state1)
                                             {
                                            ?>
                                            <option value="">Select City</option>
                                            <?php
                                            foreach ($cities as $cnt) {
                                                ?>

                                                <option value="<?php echo $cnt['city_id']; ?>"><?php echo $cnt['city_name']; ?></option>

                                                <?php
                                            }
                                        }

                                                else
                                                {
                                            ?>
                                        <option value="">Select state first</option>

                                         <?php
                                            
                                            }
                                            ?>
                                    </select><span id="city-error"></span>
                                    <?php echo form_error('city'); ?> 
                    </fieldset>
                   

          <fieldset class="full-width">
            <label for="country-suggestions">Sector/Skill You hire for:</span></label>
                      

                         <textarea name ="comp_sector" id="comp_sector" rows="4" cols="50" tabindex="5" placeholder=" Ex.php, java, information technology ,automobile ,construction" style="resize: none;"><?php if($compsector){ echo $compsector; } ?></textarea>
                                    
          </fieldset>
          
                    <fieldset <?php if($comp_profile) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label>Company Profile:<!-- <span style="color:red">*</span> -->

                        <textarea tabindex="5" name ="comp_profile" id="comp_profile" rows="4" cols="50" placeholder="Enter Company Profile" style="resize: none;"><?php if($comp_profile1){ echo $comp_profile1; } ?></textarea>
                        <?php ?> 
                    </fieldset>

                   

                    <fieldset <?php if($other_activities) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label>Other activities:<!-- <span style="color:red">*</span> --></label>
                       

                        <textarea name ="other_activities" tabindex="6" id="other_activities" rows="4" cols="50" placeholder="Enter Other Activities" style="resize: none;"><?php if($other_activities1){ echo $other_activities1; } ?></textarea>
                       
                    </fieldset>
                     <fieldset>
                                             <label>Company Logo:</label>
                                             <input  type="file" name="comp_logo" tabindex="5" id="comp_logo" class="comp_logo" placeholder="Company Logo" multiple="" onchange=" return comlogo();" />

                                             <div id="com_logo" class="com_logo" style="color:#f00; display: block;"></div>

                                             <div class="bestofmine_image_primary" style="color:#f00; display: block;"></div>
                                             <?php
                                                if ($complogo1) {
                                                    ?>
                                             <img src="<?php echo base_url($this->config->item('rec_profile_thumb_upload_path')  . $complogo1) ?>"  style="width:100px;height:100px;" class="job_education_certificate_img" >
                                             <?php
                                                }
                                                 ?>
                                          </fieldset>

           <fieldset>

           <input type="hidden" name="image_hidden_logo" value="<?php
                                                if ($complogo1) {
                                                 echo $complogo1;
                                                     }
                                                     ?>">
                                                      </fieldset>

                                                     <fieldset class="hs-submit full-width">
                                   
                                  
                                    <input type="submit"  id="next" name="next" tabindex="7" value="Submit">
                                 
                                    
                     </fieldset>
      </div>

    </form>   
  
                      </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <!-- footer start -->
    <?php echo $footer; ?>

  
     <!-- footer end -->
    <!-- end footer -->
    <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
    
      <!-- Field Validation Js start -->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
 <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
 <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<!-- <script type="text/javascript" src="<?php //echo base_url('js/jquery.validate.js'); ?>"></script> -->
<!-- Field Validation Js End -->



 <!-- <script type="text/javascript">
var jquery_validate_min = $.noConflict(true);
</script> -->

<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){ 
        var countryID = $(this).val();
        //alert(countryID);
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "job_profile/ajax_data"; ?>',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "job_profile/ajax_data"; ?>',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>


  <script type="text/javascript">

            //validation for edit email formate form

jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Number, space and special character are not allowed");


            $(document).ready(function () { 

                $("#basicinfo").validate({

                    rules: {

                        comp_name: {

                            required: true,
                            regx:/^[a-zA-Z0-9\s]*[a-zA-Z][a-zA-Z0-9]*[-@./#&+,\w\s]/
                            //noSpace: true
                           
                        },

                        
                       
                       comp_email: {

                            required: true,
                            email:true,
                             remote: {
                                url: "<?php echo site_url() . 'recruiter/check_email_com' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                        return $("#comp_email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                            },
                        },
                       
                        comp_num:{
                            
                             minlength: 8,
                           maxlength:15,
                            number: true
                       },

                       comp_sector:{
                            
                             
                           maxlength:2500
                            
                       },
                       comp_profile:{
                            
                             
                           maxlength:2500
                            
                       },

                        other_activities:{
                            
                             
                           maxlength:2500
                            
                       },

                      country: {

                            required: true,
                           
                        },

                        state: {

                            required: true,
                           
                        },
                       
                    },

                    messages: {

                        comp_name: {

                            required: "Company Name Is Required.",
                            
                        },

                       

                         comp_email: {

                            required: "Email Address Is Required.",
                             email:"Please Enter Valid Email Id.",
                             remote: "Email already exists"
                        },

                        comp_num: {

                            required: "Phone no Is Required.",
                            
                        },
                         country: {

                            required: "Country Is Required.",
                            
                        },

                        state: {

                            required: "State Is Required.",
                            
                        },
                        
                      
                        
                      
                    },

                });
                   });


  </script>
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


<script type="text/javascript">
function checkvalue(){
   //alert("hi");
  var searchkeyword=$.trim(document.getElementById('tags').value);
  var searchplace=$.trim(document.getElementById('searchplace').value);
  // alert(searchkeyword);
  // alert(searchplace);
  if(searchkeyword == "" && searchplace == ""){
     //alert('Please enter Keyword');
    return false;
  }
}
  
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


<script type="text/javascript">
    
    function comlogo(event){

    var comp_logo = document.getElementById("comp_logo").value;

    var complogo_ext = comp_logo.split('.').pop();
      
    var allowes = ['jpg', 'jpeg','png'];
    var foundPresent = $.inArray(complogo_ext, allowes) > -1;

    if(comp_logo  == ''){

    }else{

    if(foundPresent == false)
       { //alert("hh");
                $(".com_logo").html("Please select only image file.");
                document.getElementById('com_logo').style.display="block"
                event.preventDefault();
                return false;
         
      }else{

        document.getElementById('com_logo').style.display="none"
      }
    }

    }
</script>
