<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" />  

<!-- vishang 17-4-17 start -->

<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>css/style.css">

<!-- vishang 17-4-17 end -->

<body>
    <section>
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Basic Information</a></li> 

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Information</a></li>

                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active" <?php } ?>><a href="#">Professional Information</a></li>

                                <li class="<?php
                                if ($freepostdata[0]['free_post_step'] < '3') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>

                                <li class="<?php
                                if ($freepostdata[0]['free_post_step'] < '3') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">ADD Your Avability</a></li>
                                <li class="<?php
                                if ($freepostdata[0]['free_post_step'] < '3') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>		    
                                <li class="<?php
                                if ($freepostdata[0]['free_post_step'] < '3') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('freelancer/freelancer_post_portfolio'); ?>">Portfolio</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">

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

                        <div class="common-form">
                            <h3>Proessional Information</h3>
                            <?php echo form_open(base_url('freelancer/freelancer_post_professional_information_insert'), array('id' => 'freelancer_post_professional', 'name' => 'freelancer_post_professional', 'class' => 'clearfix')); ?>

                            <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>

                            <?php
                            $field = form_error('field');
                            $area = form_error('area');
                            $skill_description = form_error('skill_description');
                            $experience_year = form_error('experience_year');
                            ?>


                            <fieldset class="full-width" <?php if ($field) { ?> class="error-msg" <?php } ?>>
                                <label>What is your field?:<span style="color:red">*</span></label> 

                                <select name="field" id="field">
                                    <option value="">Select Fields of Requirement</option>
                                    <?php
                                    if (count($category) > 0) {
                                        foreach ($category as $cnt) {

                                            if ($fields_req1) {
                                                ?>
                                                <option value="<?php echo $cnt['category_id']; ?>" <?php if ($cnt['category_id'] == $fields_req1) echo 'selected'; ?>><?php echo $cnt['category_name']; ?></option>

                                                <?php
                                            }
                                            else {
                                                ?>

                                                <option value="<?php echo $cnt['category_id']; ?>"><?php echo $cnt['category_name']; ?></option> 
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select> 
                                <?php echo form_error('field'); ?>
                            </fieldset>

                            <fieldset  <?php if ($area) { ?> class="error-msg" <?php } ?>>
                                <label>What is your skills?:<span style="color:red">*</span></label>


                                <select name="skills[]" id ="skill1" class="keyskil " multiple="multiple" style="width:100%;" >

                                    <?php foreach ($skill1 as $skill) { ?>
                                        <option value="<?php echo $skill['skill_id']; ?>"><?php echo $skill['skill']; ?></option>
                                    <?php } ?>

                                </select>


                                <?php echo form_error('area'); ?>
                            </fieldset>

                            <fieldset>
                                <label>Other skill:</label>          
                                <input type="text" class="keyskil" name="otherskill" id="otherskill" value="<?php echo $otherskill1; ?>" placeholder="Enter other skill" >
                            </fieldset>


                            <fieldset  class="full-width">
                                <label>Describe your skill in brief:<span style="color:red">*</span></label>

                                <textarea name ="skill_description" id="skill_description" rows="4" cols="50" placeholder="Enter skill description" style="resize: none;"><?php
                                    if ($skill_description1) {
                                        echo $skill_description1;
                                    }
                                    ?></textarea>

                                <?php echo form_error('skill_description'); ?>
                            </fieldset>

                            <fieldset  class="" <?php if ($experience_year) { ?> class="error-msg" <?php } ?>>
                                <label>Total experience<span style="color:red">*</span></label>  <select name="experience_year" placeholder="Year" id="experience_year" class="experience_year col-md-5" style="margin-right: 5px;">

                                    <option value="" selected option disabled>Year</option>
                                    <option value="0 year"  <?php if ($experience_year1 == "0 year") echo 'selected'; ?>>0</option>
                                    <option value="1 year"  <?php if ($experience_year1 == "1 year") echo 'selected'; ?>>1</option>
                                    <option value="2 year"  <?php if ($experience_year1 == "2 year") echo 'selected'; ?>>2</option>
                                    <option value="3 year"  <?php if ($experience_year1 == "3 year") echo 'selected'; ?>>3</option>
                                    <option value="4 year"  <?php if ($experience_year1 == "4 year") echo 'selected'; ?>>4</option>
                                    <option value="5 year"  <?php if ($experience_year1 == "5 year") echo 'selected'; ?>>5</option>
                                    <option value="6 year"  <?php if ($experience_year1 == "6 year") echo 'selected'; ?>>6</option>
                                    <option value="7 year"  <?php if ($experience_year1 == "7 year") echo 'selected'; ?>>7</option>  
                                    <option value="8 year"  <?php if ($experience_year1 == "8 year") echo 'selected'; ?>>8</option>
                                    <option value="9 year"  <?php if ($experience_year1 == "9 year") echo 'selected'; ?>>9</option> 
                                    <option value="10 year"  <?php if ($experience_year1 == "10 year") echo 'selected'; ?>>10</option>
                                    <option value="11 year"  <?php if ($experience_year1 == "11 year") echo 'selected'; ?>>11</option> 
                                    <option value="12 year"  <?php if ($experience_year1 == "12 year") echo 'selected'; ?>>12</option>
                                    <option value="13 year"  <?php if ($experience_year1 == "13 year") echo 'selected'; ?>>13</option> 
                                    <option value="14 year"  <?php if ($experience_year1 == "14 year") echo 'selected'; ?>>14</option>
                                    <option value="15 year"  <?php if ($experience_year1 == "15 year") echo 'selected'; ?>>15</option>
                                    <option value="16 year"  <?php if ($experience_year1 == "16 year") echo 'selected'; ?>>16</option>
                                    <option value="17 year"  <?php if ($experience_year1 == "17 year") echo 'selected'; ?>>17</option>
                                    <option value="18 year"  <?php if ($experience_year1 == "18 year") echo 'selected'; ?>>18</option>
                                    <option value="19 year"  <?php if ($experience_year1 == "19 year") echo 'selected'; ?>>19</option>
                                    <option value="20 year"  <?php if ($experience_year1 == "20 year") echo 'selected'; ?>>20</option>

                                </select>


                                <select name="experience_month" id="experience_month" placeholder="Month" class="experience_month col-md-5" style="margin-right: 5px;">
                                    <option value="" selected option disabled>Month</option>
                                    <option value="1 month"  <?php if ($experience_month1 == "1 month") echo 'selected'; ?>>1</option>
                                    <option value="2 month"  <?php if ($experience_month1 == "2 month") echo 'selected'; ?>>2</option>
                                    <option value="3 month"  <?php if ($experience_month1 == "3 month") echo 'selected'; ?>>3</option>
                                    <option value="4 month"  <?php if ($experience_month1 == "4 month") echo 'selected'; ?>>4</option>
                                    <option value="5 month"  <?php if ($experience_month1 == "5 month") echo 'selected'; ?>>5</option>
                                    <option value="6 month"  <?php if ($experience_month1 == "6 month") echo 'selected'; ?>>6</option>
                                    <option value="7 month"  <?php if ($experience_month1 == "7 month") echo 'selected'; ?>>7</option>
                                    <option value="8 month"  <?php if ($experience_month1 == "8 month") echo 'selected'; ?>>8</option>
                                    <option value="9 month"  <?php if ($experience_month1 == "9 month") echo 'selected'; ?>>9</option>
                                    <option value="10 month"  <?php if ($experience_month1 == "10 month") echo 'selected'; ?>>10</option>
                                    <option value="11 month"  <?php if ($experience_month1 == "11 month") echo 'selected'; ?>>11</option>
                                    <option value="12 month"  <?php if ($experience_month1 == "12 month") echo 'selected'; ?>>12</option>

                                </select>  
                                <?php echo form_error('experience_year'); ?>

                            </fieldset>

                            <fieldset class="hs-submit full-width">


<!--                                <input type="reset">
                                <a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Previous</a>-->
                                <input type="submit"  id="next" name="next" value="Next">


                            </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>

        <?php echo $footer; ?>
    </footer>

</body>
</html>

<!-- script for skill textbox automatic start (option 2)-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>


<!-- script for skill textbox automatic end (option 2)-->

<script>

    var complex = <?php echo json_encode($selectdata); ?>;
//alert(complex);
    $("#skill1").select2().select2('val', complex)

</script>

<!-- <script type="text/javascript" src="<?php //echo site_url('js/jquery-ui.js')    ?>"></script> -->
<!-- <script type="text/javascript" src="<?php //echo base_url('js/jquery.validate.min.js')    ?>"></script>
<script type="text/javascript" src="<?php //echo base_url('js/jquery.validate.js');    ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>
<script type="text/javascript">

    //validation for edit email formate form

    $(document).ready(function () {

        $("#freelancer_post_professional").validate({

            ignore: '*:not([name])',

            rules: {

                field: {

                    required: true,

                },
                area: {

                    required: true,

                },

                'skills[]': {

                    require_from_group: [1, ".keyskil"]
                            //required:true 
                },

                otherskill: {

                    require_from_group: [1, ".keyskil"]
                            // required:true 
                },

                skill_description: {

                    required: true,

                },

                experience_year: {

                    required: true,

                },

            },

            messages: {

                field: {

                    required: "This field is required.",

                },

                area: {

                    required: "Area is required.",

                },

                'skills[]': {

                    require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'"

                },

                otherskill: {

                    require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'"
                },

                skill_description: {

                    required: "Skill description is required.",

                },

                experience_year: {

                    required: "Experience year is required.",

                },
            }

        });
    });
</script>



