<?php
require_once "ModelBase.php";

class Producte extends ModelBase {
    public $marca;
    public $model;
    public $foto;
    public $arxivat;
    public $data;
    public $categoria;

    

    public function mostrar(){
        $connexio = database::conectar();
        $sql = "SELECT * FROM Productes";
        $result = mysqli_query($connexio, $sql);

        $productos = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productos[] = $row;
            }
        }

        return $productos;
    }

    public function insertar() {
        $query = "INSERT INTO productes (marca, model, foto, arxivat, data, categoria) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssss", $this->marca, $this->model, $this->foto, $this->arxivat, $this->data, $this->categoria);
        $insert = $stmt->execute();
    
        return $insert;
    }

    public function eliminar() {
        $query = "DELETE FROM productes WHERE model = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $this->model);
        $delete = $stmt->execute();
    
        return $delete;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     */
    public function setModel($model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     */
    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of arxivat
     */
    public function getArxivat()
    {
        return $this->arxivat;
    }

    /**
     * Set the value of arxivat
     */
    public function setArxivat($arxivat): self
    {
        $this->arxivat = $arxivat;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     */
    public function setCategoria($categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }
}
?>
