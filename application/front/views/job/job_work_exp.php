<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>

   


<!-- END HEADER -->
<div class="js">
<body class="page-container-bg-solid page-boxed">
   <div id="preloader"></div>
   <section>
      <div class="user-midd-section" id="paddingtop_fixed_job">
      <div class="common-form1">
       
     
     
         <div class="col-md-6 col-sm-8">
          
            <div class="clearfix">
               <div class="col-md-12 col-sm-12 ">
                  <div class="clearfix">
                     <div class="common-form common-form_border">
                      
                        
                        <div class="work_exp fw">
                             <div class="">
      
                <!-- end of panel -->

                <div class="panel">
                    <div  id="panel-heading1"  <?php if($userdata[0]['experience'] == 'Experience'){ ?> class="panel-heading active" <?php } else if($userdata[0]['experience'] == ''){?>  class="panel-heading" <?php }else{?> class="panel-heading" <?php } ?>>
                       
                    </div>
                    <div id="two"   <?php if($userdata[0]['experience'] == 'Fresher'){ ?> class="panel-collapse collapse" <?php } else if($userdata[0]['experience'] == ''){?> class="panel-collapse collapse"<?php }else{?> class="panel-collapse collapse in" <?php } ?>>
                        <div class="panel-body">
                     
                           <?php echo form_open_multipart(base_url('job/job_work_exp_insert'), array('id' => 'jobseeker_regform1', 'name' => 'jobseeker_regform1', 'class' => 'clearfix')); ?>       
                           <div>
                              <span style="color:#7f7f7e;">( </span><span class="red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                           </div>
                           <?php
                              $clone_mathod_count = 1;
                              if ($workdata) {
                              
                                  $count = count($workdata);
                              
                                  if ($count == 0) {
                                      // this is use for javascript
                                      $clone_mathod_count = 1;
                                  } else {
                                      $clone_mathod_count = $count;
                                  }
                              
                                  for ($x = 0; $x < $count; $x++) {
                              
                                      $experience_year1 = $workdata[$x]['experience_year'];
                                      $experience_month1 = $workdata[$x]['experience_month'];
                                      $jobtitle1 = $workdata[$x]['jobtitle'];
                                      $companyname1 = $workdata[$x]['companyname'];
                                      $companyemail1 = $workdata[$x]['companyemail'];
                                      $companyphn1 = $workdata[$x]['companyphn'];

                                      $work_certificate1 = $workdata[$x]['work_certificate'];
                                      $y = $x + 1;
                                      ?>
                           <input type="hidden" name="exp_data[]" value="old" class="exp_data" id="exp_data<?php echo $y; ?>">

                           
                           <div id="input<?php echo $y; ?>" style="margin-bottom:4px;" class="clonedInput job_work_edit_<?php echo $workdata[$x]['work_id']?>">
                             
                                 <label>Experience<span class="red">*</span></label>
                                 <select  name="experience_year[]" id="experience_year" class="experience_year keyskil" >
                                    <option value="" selected option disabled>Year</option>
                                    <option value="0 year"  <?php if ($experience_year1 == "0 year") echo 'selected'; ?>>0 year</option>
                                    <option value="1 year"  <?php if ($experience_year1 == "1 year") echo 'selected'; ?>>1 year</option>
                                    <option value="2 year"  <?php if ($experience_year1 == "2 year") echo 'selected'; ?>>2 year</option>
                                   
                                 </select>
                                 <select name="experience_month[]" tabindex="2"   id="experience_month" class="experience_month keyskil">
                                    <option value="" selected option disabled>Month</option>
                                    <option value="0 month"  <?php if ($experience_month1 == "0 month") echo 'selected'; if ($experience_year1 == "0 year") echo 'selected option disabled'; ?>>0 month</option>
                                    <option value="1 month"  <?php if ($experience_month1 == "1 month") echo 'selected'; ?>>1 month</option>
                                   
                                 </select>
                               
                           </div>
                           <?php
                              }
                              ?>
                              

                           <div class="hs-submit full-width fl"  style=" width: 100%; text-align: center;">
                              <input type="button" tabindex="6" id="btnAdd" value=" + ">
                              <input type="button" tabindex="7" id="btnRemove" value=" - " disabled="disabled">
                           </div>
                        
                                <fieldset class="hs-submit full-width"> 
                           <input style="" type="submit"  tabindex="8" id="next" name="next" value="Next"  >
                                 </fieldset>
                       
                           <?php
                              } 
                                  ?>
                          

                    </div>
                </div>
                <!-- end of panel -->


            </div>
            <!-- end of #bs-collapse  -->

        </div>



    </div>
    <!-- end of container -->
                            
                        </div>
                        
                                                     
                        
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

<script type="text/javascript">
 
   $(document).ready(function () {
   
  
   $.validator.addMethod("regx1", function(value, element, regexpr) {          
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
   
  

       $("#jobseeker_regform1").validate({
   
           ignore: [],

           rules: {
   
               'jobtitle[]': {
                   required: true,
                 regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                   //noSpace: true
               },
               'companyname[]': {
   
                   required: true,
                 regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                   //noSpace: true
               },
              
                'experience_year[]': {
       
                   require_from_group: [1, ".keyskil"] 
                    //required:true 
                      }, 
   
                'experience_month[]': {
       
                   require_from_group: [1, ".keyskil"]
                
                    // required:true 
                   },
   
               'companyemail[]': {
                   email: true,
               },
                'companyphn[]': {

                            number: true,
                            minlength: 8,
                           maxlength:15                   
                        },
               'companyphn[]': {
                    
                   regx: /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/
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
   
                 require_from_group: "You must either fill out 'month' or 'year'"
               },
                'experience_month[]': {
   
              require_from_group: "You must either fill out 'month' or 'year'"
   
               },
               'companyemail[]': {
   
                   email: "Please Enter Valid Email Id.",
               },
   
                'companyphn[]': {
                    required: "Please Enter Numeric Value."
               },
           }
   
       });
   });
</script>

<!-- Clone input type start-->
<script>
   $('#btnRemove').attr('disabled', 'disabled');
   $('#btnAdd').click(function () {
       var num = $('.clonedInput').length;

       var newNum = new Number(num + 1);
      
       if (newNum > 5)
       {
           $('#btnAdd').attr('disabled', 'disabled');
           alert("You Can add only 5 fields");
           return false;
       }

  


       // new code end
       var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
        
       newElem.children('.exp_data').attr('id', 'exp_data' + newNum).attr('name', 'exp_data[]').attr('value', 'new');
       newElem.children('.experience_year').attr('id', 'experience_year' + newNum).attr('name', 'experience_year[]').val();
       newElem.children('.experience_month').attr('id', 'experience_month' + newNum).attr('name', 'experience_month[]').val();
       newElem.children('.jobtitle').attr('id', 'jobtitle' + newNum).attr('name', 'jobtitle[]');
       newElem.children('.companyname').attr('id', 'companyname' + newNum).attr('name', 'companyname[]');
       newElem.children('.companyemail').attr('id', 'companyemail' + newNum).attr('name', 'companyemail[]');
       newElem.children('.companyphn').attr('id', 'companyphn' + newNum).attr('name', 'companyphn[]');
       newElem.children('.certificate').attr('id', 'certificate' + newNum).attr('name', 'certificate[]').val();
       $('#input' + num).after(newElem);
       $('#btnRemove').removeAttr('disabled', 'disabled');
       $('#input' + newNum + ' .experience_year').val('');
       $('#input' + newNum + ' .experience_month').val('');
        $('#input' + newNum + '.certificate').replaceWith($("#certificate"+ newNum).val('').clone(true));
   
       $('#input' + newNum + ' .hs-submit').remove();
       $("#input" + newNum + ' img').remove();
       $("#input" + newNum + ' .img_work_exp').remove();

       
   });
   
   $('#btnRemove').on('click', function () {
   
       var num = $('.clonedInput').length;
       if (num - 1 == <?php echo $clone_mathod_count; ?>)
       {
   
           $('#btnRemove').attr('disabled', 'disabled');
       }
       $('.clonedInput').last().remove();
   });
   $('#btnAdd').on('click', function () {
   
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
  // document.getElementById("defaultOpen").click();
</script>

<script type="text/javascript">
   function delete_job_work(work_id) {
    

       $.ajax({
           type: 'POST',
           url: '<?php echo base_url() . "job/jon_work_delete" ?>',
           data: 'work_id=' + work_id,
          // dataType: "html",
           success: function (data) {
               if(data == 'ok')
               {
                   $('.job_work_edit_' + work_id).remove();
                 
               }
                window.location.reload();
           }
       });
   }
</script>
<!-- duplicate div end -->

  <!-- <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script> -->
 <!-- <script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>  -->
<!-- <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.js"></script> 
