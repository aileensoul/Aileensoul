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
                    $form_attr = array('id' => 'add_page_frm', 'enctype' => 'multipart/form-data');
                    echo form_open_multipart('pages/edit_insert/'.$page[0]['page_id'], $form_attr);
                    ?>
                    <div class="box-body">
                    
                        <!-- BLOG TITLE START -->
                        <div class="form-group col-sm-10">
                            <label for="blogtitle" name="blogtitle" id="blogtitle">Page Name*</label>
                            <input type="text" class="form-control" name="page_name" id="page_name" value="<?php echo $page[0]['page_name']; ?>">
                        </div>
                        <!-- BLOG TITLE END -->
                        
                         <!-- PAGE TITLE START -->
                        <div class="form-group col-sm-10">
                            <label for="blogtitle" name="blogtitle" id="blogtitle">Page Title*</label>
                            <input type="text" class="form-control" name="page_title" id="page_title" value="<?php echo $page[0]['page_title']; ?>">
                        </div>
                        <!-- PAGE TITLE END -->

                         <!--  SHORT DESCRIPTION START -->
                        <div class="form-group col-sm-10">
                            <label for="shortdescription" name="shortdescription" id="shortdescription">Short Description *</label>
                            <textarea id="short_description" name="short_description"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo $page[0]['short_description']; ?>
                             </textarea>
                            <?php //echo form_textarea(array('name' => 'short_description', 'id' => 'short_description', 'class' => "textarea", 'style' => 'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'value' => '')); ?><br>
                        </div>
                        <!-- SHORT DESCRIPTION END -->

                         <!-- PAGE DESCRIPTION START -->
                        <div class="form-group col-sm-10">
                            <label for="pagedescription" name="pagedescription" id="pagedescription">Page Description *</label>
                            <textarea id="description" name="description" rows="10" cols="80"> <?php echo $page[0]['page_description']; ?>
                             </textarea>
                        </div>
                        <!-- PAGE DESCRIPTION END -->

                        <!-- PAGE TITLE START -->
                        <div class="form-group col-sm-10">
                            <label for="seotitle" name="seotitle" id="blogtitle">SEO Title*</label>
                            <input type="text" class="form-control" name="seo_title" id="seo_title" value="<?php echo $page[0]['seo_title']; ?>">
                        </div>
                        <!-- PAGE TITLE END -->
                        
                         <!-- PAGE TITLE START -->
                        <div class="form-group col-sm-10">
                            <label for="seokeyword" name="seokeyword" id="seokeyword">SEO keyword*</label>
                            <input type="text" class="form-control" name="seo_keyword" id="seo_keyword" value="<?php echo $page[0]['seo_keywords']; ?>">
                        </div>
                        <!-- PAGE TITLE END -->
                        
                          <!--  SHORT DESCRIPTION START -->
                        <div class="form-group col-sm-10">
                            <label for="seodescription" name="seodescription" id="seodescription">SEO Description *</label>
                            <textarea name="seo_description" id="seo_description" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $page[0]['seo_description']; ?> </textarea>
                        </div>
                        <!-- SHORT DESCRIPTION END -->
                        

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



<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('.callout-danger').delay(3000).hide('700');
        $('.callout-success').delay(3000).hide('700');
    });
</script>


<!-- SCRIPT FOR CKEDITOR START-->
<script type="text/javascript">   
  var roxyFileman = '<?php echo SITEURL.'uploads/upload.php'; ?>' ; 
   CKEDITOR.replace( 'description',{
                                filebrowserBrowseUrl : roxyFileman,
                                filebrowserUploadUrl : roxyFileman,
                                filebrowserImageBrowseUrl : roxyFileman+'?type=image',
                                filebrowserImageUploadUrl : roxyFileman,
                                extraAllowedContent:  'img[alt,border,width,height,align,vspace,hspace,!src];' ,
                                removeDialogTabs: 'link:upload;image:upload'}); 
CKEDITOR.config.allowedContent = true;
CKEDITOR.on('instanceReady', function(ev) {
    // Ends self closing tags the HTML4 way, like <br>.
    ev.editor.dataProcessor.htmlFilter.addRules({
        elements: {
            $: function(element) {
                // Output dimensions of images as width and height
                if (element.name == 'img') {
                    var style = element.attributes.style;
                    if (style) {
                        // Get the width from the style.
                        var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                            width = match && match[1];
                        // Get the height from the style.
                        match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                        var height = match && match[1];
                        // Get the float from the style.
                        match = /(?:^|\s)float\s*:\s*(\w+)/i.exec(style);
                        var float = match && match[1];
                        if (width) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                            element.attributes.width = width;
                        }
                        if (height) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                            element.attributes.height = height;
                        }
                        if (float) {
                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)float\s*:\s*(\w+)/i, '');
                            element.attributes.align = float;
                        }
                    }
                }
                if (!element.attributes.style) delete element.attributes.style;
                return element;
            }
        }
    });
});     
</script>
<!-- SCRIPT FOR CKEDITOR END-->