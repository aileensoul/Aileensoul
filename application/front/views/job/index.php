
<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<!-- Calender Css Start-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.datetimepicker.css'); ?>">
<!-- Calender Css End-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">


<style type="text/css">

.date-dropdowns .day, .date-dropdowns .month, .date-dropdowns .year{width: 30%; float: left; margin-right: 5%;}
.date-dropdowns .year{margin-right: 0;}
.example {
    width: 33%;
    min-width: 400px;
    padding: 15px;
    display: inline-block;
    box-sizing: border-box;
    text-align: center;
}

.example:first-of-type {
    position: relative;
    bottom: 35px;
}

/* Example Heading */
.example h2 {
    font-family: "Roboto Condensed", helvetica, arial, sans-serif;
    font-size: 1.3em;
    margin: 15px 0;
    color: #4F5462;
}

.example input {
    display: block;
    margin: 0 auto 20px auto;
    width: 150px;
    padding: 8px 10px;
    border: 1px solid #CCCCCC;
    border-radius: 3px;
    background: #F2F2F2;
    text-align: center;
    font-size: 1em;
    letter-spacing: 0.02em;
    font-family: "Roboto Condensed", helvetica, arial, sans-serif;
}

.example select {
    padding: 10px;
    background: #ffffff;
    border: 1px solid #CCCCCC;
    border-radius: 3px;
    margin: 0 3px;
}

.example select.invalid {
    color: #E9403C;
}

.example input[type="submit"] {
    margin-top: 10px;
}

.example input[type="submit"]:hover {
    cursor: pointer;
    background-color: #e5e5e5;
}


</style>
<!-- css for date picker end-->

<!-- This style is used for autocomplete start -->
 <style type="text/css">

/* Layout helpers
----------------------------------*/
.ui-helper-hidden {
  display: none;
}
.ui-helper-hidden-accessible {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.ui-front {
  z-index: 100;
}



/* Misc visuals
----------------------------------*/

/* Overlays */
.ui-widget-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.ui-autocomplete {
  position: absolute;
  top: 0;
  left: 0;
  cursor: default;
}

.ui-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  display: block;
  outline: none;
}
.ui-menu .ui-menu {
  position: absolute;
}
.ui-menu .ui-menu-item {
  position: relative;
  margin: 0;
  padding: 3px 1em 3px .4em;
  cursor: pointer;
  min-height: 0; /* support: IE7 */
  /* support: IE10, see #8844 */
  list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
}
.ui-menu .ui-menu-divider {
  margin: 5px 0;
  height: 0;
  font-size: 0;
  line-height: 0;
  border-width: 1px 0 0 0;
}
.ui-menu .ui-state-focus,
.ui-menu .ui-state-active {
  margin: -1px;
}

/* Component containers
----------------------------------*/
.ui-widget {
  font-family: Verdana,Arial,sans-serif;
  font-size: 1.1em;
}
.ui-widget .ui-widget {
  font-size: 1em;
}
.ui-widget input,
.ui-widget select,
.ui-widget textarea,
.ui-widget button {
  font-family: Verdana,Arial,sans-serif;
  font-size: 1em;
}
.ui-widget-content {
  border: 1px solid #aaaaaa;
  background: #ffffff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x;
  color: #222222;
}
.ui-widget-content a {
  color: #222222;
}
.ui-widget-header {
  border: 1px solid #aaaaaa;
  background: #cccccc url("images/ui-bg_highlight-soft_75_cccccc_1x100.png") 50% 50% repeat-x;
  color: #222222;
  font-weight: bold;
}
.ui-widget-header a {
  color: #222222;
}

/* Interaction states
----------------------------------*/
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
  border: 1px solid #d3d3d3;
  background: #e6e6e6 url("images/ui-bg_glass_75_e6e6e6_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #555555;
}

.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
  border: 1px solid #999999;
  background: #dadada url("images/ui-bg_glass_75_dadada_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #212121;
}

.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
  border: 1px solid #aaaaaa;
  background: #ffffff url("images/ui-bg_glass_65_ffffff_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #212121;
}

  </style>
<!-- This style is used for autocomplete End -->

<!-- start header -->
<?php echo $header; ?>

<?php //if($jobdata[0]['job_step'] == 10){ ?>
<?php echo $job_header2_border; ?>
<?php //} ?>
<!-- END HEADER -->
<style type="text/css">
   
