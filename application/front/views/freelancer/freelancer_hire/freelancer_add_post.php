<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->

    <!--  <rash code 7-4 start> -->
   <?php echo $freelancer_hire_header2; ?>
   <!--  <rash code 7-4 end> -->

   <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!--  <rash code 7-4 start> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<!-- Calender Css Start-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
   <!-- Calender Css End-->

<!-- select 2 validation border start -->
<style type="text/css">
  
  /*.keyskill_border_deactivte {
  border: 0px solid red;

}*/

.keyskill_border_active {
  border: 3px solid red !important;

}
</style>

</head>
<body>

        <div>
        <div class="user-midd-section" id="paddingtop_fixed">
        <div class="row"></div>
            <div class="container">
              <div class="col-md-3"></div>
                      <div class="col-md-7 col-sm-7">

                    <div>
                        <?php
                                        if ($this->session->flashdata('error')) {
                                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                        }
                                        if ($this->session->flashdata('success')) {
                                            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                        }?>
                    </div>

                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Post Your Project</h3> 
                                
                                
                           <?php echo form_open(base_url('freelancer/freelancer_add_post_insert'), array('id' => 'postinfo','name' => 'postinfo','class' => 'clearfix form_addedit', 'onsubmit' => "imgval()")); ?>
                            <div>
                                <h4 class="freelancer_editpost_title"> Project Description</h4></div>

                        <!-- <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div> --> 
                            
                          <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> 
                                   <span style="color:#7f7f7e">Indicates required field</span>
                                </div>
                          

                            <?php
                         $post_name =  form_error('post_name');
                        
                         $skills =  form_error('skills');
                         
                         $post_desc =  form_error('post_desc');
                        
                         ?>


                        <fieldset class="full-width" <?php if($post_name) {  ?> class="error-msg" <?php } ?>>
                        <label >Post Title:<span style="color:red">*</span></label>                 
                        <input name="post_name" type="text" id="post_name" placeholder="Enter Post Name"/>
                        <span id="fullname-error"></span>
                        <?php echo form_error('post_name'); ?>
                        </fieldset>

                         <fieldset class="full-width">
                        <label>Post Description :<span style="color:red">*</span></label>

                        <textarea style="resize: none;height: 22%;overflow: auto;" name="post_desc" id="post_desc" placeholder="Enter Description"></textarea>
                        
                        <?php echo form_error('post_desc'); ?>
                      </fieldset>

                       <fieldset class="full-width" <?php if($fields_req) {  ?> class="error-msg" <?php } ?>>
                  <label>Fields Of Requirement:<span style="color:red">*</span></label>
                   <select name="fields_req" id="fields_req">
                     <option value="" selected option disabled>Select Fields of Requirement</option>
                  
                  <?php
                                            if(count($category) > 0){
                                                foreach($category as $cnt){
                                          
                                            if($fields_req1)
                                            {
                                              ?>
                                                 <option value="<?php echo $cnt['category_id']; ?>" <?php if($cnt['category_id']==$fields_req1) echo 'selected';?>><?php echo $cnt['category_name'];?></option>
                                               
                                                <?php
                                                }
                                                else
                                                {
                                            ?>
                                              
                                                  <option value="<?php echo $cnt['category_id']; ?>"><?php echo $cnt['category_name'];?></option> 
                                                  <?php
                                            
                                            }
       
                                            }}
                                            ?>
              </select>
              <?php echo form_error('fields_req'); ?>
                  </fieldset>

                  <fieldset class="full-width" <?php if($skills) {  ?> class="error-msg" <?php } ?>>
                        <label>Skills of Requirements:<span style="color:red">*</span></label>
                         <select class="keyskil" name="skills[]" id="skills" multiple="multiple" style="cursor: default;"></select>
                        <span id="fullname-error"></span>
                        <?php echo form_error('skills'); ?>
                       </fieldset>

                        <fieldset class="full-width" <?php if($other_skill) {  ?> class="error-msg" <?php } ?> >
                            <label class="control-label">Other Skill:<!-- <span style="color:red">*</span> --></label>
                            <input name="other_skill" class="keyskil"  type="text" id="other_skill" placeholder="Enter Your Other Skill" />
                                <span id="fullname-error"></span>
                                <?php echo form_error('other_skill'); ?>
                        </fieldset>


                    <fieldset class="full-width two-select-box fullwidth_experience" <?php if($month) {  ?> class="error-msg" <?php } ?> class="two-select-box"> 
                     <label>Experience:</label>

                          <select name="year">
                             <option value="" selected option disabled>Year</option>
                        
                            <option value="0">0 Year</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Year</option>
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
                            <?php echo form_error('year'); ?>

                            <select class="margin-month " name="month" id="month">
                               <option value="" selected option disabled>Month</option>
                         
                            <option value="0">0 Month</option>
                            <option value="1">1 Month</option>
                            <option value="2">2 Month</option>
                            <option value="3">3 Month</option>
                            <option value="4">4 Month</option>
                            <option value="5">5 Month</option>
                            <option value="6">6 Month</option>
                               </select>
                                <?php echo form_error('month'); ?>
                            
                    </fieldset>


                    

                       
                        <fieldset class="col-md-12">  
                        <b><h2 class="freelancer_editpost_title">Payment For Freelancer : </h2></b>
                         </fieldset>
                         
                          <fieldset style="padding-left: 8px;" class="col-md-4" <?php if($rate) {  ?> class="error-msg" <?php } ?> >
                            <label class="control-label">Rate:<span style="color:red">*</span></label>
                            <input name="rate" type="number" id="rate" placeholder="Enter Your rate" />
                                <span id="fullname-error"></span>
                                <?php echo form_error('rate'); ?>
                        </fieldset>


                          <fieldset class="col-md-4" <?php if($csurrency) {  ?> class="error-msg" <?php } ?> class="two-select-box"> 
                     <label>Currency:<span class="red">*</span></label>
                            <select name="currency" id="currency">
                              <option value="" selected option disabled>Select Currency</option>
                            <?php foreach($currency as $cur){ ?>
                             <option value="<?php echo $cur['currency_id']; ?>"><?php echo $cur['currency_name']; ?></option>
                             <?php } ?>
                             </select>

          
                             <?php echo form_error('currency'); ?>
