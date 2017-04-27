<!--start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
    <?php echo $art_header2; ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                <li><a href="<?php echo base_url('artistic/art_basic_information_update'); ?>">Basic information</a></li>

                                <li><a href="<?php echo base_url('artistic/art_address'); ?>">Address</a></li>

                                <li><a href="<?php echo base_url('artistic/art_information'); ?>">Art information</a></li>

                                <li <?php if($this->uri->segment(1) == 'artistic'){?> class="active" <?php } ?>><a href="#">Portfolio</a></li>
  
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
                        <h3>Portfolio</h3>
                        
                           <?php echo form_open_multipart(base_url('artistic/art_portfolio_insert'), array('id' => 'artportfolio','name' => 'artportfolio','class' => 'clearfix')); ?>
                             

                                <?php
                                 $artportfolio =  form_error('artportfolio');
                                ?>
<!-- 
                                <fieldset>
                                   <!--  <label>Best of mine:</label> -->
<!--                                     <input type="file" name="bestofmine" id="bestofmine" placeholder="Enter Best of mine" />

                                    <?php
                                    if($bestofmine1 != ""){
                                    ?>

                                         <?php
                                                       $allowed =  array('gif','png','jpg');
                                                       $allowespdf = array('pdf');
                                                       $allowesvideo = array('mp4','3gp');
                                                       $allowesaudio = array('mp3');

                                                       $filename = $bestofmine1;
                                                       
                                                       $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                      

                                                       if(in_array($ext,$allowed) ) 
                                                       { 
                                                         
                                                          ?>
                                     <img src="<?php echo base_url(ARTISTICIMAGE.$bestofmine1)?>" style="width:100px;height:100px;">
                                        <?php }elseif(in_array($ext,$allowespdf))
                                                       { ?>
                                     <a href="<?php echo base_url('artistic/creat_pdf1/'.$userdata[0]['art_id']) ?>">PDF</a>
                                     <?php }
                                        elseif(in_array($ext,$allowesvideo))
                                        {  ?> 

                                        <video width="320" height="240" controls>
                                                          <source src="<?php echo base_url(ARTISTICIMAGE.$bestofmine1); ?>" type="video/mp4">
                                                          <source src="movie.ogg" type="video/ogg">
                                                          Your browser does not support the video tag.
                                                       </video>
                                                       <?php
                                                        }elseif(in_array($ext,$allowesaudio)){
                                                          ?>
                                                  <audio width="120" height="100" controls>

                                                          <source src="<?php echo base_url(ARTISTICIMAGE.$bestofmine1); ?>" type="audio/mp3">
                                                          <source src="movie.ogg" type="audio/ogg">
                                                          Your browser does not support the audio tag.
                                                      
                                                  </audio>

                                                         <?php }?>             

                                     <?php }?>
                                     
                                    <input type="hidden" name="bestmine" id="bestmine" value="<?php echo $bestofmine1; ?>"><span id="bestofmine-error"></span>
                                    
                                </fieldset> -->
 
