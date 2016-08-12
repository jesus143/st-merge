<?php require_once("include_header.php"); ?>
<?php
    $ataa_details = $_SESSION['device']['otaa']['details'];
    $reg_type     = $ataa_details['reg_type'];
    $dev_eui      = $ataa_details['dev_eui'];
    $app_eui      = $ataa_details['app_eui'];
    $app_key      = $ataa_details['app_key'];
    $app_s_key    = $ataa_details['app_s_key'];
    $dev_addr     = $ataa_details['dev_addr'];
    $nwk_s_key    = $ataa_details['nwk_s_key'];
    $fcnt_up      = $ataa_details['fcnt_up'];
    $fcnt_down    = $ataa_details['fcnt_down'];
    $flags        = $ataa_details['flags'];
    $activated    = $ataa_details['activated'];
    $dev_eui      = $_GET['dev_eui'];
    $url_dashboard = $_SESSION['url']['dashboard'];
?>

    <div class="panel-heading"  >
        <h1> Device Info - <?php print $dev_eui; ?> </h1>
    </div>

    <div class="panel-body">
        <table class="table table-reflow">
            <tbody>
            <tr>
                <td>Device EUI: </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder="" value="<?php print $dev_eui; ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>AppKey: </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder="" value="<?php print $app_key; ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Device Addr: </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder="" value="<?php print $dev_addr; ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Network Key: </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder="" value="<?php print $nwk_s_key; ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Apps Key: </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder="" value="<?php print $app_s_key; ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Frame Count Up: <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder="" value="<?php print $fcnt_up; ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <td>Frame Count Down: </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="text" placeholder=""  value="<?php print $fcnt_down; ?>" >
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo $url_dashboard; ?>">
                        <button type="button" class="btn btn-primary">Go Application >>  </button>
                    </a>
                </td>
                <td>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
    </div>
<?php require_once("include_footer.php"); ?>