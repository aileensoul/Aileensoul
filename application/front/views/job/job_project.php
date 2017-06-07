
<!-- start head -->
<?php  echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">

<?php if($jobdata[0]['job_step'] == 10){ ?>
<?php echo $job_header2_border; ?>
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
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('job/job_basicinfo_update'); ?>">Basic Information</a></li>

                                <li><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                  <li><a href="<?php echo base_url('job/job_education_update'); ?>">Educational Qualification</a></li>

                                   <li <?php if($this->uri->segment(1) == 'job'){?> class="active" <?php } ?>><a href="#">Project And Training / Internship</a></li>

                              
                                <li class="<?php if($jobdata[0]['job_step'] < '4'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_skill_update'); ?>">Professional Skills</a></li>
<!-- 
                                <li class="<?php if($jobdata[0]['job_step'] < '4'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li> -->
                               
                                <li class="<?php if($jobdata[0]['job_step'] < '4'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_work_exp_update'); ?>">Work Experience</a></li>

                                <li class="<?php if($jobdata[0]['job_step'] < '4'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_curricular_update'); ?>">Extra Curricular Activities</a></li>

                                <li class="<?php if($jobdata[0]['job_step'] < '4'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_reference_update'); ?>">Interest & Reference</a></li>

                                <li class="<?php if($jobdata[0]['job_step'] < '4'){echo "khyati";}?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Carrier Objectives</a></li>
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
                              <h3>Project And Training / Internship</h3>
                             <?php echo form_open(base_url('job/job_project_insert'), array('id' => 'jobseeker_regform','name' => 'jobseeker_regform','class'=>'clearfix')); ?>

                          <div class="job_add_head">
                                <span>Project</span>
                            </div>
                                <fieldset class="full-width">
                                         <label>Project Name (Title):</label>

                                          <input type="text" name="project_name"  id="project_name" placeholder="Enter Project Name" value="<?php if($project_name1){ echo $project_name1; } else { echo $job[0]['project_name']; }?>"/>
                                        
                                  </fieldset>

                                  <fieldset class="full-width">
                                         <label>Duration</label>

                                          <input type="text" name="project_duration"  id="project_duration" placeholder="Ex:- 3 month / 4 month" value="<?php if($project_duration1){ echo $project_duration1; } else { echo $job[0]['project_duration']; }?>"/>
                                        
                                  </fieldset>

                                     <fieldset class="full-width">
                                         <label>Project Description</label>

                                          <textarea name="project_description"  id="project_description" style="resize: none;" placeholder="Enter Project Description"><?php if($project_description1){ echo $project_description1; } else { echo $job[0]['project_description']; }?></textarea>
                                        
                                  </fieldset>


                            <center><div class="job_add_head_pro">
                                <span>Training / Internship</span>
                            </div></center>

                             <fieldset class="full-width">
                                         <label>Intern / Trainee as</label>

                                          <input type="text" name="training_as"  id="training_as" placeholder="Intern / Trainee as" value="<?php if($training_as1){ echo $training_as1; } else { echo $job[0]['training_as']; }?>"/>
                                        
                              </fieldset>

                               <fieldset class="full-width">
                                         <label>Duration</label>

                                          <input type="text" name="training_duration"  id="training_duration" placeholder="Ex:- 3 month / 4 month" value="<?php if($training_duration1){ echo $training_duration1; } else { echo $job[0]['training_duration']; }?>"/>
                                        
                                  </fieldset>

                                   <fieldset class="full-width">
                                         <label>Name of Organization</label>

                                          <input type="text" name="training_organization"  id="training_organization" placeholder="Enter Name of Organization" value="<?php if($training_organization1){ echo $training_organization1; } else { echo $job[0]['training_organization']; }?>"/>
                                        
                                  </fieldset>

                                    

                                  <fieldset class="hs-submit full-width">

<!--                                        <input type="reset">
                                        <input type="submit"  id="previous" name="previous" value="previous">-->
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
    
    <footer>
          <?php echo $footer;  ?>
    </footer>
    
</body>
</html>
             
<!-- Calender JS Start-->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery-ui.js') ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
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

</script>
               -->  
<script type="text/javascript">   
 $(".formSentMsg").delay(3200).fadeOut(300);
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
  $('#preloader').fadeOut('slow',function(){$(this).remove();});
});
});
</script>

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>


<script type="text/javascript">





               $(document).ready(function () { 
              // alert(123); 



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


                            $("#jobseeker_regform").validate({

                                rules: {

                                    project_name:{

                                        //required: true,
                                        regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/

                                    },

                                    project_description:{
                                      regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/

                                    },
                                    training_organization:{
                                      regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/
                                    }

 

                                },


                            });
                        });
  
        </script>



    