<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
      <link href="<?php echo base_url('css/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" />

    <!-- Calender Css Start-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
   <!-- Calender Css End-->


<?php echo $header; ?>
   <?php echo $recruiter_header2; ?>
    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                  <div class="col-md-4"> </div>
                    <div class="col-md-6 col-sm-8">
                     
                    <div class="common-form">
                    <h3>Edit Post</h3>
                        <?php
                                if ($this->session->flashdata('error')) {
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                }
                                if ($this->session->flashdata('success')) {
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                }
                                ?>
                    </div>
                    <div class="panel-body">
                    
                   

                 <?php echo form_open(base_url('recruiter/update_post/' . $postdata[0]['post_id'] ), array('id' => 'basicinfo','name' => 'basicinfo','class' => 'clearfix')); ?>
                 <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>
                 <?php
                         $post_name =  form_error('post_name');
                         $skills =  form_error('skills');
                         $month =  form_error('month');
                         //$interview =  form_error('interview');
                         $position =  form_error('position'); 
                         $post_desc =  form_error('post_desc');
                         //$last_date =  form_error('last_date');
                         $location =  form_error('location'); 
                         $country =  form_error('country');
                         $state =  form_error('state');
                         $city =  form_error('city');
                         $minsal = form_error('minsal');
                         $maxsal = form_error('maxsal');


                         ?>

                    <fieldset class="full-width">
                        <label>Post name:<span style="color:red">*</span></label>
                        <input name="post_name" type="text" id="post_name" placeholder=" Enter Post Name" value="<?php echo $postdata[0]['post_name']; ?>"/>
                        <span id="fullname-error"></span>
                        <?php echo form_error('post_name'); ?>
                    </fieldset>
                    <fieldset class="full-width">
                        <label class="control-label">Skills:<span style="color:red">*</span></label>
                        

                        <select  name="skills[]" id ="skils" multiple="multiple"  style="width: 100%;" class="skill_other full-width ">
                      <?php foreach ($skill as $ski) { ?>
                         <option value="<?php echo $ski['skill_id']; ?>"><?php echo $ski['skill']; ?></option>
                        <?php } ?>
                      </select>
                              

                        <?php echo form_error('skills'); ?>
                   </fieldset>

                   <fieldset class="full-width">
                        <label class="control-label">Other skills:<span style="color:red">*</span></label>
                        <input name="other_skill" type="text" id="other_skill" placeholder=" Enter Skill Name" class="skill_other" value="<?php echo $postdata[0]['other_skill']; ?>"/>
                        <span id="fullname-error"></span>
                        <?php echo form_error('other_skill'); ?>
                    </fieldset>
                   <fieldset <?php if($month) {  ?> class="error-msg" <?php } ?> class="two-select-box full-width" style="    height: 12%;">
                            <label class="control-label">Min experience:<span style="color:red">*</span></label>
                            <select name="minmonth" class="keyskil" style="margin-right: 10px;
    width: 48%;">
                            <option value="" selected option disabled>Month</option>
                            <option value="0" <?php if($postdata[0]['min_month']=="0") echo 'selected';?>>0</option>
                            <option value="1"  <?php if($postdata[0]['min_month']=="1") echo 'selected';?>>1</option>
                            <option value="2"  <?php if($postdata[0]['min_month']=="2") echo 'selected';?>>2</option>
                            <option value="3"  <?php if($postdata[0]['min_month']=="3") echo 'selected';?>>3</option>
                            <option value="4"  <?php if($postdata[0]['min_month']=="4") echo 'selected';?>>4</option>
                            <option value="5"  <?php if($postdata[0]['min_month']=="5") echo 'selected';?>>5</option>
                            <option value="6"  <?php if($postdata[0]['min_month']=="6") echo 'selected';?>>6</option>
                               </select>
                             
                            <select name="minyear" class="keyskil">
                            <option value="" selected option disabled>Year</option>
                            <option value="0"  <?php if($postdata[0]['min_year']=="0") echo 'selected';?>>0</option>
                            <option value="1" <?php if($postdata[0]['min_year']=="1") echo 'selected';?>>1</option>
                            <option value="2" <?php if($postdata[0]['min_year']=="2") echo 'selected';?>>2</option>
                            <option value="3" <?php if($postdata[0]['min_year']=="3") echo 'selected';?>>3</option>
                            <option value="4" <?php if($postdata[0]['min_year']=="4") echo 'selected';?>>4</option>
                            <option value="5" <?php if($postdata[0]['min_year']=="5") echo 'selected';?>>5</option>
                            <option value="6" <?php if($postdata[0]['min_year']=="6") echo 'selected';?>>6</option>
                            <option value="7" <?php if($postdata[0]['min_year']=="7") echo 'selected';?>>7</option>
                            <option value="8" <?php if($postdata[0]['min_year']=="8") echo 'selected';?>>8</option>
                            <option value="9" <?php if($postdata[0]['min_year']=="9") echo 'selected';?>>9</option>
                            <option value="10" <?php if($postdata[0]['min_year']=="10") echo 'selected';?>>10</option>
                            <option value="11" <?php if($postdata[0]['min_year']=="11") echo 'selected';?>>11</option>
                            <option value="12" <?php if($postdata[0]['min_year']=="12") echo 'selected';?>>12</option>
                            <option value="13" <?php if($postdata[0]['min_year']=="13") echo 'selected';?>>13</option>
                            <option value="14" <?php if($postdata[0]['min_year']=="14") echo 'selected';?>>14</option>
                            <option value="15" <?php if($postdata[0]['min_year']=="15") echo 'selected';?>>15</option>
                            <option value="16" <?php if($postdata[0]['min_year']=="16") echo 'selected';?>>16</option>
                            <option value="17" <?php if($postdata[0]['min_year']=="17") echo 'selected';?>>17</option>
                            <option value="18" <?php if($postdata[0]['min_year']=="18") echo 'selected';?>>18</option>
                            <option value="19" <?php if($postdata[0]['min_year']=="19") echo 'selected';?>>19</option>
                            <option value="20" <?php if($postdata[0]['min_year']=="20") echo 'selected';?>>20</option>
                            </select>
                            <span id="fullname-error"></span>
                            <?php echo form_error('month'); ?> &nbsp;&nbsp; <?php echo form_error('year'); ?>
                        </fieldset>


                        <fieldset <?php if($month) {  ?> class="error-msg" <?php } ?> class="two-select-box full-width">
                            <label class="control-label">Max experience:<span style="color:red">*</span></label>
                            <select name="maxmonth" class="keyskil1" style="margin-right: 10px;
    width: 48%;">

                            <option value="" selected option disabled>Month</option>
                            <option value="0" <?php if($postdata[0]['max_month']=="0") echo 'selected';?>>0</option>
                             <option value="1" <?php if($postdata[0]['max_month']=="1") echo 'selected';?>>1</option>
                            <option value="2" <?php if($postdata[0]['max_month']=="2") echo 'selected';?>>2</option>
                            <option value="3" <?php if($postdata[0]['max_month']=="3") echo 'selected';?>>3</option>
                            <option value="4" <?php if($postdata[0]['max_month']=="4") echo 'selected';?>>4</option>
                            <option value="5" <?php if($postdata[0]['max_month']=="5") echo 'selected';?>>5</option>
                            <option value="6" <?php if($postdata[0]['max_month']=="6") echo 'selected';?>>6</option>
                               </select>
                             
                            <select name="maxyear" class="keyskil1">
                            <option value=""  selected option disabled>Year</option>
                            <option value="0" <?php if($postdata[0]['max_year']=="0") echo 'selected';?>>0</option>
                            <option value="1" <?php if($postdata[0]['max_year']=="1") echo 'selected';?>>1</option>
                            <option value="2" <?php if($postdata[0]['max_year']=="2") echo 'selected';?>>2</option>
                            <option value="3" <?php if($postdata[0]['max_year']=="3") echo 'selected';?>>3</option>
                            <option value="4" <?php if($postdata[0]['max_year']=="4") echo 'selected';?>>4</option>
                            <option value="5" <?php if($postdata[0]['max_year']=="5") echo 'selected';?>>5</option>
                            <option value="6" <?php if($postdata[0]['max_year']=="6") echo 'selected';?>>6</option>
                            <option value="7" <?php if($postdata[0]['max_year']=="7") echo 'selected';?>>7</option>
                            <option value="8" <?php if($postdata[0]['max_year']=="8") echo 'selected';?>>8</option>
                            <option value="9" <?php if($postdata[0]['max_year']=="9") echo 'selected';?>>9</option>
                            <option value="10" <?php if($postdata[0]['max_year']=="10") echo 'selected';?>>10</option>
                            <option value="11" <?php if($postdata[0]['max_year']=="11") echo 'selected';?>>11</option>
                            <option value="12" <?php if($postdata[0]['max_year']=="12") echo 'selected';?>>12</option>
                            <option value="13" <?php if($postdata[0]['max_year']=="13") echo 'selected';?>>13</option>
                            <option value="14" <?php if($postdata[0]['max_year']=="14") echo 'selected';?>>14</option>
                            <option value="15" <?php if($postdata[0]['max_year']=="15") echo 'selected';?>>15</option>
                            <option value="16" <?php if($postdata[0]['max_year']=="16") echo 'selected';?>>16</option>
                            <option value="17" <?php if($postdata[0]['max_year']=="17") echo 'selected';?>>17</option>
                            <option value="18" <?php if($postdata[0]['max_year']=="18") echo 'selected';?>>18</option>
                            <option value="19" <?php if($postdata[0]['max_year']=="19") echo 'selected';?>>19</option>
                            <option value="20" <?php if($postdata[0]['max_year']=="20") echo 'selected';?>>20</option>
                            </select>
                            <span id="fullname-error"></span>
                            <?php echo form_error('month'); ?> &nbsp;&nbsp; <?php echo form_error('year'); ?>
                        </fieldset>

                        <fieldset class="form-group full-width" style="margin-top: -19px;
    margin-bottom: 2px;">
                          <?php
                                if($postdata[0]['fresher'])
                                {
                          ?>
                          <input style="width: 6%; height: 15px; " type="checkbox" name="fresher" value="1" style="width: 5%;" checked>Fresher can also apply..!
                        <?php 
                             }
                             else
                             {
                          ?>
                          <input type="checkbox" name="fresher" value="1" style="width: 5%;" >Fresher can also apply..!
                          <?php 
                        }
                        ?>
                        </fieldset>
                <fieldset class="full-width">
                        <label>No of position:<span style="color:red">*</span></label>
                        <input name="position" type="number" min="1" id="position" value="<?php echo $postdata[0]['post_position']; ?>" onblur="return full_name();"/>
                        <span id="fullname-error"></span>
                        <?php echo form_error('position'); ?>
                </fieldset>
                
                <fieldset  class="full-width">
                    <label >Post description:<span style="color:red">*</span></label>
                    <?php echo form_textarea(array('name' => 'post_desc', 'id' => 'varmailformat', 'class' => "ckeditor", 'value' => html_entity_decode($postdata[0]['post_description']))); ?>
                    <?php echo form_error('post_desc'); ?>
                </fieldset>
                                       

                <fieldset class="full-width">
                      <label>Interview process:<!-- <span style="color:red">*</span> --></label>

                      <textarea name="interview" id="interview" placeholder="Enter Interview Process"><?php  echo $postdata[0]['interview_process']; ?></textarea>
                     
                      <?php echo form_error('interview'); ?> 
                </fieldset>
                      
                <fieldset class="full-width">
                      <label>Last date for apply: <!-- <span style="color:red">*</span> --></label>
                      <input type="text" name="last_date" placeholder="Enter last date for apply" id="datepicker" value="<?php echo $postdata[0]['post_last_date']; ?>"  placeholder="Enter text">
                      <?php echo form_error('last_date'); ?> 
                </fieldset>

               

                <fieldset class="full-width" <?php if($country) {  ?> class="error-msg" <?php } ?>>
                                    <label>Country:<span style="color:red">*</span></label>
                                     

                                      <?php 
                 $countryname =  $this->db->get_where('countries',array('country_id' => $postdata[0]['country']))->row()->country_name; ?>

                                     <select name="country" id="country">
                                    <option value="<?php echo $postdata[0]['country'] ;?>"><?php echo $countryname ;?></option>
                                    <?php
                                    if(count($countries) > 0){
                                    foreach($countries as $cnt){
                                      if($cnt['country_id'] != $postdata[0]['country'])
                                      {
                                    ?>

                                    <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name']; ?></option>
                                    <?php }}}
                                    ?>
                                      </select> 
                                      
                                      <?php echo form_error('country'); ?>
                         </fieldset>

                         <?php 
                 $statename =  $this->db->get_where('states',array('state_id' => $postdata[0]['state']))->row()->state_name; ?>

                         <fieldset  class="full-width" <?php if($state) {  ?> class="error-msg" <?php } ?>>
                                    <label>State:<span style="color:red">*</span></label>
                                     <select name="state" id="state">
                                    <?php
                                           if($postdata[0]['state'])

                                            {
                                            foreach($states as $cnt){
                                               
                                              ?>

                                                 <option value="<?php echo $cnt['state_id']; ?>" <?php if($cnt['state_id']==$postdata[0]['state']) echo 'selected';?>><?php echo $cnt['state_name'];?></option>
                                              
                                                <?php
                                                } }
                                              
                                                else
                                                {
                                            ?>
                                                 <option value="">Select country first</option>
                                                  <?php
                                            
                                            }
                                            ?>
                                      </select>
                                      <?php echo form_error('state'); ?> 
                        </fieldset>


                  <?php 
                 $cityname =  $this->db->get_where('cities',array('city_id' => $postdata[0]['city']))->row()->city_name; ?>

                        <fieldset class="full-width" <?php if($city) {  ?> class="error-msg" <?php } ?>>
                                    <label>City:</label>
                                    <select name="city" id="city">
                                      <?php
                                        if($postdata[0]['city'])

                                            {
                                          foreach($cities as $cnt){
                                              
                                                 //echo "hi";die();
                                                 
                                              ?>

                                               <option value="<?php echo $cnt['city_id']; ?>" <?php if($cnt['city_id']==$postdata[0]['city']) echo 'selected';?>><?php echo $cnt['city_name'];?></option>

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
                                    </select>
                                    <?php echo form_error('city'); ?>
                        </fieldset>

                  <fieldset class="full-width" <?php if($minsal) {  ?> class="error-msg" <?php } ?>>
                            <label class="control-label">Min salary:(Per Year)<!-- <span style="color:red">*</span> --></label>
                            <input name="minsal" type="text" id="minsal" value="<?php echo $postdata[0]['min_sal']; ?>" onblur="return full_name();" placeholder="Enter Minimum Salary" /><span id="fullname-error"></span>
                            <?php echo form_error('minsal'); ?>
                        </fieldset>

                         <fieldset class="full-width" <?php if($maxsal) {  ?> class="error-msg" <?php } ?>>
                            <label class="control-label">Max salary:(Per Year)<!-- <span style="color:red">*</span> --></label>
                            <input name="maxsal" type="text" id="maxsal" value="<?php echo $postdata[0]['max_sal']; ?>" onblur="return full_name();" placeholder="Enter Maximum Salary" /><span id="fullname-error"></span>
                            <?php echo form_error('maxsal'); ?>
                        </fieldset>
                
               <fieldset class="hs-submit full-width">
                  <!--   <input type="reset"> -->
                    <input type="submit" id="submit" name="submit" value="save">
                    <a href="javascript:history.back()">Cancel</a>
                    
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
  
        


  <script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<!-- script for select2 box Script start-->


<!-- script for select2 box Script End-->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>

<!--  <script type="text/javascript" src="<?php //echo base_url('js/jquery.validate.js'); ?>"></script> -->

<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>
<script type="text/javascript">
//select2 autocomplete start for skill
var complex = <?php echo json_encode($selectdata); ?>;
$('#skils').select2().select2('val', complex)
//select2 autocomplete End for skill
</script>

<script type="text/javascript">

// $('#skils').select2();
// $('#skils').on("change", function(e) {
//   $(e.target).valid();
// });
            //validation for edit email formate form

            $(document).ready(function () { 

                $("#basicinfo").validate({
                  //ignore: [],

                    ignore: '*:not([name])',
                    rules: {
                       
                        post_name: {

                            required: true
                        },

                       'skills[]': {

                               require_from_group: [1, ".skill_other"]
                              
                    },
                    other_skill: {

                               require_from_group: [1, ".skill_other"]
                              
                    },
                         
                        year: {

                            required: true
                        },
                       
                     
                        month: {

                            required: true
                           
                        },

                        position: {

                            required: true
                           
                        },

                        post_desc: {

                            required: true
                           
                        },

                        
                        country: {

                            required: true
                           
                        },

                        state: {

                            required: true
                           
                        },

                        minyear: {
                            
                          require_from_group: [1, ".keyskil"] 
                          //required:true 
                        }, 

                        minmonth: {
                            
                           require_from_group: [1, ".keyskil"]
                            // required:true 
                        },

                        maxyear: {
                            
                          require_from_group: [1, ".keyskil1"] 
                          //required:true 
                        }, 

                        maxmonth: {
                            
                           require_from_group: [1, ".keyskil1"]
                            // required:true 
                        },

                        last_date: {
                            
                            required: true
                            
                        },

                       
                    },

                    messages: {

                        post_name: {

                            required: "Post name Is Required."
                            
                        },
                         'skills[]': {

                            require_from_group: "You must either fill out 'skill' or 'other_skill'"
                        },

                        other_skill: {

                            require_from_group: "You must either fill out 'skill' or 'other_skill'"
                        },

                       
                        minyear: {

                            required: "Year Selection Is Required"
                        },

                        
                        minmonth: {

                            required: "Month no Is Required."
                            
                        },

                        position: {

                            required: "Position Selection Is Required"
                           
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

                        minyear: {

                            require_from_group: "You must either fill out 'month' or 'year'"

                        },

                        minmonth: {

                            require_from_group: "You must either fill out 'month' or 'year'"
                        },

                        maxyear: {

                            require_from_group: "You must either fill out 'month' or 'year'"

                        },

                        maxmonth: {

                            require_from_group: "You must either fill out 'month' or 'year'"
                        },

                        last_date: {

                            required: "Last date  Is Required."
                        },
                        
                    }

                });


                   });
  </script>

   <!-- popup form edit start -->
  

<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){ 
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "recruiter/ajax_data"; ?>',
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
                url:'<?php echo base_url() . "recruiter/ajax_data"; ?>',
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



 

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!-- Calender JS Start-->
<script src="<?php //echo base_url('js/jquery.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery.datetimepicker.full.js'); ?>"></script>
<script type="text/javascript">
$('#datepicker').datetimepicker({
  //yearOffset:222,
  startDate: "2013/02/14",
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d'
  //minDate:'-1970/01/02', // yesterday is minimum date
  //maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
</script>
<!-- Calender Js End

