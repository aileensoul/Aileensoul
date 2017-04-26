 <?php
                         echo form_open('search/job_search'); ?>
                            <fieldset class="col-md-5">
                            
                                 <input type="text" id="tags" name="skills" placeholder="Find Your job">
                                </select>
                            </fieldset>
                            <fieldset class="col-md-5">
                              
                              <select class="" name="searchplace[]" id="searchplace" multiple="multiple">
                                </select>
                            </fieldset>
                        <!--     <fieldset class="col-md-2">
                                <button onclick="return checkvalue();"> Search</button>
                            </fieldset>
                             -->
                            <fieldset class="col-md-2">
                                  <label for="search_btn" id="search_f"><i class="fa fa-search" aria-hidden="true"></i></label>
                                <button onclick="return checkvalue();"  id="search_btn" style="display: none;"> Search</button>
                            </fieldset>
<?php echo form_close();?>