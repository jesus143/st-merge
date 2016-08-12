<?php

function sertone_covertApplicationTo2DArray($object) {
    $dataArray = [];
    foreach($object as $key1 => $value) {
        $dataArray[$key1]['id']          = $value['id'];
        $dataArray[$key1]['app_eui']     = $value['app_eui'];
        $dataArray[$key1]['name']        = $value['name'];
        $dataArray[$key1]['owner']       = $value['owner'];
        $dataArray[$key1]['access_keys'] = $value['access_keys'];
        $dataArray[$key1]['valid']       = $value['valid'];
    }
    return  $dataArray;
}


function sertone_orderAppDescAsc($type='id', $order='desc', $dataArray) {

        $sorting = '';

        if($order == 'desc') {
            $sorting = SORT_DESC;
        } else if ($order == 'asc') {
            $sorting = SORT_ASC;
        }
        foreach ($dataArray as $key => $row) {
            $sort_row[$key]  = $row[$type];
        }
        array_multisort($sort_row, $sorting, $dataArray);

    return $dataArray;

}

function sertone_redirect($location) { ?>
    <script>
        // alert("working");
        document.location = '<?php echo $location; ?>';
    </script> <?php
}



function csys_get_slug_of_the_page() {
    return str_replace("/", "", $_SERVER['REQUEST_URI']);
}

function csys_is_local() {
    if($_SERVER['HTTP_HOST'] == 'localhost'
        || substr($_SERVER['HTTP_HOST'],0,3) == '10.'
        || substr($_SERVER['HTTP_HOST'],0,7) == '192.168') return true;
    return false;
}