</style>
<div class="js">
<body class="page-container-bg-solid page-boxed">
<div id="preloader"></div>
    <section>

        <div class="user-midd-section " id="paddingtop_fixed_job">
            
           <div class="common-form1 ">
             <div class="col-md-3 col-sm-4"></div>

             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($jobdata[0]['job_step'] == 10 || $jobdata[0]['job_step'] >= 1){ ?>
                <div class="col-md-6 col-sm-12"><h3>You are updating your Job Profile.</h3></div>
            <?php  }else{

             ?>


                      <div class="col-md-6 col-sm-12"><h3>You are making your Job Profile.</h3></div>

                      <?php }?>
            </div>
            <br>
           
            <div class="container">
                <div class="row row4">
                   
                        <?php echo $job_left; ?>

                    <!-- middle section start -->
                    <div class="col-lg-6 col-md-6 col-sm-8">

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
                                <h3>Basic Information</h3>
<?php echo form_open(base_url('job/job_basicinfo_insert'), array('id' => 'jobseeker_regform', 'name' => 'jobseeker_regform', 'class' => 'clearfix')); ?>
                            <!-- <div>
                                <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div> -->

    

<?php
$fname = form_error('fname');
$lname = form_error('lname');
$email = form_error('email');
$phnno = form_error('phnno');
$language = form_error('lan');
$dob = form_error('dob');
$gender = form_error('gender');
$city1 = form_error('city1');
$pincode_error = form_error('pincode_error');

?>



                                <fieldset <?php if ($fname) { ?> class="error-msg" <?php } ?>>
                                    <label>First Name :<span class="red">*</span></label>
                                    <input type="text" tabindex="1" autofocus name="fname" id="fname" placeholder="Enter First name" style="text-transform: capitalize;" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" value="<?php if ($fname1) {
                                        echo $fname1;
                                    } else {
                                        echo $job[0]['first_name'];
                                    } ?>" maxlength="35"/> <span id="fname-error"> </span>
<?php echo form_error('fname'); ?>
                                </fieldset>

                                <fieldset <?php if ($lname) { ?> class="error-msg" <?php } ?>>  
                                    <label>Last Name :<span class="red">*</span> </label>
                                    <input type="text" name="lname" tabindex="2"  id="lname" placeholder="Enter Last name" style="text-transform: capitalize;" value="<?php if ($lname1) {
    echo $lname1;
} else {
    echo $job[0]['last_name'];
} ?>" maxlength="35"/> <span id="lname-error"> </span>
<?php echo form_error('lname'); ?>
                                </fieldset>

                                <fieldset <?php if ($email) { ?> class="error-msg" <?php } ?>>
                                    <label>Email Address :<span class="red">*</span> </label>
                                    <input type="email" name="email" id="email" tabindex="3" placeholder="Enter Email Address"  value="<?php if ($email1) {
    echo $email1;
} else {
    echo $job[0]['user_email'];
} ?>" maxlength="255"/> <span id="email-error"> </span>
                                        <?php echo form_error('email'); ?>
                                </fieldset>

                                <fieldset <?php if ($phnno) { ?> class="error-msg" <?php } ?>>
                                    <label>Phone Number :</label>
                                    <input type="text" name="phnno" id="phnno" tabindex="4" placeholder="Enter Phone Number" value="<?php if ($phnno1) {
                                            echo $phnno1;
                                        } ?>" maxlength="15" tabindex="4"/> <span id="phnno-error"> </span>
                                        <?php echo form_error('phnno'); ?>
                                </fieldset>

                               

                               
                                <fieldset <?php if ($dob) { ?> class="error-msg" <?php } ?>>
                                    <label>Date of Birth:<span class="red">*</span></label>
                                
                                 <input type="hidden" id="datepicker" tabindex="5">
                                    <!-- <input type="text" name="dob" id="datepicker" placeholder="dd-MM-yyyy" tabindex="9"  autocomplete="off" value="<?php
                                    // if($dob1){
                                       // echo date('d/m/Y',strtotime($dob1));}
                                       // else{

                                         //  echo date('d/m/Y',strtotime($job[0]['user_dob']));  } ?>" > -->


<?php echo form_error('dob'); ?>

                                </fieldset>
                               

                               
                                <fieldset class="gender-custom" <?php if ($gender) { ?> class="error-msg" <?php } ?>>
                                    <label>Gender:<span class="red">*</span></label>
                                    <input type="radio" name="gender" value="male" id="gender" tabindex="6" <?php if($gender1){if($gender1 == 'male') { echo 'checked' ; }}
                                    else { if($job[0]['user_gender'] == 'M'){ echo 'checked' ; }}
                                       
                                    ?>><span class="radio_check_text pl5">Male</span>
                                    <input type="radio" name="gender" value="female" id="gender" tabindex="7" <?php  if($gender1){if($gender1 == 'female') { echo 'checked' ; }}
                                    else { if($job[0]['user_gender'] == 'F'){echo 'checked' ; }}
                                       
                                    ?> ><span class="radio_check_text pl5">Female</span>
                                    <span id="gender-error"> </span>
