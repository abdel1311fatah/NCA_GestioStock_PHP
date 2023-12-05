<?php
require_once "ModelBase.php";
class usuari extends ModelBase{
    public $nomUsuari;
    public $nom;
    public $cognom;
    public $dni;
    public $contrasenya;

    public function __construct(){
        parent::__construct();
    }

    /**
     * Get the value of nomUsuari
     */
    public function getNomUsuari()
    {
        return $this->nomUsuari;
    }

    /**
     * Set the value of nomUsuari
     */
    public function setNomUsuari($nomUsuari): self
    {
        $this->nomUsuari = $nomUsuari;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of cognom
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * Set the value of cognom
     */
    public function setCognom($cognom): self
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get the value of dni
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     */
    public function setDni($dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of contrasenya
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Set the value of contrasenya
     */
    public function setContrasenya($contrasenya): self
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

    public function insertar(){
        $query = "INSERT INTO usuari (nomUsuari, nom, cognom, dni, contrasenya) VALUES ('{$this->nomUsuari}', '{$this->nom}', '{$this->cognom}', '{$this->dni}', '{$this->contrasenya}')";
        $insert = $this->db->query($query);

        return $insert;
    }

    public function delete(){
        $query = "DELETE FROM usuari WHERE nomUsuari = '{$this->nomUsuari}'";
        $delete = $this->db->query($query);

        return $delete;
    }
}
?>