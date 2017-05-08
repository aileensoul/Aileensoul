
<input action="action" type="button" value="Back" onclick="history.back();" /> <br/><br/>


<?php

	if($busdata[0]['image_name']){ 
?>
<embed src="<?php echo base_url().BUSPOSTIMAGE.str_replace(" ", "_", $busdata[0]['image_name']) ?>" width="600" height="775">
<?php }else { ?>
<embed src="<?php echo base_url().BUSINESSPROFILEIMAGE.$businessdata[0]['product_image']; ?>" width="600" height="775">
<?php }?>

