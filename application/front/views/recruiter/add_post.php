<?php echo $head; ?>






<!-- <script src="<?php //echo base_url('js/fb_login.js'); ?>"></script> -->
 
<?php echo $header; ?>

<!-- END HEADER -->
<?php echo $recruiter_header2_border; ?>
<!-- style for span id=notification_count start-->
<style type="text/css">

/* Layout helpers
----------------------------------*/
.ui-helper-hidden {
  display: none;
}
.ui-helper-hidden-accessible {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.ui-front {
  z-index: 100;
}



/* Misc visuals
----------------------------------*/

/* Overlays */
.ui-widget-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.ui-autocomplete {
  position: absolute;
  top: 0;
  left: 0;
  cursor: default;
}

.ui-menu {
  list-style: none;
  padding: 0;
  margin: 0;
  display: block;
  outline: none;
}
.ui-menu .ui-menu {
  position: absolute;
}
.ui-menu .ui-menu-item {
  position: relative;
  margin: 0;
  padding: 3px 1em 3px .4em;
  cursor: pointer;
  min-height: 0; /* support: IE7 */
  /* support: IE10, see #8844 */
  list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
}
.ui-menu .ui-menu-divider {
  margin: 5px 0;
  height: 0;
  font-size: 0;
  line-height: 0;
  border-width: 1px 0 0 0;
}
.ui-menu .ui-state-focus,
.ui-menu .ui-state-active {
  margin: -1px;
}

/* Component containers
----------------------------------*/
.ui-widget {
  font-family: Verdana,Arial,sans-serif;
  font-size: 1.1em;
}
.ui-widget .ui-widget {
  font-size: 1em;
}
.ui-widget input,
.ui-widget select,
.ui-widget textarea,
.ui-widget button {
  font-family: Verdana,Arial,sans-serif;
  font-size: 1em;
}
.ui-widget-content {
  border: 1px solid #aaaaaa;
  background: #ffffff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x;
  color: #222222;
}
.ui-widget-content a {
  color: #222222;
}
.ui-widget-header {
  border: 1px solid #aaaaaa;
  background: #cccccc url("images/ui-bg_highlight-soft_75_cccccc_1x100.png") 50% 50% repeat-x;
  color: #222222;
  font-weight: bold;
}
.ui-widget-header a {
  color: #222222;
}

/* Interaction states
----------------------------------*/
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
  border: 1px solid #d3d3d3;
  background: #e6e6e6 url("images/ui-bg_glass_75_e6e6e6_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #555555;
}

.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
  border: 1px solid #999999;
  background: #dadada url("images/ui-bg_glass_75_dadada_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #212121;
}

.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
  border: 1px solid #aaaaaa;
  background: #ffffff url("images/ui-bg_glass_65_ffffff_1x400.png") 50% 50% repeat-x;
  font-weight: normal;
  color: #212121;
}

  </style>
<body>

    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2"> 
                        <div  class="add-post-button">

                        
                        </div></div>
                    <div class="col-md-8 col-sm-8">

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
                            <div class="job-saved-box">
                                <h3>Add New Post</h3>

                               <?php echo form_open(base_url('recruiter/add_post_store'), array('id' => 'artpost', 'name' => 'artpost', 'class' => 'clearfix form_addedit', 'onsubmit' => "return imgval()")); ?>


                          <div> <span class="required_field" >( <span style="color: red">*</span> ) Indicates required field</span></div>
                                <?php
                                $postname = form_error('postname');
                                $skills1 = form_error('skills1');
                                $description = form_error('description');
                                $postattach = form_error('postattach');
                                $degree1 = form_error('education1');


                                ?>
                                <fieldset class="full-width"<?php if ($post_name) { ?> class=" error-msg" <?php } ?> >
                                    <label class="control-label">Job Title:<span style="color:red">*</span></label>
                                   <!--  <input name="post_name" tabindex="1" autofocus type="text" id="post_name" placeholder="Position [Ex:- Sr. Engineer, Jr. Engineer]" /> -->
                                     <input type="search" tabindex="1" id="post_name" name="post_name" value="" placeholder="Position [Ex:- Sr. Engineer, Jr. Engineer]" style="text-transform: capitalize;" onfocus="this.value = this.value;" maxlength="255">
                                    <span id="fullname-error"></span>
                                    <?php echo form_error('post_name'); ?>
                                </fieldset>

                            
                                  <fieldset>
                                    <label class="control-label">Skills<span style="color:red">*</span>:</label>

<input id="skills2" name="skills" tabindex="7"   placeholder="Enter SKills">
                                    
                                    <?php echo form_error('skills'); ?>
                                </fieldset>
                                 
                                
        
                              


                               

                                <input type="hidden" id="tagSelect" tabindex="19" value="brown,red,green" style="width:300px;" />



                                <fieldset  class="hs-submit col-md-12 col-sm-12 col-xs-12">
                                 
                                 <?php if(($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'add_post') || ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'edit_post')){?>
                                
                               
                                 <a class="add_post_btnc" onclick="return leave_page(9)">Cancel</a>
                                 <?php }else{?>

                                 <a class="add_post_btnc" href="javascript:history.back()">Cancel</a>
                                 <?php } ?>

                                
                                  <input type="submit" id="submit" class="add_post_btns" tabindex="20" name="submit" value="Post">
                                   
                                </fieldset>

                            </div>      
                            </form>

                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
    <footer>
<?php echo $footer; ?>
    </footer>      


</body>

</html>

<script>

</script>

 <!--  -->
<!--  <script src="<?php //echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script> 
 -->



<!-- This Js is used for call popup -->

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    // job title script start
   var jobdata = <?php echo json_encode($jobtitle); ?>;
   
   $(function () {
    
       $("#post_name").autocomplete({
           source: function (request, response) {
               var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
               response($.grep(jobdata, function (item) {
                   return matcher.test(item.label);
               }));
           },
           minLength: 1,
           select: function (event, ui) {
               event.preventDefault();
               $("#post_name").val(ui.item.label);
               $("#selected-tag").val(ui.item.label);
               // window.location.href = ui.item.value;
           }
           ,
           focus: function (event, ui) {
               event.preventDefault();
               $("#post_name").val(ui.item.label);
           }
       });
   });
   
</script>

 <script>
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        
        $( "#skills2" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON("<?php echo base_url();?>general/get_skill", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 20) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( ", " );
                    return false;
                }else{
                    var last = terms.pop();
                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                    $(this).effect("highlight", {}, 1000);
                    $(this).attr("style","border: solid 1px red;");
                    return false;
                }
            }

  
 
        });
    });
</script>