



  <header>
    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">

                   <?php echo $business_search; ?>
                  <div class="col-md-5 col-sm-5">
                       <div class="">
                            <ul class="">
                              <li <?php if($this->uri->segment(1) == 'business_profile' && $this->uri->segment(2) == 'business_profile_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('business_profile/business_profile_post'); ?>">Home</a>
                                    </li>
                                <!-- Friend Request Start-->

                                          
                              <li>
 

<div class="dropdown_hover">
  <span id="art_profile" style="font-size: 13px;">Business Profile <i class="fa fa-angle-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
    <a href="<?php echo base_url('business_profile/business_resume/'.$businessdata[0]['business_slug']); ?>"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a> 
      <a href="<?php echo base_url('business_profile/business_information_update'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>

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
       </div> 
    </header>


    <!-- pop up box start-->
<div id="popup2" class="overlay">
  <div class="popup">
    
    <div class="pop_content">
      Are You Sure want to deactivate your business_profile?.

      <p class="okk"><a class="okbtnpop" id="<?php echo $row['business_profile_post_id']; ?>" href="<?php echo base_url('business_profile/deactivate/'.$this->session->userdata('aileenuser')); ?>">OK</a></p>

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