</fieldset>

<fieldset class="col-md-4">

<label> Work Type</label>  <input type="radio" name="rating" value="0" checked> Hourly
  <input type="radio" name="rating" value="1"> Fixed
  <?php echo form_error('rating'); ?>
                               </fieldset>



                         <fieldset <?php if($est_time) {  ?> class="error-msg" <?php } ?>>
                        <label>Estimated time of project:</label>
                        <input name="est_time" type="text" id="est_time" placeholder="Enter Estimated time in month/year" /><span id="fullname-error"></span>
                        <?php echo form_error('est_time'); ?>
                         </fieldset>                        

                   
                    <fieldset <?php if($last_date) {  ?> class="error-msg" <?php } ?>>
                        <label>Last date for apply:<span style="color:red">*</span></label>
                        <input type="text" name="last_date" id="datepicker" placeholder="dd/mm/yyyy"   autocomplete="off" value="" >

                        <?php echo form_error('last_date'); ?> 
                    </fieldset>

                    <!-- <fieldset class="full-width" <?php if($location) {  ?> class="error-msg" <?php } ?>>
                        <label>Location:</label>
                        <input name="location" type="text" id="location" placeholder="Enter Location" /><span id="fullname-error"></span>
                         <?php echo form_error('location'); ?>
                    </fieldset> -->


                    <fieldset <?php if($country) {  ?> class="error-msg" <?php } ?>>
                <label>Country:<span style="color:red">*</span></label>
                
                        <select name="country" id="country">
                         <option value="" selected option disabled>Select Country</option>
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

                  <fieldset>
                    <label> City:</label>
                  <select name="city" id="city">
                    <?php

                                         if($city1)

                                            {
                                          foreach($cities as $cnt){
                                               
                                              ?>

                                               <option value="<?php echo $cnt['city_id']; ?>" <?php if($cnt['city_id']==$city1) echo 'selected';?>><?php echo $cnt['city_name'];?></option>

                                                <?php
                                                } }
                                              
                                                else
                                                {
                                            ?>
                                        <option value="">Select Country first</option>

                                         <?php
                                            
                                            }
                                            ?>
                  </select><span id="city-error"></span>
                                    <?php echo form_error('city'); ?>
                </fieldset>

             
                 <div class="fr">           

                    <fieldset class="hs-submit full-width">

<!--                        <input type="reset" value="cancel" >-->
                    
                       <a class="add_post_btnc"  href="javascript:history.back()">Cancel</a>
                      <input type="submit" id="submit"  class="add_post_btns" name="submit" value="Post">    
                    
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
        </div>
        </div>
         
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                
                                </div>


                          
                        </div>
                    </div>
    </section>
    <footer>

        <footer>
            <?php echo $footer; ?>
        </footer>

       
</body>

</html>
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>

   
    
    
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
        <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!-- Calender JS Start-->

