<!-- HEAD Start -->

<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />

<?php if ($freepostdata[0]['user_id'] && $freepostdata[0]['free_post_step'] == '7'){ 
     echo $freelancer_post_header2;; } ?>

<body>
    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>
                     <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $freepostdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($freepostdata[0]['free_post_step'] == 7){ }else{

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
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Basic Info</a></li> 

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Info</a></li>

                                <li><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Info</a></li>

                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active" <?php } ?>><a href="#">Rate</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '4') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">ADD Your Avability</a></li>

                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '4') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>		    
                                <li class="<?php if ($freepostdata[0]['free_post_step'] < '4') {
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
                            <h3>Rate</h3>
<?php echo form_open(base_url('freelancer/freelancer_post_rate_insert'), array('id' => 'freelancer_post_rate', 'name' => 'freelancer_post_rate', 'class' => 'clearfix')); ?>


                                <?php
                                $hourly = form_error('hourly');
                                ?>

                            <fieldset <?php if ($hourly) { ?> class="error-msg" <?php } ?>>
                                <label>Hourly:</label>
                                <input type="text" name="hourly" placeholder="Enter hourly Rate"  value="<?php if ($hourly1) {
                                    echo $hourly1;
                                } ?>">
                                    <?php echo form_error('hourly'); ?>
                            </fieldset>

                            <fieldset>
                                <label>Currency:</label>
                                <select name="state">
                                    <option value="" selected option disabled>Select your currency</option>

                                    <?php
                                    if (count($currency) > 0) {
                                        foreach ($currency as $cnt) {
                                            if ($currency1) {
                                                ?>
                                                <option value="<?php echo $cnt['currency_id']; ?>" <?php if ($cnt['currency_id'] == $currency1) echo 'selected'; ?>><?php echo $cnt['currency_name']; ?></option>

                                                <?php
                                            }

                                            else {
                                                ?>
                                                <option value="<?php echo $cnt['currency_id']; ?>"><?php echo $cnt['currency_name']; ?></option>
        <?php }
    }
}
?>
                                </select> 
                                <?php ?>
                            </fieldset>

                            <fieldset>
                                <?php
                                if ($fixed_rate1 == 1) {
                                    ?>

                                    <input type="checkbox" name="fixed_rate" value="1" checked> Work On Fixed Rate<br>
                                    <?php
                                } else {
                                    ?>
                                    <input type="checkbox" name="fixed_rate" value="1"> Also Work On Fixed Rate<br>
    <?php
}
?>
                            </fieldset>


                            <fieldset class="hs-submit full-width">


<!--                                <input type="reset">
                                <a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Previous</a>-->

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

    $(document).ready(function () {

        $("#freelancer_post_rate").validate({

            rules: {

                hourly: {

                    number: true,

                },

            },

            messages: {

            },

        });
    });
</script>

<script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>
