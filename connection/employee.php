<?php
class employee{

    private $conn;
    private $table_name = "tbl_empleado";
 
    public $id;
    public $name;
    public $age;
    public $address;
    public $state;
    public $birthday;
    public $phone;
 
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function get($_id){
        $query = "SELECT * FROM " . $this->table_name. " WHERE id = ".$_id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function getid($_name, $_age,$_address,$_state,$_birthday,$_phone){
        $query = "SELECT id FROM " . $this->table_name." WHERE nombre = '".$_name."' and edad = ".$_age." and direccion = '".$_address."' and estado = ".$_state." and fecha_nacimiento = '".$_birthday."' and telefono = '".$_phone."'";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }


    function create($_name, $_age,$_address,$_state,$_birthday,$_phone){
        $query = "INSERT INTO " . $this->table_name."(nombre,edad,direccion,estado,fecha_nacimiento,telefono) Values('".$_name."',".$_age.",'".$_address."',1,'".$_birthday."','".$_phone."')";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;   
        //echo "Si entro";
    }
    function erase($_id){
        $query = "DELETE FROM " . $this->table_name." WHERE ".$_id." = id";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function modify($_id,$_name, $_age,$_address,$_state,$_birthday,$_phone){
        $query = "UPDATE " . $this->table_name." SET nombre = '".$_name."', edad = ".$_age." ,direccion = '".$_address."',estado = ".$_state." ,fecha_nacimiento = '".$_birthday."', telefono = '".$_phone."' WHERE id = ".$_id;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }
}
?>