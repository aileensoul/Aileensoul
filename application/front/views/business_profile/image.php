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

                                <li><a href="<?php echo base_url('business_profile/contact_information'); ?>">Contact Information</a></li>

                                <li><a href="<?php echo base_url('business_profile/description'); ?>">Description</a></li>

                                <li <?php if($this->uri->segment(1) == 'business_profile'){?> class="active" <?php } ?>><a href="#">Images</a></li>

                               
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
                            <h3>Images</h3>
                        
                            <?php echo form_open_multipart(base_url('business_profile/image_insert'), array('id' => 'businessimage','name' => 'businessimage','class' => 'clearfix')); ?>
                           

                                <fieldset class="full-width">
                                    <label>Images:</label>
                                    <input type="file"  name="image1[]" id="image1" multiple/> 

                                    <?php if(count($busimage) > 0){
                                        $y = 0;
                                        foreach($busimage as $image){ 
                                          $y = $y +1;?>
                                    <div class="job_work_edit_<?php echo $image['image_id']?>">
                                            <input type="hidden" name="filedata[]" id="filename" value="old">
                                            <input type="hidden" name="filename[]" id="filename" value="<?php echo $image['image_name']; ?>">
                                            <input type="hidden" name="imageid[]" id="filename" value="<?php echo $image['image_id']; ?>">
                                            <img src="<?php echo base_url(BUSINESSPROFILEIMAGE.$image['image_name'])?>" style="width:100px;height:100px;">
                                            <br/><br/>
                                            
                                             <?php if ($y != 1) {
                                                                    ?>
                                                                    <div style="float: left;">
                                                                        <div class="hs-submit full-width fl">
                                                                            <input type="button" value="Delete" onclick="delete_job_exp(<?php echo $image['image_id']; ?>);">
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                              </div>
                                        <?php }} ?>
                                           
                                             
                                   
                                </fieldset>
                                
                               <fieldset class="hs-submit full-width">
                                   

                                   
                                    <input type="submit"  id="submit" name="submit" value="Submit">
                                   
                                    
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
        
        <?php echo $footer;  ?>
    </footer>
    
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

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


<script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>

<script type="text/javascript">
                        function delete_job_exp(grade_id) {
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() . "business_profile/bus_img_delete" ?>',
                                data: 'grade_id=' + grade_id,
                                // dataType: "html",
                                success: function (data) {
                                    if (data == 'ok') {
                                        $('.job_work_edit_' + grade_id).remove();
                                    }
                                }
                            });
                        }
                    </script>
    <!-- footer end -->