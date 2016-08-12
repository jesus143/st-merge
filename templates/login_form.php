<div class="container">

	<div class="row">
    
		<div class="col-md-10 col-md-offset-1 main-wrapper">

    <!-- Show errors if there are any -->
    <?php if ( count( $attributes['errors'] ) > 0 ) : ?>
        <?php foreach ( $attributes['errors'] as $error ) : ?>
            <p class="login-error">
                <?php echo $error; ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ( $attributes['registered'] ) : ?>
        <p class="login-info">
            <?php
                printf(
                    __( 'You have successfully registered to <strong>%s</strong>. We have emailed your password to the email address you entered.', 'personalize-login' ),
                    get_bloginfo( 'name' )
                );
            ?>
        </p>
    <?php endif; ?>

    <?php if ( $attributes['lost_password_sent'] ) : ?>
        <p class="login-info">
            <?php _e( 'Check your email for a link to reset your password.', 'personalize-login' ); ?>
        </p>
    <?php endif; ?>

    <!-- Show logged out message if user just logged out -->
    <?php if ( $attributes['logged_out'] ) : ?>
        <p class="login-info">
            <?php _e( 'You have signed out. Would you like to sign in again?', 'personalize-login' ); ?>
        </p>
    <?php endif; ?>


    <?php if ( $attributes['password_updated'] ) : ?>
        <p class="login-info">
            <?php _e( 'Your password has been changed. You can sign in now.', 'personalize-login' ); ?>
        </p>
    <?php endif; ?>


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

                        <form role="form" action="<?php echo wp_login_url(); ?>" method="POST" id="form">

                            <div class="form-group">
                                <input type="email" name="log" class="form-control" id="email" placeholder="Email / Username" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox"> Remember me now </label>
                            </div>

                            <a href="<?php echo $_SESSION['url']['register'];awpir ?>">
                                <button type="button" class="btn btn-link">Create an account</button><br>
                            </a>

                            <input type="submit" name='submit' class="btn btn-default mbtn" value="Submit" />

                        </form>

                    </div>

                </div>

            </div>

		</div>

	</div>

</div>