<?php
echo $header;
echo $leftmenu;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
              <i class="fa fa-rss" aria-hidden="true"></i>
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
            <li class="active"><?php echo $module_name; ?></li>
        </ol>
    </section>
    <section class="content-header">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="callout callout-success">
                <p><?php echo $this->session->flashdata('success'); ?></p>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>  
            <div class="callout callout-danger" >
                <p><?php echo $this->session->flashdata('error'); ?></p>
            </div>
        <?php } ?>

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
                        <div class="form-group col-sm-10">
                            <label for="blogtitle" name="blogtitle" id="blogtitle">Blog Title*</label>
                            <input type="text" class="form-control" name="blog_title" id="blog_title" value="">
                        </div>
                        <!-- BLOG TITLE END -->

                        <!--  TAG SELECTION START -->
                        <div class="form-group col-sm-10">
                                <label>Tag*</label>

                               <input type="text" class="form-control" name="tag" id="tag" value="">
                        </div>
                        <!-- TAG SELECTION END -->

                        <!-- BLOG DESCRIPTION START -->
                        <div class="form-group col-sm-10">
                            <label for="blogdescription" name="blogdescription" id="blogdescription">Description *</label>
                            <?php echo form_textarea(array('name' => 'description', 'id' => 'description editor1', 'class' => "textarea", 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'value' => '')); ?><br>
                        </div>
                        <!-- BLOG DESCRIPTION END -->
                       
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
<?php echo $footer; ?>

<script type="text/javascript">
    //validation for edit email formate form
    $(document).ready(function () {


        $("#add_blog_frm").validate({
            rules: {
                blog_title: {
                    required: true,
                },
                tag: {
                    required: true,
                },
                manufacture_id: {
                    required: true,
                },
                description: {
                    required: true,
                },
                image: {
                    required: true,
                },
                
            },
            messages:
                    {
                        blog_title: {
                            required: "Please enter blog title",
                        },
                        tag: {
                            required: "Please select tag",
                        },
                        description: {
                            required: "Please enter blog description",
                        },
                        image: {
                            required: "Please choose image",
                        }
                       
                    },
        });
        $(".bidding").hide();
        $(".available_for").click(function () {
            var available_for = this.value;
            if (available_for == 'buy')
            {
                $(".bidding").hide();
                $(".stock").show();
            }
            if (available_for == 'bid')
            {
                $(".bidding").show();
                $(".stock").hide();
            }
        });

    });

</script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //   CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea1").wysihtml5();
    });
</script>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('.callout-danger').delay(3000).hide('700');
        $('.callout-success').delay(3000).hide('700');
    });
</script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script> 