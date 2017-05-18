
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('dragdrop/fileinput.css'); ?>">
   <link href="<?php echo base_url('dragdrop/themes/explorer/theme.css'); ?>" media="all" rel="stylesheet" type="text/css"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="<?php echo base_url('dragdrop/js/plugins/sortable.js'); ?>"></script>
     <script src="<?php echo base_url('dragdrop/js/fileinput.js'); ?>"></script>
      <script src="<?php echo base_url('dragdrop/js/locales/fr.js'); ?>"></script>
       <script src="<?php echo base_url('dragdrop/js/locales/es.js'); ?>"></script>
        <script src="<?php echo base_url('dragdrop/themes/explorer/theme.js'); ?>"></script>
    	 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container kv-main">
    <!-- <div class="page-header">
        <h1>Bootstrap File Input Example
            <small><a href="https://github.com/kartik-v/bootstrap-fileinput-samples"><i
                    class="glyphicon glyphicon-download"></i> Download Sample Files</a></small>
        </h1>
    </div> -->
    <!-- 
    <hr> -->
    <form enctype="multipart/form-data">
        
       
       
        <div class="form-group">
            <input id="file-1" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
        </div>
        <hr>
        
       
       
        
    </form>


   <!--  <hr>
    <h4>Multi Language Inputs</h4>
    <form enctype="multipart/form-data">
        <label>French Input</label>
        <input id="file-fr" name="file-fr[]" type="file" multiple>
        <hr style="border: 2px dotted">
        <label>Spanish Input</label>
        <input id="file-es" name="file-es[]" type="file" multiple>
    </form>
    <hr>
    <br> -->
</div>
</body>
<script>
    $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */
    
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    // $(".btn-info").on('click', function () {
    //     $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    // });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function () {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
           
           
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */
    });
</script>
</html>

