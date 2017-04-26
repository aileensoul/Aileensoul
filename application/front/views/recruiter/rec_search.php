
                         <?php echo form_open('search/recruiter_search'); ?>
                            <fieldset class="col-md-3">

                              <input type="text" id="tags" name="skills" placeholder="Find Persons">
        
                                 
                            </fieldset>
                            <fieldset class="col-md-3">
                              
                              <select class="" name="searchplace[]" id="searchplace" multiple="multiple">
                                </select>
                            </fieldset><!-- 
                            <fieldset class="col-md-2">
                               <input type="submit" name="search_submit" value="Search" onclick="return checkvalue()">
                            </fieldset> -->
                               <fieldset class="col-md-2">
                                 <label for="search_btn" id="search_f"><i class="fa fa-search" aria-hidden="true"></i></label>
                               <input type="submit" name="search_submit" value="Search" onclick="return checkvalue()"    id="search_btn" style="display: none;">
                            </fieldset>
                       <?php echo form_close();?>
                   