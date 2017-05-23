 
<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<style type="text/css">
 .okk{
        text-align: center;
    }
     .pop_content .okbtn{
        position: absolute;
        transition: all 200ms;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        padding: 8px 18px;
        background-color: #0A2C5D;
        left: 170px;
        margin-top: 8px;
        width: 100px; 
        border-radius: 8px;
    }
      .pop_content .cnclbtn {
        position: absolute;
        transition: all 200ms;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        padding: 8px 18px;
        background-color: #0A2C5D;
        right: 170px;
        margin-top: 8px;
        width: 100px;
        border-radius: 8px;
    }

   .popup .pop_content {
        text-align: center;
        margin-top: 40px;

    }
      .model_ok_cancel{
        width:200px !important;
    }

</style>
<style type="text/css">
  
  /*.keyskill_border_deactivte {
  border: 0px solid red;

}*/

.keyskill_border_active {
  border: 1px solid red !important;

}
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.css" rel="stylesheet" /> 
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<!-- start header -->
<?php echo $header; ?> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<?php if($jobdata[0]['job_step'] == 10){ ?>
<?php echo $job_header2_border; ?>
<?php } ?>
<!-- END HEADER -->
<body class="page-container-bg-solid page-boxed">

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
                <?php }else{

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
                            <?php
                            $userid = $this->session->userdata('user_id');
                            $job = $this->db->get_where('job_reg', array('user_id' => $userid))->row()->job_step;
                            ?>
                            <ul>
                                <li><a href="<?php echo base_url('job/job_basicinfo_update'); ?>">Basic Information</a></li>

                                <li><a href="<?php echo base_url('job/job_address_update'); ?>">Address</a></li>

                                <li><a href="<?php echo base_url('job/job_education_update'); ?>">Educational Qualification</a></li>


                                <li><a href="<?php echo base_url('job/job_project_update'); ?>">Project And Training / Internship</a></li>

                                <li <?php if ($this->uri->segment(1) == 'job') { ?> class="active" <?php } ?>><a href="#">Professional Skills</a></li>

                                <li class="<?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_apply_for_update'); ?>">Apply For</a></li>

                                <li class="<?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_work_exp_update'); ?>">Work Experience</a></li>

                                <li class="<?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_curricular_update'); ?>">Extra Curricular Activities</a></li>

                                <li class="<?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_reference_update'); ?>">Interest & Reference</a></li>

                                <li class="<?php
                                if ($jobdata[0]['job_step'] < '5') {
                                    echo "khyati";
                                }
                                ?>"><a href="<?php echo base_url('job/job_carrier_update'); ?>">Carrier Objectives</a></li>
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
                                <h3>Keyskills</h3>
<?php echo form_open(base_url('job/job_skill_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix', 'onsubmit' => "imgval()")); ?>


                                <!-- <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span><?php $skills = form_error('skills'); ?>
                                </div> --> 

      <div> <span class="required_field" >( <span style="color: red">*</span> ) Indicates required field</span></div>
                                


                                <fieldset class="full-width" <?php if ($skills) { ?> class="error-msg" <?php } ?> >
                                    <label>keyskills<span style="color:red">*</span></label>


                                    <select name="skills[]" id ="skils" class="keyskil" multiple="multiple" style="width:100%;">
<?php foreach ($skill as $ski) { ?>
                                            <option value="<?php echo $ski['skill_id']; ?>"><?php echo $ski['skill']; ?></option>
<?php } ?>
                                    </select>


                                        <?php echo form_error('skills'); ?>
                                </fieldset>


                                <div class="col-md-12" style="padding-left: 8px;">
                                    <fieldset class="col-md-12" style="padding-left: 0px;">
                                        <label>Other skill:</label>

                                        <?php
                                        if ($skill_other) {
                                            ?>

                                            <input type="text" class="keyskil1" name="other_skill1" id="other_keyskill1" placeholder="Enter Other Skill" value=""> 
                                            <div class="action-buttons btn-group ">
                                                <a href="javascript:void(0);" id="add_field1" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>
                                            <?php
                                            $count = count($skill_other);
                                            foreach ($skill_other as $post) {
                                                ?>
                                                <input type="text" class="keyskil" name="other_skill<?php echo $post['skill_id']; ?>" id="other_keyskill-<?php echo $post['skill_id']; ?>" placeholder="Enter Other Skill" value="<?php echo $post['skill']; ?>"> 
                                                <div class="action-buttons btn-group" id="edit-other-skill-<?php echo $post['skill_id']; ?>">
                                                    <a href="javascript:void(0);" class="edit_other_skill" id="edit_other_skill-<?php echo $post['skill_id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                </div>
        <?php echo form_error('other_skill'); ?>
                                                <!--   <input class="clearable" type="text" name="" value="" placeholder="Enter a Search term" /> -->
                                                <?php
                                            }
                                            ?>

    <?php
} else {
    ?> 



                                            <input type="text" class="keyskil" name="other_skill" id="other_keyskill" placeholder="Enter Other Skill" value=""> 
                                            <?php  echo form_error('other_skill'); ?>
                                          <!--   <input class="clearable" type="text" name="" value="" placeholder="Enter a Search term" /> -->


                                            <div class="action-buttons btn-group ">
                                                <a href="javascript:void(0);" id="add_field" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>


    <?php
}
?>
                                    </fieldset>
                                </div>

                                <fieldset class="hs-submit full-width">
<!--                                    <input type="reset">
                                    <input type="submit"  id="previous" name="previous" value="previous">-->
                                    <input type="submit"  id="next" name="next" value="next">


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
    <!-- END CONTAINER -->

<div class="modal fade message-box biderror" id="bidmodalskill" role="dialog">
                    <div class="modal-dialog modal-lm">
                        <div class="modal-content">
                        <button  type="button" class="modal-close" data-dismiss="modal" onclick="closemodel()">&times;</button>         
                            <div class="modal-body">
                                <span class="mes"></span>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>

<style type="text/css">
    .keyskil, #other_keyskill1, #other_keyskill{
        width:95% !important;
        margin-bottom: 5px;
    }    
