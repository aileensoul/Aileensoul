<?php echo $head; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/gyc.css'); ?>">

<?php 
   $userid = $this->session->userdata('aileenuser');
if($userid){?>
<?php echo $header; ?>
<?php }?>

<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<body   class="page-container-bg-solid page-boxed">
    <img src="<?php echo base_url() ?>images/404.jpg" alt="404" />
</body>

</html>
