 <?php
                         echo form_open('search/job_search'); ?>
                            <fieldset class="col-md-3">
                            
                                 <input type="text" id="tags" name="skills" placeholder="Find Your Job">
                                </select>
                            </fieldset>
                            <fieldset class="col-md-3">
<<<<<<< HEAD
                            
                              <input type="text" id="searchplace" name="searchplace" placeholder="Find Your location">
                              <!-- <select class="" name="searchplace[]" id="searchplace" multiple="multiple"  placeholder="Find Your location"> -->
                                </select>
=======
                              
                             <!--  <select class="" name="searchplace[]" id="searchplace" multiple="multiple"  placeholder="Find Your location">
                                </select> -->
                                 <input type="text" id="searchplace" name="searchplace" placeholder="Find Your location">
>>>>>>> 32aaec8b286052da470cabc2508aa0a80cca0859
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