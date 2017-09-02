<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>

<!-- END HEADER -->
<body class="page-container-bg-solid page-boxed">

    <section>

    </div>
    <div class="user-midd-section" id="paddingtop_fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="left-side-bar">
                        <ul>
                            <li><a href="<?php echo base_url('business_profile/business_resume'); ?>">Buisness Profile</a>
                            </li>
                            <li><a href="<?php echo base_url('business_profile/business_profile_post'); ?>">Home</a>
                            </li>

                            <li><a href="<?php echo base_url('business_profile/business_profile_manage_post'); ?>"> Manage Post</a>
                            </li>
                            <li><a href="<?php echo base_url('business_profile/business_profile_save_post'); ?>"">Saved Post</a>
                            </li>
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
                        <h3>Business Profile Editpost</h3>


                        <?php echo form_open_multipart(base_url('business_profile/business_profile_editpost_insert/' . $business_profile_data[0]['business_profile_post_id']), array('id' => 'business_profile_editpost', 'name' => 'business_profile_editpost', 'class' => 'clearfix')); ?>
                        <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>

                        <fieldset class="full-width">
                            <label>Product Name:<span style="color:red">*</span></label>
                            <input type="text" name="productname" id="productname" value="<?php echo $business_profile_data[0]['product_name']; ?>">  
                            <?php echo form_error('productname'); ?>
                        </fieldset>

                        <fieldset class="full-width">
                            <label style="display: block;">Product Image:<span style="color:red">*</span></label>


                            <input type="hidden" name="hiddenimg" id="hiddenimg" value="<?php echo $business_profile_data[0]['product_image']; ?>">
                            <input type="file" name="image" id="image">  


                            <!--video and audio display start -->


                            <?php
                            $allowed = array('gif', 'png', 'jpg');
                            $allowespdf = array('pdf');

                            $filename = $business_profile_data[0]['product_image'];


                            $ext = pathinfo($filename, PATHINFO_EXTENSION);


                            if (in_array($ext, $allowed)) {
                                ?>

                                <img src="<?php echo base_url(BUSINESSPROFILEIMAGE . $business_profile_data[0]['product_image']) ?>" style="width:100px;height:100px;"> 
                                <?php
                            } elseif (in_array($ext, $allowespdf)) {
                                ?>



                                <a href="<?php echo base_url('business_profile/creat_pdf/' . $business_profile_data[0]['business_profile_post_id']) ?>">PDF</a>
                                <?php
                            } else {
                                ?>

                                <video width="320" height="240" controls>
                                    <source src="<?php echo base_url(BUSINESSPROFILEIMAGE . $business_profile_data[0]['product_image']); ?>" type="video/mp4">
                                    <source src="movie.ogg" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                                <?php
                            }
                            ?>

                            <!--video and audio display end -->

                            <?php echo form_error('image'); ?>
                        </fieldset>

                        <fieldset class="full-width">
                            <label>Description:<span style="color:red">*</span></label>
                            <textarea name="description" id="description" placeholder="Enter Description"><?php echo $business_profile_data[0]['product_description']; ?></textarea>
                            <?php echo form_error('description'); ?>
                        </fieldset>



                        <fieldset class="full-width hs-submit">

                            <input type="reset" name="reset" value="Clear">
                            <input type="submit" name="producteditpost" id="producteditpost">

                        </fieldset>
                        </form>             
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- footer start -->
<footer>

    <?php echo $footer; ?>
</footer>

</body>
</html>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<!-- footer end -->
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