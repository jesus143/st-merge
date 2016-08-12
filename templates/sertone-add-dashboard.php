<?php
/**
 * Template Name: dashboard
 *
 * @package Sertone
 * @subpackage sertone
 * @since sertone 1.0
 */

?>

<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>
		<div class="col-md-9 nopadding dash-rigth">
			<div class="col-md-12 dash-right-wrapper">
			<br>
				<h1>Dashboard</h1>

				<div class="table-wrap">

				    <form action="<?php echo $_SERVER['php_self']; ?>" method="POST" >
                        <div class="table-wrap-head" style="height: 56px;">

                             <div style="display: inline;float:right;margin-top: 8px;">
                                <input type="submit" value="Set Default" name="application_set_default" />
                                <input type=submit value="Delete" name="application_delete" />
                             </div>

                            <div style="display: inline; float:left;">
                                <h4>
                                    <span>
                                        <img src="<?php echo IMG; ?>/headapplication.png">
                                    </span>&nbsp; Applications
                                </h4>
                            </div>

                        </div>


                        <div class="col-md-12 table-container">
                                    <?php
                                    try {

                                        $api_instance_application = new Swagger\Client\Api\ApplicationsApi();

                                        //									$result_application = $api_instance_application->getApplicationsAll(12);
                                        //                                    echo "<pre>";
                                        //                                    print_r($_SESSION);
                                        //                                    echo "</pre>";
                                        //
                                        //                                    echo "User name " . $_SESSION['console_sys_user'];



                                        try { ?>


                                                <?php if( $_SESSION['response']['application']['set_default'] ): ?>

                                                    <br>

                                                        <?php echo  $_SESSION['response']['application']['set_default'] ; ?>
                                                        <?php unset( $_SESSION['response']['application']['set_default'] ); ?>
                                                  </div>
                                                <?php endif; ?>

                                                <table class="table table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="100" >
                                                            <span>Action</span>
                                                        </th>
                                                        <th width="180" >
                                                            Application Title
                                                            <div style="display: inline; float:right;" >
                                                                 <a href="?app_sort=desc&type=name" > < </a>
                                                                <a href="?app_sort=asc&type=name" > > </a>
                                                            </div>
                                                        </th>
                                                        <th width="100" >AppEUI
                                                             <div style="display: inline; float:right;" >
                                                                 <a href="?app_sort=desc&type=app_eui" > < </a>
                                                                <a href="?app_sort=asc&type=app_eui" > > </a>
                                                            </div>
                                                        </th>
                                                        <th width="200" >Access Keys
                                                              <div style="display: inline; float:right;" >
                                                                 <a href="?app_sort=desc&type=access_keys" > < </a>
                                                                 &nbsp;
                                                                <a href="?app_sort=asc&type=access_keys" > > </a>
                                                            </div>

                                                            </th>
                                                        <th>Status
                                                            <div style="display: inline; float:right;" >
                                                                 <a href="?app_sort=desc&type=valid" > < </a>
                                                                <a href="?app_sort=asc&type=valid" > > </a>
                                                            </div>

                                                         </th>
                                                    </tr>
                                                </thead>
                                                <tbody> <?php

                                                 $application_default_r = [];
                                                try {
                                                       $application_default_r =  $api_instance_application->getApplicationsByUserIdAndAppId( $_SESSION['console_sys_user'] );
                                                       //echo "<pre>";
                                                       //print_r($application_default_r);
                                                       //echo "id " . $application_default_r['id'];
                                                       //echo "</pre>";
                                                } catch (exception $e) {
                                                      //echo "error: " . $e->getMessage();
                                                     //echo "please select default application";
                                                }


                                                $result_application = $api_instance_application->getApplicationsByUserId( $_SESSION['console_sys_user'] );


                                                    //                                            echo "<pre>";
                                                     $result_application = sertone_orderAppDescAsc($_GET['type'], $_GET['app_sort'], sertone_covertApplicationTo2DArray($result_application));

                                                $application_default =  rand(0, count($result_application) - 1);

                                                    //                                              print_r( $result_application);
                                                    //                                              print_r( (array) $result_application );
                                                    //                                              $vars = get_object_vars ( $result_application );
                                                    //                                              print_r ( $vars );
                                                    //                                              echo "</pre>";

                                                $counter = 1;

                                                foreach ($result_application as  $key => $value) {
    //
    //
    //                                                $newarray = getProtectedValue($value,'container');
                                                    ?>
                                                    <tr>
                                                        <td>

                                                        <?php if($application_default_r['app_eui'] == $value['app_eui']): ?>
                                                            <input type="checkbox" name="selected_application[]" value="<?php echo $value['app_eui']; ?>" checked/>
                                                       <?php else: ?>
                                                            <input type="checkbox" name="selected_application[]" value="<?php echo $value['app_eui']; ?>" />
                                                       <?php  endif; ?>



                                                        </td>
                                                        <td> <a href="<?php echo $_SESSION['url']['application_detail'] . '?app_eui=' . $value['app_eui']; ?>"><?php echo $value['name']; ?></a></td>
                                                        <td> <a href="<?php echo $_SESSION['url']['application_detail'] . '?app_eui=' . $value['app_eui']; ?>"><?php echo $value['app_eui']; ?></a></td>
                                                        <td> <?php echo  substr($value['access_keys'],0, 20 ) . '...';  ?> </td>
                                                        <td>

                                                        <?php  if($application_default_r['app_eui'] == $value['app_eui']): ?>
                                                            <?php echo ($value['valid'] == 1) ? '<span style="color:red" >Default</span>' : ""; ?>
                                                        <?php else: ?>
                                                            <?php echo ($value['valid'] == 1) ? 'Enabled' : ""; ?>
                                                        <?php  endif; ?>



                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $counter++;
                                                } ?>
                                                </tbody>
                                            </table>  <?php
                                        } catch(exception $e) { ?>

                                               <br>
                                            <div class="alert alert-danger" role="alert">  Please add your first application click <a href="<?php echo $_SESSION['url']['add_application']; ?>"> here </a>  </div>
                                            <?php

                                        }





                                    }catch (Exception $e) {
                                        echo 'Exception when calling ApplicationsApi->getApplicationsAll: ', $e->getMessage(), PHP_EOL;
                                    }
                                    ?>







                        </div>

					</form>


				</div>
				<div class="clearfix"></div>
				<div class="table-wrap">
					<div class="table-wrap-head"><h4><span><img src="<?php echo IMG; ?>/headapplication.png"></span>&nbsp; Gateway</h4></div>
					<div class="col-md-12 table-container">
						 <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Location</th>
					        <th>Title</th>
					        <th>MAC</th>
					        <th>Concentrator</th>
					        <th>Last Data</th>
					        <th>Version</th>
					        <th>Online</th>
					      </tr>
					    </thead>
 						 <tbody>

						<?php 
							$api_instance_gateways = new Swagger\Client\Api\GatewaysApi();
							try {
								$results_gateway = $api_instance_gateways->getGatewaysAll();
								foreach ($results_gateway as $key => $value) {
									$newarray_for_gateways = getProtectedValue($value,'container');?>
									<tr>
										<td><?php  echo $newarray_for_gateways['id']  ?></td>
										<td><?php  echo $newarray_for_gateways['longitude'].",".$newarray_for_gateways['latitude']  ?></td>
										<td><?php  echo $newarray_for_gateways['gateway_title']  ?></td>
										<td><?php  echo $newarray_for_gateways['id']  ?></td>
										<td><?php  echo $newarray_for_gateways['id']  ?></td>
										<td><?php  echo $newarray_for_gateways['id']  ?></td>
										<td><?php  echo $newarray_for_gateways['id']  ?></td>
										<td><?php  echo $newarray_for_gateways['id']  ?></td>
									</tr>
									<?php 
								} 

								} catch (Exception $e) {
									echo 'Exception when calling GatewaysApi->getGatewaysAll: ', $e->getMessage(), PHP_EOL;
								}
						?>
					    </tbody>
					  </table>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>