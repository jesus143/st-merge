<?php require_once("include_header.php"); ?>
<?php

    $abp_details = $_SESSION['device']['abp']['details'];
    $reg_type    = $abp_details['reg_type'];
    $dev_eui     = $abp_details['dev_eui'];
    $app_eui     = $abp_details['app_eui'];
    $app_key     = $abp_details['app_key'];
    $app_s_key   = $abp_details['app_s_key'];
    $dev_addr    = $abp_details['dev_addr'];
    $nwk_s_key   = $abp_details['nwk_s_key'];
    $fcnt_up     = $abp_details['fcnt_up'];
    $fcnt_down   = $abp_details['fcnt_down'];
    $flags       = $abp_details['flags'];
    $activated   = $abp_details['activated'];
    $dev_eui     = $_GET['dev_eui'];
    $url_dashboard = $_SESSION['url']['dashboard'];

?>






<div class="panel-heading"  >
    <h1> Device Info - <?php echo $dev_eui; ?> </h1>
</div>
<div class="panel-body">
    <table class="table table-reflow">
        <tbody>
        <tr>
            <td>Device Address: </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder="" value="<?php echo $dev_addr; ?>" />
                </div>
            </td>
        </tr>
        <tr>
            <td>Network Key: </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder="" value="<?php echo $nwk_s_key; ?>" >
                </div>
            </td>
        </tr>
        <tr>
            <td>App Key: </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder=""  value="<?php echo $app_key; ?>"  >
                </div>
            </td>
        </tr>
        <tr>
            <td>Frame Count Uplink: </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder=""  value="<?php echo $fcnt_up; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td>Frame Count Downlink: </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder=""  value="<?php echo $fcnt_down; ?>">
                </div>
            </td>
        </tr>

        <tr>
            <td>Frame Count Check: </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" placeholder=""  value="<?php  echo ($activated == 1)? "Yes" : "No"; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo $url_dashboard; ?>">
                    <button type="button" class="btn btn-primary">Go Application >>></button>
                </a>
            </td>
            <td>
            </td>
        </tbody>
    </table>
</div>
<div class="panel-footer">
</div>
<?php require_once("include_footer.php"); ?>