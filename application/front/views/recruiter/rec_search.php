
                         <?php echo form_open('search/recruiter_search'); ?>
                            <fieldset class="col-md-5">

                              <input type="text" id="tags" name="skills" placeholder="Find Persons">
        
                                 
                            </fieldset>
                            <fieldset class="col-md-5">
                              
                              <select class="" name="searchplace[]" id="searchplace" multiple="multiple">
                                </select>
                            </fieldset>
                            <fieldset class="col-md-2">
                               <input type="submit" name="search_submit" value="Search" onclick="return checkvalue()">
                            </fieldset>
                       <?php echo form_close();?>
                   