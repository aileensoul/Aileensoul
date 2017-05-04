<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->

   

<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
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
							<li><a href="<?php echo base_url('freelancer_hire/freelancer_hire_basic_info'); ?>">Basic Information</a></li>

                                <li><a href="<?php echo base_url('freelancer_hire/freelancer_hire_address_info'); ?>">Address Information</a></li>

								<li <?php if($this->uri->segment(1) == 'freelancer_hire'){?> class="active" <?php } ?>><a href="#">Professional Information</a></li>

                                
								
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
							<h3>Proessional Information</h3>
							<?php echo form_open_multipart(base_url('freelancer_hire/freelancer_hire_professional_info_insert'), array('id' => 'professional_info','name' => 'professional_info','class' => 'clearfix')); ?>

                     <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>


                     	 <?php
                         $professional_info =  form_error('professional_info');
                         ?>  
								
                            	<fieldset class="full-width">
									<label>Professional Info:<span style="color:red">*</span></label>
									
									<textarea name ="professional_info" id="professional_info" rows="6" cols="50" placeholder="Enter Professional Information" style="resize: none;overflow: auto;"><?php if($professional_info1){ echo $professional_info1; } ?></textarea>
									 <?php echo form_error('professional_info'); ?> 
									 
								</fieldset>
								<fieldset class="hs-submit full-width">
                                    

                                    
                                    <input type="submit"  id="next" name="next" value="Submit">
                                   
                                   
                                </fieldset>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
<!-- pallavi 15-4 -->

<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#professional_info").validate({

                    rules: {

                        professional_info: {

                            required: true,
                           
                        },

                    },

                    messages: {

                        professional_info: {

                            required: "Professional Information Is Required.",
                            
                        },
                    },

                });
                   });
  </script>
