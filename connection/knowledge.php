<?php
class knowledge{

    private $conn;
    private $table_name = "tbl_conocimientos";
 
    public $id;
    public $curso;
    public $porcentaje;
    public $tbl_empleado_id;
    public $tbl_lenguajes_id;
 
    public function __construct($db){
        $this->conn = $db;
    }

    function read($id){
        //$query = "SELECT * FROM " . $this->table_name.",lenguajes WHERE  tbl_empleado_id = ".$id;
        $query = "SELECT * FROM tbl_conocimientos, tbl_lenguajes WHERE tbl_lenguajes.id = tbl_lenguajes_id and tbl_empleado_id = ".$id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function get($_id){
        $query = "SELECT * FROM " . $this->table_name. ", tbl_lenguajes WHERE tbl_empleado_id = ".$_id." and tbl_lenguajes.id = tbl_lenguajes_id ";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function create($_lenguaje,$_Porcentaje,$_empleado){
        $query = "INSERT INTO " . $this->table_name." (porcentaje,tbl_empleado_id,tbl_lenguajes_id) Values(".$_Porcentaje.",'".$_empleado."','".$_lenguaje."')";
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

    function eraseknow($_id){
        $query = "DELETE FROM " . $this->table_name." WHERE ".$_id." = tbl_lenguajes_id";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function modify($_id,$_lenguaje, $_Porcentaje){
        $query = "UPDATE " . $this->table_name." SET tbl_lenguajes_id = '".$_lenguaje."', eporcentajedad = ".$_Porcentaje." WHERE id = ".$_id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }
}
?>