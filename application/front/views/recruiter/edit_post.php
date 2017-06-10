  <!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
      <link href="<?php echo base_url('css/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

     <!-- This Css is used for call popup -->
   <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />

    <!-- Calender Css Start-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
   <!-- Calender Css End-->


<?php echo $header; ?>
   <?php echo $recruiter_header2; ?>
    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                  <div class="col-md-3"> </div>
                    <div class="col-md-7 col-sm-7">
                     
                    <div class="common-form">
                    <h3 class="h3_edit">Edit Post</h3>
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
                    
                   

                 <?php echo form_open(base_url('recruiter/update_post/' . $postdata[0]['post_id'] ), array('id' => 'basicinfo','name' => 'basicinfo','class' => 'clearfix ','onsubmit' => "return imgval()")); ?>
                 <div> <span class="required_field" >( <span style="color: red">*</span> ) Indicates required field</span></div>
                 <?php
                         $post_name =  form_error('post_name');
                         $skills =  form_error('skills');
                         $month =  form_error('month');
                         //$interview =  form_error('interview');
                         $position =  form_error('position'); 
                         $post_desc =  form_error('post_desc');
                         $last_date =  form_error('last_date');
                         $location =  form_error('location'); 
                         $country =  form_error('country');
                         $state =  form_error('state');
                         $city =  form_error('city');
                         $minsal = form_error('minsal');
                         $maxsal = form_error('maxsal');


                         ?>

                    <fieldset class="full-width">
                        <label>Post Title:<span style="color:red">*</span></label>
                        <input name="post_name" type="text" id="post_name" placeholder=" Position [Ex:- Sr. Engineer, Jr. Engineer]" value="<?php echo $postdata[0]['post_name']; ?>"/>
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

                     <fieldset class="full-width">
                        <label>No of position:<!-- <span style="color:red">*</span> --></label>
                        
                        <input name="position" type="text"  id="position" value="<?php echo $postdata[0]['post_position']; ?>" placeholder="Enter No of Candidate"/>
                        <span id="fullname-error"></span>
                        <?php echo form_error('position'); ?>
                </fieldset>

                   <fieldset <?php if ($month) { ?> class="error-msg" <?php } ?> class="two-select-box1">
                                    <label class="control-label">Minimum experience:<span style="color:red">*</span></label>


                                    <select style="cursor:pointer;" name="minyear" id="minyear" class="keyskil">
                                       
                                         <option value="" selected option disabled>Year</option>
                                    
                                       <option value="0" <?php if($postdata[0]['min_year']=="0") echo 'selected="selected"'; ?>>0 Year</option>
                                    <option value="1" <?php if($postdata[0]['min_year']=="1") echo 'selected="selected"'; ?>>1 Year</option>
                                    <option value="2" <?php if($postdata[0]['min_year']=="2") echo 'selected="selected"'; ?>>2 Year</option>
                                    <option value="3" <?php if($postdata[0]['min_year']=="3") echo 'selected="selected"'; ?>>3 Year</option>
                                    <option value="4" <?php if($postdata[0]['min_year']=="4") echo 'selected="selected"'; ?>>4 Year</option>
                                    <option value="5" <?php if($postdata[0]['min_year']=="5") echo 'selected="selected"'; ?>>5 Year</option>
                                    <option value="6" <?php if($postdata[0]['min_year']=="6") echo 'selected="selected"'; ?>>6 Year</option>
                                    <option value="7" <?php if($postdata[0]['min_year']=="7") echo 'selected="selected"'; ?>>7 Year</option>
                                    <option value="8" <?php if($postdata[0]['min_year']=="8") echo 'selected="selected"'; ?>>8 Year</option>
                                    <option value="9" <?php if($postdata[0]['min_year']=="9") echo 'selected="selected"'; ?>>9 Year</option>
                                    <option value="10" <?php if($postdata[0]['min_year']=="10") echo 'selected="selected"'; ?>>10 Year</option>
                                    <option value="11" <?php if($postdata[0]['min_year']=="11") echo 'selected="selected"'; ?>>11 Year</option>
                                    <option value="12" <?php if($postdata[0]['min_year']=="12") echo 'selected="selected"'; ?>>12 Year</option>
                                    <option value="13" <?php if($postdata[0]['min_year']=="13") echo 'selected="selected"'; ?>>13 Year</option>
                                    <option value="14" <?php if($postdata[0]['min_year']=="14") echo 'selected="selected"'; ?>>14 Year</option>
                                    <option value="15" <?php if($postdata[0]['min_year']=="15") echo 'selected="selected"'; ?>>15 Year</option>
                                    <option value="16" <?php if($postdata[0]['min_year']=="16") echo 'selected="selected"'; ?>>16 Year</option>
                                    <option value="17" <?php if($postdata[0]['min_year']=="17") echo 'selected="selected"'; ?>>17 Year</option>
                                    <option value="18" <?php if($postdata[0]['min_year']=="18") echo 'selected="selected"'; ?>>18 Year</option>
                                    <option value="19" <?php if($postdata[0]['min_year']=="19") echo 'selected="selected"'; ?>>19 Year</option>
                                    <option value="20" <?php if($postdata[0]['min_year']=="20") echo 'selected="selected"'; ?>>20 Year</option>
                                    </select>
                                    
                                    <select style="cursor:pointer;" name="minmonth" id="minmonth" class="keyskil margin-month ">
                                       
                                        <option value="" selected option disabled>Month</option>

                                  <option value="0" <?php if($postdata[0]['min_month']=="0") echo 'selected="selected"'; ?>>0 Month</option>
                                   <option value="1" <?php if($postdata[0]['min_month']=="1") echo 'selected="selected"'; ?>>1 Month</option>
                                  <option value="2" <?php if($postdata[0]['min_month']=="2") echo 'selected="selected"'; ?>>2 Month</option>
                                  <option value="3" <?php if($postdata[0]['min_month']=="3") echo 'selected="selected"'; ?>>3 Month</option>
                                  <option value="4" <?php if($postdata[0]['min_month']=="4") echo 'selected="selected"'; ?>>4 Month</option>
                                   <option value="5" <?php if($postdata[0]['min_month']=="5") echo 'selected="selected"'; ?>>5 Month</option>
                                  <option value="6"<?php if($postdata[0]['min_month']=="6") echo 'selected="selected"'; ?>>6 Month</option>
                                    </select>
                                     
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('month'); ?> &nbsp;&nbsp; <?php echo form_error('year'); ?>

                                </fieldset>


                                <fieldset <?php if ($month) { ?> class="error-msg" <?php } ?> class="two-select-box1">
                                    <label class="control-label">&nbsp;Maximum experience:<span style="color:red">*</span></label>


                                      <select style="cursor:pointer;" name="maxyear"  id="maxyear" class="keyskil1">

                                        <option value="" selected option disabled>Year</option>
                                    
                                       <option value="0" <?php if($postdata[0]['max_year']=="0") echo 'selected="selected"'; ?>>0 Year</option>
                                    <option value="1" <?php if($postdata[0]['max_year']=="1") echo 'selected="selected"'; ?>>1 Year</option>
                                    <option value="2" <?php if($postdata[0]['max_year']=="2") echo 'selected="selected"'; ?>>2 Year</option>
                                    <option value="3" <?php if($postdata[0]['max_year']=="3") echo 'selected="selected"'; ?>>3 Year</option>
                                    <option value="4" <?php if($postdata[0]['max_year']=="4") echo 'selected="selected"'; ?>>4 Year</option>
                                    <option value="5" <?php if($postdata[0]['max_year']=="5") echo 'selected="selected"'; ?>>5 Year</option>
                                    <option value="6" <?php if($postdata[0]['max_year']=="6") echo 'selected="selected"'; ?>>6 Year</option>
                                    <option value="7" <?php if($postdata[0]['max_year']=="7") echo 'selected="selected"'; ?>>7 Year</option>
                                    <option value="8" <?php if($postdata[0]['max_year']=="8") echo 'selected="selected"'; ?>>8 Year</option>
                                    <option value="9" <?php if($postdata[0]['max_year']=="9") echo 'selected="selected"'; ?>>9 Year</option>
                                    <option value="10" <?php if($postdata[0]['max_year']=="10") echo 'selected="selected"'; ?>>10 Year</option>
                                    <option value="11" <?php if($postdata[0]['max_year']=="11") echo 'selected="selected"'; ?>>11 Year</option>
                                    <option value="12" <?php if($postdata[0]['max_year']=="12") echo 'selected="selected"'; ?>>12 Year</option>
                                    <option value="13" <?php if($postdata[0]['max_year']=="13") echo 'selected="selected"'; ?>>13 Year</option>
                                    <option value="14" <?php if($postdata[0]['max_year']=="14") echo 'selected="selected"'; ?>>14 Year</option>
                                    <option value="15" <?php if($postdata[0]['max_year']=="15") echo 'selected="selected"'; ?>>15 Year</option>
                                    <option value="16" <?php if($postdata[0]['max_year']=="16") echo 'selected="selected"'; ?>>16 Year</option>
                                    <option value="17" <?php if($postdata[0]['max_year']=="17") echo 'selected="selected"'; ?>>17 Year</option>
                                    <option value="18" <?php if($postdata[0]['max_year']=="18") echo 'selected="selected"'; ?>>18 Year</option>
                                    <option value="19" <?php if($postdata[0]['max_year']=="19") echo 'selected="selected"'; ?>>19 Year</option>
                                    <option value="20" <?php if($postdata[0]['max_year']=="20") echo 'selected="selected"'; ?>>20 Year</option>
                                    </select>

                                      

                                    <select style="cursor:pointer;" name="maxmonth" id="maxmonth" class="keyskil1 margin-month ">
                                       

                                         <option value="" selected option disabled>Month</option>

                                  <option value="0" <?php if($postdata[0]['max_month']=="0") echo 'selected="selected"'; ?>>0 Month</option>
                                   <option value="1" <?php if($postdata[0]['max_month']=="1") echo 'selected="selected"'; ?>>1 Month</option>
                                  <option value="2" <?php if($postdata[0]['max_month']=="2") echo 'selected="selected"'; ?>>2 Month</option>
                                  <option value="3" <?php if($postdata[0]['max_month']=="3") echo 'selected="selected"'; ?>>3 Month</option>
                                  <option value="4" <?php if($postdata[0]['max_month']=="4") echo 'selected="selected"'; ?>>4 Month</option>
                                   <option value="5" <?php if($postdata[0]['max_month']=="5") echo 'selected="selected"'; ?>>5 Month</option>
                                  <option value="6"<?php if($postdata[0]['max_month']=="6") echo 'selected="selected"'; ?>>6 Month</option>
                                    </select>

                                   <span id="fullname-error"></span>
                                    <?php echo form_error('month'); ?> &nbsp;&nbsp; <?php echo form_error('year'); ?>
                                </fieldset>
                        <fieldset class="form-group full-width" style="margin-top: 0px;
    margin-bottom: 2px;">
                          <?php
                                if($postdata[0]['fresher'])
                                {
                          ?>
                          <input  style="width: 6%;cursor:pointer; height: 15px; " type="checkbox" name="fresher" value="1" style="width: 5%;" checked>Fresher can also apply..!
                        <?php 
                             }
                             else
                             {
                          ?>
                          <input type="checkbox" style="cursor:pointer;width:4%" name="fresher" value="1" style="width: 5%;" >Fresher can also apply..!
                          <?php 
                        }
                        ?>
                        </fieldset>
               
                
                <fieldset  class="full-width">
                    <label >Job description:<span style="color:red">*</span></label>

                   <!--  <?php echo form_textarea(array('name' => 'post_desc', 'id' => 'varmailformat', 'class' => "ckeditor", 'value' => html_entity_decode($postdata[0]['post_description']))); ?> -->

                    <textarea name="post_desc" id="varmailformat" rows="4" cols="50"  placeholder="Enter Job Description" style="resize: none;"><?php echo $postdata[0]['post_description']; ?></textarea>

                    <?php echo form_error('post_desc'); ?>
                </fieldset>
                                       

                <fieldset class="full-width">
                      <label>Interview process:<!-- <span style="color:red">*</span> --></label>

                      <textarea name="interview" id="interview" rows="4" placeholder="Enter Interview Process"><?php  echo $postdata[0]['interview_process']; ?></textarea>
                     
                      <?php echo form_error('interview'); ?> 
                </fieldset>
               
               

                <fieldset class="half-width" <?php if($country) {  ?> class="error-msg" <?php } ?>>
                                    <label>Country:<span style="color:red">*</span></label>
                                     

                                      <?php 
                 $countryname =  $this->db->get_where('countries',array('country_id' => $postdata[0]['country']))->row()->country_name; ?>

                                     <select style="cursor:pointer;" name="country" id="country">

                                  

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
                                      </select> 
                                      
                                      <?php echo form_error('country'); ?>
                         </fieldset>

                         <?php 
                 $statename =  $this->db->get_where('states',array('state_id' => $postdata[0]['state']))->row()->state_name; ?>

                         <fieldset  class="half-width" <?php if($state) {  ?> class="error-msg" <?php } ?>>
                                    <label>State:<span style="color:red">*</span></label>
                                     <select style="cursor:pointer;" name="state" id="state">
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

                        <fieldset class="half-width" <?php if($city) {  ?> class="error-msg" <?php } ?>>
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

                               
                <fieldset class="half-width">
                      <label>Last date for apply: <span style="color:red">*</span></label>
                      <input style="cursor:pointer;" type="text" name="last_date" placeholder="Enter last date for apply" id="datepicker" value="<?php echo date('d/m/Y',strtotime($postdata[0]['post_last_date'])); ?>" placeholder="Enter text">
                      <?php echo form_error('last_date'); ?> 
                </fieldset>


                  <fieldset class="half-width col-md-4 pad_left" <?php if($minsal) {  ?> class="error-msg" <?php } ?>>
                            <label class="control-label">Min salary:(Per Year)<!-- <span style="color:red">*</span> --></label>
                            <input name="minsal" type="text" id="minsal" value="<?php echo $postdata[0]['min_sal']; ?>"  placeholder="Enter Minimum Salary" /><span id="fullname-error"></span>
                            <?php echo form_error('minsal'); ?>
                        </fieldset>

                         <fieldset class="half-width col-md-4" <?php if($maxsal) {  ?> class="error-msg" <?php } ?>>
                            <label class="control-label">Max salary:(Per Year)<!-- <span style="color:red">*</span> --></label>
                            <input name="maxsal" type="text" id="maxsal" value="<?php echo $postdata[0]['max_sal']; ?>"  placeholder="Enter Maximum Salary" /><span id="fullname-error"></span>
                            <?php echo form_error('maxsal'); ?>
                        </fieldset>
                
                                      <fieldset class=" col-md-4 pad_right"> 
                     <label>Currency:</label>
                            <select name="currency" id="currency">
                               <option value="" selected option disabled>Select Currency</option>
                                 
                            <?php if(count($currency) > 0){
                            foreach($currency as $cur){ 

                                if($postdata[0]['post_currency'])
                                            {?>

                                         <option value="<?php echo $cur['currency_id']; ?>" <?php if($cur['currency_id'] == $postdata[0]['post_currency']) echo 'selected';?>><?php echo $cur['currency_name'];?></option>
                                            <?php }else{
                                ?>
                             <option value="<?php echo $cur['currency_id']; ?>"><?php echo $cur['currency_name']; ?></option>
                             <?php  } } }?>
                             </select>

          
                             <?php echo form_error('currency'); ?>

                    </fieldset>
               <fieldset class="hs-submit full-width">
                  <!--   <input type="reset"> -->
                   
                    <a class="add_post_btns" href="javascript:history.back()">Cancel</a>
                     <input type="submit" id="submit" class="add_post_btns" name="submit" value="save">                    
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
    <?php echo $footer; ?>
  
        

  <!-- <script type="text/javascript" src="<?php //echo base_url('js/jquery-1.11.1.min.js'); ?>"></script> -->
