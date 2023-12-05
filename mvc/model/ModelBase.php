<?php 
require_once 'config/conexio.php';

class ModelBase{

    public $db;

    public function __construct(){
        $this->db = database::conectar();
    }

    public function mostrarTotTaula($tabla){
        $query = $this->db->query("SELECT * FROM $tabla ORDER BY id ASC");
        return $query;
    }
    
}