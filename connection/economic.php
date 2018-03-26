<?php
class economic{

    private $conn;
    private $table_name = "tbl_datos_economicos";
 
    public $tbl_empleado_id;
    public $puesto;
    public $salario;
 
    public function __construct($db){
        $this->conn = $db;
    }

    function read($id){
        $query = "SELECT * FROM " . $this->table_name." WHERE tbl_empleado_id = ".$id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function get($_id){
        $query = "SELECT * FROM " . $this->table_name. " WHERE tbl_empleado_id = ".$_id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function create($_id, $_puesto,$_salario){
        $query = "INSERT INTO " . $this->table_name." (puesto,salario,tbl_empleado_id) Values('".$_puesto."',".$_salario.",".$_id.")";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;   
    }

    function erase($_id){
        $query = "DELETE FROM " . $this->table_name." WHERE ".$_id." = tbl_empleado_id";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function modify($_id,$_puesto,$_salario){
        $query = "UPDATE " . $this->table_name." SET puesto = '".$_puesto."', salario = ".$_salario." WHERE tbl_empleado_id = ".$_id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }
}
?>