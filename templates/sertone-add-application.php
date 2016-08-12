<?php
/**
 * Template Name: add application
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
		<div class="col-md-9 nopadding dash-rigth application">
			<div class="col-md-12 dash-right-wrapper">
			<br>
				<h1>Add Application</h1>

				<div class="table-wrap">
					<div class="col-md-12">
						<h4>Heading</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non nisi feugiat, porttitor lectus ultrices, suscipit mi. Proin volutpat eros vitae congue bibendum. Integer euismod, tellus id molestie laoreet, magna enim cursus nibh, nec sodales tellus lectus quis orci. Integer aliquam, diam in efficitur rutrum, tellus neque euismod est, sed blandit sem tortor ut metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi ullamcorper elit et urna mattis, in dapibus enim commodo. Proin egestas mauris quis sapien tincidunt, sed fringilla velit commodo. Mauris commodo mi eu porttitor dictum. Maecenas porttitor dolor ornare fringilla dignissim. </p>
					</div>

					<div class="clearfix"></div><br>

					<?php
					    if(!empty($_SESSION['response']['application']['add_new'])):
					        print $_SESSION['response']['application']['add_new'];
					        unset($_SESSION['response']['application']['add_new']);
					    endif;
				    ?>
					<?php 
					//if (addapplication()=="Application has been created") { $mssg = addapplication(); ?>
                    <!--						<div class="col-md-12">-->
                    <!--							<div class="alert alert-success">-->
                    <!--								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                    <!--								<strong>Success! </strong>--><?php //echo $mssg;  ?>
                    <!--							</div>-->
                    <!--						</div>-->
					<?php// }?>
					
					<form action="<?php echo SITEURL.'/sertone-add-application/'; ?>" method="post">	
							<input type="text" name="applcation_name" placeholder="Application Name"><br><br>
							<input type="submit" name="add_application" value="Add Appication">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>




<?php include('footer.php'); ?>