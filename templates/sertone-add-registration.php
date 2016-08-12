
<?php include('header.php'); ?>



<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 main-wrapper" >

			<?php
				if(!empty($_SESSION['response']['add_user']['registration'])) {
					print $_SESSION['response']['add_user']['registration'];
					unset($_SESSION['response']['add_user']['registration']);
				}
			?>
			<div class="log-wrapper">
			<div class="col-md-12 lcol-md-12 nopadding">
				<div class="alert alerta">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong><a href="#" data-dismiss="alert" aria-label="close"><span><img class="cross" src="<?php echo IMG; ?>/close.png" width="30"></span></a> &nbsp;ERROR!</strong> <?php echo $error_messages."Incorrect Username or Password"; ?>
				</div>
			</div>
			<div class="wrap">
				
				<div class="col-md-12 lcol-md-6">
				<div class="col-md-12">
					<h1>Register</h1>
				</div>
				<?php 

					// if ($create_user_return!="") {
					// 	echo $create_user_return;
					// }

				 ?>

				 	<?php if (console_create_user()!=""): ?>
				 		<?php echo console_create_user(); ?>
				 	<?php endif ?>

					<form role="form" action="" method="POST" id="form">
						<div class="form-group">
							<input type="email" name="username" class="form-control" id="email" placeholder="Email / Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="confirm_password" required>
						</div>

						<input type="submit" name='create_user' class="btn btn-default mbtn" value="Submit">
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>


<?php
	//	echo "<pre>";
	//	print_r($_SESSION['response']);
	//	echo "</pre>";
	if($_SESSION['response']['add_user']['status'] == true) {
		sertone_redirect($_SESSION['url']['logiin']);
		unset($_SESSION['response']['add_user']['status']);
	}
?>


<?php include('footer.php'); ?>