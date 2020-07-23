<?php

class Routes{
    public $arrayUrl;
    public $arrayMethod;
    public $arrayFuncionController;
    public $defaultNamespace;
    public function __construct(){
        $this->arrayFuncionController  = array();
        $this->arrayUrl = array();
        $this->arrayMethod = array();
    }
    public function defaultNamespace($namespace){
        $this->defaultNamespace = $namespace;
    }
    public function get($url,$funcionController){
        //$this->funcionController = $funcionController;
        //echo $this->defaultNamespace.$funcionController;
        array_push($this->arrayMethod,"GET");
        array_push($this->arrayUrl,$url);
        array_push($this->arrayFuncionController,$funcionController);
        //$arrayController = explode("::",$funcionController);
        //var_dump($arrayController);
    }
    public function post($url,$funcionController){
        //$this->funcionController = $funcionController;
        //echo $this->defaultNamespace.$funcionController;
        array_push($this->arrayMethod,"POST");
        array_push($this->arrayUrl,$url);
        array_push($this->arrayFuncionController,$funcionController);
        //$arrayController = explode("::",$funcionController);
        //var_dump($arrayController);
    }
    public function imprimirRutas(){
        foreach($this->arrayUrl as $url){
            echo "<br/>{$url}<br/>";
        }
    }
    public function obtenerControlador(){
        //if(isset($_SERVER["QUERY_STRING"])){
        //    echo "<br/>";
        //}
        foreach($this->arrayMethod as $indexMethod => $method){
            if($_SERVER["REQUEST_METHOD"] == $method){
                if($this->arrayUrl[$indexMethod] == $_SERVER["REQUEST_URI"]){
                    $controladorFuncionAux = explode("::",$this->arrayFuncionController[$indexMethod]);
                    $controlador = trim($this->defaultNamespace).$controladorFuncionAux[0];
                    $auxController = new $controlador;
                    if(method_exists($auxController,$controladorFuncionAux[1])){
                        call_user_func_array(array($auxController,$controladorFuncionAux[1]),array());
                        return;
                    }else{
                        echo "No existe el metodo";
                    }
                    //echo $this->defaultNamespace."/".explode("::",$this->arrayFuncionController[$indexMethod])[0];
                }else{
                    if(strpos($this->arrayUrl[$indexMethod],"{")){
                        //Capturamos la ruta del indice actual
                        $arrayRutaEngineActual = explode("/",$this->arrayUrl[$indexMethod]);
                        array_shift($arrayRutaEngineActual);
                        //$parametroRuta = str_replace(array("{","}"),"",implode("",$arrayRutaEngine));
                        //Capturamos la ruta del navegador
                        $arrayRutaEngineNavegador = explode("/",$_SERVER["REQUEST_URI"]);
                        array_shift($arrayRutaEngineNavegador);

                        $coincidenciaDeMetodos = true;
                        //Verificamos si coinciden las rutas
                        foreach($arrayRutaEngineActual as $index => $rutaParcial){
                            //echo $index."<br/>";
                            if(sizeof($arrayRutaEngineActual)-1 != $index){
                                if($rutaParcial == $arrayRutaEngineNavegador[$index]){
                                    $coincidenciaDeMetodos = true;
                                }else{
                                    $coincidenciaDeMetodos = false;
                                }
                            }
                        }
                        //echo $indexMethod."<br/>";
                        if($coincidenciaDeMetodos){
                            $parametro = str_replace(array("{","}"),"",$arrayRutaEngineNavegador[sizeof($arrayRutaEngineNavegador)-1]);
                            $controladorFuncionAux = explode("::",$this->arrayFuncionController[$indexMethod]);
                            $controlador = trim($this->defaultNamespace).$controladorFuncionAux[0];
                            $auxController = new $controlador;
                            if(method_exists($auxController,$controladorFuncionAux[1])){
                                call_user_func_array(array($auxController,$controladorFuncionAux[1]),array($parametro));
                                return;
                            }else{
                                echo "No existe el metodo";
                            }
                        }
                    }
                }
            }
        }
        //echo $_SERVER["REQUEST_URI"]." ".$_SERVER["REQUEST_METHOD"];
    }
}
$rutas = new Routes();
$rutas->defaultNamespace("App\\Controller\\");
$rutas->get("/cliente","ClienteController::index");
$rutas->get("/cliente/show/{id}","ClienteController::show");
$rutas->get("/cliente/create","ClienteController::create");
$rutas->get("/cliente/edit/{id}","ClienteController::edit");
$rutas->get("/cliente/destroy/{id}","ClienteController::destroy");
$rutas->post("/cliente","ClienteController::store");
$rutas->post("/cliente/edit/{id}","ClienteController::update");