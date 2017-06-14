
<?php echo $head; ?>
<?php echo $header; ?>

<body>

<!--Field validation javascript-->
<div class="change-password">
	<div class="container">
		<div class="change-password-box">
		<h4>Change Password</h4>
			<!-- <input action="action" type="button" value="Back" class="back-btn" onclick="history.back();" /> -->
		 	<?php echo form_open(base_url('registration/changepassword_insert'), array('id' => 'regform','name' => 'regform','class' => 'clearfix')); ?>
				
				<fieldset class="full-width">
					<label>Old Password <span style="color:red">*</span></label>
					<input type="password" name="oldpassword"  id="oldpassword" placeholder="Old Password" /> <span id="password1-error"> </span>
				 	<?php
				          //echo "<div class='error_msg'>";
				          if (isset($error_message1)) {
				          echo $error_message1;
				          }
				          //echo validation_errors();
				       echo form_error('oldpassword');
				           //echo "</div>";
				      ?>
				 
				</fieldset>
				<fieldset class="full-width">
					<label>New Password <span style="color:red">*</span></label>
					<input type="password" name="password1"  id="password1" placeholder="New Password" /> <span id="password1-error"> </span>
					<?php echo form_error('password1'); ?>
				</fieldset>
				<fieldset class="full-width">
					<label>Confirm Password<span style="color:red">*</span></label>
					<input type="password" name="password2"  id="password2" placeholder="Confirm Password" /> <span id="password2-error"> </span>
					<?php echo form_error('password2'); ?>
				</fieldset>
				<fieldset class="hs-submit full-width">

					<input type="reset"  value="Cancel" name="cancel">
					<input type="submit"  value="Save" name="submit">
					
				</fieldset>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>