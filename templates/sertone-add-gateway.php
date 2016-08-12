<?php
/**
 * Template Name: add getway
 *
 */
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php $url_dashboard = $_SESSION['url']['dashboard'];  ?>


<div class="col-md-9 nopadding dash-rigth gateway">
	<div class="col-md-12 dash-right-wrapper">
		<br>
		<h1>Add Gateway</h1>

		<div class="table-wrap">

			<!-- ////////////////////////////////////////////////// -->
			<p class="box-label">Gateway Technical details</p>
			<?php
				if(!empty($_SESSION['response']['add_gate_way']['error'])):
					print($_SESSION['response']['add_gate_way']['error']);
					unset($_SESSION['response']['add_gate_way']['error']);
				endif;
			?>




			<div role="form" class="fw nopadding" >

			<div class="row tab-number">
				<div class="tab-wrapper">
				<div class="line"></div>
				 	<div class="col-md-3 col-sm-3 col-xs-3">
				 		<h1 class="text-center circle c1" >1</h1>
				 		<h4  class="text-center">Setup Gateway</h4>
				 	</div>

				 	<div class="col-md-3 col-sm-3 col-xs-3 ">
				 		<h1 class="text-center  circle c2">2</h1>
				 		<h4  class="text-center c1">Connect Gateway</h4>
				 	</div>

				 	<div class="col-md-3 col-sm-3 col-xs-3">
				 		<h1 class="text-center  circle c3">3</h1>
				 		<h4  class="text-center">Enter Details</h4>
				 	</div>

				 	<div class="col-md-3 col-sm-3 col-xs-3">
				 		<h1 class="text-center  circle c4">4</h1>
				 		<h4  class="text-center">Activate</h4>
				 	</div>
				</div>
			</div>

			<!-- All form conatainer -->
			
			<div class="row">
				<div class="col-md-12" style="padding-bottom:20px;">
					<div class="form-wrapper">

						<!-- THIS IS THE FIRST FORM -->
							<?php if (is_page('sertone-add-gateway')): ?>
									<style> .circle.c1 { background-color: #ccc !important; } </style>

								<div class="first-form fomrs active-form">
									<form method="post" action="">
										<h4>Your gateway must configured to connect to our server.</h4>

										<h4>
										Server: focalpoint.sertone.net<br>Port Uplink: 1700<br>Port Downlink: 1700
										</h4>

										<h4>Take note on the Gateway EUI. if none, kindly use the MAC address as the EUI.</h4>

										<h4>Connect gateway to the network and power it on.</h4>

										<input type="submit" name="first-submit-form" value="Next >>>">
									</form>
								</div>
							<?php endif ?>

						<!-- THIS IS THE SECOND FORM -->
							<?php if (isset($_POST['first-submit-form']) OR isset($_POST['check_status']) ): ?>
								<style type="text/css">
									.active-form{ display: none; }
									.circle.c1,.circle.c2 { background-color: #ccc !important; }
								</style>
								<div class="second-form fomrs ">
									<form method="post" action="" class="nopadding">Enter EUI:
										<h4>If you have configured and turned on your gateway and confident it is connected to the Internet, we can now connect it to Sertone network. You just need to enter the gateway EUI below and we will check if your gateway is connected already. </h4>
										<div class="row">
											<div class="col-md-3">
												<h3 class="nopadding nomargin">Enter EUI:</h3>
											</div>
											<div class="col-md-5">
												<?php

													if ($_SESSION['serton_eui']!="") {
														$value = $_SESSION['serton_eui'];
													}
													else{
														$value = "";
													}
												 ?>
												<input type="text" name="eui" required value="<?php echo $value; ?>">
											</div>
											<div class="col-md-4">
												<input type="submit" name="check_status" value="Check Status >>>">
											</div>
											<div class="clearfix"></div>
											<div class="col-md-5">
												<h4>Status : <?php echo  getwayCurrentStatus(); ?> </h4>
											</div>

											<?php if (getwayCurrentStatus()=='Active'): ?>
												<div class="clearfix"></div>
												<br>
												<div class="col-md-4 col-md-offset-8">
													<input type="submit" name="second-submit-form" value="Next Step >>>">
												</div>
											<?php endif ?>
										</div>
									</form>
								</div>
							<?php endif ?>

						<!-- THIS IS THE 3RD FORM  -->
							<?php if (isset($_POST['second-submit-form'])): ?>

								<style type="text/css">
									.active-form{ display: none; }
									.circle.c1,.circle.c2,.circle.c3 { background-color: #ccc !important; }
								</style>
								<div class="third-form fomrs ">
									<form method="post" action="" class="nopadding">
										<h4>
											Now that your gateway is connected, lets personalize some details so we can Identify this gateway properly. Enter as muxh Information as you know or update the missing info later.
										</h4>

										<div class="col-md-3">
											<h3 class="nopadding nomargin">Gateway Name: </h3>
										</div>
										<div class="col-md-5">
											<input type="test" name="eui">
										</div>
										<div class="clearfix"></div>
										<br>
										<!-- <div class="col-md-3">
											<h3 class="nopadding nomargin">Gateway Map: </h3>
										</div> -->
										<!-- <div class="col-md-5">
											<textarea></textarea>
										</div> -->
										<div class="clearfix"></div>
										<br>
										<div class="col-md-3">
											<h3 class="nopadding nomargin">Location: </h3>
										</div>
										<div class="col-md-5">
											<input id="searchTextField" name="country" type="text" size="50" placeholder="Enter a location" autocomplete="on" runat="server" />
											<input type="hidden" id="city2" name="city2" />
											<input type="hidden" id="cityLat" name="cityLat" />
											<input type="hidden" id="cityLng" name="cityLng" />
										</div>
										<div class="clearfix"></div>
										<br>
										<div class="col-md-4 col-md-offset-3">
											<input type="submit" name="Third-submit-form" value="Next Step >>>">
										</div>
									</form>
								</div>
							<?php endif ?>

						<!-- ADDING NEW GATE WAY SUCCESS STATUS -->
							<?php if (isset($_GET['confirm'])): ?>
								<style type="text/css">
									.active-form{ display: none;  }
									.circle.c1,.circle.c2,.circle.c3,.circle.c4 { background-color: #ccc !important; }
								</style>
								<div class="fourth-form fomrs">
									<!-- <form method="post" action="" class="nopadding">-->

									<br><br>

										<?php
											if(!empty($_SESSION['response']['add_gate_way']['success'])):
												print($_SESSION['response']['add_gate_way']['success']);
												unset($_SESSION['response']['add_gate_way']['success']);
											endif;
										?>

										<div class="col-md-3 col-md-offset-9">
											<a href="<?php print $url_dashboard; ?>">
												<input type="submit" name="finish-form" value="Finish >>>">
											</a>
										</div>
									<!-- </form>-->
								</div>
							<?php endif ?>
						<!-- fourth form -->

					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>


<?php include('footer.php'); ?>
