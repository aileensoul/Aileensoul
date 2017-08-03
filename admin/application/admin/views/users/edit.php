<?php
echo $header;
echo $leftmenu;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <img src="<?php echo SITEURL .'/img/i1.jpg' ?>" alt=""  style="height: 50px; width: 50px;">
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
            <li class="active">ALL User</li>
        </ol>
        <!-- <div class="fr">
                         <button name="Add" class="btn bg-orange btn-flat margin" ><i class="fa fa-fw fa-user-plus" aria-hidden="true"></i> Add User</button>
        </div> -->
    </section>

 <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $section_title; ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $form_attr = array('id' => 'add_blog_frm', 'enctype' => 'multipart/form-data');
                    echo form_open_multipart('blog/blog_insert', $form_attr);
                    ?>
                    <div class="box-body">
                    
                        <!-- BLOG TITLE START -->
                        <div class="form-group col-sm-4">
                            <label for="blogtitle" name="blogtitle" id="blogtitle">First Name*</label>
                            <input type="text" class="form-control" name="first_name" id="blog_title" value="">
                        </div>
                        <!-- BLOG TITLE END -->

                        <!--  TAG SELECTION START -->
                        <div class="form-group col-sm-4">
                                <label>Last Name*</label>

                               <input type="text" class="form-control" name="last_name" id="tag" value="">
                        </div>
                        <!-- TAG SELECTION END -->
                        
                         <!-- BLOG DESCRIPTION START -->
                        <div class="form-group col-sm-6">
                            <label for="blogdescription" name="blogdescription" id="blogdescription">User Email *</label>
                            <input type="text" class="form-control" name="user_email" id="tag" value="">
                          <!--   <?php //echo form_textarea(array('name' => 'description', 'id' => 'description', 'class' => "textarea", 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'value' => '')); ?> --><br>
                        </div>
                        <!-- BLOG DESCRIPTION END -->

                        <!-- BLOG META DESCRIPTION START -->
                        <div class="form-group col-sm-10">
                            <label for="blogmetadescription" name="blogmetadescription" id="blogmetadescription">Meta Description *</label>
                            <?php echo form_textarea(array('name' => 'meta_description', 'id' => 'meta_description', 'class' => "textarea", 'style' => 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'value' => '')); ?><br>
                        </div>
                        <!-- BLOG META DESCRIPTION END -->

                        <!-- BLOG IMAGE START -->
                        <div class="form-group col-sm-10">
                            <label for="blogimage" name="blogimage" id="blogimage">Image *</label>
                            <input type="file" class="form-control" name="image" id="image" value="" style="border: none;">
                        </div>
                        <!-- BLOG IMAGE END -->

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <?php
                        $save_attr = array('id' => 'btn_save', 'name' => 'btn_save', 'value' => 'Save', 'class' => 'btn btn-primary');
                        echo form_submit($save_attr);
                        ?>    
                        <button type="button" onclick="window.history.back();" class="btn btn-default">Back</button>
                        <!--<button type="submit" class="btn btn-info pull-right">Sign in</button>-->
                    </div><!-- /.box-footer -->
                    </form>
                </div><!-- /.box -->


            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<!-- Footer start -->
<?php echo $footer; ?>
<!-- Footer End -->

<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('.callout-danger').delay(3000).hide('700');
        $('.callout-success').delay(3000).hide('700');
    });
</script>

<script>
//deactive user Start
   function deactive_user(job_id) 
   {
   
       $.fancybox.open('<div class="message"><h2>Are you Sure you want to  deactive this User?</h2><button id="activate" class="mesg_link btn btn1">OK</a><button data-fancybox-close="" class="btn btn1">Cancel</button></div>');

        $('.message #activate').on('click', function () 
        {
            $.ajax({
                         type: 'POST',
                          url: '<?php echo base_url() . "job/deactive_user" ?>',
                          data: 'job_id=' + job_id,
                          success: function (response) 
                          {    
                                 $.fancybox.close();
                                $('#' + 'active' + job_id).html(response);
                          }
            });   
        });
    }
//deactive user End

//active user Start
   function active_user(job_id) 
   {
   
       $.fancybox.open('<div class="message"><h2>Are you Sure you want to  active this User?</h2><button id="deactivate" class="mesg_link btn btn1">OK</a><button data-fancybox-close="" class="btn btn1">Cancel</button></div>');

        $('.message #deactivate').on('click', function () 
        {
            $.ajax({
                         type: 'POST',
                          url: '<?php echo base_url() . "job/active_user" ?>',
                          data: 'job_id=' + job_id,
                          success: function (response) 
                          {        
                                  $.fancybox.close();  
                                  $('#' + 'active' + job_id).html(response);
                          }
            });   
        });
    }
//active user End\

//Delete user Start
   function delete_user(job_id) 
   {
   
       $.fancybox.open('<div class="message"><h2>Are you Sure you want to Delete this User?</h2><button id="delete" class="mesg_link btn btn1">OK</a><button data-fancybox-close="" class="btn btn1">Cancel</button></div>');

        $('.message #delete').on('click', function () 
        {
            $.ajax({
                         type: 'POST',
                          url: '<?php echo base_url() . "job/delete_user" ?>',
                          data: 'job_id=' + job_id,
                          success: function (response) 
                          {          
                                window.location.reload();
                          }
            });   
        });
    }
//Delete user End

//Enable search button when user write something on textbox Start
 $(document).ready(function(){
    $('#search_btn').attr('disabled',true);

    $('#search_keyword').keyup(function()
    {  
        if($(this).val().length !=0)
        {
            $('#search_btn').attr('disabled', false);
        }
        else
        {  
            $('#search_btn').attr('disabled', true);        
        }
    })

     $('body').on('keydown', '#search_keyword', function(e) {
    console.log(this.value);
    if (e.which === 32 &&  e.target.selectionStart === 0) {
      return false;
    }  
  });
});
//Enable search button when user write something on textbox End

// $(function() {
 
// });
</script>