<?php
/**
 * Template Name: add getway
 *

 */


?>

<?php get_header(); ?>
<?php get_sidebar(); ?>





<div class="col-md-9 nopadding dash-rigth gateway">
			<div class="col-md-12 dash-right-wrapper">
			<br>
				<h1>Add Gateway Form</h1>

				<div class="table-wrap">
					<div class="col-md-12">
						<div class="col-md-10 nopadding">

						<div class="box">
							<h1>Heading</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. 
							</p>
						</div>

						<div class="row under-box">
							<div class="col-md-4">
								<h3>Your Base Flatform</h3>
							</div>
							<div class="col-md-5">
								<form role="form">
							    <div class="form-group">
							      <select class="form-control" id="sel1">
							        <option>Respberry Pi</option>
							        
							      </select>
							      
							    </div>
							  </form>
							</div>
							<div class="col-md-3">
								<img src="<?php echo IMG; ?>/gimages.png" class="img-responsive">
							</div>
						</div>
						
						<div class="line"></div>
						<p class="box-label">Platform Details</p>
						<div class="box">
							<form role="form" class="fw">
								<div class="row">
									<div class="col-md-5">
										<p>Raspebery Pi model</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
									      <select class="form-control" id="sel1">
									        <option>Respberry Pi B/B+</option>
									      </select>
								    	</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<p>Concentrator model</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
									      <select class="form-control" id="sel1">
									        <option>IMST iC880A</option>
									        
									      </select>
								    	</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<p>Connected over</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
									      <select class="form-control" id="sel1">
									        <option>USB</option>
									        
									      </select>
								    	</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non felis ultricies enim mattis ullamcorper. Phasellus maximus vestibulum iaculis. Curabitur posuere ut augue vitae placerat.</p>
									</div>
									
								</div>
							</form>
						</div>
						<br/>
						<br/>


						<!-- ////////////////////////////////////////////////// -->
						<p class="box-label">Gateway Technical details</p>
						<form role="form" class="fw nopadding" >
						<div class="box">
							<br>
								<div class="row">
									<div class="col-md-5">
										<p>eth0 MAC Address</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
											<input type="email" class="form-control" id="email" placeholder="XXXXXXXXXXXX" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<p>Country</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
									      <select class="form-control" id="sel1">
									        <option>United Kingdom</option>
									        
									      </select>
								    	</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<p>Address</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
											<input type="email" class="form-control" id="email"  required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<p>City</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
											<input type="email" class="form-control" id="email"  required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<p>Zip code</p>
									</div>

									<div class="col-md-5">
										<div class="form-group">
											<input type="email" class="form-control" id="email"  required>
										</div>
									</div>
								</div>
							<br>
						</div><br>
						<input type="submit" name="submit" value="Register My Gateway">
						</form>


						</div>	
					</div>
					<div class="clearfix"></div>
					
				</div>
			</div>
		</div>
	</div>
</div>










<?php get_footer(); ?>