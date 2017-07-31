<?php
echo $header;
echo $leftmenu;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-11">
          <!-- Box Comment -->


          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">

                <img alt="" style="height: 70px; width: 70px;" class="img-circle" src="<?php echo SITEURL.(NOIMAGE); ?>" alt="" />

                <span class="username"><a href="#">Admin</a></span>
                <span class="description">Shared <?php echo $blog_detail[0]['status'];?> 

                <?php 
                    echo " - ";

                   $date_time = new DateTime($blog_detail[0]['created_date']);
                    $month= $date_time->format('M').PHP_EOL;
                    echo $month;

                    $date = new DateTime($blog_detail[0]['created_date']);
                    echo $date->format('d').PHP_EOL;

                     $year = new DateTime($blog_detail[0]['created_date']);
                    echo $year->format('Y').PHP_EOL;
                  ?>

                </span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

             <?php  if($blog_detail[0]['image']) 
                                {
                        ?>
                                <img src="<?php echo SITEURL . $this->config->item('blog_view_main_upload_path') . $blog_detail[0]['image']; ?>" alt="" style="width: auto" >
                        <?php }else{
                        ?>
                                <img alt="" style="height: 70px; width: 70px;" class="img-circle" src="<?php echo SITEURL.(WHITEIMAGE); ?>" alt="" />
                <?php } ?>

              <p><?php echo $blog_detail[0]['title']; ?></p>

              <span class="pull-right text-muted">
              <?php 
                  $condition_array = array('blog_id'=>$blog_detail[0]['id']);
                  $blog_comment = $this->common->select_data_by_condition('blog_comment', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit=5, $offset, $join_str = array());
                  echo count($blog_comment);
                ?>
                  comments
              </span>
            </div>
            <!-- /.box-body -->

<?php
 //FOR GETTING USER COMMENT
  $condition_array = array('status !=' => 'reject','blog_id' => $blog_detail[0]['id']);
  $blog_comment  = $this->common->select_data_by_condition('blog_comment', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());
  //echo "<pre>";print_r($blog_comment );die();

  
    foreach ($blog_comment as $comment) 
    {
  ?>  
            <div class="box-footer box-comments" id="comment">
              <div class="box-comment">
                <!-- User image -->
               <img alt="" style="height: 70px; width: 70px;" class="img-circle" src="<?php echo SITEURL.(NOIMAGE); ?>" alt="" />

                <div class="comment-text">
                      <span class="username">
                        <?php echo $comment['name']; ?>
                        <span class="text-muted pull-right">
                  <?php
                    $date = new DateTime($comment['comment_date']);
                    echo $date->format('d').PHP_EOL;
                    echo "-";

                    $date = new DateTime($comment['comment_date']);
                    echo $date->format('M').PHP_EOL;
                    echo "-";

                    $date = new DateTime($comment['comment_date']);
                    echo $date->format('Y').PHP_EOL;
                    ?>
                        </span>

          <?php if($comment['status'] == 'pending')
                {
          ?>
                  <span id="action<?php echo $comment['id'];?>">
                  <div class="btn-group">
                  <button type="button" class="btn btn-success btn-flat">Action</button>
                  <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a onclick="approve('<?php echo $comment['id'];?>')">Approve</a></li>
                    <li><a onclick="reject('<?php echo $comment['id'];?>')">Reject</a></li>
                  </ul>
                </div>
                </span>
            <?php
                  }//if end
              ?>
                      </span><!-- /.username -->
                 <?php echo $comment['message']; ?>
                </div>
                <!-- /.comment-text -->
              </div>
            </div>
<?php
      }//for loop end
?>
          </div>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>

<!-- THIS SCRIPT IS USED FOR APPROVE USER COMMENT START -->
<script type="text/javascript">
     
function approve(comment_id) {
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url()."blog/approve_comment" ?>',
           data: 'comment_id=' + comment_id,         
           // dataType: "html",
           success: function (data) {
               if (data == 1) 
               {
                   $('#action'+comment_id).remove();
               }
             
           }
       });
   }
</script>
<!-- THIS SCRIPT IS USED FOR APPROVE USER COMMENT END -->

<!-- THIS SCRIPT IS USED FOR REJECT USER COMMENT START -->
<script type="text/javascript">
     
function reject(comment_id) {
   $.ajax({
           type: 'POST',
           url: '<?php echo base_url()."blog/reject_comment" ?>',
           data: 'comment_id=' + comment_id,         
           success: function (data) {
               if (data == 1) 
               {
                   $('#action'+comment_id).remove();
               }
             
           }
       });
   }
</script>
<!-- THIS SCRIPT IS USED FOR REJECT USER COMMENT END -->