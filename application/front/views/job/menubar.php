<!-- menubar -->
                          <div class="profile-main-rec-box-menu  col-md-12 ">

<div class="left-side-menu col-md-2">  </div>
<div class="right-side-menu col-md-8">  
    <ul class="">
                                <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_printpreview'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_printpreview'); ?>"> Details</a>
                                    </li>
 <?php
                                    if(($this->uri->segment(1) == 'job') && ($this->uri->segment(2) == 'job_all_post' || $this->uri->segment(2) == 'job_printpreview' || $this->uri->segment(2) == 'job_resume' || $this->uri->segment(2) == 'job_save_post' || $this->uri->segment(2) == 'job_applied_post') && ($this->uri->segment(3) == $this->session->userdata('aileenuser')|| $this->uri->segment(3) == '')) { ?>

                                    <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_resume'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_resume'); ?>">Resume</a>
                                    </li>

                                     <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_save_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_save_post'); ?>">Saved </a>
                                    </li>

                                    <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_applied_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_applied_post'); ?>">Applied </a>
                                    </li>

                                    <?php }?>

      
</ul>
</div>

       <div class="col-md-2">
                <div class="flw_msg_btn fr">
                    <ul>

                        <!-- <li class="fruser2">

                                <div id="unfollowdiv">
                                    <a id="unfollow2" onclick="unfollowuser(2)"> Following</a>
                                </div>
                        </li> -->
                        <li>
                            <a href="http://35.165.1.109:81/chat/abc/4">Message</a></li>

                    </ul>
                </div>
            </div>
        <!-- <div class="col-md-3">

        </div> -->
</div>