<?php
  echo $header;
  echo $leftmenu;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            <?php echo $module_name; ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">Job profile</li>
        </ol>
    </section>

 

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image --> 
          <div class="box box-primary mt0">
            <div class="box-body box-profile">

             <?php  if($user[0]['job_user_image']) 
                                {
                        ?>
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo SITEURL . $this->config->item('job_profile_thumb_upload_path') . $user[0]['job_user_image']; ?>" alt=""  style="height: 100px; width: 100px;">
                        <?php }else{
                        ?>
                                <img class="profile-user-img img-responsive img-circle" alt="" style="height: 100px; width: 100px;" class="img-circle" src="<?php echo SITEURL.(NOIMAGE); ?>" alt="" />
                        <?php } ?>
            
              <h3 class="profile-username text-center"><?php echo ucfirst($user[0]['fname']); echo ' ';echo ucfirst($user[0]['lname']);  ?></h3>

              <?php if($user[0]['designation'])
                    {
              ?>
              <p class="text-muted text-center"><?php echo ucwords($user[0]['designation']); ?></p>
              <?php
                    }
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

               <p class="text-muted">
               <?php 

                            $cityname = $this->db->get_where('cities', array('city_id' => $user[0]['city_id']))->row()->city_name;

                            echo $cityname; if( $cityname){echo ",";}

                            $statename = $this->db->get_where('states', array('state_id' => $user[0]['state_id']))->row()->state_name;

                            echo $statename;if( $statename){echo ",";}

                            $countryname = $this->db->get_where('countries', array('country_id' => $user[0]['country_id']))->row()->country_name; 
                                            
                            echo $countryname;
                ?>
                </p>
              <hr>

          <?php 
            if($user[0]['keyskill'])
            {
           ?>
              <strong><i class="fa fa-pencil margin-r-5"></i>Skills</strong>

              <p>
                 <?php
                            $aud = $user[0]['keyskill'];
                                                            
                            $aud_res = explode(',', $aud);
                                                            
                            foreach ($aud_res as $skill) 
                            {
                                                            
                                $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                              ?>
                              <span class="label label-primary"><?php echo  $cache_time; ?></span>
                  <?php
                              }
                  ?>    
                          
              </p>

              <hr>
              <?php
                }
              ?>

            <?php 
              if($other_skill)
              {
            ?>
              <strong><i class="fa fa-pencil margin-r-5"></i>Other Skills</strong>

              <p>
                 <?php
                            foreach ($other_skill as $skill) 
                            {
                                                            
                            
                  ?>
                    <span class="label bg-red"><?php echo  $skill['skill']; ?></span>
                  <?php
                              }
                  ?>    
                          
              </p>

              <hr>
              <?php
                }
              ?>

            <?php 
            if($user[0]['carrier'])
            {
           ?>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>Carrier Objectives</strong>

              <p><?php echo $user[0]['carrier']; ?></p>

            <?php
                }
            ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#basic_information" data-toggle="tab">Basic Information</a>
              </li>

              <li><a href="#address" data-toggle="tab">Address</a>
              </li>

              <li><a href="#education" data-toggle="tab">Education Qualification</a>
              </li>

              <li><a href="#project" data-toggle="tab">Project And Training / Internship</a>
              </li>

              <li><a href="#work_exp" data-toggle="tab">Work Experience</a>
              </li>

              <li><a href="#curricular" data-toggle="tab">Extra Curricular Activities</a>
              </li>

              <li><a href="#reference" data-toggle="tab">Interest & Reference</a>
              </li>

            </ul>

            <div class="tab-content">

              <div class="active tab-pane" id="basic_information">
                <!-- Post -->
                <div class="post">

                  <form class="form-horizontal">

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-2 control-label">
                     <?php echo ucfirst($user[0]['fname']); echo ' ';echo ucfirst($user[0]['lname']);  ?>
                    </div>
                  </div>

                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-2 control-label">
                     <?php echo $user[0]['email']; ?> 
                    </div>
                  </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Phone Number:</label>
                    <div class="col-sm-2 control-label">
                    <?php echo $job[0]['phnno']; ?>
                    </div>
                  </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Marital Status:</label>
                    <div class="col-sm-2 control-label">
                     <?php echo $job[0]['marital_status']; ?>
                    </div>
                  </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Nationality:</label>
                    <div class="col-sm-2 control-label">
                      <?php
                              $cache_time = $this->db->get_where('nation', array('nation_id' => $job[0]['nationality']))->row()->nation_name;
                              echo $cache_time;
                        ?>
                    </div>
                  </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Language:</label>
                    <div class="col-sm-2 control-label">
                   <?php
                                             $aud = $job[0]['language'];
                                             
                                             $aud_res = explode(',', $aud);
                                             foreach ($aud_res as $lan) {
                                             
                                                 $cache_time = $this->db->get_where('language', array('language_id' => $lan))->row()->language_name;
                                                 $language1[] = $cache_time;
                                             }
                                             $listFinal = implode(', ', $language1);
                                             echo $listFinal;
                                             ?>   
                    </div>
                  </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Date Of Birth:</label>
                    <div class="col-sm-2 control-label">
                     AArati
                    </div>
                  </div>

                   <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label">Gender:</label>
                    <div class="col-sm-2 control-label">
                     AArati
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- active tab-pane -->
            
            <div class="tab-pane" id="address">
                <!-- Post -->
                <div class="post">
                
                  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- tab-pane -->

              <div class="tab-pane" id="education">
                <!-- Post -->
                <div class="post">
                
                  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Education</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- tab-pane -->

              <div class="tab-pane" id="project">
                <!-- Post -->
                <div class="post">
                
                  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Project</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- tab-pane -->

              <div class="tab-pane" id="work_exp">
                <!-- Post -->
                <div class="post">
                
                  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Work Experience</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- tab-pane -->

              <div class="tab-pane" id="curricular">
                <!-- Post -->
                <div class="post">
                
                  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Curricular</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- tab-pane -->

              <div class="tab-pane" id="reference">
                <!-- Post -->
                <div class="post">
                
                  <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Interest & Reference</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                </form>

                </div>
                <!-- /.post -->

              </div>
              <!-- tab-pane -->


            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <!-- Footer start -->
<?php echo $footer; ?>
<!-- Footer End -->

</body>
</html>
