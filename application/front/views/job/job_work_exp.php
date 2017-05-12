
<!-- start head -->
<?php  echo $head; ?>
<!-- END HEAD -->

 <!-- start header -->
<?php echo $header; ?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<style type="text/css">
  .v
  .
</style>
 <?php echo $job_header2; ?>
<!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section" id="paddingtop_fixed">
           
           <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>

             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($jobdata[0]['job_step'] == 10){ }else{

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
                            <ul>
                                 <li><a href="<?php echo base_url('job/job_basicinfo_update'); ?>">Basic Information</a></li>

                                <li><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                  <li><a href="<?php echo base_url('job/job_education_update'); ?>">Educational Qualification</a></li>


                                  <li><a href="<?php echo base_url('job/job_project_update'); ?>">Project And Training / Internship</a></li>

                                <li><a href="<?php echo base_url('job/job_skill_update'); ?>">Professional Skills</a></li>

                                <li><a href="<?php echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li>
                              
                                <li <?php if($this->uri->segment(1) == 'job'){?> class="active" <?php } ?>><a href="#">Work Experience</a></li>
                                
                                <li class="<?php if($jobdata[0]['job_step'] < '7'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_curricular_update'); ?>">Extra Curricular Activities</a></li>

                                <li class="<?php if($jobdata[0]['job_step'] < '7'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_reference_update'); ?>">Interest & Reference</a></li>

                                <li class="<?php if($jobdata[0]['job_step'] < '7'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Carrier Objectives</a></li>
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
                            <div class="common-form">
                              

                      <div class="col-md-12 col-sm-12 ">
                      <div class="clearfix">
                      <div class="common-form">
                      <h3>Work Experience</h3>
               <div class="tablet-hi">
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Fresher</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Paris')">Experience</a>
</div>                                 

<?php echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform','name' => 'jobseeker_regform','class'=>'clearfix')); ?>
<div id="London" class="tabcontent1">
                                <!-- <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div> -->
                            
                            <div> <span class="required_field" >( <span style="color: red">*</span> ) Indicates required field</span></div>

                                        <label for="Fresher">
                                            <input type="radio" id="fresher" name="radio" value="Fresher" checked="checked">
          <span class="radio_check_text">Fresher&nbsp;&nbsp;</span>
                                        </label>
<fieldset class="hs-submit full-width">
                                    
                                    <input type="submit" id="next" name="next" value="Next" onclick="document.getElementById('experience1')[0].style.display = 'block';">
                                  
                                    
                                </fieldset>
 </div>
  
  <?php echo form_close(); ?>


<?php echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform1','name' => 'jobseeker_regform1','class'=>'clearfix')); ?>       
<div id="Paris" class="tabcontent1">

<div>
                                <span style="color:red">Fields marked with asterisk (*) are mandatory</span>
</div>
<?php
     
 if($workdata)
 {

   $count =  count($workdata); 
     // echo"<pre>";print_r($count);die();
       for($x=0; $x<$count; $x++){
  
            $experience_year1 =  $workdata[$x]['experience_year'];
            $experience_month1 = $workdata[$x]['experience_month'];
            $jobtitle1 = $workdata[$x]['jobtitle'];
            $companyname1 = $workdata[$x]['companyname'];
            $companyemail1 = $workdata[$x]['companyemail'];
            $companyphn1 = $workdata[$x]['companyphn'];
            $work_certificate1 = $workdata[$x]['work_certificate'];  

?>

   <!--  <fieldset class="two-select-box full-width"> -->
                                           <label>Experience<span style="color:red">*</span></label>
                                         <select style="width: 50%;" name="experience_year[]" id="experience_year" class="experience_year">
                                          <option value="" selected option disabled>Year</option>
                                          <option value="0 year"  <?php if($experience_year1=="0 year") echo 'selected';?>>0</option>
                                          <option value="1 year"  <?php if($experience_year1=="1 year") echo 'selected';?>>1</option>
                                            <option value="2 year"  <?php if($experience_year1=="2 year") echo 'selected';?>>2</option>
                                          <option value="3 year"  <?php if($experience_year1=="3 year") echo 'selected';?>>3</option>
                                            <option value="4 year"  <?php if($experience_year1=="4 year") echo 'selected';?>>4</option>
                                          <option value="5 year"  <?php if($experience_year1=="5 year") echo 'selected';?>>5</option>
                                            <option value="6 year"  <?php if($experience_year1=="6 year") echo 'selected';?>>6</option>
                                          <option value="7 year"  <?php if($experience_year1=="7 year") echo 'selected';?>>7</option>  
                                          <option value="8 year"  <?php if($experience_year1=="8 year") echo 'selected';?>>8</option>
                                          <option value="9 year"  <?php if($experience_year1=="9 year") echo 'selected';?>>9</option> 
                                           <option value="10 year"  <?php if($experience_year1=="10 year") echo 'selected';?>>10</option>
                                          <option value="11 year"  <?php if($experience_year1=="11 year") echo 'selected';?>>11</option> 
                                           <option value="12 year"  <?php if($experience_year1=="12 year") echo 'selected';?>>12</option>
                                          <option value="13 year"  <?php if($experience_year1=="13 year") echo 'selected';?>>13</option> 
                                           <option value="14 year"  <?php if($experience_year1=="14 year") echo 'selected';?>>14</option>
                                          <option value="15 year"  <?php if($experience_year1=="15 year") echo 'selected';?>>15</option>
                                            <option value="16 year"  <?php if($experience_year1=="16 year") echo 'selected';?>>16</option>
                                          <option value="17 year"  <?php if($experience_year1=="17 year") echo 'selected';?>>17</option>
                                          <option value="18 year"  <?php if($experience_year1=="18 year") echo 'selected';?>>18</option>
                                          <option value="19 year"  <?php if($experience_year1=="19 year") echo 'selected';?>>19</option>
                                          <option value="20 year"  <?php if($experience_year1=="20 year") echo 'selected';?>>20</option>

                                        </select>
                                       

                                         <select style="width: 50%;" name="experience_month[]" id="experience_month" class="experience_month">
                                          <option value="" selected option disabled>Month</option>
                                          <option value="0 month"  <?php if($experience_month0=="0 month") echo 'selected';?>>0</option>
                                          <option value="1 month"  <?php if($experience_month1=="1 month") echo 'selected';?>>1</option>
                                          <option value="2 month"  <?php if($experience_month1=="2 month") echo 'selected';?>>2</option>
                                          <option value="3 month"  <?php if($experience_month1=="3 month") echo 'selected';?>>3</option>
                                          <option value="4 month"  <?php if($experience_month1=="4 month") echo 'selected';?>>4</option>
                                          <option value="5 month"  <?php if($experience_month1=="5 month") echo 'selected';?>>5</option>
                                          <option value="6 month"  <?php if($experience_month1=="6 month") echo 'selected';?>>6</option>
                                            <option value="7 month"  <?php if($experience_month1=="7 month") echo 'selected';?>>7</option>
                                             <option value="8 month"  <?php if($experience_month1=="8 month") echo 'selected';?>>8</option>
                                            <option value="9 month"  <?php if($experience_month1=="9 month") echo 'selected';?>>9</option>
                                              <option value="10 month"  <?php if($experience_month1=="10 month") echo 'selected';?>>10</option>
                                              <option value="11 month"  <?php if($experience_month1=="11 month") echo 'selected';?>>11</option>
                                                <option value="12 month"  <?php if($experience_month1=="12 month") echo 'selected';?>>12</option>

                                        </select>
                                        <!--  </fieldset>
                                      <fieldset>  -->                                       <?php echo form_error('experience_year'); ?>
                                        <?php echo form_error('experience_month'); ?>
<!-- /fieldset>

                                        <fieldset class="full-width"> -->
                                         <label>Job Title<span style="color:red">*</span></label>
                                         <input type="text" name="jobtitle[]"  class="jobtitle" id="jobtitle"  placeholder="Enter Job Title" value="<?php if($jobtitle1){echo $jobtitle1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="jobtitle-error"> </span>
                                        <?php echo form_error('jobtitle'); ?>
                                   </fieldset> 


<!--                                     <fieldset <?php if($companyname) {  ?> class="error-msg" <?php } ?>> 
 -->                         <!--  <fieldset class="full-width">  -->             
 <label>Company Name<span style="color:red">*</span></label>
                                         <input type="text" name="companyname[]" id="companyname"  class="companyname" placeholder="Enter Company Name" value="<?php if($companyname1){ echo $companyname1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyname-error"> </span>
                                        <?php echo form_error('companyname'); ?>
                                        <!-- </fieldset> -->
                                    <!-- </fieldset>   
 -->

                                   <!--  <fieldset > -->
                                        <label>Company Email</label>
                                         <input type="text" name="companyemail[]" id="companyemail" class="companyemail" placeholder="Enter Company Email" value="<?php if($companyemail1){ echo $companyemail1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyemail-error"> </span>
                                       
                                <!--   </fieldset>

                                       <fieldset >  -->
                                        <label>Company Phone</label>
                                         <input type="text" name="companyphn[]" id="companyphn" class="companyphn" placeholder="Enter Company Phone" value="<?php if($companyphn1){ echo $companyphn1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyphn-error"> </span>
                                        <?php echo form_error('companyphn'); ?>
                                   <!--  </fieldset>

                                     <fieldset class="full-width"> -->
                                      <label>Experience Certificate</label>
                                         <input type="file" name="certificate[]" id="certificate" class="certificate" placeholder="CERTIFICATE" />&nbsp;&nbsp;&nbsp; 

                                         <?php 

                                         if($work_certificate1)
                                         {
                                          ?>
                                       
                                      <img src="<?php echo base_url( JOBWORKCERTIFICATE.$work_certificate1)?>" style="width:100px;height:100px;">
                                  
                                      <?php 
                                    }
                                    ?>

                                         <span id="certificate-error"> </span>
                                        <?php echo form_error('certificate'); ?>

                                            <input type="hidden" name="image_hidden_certificate<?php echo $workdata[$x]['work_id'];?>" value="<?php if($work_certificate1){ echo $work_certificate1; } ?>">

                                   <!--  </fieldset> -->
  
<?php
}
?>

                                     <fieldset class="hs-submit full-width">
                                    <input type="submit"  id="next" name="next" value="Next" onclick="document.getElementById('experience1')[0].style.display = 'block';" >
                                  <input type="submit"  id="add_workexp" name="add_workexp" value="Add More Work Expierence"> 
                                     

                                </fieldset>

<?php      
}
else
{
?>
  <!--clone div start-->              
  <div id="input1" style="margin-bottom:4px;" class="clonedInput">
   <!--  <fieldset class="two-select-box full-width"> -->
                                           <label>Experience<span style="color:red">*</span></label>
                                           <br>
                                         <select style="width: 50%; float: left;" name="experience_year[]" id="experience_year" class="experience_year">
                                          <option value="" selected option disabled>Year</option>
                                          <option value="0 year"  <?php if($experience_year1=="0 year") echo 'selected';?>>0</option>
                                          <option value="1 year"  <?php if($experience_year1=="1 year") echo 'selected';?>>1</option>
                                            <option value="2 year"  <?php if($experience_year1=="2 year") echo 'selected';?>>2</option>
                                          <option value="3 year"  <?php if($experience_year1=="3 year") echo 'selected';?>>3</option>
                                            <option value="4 year"  <?php if($experience_year1=="4 year") echo 'selected';?>>4</option>
                                          <option value="5 year"  <?php if($experience_year1=="5 year") echo 'selected';?>>5</option>
                                            <option value="6 year"  <?php if($experience_year1=="6 year") echo 'selected';?>>6</option>
                                          <option value="7 year"  <?php if($experience_year1=="7 year") echo 'selected';?>>7</option>  
                                          <option value="8 year"  <?php if($experience_year1=="8 year") echo 'selected';?>>8</option>
                                          <option value="9 year"  <?php if($experience_year1=="9 year") echo 'selected';?>>9</option> 
                                           <option value="10 year"  <?php if($experience_year1=="10 year") echo 'selected';?>>10</option>
                                          <option value="11 year"  <?php if($experience_year1=="11 year") echo 'selected';?>>11</option> 
                                           <option value="12 year"  <?php if($experience_year1=="12 year") echo 'selected';?>>12</option>
                                          <option value="13 year"  <?php if($experience_year1=="13 year") echo 'selected';?>>13</option> 
                                           <option value="14 year"  <?php if($experience_year1=="14 year") echo 'selected';?>>14</option>
                                          <option value="15 year"  <?php if($experience_year1=="15 year") echo 'selected';?>>15</option>
                                            <option value="16 year"  <?php if($experience_year1=="16 year") echo 'selected';?>>16</option>
                                          <option value="17 year"  <?php if($experience_year1=="17 year") echo 'selected';?>>17</option>
                                          <option value="18 year"  <?php if($experience_year1=="18 year") echo 'selected';?>>18</option>
                                          <option value="19 year"  <?php if($experience_year1=="19 year") echo 'selected';?>>19</option>
                                          <option value="20 year"  <?php if($experience_year1=="20 year") echo 'selected';?>>20</option>

                                        </select>
                                       

                                         <select name="experience_month[]" style="width: 50%;" id="experience_month" class="experience_month">
                                          <option value="" selected option disabled>Month</option>
                                          <option value="1 month"  <?php if($experience_month1=="1 month") echo 'selected';?>>1</option>
                                          <option value="2 month"  <?php if($experience_month1=="2 month") echo 'selected';?>>2</option>
                                          <option value="3 month"  <?php if($experience_month1=="3 month") echo 'selected';?>>3</option>
                                          <option value="4 month"  <?php if($experience_month1=="4 month") echo 'selected';?>>4</option>
                                          <option value="5 month"  <?php if($experience_month1=="5 month") echo 'selected';?>>5</option>
                                          <option value="6 month"  <?php if($experience_month1=="6 month") echo 'selected';?>>6</option>
                                            <option value="7 month"  <?php if($experience_month1=="7 month") echo 'selected';?>>7</option>
                                             <option value="8 month"  <?php if($experience_month1=="8 month") echo 'selected';?>>8</option>
                                            <option value="9 month"  <?php if($experience_month1=="9 month") echo 'selected';?>>9</option>
                                              <option value="10 month"  <?php if($experience_month1=="10 month") echo 'selected';?>>10</option>
                                              <option value="11 month"  <?php if($experience_month1=="11 month") echo 'selected';?>>11</option>
                                                <option value="12 month"  <?php if($experience_month1=="12 month") echo 'selected';?>>12</option>

                                        </select>
                                        <!--  </fieldset>
                                      <fieldset>  -->                                       <?php echo form_error('experience_year'); ?>
                                        <?php echo form_error('experience_month'); ?>
<!-- /fieldset>

                                        <fieldset class="full-width"> -->
                                         <label>Job Title<span style="color:red">*</span></label>
                                         <input type="text" name="jobtitle[]"  class="jobtitle" id="jobtitle"  placeholder="Enter Job Title" value="<?php if($jobtitle1){echo $jobtitle1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="jobtitle-error"> </span>
                                        <?php echo form_error('jobtitle'); ?>
                                   </fieldset> 


<!--                                     <fieldset <?php if($companyname) {  ?> class="error-msg" <?php } ?>> 
 -->                         <!--  <fieldset class="full-width">  -->             
 <label>Company Name<span style="color:red">*</span></label>
                                         <input type="text" name="companyname[]" id="companyname"  class="companyname" placeholder="Enter Company Name" value="<?php if($companyname1){ echo $companyname1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyname-error"> </span>
                                        <?php echo form_error('companyname'); ?>
                                        <!-- </fieldset> -->
                                    <!-- </fieldset>   
 -->

                                   <!--  <fieldset > -->
                                        <label>Company Email</label>
                                         <input type="text" name="companyemail[]" id="companyemail" class="companyemail" placeholder="Enter Company Email" value="<?php if($companyemail1){ echo $companyemail1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyemail-error"> </span>
                                       
                                <!--   </fieldset>

                                       <fieldset >  -->
                                        <label>Company Phone</label>
                                         <input type="text" name="companyphn[]" id="companyphn" class="companyphn" placeholder="Enter Company Phone" value="<?php if($companyphn1){ echo $companyphn1; } ?>"/>&nbsp;&nbsp;&nbsp; <span id="companyphn-error"> </span>
                                        <?php echo form_error('companyphn'); ?>
                                   <!--  </fieldset>

                                     <fieldset class="full-width"> -->
                                       <label>Experience Certificate</label>
                                       <label>Experience Certificate</label>
                                         <input type="file" name="certificate[]" id="certificate" class="certificate" placeholder="CERTIFICATE" />&nbsp;&nbsp;&nbsp; 

                                         <?php 

                                         if($work_certificate1)
                                         {
                                          ?>
                                       
                                      <img src="<?php echo base_url( JOBWORKCERTIFICATE.$work_certificate1)?>" style="width:100px;height:100px;">
                                  
                                      <?php 
                                    }
                                    ?>

                                         <span id="certificate-error"> </span>
                                        <?php echo form_error('certificate'); ?>
                                   <!--  </fieldset> -->
  </div> 
<!--clone div End-->
                                   <!--  <fieldset class="hs-submit full-width"> -->
                                   
                                      <fieldset class="hs-submit full-width">
                                
        <input type="button" id="btnAdd" value=" + ">
        <input type="button" id="btnRemove" value=" - " disabled="disabled">
<br>
           <input type="submit" id="next" name="next" value="Next" onclick="document.getElementById('experience1')[0].style.display = 'block';">
                                  
                          
                                </fieldset>


                                   

                                <!-- </fieldset> -->
                                       <div class="hs-submit full-width fl">
   
</div>
</div>
  <?php echo form_close(); ?> 
 
 <?php // echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform2','name' => 'jobseeker_regform2','class'=>'clearfix')); ?>         
  <!--<input type="submit" id="previous" name="previous" value="previous">-->
  <?php // echo form_close(); ?>                                 

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
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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

<script>
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

</script>
  <!-- duplicate div end -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

   <script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 
            
                $("#jobseeker_regform1").validate({

                
                   //ignore: ":hidden",
                   
                    rules: {

                        'jobtitle[]': {
                            required: true,
                           
                        }, 
                        'companyname[]': {

                            required: true,
                           
                        }, 
                       
                         
                        'experience_year[]': {

                            required: true,
                           
                        },   
                        // 'experience_month[]': {

                        //     required: true,
                           
                        // },  

                         'companyemail[]': {
                            email:true,
                        },

                    },

                    messages: {

                        'jobtitle[]': {

                            required: "Job title Is Required.",
                            
                        },
                        'companyname[]': {

                            required: "Company name Is Required.",
                            
                        },
                        
                        
                       'experience_year[]': {

                            required: "Experience year Is Required.",
                            
                        },
                        // 'experience_month[]': {

                        //      required: "Experience month Is Required.",
                            
                        // },
                        'companyemail[]': {

                             email:"Please Enter Valid Email Id.",
                             
                        },
                        }

                });
                   });
  </script>
    
 <!--javascript for fresher and experience radio button End -->

 <!-- Clone input type start-->
