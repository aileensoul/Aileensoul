<!--post save success pop up style strat -->
<style type="text/css">
  .dropdown-content_hover {
    display: none;
    position: absolute;
    color: #3b5283;
    background-color: #fff;
    min-width: 139px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-top: 3px;
    z-index: 1;
    left: 26px;
    border-radius: 4px;
} .dropdown-content_hover::before {
    /* top: -1px; */
    content: '';
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    color: transparent;
    border: 9px solid black;
    border-color: transparent transparent #fff;
    margin-top: -18px;
    /* margin-left: 104px; */
    right: 10px;
</style>

<!--post save success pop up style end -->


<header>
    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                      
                    <?php echo $freelancer_post_search; ?>
                  <div class="col-md-5 col-sm-5">
                       <div class=" ">
                            <ul class="">
                               
                                  
      <li <?php if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_apply_post')){?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_apply_post'); ?>">Home</a>
                                    </li>

                                <!-- Friend Request Start-->

                              <li>
  


<div class="dropdown_hover">
  <span id="art_profile" style="font-size: 13px;">Freelancer Profile <i class="fa fa-angle-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
    <a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
    <a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
    <a href="#popup2"><i class="fa fa-minus-circle" aria-hidden="true"></i> Deactive Profile</a>
  </div>
</div>
                              </li>
                                <!-- Friend Request End-->

                                <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </div> 
                    </div>
                  
                   
                </div>
            </div>
        </div>
       </div> 
    </header>



<!-- pop up box start-->
<div id="popup2" class="overlay">
  <div class="popup">
    
    <div class="pop_content">
      Are You Sure want to deactivate your Freelancer_post_profile?.

      <p class="okk"><a class="okbtnpop" id="<?php echo $row['business_profile_post_id']; ?>" href="<?php echo base_url('freelancer/deactivate/'.$this->session->userdata('aileenuser')); ?>">OK</a></p>

      <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>

    </div>

  </div>
</div>
<!-- pop up box end-->


    <script type="text/javascript">
  

$(document).ready(function(){
    $('.dropdown_hover').click(function(event){
        event.stopPropagation();
         $(".dropdown-content_hover").slideToggle("fast");
    });
    $(".dropdown-content_hover").on("dropdown_hover", function (event) {
        event.stopPropagation();
    });
});

$(document).on("dropdown_hover", function () {
    $(".dropdown-content_hover").hide();
});

$(document).ready(function() {
     $("body").click(function(event) {
        $(".dropdown-content_hover").hide();
        event.stopPropagation();
    });
 
});
</script>