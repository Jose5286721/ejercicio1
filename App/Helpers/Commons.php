<?php
function solo_archivos($archivosArray){
    $largoArray = sizeof($archivosArray);
    unset($archivosArray[$largoArray-1]);
    unset($archivosArray[$largoArray-2]);
    return $archivosArray;
}
function view($nombreVista,$arrayOptions = array()){
    ob_start();
    extract($arrayOptions);
    include dirname(__DIR__)."/Views/".$nombreVista.".php";
    echo ob_get_clean();
}