<?php echo form_error('gender'); ?>
                                </fieldset>


                                 <fieldset id="erroe_nn" <?php if ($language) { ?> class="error-msg" <?php } ?>>


   
                                    <label>Languages Known:<span class="red">*</span></label> 
                                     <input id="lan" name="language"  value="<?php if($language2){echo $language2.',';} ?>" placeholder="Select a Language" style="width: 100%"  tabindex="8">


<?php echo form_error('lan'); ?>

        
                                </fieldset>

                                <fieldset id="erroe_nn" <?php if ($city) { ?> class="error-msg" <?php } ?>>

                                    <label>City:<span class="red">*</span></label> 
                                     <input id="city" name="city" value="<?php if($city_title){echo $city_title;} ?>" placeholder="Select City" style="width: 100%"  tabindex="9" maxlength="255">

<?php echo form_error('city1'); ?>
      
                                </fieldset>

                                 <fieldset <?php if ($pincode_error) { ?> class="error-msg" <?php } ?>>
                                    <label>Pincode :<span class="red">*</span></label>
                                    <input type="text" tabindex="10" name="pincode" id="pincode" placeholder="Enter Pincode" value="<?php
                                    if ($pincode1) {
                                        echo $pincode1;
                                    }
                                    ?>" maxlength="15"/> <span id="pincode-error"> </span>
                                           <?php echo form_error('pincode_error'); ?>
                                </fieldset>

                                <fieldset class="full-width">
                                    <label>Postal Address: <span class="red">*</span> </label>

                                    <textarea name ="address" tabindex="11" id="address" rows="4" cols="50" placeholder="Enter Address" maxlength="4000" style="resize: none;" onpaste="OnPaste_StripFormatting(this, event);"><?php
                                        if ($address1) {
                                            echo $address1;
                                        }
                                        ?></textarea>
                                    <?php echo form_error('address'); ?>
                                </fieldset>



 <!-- <div> <span class="" >( <span class="red">*</span> ) Indicates required field</span></div> -->
                                <fieldset class="hs-submit full-width">
                                    

                              <!--<input type="reset">-->
                                    <input type="submit"  id="next" name="next" value="Save" tabindex="12">


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


</body>
</html>

<!-- Calender JS Start-->

<!-- <script src="<?php//echo base_url('js/jquery.js'); ?>"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

 -->





 <!-- <script src="<?php //echo base_url('js/jquery.wallform.js'); ?>"></script>
 <script src="<?php //echo base_url('js/jquery-ui.min.js'); ?>"></script> -->
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
 <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
 


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
     
       var searchkeyword = $.trim(document.getElementById('tags').value);
       var searchplace = $.trim(document.getElementById('searchplace').value);
   
       if (searchkeyword == "" && searchplace == "") {
           return false;
       }
   }
   
</script>

<script>
   var data = <?php echo json_encode($demo); ?>;
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
               $("#tags1").val(ui.item.label);
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
   
</script>
<script>
   // var data1= <?php //echo json_encode($city_data); ?>;
   // //alert(data);
   
           
   // $(function() {
   //     // alert('hi');
   // $( "#searchplace1" ).autocomplete({
   //      source: function( request, response ) {
   //          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
   //          response( $.grep( data1, function( item ){
   //              return matcher.test( item.label );
   //          }) );
   //    },
   //     minLength: 1,
   //     select: function(event, ui) {
   //         event.preventDefault();
   //         $("#searchplace1").val(ui.item.label);
   //         $("#selected-tag").val(ui.item.label);
   //         // window.location.href = ui.item.value;
   //     }
   //     ,
   //     focus: function(event, ui) {
   //         event.preventDefault();
   //         $("#searchplace1").val(ui.item.label);
   //     }
   // });
   // });
     
</script>

<!-- FOr city data fetch start -->
<script>
   var data1= <?php echo json_encode($city_data); ?>;
   //alert(data);
   
           
   $(function() {
       // alert('hi');
   $( "#city" ).autocomplete({
        source: function( request, response ) {
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
            response( $.grep( data1, function( item ){
                return matcher.test( item.label );
            }) );
      },
       minLength: 1,
       select: function(event, ui) {
           event.preventDefault();
           $("#city").val(ui.item.label);
           $("#selected-tag").val(ui.item.label);
           // window.location.href = ui.item.value;
       }
       ,
       focus: function(event, ui) {
           event.preventDefault();
           $("#city").val(ui.item.label);
       }
   });
   });
     
