<div class="col-md-7 col-sm-7">
                        <div class="job-search-box1 clearfix">
                       <?php
                         echo form_open('search/execute_search'); ?>
                     
                            <fieldset class="col-md-5">
                             <!--    <label>Find Your Skills</label>
                              -->   
                            <!-- <input type="text" name="searchartistic" placeholder="Find Your Art"> -->
                             <input type="text" id="tags" name="skills" placeholder="Find Your art">
                            </fieldset>
                            <fieldset class="col-md-5">
                             <!--    <label>Find Your Location</label>
                              -->   
                      <select class="" name="searchplace[]" id="searchplace" multiple="multiple"></select>
                            </fieldset>
                            <fieldset class="col-md-2">
                               <input type="submit" name="search_submit" value="Search">
                            </fieldset>
                        <?php echo form_close();?>
                        </div>
                    </div>



                   