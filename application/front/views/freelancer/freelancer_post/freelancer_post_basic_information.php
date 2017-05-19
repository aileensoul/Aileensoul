

<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />


<?php if ($freepostdata[0]['user_id'] && $freepostdata[0]['free_post_step'] == '7'){ 
     echo $freelancer_post_header2; } ?>

<!-- END HEADER -->
<body>
    <section>
        <div class="user-midd-section" id="paddingtop_fixed">
          <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>
                      

<?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $freepostdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($freepostdata[0]['free_post_step'] == 7){  ?>

 <div class="col-md-6 col-sm-8"><h3>You are updating your Freelancer Profile.</h3></div>
                <?php }else{

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
                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active" <?php } ?>><a href="#">Basic Information</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Information</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Info</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">ADD Your Avability</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>		    
                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '1') {
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
                            <h3>Basic Information</h3>

<?php echo form_open(base_url('freelancer/freelancer_post_basic_information_insert'), array('id' => 'freelancer_post_basicinfo', 'name' => 'freelancer_post_basicinfo', 'class' => 'clearfix')); ?>
                            <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>

<?php
$fullname = form_error('fullname');
$lastname = form_error('lastname');
//$skypeid =  form_error('skypeid');
$email = form_error('email');
$phoneno = form_error('phoneno');
?>

                            <fieldset <?php if ($firstname) { ?> class="error-msg" <?php } ?>>
                                <label>Full name:<span style="color:red">*</span></label>
                                <input type="text" name="firstname" placeholder="Enter full name" value="<?php if ($firstname1) {
    echo $firstname1;
} else {
    echo $userdata[0]['first_name'];
} ?>">
<?php echo form_error('firstname'); ?>
                            </fieldset>

                            <fieldset <?php if ($lastname) { ?> class="error-msg" <?php } ?>>
                                <label>Last name:<span style="color:red">*</span></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Enter last name" value="<?php if ($lastname1) {
    echo $lastname1;
} else {
    echo $userdata[0]['last_name'];
} ?>">
<?php echo form_error('lastname'); ?>
                            </fieldset>

                            <fieldset <?php if ($email) { ?> class="error-msg" <?php } ?>>
                                <label>Email:<span style="color:red">*</span></label>
                                <input type="text" name="email" id="email" placeholder="Enter email address" value="<?php if ($email1) {
    echo $email1;
} else {
    echo $userdata[0]['user_email'];
} ?>">
<?php echo form_error('email'); ?>
                            </fieldset>

                            <fieldset>
                                <label>Skype id</label>
                                <input type="text" name="skypeid" placeholder="Enter skype id" value="<?php if ($skypeid1) {
    echo $skypeid1;
} ?>">
        <?php ?>
                            </fieldset>

                            <fieldset <?php if ($phoneno) { ?> class="error-msg" <?php } ?>>
                                <label>Phone number:<span style="color:red">*</span></label>
                                <input type="text" name="phoneno" id="phoneno" placeholder="Enter phone number" value="<?php if ($phoneno1) {
            echo $phoneno1;
        } ?>">
<?php echo form_error('phoneno'); ?>
                            </fieldset>

                            <fieldset class="hs-submit full-width">

                                <!--<input type="reset">-->
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

     jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");

    $(document).ready(function () {

        $("#freelancer_post_basicinfo").validate({

            rules: {

                firstname: {

                    required: true,
                    noSpace: true

                },

                lastname: {

                    required: true,
                    noSpace: true

                },

                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo site_url() . 'freelancer/check_email' ?>",
                        type: "post",
                        data: {
                            email: function () {
                                return $("#email").val();
                            },
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                        },
                    },
                },

                phoneno: {

                            number: true,
                            required: true,
                            
                        },
               

            },
            
            messages: {

                firstname: {

                    required: "First name is required.",

                },

                lastname: {

                    required: "Last name is required.",

                },

                email: {
                    required: "Email id is required.",
                    email: "Please enter valid email id.",
                    remote: "Email already exists."
                },


            },

        });
    });
</script>

<script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>
