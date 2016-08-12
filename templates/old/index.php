<?php get_header(); ?>



<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 main-wrapper" >

			<div class="log-wrapper">
			<div class="col-md-12 lcol-md-12 nopadding">
				<div class="alert alerta">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong><a href="#" data-dismiss="alert" aria-label="close"><span><img class="cross" src="<?php echo IMG; ?>/close.png" width="30"></span></a> &nbsp;ERROR!</strong> The Username and/or Password is empty.
				</div>
			</div>
			<div class="wrap">
				<div class="col-md-6 nopadding">
					<img src="<?php echo IMG; ?>/sertoneImg.png" class="img-responsive mimg">
				</div>
				<div class="col-md-6 lcol-md-6 nopadding">
					<form role="form">
						<div class="form-group">
							<input type="email" class="form-control" id="email" placeholder="Email / Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="pwd" placeholder="Password" required>
						</div>
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
						</div>
						<button type="submit" class="btn btn-default mbtn">Log in</button>
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>




<?php get_footer(); ?>