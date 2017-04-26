<!--post save success pop up style strat -->
<style>
body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}



.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.3);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
  z-index: 10;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    height: 200px;
    position: relative;
    transition: all 5s ease-in-out;
}

.okk{
  text-align: center;
}

.popup .okbtnpop {
  position: absolute;
    transition: all 200ms;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    padding: 8px 18px;
    background-color: darkcyan;
    left: 25px;
    margin-top: 15px;
    width: 100px; 
    border-radius: 8px;
}

.popup .cnclbtn {
  position: absolute;
    transition: all 200ms;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    padding: 8px 18px;
    background-color: darkcyan;
    right: 25px;
    margin-top: 15px;
    width: 100px;
    border-radius: 8px;
}

.popup .pop_content {
 text-align: center;
 margin-top: 40px;
  
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>

<!--post save success pop up style end -->


<style type="text/css">
  .dropdown_hover {
    position: relative;
    display: inline-block;
    color: white;
    padding: 8px 16px 8px;
    cursor: pointer;
}


.dropdown-content_hover {
    display: none;
    position: absolute;
    color: #3b5283;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-top: 10px;
    z-index: 1;
    border-radius:4px;
}

.dropdown_hover .dropdown-content_hover a {color: #000;}



</style>
   
<header>

    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="job-search-box1 clearfix">
                        <?php echo $job_search; ?>
                        </div>
                    </div>
                  <div class="col-md-5 col-sm-5">
                       <div class="">
                            <ul class="">
                                <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_all_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_all_post'); ?>" title="Home">Home</a>
                                    </li>
                                <!-- Friend Request Start-->

                                     <li>
                                <!-- Friend Request End-->

<div class="dropdown_hover">
  <span id="art_profile">Job Profile <i class="fa fa-angle-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
      <a href="<?php echo base_url('job/job_printpreview'); ?>" title="View Profile"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
      <a href="<?php echo base_url('job/job_basicinfo_update'); ?>" title="Edit Profile"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
      <a href="#popup2" title="Deactive Profile"><i class="fa fa-minus-circle" aria-hidden="true"></i> Deactive Profile</a>
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
      Are You Sure want to deactivate your Job_profile?.

      <p class="okk"><a class="okbtnpop" id="<?php echo $row['business_profile_post_id']; ?>" href="<?php echo base_url('job/deactivate/'.$this->session->userdata('aileenuser')); ?>" title="Ok">OK</a></p>

      <p class="okk"><a class="cnclbtn" href="#" title="Cancle">Cancle</a></p>

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