<script src="<?php echo base_url('js/jquery.datetimepicker.full.js'); ?>"></script>
<script type="text/javascript">
$('#datepicker').datetimepicker({
  //yearOffset:222,
  //startDate: "2013/02/14",
  minDate:0,
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d',
  scrollMonth : false,
  scrollInput : false
  //minDate:'-1970/01/02', // yesterday is minimum date
  //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
</script>
<!-- Calender Js End-->



<script>

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#tags" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
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

  <script type="text/javascript">
function checkvalue(){
   //alert("hi");
  var searchkeyword=document.getElementById('tags').value;
  var searchplace=document.getElementById('searchplace').value;
  // alert(searchkeyword);
  // alert(searchplace);
  if(searchkeyword == "" && searchplace == ""){
     alert('Please enter Keyword');
    return false;
  }
}
</script>
<script type="text/javascript">
  
function imgval(){ 


 var skill_main = document.getElementById("skills").value;
 var skill_other = document.getElementById("other_skill").value;
 //alert();
 //alert();

     if(skill_main =='' && skill_other == ''){
  //$($("#skils").select2("container")).removeClass("keyskill_border_deactivte");

  $("#postinfo .select2-selection").addClass("keyskill_border_active");
  }
   
  }

</script>


<!-- Field Validation Js Start -->
<!-- <script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script> 

<!-- Field Validation Js End -->

<!-- javascript validation start -->
   <script type="text/javascript">

           jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


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



            $(document).ready(function () { 

                $("#postinfo").validate({

                  ignore: '*:not([name])',

                    rules: {

                        post_name: {

                           required: true,
                            //regx:/^[a-zA-Z0-9\s]*[a-zA-Z][a-zA-Z0-9]*[-@./#&+,\w\s]/
                            regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                            //regx:/\A[a-z0-9\s]+\Z/i
                            //noSpace: true
                           
                        },

                         'skills[]': {
                            
                          require_from_group: [1, ".keyskil"] 
                          //required:true 
                        }, 

                        other_skill: {
                            
                           require_from_group: [1, ".keyskil"],
                            regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                            // required:true 
                        },
                        fields_req:{
                            required:true,
                        },
                      
                       post_desc: {

                            required: true,
                            regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                           //noSpace: true
                           
                        },
                        last_date:{
                          required:true,
                        },
                        currency:{
                          required:true,
                        },
                        rate:{
                          required:true,
                          noSpace: true
                        },
                        country:{
                          required:true,
                        }
                      
                    },

                    messages: {

                        post_name: {

                            required: "Post name Is Required.",
                            
                        },

                       'skills[]': {

                            require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'"

                        },

                        other_skill: {

                            require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'"
                        },
                        fields_req:{
                          required:"Please Select Field of Requirement",
                        },
                        
                        post_desc: {

                            required: "Post Description  Is Required.",
                            
                        },
                       last_date:{
                         required:"Last Date of apply is required.",
                       },
                       currency:{
                        required:"Please select currency type",
                       },
                       rate:{
                        required:"Rate is Required",
                       },
                       country:{
                        required:"Please Select Country"
                       }

                    },

                });
                   });
</script>
<!-- javascript validation End -->
<!-- 
<rash code 7-4 start> -->


 
 <!-- <rash code 7-4 end>  -->

<!-- country city dependent -->

<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){ 
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "freelancer/ajax_dataforcity"; ?>',
                data:'country_id='+countryID,
                success:function(html){
                    $('#city').html(html); 
                }
            }); 
        }else{
            $('#city').html('<option value="">Select Country first</option>'); 
        }
    });
    
});
</script>


<script>
//select2 autocomplete start for skill
$('#searchskills').select2({
        
        placeholder: 'Find Your Skills',
       
        ajax:{

         
          url: "<?php echo base_url(); ?>freelancer/keyskill",
          dataType: 'json',
          delay: 250,
          
          processResults: function (data) {
            
            return {
              //alert(data);

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
       
        ajax:{

         
          url: "<?php echo base_url(); ?>freelancer/location",
          dataType: 'json',
          delay: 250,
          
          processResults: function (data) {
            
            return {
              //alert(data);

              results: data


            };
            
          },
           cache: true
        }
      });
//select2 autocomplete End for Location

//select2 autocomplete start for skill
$('#skills').select2({
        
        placeholder: 'Find Your Skills',
       
        ajax:{

         
          url: "<?php echo base_url(); ?>freelancer/keyskill",
          dataType: 'json',
          delay: 250,
          
          processResults: function (data) {
            
            return {
              //alert(data);

              results: data


            };
            
          },
           cache: true
        }
      });
//select2 autocomplete End for skill

</script>

<style type="text/css">
  #skills-error{margin-top: 38px;}
</style>