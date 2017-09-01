<!-- HEAD Start -->

<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->



<?php echo $header; ?>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
<!-- pallavi code start 15-4 -->

<?php if ($freehiredata[0]['free_hire_step'] == '3'){ 
     echo $freelancer_hire_header2_border; } ?>
<!-- pallavi code end 15-4 -->
<div class="js">
<body>
<div id="preloader"></div>
    
    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
          <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>


             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $freehiredata = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($freehiredata[0]['free_hire_step'] == 3){ ?>

<div class="col-md-6 col-sm-6"><h3>You are updating your Freelancer Profile.</h3></div>
             <?php }else{

             ?>

                      <div class="col-md-6 col-sm-6"><h3>You are making your Freelancer Profile.</h3></div>
            <?php }?>

            </div>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul class="left-form-each">
                                <li <?php if ($this->uri->segment(1) == 'freelancer_hire') { ?> class="active init" <?php } ?>><a href="#">Basic Information</a></li>

                                <li class="custom-none <?php if ($freehiredata[0]['free_hire_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer_hire/freelancer_hire_address_info'); ?>">Address Information</a></li>

                                <li class="custom-none <?php if ($freehiredata[0]['free_hire_step'] < '2') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer_hire/freelancer_hire_professional_info'); ?>">Professional Information</a></li>



                            </ul>
                        </div>
                    </div>
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

                        <div class="common-form common-form_border">
                            <h3>Basic Information</h3>

                            <?php echo form_open_multipart(base_url('freelancer_hire/freelancer_hire_basic_info_insert'), array('id' => 'basic_info', 'name' => 'basic_info', 'class' => 'clearfix')); ?>

                           <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span class="red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>


                            <?php
                            $fname = form_error('fname');
                            $lname = form_error('lname');
                            $email = form_error('email');

                            $phone = form_error('phone');
                            ?>

                            <fieldset <?php if ($fname) { ?> class="error-msg" <?php } ?>>
                                <label>First Name<span class="red">*</span>:</label>
                                <input type="text" tabindex="1" autofocus name="fname" id="fname" placeholder="Enter First Name" value="<?php if ($firstname1) {
                                    echo $firstname1;
                                } else {
                                    echo $userdata[0]['first_name'];
                                } ?>" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
<?php echo form_error('fname'); ?>
                            </fieldset>


                            <fieldset <?php if ($lname) { ?> class="error-msg" <?php } ?>>
                                <label>Last Name<span class="red">*</span>:</label>
                                <input type="text" tabindex="2" name="lname" id="lname" placeholder="Enter Last Name" value="<?php if ($lastname1) {
    echo $lastname1;
} else {
    echo $userdata[0]['last_name'];
} ?>">
<?php echo form_error('lname'); ?>
                            </fieldset>


                            <fieldset <?php if ($email) { ?> class="error-msg" <?php } ?>>
                                <label>Email<span class="red">*</span>:</label>
                                <input type="text" name="email" tabindex="3" id="email" placeholder="Enter Email" value="<?php if ($email1) {
    echo $email1;
} else {
    echo $userdata[0]['user_email'];
} ?>">
<?php echo form_error('email'); ?>
                            </fieldset>


                            <fieldset>
                                <label>Skype Id:</label>
                                <input type="text" name="skyupid" id="skyupid"  tabindex="4" placeholder="Enter SkypeId" value="<?php if ($skypeid1) {
    echo $skypeid1;
} ?>">

                            </fieldset>


                            <fieldset <?php if ($phone) { ?> class="error-msg" <?php } ?> class="full-width">
                                <label>Phone Number:</label>
                                <input type="text" tabindex="5" name="phone" id="phone" placeholder="Enter Phone Number" value="<?php if ($phoneno1) {
    echo $phoneno1;
} ?>">
        <?php echo form_error('phone'); ?>
                            </fieldset>


                            <fieldset class="hs-submit full-width">

                              
                                <input type="submit" tabindex="6" id="next" name="next" value="Next">


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
</div>
</html>

<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>



<script>
    //SCRIPT FOR AUTOFILL OF SEARCH KEYWORD START
 var base_url = '<?php echo base_url(); ?>';
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        $( ".skill_keyword" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
           
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON(base_url + "freelancer/freelancer_hire_search_keyword", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 1) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( "" );
                    return false;
                }else{
                   
                    var last = terms.pop();
                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                    $(this).effect("highlight", {}, 1000);
                    $(this).attr("style","border: solid 1px red;");
                    return false;
                }
            }
        });
    });

//SCRIPT FOR AUTOFILL OF SEARCH KEYWORD END


//SCRIPT FOR CITY AUTOFILL OF SEARCH START

    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        $( ".skill_place" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON(base_url + "freelancer/freelancer_search_city", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 1) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( "" );
                    return false;
                }else{
                    var last = terms.pop();
                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                    $(this).effect("highlight", {}, 1000);
                    $(this).attr("style","border: solid 1px red;");
                    return false;
                }
            }
        });
    });

//SCRIPT FOR CITY AUTOFILL OF SEARCH END




    </script>









   

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
 


<!-- pallavi changes 15-4 -->
 <script type="text/javascript">
                        function checkvalue() {
                            //alert("hi");
                            var searchkeyword = $.trim(document.getElementById('tags').value);
                            var searchplace = $.trim(document.getElementById('searchplace').value);
                            // alert(searchkeyword);
                            // alert(searchplace);
                            if (searchkeyword == "" && searchplace == "") {
                                //alert('Please enter Keyword');
                                return false;
                            }
                        }
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
                   

<!-- 
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

 -->
<!-- pallavi end 15-4 -->
<script type="text/javascript">

    //validation for edit email formate form

 jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");

 $.validator.addMethod("regx", function(value, element, regexpr) { 

  if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }         
   // return regexpr.test(value);
}, "Number, space and special character are not allowed");

$.validator.addMethod("regx1", function(value, element, regexpr) {          
    if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }  
}, "Enter a number between 8 to 15 digit");
 


    $(document).ready(function () {

        $("#basic_info").validate({

            rules: {

                fname: {

                    required: true,
                    regx:/^[^-\s][a-zA-Z_\s-]+$/,

                   //oSpace: true

                },

                lname: {

                    required: true,
                    regx:/^[^-\s][a-zA-Z_\s-]+$/,

                },

                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo site_url() . 'freelancer_hire/check_email' ?>",
                        type: "post",
                        data: {
                            email: function () {
                                return $("#email").val();
                            },
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                        },
                    },
                },

                phone: {

                    
                      regx1:/^[0-9\-\+]{9,15}$/,
                    

                            
                    },

            },

             
            messages: {

                fname: {

                    required: "First name Is Required.",

                },

                lname: {

                    required: "Last name Is Required.",

                },

                email: {
                    required: "Email id is required",
                    email: "Please enter valid email id",
                    remote: "Email already exists"
                },
                phone:{
                    minlength:"Minimum length 8 digit",
                    maxlength: "Maximum length 15 digit"


                }

            },

        });
    });
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
  $('#preloader').fadeOut('slow',function(){$(this).remove();});
});
});
</script>

