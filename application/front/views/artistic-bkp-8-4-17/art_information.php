
<?php  echo $head; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/3.3.0/select2.css'); ?>">
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


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

                                <li <?php if($this->uri->segment(1) == 'artistic'){?> class="active" <?php } ?>><a href="#">Art information</a></li>

                                <li class="<?php if($artdata[0]['art_step'] < '3'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_portfolio'); ?>">Portfolio</a></li>

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
                            Art information
                        </h3>
                        
                            <?php echo form_open(base_url('artistic/art_information_insert'), array('id' => 'artinfo','name' => 'artinfo','class' => 'clearfix')); ?>
                             <div><span style="color:red">Fields marked with asterisk (*) are mandatory</span></div>

                                <?php
                                 $artname =  form_error('artname');
                                 $skills =  form_error('skills');
                                 $desc_art =  form_error('desc_art');
                                  
                                 ?>


                                    <fieldset <?php if($skills) {  ?> class="error-msg" <?php } ?> >
                                        <label>keyskills<span style="color:red">*</span></label>
                                       
                                          <select name="skills[]" id ="skils" class="keyskil" multiple="multiple" style="width:300px">
                                       <?php foreach ($skill as $ski) { ?>
                                      <option value="<?php echo $ski['skill_id']; ?>"><?php echo $ski['skill']; ?></option>
                                    <?php } ?>
                                      </select>

                                        <?php echo form_error('skills'); ?>
                                    </fieldset>


                        <fieldset class="full-width">
                                <label>Other skill:</label>
                                <input type="text" class="keyskil" name="other_skill" id="other_skill" placeholder="Enter Other Skill" value="<?php if($otherskill1){ echo $otherskill1; }?>"> 
                                <?php echo form_error('other_skill'); ?>
                                </fieldset>


                                <fieldset <?php if($artname) {  ?> class="error-msg" <?php } ?>>
                                    <label>Speciality:<span style="color:red">*</span></label>
                                    <input name="artname" type="text" id="artname" placeholder="Enter Speciality" value="<?php if($artname1){ echo $artname1; } ?>"/><span id="artname-error"></span>
                                     <?php echo form_error('artname'); ?>
                                </fieldset>
                               

                               

                                <fieldset  <?php if($desc_art) {  ?> class="error-msg" <?php } ?> class="full-width">
                                    <label>Description of your art:<span style="color:red">*</span></label>

                                 <textarea name ="desc_art" id="desc_art" rows="4" cols="50" placeholder="Enter Description of Your Art" style="resize: none;"><?php if($desc_art1){ echo $desc_art1; } ?></textarea>
                                   
                                  <?php echo form_error('desc_art'); ?><br/> 
                                </fieldset>
                               

                                <fieldset class="full-width">
                                    <label>How You are Inspire:</label>
                                
                                    <input name="inspire"  type="text" id="inspire" placeholder="Enter Inspire" value="<?php if($inspire1){ echo $inspire1; } ?>"/><span ></span>
                                 
                                </fieldset>

                                 <fieldset class="hs-submit full-width">
                                   
                                     <input type="reset">
                                    <a href="<?php echo base_url('artistic/art_address'); ?>">Previous</a>
                                    
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
    <footer>
        
        <?php echo $footer;  ?>
    </footer>
    
</body>
</html>

  <script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>

  

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate1.15.0..min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/additional-methods1.15.0.min.js'); ?>"></script>

<!-- script for select2 box Script start-->
<script type="text/javascript" src="<?php echo base_url('js/3.3.0/select2.js'); ?>"></script>



  
<!-- script for select2 box Script End-->

<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#artinfo").validate({ 
  
                  ignore: '*:not([name])',
                    rules: {

                        artname: {

                            required: true,
                         
                        },

                        'skills[]': {
                            
                          require_from_group: [1, ".keyskil"] 
                           
                        }, 
                        other_skill: {
                            
                           require_from_group: [1, ".keyskil"]
                            
                        },
                       desc_art: {

                            required: true,
                            
                        },
                        
                    },

                    messages: {

                        artname: {

                            required: "Speciality Is Required.",
                            
                        },

                        'skills[]': {

                            require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'",

                        },

                        other_skill: {

                            require_from_group: "You must either fill out 'Keyskills' or 'Other Skills'",
                        },
                        desc_art: {

                            required: "Description of your Art Is Required.",
                            
                        },
                       
                },

                });
                   });

    
  </script>

<script>

var complex = <?php echo json_encode($selectdata); ?>;


$("#skils").select2().select2('val',complex)

</script>
<!-- edit time skill fetch end-->

    <!-- footer end-->

   