<?php


add_shortcode('page_sensor_view', 'page_sensor_view_func');



function page_sensor_view_func($atts, $content=null) {




    include('../templates/sidebar.php');


    $html = '
                <div class="col-md-9 nopadding dash-rigth application">
                        <div class="col-md-12 dash-right-wrapper">
                        <br>


                            <div class="panel panel-default">
                                <div class="panel-heading"> <h3 class="panel-title">Choose device registration option: </h3> </div>
                                <div class="panel-body">
                                <button type="button" class="btn btn-default serton_button_abp"  id="serton_button_abp" >ABP</button>
                                <button type="button" class="btn btn-primary serton_button_otaa" id="serton_button_otaa"  >OTAA</button>
                                </div>

                            </div>



                            <div class="panel panel-default">
                                  <div class="panel-heading">
                                <h3 class="panel-title">Enter device details: </h3>
                                </div>

                              <div class="panel-body">

                                    <div class="form-group">
                                      <label for="pwd">Device EUI </label>
                                      <input style="width:30%" type="text" class="form-control" max="10" id="sertone_field_device_eui"  value="" >
                                    </div>

                                    <hr>
                                     <div class="form-group">
                                      <label for="pwd">Set Frame Count </label> <br>
                                       <button type="button" class="btn btn-primary" id="sertone_button_set_frame_count">Enabled</button>
                                    </div>
                                    <hr>

                                     <div class="form-group">
                                      <label for="pwd">Default Application </label>
                                      <input style="width:30%" type="text" class="form-control" id="pwd" value="123353SFDFSSERARTERFV" />
                                    </div>


                              </div>

                              <div class="panel-footer">
                                <input type="submit" class="btn btn-info" value="Add Sensor >>>">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>';


    $content .= $html;
    return $content;
}