<div class="col-sm-6 col-md-6 col-xs-12 hidden-mob">
    <div class="job-search-box1 clearfix">

        <!-- <?php //echo form_open('search/business_search');   ?> -->
        <form action=<?php echo base_url('search/business_search') ?> method="get">

            <fieldset class="col-md-3 col-sm-5 col-xs-5 sec_h2">
                <!--    <label>Find Your Skills</label>
                -->   
              <!-- <input type="text" name="searchartistic" placeholder="Find Your Art"> -->
                <input type="text"  class="bus_search_comp" name="skills" placeholder="Companies, Category, Products">
            </fieldset>
            <fieldset class="col-md-3 col-sm-5 col-xs-5 sec_h2">
                <!--    <label>Find Your Location</label>
                -->   

                <input type="text" class="bus_search_loc"  name="searchplace" placeholder="Find Location">
            </fieldset>
            <!--                            <fieldset class="col-md-2">
                                           <input type="submit" name="search_submit" value="Search" onclick="return checkvalue()">
                                        </fieldset>-->
            <fieldset class="col-md-2 col-sm-2 col-xs-2">
                <label for="search_btn" id="search_f"><i class="fa fa-search" aria-hidden="true"></i></label>
                <input id="search_btn" style="display: none;" type="submit" name="search_submit" value="Search" onclick="return checkvalue()">
            </fieldset>
            <?php echo form_close(); ?>
    </div>
</div>

<!-- <script src="<?php //echo base_url('js/fb_login.js');   ?>"></script>
-->


<!--<script type="text/javascript">

    $(document).ready(function(){

     document.getElementById('tags').value = null;
     document.getElementById('searchplace').value = null;

    });
</script>-->





