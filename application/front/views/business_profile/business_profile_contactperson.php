<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<?php echo $header; ?>
<!--  <?php if ($businessdata[0]['business_step'] == 4) { ?> -->
    <?php echo $business_header2_border; ?>
    <!-- <?php } ?> -->

<!-- END HEADER -->
<body class="page-container-bg-solid page-boxed">

    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">

                    </div> 

                    <!-- middle section start -->

                    <div class="5col-md-6 col-sm-8">

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

                        <div>
                            <div>

                            </div> 
                            <div>

                                <div class="business_pf_ct_person_form clearfix">
                                    <h3>Contact Person</h3> 


                                    <?php echo form_open_multipart(base_url('business_profile/business_profile_contactperson_query/' . $contactperson[0]['user_id']), array('id' => 'contactperson', 'name' => 'contactperson', 'class' => 'clearfix')); ?>
                                    <ul class="business_pf_ct_person_detail">
                                        <li><b>Comapny Name </b> <span><?php echo $contactperson[0]['company_name']; ?></span></li>
                                        <li><b>Contact Person </b><span><?php echo $contactperson[0]['contact_person']; ?></span></li>
                                        <li><b >Phone No </b><span><?php echo $contactperson[0]['contact_mobile']; ?></span></li>
                                        <li><b>WebSite </b><span><?php echo $contactperson[0]['contact_website']; ?></span></li>
                                        <li><b>Email Id </b><span> <?php echo $contactperson[0]['contact_email']; ?></span></li>

                                    </ul>
                                    <div class="business_pf_ct_ clearfix">
                                        <div class="buisness-contact-head"> <h2>Inquiry</h2></div>
                                        <fieldset >
                                            <label>Email Address</label>
                                            <input name="email"  type="text" id="email" placeholder="Enter Your Email Address" value="<?php echo $userdata[0]['user_email']; ?>">
                                            <input name="toemail"  type="hidden" id="toemail" placeholder="Enter Your Email Address" value="<?php echo $contactperson[0]['contact_email']; ?>">
                                            <?php echo form_error('email'); ?>
                                        </fieldset>




                                        <fieldset class="full-width">
                                            <label>Details</label>
                                            <textarea name="msg" id="msg" placeholder="Enter Query"></textarea>

                                            <?php echo form_error('msg'); ?>
                                        </fieldset>

                                        <fieldset class="hs-submit full-width">
                                            <input type="submit"  id="submitcontact" name="submitcontact" value="send">
                                        </fieldset>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
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
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>


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
<!-- script for business autofill -->
<script>

    //var data = <?php// echo json_encode($demo); ?>;
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

</script>
<script>

    //var data1 = <?php// echo json_encode($city_data); ?>;
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

</script>


<script>
   jQuery.noConflict();
   
   (function ($) {
   
      // var data = <?php //echo json_encode($demo); ?>;
       //alert(data);
   
   
       $(function () {
           // alert('hi');
           $("#tags1").autocomplete({
               source: function (request, response) {
                   var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                   response($.grep(data, function (item) {
                       return matcher.test(item.label);
                   }));
               },
               minLength: 1,
               select: function (event, ui) {
                   event.preventDefault();
                   $("#tag1").val(ui.item.label);
                   $("#selected-tag").val(ui.item.label);
                   // window.location.href = ui.item.value;
               }
               ,
               focus: function (event, ui) {
                   event.preventDefault();
                   $("#tags1").val(ui.item.label);
               }
           });
       });
   
   })(jQuery);
   
</script>
<script>
   jQuery.noConflict();
   
   (function ($) {
   
       var data1 = <?php echo json_encode($de); ?>;
       //alert(data);
   
   
       $(function () {
           // alert('hi');
           $("#searchplace1").autocomplete({
               source: function (request, response) {
                   var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                   response($.grep(data1, function (item) {
                       return matcher.test(item.label);
                   }));
               },
               minLength: 1,
               select: function (event, ui) {
                   event.preventDefault();
                   $("#searchplace1").val(ui.item.label);
                   $("#selected-tag").val(ui.item.label);
                   // window.location.href = ui.item.value;
               }
               ,
               focus: function (event, ui) {
                   event.preventDefault();
                   $("#searchplace1").val(ui.item.label);
               }
           });
       });
   
   })(jQuery);
   
</script>

<script type="text/javascript">
                        function check() {
                            var keyword = $.trim(document.getElementById('tags1').value);
                            var place = $.trim(document.getElementById('searchplace1').value);
                            if (keyword == "" && place == "") {
                                return false;
                            }
                        }
                    </script>
<!-- footer end -->

   <!--  <script>

//select2 autocomplete start for Location
$('#searchplace').select2({
        
        placeholder: 'Find Your Location',
        maximumSelectionLength: 1,
        ajax:{

          url: "<?php echo base_url(); ?>business_profile/location",
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