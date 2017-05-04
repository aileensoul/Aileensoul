<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
     
<?php echo $header; ?>
    <!-- END HEADER -->
    <!-- pallavi 14-4-2017 -->
    <?php echo $freelancer_hire_header2; ?>
    <!-- pallavi end 14-4-2017 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/3.3.0/select2.css'); ?>">
     <link href="<?php echo base_url('css/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

     <!-- Calender Css Start-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
   <!-- Calender Css End-->

    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <!-- <?php echo $freelancer_hire_left; ?> -->
                    <div class="col-md-3"></div>
                    <div class="col-md-7 col-sm-8">


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
                    <h3>Edit Post</h3>

                   
                    
                 <?php echo form_open(base_url('freelancer/freelancer_edit_post_insert/'.$freelancerpostdata[0]['post_id']), array('id' => 'postinfo','name' => 'postinfo','class' => 'clearfix')); ?>

                    <!-- <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>  -->

                                <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> 
                                   <span style="color:#7f7f7e">Indicates required field</span>
                                </div> 

                            <fieldset class="full-width">
                                <label>Post name:<span style="color:red">*</span></label>
                                <input name="post_name" type="text" id="post_name" placeholder="Enter Post Name" value="<?php echo $freelancerpostdata[0]['post_name']?> "/>
                                <span id="fullname-error"></span>                        
                                <?php echo form_error('post_name'); ?>
                            </fieldset>

                            <fieldset class="full-width">
                                <label>Post description:<span style="color:red">*</span></label>

                                <textarea name="post_desc" id="post_desc" placeholder="Enter Description"><?php echo $freelancerpostdata[0]['post_description']; ?></textarea>

                                
                                <?php echo form_error('post_desc'); ?>
                           </fieldset>


                           <fieldset class="full-width" <?php if($fields_req) {  ?> class="error-msg" <?php } ?>>
                  <label>Fields Of Requirmeant:<span style="color:red">*</span></label>
                   <select name="fields_req" id="fields_req">
                 <?php  
                                            if(count($category) > 0){ 
                                                           foreach($category as $cnt){  
                                          
                                            if($freelancerpostdata[0]['post_field_req'])
                                            {  
                                              ?>
                                                 <option value="<?php echo $cnt['category_id']; ?>" <?php if($cnt['category_id'] == $freelancerpostdata[0]['post_field_req']) echo 'selected';?>><?php echo $cnt['category_name'];?></option>
                                               
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

                            <fieldset class="full-width" <?php if($post_skill) {  ?> class="error-msg" <?php } ?>>
                                <label>Skills:<span style="color:red">*</span></label>
                               
                                  <select name="skills[]" id ="skill1" multiple="multiple" style="width:100% " class="skill1">

                                 <?php foreach ($skill1 as $skill) { ?>
                                <option value="<?php echo $skill['skill_id']; ?>"><?php echo $skill['skill']; ?></option>
                                  <?php } ?>

                                </select>
                                <?php echo form_error('skills'); ?>
                                </select>
                            </fieldset>

                            <fieldset class="full-width" <?php if($other_skill) {  ?> class="error-msg" <?php } ?> >
                            <label class="control-label">Other Skill:</label>
                            <input name="other_skill" type="text" id="other_skill" placeholder="Enter Your Other Skill" value="<?php echo $freelancerpostdata[0]['post_other_skill']; ?>" />
                                <span id="fullname-error"></span>
                                <?php echo form_error('other_skill'); ?>
                        </fieldset>


              <fieldset class="full-width two-select-box fullwidth_experience"> 
                                <label>Experience:</label>
                                
                                <select name="year" id="year">
                                    <option value="<?php echo $freelancerpostdata[0]['post_exp_year']?>"><?php echo $freelancerpostdata[0]['post_exp_year']." Year"?></option>
                                    <option value="#">Year</option>
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

                                <select name="month" id="month">
                                    <option value="<?php echo $freelancerpostdata[0]['post_exp_month']?> "><?php echo $freelancerpostdata[0]['post_exp_month']." Month"?></option>
                                    <option value="#">Month</option>
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
                             <b><h2>Payment For Freelancer : </h2></b>
                            </fieldset>

                            <fieldset  class="col-md-4" <?php if($rate) {  ?> class="error-msg" <?php } ?> >
                            <label class="control-label">Rate:<span style="color:red">*</span></label>
                            <input name="rate" type="number" id="rate" placeholder="Enter Your rate" value="<?php echo $freelancerpostdata[0]['post_rate']; ?>" />
                                <span id="fullname-error"></span>
                                <?php echo form_error('rate'); ?>
                            </fieldset>

                            <fieldset class=" col-md-4"> 
                     <label>Currency:</label>
                            <select name="currency" id="currency">
                            <?php if(count($currency) > 0){
                            foreach($currency as $cur){ 

                                if($freelancerpostdata[0]['post_currency'])
                                            {?>

                                         <option value="<?php echo $cur['currency_id']; ?>" <?php if($cur['currency_id'] == $freelancerpostdata[0]['post_currency']) echo 'selected';?>><?php echo $cur['currency_name'];?></option>
                                            <?php }else{
                                ?>
                             <option value="<?php echo $cur['currency_id']; ?>"><?php echo $cur['currency_name']; ?></option>
                             <?php  } } }?>
                             </select>

          
                             <?php echo form_error('currency'); ?>

                    </fieldset>
                    <fieldset class="col-md-4">
                    <label>Work Type</label>
  <input type="radio" name="rating" value="0" checked> Hourly
  <input type="radio" name="rating" value="1"> Fixed
  <?php echo form_error('rating'); ?>
                               </fieldset>

                            
                             <fieldset>
                                <label>Estimated time of project:</label>
                                <input name="est_time" type="text" id="est_time" placeholder="Enter Estimated time in month/year" value="<?php echo $freelancerpostdata[0]['post_est_time']?> "/>
                                <span id="fullname-error"></span>
                                <?php echo form_error('post_name'); ?>
                            </fieldset>

                            
                         <fieldset <?php if($last_date) {  ?> class="error-msg" <?php } ?>>
                        <label>Last date for apply:<span style="color:red">*</span></label>
                        <input type="text" name="last_date" id="datepicker" placeholder="dd/mm/yyyy"   autocomplete="off" value="<?php echo $freelancerpostdata[0]['post_last_date']?>" >

                        <?php echo form_error('last_date'); ?> 
                    </fieldset>
  

                        <!-- <fieldset <?php if($last_date) {  ?> class="error-msg" <?php } ?>>
                        <label>Last date for apply:</label>
                        <input type="date" name="last_date" placeholder="Enter date" id="last_date1" value="<?php echo $freelancerpostdata[0]['post_last_date']?>">
                        <?php echo form_error('last_date'); ?> 
                        </fieldset>
 -->
                           <!--  <fieldset>
                                <label class="full-width">Location:</label>
                                <input name="location" type="text" id="location" onblur="return full_name();" value="<?php echo $freelancerpostdata[0]['post_location']?>" /><span id="fullname-error"></span>
                                <?php  ?>
                            </fieldset> -->


                            <fieldset <?php if($country) {  ?> class="error-msg" <?php } ?>>
                <label>Country:<span style="color:red">*</span></label>
                
                        <select name="country" id="country">
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

                            <fieldset class="hs-submit full-width">

                                <!-- <input type="reset"> -->
                                <a href="javascript:history.back()">Cancel</a>
                                <input type="submit" id="submit" name="submit" value="save">
                                
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
    <?php echo $footer; ?>
    <!-- end footer -->
 <script src="<?php echo base_url('js/jquery.js'); ?>"></script>         
       <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>  
<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url('js/jquery.datetimepicker.full.js'); ?>"></script>
<script type="text/javascript">
$('#datepicker').datetimepicker({
  //yearOffset:222,
 // startDate: "2013/02/14",
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d'
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

</script>


<!-- Field Validation Js Start -->
 

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<!-- Field Validation Js End -->
<!-- javascript validation start -->
   <script type="text/javascript">

           

            $(document).ready(function () { 

                $("#postinfo").validate({

                    rules: {

                        post_name: {

                            required: true,
                           
                        },

                         skills: {

                            required: true,
                           
                        },
                       
                       hourly: {

                            required: true,
                            
                        },
                       
                       est_time: {

                            required: true,
                           
                           
                        },
                        year: {

                            required: true,
                           
                        },
                       month: {

                            required: true,
                           
                        },
                        position: {

                            required: true,
                           
                        },
                       post_desc: {

                            required: true,
                           
                        },
                        interview: {

                            required: true,
                           
                        },
                       datepicker: {

                            required: true,
                           
                        }, 
                        country: {

                            required: true,
                           
                        },
                        city: {

                            required: true,
                           
                        },  
                        last_date:{
                          required:true,
                        }
                    },

                    messages: {

                        post_name: {

                            required: "Post name Is Required.",
                            
                        },

                        skills: {

                            required: "Skill Is Required.",
                            
                        },

                         hourly: {

                            required: "Hour Selection Is Required.",
                            
                        },

                        est_time: {

                            required: "Estimated Time Is Required.",
                            
                        },
                         year: {

                            required: "Year Selection Is Required.",
                            
                        },
                        month: {

                            required: "Month Selection Is Required.",
                            
                        },
                        position: {

                            required: "Position Selection Is Required.",
                            
                        },
                        post_desc: {

                            required: "Post Description  Is Required.",
                            
                        },
                        interview: {

                            required: "Interview Selection Is Required.",
                            
                        },
                       datepicker: {

                            required: "Last Date Selection Is Required.",
                            
                        },
                        country: {

                            required: " Country Is Required.",
                            
                        },
                        city: {

                            required: " City Is Required.",
                            
                        },
                        last_date:{
                          required:"Last Date of apply is required.",
                        }

                    },

                });
                   });
</script>


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
<!-- script for skill textbox automatic start (option 2)-->
<script type="text/javascript" src="<?php echo base_url('js/3.3.0/select2.js'); ?>"></script>
<!-- script for skill textbox automatic end (option 2)-->

<script>

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
 <script>

var complex = <?php echo json_encode($selectdata); ?>;

$("#skill1").select2().select2('val',complex)

</script>