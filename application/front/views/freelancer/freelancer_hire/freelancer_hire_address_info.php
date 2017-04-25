
<!-- HEAD Start -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->

   

<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<!-- pallavi code start 15-4 -->
<?php if ($freehiredata[0]['user_id'] && $freehiredata[0]['free_hire_step'] == '3'){ 
     echo $freelancer_hire_header2; } ?> 
     <!-- pallavi code end 15-4 -->

<body>
	
		
	
	<section>
		    
		<div class="user-midd-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="left-side-bar">
							<ul>
							<li> <a href="<?php echo base_url('freelancer_hire/freelancer_hire_basic_info'); ?>">Basic Information</a></li>

                                <li <?php if($this->uri->segment(1) == 'freelancer_hire'){?> class="active" <?php } ?>><a href="#">Address Information</a></li>

								<li class="<?php if($freehiredata[0]['free_hire_step'] < '2'){echo "khyati";}?>"><a href="<?php echo base_url('freelancer_hire/freelancer_hire_professional_info'); ?>">Professional Information</a></li>

                                
								
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
                                        }?>
                    </div>

						<div class="common-form">
							<h3>Address Information</h3>
                           
                            	<?php echo form_open_multipart(base_url('freelancer_hire/freelancer_hire_address_info_insert'), array('id' => 'address_info','name' => 'address_info','class' => 'clearfix')); ?>

                      <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>

                      <?php
                         $country =  form_error('country');
                         $state =  form_error('state');
                         
                         $address =  form_error('address'); 

                         ?>
								
                                 <fieldset <?php if($country) {  ?> class="error-msg" <?php } ?>>
									<label>Country:<span style="color:red">*</span></label>
									 <select name="country" id="country">
    							<option value="">Select Country</option>
    							<?php
                                            if(count($countries) > 0){
                                                foreach($countries as $cnt){
                                          
                                            if($country1)
                                            {
                                              ?>
                                                 <option value="<?php echo $cnt['country_id']; ?>" <?php if($cnt['country_id']==$country1) echo 'selected';?>><?php echo $cnt['country_name'];?></option>
                                               
                                                <?php
                                                }
                                                else
                                                {
                                            ?>
                                                 <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name'];?></option>
                                                  <?php
                                            
                                            }
       
                                            }}
                                            ?>
							</select>
                            <?php echo form_error('country'); ?>
							    </fieldset>
							     

							    <fieldset <?php if($state) {  ?> class="error-msg" <?php } ?>>
									<label>State:<span style="color:red">*</span></label>
									 <select name="state" id="state">
    							<?php
                                          if($state1)

                                            {
                                            foreach($states as $cnt){
                                                
                                                 
                                              ?>

                                                 <option value="<?php echo $cnt['state_id']; ?>" <?php if($cnt['state_id']==$state1) echo 'selected';?>><?php echo $cnt['state_name'];?></option>
                                               
                                                <?php
                                                } }
                                              
                                                else
                                                {
                                            ?>
                                                 <option value="">Select country first</option>
                                                  <?php
                                            
                                            }
                                            ?>
								</select>
                                <?php echo form_error('state'); ?>
							    </fieldset>
							     

								
                                <fieldset>
									<label>City:</label>
									<select name="city" id="city">
    								<?php

                                        if($city1)

                                            {
                                          foreach($cities as $cnt){
                                                
                                                
                                                 
                                              ?>

                                               <option value="<?php echo $cnt['city_id']; ?>" <?php if($cnt['city_id']==$city1) echo 'selected';?>><?php echo $cnt['city_name'];?></option>

                                                <?php
                                                } }
                                              
                                                else
                                                {
                                            ?>
                                        <option value="">Select state first</option>

                                         <?php
                                            
                                            }
                                            ?>
									</select>
								</fieldset>
								 <?php  ?>

                                <fieldset>
									<label>Pincode:</span></label>
									<input type="text" name="pincode" id="pincode" placeholder="Enter Pincode"  value="<?php if($pincode1){ echo $pincode1; } ?>">
								</fieldset>
								 <?php  ?>

								
								<fieldset class="full-width">
									<label>Postal Address:<span style="color:red">*</span></label>
									 <textarea name="address" id="address" placeholder="Enter Address" rows="5" cols="40" style="resize:none"/><?php if($address1){ echo $address1; } ?></textarea>
                                     <?php echo form_error('address'); ?>
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


	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){ 
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "freelancer_hire/ajax_data"; ?>',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "freelancer_hire/ajax_data"; ?>',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>

	<footer>
		
		<?php echo $footer;  ?>
	</footer>
</body>
</html>


<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- pallavi code start 15-4 -->
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


<!-- pallavi code end 15-4 -->

<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#address_info").validate({

                    rules: {

                        country: {

                            required: true,
                           
                        },

                         state: {

                            required: true,
                           
                        },
                       
                     
                       address: {

                            required: true,
                           
                        },
                        pincode: {
                             number: true,
                        }
                    },

                    messages: {

                        country: {

                            required: "Country Is Required.",
                            
                        },

                        state: {

                            required: "State Is Required.",
                            
                        },

                       
                        address: {

                            required: "Address Is Required.",
                            
                        },
                        
                    },

                });
                   });
  </script>
    