</script>
<!-- FOr city data fetch End -->

<!--new script for language start-->
 <script>
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }
        
        $( "#lan" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON("<?php echo base_url();?>general/get_language", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 10) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( ", " );
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
</script>
<!--new script for language end-->
<script type="text/javascript">
                        function check() {
                            var keyword = $.trim(document.getElementById('tags1').value);
                            var place = $.trim(document.getElementById('searchplace1').value);
                            if (keyword == "" && place == "") {
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

</script> -->


<!-- Field Validation Js Start -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>




<!-- javascript validation start -->
<script type="text/javascript">

    $(document).ready(function () {

 // jQuery.validator.addMethod("noSpace", function(value, element) { 
 //      return value == '' || value.trim().length != 0;  
 //    }, "No space please and don't leave it empty");


$.validator.addMethod("lowercase", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Email Should be in Small Character");

$.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
}, "Number, space and special character are not allowed");

$.validator.addMethod("regx2", function(value, element, regexpr) {          
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
},"character & letters are not allow & space are not allow in the begining");
// for date validtaion start

jQuery.validator.addMethod("isValid", function (value, element) {

var todaydate = new Date();
var dd = todaydate.getDate();
var mm = todaydate.getMonth()+1; //January is 0!
var yyyy = todaydate.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

   var todaydate = yyyy+'-'+mm+'-'+dd;

    var one = new Date(value).getTime();
    var second = new Date(todaydate).getTime();
   
    $('.day').addClass('error'); 
      $('.month').addClass('error'); 
      $('.year').addClass('error'); 

    return one <= second;
}, "Last date should be Less than Or equal to today date");

$.validator.addMethod("required1", function(value, element, regexpr) {   
    //return value == '' || value.trim().length != 0; 
     if(!value) 
            {
                $('.day').addClass('error'); 
                $('.month').addClass('error'); 
                $('.year').addClass('error'); 
                return false;
            }
            else
            {
              return true;
            }
           
     // return regexpr.test(value);
}, "Date of Birth Is Required.");

//date validation end


//PHONE NUMBER VALIDATION FUNCTION START  
   $.validator.addMethod("matches", function(value, element, regexpr) {          
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
   }, "Phone number is not in proper format");
//PHONE NUMBER VALIDATION FUNCTION END

        $("#jobseeker_regform").validate({

            ignore: ".language",
            rules: {

                fname: {

                    required: true,
                   regx2:/^[^-\s][a-zA-Z_\s-,.']+$/,
                    //noSpace: true

                },

                lname: {

                    required: true,
                    regx2:/^[^-\s][a-zA-Z_\s-,.']+$/,
                    //noSpace: true

                },

                email: {

                    required: true,
                    email: true,
                    lowercase: /^[0-9a-z\s\r\n@!#\$\^%&*()+=_\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/,
                    remote: {
                        url: "<?php echo site_url() . 'job/check_email' ?>",
                        type: "post",
                        data: {
                            email: function () {

                                return $("#email").val();
                            },
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                        },
                    },
                },

                phnno: {

                           // number: true,
                           minlength: 8,
                           maxlength:15,
                           matches: /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/,   
                            
                            
                        },
                        
               
                language: {

                    required: true,

                },
                 city: {

                    required: true,

                },
                 pincode: {

                    required: true,

                },
                 address: {

                    required: true,

                },
                dob: {

                   required1:"Date of Birth Is Required.",
                    isValid: 'Last date should be Less than Or equal to today date',
                },
                gender: {

                    required: true,

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

                    required: "Email Address Is Required.",
                    email: "Please Enter Valid Email Id.",
                    remote: "Email already exists"
                },
                phnno:{
                             required:"Phone Number Is Required.",
                    },

              
               
                language: {

                    required: "Language  Is Required.",

                },
                 city: {

                    required: "City  Is Required.",

                },
                 pincode: {

                    required: "Pincode  Is Required.",

                },
                 address: {

                    required: "Address  Is Required.",

                },
                dob: {

                  //  required: "Date of Birth Is Required.",

                },
                gender: {

                    required: "Gender Is Required.",

                },

            },

        });
    });
</script>
<!-- javascript validation End -->

<!-- script for Language textbox automatic end (option 2)-->

<!-- <script>

   

</script> -->
<!-- script for Language textbox automatic end (option 2)-->
<script type="text/javascript">
    $(".alert").delay(3200).fadeOut(300);
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
  $('#preloader').fadeOut('slow',function(){$(this).remove();});
});
   

});
</script>


<script src="<?php echo base_url('js/jquery.date-dropdowns.js'); ?>"></script>
<script>
$(function() {
   
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

var today = yyyy;

var date_picker ='<?php echo date('Y-m-d',strtotime($job[0]['user_dob']));?>';
var  date_picker_edit='<?php echo date('Y-m-d',strtotime($dob1));?>';


if(date_picker_edit != "1970-01-01" && date_picker_edit != "-0001-11-30"){
     $("#datepicker").dateDropdowns({
                    submitFieldName: 'dob',
                    submitFormat: "yyyy-mm-dd",
                    minYear: 1821,
                    maxYear: today,
                    defaultDate: date_picker_edit,
                    daySuffixes: false,
                    monthFormat: "short",
                    dayLabel: 'DD',
                    monthLabel: 'MM',
                    yearLabel: 'YYYY',
                    //startDate: today,
 
                });   
}
else
{ 
                 $("#datepicker").dateDropdowns({
                    submitFieldName: 'dob',
                    submitFormat: "yyyy-mm-dd",
                    minYear: 1821,
                    maxYear: today,
                    defaultDate: date_picker,
                    daySuffixes: false,
                    monthFormat: "short",
                    dayLabel: 'DD',
                    monthLabel: 'MM',
                    yearLabel: 'YYYY',
                    //startDate: today,
 
                });   
}

// if(date_picker_edit=="1970-01-01"){
 
//      $("#datepicker").dateDropdowns({
//                     submitFieldName: 'dob',
//                     submitFormat: "yyyy-mm-dd",
//                     minYear: 1821,
//                     maxYear: today,
//                     defaultDate: date_picker,
//                     daySuffixes: false,
//                     monthFormat: "short",
//                     dayLabel: 'DD',
//                     monthLabel: 'MM',
//                     yearLabel: 'YYYY',
//                     //startDate: today,
 
//                 });   
// }
// else if(date_picker=="1970-01-01"){

//                 $("#datepicker").dateDropdowns({
//                     submitFieldName: 'dob',
//                     submitFormat: "yyyy-mm-dd",
//                     minYear: 1821,
//                     maxYear: today,
//                     defaultDate: date_picker_edit,
//                     daySuffixes: false,
//                     monthFormat: "short",
//                     dayLabel: 'DD',
//                     monthLabel: 'MM',
//                     yearLabel: 'YYYY',
//                     //startDate: today,

//                 });   
// }else if(!date_picker){

//                 $("#datepicker").dateDropdowns({
//                     submitFieldName: 'dob',
//                     submitFormat: "yyyy-mm-dd",
//                     minYear: 1821,
//                     maxYear: today,
//                     daySuffixes: false,
//                     monthFormat: "short",
//                     dayLabel: 'DD',
//                     monthLabel: 'MM',
//                     yearLabel: 'YYYY',
//                     //defaultDate: date_picker
//                     //startDate: today,

//                 });  
//      } 
                
            });
			
			$(function() {
				  var input = $(".common-form input");
				var len = input.val().length;
				input[0].focus();
				input[0].setSelectionRange(len, len);
				});
</script>


<!-- THIS FUNCTION IS USED FOR PASTE SAME DESCRIPTION THAT COPIED START -->
 <script type="text/javascript">
            var _onPaste_StripFormatting_IEPaste = false;
            function OnPaste_StripFormatting(elem, e) {
               // alert(456);
                if (e.originalEvent && e.originalEvent.clipboardData && e.originalEvent.clipboardData.getData) {
                    e.preventDefault();
                    var text = e.originalEvent.clipboardData.getData('text/plain');
                    window.document.execCommand('insertText', false, text);
                } else if (e.clipboardData && e.clipboardData.getData) {
                    e.preventDefault();
                    var text = e.clipboardData.getData('text/plain');
                    window.document.execCommand('insertText', false, text);
                } else if (window.clipboardData && window.clipboardData.getData) {
                    // Stop stack overflow
                    if (!_onPaste_StripFormatting_IEPaste) {
                        _onPaste_StripFormatting_IEPaste = true;
                        e.preventDefault();
                        window.document.execCommand('ms-pasteTextOnly', false);
                    }
                    _onPaste_StripFormatting_IEPaste = false;
                }
            }
        </script>
<!-- THIS FUNCTION IS USED FOR PASTE SAME DESCRIPTION THAT COPIED END -->  

<style type="text/css">
    .date-dropdowns label{margin-top: 42px !important;}
</style>
