<div class="col-md-7 col-sm-7">
                        <div class="job-search-box1 clearfix">
                       <?php
                         echo form_open('search/freelancer_hire_search'); ?>
                            <fieldset class="col-md-3">
                             <!--    <label>Find Your Skills</label>
                              -->  
                              <input type="text" id="tags" name="skills" placeholder="Find Your freelancer">
                                </select>

                            </fieldset>
                            <fieldset class="col-md-3">
                             <!--    <label>Find Your Location</label>
                              -->  

                              <input type="text" id="searchplace" name="searchplace" placeholder="Find Your Location"> 
                             <!-- <select class="" name="searchplace[]" id="searchplace" multiple="multiple"></select> -->
                             
                            </fieldset>
                            <!-- <fieldset class="col-md-2">
                               <input type="submit" name="search_submit" value="Search" onclick="return checkvalue()">
                            </fieldset>
 -->
                              <fieldset class="col-md-2">
                                <?php if(($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_add_post') || ($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_edit_post')){?>
                                
                                 <label for="search_btn" id="search_f"><i class="fa fa-search" aria-hidden="true"></i></label>
                               <input type="button" name="search_submit" value="Search" onclick="return leave_page(4)"   id="search_btn" style="display: none;">


                                 <?php }else{?>

                                <label for="search_btn" id="search_f"><i class="fa fa-search" aria-hidden="true"></i></label>
                               <input type="submit" name="search_submit" value="Search" onclick="return checkvalue()"   id="search_btn" style="display: none;">

                           <?php } ?>
                            </fieldset>
                        <?php echo form_close();?>
                        </div>
                    </div>