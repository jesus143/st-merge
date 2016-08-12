<!DOCTYPE html>
<html>
<head>
	<title>This is the dashboard</title>
		<link rel="stylesheet" href="<?php echo BOOT; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BOOT; ?>/css/bootstrap-theme.min.css" >
		<link rel="stylesheet" href="<?php echo BOOT; ?>/css/mystyle.css" >
		<script src="<?php echo BOOT; ?>/js/jquery.min.js"></script>
		<script src="<?php echo BOOT; ?>/js/bootstrap.js"></script>
		<script src="<?php echo BOOT; ?>/js/bootstrap.min.js"></script>
</head>
<body>



<?php 

	if (!is_home()) {?>
		<div class="container application">
		<div class="row">
		<div class="col-md-3 nopadding dash-main-header"></div>
		<div class="col-md-9 nopadding dash-rigth dash-main-header "><img src="<?php echo IMG; ?>/home.png"> / Icons 1</div>



		<?php 
	}

 ?>

<?php wp_head(); ?>
