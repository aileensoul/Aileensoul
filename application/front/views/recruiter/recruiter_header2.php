

<style>
  
    .okk{
        text-align: center;
    }

    .pop_content .okbtn{
        position: absolute;
        transition: all 200ms;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        padding: 8px 18px;
        background-color: #0A2C5D;
        left: 170px;
        margin-top: 8px;
        width: 100px; 
        border-radius: 8px;
    }

  
    .pop_content .cnclbtn {
        position: absolute;
        transition: all 200ms;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        padding: 8px 18px;
        background-color: #0A2C5D;
        right: 170px;
        margin-top: 8px;
        width: 100px;
        border-radius: 8px;
    }

    .popup .pop_content {
        text-align: center;
        margin-top: 40px;

    }
    .model_ok_cancel{
        width:200px !important;
    }



</style>

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
 


</style>
   
<header>
    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                  <div class="col-md-7 col-sm-7">
                        <div class="job-search-box1 clearfix">
                           <?php echo $rec_search; ?>
                    </div>
                    </div>
                  <div class="col-md-5 col-sm-5">
                       <div class="">
                            <ul class="">
                                <li<?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/recommen_candidate'); ?>">Home</a>
                                   
                                <!-- Friend Request Start-->

                               </li>
                                  <li>
  
<div class="dropdown_hover">
  <span id="art_profile">Recruiter Profile <i class="fa fa-angle-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
      <a href="<?php echo base_url('recruiter/rec_profile'); ?>"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
     <a href="<?php echo base_url('recruiter/rec_basic_information'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>

     <?php
      $userid = $this->session->userdata('aileenuser');
      ?>
    <a onClick="deactivate(<?php echo $userid; ?>)"><i class="fa fa-minus-circle" aria-hidden="true"></i> Deactive Profile</a>
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


<script type="text/javascript">

  function deactivate(clicked_id) { 
      $('.biderror .mes').html("<div class='pop_content'> Are you sure you want to deactive your recruiter_profile?.<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='deactivate_profile(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
          $('#bidmodal').modal('show');
 }

 function deactivate_profile(clicked_id){

                  $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url() . "recruiter/deactivate" ?>',
                      data: 'id=' + clicked_id,
                        success: function (data) {
                          window.location= "<?php echo base_url() ?>dashboard";
                                    
                                }
                            });



 }
 </script>
