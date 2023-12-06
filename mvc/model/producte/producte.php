<?php
require_once "ModelBase.php";

class Product extends ModelBase {
    public $productName;
    public $description;
    public $price;
    public $stock;

    public function __construct() {
        parent::__construct();
    }

    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName): self {
        $this->productName = $productName;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price): self {
        $this->price = $price;
        return $this;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock): self {
        $this->stock = $stock;
        return $this;
    }

    public function insert() {
        $query = "INSERT INTO products (productName, description, price, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssdi", $this->productName, $this->description, $this->price, $this->stock);
        $insert = $stmt->execute();
    
        return $insert;
    }
    
    public function delete() {
        $query = "DELETE FROM products WHERE productName = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $this->productName);
        $delete = $stmt->execute();
    
        return $delete;
    }
}
?>