<script>

$('#btnRemove').attr('disabled', 'disabled');
$('#btnAdd').click(function() {
    var num = $('.clonedInput').length;
    var newNum = new Number(num + 1);

     if (newNum > 5) 
    {
      
      $('#btnAdd').attr('disabled', 'disabled');
      alert("You Can add only 5 fields");
      return false;
      
    }

    var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

    newElem.children('.experience_year').attr('id', 'experience_year' + newNum).attr('name', 'experience_year[]');
    newElem.children('.experience_month').attr('id', 'experience_month' + newNum).attr('name', 'experience_month[]');
    newElem.children('.jobtitle').attr('id', 'jobtitle' + newNum).attr('name', 'jobtitle[]');
    newElem.children('.companyname').attr('id', 'companyname' + newNum).attr('name', 'companyname[]');
    newElem.children('.companyemail').attr('id', 'companyemail' + newNum).attr('name', 'companyemail[]');
    newElem.children('.companyphn').attr('id', 'companyphn' + newNum).attr('name', 'companyphn[]');
    newElem.children('.certificate').attr('id', 'certificate' + newNum).attr('name', 'certificate[]');

    $('#input' + num).after(newElem);
    $('#btnRemove').removeAttr('disabled', 'disabled');


});

$('#btnRemove').on('click', function() {
  
     var num = $('.clonedInput').length;

       if (num-1 == 1)
       {

                $('#btnRemove').attr('disabled','disabled');


        }
    $('.clonedInput').last().remove();

});


$('#btnAdd').on('click', function() {
 
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
     