<!-- START HEAD -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />


<?php if ($freepostdata[0]['user_id'] && $freepostdata[0]['free_post_step'] == '7'){ 
     echo $freelancer_post_header2;; } ?>

<body>

    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>
             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $freepostdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($freepostdata[0]['free_post_step'] == 7){ }else{

             ?>

                      <div class="col-md-6 col-sm-8"><h3>You are making your Freelancer Profile.</h3></div>

                <?php }?>
            </div>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Basic Information</a></li>

                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active" <?php } ?>><a href="#">Address Information</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '2') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Information</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '2') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '2') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">ADD Your Avability</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '2') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>		    
                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '2') {
                                echo "khyati";
                            } ?>"><a href="<?php echo base_url('freelancer/freelancer_post_portfolio'); ?>">Portfolio</a></li>
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
                            <h3>Address Information</h3>
<?php echo form_open(base_url('freelancer/freelancer_post_address_information_insert'), array('id' => 'freelancer_post_addressinfo', 'name' => 'freelancer_post_addressinfo', 'class' => 'clearfix')); ?>
                            <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>


<?php
$country = form_error('country');
$state = form_error('state');
$city = form_error('city');
$postaladdress = form_error('postaladdress');
$pincode = form_error('pincode');
?>

                            <fieldset <?php if ($country) { ?> class="error-msg" <?php } ?>>
                                <label>Country:<span style="color:red">*</span></label>
                                <select name="country" id="country">
                                    <option value="">Select Country</option>
                                    <?php
                                    if (count($countries) > 0) {
                                        foreach ($countries as $cnt) {

                                            if ($country1) {
                                                ?>
                                                <option value="<?php echo $cnt['country_id']; ?>" <?php if ($cnt['country_id'] == $country1) echo 'selected'; ?>><?php echo $cnt['country_name']; ?></option>

                                                <?php
                                            }
                                            else {
                                                ?>
                                                <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name']; ?></option>
            <?php
        }
    }
}
?>
                                </select> 
                                    <?php echo form_error('country'); ?>
                            </fieldset>

                            <fieldset <?php if ($state) { ?> class="error-msg" <?php } ?>>
                                <label>State:<span style="color:red">*</span></label>
                                <select name="state" id="state">
                                    <?php
                                    foreach ($states as $cnt) {
                                        if ($state1) {
                                            ?>

                                            <option value="<?php echo $cnt['state_id']; ?>" <?php if ($cnt['state_id'] == $state1) echo 'selected'; ?>><?php echo $cnt['state_name']; ?></option>

                                            <?php
                                        }

                                        else {
                                            ?>
                                            <option value="">Select country first</option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
<?php echo form_error('state'); ?> 
                            </fieldset>

                            <fieldset>
                                <label>City:</label>
                                <select name="city" id="city">
                                    <?php
                                    foreach ($cities as $cnt) {
                                        if ($city1) {
                                            ?>

                                            <option value="<?php echo $cnt['city_id']; ?>" <?php if ($cnt['city_id'] == $city1) echo 'selected'; ?>><?php echo $cnt['city_name']; ?></option>

        <?php
    }

    else {
        ?>
                                            <option value="">Select state first</option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </fieldset>

                            <fieldset>
                                <label>Pincode:</label>
                                <input type="text" name="pincode" placeholder="Enter pincode" value="<?php if ($pincode1) {
                                        echo $pincode1;
                                    } ?>">

                            </fieldset>

                            <fieldset class="full-width">
                                <label>Postal address:<span style="color:red">*</span></label>

                                <textarea name ="postaladdress" id="postaladdress" rows="4" cols="50" placeholder="Enter postal address" style="resize: none;"><?php if ($address1) {
                                        echo $address1;
                                    } ?></textarea>
<?php echo form_error('postaladdress'); ?>
                            </fieldset>

                            <fieldset class="hs-submit full-width">
<!-- @nk!y 07-04-2017 start -->
<!--                                <input type="reset">
                                <a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>"> Previous</a>-->
<!-- @nk!y 07-04-2017 end -->
                                <input type="submit"  id="next" name="next" value="Next">


                            </fieldset>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "freelancer/ajax_data"; ?>',
                        data: 'country_id=' + countryID,
                        success: function (html) {
                            $('#state').html(html);
                            $('#city').html('<option value="">Select state first</option>');
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select country first</option>');
                    $('#city').html('<option value="">Select state first</option>');
                }
            });

            $('#state').on('change', function () {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "freelancer/ajax_data"; ?>',
                        data: 'state_id=' + stateID,
                        success: function (html) {
                            $('#city').html(html);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select state first</option>');
                }
            });
        });
    </script>
    <footer>

<?php echo $footer; ?>
    </footer>

</body>
</html>
 <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
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
                    
                    //select2 autocomplete start for Location
                    $('#searchplace').select2({
                        placeholder: 'Find Your Location',
                        maximumSelectionLength: 1,
                        ajax: {
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
<script type="text/javascript">

        //validation for edit email formate form

        $(document).ready(function () {

            $("#freelancer_post_addressinfo").validate({

                rules: {

                    country: {

                        required: true,

                    },

                    state: {

                        required: true,

                    },

                    postaladdress: {

                        required: true,

                    },
                },

                messages: {

                    country: {

                        required: "Country is required.",

                    },

                    state: {
                        required: "State is required.",
                    },

                    postaladdress: {
                        required: "Postal address is required.",
                    },

                },

            });
        });
</script>


<script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>
