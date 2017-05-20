<!--start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />

    <!-- start header -->
<?php echo $header; ?>
    <!-- END HEADER -->
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
    <?php if($businessdata[0]['business_step'] == 4){?>
<?php echo $business_header2; ?>
<?php }?>
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section" id="paddingtop_fixed">
             <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>
                      
 <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $busdata = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($busdata[0]['business_step'] == 4){ ?>
 <div class="col-md-6 col-sm-8"><h3>You are updating your Business Profile.</h3></div>

             <?php }else{

             ?>

                      <div class="col-md-6 col-sm-8"><h3>You are making your Business Profile.</h3></div>
<?php }?>
                      
            </div>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('business_profile/business_information_update'); ?>">Business Information</a></li> 

                                <li <?php if($this->uri->segment(1) == 'business_profile'){?> class="active" <?php } ?>><a href="#">Contact Information</a></li>

                                <li class="<?php if($businessdata[0]['business_step'] < '2'){echo "khyati";}?>"><a href="<?php echo base_url('business_profile/description'); ?>">Description</a></li>

                                <li class="<?php if($businessdata[0]['business_step'] < '2'){echo "khyati";}?>"><a href="<?php echo base_url('business_profile/image'); ?>">Images</a></li>

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
                                        }?>
                    </div>

                        <div class="common-form">
                        <h3>
                            Contact Information
                        </h3>
                        
                            <?php echo form_open(base_url('business_profile/contact_information_insert'), array('id' => 'contactinfo','name' => 'contactinfo','class' => 'clearfix')); ?>

                           <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>

                                <?php
                                     $contactname =  form_error('contactname');
                                     $contactmobile =  form_error('contactmobile');
                                     $contactemail =  form_error('email');
                                     $contactwebsite =  form_error('contactwebsite');
                                ?>

                                <fieldset <?php if($contactname) {  ?> class="error-msg" <?php } ?>>
                                    <label>Contact Person:<span style="color:red">*</span></label>
                                    <input name="contactname" type="text" id="contactname" placeholder="Enter contact Name" value="<?php if($contactname1){ echo $contactname1; } ?>"/>
                                    <?php echo form_error('contactname'); ?>
                                </fieldset>
                                

                                 <fieldset <?php if($contactmobile) {  ?> class="error-msg" <?php } ?>>
                                    <label>Contact Mobile:<span style="color:red">*</span></label>
                                    <input name="contactmobile" type="text" id="contactmobile" placeholder="Enter contact Mobile" value="<?php if($contactmobile1){ echo $contactmobile1; } ?>"/>
                                     <?php echo form_error('contactmobile'); ?> 
                                </fieldset>
                               


                                <fieldset <?php if($contactemail) {  ?> class="error-msg" <?php } ?>>
                                    <label>Contact Email:<span style="color:red">*</span></label>
                                    <input name="email" type="text" id="email" placeholder="Enter Contact Email" value="<?php if($contactemail1){ echo $contactemail1; } ?>"/>
                                    <?php echo form_error('email'); ?>
                                </fieldset>
                                

                                <fieldset>
                                    <label>Contact Website:</label>
                                    <input name="contactwebsite" type="text" id="contactwebsite" placeholder="Enter Contact website" value="<?php if($contactwebsite1){ echo $contactwebsite1; } ?>"/>
                                                                     
                                </fieldset>
                                

                                <fieldset class="hs-submit full-width">
                                   

                                     
                                    <input type="submit"  id="next" name="next" value="Next">
                                    
                                   
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
    
<?php echo $footer; ?>
     
</body>
</html>

   <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>





<!-- script for business autofill -->
<script>

var data= <?php echo json_encode($demo); ?>;
// alert(data);

        
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

<script type="text/javascript">
                        function checkvalue() {
                            //alert("hi");
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
  <!-- end of business search auto fill -->


<script>

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




<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>



<script type="text/javascript">

            //validation for edit email formate form


jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


            

            $(document).ready(function () { 

                $("#contactinfo").validate({

                    rules: {

                        contactname: {

                            required: true,
                            noSpace: true
                             
                           
                        },

                         contactmobile: {

                            required: true,
                            number: true,
                            
                           
                        },
                       email: {
                            required: true,
                            email: true,
                            remote: {
                                url: "<?php echo site_url() . 'business_profile/check_email' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                        return $("#email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                            },
                        },

                       
                    },

                    messages: {

                        contactname: {

                            required: "Company name Is Required.",
                            
                        },

                        contactmobile: {

                            required: "Mobile number Is Required.",
                            
                        },
                        email: {
                            required: "Email id is required",
                            email: "Please enter valid email id",
                            remote: "Email already exists"
                        },

                        
                    },

                });
                   });
  </script>


 
    <!-- footer end -->

    <script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>