<!-- Head start -->
<?php  echo $head; ?>
    <!-- END HEAD -->

    <!-- start header -->

<?php echo $header; ?>
    <?php echo $freelancer_post_header2; ?>
<!-- End Header-->

<style type="text/css">
   /* img{display: none;}*/
</style>


<body>
    
    <section>
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul>

                            <li><a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>">Basic Info</a></li>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Info</a></li>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Info</a></li>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">ADD Your Avability</a></li>
                                <li><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>           
                                <li <?php if($this->uri->segment(1) == 'freelancer'){?> class="active" <?php } ?>><a href="#">Portfolio</a></li>
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
                            <h3>Portfolio</h3>
                            <?php echo form_open_multipart(base_url('freelancer/freelancer_post_portfolio_insert'), array('id' => 'freelancer_post_portfolio','name' => 'freelancer_post_portfolio','class' => 'clearfix')); ?>
 <!-- <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>
 -->

                           

                         <fieldset> 
                                        <label>Attachment</label>
                                         <input type="file" name="portfolio_attachment" id="portfolio_attachment1" class="portfolio_attachment" placeholder="PORTFOLIO ATTACHMENT" multiple="" />&nbsp;&nbsp;&nbsp; 

                                         <?php 

                                         if($portfolio_attachment1)
                                         {
                                          ?>
                                       
                                      <img src="<?php echo base_url(FREELANCERPORTFOLIOIMG.$portfolio_attachment1)?>" style="width:100px;height:100px;display: block;">
                                  
                                      <?php 
                                    }
                                    ?>
                            <input type="hidden" name="image_hidden_portfolio" value="<?php if($portfolio_attachment1){ echo $portfolio_attachment1; } ?>">

                                </fieldset>   

                            <fieldset class="full-width">
                            <label>Description:</label>
                                <textarea name ="portfolio" id="portfolio" rows="4" cols="50" placeholder="Enter description" style="resize: none;"><?php if($portfolio1){ echo $portfolio1; } ?></textarea>
                                <?php echo form_error('portfolio'); ?> 
                            </fieldset>

                                <fieldset class="hs-submit full-width">
                                    
<!--                                    <input type="reset">
 <a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>">Previous</a>-->
                                    <input type="submit"  id="submit" name="submit" value="Submit">
                                    
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


 