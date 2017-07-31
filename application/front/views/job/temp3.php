
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

<?php if($jobdata[0]['job_step'] == 10){ ?>
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

                                <form class="clearfix">
                                    <fieldset>
                                        <label >First Name <font  color="red">*</font> :</label>
                                        <input type="text" name="" placeholder="Enter your First Name">
                                    </fieldset>
                                     <fieldset>
                                        <label >Last Name <font  color="red">*</font>:</label>
                                        <input type="text" name="" placeholder="Enter your Last Name">
                                    </fieldset>
                                      <fieldset class="full-width">
                                        <label >Email Address <font  color="red">*</font> :</label>
                                        <input type="text" name="" placeholder="Enter your Email Address">
                                    </fieldset>

                                     <fieldset class="fresher_radio" >
                                    <label>Fresher ? <font  color="red">*</font> : </label>
                                   <div class="main_raio">
    <input type="radio" id="test1" name="radio-group" >
    <label for="test1">Yes</label>
</div>

                                    
                                    <div class="main_raio">
    <input type="radio" id="test2" name="radio-group" >
    <label for="test2">No</label>
</div>


                                </fieldset>
                                   <fieldset class="full-width">
                                        <label >Job Title :</label>
                                        <input type="text" name="" placeholder="Ex:- Sr. Engineer, Jr. Engineer, Software Developer, Account Manager">
                                    </fieldset>
 
                                <fieldset class="full-width fresher_select main_select_data" >
                                    <label>skill <font  color="red">*</font> :</label>

                                   <select>
                                      <option value="volvo">Html</option>
                                      <option value="saab">Photoshop</option>
                                      <option value="opel">Tally</option>
                                      <option value="audi">Autocad</option>
                                       <option value="audi">Communication Skill</option>
                                    </select>

                            
                                </fieldset>
<fieldset class="full-width pt0 pb0">
                                <label id="other_skill">If you have not found your skill <span class="other_skill_clik"> click Here </span>to add your skill.</label>
                           
<div id="other_skill_data" style="display: none;">
<label>Other Skill :</label>
    <input type="text" name="">
</div>

 </fieldset>


                                <fieldset class="full-width main_select_data">
                                <label>Fields <font  color="red">*</font>:</label>
                                    <select>
                                      <option value="volvo">It</option>
                                      <option value="saab">Ec</option>
                                      <option value="opel">EEE</option>
                                      <option value="audi">Mechanical</option>
                                    </select>
                                </fieldset>
                                <fieldset class="full-width fresher_select main_select_data" >
                                    <label>Preferred Cites <font  color="red">*</font>:</label>

                                   <select>
                                      <option value="volvo">Ahmedabad   </option>
                                      <option value="saab">Surat</option>
                                      <option value="opel">Banglore</option>
                                      <option value="audi">Pune</option>
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
    $('#other_skill').click(function(){
$('#other_skill_data').toggle()
})
</script>

</body>
</html>
