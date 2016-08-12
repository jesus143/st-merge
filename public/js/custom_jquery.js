$(function(){
    var sensor_device_eui_len_max = 0;
    // var loginUrl = "<?php echo absolute_url(\"login.php\"); ?>";
     var reg_type = $("#sensor-container-sub1").attr("regtype");
    //alert(reg_type);
    // when the pages loaded
    if(reg_type == "ABP") {
        $('#serton_button_otaa').attr("disabled", 'disabled');
        sensor_device_eui_len_max = 8;
        $('#csys-sensor-selected').val("abp");
    } else if (reg_type == "OTAA") {
        $('#serton_button_abp').attr("disabled", 'disabled');
        sensor_device_eui_len_max = 16;
        $('#csys-sensor-selected').val("otaa");
    }

    //alert("ready");
    /**
     * Sensor application part
     */
    $('#serton_button_abp').click(function(){
        //alert("clicked abp");
        $('#serton_button_otaa').attr("disabled", 'disabled');
        sensor_device_eui_len_max = 8;

        //$("#sertone_field_device_eui").attr('disabled', 'enabled');
        $('#csys-sensor-selected').val("abp");
    });

    $('#serton_button_otaa').click(function(){

        //disable other button
        $('#serton_button_abp').attr("disabled", 'disabled');

        //set max min in the field
        sensor_device_eui_len_max = 16;


        $('#csys-sensor-selected').val("otaa");

        //$("#sertone_field_device_eui").attr('disabled', 'enabled');
    });



    $("#sertone_field_device_eui").keyup(function(){
        if(sensor_device_eui_len_max == 0) {
            alert("please select OTAA or ABP first");
            $(this).val('');
            //$(this).attr('disabled', 'disabled');
        } else {
            var current_val =  $(this).val();
            var string_len = $(this).val().length;

            console.log($(this).val() + " len " + $(this).val().length + " max len " + sensor_device_eui_len_max);

            if(string_len > sensor_device_eui_len_max ) {
                $(this).val(current_val.substring(0, sensor_device_eui_len_max));
            }
        }
    });

    $('#sertone_button_set_frame_count').click(function(){
        //alert($(this).text());
        var text = $(this).text();
        if(text == 'Enabled') {
            $(this).text('Disabled');
        } else {
            $(this).text('Enabled');
        }
    });


    /*******************************
     ***Application Page************
     *******************************
     */

    $('#applications_container input').change(function() {
        if(this.checked) {
            var idCheckBox =   $(this).attr("id");
            $(idCheckBox).attr("checked", true);
            $.fn.functionName(idCheckBox);
        }
    });
    $.fn.functionName = function(idCheckBox) {
        $('#applications_container input:checked').each(function () {
            if ($(this).attr("id") != idCheckBox) {
                $(this).attr("checked", false);
            }
        });
    }
















});