<?php 
namespace App\Controller;
use App\Model\Cliente;

class ClienteController{
    public function index(){
        //Cliente::create(array(
        //                    "nombre" => "Jose Ascurra",
        //                    "direccion" => "Fulgencio Yegros",
        //                    "email" => "joseascurra123@gmail.com",
        //                    "RUC" => "5286721-0",
        //                    "ciudad" => "Fernando de la Mora",
        //                    "saldo" => "52000",
        //                ));
        $clientes = new Cliente();
        view("index",array("nombre" => "JOSE","clientes" => $clientes->getAll()));
    }
    public function create(){
        view("nuevo");
    }
    public function store(){
        $parametros = $_POST;
        if(file_exists($_FILES["foto"]["tmp_name"])){
            $parametros["foto"] = base64_encode(file_get_contents($_FILES["foto"]["tmp_name"]));
        }
        Cliente::create($parametros);
        header("Location: http://".$_SERVER["HTTP_HOST"]."/cliente");
    }
    public function show($id){
        //print_r(Cliente::show($id));
        view("show",Cliente::show($id));
    }
    public function edit($id){
        //print_r(Cliente::show($id));
        view("edit",Cliente::show($id));
    }
    public function update($id){
        $parametros = $_POST;
        if(file_exists($_FILES["foto"]["tmp_name"])){
            $parametros["foto"] = base64_encode(file_get_contents($_FILES["foto"]["tmp_name"]));
        }
        Cliente::update($parametros,$id);
        header("Location: http://".$_SERVER["HTTP_HOST"]."/cliente");
    }
    public function destroy($id){
        Cliente::destroy($id);
        header("Location: http://".$_SERVER["HTTP_HOST"]."/cliente");
    }
}