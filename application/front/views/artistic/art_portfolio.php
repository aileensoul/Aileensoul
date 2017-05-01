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
    <style type="text/css">
      .full-width img{display: none;}
    </style>

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
                        
                          
                             
                             <form name="artportfolio" method="post" id="artportfolio" 
                                class="clearfix" onsubmit="return  portfolio_form_submit()"
                             action="<?php echo base_url('artistic/art_portfolio_insert'); ?>" enctype="multipart/form-data" >

                                <?php
                                 $artportfolio =  form_error('artportfolio');
                                ?>

                                
                       <input  type="file" name="bestofmine" id="bestofmine" style="display:block;display:none;"/>

                      

 <label for="bestofmine" style="cursor: pointer;"><i class="fa fa-plus action-buttons btn-group" aria-hidden="true" style=" margin: 8px; cursor:pointer ; color: #fff;"> </i> Attachment</label> 
 

 <span id ="filename" style="color: #8c8c8c; font-size: 17px; padding-left: 10px;visibility:show;"><?php echo $userdata[0]['art_bestofmine']; ?></span><span class="file_name"></span>
 
 <div class="bestofmine_image" style="color:#f00; display: block;"></div>
           
                        <?php if($userdata[0]['art_bestofmine']){?>
                              <div style="visibility:show;" id ="pdffile">
                              <a href="<?php echo base_url('artistic/creat_pdf1/'.$userdata[0]['art_id']) ?>"><i class="fa fa-file-pdf-o fa-2x" style="color: red; padding-left: 8px; padding-top: 10px; padding-bottom: 10px; position: relative;" aria-hidden="true"></i></a>

                              <a style="position: absolute; cursor:pointer;" onclick="delpdf();"><i class="fa fa-times" aria-hidden="true"></i></a>

                              </div>
                              <?php }?>

                              <input type="hidden" name="bestmine" id="bestmine" value="<?php echo $bestofmine1; ?>"><span id="bestofmine-error"></span>


                                <fieldset class="full-width">
                                 
                                     <textarea name ="artportfolio" id="artportfolio" rows="4" cols="50" placeholder="Enter Portfolio Detail" style="resize: none;"><?php if($address1){ echo $address1; } ?></textarea>
                                         <?php echo form_error('artportfolio'); ?>
                                 
                                </fieldset>
                                
                                

                                 <fieldset class="hs-submit full-width">
                                   
                                    
                                    <input type="submit"  id="submit" name="submit" value="submit"  onclick="portfolio_valid();">
                                   
                                    
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
    <!-- footer end -->


    


<!-- only pdf insert script strat -->
<script type="text/javascript">
  function portfolio_form_submit(){
    var bestofmine = document.getElementById("bestofmine").value;
    
    if(bestofmine == ''){
      //$(".bestofmine_image").html("Please select at lease one file.");
        //return false;
        document.getElementById("artportfolio").submit();
    }
    else{
      var bestofmine_ext = bestofmine.split('.').pop();
      var allowespdf = ['pdf'];
      var foundPresentpdf = $.inArray(bestofmine_ext, allowespdf) > -1;

      if(foundPresentpdf == true)
      {
         document.getElementById("artportfolio").submit();
     }
     else{
        $(".bestofmine_image").html("Please select only pdf file.");
        return false;
     }
    }
    return false;
  }

</script>

<script type="text/javascript">
  function delpdf(){
     $.ajax({ 
        type:'POST',
        url:'<?php echo base_url() . "artistic/deletepdf" ?>',
        success:function(data){ 
          // alert(data);
          // return false;
       //document.getElementById('filename').style.visiblity="hidden";
    //   document.getElementById("pdffile").style.visibility = "hidden";
        $("#filename").text('');
        $("#pdffile").hide();

          }
            }); 
  }
  </script>

<script type="text/javascript">


document.getElementById('bestofmine').onchange = uploadOnChange;
    
function uploadOnChange() {
    var filename = null;
    var filename = this.value;
     var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    } 
    
    //document.getElementById('filename').value = filename;
  //document.getElementById('filename').style.visiblity='display';
  $("#filename").text(filename);
  //$("#filename").text(filename);

   }
</script>