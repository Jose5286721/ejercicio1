<?php
namespace App\Model;
use App\Config\Connection;
class Cliente{
    public $parametros;
    public function __construct(){
        $this->parametros = array();
    }
    public function getAll(){
        $conn = Connection::getConnection();
        $resultadoArray = array();
        $resultado = mysqli_query($conn,"select * from clientes");
        while($row = mysqli_fetch_assoc($resultado)){
            array_push($resultadoArray,$row);
        }
        mysqli_free_result($resultado);
        return $resultadoArray;
    }
    public static function show($id){
        $conn = Connection::getConnection();
        $resultadoArray = array();
        $resultado = mysqli_query($conn,"select * from clientes where codigo = '".$id."'");
        while($row = mysqli_fetch_assoc($resultado)){
            foreach($row as $clave => $valor){
                $resultadoArray[$clave] = $valor;
            }
        }
        mysqli_free_result($resultado);
        return $resultadoArray;
    }
    public static function update($arrayCampos,$id){
        $conn = Connection::getConnection();
        $query = "update clientes set ";
        $contador = 0;
        foreach($arrayCampos as $clave => $valor){
            $coma = ",";
            if(sizeof($arrayCampos)-1 == $contador){
                $coma = "";
            }
            $query.=$clave." = '".$valor."' ".$coma;
            $contador++;
        }
        $query.=" where codigo = '{$id}'";
        //echo $query;
        return mysqli_query($conn,$query);
    }
    public static function create($arrayCampos){
        $conn = Connection::getConnection();
        $query = "insert into clientes(";
        $values = "values(";
        $contador = 0;
        foreach($arrayCampos as $index => $campo){
            $coma = ",";
            if($contador == sizeof($arrayCampos)-1){
                $coma = "";
            }
            $query.=$index.$coma;
            $values.="'".$campo."'".$coma;
            $contador++;
        }
        $query = $query.") ".$values.");";
        //echo $query;
        return mysqli_query($conn,$query);
    }
    public static function destroy($id){
        $conn = Connection::getConnection();
        $resultado = mysqli_query($conn,"delete from clientes where codigo = '".$id."'");
        return $resultado;
    }
}