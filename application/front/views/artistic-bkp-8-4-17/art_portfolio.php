<!--start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
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

                                <fieldset>
                                    <label>Best of mine:</label>
                                    <input type="file" name="bestofmine" id="bestofmine" placeholder="Enter Best of mine" />

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
                                    
                                </fieldset>

                                <fieldset>
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
                                  
                                </fieldset>

                                <fieldset class="full-width">
                                    <label>Tell me about yourself:</label>

                                  
                                     <textarea name ="artportfolio" id="artportfolio" rows="4" cols="50" placeholder="Enter Portfolio Detail" style="resize: none;"><?php if($address1){ echo $address1; } ?></textarea>
                                         <?php echo form_error('artportfolio'); ?>
                                 
                                </fieldset>
                                
                                

                                 <fieldset class="hs-submit full-width">
                                   
                                    <input type="reset">
                                    <a href="<?php echo base_url('artistic/art_information'); ?>">Previous</a>
                                    
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
    
</body>
</html>

  <script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

    <!-- footer end -->