<!--                                 <fieldset>
                                    <label>Achievement:</label>
                                    <input name="achievmeant"  type="file" id="achievmeant" placeholder="Enter Achievement" /> 

                                    <?php
                                    if($achievmeant1 != ""){
                                    ?>
                                    
                                    <?php
                                                       $allowed =  array('gif','png','jpg');
                                                       $allowespdf = array('pdf');
                                                       $allowesvideo = array('mp4','3gp');
                                                       $allowesaudio = array('mp3'); 
                                                       $filename = $achievmeant1;
                                                       
                                                       $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                      

                                                       if(in_array($ext,$allowed) ) 
                                                       { 
                                                         
                                                          ?>
                                     <img src="<?php echo base_url(ARTISTICIMAGE.$achievmeant1)?>" style="width:100px;height:100px;">
                                        <?php }elseif(in_array($ext,$allowespdf))
                                                       { ?>
                                     <a href="<?php echo base_url('artistic/creat_pdf1/'.$userdata[0]['art_id']) ?>">PDF</a>
                                     <?php }
                                        elseif(in_array($ext,$allowesvideo))
                                        {?> 

                                        <video width="320" height="240" controls>
                                                          <source src="<?php echo base_url(ARTISTICIMAGE.$achievmeant1); ?>" type="video/mp4">
                                                          <source src="movie.ogg" type="video/ogg">
                                                          Your browser does not support the video tag.
                                                       </video>
                                                       <?php
                                                        }elseif(in_array($ext,$allowesaudio)){
                                                          ?>
                                                  <audio width="120" height="100" controls>

                                                          <source src="<?php echo base_url(ARTISTICIMAGE.$achievmeant1); ?>" type="audio/mp3">
                                                          <source src="movie.ogg" type="audio/ogg">
                                                          Your browser does not support the audio tag.
                                                      
                                                  </audio>

                                                         <?php }?>   
                                    <?php }?>

                                    <input type="hidden" name="archiver" id="archiver" value="<?php echo $achievmeant1; ?>"><span id="achievmeant-error"></span>
                                  
                                </fieldset> -->
                                <div class="action-buttons btn-group ">
                                                <a href="javascript:void(0);" id="add_field1" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>
                                            <label>Attachment:</label>
                                <fieldset class="full-width">
                                    <!-- <label>Tell me about yourself:</label> -->

                                  
                                     <textarea name ="artportfolio" id="artportfolio" rows="4" cols="50" placeholder="Enter Portfolio Detail" style="resize: none;"><?php if($address1){ echo $address1; } ?></textarea>
                                         <?php echo form_error('artportfolio'); ?>
                                 
                                </fieldset>
                                
                                

                                 <fieldset class="hs-submit full-width">
                                   
                                    
                                    <input type="submit"  id="submit" name="submit" value="submit">
                                   
                                    
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
    

    <!-- Bid-modal  -->
                <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
                    <div class="modal-dialog modal-lm">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                            <div class="modal-body">
                                <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                                <span class="mes"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Model Popup Close -->

</body>
</html>

  <script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
  <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
  <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- script for skill textbox automatic end (option 2)-->
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
//select2 autocomplete start for skill
                                                $('#searchskills').select2({

                                                    placeholder: 'Find Your Skills',

                                                    ajax: {

                                                        url: "<?php echo base_url(); ?>artistic/keyskill",
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

                                                        url: "<?php echo base_url(); ?>artistic/location",
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




    <!-- footer end -->


    <!-- only pdf insert script strat -->

    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
  
function imgval(event){ 
alert("fil");

//var fileInput = document.getElementById('test-upload');

var fileInput = document.getElementById("bestmine").files;

for (var i = 0; i < fileInput.length; i++)
{
    var vname = fileInput[i].name;
    var vfirstname = fileInput[0].name;
    var ext = vfirstname.split('.').pop();
    var ext1 = vname.split('.').pop(); 
    var allowespdf = ['pdf'];


var foundPresentpdf = $.inArray(ext, allowespdf) > -1;

 
  
  if(foundPresentpdf == true)
  {

      var foundPresent1 = $.inArray(ext1, allowespdf) > -1;

      if(foundPresent1 == true && fileInput.length == 1){
       }else{
        $('.biderror .mes').html("<div class='pop_content'>sorry this is not valid file.");
          $('#bidmodal').modal('show');
         setInterval('window.location.reload()', 10000);
       event.preventDefault();
        return false;
          }   
  }

}
  }
 
</script>
<script type="text/javascript">
  
$(document).ready(function(){
  $('.modal-close').on('click',function(){
      $('.modal-post').hide();
  });
});

</script>


<!-- only pdf insert script end -->

<!-- <script type="text/javascript">

            //validation for edit email formate form

            jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
             });


            $(document).ready(function () {  

                $("#artportfolio").validate({ 

                    rules: {

                        bestmine: {

                            required: true,
                            accept: "pdf/*"
                        },

                    },

                //     messages: {

                //         bestmine: {

                //             required: "Pdf Is Required.",
                            
                //         },
                       
                // },

                });
                   });
  </script> -->