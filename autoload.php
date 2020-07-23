<?php
//require_once "App/Config/";
require_once __DIR__."/App/Helpers/Commons.php";
$arrayConfiguracionesArchivos = solo_archivos(scandir("App/Config/",1));
foreach($arrayConfiguracionesArchivos  as $archivoConfiguracion){
    if(file_exists("App/Config/".$archivoConfiguracion) && is_readable("App/Config/".$archivoConfiguracion)){
        require_once __DIR__."/App/Config/".$archivoConfiguracion;
        //echo "App/Config/".$archivoConfiguracion;
    }
}
spl_autoload_register(function($clase){
    require_once __DIR__."/".str_replace("\\","/",$clase).".php";
});
$rutas->obtenerControlador();