<!-- script for select2 box Script start-->


<!-- script for select2 box Script End-->


<!--  <script type="text/javascript" src="<?php //echo base_url('js/jquery.validate.js'); ?>"></script> -->




<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
          
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>


<script type="text/javascript">
//select2 autocomplete start for skill
var complex = <?php echo json_encode($selectdata); ?>;
$('#skils').select2().select2('val', complex)
//select2 autocomplete End for skill
</script>




<script type="text/javascript">
  function checkvalue() {
     
        var searchkeyword = document.getElementById('tags').value;
        var searchplace = document.getElementById('searchplace').value;
        // alert(searchkeyword);
        // alert(searchplace);
        if (searchkeyword == "" && searchplace == "") {
            //alert('Please enter Keyword');
            return false;
        }
    }

    function checkvalue_search() {
       
        var searchkeyword = document.getElementById('tags').value;
        var searchplace = document.getElementById('searchplace').value;
        
        if (searchkeyword == "" && searchplace == "") 
        {
          //  alert('Please enter Keyword');
            return false;
        }
    }


//Leave Page on add and edit post page start
  function leave_page(clicked_id)
{


   var searchkeyword = document.getElementById('tags').value;
    var searchplace = document.getElementById('searchplace').value;

     if(clicked_id==4)
    {
       if(searchkeyword=="" && searchplace=="" )
       {
            return checkvalue_search;
       }
        
    }

return home(clicked_id,searchkeyword,searchplace);
}


  function home(clicked_id,searchkeyword,searchplace) 
  {
  
                              
      $('.biderror .mes').html("<div class='pop_content'> Are you sure to discard your changes?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='home_profile("+ clicked_id +','+'"'+ searchkeyword + '"'+','+'"'+ searchplace + '"' +")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
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
                                 
                           
                                 window.location= "<?php echo base_url() ?>search/recruiter_search/"+searchkeyword+"/"+searchplace; 
                                 
                                
                            }
                             else if(clicked_id==5)
                            {
                                window.location= "<?php echo base_url('dashboard') ?>"; 
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
 </script>

 <script type="text/javascript">
 //Leave Page on add and edit post page End
  
checkvalue imgval(){ 
 
 var skill_main = document.getElementById("skills").value;
 var skill_other = document.getElementById("other_skill").value;

 
     if(skill_main =='' && skill_other == ''){
  
  $('#artpost .select2-selection').addClass("keyskill_border_active").style('border','1px solid #f00');
  }

  var minyear = document.getElementById('minyear').value;
        var minmonth = document.getElementById('minmonth').value;
        var maxyear = document.getElementById('maxyear').value;
        var maxmonth = document.getElementById('maxmonth').value;

        var min_exper;
        min_exper = (minyear * 12) + minmonth ;
        max_exper = (maxyear * 12) + maxmonth;
        if(min_exper > max_exper){
            alert("Minimum experience is not greater than maximum experience");
            return false;

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
  //alert(value);alert(element);alert(param);
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
                    return parseInt(value) >= parseInt($min.val());
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



// $.validator.addMethod('le', function(value, element, param) {
//       return this.optional(element) || value <= $(param).val();
// }, 'Invalid value');
// $.validator.addMethod('ge', function(value, element, param) {
//       return this.optional(element) || value >= $(param).val();
// }, 'Invalid value');
//for min max value validator End
jQuery.noConflict();

                (function ($) {
            $(document).ready(function () { 

                $("#basicinfo").validate({
                  //ignore: [],

                    ignore: '*:not([name])',
                    rules: {
                       
                        post_name: {
                            
                            required: true,
                             regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                            
                        },
                          'skills[]': {
                            
                          require_from_group: [1, ".skill_other"] 
                          //required:true 
                        }, 

                        other_skill: {
                            
                           require_from_group: [1, ".skill_other"],
                           regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                            // required:true 
                        },
                        position:{
                            required: true,
                             number:true,
                             min: 1,
                            reg_candidate:/^-?(([0-9]{0,100}))$/
                        },

                         minyear: {
                            
                          require_from_group: [1, ".keyskil"] 
                          //required:true 
                        }, 
                         minmonth: {
                            
                           require_from_group: [1, ".keyskil"]
                            // required:true 
                        },
                         post_desc: {

                            required: true,
                           regx:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                           
                        },
                         country: {

                            required: true
                           
                        },
                        state: {

                            required: true
                           
                        },
                        maxyear: {
                            
                          require_from_group: [1, ".keyskil1"],
                          greaterThan1: "#minyear"
                          //required:true 
                        }, 

                        maxmonth: {
                            
                          require_from_group: [1, ".keyskil1"],
                            greaterThanmonth: "#minmonth"
                            // required:true 
                        },
                        last_date: {
                            
                            required: true
                            
                        },
                        minsal:{
                            number:true
                           // le:"#maxsal"
                        },
                        maxsal:{
                            // required: function(element){
                            // return $("#minsal").val().length > 0;
                            // },
                             number:true,
                              min: 0,
                             greaterThan: "#minsal"
                        },
                        // position_no:{
                        //     required:true
                        // },
                      


                     },

                    messages: {

                        post_name: {

                            required: "Jobtitle  Is Required."
                        },
                          'skills[]': {

                            require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'"

                        },

                        other_skill: {

                            require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'"
                        },
                        position:{
                          required: "You Have TO Select Minimum 1 Candidate"
                        },
                        minyear: {

                             require_from_group: "You must either fill out 'month' or 'year'"
                        },
                        minmonth: {

                             require_from_group: "You must either fill out 'month' or 'year'"
                            
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

                            require_from_group: "You must either fill out 'month' or 'year'"
                            // greaterThan1:"Maximum Year Experience should be grater than Minimum Year"

                        },

                        maxmonth: {

                            require_from_group: "You must either fill out 'month' or 'year'"
                            //greaterThan:"Maximum Month Experience should be grater than Minimum Month"
                        },
                        last_date: {

                            required: "Last date  Is Required."
                        },
                        // minsal:{
                        //     le:"Minimum salary should be less than Maximum salary"
                        // },
                        maxsal:{
                            greaterThan:"Maximum salary should be grater than Minimum salary"
                        },
                        // position_no:{
                        //     required:"No candidate required."
                        // },


                    }

                });


                   });
   })(jQuery);
  </script>

  
  
<script>
jQuery.noConflict();

                (function ($) {
   var data = <?php echo json_encode($demo); ?>;
// alert(data);


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
    })(jQuery);

</script>
<script>
jQuery.noConflict();

                (function ($) {
   var data1 = <?php echo json_encode($de); ?>;
// alert(data);


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
    })(jQuery);

</script>



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
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery.datetimepicker.full.js'); ?>"></script>
<script type="text/javascript">
$('#datepicker').datetimepicker({
  //yearOffset:222,
  minDate: 0,
  //startDate: "2013/02/14",
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d',
  scrollMonth : false,
  scrollInput : false
  
});
</script>
<!-- Calender Js End

-->
    <script type="text/javascript">
      $(document).ready(function() {
  $("html,body").animate({scrollTop: 200}, 100); //100ms for example
});
    </script>

    <style type="text/css">
      #skils{margin-top: 42px !important;}
      #minyear{margin-top: 42px !important;}
      #minmonth{margin-top: 42px !important;}
      #maxyear{margin-top: 42px !important;}
      #maxmonth{margin-top: 42px !important;}
    </style>

  <!-- This Js is used for call popup -->

<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