</style>



<!-- script for js validation start-->
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



<!-- script for clear textbox start-->
<!-- <script type="text/javascript" src="<?php// echo base_url('js/jquery.clearsearch-1.0.4.js'); ?>"></script> -->
<!-- script for clear textbox End-->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.0/select2.js"></script>

<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
//select2 autocomplete start for skill
    var complex = <?php echo json_encode($selectdata); ?>;
    $('#skils').select2().select2('val', complex)
//select2 autocomplete End for skill
</script>

<script type="text/javascript">

jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");
    $(document).ready(function () {
       
        //alert(123);
     $("#jobseeker_regform").validate({
      //  alert(456);

             ignore: '*:not([name])',

            rules: {


                'skills[]': {

                    require_from_group: [1, ".keyskil"],
                            //required:true 
                },

                other_skill: {

                    require_from_group: [1, ".keyskil"],
                    noSpace: true
                            // required:true 
                }
            },

       messages: {

                'skills[]': {

                    require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'",

                },

                other_skill: {

                    require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'",
                }
            }

        });
          });
//validation end

//clear textbox start
    // $(function () {
    //     // init plugin (with callback)
    //     $('#other_skill').clearSearch({
    //         callback: function () {
    //             console.log("search cleared");
    //         }
    //     });

    // });
//clear textbox End

    $('#add_field').click(function (e) {

        e.preventDefault();
        e.stopPropagation();
        var other_skill = $("#other_keyskill").val();
        

        var postData = {
            'other_skill': other_skill,
          };
        $.ajax({

            type: "POST",
            url: "<?php echo base_url(); ?>job/other_skill_insert",
            data: postData, //assign the var here 
            success: function () {
                $('.biderror .mes').html("<div class='pop_content'>Skill Inserted Successfully.");
                 $('#bidmodalskill').modal('show');

                $("#other_keyskill").val('');
                // if (msg == "Skill Inserted Successfully")
                // {
                    //window.location.reload(true);
                   // window.location= "<?php echo base_url() ?>job/job_skill_update";
                //}

            }
        });
    });





    $('#add_field1').click(function (e) {

        e.preventDefault();
        e.stopPropagation();
        var other_skill = $("#other_keyskill1").val();
    //    var user_id = <?php echo $aileenuser_id; ?>
        
        var postData = {
            'other_skill': other_skill,
    //        'user_id': user_id
        };
        
        $.ajax({

            type: "POST",
            url: "<?php echo base_url(); ?>job/other_skill_insert",
            data: postData, //assign the var here 
            success: function () {
                $('.biderror .mes').html("<div class='pop_content'>Skill inserted successfully.");
                 $('#bidmodalskill').modal('show');

                $("#other_keyskill1").val('');
                // if (msg == "Skill Inserted Successfully")
                // {
                //     window.location.reload(true);
                // }
            }

        });
    });

    $('.edit_other_skill').click(function (e) {
    //  var other_skill = $("#edit_other_skill").val();
        var id_val = $(this).attr('id');
        var parts = id_val.split('-', 2);
        var get_id  = parts[1];
       
        var postData = {
            'skill_id': get_id
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>job/other_skill_remove",
            data: postData, //assign the var here 
            success: function (msg) {
                if(msg == 'ok'){
                    $("#other_keyskill-" + get_id).remove();
                    $("#edit-other-skill-" + get_id).remove();
                }
            }
        });
    });


 function closemodel(){
    window.location= "<?php echo base_url() ?>job/job_skill_update";
 }

</script>

<script type="text/javascript">
  
function imgval(){ 
    alert(123);

 var skill_main = document.getElementById("skils").value;
 var skill_other = document.getElementById("other_keyskill1").value;

     if(skill_main =='' && skill_other == ''){
  //$($("#skils").select2("container")).removeClass("keyskill_border_deactivte");

  $(".select2-drop-mask").addClass("keyskill_border_active");
  }
   
  }

</script>


<script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>


