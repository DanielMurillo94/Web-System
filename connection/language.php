<?php
class language{

    private $conn;
    private $table_name = "tbl_lenguajes";
 
    public $id;
    public $lenguaje;
 
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;
    }

    function readOne($str){
        $query = "SELECT * FROM " . $this->table_name." WHERE lenguaje = '".$str."'";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;  
    }

    function create($_name){
        $query = "INSERT INTO " . $this->table_name."(lenguaje) Values('".$_name."')";
        $res = $this->conn->prepare($query);
        $res->execute();
        return $res;   
    }
}
?>