
<input action="action" type="button" value="Back" onclick="history.back();" /> <br/><br/>

<?php
	if($pdf[0]['edu_certificate_primary']){ 
?>
<embed src="<?php echo base_url().$this->config->item('job_edu_main_upload_path').$pdf[0]['edu_certificate_primary'] ?>" width="600" height="775">
<?php 
}
?>


<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
