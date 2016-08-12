<?php
/**
 * Template Name: add application
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 *
 *
 *
 * @todo
 *
 * get and display the default application in the screen
 */


?>

<?php include('header.php'); ?>

<?php include('sidebar.php'); ?>


<?php
    $api_instance_application = new Swagger\Client\Api\ApplicationsApi();
    $app_eui = '';
    try {
        $application_default_r =  $api_instance_application->getApplicationsByUserIdAndAppId( $_SESSION['console_sys_user'] );
        $app_eui = $application_default_r['app_eui'];
    } catch (exception $e) {
           echo " error " . $e->getMessage();
    }
 ?>


<?php


$reg_type = $_GET['reg_type'];

?>





  <form method="POST" action="" >
		<div class="col-md-9 nopadding dash-rigth application">
			<div class="col-md-12 dash-right-wrapper">
			    <br>
                <?php

                    if(!empty($_SESSION['response']['sensor']['add_new'])):
                        echo $_SESSION['response']['sensor']['add_new'];
                    endif;
                ?>



				<div class="panel panel-default" id="sensor-container-sub1" regtype="<?php print $reg_type; ?>" >
				    <div class="panel-heading"> <h3 class="panel-title">Choose device registration option: </h3> </div>
                    <div class="panel-body">
                       <?php if ($reg_type == "ABP"):   ?>
                            <button type="button" class="btn btn-default serton_button_abp"  id="serton_button_abp" >ABP</button>
                        <?php  elseif ($reg_type == "OTAA"): ?>
                            <button type="button" class="btn btn-primary serton_button_otaa" id="serton_button_otaa"  >OTAA</button>
                        <?php else: ?>
                           <button type="button" class="btn btn-default serton_button_abp"  id="serton_button_abp" >ABP</button>
                           <button type="button" class="btn btn-primary serton_button_otaa" id="serton_button_otaa"  >OTAA</button>
                        <?php endif; ?>
                    <input type="hidden" value="" name="csys_sensor_selected" id="csys-sensor-selected" />
                    </div>
                </div>



                <div class="panel panel-default">



                        <div class="panel-heading">
                          <h3 class="panel-title">Enter device details: </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                              <label for="pwd">Device EUI </label>
                              <input style="width:30%" type="text" class="form-control" max="10" id="sertone_field_device_eui" name="csys_device_eui" value="" >
                            </div>
                            <hr>
                             <div class="form-group">
                                 <label for="pwd">Set Frame Count </label> <br>
                                 <button type="button" class="btn btn-primary" id="sertone_button_set_frame_count">Enabled</button>
                             </div>
                             <hr>
                             <div class="form-group">
                                 <label for="pwd">Default Application </label>
                                 <br>
                                 <div style="border: 1px solid grey;padding: 5px;width: 25%;"><?php echo $app_eui; ?></div>
                                 <br><br>
                                 <input style="width:30%" type="hidden" class="form-control" id="pwd" value="<?php echo $app_eui; ?>" />
                            </div>
                         </div>

                        <div class="panel-footer">
                            <input type="submit" class="btn btn-info" name="csys_add_sensor" value="Add Sensor >>>" " />
                        </div>


                </div>
			</div>
		</div>
  </form>



<?php include('footer.php'); ?>