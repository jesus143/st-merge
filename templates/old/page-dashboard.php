<?php
/**
 * Template Name: dashboard
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


?>

<?php get_header(); ?>




<?php get_sidebar(); ?>

<?php


try {
    $result = $api_instance_applicatin->getApplicationsAll();
    //print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicationsApi->getApplicationsAll: ', $e->getMessage(), PHP_EOL;
}
?>
		<div class="col-md-9 nopadding dash-rigth">
			<div class="col-md-12 dash-right-wrapper">
			<br>
				<h1>Dashboard</h1>

				<div class="table-wrap">
					<div class="table-wrap-head"><h4><span><img src="<?php echo IMG; ?>/headapplication.png"></span>&nbsp; Applications</h4></div>
					<div class="col-md-12 table-container">
						 <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>AppID</th>
					        <th>Application Title</th>
					        <th>AppEUI</th>
					        <th>Access Keys</th>
					        <th>Max Possible Devices</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>AA-BB-CC-D1</td>
					        <td>Application 1</td>
					        <td>Enabled</td>
					        <td>0</td>
					        <td>10</td>
					      </tr>
					      <tr>
					        <td>AA-BB-CC-D1</td>
					        <td>Application 1</td>
					        <td>Enabled</td>
					        <td>0</td>
					        <td>10</td>
					      </tr>
					      <tr>
					        <td>AA-BB-CC-D1</td>
					        <td>Application 1</td>
					        <td>Enabled</td>
					        <td>0</td>
					        <td>10</td>
					      </tr>
					      <tr>
					        <td>AA-BB-CC-D1</td>
					        <td>Application 1</td>
					        <td>Enabled</td>
					        <td>0</td>
					        <td>10</td>
					      </tr>
					      <tr>
					        <td>AA-BB-CC-D1</td>
					        <td>Application 1</td>
					        <td>Enabled</td>
					        <td>0</td>
					        <td>10</td>
					      </tr>


					    </tbody>
					  </table>
					</div>
					
					
				</div>
				<div class="clearfix"></div>
				<div class="table-wrap">
					<div class="table-wrap-head"><h4><span><img src="<?php echo IMG; ?>/headapplication.png"></span>&nbsp; Applications</h4></div>
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
					      <tr>
					        <td>1209834</td>
					        <td>-12131232, 123123123</td>
					        <td>Gateway1</td>
					        <td>A1-B2-C3:123:2</td>
					        <td>IMST IC123</td>
					        <td>201523231</td>
					        <td>1</td>
					        <td>YES</td>
					      </tr>
					      <tr>
					        <td>1209834</td>
					        <td>-12131232, 123123123</td>
					        <td>Gateway1</td>
					        <td>A1-B2-C3:123:2</td>
					        <td>IMST IC123</td>
					        <td>201523231</td>
					        <td>1</td>
					        <td>YES</td>
					      </tr>
					      <tr>
					        <td>1209834</td>
					        <td>-12131232, 123123123</td>
					        <td>Gateway1</td>
					        <td>A1-B2-C3:123:2</td>
					        <td>IMST IC123</td>
					        <td>201523231</td>
					        <td>1</td>
					        <td>YES</td>
					      </tr>
					      <tr>
					        <td>1209834</td>
					        <td>-12131232, 123123123</td>
					        <td>Gateway1</td>
					        <td>A1-B2-C3:123:2</td>
					        <td>IMST IC123</td>
					        <td>201523231</td>
					        <td>1</td>
					        <td>YES</td>
					      </tr>
					      

					    </tbody>
					  </table>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>