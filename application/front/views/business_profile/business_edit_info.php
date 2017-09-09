<!--start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->
<body class="page-container-bg-solid page-boxed">

    <section>
        <div class="user-profile">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-img pull-left">
                            <?php if ($userdata[0]['user_image'] != '') { ?>
                                <img alt="" class="img-circle" src="<?php echo base_url(USERIMAGE . $userdata[0]['user_image']); ?>" height="50" width="50" alt="Smiley face" />
                            <?php } else { ?>
                                <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" height="50" width="50" alt="Smiley face" />
                            <?php } ?>
                        </div>
                        <div class="user-detail pull-left">
                            <h6><?php echo $userdata[0]['first_name'] . $userdata[0]['last_name']; ?></h6>
                            <span>Designation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                <li <?php if ($this->uri->segment(1) == 'edit_business_profile') { ?> class="active" <?php } ?>><a href="#">Business information</a></li>
                                <li><a href="<?php echo base_url('edit_business_profile/edit_contact_information'); ?>">Contact information</a></li>
                                <li><a href="<?php echo base_url('edit_business_profile/edit_description'); ?>">Description</a></li>
                                <li><a href="<?php echo base_url('edit_business_profile/edit_image'); ?>">Images</a></li>


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

                        <div class="common-form">
                            <h3>Business information</h3>

                            <?php echo form_open(base_url('edit_business_profile/edit_business_information_insert'), array('id' => 'editusinessinfo', 'name' => 'editbusinessinfo', 'class' => 'clearfix')); ?>

                            <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>

                            <?php
                            $companyname = form_error('companyname');
                            $country = form_error('country');
                            $state = form_error('state');
                            $city = form_error('city');
                            $pincode = form_error('pincode');
                            ?>

                            <fieldset <?php if ($companyname) { ?> class="error-msg" <?php } ?>>
                                <label>Company Name:<span style="color:red">*</span></label>
                                <input name="companyname" type="text" id="companyname" placeholder="company Name"  value="<?php echo $business_profile_data[0]['company_name']; ?>"/>
                            </fieldset>
                            <?php echo form_error('companyname'); ?>

                            <fieldset <?php if ($country) { ?> class="error-msg" <?php } ?>>
                                <label>Country:<span style="color:red">*</span></label>
                                <select name="country" id="country">
                                    <option value="">Select Country</option>
                                    <?php
                                    if (count($countries) > 0) {
                                        foreach ($countries as $cnt) {
                                            ?>
                                            <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name']; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select><span id="country-error"></span>

                            </fieldset>
<?php echo form_error('country'); ?>


                            <fieldset <?php if ($state) { ?> class="error-msg" <?php } ?>>
                                <label>State:<span style="color:red">*</span></label>
                                <select name="state" id="state">
                                    <option value="">Select country first</option>
                                </select><span id="state-error"></span>

                            </fieldset>
<?php echo form_error('state'); ?>

                            <fieldset <?php if ($city) { ?> class="error-msg" <?php } ?>>
                                <label> City:<span style="color:red">*</span></label>
                                <select name="city" id="city">
                                    <option value="">Select state first</option>
                                </select><span id="city-error"></span>

                            </fieldset>
<?php echo form_error('city'); ?>

                            <fieldset class="full-width">
                                <label>Pincode:<span style="color:red">*</span></label>
                                <input name="pincode"  type="text" id="pincode" placeholder="Pincode" value="<?php echo $business_profile_data[0]['pincode']; ?>">
                            </fieldset>
<?php echo form_error('pincode'); ?><br/>
                            <fieldset class="full-width">
                                <label>Postal Address:<span style="color:red">*</span></label>

                            <?php echo form_textarea(array('name' => 'interview', 'id' => 'varmailformat', 'class' => "ckeditor", 'value' => html_entity_decode($business_profile_data[0]['address']))); ?><br>  
                            </fieldset>
<?php echo form_error('business_address'); ?><br/>

                            <fieldset class="hs-submit full-width">
                                <input type="submit"  id="submitbusinessprofile" name="submitbusinessprofile" value="save">
                                <input type="reset">
                            </fieldset>
                            </form>
                        </div>
                    </div>



                    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
                    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
                            <script>
   // recruiter search header 2  start
// recruiter search header 2 location start
  var base_url = '<?php echo base_url(); ?>';
$(function () { 
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".bus_search_loc").bind("keydown", function (event) { 
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
            .autocomplete({
                minLength: 2,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "business_profile/get_location", {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {

                    var text = this.value;
                    var terms = split(this.value);

                    text = text == null || text == undefined ? "" : text;
                    var checked = (text.indexOf(ui.item.value + ', ') > -1 ? 'checked' : '');
                    if (checked == 'checked') {

                        terms.push(ui.item.value);
                        this.value = terms.split(", ");
                    }//if end

                    else {
                        if (terms.length <= 1) {
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join("");
                            return false;
                        } else {
                            var last = terms.pop();
                            $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                            $(this).effect("highlight", {}, 1000);
                            $(this).attr("style", "border: solid 1px red;");
                            return false;
                        }
                    }
                }//end else
            });
});

// recruiter searc location end
// recruiter searc title start
$(function () { 
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".bus_search_comp").bind("keydown", function (event) { 
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
            .autocomplete({
                minLength: 2,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "business_profile/get_all_data", {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {

                    var text = this.value;
                    var terms = split(this.value);

                    text = text == null || text == undefined ? "" : text;
                    var checked = (text.indexOf(ui.item.value + ', ') > -1 ? 'checked' : '');
                    if (checked == 'checked') {

                        terms.push(ui.item.value);
                        this.value = terms.split("");
                    }//if end

                    else {
                        if (terms.length <= 1) {
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join("");
                            return false;
                        } else {
                            var last = terms.pop();
                            $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                            $(this).effect("highlight", {}, 1000);
                            $(this).attr("style", "border: solid 1px red;");
                            return false;
                        }
                    }
                }//end else
            });
});

// recruiter searc title end
// recruiter search end
    </script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#country').on('change', function () {
                                var countryID = $(this).val();
                                if (countryID) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url() . "edit_business_profile/ajax_data"; ?>',
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
                                        url: '<?php echo base_url() . "edit_business_profile/ajax_data"; ?>',
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



                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

</body>
</html>


