<?php require("include_header.php"); ?>

    <?php $csys_users_nodes = $_SESSION['csys_users_nodes']; ?>
    <?php $device_total = count($_SESSION['csys_users_nodes']);  ?>
    <?php $url_sertone_add_sensor = $_SESSION['url']['sertone_add_sensor']  ; ?>


    <div class="panel-heading" style="padding-top: 23px;padding-bottom: 24px;background-color: cornflowerblue;" > <h3 class="panel-title" style="font-size: 20px;" >Application - <?php echo $_SESSION['application_details']['name']; ?> - <?php echo $_SESSION['application_details']['app_eui']; ?> </h3> </div>
    <div class="panel-body">
        <table class="table table-reflow">
          <thead>
            <tr>
              <th><b style="color:green">Device (<?php echo $device_total; ?>)</b></th>
              <th></th>
              <th></th>
              <th></th>
              <th><button type="button" class="btn btn-primary">Import Devices</button></th>
              <th>
                  <a href="<?php print $url_sertone_add_sensor; ?>?reg_type=ABP">
                     <button type="button" class="btn btn-primary">Add ABP</button>
                  </a>
              </th>
              <th>
                  <a href="<?php print $url_sertone_add_sensor; ?>?reg_type=OTAA">
                     <button type="button" class="btn btn-primary">ADD OTAA</button>
                  </a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><b>RegType</b></td>
              <td><b>DevEUI</b></td>
              <td><b>AppSkey</b></td>
              <td><b>NwkSkey</b></td>
              <td><b>FnctUp</b></td>
              <td><b>FnctDown</b></td>
              <td><b>Activated</b></td>
            </tr>

            <?php

            foreach($csys_users_nodes as $key => $user_node):

                $url_device_detail = '';
                $DevEUI = '';
                $reg_type = $user_node['reg_type'];

                if(!empty($user_node['dev_addr'])) {
                  $DevEUI = $user_node['dev_addr'];
                } else if(!empty($user_node['dev_eui'])) {
                    $DevEUI = $user_node['dev_eui'];
                }

                if($reg_type == 'ABP') {
                   $url_device_detail =  $_SESSION['url']['device_info_abp'];
                } else if ($reg_type == 'OTAA') {
                   $url_device_detail = $_SESSION['url']['device_info_otaa'];
                }

                $link_abp_otaa =  "$url_device_detail?dev_eui=$DevEUI&amp;reg_type=$reg_type";









                 echo '
                    <tr>
                         <td>  '. $user_node['reg_type'] . '</td>
                         <td> <a href="'. $link_abp_otaa . '" >'  . $DevEUI .  '</a> </td>
                         <td>' . $user_node['app_key'] .  ' </td>
                         <td>' . $user_node['nwk_s_key'] .  ' </td>
                         <td>' . $user_node['fcnt_up'] .  ' </td>
                         <td>' . $user_node['fcnt_down'] .  ' </td>
                         <td> Yes </td>
                    <tr>';

            endforeach;

            ?>

            <!--            <tr>-->
            <!--              <td>OTAA</td>-->
            <!--              <td><a href="--><?php //print $_SESSION['url']['device_info_otaa']; ?><!--">123343</a></td>-->
            <!--              <td>xxxxxxxxxxxxxx</td>-->
            <!--              <td>yyyyyyyyyyyyyy</td>-->
            <!--              <td>123</td>-->
            <!--              <td>101</td>-->
            <!--              <td>Yes</td>-->
            <!--            </tr>-->
            <!--             <tr>-->
            <!--              <td>ABP</td>-->
            <!--              <td><a href="--><?php //print $_SESSION['url']['device_info_abp']; ?><!--">123343</a></td>-->
            <!--              <td>xxxxxxxxxxxxxx</td>-->
            <!--              <td>yyyyyyyyyyyyyy</td>-->
            <!--              <td>123</td>-->
            <!--              <td>101</td>-->
            <!--              <td>Yes</td>-->
            <!--            </tr>-->
          </tbody>
        </table>
         <table class="table table-reflow">
          <thead>
            <tr>
              <th><b style="color:green"> Data Delivery (2) </b> </th>
              <th></th>
              <th></th>

              <th><button type="button" class="btn btn-primary">Manage Data Delivery</button></th>
            </tr>
            <tr>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><b>Delivery Method</b></td>
              <td><b>Description</b></td>
              <td><b>RequestedID</b></td>
              <td><b>Status</b></td>
            <tr>
              <td>Email Push</td>
              <td>Application data is sent to via Email</td>
              <td>1234567890</td>
              <td>yes</td>
            </tr>
             <tr>
              <td>PrivateMQ</td>
              <td>Application data is sent to via Email</td>
              <td>1234567890</td>
              <td>No</td>
            </tr>
          </tbody>
        </table>
    </div>
    <div class="panel-footer"> </div>

<?php require("include_footer.php"); ?>
