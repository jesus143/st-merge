<?php include('header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 main-wrapper" >
			<?php
				if(!empty( $_SESSION['response']['add_user']['email_confirm']['message'] )) {
					print $_SESSION['response']['add_user']['email_confirm']['message'];
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
				<div class="col-md-6 nopadding">
					<img src="<?php echo IMG; ?>/sertoneImg-new.png" class="img-responsive mimg">
				</div>
				<div class="col-md-6 lcol-md-6 nopadding">
					<form role="form" action="" method="POST" id="form">
						<div class="form-group">
							<input type="email" name="username" class="form-control" id="email" placeholder="Email / Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="pwd" placeholder="Password" name="password" required>
						</div>



						<div class="checkbox">
							<label><input type="checkbox"> Remember me now </label>
						</div>

						<a href="<?php echo $_SESSION['url']['register'];awpir ?>">
				 		 	<button type="button" class="btn btn-link">Create an account</button><br>
						</a>

						<input type="submit" name='submit' class="btn btn-default mbtn" value="Submit">
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>




<?php include('footer.php'); ?>